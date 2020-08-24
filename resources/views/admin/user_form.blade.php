@extends('admin.layout')
@section('title','Ajouter un nouveau membre')

@section('main')
<!--Content right-->
<main class="col-sm-9 mx-auto col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Vous pouvez ajouter  ici les nouveaux membre</strong></h5>
  <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i>Nouveau membre</span>

@php
  if(isset($edit_user)){
  $update = 1;
} 
else{
  $update = 0;
}
@endphp

  <!--modif membre bureau-->
  <div class="box-modif-student_word mt-3 mb-4 p-3 button-container bg-white border shadow-sm">
    <form class=" needs-validation p-2" novalidate id="new-member" action="{{ ($update==1) ? url('admin/member/update/'.$edit_user->id) :  url('admin/member/store') }}" method="post"  enctype="multipart/form-data">
      {{ csrf_field() }}

      @isset($edit_user)
        @method('PATCH')
      @endisset

      

      @php 

      if(old('gender')){
        $gender = old('gender');
      }
      elseif(isset($edit_user->gender)){
        $gender = $edit_user->gender;
      }
      else{
        $gender = '';
      }

      if(old('province')){
        $province = (int)(old('province'));
      }
      elseif(isset($edit_user->province)){
        $province = (int)($edit_user->province);
      }
      else{
        $province = '';
      }


      if(old('type')){
        $type = old('type');
      }
      elseif(isset($edit_user->type)){
        $type = $edit_user->type;
      }
      else{
        $type = '0';
      }

      if(isset($edit_user->type)){
          // editing
          $current_type = $edit_user->type;
          if($edit_user->password=='' || $edit_user->password==null || strlen($edit_user->password)<1){
          $show_pwd_field = 1;
        }
      }

      if($update==0){
        $show_pwd_field = 1;
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
        <div class="col-md-4 mb-2">
          <label for="nom">Nom <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="nom" placeholder="Nom" name="surname" value="{{ old('surname') ?? ($edit_user->surname ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le nom 
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="prenom">Prenom <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="prenom" placeholder="Prénoms" name="name" value="{{ old('name') ?? ($edit_user->name ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le prenom 
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="birthday">Date de naisance <span class="text-danger">*</span></label>
          <div class="input-group">   
            <input type="date" class="form-control" id="birthday" aria-describedby="inputGroupPrepend" name="birthday" value="{{ old('birthday') ?? ($edit_user->birthday ?? '')  }}" required>
            <div class="invalid-feedback">
              Entrez la date de naisssance
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-4 mb-2">
          <label for="ville">Ville <span class="text-danger">*</span></label>
          <select class="form-control" id="ville" name="province" required>
            <option value="">Ville</option>
            @foreach(province('all') as $key=>$prov)
              <option value="{{ $key+1 }}" {{ ($key+1==$province) ? 'selected="selected"' : '' }}>{{ $prov }}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">
            Veuillez entrer la ville 
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="telephone">telephone <span class="text-danger">*</span></label>
          <input type="telephone" class="form-control" id="telephone" placeholder="Téléphone" name="phone" value="{{ old('phone') ?? ($edit_user->phone ?? '') }}" required>
          <div class="invalid-feedback">
            Veuillez entrer le numero de telephone
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <label for="email">Email<span class="text-danger">*</span></label>
          <div class="input-group">   
            <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" placeholder="Adresse email" name="email" value="{{ old('email') ?? ($edit_user->email ?? '') }}" required>
            <div class="invalid-feedback">
              Entrez l'adresse email valide
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
       <div class="col-md-4 mb-2">
        <div class="form-group">
          <label for="profession">Departement/Filiere</label>
          <input type="text" class="form-control" id="department" placeholder="Departement ou filiere" name="department" value="{{ old('department') ?? ($edit_user->department ?? '') }}" required>
        </div>
      </div>
      <div class="col-sm-4">
        <label for="membre">Type du membre: <span class="text-danger">*</span></label>
        <select class="form-control" id="memberType" name="type" currentType="{{ $current_type ?? '' }}" required>
          <option value="0" {{ ($type=='0') ? 'selected':'' }}>Membre simple</option>
          <option value="2" {{ ($type=='2') ? 'selected':'' }}>Administrateur</option>
          <option value="1" {{ ($type=='1') ? 'selected':'' }}>Editeur</option>
        </select>
        <div class="invalid-feedback">
          Veuillez entrer le type du membre 
        </div>
      </div>
      @if(isset($show_pwd_field) && $show_pwd_field==1)
      <div class="col-md-4 mb-2 password" style="{{ ($type=='0') ? 'display: none' : '' }}">
        <div class="form-group">
          <label for="profession">Mot de passe:</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Tapez un mot de passe sécurisé." {{ ($type=='1' || $type=='2') ? 'required' : '' }}>
        </div>
        <div class="invalid-feedback">
          Veuillez entrer un mot de passe
        </div>
      </div>
      @endif
    </div>
    <div class="form-row">
      <div class="col-sm-6">
       <div class="custom-control custom-radio mb-0" style="float: left;margin-right: 10px;">
        <input type="radio" class="custom-control-input" id="male" name="gender" value="1" {{ ($gender==1) ? 'checked': '' }} required>
        <label class="custom-control-label" for="male">Homme</label>
      </div>
      <div class="custom-control custom-radio mb-2" style="float: left;">
        <input type="radio" class="custom-control-input" id="femme" name="gender" value="2" {{ ($gender==2) ? 'checked': '' }} required>
        <label class="custom-control-label" for="femme">Femme</label>
        <div class="invalid-feedback">Choisissez la sexe</div>
      </div>
    </div>
    <div class="col-sm-4 mb-2">
        <div class="form-group">
          <label for="profession">Photo (optionel)</label>
          <input type="file" class="form-control" id="image" name="image">
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