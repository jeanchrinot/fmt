@extends('admin.layout')
@section('title','Mot des étudiants')

@section('main')

    <main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
        <h5 class="mb-0"><strong>Pages</strong></h5>
        <span class="text-secondary"> Pages <i class="fa fa-angle-right"></i> Mots d'étudiant</span>

        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Datatable-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-2">Mots des étudiants</h6>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-info text-white float-right my-3"
                               href="{{ route('page.item.add',['item'=>'student_words']) }}">Nouveau</a>
                        </div>
                        <div class="col-8" id="alert-area" style="margin-right: auto;margin-left: auto;">
                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-dissmissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {!! \Session::get('success') !!}

                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-center">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Mots</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($students)>0)
                                @foreach($students as $student)
                                    @foreach($student->words as $word)
                                        <tr>
                                            <td class="align-middle">
                                                <img src="{{ getUserImage($student->image) }}" width="50" height="50"
                                                     class=" rounded-circle" alt="Photo de profile">
                                            </td>
                                            <td>{{ $student->surname }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ substr($word->words,0,39) }}{{ strlen($word->words)> 40 ? '...' : '' }}</td>
                                            <td class="align-middle">{{ date_format(date_create($word->created_at),"d/m/Y") }}</td>
                                            <td class="align-middle"><span
                                                    class="badge badge-{{ ($word->featured==1) ? 'success' : 'secondary' }}">{{ ($word->featured==1) ? 'Actif' : 'Passif' }}</span>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <item-details-button item-type="student_words"
                                                                     item-id="{{ $word->id }}"></item-details-button>

                                                <div>
                                                    <a href="{{ route('page.item.edit',['item'=>'student_words','id'=>$word->id]) }}"
                                                       class="action btn btn-success"
                                                       style="margin-left: 4px;color:#fff;"><i class="fa fa-pencil"></i></a>
                                                </div>
                                                <!--<button class="action btn btn-success"><i class="fa fa-pencil"></i></button>-->
                                                <delete-button item-type="student_words"
                                                               item-id="{{ $word->id }}"></delete-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/Datatable-->

            </div>
        </div>
        @include('admin.includes.modals')

    </main>
@endsection
