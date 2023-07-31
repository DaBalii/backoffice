@extends('layouts.app')

@section('title', 'Données utilisateurs')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Comptes utilisateurs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>name </th>
                        <th>prenom </th>
                        <th>email </th>
                        <th>tel </th>
                        <th>password </th>
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
                            <td>{{ $row->prenom }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->tel }}</td>
                            <td>{{ $row->password }}</td>

                            @if (auth()->user()->level == 'Admin')
                                <td>
                                    <a href="{{ route('admin.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('admin.delete', $row->id) }}" class="btn btn-danger">Delete</a>
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
