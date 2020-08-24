@extends('admin.layout')
@section('title','Modifier contact')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez modifier les contacts ici</strong></h5>
  <span class="text-secondary">Contacts <i class="fa fa-angle-right"></i>{{ $contact->name }}</span>

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ route('contact.update',['id'=>$contact->id]) }}" method="post">
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
        <div class="col-md-4 mb-2">
          <label for="phone">Téléphone <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="phone" placeholder="Téléphone" name="phone" value="{{ old('phone') ?? ($contact->phone ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le téléphone
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="phone2">Téléphone 2 (optionnel)</label>
          <input type="text" class="form-control" id="phone2" placeholder="Téléphone 2" name="phone2" value="{{ old('phone2') ?? ($contact->phone2 ?? '') }}">
          <div class="invalid-feedback">
            Veuillez entrer le téléphone 2
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="phone3">Téléphone 3 (optionnel)</label>
          <input type="text" class="form-control" id="phone3" placeholder="Téléphone 3" name="phone3" value="{{ old('phone3') ?? ($contact->phone3 ?? '') }}">
          <div class="invalid-feedback">
            Veuillez entrer le téléphone 3
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-4 mb-2">
          <label for="fax">Fax (optionnel)</label>
          <input type="text" class="form-control" id="fax" placeholder="Fax" name="fax" value="{{ old('fax') ?? ($contact->fax ?? '') }}">
          <div class="invalid-feedback">
            Veuillez entrer le fax
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="email">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') ?? ($contact->email ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer l'email
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="phone3">Email 2(optionnel)</label>
          <input type="text" class="form-control" id="email2" placeholder="Email 2" name="email2" value="{{ old('email2') ?? ($contact->email2 ?? '') }}">
          <div class="invalid-feedback">
            Veuillez entrer l'email 2
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-4 mb-2">
          <label for="address">Adresse <span class="text-danger">*</span></label>
          <textarea class="form-control" rows="3" name="address" id="address" required>{{ old('address') ?? ($contact->address ?? '') }}</textarea>
          <div class="invalid-feedback">
            Veuillez entrer l'addresse
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