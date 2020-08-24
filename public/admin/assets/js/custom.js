$(document).ready(function() {

    //menu tab in dashboard
   $('#first_nav_tab').trigger('click');

   let countSlideField = 3, counStudentField=2, countGalleryField =2;
   let compteur = 0;

   $("#addSliderField").click(function(){
    countSlideField++;
     let slideField = `
       <div class="form-row" id="row${countSlideField}">
            <div class="col-12">
                <span class="remove" data-slide="row${countSlideField}">
                    <i class="fa fa-2x fa-minus"></i>
                </span>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="label-slide-${countSlideField}">Label du slide ${countSlideField}</label>
                <input type="text" class="slide-label form-control" name="label-slide-${countSlideField}" id="label-slide-${countSlideField}" required>
                <div class="invalid-feedback">
                    Veuillez choisir le label d'image ${countSlideField}
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="image-slide-${countSlideField}">Image ${countSlideField}:</label>
                <input type="file" class="slide-image form-control" name="image-slide-${countSlideField}" id="image-slide-${countSlideField}" required>
                <div class="invalid-feedback">
                    Veuillez choisir l'image ${countSlideField}
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="description-slide-${countSlideField}">Description du slide ${countSlideField}</label>
                <textarea type="text" class="slide-description form-control" name="description-slide-${countSlideField}" id="description-slide-${countSlideField}" required></textarea>
                <div class="invalid-feedback">
                    Veuillez choisir la description d'image ${countSlideField}
                </div>
            </div>
        </div> `;

    $("#form-slide").append(slideField);

    $("#form-slide .remove").click(function(){
        let rowSlide = $(this).data("slide");
        $("#"+rowSlide).fadeOut();
    })
    let itemLabel = [];
    let itemImage=[];
    let itemDescription=[];

    $(".slide-label").each(function(){
        itemLabel.push($(this).val());
    })
    $(".slide-image").each(function(){
        itemImage.push($(this).val());
    })
    $(".slide-description").each(function(){
        itemDescription.push($(this).val());
    })
 })

   $("#addStudentField").click(function(){
    counStudentField++;

    let studentField = `
        <div class="form-row" id="row${countSlideField}">
           <div class="col-12">
                <span class="remove" data-student="row${counStudentField}">
                    <i class="fa fa-2x fa-minus"></i>
                </span>
            </div>
            <div class="col-sm-6 col-md-3">
                <label for="nom-etudiant-${counStudentField}">Nom d'etudiant ${counStudentField}</label>
                <input type="text" class="form-control" name="nom-etudiant-${counStudentField}" id="nom-etudiant-${counStudentField}" required>
                <div class="invalid-feedback">
                    Veuillez choisir le nom d'etudiant ${counStudentField}
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <label for="prenom-etudiant-${counStudentField}">Prenom d'etudiant ${counStudentField}</label>
                <input type="text" class="form-control" name="prenom-etudiant-${counStudentField}" id="prenom-etudiant-${counStudentField}" required>
                <div class="invalid-feedback">
                    Veuillez choisir le prenom d'etudiant ${counStudentField}
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <label for="image-etudiant-${counStudentField}">Image ${counStudentField}:</label>
                <input type="file" class="form-control" name="image-etudiant-${counStudentField}" id="image-etudiant-${counStudentField}" required>
                <div class="invalid-feedback">
                    Veuillez choisir l'image
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="student-word-${counStudentField}" class="my-3">Mot d'etudiant ${counStudentField}</label>
                <textarea type="text" class="form-control" name="student-word-${counStudentField}" id="student-word-${counStudentField}" required></textarea>
                <div class="invalid-feedback">
                    Veuillez choisir les mots d'etudiant ${counStudentField}
                </div>
            </div>
        </div>`;

    
    
    $("#student-form").append(studentField);

    $("#student-form .remove").click(function(){
        let parentSpan =$(this).parent("div");
        parentSpan.parent("div").fadeOut();
    })

   })

   /*$("#membre").change(function(){
    let typeMembre = $(this).val();

        if(typeMembre=="depute"){ 
          $(".ville-administration").show()
        }
        else{
         $(".ville-administration").hide()
        }

         if(typeMembre=="bureau"){ 
          $(".profession").show()
          }
        else{
         $(".profession").hide()
        }
   })*/

   $("#memberType").change(function(){
    let memberType = $(this).val();
    let currentType = $(this).attr('currentType');
    let editing = false;
    if(currentType!=''){
        editing = true;
    }

         if(memberType=="1" || memberType=="2"){ 
            if(editing==true){
                if (currentType==0) {
                      $(".password").show()
                      $("#password").attr("required","1");
                }
            }
            else{
                $(".password").show()
                $("#password").attr("required","1");
            }
          }
        else{
        $("#password").removeAttr("required");
         $(".password").hide()
        }
   })

   $("#actualite #categorie").change(function(){
    let actualite = $(this).val();

        if(actualite=="Autre"){ 
          $("#otherCategorie").show()
        }
        else{
         $("#otherCategorie").hide()
        }
   })
  
  $("#addGalleryField").click(function(){
    countGalleryField++;
    compteur++;
    let galleryField = `
            <div class="form-row">
                 <div class="col-12">
                    <span class="remove" data-gallery="row${countGalleryField}">
                        <i class="fa fa-2x fa-minus"></i>
                    </span>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="note-gallerie-1">Note ${countGalleryField} (Facultatif)</label>
                    <input type="text" class="form-control" name="note-gallerie-${countGalleryField}" id="note-gallerie-${countGalleryField}">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="addGallery">Image ou video ${countGalleryField}</label>
                    <input type="file" class="form-control" name="addGallery-${countGalleryField}" id="addGallery" required>
                    <div class="invalid-feedback">
                        Veuillez choisir l'image
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="categorie">Categories ${countGalleryField}</label>
                    <select id="categorie" name="gallery-categorie-${countGalleryField}" class="form-control" required>
                        <option value="">categorie</option>
                        <option value="Aliment">Aliment</option>
                        <option value="Culture">Culture</option>
                        <option value="Activites">Activites</option>
                        <option value="Actualites">Actualites</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <div class="invalid-feedback">
                        Veuillez choisir la categorie
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="gallery-description-${countGalleryField}">Description ${countGalleryField}</label>
                    <textarea id="gallery-description-${countGalleryField}" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Veuillez choisir la description
                    </div>
                </div>
            </div>`;

        $("#galleries").append(galleryField);

        $("#galleries .remove").click(function(){
            let parentSpan =$(this).parent("div");
            parentSpan.parent("div").fadeOut();
        })
  })


   /*==============Page Loader=======================*/

   $(".loader-wrapper").fadeOut("slow");

   /*===============Page Loader=====================*/


    /*===========Bootstrap 4 validation==================*/

    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
      }
      form.classList.add('was-validated');
  }, false);
  });
});

