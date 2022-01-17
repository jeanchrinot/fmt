$(document).ready(function () {

    $("#memberType").change(function () {
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

    $("#actualite #categorie").change(function () {
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
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    //Show message
    $(".view_message").click(function () {
        let id = $(this).attr("id");
        let status = $("#status" + id);

        $.ajax({
            url: "message/" + id,
            success: function (data) {
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
    $(".delete_message").click(function () {
        let id = $(this).attr("id");
        $("#delete-modal").modal();

        $("#confirm-delete").click(function () {
            let token = $(this).data("token");
            $.ajax({
                url: "delete/message/" + id,
                dataType: "json",
                method:"post",
                data: {
                    id: id,
                    _token: token
                },
                success: function (data) {
                    $("#delete-modal").modal("hide");
                   window.location.reload()
                }
            }) ;
        })

    });


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

$("body").not(document.getElementsByClassName('dropdown-toggle')).click(function () {
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
    $.each($('.children'), function () {
        let ele = localStorage.getItem('lastTab');
        if ($(this).attr('id') == ele) {
            $("#" + ele).slideDown("Normal");
        }
    });
}

//pageLoad();

/*==== Sidebar toggle navigation show and hide =====*/
