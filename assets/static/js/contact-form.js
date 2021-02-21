/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */

$(function () {
   setTimeout(function () {
      var hash = 'oztgfvbnmkjh@rtzuiolkh2494#QEr';
      $('#contactForm').find('input[name="token"]').val(hash);
   }, 7 * 1000);

   // Contact Form
   $('#contactForm').validate({
      errorClass: 'is_invalid',
      rules: {
         contact: {
            required: true,
            minlength: 5
         },
         spam: {
            required: true
         }
      },
      submitHandler: function (form) {
         var $form = $(form);

         $form.find('button').prop('disabled', true)
         $form.find('.alert').remove();

         $.ajax({
            url: '/ajax/contact-form',
            method: 'POST',
            data: $form.serialize(),
            success: function (response) {
               var message = response.success;

               if (typeof message !== 'undefined') {
                  $form.prepend('<div class="alert alert-success">'+ response.success + '</div>');
                  $form.get(0).reset();
                  try {
                     gtag('event', 'generate_lead', { 'event_name' : 'generate_lead', 'value': 1 });
                  } catch {}
                  return true;
               }

               $form.prepend('<div class="alert alert-danger">' + response.error + '</div>');
               return false
            },
            complete: function () {
               $form.find('button').prop('disabled', false);
            }
         });
      }
   });
});