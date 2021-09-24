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
                        <a class="btn btn-primary" href="{{ route('trainroutes.create') }}">New trainroute</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainroutes as $key => $trainroute)
                            <tr>
                                <td>{{ $trainroute->id }}</td>
                                <td>{{ $trainroute->departures->station_name }}</td>
                                <td>{{ $trainroute->arrivals->station_name }}</td>
                                <td>{{ $trainroute->vias->station_name }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('trainroutes.show',$trainroute->id) }}">Show</a>
                                    @can('trainroute-edit')
                                        <a class="btn btn-primary" href="{{ route('trainroutes.edit',$trainroute->id) }}">Edit</a>
                                    @endcan
                                    @can('trainroute-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['trainroutes.destroy', $trainroute->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $trainroutes->appends($_GET)->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
