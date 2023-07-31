@extends('layouts.app')

@section('title', 'Nos utilisateurs')

@section('contents')
    <form action="{{ isset($admin) ? route('admin.update', $admin->id) : route('admin.save') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($admin) ? 'Form Edit admin' : 'Form plus admin' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="admin_name">name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($admin) ? $admin->name : '' }}">
                        </div>


                        <div class="form-group">
                            <label for="admin_prenom">prenom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ isset($admin) ? $admin->prenom : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="admin_email">email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ isset($admin) ? $admin->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for=" admin_tel">Tel</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="{{ isset($admin) ? $admin->tel : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="admin_password">password</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ isset($admin) ? $admin->password : '' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
