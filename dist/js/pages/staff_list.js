$(function () {
  $("#example1")
    .DataTable({
      ajax: "http://localhost/csdcapp/functions/get_all_staff_data.php",
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      aProcessing: true,
      aServerSide: true,
    })
    .buttons()
    .container()
    .appendTo("#example1_wrapper .col-md-6:eq(0)");
});
