$(function () {
  $('#headline-asset, #subheadline-asset').keyup( function () {
    var formData = $('#headline-form').serialize();
    
    $.ajax({
      contentType: "application/json; charset=utf-8",
      async: true,
      type: "PUT",
      url: "../model/headline.php?" + formData,
      dataType: "json",
      success: function (data) {
        $.getScript("../assets/js/viewController.js", function() {
          displayCanvases(data);
          
        })
      },                                                             
      error: function (req, textStatus, errorThrown) {
        alert('Ooops, something happened: ' + textStatus + ' ' + errorThrown);
      }
    }).done(function (data) {
      // console.log('Done processing the AJAX');
    });    
  });
});

