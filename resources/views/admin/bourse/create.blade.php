@extends('admin.layout')
@section('title', 'Nouveau Information de la bourse')

@section('main')
    <!--Content right-->
    <main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
        <h5 class="mb-0"><strong>Vous pouvez ajouter ici les nouveaux information concernant la bourse</strong>
        </h5>
        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i>Nouveau ınformation de la bourse</span>

        <!--modif membre bureau-->
        <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
            <form class=" needs-validation p-2" novalidate action="{{ route('bourse-informations.store') }}" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf
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

                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="title">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title"
                            value="{{ old('title') }}" required>
                        <div class="invalid-feedback">
                            Veuillez entrer le title
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="truncate">Petite Description <span class="text-danger">*</span></label>
                        <textarea name="truncate" id="truncate" class="form-control" required>{{ old('truncate') }}</textarea>
                        <div class="invalid-feedback">
                            Veuillez entrer la petite description
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="image">Image <span class="text-danger">*</span></label>
                       <input type="file" name="image" id="image" required class="form-control image">
                        <div class="invalid-feedback">
                           Image ne peut etre pas vide.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="text">Text <span class="text-danger">*</span></label>
                        <textarea name="text" class="form-control tiny" required rows="10">{{ old('text') }}</textarea>
                        <div class="invalid-feedback">
                            Veuillez le texte
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary my-2" type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
        <!--End modif student word-->

    </main>
    <!--Main-->
@endsection

@include("components.plugin.tinymce")
