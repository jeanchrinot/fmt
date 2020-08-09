<footer class="md-section bg-dark mt-5">

  <div class="container">
    <div class="row">
      <div class="col-lg-4 wow slideInLeft">

        <!-- sec-title -->
        <div class="sec-title">
          <h2 class="sec-title__title">Contacts</h2><span class="sec-title__divider"></span>
        </div><!-- End / sec-title -->

        @if($assContact)

        <div class="footer-contact">
          <div class="widget-contact__item">
            <span class="widget-contact__title">Tel:</span>
            <p class="widget-contact__text">{{ $assContact->phone }}</p>
          </div>
          <div class="widget-contact__item">
            <span class="widget-contact__title">Fax:</span>
            <p class="widget-contact__text">{{ $assContact->fax }}</p>
          </div>
          <div class="widget-contact__item">
            <span class="widget-contact__title">Email:</span>
            <p class="widget-contact__text"><a href="mailto:{{ $assContact->email }}">{{ $assContact->email }}</a></p>
          </div>
          @if($assContact->email2)!=NULL)
          <div class="widget-contact__item">
            <span class="widget-contact__title">Email 2:</span>
            <p class="widget-contact__text"><a href="mailto:{{ $assContact->email2 }}">{{ $assContact->email2 }}</a></p>
          </div>
          @endif
          <div class="widget-contact__item">
            <span class="widget-contact__title">Adresse: </span>
            <p class="widget-contact__text">
              <a href="#">{{ $assContact->address }}</a>
            </p>
          </div>
        </div>
        @endif
      </div>


      <div class="col-lg-4 wow bounce">

        <!-- sec-title -->
        <div class="row sec-title">
          <h2 class="sec-title__title">Photos</h2><span class="sec-title__divider"></span>
        </div><!-- End / sec-title -->

        

        <!-- widget-gallery -->

        <div class="row widget-gallery footer-gallery">
          <div class="widget-gallery__item">
            <a title="gidro" href="assets/img/gallery/mada5.jpg"><img src="assets/img/gallery/mada5.jpg" alt=""/></a>
          </div>

          <div class="widget-gallery__item">
            <a title="gidro" href="assets/img/gallery/mada4.jpg"><img src="assets/img/gallery/mada4.jpg" alt=""/></a>
          </div>

          <div class="widget-gallery__item">
            <a title="gidro" href="assets/img/gallery/mada3.jpg"><img src="assets/img/gallery/mada3.jpg" alt=""/></a>
          </div>

          <div class="widget-gallery__item">
            <a title="gidro" href="assets/img/gallery/mada2.jpg"><img src="assets/img/gallery/mada2.jpg" alt=""/></a>
          </div>

          <div class="widget-gallery__item">
            <a title="gidro" href="assets/img/gallery/mada1.jpg"><img src="assets/img/gallery/mada1.jpg" alt=""/></a>
          </div>

          <div class="widget-gallery__item">
            <a title="gidtro" href="assets/img/gallery/mada6.jpg"><img src="assets/img/gallery/mada6.jpg" alt=""/></a>
          </div>

        </div><!-- End /  widget-gallery -->
        

      </div>


      <div class="col-lg-4 pb-5 footer-link wow slideInRight">
        <!-- sec-title -->
        <div class="sec-title">
          <h2 class="sec-title__title">Lien rapide :</h2><span class="sec-title__divider"></span>
        </div><!-- End / sec-title -->

        <p><a class="quick-link" href="index.php#about"> <i class="fa fa-angle-right"></i> A propos de nous</a></p>
        <p>
          <a class="quick-link" href="gallery.php"> <i class="fa fa-angle-right"></i> Gallery</a>
        </p>
        <p><a class="quick-link" href="index.php#bureau"><i class="fa fa-angle-right"></i> Membres de bureau</a></p>
        <p><a class="quick-link" href="index.php#student"><i class="fa fa-angle-right"></i> Mots des etudiants</a></p>
        <p>
          <a class="quick-link" href="actuality.php"><i class="fa fa-angle-right"></i>
           Actualités</a></p>
        <p><a class="quick-link" href="#"> <i class="fa fa-angle-right"></i> Activites</a></p>
        <p><a class="quick-link" href="index.php#contact"><i class="fa fa-angle-right"></i> Contacts</a></p>

      </div>

    </div>

  </div>

</footer>
