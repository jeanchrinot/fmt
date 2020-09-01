@extends('admin.layout')
@section('title','Ajouter une activité')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez ajouter  ici les activités</strong></h5>
  <span class="text-secondary">Actualités <i class="fa fa-angle-right"></i>Ajouter</span>

@php
  if(isset($activity)){
  $update = 1;
} 
else{
  $update = 0;
}
@endphp

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ ($update==1) ? url('admin/activity/update/'.$activity->id) :  url('admin/activity/store') }}" method="post"  enctype="multipart/form-data">
      {{ csrf_field() }}

      @isset($activity)
        @method('PATCH')
      @endisset

      

      @php 

      if(old('status')){
        $status = old('status');
      }
      elseif(isset($activity->status)){
        $status = $activity->status;
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
        <div class="col-md-6 mb-2">
          <label for="nom">Titre <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="name" placeholder="Titre" name="name" value="{{ old('name') ?? ($activity->name ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le titre 
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <label for="activity_date">Date de l'activité <span class="text-danger">*</span></label>
          <div class="input-group">   
            <input type="datetime-local" class="form-control" id="activity_date" aria-describedby="inputGroupPrepend" name="activity_date" value="{{ old('activity_date') ?? (formatDateTimeLocal($activity->activity_date ?? '') ?? '')  }}" required>
            <div class="invalid-feedback">
              Entrez la date de l'activité
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-2">
          <label for="description-slide-1">Détails <span class="text-danger">*</span></label>
          <textarea rows="5" type="text" class="form-control" name="details" id="details" required>{{ old('details') ?? ($activity->details ?? '') }}</textarea>
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