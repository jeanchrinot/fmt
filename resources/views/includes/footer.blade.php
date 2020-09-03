<footer class="md-section bg-dark">

  <div class="container">
    <div class="row">
      <div class="col-lg-4 wow slideInLeft">

        <!-- sec-title -->
        <div class="sec-title">
          <h2 class="sec-title__title">SUIVEZ-NOUS</h2><span class="sec-title__divider"></span>
        </div><!-- End / sec-title -->

        @if($socials)
        <ul class="socials">
              <li class="socials__item"><a href="{{ $socials->facebook }}" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
              <li class="socials__item"><a href="{{ $socials->twitter }}" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
              <li class="socials__item"><a href="{{ $socials->youtube }}" target="_blank"><i class="fa fa-youtube"></i> Youtube</a></li>
              <li class="socials__item"><a href="{{ $socials->instagram }}" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
        </ul>
        @endif
        
      </div>


      <div class="col-lg-4 wow bounce">

        <!-- sec-title -->
        <div class="sec-title">
          <h2 class="sec-title__title">Galerie Images</h2><span class="sec-title__divider"></span>
        </div><!-- End / sec-title -->

        

        <!-- widget-gallery -->

        <div class="row widget-gallery footer-gallery">
          @if($footer_galleries)
          @foreach($footer_galleries as $gallery)
          <div class="widget-gallery__item">
            <a title="{{ $gallery->title }}" href="{{ getImage($gallery->image) }}"><img src="{{ getImage($gallery->image) }}" alt="{{ $gallery->title }}"/></a>
          </div>
          @endforeach
          @endif
        </div><!-- End /  widget-gallery -->
        

      </div>


      <div class="col-lg-4 pb-5 footer-link wow slideInRight">
        <!-- sec-title -->
        <div class="sec-title">
          <h2 class="sec-title__title">Lien rapide :</h2><span class="sec-title__divider"></span>
        </div><!-- End / sec-title -->

        <p><a class="quick-link" href="/#about"> <i class="fa fa-angle-right"></i> A propos de nous</a></p>
        <p>
          <a class="quick-link" href="{{ route('page.gallery') }}"> <i class="fa fa-angle-right"></i> Galerie Image</a>
        </p>
        <p>
          <a class="quick-link" href="{{ route('page.video') }}"> <i class="fa fa-angle-right"></i> Galerie Vidéo</a>
        </p>
        <p>
          <a class="quick-link" href="{{ route('page.actuality') }}"><i class="fa fa-angle-right"></i>
           Actualités</a></p>
        <p><a class="quick-link" href="{{ route('page.activity') }}"> <i class="fa fa-angle-right"></i> Activités</a></p>
        <p><a class="quick-link" href="/#contact"><i class="fa fa-angle-right"></i> Contacts</a></p>

      </div>

    </div>

  </div>

</footer>
