// Wow js start
new WOW().init();

// Smooth scroll to anchor links
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top-60
        }, 1500, 'easeInOutExpo');
        return false;
      }
    }
  });
});

// hamburger menu icons
  $('.navbar-toggler').on('click', function(){
     $(this).toggleClass('active');
  });

// Toggle Mobile Navbar
  $('.navbar-collapse a').click(function(){
      $(".navbar-collapse").collapse('hide');
      $('.navbar-toggler').removeClass('active');
  });

$('body').scrollspy({ target: '.navbar-custom', offset: 100 })

$('[data-spy="scroll"]').each(function () {
  var $spy = $(this).scrollspy('refresh')
})


/*------Contact form-----*/
$('#contact-form').bootstrapValidator({
  feedbackIcons: {
        valid: 'fas fa-check',
        invalid: 'fas fa-times',
        validating: 'fas fa-refresh'
      },
  fields: {            
    fullName: {
      validators: {
        notEmpty: {
          message: 'Name is required. Please enter name.'
        }
      }
    },
    message: {
      validators: {
        notEmpty: {
          message: 'Message is required. Please enter some message.'
        }
      }
    },
    phoneNo: {
      validators: {
        notEmpty: {
          message: 'Phone No is required. Please enter.'
        }
      }
    },
    email: {
      validators: {
        notEmpty: {
          message: 'Email is required. Please enter email.'
        },
        email: {
          message: 'Please enter a correct email address.'
        }
      }
    }

  }
})

.on('success.form.bv', function(e) {
  var data = $('#contact-form').serialize();

  $.ajax({
      type: "POST",
      url: "php/mail-process.php",         
      data: $('#contact-form').serialize(),
      success: function(msg){           
        $('.form-message').html(msg);
        $('.form-message').show();
        // window.setTimeout(function(){
        // window.location.reload();
        // //      window.location ="index.html";
        //   resetForm($('#contact-form'));
        //       }, 4000);         

      },
      error: function(msg){           
        $('.form-message').html(msg);
        $('.form-message').show();
        resetForm($('#contact-form'));
      }
   });
  return false;
});
function resetForm($form) {
  $form.find('input:text, input:password, input, input:file, select, textarea').val('');
  $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
  $form.find('.form-control-feedback').css('display', 'none');
}
