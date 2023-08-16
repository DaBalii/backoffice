@extends('layouts.app')

@section('title', 'Syteme de Gestion Immobiliers')

@section('contents')
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-2"></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <style>
                        .narrow-table {
                            max-width: 900px;
                            margin: auto;
                        }
                        .narrow-table td {
                            width: 300%;
                            padding: 15px;
                            text-align: left;
                        }
                    </style>

                    <table class="table table-bordered narrow-table">
                        <thead>
                        <tr align="center">
                            <th colspan="2"><h3>Statistiques</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h5><i class="fa fa-list"></i> Nombre de Catégories</h5>
                            </td>
                            <td>{{ $categoryCount }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered narrow-table">
                        <thead>
                        <tr align="center">
                            <th colspan="2"><h3>Statistiques</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h5><i class="fa fa-list"></i> Nombre de Catégories</h5>
                            </td>
                            <td>{{ $categoryCount }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered narrow-table">
                        <thead>
                        <tr align="center">
                            <th colspan="2"><h3>Statistiques</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h5><i class="fa fa-users"></i> Nombre d'utilisateurs </h5>
                            </td>
                            <td>{{ $AdminCount }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered narrow-table">
                        <thead>
                        <tr align="center">
                            <th colspan="2"><h3>Statistiques</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h5><i class="fa fa-home"></i> Nombre de publications </h5>
                            </td>
                            <td>{{ $HomeCount }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered narrow-table">
                        <thead>
                        <tr align="center">
                            <th colspan="2"><h3>Statistiques</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h5><i class="fa fa-calendar"></i> Nombre de Reservation </h5>
                            </td>
                            <td>{{ $ReserCount }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered narrow-table">
                        <thead>
                        <tr align="center">
                            <th colspan="2"><h3>Statistiques</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h5><i class="fa fa-eye"></i> Nombre de Visites </h5>
                            </td>
                            <td>{{ $VisiterCount }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- Ajoutez ici votre deuxième tableau -->
                </div>
            </div>
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
        <!-- Le reste de votre contenu pour les cartes -->
    </div>
@endsection
