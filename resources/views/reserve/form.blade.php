@extends('layouts.app')

@section('title', 'Resevation en cours')

@section('contents')
    <form action="{{ isset($reserve) ? route('reserve.update', $reserve->id) : route('reserve.save') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($reserve) ? 'Form Edit reservation' : 'Form plus reservation' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="admin_name">name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($reserve) ? $reserve->name : '' }}">
                        </div>


                        <div class="form-group">
                            <label for="reservation_address">address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ isset($reserve) ? $reserve->address : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="reservation_num_tel">num_tel</label>
                            <input type="text" class="form-control" id="num_tel" name="num_tel" value="{{ isset($reserve) ? $reserve->num_tel : '' }}">
                        </div>
                        <div class="form-group">
                            <label for=" reservation_date_arr">date_arr</label>
                            <input type="text" class="form-control" id="date_arr" name="date_arr" value="{{ isset($reserve) ? $reserve->date_arr : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="reservation_duration">duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ isset($reserve) ? $reserve->duration : '' }}">
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
