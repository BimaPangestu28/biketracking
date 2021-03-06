/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/dashboard.init.js":
/*!**********************************************!*\
  !*** ./resources/js/pages/dashboard.init.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Qovex - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Dashboard
*/
var date = new Date();
var firstDay = new Date(date.getFullYear(), date.getMonth() + 1, 1);
var lastDay = new Date(date.getFullYear(), date.getMonth() + 2, 0);
$("[name='start']").val("".concat(firstDay.getMonth(), "/").concat(firstDay.getDate(), "/").concat(firstDay.getFullYear()));
$("[name='end']").val("".concat(lastDay.getMonth(), "/").concat(lastDay.getDate(), "/").concat(lastDay.getFullYear()));
$("#filter").click(function (e) {
  var start = $("[name='start']").val().split("/");
  var end = $("[name='end']").val().split("/");
  $.ajax({
    url: "/api/dashboard?start=".concat(start[2], "-").concat(start[0], "-").concat(start[1], "&end=").concat(end[2], "-").concat(end[0], "-").concat(end[1]),
    method: "get"
  }).then(function (resp) {
    $("#total-user").text(resp.total_users);
    $("#total-trip").text(resp.total_trips);
    $("#total-distance").text(resp.total_distances);
    $("#total-fuel").text(resp.total_fuel_reduce);
  });
}); // line chart
// var options = {
//   series: [
//     {
//       name: "2018",
//       type: "line",
//       data: [20, 34, 27, 59, 37, 26, 38, 25],
//     },
//   ],
//   chart: {
//     height: 260,
//     type: "line",
//     toolbar: {
//       show: false,
//     },
//     zoom: {
//       enabled: false,
//     },
//   },
//   colors: ["#3b5de7"],
//   dataLabels: {
//     enabled: false,
//   },
//   stroke: {
//     curve: "smooth",
//     width: "3",
//     dashArray: [4, 0],
//   },
//   markers: {
//     size: 3,
//   },
//   xaxis: {
//     categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
//     title: {
//       text: "Month",
//     },
//   },
//   fill: {
//     type: "solid",
//     opacity: [1, 0.1],
//   },
//   legend: {
//     position: "top",
//     horizontalAlign: "right",
//   },
// };
// var chart = new ApexCharts(
//   document.querySelector("#line-chart-total-users"),
//   options
// );
// chart.render();
// // line chart
// var options = {
//   series: [
//     {
//       name: "2018",
//       type: "line",
//       data: [20, 34, 27, 59, 37, 26, 38, 25],
//     },
//   ],
//   chart: {
//     height: 260,
//     type: "line",
//     toolbar: {
//       show: false,
//     },
//     zoom: {
//       enabled: false,
//     },
//   },
//   colors: ["#3b5de7"],
//   dataLabels: {
//     enabled: false,
//   },
//   stroke: {
//     curve: "smooth",
//     width: "3",
//     dashArray: [4, 0],
//   },
//   markers: {
//     size: 3,
//   },
//   xaxis: {
//     categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
//     title: {
//       text: "Month",
//     },
//   },
//   fill: {
//     type: "solid",
//     opacity: [1, 0.1],
//   },
//   legend: {
//     position: "top",
//     horizontalAlign: "right",
//   },
// };
// var chart = new ApexCharts(
//   document.querySelector("#line-chart-total-trips"),
//   options
// );
// chart.render();
// // line chart
// var options = {
//   series: [
//     {
//       name: "2018",
//       type: "line",
//       data: [20, 34, 27, 59, 37, 26, 38, 25],
//     },
//   ],
//   chart: {
//     height: 260,
//     type: "line",
//     toolbar: {
//       show: false,
//     },
//     zoom: {
//       enabled: false,
//     },
//   },
//   colors: ["#3b5de7"],
//   dataLabels: {
//     enabled: false,
//   },
//   stroke: {
//     curve: "smooth",
//     width: "3",
//     dashArray: [4, 0],
//   },
//   markers: {
//     size: 3,
//   },
//   xaxis: {
//     categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
//     title: {
//       text: "Month",
//     },
//   },
//   fill: {
//     type: "solid",
//     opacity: [1, 0.1],
//   },
//   legend: {
//     position: "top",
//     horizontalAlign: "right",
//   },
// };
// var chart = new ApexCharts(
//   document.querySelector("#line-chart-total-distances"),
//   options
// );
// chart.render();
// // line chart
// var options = {
//   series: [
//     {
//       name: "2018",
//       type: "line",
//       data: [20, 34, 27, 59, 37, 26, 38, 25],
//     },
//   ],
//   chart: {
//     height: 260,
//     type: "line",
//     toolbar: {
//       show: false,
//     },
//     zoom: {
//       enabled: false,
//     },
//   },
//   colors: ["#3b5de7"],
//   dataLabels: {
//     enabled: false,
//   },
//   stroke: {
//     curve: "smooth",
//     width: "3",
//     dashArray: [4, 0],
//   },
//   markers: {
//     size: 3,
//   },
//   xaxis: {
//     categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
//     title: {
//       text: "Month",
//     },
//   },
//   fill: {
//     type: "solid",
//     opacity: [1, 0.1],
//   },
//   legend: {
//     position: "top",
//     horizontalAlign: "right",
//   },
// };
// var chart = new ApexCharts(
//   document.querySelector("#line-chart-total-fuel"),
//   options
// );
// chart.render();

/***/ }),

/***/ 4:
/*!****************************************************!*\
  !*** multi ./resources/js/pages/dashboard.init.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/macbook/Desktop/Projects/biketracking/admin/resources/js/pages/dashboard.init.js */"./resources/js/pages/dashboard.init.js");


/***/ })

/******/ });