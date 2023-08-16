@extends('layouts.app')

@section('title', 'nos publications')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Operations </h6>
        </div>
        <div class="card-body">
            @if (auth()->user()->level == 'Admin')
                <a href="{{ route('homes.add') }}" class="btn btn-primary mb-3">Publié une maison</a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>code </th>
                        <th>localisation </th>
                        <th>description </th>
                        <th>Salles de bains </th>
                        <th>Surface </th>
                        <th>model </th>
                        <th>Chemin de l'image </th>
                        <th>Catégorie</th>
                        <th>Quartier</th>
                        <th>Prix</th>
                        <th>Position</th>
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
                            <td>{{ $row->item_code }}</td>
                            <td>{{ $row->localisation }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->bathrooms }}</td>
                            <td>{{ $row->area }}</td>
                            <td>{{ $row->model }}</td>
                            <td>{{ $row->path }}</td>
                            <td>{{ $row->category }}</td>
                            <td>{{ $row->quartier }}</td>
                            <td>{{ $row->price }}</td>
                            <td>{{ $row->position }}</td>
                            @if (auth()->user()->level == 'Admin')
                                <td>
                                    <a href="{{ route('homes.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('homes.delete', $row->id) }}" class="btn btn-danger">Delete</a>
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
