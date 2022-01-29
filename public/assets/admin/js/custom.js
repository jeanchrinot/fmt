$(document).ready(function() {
    if ($(".tiny").length > 0) {
        loadTinymce();
    }

    $("#memberType").change(function() {
        let memberType = $(this).val();
        let currentType = $(this).attr('currentType');
        let editing = false;
        if (currentType != '') {
            editing = true;
        }

        if (memberType == "1" || memberType == "2") {
            if (editing == true) {
                if (currentType == 0) {
                    $(".password").show()
                    $("#password").attr("required", "1");
                }
            } else {
                $(".password").show()
                $("#password").attr("required", "1");
            }
        } else {
            $("#password").removeAttr("required");
            $(".password").hide()
        }
    })

    $("#actualite #categorie").change(function() {
        let actualite = $(this).val();
        if (actualite == "Autre") {
            $("#otherCategorie").show()
        } else {
            $("#otherCategorie").hide()
        }
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

    //Show message
    $(".view_message").click(function() {
            let id = $(this).attr("id");
            let status = $("#status" + id);

            $.ajax({
                url: "message/" + id,
                success: function(data) {
                    $("#nameSender").html(`${data.message.name} ${data.message.surname}`);
                    $("#email").html(data.message.email);
                    $("#phone").html(data.message.phone);
                    $("#subject").html(data.message.subject);
                    $("#messageContent").html(data.message.message);

                    $("#details-modal").modal();
                    if (data.message.viewed == 1) {
                        $(status).removeClass("badge-info").addClass("badge-success").html("lu");
                    }
                }
            })
        })
        //Remove message
    $(".delete_message").click(function() {
        let id = $(this).attr("id");
        $("#delete-modal").modal();

        $("#confirm-delete").click(function() {
            let token = $(this).data("token");
            $.ajax({
                url: "delete/message/" + id,
                dataType: "json",
                method: "post",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#delete-modal").modal("hide");
                    window.location.reload()
                }
            });
        })

    });

    //delete item when valid
    $(".delete-item-btn").on("click", delete_item);

    if ($(".summernote").length > 0) {
        $('.summernote').summernote({
            placeholder: 'Texte...',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview']]
            ]
        });
    }
    if ($(".datatable").length > 0) {
        $('.datatable').DataTable({
            "ordering": false
        });
    }

    if ($(".image").length > 0) {
        $(".image").attr("accept", "image/png, image/gif, image/jpeg");
    }

});

/*========== Toggle Sidebar width ============ */
function toggle_sidebar() {
    $('#sidebar-toggle-btn').toggleClass('slide-in');
    $('.sidebar').toggleClass('shrink-sidebar');
    $('.content').toggleClass('expand-content');

    //Resize inline dashboard charts
    $('#incomeBar canvas').css("width", "100%");
    $('#expensesBar canvas').css("width", "100%");
    $('#profitBar canvas').css("width", "100%");
}


/*==== Header menu toggle navigation show and hide =====*/

function toggle_dropdown(elem) {
    $(elem).parent().children('.dropdown').slideToggle("fast");
    $(elem).parent().children('.dropdown').toggleClass("animated flipInY");
}

$("body").not(document.getElementsByClassName('dropdown-toggle')).click(function() {
    if ($('.dropdown').hasClass('animated')) {
        //$('.dropdown').removeClass("animated flipInY");
    }
});
/*==== Header menu toggle navigation show and hide =====*/


/*==== Sidebar toggle navigation show and hide =====*/

function toggle_menu(ele) {
    //close all ul with children class that are open except the one with the selected id
    $('.children').not(document.getElementById(ele)).slideUp("Normal");
    $("#" + ele).slideToggle("Normal");
    localStorage.setItem('lastTab', ele);
}

function pageLoad() {
    $.each($('.children'), function() {
        let ele = localStorage.getItem('lastTab');
        if ($(this).attr('id') == ele) {
            $("#" + ele).slideDown("Normal");
        }
    });
}

function delete_item() {
    let $data_url = $(this).data("url");
    let rowId = $(this).data("id");

    const rowItem = $(`#row_${rowId}`)

    swal.fire({
        title: "Emin misiniz?",
        text: "Bu işlem için devam etmek ister misiniz?",
        icon: "warning",
        cancelButtonText: "Hayır",
        confirmButtonText: 'Oui',
        allowOutsideClick: false,
        showDenyButton: true,
        reverseButtons: true,
        confirmButtonColor: '#45cb85',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $data_url,
                method: 'DELETE',
                success: function(result) {
                    let type = (result.type == "success") ? "success" : "error";
                    const message = (type == "success") ? result.success : result.error;

                    if (type) {
                        swal.fire({
                            title: type,
                            text: message,
                            icon: type
                        })

                        if (type == "success") {
                            rowItem.remove();
                        }
                    }
                },
                error: function(data) {
                    swal.fire({
                        title: "Error",
                        text: "Beklenmedik hata oluştu. Sonra tekrar deneyiniz.",
                        icon: "error"
                    })
                }
            })
        }
    });
}
//pageLoad();

/*==== Sidebar toggle navigation show and hide =====*/

function loadTinymce() {
    tinymce.init({
        selector: '.tiny',
        toolbar_mode: 'floating',
        height: 500,
        plugins: 'link image code',
        relative_urls: true,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:12px }'
    });
}