//Toggler mode sombre
$("#mdsombre").click(function () {
    $(".cercle").toggleClass('right')
    $("#mdsombre").toggleClass('right')
    if ($('.cercle').hasClass('right')) {
        $("*").each(function() {
            if (!$(this).hasClass("cercle") && !$(this).hasClass("mdsombre") && !$(this).hasClass("container") && !$(this).hasClass("row") && this.id !== "cercle" && this.id !== "mdsombre") {
                $(this).data("original-color", $(this).css("color"));
                $(this).data("original-background-color", $(this).css("background-color"));

                this.style.setProperty("color", "white", "important");
                this.style.setProperty("background-color", "black", "important");
            }
        });
    }else{
        $("*").each(function() {
            if ($(this).data("original-color") && $(this).data("original-background-color")) {
                // Revert to original styles
                this.style.setProperty("color", $(this).data("original-color"), "important");
                this.style.setProperty("background-color", $(this).data("original-background-color"), "important");
            }
        });
    }
    

    // // Function to create a cookie
    //     function setCookie(name, value, days) {
    //         let expires = "";
    //         if (days) {
    //             let date = new Date();
    //             date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    //             expires = "; expires=" + date.toUTCString();
    //         }
    //         document.cookie = name + "=" + (value || "") + expires + "; path=/";
    //     }

    //     // Function to get a cookie value by name
    //     function getCookie(name) {
    //         let nameEQ = name + "=";
    //         let ca = document.cookie.split(';');
    //         for (let i = 0; i < ca.length; i++) {
    //             let c = ca[i];
    //             while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    //             if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    //         }
    //         return null;
    //     }

    //     // Set a cookie named 'color' with the value 'black' that expires in 7 days
    //     setCookie('color', 'black', 7);

    //     // Retrieve the 'color' cookie value
    //     console.log('Color cookie value:', getCookie('color'));
})



//-------------------------------
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