/*========== Toggle Sidebar width ============ */
function toggle_sidebar() {
    $('#sidebar-toggle-btn').toggleClass('slide-in');
    $('.sidebar').toggleClass('shrink-sidebar');
    $('.content').toggleClass('expand-content');
    
    //Resize inline dashboard charts
    $('#incomeBar canvas').css("width","100%");
    $('#expensesBar canvas').css("width","100%");
    $('#profitBar canvas').css("width","100%");
}


/*==== Header menu toggle navigation show and hide =====*/

function toggle_dropdown(elem) {
    $(elem).parent().children('.dropdown').slideToggle("fast");
    $(elem).parent().children('.dropdown').toggleClass("animated flipInY");
}

$("body").not(document.getElementsByClassName('dropdown-toggle')).click(function() {
    if($('.dropdown').hasClass('animated')) {
        //$('.dropdown').removeClass("animated flipInY");
    }
});
/*==== Header menu toggle navigation show and hide =====*/


/*==== Sidebar toggle navigation show and hide =====*/

function toggle_menu(ele) {
    //close all ul with children class that are open except the one with the selected id
    $( '.children' ).not( document.getElementById(ele) ).slideUp("Normal");
    $( "#"+ele ).slideToggle("Normal");
    localStorage.setItem('lastTab', ele);
}

function pageLoad() {
    $.each($('.children'), function () {
        let ele = localStorage.getItem('lastTab');
        if ($(this).attr('id') == ele) {
            $( "#"+ele ).slideDown("Normal");
        }
    });
}

//pageLoad();

/*==== Sidebar toggle navigation show and hide =====*/