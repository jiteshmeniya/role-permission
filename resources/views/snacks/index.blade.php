@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Snack
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('snacks.create') }}">New snack</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $snack)
                            <tr>
                                <td>{{ $snack->id }}</td>
                                <td>{{ $snack->snack_name }}</td>
                                <td>{{ $snack->price }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('snacks.show',$snack->uuid) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('snacks.edit',$snack->uuid) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['snacks.destroy', $snack->uuid],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
