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
            <div class="card-header">Posts
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('rates.create') }}">New rate</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Relasi</th>
                            <th>Jarak</th>
                            <th>Tarif</th>
                            <th>Class</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rates as $key => $rate)
                            <tr>
                                <td>{{ $rate->id }}</td>
                                <td>{{ $rate->rate_name }}</td>
                                <td>{{ $rate->destination }}</td>
                                <td>{{ $rate->distance }}</td>
                                <td>{{ $rate->rate }}</td>
                                <td>{{ $rate->class }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('rates.show',$rate->id) }}">Show</a>
                                    @can('rate-edit')
                                        <a class="btn btn-primary" href="{{ route('rates.edit',$rate->id) }}">Edit</a>
                                    @endcan
                                    @can('rate-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['rates.destroy', $rate->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
