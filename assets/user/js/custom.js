(function($) {
    "use strict";

    $(".image-upload").on( "change", function() {
      var imgpath = $(this).parent().prev();
      var file = $(this);
      readURL(this,imgpath);
    });

    function readURL(input,imgpath) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              imgpath.css('background', 'url('+e.target.result+')');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".image-upload1").on( "change", function() {
      var imgpath = $(this).parent().prev();
      var file = $(this);
      readURL(this,imgpath);
    });

    function readURL(input,imgpath) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            imgpath.css('background', 'url('+e.target.result+')');
          }
          reader.readAsDataURL(input.files[0]);
      }
    }




        // Display Subcategories & attributes
        $(document).on('change','#cat',function () {
          var link = $(this).find(':selected').attr('data-href');
          if(link != "")
          {
            $('#subcat').load(link);
            $('#subcat').prop('disabled',false);
          }

        });


          // Display Childcategories & Attributes
          $(document).on('change','#subcat',function () {
            var link = $(this).find(':selected').attr('data-href');

            if(link != "")
            {
              $('#childcat').load(link);
              $('#childcat').prop('disabled',false);
            }
          });

            //submit form
  $("#geniusform").on('submit', function (e) {
    var $this = $(this).parent();
    e.preventDefault();
    $('button.submit-btn').prop('disabled', true);
    $('.alert-info').show();
    // $this.find('.alert-info p').html(langg.authenticating);
    $.ajax({
      method: "POST",
      url: $(this).prop('action'),
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
      if ((data.errors)) {
        toastr.error("Already sent Refund Request");
      } else {
        toastr.success("Successfully Sent Refund reply");
    
      }
      $('body, html').animate({
        scrollTop: $('html').offset().top
        }, 'slow');
        $('.gocover').hide();
        $('button.submit-btn').prop('disabled', false);
        $('#refund').modal('hide');
      }
    
    });
    
    });

  

})(jQuery);