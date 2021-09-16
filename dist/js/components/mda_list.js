(function ($) {
  // MDA list
  $.ajax({
    url: "http://localhost/csdcapp/functions/getAllMDAs.php",
    method: "GET",
    success: function (response) {
      var res = JSON.parse(response);
      var len = res.length;

      for (let i = 0; i < len; i++) {
        let code = res[i].code;
        let name = res[i].name;
        $("#parent_mda_code").append(
          "<option value='" + code + "'>" + name + "</option>"
        );
        $("#present_mda_code").append(
          "<option value='" + code + "'>" + name + "</option>"
        );
        $("#salary_pay_point").append(
          "<option value='" + code + "'>" + name + "</option>"
        );
      }
    },
    error: function (response) {},
  });
})(jQuery);
