$("#btnmodif").click(function () {
    $(".hidden-form").show('slow')
    $(".overlay").show()
})
$("#close").click(function () {
    $(".hidden-form").hide('slow')
    $(".overlay").hide()
})
$('#menubtn').click(function () {

    $("nav ul li").toggle('slow')
    $("nav ul a").toggle('slow')
})
$(window).resize(function () {
    var screenWidth = $(window).width();
    var targetWidth = 700; // Set your target width here

    if (screenWidth >= targetWidth) {
        if (!$("nav ul li").is(":visible")) {
            $("nav ul li").show()
            $("nav ul a").show()
        }
    }
});
$('.overlay').click(function () {
    if ($(".hidden-form").is(":visible")) {
        $(".hidden-form").hide('slow')
        $(".overlay").hide()
    }
})
//Suppression de post
$('.btn.btn-danger.supp').click(function (){
    $('.modal-suppr').show();
    $('.btn.btn-danger.conf').attr('id',$('.btn.btn-danger.supp').attr('id'));
})
$('.btn.btn-danger.conf').click(function () {
    $.ajax({
        url: './actions/suppressionpost.php',  // The URL of the PHP file that will execute the SQL query
        type: 'POST',            // The HTTP method to use for the request

        data: {                  // The data to send to the server
            idpost: $(".btn.btn-danger.conf").attr("id"),
        },
        success: function(data) {  // The function to call when the request is successful
            if (data!="Suppression effectuee") {
                alert(data);
            }else{
                location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {  // The function to call if the request fails
            alert(textStatus, errorThrown);
        }
    });
})

//Modification du profil de l'utilisateur
$('.btn.btn-primary.send').click(function (){
    $.ajax({
        url: './actions/majutilisateur.php',  // The URL of the PHP file that will execute the SQL query
        type: 'POST',            // The HTTP method to use for the request

        data: {                  // The data to send to the server
            id: $(".btn.btn-primary.send").attr("id"),
            pseudo: $('#pseudo').val(),
            nom: $('#name').val(),
            prenom: $('#prenom').val(),
            mdp: $('#pass').val(),
            bio: $('#bio').val()
        },
        success: function(data) {  // The function to call when the request is successful
            if (data!="Utilisateur mis à jour avec succès !") {
                alert(data);
            }else{
                location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {  // The function to call if the request fails
            console.error(textStatus, errorThrown);
        }
    });

})

var textarea = $("#contenu");
textarea.on("keyup", function() {
        // Get the scroll width of the textarea
        var scrollHeight = textarea[0].scrollHeight;

        // Set the width of the textarea to the scroll width
        textarea.css("height", scrollHeight);
});
var bio = $("#bio");
bio.on("keyup", function() {
        // Get the scroll width of the textarea
        var scrollHeight = bio[0].scrollHeight;

        // Set the width of the textarea to the scroll width
        bio.css("height", scrollHeight);
});
