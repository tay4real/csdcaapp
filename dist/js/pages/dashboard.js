(function ($) {
  // Doughnut chart
  $.ajax({
    url: "http://localhost/csdcapp/functions/get_doughnut_chart_data.php",
    method: "GET",
    success: function (data) {
      var doughnut_chart_labels = [];
      var doughnut_chart_data = [];
      var json_string = JSON.parse(data);
      for (const property in json_string) {
        doughnut_chart_labels.push(property);
        doughnut_chart_data.push(json_string[property]);
      }

      ("use strict");
      $(function () {
        "use strict";

        // Sales graph chart
        var categoryDonutChartCanvas = $("#donut-chart")
          .get(0)
          .getContext("2d");
        // $('#revenue-chart').get(0).getContext('2d');

        var categoryDonutChartData = {
          labels: doughnut_chart_labels,
          datasets: [
            {
              data: doughnut_chart_data,
              backgroundColor: [
                "#f56954",
                "#00a65a",
                "#f39c12",
                "#00c0ef",
                "#3c8dbc",
              ],
            },
          ],
        };

        var categoryDonutChartOptions = {
          maintainAspectRatio: false,
          responsive: true,
        };

        // This will get the first returned node in the jQuery collection.
        // eslint-disable-next-line no-unused-vars
        var categoryDonutChart = new Chart(categoryDonutChartCanvas, {
          // lgtm[js/unused-local-variable]
          type: "doughnut",
          data: categoryDonutChartData,
          options: categoryDonutChartOptions,
        });
      });
    },
    error: function (data) {},
  });

  var stacked_bar_labels = [];
  var stacked_bar_distributed_data = [];
  var stacked_bar_received_data = [];
  $.ajax({
    url: "http://localhost/csdcapp/functions/get_stacked_barchart_data.php",
    method: "GET",
    success: function (data) {
      var newArr = JSON.parse(data);
      var arrayLength = newArr.length;
      for (var i = 0; i < arrayLength; i++) {
        stacked_bar_labels.push(newArr[i].category);
        stacked_bar_distributed_data.push(newArr[i].distribute_total);
        stacked_bar_received_data.push(newArr[i].receive_total);
      }
      ("use strict");
      $(function () {
        var barChartCanvas = $("#bar-chart").get(0).getContext("2d");

        var areaChartData = {
          // labels: stacked_bar_labels,
          labels: ["Jan", "Feb", "March", "April", "May"],
          datasets: [
            {
              label: "In-Service",
              backgroundColor: "rgba(210, 214, 222, 1)",
              borderColor: "rgba(210, 214, 222, 1)",
              pointRadius: false,
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: stacked_bar_received_data,
            },
            {
              label: "Retired",
              backgroundColor: "rgba(60,141,188,0.9)",
              borderColor: "rgba(60,141,188,0.8)",
              pointRadius: false,
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: stacked_bar_distributed_data,
            },
          ],
        };

        var barChartData = $.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0];
        var temp1 = areaChartData.datasets[1];
        barChartData.datasets[0] = temp1;
        barChartData.datasets[1] = temp0;

        var barChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          datasetFill: false,
        };

        new Chart(barChartCanvas, {
          type: "bar",
          data: barChartData,
          options: barChartOptions,
        });

        // End stacked bar chart
      });
    },
    error: function (data) {},
  });
})(jQuery);
