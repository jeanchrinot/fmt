
  <header class="wow fadeIn">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="logo">
       <img src="/assets/img/logo.jpg"> 
     </div>

     <a class="navbar-brand" href="/">malagasy eto torkia</a>
     <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="toggle navigation">
      <span class="navbar-toggler-icon"><i class="fa fa-bars" style="color:#fff; font-size:28px;"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#about">Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('page.bourseInfo')}}">Bourses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('page.actuality') }}">Actualités</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('page.activity') }}">Activités</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('page.bureau') }}">Bureau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('page.gallery') }}">Galerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('page.video') }}">Vidéos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#contact">Contact</a>
        </li>
      </ul>

    </div>
  </nav>
</header>