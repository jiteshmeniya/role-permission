@extends('layouts.app')
@push('script')
<script type="text/javascript">
    $('select').on('change', function() {
        $("select option:selected").each(function () {
                $('#price').val($(this).attr('data-price'));
        });

    });
</script>
@endpush
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Create post
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('posts.index') }}">Posts</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'snacks.store', 'method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Snack</strong>
                        <select class=" form-control" data-placeholder="category" style="width: 100%;" name="snack_id" id="snack">
                                <option selected disabled>Please select snack</option>
                            @foreach ($data as $snack )
                                <option {{ $snack->id == old('snack_id') ? 'selected' : '' }} data-price={{ $snack->price }} value="{{ $snack->id }}" >{{ $snack->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Price</strong>
                        <input type="text" id="price" name="price">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
