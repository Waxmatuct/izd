function onClick() {
  var facultet = $("#faculteti option:selected").val();
  var srok_sdachi = $("#srok_sdachi option:selected").val();
  var year = $("#year").val();
  $("tbody").load(template_directory + "/ajax/tbody.php", {
    facultet: facultet,
    srok_sdachi: srok_sdachi,
    year: year,
  });
  // $('#plan').removeClass( "d-none" ).addClass( "d-block" );
  $(".count").load(template_directory + "/ajax/count.php", {
    facultet: facultet,
    srok_sdachi: srok_sdachi,
    year: year,
  });
}

$("#plan-table tbody th").click(function () {
  var text = $(this).text();
  $("#_number").val(text);
  $("#__number").val(text);
});

$(".more-link").addClass("btn btn-primary btn-sm");
$("figcaption").addClass("figure-caption text-center mb-4");
