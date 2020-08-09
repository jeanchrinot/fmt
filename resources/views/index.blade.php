@extends('layouts.app')

@section('title','Malagasy eto Torkia')
@section('main')


<!--slider-->
<section class="container-fluid wow fadeIn">
  <!-- Slider main container -->
  <div class="swiper-container index">
    <div class="swiper-wrapper">
      @if($sliders)
        @foreach($sliders as $slider)
          <div class="swiper-slide">
            <img src="assets/img/gallery/{{ $slider->image }}" class="w-100">
          </div>
        @endforeach
      @endif
    </div>

    <div class="swiper-pagination swiper-pagination-index"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-scrollbar"></div>
  </div>

  <!-- presentation-->
  <div class="presetantion">
    <div class="container-fluid">
      <div class="row">

        <h3 class="title-slider wow slideInLeft">Tonga soa ato amin’ny pejy « fiombonan’ny malagasy eto torkia ».</h3>

      </div>
    </div>
  </div><!-- end / presentation -->
</section>
<!--end slider-->

<!--actualite-->
@if($news)
<section  class="container-fluid p-5 wow fadeIn" id="slide-activity">
  <div class="slide-news container bg-white">

    <div class="slide-activity wow backInDown">
      @foreach($news as $new)
      <div class="card">
        <img class="card-img-top" src="assets/img/gallery/{{ $new->image }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $new->title }}</h5>
          <p class="card-text small ">{{ $new->details }}</p>
          <a href="/news/{{ $new->slug }}" class="btn btn-primary">Voir plus</a>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</section>
@endif
<!--end-actualite-->

<!--about-->
<section id="about" class="p-md-3" >

  <div class="container ">

    <div class="row">
      <div class="col-md-6 wow SlideInLeft">
        <div class="section-title wow slideInLeft">
          <h1>propos</h1>
        </div>
        <p class="wow slideInLeft">{{ $about->about }}</p>
      </div>

      <div class="col-md-6 wow slideInRight">
        <div class="president-box">

          <div class="img-president">
            <img src="assets/img/{{ $about->image }}">
            <p class="president-word " style="display: none;">
              {{ $about->words_of_president }}
            </p>
          </div>

          <!-- quote-->
          <blockquote class="quote about-quote">
            <p class="quote-02__text">
              {{ $about->words_of_president }}
            </p>
            <!-- president -->
            <div style="float: right;">
              <div class="president__info">
                <h5 class="president__name">Mr Zafera eliot</h5>
                <p>President</p>
              </div>
            </div><!-- end / president -->

          </blockquote><!-- end / quote -->

        </div><!-- end / about -->

      </div>
    </div>
  </div>
</section>
<!--end about-->

<!--iformation mada -->
<!-- <style type="text/css">
  #madagaskar{
    background: #f7f7f7;
  }

  #madagaskar .row{
    margin: 25px 0;
  }
  #madagaskar  #ville .col-sm-6{
    margin: 7px 0;
    position: relative;
  }
  #madagaskar #ville img{
    width: 100%;
    height: 100%;
    opacity: .8;
  }
  #madagaskar .row #ville .ville-item{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    color: #fff;
    z-index: 1;
    font-weight: 800;
  }
