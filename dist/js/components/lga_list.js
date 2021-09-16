(function ($) {
  // MDA list
  $.ajax({
    url: "http://localhost/csdcapp/functions/getAllLGAs.php",
    method: "GET",
    success: function (response) {
      var res = JSON.parse(response);
      var len = res.length;

      for (let i = 0; i < len; i++) {
        let name = res[i].name;
        $("#present_mda_lga").append(
          "<option value='" + name + "'>" + name + "</option>"
        );
      }
    },
    error: function (response) {},
  });
})(jQuery);
