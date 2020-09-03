@extends('admin.layout')
@section('title','Modifier Média Social')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez modifier les lien social media ici</strong></h5>
  <span class="text-secondary">Social Média</span>

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ route('social.update') }}" method="post">
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
        <div class="col-md-6 mb-2">
          <label for="phone">Facebook <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="facebook" placeholder="Facebook" name="facebook" value="{{ old('facebook') ?? ($socials->facebook ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le lien Facebook
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <label for="twitter">Twitter</label>
          <input type="text" class="form-control" id="twitter" placeholder="Twitter" name="twitter" value="{{ old('twitter') ?? ($socials->twitter ?? '') }}">
          <div class="invalid-feedback">
            Veuillez entrer le lien Twitter
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <label for="instagram">Instagram</label>
          <input type="text" class="form-control" id="instagram" placeholder="Instagram" name="instagram" value="{{ old('instagram') ?? ($socials->instagram ?? '') }}">
          <div class="invalid-feedback">
            Veuillez entrer le lien Instagram
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <label for="youtube">Youtube</label>
          <input type="text" class="form-control" id="youtube" placeholder="Youtube" name="youtube" value="{{ old('youtube') ?? ($socials->youtube ?? '') }}">
          <div class="invalid-feedback">
            Veuillez entrer le line Youtube
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