</style>
<section id="madagaskar">
 <div class="section-title text-center">
  <h1 class="wow slideInRight">Madagascar</h1>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-7 wow slideInLeft">
      <h3>Informations de base sur Madagascar</h3>
      <p>Madagascar, ou officiellement la République de Madagascar, est la quatrième plus grande île du monde. C'est une île reliée au continent africain et située dans la partie ouest de l'océan Indien dans la partie orientale du continent. Le canal du Mozambique sépare le pays du principal continent africain. Nom du pays Madagascar n'est pas un nom provenant d'une langue locale.</p>
      <p>Marco Polo a mentionné l'île comme une forme différente du nom de la ville de Mogadiscio en Somalie en raison de la confusion de l'île, qu'il a apprise indirectement dans ses souvenirs et l'a décrite comme une île d'une richesse indescriptible, et le nom de l'île est resté ainsi. Il existe de nombreux parcs nationaux et plantes endémiques et espèces vivantes à Madagascar, célèbre pour sa beauté naturelle.</p>
    </div>
    <div class="col-lg-5 wow slideInRight">
      <h5>Bande annonce :</h5>
      <iframe height="300" class="w-100" src="https://www.youtube.com/embed/4oTy_GoQfJE" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
  <div class="row">
    <div class="mx-auto col-lg-10">
      <h3 class="wow bounceIn">Capitales, villes et régions de Madagascar</h3>
      <p class="my-auto wow bounceInDown">La capitale de Madagascar est Antananarivo. Madagascar est divisé en 22 régions appelées faritra en soi. Ces 22 régions sont divisées en 119 districts, également appelés fivondronana.</p>
      <div class="row" id="ville">
        <div class="col-sm-6 col-lg-4 wow flipInX">
          <img src="assets/img/tana.jpg" class="img-fluid" alt="Antananarivo" >
          <h5 class="ville-item">Antananarivo</h5>
        </div>
        <div class="col-sm-6 col-lg-4 wow flipInY">
          <img src="assets/img/toamasina.jpg" class="img-fluid" alt="toamasina" >
          <h5 class="ville-item">Toamasina</h5>
        </div>
        <div class="col-sm-6 col-lg-4 wow flipInX">
          <img src="assets/img/mahajanga.jpeg" class="img-fluid" alt="mahajanga" >
          <h5 class="ville-item">Mahajanga</h5>
        </div>
        <div class="col-sm-6 col-lg-4 wow flipInY">
          <img src="assets/img/fianarantsoa.jpg" class="img-fluid" alt="fianarantsoa">
          <h5 class="ville-item">Fianaratsoa</h5>
        </div>
        <div class="col-sm-6 col-lg-4 wow flipInX">
          <img src="assets/img/diego.jpg" class="img-fluid" alt="Antsiranana" >
          <h5 class="ville-item">Antsiranana</h5>
        </div>
        <div class="col-sm-6 col-lg-4 wow flipInY">
          <img src="assets/img/tulear.jpg" class="img-fluid" alt="Toliara">
          <h5 class="ville-item">Toliara</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 wow slideInLeft">
      <h3>Où est Madagascar?</h3>
      <p>L'île de Madagascar, située dans l'hémisphère sud, n'a pas de voisins frontaliers car c'est un pays insulaire, et le pays le plus proche du continent est le Mozambique situé à l'ouest de l'île. En outre, les pays insulaires voisins sont les Comores au nord-ouest et la région offshore française de Mayotte, Maurice à l'est et la région française offshore française.</p>
    </div>
    <div class="col-md-4 wow slideInRight">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15489891.947561778!2d37.82391296132044!3d-18.587022911617183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21d1a4e3ea238545%3A0x5244e3c1977b1388!2sMadagascar!5e0!3m2!1sen!2str!4v1595776468950!5m2!1sen!2str" class="w-100" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 wow slideInLeft">
      <img src="assets/img/langue.jpg" class="img-fluid w-100" >
    </div>
    <div class="col-md-8 px-2 wow slideInRight">
      <h3>Langues parlées à Madagascar</h3>
      <p>A Madagascar, la langue malaise d'origine malaya-polynésienne est parlée. Bien qu'il n'ait pas de langue officielle, le pays, qui a été sous l'influence de la France depuis de nombreuses années, est traité comme une langue officielle. Presque toute la population parle le français comme langue seconde.</p>
    </div>
  </div>
  <div class="row">
   <div class="col-md-8 wow slideInLeft">
    <h3>Une brève histoire de Madagascar</h3>
    <p>À Madagascar, où le peuplement était faible dans les premières périodes, des royaumes ont été établis par les Sakalavas, les Merinas et les Betsileos avec l'augmentation de la population. Le 10 août 1500, le marin portugais Diogo Dias est devenu le premier Européen à mettre le pied sur l'île. L'île a d'abord été utilisée comme destination fréquente en 1641 par des navires voyageant par des Néerlandais et plus tard par des marchands britanniques et américains.</p>
  </div>
  <div class="gallery col-md-4 wow slideInRight">
    <div>
      <a href="assets/img/histoire-mada.jpg" title="histoire de Madagascar"><img src="assets/img/histoire-mada.jpg" alt="histoire de Madagascar" class="img-fluid w-100"></a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 my-3 m-lg-0 wow slideInLeft">
    <div class="gallery">
     <a href="assets/img/climat.webp" title="Climat a Madagascar"> <img src="assets/img/climat.webp" class="img-fluid w-100"></a>
   </div>
 </div>
 <div class="col-lg-8 wow slideInRight">
  <h3>Climat et météo de Madagascar</h3>
  <p>En raison de la situation géographique, différents climats peuvent être expérimentés à travers Madagascar. Alors qu'un climat chaud et pluvieux est connu en novembre et avril, un processus aride et froid se produit entre mai et octobre. Les rives orientales du pays peuvent être exposées à de violentes tempêtes tropicales et cyclones à certains intervalles. Un climat frais et aride règne sur les hauts plateaux de la partie centrale de l'île. Les valeurs de température annuelle moyenne à travers le pays sont d'environ 25 degrés. Malgré cette moyenne annuelle, les températures peuvent atteindre des valeurs plus élevées dans les zones côtières et suffisamment basses pour tomber en dessous de 0 degré dans les zones intérieures.</p>
