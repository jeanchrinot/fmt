@extends('admin.layout')
@section('title','Liste des membres')

@section('main')


<main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
    <h5 class="mb-0"><strong>Membres</strong></h5>
    <span class="text-secondary">Membres <i class="fa fa-angle-right"></i> Tous les membres</span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <!--Datatable-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-2">Liste des membres</h6>
                    </div>
                    <div class="col-sm-6">
                        @if(Auth::user()->type==2)<a class="btn btn-info text-white float-right my-3" href="{{ route('addMember') }}">Nouveau</a>@endif
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
                                <th>Prenom</th>
                                <th>Fonction</th>
                                <th>Ville</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users))
                            @foreach($users as $user)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ getUserImage($user->image) }}" width="50" height="50"
                                        class=" rounded-circle" alt="Photo de profile">
                                </td>
                                <td class="align-middle">{{ $user->surname }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ getMemberType($user->type) }}</td>
                                <td class="align-middle">{{ province($user->province) }}</td>
                                @if(Auth::user()->type==2)
                                <td class="d-flex justify-content-center">
                                    <item-details-button item-type="users" item-id="{{ $user->id }}">
                                    </item-details-button>

                                    <div><a href="/admin/member/edit/{{ $user->id }}" class="action btn btn-success"
                                            style="margin-left: 4px;color:#fff;"><i class="fa fa-pencil"></i></a></div>
                                    <!--<button class="action btn btn-success"><i class="fa fa-pencil"></i></button>-->
                                    @if($user->id!= Auth::user()->id)<delete-button item-type="users" item-id="{{ $user->id }}"></delete-button>@endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="col-12 d-flex justify-content-end">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
            <!--/Datatable-->

        </div>
    </div>

    @include('admin.includes.modals')

</main>
@endsection