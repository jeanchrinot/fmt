@extends('admin.layout')
@section('title', 'Liste des information de la bourse')
@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('main')


    <main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
        <h5 class="mb-0"><strong>Information de la bourse</strong></h5>
        <span class="text-secondary">information de la bourse <i class="fa fa-angle-right"></i>List</span>

        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Datatable-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-2">Liste des information de la bourse</h6>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-info text-white float-right my-3"
                                href="{{ route('bourse-informations.create') }}">Nouveau</a>
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
                        <table class="table datatable table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Petite Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($bourseInfos))
                                    @foreach ($bourseInfos as $bourseInfo)
                                        <tr id="row_{{ $bourseInfo->id }}">
                                            <td class="align-middle">
                                                @if ($bourseInfo->status == 0)
                                                    <span class="badge badge-danger">Passif</span>
                                                @else
                                                    <span class="badge badge-success">Aktif</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <img src="{{ getImage($bourseInfo->image) }}" width="50" height="50"
                                                    class=" rounded-circle" alt="Photo">
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{route('page.bourseInfo',$bourseInfo->slug)}}" class="text-info text-capitalize" target="_blank">
                                                    {{ $bourseInfo->title }}
                                                </a>
                                            </td>
                                            <td class="align-middle">{{ $bourseInfo->truncate }}</td>

                                            <td class="d-flex align-middle justify-content-center">
                                                <div>
                                                    <a href="{{ route('bourse-informations.show', $bourseInfo->slug) }}"
                                                        class="action mx-1 text-white btn btn-theme">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>

                                                <div>
                                                    <a href="{{ route('bourse-informations.edit', $bourseInfo->id) }}"
                                                        class="action mx-1 btn  btn-success text-white"><i
                                                            class="fa fa-pencil"></i>
                                                    </a>
                                                </div>
                                                <!--<button class="action btn btn-success"><i class="fa fa-pencil"></i></button>-->
                                                <button class="delete-item-btn mx-1 btn btn-danger"
                                                    data-url="{{ route('bourse-informations.destroy', $bourseInfo->id) }}"
                                                    data-id="{{ $bourseInfo->id }}" data-toggle="modal">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/Datatable-->

            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
