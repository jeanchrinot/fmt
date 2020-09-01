@extends('admin.layout')
@section('title','Ajouter une catégorie d\'actualité')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez ajouter  ici des catégories</strong></h5>
  <span class="text-secondary">Actualités <i class="fa fa-angle-right"></i>Catégories</span>

@php
  if(isset($category)){
  $update = 1;
} 
else{
  $update = 0;
}
@endphp

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ ($update==1) ? url('admin/actucategory/update/'.$category->id) :  url('admin/actucategory/store') }}" method="post">
      {{ csrf_field() }}

      @isset($category)
        @method('PATCH')
      @endisset

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
          <label for="nom">Nom de la catégorie <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="nom" placeholder="Ex: covid-19" name="name" value="{{ old('name') ?? ($category->name ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le nom 
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