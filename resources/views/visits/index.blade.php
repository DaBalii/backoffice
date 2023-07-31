@extends('layouts.app')

@section('title', 'nos visites')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Visites programmer</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>address </th>
                        <th>email </th>
                        <th>localisation </th>
                        <th>periode </th>
                        <th>tel </th>
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
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->localisation }}</td>
                            <td>{{ $row->periode }}</td>
                            <td>{{ $row->tel }}</td>

                            @if (auth()->user()->level == 'Admin')
                                <td>
                                    <a href="{{ route('visits.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('visits.delete', $row->id) }}" class="btn btn-danger">Delete</a>
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
