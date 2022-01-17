@extends('admin.layout')
@section('title','Modifier A propos')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Modifier A propos</strong></h5>
  <span class="text-secondary">Pages <i class="fa fa-angle-right"></i>A propos</span>

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ route('page.item.update',['item'=>'about','id'=>$about->id]) }}" method="post"  enctype="multipart/form-data">
      {{ csrf_field() }}

        @method('PATCH')

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
        <div class="col-md-6 col-md-12">
          <label for="description-slide-1">A propos</label>
          <textarea rows="5" type="text" class="form-control" name="about" id="about" required>{{ old('about') ?? ($about->about ?? '') }}</textarea>
          <div class="invalid-feedback">
            Veuillez remplir l'a propos
          </div>
        </div>
        <div class="col-md-6 col-md-12">
          <label for="description-slide-1">Mot du président</label>
          <textarea rows="5" type="text" class="form-control" name="words_of_president" id="words_of_president" required>{{ old('words_of_president') ?? ($about->words_of_president ?? '') }}</textarea>
          <div class="invalid-feedback">
            Veuillez remplir le mot du président
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 col-md-12">
          <label for="description-slide-1">Mission</label>
          <textarea rows="5" type="text" class="form-control" name="mission" id="mission">{{ old('mission') ?? ($about->mission ?? '') }}</textarea>
          <div class="invalid-feedback">
            Veuillez remplir la mission
          </div>
        </div>
        <div class="col-md-6 col-md-12">
          <label for="description-slide-1">Vision</label>
          <textarea rows="5" type="text" class="form-control" name="vision" id="vision">{{ old('vision') ?? ($about->vision ?? '') }}</textarea>
          <div class="invalid-feedback">
            Veuillez remplir la vision
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 col-md-12">
          <label for="description-slide-1">Image 1</label>
          <input type="file" class="form-control" name="image" id="image1">
          <div class="invalid-feedback">
            Veuillez choisir une image
          </div>
        </div>
        <div class="col-md-6 col-md-12">
          <label for="description-slide-1">Image 2</label>
          <input type="file" class="form-control" name="image2" id="image2">
          <div class="invalid-feedback">
            Veuillez choisir une image
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