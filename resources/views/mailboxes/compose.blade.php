<?php
    $result = array();
    foreach($positions as $position){
    $result[$position->parent_name][] = $position;
    }
?>

@extends('layouts.appmailbox')
@section('content')
    <div id="cetak" class="card-body">
            <button type="submit" form="mycompose" class="btn btn-primary">Simpan</button>
            <a href="" class="btn btn-primary">Kirim</a>
            <a href="view.html" class="btn btn-primary">Pratinjau</a>
            <a href="index.html" class="btn btn-primary">Tutup</a>
    </div>

    <main>
        <form id="mycompose" action="{{ route('mailboxes.store') }}" method="POST">
            <div class="card m-3 p-2 card-composer">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kepada</label>
                        <div class="col-sm-10">
                            <div class="select-2">
                                <?php $selected_receivers = old('receiver_id') ?>
                                <select class="select2 small" data-placeholder="Kepada" multiple="multiple" style="width: 100%;" name="receiver_id[]">
                                    @foreach ( $result as $key=>$val )
                                        <optgroup label="{{ $key }}">
                                            @foreach ($val as $option )
                                                <option value="{{ $option->position_id }}" {{ $selected_receivers!=null && in_array($option->position_id, $selected_receivers)?"selected":"" }}>{{ $option->name }} | {{ $option->nama }} </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                    @error('receiver_id')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tembusan</label>
                        <div class="col-sm-10">
                            <div class="select2-purple">
                                <?php $selected_copiers = old('copy_id') ?>
                                <select class="select2 small" multiple="multiple" data-placeholder="Tembusan" style="width: 100%;" name="copy_id[]">
                                    @foreach ( $result as $key=>$val )
                                        <optgroup label="{{ $key }}">
                                            @foreach ($val as $option )
                                                {{-- <option value="{{ $option->position_id }}" >{{ $option->name }} | {{ $option->holder_id }}</option> --}}
                                                <option value="{{ $option->position_id }}" {{ $selected_copiers!=null && in_array($option->position_id, $selected_copiers)?"selected":"" }}>{{ $option->name }} | {{ $option->nama }}</option>

                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penandatangan</label>
                        <div class="col-sm-10">
                            <div class="select2-purple">
                                <?php $selected_approvers = old('approver_id') ?>
                                <select class="select2-single small"  data-placeholder="Penandatangan" style="width: 100%;" name="approver_id" id="approver_id">
                                    <option></option>
                                        {{-- <option selected disabled>penandatangan</option> --}}
                                    @foreach ( $result as $key=>$val )
                                        <optgroup label="{{ $key }}">
                                            @foreach ($val as $option )
                                                {{-- <option style="display:none" value=""> -- penandatangan -- </option> --}}
                                                <option value=" {{ $option->position_id }}" >{{ $option->name }} | {{ $option->nama }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                                {{-- <input type="button" value="CHANGE" onclick="ownApprover()" /> --}}
                                </select>
                                    @error('approver_id')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group form-group-sm row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pemeriksa</label>
                        <div class="col-sm-10">
                            <div class="select2-purple">
                                <?php $selected_checkers = old('checker_id') ?>
                                <select class="select2 small" multiple="multiple" data-placeholder="Pemeriksa" style="width: 100%;" name="checker_id[]">
                                    @foreach ( $result as $key=>$val )
                                        <optgroup label="{{ $key }}">
                                            @foreach ($val as $option )
                                                {{-- <option value="{{ $option->position_id }}" >{{ $option->name }} | {{ $option->holder_id }}</option> --}}
                                                <option value="{{ $option->position_id }}" {{ $selected_checkers!=null && in_array($option->position_id, $selected_checkers)?"selected":"" }}>{{ $option->name }} | {{ $option->nama }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control" name="perihal" placeholder="Perihal" value="{{ old("perihal")!=null?old("perihal"):"" }}">
                                    @error('perihal')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                        </div>
                    </div>
                    <div class="form-group row pl-3">
                        <textarea class="editor mb-3" name="body" value="{{ old('body') }}"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </main>

@endsection

@push('styles-before')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css"> <!-- for live demo page -->
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.css') }}">
@endpush

@push('scripts-after')
		<script src="{{ asset('js/ckeditor.js') }}"></script>
		<script>ClassicEditor
				.create( document.querySelector( '.editor' ), {

				toolbar: {
					items: [
						'undo',
						'redo',
                        '|',
						'bold',
						'italic',
						'underline',
                        '|',
						'fontSize',
						'fontFamily',
						'fontColor',
						'fontBackgroundColor',
                        '|',
						'alignment',
						'bulletedList',
						'numberedList',
						'outdent',
						'indent',
                        '|',
						'insertTable',
						'findAndReplace',
						'strikethrough',
						'subscript',
						'superscript',
						'removeFormat',
						'specialCharacters',
						'link',
						'|',
						'imageUpload',
						'imageInsert',
						'blockQuote',
						'mediaEmbed',
						'pageBreak',
						'restrictedEditingException',
						'heading',

                    ]
				},
				language: 'id',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:inline',
						'imageStyle:block',
						'imageStyle:side'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells',
						'tableCellProperties',
						'tableProperties'
					]
				},
					licenseKey: '',



				} )
				.then( editor => {
					window.editor = editor;




				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: uodsyzsxqiez-vcw6tlngbh40' );
					console.error( error );
				} );
		</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha256-7dA7lq5P94hkBsWdff7qobYkp9ope/L5LQy2t/ljPLo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>
<script src="{{ asset('js/select2.js') }}"></script>
        <script>
            $("select").select2();

            $("select").on("select2:select", function (evt) {
            var element = evt.params.data.element;
            var $element = $(element);

            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
            });
        </script>
@endpush
