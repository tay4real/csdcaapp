(function ($) {
  // MDA list
  $.ajax({
    url: "http://localhost/csdcapp/functions/getAllCadres.php",
    method: "GET",
    success: function (response) {
      var res = JSON.parse(response);
      var len = res.length;

      for (let i = 0; i < len; i++) {
        let cadre = res[i].cadre;
        $("#cadre").append(
          "<option value='" + cadre + "'>" + cadre + "</option>"
        );
      }
    },
    error: function (response) {},
  });
})(jQuery);
