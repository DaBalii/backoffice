@extends('layouts.app')

@section('title', 'les publications')

@section('contents')
    <form action="{{ isset($home) ? route('homes.update', $home->id) : route('homes.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($home) ? 'Form Edit home' : 'Form plus home' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="item_code">code home</label>
                            <input type="text" class="form-control @error('item_code') is-invalid @enderror" id="item_code" name="item_code" value="{{ isset($home) ? $home->item_code : '' }}">
                            @error('item_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="home_model">name model</label>
                            <input type="text" class="form-control" id="model" name="model" value="{{ isset($home) ? $home->model : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="home_localisation">localisation</label>
                            <input type="text" class="form-control" id="localisation" name="localisation" value="{{ isset($home) ? $home->localisation : '' }}">
                        </div>
                        <div class="form-group">
                            <label for=" home_description">description</label>
                            <input type="text"  id="description" name="description" value="{{ isset($home) ? $home->description : '' }}">

                        </div>
                        <div class="form-group">
                            <label for="home_bathrooms">bathrooms</label>
                            <input type="text" class="form-control" id="bathrooms" name="bathrooms" value="{{ isset($home) ? $home->bathrooms : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="home_area">Area</label>
                            <input type="text" class="form-control" id="area" name="area" value="{{ isset($home) ? $home->area : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="path">path</label>
                            <input type="file"  class="form-control" id="path" name="path" value="{{ isset($home) ? $home->path : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="id_category">Category </label>
                            <select name="id_category" id="id_category" class="custom-select">
                                <option value="" selected disabled hidden>-- Choose Category --</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->name }}" {{ isset($home) ? ($home->id_category == $row->id_category? 'selected' : '') : '' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">price home</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ isset($home) ? $home->price : '' }}">
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
