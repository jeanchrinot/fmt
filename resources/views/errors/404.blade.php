
@extends('layouts.app')
@section('title','Page not found')
@section('main')

    <section style="min-height: 75vh">
        <div class="my-5 container">
            <h1>Page introuvable (#erreur 404)</h1>
            <div class="col-sm-offset-4 col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title text-danger">Il y a un problème !</h3>
                    </div>
                    <div class="panel-body">
                        <p>Nous sommes désolés mais la page que vous désirez n'existe pas...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
