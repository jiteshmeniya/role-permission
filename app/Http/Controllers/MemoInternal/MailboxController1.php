<?php

namespace App\Http\Controllers\MemoInternal;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Mailbox;
use App\Models\MailboxAttachment;
use App\Models\MailboxFlag;
use App\Models\MailboxReceiver;
use App\Models\MailboxTmpChecker;
use App\Models\MailboxTmpCopy;
use App\Models\MailboxTmpReceiver;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MailboxController extends Controller
{
    private $parent_name;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailboxes = Mailbox::all();
        $positions = Position::all();
        $title = 'Memo Internal';
        return view('memointernal.index',compact('mailboxes','positions','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'perihal' => 'required',
            'receiver_id' => 'required',
            'approver_id' => 'required',
            'body' => 'required',
            'attachment' => 'file|max:5000',
        ]);

        $data = $request->all();
        $nip = Auth::user()->nip;
        $positions = Position::where('holder_id',$nip)->first();
        $drafter_id =$positions->position_id;

        $mailbox=new Mailbox();
        $mailbox->uuid=Uuid::uuid4()->getHex();
        $mailbox->body=$data['body'];
        $mailbox->perihal=$data['perihal'];
        $mailbox->approver_id=$data['approver_id'];
        $mailbox->drafter_id=$drafter_id;
        $mailbox->save();
        // dd($mailbox);

            foreach ($data ['receiver_id'] as $item => $value) {
                $data2 = array(
                    'mailbox_id'    =>  $mailbox->id,
                    'receiver_id'   =>  $data['receiver_id'][$item],
                );
                // dd($data2);
                    MailboxTmpReceiver::create($data2);
            }

        // $receiver_ids = $request->receiver_id;
        // foreach ($receiver_ids as $receiver_id) {
        // $mailbox_receiver = new MailboxTmpReceiver();
        // $mailbox_receiver->mailbox_id = $mailbox->id;
        // $mailbox_receiver->receiver_id = $receiver_id;
        // $mailbox_receiver->save();
        // }
        $checker_ids = $request->checker_id;
        foreach ($checker_ids as $checker_id) {
        $mailbox_checker = new MailboxTmpChecker();
        $mailbox_checker->mailbox_id = $mailbox->id;
        $mailbox_checker->checker_id = $checker_id;
        $mailbox_checker->save();
        DB::table("mailbox_tmp_checkers")->where('mailbox_id',  $mailbox->id)->increment('sequence');
        }
        $copy_ids = $request->copy_id;
        foreach ($copy_ids as $copy_id) {
        $mailbox_copy = new MailboxTmpCopy();
        $mailbox_copy->mailbox_id = $mailbox->id;
        $mailbox_copy->copy_id = $copy_id;
        $mailbox_copy->save();
        }

        if ($request->hasfile('filenames')) {
            $files = [];
            foreach ($request->file('filenames') as $file) {
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = round(microtime(true) * 1000).'.'.$extension;
                    $file->move(public_path('attachment'), $filename);
                    $files[] = [
                        'attachment' => $filename,
                        'mailbox_id' => $mailbox->id,
                    ];
                }
            }
            MailboxAttachment::insert($files);
        }else{
            echo'Gagal';
        }        //  $file->storeAs('files', $name);

        return back()->with('success','Memo tersimpan');


    }

    public function attachment(Request $request)
    {
        //        $this->validate($request, [
        //         'filenames' => 'required',
        //         'filenames.*' => 'required'
        // ]);


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function show(Mailbox $mailbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Mailbox $mailbox)
    {
        $holderid = Auth::user()->nip;
        $ownapprover = Position::where('holder_id', $holderid)->first();
        $positions =  DB::table('positions')
                ->join('employees', 'positions.holder_id', '=', 'employees.nip')
                ->select('positions.*', 'employees.nama')
                ->orderBy('hierarchy')
                ->get();
        // dd($positions);
        $title = 'Memo Internal';

        return view('memointernal.edit',compact('positions', 'title', 'ownapprover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mailbox $mailbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mailbox $mailbox)
    {
        //
    }

    public function compose()
    {

        // $mailboxes = Mailbox::all();
        // $positions = Position::orderBy('hierarchy')->get();
        // $employees = Employee::all();
        $holderid = Auth::user()->nip;
        $ownapprover = Position::where('holder_id', $holderid)->first();
        $positions =  DB::table('positions')
                ->join('employees', 'positions.holder_id', '=', 'employees.nip')
                ->select('positions.*', 'employees.nama')
                ->orderBy('hierarchy')
                ->get();
        // dd($positions);
        $title = 'Memo Internal';

        return view('memointernal.compose',compact('positions', 'title', 'ownapprover'));
    }

    private function save($submit, $receiver_ids, $mailbox)
    {

            // We will save two records in tables mailbox_user_folder and mailbox_flags
            // for both the sender and the receivers
            // For the sender perspective the message will be in the "Sent" folder
            // For the receiver perspective the message will be in the "Inbox" folder


            // 1. The sender
            // save folder as "Sent" or "Drafts" depending on button
            // $mailbox_user_folder = new MailboxUserFolder();

            // $mailbox_user_folder->mailbox_id = $mailbox->id;

            // $mailbox_user_folder->user_id = $mailbox->sender_id;

            // if click "Draft" button save into "Drafts" folder
            // if($submit == 2) {
            //     $mailbox_user_folder->folder_id = MailboxFolder::where("title", "Drafts")->first()->id;
            // } else {
            //     $mailbox_user_folder->folder_id = MailboxFolder::where("title", "Sent")->first()->id;
            // }

            // $mailbox_user_folder->save();

            // save flags "is_unread=0"
            // $mailbox_flag = new MailboxFlag();

            // $mailbox_flag->mailbox_id = $mailbox->id;

            // $mailbox_flag->user_id = $mailbox->sender_id;;

            // $mailbox_flag->is_unread = 0;

            // $mailbox_flag->is_important = 0;

            // $mailbox_flag->save();


            // 2. The receivers
            // if there are receivers and sent button clicked then save into flags, folders and receivers
            if($submit == 1) {

                foreach ($receiver_ids as $receiver_id) {

                    // save receiver
                    $mailbox_receiver = new MailboxTmpReceiver();

                    $mailbox_receiver->mailbox_id = $mailbox->id;

                    $mailbox_receiver->receiver_id = $receiver_id;

                    $mailbox_receiver->save();


                    // save folder as "Inbox"
                    // $mailbox_user_folder = new MailboxUserFolder();

                    // $mailbox_user_folder->mailbox_id = $mailbox->id;

                    // $mailbox_user_folder->user_id = $receiver_id;

                    // $mailbox_user_folder->folder_id = MailboxFolder::where("title", "Inbox")->first()->id;

                    // $mailbox_user_folder->save();


                    // save flags "is_unread=1"
                    // $mailbox_flag = new MailboxFlags();

                    // $mailbox_flag->mailbox_id = $mailbox->id;

                    // $mailbox_flag->user_id = $receiver_id;

                    // $mailbox_flag->is_unread = 1;

                    // $mailbox_flag->save();
                }
            } else {

                // save into tmp receivers
                foreach ($receiver_ids as $receiver_id) {

                    // save receiver
                    $mailbox_receiver = new MailboxTmpReceiver();

                    $mailbox_receiver->mailbox_id = $mailbox->id;

                    $mailbox_receiver->receiver_id = $receiver_id;

                    dd($mailbox_receiver);

                    $mailbox_receiver->save();
                }
            }
    }
}

