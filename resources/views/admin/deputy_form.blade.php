@extends('admin.layout')
@section('title','Ajouter un nouveau député')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez ajouter  ici les nouveaux députés</strong></h5>
  <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i>Nouveau député</span>

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ url('admin/deputy/store') }}" method="post">
      {{ csrf_field() }}

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
          <label for="ville">Membre <span class="text-danger">*</span></label>
          <select class="form-control" id="ville" name="user" required>
            <option value="">Membre</option>
            @if(count($users))
            @foreach($users as $key=>$user)
              <option value="{{ $user->id }}" {{ (old('user')==$user->id) ? 'selected="selected"' : '' }}>{{ $user->surname }} {{ $user->name }}</option>
            @endforeach
            @endif
          </select>
          <div class="invalid-feedback">
            Veuillez sélectionner le membre
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="ville">Ville representée <span class="text-danger">*</span></label>
          <select class="form-control" id="ville" name="province" required>
            <option value="">Ville representée</option>
            
            @foreach(province('all') as $key=>$province)
              <option value="{{ $key+1 }}" {{ (old('province')==$key+1) ? 'selected="selected"' : '' }}>{{ $province }}</option>
            @endforeach
          
          </select>
          <div class="invalid-feedback">
            Veuillez sélectionner la ville representée.
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