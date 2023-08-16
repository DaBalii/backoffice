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
                            <label for="item_code">code maison</label>
                            <input type="text" class="form-control @error('item_code') is-invalid @enderror" id="item_code" name="item_code" value="{{ isset($home) ? $home->item_code : '' }}" required>
                            @error('item_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="home_model">nom du model</label>
                            <input type="text" class="form-control" id="model" name="model" value="{{ isset($home) ? $home->model : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="home_localisation">localisation</label>
                            <input type="text" class="form-control" id="localisation" name="localisation" value="{{ isset($home) ? $home->localisation : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for=" home_description">description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ isset($home) ? $home->description : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="home_bathrooms">Salles de bains</label>
                            <input type="text" class="form-control" id="bathrooms" name="bathrooms" value="{{ isset($home) ? $home->bathrooms : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="home_area">Terrasse</label>
                            <input type="text" class="form-control" id="area" name="area" value="{{ isset($home) ? $home->area : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="path">Chemin de l'image</label>
                            <input type="file"  class="form-control" id="path" name="path" value="{{ isset($home) ? $home->path : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="id_category">Catégorie </label>
                            <select name="id_category" id="id_category" class="custom-select">
                                <option value="" selected disabled hidden>-- Choisir Catégorie --</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->name }}" {{ isset($home) ? ($home->id_category == $row->id_category? 'selected' : '') : '' }} >{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ isset($home) ? $home->price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="quartier">quartier</label>
                            <input type="text" class="form-control" id="quartier" name="quartier" value="{{ isset($home) ? $home->quartier : '' }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="valeur1">Longitude</label>
                                <input type="text" class="form-control" id="valeur1" name="valeur1">
                            </div>
                            <div class="col">
                                <label for="valeur2">Latitude</label>
                                <input type="text" class="form-control" id="valeur2" name="valeur2">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quartier">position</label>
                        <input type="text" class="form-control" id="position" name="position" value="{{ isset($home) ? $home->position : '' }}" readonly>
                    </div>

                    <!-- ... Autres éléments de formulaire ... -->

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var valeur1Input = document.getElementById("valeur1");
                            var valeur2Input = document.getElementById("valeur2");
                            var positionInput = document.getElementById("position");

                            valeur1Input.addEventListener("input", updateQuartier);
                            valeur2Input.addEventListener("input", updateQuartier);

                            function updateQuartier() {
                                var valeur1 = valeur1Input.value;
                                var valeur2 = valeur2Input.value;
                                var newValue = "LNG"+ valeur1 + "LAT" + valeur2;

                                if (!newValue.trim() && isset($home) && ($home=>position)) {
                                    newValue = $home => position;
                                }
                                positionInput.value = newValue;
                            }
                        });
                    </script>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
