(function ($) {
  // MDA list
  $.ajax({
    url: "http://localhost/csdcapp/functions/getAllLevels.php",
    method: "GET",
    success: function (response) {
      var res = JSON.parse(response);
      var len = res.length;

      for (let i = 0; i < len; i++) {
        let level = res[i].level;
        $("#level").append(
          "<option value='" + level + "'>" + level + "</option>"
        );
      }
    },
    error: function (response) {},
  });
})(jQuery);
