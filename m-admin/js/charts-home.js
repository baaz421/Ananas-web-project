/*global $, document, Chart, LINECHART, data, options, window*/
$(document).ready(function () {
  

  'use strict';

    // ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
  var legendState = true;
  if ($(window).outerWidth() < 576) {
    legendState = false;
  }

  var LINECHART = $('#lineCahrt');
  var myLineChart = new Chart(LINECHART, {
    type: 'line',
    options: {
      scales: {
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          display: true,
          gridLines: {
            display: false
          }
        }]
      },
      legend: {
        display: legendState
      }
    },
    data: {
      labels: line_chart_label,
      datasets: [
      {
        label: labelRed,
        fill: true,
        lineTension: 0,
        backgroundColor: "transparent",
        borderColor: 'red',
        pointBorderColor: 'red',
        pointHoverBackgroundColor: 'red',
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.1,
        borderJoinStyle: 'miter',
        borderWidth: 2,
        pointBackgroundColor: "#fff",
        pointBorderWidth: 3,
        pointHoverRadius: 5,
        pointHoverBorderColor: "#fff",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: line_chart_red_data,
        spanGaps: false
      },
      {
        label: labelOrange,
        fill: true,
        lineTension: 0,
        backgroundColor: "transparent",
        borderColor: "orange",
        pointHoverBackgroundColor: "orange",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        borderWidth: 2,
        pointBorderColor: "orange",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 3,
        pointHoverRadius: 5,
        pointHoverBorderColor: "#fff",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: line_chart_orange_data,
        spanGaps: false
      },
      {
        label: labelGreen,
        fill: true,
        lineTension: 0,
        backgroundColor: "transparent",
        borderColor: "green",
        pointHoverBackgroundColor: "green",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        borderWidth: 2,
        pointBorderColor: "green",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 3,
        pointHoverRadius: 5,
        pointHoverBorderColor: "#fff",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: line_chart_green_data,
        spanGaps: false
      }
      ]
    }
  });



    // ------------------------------------------------------- //
    // Line Chart 1
    // ------------------------------------------------------ //
  var LINECHART1 = $('#lineChart1');
  var myLineChart = new Chart(LINECHART1, {
    type: 'line',
    options: {
      scales: {
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          ticks: {
            max: 40,
            min: 0,
            stepSize: 0.5
          },
          display: false,
          gridLines: {
            display: false
          }
        }]
      },
      legend: {
        display: false
      }
    },
    data: {
      labels: ["A", "B", "C", "D", "E", "F", "G"],
      datasets: [
      {
        label: "Total Overdue",
        fill: true,
        lineTension: 0,
        backgroundColor: "transparent",
        borderColor: '#6ccef0',
        pointBorderColor: '#59c2e6',
        pointHoverBackgroundColor: '#59c2e6',
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        borderWidth: 3,
        pointBackgroundColor: "#59c2e6",
        pointBorderWidth: 0,
        pointHoverRadius: 4,
        pointHoverBorderColor: "#fff",
        pointHoverBorderWidth: 0,
        pointRadius: 4,
        pointHitRadius: 0,
        data: [20, 28, 30, 22, 24, 10, 7],
        spanGaps: false
      }
      ]
    }
  });



    // ------------------------------------------------------- //
    // Pie Chart
    // ------------------------------------------------------ //
  var PIECHART = $('#pieChart');
  var myPieChart = new Chart(PIECHART, {
    type: 'doughnut',
    options: {
      cutoutPercentage: 80,
      legend: {
        display: false
      }
    },
    data: {
      labels: [
        "First",
        "Second",
        "Third",
        "Fourth"
        ],
      datasets: [
      {
        data: [300, 50, 100, 60],
        borderWidth: [4, 4, 4, 4],
        backgroundColor: [
          '#44b2d7',
          "#59c2e6",
          "#71d1f2",
          "#96e5ff"
          ],
        hoverBackgroundColor: [
          '#44b2d7',
          "#59c2e6",
          "#71d1f2",
          "#96e5ff"
          ]
      }]
    }
  });


    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
  var BARCHARTHOME = $('#barChartHome');
  var barChartHome = new Chart(BARCHARTHOME, {
    type: 'bar',
    options:
    {
      scales:
      {
        xAxes: [{
          display: false
        }],
        yAxes: [{
          display: false
        }],
      },
      legend: {
        display: false
      }
    },
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "November", "December"],
      datasets: [
      {
        label: "Data Set 1",
        backgroundColor: [
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)'
          ],
        borderColor: [
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)',
          'rgb(121, 106, 238)'
          ],
        borderWidth: 1,
        data: [35, 49, 55, 68, 81, 95, 85, 40, 30, 27, 22, 15]
      }
      ]
    }
  });

});
