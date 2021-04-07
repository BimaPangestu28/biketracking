/*
Template Name: Qovex - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Dashboard
*/

var date = new Date();
var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

$("[name='start']").val(
  `${firstDay.getMonth()}/${firstDay.getDate()}/${firstDay.getFullYear()}`
);
$("[name='end']").val(
  `${lastDay.getMonth()}/${lastDay.getDate()}/${lastDay.getFullYear()}`
);

// line chart
var options = {
  series: [
    {
      name: "2018",
      type: "line",
      data: [20, 34, 27, 59, 37, 26, 38, 25],
    },
  ],
  chart: {
    height: 260,
    type: "line",

    toolbar: {
      show: false,
    },
    zoom: {
      enabled: false,
    },
  },
  colors: ["#3b5de7"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: "3",
    dashArray: [4, 0],
  },

  markers: {
    size: 3,
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
    title: {
      text: "Month",
    },
  },

  fill: {
    type: "solid",
    opacity: [1, 0.1],
  },

  legend: {
    position: "top",
    horizontalAlign: "right",
  },
};

var chart = new ApexCharts(
  document.querySelector("#line-chart-total-users"),
  options
);
chart.render();

// line chart
var options = {
  series: [
    {
      name: "2018",
      type: "line",
      data: [20, 34, 27, 59, 37, 26, 38, 25],
    },
  ],
  chart: {
    height: 260,
    type: "line",

    toolbar: {
      show: false,
    },
    zoom: {
      enabled: false,
    },
  },
  colors: ["#3b5de7"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: "3",
    dashArray: [4, 0],
  },

  markers: {
    size: 3,
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
    title: {
      text: "Month",
    },
  },

  fill: {
    type: "solid",
    opacity: [1, 0.1],
  },

  legend: {
    position: "top",
    horizontalAlign: "right",
  },
};

var chart = new ApexCharts(
  document.querySelector("#line-chart-total-trips"),
  options
);
chart.render();

// line chart
var options = {
  series: [
    {
      name: "2018",
      type: "line",
      data: [20, 34, 27, 59, 37, 26, 38, 25],
    },
  ],
  chart: {
    height: 260,
    type: "line",

    toolbar: {
      show: false,
    },
    zoom: {
      enabled: false,
    },
  },
  colors: ["#3b5de7"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: "3",
    dashArray: [4, 0],
  },

  markers: {
    size: 3,
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
    title: {
      text: "Month",
    },
  },

  fill: {
    type: "solid",
    opacity: [1, 0.1],
  },

  legend: {
    position: "top",
    horizontalAlign: "right",
  },
};

var chart = new ApexCharts(
  document.querySelector("#line-chart-total-distances"),
  options
);
chart.render();

// line chart
var options = {
  series: [
    {
      name: "2018",
      type: "line",
      data: [20, 34, 27, 59, 37, 26, 38, 25],
    },
  ],
  chart: {
    height: 260,
    type: "line",

    toolbar: {
      show: false,
    },
    zoom: {
      enabled: false,
    },
  },
  colors: ["#3b5de7"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: "3",
    dashArray: [4, 0],
  },

  markers: {
    size: 3,
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
    title: {
      text: "Month",
    },
  },

  fill: {
    type: "solid",
    opacity: [1, 0.1],
  },

  legend: {
    position: "top",
    horizontalAlign: "right",
  },
};

var chart = new ApexCharts(
  document.querySelector("#line-chart-total-fuel"),
  options
);
chart.render();