</div>
</div>

<div class="row">
  <div class="col-lg-8 wow slideInLeft">
    <h3>Culture de Madagascar</h3>
    <p>Des groupes d'ethnies différentes vivant à Madagascar vivent selon leurs propres croyances. Les caractéristiques culturelles fondamentales communes à toute l'île forment l'identité d'une culture malgache forte et unifiée. Il existe un langage commun. Les valeurs qui mettent l'accent sur la vision du monde traditionnelle de Madagascar sont appelées fihavanana (solidarité), vintana (destin), tody (karma) et hasina (force vitale sacrée). La musique est l'un des moyens culturels les plus importants de s'exprimer à travers le pays. La gamme de musique à Madagascar va de la musique folklorique traditionnelle à la musique appelée salegi dans les zones côtières.</p>
  </div>
  <div class="col-lg-4 wow slideInRight">
    <div>
      <img class="img-fluid" src="assets/img/culture.jpg" alt="Culture Madagascar">
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-4 wow slideInLeft">
    <div>
      <img class="img-fluid" src="assets/img/food.jpg" alt="Cuisine malagasy">
    </div>
  </div>
  <div class="col-md-8 wow slideInRight">
    <h3>Cuisine de Madagascar</h3>
    <p>La cuisine malgache a été influencée par les cuisines de l'océan Indien et s'est diversifiée sous l'influence des cuisines africaine, extrême-orientale, chinoise et européenne. La cuisine malgache est à base de riz. Les sauces locales appelées Laoka sont célèbres. Cette sauce est à base de gingembre, d'oignon, d'ail, de tomate, de vanille, de curry et de sel et peut contenir des sources de protéines végétales ou animales. Le maïs ou le yuka est utilisé à la place du riz des zones rurales. Il a une cuisine très riche en termes de types de fruits. Buvez du rhum, de la bière et du vin dans le pays.</p>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-lg-10 wow fadeInUpBig">
    <h3>Jours / Vacances / Vacances importants à Madagascar</h3>
    <p>Nouvel an (1er janvier)</p>
    <p>Lundi de Pâques (dernier lundi avant Pâques)</p>
    <p>Journée des martyrs (29 mars)</p>
    <p>1er mai Fête du travail (1er mai)</p>
    <p>Fête de l'indépendance (26 juin)</p>
    <p>Toussaint (1er novembre)</p>
    <p>Noël (25 décembre)</p>

    <h3>Économie de Madagascar</h3>
    <p>L'économie de Madagascar présente un profil de pays en développement. Le cacao, la vanille, la canne à sucre, les clous de girofle, le café, le riz, le manioc, les haricots, les bananes et les arachides sont cultivés et cultivés dans tout le pays. En outre, l'aviculture contribue également à l'économie du pays. Outre les produits agricoles, il contribue à l'économie en produisant ou en produisant des produits tels que fruits de mer, savon, bière, cuir, sucre, verre, ciment, papier, assemblage automobile, mines.</p>
  </div>
</div>
</div>
</section> -->
<!--end information mada-->


<!--Student-->
<section  id="student">

 <div class="section-title text-center">
  <h1 class="wow slideInRight">Mot des etudiants</h1>
</div>


<div class="container owl-carousel owl-theme wow fadeIn">

@foreach($studentwords as $studentword)
  <div class="item">
    <div class="student">
      <div class="student-word">
        {{ $studentword->words }}
      </div>
      <div class="description justify-content-center">
        <span class="text-muted  my-auto">{{ $studentword->user->department }}</span>
        <img src="assets/img/student/{{ $studentword->user->image }}" class="rounded-circle ml-3">
      </div>
    </div>
  </div>
 @endforeach
