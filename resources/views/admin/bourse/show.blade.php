@extends('admin.layout')
@section('title', $bourseInfo->title)

@section('styles')
    <style>
        tr,
        td {
            padding: 3px 5px !important;
        }

    </style>
@endsection

@section('main')


    <main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
        <h5 class="mb-0"><strong>Information De la bourse</strong></h5>
        <span class="text-secondary">Information De la bourse <i class="fa fa-angle-right"></i> Detail</span>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-transparent d-flex justify-content-between">
                        <h5 class="text-capitalize mt-2">{{ $bourseInfo->title }}</h5>
                        <div class="text-center">
                            <a href="{{ route('page.bourseInfo', $bourseInfo->slug) }}"
                                class="action btn btn-info text-white"
                                target="_blank">
                                <i class="fa fa-external-link"></i>
                            </a>
                            <a href="{{ route('bourse-informations.edit', $bourseInfo->id) }}"
                                class="action btn btn-success text-white">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-md-8">
                                <div>
                                    <h6 class="font-weight-bold">Petite Explication</h6>
                                    <div>
                                        {{ $bourseInfo->truncate }}
                                    </div>
                                </div>

                                <hr>

                                <div>
                                    <h6 class="font-weight-bold">Texte</h6>
                                    <div>
                                        {!! $bourseInfo->text !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <h6 class="mb-3 font-weight-bold">Configuration</h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Date d'ajout</p>
                                        </div>
                                        <div class="col-6">
                                            <p>@format_date($bourseInfo->created_at)</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <p>Status</p>
                                        </div>
                                        <div class="col-6">
                                            @if ($bourseInfo->status == 1)
                                                <span class="badge badge-success">Actif</span>
                                            @else
                                                <span class="badge badge-danger">Inactif</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <p>Ajoute par</p>
                                        </div>
                                        <div class="col">
                                            <p>{{ $bourseInfo->user->full_name }}</p>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="my-1 text-center">
                                    <img src="{{ getImage($bourseInfo->image) }}" class="img img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>

    </main>
@endsection
