@extends('admin.layout')
@section('title','Ajouter un mot')

@section('main')
    <!--Content right-->
    <main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
        <h5 class="mb-0"><strong>Vous pouvez ajouter des mot d'étudiants</strong></h5>
        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i>Mot d'étudiant</span>

    @php
        if(isset($word)){
          $update = 1;
        }
        else{
          $update = 0;
        }

        if(old('user')){
          $selected_user = old('user');
          $status = old('featured');
        }
        elseif(isset($word->user_id)){
          $selected_user = $word->user_id;
          $status = $word->featured;
        }
        else{
          $selected_user = '0';
          $status = 1;
        }

    @endphp

    <!--modif membre bureau-->
        <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
            <form class=" needs-validation p-2" novalidate id="new-member"
                  action="{{ ($update==1) ? route('page.item.update',['item'=>'student_words','id'=>$word->id]) : route('page.item.store',['item'=>'student_words']) }}"
                  method="post">
                {{ csrf_field() }}

                @if($update==1)
                    @method('PATCH')
                @endif

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif

                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <label for="user">Membre <span class="text-danger">*</span></label>
                        <select class="form-control" id="user" name="user" required>
                            @if($update==0)
                                <option value="">Membre</option>
                                @foreach($users as $key=>$user)
                                    <option
                                        value="{{ $user->id }}" {{ ($selected_user==$user->id) ? 'selected="selected"' : '' }}>{{ $user->surname }} {{ $user->name }}</option>
                                @endforeach
                            @elseif($update==1)
                                <option
                                    value="{{ $users->id }}" {{ ($selected_user==$users->id) ? 'selected="selected"' : '' }}>{{ $users->surname }} {{ $users->name }}</option>
                            @endif

                        </select>
                        <div class="invalid-feedback">
                            Veuillez entrer le nom
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="words">Mot d'étudiant <span class="text-danger">*</span></label>
                        <textarea rows="5" type="text" class="form-control" name="words" id="words"
                                  required>{{ old('words') ?? ($word->words ?? '') }}</textarea>
                        <div class="invalid-feedback">
                            Veuillez entrer le mot d'étudiant
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="featured">Affiché ? <span class="text-danger">*</span></label>
                        <select class="form-control" id="featured" name="featured" required>
                            <option value="1" {{ ($status==1) ? 'selected="selected"' : '' }}>Oui</option>
                            <option value="0" {{ ($status==0) ? 'selected="selected"' : '' }}>Non</option>
                        </select>
                        <div class="invalid-feedback">
                            Veuillez choisir le statut
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <button class="btn btn-primary my-2" type="submit">Enregistrer</button>
                </div>
            </form>
        </div><!--End modif student word-->

    </main>
    <!--Main-->
@endsection
