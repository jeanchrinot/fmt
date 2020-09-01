@extends('admin.layout')
@section('title','Ajouter une actualité')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez ajouter  ici les actualités</strong></h5>
  <span class="text-secondary">Actualités <i class="fa fa-angle-right"></i>Nouvelle</span>

@php
  if(isset($actu)){
  $update = 1;
  $actucategories = $actu->categories->all();

  $actucats = [];
  
  foreach($actucategories as $key=>$actucategory){
    $actucats[$key] = $actucategory->id;
  }
} 
else{
  $update = 0;
}
@endphp

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ ($update==1) ? url('admin/actu/update/'.$actu->id) :  url('admin/actu/store') }}" method="post"  enctype="multipart/form-data">
      {{ csrf_field() }}

      @isset($actu)
        @method('PATCH')
      @endisset

      

      @php 

      if(old('status')){
        $status = old('status');
      }
      elseif(isset($actu->status)){
        $status = $actu->status;
      }
      else{
        $status = '1';
      }

      @endphp 

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
        <div class="col-md-12 mb-2">
          <label for="nom">Titre <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="title" placeholder="Titre" name="title" value="{{ old('title') ?? ($actu->title ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le titre 
          </div>
        </div>
        <div class="col-md-12 mb-2">
          <label for="description-slide-1">Détails <span class="text-danger">*</span></label>
          <textarea rows="5" type="text" class="form-control" name="details" id="details" required>{{ old('details') ?? ($actu->details ?? '') }}</textarea>
          <div class="invalid-feedback">
            Veuillez remplir le détails
          </div>
        </div>
      </div>

      <div class="form-row">
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
        <div class="col-md-6 mb-2">
          <div class="form-group">
          <label for="profession">Image <span class="text-danger">*</span></label>
          <input type="file" class="form-control" id="image" name="image" {{ ($update==1) ? '':'required' }}>
           <div class="invalid-feedback">
            Veuillez choisir une image
          </div>
        </div>
        </div>
      </div>

      <div class="form-row">
       <div class="col-md-4 mb-2">
        <div class="form-group">
          <label>Catégories</label><br>
          <div class="checkbox-group">
            @if(count($categories))
            @foreach($categories as $category)
             <input type="checkbox" id="{{ $category->id }}" name="categories[]" value="{{ $category->id }}" @php if(isset($actu) && in_array($category->id,$actucats)) echo 'checked="checked"'; @endphp>
             <label for="{{ $category->id }}">{{ $category->name }}</label><br>
            @endforeach
            @endif
          </div>
          <div class="invalid-feedback">
            Veuillez choisir au moins une catégorie
          </div>
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