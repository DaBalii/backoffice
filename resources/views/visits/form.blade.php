@extends('layouts.app')

@section('title', 'Form visitation')

@section('contents')
    <form action="{{ isset($visits) ? route('visits.update', $visits->id) : route('$visits.save') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($visits) ? 'Form Edit visitation' : 'Form plus visitation' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="visit_address">address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ isset($visits) ? $visits->address : '' }}">
                        </div>


                        <div class="form-group">
                            <label for="visit_email">email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ isset($visits) ? $visits->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="visit_localisation">localisation</label>
                            <input type="text" class="form-control" id="localisation" name="localisation" value="{{ isset($visits) ? $visits->localisation : '' }}">
                        </div>
                        <div class="form-group">
                            <label for=" visit_periode">periode</label>
                            <input type="text" class="form-control" id="periode" name="periode" value="{{ isset($visits) ? $visits->periode : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="visit_tel">tel</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="{{ isset($visits) ? $visits->tel : '' }}">
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
