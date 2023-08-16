@extends('layouts.app')

@section('title', 'Reservation en cours')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Donnée de reservation</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>name </th>
                        <th>address </th>
                        <th>num_tel </th>
                        <th>date_arr </th>
                        <th>duration </th>

                        @if (auth()->user()->level == 'Admin')
                            <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->num_tel }}</td>
                            <td>{{ $row->date_arr }}</td>
                            <td>{{ $row->duration }}</td>
                            @if (auth()->user()->level == 'Admin')
                                <td>
                                    <a href="{{ route('reserve.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('reserve.delete', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
