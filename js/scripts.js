var num = 40; //number of pixels before modifying styles

$(window).bind('scroll', function() {
	

    if ($(window).scrollTop() > num) {
        $('header').addClass('fixed');
     } else {
        $('header').removeClass('fixed');
    }
});


$(function() {  

    // Default
    jQuery.scrollSpeed(200, 300);
    
    // Custom Easing
    jQuery.scrollSpeed(200, 300, 'easeOutCubic');
    
});

//
// contact Form SUBMIT
// $(function(){
//     //zmienne formularz i wiadomość
//     var form = $('#ajax-form');
//     var formMessages = $('#form-messages');


//     $(form).submit(function(event) {
//         event.preventDefault();
//     });

//     var formData = $(form).serialize();

//     $.ajax({
//         type: 'POST',
//         url: $(form).attr('action'),
//         data: formData

//     })
//         .done(function(response) {
//             // Make sure that the formMessages div has the 'success' class.
//             $(formMessages).removeClass('error');
//             $(formMessages).addClass('success');

//             // Set the message text.
//             $(formMessages).text(response);

//             // Clear the form.
//             $('#name').val('');
//             $('#email').val('');
//             $('#message').val('');
//         })

//         .fail(function(data) {
//             // Make sure that the formMessages div has the 'error' class.
//             $(formMessages).removeClass('success');
//             $(formMessages).addClass('error');

//             // Set the message text.
//             if (data.responseText !== '') {
//                 $(formMessages).text(data.responseText);
//             } else {
//                 $(formMessages).text('Oops! An error occured and your message could not be sent.');
//             }
//         })
// });

