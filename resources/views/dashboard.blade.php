@extends('layouts.app')

@section('title', ' Syteme de Gestion Imobiliers')

@section('contents')
    <div class="row">
        <div class="col-md-10">
            <h1 class="mb-2"></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="dep.jpeg" class="card-img-top" alt="Maison 1">
                <div class="card-body">
                    <h5 class="card-title">ATAKORA Immobiliers</h5>
                    <p class="card-text">Agence  en cours d'emmergeance magnifique maison de prestation  disponible en version web & mobile.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="tg.jpeg" class="card-img-top" alt="Maison 2">
                <div class="card-body">
                    <h5 class="card-title">maps</h5>
                    <p class="card-text"> Agence assise au Togo à Lomé.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="R.jpeg" class="card-img-top" alt="Maison 3">
                <div class="card-body">
                    <h5 class="card-title">Nos prestations en temps réel</h5>
                </div>
            </div>
        </div>
    </div>


@endsection
