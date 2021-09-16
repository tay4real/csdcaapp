(function ($) {
  // MDA list
  $.ajax({
    url: "http://localhost/csdcapp/functions/getAllBanks.php",
    method: "GET",
    success: function (response) {
      var res = JSON.parse(response);
      var len = res.length;

      for (let i = 0; i < len; i++) {
        let name = res[i].name;
        $("#bank_name").append(
          "<option value='" + name + "'>" + name + "</option>"
        );
      }
    },
    error: function (response) {},
  });
})(jQuery);
