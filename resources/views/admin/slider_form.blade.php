@extends('admin.layout')
@section('title','Ajouter des sliders')

@section('main')
<main class="col-sm-9 col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez modifiez ici les pages</strong></h5>
  <span class="text-secondary">Pages <i class="fa fa-angle-right"></i> Edit slider</span>

  <!--<div class="row">
    <div class="col-12 mb-3">
      <button class="btn btn-info float-right" id="addSliderField">Ajouter un nouveau champ</button>
    </div>
  </div>-->

@php
  if(isset($slider)){
  $update = 1;
} 
else{
  $update = 0;
}

if(old('featured')){
  $featured = old('featured');
}
elseif(isset($slider->featured)){
  $featured = $slider->featured;
}
else{
  $featured = '1';
}

@endphp

  <div class="box-modif-slider mt-3 mb-4 p-3 button-container bg-white border shadow-sm">

    <form class="needs-validation" novalidate id="form-slide" action="{{ ($update==1) ? route('page.item.update',['item'=>'slider','id'=>$slider->id]) : route('page.item.store',['item'=>'slider']) }}" method="post" enctype="multipart/form-data">
      @csrf

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

      <div class="form-row" id="last-slide">
        <div class="col-sm-6">
          <h4 class="text-muted text-capitalize">Ajouter ou modifier un slide</h4>
        </div>
        <div class="col-sm-6">
          <button class="btn btn-secondary float-right" type="submit">Enregistrer</button>
        </div>
      </div>
      <div class="form-row">
        <div class="col-sm-6 col-md-4">
          <label for="label-slide-1">Label de l'image</label>
          <input type="text" class="form-control" name="name" id="label-slide-1" value="{{ old('name') ?? ($slider->name ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer un label d'image
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <label for="image-slide-1">Image:</label>
          <input type="file" class="form-control" name="image" id="image-slide-1" {{ ($update==1) ? '' : 'required' }}>
          <div class="invalid-feedback">
            Veuillez choisir un image
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-sm-6 col-md-4">
          <label for="image-slide-1">Statut:</label>
          <select class="form-control" id="featured" name="featured" required>
            <option value="1" {{ ($featured=='1') ? 'selected="selected"' : '' }}>Actif</option>
            <option value="0" {{ ($featured=='0') ? 'selected="selected"' : '' }}>Passif</option>
          </select>
          <div class="invalid-feedback">
            Veuillez choisir un statut
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <label for="description-slide-1">Description du slide</label>
          <textarea type="text" class="form-control" name="details" id="description-slide-1">{{ old('details') ?? ($slider->details ?? '') }}</textarea>
          <div class="invalid-feedback">
            Veuillez entrer une description
          </div>
        </div>
      </div>

     <!-- <div class="form-row">
        <div class="col-sm-6 col-md-4">
          <label for="label-slide-2">Label du slide 2</label>
          <input type="text" class="form-control" name="label-slide-2" id="label-slide-2" required>
          <div class="invalid-feedback">
            Veuillez choisir le label d'image 2
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <label for="image-slide-2">Image 2:</label>
          <input type="file" class="form-control" name="image-slide-2" id="image-slide-2" required>
          <div class="invalid-feedback">
            Veuillez choisir l'image
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <label for="description-slide-2" class="">Description du slide 2</label>
          <textarea type="text" class="form-control" name="description-slide-2" id="description-slide-2" required></textarea>
          <div class="invalid-feedback">
            Veuillez choisir la description d'image 2
          </div>
        </div>  
      </div>

      <div class="form-row">
        <div class="col-sm-6 col-md-4">
          <label for="label-slide-3">Label du slide 3</label>
          <input type="text" class="form-control" name="label-slide-3" id="label-slide-3" required>
          <div class="invalid-feedback">
            Veuillez choisir le label d'image 3
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <label for="image-slide-3">Image 3:</label>
          <input type="file" class="form-control" name="image-slide-3" id="image-slide-3" required>
          <div class="invalid-feedback">
            Veuillez choisir l'image
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <label for="description-slide-3" class="">Description du slide 3</label>
          <textarea type="text" class="form-control" name="description-slide-3" id="description-slide-3" required></textarea>
          <div class="invalid-feedback">
            Veuillez choisir la description d'image 3
          </div>
        </div>  
      </div>->
    </form>

  </div><!--end-box-modif-slider-->
</main>
<!--Main-->
@endsection