(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[52],{

/***/ "./resources/js/Pages/Error.js":
/*!*************************************!*\
  !*** ./resources/js/Pages/Error.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ \"./node_modules/react/index.js\");\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var react_helmet__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-helmet */ \"./node_modules/react-helmet/lib/Helmet.js\");\n/* harmony import */ var react_helmet__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_helmet__WEBPACK_IMPORTED_MODULE_1__);\n\n // import { usePage } from '@inertiajs/inertia-react';\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (function (_ref) {\n  var status = _ref.status;\n  // const { status } = usePage();\n  var title = {\n    503: '503: Service Unavailable',\n    500: '500: Server Error',\n    404: '404: Page Not Found',\n    403: '403: Forbidden'\n  }[status];\n  var description = {\n    503: 'Sorry, we are doing some maintenance. Please check back soon.',\n    500: 'Whoops, something went wrong on our servers.',\n    404: 'Sorry, the page you are looking for could not be found.',\n    403: 'Sorry, you are forbidden from accessing this page.'\n  }[status];\n  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(\"div\", {\n    className: \"p-5 bg-indigo-800 text-indigo-100 min-h-screen flex justify-center items-center\"\n  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_helmet__WEBPACK_IMPORTED_MODULE_1___default.a, {\n    title: title\n  }), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(\"div\", {\n    className: \"w-full max-w-md\"\n  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(\"h1\", {\n    className: \"text-3xl\"\n  }, title), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(\"p\", {\n    className: \"mt-3 text-lg leading-tight\"\n  }, description)));\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvUGFnZXMvRXJyb3IuanM/MDNkMiJdLCJuYW1lcyI6WyJzdGF0dXMiLCJ0aXRsZSIsImRlc2NyaXB0aW9uIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7Q0FFQTs7QUFFZSwrRUFBZ0I7QUFBQSxNQUFiQSxNQUFhLFFBQWJBLE1BQWE7QUFDM0I7QUFFQSxNQUFNQyxLQUFLLEdBQUc7QUFDVixTQUFLLDBCQURLO0FBRVYsU0FBSyxtQkFGSztBQUdWLFNBQUsscUJBSEs7QUFJVixTQUFLO0FBSkssSUFLWkQsTUFMWSxDQUFkO0FBT0EsTUFBTUUsV0FBVyxHQUFHO0FBQ2hCLFNBQUssK0RBRFc7QUFFaEIsU0FBSyw4Q0FGVztBQUdoQixTQUFLLHlEQUhXO0FBSWhCLFNBQUs7QUFKVyxJQUtsQkYsTUFMa0IsQ0FBcEI7QUFPQSxzQkFDSTtBQUFLLGFBQVMsRUFBQztBQUFmLGtCQUNJLDJEQUFDLG1EQUFEO0FBQVEsU0FBSyxFQUFFQztBQUFmLElBREosZUFFSTtBQUFLLGFBQVMsRUFBQztBQUFmLGtCQUNJO0FBQUksYUFBUyxFQUFDO0FBQWQsS0FBMEJBLEtBQTFCLENBREosZUFFSTtBQUFHLGFBQVMsRUFBQztBQUFiLEtBQTJDQyxXQUEzQyxDQUZKLENBRkosQ0FESjtBQVNILENBMUJEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL1BhZ2VzL0Vycm9yLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IFJlYWN0IGZyb20gJ3JlYWN0JztcbmltcG9ydCBIZWxtZXQgZnJvbSAncmVhY3QtaGVsbWV0Jztcbi8vIGltcG9ydCB7IHVzZVBhZ2UgfSBmcm9tICdAaW5lcnRpYWpzL2luZXJ0aWEtcmVhY3QnO1xuXG5leHBvcnQgZGVmYXVsdCAoeyBzdGF0dXMgfSkgPT4ge1xuICAgIC8vIGNvbnN0IHsgc3RhdHVzIH0gPSB1c2VQYWdlKCk7XG5cbiAgICBjb25zdCB0aXRsZSA9IHtcbiAgICAgICAgNTAzOiAnNTAzOiBTZXJ2aWNlIFVuYXZhaWxhYmxlJyxcbiAgICAgICAgNTAwOiAnNTAwOiBTZXJ2ZXIgRXJyb3InLFxuICAgICAgICA0MDQ6ICc0MDQ6IFBhZ2UgTm90IEZvdW5kJyxcbiAgICAgICAgNDAzOiAnNDAzOiBGb3JiaWRkZW4nXG4gICAgfVtzdGF0dXNdO1xuXG4gICAgY29uc3QgZGVzY3JpcHRpb24gPSB7XG4gICAgICAgIDUwMzogJ1NvcnJ5LCB3ZSBhcmUgZG9pbmcgc29tZSBtYWludGVuYW5jZS4gUGxlYXNlIGNoZWNrIGJhY2sgc29vbi4nLFxuICAgICAgICA1MDA6ICdXaG9vcHMsIHNvbWV0aGluZyB3ZW50IHdyb25nIG9uIG91ciBzZXJ2ZXJzLicsXG4gICAgICAgIDQwNDogJ1NvcnJ5LCB0aGUgcGFnZSB5b3UgYXJlIGxvb2tpbmcgZm9yIGNvdWxkIG5vdCBiZSBmb3VuZC4nLFxuICAgICAgICA0MDM6ICdTb3JyeSwgeW91IGFyZSBmb3JiaWRkZW4gZnJvbSBhY2Nlc3NpbmcgdGhpcyBwYWdlLidcbiAgICB9W3N0YXR1c107XG5cbiAgICByZXR1cm4gKFxuICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cInAtNSBiZy1pbmRpZ28tODAwIHRleHQtaW5kaWdvLTEwMCBtaW4taC1zY3JlZW4gZmxleCBqdXN0aWZ5LWNlbnRlciBpdGVtcy1jZW50ZXJcIj5cbiAgICAgICAgICAgIDxIZWxtZXQgdGl0bGU9e3RpdGxlfSAvPlxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJ3LWZ1bGwgbWF4LXctbWRcIj5cbiAgICAgICAgICAgICAgICA8aDEgY2xhc3NOYW1lPVwidGV4dC0zeGxcIj57dGl0bGV9PC9oMT5cbiAgICAgICAgICAgICAgICA8cCBjbGFzc05hbWU9XCJtdC0zIHRleHQtbGcgbGVhZGluZy10aWdodFwiPntkZXNjcmlwdGlvbn08L3A+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgPC9kaXY+XG4gICAgKTtcbn07XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/Pages/Error.js\n");

/***/ })

}]);