</div>
</section>
<!--end student-->


<!--bureau-->

<section id="bureau">

  <div class="section-title wow slideInLeft">
    <h1>Membre de bureau</h1>
  </div>


  <div class="container wow fadeIn">

    <div class="row">

      @if($office_members)
      @foreach($office_members as $member)
      @foreach($member->positions as $position)
      <div class="col-sm-6 col-sm-4 col-md-3 ">
        <div class="bureau-item">
          <img src="assets/img/{{ $member->image }}" class="card-img">
        </div>
        <div class="bureau__body">
          <div class="bureau__user">
            <h4 class="bureau__name">{{ $member->name." ".$member->surname }}</h4><span class="text-muted bureau-work">{{ getPosition($position->function) }}</span>
          </div>
        </div>
      </div>
      @endforeach
      @endforeach
      @endif
  <div class="col-sm-6 col-sm-4 col-md-3">
    <div class="bureau-item">
      <img src="assets/img/ricardo.jpg" class="card-img">
    </div>
    <div class="bureau__body">
      <div class="bureau__user">
        <h4 class="bureau__name">Rakotonirina Olvanot Jean Claude</h4><span class="text-muted bureau-work">President</span>
      </div>
    </div>
  </div>
</div>

</div>

</div>

</section>

<!--end bureau-->

<!--contact-->
<section id="contact" >


 <div class="section-title wow slideInLeft">
  <h1 class="wow slideInLeft">Contactez-nous</h1>
</div>


<div class="container">

  <div class="row">

    <div class="col-lg-3 wow slideInLeft">
      <p class="contact-description">Vous pouvez nous contacter directement via a l'adresse ci-dessous</p>

      <div>
        <div class="widget-contact__item">
          <span class="widget-contact__title">Tel:</span>
          <p class="widget-contact__text"> (+90) (212) 211 9206</p>
        </div>
        <div class="widget-contact__item">
          <span class="widget-contact__title">Fax:</span>
          <p class="widget-contact__text">(+90) (212) 211 7701</p>
        </div>
        <div class="widget-contact__item">
          <span class="widget-contact__title">email 1:</span>
          <p class="widget-contact__text"><a href="#">consular@madagaskar.us</a></p>
        </div>
        <div class="widget-contact__item">
          <span class="widget-contact__title">email 2:</span>
          <p class="widget-contact__text"><a href="#"> aftuexport@superonline.com</a></p>
        </div>
        <div class="widget-contact__item">
          <span class="widget-contact__title">Adresse:</span>
          <p class="widget-contact__text">
            <a href="#">Büyükdere Cad. Kral Apt. No:75/10 80300 Mecidiyeköy / Turquie</a>
          </p>
        </div>

      </div>

    </div>



    <div class="col-lg-5 my-3 wow fadeIn">

      <form class="needs-validation" novalidate>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nom" name="name" required>
          <div class="invalid-feedback">
            Veuillez entrer votre nom 
          </div>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Prenom" name="surname" required>
          <div class="invalid-feedback">
            Veuillez entrer votre prenom
          </div>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Telephone" name="telephone">
          <div class="invalid-feedback">
            Veuillez entrer votre telehone
          </div>
        </div>

        <div class="form-group">
          <input type="email" class="form-control" placeholder="email" name="email" required>
          <div class="invalid-feedback">
            Veuillez entrer votre email
          </div>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Sujet" name="subject" required>
          <div class="invalid-feedback">
            Veuillez entrer le sujet
          </div>
        </div>

        <div class="form-group">
         <textarea class="form-control" name="message" rows="4" placeholder="Message" required></textarea>
         <div class="invalid-feedback">
          Veuillez entrer votre message
        </div>
      </div>


      <button class="btn btn-primary btn-round mt-3" type="submit" style="float: right;">Envoyer</button>

    </form>

  </div>


  <div class="col-lg-4 my-3 wow slideInRight">

    <div class="contact-gmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.0953586877195!2d28.996626015039336!3d41.06690817929489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab6ff5ae8e68d%3A0xdb925c03db5a6bb0!2sMadagascan%20Consulate!5e0!3m2!1sfr!2sus!4v1594484429491!5m2!1sfr!2sus" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>

  </div>


</div>

</div>
</section>
<!--end contact-->

@endsection