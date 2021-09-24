<?php

namespace App\Http\Controllers\MemoInternal;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Mailbox;
use App\Models\Employee;
use App\Models\Position;
use App\Models\MailboxFlag;
use Illuminate\Http\Request;
use App\Models\MailboxTmpCopy;
use App\Models\MailboxReceiver;
use App\Models\MailboxAttachment;
use App\Models\MailboxTmpChecker;
use App\Models\MailboxTmpReceiver;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToArray;

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
        return view('mailboxes.index',compact('mailboxes','positions','title'));

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
        $data = $request->all();
        $nip = Auth::user()->nip;
        $drafter_id = Position::where('holder_id',$nip)->value('position_id');

        $this->validate($request, [
            'perihal' => 'required',
            'receiver_id' => 'required',
            'approver_id' => 'required',
            'body' => 'required',
            'attachment' => 'file|max:5000',
        ]);

        $mailbox=new Mailbox();
        $mailbox->uuid=session('uuid');
        $mailbox->body=$data['body'];
        $mailbox->perihal=$data['perihal'];
        $mailbox->approver_id=$data['approver_id'];
        $mailbox->drafter_id=$drafter_id;
        $mailbox->save();

        $receiver_ids = $request->receiver_id;
        foreach ($receiver_ids as $receiver_id) {
            $mailboxtmpreceivers = new MailboxTmpReceiver();
            $mailboxtmpreceivers->mailbox_id = $mailbox->id;
            $mailboxtmpreceivers->receiver_id = $receiver_id;
            $mailboxtmpreceivers->mailbox_uuid = session('uuid');
            $mailboxtmpreceivers->save();
        }

        // $checker_ids = $request->checker_id;
        // foreach ($checker_ids as $checker_id) {
        // $mailbox_checker = new MailboxTmpChecker();
        // $mailbox_checker->mailbox_id = $mailbox->id;
        // $mailbox_checker->checker_id = $checker_id;
        // $mailbox_checker->save();
        // DB::table("mailbox_tmp_checkers")->where('mailbox_id',  $mailbox->id)->increment('sequence');
        // }
        // $copy_ids = $request->copy_id;
        // foreach ($copy_ids as $copy_id) {
        // $mailbox_copy = new MailboxTmpCopy();
        // $mailbox_copy->mailbox_id = $mailbox->id;
        // $mailbox_copy->copy_id = $copy_id;
        // $mailbox_copy->save();
        // }

        // if ($request->hasfile('filenames')) {
        //     $files = [];
        //     foreach ($request->file('filenames') as $file) {
        //         if ($file->isValid()) {
        //             $extension = $file->getClientOriginalExtension();
        //             $filename = round(microtime(true) * 1000).'.'.$extension;
        //             $file->move(public_path('attachment'), $filename);
        //             $files[] = [
        //                 'attachment' => $filename,
        //                 'mailbox_id' => $mailbox->id,
        //             ];
        //         }
        //     }
        //     MailboxAttachment::insert($files);
        // }
        // else{
        //     echo'Gagal';
        // }        //  $file->storeAs('files', $name);

        return back()->with('success','Memo tersimpan');


    }
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

    public function compose()
    {

        if(Session::has(['uuid'])){
        Session::forget(['uuid']);
        $uuid = (string)Uuid::uuid4();
        Session::put('uuid', $uuid );
        }
        else
        {
        $uuid = (string)Uuid::uuid4();
        Session::put('uuid', $uuid );
        };

        $holderid = Auth::user()->nip;
        $ownapprover = Position::where('holder_id', $holderid)->first();
        $positions =  DB::table('positions')
                ->join('employees', 'positions.holder_id', '=', 'employees.nip')
                ->select('positions.*', 'employees.nama')
                ->orderBy('hierarchy')
                ->get();
        $title = 'Memo Internal';

        return view('mailboxes.compose',compact('positions', 'title', 'ownapprover'));
    }

}

