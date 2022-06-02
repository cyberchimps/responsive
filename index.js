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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

module.exports = _arrayLikeToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithHoles.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

module.exports = _arrayWithHoles;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return arrayLikeToArray(arr);
}

module.exports = _arrayWithoutHoles;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/assertThisInitialized.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

module.exports = _assertThisInitialized;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/defineProperty.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

module.exports = _defineProperty;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/extends.js":
/*!********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/extends.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _extends() {
  module.exports = _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _extends.apply(this, arguments);
}

module.exports = _extends;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/getPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _getPrototypeOf(o) {
  module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _getPrototypeOf(o);
}

module.exports = _getPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/inherits.js":
/*!*********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/inherits.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var setPrototypeOf = __webpack_require__(/*! ./setPrototypeOf.js */ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js");

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) setPrototypeOf(subClass, superClass);
}

module.exports = _inherits;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArray.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArray.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}

module.exports = _iterableToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArrayLimit(arr, i) {
  var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"];

  if (_i == null) return;
  var _arr = [];
  var _n = true;
  var _d = false;

  var _s, _e;

  try {
    for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

module.exports = _iterableToArrayLimit;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableRest.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableRest.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableRest;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableSpread.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableSpread;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var _typeof = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js")["default"];

var assertThisInitialized = __webpack_require__(/*! ./assertThisInitialized.js */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return assertThisInitialized(self);
}

module.exports = _possibleConstructorReturn;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/setPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _setPrototypeOf(o, p) {
  module.exports = _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _setPrototypeOf(o, p);
}

module.exports = _setPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/slicedToArray.js":
/*!**************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/slicedToArray.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithHoles = __webpack_require__(/*! ./arrayWithHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js");

var iterableToArrayLimit = __webpack_require__(/*! ./iterableToArrayLimit.js */ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableRest = __webpack_require__(/*! ./nonIterableRest.js */ "./node_modules/@babel/runtime/helpers/nonIterableRest.js");

function _slicedToArray(arr, i) {
  return arrayWithHoles(arr) || iterableToArrayLimit(arr, i) || unsupportedIterableToArray(arr, i) || nonIterableRest();
}

module.exports = _slicedToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/toConsumableArray.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toConsumableArray.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithoutHoles = __webpack_require__(/*! ./arrayWithoutHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js");

var iterableToArray = __webpack_require__(/*! ./iterableToArray.js */ "./node_modules/@babel/runtime/helpers/iterableToArray.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableSpread = __webpack_require__(/*! ./nonIterableSpread.js */ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js");

function _toConsumableArray(arr) {
  return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
}

module.exports = _toConsumableArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    module.exports = _typeof = function _typeof(obj) {
      return typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  } else {
    module.exports = _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  }

  return _typeof(obj);
}

module.exports = _typeof;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
}

module.exports = _unsupportedIterableToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./node_modules/object-assign/index.js":
/*!*********************************************!*\
  !*** ./node_modules/object-assign/index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/


/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};


/***/ }),

/***/ "./node_modules/prop-types/checkPropTypes.js":
/*!***************************************************!*\
  !*** ./node_modules/prop-types/checkPropTypes.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var printWarning = function() {};

if (true) {
  var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
  var loggedTypeFailures = {};
  var has = Function.call.bind(Object.prototype.hasOwnProperty);

  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

/**
 * Assert that the values match with the type specs.
 * Error messages are memorized and will only be shown once.
 *
 * @param {object} typeSpecs Map of name to a ReactPropType
 * @param {object} values Runtime values that need to be type-checked
 * @param {string} location e.g. "prop", "context", "child context"
 * @param {string} componentName Name of the component for error messages.
 * @param {?Function} getStack Returns the component stack.
 * @private
 */
function checkPropTypes(typeSpecs, values, location, componentName, getStack) {
  if (true) {
    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error;
        // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.
        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            var err = Error(
              (componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' +
              'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.'
            );
            err.name = 'Invariant Violation';
            throw err;
          }
          error = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, ReactPropTypesSecret);
        } catch (ex) {
          error = ex;
        }
        if (error && !(error instanceof Error)) {
          printWarning(
            (componentName || 'React class') + ': type specification of ' +
            location + ' `' + typeSpecName + '` is invalid; the type checker ' +
            'function must return `null` or an `Error` but returned a ' + typeof error + '. ' +
            'You may have forgotten to pass an argument to the type checker ' +
            'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' +
            'shape all require an argument).'
          );
        }
        if (error instanceof Error && !(error.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error.message] = true;

          var stack = getStack ? getStack() : '';

          printWarning(
            'Failed ' + location + ' type: ' + error.message + (stack != null ? stack : '')
          );
        }
      }
    }
  }
}

/**
 * Resets warning cache when testing.
 *
 * @private
 */
checkPropTypes.resetWarningCache = function() {
  if (true) {
    loggedTypeFailures = {};
  }
}

module.exports = checkPropTypes;


/***/ }),

/***/ "./node_modules/prop-types/factoryWithTypeCheckers.js":
/*!************************************************************!*\
  !*** ./node_modules/prop-types/factoryWithTypeCheckers.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");
var assign = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");

var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
var checkPropTypes = __webpack_require__(/*! ./checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

var has = Function.call.bind(Object.prototype.hasOwnProperty);
var printWarning = function() {};

if (true) {
  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

function emptyFunctionThatReturnsNull() {
  return null;
}

module.exports = function(isValidElement, throwOnDirectAccess) {
  /* global Symbol */
  var ITERATOR_SYMBOL = typeof Symbol === 'function' && Symbol.iterator;
  var FAUX_ITERATOR_SYMBOL = '@@iterator'; // Before Symbol spec.

  /**
   * Returns the iterator method function contained on the iterable object.
   *
   * Be sure to invoke the function with the iterable as context:
   *
   *     var iteratorFn = getIteratorFn(myIterable);
   *     if (iteratorFn) {
   *       var iterator = iteratorFn.call(myIterable);
   *       ...
   *     }
   *
   * @param {?object} maybeIterable
   * @return {?function}
   */
  function getIteratorFn(maybeIterable) {
    var iteratorFn = maybeIterable && (ITERATOR_SYMBOL && maybeIterable[ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL]);
    if (typeof iteratorFn === 'function') {
      return iteratorFn;
    }
  }

  /**
   * Collection of methods that allow declaration and validation of props that are
   * supplied to React components. Example usage:
   *
   *   var Props = require('ReactPropTypes');
   *   var MyArticle = React.createClass({
   *     propTypes: {
   *       // An optional string prop named "description".
   *       description: Props.string,
   *
   *       // A required enum prop named "category".
   *       category: Props.oneOf(['News','Photos']).isRequired,
   *
   *       // A prop named "dialog" that requires an instance of Dialog.
   *       dialog: Props.instanceOf(Dialog).isRequired
   *     },
   *     render: function() { ... }
   *   });
   *
   * A more formal specification of how these methods are used:
   *
   *   type := array|bool|func|object|number|string|oneOf([...])|instanceOf(...)
   *   decl := ReactPropTypes.{type}(.isRequired)?
   *
   * Each and every declaration produces a function with the same signature. This
   * allows the creation of custom validation functions. For example:
   *
   *  var MyLink = React.createClass({
   *    propTypes: {
   *      // An optional string or URI prop named "href".
   *      href: function(props, propName, componentName) {
   *        var propValue = props[propName];
   *        if (propValue != null && typeof propValue !== 'string' &&
   *            !(propValue instanceof URI)) {
   *          return new Error(
   *            'Expected a string or an URI for ' + propName + ' in ' +
   *            componentName
   *          );
   *        }
   *      }
   *    },
   *    render: function() {...}
   *  });
   *
   * @internal
   */

  var ANONYMOUS = '<<anonymous>>';

  // Important!
  // Keep this list in sync with production version in `./factoryWithThrowingShims.js`.
  var ReactPropTypes = {
    array: createPrimitiveTypeChecker('array'),
    bool: createPrimitiveTypeChecker('boolean'),
    func: createPrimitiveTypeChecker('function'),
    number: createPrimitiveTypeChecker('number'),
    object: createPrimitiveTypeChecker('object'),
    string: createPrimitiveTypeChecker('string'),
    symbol: createPrimitiveTypeChecker('symbol'),

    any: createAnyTypeChecker(),
    arrayOf: createArrayOfTypeChecker,
    element: createElementTypeChecker(),
    elementType: createElementTypeTypeChecker(),
    instanceOf: createInstanceTypeChecker,
    node: createNodeChecker(),
    objectOf: createObjectOfTypeChecker,
    oneOf: createEnumTypeChecker,
    oneOfType: createUnionTypeChecker,
    shape: createShapeTypeChecker,
    exact: createStrictShapeTypeChecker,
  };

  /**
   * inlined Object.is polyfill to avoid requiring consumers ship their own
   * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/is
   */
  /*eslint-disable no-self-compare*/
  function is(x, y) {
    // SameValue algorithm
    if (x === y) {
      // Steps 1-5, 7-10
      // Steps 6.b-6.e: +0 != -0
      return x !== 0 || 1 / x === 1 / y;
    } else {
      // Step 6.a: NaN == NaN
      return x !== x && y !== y;
    }
  }
  /*eslint-enable no-self-compare*/

  /**
   * We use an Error-like object for backward compatibility as people may call
   * PropTypes directly and inspect their output. However, we don't use real
   * Errors anymore. We don't inspect their stack anyway, and creating them
   * is prohibitively expensive if they are created too often, such as what
   * happens in oneOfType() for any type before the one that matched.
   */
  function PropTypeError(message) {
    this.message = message;
    this.stack = '';
  }
  // Make `instanceof Error` still work for returned errors.
  PropTypeError.prototype = Error.prototype;

  function createChainableTypeChecker(validate) {
    if (true) {
      var manualPropTypeCallCache = {};
      var manualPropTypeWarningCount = 0;
    }
    function checkType(isRequired, props, propName, componentName, location, propFullName, secret) {
      componentName = componentName || ANONYMOUS;
      propFullName = propFullName || propName;

      if (secret !== ReactPropTypesSecret) {
        if (throwOnDirectAccess) {
          // New behavior only for users of `prop-types` package
          var err = new Error(
            'Calling PropTypes validators directly is not supported by the `prop-types` package. ' +
            'Use `PropTypes.checkPropTypes()` to call them. ' +
            'Read more at http://fb.me/use-check-prop-types'
          );
          err.name = 'Invariant Violation';
          throw err;
        } else if ( true && typeof console !== 'undefined') {
          // Old behavior for people using React.PropTypes
          var cacheKey = componentName + ':' + propName;
          if (
            !manualPropTypeCallCache[cacheKey] &&
            // Avoid spamming the console because they are often not actionable except for lib authors
            manualPropTypeWarningCount < 3
          ) {
            printWarning(
              'You are manually calling a React.PropTypes validation ' +
              'function for the `' + propFullName + '` prop on `' + componentName  + '`. This is deprecated ' +
              'and will throw in the standalone `prop-types` package. ' +
              'You may be seeing this warning due to a third-party PropTypes ' +
              'library. See https://fb.me/react-warning-dont-call-proptypes ' + 'for details.'
            );
            manualPropTypeCallCache[cacheKey] = true;
            manualPropTypeWarningCount++;
          }
        }
      }
      if (props[propName] == null) {
        if (isRequired) {
          if (props[propName] === null) {
            return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required ' + ('in `' + componentName + '`, but its value is `null`.'));
          }
          return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required in ' + ('`' + componentName + '`, but its value is `undefined`.'));
        }
        return null;
      } else {
        return validate(props, propName, componentName, location, propFullName);
      }
    }

    var chainedCheckType = checkType.bind(null, false);
    chainedCheckType.isRequired = checkType.bind(null, true);

    return chainedCheckType;
  }

  function createPrimitiveTypeChecker(expectedType) {
    function validate(props, propName, componentName, location, propFullName, secret) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== expectedType) {
        // `propValue` being instance of, say, date/regexp, pass the 'object'
        // check, but we can offer a more precise error message here rather than
        // 'of type `object`'.
        var preciseType = getPreciseType(propValue);

        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + preciseType + '` supplied to `' + componentName + '`, expected ') + ('`' + expectedType + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createAnyTypeChecker() {
    return createChainableTypeChecker(emptyFunctionThatReturnsNull);
  }

  function createArrayOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside arrayOf.');
      }
      var propValue = props[propName];
      if (!Array.isArray(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an array.'));
      }
      for (var i = 0; i < propValue.length; i++) {
        var error = typeChecker(propValue, i, componentName, location, propFullName + '[' + i + ']', ReactPropTypesSecret);
        if (error instanceof Error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!isValidElement(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!ReactIs.isValidElementType(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement type.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createInstanceTypeChecker(expectedClass) {
    function validate(props, propName, componentName, location, propFullName) {
      if (!(props[propName] instanceof expectedClass)) {
        var expectedClassName = expectedClass.name || ANONYMOUS;
        var actualClassName = getClassName(props[propName]);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + actualClassName + '` supplied to `' + componentName + '`, expected ') + ('instance of `' + expectedClassName + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createEnumTypeChecker(expectedValues) {
    if (!Array.isArray(expectedValues)) {
      if (true) {
        if (arguments.length > 1) {
          printWarning(
            'Invalid arguments supplied to oneOf, expected an array, got ' + arguments.length + ' arguments. ' +
            'A common mistake is to write oneOf(x, y, z) instead of oneOf([x, y, z]).'
          );
        } else {
          printWarning('Invalid argument supplied to oneOf, expected an array.');
        }
      }
      return emptyFunctionThatReturnsNull;
    }

    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      for (var i = 0; i < expectedValues.length; i++) {
        if (is(propValue, expectedValues[i])) {
          return null;
        }
      }

      var valuesString = JSON.stringify(expectedValues, function replacer(key, value) {
        var type = getPreciseType(value);
        if (type === 'symbol') {
          return String(value);
        }
        return value;
      });
      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of value `' + String(propValue) + '` ' + ('supplied to `' + componentName + '`, expected one of ' + valuesString + '.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createObjectOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside objectOf.');
      }
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an object.'));
      }
      for (var key in propValue) {
        if (has(propValue, key)) {
          var error = typeChecker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
          if (error instanceof Error) {
            return error;
          }
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createUnionTypeChecker(arrayOfTypeCheckers) {
    if (!Array.isArray(arrayOfTypeCheckers)) {
       true ? printWarning('Invalid argument supplied to oneOfType, expected an instance of array.') : undefined;
      return emptyFunctionThatReturnsNull;
    }

    for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
      var checker = arrayOfTypeCheckers[i];
      if (typeof checker !== 'function') {
        printWarning(
          'Invalid argument supplied to oneOfType. Expected an array of check functions, but ' +
          'received ' + getPostfixForTypeWarning(checker) + ' at index ' + i + '.'
        );
        return emptyFunctionThatReturnsNull;
      }
    }

    function validate(props, propName, componentName, location, propFullName) {
      for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
        var checker = arrayOfTypeCheckers[i];
        if (checker(props, propName, componentName, location, propFullName, ReactPropTypesSecret) == null) {
          return null;
        }
      }

      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createNodeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      if (!isNode(props[propName])) {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`, expected a ReactNode.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      for (var key in shapeTypes) {
        var checker = shapeTypes[key];
        if (!checker) {
          continue;
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createStrictShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      // We need to check all keys in case some are required but missing from
      // props.
      var allKeys = assign({}, props[propName], shapeTypes);
      for (var key in allKeys) {
        var checker = shapeTypes[key];
        if (!checker) {
          return new PropTypeError(
            'Invalid ' + location + ' `' + propFullName + '` key `' + key + '` supplied to `' + componentName + '`.' +
            '\nBad object: ' + JSON.stringify(props[propName], null, '  ') +
            '\nValid keys: ' +  JSON.stringify(Object.keys(shapeTypes), null, '  ')
          );
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }

    return createChainableTypeChecker(validate);
  }

  function isNode(propValue) {
    switch (typeof propValue) {
      case 'number':
      case 'string':
      case 'undefined':
        return true;
      case 'boolean':
        return !propValue;
      case 'object':
        if (Array.isArray(propValue)) {
          return propValue.every(isNode);
        }
        if (propValue === null || isValidElement(propValue)) {
          return true;
        }

        var iteratorFn = getIteratorFn(propValue);
        if (iteratorFn) {
          var iterator = iteratorFn.call(propValue);
          var step;
          if (iteratorFn !== propValue.entries) {
            while (!(step = iterator.next()).done) {
              if (!isNode(step.value)) {
                return false;
              }
            }
          } else {
            // Iterator will provide entry [k,v] tuples rather than values.
            while (!(step = iterator.next()).done) {
              var entry = step.value;
              if (entry) {
                if (!isNode(entry[1])) {
                  return false;
                }
              }
            }
          }
        } else {
          return false;
        }

        return true;
      default:
        return false;
    }
  }

  function isSymbol(propType, propValue) {
    // Native Symbol.
    if (propType === 'symbol') {
      return true;
    }

    // falsy value can't be a Symbol
    if (!propValue) {
      return false;
    }

    // 19.4.3.5 Symbol.prototype[@@toStringTag] === 'Symbol'
    if (propValue['@@toStringTag'] === 'Symbol') {
      return true;
    }

    // Fallback for non-spec compliant Symbols which are polyfilled.
    if (typeof Symbol === 'function' && propValue instanceof Symbol) {
      return true;
    }

    return false;
  }

  // Equivalent of `typeof` but with special handling for array and regexp.
  function getPropType(propValue) {
    var propType = typeof propValue;
    if (Array.isArray(propValue)) {
      return 'array';
    }
    if (propValue instanceof RegExp) {
      // Old webkits (at least until Android 4.0) return 'function' rather than
      // 'object' for typeof a RegExp. We'll normalize this here so that /bla/
      // passes PropTypes.object.
      return 'object';
    }
    if (isSymbol(propType, propValue)) {
      return 'symbol';
    }
    return propType;
  }

  // This handles more types than `getPropType`. Only used for error messages.
  // See `createPrimitiveTypeChecker`.
  function getPreciseType(propValue) {
    if (typeof propValue === 'undefined' || propValue === null) {
      return '' + propValue;
    }
    var propType = getPropType(propValue);
    if (propType === 'object') {
      if (propValue instanceof Date) {
        return 'date';
      } else if (propValue instanceof RegExp) {
        return 'regexp';
      }
    }
    return propType;
  }

  // Returns a string that is postfixed to a warning about an invalid type.
  // For example, "undefined" or "of type array"
  function getPostfixForTypeWarning(value) {
    var type = getPreciseType(value);
    switch (type) {
      case 'array':
      case 'object':
        return 'an ' + type;
      case 'boolean':
      case 'date':
      case 'regexp':
        return 'a ' + type;
      default:
        return type;
    }
  }

  // Returns class name of the object, if any.
  function getClassName(propValue) {
    if (!propValue.constructor || !propValue.constructor.name) {
      return ANONYMOUS;
    }
    return propValue.constructor.name;
  }

  ReactPropTypes.checkPropTypes = checkPropTypes;
  ReactPropTypes.resetWarningCache = checkPropTypes.resetWarningCache;
  ReactPropTypes.PropTypes = ReactPropTypes;

  return ReactPropTypes;
};


/***/ }),

/***/ "./node_modules/prop-types/index.js":
/*!******************************************!*\
  !*** ./node_modules/prop-types/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

if (true) {
  var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");

  // By explicitly using `prop-types` you are opting into new development behavior.
  // http://fb.me/prop-types-in-prod
  var throwOnDirectAccess = true;
  module.exports = __webpack_require__(/*! ./factoryWithTypeCheckers */ "./node_modules/prop-types/factoryWithTypeCheckers.js")(ReactIs.isElement, throwOnDirectAccess);
} else {}


/***/ }),

/***/ "./node_modules/prop-types/lib/ReactPropTypesSecret.js":
/*!*************************************************************!*\
  !*** ./node_modules/prop-types/lib/ReactPropTypesSecret.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),

/***/ "./node_modules/react-is/cjs/react-is.development.js":
/*!***********************************************************!*\
  !*** ./node_modules/react-is/cjs/react-is.development.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/** @license React v16.13.1
 * react-is.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;
var REACT_ELEMENT_TYPE = hasSymbol ? Symbol.for('react.element') : 0xeac7;
var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace; // TODO: We don't use AsyncMode or ConcurrentMode anymore. They were temporary
// (unstable) APIs that have been removed. Can we remove the symbols?

var REACT_ASYNC_MODE_TYPE = hasSymbol ? Symbol.for('react.async_mode') : 0xeacf;
var REACT_CONCURRENT_MODE_TYPE = hasSymbol ? Symbol.for('react.concurrent_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_SUSPENSE_TYPE = hasSymbol ? Symbol.for('react.suspense') : 0xead1;
var REACT_SUSPENSE_LIST_TYPE = hasSymbol ? Symbol.for('react.suspense_list') : 0xead8;
var REACT_MEMO_TYPE = hasSymbol ? Symbol.for('react.memo') : 0xead3;
var REACT_LAZY_TYPE = hasSymbol ? Symbol.for('react.lazy') : 0xead4;
var REACT_BLOCK_TYPE = hasSymbol ? Symbol.for('react.block') : 0xead9;
var REACT_FUNDAMENTAL_TYPE = hasSymbol ? Symbol.for('react.fundamental') : 0xead5;
var REACT_RESPONDER_TYPE = hasSymbol ? Symbol.for('react.responder') : 0xead6;
var REACT_SCOPE_TYPE = hasSymbol ? Symbol.for('react.scope') : 0xead7;

function isValidElementType(type) {
  return typeof type === 'string' || typeof type === 'function' || // Note: its typeof might be other than 'symbol' or 'number' if it's a polyfill.
  type === REACT_FRAGMENT_TYPE || type === REACT_CONCURRENT_MODE_TYPE || type === REACT_PROFILER_TYPE || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || typeof type === 'object' && type !== null && (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || type.$$typeof === REACT_FUNDAMENTAL_TYPE || type.$$typeof === REACT_RESPONDER_TYPE || type.$$typeof === REACT_SCOPE_TYPE || type.$$typeof === REACT_BLOCK_TYPE);
}

function typeOf(object) {
  if (typeof object === 'object' && object !== null) {
    var $$typeof = object.$$typeof;

    switch ($$typeof) {
      case REACT_ELEMENT_TYPE:
        var type = object.type;

        switch (type) {
          case REACT_ASYNC_MODE_TYPE:
          case REACT_CONCURRENT_MODE_TYPE:
          case REACT_FRAGMENT_TYPE:
          case REACT_PROFILER_TYPE:
          case REACT_STRICT_MODE_TYPE:
          case REACT_SUSPENSE_TYPE:
            return type;

          default:
            var $$typeofType = type && type.$$typeof;

            switch ($$typeofType) {
              case REACT_CONTEXT_TYPE:
              case REACT_FORWARD_REF_TYPE:
              case REACT_LAZY_TYPE:
              case REACT_MEMO_TYPE:
              case REACT_PROVIDER_TYPE:
                return $$typeofType;

              default:
                return $$typeof;
            }

        }

      case REACT_PORTAL_TYPE:
        return $$typeof;
    }
  }

  return undefined;
} // AsyncMode is deprecated along with isAsyncMode

var AsyncMode = REACT_ASYNC_MODE_TYPE;
var ConcurrentMode = REACT_CONCURRENT_MODE_TYPE;
var ContextConsumer = REACT_CONTEXT_TYPE;
var ContextProvider = REACT_PROVIDER_TYPE;
var Element = REACT_ELEMENT_TYPE;
var ForwardRef = REACT_FORWARD_REF_TYPE;
var Fragment = REACT_FRAGMENT_TYPE;
var Lazy = REACT_LAZY_TYPE;
var Memo = REACT_MEMO_TYPE;
var Portal = REACT_PORTAL_TYPE;
var Profiler = REACT_PROFILER_TYPE;
var StrictMode = REACT_STRICT_MODE_TYPE;
var Suspense = REACT_SUSPENSE_TYPE;
var hasWarnedAboutDeprecatedIsAsyncMode = false; // AsyncMode should be deprecated

function isAsyncMode(object) {
  {
    if (!hasWarnedAboutDeprecatedIsAsyncMode) {
      hasWarnedAboutDeprecatedIsAsyncMode = true; // Using console['warn'] to evade Babel and ESLint

      console['warn']('The ReactIs.isAsyncMode() alias has been deprecated, ' + 'and will be removed in React 17+. Update your code to use ' + 'ReactIs.isConcurrentMode() instead. It has the exact same API.');
    }
  }

  return isConcurrentMode(object) || typeOf(object) === REACT_ASYNC_MODE_TYPE;
}
function isConcurrentMode(object) {
  return typeOf(object) === REACT_CONCURRENT_MODE_TYPE;
}
function isContextConsumer(object) {
  return typeOf(object) === REACT_CONTEXT_TYPE;
}
function isContextProvider(object) {
  return typeOf(object) === REACT_PROVIDER_TYPE;
}
function isElement(object) {
  return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
}
function isForwardRef(object) {
  return typeOf(object) === REACT_FORWARD_REF_TYPE;
}
function isFragment(object) {
  return typeOf(object) === REACT_FRAGMENT_TYPE;
}
function isLazy(object) {
  return typeOf(object) === REACT_LAZY_TYPE;
}
function isMemo(object) {
  return typeOf(object) === REACT_MEMO_TYPE;
}
function isPortal(object) {
  return typeOf(object) === REACT_PORTAL_TYPE;
}
function isProfiler(object) {
  return typeOf(object) === REACT_PROFILER_TYPE;
}
function isStrictMode(object) {
  return typeOf(object) === REACT_STRICT_MODE_TYPE;
}
function isSuspense(object) {
  return typeOf(object) === REACT_SUSPENSE_TYPE;
}

exports.AsyncMode = AsyncMode;
exports.ConcurrentMode = ConcurrentMode;
exports.ContextConsumer = ContextConsumer;
exports.ContextProvider = ContextProvider;
exports.Element = Element;
exports.ForwardRef = ForwardRef;
exports.Fragment = Fragment;
exports.Lazy = Lazy;
exports.Memo = Memo;
exports.Portal = Portal;
exports.Profiler = Profiler;
exports.StrictMode = StrictMode;
exports.Suspense = Suspense;
exports.isAsyncMode = isAsyncMode;
exports.isConcurrentMode = isConcurrentMode;
exports.isContextConsumer = isContextConsumer;
exports.isContextProvider = isContextProvider;
exports.isElement = isElement;
exports.isForwardRef = isForwardRef;
exports.isFragment = isFragment;
exports.isLazy = isLazy;
exports.isMemo = isMemo;
exports.isPortal = isPortal;
exports.isProfiler = isProfiler;
exports.isStrictMode = isStrictMode;
exports.isSuspense = isSuspense;
exports.isValidElementType = isValidElementType;
exports.typeOf = typeOf;
  })();
}


/***/ }),

/***/ "./node_modules/react-is/index.js":
/*!****************************************!*\
  !*** ./node_modules/react-is/index.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react-is.development.js */ "./node_modules/react-is/cjs/react-is.development.js");
}


/***/ }),

/***/ "./node_modules/react-sortablejs/dist/index.js":
/*!*****************************************************!*\
  !*** ./node_modules/react-sortablejs/dist/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var e=g(__webpack_require__(/*! tiny-invariant */ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js")),t=__webpack_require__(/*! react */ "react"),n=t.Children,r=t.cloneElement,o=t.Component,i=t.createElement,l=t.createRef,a=g(__webpack_require__(/*! classnames */ "./node_modules/classnames/index.js")),c=__webpack_require__(/*! sortablejs */ "./node_modules/sortablejs/modular/sortable.esm.js"),s=g(c);exports.Sortable=s;var u=c.Direction;exports.Direction=u;var f=c.DOMRect;exports.DOMRect=f;var p=c.GroupOptions;exports.GroupOptions=p;var d=c.MoveEvent;exports.MoveEvent=d;var b=c.Options;exports.Options=b;var y=c.PullResult;exports.PullResult=y;var v=c.PutResult;exports.PutResult=v;var h=c.SortableEvent;exports.SortableEvent=h;var m=c.SortableOptions;exports.SortableOptions=m;var O=c.Utils;function g(e){return e&&e.__esModule?e.default:e}function w(e,t){if(null==e)return{};var n,r,o=function(e,t){if(null==e)return{};var n,r,o={},i=Object.keys(e);for(r=0;r<i.length;r++)n=i[r],t.indexOf(n)>=0||(o[n]=e[n]);return o}(e,t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(r=0;r<i.length;r++)n=i[r],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(o[n]=e[n])}return o}function S(e){return function(e){if(Array.isArray(e))return j(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return j(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return j(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function j(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function x(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function I(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?x(Object(n),!0).forEach((function(t){P(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):x(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function P(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function E(e){null!==e.parentElement&&e.parentElement.removeChild(e)}function k(e){e.forEach((function(e){return E(e.element)}))}function C(e){e.forEach((function(e){var t,n,r,o;t=e.parentElement,n=e.element,r=e.oldIndex,o=t.children[r]||null,t.insertBefore(n,o)}))}function D(e,t){var n=M(e),r={parentElement:e.from},o=[];switch(n){case"normal":o=[{element:e.item,newIndex:e.newIndex,oldIndex:e.oldIndex,parentElement:e.from}];break;case"swap":o=[I({element:e.item,oldIndex:e.oldIndex,newIndex:e.newIndex},r),I({element:e.swapItem,oldIndex:e.newIndex,newIndex:e.oldIndex},r)];break;case"multidrag":o=e.oldIndicies.map((function(t,n){return I({element:t.multiDragElement,oldIndex:t.index,newIndex:e.newIndicies[n].index},r)}))}return function(e,t){return e.map((function(e){return I(I({},e),{},{item:t[e.oldIndex]})})).sort((function(e,t){return e.oldIndex-t.oldIndex}))}(o,t)}function A(e,t){var n=S(t);return e.concat().reverse().forEach((function(e){return n.splice(e.oldIndex,1)})),n}function R(e,t,n,r){var o=S(t);return e.forEach((function(e){var t=r&&n&&r(e.item,n);o.splice(e.newIndex,0,t||e.item)})),o}function M(e){return e.oldIndicies&&e.oldIndicies.length>0?"multidrag":e.swapItem?"swap":"normal"}function U(e){return(U="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function L(e){return function(e){if(Array.isArray(e))return _(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return _(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return _(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function _(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function H(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function N(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?H(Object(n),!0).forEach((function(t){B(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):H(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function q(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function T(e,t){return(T=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function F(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=$(e);if(t){var o=$(this).constructor;n=Reflect.construct(r,arguments,o)}else n=r.apply(this,arguments);return G(this,n)}}function G(e,t){return!t||"object"!==U(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function $(e){return($=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function B(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}exports.Utils=O;var J={dragging:null},z=function(t){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&T(e,t)}(d,o);var c,u,f,p=F(d);function d(t){var n;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,d),(n=p.call(this,t)).ref=l();var r=t.list.map((function(e){return N(N({},e),{},{chosen:!1,selected:!1})}));return t.setList(r,n.sortable,J),e(!t.plugins,'\nPlugins prop is no longer supported.\nInstead, mount it with "Sortable.mount(new MultiDrag())"\nPlease read the updated README.md at https://github.com/SortableJS/react-sortablejs.\n      '),n}return c=d,(u=[{key:"componentDidMount",value:function(){if(null!==this.ref.current){var e=this.makeOptions();s.create(this.ref.current,e)}}},{key:"render",value:function(){var e=this.props,t=e.tag,n={style:e.style,className:e.className,id:e.id};return i(t&&null!==t?t:"div",N({ref:this.ref},n),this.getChildren())}},{key:"getChildren",value:function(){var e=this.props,t=e.children,o=e.dataIdAttr,i=e.selectedClass,l=void 0===i?"sortable-selected":i,c=e.chosenClass,s=void 0===c?"sortable-chosen":c,u=(e.dragClass,e.fallbackClass,e.ghostClass,e.swapClass,e.filter),f=void 0===u?"sortable-filter":u,p=e.list;if(!t||null==t)return null;var d=o||"data-id";return n.map(t,(function(e,t){var n,o,i=p[t],c=e.props.className,u="string"==typeof f&&B({},f.replace(".",""),!!i.filtered),b=a(c,N((B(n={},l,i.selected),B(n,s,i.chosen),n),u));return r(e,(B(o={},d,e.key),B(o,"className",b),o))}))}},{key:"makeOptions",value:function(){var e,t=this,n=((e=this.props).list,e.setList,e.children,e.tag,e.style,e.className,e.clone,e.onAdd,e.onChange,e.onChoose,e.onClone,e.onEnd,e.onFilter,e.onRemove,e.onSort,e.onStart,e.onUnchoose,e.onUpdate,e.onMove,e.onSpill,e.onSelect,e.onDeselect,w(e,["list","setList","children","tag","style","className","clone","onAdd","onChange","onChoose","onClone","onEnd","onFilter","onRemove","onSort","onStart","onUnchoose","onUpdate","onMove","onSpill","onSelect","onDeselect"]));return["onAdd","onChoose","onDeselect","onEnd","onRemove","onSelect","onSpill","onStart","onUnchoose","onUpdate"].forEach((function(e){return n[e]=t.prepareOnHandlerPropAndDOM(e)})),["onChange","onClone","onFilter","onSort"].forEach((function(e){return n[e]=t.prepareOnHandlerProp(e)})),N(N({},n),{},{onMove:function(e,n){var r=t.props.onMove,o=e.willInsertAfter||-1;if(!r)return o;var i=r(e,n,t.sortable,J);return void 0!==i&&i}})}},{key:"prepareOnHandlerPropAndDOM",value:function(e){var t=this;return function(n){t.callOnHandlerProp(n,e),t[e](n)}}},{key:"prepareOnHandlerProp",value:function(e){var t=this;return function(n){t.callOnHandlerProp(n,e)}}},{key:"callOnHandlerProp",value:function(e,t){var n=this.props[t];n&&n(e,this.sortable,J)}},{key:"onAdd",value:function(e){var t=this.props,n=t.list,r=t.setList,o=t.clone,i=D(e,L(J.dragging.props.list));k(i),r(R(i,n,e,o).map((function(e){return N(N({},e),{},{selected:!1})})),this.sortable,J)}},{key:"onRemove",value:function(t){var n=this,r=this.props,o=r.list,i=r.setList,l=M(t),a=D(t,o);C(a);var c=L(o);if("clone"!==t.pullMode)c=A(a,c);else{var s=a;switch(l){case"multidrag":s=a.map((function(e,n){return N(N({},e),{},{element:t.clones[n]})}));break;case"normal":s=a.map((function(e){return N(N({},e),{},{element:t.clone})}));break;case"swap":default:e(!0,'mode "'.concat(l,'" cannot clone. Please remove "props.clone" from <ReactSortable/> when using the "').concat(l,'" plugin'))}k(s),a.forEach((function(e){var r=e.oldIndex,o=n.props.clone(e.item,t);c.splice(r,1,o)}))}i(c=c.map((function(e){return N(N({},e),{},{selected:!1})})),this.sortable,J)}},{key:"onUpdate",value:function(e){var t=this.props,n=t.list,r=t.setList,o=D(e,n);return k(o),C(o),r(function(e,t){return R(e,A(e,t))}(o,n),this.sortable,J)}},{key:"onStart",value:function(){J.dragging=this}},{key:"onEnd",value:function(){J.dragging=null}},{key:"onChoose",value:function(e){var t=this.props,n=t.list;(0,t.setList)(n.map((function(t,n){return n===e.oldIndex?N(N({},t),{},{chosen:!0}):t})),this.sortable,J)}},{key:"onUnchoose",value:function(e){var t=this.props,n=t.list;(0,t.setList)(n.map((function(t,n){return n===e.oldIndex?N(N({},t),{},{chosen:!1}):t})),this.sortable,J)}},{key:"onSpill",value:function(e){var t=this.props,n=t.removeOnSpill,r=t.revertOnSpill;n&&!r&&E(e.item)}},{key:"onSelect",value:function(e){var t=this.props,n=t.list,r=t.setList,o=n.map((function(e){return N(N({},e),{},{selected:!1})}));e.newIndicies.forEach((function(t){var n=t.index;if(-1===n)return console.log('"'.concat(e.type,'" had indice of "').concat(t.index,"\", which is probably -1 and doesn't usually happen here.")),void console.log(e);o[n].selected=!0})),r(o,this.sortable,J)}},{key:"onDeselect",value:function(e){var t=this.props,n=t.list,r=t.setList,o=n.map((function(e){return N(N({},e),{},{selected:!1})}));e.newIndicies.forEach((function(e){var t=e.index;-1!==t&&(o[t].selected=!0)})),r(o,this.sortable,J)}},{key:"sortable",get:function(){var e=this.ref.current;if(null===e)return null;var t=Object.keys(e).find((function(e){return e.includes("Sortable")}));return t?e[t]:null}}])&&q(c.prototype,u),f&&q(c,f),d}();exports.ReactSortable=z,B(z,"defaultProps",{clone:function(e){return e}});
//# sourceMappingURL=index.js.map


/***/ }),

/***/ "./node_modules/sortablejs/modular/sortable.esm.js":
/*!*********************************************************!*\
  !*** ./node_modules/sortablejs/modular/sortable.esm.js ***!
  \*********************************************************/
/*! exports provided: default, MultiDrag, Sortable, Swap */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MultiDrag", function() { return MultiDragPlugin; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Sortable", function() { return Sortable; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Swap", function() { return SwapPlugin; });
/**!
 * Sortable 1.13.0
 * @author	RubaXa   <trash@rubaxa.org>
 * @author	owenm    <owen23355@gmail.com>
 * @license MIT
 */
function _typeof(obj) {
  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function (obj) {
      return typeof obj;
    };
  } else {
    _typeof = function (obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

function _objectSpread(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};
    var ownKeys = Object.keys(source);

    if (typeof Object.getOwnPropertySymbols === 'function') {
      ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) {
        return Object.getOwnPropertyDescriptor(source, sym).enumerable;
      }));
    }

    ownKeys.forEach(function (key) {
      _defineProperty(target, key, source[key]);
    });
  }

  return target;
}

function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;

  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }

  return target;
}

function _objectWithoutProperties(source, excluded) {
  if (source == null) return {};

  var target = _objectWithoutPropertiesLoose(source, excluded);

  var key, i;

  if (Object.getOwnPropertySymbols) {
    var sourceSymbolKeys = Object.getOwnPropertySymbols(source);

    for (i = 0; i < sourceSymbolKeys.length; i++) {
      key = sourceSymbolKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
      target[key] = source[key];
    }
  }

  return target;
}

function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread();
}

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) arr2[i] = arr[i];

    return arr2;
  }
}

function _iterableToArray(iter) {
  if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter);
}

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}

var version = "1.13.0";

function userAgent(pattern) {
  if (typeof window !== 'undefined' && window.navigator) {
    return !!
    /*@__PURE__*/
    navigator.userAgent.match(pattern);
  }
}

var IE11OrLess = userAgent(/(?:Trident.*rv[ :]?11\.|msie|iemobile|Windows Phone)/i);
var Edge = userAgent(/Edge/i);
var FireFox = userAgent(/firefox/i);
var Safari = userAgent(/safari/i) && !userAgent(/chrome/i) && !userAgent(/android/i);
var IOS = userAgent(/iP(ad|od|hone)/i);
var ChromeForAndroid = userAgent(/chrome/i) && userAgent(/android/i);

var captureMode = {
  capture: false,
  passive: false
};

function on(el, event, fn) {
  el.addEventListener(event, fn, !IE11OrLess && captureMode);
}

function off(el, event, fn) {
  el.removeEventListener(event, fn, !IE11OrLess && captureMode);
}

function matches(
/**HTMLElement*/
el,
/**String*/
selector) {
  if (!selector) return;
  selector[0] === '>' && (selector = selector.substring(1));

  if (el) {
    try {
      if (el.matches) {
        return el.matches(selector);
      } else if (el.msMatchesSelector) {
        return el.msMatchesSelector(selector);
      } else if (el.webkitMatchesSelector) {
        return el.webkitMatchesSelector(selector);
      }
    } catch (_) {
      return false;
    }
  }

  return false;
}

function getParentOrHost(el) {
  return el.host && el !== document && el.host.nodeType ? el.host : el.parentNode;
}

function closest(
/**HTMLElement*/
el,
/**String*/
selector,
/**HTMLElement*/
ctx, includeCTX) {
  if (el) {
    ctx = ctx || document;

    do {
      if (selector != null && (selector[0] === '>' ? el.parentNode === ctx && matches(el, selector) : matches(el, selector)) || includeCTX && el === ctx) {
        return el;
      }

      if (el === ctx) break;
      /* jshint boss:true */
    } while (el = getParentOrHost(el));
  }

  return null;
}

var R_SPACE = /\s+/g;

function toggleClass(el, name, state) {
  if (el && name) {
    if (el.classList) {
      el.classList[state ? 'add' : 'remove'](name);
    } else {
      var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
      el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
    }
  }
}

function css(el, prop, val) {
  var style = el && el.style;

  if (style) {
    if (val === void 0) {
      if (document.defaultView && document.defaultView.getComputedStyle) {
        val = document.defaultView.getComputedStyle(el, '');
      } else if (el.currentStyle) {
        val = el.currentStyle;
      }

      return prop === void 0 ? val : val[prop];
    } else {
      if (!(prop in style) && prop.indexOf('webkit') === -1) {
        prop = '-webkit-' + prop;
      }

      style[prop] = val + (typeof val === 'string' ? '' : 'px');
    }
  }
}

function matrix(el, selfOnly) {
  var appliedTransforms = '';

  if (typeof el === 'string') {
    appliedTransforms = el;
  } else {
    do {
      var transform = css(el, 'transform');

      if (transform && transform !== 'none') {
        appliedTransforms = transform + ' ' + appliedTransforms;
      }
      /* jshint boss:true */

    } while (!selfOnly && (el = el.parentNode));
  }

  var matrixFn = window.DOMMatrix || window.WebKitCSSMatrix || window.CSSMatrix || window.MSCSSMatrix;
  /*jshint -W056 */

  return matrixFn && new matrixFn(appliedTransforms);
}

function find(ctx, tagName, iterator) {
  if (ctx) {
    var list = ctx.getElementsByTagName(tagName),
        i = 0,
        n = list.length;

    if (iterator) {
      for (; i < n; i++) {
        iterator(list[i], i);
      }
    }

    return list;
  }

  return [];
}

function getWindowScrollingElement() {
  var scrollingElement = document.scrollingElement;

  if (scrollingElement) {
    return scrollingElement;
  } else {
    return document.documentElement;
  }
}
/**
 * Returns the "bounding client rect" of given element
 * @param  {HTMLElement} el                       The element whose boundingClientRect is wanted
 * @param  {[Boolean]} relativeToContainingBlock  Whether the rect should be relative to the containing block of (including) the container
 * @param  {[Boolean]} relativeToNonStaticParent  Whether the rect should be relative to the relative parent of (including) the contaienr
 * @param  {[Boolean]} undoScale                  Whether the container's scale() should be undone
 * @param  {[HTMLElement]} container              The parent the element will be placed in
 * @return {Object}                               The boundingClientRect of el, with specified adjustments
 */


function getRect(el, relativeToContainingBlock, relativeToNonStaticParent, undoScale, container) {
  if (!el.getBoundingClientRect && el !== window) return;
  var elRect, top, left, bottom, right, height, width;

  if (el !== window && el.parentNode && el !== getWindowScrollingElement()) {
    elRect = el.getBoundingClientRect();
    top = elRect.top;
    left = elRect.left;
    bottom = elRect.bottom;
    right = elRect.right;
    height = elRect.height;
    width = elRect.width;
  } else {
    top = 0;
    left = 0;
    bottom = window.innerHeight;
    right = window.innerWidth;
    height = window.innerHeight;
    width = window.innerWidth;
  }

  if ((relativeToContainingBlock || relativeToNonStaticParent) && el !== window) {
    // Adjust for translate()
    container = container || el.parentNode; // solves #1123 (see: https://stackoverflow.com/a/37953806/6088312)
    // Not needed on <= IE11

    if (!IE11OrLess) {
      do {
        if (container && container.getBoundingClientRect && (css(container, 'transform') !== 'none' || relativeToNonStaticParent && css(container, 'position') !== 'static')) {
          var containerRect = container.getBoundingClientRect(); // Set relative to edges of padding box of container

          top -= containerRect.top + parseInt(css(container, 'border-top-width'));
          left -= containerRect.left + parseInt(css(container, 'border-left-width'));
          bottom = top + elRect.height;
          right = left + elRect.width;
          break;
        }
        /* jshint boss:true */

      } while (container = container.parentNode);
    }
  }

  if (undoScale && el !== window) {
    // Adjust for scale()
    var elMatrix = matrix(container || el),
        scaleX = elMatrix && elMatrix.a,
        scaleY = elMatrix && elMatrix.d;

    if (elMatrix) {
      top /= scaleY;
      left /= scaleX;
      width /= scaleX;
      height /= scaleY;
      bottom = top + height;
      right = left + width;
    }
  }

  return {
    top: top,
    left: left,
    bottom: bottom,
    right: right,
    width: width,
    height: height
  };
}
/**
 * Checks if a side of an element is scrolled past a side of its parents
 * @param  {HTMLElement}  el           The element who's side being scrolled out of view is in question
 * @param  {String}       elSide       Side of the element in question ('top', 'left', 'right', 'bottom')
 * @param  {String}       parentSide   Side of the parent in question ('top', 'left', 'right', 'bottom')
 * @return {HTMLElement}               The parent scroll element that the el's side is scrolled past, or null if there is no such element
 */


function isScrolledPast(el, elSide, parentSide) {
  var parent = getParentAutoScrollElement(el, true),
      elSideVal = getRect(el)[elSide];
  /* jshint boss:true */

  while (parent) {
    var parentSideVal = getRect(parent)[parentSide],
        visible = void 0;

    if (parentSide === 'top' || parentSide === 'left') {
      visible = elSideVal >= parentSideVal;
    } else {
      visible = elSideVal <= parentSideVal;
    }

    if (!visible) return parent;
    if (parent === getWindowScrollingElement()) break;
    parent = getParentAutoScrollElement(parent, false);
  }

  return false;
}
/**
 * Gets nth child of el, ignoring hidden children, sortable's elements (does not ignore clone if it's visible)
 * and non-draggable elements
 * @param  {HTMLElement} el       The parent element
 * @param  {Number} childNum      The index of the child
 * @param  {Object} options       Parent Sortable's options
 * @return {HTMLElement}          The child at index childNum, or null if not found
 */


function getChild(el, childNum, options) {
  var currentChild = 0,
      i = 0,
      children = el.children;

  while (i < children.length) {
    if (children[i].style.display !== 'none' && children[i] !== Sortable.ghost && children[i] !== Sortable.dragged && closest(children[i], options.draggable, el, false)) {
      if (currentChild === childNum) {
        return children[i];
      }

      currentChild++;
    }

    i++;
  }

  return null;
}
/**
 * Gets the last child in the el, ignoring ghostEl or invisible elements (clones)
 * @param  {HTMLElement} el       Parent element
 * @param  {selector} selector    Any other elements that should be ignored
 * @return {HTMLElement}          The last child, ignoring ghostEl
 */


function lastChild(el, selector) {
  var last = el.lastElementChild;

  while (last && (last === Sortable.ghost || css(last, 'display') === 'none' || selector && !matches(last, selector))) {
    last = last.previousElementSibling;
  }

  return last || null;
}
/**
 * Returns the index of an element within its parent for a selected set of
 * elements
 * @param  {HTMLElement} el
 * @param  {selector} selector
 * @return {number}
 */


function index(el, selector) {
  var index = 0;

  if (!el || !el.parentNode) {
    return -1;
  }
  /* jshint boss:true */


  while (el = el.previousElementSibling) {
    if (el.nodeName.toUpperCase() !== 'TEMPLATE' && el !== Sortable.clone && (!selector || matches(el, selector))) {
      index++;
    }
  }

  return index;
}
/**
 * Returns the scroll offset of the given element, added with all the scroll offsets of parent elements.
 * The value is returned in real pixels.
 * @param  {HTMLElement} el
 * @return {Array}             Offsets in the format of [left, top]
 */


function getRelativeScrollOffset(el) {
  var offsetLeft = 0,
      offsetTop = 0,
      winScroller = getWindowScrollingElement();

  if (el) {
    do {
      var elMatrix = matrix(el),
          scaleX = elMatrix.a,
          scaleY = elMatrix.d;
      offsetLeft += el.scrollLeft * scaleX;
      offsetTop += el.scrollTop * scaleY;
    } while (el !== winScroller && (el = el.parentNode));
  }

  return [offsetLeft, offsetTop];
}
/**
 * Returns the index of the object within the given array
 * @param  {Array} arr   Array that may or may not hold the object
 * @param  {Object} obj  An object that has a key-value pair unique to and identical to a key-value pair in the object you want to find
 * @return {Number}      The index of the object in the array, or -1
 */


function indexOfObject(arr, obj) {
  for (var i in arr) {
    if (!arr.hasOwnProperty(i)) continue;

    for (var key in obj) {
      if (obj.hasOwnProperty(key) && obj[key] === arr[i][key]) return Number(i);
    }
  }

  return -1;
}

function getParentAutoScrollElement(el, includeSelf) {
  // skip to window
  if (!el || !el.getBoundingClientRect) return getWindowScrollingElement();
  var elem = el;
  var gotSelf = false;

  do {
    // we don't need to get elem css if it isn't even overflowing in the first place (performance)
    if (elem.clientWidth < elem.scrollWidth || elem.clientHeight < elem.scrollHeight) {
      var elemCSS = css(elem);

      if (elem.clientWidth < elem.scrollWidth && (elemCSS.overflowX == 'auto' || elemCSS.overflowX == 'scroll') || elem.clientHeight < elem.scrollHeight && (elemCSS.overflowY == 'auto' || elemCSS.overflowY == 'scroll')) {
        if (!elem.getBoundingClientRect || elem === document.body) return getWindowScrollingElement();
        if (gotSelf || includeSelf) return elem;
        gotSelf = true;
      }
    }
    /* jshint boss:true */

  } while (elem = elem.parentNode);

  return getWindowScrollingElement();
}

function extend(dst, src) {
  if (dst && src) {
    for (var key in src) {
      if (src.hasOwnProperty(key)) {
        dst[key] = src[key];
      }
    }
  }

  return dst;
}

function isRectEqual(rect1, rect2) {
  return Math.round(rect1.top) === Math.round(rect2.top) && Math.round(rect1.left) === Math.round(rect2.left) && Math.round(rect1.height) === Math.round(rect2.height) && Math.round(rect1.width) === Math.round(rect2.width);
}

var _throttleTimeout;

function throttle(callback, ms) {
  return function () {
    if (!_throttleTimeout) {
      var args = arguments,
          _this = this;

      if (args.length === 1) {
        callback.call(_this, args[0]);
      } else {
        callback.apply(_this, args);
      }

      _throttleTimeout = setTimeout(function () {
        _throttleTimeout = void 0;
      }, ms);
    }
  };
}

function cancelThrottle() {
  clearTimeout(_throttleTimeout);
  _throttleTimeout = void 0;
}

function scrollBy(el, x, y) {
  el.scrollLeft += x;
  el.scrollTop += y;
}

function clone(el) {
  var Polymer = window.Polymer;
  var $ = window.jQuery || window.Zepto;

  if (Polymer && Polymer.dom) {
    return Polymer.dom(el).cloneNode(true);
  } else if ($) {
    return $(el).clone(true)[0];
  } else {
    return el.cloneNode(true);
  }
}

function setRect(el, rect) {
  css(el, 'position', 'absolute');
  css(el, 'top', rect.top);
  css(el, 'left', rect.left);
  css(el, 'width', rect.width);
  css(el, 'height', rect.height);
}

function unsetRect(el) {
  css(el, 'position', '');
  css(el, 'top', '');
  css(el, 'left', '');
  css(el, 'width', '');
  css(el, 'height', '');
}

var expando = 'Sortable' + new Date().getTime();

function AnimationStateManager() {
  var animationStates = [],
      animationCallbackId;
  return {
    captureAnimationState: function captureAnimationState() {
      animationStates = [];
      if (!this.options.animation) return;
      var children = [].slice.call(this.el.children);
      children.forEach(function (child) {
        if (css(child, 'display') === 'none' || child === Sortable.ghost) return;
        animationStates.push({
          target: child,
          rect: getRect(child)
        });

        var fromRect = _objectSpread({}, animationStates[animationStates.length - 1].rect); // If animating: compensate for current animation


        if (child.thisAnimationDuration) {
          var childMatrix = matrix(child, true);

          if (childMatrix) {
            fromRect.top -= childMatrix.f;
            fromRect.left -= childMatrix.e;
          }
        }

        child.fromRect = fromRect;
      });
    },
    addAnimationState: function addAnimationState(state) {
      animationStates.push(state);
    },
    removeAnimationState: function removeAnimationState(target) {
      animationStates.splice(indexOfObject(animationStates, {
        target: target
      }), 1);
    },
    animateAll: function animateAll(callback) {
      var _this = this;

      if (!this.options.animation) {
        clearTimeout(animationCallbackId);
        if (typeof callback === 'function') callback();
        return;
      }

      var animating = false,
          animationTime = 0;
      animationStates.forEach(function (state) {
        var time = 0,
            target = state.target,
            fromRect = target.fromRect,
            toRect = getRect(target),
            prevFromRect = target.prevFromRect,
            prevToRect = target.prevToRect,
            animatingRect = state.rect,
            targetMatrix = matrix(target, true);

        if (targetMatrix) {
          // Compensate for current animation
          toRect.top -= targetMatrix.f;
          toRect.left -= targetMatrix.e;
        }

        target.toRect = toRect;

        if (target.thisAnimationDuration) {
          // Could also check if animatingRect is between fromRect and toRect
          if (isRectEqual(prevFromRect, toRect) && !isRectEqual(fromRect, toRect) && // Make sure animatingRect is on line between toRect & fromRect
          (animatingRect.top - toRect.top) / (animatingRect.left - toRect.left) === (fromRect.top - toRect.top) / (fromRect.left - toRect.left)) {
            // If returning to same place as started from animation and on same axis
            time = calculateRealTime(animatingRect, prevFromRect, prevToRect, _this.options);
          }
        } // if fromRect != toRect: animate


        if (!isRectEqual(toRect, fromRect)) {
          target.prevFromRect = fromRect;
          target.prevToRect = toRect;

          if (!time) {
            time = _this.options.animation;
          }

          _this.animate(target, animatingRect, toRect, time);
        }

        if (time) {
          animating = true;
          animationTime = Math.max(animationTime, time);
          clearTimeout(target.animationResetTimer);
          target.animationResetTimer = setTimeout(function () {
            target.animationTime = 0;
            target.prevFromRect = null;
            target.fromRect = null;
            target.prevToRect = null;
            target.thisAnimationDuration = null;
          }, time);
          target.thisAnimationDuration = time;
        }
      });
      clearTimeout(animationCallbackId);

      if (!animating) {
        if (typeof callback === 'function') callback();
      } else {
        animationCallbackId = setTimeout(function () {
          if (typeof callback === 'function') callback();
        }, animationTime);
      }

      animationStates = [];
    },
    animate: function animate(target, currentRect, toRect, duration) {
      if (duration) {
        css(target, 'transition', '');
        css(target, 'transform', '');
        var elMatrix = matrix(this.el),
            scaleX = elMatrix && elMatrix.a,
            scaleY = elMatrix && elMatrix.d,
            translateX = (currentRect.left - toRect.left) / (scaleX || 1),
            translateY = (currentRect.top - toRect.top) / (scaleY || 1);
        target.animatingX = !!translateX;
        target.animatingY = !!translateY;
        css(target, 'transform', 'translate3d(' + translateX + 'px,' + translateY + 'px,0)');
        this.forRepaintDummy = repaint(target); // repaint

        css(target, 'transition', 'transform ' + duration + 'ms' + (this.options.easing ? ' ' + this.options.easing : ''));
        css(target, 'transform', 'translate3d(0,0,0)');
        typeof target.animated === 'number' && clearTimeout(target.animated);
        target.animated = setTimeout(function () {
          css(target, 'transition', '');
          css(target, 'transform', '');
          target.animated = false;
          target.animatingX = false;
          target.animatingY = false;
        }, duration);
      }
    }
  };
}

function repaint(target) {
  return target.offsetWidth;
}

function calculateRealTime(animatingRect, fromRect, toRect, options) {
  return Math.sqrt(Math.pow(fromRect.top - animatingRect.top, 2) + Math.pow(fromRect.left - animatingRect.left, 2)) / Math.sqrt(Math.pow(fromRect.top - toRect.top, 2) + Math.pow(fromRect.left - toRect.left, 2)) * options.animation;
}

var plugins = [];
var defaults = {
  initializeByDefault: true
};
var PluginManager = {
  mount: function mount(plugin) {
    // Set default static properties
    for (var option in defaults) {
      if (defaults.hasOwnProperty(option) && !(option in plugin)) {
        plugin[option] = defaults[option];
      }
    }

    plugins.forEach(function (p) {
      if (p.pluginName === plugin.pluginName) {
        throw "Sortable: Cannot mount plugin ".concat(plugin.pluginName, " more than once");
      }
    });
    plugins.push(plugin);
  },
  pluginEvent: function pluginEvent(eventName, sortable, evt) {
    var _this = this;

    this.eventCanceled = false;

    evt.cancel = function () {
      _this.eventCanceled = true;
    };

    var eventNameGlobal = eventName + 'Global';
    plugins.forEach(function (plugin) {
      if (!sortable[plugin.pluginName]) return; // Fire global events if it exists in this sortable

      if (sortable[plugin.pluginName][eventNameGlobal]) {
        sortable[plugin.pluginName][eventNameGlobal](_objectSpread({
          sortable: sortable
        }, evt));
      } // Only fire plugin event if plugin is enabled in this sortable,
      // and plugin has event defined


      if (sortable.options[plugin.pluginName] && sortable[plugin.pluginName][eventName]) {
        sortable[plugin.pluginName][eventName](_objectSpread({
          sortable: sortable
        }, evt));
      }
    });
  },
  initializePlugins: function initializePlugins(sortable, el, defaults, options) {
    plugins.forEach(function (plugin) {
      var pluginName = plugin.pluginName;
      if (!sortable.options[pluginName] && !plugin.initializeByDefault) return;
      var initialized = new plugin(sortable, el, sortable.options);
      initialized.sortable = sortable;
      initialized.options = sortable.options;
      sortable[pluginName] = initialized; // Add default options from plugin

      _extends(defaults, initialized.defaults);
    });

    for (var option in sortable.options) {
      if (!sortable.options.hasOwnProperty(option)) continue;
      var modified = this.modifyOption(sortable, option, sortable.options[option]);

      if (typeof modified !== 'undefined') {
        sortable.options[option] = modified;
      }
    }
  },
  getEventProperties: function getEventProperties(name, sortable) {
    var eventProperties = {};
    plugins.forEach(function (plugin) {
      if (typeof plugin.eventProperties !== 'function') return;

      _extends(eventProperties, plugin.eventProperties.call(sortable[plugin.pluginName], name));
    });
    return eventProperties;
  },
  modifyOption: function modifyOption(sortable, name, value) {
    var modifiedValue;
    plugins.forEach(function (plugin) {
      // Plugin must exist on the Sortable
      if (!sortable[plugin.pluginName]) return; // If static option listener exists for this option, call in the context of the Sortable's instance of this plugin

      if (plugin.optionListeners && typeof plugin.optionListeners[name] === 'function') {
        modifiedValue = plugin.optionListeners[name].call(sortable[plugin.pluginName], value);
      }
    });
    return modifiedValue;
  }
};

function dispatchEvent(_ref) {
  var sortable = _ref.sortable,
      rootEl = _ref.rootEl,
      name = _ref.name,
      targetEl = _ref.targetEl,
      cloneEl = _ref.cloneEl,
      toEl = _ref.toEl,
      fromEl = _ref.fromEl,
      oldIndex = _ref.oldIndex,
      newIndex = _ref.newIndex,
      oldDraggableIndex = _ref.oldDraggableIndex,
      newDraggableIndex = _ref.newDraggableIndex,
      originalEvent = _ref.originalEvent,
      putSortable = _ref.putSortable,
      extraEventProperties = _ref.extraEventProperties;
  sortable = sortable || rootEl && rootEl[expando];
  if (!sortable) return;
  var evt,
      options = sortable.options,
      onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1); // Support for new CustomEvent feature

  if (window.CustomEvent && !IE11OrLess && !Edge) {
    evt = new CustomEvent(name, {
      bubbles: true,
      cancelable: true
    });
  } else {
    evt = document.createEvent('Event');
    evt.initEvent(name, true, true);
  }

  evt.to = toEl || rootEl;
  evt.from = fromEl || rootEl;
  evt.item = targetEl || rootEl;
  evt.clone = cloneEl;
  evt.oldIndex = oldIndex;
  evt.newIndex = newIndex;
  evt.oldDraggableIndex = oldDraggableIndex;
  evt.newDraggableIndex = newDraggableIndex;
  evt.originalEvent = originalEvent;
  evt.pullMode = putSortable ? putSortable.lastPutMode : undefined;

  var allEventProperties = _objectSpread({}, extraEventProperties, PluginManager.getEventProperties(name, sortable));

  for (var option in allEventProperties) {
    evt[option] = allEventProperties[option];
  }

  if (rootEl) {
    rootEl.dispatchEvent(evt);
  }

  if (options[onName]) {
    options[onName].call(sortable, evt);
  }
}

var pluginEvent = function pluginEvent(eventName, sortable) {
  var _ref = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {},
      originalEvent = _ref.evt,
      data = _objectWithoutProperties(_ref, ["evt"]);

  PluginManager.pluginEvent.bind(Sortable)(eventName, sortable, _objectSpread({
    dragEl: dragEl,
    parentEl: parentEl,
    ghostEl: ghostEl,
    rootEl: rootEl,
    nextEl: nextEl,
    lastDownEl: lastDownEl,
    cloneEl: cloneEl,
    cloneHidden: cloneHidden,
    dragStarted: moved,
    putSortable: putSortable,
    activeSortable: Sortable.active,
    originalEvent: originalEvent,
    oldIndex: oldIndex,
    oldDraggableIndex: oldDraggableIndex,
    newIndex: newIndex,
    newDraggableIndex: newDraggableIndex,
    hideGhostForTarget: _hideGhostForTarget,
    unhideGhostForTarget: _unhideGhostForTarget,
    cloneNowHidden: function cloneNowHidden() {
      cloneHidden = true;
    },
    cloneNowShown: function cloneNowShown() {
      cloneHidden = false;
    },
    dispatchSortableEvent: function dispatchSortableEvent(name) {
      _dispatchEvent({
        sortable: sortable,
        name: name,
        originalEvent: originalEvent
      });
    }
  }, data));
};

function _dispatchEvent(info) {
  dispatchEvent(_objectSpread({
    putSortable: putSortable,
    cloneEl: cloneEl,
    targetEl: dragEl,
    rootEl: rootEl,
    oldIndex: oldIndex,
    oldDraggableIndex: oldDraggableIndex,
    newIndex: newIndex,
    newDraggableIndex: newDraggableIndex
  }, info));
}

var dragEl,
    parentEl,
    ghostEl,
    rootEl,
    nextEl,
    lastDownEl,
    cloneEl,
    cloneHidden,
    oldIndex,
    newIndex,
    oldDraggableIndex,
    newDraggableIndex,
    activeGroup,
    putSortable,
    awaitingDragStarted = false,
    ignoreNextClick = false,
    sortables = [],
    tapEvt,
    touchEvt,
    lastDx,
    lastDy,
    tapDistanceLeft,
    tapDistanceTop,
    moved,
    lastTarget,
    lastDirection,
    pastFirstInvertThresh = false,
    isCircumstantialInvert = false,
    targetMoveDistance,
    // For positioning ghost absolutely
ghostRelativeParent,
    ghostRelativeParentInitialScroll = [],
    // (left, top)
_silent = false,
    savedInputChecked = [];
/** @const */

var documentExists = typeof document !== 'undefined',
    PositionGhostAbsolutely = IOS,
    CSSFloatProperty = Edge || IE11OrLess ? 'cssFloat' : 'float',
    // This will not pass for IE9, because IE9 DnD only works on anchors
supportDraggable = documentExists && !ChromeForAndroid && !IOS && 'draggable' in document.createElement('div'),
    supportCssPointerEvents = function () {
  if (!documentExists) return; // false when <= IE11

  if (IE11OrLess) {
    return false;
  }

  var el = document.createElement('x');
  el.style.cssText = 'pointer-events:auto';
  return el.style.pointerEvents === 'auto';
}(),
    _detectDirection = function _detectDirection(el, options) {
  var elCSS = css(el),
      elWidth = parseInt(elCSS.width) - parseInt(elCSS.paddingLeft) - parseInt(elCSS.paddingRight) - parseInt(elCSS.borderLeftWidth) - parseInt(elCSS.borderRightWidth),
      child1 = getChild(el, 0, options),
      child2 = getChild(el, 1, options),
      firstChildCSS = child1 && css(child1),
      secondChildCSS = child2 && css(child2),
      firstChildWidth = firstChildCSS && parseInt(firstChildCSS.marginLeft) + parseInt(firstChildCSS.marginRight) + getRect(child1).width,
      secondChildWidth = secondChildCSS && parseInt(secondChildCSS.marginLeft) + parseInt(secondChildCSS.marginRight) + getRect(child2).width;

  if (elCSS.display === 'flex') {
    return elCSS.flexDirection === 'column' || elCSS.flexDirection === 'column-reverse' ? 'vertical' : 'horizontal';
  }

  if (elCSS.display === 'grid') {
    return elCSS.gridTemplateColumns.split(' ').length <= 1 ? 'vertical' : 'horizontal';
  }

  if (child1 && firstChildCSS["float"] && firstChildCSS["float"] !== 'none') {
    var touchingSideChild2 = firstChildCSS["float"] === 'left' ? 'left' : 'right';
    return child2 && (secondChildCSS.clear === 'both' || secondChildCSS.clear === touchingSideChild2) ? 'vertical' : 'horizontal';
  }

  return child1 && (firstChildCSS.display === 'block' || firstChildCSS.display === 'flex' || firstChildCSS.display === 'table' || firstChildCSS.display === 'grid' || firstChildWidth >= elWidth && elCSS[CSSFloatProperty] === 'none' || child2 && elCSS[CSSFloatProperty] === 'none' && firstChildWidth + secondChildWidth > elWidth) ? 'vertical' : 'horizontal';
},
    _dragElInRowColumn = function _dragElInRowColumn(dragRect, targetRect, vertical) {
  var dragElS1Opp = vertical ? dragRect.left : dragRect.top,
      dragElS2Opp = vertical ? dragRect.right : dragRect.bottom,
      dragElOppLength = vertical ? dragRect.width : dragRect.height,
      targetS1Opp = vertical ? targetRect.left : targetRect.top,
      targetS2Opp = vertical ? targetRect.right : targetRect.bottom,
      targetOppLength = vertical ? targetRect.width : targetRect.height;
  return dragElS1Opp === targetS1Opp || dragElS2Opp === targetS2Opp || dragElS1Opp + dragElOppLength / 2 === targetS1Opp + targetOppLength / 2;
},

/**
 * Detects first nearest empty sortable to X and Y position using emptyInsertThreshold.
 * @param  {Number} x      X position
 * @param  {Number} y      Y position
 * @return {HTMLElement}   Element of the first found nearest Sortable
 */
_detectNearestEmptySortable = function _detectNearestEmptySortable(x, y) {
  var ret;
  sortables.some(function (sortable) {
    if (lastChild(sortable)) return;
    var rect = getRect(sortable),
        threshold = sortable[expando].options.emptyInsertThreshold,
        insideHorizontally = x >= rect.left - threshold && x <= rect.right + threshold,
        insideVertically = y >= rect.top - threshold && y <= rect.bottom + threshold;

    if (threshold && insideHorizontally && insideVertically) {
      return ret = sortable;
    }
  });
  return ret;
},
    _prepareGroup = function _prepareGroup(options) {
  function toFn(value, pull) {
    return function (to, from, dragEl, evt) {
      var sameGroup = to.options.group.name && from.options.group.name && to.options.group.name === from.options.group.name;

      if (value == null && (pull || sameGroup)) {
        // Default pull value
        // Default pull and put value if same group
        return true;
      } else if (value == null || value === false) {
        return false;
      } else if (pull && value === 'clone') {
        return value;
      } else if (typeof value === 'function') {
        return toFn(value(to, from, dragEl, evt), pull)(to, from, dragEl, evt);
      } else {
        var otherGroup = (pull ? to : from).options.group.name;
        return value === true || typeof value === 'string' && value === otherGroup || value.join && value.indexOf(otherGroup) > -1;
      }
    };
  }

  var group = {};
  var originalGroup = options.group;

  if (!originalGroup || _typeof(originalGroup) != 'object') {
    originalGroup = {
      name: originalGroup
    };
  }

  group.name = originalGroup.name;
  group.checkPull = toFn(originalGroup.pull, true);
  group.checkPut = toFn(originalGroup.put);
  group.revertClone = originalGroup.revertClone;
  options.group = group;
},
    _hideGhostForTarget = function _hideGhostForTarget() {
  if (!supportCssPointerEvents && ghostEl) {
    css(ghostEl, 'display', 'none');
  }
},
    _unhideGhostForTarget = function _unhideGhostForTarget() {
  if (!supportCssPointerEvents && ghostEl) {
    css(ghostEl, 'display', '');
  }
}; // #1184 fix - Prevent click event on fallback if dragged but item not changed position


if (documentExists) {
  document.addEventListener('click', function (evt) {
    if (ignoreNextClick) {
      evt.preventDefault();
      evt.stopPropagation && evt.stopPropagation();
      evt.stopImmediatePropagation && evt.stopImmediatePropagation();
      ignoreNextClick = false;
      return false;
    }
  }, true);
}

var nearestEmptyInsertDetectEvent = function nearestEmptyInsertDetectEvent(evt) {
  if (dragEl) {
    evt = evt.touches ? evt.touches[0] : evt;

    var nearest = _detectNearestEmptySortable(evt.clientX, evt.clientY);

    if (nearest) {
      // Create imitation event
      var event = {};

      for (var i in evt) {
        if (evt.hasOwnProperty(i)) {
          event[i] = evt[i];
        }
      }

      event.target = event.rootEl = nearest;
      event.preventDefault = void 0;
      event.stopPropagation = void 0;

      nearest[expando]._onDragOver(event);
    }
  }
};

var _checkOutsideTargetEl = function _checkOutsideTargetEl(evt) {
  if (dragEl) {
    dragEl.parentNode[expando]._isOutsideThisEl(evt.target);
  }
};
/**
 * @class  Sortable
 * @param  {HTMLElement}  el
 * @param  {Object}       [options]
 */


function Sortable(el, options) {
  if (!(el && el.nodeType && el.nodeType === 1)) {
    throw "Sortable: `el` must be an HTMLElement, not ".concat({}.toString.call(el));
  }

  this.el = el; // root element

  this.options = options = _extends({}, options); // Export instance

  el[expando] = this;
  var defaults = {
    group: null,
    sort: true,
    disabled: false,
    store: null,
    handle: null,
    draggable: /^[uo]l$/i.test(el.nodeName) ? '>li' : '>*',
    swapThreshold: 1,
    // percentage; 0 <= x <= 1
    invertSwap: false,
    // invert always
    invertedSwapThreshold: null,
    // will be set to same as swapThreshold if default
    removeCloneOnHide: true,
    direction: function direction() {
      return _detectDirection(el, this.options);
    },
    ghostClass: 'sortable-ghost',
    chosenClass: 'sortable-chosen',
    dragClass: 'sortable-drag',
    ignore: 'a, img',
    filter: null,
    preventOnFilter: true,
    animation: 0,
    easing: null,
    setData: function setData(dataTransfer, dragEl) {
      dataTransfer.setData('Text', dragEl.textContent);
    },
    dropBubble: false,
    dragoverBubble: false,
    dataIdAttr: 'data-id',
    delay: 0,
    delayOnTouchOnly: false,
    touchStartThreshold: (Number.parseInt ? Number : window).parseInt(window.devicePixelRatio, 10) || 1,
    forceFallback: false,
    fallbackClass: 'sortable-fallback',
    fallbackOnBody: false,
    fallbackTolerance: 0,
    fallbackOffset: {
      x: 0,
      y: 0
    },
    supportPointer: Sortable.supportPointer !== false && 'PointerEvent' in window && !Safari,
    emptyInsertThreshold: 5
  };
  PluginManager.initializePlugins(this, el, defaults); // Set default options

  for (var name in defaults) {
    !(name in options) && (options[name] = defaults[name]);
  }

  _prepareGroup(options); // Bind all private methods


  for (var fn in this) {
    if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
      this[fn] = this[fn].bind(this);
    }
  } // Setup drag mode


  this.nativeDraggable = options.forceFallback ? false : supportDraggable;

  if (this.nativeDraggable) {
    // Touch start threshold cannot be greater than the native dragstart threshold
    this.options.touchStartThreshold = 1;
  } // Bind events


  if (options.supportPointer) {
    on(el, 'pointerdown', this._onTapStart);
  } else {
    on(el, 'mousedown', this._onTapStart);
    on(el, 'touchstart', this._onTapStart);
  }

  if (this.nativeDraggable) {
    on(el, 'dragover', this);
    on(el, 'dragenter', this);
  }

  sortables.push(this.el); // Restore sorting

  options.store && options.store.get && this.sort(options.store.get(this) || []); // Add animation state manager

  _extends(this, AnimationStateManager());
}

Sortable.prototype =
/** @lends Sortable.prototype */
{
  constructor: Sortable,
  _isOutsideThisEl: function _isOutsideThisEl(target) {
    if (!this.el.contains(target) && target !== this.el) {
      lastTarget = null;
    }
  },
  _getDirection: function _getDirection(evt, target) {
    return typeof this.options.direction === 'function' ? this.options.direction.call(this, evt, target, dragEl) : this.options.direction;
  },
  _onTapStart: function _onTapStart(
  /** Event|TouchEvent */
  evt) {
    if (!evt.cancelable) return;

    var _this = this,
        el = this.el,
        options = this.options,
        preventOnFilter = options.preventOnFilter,
        type = evt.type,
        touch = evt.touches && evt.touches[0] || evt.pointerType && evt.pointerType === 'touch' && evt,
        target = (touch || evt).target,
        originalTarget = evt.target.shadowRoot && (evt.path && evt.path[0] || evt.composedPath && evt.composedPath()[0]) || target,
        filter = options.filter;

    _saveInputCheckedState(el); // Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.


    if (dragEl) {
      return;
    }

    if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
      return; // only left button and enabled
    } // cancel dnd if original target is content editable


    if (originalTarget.isContentEditable) {
      return;
    } // Safari ignores further event handling after mousedown


    if (!this.nativeDraggable && Safari && target && target.tagName.toUpperCase() === 'SELECT') {
      return;
    }

    target = closest(target, options.draggable, el, false);

    if (target && target.animated) {
      return;
    }

    if (lastDownEl === target) {
      // Ignoring duplicate `down`
      return;
    } // Get the index of the dragged element within its parent


    oldIndex = index(target);
    oldDraggableIndex = index(target, options.draggable); // Check filter

    if (typeof filter === 'function') {
      if (filter.call(this, evt, target, this)) {
        _dispatchEvent({
          sortable: _this,
          rootEl: originalTarget,
          name: 'filter',
          targetEl: target,
          toEl: el,
          fromEl: el
        });

        pluginEvent('filter', _this, {
          evt: evt
        });
        preventOnFilter && evt.cancelable && evt.preventDefault();
        return; // cancel dnd
      }
    } else if (filter) {
      filter = filter.split(',').some(function (criteria) {
        criteria = closest(originalTarget, criteria.trim(), el, false);

        if (criteria) {
          _dispatchEvent({
            sortable: _this,
            rootEl: criteria,
            name: 'filter',
            targetEl: target,
            fromEl: el,
            toEl: el
          });

          pluginEvent('filter', _this, {
            evt: evt
          });
          return true;
        }
      });

      if (filter) {
        preventOnFilter && evt.cancelable && evt.preventDefault();
        return; // cancel dnd
      }
    }

    if (options.handle && !closest(originalTarget, options.handle, el, false)) {
      return;
    } // Prepare `dragstart`


    this._prepareDragStart(evt, touch, target);
  },
  _prepareDragStart: function _prepareDragStart(
  /** Event */
  evt,
  /** Touch */
  touch,
  /** HTMLElement */
  target) {
    var _this = this,
        el = _this.el,
        options = _this.options,
        ownerDocument = el.ownerDocument,
        dragStartFn;

    if (target && !dragEl && target.parentNode === el) {
      var dragRect = getRect(target);
      rootEl = el;
      dragEl = target;
      parentEl = dragEl.parentNode;
      nextEl = dragEl.nextSibling;
      lastDownEl = target;
      activeGroup = options.group;
      Sortable.dragged = dragEl;
      tapEvt = {
        target: dragEl,
        clientX: (touch || evt).clientX,
        clientY: (touch || evt).clientY
      };
      tapDistanceLeft = tapEvt.clientX - dragRect.left;
      tapDistanceTop = tapEvt.clientY - dragRect.top;
      this._lastX = (touch || evt).clientX;
      this._lastY = (touch || evt).clientY;
      dragEl.style['will-change'] = 'all';

      dragStartFn = function dragStartFn() {
        pluginEvent('delayEnded', _this, {
          evt: evt
        });

        if (Sortable.eventCanceled) {
          _this._onDrop();

          return;
        } // Delayed drag has been triggered
        // we can re-enable the events: touchmove/mousemove


        _this._disableDelayedDragEvents();

        if (!FireFox && _this.nativeDraggable) {
          dragEl.draggable = true;
        } // Bind the events: dragstart/dragend


        _this._triggerDragStart(evt, touch); // Drag start event


        _dispatchEvent({
          sortable: _this,
          name: 'choose',
          originalEvent: evt
        }); // Chosen item


        toggleClass(dragEl, options.chosenClass, true);
      }; // Disable "draggable"


      options.ignore.split(',').forEach(function (criteria) {
        find(dragEl, criteria.trim(), _disableDraggable);
      });
      on(ownerDocument, 'dragover', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'mousemove', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'touchmove', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'mouseup', _this._onDrop);
      on(ownerDocument, 'touchend', _this._onDrop);
      on(ownerDocument, 'touchcancel', _this._onDrop); // Make dragEl draggable (must be before delay for FireFox)

      if (FireFox && this.nativeDraggable) {
        this.options.touchStartThreshold = 4;
        dragEl.draggable = true;
      }

      pluginEvent('delayStart', this, {
        evt: evt
      }); // Delay is impossible for native DnD in Edge or IE

      if (options.delay && (!options.delayOnTouchOnly || touch) && (!this.nativeDraggable || !(Edge || IE11OrLess))) {
        if (Sortable.eventCanceled) {
          this._onDrop();

          return;
        } // If the user moves the pointer or let go the click or touch
        // before the delay has been reached:
        // disable the delayed drag


        on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
        on(ownerDocument, 'touchend', _this._disableDelayedDrag);
        on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
        on(ownerDocument, 'mousemove', _this._delayedDragTouchMoveHandler);
        on(ownerDocument, 'touchmove', _this._delayedDragTouchMoveHandler);
        options.supportPointer && on(ownerDocument, 'pointermove', _this._delayedDragTouchMoveHandler);
        _this._dragStartTimer = setTimeout(dragStartFn, options.delay);
      } else {
        dragStartFn();
      }
    }
  },
  _delayedDragTouchMoveHandler: function _delayedDragTouchMoveHandler(
  /** TouchEvent|PointerEvent **/
  e) {
    var touch = e.touches ? e.touches[0] : e;

    if (Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) >= Math.floor(this.options.touchStartThreshold / (this.nativeDraggable && window.devicePixelRatio || 1))) {
      this._disableDelayedDrag();
    }
  },
  _disableDelayedDrag: function _disableDelayedDrag() {
    dragEl && _disableDraggable(dragEl);
    clearTimeout(this._dragStartTimer);

    this._disableDelayedDragEvents();
  },
  _disableDelayedDragEvents: function _disableDelayedDragEvents() {
    var ownerDocument = this.el.ownerDocument;
    off(ownerDocument, 'mouseup', this._disableDelayedDrag);
    off(ownerDocument, 'touchend', this._disableDelayedDrag);
    off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
    off(ownerDocument, 'mousemove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'touchmove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'pointermove', this._delayedDragTouchMoveHandler);
  },
  _triggerDragStart: function _triggerDragStart(
  /** Event */
  evt,
  /** Touch */
  touch) {
    touch = touch || evt.pointerType == 'touch' && evt;

    if (!this.nativeDraggable || touch) {
      if (this.options.supportPointer) {
        on(document, 'pointermove', this._onTouchMove);
      } else if (touch) {
        on(document, 'touchmove', this._onTouchMove);
      } else {
        on(document, 'mousemove', this._onTouchMove);
      }
    } else {
      on(dragEl, 'dragend', this);
      on(rootEl, 'dragstart', this._onDragStart);
    }

    try {
      if (document.selection) {
        // Timeout neccessary for IE9
        _nextTick(function () {
          document.selection.empty();
        });
      } else {
        window.getSelection().removeAllRanges();
      }
    } catch (err) {}
  },
  _dragStarted: function _dragStarted(fallback, evt) {

    awaitingDragStarted = false;

    if (rootEl && dragEl) {
      pluginEvent('dragStarted', this, {
        evt: evt
      });

      if (this.nativeDraggable) {
        on(document, 'dragover', _checkOutsideTargetEl);
      }

      var options = this.options; // Apply effect

      !fallback && toggleClass(dragEl, options.dragClass, false);
      toggleClass(dragEl, options.ghostClass, true);
      Sortable.active = this;
      fallback && this._appendGhost(); // Drag start event

      _dispatchEvent({
        sortable: this,
        name: 'start',
        originalEvent: evt
      });
    } else {
      this._nulling();
    }
  },
  _emulateDragOver: function _emulateDragOver() {
    if (touchEvt) {
      this._lastX = touchEvt.clientX;
      this._lastY = touchEvt.clientY;

      _hideGhostForTarget();

      var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
      var parent = target;

      while (target && target.shadowRoot) {
        target = target.shadowRoot.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
        if (target === parent) break;
        parent = target;
      }

      dragEl.parentNode[expando]._isOutsideThisEl(target);

      if (parent) {
        do {
          if (parent[expando]) {
            var inserted = void 0;
            inserted = parent[expando]._onDragOver({
              clientX: touchEvt.clientX,
              clientY: touchEvt.clientY,
              target: target,
              rootEl: parent
            });

            if (inserted && !this.options.dragoverBubble) {
              break;
            }
          }

          target = parent; // store last element
        }
        /* jshint boss:true */
        while (parent = parent.parentNode);
      }

      _unhideGhostForTarget();
    }
  },
  _onTouchMove: function _onTouchMove(
  /**TouchEvent*/
  evt) {
    if (tapEvt) {
      var options = this.options,
          fallbackTolerance = options.fallbackTolerance,
          fallbackOffset = options.fallbackOffset,
          touch = evt.touches ? evt.touches[0] : evt,
          ghostMatrix = ghostEl && matrix(ghostEl, true),
          scaleX = ghostEl && ghostMatrix && ghostMatrix.a,
          scaleY = ghostEl && ghostMatrix && ghostMatrix.d,
          relativeScrollOffset = PositionGhostAbsolutely && ghostRelativeParent && getRelativeScrollOffset(ghostRelativeParent),
          dx = (touch.clientX - tapEvt.clientX + fallbackOffset.x) / (scaleX || 1) + (relativeScrollOffset ? relativeScrollOffset[0] - ghostRelativeParentInitialScroll[0] : 0) / (scaleX || 1),
          dy = (touch.clientY - tapEvt.clientY + fallbackOffset.y) / (scaleY || 1) + (relativeScrollOffset ? relativeScrollOffset[1] - ghostRelativeParentInitialScroll[1] : 0) / (scaleY || 1); // only set the status to dragging, when we are actually dragging

      if (!Sortable.active && !awaitingDragStarted) {
        if (fallbackTolerance && Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) < fallbackTolerance) {
          return;
        }

        this._onDragStart(evt, true);
      }

      if (ghostEl) {
        if (ghostMatrix) {
          ghostMatrix.e += dx - (lastDx || 0);
          ghostMatrix.f += dy - (lastDy || 0);
        } else {
          ghostMatrix = {
            a: 1,
            b: 0,
            c: 0,
            d: 1,
            e: dx,
            f: dy
          };
        }

        var cssMatrix = "matrix(".concat(ghostMatrix.a, ",").concat(ghostMatrix.b, ",").concat(ghostMatrix.c, ",").concat(ghostMatrix.d, ",").concat(ghostMatrix.e, ",").concat(ghostMatrix.f, ")");
        css(ghostEl, 'webkitTransform', cssMatrix);
        css(ghostEl, 'mozTransform', cssMatrix);
        css(ghostEl, 'msTransform', cssMatrix);
        css(ghostEl, 'transform', cssMatrix);
        lastDx = dx;
        lastDy = dy;
        touchEvt = touch;
      }

      evt.cancelable && evt.preventDefault();
    }
  },
  _appendGhost: function _appendGhost() {
    // Bug if using scale(): https://stackoverflow.com/questions/2637058
    // Not being adjusted for
    if (!ghostEl) {
      var container = this.options.fallbackOnBody ? document.body : rootEl,
          rect = getRect(dragEl, true, PositionGhostAbsolutely, true, container),
          options = this.options; // Position absolutely

      if (PositionGhostAbsolutely) {
        // Get relatively positioned parent
        ghostRelativeParent = container;

        while (css(ghostRelativeParent, 'position') === 'static' && css(ghostRelativeParent, 'transform') === 'none' && ghostRelativeParent !== document) {
          ghostRelativeParent = ghostRelativeParent.parentNode;
        }

        if (ghostRelativeParent !== document.body && ghostRelativeParent !== document.documentElement) {
          if (ghostRelativeParent === document) ghostRelativeParent = getWindowScrollingElement();
          rect.top += ghostRelativeParent.scrollTop;
          rect.left += ghostRelativeParent.scrollLeft;
        } else {
          ghostRelativeParent = getWindowScrollingElement();
        }

        ghostRelativeParentInitialScroll = getRelativeScrollOffset(ghostRelativeParent);
      }

      ghostEl = dragEl.cloneNode(true);
      toggleClass(ghostEl, options.ghostClass, false);
      toggleClass(ghostEl, options.fallbackClass, true);
      toggleClass(ghostEl, options.dragClass, true);
      css(ghostEl, 'transition', '');
      css(ghostEl, 'transform', '');
      css(ghostEl, 'box-sizing', 'border-box');
      css(ghostEl, 'margin', 0);
      css(ghostEl, 'top', rect.top);
      css(ghostEl, 'left', rect.left);
      css(ghostEl, 'width', rect.width);
      css(ghostEl, 'height', rect.height);
      css(ghostEl, 'opacity', '0.8');
      css(ghostEl, 'position', PositionGhostAbsolutely ? 'absolute' : 'fixed');
      css(ghostEl, 'zIndex', '100000');
      css(ghostEl, 'pointerEvents', 'none');
      Sortable.ghost = ghostEl;
      container.appendChild(ghostEl); // Set transform-origin

      css(ghostEl, 'transform-origin', tapDistanceLeft / parseInt(ghostEl.style.width) * 100 + '% ' + tapDistanceTop / parseInt(ghostEl.style.height) * 100 + '%');
    }
  },
  _onDragStart: function _onDragStart(
  /**Event*/
  evt,
  /**boolean*/
  fallback) {
    var _this = this;

    var dataTransfer = evt.dataTransfer;
    var options = _this.options;
    pluginEvent('dragStart', this, {
      evt: evt
    });

    if (Sortable.eventCanceled) {
      this._onDrop();

      return;
    }

    pluginEvent('setupClone', this);

    if (!Sortable.eventCanceled) {
      cloneEl = clone(dragEl);
      cloneEl.draggable = false;
      cloneEl.style['will-change'] = '';

      this._hideClone();

      toggleClass(cloneEl, this.options.chosenClass, false);
      Sortable.clone = cloneEl;
    } // #1143: IFrame support workaround


    _this.cloneId = _nextTick(function () {
      pluginEvent('clone', _this);
      if (Sortable.eventCanceled) return;

      if (!_this.options.removeCloneOnHide) {
        rootEl.insertBefore(cloneEl, dragEl);
      }

      _this._hideClone();

      _dispatchEvent({
        sortable: _this,
        name: 'clone'
      });
    });
    !fallback && toggleClass(dragEl, options.dragClass, true); // Set proper drop events

    if (fallback) {
      ignoreNextClick = true;
      _this._loopId = setInterval(_this._emulateDragOver, 50);
    } else {
      // Undo what was set in _prepareDragStart before drag started
      off(document, 'mouseup', _this._onDrop);
      off(document, 'touchend', _this._onDrop);
      off(document, 'touchcancel', _this._onDrop);

      if (dataTransfer) {
        dataTransfer.effectAllowed = 'move';
        options.setData && options.setData.call(_this, dataTransfer, dragEl);
      }

      on(document, 'drop', _this); // #1276 fix:

      css(dragEl, 'transform', 'translateZ(0)');
    }

    awaitingDragStarted = true;
    _this._dragStartId = _nextTick(_this._dragStarted.bind(_this, fallback, evt));
    on(document, 'selectstart', _this);
    moved = true;

    if (Safari) {
      css(document.body, 'user-select', 'none');
    }
  },
  // Returns true - if no further action is needed (either inserted or another condition)
  _onDragOver: function _onDragOver(
  /**Event*/
  evt) {
    var el = this.el,
        target = evt.target,
        dragRect,
        targetRect,
        revert,
        options = this.options,
        group = options.group,
        activeSortable = Sortable.active,
        isOwner = activeGroup === group,
        canSort = options.sort,
        fromSortable = putSortable || activeSortable,
        vertical,
        _this = this,
        completedFired = false;

    if (_silent) return;

    function dragOverEvent(name, extra) {
      pluginEvent(name, _this, _objectSpread({
        evt: evt,
        isOwner: isOwner,
        axis: vertical ? 'vertical' : 'horizontal',
        revert: revert,
        dragRect: dragRect,
        targetRect: targetRect,
        canSort: canSort,
        fromSortable: fromSortable,
        target: target,
        completed: completed,
        onMove: function onMove(target, after) {
          return _onMove(rootEl, el, dragEl, dragRect, target, getRect(target), evt, after);
        },
        changed: changed
      }, extra));
    } // Capture animation state


    function capture() {
      dragOverEvent('dragOverAnimationCapture');

      _this.captureAnimationState();

      if (_this !== fromSortable) {
        fromSortable.captureAnimationState();
      }
    } // Return invocation when dragEl is inserted (or completed)


    function completed(insertion) {
      dragOverEvent('dragOverCompleted', {
        insertion: insertion
      });

      if (insertion) {
        // Clones must be hidden before folding animation to capture dragRectAbsolute properly
        if (isOwner) {
          activeSortable._hideClone();
        } else {
          activeSortable._showClone(_this);
        }

        if (_this !== fromSortable) {
          // Set ghost class to new sortable's ghost class
          toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : activeSortable.options.ghostClass, false);
          toggleClass(dragEl, options.ghostClass, true);
        }

        if (putSortable !== _this && _this !== Sortable.active) {
          putSortable = _this;
        } else if (_this === Sortable.active && putSortable) {
          putSortable = null;
        } // Animation


        if (fromSortable === _this) {
          _this._ignoreWhileAnimating = target;
        }

        _this.animateAll(function () {
          dragOverEvent('dragOverAnimationComplete');
          _this._ignoreWhileAnimating = null;
        });

        if (_this !== fromSortable) {
          fromSortable.animateAll();
          fromSortable._ignoreWhileAnimating = null;
        }
      } // Null lastTarget if it is not inside a previously swapped element


      if (target === dragEl && !dragEl.animated || target === el && !target.animated) {
        lastTarget = null;
      } // no bubbling and not fallback


      if (!options.dragoverBubble && !evt.rootEl && target !== document) {
        dragEl.parentNode[expando]._isOutsideThisEl(evt.target); // Do not detect for empty insert if already inserted


        !insertion && nearestEmptyInsertDetectEvent(evt);
      }

      !options.dragoverBubble && evt.stopPropagation && evt.stopPropagation();
      return completedFired = true;
    } // Call when dragEl has been inserted


    function changed() {
      newIndex = index(dragEl);
      newDraggableIndex = index(dragEl, options.draggable);

      _dispatchEvent({
        sortable: _this,
        name: 'change',
        toEl: el,
        newIndex: newIndex,
        newDraggableIndex: newDraggableIndex,
        originalEvent: evt
      });
    }

    if (evt.preventDefault !== void 0) {
      evt.cancelable && evt.preventDefault();
    }

    target = closest(target, options.draggable, el, true);
    dragOverEvent('dragOver');
    if (Sortable.eventCanceled) return completedFired;

    if (dragEl.contains(evt.target) || target.animated && target.animatingX && target.animatingY || _this._ignoreWhileAnimating === target) {
      return completed(false);
    }

    ignoreNextClick = false;

    if (activeSortable && !options.disabled && (isOwner ? canSort || (revert = !rootEl.contains(dragEl)) // Reverting item into the original list
    : putSortable === this || (this.lastPutMode = activeGroup.checkPull(this, activeSortable, dragEl, evt)) && group.checkPut(this, activeSortable, dragEl, evt))) {
      vertical = this._getDirection(evt, target) === 'vertical';
      dragRect = getRect(dragEl);
      dragOverEvent('dragOverValid');
      if (Sortable.eventCanceled) return completedFired;

      if (revert) {
        parentEl = rootEl; // actualization

        capture();

        this._hideClone();

        dragOverEvent('revert');

        if (!Sortable.eventCanceled) {
          if (nextEl) {
            rootEl.insertBefore(dragEl, nextEl);
          } else {
            rootEl.appendChild(dragEl);
          }
        }

        return completed(true);
      }

      var elLastChild = lastChild(el, options.draggable);

      if (!elLastChild || _ghostIsLast(evt, vertical, this) && !elLastChild.animated) {
        // If already at end of list: Do not insert
        if (elLastChild === dragEl) {
          return completed(false);
        } // assign target only if condition is true


        if (elLastChild && el === evt.target) {
          target = elLastChild;
        }

        if (target) {
          targetRect = getRect(target);
        }

        if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, !!target) !== false) {
          capture();
          el.appendChild(dragEl);
          parentEl = el; // actualization

          changed();
          return completed(true);
        }
      } else if (target.parentNode === el) {
        targetRect = getRect(target);
        var direction = 0,
            targetBeforeFirstSwap,
            differentLevel = dragEl.parentNode !== el,
            differentRowCol = !_dragElInRowColumn(dragEl.animated && dragEl.toRect || dragRect, target.animated && target.toRect || targetRect, vertical),
            side1 = vertical ? 'top' : 'left',
            scrolledPastTop = isScrolledPast(target, 'top', 'top') || isScrolledPast(dragEl, 'top', 'top'),
            scrollBefore = scrolledPastTop ? scrolledPastTop.scrollTop : void 0;

        if (lastTarget !== target) {
          targetBeforeFirstSwap = targetRect[side1];
          pastFirstInvertThresh = false;
          isCircumstantialInvert = !differentRowCol && options.invertSwap || differentLevel;
        }

        direction = _getSwapDirection(evt, target, targetRect, vertical, differentRowCol ? 1 : options.swapThreshold, options.invertedSwapThreshold == null ? options.swapThreshold : options.invertedSwapThreshold, isCircumstantialInvert, lastTarget === target);
        var sibling;

        if (direction !== 0) {
          // Check if target is beside dragEl in respective direction (ignoring hidden elements)
          var dragIndex = index(dragEl);

          do {
            dragIndex -= direction;
            sibling = parentEl.children[dragIndex];
          } while (sibling && (css(sibling, 'display') === 'none' || sibling === ghostEl));
        } // If dragEl is already beside target: Do not insert


        if (direction === 0 || sibling === target) {
          return completed(false);
        }

        lastTarget = target;
        lastDirection = direction;
        var nextSibling = target.nextElementSibling,
            after = false;
        after = direction === 1;

        var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

        if (moveVector !== false) {
          if (moveVector === 1 || moveVector === -1) {
            after = moveVector === 1;
          }

          _silent = true;
          setTimeout(_unsilent, 30);
          capture();

          if (after && !nextSibling) {
            el.appendChild(dragEl);
          } else {
            target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
          } // Undo chrome's scroll adjustment (has no effect on other browsers)


          if (scrolledPastTop) {
            scrollBy(scrolledPastTop, 0, scrollBefore - scrolledPastTop.scrollTop);
          }

          parentEl = dragEl.parentNode; // actualization
          // must be done before animation

          if (targetBeforeFirstSwap !== undefined && !isCircumstantialInvert) {
            targetMoveDistance = Math.abs(targetBeforeFirstSwap - getRect(target)[side1]);
          }

          changed();
          return completed(true);
        }
      }

      if (el.contains(dragEl)) {
        return completed(false);
      }
    }

    return false;
  },
  _ignoreWhileAnimating: null,
  _offMoveEvents: function _offMoveEvents() {
    off(document, 'mousemove', this._onTouchMove);
    off(document, 'touchmove', this._onTouchMove);
    off(document, 'pointermove', this._onTouchMove);
    off(document, 'dragover', nearestEmptyInsertDetectEvent);
    off(document, 'mousemove', nearestEmptyInsertDetectEvent);
    off(document, 'touchmove', nearestEmptyInsertDetectEvent);
  },
  _offUpEvents: function _offUpEvents() {
    var ownerDocument = this.el.ownerDocument;
    off(ownerDocument, 'mouseup', this._onDrop);
    off(ownerDocument, 'touchend', this._onDrop);
    off(ownerDocument, 'pointerup', this._onDrop);
    off(ownerDocument, 'touchcancel', this._onDrop);
    off(document, 'selectstart', this);
  },
  _onDrop: function _onDrop(
  /**Event*/
  evt) {
    var el = this.el,
        options = this.options; // Get the index of the dragged element within its parent

    newIndex = index(dragEl);
    newDraggableIndex = index(dragEl, options.draggable);
    pluginEvent('drop', this, {
      evt: evt
    });
    parentEl = dragEl && dragEl.parentNode; // Get again after plugin event

    newIndex = index(dragEl);
    newDraggableIndex = index(dragEl, options.draggable);

    if (Sortable.eventCanceled) {
      this._nulling();

      return;
    }

    awaitingDragStarted = false;
    isCircumstantialInvert = false;
    pastFirstInvertThresh = false;
    clearInterval(this._loopId);
    clearTimeout(this._dragStartTimer);

    _cancelNextTick(this.cloneId);

    _cancelNextTick(this._dragStartId); // Unbind events


    if (this.nativeDraggable) {
      off(document, 'drop', this);
      off(el, 'dragstart', this._onDragStart);
    }

    this._offMoveEvents();

    this._offUpEvents();

    if (Safari) {
      css(document.body, 'user-select', '');
    }

    css(dragEl, 'transform', '');

    if (evt) {
      if (moved) {
        evt.cancelable && evt.preventDefault();
        !options.dropBubble && evt.stopPropagation();
      }

      ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

      if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
        // Remove clone(s)
        cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
      }

      if (dragEl) {
        if (this.nativeDraggable) {
          off(dragEl, 'dragend', this);
        }

        _disableDraggable(dragEl);

        dragEl.style['will-change'] = ''; // Remove classes
        // ghostClass is added in dragStarted

        if (moved && !awaitingDragStarted) {
          toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : this.options.ghostClass, false);
        }

        toggleClass(dragEl, this.options.chosenClass, false); // Drag stop event

        _dispatchEvent({
          sortable: this,
          name: 'unchoose',
          toEl: parentEl,
          newIndex: null,
          newDraggableIndex: null,
          originalEvent: evt
        });

        if (rootEl !== parentEl) {
          if (newIndex >= 0) {
            // Add event
            _dispatchEvent({
              rootEl: parentEl,
              name: 'add',
              toEl: parentEl,
              fromEl: rootEl,
              originalEvent: evt
            }); // Remove event


            _dispatchEvent({
              sortable: this,
              name: 'remove',
              toEl: parentEl,
              originalEvent: evt
            }); // drag from one list and drop into another


            _dispatchEvent({
              rootEl: parentEl,
              name: 'sort',
              toEl: parentEl,
              fromEl: rootEl,
              originalEvent: evt
            });

            _dispatchEvent({
              sortable: this,
              name: 'sort',
              toEl: parentEl,
              originalEvent: evt
            });
          }

          putSortable && putSortable.save();
        } else {
          if (newIndex !== oldIndex) {
            if (newIndex >= 0) {
              // drag & drop within the same list
              _dispatchEvent({
                sortable: this,
                name: 'update',
                toEl: parentEl,
                originalEvent: evt
              });

              _dispatchEvent({
                sortable: this,
                name: 'sort',
                toEl: parentEl,
                originalEvent: evt
              });
            }
          }
        }

        if (Sortable.active) {
          /* jshint eqnull:true */
          if (newIndex == null || newIndex === -1) {
            newIndex = oldIndex;
            newDraggableIndex = oldDraggableIndex;
          }

          _dispatchEvent({
            sortable: this,
            name: 'end',
            toEl: parentEl,
            originalEvent: evt
          }); // Save sorting


          this.save();
        }
      }
    }

    this._nulling();
  },
  _nulling: function _nulling() {
    pluginEvent('nulling', this);
    rootEl = dragEl = parentEl = ghostEl = nextEl = cloneEl = lastDownEl = cloneHidden = tapEvt = touchEvt = moved = newIndex = newDraggableIndex = oldIndex = oldDraggableIndex = lastTarget = lastDirection = putSortable = activeGroup = Sortable.dragged = Sortable.ghost = Sortable.clone = Sortable.active = null;
    savedInputChecked.forEach(function (el) {
      el.checked = true;
    });
    savedInputChecked.length = lastDx = lastDy = 0;
  },
  handleEvent: function handleEvent(
  /**Event*/
  evt) {
    switch (evt.type) {
      case 'drop':
      case 'dragend':
        this._onDrop(evt);

        break;

      case 'dragenter':
      case 'dragover':
        if (dragEl) {
          this._onDragOver(evt);

          _globalDragOver(evt);
        }

        break;

      case 'selectstart':
        evt.preventDefault();
        break;
    }
  },

  /**
   * Serializes the item into an array of string.
   * @returns {String[]}
   */
  toArray: function toArray() {
    var order = [],
        el,
        children = this.el.children,
        i = 0,
        n = children.length,
        options = this.options;

    for (; i < n; i++) {
      el = children[i];

      if (closest(el, options.draggable, this.el, false)) {
        order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
      }
    }

    return order;
  },

  /**
   * Sorts the elements according to the array.
   * @param  {String[]}  order  order of the items
   */
  sort: function sort(order, useAnimation) {
    var items = {},
        rootEl = this.el;
    this.toArray().forEach(function (id, i) {
      var el = rootEl.children[i];

      if (closest(el, this.options.draggable, rootEl, false)) {
        items[id] = el;
      }
    }, this);
    useAnimation && this.captureAnimationState();
    order.forEach(function (id) {
      if (items[id]) {
        rootEl.removeChild(items[id]);
        rootEl.appendChild(items[id]);
      }
    });
    useAnimation && this.animateAll();
  },

  /**
   * Save the current sorting
   */
  save: function save() {
    var store = this.options.store;
    store && store.set && store.set(this);
  },

  /**
   * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
   * @param   {HTMLElement}  el
   * @param   {String}       [selector]  default: `options.draggable`
   * @returns {HTMLElement|null}
   */
  closest: function closest$1(el, selector) {
    return closest(el, selector || this.options.draggable, this.el, false);
  },

  /**
   * Set/get option
   * @param   {string} name
   * @param   {*}      [value]
   * @returns {*}
   */
  option: function option(name, value) {
    var options = this.options;

    if (value === void 0) {
      return options[name];
    } else {
      var modifiedValue = PluginManager.modifyOption(this, name, value);

      if (typeof modifiedValue !== 'undefined') {
        options[name] = modifiedValue;
      } else {
        options[name] = value;
      }

      if (name === 'group') {
        _prepareGroup(options);
      }
    }
  },

  /**
   * Destroy
   */
  destroy: function destroy() {
    pluginEvent('destroy', this);
    var el = this.el;
    el[expando] = null;
    off(el, 'mousedown', this._onTapStart);
    off(el, 'touchstart', this._onTapStart);
    off(el, 'pointerdown', this._onTapStart);

    if (this.nativeDraggable) {
      off(el, 'dragover', this);
      off(el, 'dragenter', this);
    } // Remove draggable attributes


    Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
      el.removeAttribute('draggable');
    });

    this._onDrop();

    this._disableDelayedDragEvents();

    sortables.splice(sortables.indexOf(this.el), 1);
    this.el = el = null;
  },
  _hideClone: function _hideClone() {
    if (!cloneHidden) {
      pluginEvent('hideClone', this);
      if (Sortable.eventCanceled) return;
      css(cloneEl, 'display', 'none');

      if (this.options.removeCloneOnHide && cloneEl.parentNode) {
        cloneEl.parentNode.removeChild(cloneEl);
      }

      cloneHidden = true;
    }
  },
  _showClone: function _showClone(putSortable) {
    if (putSortable.lastPutMode !== 'clone') {
      this._hideClone();

      return;
    }

    if (cloneHidden) {
      pluginEvent('showClone', this);
      if (Sortable.eventCanceled) return; // show clone at dragEl or original position

      if (dragEl.parentNode == rootEl && !this.options.group.revertClone) {
        rootEl.insertBefore(cloneEl, dragEl);
      } else if (nextEl) {
        rootEl.insertBefore(cloneEl, nextEl);
      } else {
        rootEl.appendChild(cloneEl);
      }

      if (this.options.group.revertClone) {
        this.animate(dragEl, cloneEl);
      }

      css(cloneEl, 'display', '');
      cloneHidden = false;
    }
  }
};

function _globalDragOver(
/**Event*/
evt) {
  if (evt.dataTransfer) {
    evt.dataTransfer.dropEffect = 'move';
  }

  evt.cancelable && evt.preventDefault();
}

function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvent, willInsertAfter) {
  var evt,
      sortable = fromEl[expando],
      onMoveFn = sortable.options.onMove,
      retVal; // Support for new CustomEvent feature

  if (window.CustomEvent && !IE11OrLess && !Edge) {
    evt = new CustomEvent('move', {
      bubbles: true,
      cancelable: true
    });
  } else {
    evt = document.createEvent('Event');
    evt.initEvent('move', true, true);
  }

  evt.to = toEl;
  evt.from = fromEl;
  evt.dragged = dragEl;
  evt.draggedRect = dragRect;
  evt.related = targetEl || toEl;
  evt.relatedRect = targetRect || getRect(toEl);
  evt.willInsertAfter = willInsertAfter;
  evt.originalEvent = originalEvent;
  fromEl.dispatchEvent(evt);

  if (onMoveFn) {
    retVal = onMoveFn.call(sortable, evt, originalEvent);
  }

  return retVal;
}

function _disableDraggable(el) {
  el.draggable = false;
}

function _unsilent() {
  _silent = false;
}

function _ghostIsLast(evt, vertical, sortable) {
  var rect = getRect(lastChild(sortable.el, sortable.options.draggable));
  var spacer = 10;
  return vertical ? evt.clientX > rect.right + spacer || evt.clientX <= rect.right && evt.clientY > rect.bottom && evt.clientX >= rect.left : evt.clientX > rect.right && evt.clientY > rect.top || evt.clientX <= rect.right && evt.clientY > rect.bottom + spacer;
}

function _getSwapDirection(evt, target, targetRect, vertical, swapThreshold, invertedSwapThreshold, invertSwap, isLastTarget) {
  var mouseOnAxis = vertical ? evt.clientY : evt.clientX,
      targetLength = vertical ? targetRect.height : targetRect.width,
      targetS1 = vertical ? targetRect.top : targetRect.left,
      targetS2 = vertical ? targetRect.bottom : targetRect.right,
      invert = false;

  if (!invertSwap) {
    // Never invert or create dragEl shadow when target movemenet causes mouse to move past the end of regular swapThreshold
    if (isLastTarget && targetMoveDistance < targetLength * swapThreshold) {
      // multiplied only by swapThreshold because mouse will already be inside target by (1 - threshold) * targetLength / 2
      // check if past first invert threshold on side opposite of lastDirection
      if (!pastFirstInvertThresh && (lastDirection === 1 ? mouseOnAxis > targetS1 + targetLength * invertedSwapThreshold / 2 : mouseOnAxis < targetS2 - targetLength * invertedSwapThreshold / 2)) {
        // past first invert threshold, do not restrict inverted threshold to dragEl shadow
        pastFirstInvertThresh = true;
      }

      if (!pastFirstInvertThresh) {
        // dragEl shadow (target move distance shadow)
        if (lastDirection === 1 ? mouseOnAxis < targetS1 + targetMoveDistance // over dragEl shadow
        : mouseOnAxis > targetS2 - targetMoveDistance) {
          return -lastDirection;
        }
      } else {
        invert = true;
      }
    } else {
      // Regular
      if (mouseOnAxis > targetS1 + targetLength * (1 - swapThreshold) / 2 && mouseOnAxis < targetS2 - targetLength * (1 - swapThreshold) / 2) {
        return _getInsertDirection(target);
      }
    }
  }

  invert = invert || invertSwap;

  if (invert) {
    // Invert of regular
    if (mouseOnAxis < targetS1 + targetLength * invertedSwapThreshold / 2 || mouseOnAxis > targetS2 - targetLength * invertedSwapThreshold / 2) {
      return mouseOnAxis > targetS1 + targetLength / 2 ? 1 : -1;
    }
  }

  return 0;
}
/**
 * Gets the direction dragEl must be swapped relative to target in order to make it
 * seem that dragEl has been "inserted" into that element's position
 * @param  {HTMLElement} target       The target whose position dragEl is being inserted at
 * @return {Number}                   Direction dragEl must be swapped
 */


function _getInsertDirection(target) {
  if (index(dragEl) < index(target)) {
    return 1;
  } else {
    return -1;
  }
}
/**
 * Generate id
 * @param   {HTMLElement} el
 * @returns {String}
 * @private
 */


function _generateId(el) {
  var str = el.tagName + el.className + el.src + el.href + el.textContent,
      i = str.length,
      sum = 0;

  while (i--) {
    sum += str.charCodeAt(i);
  }

  return sum.toString(36);
}

function _saveInputCheckedState(root) {
  savedInputChecked.length = 0;
  var inputs = root.getElementsByTagName('input');
  var idx = inputs.length;

  while (idx--) {
    var el = inputs[idx];
    el.checked && savedInputChecked.push(el);
  }
}

function _nextTick(fn) {
  return setTimeout(fn, 0);
}

function _cancelNextTick(id) {
  return clearTimeout(id);
} // Fixed #973:


if (documentExists) {
  on(document, 'touchmove', function (evt) {
    if ((Sortable.active || awaitingDragStarted) && evt.cancelable) {
      evt.preventDefault();
    }
  });
} // Export utils


Sortable.utils = {
  on: on,
  off: off,
  css: css,
  find: find,
  is: function is(el, selector) {
    return !!closest(el, selector, el, false);
  },
  extend: extend,
  throttle: throttle,
  closest: closest,
  toggleClass: toggleClass,
  clone: clone,
  index: index,
  nextTick: _nextTick,
  cancelNextTick: _cancelNextTick,
  detectDirection: _detectDirection,
  getChild: getChild
};
/**
 * Get the Sortable instance of an element
 * @param  {HTMLElement} element The element
 * @return {Sortable|undefined}         The instance of Sortable
 */

Sortable.get = function (element) {
  return element[expando];
};
/**
 * Mount a plugin to Sortable
 * @param  {...SortablePlugin|SortablePlugin[]} plugins       Plugins being mounted
 */


Sortable.mount = function () {
  for (var _len = arguments.length, plugins = new Array(_len), _key = 0; _key < _len; _key++) {
    plugins[_key] = arguments[_key];
  }

  if (plugins[0].constructor === Array) plugins = plugins[0];
  plugins.forEach(function (plugin) {
    if (!plugin.prototype || !plugin.prototype.constructor) {
      throw "Sortable: Mounted plugin must be a constructor function, not ".concat({}.toString.call(plugin));
    }

    if (plugin.utils) Sortable.utils = _objectSpread({}, Sortable.utils, plugin.utils);
    PluginManager.mount(plugin);
  });
};
/**
 * Create sortable instance
 * @param {HTMLElement}  el
 * @param {Object}      [options]
 */


Sortable.create = function (el, options) {
  return new Sortable(el, options);
}; // Export


Sortable.version = version;

var autoScrolls = [],
    scrollEl,
    scrollRootEl,
    scrolling = false,
    lastAutoScrollX,
    lastAutoScrollY,
    touchEvt$1,
    pointerElemChangedInterval;

function AutoScrollPlugin() {
  function AutoScroll() {
    this.defaults = {
      scroll: true,
      scrollSensitivity: 30,
      scrollSpeed: 10,
      bubbleScroll: true
    }; // Bind all private methods

    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    }
  }

  AutoScroll.prototype = {
    dragStarted: function dragStarted(_ref) {
      var originalEvent = _ref.originalEvent;

      if (this.sortable.nativeDraggable) {
        on(document, 'dragover', this._handleAutoScroll);
      } else {
        if (this.options.supportPointer) {
          on(document, 'pointermove', this._handleFallbackAutoScroll);
        } else if (originalEvent.touches) {
          on(document, 'touchmove', this._handleFallbackAutoScroll);
        } else {
          on(document, 'mousemove', this._handleFallbackAutoScroll);
        }
      }
    },
    dragOverCompleted: function dragOverCompleted(_ref2) {
      var originalEvent = _ref2.originalEvent;

      // For when bubbling is canceled and using fallback (fallback 'touchmove' always reached)
      if (!this.options.dragOverBubble && !originalEvent.rootEl) {
        this._handleAutoScroll(originalEvent);
      }
    },
    drop: function drop() {
      if (this.sortable.nativeDraggable) {
        off(document, 'dragover', this._handleAutoScroll);
      } else {
        off(document, 'pointermove', this._handleFallbackAutoScroll);
        off(document, 'touchmove', this._handleFallbackAutoScroll);
        off(document, 'mousemove', this._handleFallbackAutoScroll);
      }

      clearPointerElemChangedInterval();
      clearAutoScrolls();
      cancelThrottle();
    },
    nulling: function nulling() {
      touchEvt$1 = scrollRootEl = scrollEl = scrolling = pointerElemChangedInterval = lastAutoScrollX = lastAutoScrollY = null;
      autoScrolls.length = 0;
    },
    _handleFallbackAutoScroll: function _handleFallbackAutoScroll(evt) {
      this._handleAutoScroll(evt, true);
    },
    _handleAutoScroll: function _handleAutoScroll(evt, fallback) {
      var _this = this;

      var x = (evt.touches ? evt.touches[0] : evt).clientX,
          y = (evt.touches ? evt.touches[0] : evt).clientY,
          elem = document.elementFromPoint(x, y);
      touchEvt$1 = evt; // IE does not seem to have native autoscroll,
      // Edge's autoscroll seems too conditional,
      // MACOS Safari does not have autoscroll,
      // Firefox and Chrome are good

      if (fallback || Edge || IE11OrLess || Safari) {
        autoScroll(evt, this.options, elem, fallback); // Listener for pointer element change

        var ogElemScroller = getParentAutoScrollElement(elem, true);

        if (scrolling && (!pointerElemChangedInterval || x !== lastAutoScrollX || y !== lastAutoScrollY)) {
          pointerElemChangedInterval && clearPointerElemChangedInterval(); // Detect for pointer elem change, emulating native DnD behaviour

          pointerElemChangedInterval = setInterval(function () {
            var newElem = getParentAutoScrollElement(document.elementFromPoint(x, y), true);

            if (newElem !== ogElemScroller) {
              ogElemScroller = newElem;
              clearAutoScrolls();
            }

            autoScroll(evt, _this.options, newElem, fallback);
          }, 10);
          lastAutoScrollX = x;
          lastAutoScrollY = y;
        }
      } else {
        // if DnD is enabled (and browser has good autoscrolling), first autoscroll will already scroll, so get parent autoscroll of first autoscroll
        if (!this.options.bubbleScroll || getParentAutoScrollElement(elem, true) === getWindowScrollingElement()) {
          clearAutoScrolls();
          return;
        }

        autoScroll(evt, this.options, getParentAutoScrollElement(elem, false), false);
      }
    }
  };
  return _extends(AutoScroll, {
    pluginName: 'scroll',
    initializeByDefault: true
  });
}

function clearAutoScrolls() {
  autoScrolls.forEach(function (autoScroll) {
    clearInterval(autoScroll.pid);
  });
  autoScrolls = [];
}

function clearPointerElemChangedInterval() {
  clearInterval(pointerElemChangedInterval);
}

var autoScroll = throttle(function (evt, options, rootEl, isFallback) {
  // Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
  if (!options.scroll) return;
  var x = (evt.touches ? evt.touches[0] : evt).clientX,
      y = (evt.touches ? evt.touches[0] : evt).clientY,
      sens = options.scrollSensitivity,
      speed = options.scrollSpeed,
      winScroller = getWindowScrollingElement();
  var scrollThisInstance = false,
      scrollCustomFn; // New scroll root, set scrollEl

  if (scrollRootEl !== rootEl) {
    scrollRootEl = rootEl;
    clearAutoScrolls();
    scrollEl = options.scroll;
    scrollCustomFn = options.scrollFn;

    if (scrollEl === true) {
      scrollEl = getParentAutoScrollElement(rootEl, true);
    }
  }

  var layersOut = 0;
  var currentParent = scrollEl;

  do {
    var el = currentParent,
        rect = getRect(el),
        top = rect.top,
        bottom = rect.bottom,
        left = rect.left,
        right = rect.right,
        width = rect.width,
        height = rect.height,
        canScrollX = void 0,
        canScrollY = void 0,
        scrollWidth = el.scrollWidth,
        scrollHeight = el.scrollHeight,
        elCSS = css(el),
        scrollPosX = el.scrollLeft,
        scrollPosY = el.scrollTop;

    if (el === winScroller) {
      canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll' || elCSS.overflowX === 'visible');
      canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll' || elCSS.overflowY === 'visible');
    } else {
      canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll');
      canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll');
    }

    var vx = canScrollX && (Math.abs(right - x) <= sens && scrollPosX + width < scrollWidth) - (Math.abs(left - x) <= sens && !!scrollPosX);
    var vy = canScrollY && (Math.abs(bottom - y) <= sens && scrollPosY + height < scrollHeight) - (Math.abs(top - y) <= sens && !!scrollPosY);

    if (!autoScrolls[layersOut]) {
      for (var i = 0; i <= layersOut; i++) {
        if (!autoScrolls[i]) {
          autoScrolls[i] = {};
        }
      }
    }

    if (autoScrolls[layersOut].vx != vx || autoScrolls[layersOut].vy != vy || autoScrolls[layersOut].el !== el) {
      autoScrolls[layersOut].el = el;
      autoScrolls[layersOut].vx = vx;
      autoScrolls[layersOut].vy = vy;
      clearInterval(autoScrolls[layersOut].pid);

      if (vx != 0 || vy != 0) {
        scrollThisInstance = true;
        /* jshint loopfunc:true */

        autoScrolls[layersOut].pid = setInterval(function () {
          // emulate drag over during autoscroll (fallback), emulating native DnD behaviour
          if (isFallback && this.layer === 0) {
            Sortable.active._onTouchMove(touchEvt$1); // To move ghost if it is positioned absolutely

          }

          var scrollOffsetY = autoScrolls[this.layer].vy ? autoScrolls[this.layer].vy * speed : 0;
          var scrollOffsetX = autoScrolls[this.layer].vx ? autoScrolls[this.layer].vx * speed : 0;

          if (typeof scrollCustomFn === 'function') {
            if (scrollCustomFn.call(Sortable.dragged.parentNode[expando], scrollOffsetX, scrollOffsetY, evt, touchEvt$1, autoScrolls[this.layer].el) !== 'continue') {
              return;
            }
          }

          scrollBy(autoScrolls[this.layer].el, scrollOffsetX, scrollOffsetY);
        }.bind({
          layer: layersOut
        }), 24);
      }
    }

    layersOut++;
  } while (options.bubbleScroll && currentParent !== winScroller && (currentParent = getParentAutoScrollElement(currentParent, false)));

  scrolling = scrollThisInstance; // in case another function catches scrolling as false in between when it is not
}, 30);

var drop = function drop(_ref) {
  var originalEvent = _ref.originalEvent,
      putSortable = _ref.putSortable,
      dragEl = _ref.dragEl,
      activeSortable = _ref.activeSortable,
      dispatchSortableEvent = _ref.dispatchSortableEvent,
      hideGhostForTarget = _ref.hideGhostForTarget,
      unhideGhostForTarget = _ref.unhideGhostForTarget;
  if (!originalEvent) return;
  var toSortable = putSortable || activeSortable;
  hideGhostForTarget();
  var touch = originalEvent.changedTouches && originalEvent.changedTouches.length ? originalEvent.changedTouches[0] : originalEvent;
  var target = document.elementFromPoint(touch.clientX, touch.clientY);
  unhideGhostForTarget();

  if (toSortable && !toSortable.el.contains(target)) {
    dispatchSortableEvent('spill');
    this.onSpill({
      dragEl: dragEl,
      putSortable: putSortable
    });
  }
};

function Revert() {}

Revert.prototype = {
  startIndex: null,
  dragStart: function dragStart(_ref2) {
    var oldDraggableIndex = _ref2.oldDraggableIndex;
    this.startIndex = oldDraggableIndex;
  },
  onSpill: function onSpill(_ref3) {
    var dragEl = _ref3.dragEl,
        putSortable = _ref3.putSortable;
    this.sortable.captureAnimationState();

    if (putSortable) {
      putSortable.captureAnimationState();
    }

    var nextSibling = getChild(this.sortable.el, this.startIndex, this.options);

    if (nextSibling) {
      this.sortable.el.insertBefore(dragEl, nextSibling);
    } else {
      this.sortable.el.appendChild(dragEl);
    }

    this.sortable.animateAll();

    if (putSortable) {
      putSortable.animateAll();
    }
  },
  drop: drop
};

_extends(Revert, {
  pluginName: 'revertOnSpill'
});

function Remove() {}

Remove.prototype = {
  onSpill: function onSpill(_ref4) {
    var dragEl = _ref4.dragEl,
        putSortable = _ref4.putSortable;
    var parentSortable = putSortable || this.sortable;
    parentSortable.captureAnimationState();
    dragEl.parentNode && dragEl.parentNode.removeChild(dragEl);
    parentSortable.animateAll();
  },
  drop: drop
};

_extends(Remove, {
  pluginName: 'removeOnSpill'
});

var lastSwapEl;

function SwapPlugin() {
  function Swap() {
    this.defaults = {
      swapClass: 'sortable-swap-highlight'
    };
  }

  Swap.prototype = {
    dragStart: function dragStart(_ref) {
      var dragEl = _ref.dragEl;
      lastSwapEl = dragEl;
    },
    dragOverValid: function dragOverValid(_ref2) {
      var completed = _ref2.completed,
          target = _ref2.target,
          onMove = _ref2.onMove,
          activeSortable = _ref2.activeSortable,
          changed = _ref2.changed,
          cancel = _ref2.cancel;
      if (!activeSortable.options.swap) return;
      var el = this.sortable.el,
          options = this.options;

      if (target && target !== el) {
        var prevSwapEl = lastSwapEl;

        if (onMove(target) !== false) {
          toggleClass(target, options.swapClass, true);
          lastSwapEl = target;
        } else {
          lastSwapEl = null;
        }

        if (prevSwapEl && prevSwapEl !== lastSwapEl) {
          toggleClass(prevSwapEl, options.swapClass, false);
        }
      }

      changed();
      completed(true);
      cancel();
    },
    drop: function drop(_ref3) {
      var activeSortable = _ref3.activeSortable,
          putSortable = _ref3.putSortable,
          dragEl = _ref3.dragEl;
      var toSortable = putSortable || this.sortable;
      var options = this.options;
      lastSwapEl && toggleClass(lastSwapEl, options.swapClass, false);

      if (lastSwapEl && (options.swap || putSortable && putSortable.options.swap)) {
        if (dragEl !== lastSwapEl) {
          toSortable.captureAnimationState();
          if (toSortable !== activeSortable) activeSortable.captureAnimationState();
          swapNodes(dragEl, lastSwapEl);
          toSortable.animateAll();
          if (toSortable !== activeSortable) activeSortable.animateAll();
        }
      }
    },
    nulling: function nulling() {
      lastSwapEl = null;
    }
  };
  return _extends(Swap, {
    pluginName: 'swap',
    eventProperties: function eventProperties() {
      return {
        swapItem: lastSwapEl
      };
    }
  });
}

function swapNodes(n1, n2) {
  var p1 = n1.parentNode,
      p2 = n2.parentNode,
      i1,
      i2;
  if (!p1 || !p2 || p1.isEqualNode(n2) || p2.isEqualNode(n1)) return;
  i1 = index(n1);
  i2 = index(n2);

  if (p1.isEqualNode(p2) && i1 < i2) {
    i2++;
  }

  p1.insertBefore(n2, p1.children[i1]);
  p2.insertBefore(n1, p2.children[i2]);
}

var multiDragElements = [],
    multiDragClones = [],
    lastMultiDragSelect,
    // for selection with modifier key down (SHIFT)
multiDragSortable,
    initialFolding = false,
    // Initial multi-drag fold when drag started
folding = false,
    // Folding any other time
dragStarted = false,
    dragEl$1,
    clonesFromRect,
    clonesHidden;

function MultiDragPlugin() {
  function MultiDrag(sortable) {
    // Bind all private methods
    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    }

    if (sortable.options.supportPointer) {
      on(document, 'pointerup', this._deselectMultiDrag);
    } else {
      on(document, 'mouseup', this._deselectMultiDrag);
      on(document, 'touchend', this._deselectMultiDrag);
    }

    on(document, 'keydown', this._checkKeyDown);
    on(document, 'keyup', this._checkKeyUp);
    this.defaults = {
      selectedClass: 'sortable-selected',
      multiDragKey: null,
      setData: function setData(dataTransfer, dragEl) {
        var data = '';

        if (multiDragElements.length && multiDragSortable === sortable) {
          multiDragElements.forEach(function (multiDragElement, i) {
            data += (!i ? '' : ', ') + multiDragElement.textContent;
          });
        } else {
          data = dragEl.textContent;
        }

        dataTransfer.setData('Text', data);
      }
    };
  }

  MultiDrag.prototype = {
    multiDragKeyDown: false,
    isMultiDrag: false,
    delayStartGlobal: function delayStartGlobal(_ref) {
      var dragged = _ref.dragEl;
      dragEl$1 = dragged;
    },
    delayEnded: function delayEnded() {
      this.isMultiDrag = ~multiDragElements.indexOf(dragEl$1);
    },
    setupClone: function setupClone(_ref2) {
      var sortable = _ref2.sortable,
          cancel = _ref2.cancel;
      if (!this.isMultiDrag) return;

      for (var i = 0; i < multiDragElements.length; i++) {
        multiDragClones.push(clone(multiDragElements[i]));
        multiDragClones[i].sortableIndex = multiDragElements[i].sortableIndex;
        multiDragClones[i].draggable = false;
        multiDragClones[i].style['will-change'] = '';
        toggleClass(multiDragClones[i], this.options.selectedClass, false);
        multiDragElements[i] === dragEl$1 && toggleClass(multiDragClones[i], this.options.chosenClass, false);
      }

      sortable._hideClone();

      cancel();
    },
    clone: function clone(_ref3) {
      var sortable = _ref3.sortable,
          rootEl = _ref3.rootEl,
          dispatchSortableEvent = _ref3.dispatchSortableEvent,
          cancel = _ref3.cancel;
      if (!this.isMultiDrag) return;

      if (!this.options.removeCloneOnHide) {
        if (multiDragElements.length && multiDragSortable === sortable) {
          insertMultiDragClones(true, rootEl);
          dispatchSortableEvent('clone');
          cancel();
        }
      }
    },
    showClone: function showClone(_ref4) {
      var cloneNowShown = _ref4.cloneNowShown,
          rootEl = _ref4.rootEl,
          cancel = _ref4.cancel;
      if (!this.isMultiDrag) return;
      insertMultiDragClones(false, rootEl);
      multiDragClones.forEach(function (clone) {
        css(clone, 'display', '');
      });
      cloneNowShown();
      clonesHidden = false;
      cancel();
    },
    hideClone: function hideClone(_ref5) {
      var _this = this;

      var sortable = _ref5.sortable,
          cloneNowHidden = _ref5.cloneNowHidden,
          cancel = _ref5.cancel;
      if (!this.isMultiDrag) return;
      multiDragClones.forEach(function (clone) {
        css(clone, 'display', 'none');

        if (_this.options.removeCloneOnHide && clone.parentNode) {
          clone.parentNode.removeChild(clone);
        }
      });
      cloneNowHidden();
      clonesHidden = true;
      cancel();
    },
    dragStartGlobal: function dragStartGlobal(_ref6) {
      var sortable = _ref6.sortable;

      if (!this.isMultiDrag && multiDragSortable) {
        multiDragSortable.multiDrag._deselectMultiDrag();
      }

      multiDragElements.forEach(function (multiDragElement) {
        multiDragElement.sortableIndex = index(multiDragElement);
      }); // Sort multi-drag elements

      multiDragElements = multiDragElements.sort(function (a, b) {
        return a.sortableIndex - b.sortableIndex;
      });
      dragStarted = true;
    },
    dragStarted: function dragStarted(_ref7) {
      var _this2 = this;

      var sortable = _ref7.sortable;
      if (!this.isMultiDrag) return;

      if (this.options.sort) {
        // Capture rects,
        // hide multi drag elements (by positioning them absolute),
        // set multi drag elements rects to dragRect,
        // show multi drag elements,
        // animate to rects,
        // unset rects & remove from DOM
        sortable.captureAnimationState();

        if (this.options.animation) {
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            css(multiDragElement, 'position', 'absolute');
          });
          var dragRect = getRect(dragEl$1, false, true, true);
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            setRect(multiDragElement, dragRect);
          });
          folding = true;
          initialFolding = true;
        }
      }

      sortable.animateAll(function () {
        folding = false;
        initialFolding = false;

        if (_this2.options.animation) {
          multiDragElements.forEach(function (multiDragElement) {
            unsetRect(multiDragElement);
          });
        } // Remove all auxiliary multidrag items from el, if sorting enabled


        if (_this2.options.sort) {
          removeMultiDragElements();
        }
      });
    },
    dragOver: function dragOver(_ref8) {
      var target = _ref8.target,
          completed = _ref8.completed,
          cancel = _ref8.cancel;

      if (folding && ~multiDragElements.indexOf(target)) {
        completed(false);
        cancel();
      }
    },
    revert: function revert(_ref9) {
      var fromSortable = _ref9.fromSortable,
          rootEl = _ref9.rootEl,
          sortable = _ref9.sortable,
          dragRect = _ref9.dragRect;

      if (multiDragElements.length > 1) {
        // Setup unfold animation
        multiDragElements.forEach(function (multiDragElement) {
          sortable.addAnimationState({
            target: multiDragElement,
            rect: folding ? getRect(multiDragElement) : dragRect
          });
          unsetRect(multiDragElement);
          multiDragElement.fromRect = dragRect;
          fromSortable.removeAnimationState(multiDragElement);
        });
        folding = false;
        insertMultiDragElements(!this.options.removeCloneOnHide, rootEl);
      }
    },
    dragOverCompleted: function dragOverCompleted(_ref10) {
      var sortable = _ref10.sortable,
          isOwner = _ref10.isOwner,
          insertion = _ref10.insertion,
          activeSortable = _ref10.activeSortable,
          parentEl = _ref10.parentEl,
          putSortable = _ref10.putSortable;
      var options = this.options;

      if (insertion) {
        // Clones must be hidden before folding animation to capture dragRectAbsolute properly
        if (isOwner) {
          activeSortable._hideClone();
        }

        initialFolding = false; // If leaving sort:false root, or already folding - Fold to new location

        if (options.animation && multiDragElements.length > 1 && (folding || !isOwner && !activeSortable.options.sort && !putSortable)) {
          // Fold: Set all multi drag elements's rects to dragEl's rect when multi-drag elements are invisible
          var dragRectAbsolute = getRect(dragEl$1, false, true, true);
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            setRect(multiDragElement, dragRectAbsolute); // Move element(s) to end of parentEl so that it does not interfere with multi-drag clones insertion if they are inserted
            // while folding, and so that we can capture them again because old sortable will no longer be fromSortable

            parentEl.appendChild(multiDragElement);
          });
          folding = true;
        } // Clones must be shown (and check to remove multi drags) after folding when interfering multiDragElements are moved out


        if (!isOwner) {
          // Only remove if not folding (folding will remove them anyways)
          if (!folding) {
            removeMultiDragElements();
          }

          if (multiDragElements.length > 1) {
            var clonesHiddenBefore = clonesHidden;

            activeSortable._showClone(sortable); // Unfold animation for clones if showing from hidden


            if (activeSortable.options.animation && !clonesHidden && clonesHiddenBefore) {
              multiDragClones.forEach(function (clone) {
                activeSortable.addAnimationState({
                  target: clone,
                  rect: clonesFromRect
                });
                clone.fromRect = clonesFromRect;
                clone.thisAnimationDuration = null;
              });
            }
          } else {
            activeSortable._showClone(sortable);
          }
        }
      }
    },
    dragOverAnimationCapture: function dragOverAnimationCapture(_ref11) {
      var dragRect = _ref11.dragRect,
          isOwner = _ref11.isOwner,
          activeSortable = _ref11.activeSortable;
      multiDragElements.forEach(function (multiDragElement) {
        multiDragElement.thisAnimationDuration = null;
      });

      if (activeSortable.options.animation && !isOwner && activeSortable.multiDrag.isMultiDrag) {
        clonesFromRect = _extends({}, dragRect);
        var dragMatrix = matrix(dragEl$1, true);
        clonesFromRect.top -= dragMatrix.f;
        clonesFromRect.left -= dragMatrix.e;
      }
    },
    dragOverAnimationComplete: function dragOverAnimationComplete() {
      if (folding) {
        folding = false;
        removeMultiDragElements();
      }
    },
    drop: function drop(_ref12) {
      var evt = _ref12.originalEvent,
          rootEl = _ref12.rootEl,
          parentEl = _ref12.parentEl,
          sortable = _ref12.sortable,
          dispatchSortableEvent = _ref12.dispatchSortableEvent,
          oldIndex = _ref12.oldIndex,
          putSortable = _ref12.putSortable;
      var toSortable = putSortable || this.sortable;
      if (!evt) return;
      var options = this.options,
          children = parentEl.children; // Multi-drag selection

      if (!dragStarted) {
        if (options.multiDragKey && !this.multiDragKeyDown) {
          this._deselectMultiDrag();
        }

        toggleClass(dragEl$1, options.selectedClass, !~multiDragElements.indexOf(dragEl$1));

        if (!~multiDragElements.indexOf(dragEl$1)) {
          multiDragElements.push(dragEl$1);
          dispatchEvent({
            sortable: sortable,
            rootEl: rootEl,
            name: 'select',
            targetEl: dragEl$1,
            originalEvt: evt
          }); // Modifier activated, select from last to dragEl

          if (evt.shiftKey && lastMultiDragSelect && sortable.el.contains(lastMultiDragSelect)) {
            var lastIndex = index(lastMultiDragSelect),
                currentIndex = index(dragEl$1);

            if (~lastIndex && ~currentIndex && lastIndex !== currentIndex) {
              // Must include lastMultiDragSelect (select it), in case modified selection from no selection
              // (but previous selection existed)
              var n, i;

              if (currentIndex > lastIndex) {
                i = lastIndex;
                n = currentIndex;
              } else {
                i = currentIndex;
                n = lastIndex + 1;
              }

              for (; i < n; i++) {
                if (~multiDragElements.indexOf(children[i])) continue;
                toggleClass(children[i], options.selectedClass, true);
                multiDragElements.push(children[i]);
                dispatchEvent({
                  sortable: sortable,
                  rootEl: rootEl,
                  name: 'select',
                  targetEl: children[i],
                  originalEvt: evt
                });
              }
            }
          } else {
            lastMultiDragSelect = dragEl$1;
          }

          multiDragSortable = toSortable;
        } else {
          multiDragElements.splice(multiDragElements.indexOf(dragEl$1), 1);
          lastMultiDragSelect = null;
          dispatchEvent({
            sortable: sortable,
            rootEl: rootEl,
            name: 'deselect',
            targetEl: dragEl$1,
            originalEvt: evt
          });
        }
      } // Multi-drag drop


      if (dragStarted && this.isMultiDrag) {
        // Do not "unfold" after around dragEl if reverted
        if ((parentEl[expando].options.sort || parentEl !== rootEl) && multiDragElements.length > 1) {
          var dragRect = getRect(dragEl$1),
              multiDragIndex = index(dragEl$1, ':not(.' + this.options.selectedClass + ')');
          if (!initialFolding && options.animation) dragEl$1.thisAnimationDuration = null;
          toSortable.captureAnimationState();

          if (!initialFolding) {
            if (options.animation) {
              dragEl$1.fromRect = dragRect;
              multiDragElements.forEach(function (multiDragElement) {
                multiDragElement.thisAnimationDuration = null;

                if (multiDragElement !== dragEl$1) {
                  var rect = folding ? getRect(multiDragElement) : dragRect;
                  multiDragElement.fromRect = rect; // Prepare unfold animation

                  toSortable.addAnimationState({
                    target: multiDragElement,
                    rect: rect
                  });
                }
              });
            } // Multi drag elements are not necessarily removed from the DOM on drop, so to reinsert
            // properly they must all be removed


            removeMultiDragElements();
            multiDragElements.forEach(function (multiDragElement) {
              if (children[multiDragIndex]) {
                parentEl.insertBefore(multiDragElement, children[multiDragIndex]);
              } else {
                parentEl.appendChild(multiDragElement);
              }

              multiDragIndex++;
            }); // If initial folding is done, the elements may have changed position because they are now
            // unfolding around dragEl, even though dragEl may not have his index changed, so update event
            // must be fired here as Sortable will not.

            if (oldIndex === index(dragEl$1)) {
              var update = false;
              multiDragElements.forEach(function (multiDragElement) {
                if (multiDragElement.sortableIndex !== index(multiDragElement)) {
                  update = true;
                  return;
                }
              });

              if (update) {
                dispatchSortableEvent('update');
              }
            }
          } // Must be done after capturing individual rects (scroll bar)


          multiDragElements.forEach(function (multiDragElement) {
            unsetRect(multiDragElement);
          });
          toSortable.animateAll();
        }

        multiDragSortable = toSortable;
      } // Remove clones if necessary


      if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
        multiDragClones.forEach(function (clone) {
          clone.parentNode && clone.parentNode.removeChild(clone);
        });
      }
    },
    nullingGlobal: function nullingGlobal() {
      this.isMultiDrag = dragStarted = false;
      multiDragClones.length = 0;
    },
    destroyGlobal: function destroyGlobal() {
      this._deselectMultiDrag();

      off(document, 'pointerup', this._deselectMultiDrag);
      off(document, 'mouseup', this._deselectMultiDrag);
      off(document, 'touchend', this._deselectMultiDrag);
      off(document, 'keydown', this._checkKeyDown);
      off(document, 'keyup', this._checkKeyUp);
    },
    _deselectMultiDrag: function _deselectMultiDrag(evt) {
      if (typeof dragStarted !== "undefined" && dragStarted) return; // Only deselect if selection is in this sortable

      if (multiDragSortable !== this.sortable) return; // Only deselect if target is not item in this sortable

      if (evt && closest(evt.target, this.options.draggable, this.sortable.el, false)) return; // Only deselect if left click

      if (evt && evt.button !== 0) return;

      while (multiDragElements.length) {
        var el = multiDragElements[0];
        toggleClass(el, this.options.selectedClass, false);
        multiDragElements.shift();
        dispatchEvent({
          sortable: this.sortable,
          rootEl: this.sortable.el,
          name: 'deselect',
          targetEl: el,
          originalEvt: evt
        });
      }
    },
    _checkKeyDown: function _checkKeyDown(evt) {
      if (evt.key === this.options.multiDragKey) {
        this.multiDragKeyDown = true;
      }
    },
    _checkKeyUp: function _checkKeyUp(evt) {
      if (evt.key === this.options.multiDragKey) {
        this.multiDragKeyDown = false;
      }
    }
  };
  return _extends(MultiDrag, {
    // Static methods & properties
    pluginName: 'multiDrag',
    utils: {
      /**
       * Selects the provided multi-drag item
       * @param  {HTMLElement} el    The element to be selected
       */
      select: function select(el) {
        var sortable = el.parentNode[expando];
        if (!sortable || !sortable.options.multiDrag || ~multiDragElements.indexOf(el)) return;

        if (multiDragSortable && multiDragSortable !== sortable) {
          multiDragSortable.multiDrag._deselectMultiDrag();

          multiDragSortable = sortable;
        }

        toggleClass(el, sortable.options.selectedClass, true);
        multiDragElements.push(el);
      },

      /**
       * Deselects the provided multi-drag item
       * @param  {HTMLElement} el    The element to be deselected
       */
      deselect: function deselect(el) {
        var sortable = el.parentNode[expando],
            index = multiDragElements.indexOf(el);
        if (!sortable || !sortable.options.multiDrag || !~index) return;
        toggleClass(el, sortable.options.selectedClass, false);
        multiDragElements.splice(index, 1);
      }
    },
    eventProperties: function eventProperties() {
      var _this3 = this;

      var oldIndicies = [],
          newIndicies = [];
      multiDragElements.forEach(function (multiDragElement) {
        oldIndicies.push({
          multiDragElement: multiDragElement,
          index: multiDragElement.sortableIndex
        }); // multiDragElements will already be sorted if folding

        var newIndex;

        if (folding && multiDragElement !== dragEl$1) {
          newIndex = -1;
        } else if (folding) {
          newIndex = index(multiDragElement, ':not(.' + _this3.options.selectedClass + ')');
        } else {
          newIndex = index(multiDragElement);
        }

        newIndicies.push({
          multiDragElement: multiDragElement,
          index: newIndex
        });
      });
      return {
        items: _toConsumableArray(multiDragElements),
        clones: [].concat(multiDragClones),
        oldIndicies: oldIndicies,
        newIndicies: newIndicies
      };
    },
    optionListeners: {
      multiDragKey: function multiDragKey(key) {
        key = key.toLowerCase();

        if (key === 'ctrl') {
          key = 'Control';
        } else if (key.length > 1) {
          key = key.charAt(0).toUpperCase() + key.substr(1);
        }

        return key;
      }
    }
  });
}

function insertMultiDragElements(clonesInserted, rootEl) {
  multiDragElements.forEach(function (multiDragElement, i) {
    var target = rootEl.children[multiDragElement.sortableIndex + (clonesInserted ? Number(i) : 0)];

    if (target) {
      rootEl.insertBefore(multiDragElement, target);
    } else {
      rootEl.appendChild(multiDragElement);
    }
  });
}
/**
 * Insert multi-drag clones
 * @param  {[Boolean]} elementsInserted  Whether the multi-drag elements are inserted
 * @param  {HTMLElement} rootEl
 */


function insertMultiDragClones(elementsInserted, rootEl) {
  multiDragClones.forEach(function (clone, i) {
    var target = rootEl.children[clone.sortableIndex + (elementsInserted ? Number(i) : 0)];

    if (target) {
      rootEl.insertBefore(clone, target);
    } else {
      rootEl.appendChild(clone);
    }
  });
}

function removeMultiDragElements() {
  multiDragElements.forEach(function (multiDragElement) {
    if (multiDragElement === dragEl$1) return;
    multiDragElement.parentNode && multiDragElement.parentNode.removeChild(multiDragElement);
  });
}

Sortable.mount(new AutoScrollPlugin());
Sortable.mount(Remove, Revert);

/* harmony default export */ __webpack_exports__["default"] = (Sortable);



/***/ }),

/***/ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js":
/*!****************************************************************!*\
  !*** ./node_modules/tiny-invariant/dist/tiny-invariant.esm.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var isProduction = "development" === 'production';
var prefix = 'Invariant failed';
function invariant(condition, message) {
    if (condition) {
        return;
    }
    if (isProduction) {
        throw new Error(prefix);
    }
    throw new Error(prefix + ": " + (message || ''));
}

/* harmony default export */ __webpack_exports__["default"] = (invariant);


/***/ }),

/***/ "./src/builder-layout/add-component.js":
/*!*********************************************!*\
  !*** ./src/builder-layout/add-component.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _common_responsive_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../common/responsive.js */ "./src/common/responsive.js");
/* harmony import */ var _common_icons_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../common/icons.js */ "./src/common/icons.js");








function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/* jshint esversion: 6 */




var __ = wp.i18n.__;
var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Popover = _wp$components.Popover,
    Tooltip = _wp$components.Tooltip,
    Button = _wp$components.Button;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var AddComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(AddComponent, _Component);

  var _super = _createSuper(AddComponent);

  function AddComponent() {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, AddComponent);

    _this = _super.apply(this, arguments);
    _this.addItem = _this.addItem.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.state = {
      isVisible: false
    };
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(AddComponent, [{
    key: "addItem",
    value: function addItem(item, row, column) {
      this.setState({
        isVisible: false
      });
      var updateItems = this.props.list;
      var theitem = [{
        id: item
      }];
      updateItems.push({
        id: item
      });
      this.props.setList(updateItems);
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var renderItems = function renderItems(item, row, column) {
        var available = true;

        _this2.props.controlParams.rows.map(function (zone) {
          Object.keys(_this2.props.settings[zone]).map(function (area) {
            if (_this2.props.settings[zone][area].includes(item)) {
              available = false;
            }
          });
        });

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(Fragment, null, available && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(Button, {
          isTertiary: true,
          className: 'builder-add-btn',
          onClick: function onClick() {
            _this2.addItem(item, row, column);
          }
        }, undefined !== _this2.props.choices[item] && undefined !== _this2.props.choices[item].name ? _this2.props.choices[item].name : ''));
      };

      var toggleClose = function toggleClose() {
        if (_this2.state.isVisible === true) {
          _this2.setState({
            isVisible: false
          });
        }
      };

      var classForAdd = 'responsive-builder-add-item';

      if ('header_desktop_items' === this.props.controlParams.group && 'right' === this.props.location) {
        classForAdd = classForAdd + ' center-on-left';
      }

      if ('header_desktop_items' === this.props.controlParams.group && 'left' === this.props.location) {
        classForAdd = classForAdd + ' center-on-right';
      }

      if ('header_desktop_items' === this.props.controlParams.group && 'left_center' === this.props.location) {
        classForAdd = classForAdd + ' right-center-on-right';
      }

      if ('header_desktop_items' === this.props.controlParams.group && 'right_center' === this.props.location) {
        classForAdd = classForAdd + ' left-center-on-left';
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: classForAdd,
        key: this.props.id
      }, this.state.isVisible && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(Popover, {
        position: "top",
        className: "responsive-popover-add-builder",
        onClose: toggleClose
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "responsive-popover-builder-list"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(ButtonGroup, {
        className: "responsive-radio-container-control"
      }, Object.keys(this.props.choices).map(function (item) {
        return renderItems(item, _this2.props.row, _this2.props.column);
      })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(Button, {
        className: "responsive-builder-item-add-icon",
        onClick: function onClick() {
          _this2.setState({
            isVisible: true
          });
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(Dashicon, {
        icon: "plus"
      })));
    }
  }]);

  return AddComponent;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (AddComponent);

/***/ }),

/***/ "./src/builder-layout/builder-component.js":
/*!*************************************************!*\
  !*** ./src/builder-layout/builder-component.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _common_responsive_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../common/responsive.js */ "./src/common/responsive.js");
/* harmony import */ var _common_icons_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../common/icons.js */ "./src/common/icons.js");
/* harmony import */ var _row_component__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./row-component */ "./src/builder-layout/row-component.js");









function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/* jshint esversion: 6 */





var __ = wp.i18n.__;
var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    Button = _wp$components.Button;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var BuilderComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default()(BuilderComponent, _Component);

  var _super = _createSuper(BuilderComponent);

  function BuilderComponent() {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, BuilderComponent);

    _this = _super.apply(this, arguments);
    _this.updateValues = _this.updateValues.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onDragEnd = _this.onDragEnd.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onAddItem = _this.onAddItem.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onDragStart = _this.onDragStart.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onDragStop = _this.onDragStop.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.removeItem = _this.removeItem.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.focusPanel = _this.focusPanel.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.focusItem = _this.focusItem.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onFooterUpdate = _this.onFooterUpdate.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));

    _this.linkColumns();

    var value = _this.props.control.setting.get();

    var baseDefault = {};
    _this.defaultValue = _this.props.control.params.default ? _objectSpread(_objectSpread({}, baseDefault), _this.props.control.params.default) : baseDefault;
    value = value ? _objectSpread(_objectSpread({}, _this.defaultValue), value) : _this.defaultValue;
    var defaultParams = {};
    _this.controlParams = _this.props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), _this.props.control.params.input_attrs) : defaultParams;
    var responsiveCustomizerControlsData = _this.props.control.params.choices;
    _this.choices = responsiveCustomizerControlsData && responsiveCustomizerControlsData[_this.controlParams.group] ? responsiveCustomizerControlsData.choices[_this.controlParams.group] : [];
    _this.state = {
      value: value
    };
    console.log('props', _this.props, _this.choices);
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(BuilderComponent, [{
    key: "onDragStart",
    value: function onDragStart() {
      var dropzones = document.querySelectorAll('.responsive-builder-area');
      var i;

      for (i = 0; i < dropzones.length; ++i) {
        dropzones[i].classList.add('responsive-dragging-dropzones');
      }
    }
  }, {
    key: "onDragStop",
    value: function onDragStop() {
      var dropzones = document.querySelectorAll('.responsive-builder-area');
      var i;

      for (i = 0; i < dropzones.length; ++i) {
        dropzones[i].classList.remove('responsive-dragging-dropzones');
      }
    }
  }, {
    key: "removeItem",
    value: function removeItem(item, row, zone) {
      var updateState = this.state.value;
      var update = updateState[row];
      var updateItems = [];
      {
        update[zone].length > 0 && update[zone].map(function (old) {
          if (item !== old) {
            updateItems.push(old);
          }
        });
      }
      ;

      if ('header_desktop_items' === this.controlParams.group && row + '_center' === zone && updateItems.length === 0) {
        if (update[row + '_left_center'].length > 0) {
          update[row + '_left_center'].map(function (move) {
            updateState[row][row + '_left'].push(move);
          });
          updateState[row][row + '_left_center'] = [];
        }

        if (update[row + '_right_center'].length > 0) {
          update[row + '_right_center'].map(function (move) {
            updateState[row][row + '_right'].push(move);
          });
          updateState[row][row + '_right_center'] = [];
        }
      }

      update[zone] = updateItems;
      updateState[row][zone] = updateItems;
      this.setState({
        value: updateState
      });
      this.updateValues(updateState);
      var event = new CustomEvent('responsiveRemovedBuilderItem', {
        'detail': this.controlParams.group
      });
      document.dispatchEvent(event);
    }
  }, {
    key: "onDragEnd",
    value: function onDragEnd(row, zone, items) {
      var updateState = this.state.value;
      var update = updateState[row];
      var updateItems = [];
      {
        items.length > 0 && items.map(function (item) {
          updateItems.push(item.id);
        });
      }
      ;

      if (!this.arraysEqual(update[zone], updateItems)) {
        if ('header_desktop_items' === this.controlParams.group && row + '_center' === zone && updateItems.length === 0) {
          if (undefined !== update[row + '_left_center'] && update[row + '_left_center'].length > 0) {
            update[row + '_left_center'].map(function (move) {
              updateState[row][row + '_left'].push(move);
            });
            updateState[row][row + '_left_center'] = [];
          }

          if (undefined !== update[row + '_right_center'] && update[row + '_right_center'].length > 0) {
            update[row + '_right_center'].map(function (move) {
              updateState[row][row + '_right'].push(move);
            });
            updateState[row][row + '_right_center'] = [];
          }
        }

        update[zone] = updateItems;
        updateState[row][zone] = updateItems;
        this.setState({
          value: updateState
        });
        this.updateValues(updateState);
      }
    }
  }, {
    key: "onAddItem",
    value: function onAddItem(row, zone, items) {
      this.onDragEnd(row, zone, items);
      var event = new CustomEvent('responsiveRemovedBuilderItem', {
        'detail': this.controlParams.group
      });
      document.dispatchEvent(event);
    }
  }, {
    key: "onFooterUpdate",
    value: function onFooterUpdate(row) {
      var updateState = this.state.value;
      var update = updateState[row];
      var removeEvent = false;
      var columns = parseInt(this.props.customizer.control('footer_' + row + '_columns').setting.get(), 10);

      if (columns < 5) {
        if (undefined !== update[row + '_5'] && update[row + '_5'].length > 0) {
          updateState[row][row + '_5'] = [];
          removeEvent = true;
        }
      }

      if (columns < 4) {
        if (undefined !== update[row + '_4'] && update[row + '_4'].length > 0) {
          updateState[row][row + '_4'] = [];
          removeEvent = true;
        }
      }

      if (columns < 3) {
        if (undefined !== update[row + '_3'] && update[row + '_3'].length > 0) {
          updateState[row][row + '_3'] = [];
          removeEvent = true;
        }
      }

      if (columns < 2) {
        if (undefined !== update[row + '_2'] && update[row + '_2'].length > 0) {
          updateState[row][row + '_2'] = [];
          removeEvent = true;
        }
      }

      this.setState({
        value: updateState
      });
      this.updateValues(updateState);

      if (removeEvent) {
        var event = new CustomEvent('responsiveRemovedBuilderItem', {
          'detail': this.controlParams.group
        });
        document.dispatchEvent(event);
      }
    }
  }, {
    key: "arraysEqual",
    value: function arraysEqual(a, b) {
      if (a === b) return true;
      if (a == null || b == null) return false;
      if (a.length != b.length) return false;

      for (var i = 0; i < a.length; ++i) {
        if (a[i] !== b[i]) return false;
      }

      return true;
    }
  }, {
    key: "focusPanel",
    value: function focusPanel(item) {
      if (undefined !== this.props.customizer.section('responsive_customizer_' + item)) {
        this.props.customizer.section('responsive_customizer_' + item).focus();
      }
    }
  }, {
    key: "focusItem",
    value: function focusItem(item) {
      if (undefined !== this.props.customizer.section(item)) {
        this.props.customizer.section(item).focus();
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "responsive-control-field responsive-builder-items".concat(this.controlParams.rows.includes('popup') ? ' responsive-builder-items-with-popup' : '')
      }, this.controlParams.rows.includes('popup') && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_row_component__WEBPACK_IMPORTED_MODULE_12__["default"], {
        showDrop: function showDrop() {
          return _this2.onDragStart();
        },
        focusPanel: function focusPanel(item) {
          return _this2.focusPanel(item);
        },
        focusItem: function focusItem(item) {
          return _this2.focusItem(item);
        },
        removeItem: function removeItem(remove, row, zone) {
          return _this2.removeItem(remove, row, zone);
        },
        onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
          return _this2.onAddItem(updateRow, updateZone, updateItems);
        },
        hideDrop: function hideDrop() {
          return _this2.onDragStop();
        },
        onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
          return _this2.onDragEnd(updateRow, updateZone, updateItems);
        },
        key: 'popup',
        row: 'popup',
        controlParams: this.controlParams,
        choices: this.choices,
        items: this.state.value['popup'],
        settings: this.state.value
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "responsive-builder-row-items"
      }, this.controlParams.rows.map(function (row) {
        if ('popup' === row) {
          return;
        }

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_row_component__WEBPACK_IMPORTED_MODULE_12__["default"], {
          showDrop: function showDrop() {
            return _this2.onDragStart();
          },
          focusPanel: function focusPanel(item) {
            return _this2.focusPanel(item);
          },
          focusItem: function focusItem(item) {
            return _this2.focusItem(item);
          },
          removeItem: function removeItem(remove, row, zone) {
            return _this2.removeItem(remove, row, zone);
          },
          hideDrop: function hideDrop() {
            return _this2.onDragStop();
          },
          onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
            return _this2.onDragEnd(updateRow, updateZone, updateItems);
          },
          onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
            return _this2.onAddItem(updateRow, updateZone, updateItems);
          },
          key: row,
          row: row,
          controlParams: _this2.controlParams,
          choices: _this2.choices,
          customizer: _this2.props.customizer,
          items: _this2.state.value[row],
          settings: _this2.state.value
        });
      })));
    } // linkFocusButtons() {
    // 	this.props.control.container.on( 'click', '.responsive-builder-areas .responsive-builder-item', function( e ) {
    // 		e.preventDefault();
    // 		var targetKey = e.target.getAttribute( 'data-section' );
    // 		var targetControl = wp.customize.section( targetKey );
    // 		if ( targetControl ) targetControl.focus();
    // 	} );
    // }

  }, {
    key: "updateValues",
    value: function updateValues(value) {
      this.props.control.setting.set(_objectSpread(_objectSpread(_objectSpread({}, this.props.control.setting.get()), value), {}, {
        flag: !this.props.control.setting.get().flag
      }));
    }
  }, {
    key: "linkColumns",
    value: function linkColumns() {
      var self = this;
      document.addEventListener('responsiveUpdateFooterColumns', function (e) {
        if ('footer_items' === self.controlParams.group) {
          self.onFooterUpdate(e.detail);
        }
      });
    }
  }]);

  return BuilderComponent;
}(Component);

BuilderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (BuilderComponent);

/***/ }),

/***/ "./src/builder-layout/builder-header-control.js":
/*!******************************************************!*\
  !*** ./src/builder-layout/builder-header-control.js ***!
  \******************************************************/
/*! exports provided: BuilderHeaderControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BuilderHeaderControl", function() { return BuilderHeaderControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_2__);



var __ = wp.i18n.__;

var toggleBuilderSection = function toggleBuilderSection(props) {
  props.customizer.section.each(function (section) {
    if (section.expanded()) {
      section.collapse();
      return false; // Breaks.
    }
  });
};

var BuilderHeader = function BuilderHeader(props) {
  if ("section-footer-builder" === props.control.params.section || "section-header-builder" === props.control.params.section) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(react__WEBPACK_IMPORTED_MODULE_1___default.a.Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
      className: "ast-customize-control-title"
    }, !astra.customizer.is_pro && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, __('Want more? Upgrade to ', 'astra'), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: astra.customizer.upgrade_link,
      target: "_blank"
    }, __('Astra Pro', 'astra')), __(' for many more header and footer options along with several amazing features too!', 'astra'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
      className: "ast-customize-control-description"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: 'button button-secondary ahfb-builder-section-shortcut ' + props.control.params.section,
      "data-section": props.control.params.section,
      onClick: function onClick() {
        return toggleBuilderSection(props);
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "dashicons dashicons-admin-generic"
    }, " ")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "button button-secondary ahfb-builder-hide-button ahfb-builder-tab-toggle"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "ast-builder-hide-action"
    }, " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "dashicons dashicons-arrow-down-alt2"
    }), " ", __('Hide', 'astra'), " "), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "ast-builder-show-action"
    }, " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "dashicons dashicons-arrow-up-alt2"
    }), " ", __('Show', 'astra'), " "))));
  } else {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(react__WEBPACK_IMPORTED_MODULE_1___default.a.Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ahfb-compontent-tabs nav-tab-wrapper wp-clearfix"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: "#",
      className: "nav-tab ahfb-general-tab ahfb-compontent-tabs-button " + ('general' === props.tab ? "nav-tab-active" : ""),
      "data-tab": "general"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null, __('General', 'astra'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: "#",
      className: "nav-tab ahfb-design-tab ahfb-compontent-tabs-button " + ('design' === props.tab ? "nav-tab-active" : ""),
      "data-tab": "design"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null, __('Design', 'astra')))));
  }
};

react__WEBPACK_IMPORTED_MODULE_1___default.a.memo(BuilderHeader);
var BuilderHeaderControl = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    react_dom__WEBPACK_IMPORTED_MODULE_2___default.a.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(BuilderHeader, {
      control: control,
      tab: wp.customize.state('astra-customizer-tab').get(),
      customizer: wp.customize
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/builder-layout/control.js":
/*!***************************************!*\
  !*** ./src/builder-layout/control.js ***!
  \***************************************/
/*! exports provided: BuilderControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BuilderControl", function() { return BuilderControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _builder_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./builder-component.js */ "./src/builder-layout/builder-component.js");


var BuilderControl = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_builder_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control,
      customizer: wp.customize
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/builder-layout/drop-component.js":
/*!**********************************************!*\
  !*** ./src/builder-layout/drop-component.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _common_responsive_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../common/responsive.js */ "./src/common/responsive.js");
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.js");
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(react_sortablejs__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _common_icons_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../common/icons.js */ "./src/common/icons.js");
/* harmony import */ var _item_component__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./item-component */ "./src/builder-layout/item-component.js");
/* harmony import */ var _add_component__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./add-component */ "./src/builder-layout/add-component.js");







function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/* jshint esversion: 6 */







var __ = wp.i18n.__;
var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    Button = _wp$components.Button;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var DropComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(DropComponent, _Component);

  var _super = _createSuper(DropComponent);

  function DropComponent() {
    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, DropComponent);

    return _super.apply(this, arguments);
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(DropComponent, [{
    key: "render",
    value: function render() {
      var _this = this;

      var location = this.props.zone.replace(this.props.row + '_', '');
      var currentList = typeof this.props.items != "undefined" && this.props.items != null && this.props.items.length != null && this.props.items.length > 0 ? this.props.items : [];
      var theItems = [];
      {
        currentList.length > 0 && currentList.map(function (item) {
          theItems.push({
            id: item
          });
        });
      }
      ;
      var currentCenterList = typeof this.props.centerItems != "undefined" && this.props.centerItems != null && this.props.centerItems.length != null && this.props.centerItems.length > 0 ? this.props.centerItems : [];
      var theCenterItems = [];
      {
        currentCenterList.length > 0 && currentCenterList.map(function (item) {
          theCenterItems.push({
            id: item
          });
        });
      }
      ;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "responsive-builder-area responsive-builder-area-".concat(location),
        "data-location": this.props.zone
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("p", {
        className: "responsive-small-label"
      }, this.props.controlParams.zones[this.props.row][this.props.zone]), 'header_desktop_items' === this.props.controlParams.group && 'right' === location && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(react_sortablejs__WEBPACK_IMPORTED_MODULE_9__["ReactSortable"], {
        animation: 100,
        onStart: function onStart() {
          return _this.props.showDrop();
        },
        onEnd: function onEnd() {
          return _this.props.hideDrop();
        },
        group: this.props.controlParams.group,
        className: "responsive-builder-drop responsive-builder-sortable-panel responsive-builder-drop-".concat(location, "_center"),
        list: theCenterItems,
        setList: function setList(newState) {
          return _this.props.onUpdate(_this.props.row, _this.props.zone + '_center', newState);
        }
      }, currentCenterList.length > 0 && currentCenterList.map(function (item, index) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_item_component__WEBPACK_IMPORTED_MODULE_11__["default"], {
          removeItem: function removeItem(remove) {
            return _this.props.removeItem(remove, _this.props.row, _this.props.zone + '_center');
          },
          focusItem: function focusItem(focus) {
            return _this.props.focusItem(focus);
          },
          key: item,
          index: index,
          item: item,
          controlParams: _this.props.controlParams,
          choices: _this.props.choices
        });
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_add_component__WEBPACK_IMPORTED_MODULE_12__["default"], {
        row: this.props.row,
        list: theCenterItems,
        settings: this.props.settings,
        column: this.props.zone + '_center',
        setList: function setList(newState) {
          return _this.props.onAddItem(_this.props.row, _this.props.zone + '_center', newState);
        },
        key: location,
        location: location + '_center',
        id: 'add-center-' + location,
        controlParams: this.props.controlParams,
        choices: this.props.choices
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(react_sortablejs__WEBPACK_IMPORTED_MODULE_9__["ReactSortable"], {
        animation: 100,
        onStart: function onStart() {
          return _this.props.showDrop();
        },
        onEnd: function onEnd() {
          return _this.props.hideDrop();
        },
        group: this.props.controlParams.group,
        className: "responsive-builder-drop responsive-builder-sortable-panel responsive-builder-drop-".concat(location),
        list: theItems,
        setList: function setList(newState) {
          return _this.props.onUpdate(_this.props.row, _this.props.zone, newState);
        }
      }, currentList.length > 0 && currentList.map(function (item, index) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_item_component__WEBPACK_IMPORTED_MODULE_11__["default"], {
          removeItem: function removeItem(remove) {
            return _this.props.removeItem(remove, _this.props.row, _this.props.zone);
          },
          focusItem: function focusItem(focus) {
            return _this.props.focusItem(focus);
          },
          key: item,
          index: index,
          item: item,
          controlParams: _this.props.controlParams,
          choices: _this.props.choices
        });
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_add_component__WEBPACK_IMPORTED_MODULE_12__["default"], {
        row: this.props.row,
        list: theItems,
        settings: this.props.settings,
        column: this.props.zone,
        setList: function setList(newState) {
          return _this.props.onAddItem(_this.props.row, _this.props.zone, newState);
        },
        key: location,
        location: location,
        id: 'add-' + location,
        controlParams: this.props.controlParams,
        choices: this.props.choices
      }), 'header_desktop_items' === this.props.controlParams.group && 'left' === location && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(react_sortablejs__WEBPACK_IMPORTED_MODULE_9__["ReactSortable"], {
        animation: 100,
        onStart: function onStart() {
          return _this.props.showDrop();
        },
        onEnd: function onEnd() {
          return _this.props.hideDrop();
        },
        group: this.props.controlParams.group,
        className: "responsive-builder-drop responsive-builder-sortable-panel responsive-builder-drop-".concat(location, "_center"),
        list: theCenterItems,
        setList: function setList(newState) {
          return _this.props.onUpdate(_this.props.row, _this.props.zone + '_center', newState);
        }
      }, currentCenterList.length > 0 && currentCenterList.map(function (item, index) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_item_component__WEBPACK_IMPORTED_MODULE_11__["default"], {
          removeItem: function removeItem(remove) {
            return _this.props.removeItem(remove, _this.props.row, _this.props.zone + '_center');
          },
          focusItem: function focusItem(focus) {
            return _this.props.focusItem(focus);
          },
          key: item,
          index: index,
          item: item,
          controlParams: _this.props.controlParams,
          choices: _this.props.choices
        });
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_add_component__WEBPACK_IMPORTED_MODULE_12__["default"], {
        row: this.props.row,
        list: theCenterItems,
        settings: this.props.settings,
        column: this.props.zone + '_center',
        setList: function setList(newState) {
          return _this.props.onAddItem(_this.props.row, _this.props.zone + '_center', newState);
        },
        key: location,
        location: location + '_center',
        id: 'add-center-' + location,
        controlParams: this.props.controlParams,
        choices: this.props.choices
      })));
    }
  }]);

  return DropComponent;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (DropComponent);

/***/ }),

/***/ "./src/builder-layout/item-component.js":
/*!**********************************************!*\
  !*** ./src/builder-layout/item-component.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _common_responsive_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../common/responsive.js */ "./src/common/responsive.js");
/* harmony import */ var _common_icons_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../common/icons.js */ "./src/common/icons.js");







function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/* jshint esversion: 6 */




var __ = wp.i18n.__;
var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    Button = _wp$components.Button;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var ItemComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(ItemComponent, _Component);

  var _super = _createSuper(ItemComponent);

  function ItemComponent() {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, ItemComponent);

    _this = _super.apply(this, arguments);
    _this.choices = _this.props.choices;
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(ItemComponent, [{
    key: "render",
    value: function render() {
      var _this2 = this;

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "responsive-builder-item",
        "data-id": this.props.item,
        "data-section": undefined !== this.choices[this.props.item] && undefined !== this.choices[this.props.item].section ? this.choices[this.props.item].section : '',
        key: this.props.item
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("span", {
        className: "responsive-builder-item-icon responsive-move-icon"
      }, _common_icons_js__WEBPACK_IMPORTED_MODULE_9__["default"]['drag']), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("span", {
        className: "responsive-builder-item-text"
      }, undefined !== this.choices[this.props.item] && undefined !== this.choices[this.props.item].name ? this.choices[this.props.item].name : ''), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Button, {
        className: "responsive-builder-item-focus-icon responsive-builder-item-icon",
        "aria-label": __('Setting settings for', 'responsive') + ' ' + (undefined !== this.choices[this.props.item] && undefined !== this.choices[this.props.item].name ? this.choices[this.props.item].name : ''),
        onClick: function onClick() {
          _this2.props.focusItem(undefined !== _this2.choices[_this2.props.item] && undefined !== _this2.choices[_this2.props.item].section ? _this2.choices[_this2.props.item].section : '');
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Dashicon, {
        icon: "admin-generic"
      })), this.props.item.includes('widget') && 'toggle-widget' !== this.props.item && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Button, {
        className: "responsive-builder-item-focus-icon responsive-builder-item-icon",
        "aria-label": __('Setting settings for', 'responsive') + ' ' + (undefined !== this.choices[this.props.item] && undefined !== this.choices[this.props.item].name ? this.choices[this.props.item].name : ''),
        onClick: function onClick() {
          _this2.props.focusItem(undefined !== _this2.choices[_this2.props.item] && undefined !== _this2.choices[_this2.props.item].section ? 'responsive_customizer_' + _this2.choices[_this2.props.item].section : '');
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Dashicon, {
        icon: "admin-settings"
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Button, {
        className: "responsive-builder-item-icon",
        "aria-label": __('Remove', 'responsive') + ' ' + (undefined !== this.choices[this.props.item] && undefined !== this.choices[this.props.item].name ? this.choices[this.props.item].name : ''),
        onClick: function onClick() {
          _this2.props.removeItem(_this2.props.item);
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Dashicon, {
        icon: "no-alt"
      })));
    }
  }]);

  return ItemComponent;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (ItemComponent);

/***/ }),

/***/ "./src/builder-layout/row-component.js":
/*!*********************************************!*\
  !*** ./src/builder-layout/row-component.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _common_responsive_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../common/responsive.js */ "./src/common/responsive.js");
/* harmony import */ var _common_icons_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../common/icons.js */ "./src/common/icons.js");
/* harmony import */ var _drop_component__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./drop-component */ "./src/builder-layout/drop-component.js");







function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/* jshint esversion: 6 */





var __ = wp.i18n.__;
var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    Button = _wp$components.Button;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var RowComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(RowComponent, _Component);

  var _super = _createSuper(RowComponent);

  function RowComponent() {
    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, RowComponent);

    return _super.apply(this, arguments);
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(RowComponent, [{
    key: "render",
    value: function render() {
      var _this = this;

      var centerClass = 'no-center-items';

      if ('header_desktop_items' === this.props.controlParams.group && typeof this.props.items[this.props.row + '_center'] != "undefined" && this.props.items[this.props.row + '_center'] != null && this.props.items[this.props.row + '_center'].length != null && this.props.items[this.props.row + '_center'].length > 0) {
        centerClass = 'has-center-items';
      }

      if ('popup' === this.props.row) {
        centerClass = 'popup-vertical-group';
      }

      if ('footer_items' === this.props.controlParams.group) {
        var columns = this.props.customizer.control('footer_' + this.props.row + '_columns').setting.get();
        var layout = this.props.customizer.control('footer_' + this.props.row + '_layout').setting.get();
        var direction = this.props.customizer.control('footer_' + this.props.row + '_direction').setting.get();
        centerClass = 'footer-column-row footer-row-columns-' + columns + ' footer-row-layout-' + layout.desktop + ' footer-row-direction-' + direction.desktop;
      }

      var mode = this.props.controlParams.group.indexOf('header') !== -1 ? 'header' : 'footer';
      var besideItems = [];
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "responsive-builder-areas ".concat(centerClass)
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Button, {
        className: "responsive-row-left-actions",
        "aria-label": __('Edit Settings for', 'responsive') + ' ' + (this.props.row === 'popup' ? __('Off Canvas', 'responsive') : this.props.row + ' ' + __('Row', 'responsive')),
        onClick: function onClick() {
          return _this.props.focusPanel(mode + '_' + _this.props.row);
        },
        icon: "admin-generic"
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Button, {
        className: "responsive-row-actions",
        "aria-label": __('Edit Settings for', 'responsive') + ' ' + (this.props.row === 'popup' ? __('Off Canvas', 'responsive') : this.props.row + ' ' + __('Row', 'responsive')),
        onClick: function onClick() {
          return _this.props.focusPanel(mode + '_' + _this.props.row);
        }
      }, this.props.row === 'popup' ? __('Off Canvas', 'responsive') : this.props.row + ' ' + __('Row', 'responsive'), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Dashicon, {
        icon: "admin-generic"
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "responsive-builder-group responsive-builder-group-horizontal",
        "data-setting": this.props.row
      }, Object.keys(this.props.controlParams.zones[this.props.row]).map(function (zone, index) {
        if (_this.props.row + '_left_center' === zone || _this.props.row + '_right_center' === zone) {
          return;
        }

        if ('footer_items' === _this.props.controlParams.group) {
          if (columns < index + 1) {
            return;
          }
        }

        if ('header_desktop_items' === _this.props.controlParams.group && _this.props.row + '_left' === zone) {
          besideItems = _this.props.items[_this.props.row + '_left_center'];
        }

        if ('header_desktop_items' === _this.props.controlParams.group && _this.props.row + '_right' === zone) {
          besideItems = _this.props.items[_this.props.row + '_right_center'];
        }

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_drop_component__WEBPACK_IMPORTED_MODULE_10__["default"], {
          removeItem: function removeItem(remove, removeRow, removeZone) {
            return _this.props.removeItem(remove, removeRow, removeZone);
          },
          focusItem: function focusItem(focus) {
            return _this.props.focusItem(focus);
          },
          hideDrop: function hideDrop() {
            return _this.props.hideDrop();
          },
          showDrop: function showDrop() {
            return _this.props.showDrop();
          },
          onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
            return _this.props.onUpdate(updateRow, updateZone, updateItems);
          },
          zone: zone,
          row: _this.props.row,
          choices: _this.props.choices,
          key: zone,
          items: _this.props.items[zone],
          centerItems: besideItems,
          controlParams: _this.props.controlParams,
          onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
            return _this.props.onAddItem(updateRow, updateZone, updateItems);
          },
          settings: _this.props.settings
        });
      })));
    }
  }]);

  return RowComponent;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (RowComponent);

/***/ }),

/***/ "./src/checkbox/checkbox-component.js":
/*!********************************************!*\
  !*** ./src/checkbox/checkbox-component.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);





var CheckboxComponent = function CheckboxComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.control.setting.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var updateValues = function updateValues() {
    setPropsValue(!props_value);
    props.control.setting.set(!props_value);
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      id = _props$control$params.id;
  var htmlLabel = null;

  if (label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: id
    }, label);
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "customize-inside-control-row checkbox-with-react"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("input", {
    id: id,
    type: "checkbox",
    "data-value": props_value,
    value: props_value,
    onChange: function onChange() {
      return updateValues();
    },
    checked: props_value
  }), htmlLabel));
};

CheckboxComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(CheckboxComponent));

/***/ }),

/***/ "./src/checkbox/control.js":
/*!*********************************!*\
  !*** ./src/checkbox/control.js ***!
  \*********************************/
/*! exports provided: responsiveCheckbox */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveCheckbox", function() { return responsiveCheckbox; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _checkbox_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./checkbox-component.js */ "./src/checkbox/checkbox-component.js");


var responsiveCheckbox = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_checkbox_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/color/color-component.js":
/*!**************************************!*\
  !*** ./src/color/color-component.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _responsive_color_picker_control__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./responsive-color-picker-control */ "./src/color/responsive-color-picker-control.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }





var ColorComponent = function ColorComponent(props) {
  var value = props.control.params.value;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])({
    value: value
  }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var updateValues = function updateValues(value) {
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: value
      });
    });
    props.control.setting.set(value);
  };

  var handleChangeComplete = function handleChangeComplete(color) {
    var value;

    if (typeof color === 'string' || color instanceof String) {
      value = color;
    } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
      value = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
    } else {
      value = color.hex;
    }

    updateValues(value);
  };

  var labelHtml = null;
  var htmlDescription = null;
  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      description = _props$control$params.description;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  if (description) {
    htmlDescription = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", null, labelHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_responsive_color_picker_control__WEBPACK_IMPORTED_MODULE_4__["default"], {
    color: undefined !== state.value && state.value ? state.value : '',
    onChangeComplete: function onChangeComplete(color) {
      return handleChangeComplete(color);
    },
    backgroundType: 'color',
    inputattr: props.control.params
  }))), htmlDescription);
};

ColorComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ColorComponent));

/***/ }),

/***/ "./src/color/control.js":
/*!******************************!*\
  !*** ./src/color/control.js ***!
  \******************************/
/*! exports provided: responsiveColor */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveColor", function() { return responsiveColor; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _color_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./color-component */ "./src/color/color-component.js");


var responsiveColor = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_color_component__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control,
      customizer: wp.customize
    }), control.container[0]);
  },
  ready: function ready() {
    'use strict';

    var control = this;
    jQuery(document).mouseup(function (e) {
      var container = jQuery(control.container);
      var colorWrap = container.find('.wp-picker-container');
      jQuery('.wp-picker-holder').on('click', function (event) {
        event.preventDefault();
      }); // If the target of the click isn't the container nor a descendant of the container.

      if (!colorWrap.is(e.target) && colorWrap.has(e.target).length === 0) {
        container.find('button.wp-color-result.wp-picker-open').click();
      }
    });
  }
});

/***/ }),

/***/ "./src/color/responsive-color-picker-control.js":
/*!******************************************************!*\
  !*** ./src/color/responsive-color-picker-control.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__);









function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }






var ResponsiveColorPickerControl = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default()(ResponsiveColorPickerControl, _Component);

  var _super = _createSuper(ResponsiveColorPickerControl);

  function ResponsiveColorPickerControl(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, ResponsiveColorPickerControl);

    _this = _super.apply(this, arguments);
    _this.onChangeComplete = _this.onChangeComplete.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onPaletteChangeComplete = _this.onPaletteChangeComplete.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.open = _this.open.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onColorClearClick = _this.onColorClearClick.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.state = {
      isVisible: false,
      refresh: false,
      color: _this.props.color,
      modalCanClose: true,
      backgroundType: _this.props.backgroundType,
      inputattr: _this.props.inputattr
    };
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(ResponsiveColorPickerControl, [{
    key: "onResetRefresh",
    value: function onResetRefresh() {
      if (this.state.refresh === true) {
        this.setState({
          refresh: false
        });
      } else {
        this.setState({
          refresh: true
        });
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$state = this.state,
          refresh = _this$state.refresh,
          modalCanClose = _this$state.modalCanClose,
          isVisible = _this$state.isVisible;

      var toggleVisible = function toggleVisible() {
        if (refresh === true) {
          _this2.setState({
            refresh: false
          });
        } else {
          _this2.setState({
            refresh: true
          });
        }

        _this2.setState({
          isVisible: true
        });
      };

      var toggleClose = function toggleClose() {
        if (modalCanClose) {
          if (isVisible === true) {
            _this2.setState({
              isVisible: false
            });
          }
        }
      };

      var finalpaletteColors = [];
      var count = 0;
      var defaultpalette = this.state.inputattr.colorPalettes;

      var defaultColorPalette = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(defaultpalette);

      defaultColorPalette.forEach(function (singleColor) {
        var paletteColors = {};
        Object.assign(paletteColors, {
          name: count + '_' + singleColor
        });
        Object.assign(paletteColors, {
          color: singleColor
        });
        finalpaletteColors.push(paletteColors);
        count++;
      });
      var defaultValue = this.state.inputattr.default;
      var htmlLink = null;
      var inputattr = this.state.inputattr;
      htmlLink = inputattr.link;

      if (undefined !== htmlLink) {
        var splited_values = htmlLink.split("=");

        if (undefined !== splited_values[1]) {
          htmlLink = splited_values[1].replace(/"/g, "");
        }
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "wp-picker-container"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["Button"], {
        className: isVisible ? 'button wp-color-result wp-picker-open' : 'button wp-color-result ',
        onClick: function onClick() {
          isVisible ? toggleClose() : toggleVisible();
        },
        "aria-expanded": "false",
        style: {
          backgroundColor: this.props.color
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", {
        className: "wp-color-result-text"
      }, "Select Color")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "wp-picker-holder"
      }, isVisible && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorPicker"], {
        color: this.props.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color);
        }
      })), !refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorPicker"], {
        color: this.props.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color);
        }
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorPalette"], {
        colors: finalpaletteColors,
        value: this.props.color,
        clearable: false,
        disableCustomColors: true,
        className: "responsive-alpha-color-picker",
        onChange: function onChange(color) {
          return _this2.onPaletteChangeComplete(color);
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("button", {
        type: "button",
        onClick: function onClick() {
          _this2.onColorClearClick(defaultValue);
        },
        className: "responsive-clear-btn-inside-picker components-button components-circular-option-picker__clear is-secondary is-small"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('Default', 'responsive'))))));
    }
  }, {
    key: "onColorClearClick",
    value: function onColorClearClick(color) {
      if (this.state.refresh === true) {
        this.setState({
          refresh: false
        });
      } else {
        this.setState({
          refresh: true
        });
      }

      this.props.onChangeComplete(color, 'color');
      wp.customize.previewer.refresh();
    }
  }, {
    key: "onChangeComplete",
    value: function onChangeComplete(color) {
      var newColor;

      if (color.rgb && color.rgb.a && 1 !== color.rgb.a) {
        newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
      } else {
        newColor = color.hex;
      }

      this.setState({
        backgroundType: 'color'
      });
      this.props.onChangeComplete(color, 'color');
    }
  }, {
    key: "onPaletteChangeComplete",
    value: function onPaletteChangeComplete(color) {
      this.setState({
        color: color
      });

      if (this.state.refresh === true) {
        this.setState({
          refresh: false
        });
      } else {
        this.setState({
          refresh: true
        });
      }

      this.props.onChangeComplete(color, 'color');
    }
  }, {
    key: "open",
    value: function open(_open) {
      this.setState({
        modalCanClose: false
      });

      _open();
    }
  }]);

  return ResponsiveColorPickerControl;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Component"]);

ResponsiveColorPickerControl.propTypes = {
  color: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.string,
  usePalette: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.bool,
  palette: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.string,
  presetColors: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object,
  onChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.func,
  onPaletteChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.func,
  onChange: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.func,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveColorPickerControl);

/***/ }),

/***/ "./src/common/icons.js":
/*!*****************************!*\
  !*** ./src/common/icons.js ***!
  \*****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var Icons = {
  smartphone: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    d: "M0 0H20V20H0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6 2h8c.55 0 1 .45 1 1v14c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1zm7 12V4H7v10h6zM8 5h4l-4 5V5z"
  })),
  desktop: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    d: "M0 0H20V20H0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3 2h14c.55 0 1 .45 1 1v10c0 .55-.45 1-1 1h-5v2h2c.55 0 1 .45 1 1v1H5v-1c0-.55.45-1 1-1h2v-2H3c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1zm13 9V4H4v7h12zM5 5h9L5 9V5z"
  })),
  tablet: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    d: "M0 0H20V20H0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4 2h12c.55 0 1 .45 1 1v14c0 .55-.45 1-1 1H4c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1zm11 14V4H5v12h10zM6 5h6l-6 5V5z"
  })),
  globe: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    d: "M0 0H20V20H0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fillRule: "nonzero",
    d: "M10 1a9 9 0 10.001 18.001A9 9 0 0010 1zm3.46 11.95c0 1.47-.8 3.3-4.06 4.7.3-4.17-2.52-3.69-3.2-5A3.25 3.25 0 018 10.1c-1.552-.266-3-.96-4.18-2 .05.47.28.904.64 1.21a4.18 4.18 0 01-1.94-1.5 7.94 7.94 0 017.25-5.63c-.84 1.38-1.5 4.13 0 5.57C8.23 8 7.26 6 6.41 6.79c-1.13 1.06.33 2.51 3.42 3.08 3.29.59 3.66 1.58 3.63 3.08zm1.34-4c-.32-1.11.62-2.23 1.69-3.14a7.27 7.27 0 01.84 6.68c-.77-1.89-2.17-2.32-2.53-3.57v.03z"
  })),
  generic: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    d: "M0 0H20V20H0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18 12h-2.18c-.17.7-.44 1.35-.81 1.93l1.54 1.54-2.1 2.1-1.54-1.54c-.58.36-1.23.63-1.91.79V19H8v-2.18c-.68-.16-1.33-.43-1.91-.79l-1.54 1.54-2.12-2.12 1.54-1.54c-.36-.58-.63-1.23-.79-1.91H1V9.03h2.17c.16-.7.44-1.35.8-1.94L2.43 5.55l2.1-2.1 1.54 1.54c.58-.37 1.24-.64 1.93-.81V2h3v2.18c.68.16 1.33.43 1.91.79l1.54-1.54 2.12 2.12-1.54 1.54c.36.59.64 1.24.8 1.94H18V12zm-8.5 1.5c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3z"
  })),
  logo: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M24.23 9.074a.793.793 0 10-.001-1.585.793.793 0 00.001 1.585M26.336 7.551a.915.915 0 100-1.83.915.915 0 000 1.83M27.524 22.051h-5.055a.701.701 0 01-.577-1.1l2.586-3.743a.701.701 0 011.162.012l2.47 3.743a.702.702 0 01-.586 1.088m3.077-.962l-3.594-5.936v-3.315h.088a.941.941 0 000-1.884h-4.189a.942.942 0 000 1.884h.087v3.315l-3.594 5.936a1.901 1.901 0 001.703 2.749h7.796a1.902 1.902 0 001.703-2.749"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M35.058.79l.109.004.109.007.108.01.107.012.106.015.105.017.105.02.103.023.103.025.102.027.1.03.1.033.098.034.098.037.096.04.095.041.094.044.092.046.092.048.089.051.089.052.087.055.086.056.084.059.083.06.082.062.079.065.079.066.076.068.075.069.073.072.072.073.069.075.068.076.066.079.065.079.062.082.06.083.059.084.056.086.055.087.052.089.051.089.048.092.046.092.044.094.041.095.04.096.037.098.034.098.033.1.03.1.027.102.025.103.023.103.02.105.017.105.015.106.012.107.01.108.007.109.004.109.001.11v19.896l-.001.11-.004.109-.007.109-.01.108-.012.107-.015.106-.017.105-.02.105-.023.103-.025.103-.027.102-.03.1-.033.1-.034.098-.037.098-.04.096-.041.095-.044.094-.046.092-.048.092-.051.089-.052.089-.055.087-.056.086-.059.084-.06.083-.062.082-.065.079-.066.079-.068.076-.069.075-.072.073-.073.072-.075.069-.076.068-.079.066-.079.065-.082.062-.083.06-.084.059-.086.056-.087.055-.089.052-.089.051-.092.048-.092.046-.094.044-.095.041-.096.04-.098.037-.098.034-.1.033-.1.03-.102.027-.103.025-.103.023-.105.02-.105.017-.106.015-.107.012-.108.01-.109.007-.109.004-.11.001H15.052l-.11-.001-.109-.004-.109-.007-.108-.01-.107-.012-.106-.015-.105-.017-.105-.02-.103-.023-.103-.025-.102-.027-.1-.03-.1-.033-.098-.034-.098-.037-.096-.04-.095-.041-.094-.044-.092-.046-.092-.048-.089-.051-.089-.052-.087-.055-.086-.056-.084-.059-.083-.06-.082-.062-.079-.065-.079-.066-.076-.068-.075-.069-.073-.072-.072-.073-.069-.075-.068-.076-.066-.079-.065-.079-.062-.082-.06-.083-.059-.084-.056-.086-.055-.087-.052-.089-.051-.089-.048-.092-.046-.092-.044-.094-.041-.095-.04-.096-.037-.098-.034-.098-.033-.1-.03-.1-.027-.102-.025-.103-.023-.103-.02-.105-.017-.105-.015-.106-.012-.107-.01-.108-.007-.109-.004-.109-.001-.11V5.052l.001-.11.004-.109.007-.109.01-.108.012-.107.015-.106.017-.105.02-.105.023-.103.025-.103.027-.102.03-.1.033-.1.034-.098.037-.098.04-.096.041-.095.044-.094.046-.092.048-.092.051-.089.052-.089.055-.087.056-.086.059-.084.06-.083.062-.082.065-.079.066-.079.068-.076.069-.075.072-.073.073-.072.075-.069.076-.068.079-.066.079-.065.082-.062.083-.06.084-.059.086-.056.087-.055.089-.052.089-.051.092-.048.092-.046.094-.044.095-.041.096-.04.098-.037.098-.034.1-.033.1-.03.102-.027.103-.025.103-.023.105-.02.105-.017.106-.015.107-.012.108-.01.109-.007.109-.004.11-.001h19.896l.11.001zM15.061 2.289l-.081.001-.071.002-.071.005-.07.006-.069.008-.069.01-.068.011-.068.013-.067.014-.066.017-.065.017-.065.02-.065.021-.063.022-.063.024-.062.025-.062.027-.06.028-.06.03-.059.031-.058.033-.058.034-.056.035-.056.037-.055.038-.054.039-.053.041-.051.041-.051.043-.05.045-.049.045-.047.047-.047.047-.045.049-.045.05-.043.051-.041.051-.041.053-.039.054-.038.055-.037.056-.035.056-.034.058-.033.058-.031.059-.03.06-.028.06-.027.062-.025.062-.024.063-.022.063-.021.065-.02.065-.017.065-.017.066-.014.067-.013.068-.011.068-.01.069-.008.069-.006.07-.005.071-.002.071-.001.081v19.878l.001.081.002.071.005.071.006.07.008.069.01.069.011.068.013.068.014.067.017.066.017.065.02.065.021.065.022.063.024.063.025.062.027.062.028.06.03.06.031.059.033.058.034.058.035.056.037.056.038.055.039.054.041.053.042.051.042.051.045.05.045.049.047.047.047.047.049.045.05.045.051.043.051.041.053.041.054.039.055.038.056.037.056.035.058.034.058.033.059.031.06.03.06.028.062.027.062.025.063.024.063.022.065.021.065.02.065.017.066.017.067.014.068.013.068.011.069.01.069.008.07.006.071.005.071.002.081.001h19.878l.081-.001.071-.002.071-.005.07-.006.069-.008.069-.01.068-.011.068-.013.067-.014.066-.017.065-.017.065-.02.065-.021.063-.022.063-.024.062-.025.062-.027.06-.028.06-.03.059-.031.058-.033.058-.034.056-.035.056-.037.055-.038.054-.039.053-.041.051-.042.051-.042.05-.045.049-.045.047-.047.047-.047.045-.049.045-.05.042-.051.042-.051.041-.053.039-.054.038-.055.037-.056.035-.056.034-.058.033-.058.031-.059.03-.06.028-.06.027-.062.025-.062.024-.063.022-.063.021-.065.02-.065.017-.065.017-.066.014-.067.013-.068.011-.068.01-.069.008-.069.006-.07.005-.071.002-.071.001-.081V5.061l-.001-.081-.002-.071-.005-.071-.006-.07-.008-.069-.01-.069-.011-.068-.013-.068-.014-.067-.017-.066-.017-.065-.02-.065-.021-.065-.022-.063-.024-.063-.025-.062-.027-.062-.028-.06-.03-.06-.031-.059-.033-.058-.034-.058-.035-.056-.037-.056-.038-.055-.039-.054-.041-.053-.041-.051-.043-.051-.045-.05-.045-.049-.047-.047-.047-.047-.049-.045-.05-.045-.051-.042-.051-.042-.053-.041-.054-.039-.055-.038-.056-.037-.056-.035-.058-.034-.058-.033-.059-.031-.06-.03-.06-.028-.062-.027-.062-.025-.063-.024-.063-.022-.065-.021-.065-.02-.065-.017-.066-.017-.067-.014-.068-.013-.068-.011-.069-.01-.069-.008-.07-.006-.071-.005-.071-.002-.081-.001H15.061z"
  })),
  logoTitleTag: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M9.984 10.805a.56.56 0 100-1.122.56.56 0 000 1.122M11.475 9.727a.648.648 0 100-1.295.648.648 0 000 1.295M12.316 19.991H8.737c-.4 0-.636-.45-.408-.779l1.831-2.649a.496.496 0 01.822.009l1.748 2.649a.496.496 0 01-.414.77m2.178-.681l-2.544-4.202v-2.346h.062a.667.667 0 000-1.333H9.047a.667.667 0 100 1.333h.061v2.346L6.565 19.31a1.346 1.346 0 001.205 1.946h5.518c1 0 1.651-1.051 1.206-1.946"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M17.649 4.942l.077.003.077.005.076.006.076.009.075.011.075.012.074.014.073.016.072.018.072.019.072.022.07.022.07.025.069.026.068.028.067.029.067.032.065.032.065.034.063.036.063.037.062.038.06.04.06.042.059.043.057.044.057.045.055.047.054.048.053.049.052.051.051.052.049.053.048.054.047.055.045.057.045.057.042.059.042.06.04.06.038.062.037.063.036.064.034.064.033.066.031.066.029.067.028.068.026.069.025.07.023.071.021.071.019.072.018.072.016.074.014.074.013.074.01.075.009.076.007.076.005.077.002.078.001.078v14.082l-.001.078-.002.078-.005.077-.007.076-.009.076-.01.075-.013.074-.014.074-.016.074-.018.072-.019.072-.021.071-.023.071-.025.07-.026.069-.028.068-.029.067-.031.066-.033.066-.034.064-.036.064-.037.063-.038.062-.04.06-.042.06-.042.059-.045.057-.045.057-.047.055-.048.054-.049.053-.051.052-.052.051-.053.049-.054.048-.055.047-.057.045-.057.044-.059.043-.06.042-.06.04-.062.038-.063.037-.063.036-.065.034-.065.032-.067.032-.067.029-.068.028-.069.026-.07.025-.07.022-.072.022-.072.019-.072.018-.073.016-.074.014-.075.012-.075.011-.076.009-.076.006-.077.005-.077.003-.078.001H3.488l-.078-.001-.077-.003-.077-.005-.077-.006-.075-.009-.076-.011-.074-.012-.074-.014-.073-.016-.073-.018-.072-.019-.071-.022-.071-.022-.069-.025-.069-.026-.068-.028-.068-.029-.066-.032-.066-.032-.064-.034-.064-.036-.063-.037-.061-.038-.061-.04-.06-.042-.058-.043-.058-.044-.056-.045-.056-.047-.054-.048-.053-.049-.052-.051-.05-.052-.05-.053-.048-.054-.047-.055-.045-.057-.044-.057-.043-.059-.041-.06-.04-.06-.039-.062-.037-.063-.036-.064-.034-.064-.032-.066-.031-.066-.03-.067-.028-.068-.026-.069-.024-.07-.023-.071-.022-.071-.019-.072-.018-.072-.016-.074-.014-.074-.012-.074-.011-.075-.008-.076-.007-.076-.005-.077-.003-.078-.001-.078V7.959l.001-.078.003-.078.005-.077.007-.076.008-.076.011-.075.012-.074.014-.074.016-.074.018-.072.019-.072.022-.071.023-.071.024-.07.026-.069.028-.068.03-.067.031-.066.032-.066.034-.064.036-.064.037-.063.039-.062.04-.06.041-.06.043-.059.044-.057.045-.057.047-.055.048-.054.05-.053.05-.052.052-.051.053-.049.054-.048.056-.047.056-.045.058-.044.058-.043.06-.042.061-.04.061-.038.063-.037.064-.036.064-.034.066-.032.066-.032.068-.029.068-.028.069-.026.069-.025.071-.022.071-.022.072-.019.073-.018.073-.016.074-.014.074-.012.076-.011.075-.009.077-.006.077-.005.077-.003.078-.001h14.083l.078.001zM3.497 6.441h-.049l-.039.002-.039.002-.039.004-.038.004-.038.005-.037.007-.037.007-.037.008-.036.009-.036.009-.035.011-.036.011-.034.013-.035.013-.034.014-.033.014-.034.016-.032.016-.033.017-.032.018-.031.019-.032.019-.03.02-.03.021-.03.022-.029.022-.028.023-.029.024-.027.024-.027.025-.026.026-.026.026-.025.027-.024.027-.024.028-.023.029-.022.029-.022.03-.02.03-.021.03-.019.031-.019.032-.018.032-.017.032-.016.033-.016.033-.014.034-.014.034-.013.034-.013.035-.011.035-.011.036-.009.036-.009.036-.008.037-.007.037-.006.037-.006.038-.004.038-.003.038-.003.039-.001.04-.001.049v14.064l.001.049.001.04.003.039.003.038.004.038.006.038.006.037.007.037.008.037.009.036.009.036.011.036.011.035.013.035.013.034.014.034.014.034.016.033.016.033.017.032.018.032.019.032.019.031.021.03.02.03.022.03.022.029.023.029.024.028.024.027.025.027.026.026.026.026.027.025.028.024.028.024.028.023.029.022.03.022.03.021.03.02.032.019.031.019.032.018.033.017.032.016.034.016.033.014.034.014.035.013.034.013.036.011.035.011.036.009.036.009.037.008.037.007.037.007.038.005.038.004.039.004.039.002.039.002H17.61l.04-.002.039-.002.038-.004.038-.004.038-.005.038-.007.037-.007.036-.008.036-.009.036-.009.036-.011.035-.011.035-.013.034-.013.034-.014.034-.014.033-.016.033-.016.032-.017.032-.018.032-.019.031-.019.03-.02.031-.021.029-.022.029-.022.029-.023.028-.024.027-.024.027-.025.026-.026.026-.026.025-.027.024-.027.024-.028.023-.029.022-.029.022-.03.021-.03.02-.03.019-.031.019-.032.018-.032.017-.032.016-.033.016-.033.015-.034.014-.034.013-.034.012-.035.011-.035.011-.036.01-.036.009-.036.007-.037.008-.037.006-.037.005-.038.004-.038.004-.038.002-.039.002-.04V7.919l-.002-.04-.002-.039-.004-.038-.004-.038-.005-.038-.006-.037-.008-.037-.007-.037-.009-.036-.01-.036-.011-.036-.011-.035-.012-.035-.013-.034-.014-.034-.015-.034-.016-.033-.016-.033-.017-.032-.018-.032-.019-.032-.019-.031-.02-.03-.021-.03-.022-.03-.022-.029-.023-.029-.024-.028-.024-.027-.025-.027-.026-.026-.026-.026-.027-.025-.027-.024-.028-.024-.029-.023-.029-.022-.029-.022-.031-.021-.03-.02-.031-.019-.032-.019-.032-.018-.032-.017-.033-.016-.033-.016-.034-.014-.034-.014-.034-.013-.035-.013-.035-.011-.036-.011-.036-.009-.036-.009-.036-.008-.037-.007-.038-.007-.038-.005-.038-.004-.038-.004-.039-.002-.04-.002H3.497z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M27.867 8.104V9.47h-2.146v5.749h-1.602V9.47h-2.146V8.104h5.894z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M28.893 8.104H30.495V15.219H28.893z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M37.415 8.104V9.47H35.27v5.749h-1.602V9.47h-2.146V8.104h5.893zM43.196 13.844v1.375h-4.754V8.104h1.602v5.74h3.152zM44.223 15.219V8.104h4.805v1.345h-3.204v1.397h2.844v1.314h-2.844v1.714h3.44v1.345h-5.041z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M25.779 17.216v.881h-1.385v3.713H23.36v-3.713h-1.386v-.881h3.805zM28.975 21.81a11.73 11.73 0 00-.163-.491c-.059-.168-.118-.336-.175-.504h-1.79c-.058.168-.116.336-.176.504-.06.168-.114.332-.162.491h-1.074c.172-.495.336-.953.49-1.373.155-.419.306-.815.454-1.186.148-.371.294-.724.438-1.057.143-.334.293-.66.447-.978h.988a37.492 37.492 0 011.339 3.221c.155.42.318.878.491 1.373h-1.107zm-1.24-3.554a6.44 6.44 0 01-.099.272l-.153.398-.189.497c-.068.181-.138.371-.209.57h1.306a26.56 26.56 0 00-.394-1.067c-.06-.15-.112-.283-.156-.398a17.567 17.567 0 00-.106-.272zM32.753 18.011c-.481 0-.83.134-1.044.401-.214.268-.321.633-.321 1.097 0 .226.026.43.079.614.053.183.133.341.239.474.106.132.238.235.398.308.159.073.344.109.556.109.115 0 .214-.002.295-.006.082-.005.154-.014.216-.027v-1.598h1.034v2.274a3.832 3.832 0 01-.597.156 5.256 5.256 0 01-1.014.083c-.345 0-.657-.053-.938-.159a1.961 1.961 0 01-.719-.464 2.073 2.073 0 01-.461-.749 2.953 2.953 0 01-.162-1.015c0-.384.059-.724.179-1.021.119-.296.283-.546.49-.752.208-.205.452-.361.733-.467.28-.106.58-.159.898-.159a3.606 3.606 0 011.037.142 2.132 2.132 0 01.488.209l-.299.829a2.586 2.586 0 00-.487-.196 2.077 2.077 0 00-.6-.083zM38.235 20.921v.889h-3.069v-4.594H36.2v3.705h2.035z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M38.898 17.216H39.932V21.810000000000002H38.898z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M44.076 21.81a23.18 23.18 0 00-.961-1.558 15.8 15.8 0 00-1.101-1.452v3.01h-1.021v-4.594h.842c.146.146.307.325.484.537a23.033 23.033 0 011.087 1.428c.181.259.352.507.511.746v-2.711h1.027v4.594h-.868zM46.005 21.81v-4.594h3.102v.868h-2.068v.902h1.836v.848h-1.836v1.107h2.221v.869h-3.255z"
  })),
  logoTitle: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M10.005 10.805a.56.56 0 100-1.122.56.56 0 000 1.122M11.496 9.727a.648.648 0 100-1.295.648.648 0 000 1.295M12.337 19.991H8.759a.497.497 0 01-.409-.779l1.831-2.649a.496.496 0 01.822.009l1.748 2.649a.496.496 0 01-.414.77m2.178-.681l-2.544-4.202v-2.346h.062a.667.667 0 000-1.333H9.068a.667.667 0 100 1.333h.062v2.346L6.586 19.31a1.346 1.346 0 001.205 1.946h5.518c1 0 1.651-1.051 1.206-1.946"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M17.67 4.942l.077.003.077.005.076.006.076.009.075.011.075.012.074.014.073.016.073.018.072.019.071.022.07.022.07.025.069.026.068.028.067.029.067.032.065.032.065.034.063.036.063.037.062.038.061.04.059.042.059.043.057.044.057.045.055.047.054.048.053.049.052.051.051.052.049.053.048.054.047.055.046.057.044.057.042.059.042.06.04.06.038.062.037.063.036.064.034.064.033.066.031.066.029.067.028.068.026.069.025.07.023.071.021.071.019.072.018.072.016.074.014.074.013.074.01.075.009.076.007.076.005.077.003.078.001.078v14.082l-.001.078-.003.078-.005.077-.007.076-.009.076-.01.075-.013.074-.014.074-.016.074-.018.072-.019.072-.021.071-.023.071-.025.07-.026.069-.028.068-.029.067-.031.066-.033.066-.034.064-.036.064-.037.063-.038.062-.04.06-.042.06-.042.059-.044.057-.046.057-.047.055-.048.054-.049.053-.051.052-.052.051-.053.049-.054.048-.055.047-.057.045-.057.044-.059.043-.059.042-.061.04-.062.038-.063.037-.063.036-.065.034-.065.032-.067.032-.067.029-.068.028-.069.026-.07.025-.07.022-.071.022-.072.019-.073.018-.073.016-.074.014-.075.012-.075.011-.076.009-.076.006-.077.005-.077.003-.078.001H3.509l-.078-.001-.077-.003-.077-.005-.077-.006-.075-.009-.076-.011-.074-.012-.074-.014-.073-.016-.073-.018-.072-.019-.071-.022-.071-.022-.069-.025-.069-.026-.068-.028-.068-.029-.066-.032-.066-.032-.064-.034-.064-.036-.063-.037-.061-.038-.061-.04-.06-.042-.058-.043-.058-.044-.056-.045-.056-.047-.054-.048-.053-.049-.052-.051-.05-.052-.05-.053-.048-.054-.047-.055-.045-.057-.044-.057-.043-.059-.041-.06-.04-.06-.039-.062-.037-.063-.036-.064-.034-.064-.032-.066-.031-.066-.03-.067-.028-.068-.026-.069-.024-.07-.023-.071-.021-.071-.02-.072-.018-.072-.016-.074-.014-.074-.012-.074-.011-.075-.008-.076-.007-.076-.005-.077-.003-.078-.001-.078V7.959l.001-.078.003-.078.005-.077.007-.076.008-.076.011-.075.012-.074.014-.074.016-.074.018-.072.02-.072.021-.071.023-.071.024-.07.026-.069.028-.068.03-.067.031-.066.032-.066.034-.064.036-.064.037-.063.039-.062.04-.06.041-.06.043-.059.044-.057.045-.057.047-.055.048-.054.05-.053.05-.052.052-.051.053-.049.054-.048.056-.047.056-.045.058-.044.058-.043.06-.042.061-.04.061-.038.063-.037.064-.036.064-.034.066-.032.066-.032.068-.029.068-.028.069-.026.069-.025.071-.022.071-.022.072-.019.073-.018.073-.016.074-.014.074-.012.076-.011.075-.009.077-.006.077-.005.077-.003.078-.001h14.083l.078.001zM3.518 6.441h-.049l-.039.002-.039.002-.039.004-.038.004-.038.005-.037.007-.037.007-.037.008-.036.009-.036.009-.035.011-.035.011-.035.013-.035.013-.034.014-.033.014-.034.016-.032.016-.033.017-.032.018-.031.019-.031.019-.031.02-.03.021-.03.022-.029.022-.028.023-.028.024-.028.024-.027.025-.026.026-.026.026-.025.027-.024.027-.024.028-.023.029-.022.029-.022.03-.02.03-.021.03-.019.031-.019.032-.018.032-.017.032-.016.033-.015.033-.015.034-.014.034-.013.034-.012.035-.012.035-.01.036-.01.036-.009.036-.008.037-.007.037-.006.037-.006.038-.004.038-.003.038-.003.039-.001.04-.001.049v14.064l.001.049.001.04.003.039.003.038.004.038.006.038.006.037.007.037.008.037.009.036.01.036.01.036.012.035.012.035.013.034.014.034.015.034.015.033.016.033.017.032.018.032.019.032.019.031.021.03.02.03.022.03.022.029.023.029.024.028.024.027.025.027.026.026.026.026.027.025.028.024.028.024.028.023.029.022.03.022.03.021.031.02.031.019.031.019.032.018.033.017.032.016.034.016.033.014.034.014.035.013.035.013.035.011.035.011.036.009.036.009.037.008.037.007.037.007.038.005.038.004.039.004.039.002.039.002h14.163l.039-.002.039-.002.038-.004.039-.004.037-.005.038-.007.037-.007.036-.008.036-.009.036-.009.036-.011.035-.011.035-.013.034-.013.034-.014.034-.014.033-.016.033-.016.032-.017.032-.018.032-.019.031-.019.031-.02.03-.021.029-.022.029-.022.029-.023.028-.024.027-.024.027-.025.027-.026.025-.026.025-.027.024-.027.024-.028.023-.029.022-.029.022-.03.021-.03.02-.03.02-.031.018-.032.018-.032.017-.032.017-.033.015-.033.015-.034.014-.034.013-.034.012-.035.011-.035.011-.036.01-.036.009-.036.008-.037.007-.037.006-.037.005-.038.005-.038.003-.038.002-.039.002-.04.001-.049V7.968l-.001-.049-.002-.04-.002-.039-.003-.038-.005-.038-.005-.038-.006-.037-.007-.037-.008-.037-.009-.036-.01-.036-.011-.036-.011-.035-.012-.035-.013-.034-.014-.034-.015-.034-.015-.033-.017-.033-.017-.032-.018-.032-.018-.032-.02-.031-.02-.03-.021-.03-.022-.03-.022-.029-.023-.029-.024-.028-.024-.027-.025-.027-.025-.026-.027-.026-.027-.025-.027-.024-.028-.024-.029-.023-.029-.022-.029-.022-.03-.021-.031-.02-.031-.019-.032-.019-.032-.018-.032-.017-.033-.016-.033-.016-.034-.014-.034-.014-.034-.013-.035-.013-.035-.011-.036-.011-.036-.009-.036-.009-.036-.008-.037-.007-.038-.007-.037-.005-.039-.004-.038-.004-.039-.002-.039-.002H3.518z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M28.058 11.442v1.366h-2.146v5.75H24.31v-5.75h-2.145v-1.366h5.893z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M29.085 11.442H30.687V18.557000000000002H29.085z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M37.607 11.442v1.366h-2.146v5.75h-1.602v-5.75h-2.146v-1.366h5.894zM43.387 17.182v1.376h-4.754v-7.116h1.602v5.74h3.152zM44.414 18.558v-7.116h4.805v1.345h-3.203v1.397h2.844v1.314h-2.844v1.715h3.439v1.345h-5.041z"
  })),
  titleLogo: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M39.066 10.805a.56.56 0 10-.001-1.121.56.56 0 00.001 1.121M40.557 9.727a.647.647 0 100-1.295.647.647 0 000 1.295M41.398 19.991h-3.579c-.4 0-.636-.45-.408-.779l1.83-2.649a.497.497 0 01.823.009l1.748 2.649a.496.496 0 01-.414.77m2.177-.681l-2.543-4.202v-2.346h.061a.667.667 0 000-1.333h-2.965a.666.666 0 100 1.333h.062v2.346l-2.544 4.202a1.347 1.347 0 001.206 1.946h5.518c1 0 1.651-1.051 1.205-1.946"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M46.73 4.942l.077.003.077.005.077.006.075.009.076.011.074.012.074.014.073.016.073.018.072.019.071.022.071.022.069.025.069.026.068.028.068.029.066.032.066.032.064.034.064.036.063.037.061.038.061.04.06.042.058.043.058.044.056.045.056.047.054.048.053.049.052.051.05.052.05.053.048.054.047.055.045.057.044.057.043.059.041.06.04.06.039.062.037.063.036.064.034.064.032.066.031.066.03.067.028.068.026.069.024.07.023.071.021.071.02.072.018.072.016.074.014.074.012.074.011.075.008.076.007.076.005.077.003.078.001.078v14.082l-.001.078-.003.078-.005.077-.007.076-.008.076-.011.075-.012.074-.014.074-.016.074-.018.072-.02.072-.021.071-.023.071-.024.07-.026.069-.028.068-.03.067-.031.066-.032.066-.034.064-.036.064-.037.063-.039.062-.04.06-.041.06-.043.059-.044.057-.045.057-.047.055-.048.054-.05.053-.05.052-.052.051-.053.049-.054.048-.056.047-.056.045-.058.044-.058.043-.06.042-.061.04-.061.038-.063.037-.064.036-.064.034-.066.032-.066.032-.068.029-.068.028-.069.026-.069.025-.071.022-.071.022-.072.019-.073.018-.073.016-.074.014-.074.012-.076.011-.075.009-.077.006-.077.005-.077.003-.078.001H32.569l-.078-.001-.077-.003-.077-.005-.076-.006-.076-.009-.075-.011-.075-.012-.074-.014-.073-.016-.073-.018-.071-.019-.072-.022-.07-.022-.07-.025-.069-.026-.068-.028-.067-.029-.067-.032-.065-.032-.065-.034-.063-.036-.063-.037-.062-.038-.06-.04-.06-.042-.059-.043-.057-.044-.057-.045-.055-.047-.054-.048-.053-.049-.052-.051-.051-.052-.049-.053-.048-.054-.047-.055-.045-.057-.045-.057-.042-.059-.042-.06-.04-.06-.038-.062-.037-.063-.036-.064-.034-.064-.033-.066-.031-.066-.029-.067-.028-.068-.026-.069-.025-.07-.023-.071-.021-.071-.019-.072-.018-.072-.016-.074-.014-.074-.013-.074-.01-.075-.009-.076-.007-.076-.005-.077-.002-.078-.001-.078V7.959l.001-.078.002-.078.005-.077.007-.076.009-.076.01-.075.013-.074.014-.074.016-.074.018-.072.019-.072.021-.071.023-.071.025-.07.026-.069.028-.068.029-.067.031-.066.033-.066.034-.064.036-.064.037-.063.038-.062.04-.06.042-.06.042-.059.045-.057.045-.057.047-.055.048-.054.049-.053.051-.052.052-.051.053-.049.054-.048.055-.047.057-.045.057-.044.059-.043.06-.042.06-.04.062-.038.063-.037.063-.036.065-.034.065-.032.067-.032.067-.029.068-.028.069-.026.07-.025.07-.022.072-.022.071-.019.073-.018.073-.016.074-.014.075-.012.075-.011.076-.009.076-.006.077-.005.077-.003.078-.001h14.083l.078.001zM32.579 6.441h-.05l-.039.002-.039.002-.038.004-.038.004-.038.005-.038.007-.037.007-.036.008-.036.009-.036.009-.036.011-.035.011-.035.013-.034.013-.034.014-.034.014-.033.016-.033.016-.032.017-.032.018-.032.019-.031.019-.031.02-.03.021-.029.022-.029.022-.029.023-.028.024-.027.024-.027.025-.026.026-.026.026-.025.027-.024.027-.024.028-.023.029-.022.029-.022.03-.021.03-.02.03-.019.031-.019.032-.018.032-.017.032-.016.033-.016.033-.015.034-.014.034-.013.034-.012.035-.011.035-.011.036-.01.036-.009.036-.008.037-.007.037-.006.037-.005.038-.004.038-.004.038-.002.039-.002.04V22.081l.002.04.002.039.004.038.004.038.005.038.006.037.007.037.008.037.009.036.01.036.011.036.011.035.012.035.013.034.014.034.015.034.016.033.016.033.017.032.018.032.019.032.019.031.02.03.021.03.022.03.022.029.023.029.024.028.024.027.025.027.026.026.026.026.027.025.027.024.028.024.029.023.029.022.029.022.03.021.031.02.031.019.032.019.032.018.032.017.033.016.033.016.034.014.034.014.034.013.035.013.035.011.036.011.036.009.036.009.036.008.037.007.038.007.038.005.038.004.038.004.039.002.039.002h14.163l.039-.002.039-.002.039-.004.038-.004.038-.005.037-.007.037-.007.037-.008.036-.009.036-.009.035-.011.036-.011.034-.013.035-.013.034-.014.033-.014.034-.016.032-.016.033-.017.032-.018.031-.019.031-.019.031-.02.03-.021.03-.022.029-.022.028-.023.028-.024.028-.024.027-.025.026-.026.026-.026.025-.027.024-.027.024-.028.023-.029.022-.029.022-.03.02-.03.021-.03.019-.031.019-.032.018-.032.017-.032.016-.033.016-.033.014-.034.014-.034.013-.034.013-.035.011-.035.011-.036.009-.036.009-.036.008-.037.007-.037.006-.037.006-.038.004-.038.003-.038.003-.039.001-.04.001-.049V7.968l-.001-.049-.001-.04-.003-.039-.003-.038-.004-.038-.006-.038-.006-.037-.007-.037-.008-.037-.009-.036-.009-.036-.011-.036-.011-.035-.013-.035-.013-.034-.014-.034-.014-.034-.016-.033-.016-.033-.017-.032-.018-.032-.019-.032-.019-.031-.021-.03-.02-.03-.022-.03-.022-.029-.023-.029-.024-.028-.024-.027-.025-.027-.026-.026-.026-.026-.027-.025-.028-.024-.028-.024-.028-.023-.029-.022-.03-.022-.03-.021-.031-.02-.031-.019-.031-.019-.032-.018-.033-.017-.032-.016-.034-.016-.033-.014-.034-.014-.035-.013-.034-.013-.036-.011-.035-.011-.036-.009-.036-.009-.037-.008-.037-.007-.037-.007-.038-.005-.038-.004-.039-.004-.039-.002-.039-.002H32.579z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6.37 11.442v1.366H4.224v5.75H2.622v-5.75H.476v-1.366H6.37z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M7.396 11.442H8.998V18.557000000000002H7.396z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M15.918 11.442v1.366h-2.146v5.75h-1.601v-5.75h-2.146v-1.366h5.893zM21.699 17.182v1.376h-4.754v-7.116h1.602v5.74h3.152zM22.725 18.558v-7.116h4.805v1.345h-3.203v1.397h2.844v1.314h-2.844v1.715h3.44v1.345h-5.042z"
  })),
  titleTagLogo: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M39.066 10.805a.56.56 0 10-.001-1.121.56.56 0 00.001 1.121M40.557 9.727a.647.647 0 100-1.295.647.647 0 000 1.295M41.398 19.991h-3.579c-.4 0-.636-.45-.408-.779l1.83-2.649a.497.497 0 01.823.009l1.748 2.649a.496.496 0 01-.414.77m2.177-.681l-2.543-4.202v-2.346h.061a.667.667 0 000-1.333h-2.965a.666.666 0 100 1.333h.062v2.346l-2.544 4.202a1.347 1.347 0 001.206 1.946h5.518c1 0 1.651-1.051 1.205-1.946"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M46.73 4.942l.077.003.077.005.077.006.075.009.076.011.074.012.074.014.073.016.073.018.072.019.071.022.071.022.069.025.069.026.068.028.068.029.066.032.066.032.064.034.064.036.063.037.061.038.061.04.06.042.058.043.058.044.056.045.056.047.054.048.053.049.052.051.05.052.05.053.048.054.047.055.045.057.044.057.043.059.041.06.04.06.039.062.037.063.036.064.034.064.032.066.031.066.03.067.028.068.026.069.024.07.023.071.021.071.02.072.018.072.016.074.014.074.012.074.011.075.008.076.007.076.005.077.003.078.001.078v14.082l-.001.078-.003.078-.005.077-.007.076-.008.076-.011.075-.012.074-.014.074-.016.074-.018.072-.02.072-.021.071-.023.071-.024.07-.026.069-.028.068-.03.067-.031.066-.032.066-.034.064-.036.064-.037.063-.039.062-.04.06-.041.06-.043.059-.044.057-.045.057-.047.055-.048.054-.05.053-.05.052-.052.051-.053.049-.054.048-.056.047-.056.045-.058.044-.058.043-.06.042-.061.04-.061.038-.063.037-.064.036-.064.034-.066.032-.066.032-.068.029-.068.028-.069.026-.069.025-.071.022-.071.022-.072.019-.073.018-.073.016-.074.014-.074.012-.076.011-.075.009-.077.006-.077.005-.077.003-.078.001H32.569l-.078-.001-.077-.003-.077-.005-.076-.006-.076-.009-.075-.011-.075-.012-.074-.014-.073-.016-.073-.018-.071-.019-.072-.022-.07-.022-.07-.025-.069-.026-.068-.028-.067-.029-.067-.032-.065-.032-.065-.034-.063-.036-.063-.037-.062-.038-.06-.04-.06-.042-.059-.043-.057-.044-.057-.045-.055-.047-.054-.048-.053-.049-.052-.051-.051-.052-.049-.053-.048-.054-.047-.055-.045-.057-.045-.057-.042-.059-.042-.06-.04-.06-.038-.062-.037-.063-.036-.064-.034-.064-.033-.066-.031-.066-.029-.067-.028-.068-.026-.069-.025-.07-.023-.071-.021-.071-.019-.072-.018-.072-.016-.074-.014-.074-.013-.074-.01-.075-.009-.076-.007-.076-.005-.077-.002-.078-.001-.078V7.959l.001-.078.002-.078.005-.077.007-.076.009-.076.01-.075.013-.074.014-.074.016-.074.018-.072.019-.072.021-.071.023-.071.025-.07.026-.069.028-.068.029-.067.031-.066.033-.066.034-.064.036-.064.037-.063.038-.062.04-.06.042-.06.042-.059.045-.057.045-.057.047-.055.048-.054.049-.053.051-.052.052-.051.053-.049.054-.048.055-.047.057-.045.057-.044.059-.043.06-.042.06-.04.062-.038.063-.037.063-.036.065-.034.065-.032.067-.032.067-.029.068-.028.069-.026.07-.025.07-.022.072-.022.071-.019.073-.018.073-.016.074-.014.075-.012.075-.011.076-.009.076-.006.077-.005.077-.003.078-.001h14.083l.078.001zM32.579 6.441h-.05l-.039.002-.039.002-.038.004-.038.004-.038.005-.038.007-.037.007-.036.008-.036.009-.036.009-.036.011-.035.011-.035.013-.034.013-.034.014-.034.014-.033.016-.033.016-.032.017-.032.018-.032.019-.031.019-.031.02-.03.021-.029.022-.029.022-.029.023-.028.024-.027.024-.027.025-.026.026-.026.026-.025.027-.024.027-.024.028-.023.029-.022.029-.022.03-.021.03-.02.03-.019.031-.019.032-.018.032-.017.032-.016.033-.016.033-.015.034-.014.034-.013.034-.012.035-.011.035-.011.036-.01.036-.009.036-.008.037-.007.037-.006.037-.005.038-.004.038-.004.038-.002.039-.002.04V22.081l.002.04.002.039.004.038.004.038.005.038.006.037.007.037.008.037.009.036.01.036.011.036.011.035.012.035.013.034.014.034.015.034.016.033.016.033.017.032.018.032.019.032.019.031.02.03.021.03.022.03.022.029.023.029.024.028.024.027.025.027.026.026.026.026.027.025.027.024.028.024.029.023.029.022.029.022.03.021.031.02.031.019.032.019.032.018.032.017.033.016.033.016.034.014.034.014.034.013.035.013.035.011.036.011.036.009.036.009.036.008.037.007.038.007.038.005.038.004.038.004.039.002.039.002h14.163l.039-.002.039-.002.039-.004.038-.004.038-.005.037-.007.037-.007.037-.008.036-.009.036-.009.035-.011.036-.011.034-.013.035-.013.034-.014.033-.014.034-.016.032-.016.033-.017.032-.018.031-.019.031-.019.031-.02.03-.021.03-.022.029-.022.028-.023.028-.024.028-.024.027-.025.026-.026.026-.026.025-.027.024-.027.024-.028.023-.029.022-.029.022-.03.02-.03.021-.03.019-.031.019-.032.018-.032.017-.032.016-.033.016-.033.014-.034.014-.034.013-.034.013-.035.011-.035.011-.036.009-.036.009-.036.008-.037.007-.037.006-.037.006-.038.004-.038.003-.038.003-.039.001-.04.001-.049V7.968l-.001-.049-.001-.04-.003-.039-.003-.038-.004-.038-.006-.038-.006-.037-.007-.037-.008-.037-.009-.036-.009-.036-.011-.036-.011-.035-.013-.035-.013-.034-.014-.034-.014-.034-.016-.033-.016-.033-.017-.032-.018-.032-.019-.032-.019-.031-.021-.03-.02-.03-.022-.03-.022-.029-.023-.029-.024-.028-.024-.027-.025-.027-.026-.026-.026-.026-.027-.025-.028-.024-.028-.024-.028-.023-.029-.022-.03-.022-.03-.021-.031-.02-.031-.019-.031-.019-.032-.018-.033-.017-.032-.016-.034-.016-.033-.014-.034-.014-.035-.013-.034-.013-.036-.011-.035-.011-.036-.009-.036-.009-.037-.008-.037-.007-.037-.007-.038-.005-.038-.004-.039-.004-.039-.002-.039-.002H32.579z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6.37 8.104V9.47H4.224v5.749H2.622V9.47H.476V8.104H6.37z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M7.396 8.104H8.998V15.219H7.396z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M15.918 8.104V9.47h-2.146v5.749h-1.601V9.47h-2.146V8.104h5.893zM21.699 13.844v1.375h-4.754V8.104h1.602v5.74h3.152zM22.725 15.219V8.104h4.805v1.345h-3.203v1.397h2.844v1.314h-2.844v1.714h3.44v1.345h-5.042z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4.282 17.216v.881H2.897v3.713H1.863v-3.713H.477v-.881h3.805zM7.477 21.81a10.389 10.389 0 00-.162-.491c-.06-.168-.118-.336-.176-.504h-1.79c-.057.168-.116.336-.175.504-.06.168-.114.332-.163.491H3.937a85.2 85.2 0 01.491-1.373c.155-.419.306-.815.454-1.186.148-.371.294-.724.438-1.057.143-.334.292-.66.447-.978h.988a37.492 37.492 0 011.339 3.221c.155.42.318.878.49 1.373H7.477zm-1.239-3.554a5.468 5.468 0 01-.1.272l-.152.398a56.25 56.25 0 00-.398 1.067h1.306a26.56 26.56 0 00-.394-1.067c-.06-.15-.112-.283-.156-.398l-.106-.272zM11.256 18.011c-.482 0-.83.134-1.044.401-.214.268-.322.633-.322 1.097 0 .226.027.43.08.614.053.183.133.341.239.474.106.132.238.235.397.308.159.073.345.109.557.109.115 0 .213-.002.295-.006.082-.005.154-.014.216-.027v-1.598h1.034v2.274a3.832 3.832 0 01-.597.156 5.256 5.256 0 01-1.014.083c-.345 0-.658-.053-.938-.159a1.953 1.953 0 01-1.18-1.213 2.953 2.953 0 01-.163-1.015c0-.384.06-.724.179-1.021a2.21 2.21 0 01.491-.752c.208-.205.452-.361.733-.467.28-.106.58-.159.898-.159a3.594 3.594 0 011.037.142 2.132 2.132 0 01.487.209l-.298.829a2.614 2.614 0 00-.487-.196 2.077 2.077 0 00-.6-.083zM16.738 20.921v.889h-3.069v-4.594h1.034v3.705h2.035z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M17.401 17.216H18.435V21.810000000000002H17.401z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M22.579 21.81a23.197 23.197 0 00-.962-1.558 15.615 15.615 0 00-1.1-1.452v3.01h-1.021v-4.594h.842c.146.146.307.325.484.537.177.212.357.438.54.679.183.241.366.491.547.749.181.259.351.507.51.746v-2.711h1.028v4.594h-.868zM24.508 21.81v-4.594h3.102v.868h-2.068v.902h1.836v.848h-1.836v1.107h2.22v.869h-3.254z"
  })),
  topLogoTitleTag: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M24.55 5.112a.463.463 0 100-.925.463.463 0 000 .925M25.78 4.223a.536.536 0 10-.001-1.071.536.536 0 00.001 1.071M26.474 12.691h-2.952a.41.41 0 01-.337-.642l1.51-2.186a.41.41 0 01.679.007l1.442 2.186a.41.41 0 01-.342.635m1.797-.562l-2.099-3.466V6.726h.051a.55.55 0 100-1.099h-2.446a.55.55 0 100 1.099h.051v1.937l-2.099 3.466a1.11 1.11 0 00.994 1.606h4.554a1.11 1.11 0 00.994-1.606"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M30.874.274l.064.003.063.004.063.005.063.007.062.009.061.01.061.012.061.013.06.015.059.016.059.017.058.019.058.021.057.021.056.023.055.024.055.026.054.027.053.028.053.029.052.031.051.032.05.033.049.034.048.035.048.037.046.037.046.039.045.04.043.04.043.042.042.043.041.044.039.044.039.046.038.046.036.048.035.048.034.05.033.05.032.051.031.051.029.053.028.053.027.054.026.055.024.056.023.056.022.057.02.057.019.058.017.059.016.059.015.06.013.061.012.061.01.061.009.062.007.063.006.063.004.063.002.064.001.064v11.62l-.001.064-.002.064-.004.064-.006.063-.007.062-.009.062-.01.062-.012.061-.013.06-.015.06-.016.06-.017.058-.019.058-.02.058-.022.057-.023.056-.024.056-.026.054-.027.054-.028.054-.029.052-.031.052-.032.051-.033.05-.034.049-.035.049-.036.047-.038.047-.039.045-.039.045-.041.044-.042.043-.043.041-.043.041-.045.04-.046.038-.046.038-.048.036-.048.036-.049.034-.05.033-.051.031-.052.031-.053.029-.053.029-.054.026-.055.026-.055.024-.056.023-.057.022-.058.02-.058.019-.059.018-.059.016-.06.014-.061.014-.061.011-.061.01-.062.009-.063.007-.063.006-.063.004-.064.002-.064.001H19.19l-.064-.001-.064-.002-.063-.004-.063-.006-.063-.007-.062-.009-.061-.01-.061-.011-.061-.014-.06-.014-.059-.016-.059-.018-.058-.019-.058-.02-.057-.022-.056-.023-.055-.024-.055-.026-.054-.026-.053-.029-.053-.029-.052-.031-.051-.031-.05-.033-.049-.034-.048-.036-.048-.036-.046-.038-.046-.038-.045-.04-.043-.041-.043-.041-.042-.043-.041-.044-.039-.045-.039-.045-.038-.047-.036-.047-.035-.049-.034-.049-.033-.05-.032-.051-.031-.052-.029-.052-.028-.054-.027-.054-.026-.054-.024-.056-.023-.056-.022-.057-.02-.058-.019-.058-.017-.058-.016-.06-.015-.06-.013-.06-.012-.061-.01-.062-.009-.062-.007-.062-.006-.063-.004-.064-.002-.064-.001-.064V2.763l.001-.064.002-.064.004-.063.006-.063.007-.063.009-.062.01-.061.012-.061.013-.061.015-.06.016-.059.017-.059.019-.058.02-.057.022-.057.023-.056.024-.056.026-.055.027-.054.028-.053.029-.053.031-.051.032-.051.033-.05.034-.05.035-.048.036-.048.038-.046.039-.046.039-.044.041-.044.042-.043.043-.042.043-.04.045-.04.046-.039.046-.037.048-.037.048-.035.049-.034.05-.033.051-.032.052-.031.053-.029.053-.028.054-.027.055-.026.055-.024.056-.023.057-.021.058-.021.058-.019.059-.017.059-.016.06-.015.061-.013.061-.012.061-.01.062-.009.063-.007.063-.005.063-.004.064-.003.064-.001h11.62l.064.001zM19.2 1.773l-.036.001-.026.001-.025.001-.026.003-.024.003-.025.003-.024.004-.024.005-.024.005-.024.006-.023.006-.023.007-.023.007-.023.008-.022.009-.022.009-.022.009-.022.01-.021.011-.021.011-.021.012-.02.012-.021.013-.02.013-.019.013-.02.015-.019.014-.018.015-.019.016-.018.016-.017.016-.018.017-.016.017-.017.018-.016.017-.015.019-.015.019-.015.019-.014.019-.013.02-.014.02-.012.02-.012.02-.012.021-.011.021-.011.022-.01.021-.01.022-.009.022-.008.023-.008.022-.008.023-.006.023-.007.023-.005.024-.006.024-.004.024-.004.024-.004.025-.003.025-.002.025-.001.025-.001.026-.001.036v11.601l.001.035.001.026.001.026.002.025.003.025.004.024.004.025.004.024.006.024.005.023.007.023.006.023.008.023.008.023.008.022.009.022.01.022.01.022.011.021.011.021.012.021.012.021.012.02.014.02.013.02.014.019.015.019.015.019.015.018.016.018.017.018.016.017.018.017.017.016.018.016.019.015.018.015.019.015.02.014.019.014.02.013.021.013.02.012.021.011.021.012.021.01.022.01.022.01.022.009.022.008.023.008.023.008.023.007.023.006.024.006.024.005.024.005.024.004.025.003.024.003.026.002.025.002.026.001H30.836l.026-.001.025-.002.026-.002.024-.003.025-.003.024-.004.024-.005.024-.005.024-.006.023-.006.023-.007.023-.008.023-.008.022-.008.022-.009.022-.01.022-.01.021-.01.021-.012.021-.011.02-.012.021-.013.02-.013.019-.014.02-.014.019-.015.018-.015.019-.015.018-.016.017-.016.018-.017.016-.017.017-.018.016-.018.015-.018.015-.019.015-.019.014-.019.013-.02.014-.02.012-.02.012-.021.012-.021.011-.021.011-.021.01-.022.01-.022.009-.022.008-.022.008-.023.008-.023.006-.023.007-.023.005-.023.006-.024.004-.024.004-.025.004-.024.003-.025.002-.025.001-.026.001-.026.001-.035V2.773l-.001-.036-.001-.026-.001-.025-.002-.025-.003-.025-.004-.025-.004-.024-.004-.024-.006-.024-.005-.023-.007-.024-.006-.023-.008-.023-.008-.022-.008-.023-.009-.022-.01-.022-.01-.021-.011-.022-.011-.021-.012-.021-.012-.02-.012-.02-.014-.02-.013-.02-.014-.019-.015-.019-.015-.019-.015-.019-.016-.017-.017-.018-.016-.017-.018-.017-.017-.016-.018-.016-.019-.016-.018-.015-.019-.014-.02-.015-.019-.013-.02-.013-.021-.013-.02-.012-.021-.012-.021-.011-.021-.011-.022-.01-.022-.009-.022-.009-.022-.009-.023-.008-.023-.007-.023-.007-.023-.006-.024-.006-.024-.005-.024-.005-.024-.004-.025-.003-.024-.003-.026-.003-.025-.001-.026-.001-.036-.001H19.2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18.613 18.217v1.125h-1.768v4.738h-1.32v-4.738h-1.768v-1.125h4.856z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M19.459 18.217H20.779V24.08H19.459z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M26.48 18.217v1.125h-1.768v4.738h-1.319v-4.738h-1.768v-1.125h4.855zM31.243 22.946v1.134h-3.917v-5.863h1.32v4.729h2.597zM32.089 24.08v-5.863h3.96v1.108h-2.64v1.151h2.343v1.083h-2.343v1.413h2.834v1.108h-4.154z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M16.893 25.725v.726h-1.142v3.059h-.852v-3.059h-1.141v-.726h3.135zM19.526 29.51a9.526 9.526 0 00-.134-.404c-.049-.139-.098-.277-.145-.415h-1.475l-.144.415c-.05.138-.094.273-.134.404h-.885c.142-.408.277-.785.404-1.131a40.258 40.258 0 01.735-1.849c.118-.275.241-.543.368-.805h.814a28.892 28.892 0 01.729 1.677c.122.305.247.631.375.977.127.346.262.723.404 1.131h-.912zm-1.022-2.928a4.547 4.547 0 01-.082.224l-.125.328a36.184 36.184 0 00-.328.879h1.076c-.058-.164-.115-.32-.169-.469-.055-.15-.107-.286-.156-.41a26.237 26.237 0 01-.128-.328 28.526 28.526 0 00-.088-.224zM22.639 26.38c-.397 0-.684.11-.86.331-.177.22-.265.521-.265.904 0 .185.022.354.065.505.044.151.11.281.197.39.087.11.197.194.328.254s.284.09.459.09c.094 0 .175-.001.243-.005.067-.004.126-.011.177-.022v-1.316h.852v1.873c-.102.04-.266.083-.491.129a4.369 4.369 0 01-.836.068 2.18 2.18 0 01-.773-.131 1.623 1.623 0 01-.593-.383 1.71 1.71 0 01-.379-.617 2.426 2.426 0 01-.134-.835c0-.317.049-.598.147-.842.099-.244.234-.45.405-.62.171-.169.372-.297.603-.385.231-.087.478-.131.74-.131a2.957 2.957 0 01.855.118 1.804 1.804 0 01.402.172l-.246.683a2.274 2.274 0 00-.402-.162 1.725 1.725 0 00-.494-.068zM27.156 28.778v.732h-2.529v-3.785h.852v3.053h1.677z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M27.702 25.725H28.554000000000002V29.51H27.702z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M31.968 29.51a19.313 19.313 0 00-.792-1.284 13.158 13.158 0 00-.906-1.196v2.48h-.842v-3.785h.694c.12.12.253.267.399.442.146.175.294.361.445.56.151.198.301.404.451.617.149.213.289.418.42.615v-2.234h.847v3.785h-.716zM33.558 29.51v-3.785h2.556v.715H34.41v.743h1.513v.699H34.41v.912h1.83v.716h-2.682z"
  })),
  topLogoTitle: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M24.455 6.271a.561.561 0 100-1.123.561.561 0 000 1.123M25.946 5.193a.648.648 0 10-.001-1.295.648.648 0 00.001 1.295M26.787 15.456h-3.579a.496.496 0 01-.408-.778l1.83-2.65a.497.497 0 01.823.009l1.748 2.649a.496.496 0 01-.414.77m2.178-.681l-2.544-4.201V8.227h.062a.666.666 0 100-1.333h-2.966a.667.667 0 000 1.333h.062v2.347l-2.543 4.201a1.347 1.347 0 001.205 1.947h5.518c1 0 1.651-1.052 1.206-1.947"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M32.119.407l.078.003.077.005.076.007.076.009.075.01.074.012.074.015.074.016.072.017.072.02.071.021.071.023.07.024.069.027.068.028.067.029.066.031.066.033.064.034.064.035.063.037.062.039.06.04.06.041.059.043.057.044.057.046.055.047.054.048.053.049.052.051.051.051.049.053.048.055.047.055.045.056.044.058.043.059.042.059.04.061.038.062.037.062.036.064.034.065.032.065.032.067.029.067.028.068.026.069.025.07.022.07.022.071.019.072.018.073.016.073.014.074.012.075.011.075.009.076.006.076.005.077.003.077.001.078v14.083l-.001.078-.003.077-.005.077-.006.076-.009.076-.011.075-.012.075-.014.074-.016.073-.018.073-.019.072-.022.071-.022.07-.025.07-.026.069-.028.068-.029.067-.032.067-.032.065-.034.065-.036.064-.037.062-.038.062-.04.061-.042.059-.043.059-.044.058-.045.056-.047.055-.048.055-.049.053-.051.051-.052.051-.053.049-.054.049-.055.046-.057.046-.057.044-.059.043-.06.041-.06.04-.062.039-.063.037-.064.035-.064.034-.066.033-.066.031-.067.029-.068.028-.069.027-.07.024-.071.023-.071.021-.072.02-.072.017-.074.016-.074.015-.074.012-.075.011-.076.008-.076.007-.077.005-.078.003-.078.001H17.959l-.078-.001-.078-.003-.077-.005-.076-.007-.076-.008-.075-.011-.074-.012-.074-.015-.074-.016-.072-.017-.072-.02-.071-.021-.071-.023-.07-.024-.069-.027-.068-.028-.067-.029-.066-.031-.066-.033-.064-.034-.064-.035-.063-.037-.062-.039-.06-.04-.06-.041-.059-.043-.057-.044-.057-.046-.055-.046-.054-.049-.053-.049-.052-.051-.051-.051-.049-.053-.048-.055-.047-.055-.045-.056-.044-.058-.043-.059-.042-.059-.04-.061-.038-.062-.037-.062-.036-.064-.034-.065-.032-.065-.032-.067-.029-.067-.028-.068-.026-.069-.025-.07-.022-.07-.022-.071-.019-.072-.018-.073-.016-.073-.014-.074-.012-.075-.011-.075-.009-.076-.006-.076-.005-.077-.003-.077-.001-.078V3.424l.001-.078.003-.077.005-.077.006-.076.009-.076.011-.075.012-.075.014-.074.016-.073.018-.073.019-.072.022-.071.022-.07.025-.07.026-.069.028-.068.029-.067.032-.067.032-.065.034-.065.036-.064.037-.062.038-.062.04-.061.042-.059.043-.059.044-.058.045-.056.047-.055.048-.055.049-.053.051-.051.052-.051.053-.049.054-.048.055-.047.057-.046.057-.044.059-.043.06-.041.06-.04.062-.039.063-.037.064-.035.064-.034.066-.033.066-.031.067-.029.068-.028.069-.027.07-.024.071-.023.071-.021.072-.02.072-.017.074-.016.074-.015.074-.012.075-.01.076-.009.076-.007.077-.005.078-.003.078-.001h14.082l.078.001zM17.968 1.906l-.049.001-.04.001-.039.003-.038.003-.038.005-.038.005-.037.006-.037.007-.037.008-.036.009-.036.01-.036.01-.035.012-.035.012-.034.013-.034.014-.034.015-.033.015-.033.017-.032.017-.032.018-.032.018-.031.02-.03.02-.03.021-.03.021-.029.023-.029.023-.028.023-.027.025-.027.025-.026.025-.026.027-.025.026-.024.028-.024.028-.023.028-.022.029-.022.03-.021.03-.02.031-.019.031-.019.031-.018.032-.017.033-.016.033-.016.033-.014.034-.014.034-.013.034-.013.035-.011.035-.011.035-.009.036-.009.037-.008.036-.007.037-.007.038-.005.037-.004.038-.004.039-.002.039-.002.039v14.163l.002.039.002.039.004.039.004.038.005.037.007.038.007.037.008.036.009.037.009.036.011.035.011.035.013.035.013.034.014.034.014.034.016.033.016.033.017.033.018.032.019.031.019.031.02.031.021.03.022.03.022.029.023.028.024.028.024.028.025.027.026.026.026.025.027.025.027.025.028.023.029.023.029.023.03.021.03.021.03.02.031.02.032.018.032.018.032.017.033.017.033.015.034.015.034.014.034.013.035.012.035.012.036.01.036.01.036.009.037.008.037.007.037.006.038.005.038.005.038.003.039.003.04.001.049.001h14.064l.049-.001.04-.001.039-.003.038-.003.038-.005.038-.005.037-.006.037-.007.037-.008.036-.009.036-.01.036-.01.035-.012.035-.012.034-.013.034-.014.034-.015.033-.015.033-.017.032-.017.032-.018.032-.018.031-.02.03-.02.03-.021.03-.021.029-.023.029-.023.028-.023.027-.025.027-.025.026-.025.026-.027.025-.026.024-.028.024-.028.023-.028.022-.029.022-.03.021-.03.02-.031.019-.031.019-.031.018-.032.017-.033.016-.033.016-.033.014-.034.014-.034.013-.034.013-.035.011-.035.011-.035.009-.036.009-.037.008-.036.007-.037.007-.038.005-.037.004-.038.004-.039.002-.039.002-.039V3.384l-.002-.039-.002-.039-.004-.039-.004-.038-.005-.037-.007-.038-.007-.037-.008-.036-.009-.037-.009-.036-.011-.035-.011-.035-.013-.035-.013-.034-.014-.034-.014-.034-.016-.033-.016-.033-.017-.033-.018-.032-.019-.031-.019-.031-.02-.031-.021-.03-.022-.029-.022-.03-.023-.028-.024-.028-.024-.028-.025-.026-.026-.027-.026-.025-.027-.025-.027-.025-.028-.023-.029-.023-.029-.023-.03-.021-.03-.021-.03-.02-.031-.02-.032-.018-.032-.018-.032-.017-.033-.017-.033-.015-.034-.015-.034-.014-.034-.013-.035-.012-.035-.012-.036-.01-.036-.01-.036-.009-.037-.008-.037-.007-.037-.006-.038-.005-.038-.005-.038-.003-.039-.003-.04-.001-.049-.001H17.968z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M17.248 22.408v1.366h-2.146v5.75h-1.601v-5.75h-2.146v-1.366h5.893z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18.275 22.408H19.877V29.523000000000003H18.275z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M26.797 22.408v1.366h-2.146v5.75h-1.602v-5.75h-2.146v-1.366h5.894zM32.577 28.148v1.376h-4.753v-7.116h1.601v5.74h3.152zM33.604 29.524v-7.116h4.805v1.345h-3.203v1.397h2.844v1.314h-2.844v1.715h3.439v1.345h-5.041z"
  })),
  topTitleLogo: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M24.455 15.239a.561.561 0 100-1.123.561.561 0 000 1.123M25.946 14.161a.648.648 0 10-.001-1.295.648.648 0 00.001 1.295M26.787 24.424h-3.579a.496.496 0 01-.408-.778l1.83-2.65a.497.497 0 01.823.009l1.748 2.649a.496.496 0 01-.414.77m2.178-.681l-2.544-4.201v-2.347h.062a.666.666 0 100-1.333h-2.966a.667.667 0 000 1.333h.062v2.347l-2.543 4.201a1.347 1.347 0 001.205 1.947h5.518c1 0 1.651-1.052 1.206-1.947"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M32.119 9.375l.078.003.077.005.076.007.076.009.075.01.074.012.074.015.074.016.072.017.072.02.071.021.071.023.07.024.069.027.068.028.067.029.066.031.066.033.064.034.064.035.063.037.062.039.06.04.06.041.059.043.057.044.057.046.055.047.054.048.053.049.052.051.051.051.049.053.048.055.047.055.045.056.044.058.043.059.042.059.04.061.038.062.037.062.036.064.034.065.032.065.032.067.029.067.028.068.026.069.025.07.022.07.022.071.019.072.018.073.016.073.014.074.012.075.011.075.009.076.006.076.005.077.003.077.001.078v14.083l-.001.078-.003.077-.005.077-.006.076-.009.076-.011.075-.012.075-.014.074-.016.073-.018.073-.019.072-.022.071-.022.07-.025.07-.026.069-.028.068-.029.067-.032.067-.032.065-.034.065-.036.064-.037.062-.038.062-.04.061-.042.059-.043.059-.044.058-.045.056-.047.055-.048.055-.049.053-.051.051-.052.051-.053.049-.054.049-.055.046-.057.046-.057.044-.059.043-.06.041-.06.04-.062.039-.063.037-.064.035-.064.034-.066.033-.066.031-.067.029-.068.028-.069.027-.07.024-.071.023-.071.021-.072.02-.072.017-.074.016-.074.015-.074.012-.075.011-.076.008-.076.007-.077.005-.078.003-.078.001H17.959l-.078-.001-.078-.003-.077-.005-.076-.007-.076-.008-.075-.011-.074-.012-.074-.015-.074-.016-.072-.017-.072-.02-.071-.021-.071-.023-.07-.024-.069-.027-.068-.028-.067-.029-.066-.031-.066-.033-.064-.034-.064-.035-.063-.037-.062-.039-.06-.04-.06-.041-.059-.043-.057-.044-.057-.046-.055-.046-.054-.049-.053-.049-.052-.051-.051-.051-.049-.053-.048-.055-.047-.055-.045-.056-.044-.058-.043-.059-.042-.059-.04-.061-.038-.062-.037-.062-.036-.064-.034-.065-.032-.065-.032-.067-.029-.067-.028-.068-.026-.069-.025-.07-.022-.07-.022-.071-.019-.072-.018-.073-.016-.073-.014-.074-.012-.075-.011-.075-.009-.076-.006-.076-.005-.077-.003-.077-.001-.078V12.392l.001-.078.003-.077.005-.077.006-.076.009-.076.011-.075.012-.075.014-.074.016-.073.018-.073.019-.072.022-.071.022-.07.025-.07.026-.069.028-.068.029-.067.032-.067.032-.065.034-.065.036-.064.037-.062.038-.062.04-.061.042-.059.043-.059.044-.058.045-.056.047-.055.048-.055.049-.053.051-.051.052-.051.053-.049.054-.048.055-.047.057-.046.057-.044.059-.043.06-.041.06-.04.062-.039.063-.037.064-.035.064-.034.066-.033.066-.031.067-.029.068-.028.069-.027.07-.024.071-.023.071-.021.072-.02.072-.017.074-.016.074-.015.074-.012.075-.01.076-.009.076-.007.077-.005.078-.003.078-.001h14.082l.078.001zm-14.151 1.499l-.049.001-.04.001-.039.003-.038.003-.038.005-.038.005-.037.006-.037.007-.037.008-.036.009-.036.01-.036.01-.035.012-.035.012-.034.013-.034.014-.034.015-.033.015-.033.017-.032.017-.032.018-.032.018-.031.02-.03.02-.03.021-.03.021-.029.023-.029.023-.028.023-.027.025-.027.025-.026.025-.026.027-.025.026-.024.028-.024.028-.023.028-.022.029-.022.03-.021.03-.02.031-.019.031-.019.031-.018.032-.017.033-.016.033-.016.033-.014.034-.014.034-.013.034-.013.035-.011.035-.011.035-.009.036-.009.037-.008.036-.007.037-.007.038-.005.037-.004.038-.004.039-.002.039-.002.039V26.515l.002.039.002.039.004.039.004.038.005.037.007.038.007.037.008.036.009.037.009.036.011.035.011.035.013.035.013.034.014.034.014.034.016.033.016.033.017.033.018.032.019.031.019.031.02.031.021.03.022.03.022.029.023.028.024.028.024.028.025.026.026.027.026.025.027.025.027.025.028.023.029.023.029.023.03.021.03.021.03.02.031.02.032.018.032.018.032.017.033.017.033.015.034.015.034.014.034.013.035.012.035.012.036.01.036.01.036.009.037.008.037.007.037.006.038.005.038.005.038.003.039.003.04.001.049.001h14.064l.049-.001.04-.001.039-.003.038-.003.038-.005.038-.005.037-.006.037-.007.037-.008.036-.009.036-.01.036-.01.035-.012.035-.012.034-.013.034-.014.034-.015.033-.015.033-.017.032-.017.032-.018.032-.018.031-.02.03-.02.03-.021.03-.021.029-.023.029-.023.028-.023.027-.025.027-.025.026-.025.026-.027.025-.026.024-.028.024-.028.023-.028.022-.029.022-.03.021-.03.02-.031.019-.031.019-.031.018-.032.017-.033.016-.033.016-.033.014-.034.014-.034.013-.034.013-.035.011-.035.011-.035.009-.036.009-.037.008-.036.007-.037.007-.038.005-.037.004-.038.004-.039.002-.039.002-.039V12.352l-.002-.039-.002-.039-.004-.039-.004-.038-.005-.037-.007-.038-.007-.037-.008-.036-.009-.037-.009-.036-.011-.035-.011-.035-.013-.035-.013-.034-.014-.034-.014-.034-.016-.033-.016-.033-.017-.033-.018-.032-.019-.031-.019-.031-.02-.031-.021-.03-.022-.03-.022-.029-.023-.028-.024-.028-.024-.028-.025-.026-.026-.027-.026-.025-.027-.025-.027-.025-.028-.023-.029-.023-.029-.023-.03-.021-.03-.021-.03-.02-.031-.02-.032-.018-.032-.018-.032-.017-.033-.017-.033-.015-.034-.015-.034-.014-.034-.013-.035-.012-.035-.012-.036-.01-.036-.01-.036-.009-.037-.008-.037-.007-.037-.006-.038-.005-.038-.005-.038-.003-.039-.003-.04-.001-.049-.001H17.968z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M17.248.447v1.365h-2.146v5.75h-1.601v-5.75h-2.146V.447h5.893z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18.275 0.447H19.877V7.562H18.275z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M26.797.447v1.365h-2.146v5.75h-1.602v-5.75h-2.146V.447h5.894zM32.577 6.186v1.376h-4.753V.447h1.601v5.739h3.152zM33.604 7.562V.447h4.805v1.345h-3.203v1.396h2.844v1.314h-2.844v1.715h3.439v1.345h-5.041z"
  })),
  topTitleTagLogo: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M24.55 18.025a.463.463 0 100-.925.463.463 0 000 .925M25.78 17.135a.535.535 0 100-1.07.535.535 0 000 1.07M26.474 25.604h-2.952a.41.41 0 01-.337-.643l1.51-2.186a.41.41 0 01.679.008l1.442 2.185a.41.41 0 01-.342.636m1.797-.562l-2.099-3.467v-1.936h.051a.55.55 0 100-1.1h-2.446a.55.55 0 100 1.1h.051v1.936l-2.099 3.467a1.11 1.11 0 00.994 1.606h4.554a1.11 1.11 0 00.994-1.606"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M30.874 13.187l.064.002.063.004.063.006.063.007.062.009.061.01.061.012.061.013.06.014.059.017.059.017.058.019.058.02.057.022.056.023.055.024.055.026.054.027.053.028.053.029.052.031.051.032.05.033.049.034.048.035.048.036.046.038.046.039.045.039.043.041.043.042.042.042.041.044.039.045.039.046.038.046.036.048.035.048.034.049.033.05.032.051.031.052.029.053.028.053.027.054.026.055.024.055.023.056.022.057.02.058.019.058.017.059.016.059.015.06.013.06.012.061.01.062.009.062.007.063.006.063.004.063.002.064.001.064v11.62l-.001.064-.002.064-.004.063-.006.063-.007.063-.009.062-.01.061-.012.061-.013.061-.015.06-.016.059-.017.059-.019.058-.02.058-.022.056-.023.057-.024.055-.026.055-.027.054-.028.053-.029.053-.031.052-.032.05-.033.051-.034.049-.035.048-.036.048-.038.046-.039.046-.039.045-.041.043-.042.043-.043.042-.043.041-.045.039-.046.039-.046.037-.048.037-.048.035-.049.034-.05.033-.051.032-.052.031-.053.029-.053.028-.054.027-.055.026-.055.024-.056.023-.057.022-.058.02-.058.019-.059.017-.059.016-.06.015-.061.013-.061.012-.061.01-.062.009-.063.007-.063.006-.063.004-.064.002-.064.001H19.19l-.064-.001-.064-.002-.063-.004-.063-.006-.063-.007-.062-.009-.061-.01-.061-.012-.061-.013-.06-.015-.059-.016-.059-.017-.058-.019-.058-.02-.057-.022-.056-.023-.055-.024-.055-.026-.054-.027-.053-.028-.053-.029-.052-.031-.051-.032-.05-.033-.049-.034-.048-.035-.048-.037-.046-.037-.046-.039-.045-.039-.043-.041-.043-.042-.042-.043-.041-.043-.039-.045-.039-.046-.038-.046-.036-.048-.035-.048-.034-.049-.033-.051-.032-.05-.031-.052-.029-.053-.028-.053-.027-.054-.026-.055-.024-.055-.023-.057-.022-.056-.02-.058-.019-.058-.017-.059-.016-.059-.015-.06-.013-.061-.012-.061-.01-.061-.009-.062-.007-.063-.006-.063-.004-.063-.002-.064-.001-.064v-11.62l.001-.064.002-.064.004-.063.006-.063.007-.063.009-.062.01-.062.012-.061.013-.06.015-.06.016-.059.017-.059.019-.058.02-.058.022-.057.023-.056.024-.055.026-.055.027-.054.028-.053.029-.053.031-.052.032-.051.033-.05.034-.049.035-.048.036-.048.038-.046.039-.046.039-.045.041-.044.042-.042.043-.042.043-.041.045-.039.046-.039.046-.038.048-.036.048-.035.049-.034.05-.033.051-.032.052-.031.053-.029.053-.028.054-.027.055-.026.055-.024.056-.023.057-.022.058-.02.058-.019.059-.017.059-.017.06-.014.061-.013.061-.012.061-.01.062-.009.063-.007.063-.006.063-.004.064-.002.064-.001h11.62l.064.001zM19.2 14.686h-.036l-.026.001-.025.002-.026.002-.024.003-.025.004-.024.004-.024.004-.024.005-.024.006-.023.007-.023.006-.023.008-.023.008-.022.008-.022.009-.022.01-.022.01-.021.011-.021.011-.021.011-.02.013-.021.012-.02.013-.019.014-.02.014-.019.015-.018.015-.019.015-.018.016-.017.017-.018.016-.016.018-.017.017-.016.018-.015.018-.015.019-.015.019-.014.02-.014.019-.013.02-.012.02-.012.021-.012.021-.011.021-.011.021-.01.022-.01.022-.009.022-.008.022-.008.023-.008.023-.006.023-.007.023-.005.024-.006.023-.004.025-.004.024-.004.024-.003.025-.002.025-.001.026-.001.026-.001.035v11.601l.001.036.001.026.001.025.002.026.003.024.004.025.004.024.004.024.006.024.005.024.007.023.006.023.008.023.008.022.008.023.009.022.01.022.01.021.011.022.011.021.012.021.012.02.012.021.013.02.014.019.014.02.015.019.015.018.015.019.016.018.017.017.016.017.018.017.017.017.018.016.019.015.018.015.019.015.02.014.019.013.02.014.021.012.02.012.021.012.021.011.021.011.022.01.022.01.022.009.022.008.023.008.023.007.023.007.023.007.024.005.024.006.024.004.024.004.025.004.024.003.026.002.025.001.026.001.036.001h11.6l.036-.001.026-.001.025-.001.026-.002.024-.003.025-.004.024-.004.024-.004.024-.006.024-.005.023-.007.023-.007.023-.007.023-.008.022-.008.022-.009.022-.01.022-.01.021-.011.021-.011.021-.012.02-.012.021-.012.02-.014.019-.013.02-.014.019-.015.018-.015.019-.015.018-.016.017-.017.018-.017.016-.017.017-.017.016-.018.015-.019.015-.018.015-.019.014-.02.014-.019.013-.02.012-.021.012-.02.012-.021.011-.021.011-.022.01-.021.01-.022.009-.022.008-.023.008-.022.008-.023.006-.023.007-.023.005-.024.006-.024.004-.024.004-.024.004-.025.003-.024.002-.026.001-.025.001-.026.001-.036V15.685l-.001-.035-.001-.026-.001-.026-.002-.025-.003-.025-.004-.024-.004-.024-.004-.025-.006-.023-.005-.024-.007-.023-.006-.023-.008-.023-.008-.023-.008-.022-.009-.022-.01-.022-.01-.022-.011-.021-.011-.021-.012-.021-.012-.021-.012-.02-.013-.02-.014-.019-.014-.02-.015-.019-.015-.019-.015-.018-.016-.018-.017-.017-.016-.018-.018-.016-.017-.017-.018-.016-.019-.015-.018-.015-.019-.015-.02-.014-.019-.014-.02-.013-.021-.012-.02-.013-.021-.011-.021-.011-.021-.011-.022-.01-.022-.01-.022-.009-.022-.008-.023-.008-.023-.008-.023-.006-.023-.007-.024-.006-.024-.005-.024-.004-.024-.004-.025-.004-.024-.003-.026-.002-.025-.002-.026-.001H19.2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18.613.297v1.125h-1.768v4.737h-1.32V1.422h-1.768V.297h4.856z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M19.459 0.297H20.779V6.16H19.459z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M26.48.297v1.125h-1.768v4.737h-1.319V1.422h-1.768V.297h4.855zM31.243 5.026v1.133h-3.917V.297h1.32v4.729h2.597zM32.089 6.159V.297h3.96v1.108h-2.64v1.15h2.343v1.083h-2.343v1.413h2.834v1.108h-4.154z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M16.893 7.804v.726h-1.142v3.059h-.852V8.53h-1.141v-.726h3.135zM19.526 11.589a9.526 9.526 0 00-.134-.404 34.118 34.118 0 01-.145-.415h-1.475c-.047.138-.095.277-.144.415-.05.138-.094.273-.134.404h-.885c.142-.408.277-.784.404-1.13.128-.346.252-.672.374-.978.122-.306.242-.596.361-.871.118-.275.241-.544.368-.806h.814a28.966 28.966 0 01.729 1.677c.122.306.247.632.375.978.127.346.262.722.404 1.13h-.912zm-1.022-2.927a4.96 4.96 0 01-.082.224l-.125.327a45.295 45.295 0 00-.328.88h1.076l-.169-.47a19.504 19.504 0 00-.156-.41 34.949 34.949 0 01-.128-.327l-.088-.224zM22.639 8.459c-.397 0-.684.111-.86.331-.177.22-.265.522-.265.904 0 .186.022.354.065.505.044.151.11.281.197.391a.886.886 0 00.328.254c.131.06.284.09.459.09.094 0 .175-.002.243-.006.067-.003.126-.011.177-.021V9.59h.852v1.874a3.3 3.3 0 01-.491.128 4.29 4.29 0 01-.836.068c-.284 0-.542-.043-.773-.131a1.621 1.621 0 01-.593-.382 1.718 1.718 0 01-.379-.617 2.432 2.432 0 01-.134-.836c0-.317.049-.597.147-.841.099-.244.234-.451.405-.62.171-.17.372-.298.603-.385.231-.088.478-.131.74-.131a2.963 2.963 0 01.855.117 1.681 1.681 0 01.402.172l-.246.683a2.2 2.2 0 00-.402-.161 1.69 1.69 0 00-.494-.069zM27.156 10.857v.732h-2.529V7.804h.852v3.053h1.677z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M27.702 7.804H28.554000000000002V11.589H27.702z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M31.968 11.589a19.04 19.04 0 00-.792-1.283 13.173 13.173 0 00-.906-1.197v2.48h-.842V7.804h.694c.12.12.253.268.399.442.146.175.294.362.445.56.151.199.301.405.451.618.149.213.289.417.42.614V7.804h.847v3.785h-.716zM33.558 11.589V7.804h2.556v.716H34.41v.742h1.513v.7H34.41v.912h1.83v.715h-2.682z"
  })),
  topTitleLogoTag: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 50 30"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M24.55 12.52a.463.463 0 100-.925.463.463 0 000 .925M25.78 11.63a.535.535 0 100-1.07.535.535 0 000 1.07M26.474 20.099h-2.952a.41.41 0 01-.337-.643l1.51-2.185a.41.41 0 01.679.007l1.442 2.186a.41.41 0 01-.342.635m1.797-.562l-2.099-3.467v-1.936h.051a.55.55 0 100-1.1h-2.446a.55.55 0 000 1.1h.051v1.936l-2.099 3.467a1.11 1.11 0 00.994 1.606h4.554a1.11 1.11 0 00.994-1.606"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M30.874 7.682l.064.002.063.004.063.006.063.007.062.009.061.01.061.012.061.013.06.015.059.016.059.017.058.019.058.02.057.022.056.023.055.024.055.026.054.027.053.028.053.029.052.031.051.032.05.033.049.034.048.035.048.037.046.037.046.039.045.039.043.041.043.042.042.043.041.043.039.045.039.046.038.046.036.048.035.048.034.049.033.051.032.05.031.052.029.053.028.053.027.054.026.055.024.055.023.057.022.056.02.058.019.058.017.059.016.059.015.06.013.061.012.061.01.061.009.062.007.063.006.063.004.063.002.064.001.064v11.62l-.001.064-.002.064-.004.063-.006.063-.007.063-.009.062-.01.062-.012.061-.013.06-.015.06-.016.059-.017.059-.019.058-.02.058-.022.057-.023.056-.024.055-.026.055-.027.054-.028.053-.029.053-.031.052-.032.051-.033.05-.034.049-.035.048-.036.048-.038.046-.039.046-.039.045-.041.044-.042.042-.043.042-.043.041-.045.039-.046.039-.046.038-.048.036-.048.035-.049.034-.05.033-.051.032-.052.031-.053.029-.053.028-.054.027-.055.026-.055.024-.056.023-.057.022-.058.02-.058.019-.059.017-.059.017-.06.014-.061.013-.061.012-.061.01-.062.009-.063.007-.063.006-.063.004-.064.002-.064.001H19.19l-.064-.001-.064-.002-.063-.004-.063-.006-.063-.007-.062-.009-.061-.01-.061-.012-.061-.013-.06-.014-.059-.017-.059-.017-.058-.019-.058-.02-.057-.022-.056-.023-.055-.024-.055-.026-.054-.027-.053-.028-.053-.029-.052-.031-.051-.032-.05-.033-.049-.034-.048-.035-.048-.036-.046-.038-.046-.039-.045-.039-.043-.041-.043-.042-.042-.042-.041-.044-.039-.045-.039-.046-.038-.046-.036-.048-.035-.048-.034-.049-.033-.05-.032-.051-.031-.052-.029-.053-.028-.053-.027-.054-.026-.055-.024-.055-.023-.056-.022-.057-.02-.058-.019-.058-.017-.059-.016-.059-.015-.06-.013-.06-.012-.061-.01-.062-.009-.062-.007-.063-.006-.063-.004-.063-.002-.064-.001-.064v-11.62l.001-.064.002-.064.004-.063.006-.063.007-.063.009-.062.01-.061.012-.061.013-.061.015-.06.016-.059.017-.059.019-.058.02-.058.022-.056.023-.057.024-.055.026-.055.027-.054.028-.053.029-.053.031-.052.032-.05.033-.051.034-.049.035-.048.036-.048.038-.046.039-.046.039-.045.041-.043.042-.043.043-.042.043-.041.045-.039.046-.039.046-.037.048-.037.048-.035.049-.034.05-.033.051-.032.052-.031.053-.029.053-.028.054-.027.055-.026.055-.024.056-.023.057-.022.058-.02.058-.019.059-.017.059-.016.06-.015.061-.013.061-.012.061-.01.062-.009.063-.007.063-.006.063-.004.064-.002.064-.001h11.62l.064.001zM19.2 9.181l-.036.001-.026.001-.025.001-.026.003-.024.002-.025.004-.024.004-.024.004-.024.006-.024.005-.023.007-.023.007-.023.007-.023.008-.022.008-.022.009-.022.01-.022.01-.021.011-.021.011-.021.012-.02.012-.021.012-.02.014-.019.013-.02.014-.019.015-.018.015-.019.016-.018.015-.017.017-.018.017-.016.017-.017.017-.016.018-.015.019-.015.018-.015.019-.014.02-.013.019-.014.02-.012.021-.012.02-.012.021-.011.021-.011.022-.01.021-.01.022-.009.022-.008.023-.008.022-.008.023-.006.023-.007.023-.005.024-.006.024-.004.024-.004.024-.004.025-.003.024-.002.026-.001.025-.001.026-.001.036v11.601l.001.035.001.026.001.026.002.025.003.025.004.024.004.024.004.025.006.023.005.024.007.023.006.023.008.023.008.023.008.022.009.022.01.022.01.022.011.021.011.021.012.021.012.021.012.02.014.02.013.019.014.02.015.019.015.019.015.018.016.018.017.017.016.018.018.016.017.017.018.016.019.015.018.015.019.015.02.014.019.014.02.013.021.012.02.013.021.011.021.011.021.011.022.01.022.01.022.009.022.008.023.008.023.008.023.006.023.007.024.006.024.005.024.004.024.004.025.004.024.003.026.002.025.002.026.001H30.836l.026-.001.025-.002.026-.002.024-.003.025-.004.024-.004.024-.004.024-.005.024-.006.023-.007.023-.006.023-.008.023-.008.022-.008.022-.009.022-.01.022-.01.021-.011.021-.011.021-.011.02-.013.021-.012.02-.013.019-.014.02-.014.019-.015.018-.015.019-.015.018-.016.017-.017.018-.016.016-.018.017-.017.016-.018.015-.018.015-.019.015-.019.014-.02.013-.019.014-.02.012-.02.012-.021.012-.021.011-.021.011-.021.01-.022.01-.022.009-.022.008-.022.008-.023.008-.023.006-.023.007-.023.005-.024.006-.023.004-.025.004-.024.004-.024.003-.025.002-.025.001-.026.001-.026.001-.035V10.181l-.001-.036-.001-.026-.001-.025-.002-.026-.003-.024-.004-.025-.004-.024-.004-.024-.006-.024-.005-.024-.007-.023-.006-.023-.008-.023-.008-.022-.008-.023-.009-.022-.01-.022-.01-.021-.011-.022-.011-.021-.012-.021-.012-.02-.012-.021-.014-.02-.013-.019-.014-.02-.015-.019-.015-.018-.015-.019-.016-.018-.017-.017-.016-.017-.018-.017-.017-.017-.018-.015-.019-.016-.018-.015-.019-.015-.02-.014-.019-.013-.02-.014-.021-.012-.02-.012-.021-.012-.021-.011-.021-.011-.022-.01-.022-.01-.022-.009-.022-.008-.023-.008-.023-.007-.023-.007-.023-.007-.024-.005-.024-.006-.024-.004-.024-.004-.025-.004-.024-.002-.026-.003-.025-.001-.026-.001-.036-.001H19.2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18.613.297v1.125h-1.768v4.737h-1.32V1.422h-1.768V.297h4.856z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M19.459 0.297H20.779V6.16H19.459z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M26.48.297v1.125h-1.768v4.737h-1.319V1.422h-1.768V.297h4.855zM31.243 5.026v1.133h-3.917V.297h1.32v4.729h2.597zM32.089 6.159V.297h3.96v1.108h-2.64v1.15h2.343v1.083h-2.343v1.413h2.834v1.108h-4.154z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M16.893 25.935v.726h-1.142v3.059h-.852v-3.059h-1.141v-.726h3.135zM19.526 29.72a9.526 9.526 0 00-.134-.404c-.049-.139-.098-.277-.145-.416h-1.475a34.18 34.18 0 01-.144.416c-.05.138-.094.273-.134.404h-.885c.142-.408.277-.785.404-1.131a33.985 33.985 0 01.735-1.849c.118-.275.241-.543.368-.805h.814a28.892 28.892 0 01.729 1.676c.122.306.247.632.375.978.127.346.262.723.404 1.131h-.912zm-1.022-2.928a4.547 4.547 0 01-.082.224l-.125.328a44.432 44.432 0 00-.328.879h1.076l-.169-.47a19.3 19.3 0 00-.156-.409 26.237 26.237 0 01-.128-.328 28.526 28.526 0 00-.088-.224zM22.639 26.59c-.397 0-.684.11-.86.33-.177.221-.265.522-.265.904 0 .186.022.355.065.506.044.151.11.281.197.39a.886.886 0 00.328.254c.131.06.284.09.459.09.094 0 .175-.001.243-.005.067-.004.126-.011.177-.022v-1.316h.852v1.873c-.102.04-.266.083-.491.129a4.369 4.369 0 01-.836.068 2.18 2.18 0 01-.773-.131 1.623 1.623 0 01-.593-.383 1.71 1.71 0 01-.379-.617 2.428 2.428 0 01-.134-.836c0-.316.049-.597.147-.841.099-.244.234-.45.405-.62.171-.169.372-.297.603-.385.231-.087.478-.131.74-.131a2.957 2.957 0 01.855.118 1.69 1.69 0 01.402.172l-.246.682a2.353 2.353 0 00-.402-.161 1.725 1.725 0 00-.494-.068zM27.156 28.988v.732h-2.529v-3.785h.852v3.053h1.677z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M27.702 25.935H28.554000000000002V29.72H27.702z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M31.968 29.72a19.059 19.059 0 00-.792-1.284 13.158 13.158 0 00-.906-1.196v2.48h-.842v-3.785h.694c.12.12.253.267.399.442.146.175.294.361.445.56.151.198.301.404.451.617.149.213.289.418.42.615v-2.234h.847v3.785h-.716zM33.558 29.72v-3.785h2.556v.715H34.41v.743h1.513v.699H34.41v.912h1.83v.716h-2.682z"
  })),
  px: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2.896 6.603h1.419v.92h.027c.21-.394.504-.677.88-.848a2.926 2.926 0 011.223-.256c.534 0 1.001.094 1.399.283.399.188.73.447.993.775.263.329.46.712.591 1.15.132.438.197.907.197 1.407 0 .455-.059.898-.177 1.327a3.455 3.455 0 01-.539 1.137 2.699 2.699 0 01-.913.789c-.368.197-.802.295-1.302.295-.219 0-.438-.019-.657-.059a2.855 2.855 0 01-.631-.19 2.51 2.51 0 01-.558-.336 1.823 1.823 0 01-.427-.479h-.027v3.391H2.896V6.603zm5.231 3.404c0-.306-.039-.604-.118-.894a2.418 2.418 0 00-.355-.768 1.829 1.829 0 00-.592-.539 1.603 1.603 0 00-.814-.204c-.631 0-1.107.219-1.427.657-.319.438-.479 1.021-.479 1.748 0 .342.041.66.125.953.083.294.208.546.374.756.167.21.366.377.598.499.232.123.502.184.809.184.341 0 .63-.07.867-.21.237-.14.432-.322.585-.545a2.21 2.21 0 00.328-.763 3.86 3.86 0 00.099-.874zM12.714 9.823l-2.353-3.22h1.814l1.42 2.09 1.485-2.09h1.735l-2.313 3.141 2.602 3.654h-1.801l-1.721-2.51-1.67 2.51h-1.761l2.563-3.575z"
  }))),
  em: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6.248 9.402a2.401 2.401 0 00-.152-.683 1.704 1.704 0 00-.867-.967 1.56 1.56 0 00-.69-.151c-.263 0-.502.046-.716.138a1.633 1.633 0 00-.552.381 1.886 1.886 0 00-.368.572 2.002 2.002 0 00-.152.71h3.497zm-3.497.986c0 .263.038.517.112.762.075.245.186.46.335.644.149.184.338.331.565.44.228.11.5.165.815.165.438 0 .791-.095 1.058-.283.268-.188.467-.471.598-.848h1.42a2.824 2.824 0 01-1.104 1.716 2.99 2.99 0 01-.914.446c-.337.101-.69.152-1.058.152-.534 0-1.007-.088-1.419-.263a2.95 2.95 0 01-1.045-.736 3.12 3.12 0 01-.644-1.131 4.577 4.577 0 01-.217-1.445c0-.482.077-.94.23-1.374.153-.434.372-.815.657-1.143a3.13 3.13 0 011.032-.782c.403-.193.859-.29 1.367-.29a3.04 3.04 0 011.439.336c.425.223.778.519 1.058.887.281.368.484.791.611 1.268.127.478.16.971.099 1.479H2.751zM8.889 6.602h1.42v.947h.039c.114-.167.237-.32.368-.46a2.022 2.022 0 01.999-.585c.211-.057.451-.086.723-.086.412 0 .795.092 1.15.276.355.184.607.469.756.855a3.01 3.01 0 01.881-.828c.333-.202.749-.303 1.248-.303.719 0 1.277.176 1.676.526.399.351.598.938.598 1.761v4.693h-1.498v-3.97c0-.271-.009-.519-.027-.742a1.512 1.512 0 00-.151-.579.856.856 0 00-.374-.374c-.167-.088-.395-.132-.684-.132-.508 0-.876.158-1.104.473-.228.316-.342.763-.342 1.341v3.983h-1.498V9.034c0-.473-.085-.83-.256-1.071-.171-.241-.484-.362-.94-.362-.193 0-.379.04-.559.119a1.385 1.385 0 00-.473.341 1.703 1.703 0 00-.328.552 2.084 2.084 0 00-.125.75v4.035H8.889V6.602z"
  }))),
  percent: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fillRule: "nonzero",
    d: "M5.689 7.831c0 .246.017.476.053.69.035.215.092.401.17.559.079.158.182.283.309.375a.775.775 0 00.467.138.803.803 0 00.473-.138.978.978 0 00.315-.375 2.11 2.11 0 00.178-.559c.039-.214.059-.444.059-.69 0-.219-.015-.433-.046-.644a1.995 1.995 0 00-.164-.565 1.076 1.076 0 00-.316-.401.794.794 0 00-.499-.151.797.797 0 00-.5.151 1.02 1.02 0 00-.308.401 1.992 1.992 0 00-.152.565 5.253 5.253 0 00-.039.644zm1.012 2.616c-.394 0-.732-.07-1.012-.21a1.899 1.899 0 01-.684-.566 2.316 2.316 0 01-.381-.828 4.148 4.148 0 01-.118-1.012c0-.35.042-.685.125-1.005.083-.32.215-.598.394-.835.18-.236.408-.425.684-.565.276-.14.606-.21.992-.21s.716.07.992.21c.276.14.504.329.684.565.179.237.311.515.394.835.083.32.125.655.125 1.005 0 .36-.039.697-.118 1.012a2.3 2.3 0 01-.382.828 1.887 1.887 0 01-.683.566c-.28.14-.618.21-1.012.21zm5.586 1.722c0 .245.017.475.053.69.035.214.092.401.17.558.079.158.182.283.309.375a.775.775 0 00.467.138.803.803 0 00.473-.138.978.978 0 00.315-.375c.079-.157.138-.344.178-.558.039-.215.059-.445.059-.69 0-.219-.015-.434-.046-.644a1.992 1.992 0 00-.164-.566 1.065 1.065 0 00-.316-.4.795.795 0 00-.499-.152.798.798 0 00-.5.152 1.01 1.01 0 00-.308.4 1.99 1.99 0 00-.152.566c-.026.21-.039.425-.039.644zm1.012 2.615c-.394 0-.732-.07-1.012-.21a1.885 1.885 0 01-.683-.565 2.317 2.317 0 01-.382-.828 4.16 4.16 0 01-.118-1.012c0-.351.042-.686.125-1.006.083-.32.215-.598.394-.834.18-.237.408-.425.684-.566.276-.14.606-.21.992-.21s.716.07.992.21c.276.141.504.329.684.566.179.236.311.514.394.834.083.32.125.655.125 1.006 0 .359-.039.696-.118 1.012a2.332 2.332 0 01-.381.828 1.897 1.897 0 01-.684.565c-.28.14-.618.21-1.012.21zm-1.341-9.7h.999l-5.086 9.832H6.846l5.112-9.832z"
  })),
  rem: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M.731 7.079H1.94v1.13h.023c.038-.158.111-.313.22-.463.11-.151.241-.289.396-.413.154-.124.326-.224.514-.3.189-.075.381-.113.577-.113.151 0 .254.004.311.012l.175.022v1.244a5.951 5.951 0 00-.277-.04 2.393 2.393 0 00-.277-.017 1.424 1.424 0 00-1.119.514c-.143.17-.256.379-.339.628a2.712 2.712 0 00-.125.859v2.781H.731V7.079zM8.519 9.486a2.057 2.057 0 00-.13-.587 1.534 1.534 0 00-.294-.492 1.433 1.433 0 00-.452-.339 1.327 1.327 0 00-.593-.13c-.226 0-.432.039-.616.118-.185.08-.343.189-.475.328-.132.14-.238.304-.317.492a1.727 1.727 0 00-.13.61h3.007zm-3.007.848c0 .226.032.445.096.656.064.211.161.395.289.554.128.158.29.284.486.378.196.095.429.142.701.142.376 0 .68-.081.91-.243.229-.162.401-.405.514-.73h1.221a2.422 2.422 0 01-.95 1.476 2.597 2.597 0 01-.785.384c-.291.087-.594.13-.91.13-.46 0-.867-.075-1.221-.226a2.535 2.535 0 01-.899-.633 2.69 2.69 0 01-.554-.972 3.964 3.964 0 01-.186-1.244c0-.414.066-.808.198-1.181.131-.373.32-.701.565-.983.245-.283.54-.507.887-.673A2.692 2.692 0 017.05 6.92c.459 0 .872.096 1.237.289.366.192.669.446.91.763.242.316.417.68.526 1.09.109.411.138.835.085 1.272H5.512zM10.791 7.079h1.221v.813h.034c.098-.143.203-.275.317-.395a1.722 1.722 0 01.859-.503c.18-.049.388-.074.621-.074.355 0 .684.079.989.238.306.158.522.403.65.734.219-.301.471-.538.758-.712.286-.173.644-.26 1.074-.26.618 0 1.098.151 1.441.452.343.302.514.807.514 1.515v4.036h-1.288V9.509c0-.234-.008-.447-.023-.639a1.292 1.292 0 00-.13-.497.737.737 0 00-.322-.322c-.143-.076-.339-.113-.588-.113-.437 0-.754.135-.95.407-.195.271-.293.655-.293 1.153v3.425h-1.289V9.17c0-.407-.074-.714-.221-.921-.146-.208-.416-.311-.808-.311a1.192 1.192 0 00-.887.395 1.48 1.48 0 00-.283.475 1.815 1.815 0 00-.107.644v3.471h-1.289V7.079z"
  }))),
  vh: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3.271 6.603H4.9l1.722 5.218h.026l1.656-5.218h1.551l-2.431 6.795H5.742L3.271 6.603zM10.762 4.014h1.499v3.483h.026c.184-.307.458-.563.821-.769a2.425 2.425 0 011.216-.309c.745 0 1.332.193 1.761.578.43.386.644.964.644 1.735v4.666h-1.498V9.127c-.017-.535-.131-.923-.342-1.164-.21-.241-.538-.361-.985-.361-.254 0-.482.046-.684.138a1.484 1.484 0 00-.512.381c-.141.162-.25.353-.329.572a2.035 2.035 0 00-.118.696v4.009h-1.499V4.014z"
  }))),
  vw: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1.621 6.603h1.63l1.722 5.218h.026l1.656-5.218h1.551l-2.432 6.795H4.092L1.621 6.603zM8.495 6.603h1.59l1.328 5.073h.026l1.275-5.073h1.512l1.222 5.073h.026l1.38-5.073h1.525l-2.129 6.795h-1.538L13.45 8.351h-.026l-1.249 5.047h-1.577L8.495 6.603z"
  }))),
  none: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M17.401 4.69L15.31 2.599 2.599 15.31l2.091 2.091L17.401 4.69z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4.69 2.599L2.599 4.69 15.31 17.401l2.091-2.091L4.69 2.599z"
  })),
  solid: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18.988 11.478V8.522H1.012v2.956h17.976z"
  })),
  dashed: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M12.512 11.478V8.522H7.488v2.956h5.024zM14.004 8.522v2.956h4.984V8.522h-4.984zM1.012 8.522v2.956H6.05V8.522H1.012z"
  })),
  dotted: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    cx: "2.503",
    cy: "10",
    r: "1.487"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    cx: "17.486",
    cy: "10",
    r: "1.487"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    cx: "12.447",
    cy: "10",
    r: "1.487"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    cx: "7.455",
    cy: "10",
    r: "1.487"
  })),
  double: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1.02 6.561v2.957h17.968V6.561H1.02zM1.012 10.586v2.956H18.98v-2.956H1.012z"
  })),
  lowercase: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M9.1 13.181c0 .184.024.315.072.394.048.079.142.118.283.118h.157a.953.953 0 00.211-.026v1.038a3.222 3.222 0 01-.204.06 3.035 3.035 0 01-.743.111c-.306 0-.561-.061-.762-.184-.202-.122-.333-.337-.394-.644-.298.289-.664.5-1.098.631a4.303 4.303 0 01-1.255.197c-.307 0-.6-.041-.881-.125a2.302 2.302 0 01-.742-.368 1.764 1.764 0 01-.513-.617 1.904 1.904 0 01-.19-.874c0-.421.076-.763.23-1.026.153-.262.354-.468.604-.617.25-.149.53-.257.841-.322.311-.066.625-.116.94-.152.272-.052.53-.089.776-.111a3.6 3.6 0 00.65-.112c.189-.053.337-.134.447-.243.11-.11.164-.274.164-.493a.765.765 0 00-.138-.473.931.931 0 00-.341-.283 1.5 1.5 0 00-.454-.131 3.61 3.61 0 00-.473-.033c-.421 0-.767.088-1.038.263-.272.175-.425.447-.46.815H3.29c.027-.438.132-.802.316-1.091.184-.289.418-.522.703-.697.285-.175.607-.298.966-.368s.727-.105 1.104-.105c.333 0 .662.035.986.105.324.07.615.184.874.342.258.158.466.361.624.611.158.25.237.554.237.914v3.496zm-1.499-1.893a1.822 1.822 0 01-.841.27 10.7 10.7 0 00-.999.138 3.18 3.18 0 00-.46.111c-.149.048-.28.114-.394.197a.874.874 0 00-.27.329c-.065.136-.098.3-.098.493 0 .166.048.307.144.42.097.114.213.204.349.27.136.066.285.112.447.138.162.026.309.039.44.039.166 0 .346-.022.539-.065.193-.044.374-.119.545-.224.171-.105.314-.239.427-.401.114-.162.171-.361.171-.598v-1.117zM10.756 5.308h1.498v3.47h.026c.106-.167.233-.316.382-.447.149-.132.313-.243.492-.335a2.62 2.62 0 01.566-.211c.197-.048.392-.072.584-.072.535 0 1.002.094 1.4.283.399.188.73.446.993.775.262.329.46.712.591 1.15.132.438.197.907.197 1.406 0 .456-.059.899-.177 1.328a3.475 3.475 0 01-.539 1.137 2.713 2.713 0 01-.914.789c-.368.197-.801.295-1.301.295-.228 0-.458-.015-.69-.046a2.614 2.614 0 01-.664-.177c-.21-.088-.4-.202-.571-.342a1.645 1.645 0 01-.427-.552h-.027v.933h-1.419V5.308zm5.231 5.993c0-.306-.04-.604-.118-.894a2.44 2.44 0 00-.355-.768 1.818 1.818 0 00-.592-.539 1.604 1.604 0 00-.815-.204c-.631 0-1.106.219-1.426.657-.32.438-.479 1.021-.479 1.748 0 .342.041.66.124.953.084.294.209.546.375.756.166.21.366.377.598.499.232.123.502.184.808.184.342 0 .631-.07.868-.21.236-.14.431-.322.585-.545a2.21 2.21 0 00.328-.763 3.86 3.86 0 00.099-.874z"
  }))),
  uppercase: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4.789 5.308h1.748l3.614 9.384H8.39l-.881-2.484H3.763l-.88 2.484H1.187l3.602-9.384zm-.579 5.651h2.866L5.669 6.924H5.63l-1.42 4.035zM12.688 9.238h2.681c.394 0 .723-.112.986-.335.263-.224.394-.546.394-.967 0-.473-.118-.806-.355-.998-.236-.193-.578-.29-1.025-.29h-2.681v2.59zm-1.643-3.93h4.561c.841 0 1.516.193 2.024.578.508.386.762.968.762 1.748 0 .473-.116.879-.348 1.216-.232.337-.563.598-.993.782v.026c.579.123 1.017.397 1.315.822.298.425.447.957.447 1.597 0 .368-.066.712-.197 1.031a2.11 2.11 0 01-.618.828c-.281.233-.64.417-1.078.553-.438.135-.959.203-1.564.203h-4.311V5.308zm1.643 8.044h2.905c.499 0 .887-.13 1.163-.388.276-.259.414-.624.414-1.098 0-.464-.138-.821-.414-1.071-.276-.25-.664-.374-1.163-.374h-2.905v2.931z"
  }))),
  capitalize: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5.393 5.216h1.748l3.615 9.384H8.995l-.881-2.484H4.368L3.487 14.6H1.792l3.601-9.384zm-.578 5.651H7.68L6.274 6.832h-.04l-1.419 4.035zM11.479 5.216h1.498v3.47h.026c.105-.167.232-.316.381-.447a2.38 2.38 0 01.493-.335 2.62 2.62 0 01.566-.211c.197-.048.392-.072.584-.072.535 0 1.001.094 1.4.283.399.188.73.446.993.775.262.329.46.712.591 1.15.131.438.197.907.197 1.406 0 .456-.059.899-.177 1.328a3.475 3.475 0 01-.539 1.137 2.713 2.713 0 01-.914.789c-.368.197-.801.295-1.301.295-.228 0-.458-.015-.69-.046a2.614 2.614 0 01-.664-.177 2.278 2.278 0 01-.571-.342 1.66 1.66 0 01-.428-.552h-.026v.933h-1.419V5.216zm5.231 5.993c0-.306-.04-.604-.119-.894a2.416 2.416 0 00-.354-.768 1.818 1.818 0 00-.592-.539 1.604 1.604 0 00-.815-.204c-.631 0-1.106.219-1.426.657-.32.438-.48 1.021-.48 1.748 0 .342.042.66.125.953.084.294.208.546.375.756.166.21.366.377.598.499.232.123.502.184.808.184.342 0 .631-.07.868-.21.236-.14.431-.322.585-.545.153-.224.262-.478.328-.763a3.86 3.86 0 00.099-.874z"
  }))),
  menu: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3 13h18a1 1 0 000-2H3a1 1 0 000 2zm0-6h18a1 1 0 000-2H3a1 1 0 000 2zm0 12h18a1 1 0 000-2H3a1 1 0 000 2z"
  })),
  menu2: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M24 21v2c0 .547-.453 1-1 1H1c-.547 0-1-.453-1-1v-2c0-.547.453-1 1-1h22c.547 0 1 .453 1 1zm0-8v2c0 .547-.453 1-1 1H1c-.547 0-1-.453-1-1v-2c0-.547.453-1 1-1h22c.547 0 1 .453 1 1zm0-8v2c0 .547-.453 1-1 1H1c-.547 0-1-.453-1-1V5c0-.547.453-1 1-1h22c.547 0 1 .453 1 1z"
  })),
  menu3: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "16",
    height: "16",
    viewBox: "0 0 16 16"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6 3a2 2 0 113.999-.001A2 2 0 016 3zm0 5a2 2 0 113.999-.001A2 2 0 016 8zm0 5a2 2 0 113.999-.001A2 2 0 016 13z"
  })),
  unlocked: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5 12h14c.276 0 .525.111.707.293S20 12.724 20 13v7c0 .276-.111.525-.293.707S19.276 21 19 21H5c-.276 0-.525-.111-.707-.293S4 20.276 4 20v-7c0-.276.111-.525.293-.707S4.724 12 5 12zm3-2V7a3.988 3.988 0 011.169-2.831 3.983 3.983 0 012.821-1.174 3.985 3.985 0 012.652 1 4.052 4.052 0 011.28 2.209 1 1 0 101.958-.408 6.051 6.051 0 00-1.912-3.299A5.963 5.963 0 0011.995.995c-1.657.002-3.157.676-4.241 1.762S5.998 5.344 6 7v3H5a2.997 2.997 0 00-3 3v7a2.997 2.997 0 003 3h14a2.997 2.997 0 003-3v-7a2.997 2.997 0 00-3-3z"
  })),
  locked: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5 12h14c.276 0 .525.111.707.293S20 12.724 20 13v7c0 .276-.111.525-.293.707S19.276 21 19 21H5c-.276 0-.525-.111-.707-.293S4 20.276 4 20v-7c0-.276.111-.525.293-.707S4.724 12 5 12zm13-2V7c0-1.657-.673-3.158-1.757-4.243S13.657 1 12 1s-3.158.673-4.243 1.757S6 5.343 6 7v3H5a2.997 2.997 0 00-3 3v7a2.997 2.997 0 003 3h14a2.997 2.997 0 003-3v-7a2.997 2.997 0 00-3-3zM8 10V7c0-1.105.447-2.103 1.172-2.828S10.895 3 12 3s2.103.447 2.828 1.172S16 5.895 16 7v3z"
  })),
  fullwidth: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeMiterlimit: "1.5",
    clipRule: "evenodd",
    viewBox: "0 0 50 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M1.19 1.153H48.809999999999995V12.969000000000001H1.19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    fillRule: "nonzero",
    d: "M37.149 34.831H2.714c-.411 0-.749.433-.749.959s.338.959.749.959h34.435c.411 0 .749-.433.749-.959s-.338-.959-.749-.959zM47.038 30.979H2.924a.964.964 0 00-.959.959c0 .527.433.959.959.959h44.114a.963.963 0 00.959-.959.964.964 0 00-.959-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    fillRule: "nonzero",
    d: "M47.038 27.128H2.924a.964.964 0 00-.959.959c0 .526.433.959.959.959h44.114a.964.964 0 00.959-.959.964.964 0 00-.959-.959zM47.038 23.277H2.924a.964.964 0 00-.959.959c0 .526.433.959.959.959h44.114a.964.964 0 00.959-.959.964.964 0 00-.959-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    fillRule: "nonzero",
    d: "M47.038 19.426H2.924a.964.964 0 00-.959.959c0 .526.433.959.959.959h44.114a.964.964 0 00.959-.959.964.964 0 00-.959-.959zM47.038 15.575H2.924a.964.964 0 00-.959.959c0 .526.433.959.959.959h44.114a.964.964 0 00.959-.959.964.964 0 00-.959-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  })),
  normal: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeMiterlimit: "1.5",
    clipRule: "evenodd",
    viewBox: "0 0 50 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M7.49 3.877H42.521V13.879000000000001H7.49z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    fillRule: "nonzero",
    d: "M34.237 34.498H8.049c-.313 0-.57.41-.57.908 0 .497.257.907.57.907h26.188c.313 0 .57-.41.57-.907 0-.498-.257-.908-.57-.908zM41.776 30.855H8.226c-.4 0-.729.409-.729.907 0 .498.329.907.729.907h33.55c.399 0 .729-.409.729-.907 0-.498-.33-.907-.729-.907z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    fillRule: "nonzero",
    d: "M41.776 27.211H8.226c-.4 0-.729.41-.729.908 0 .497.329.907.729.907h33.55c.399 0 .729-.41.729-.907 0-.498-.33-.908-.729-.908zM41.776 23.568H8.226c-.4 0-.729.41-.729.907 0 .498.329.908.729.908h33.55c.399 0 .729-.41.729-.908 0-.497-.33-.907-.729-.907z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    fillRule: "nonzero",
    d: "M41.776 19.925H8.226c-.4 0-.729.409-.729.907 0 .498.329.907.729.907h33.55c.399 0 .729-.409.729-.907 0-.498-.33-.907-.729-.907zM41.776 16.281H8.226c-.4 0-.729.41-.729.907 0 .498.329.908.729.908h33.55c.399 0 .729-.41.729-.908 0-.497-.33-.907-.729-.907z"
  })),
  narrow: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeMiterlimit: "1.5",
    clipRule: "evenodd",
    viewBox: "0 0 50 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M12.511 3.877H37.497V13.879000000000001H12.511z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    fillRule: "nonzero",
    d: "M31.588 34.498H12.91c-.223 0-.407.41-.407.908 0 .497.184.907.407.907h18.678c.224 0 .407-.41.407-.907 0-.498-.183-.908-.407-.908zM36.965 30.855H13.036c-.285 0-.52.409-.52.907 0 .498.235.907.52.907h23.929c.285 0 .52-.409.52-.907 0-.498-.235-.907-.52-.907z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    fillRule: "nonzero",
    d: "M36.965 27.211H13.036c-.285 0-.52.41-.52.908 0 .497.235.907.52.907h23.929c.285 0 .52-.41.52-.907 0-.498-.235-.908-.52-.908zM36.965 23.568H13.036c-.285 0-.52.41-.52.907 0 .498.235.908.52.908h23.929c.285 0 .52-.41.52-.908 0-.497-.235-.907-.52-.907z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    fillRule: "nonzero",
    d: "M36.965 19.925H13.036c-.285 0-.52.409-.52.907 0 .498.235.907.52.907h23.929c.285 0 .52-.409.52-.907 0-.498-.235-.907-.52-.907zM36.965 16.281H13.036c-.285 0-.52.41-.52.907 0 .498.235.908.52.908h23.929c.285 0 .52-.41.52-.908 0-.497-.235-.907-.52-.907z"
  })),
  rightsidebar: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeMiterlimit: "1.5",
    clipRule: "evenodd",
    viewBox: "0 0 50 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M7.516 3.855H30.216V13.857000000000001H7.516z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M7.874 34.421h16.987c.202 0 .369.409.369.907 0 .498-.167.907-.369.907H7.874c-.202 0-.369-.409-.369-.907 0-.498.167-.907.369-.907zM7.98 30.777h21.76c.26 0 .473.41.473.908 0 .497-.213.907-.473.907H7.98c-.26 0-.473-.41-.473-.907 0-.498.213-.908.473-.908z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M7.98 27.134h21.76c.26 0 .473.41.473.907 0 .498-.213.907-.473.907H7.98c-.26 0-.473-.409-.473-.907 0-.497.213-.907.473-.907zM7.98 23.491h21.76c.26 0 .473.409.473.907 0 .498-.213.907-.473.907H7.98c-.26 0-.473-.409-.473-.907 0-.498.213-.907.473-.907z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M7.98 19.847h21.76c.26 0 .473.41.473.907 0 .498-.213.908-.473.908H7.98c-.26 0-.473-.41-.473-.908 0-.497.213-.907.473-.907zM7.98 16.204h21.76c.26 0 .473.409.473.907 0 .498-.213.907-.473.907H7.98c-.26 0-.473-.409-.473-.907 0-.498.213-.907.473-.907z"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#e5e5e5",
    d: "M32.602 3.892H42.492999999999995V36.143H32.602z"
  })),
  leftsidebar: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeMiterlimit: "1.5",
    clipRule: "evenodd",
    viewBox: "0 0 50 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M19.784 3.855H42.483999999999995V13.857000000000001H19.784z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M37.131 34.421H20.145c-.203 0-.37.409-.37.907 0 .498.167.907.37.907h16.986c.202 0 .369-.409.369-.907 0-.498-.167-.907-.369-.907zM42.02 30.777H20.26c-.26 0-.473.41-.473.908 0 .497.213.907.473.907h21.76c.26 0 .473-.41.473-.907 0-.498-.213-.908-.473-.908z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M42.02 27.134H20.26c-.26 0-.473.41-.473.907 0 .498.213.907.473.907h21.76c.26 0 .473-.409.473-.907 0-.497-.213-.907-.473-.907zM42.02 23.491H20.26c-.26 0-.473.409-.473.907 0 .498.213.907.473.907h21.76c.26 0 .473-.409.473-.907 0-.498-.213-.907-.473-.907z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M42.02 19.847H20.26c-.26 0-.473.41-.473.907 0 .498.213.908.473.908h21.76c.26 0 .473-.41.473-.908 0-.497-.213-.907-.473-.907zM42.02 16.204H20.26c-.26 0-.473.409-.473.907 0 .498.213.907.473.907h21.76c.26 0 .473-.409.473-.907 0-.498-.213-.907-.473-.907z"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#e5e5e5",
    d: "M7.507 3.892H17.398V36.143H7.507z"
  })),
  abovecontent: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeMiterlimit: "1.5",
    clipRule: "evenodd",
    viewBox: "0 0 50 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M1.19 1.153H48.809999999999995V12.969000000000001H1.19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M34.26 34.831H8.054c-.312 0-.569.433-.569.959s.257.959.569.959H34.26c.313 0 .57-.433.57-.959s-.257-.959-.57-.959zM41.785 30.979H8.215c-.401 0-.73.433-.73.959 0 .527.329.959.73.959h33.57c.401 0 .73-.432.73-.959 0-.526-.329-.959-.73-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M41.785 27.128H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959zM41.785 23.277H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M41.785 19.426H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959zM41.785 15.575H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959z"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    fillRule: "nonzero",
    d: "M38.103 6.869H11.897c-.312 0-.569.433-.569.959 0 .527.257.959.569.959h26.206c.312 0 .569-.432.569-.959 0-.526-.257-.959-.569-.959zM31.143 4.758H18.857c-.147 0-.267.269-.267.595 0 .327.12.595.267.595h12.286c.147 0 .267-.268.267-.595 0-.326-.12-.595-.267-.595z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  })),
  incontent: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeMiterlimit: "1.5",
    clipRule: "evenodd",
    viewBox: "0 0 50 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#fff",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    fillRule: "nonzero"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M34.26 32.335H8.054c-.312 0-.569.433-.569.959s.257.959.569.959H34.26c.313 0 .57-.433.57-.959s-.257-.959-.57-.959zM41.785 28.484H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#cdcdcd",
    d: "M41.785 24.632H8.215c-.401 0-.73.433-.73.959 0 .527.329.959.73.959h33.57c.401 0 .73-.432.73-.959 0-.526-.329-.959-.73-.959zM41.785 20.781H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#ccc",
    d: "M41.785 16.93H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959zM41.785 13.079H8.215c-.401 0-.73.433-.73.959s.329.959.73.959h33.57c.401 0 .73-.433.73-.959s-.329-.959-.73-.959z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#9a9a9a",
    d: "M34.26 7.888H8.054c-.312 0-.569.433-.569.959s.257.959.569.959H34.26c.313 0 .57-.433.57-.959s-.257-.959-.57-.959zM19.303 5.747H7.736c-.138 0-.251.265-.251.586 0 .321.113.586.251.586h11.567c.138 0 .252-.265.252-.586 0-.321-.114-.586-.252-.586z"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "none",
    stroke: "#9a9a9a",
    strokeWidth: "1",
    d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
  })),
  search: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "26",
    height: "28",
    viewBox: "0 0 26 28"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M18 13c0-3.859-3.141-7-7-7s-7 3.141-7 7 3.141 7 7 7 7-3.141 7-7zm8 13c0 1.094-.906 2-2 2a1.96 1.96 0 01-1.406-.594l-5.359-5.344a10.971 10.971 0 01-6.234 1.937c-6.078 0-11-4.922-11-11s4.922-11 11-11 11 4.922 11 11c0 2.219-.672 4.406-1.937 6.234l5.359 5.359c.359.359.578.875.578 1.406z"
  })),
  search2: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M16.041 15.856a.995.995 0 00-.186.186A6.97 6.97 0 0111 18c-1.933 0-3.682-.782-4.95-2.05S4 12.933 4 11s.782-3.682 2.05-4.95S9.067 4 11 4s3.682.782 4.95 2.05S18 9.067 18 11a6.971 6.971 0 01-1.959 4.856zm5.666 4.437l-3.675-3.675A8.967 8.967 0 0020 11c0-2.485-1.008-4.736-2.636-6.364S13.485 2 11 2 6.264 3.008 4.636 4.636 2 8.515 2 11s1.008 4.736 2.636 6.364S8.515 20 11 20a8.967 8.967 0 005.618-1.968l3.675 3.675a.999.999 0 101.414-1.414z"
  })),
  dot: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    cx: "10",
    cy: "10",
    r: "4.942"
  })),
  vline: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fillRule: "nonzero",
    d: "M9.022 1.068H10.977V18.931H9.022z"
  })),
  slash: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fillRule: "nonzero",
    d: "M6.115 18.935l5.804-17.87h1.966l-5.79 17.87h-1.98z"
  })),
  dash: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fillRule: "evenodd",
    strokeLinejoin: "round",
    strokeMiterlimit: "2",
    clipRule: "evenodd",
    viewBox: "0 0 20 20"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fillRule: "nonzero",
    d: "M3.851 8.065H16.148V11.934H3.851z"
  })),
  drag: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    width: "18",
    height: "18",
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 18 18"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M13,8c0.6,0,1-0.4,1-1s-0.4-1-1-1s-1,0.4-1,1S12.4,8,13,8z M5,6C4.4,6,4,6.4,4,7s0.4,1,1,1s1-0.4,1-1S5.6,6,5,6z M5,10\r c-0.6,0-1,0.4-1,1s0.4,1,1,1s1-0.4,1-1S5.6,10,5,10z M13,10c-0.6,0-1,0.4-1,1s0.4,1,1,1s1-0.4,1-1S13.6,10,13,10z M9,6\r C8.4,6,8,6.4,8,7s0.4,1,1,1s1-0.4,1-1S9.6,6,9,6z M9,10c-0.6,0-1,0.4-1,1s0.4,1,1,1s1-0.4,1-1S9.6,10,9,10z"
  }))
};
Icons.row = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "60.000",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.collapserow = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "60.000",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "16.000",
  width: "60.000",
  height: "14.000",
  fill: "#d5dadf"
}));
Icons.collapserowthree = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "60.000",
  height: "9.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "10.500",
  width: "60.000",
  height: "9.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "21.000",
  width: "60.000",
  height: "9.000",
  fill: "#d5dadf"
}));
Icons.collapserowfour = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "60.000",
  height: "6.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "8.000",
  width: "60.000",
  height: "6.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "16.000",
  width: "60.000",
  height: "6.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "24.000",
  width: "60.000",
  height: "6.000",
  fill: "#d5dadf"
}));
Icons.collapserowfive = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "60.000",
  height: "5.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "6.000",
  width: "60.000",
  height: "5.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "12.000",
  width: "60.000",
  height: "5.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "18.000",
  width: "60.000",
  height: "5.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "24.000",
  width: "60.000",
  height: "5.000",
  fill: "#d5dadf"
}));
Icons.collapserowsix = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "60.000",
  height: "4.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "5.000",
  width: "60.000",
  height: "4.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "10.000",
  width: "60.000",
  height: "4.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "15.000",
  width: "60.000",
  height: "4.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "20.000",
  width: "60.000",
  height: "4.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "25.000",
  width: "60.000",
  height: "4.000",
  fill: "#d5dadf"
}));
Icons.twocol = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31.000",
  y: "0.000",
  width: "29.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "29.000",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.grid = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31.000",
  y: "0.000",
  width: "29.000",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "29.000",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31.000",
  y: "16.000",
  width: "29.000",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "16.000",
  width: "29.000",
  height: "14.000",
  fill: "#d5dadf"
}));
Icons.threecol = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "18.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "20.500",
  y: "0.000",
  width: "19.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "41.500",
  y: "0.000",
  width: "18.500",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.threegrid = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "18.500",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "20.500",
  y: "0.000",
  width: "19.000",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "41.500",
  y: "0.000",
  width: "18.500",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "16.000",
  width: "18.500",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "20.500",
  y: "16.000",
  width: "19.000",
  height: "14.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "41.500",
  y: "16.000",
  width: "18.500",
  height: "14.000",
  fill: "#d5dadf"
}));
Icons.lastrow = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31",
  width: "29",
  height: "14",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "-0.024",
  width: "29",
  height: "14",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "-0.024",
  y: "16",
  width: "60",
  height: "14",
  fill: "#d5dadf"
}));
Icons.firstrow = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31",
  y: "16",
  width: "29",
  height: "14",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "-0.024",
  y: "16",
  width: "29",
  height: "14",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "-0.024",
  y: "-0.003",
  width: "60",
  height: "14",
  fill: "#d5dadf"
}));
Icons.twoleftgolden = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "41.000",
  y: "0.000",
  width: "19.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "39.000",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.tworightgolden = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "21.000",
  y: "0.000",
  width: "39.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "19.000",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.lefthalf = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "29.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "46.500",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.righthalf = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "15.500",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31.000",
  y: "0.000",
  width: "29.000",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.centerhalf = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "15.500",
  y: "0.000",
  width: "29.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "46.500",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.widecenter = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "11.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "13.000",
  y: "0.000",
  width: "34.000",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "49.000",
  y: "0.000",
  width: "11.000",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.exwidecenter = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "7.200",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "9.200",
  y: "0.000",
  width: "41.600",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "52.800",
  y: "0.000",
  width: "7.200",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.fourcol = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "15.500",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "31.000",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "46.500",
  y: "0.000",
  width: "13.500",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.lfourforty = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "21.600",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "23.600",
  y: "0.000",
  width: "10.800",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "36.400",
  y: "0.000",
  width: "10.800",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "49.200",
  y: "0.000",
  width: "10.800",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.rfourforty = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "10.800",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "12.800",
  y: "0.000",
  width: "10.800",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "25.600",
  y: "0.000",
  width: "10.800",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "38.400",
  y: "0.000",
  width: "21.600",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.fivecol = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "10.400",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "12.400",
  y: "0.000",
  width: "10.400",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "24.800",
  y: "0.000",
  width: "10.400",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "37.200",
  y: "0.000",
  width: "10.400",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "49.600",
  y: "0.000",
  width: "10.400",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.sixcol = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  viewBox: "0 0 60 30",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "0.000",
  y: "0.000",
  width: "8.350",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "10.330",
  y: "0.000",
  width: "8.350",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "20.660",
  y: "0.000",
  width: "8.350",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "30.990",
  y: "0.000",
  width: "8.350",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "41.320",
  y: "0.000",
  width: "8.350",
  height: "30.000",
  fill: "#d5dadf"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "51.650",
  y: "0.000",
  width: "8.350",
  height: "30.000",
  fill: "#d5dadf"
}));
Icons.aligntop = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  width: "20px",
  height: "20px",
  viewBox: "0 0 20 20",
  xmlns: "http://www.w3.org/2000/svg",
  fill: "currentColor",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M17.294,17.287l-14.588,0l0,-14.574l14.588,0c0,4.858 0,9.716 0,14.574Zm-13.738,-0.85l12.888,0l0,-12.874l-12.888,0c0,4.291 0,8.583 0,12.874Z",
  fillRule: "nonzero"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "4.489",
  y: "4.545",
  width: "11.022",
  height: "2.512"
}));
Icons.alignmiddle = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  width: "20px",
  height: "20px",
  viewBox: "0 0 20 20",
  xmlns: "http://www.w3.org/2000/svg",
  fill: "currentColor",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M17.294,17.287l-14.588,0l0,-14.574l14.588,0c0,4.858 0,9.716 0,14.574Zm-13.738,-0.85l12.888,0l0,-12.874l-12.888,0c0,4.291 0,8.583 0,12.874Z",
  fillRule: "nonzero"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "4.489",
  y: "8.744",
  width: "11.022",
  height: "2.512"
}));
Icons.alignbottom = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  width: "20px",
  height: "20px",
  viewBox: "0 0 20 20",
  xmlns: "http://www.w3.org/2000/svg",
  fill: "currentColor",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M17.294,17.287l-14.588,0l0,-14.574l14.588,0c0,4.858 0,9.716 0,14.574Zm-13.738,-0.85l12.888,0l0,-12.874l-12.888,0c0,4.291 0,8.583 0,12.874Z",
  fillRule: "nonzero"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "4.489",
  y: "12.802",
  width: "11.022",
  height: "2.512"
}));
Icons.outlinetop = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  width: "20px",
  height: "20px",
  viewBox: "0 0 20 20",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "2.714",
  y: "5.492",
  width: "1.048",
  height: "9.017",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "16.265",
  y: "5.498",
  width: "1.023",
  height: "9.003",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.518",
  y: "2.186",
  width: "8.964",
  height: "2.482",
  fill: "#272b2f"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.487",
  y: "16.261",
  width: "9.026",
  height: "1.037",
  fill: "#555d66"
}));
Icons.outlineright = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  width: "20px",
  height: "20px",
  viewBox: "0 0 20 20",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "2.714",
  y: "5.492",
  width: "1.046",
  height: "9.017",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "15.244",
  y: "5.498",
  width: "2.518",
  height: "9.003",
  fill: "#272b2f"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.518",
  y: "2.719",
  width: "8.964",
  height: "0.954",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.487",
  y: "16.308",
  width: "9.026",
  height: "0.99",
  fill: "#555d66"
}));
Icons.outlinebottom = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  width: "20px",
  height: "20px",
  viewBox: "0 0 20 20",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "2.714",
  y: "5.492",
  width: "1",
  height: "9.017",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "16.261",
  y: "5.498",
  width: "1.027",
  height: "9.003",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.518",
  y: "2.719",
  width: "8.964",
  height: "0.968",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.487",
  y: "15.28",
  width: "9.026",
  height: "2.499",
  fill: "#272b2f"
}));
Icons.outlineleft = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  width: "20px",
  height: "20px",
  viewBox: "0 0 20 20",
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  clipRule: "evenodd",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.414"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "2.202",
  y: "5.492",
  width: "2.503",
  height: "9.017",
  fill: "#272b2f"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "16.276",
  y: "5.498",
  width: "1.012",
  height: "9.003",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.518",
  y: "2.719",
  width: "8.964",
  height: "0.966",
  fill: "#555d66"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  x: "5.487",
  y: "16.303",
  width: "9.026",
  height: "0.995",
  fill: "#555d66"
}));
Icons.boxed = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  strokeLinecap: "round",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.5",
  clipRule: "evenodd",
  viewBox: "0 0 50 40"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  stroke: "#9A9A9A",
  strokeWidth: "1",
  d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#fff",
  d: "M12.185 4.013H37.816V35.987H12.185z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M14.224 6.006H35.783V14.636000000000001H14.224z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M30.684 32.428H14.568c-.192 0-.351.353-.351.783 0 .429.159.783.351.783h16.116c.194 0 .352-.354.352-.783 0-.43-.158-.783-.352-.783zM35.324 29.284H14.677c-.246 0-.449.353-.449.783 0 .43.203.782.449.782h20.647c.246 0 .449-.352.449-.782 0-.43-.203-.783-.449-.783z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  fillRule: "nonzero",
  d: "M35.324 26.14H14.677c-.246 0-.449.354-.449.784 0 .428.203.782.449.782h20.647c.246 0 .449-.354.449-.782 0-.43-.203-.784-.449-.784zM35.324 22.997H14.677c-.246 0-.449.353-.449.782 0 .43.203.784.449.784h20.647c.246 0 .449-.354.449-.784 0-.429-.203-.782-.449-.782z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M35.324 19.853H14.677c-.246 0-.449.353-.449.783 0 .43.203.783.449.783h20.647c.246 0 .449-.353.449-.783 0-.43-.203-.783-.449-.783zM35.324 16.709H14.677c-.246 0-.449.354-.449.783 0 .429.203.783.449.783h20.647c.246 0 .449-.354.449-.783 0-.429-.203-.783-.449-.783z"
}));
Icons.gridUnboxed = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  strokeLinecap: "round",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.5",
  clipRule: "evenodd",
  viewBox: "0 0 50 40"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#fff",
  stroke: "#9A9A9A",
  strokeWidth: "1",
  d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M4.555 4.68H22.976V11.581H4.555z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M18.62 25.807H4.849c-.164 0-.3.283-.3.627 0 .343.136.626.3.626H18.62c.165 0 .3-.283.3-.626 0-.344-.135-.627-.3-.627zM22.584 23.294H4.942c-.21 0-.383.282-.383.626 0 .343.173.625.383.625h17.642c.21 0 .383-.282.383-.625 0-.344-.173-.626-.383-.626z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  fillRule: "nonzero",
  d: "M22.584 20.78H4.942c-.21 0-.383.282-.383.626 0 .343.173.626.383.626h17.642c.21 0 .383-.283.383-.626 0-.344-.173-.626-.383-.626zM22.584 18.266H4.942c-.21 0-.383.283-.383.626s.173.626.383.626h17.642c.21 0 .383-.283.383-.626s-.173-.626-.383-.626z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M22.584 15.753H4.942c-.21 0-.383.282-.383.625 0 .344.173.626.383.626h17.642c.21 0 .383-.282.383-.626 0-.343-.173-.625-.383-.625zM22.584 13.238H4.942c-.21 0-.383.283-.383.626 0 .344.173.627.383.627h17.642c.21 0 .383-.283.383-.627 0-.343-.173-.626-.383-.626z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M27.234 4.665H45.621V11.565999999999999H27.234z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M41.273 25.792H27.528c-.164 0-.3.283-.3.627 0 .343.136.626.3.626h13.745c.165 0 .299-.283.299-.626 0-.344-.134-.627-.299-.627zM45.23 23.279H27.621c-.21 0-.383.282-.383.626 0 .343.173.625.383.625H45.23c.209 0 .382-.282.382-.625 0-.344-.173-.626-.382-.626z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  fillRule: "nonzero",
  d: "M45.23 20.765H27.621c-.21 0-.383.283-.383.626s.173.626.383.626H45.23c.209 0 .382-.283.382-.626s-.173-.626-.382-.626zM45.23 18.251H27.621c-.21 0-.383.283-.383.626 0 .344.173.626.383.626H45.23c.209 0 .382-.282.382-.626 0-.343-.173-.626-.382-.626z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M45.23 15.738H27.621c-.21 0-.383.282-.383.625 0 .344.173.626.383.626H45.23c.209 0 .382-.282.382-.626 0-.343-.173-.625-.382-.625zM45.23 13.223H27.621c-.21 0-.383.283-.383.626 0 .344.173.627.383.627H45.23c.209 0 .382-.283.382-.627 0-.343-.173-.626-.382-.626z"
})), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M4.555 30.385H22.976V37.286H4.555z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M27.234 30.37H45.621V37.271H27.234z"
})));
Icons.gridBoxed = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  fillRule: "evenodd",
  strokeLinecap: "round",
  strokeLinejoin: "round",
  strokeMiterlimit: "1.5",
  clipRule: "evenodd",
  viewBox: "0 0 50 40"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  stroke: "#9A9A9A",
  strokeWidth: "1",
  d: "M49.007 2.918a1.9 1.9 0 00-1.898-1.898H2.891A1.9 1.9 0 00.993 2.918v34.164a1.9 1.9 0 001.898 1.898h44.218a1.9 1.9 0 001.898-1.898V2.918z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#fff",
  d: "M4.415 4.606H23.453V28.356H4.415z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M5.929 6.087H21.942999999999998V12.497H5.929z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M18.156 25.712H6.185c-.143 0-.261.263-.261.582 0 .318.118.581.261.581h11.971c.143 0 .261-.263.261-.581 0-.319-.118-.582-.261-.582zM21.602 23.377H6.266c-.183 0-.334.262-.334.581 0 .32.151.582.334.582h15.336c.182 0 .333-.262.333-.582 0-.319-.151-.581-.333-.581z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  fillRule: "nonzero",
  d: "M21.602 21.042H6.266c-.183 0-.334.263-.334.582 0 .318.151.581.334.581h15.336c.182 0 .333-.263.333-.581 0-.319-.151-.582-.333-.582zM21.602 18.707H6.266c-.183 0-.334.263-.334.581 0 .319.151.582.334.582h15.336c.182 0 .333-.263.333-.582 0-.318-.151-.581-.333-.581z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M21.602 16.372H6.266c-.183 0-.334.262-.334.581 0 .32.151.582.334.582h15.336c.182 0 .333-.262.333-.582 0-.319-.151-.581-.333-.581zM21.602 14.037H6.266c-.183 0-.334.262-.334.581 0 .319.151.582.334.582h15.336c.182 0 .333-.263.333-.582 0-.319-.151-.581-.333-.581z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#fff",
  d: "M26.548 4.592H45.586V28.342H26.548z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M28.062 6.073H44.076V12.483H28.062z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M40.289 25.698H28.318c-.143 0-.261.263-.261.582 0 .319.118.581.261.581h11.971c.143 0 .261-.262.261-.581 0-.319-.118-.582-.261-.582zM43.735 23.363H28.399c-.183 0-.333.262-.333.582 0 .319.15.581.333.581h15.336c.183 0 .333-.262.333-.581 0-.32-.15-.582-.333-.582z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  fillRule: "nonzero",
  d: "M43.735 21.028H28.399c-.183 0-.333.263-.333.582 0 .318.15.581.333.581h15.336c.183 0 .333-.263.333-.581 0-.319-.15-.582-.333-.582zM43.735 18.693H28.399c-.183 0-.333.263-.333.581 0 .32.15.582.333.582h15.336c.183 0 .333-.262.333-.582 0-.318-.15-.581-.333-.581z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CCC",
  fillRule: "nonzero",
  d: "M43.735 16.358H28.399c-.183 0-.333.262-.333.582 0 .319.15.581.333.581h15.336c.183 0 .333-.262.333-.581 0-.32-.15-.582-.333-.582zM43.735 14.023H28.399c-.183 0-.333.263-.333.581 0 .319.15.582.333.582h15.336c.183 0 .333-.263.333-.582 0-.318-.15-.581-.333-.581z"
})), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#fff",
  d: "M4.415 31.302H23.453V38.488H4.415z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M5.929 32.783H21.942999999999998V38.492000000000004H5.929z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#fff",
  d: "M26.548 31.288H45.586V38.485H26.548z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  fill: "#CDCDCD",
  d: "M28.062 32.769H44.076V38.485H28.062z"
}))));
Icons.shoppingBag = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M19 5H5l1.5-2h11zm2.794.392L18.8 1.4A1 1 0 0018 1H6a1 1 0 00-.8.4L2.206 5.392A.978.978 0 002 6v14a2.997 2.997 0 003 3h14a2.997 2.997 0 003-3V6a.997.997 0 00-.189-.585L21.8 5.4zM4 7h16v13c0 .276-.111.525-.293.707S19.276 21 19 21H5c-.276 0-.525-.111-.707-.293S4 20.276 4 20zm11 3c0 .829-.335 1.577-.879 2.121S12.829 13 12 13s-1.577-.335-2.121-.879S9 10.829 9 10a1 1 0 00-2 0c0 1.38.561 2.632 1.464 3.536S10.62 15 12 15s2.632-.561 3.536-1.464S17 11.38 17 10a1 1 0 00-2 0z"
}));
Icons.shoppingCart = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M11 21c0-.552-.225-1.053-.586-1.414a1.996 1.996 0 00-2.828 0 1.996 1.996 0 000 2.828 1.996 1.996 0 002.828 0c.361-.361.586-.862.586-1.414zm11 0c0-.552-.225-1.053-.586-1.414a1.996 1.996 0 00-2.828 0 1.996 1.996 0 000 2.828 1.996 1.996 0 002.828 0c.361-.361.586-.862.586-1.414zM7.221 7h14.57l-1.371 7.191A1 1 0 0119.4 15H9.666a1.016 1.016 0 01-.626-.203.99.99 0 01-.379-.603zM1 2h3.18l.848 4.239C5.136 6.676 5.53 7 6 7h1.221l-.4-2H6a1 1 0 00-.971 1.239L6.7 14.586A3.009 3.009 0 009.694 17H19.4a2.97 2.97 0 001.995-.727 3.02 3.02 0 00.985-1.683l1.602-8.402A1 1 0 0023 5H6.82L5.98.804A1 1 0 005 0H1a1 1 0 000 2z"
}));
Icons.sunAlt = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "16",
  height: "16",
  viewBox: "0 0 16 16"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M8 4a4 4 0 100 8 4 4 0 000-8zm0 9a1 1 0 011 1v1a1 1 0 01-2 0v-1a1 1 0 011-1zM8 3a1 1 0 01-1-1V1a1 1 0 012 0v1a1 1 0 01-1 1zm7 4a1 1 0 010 2h-1a1 1 0 010-2h1zM3 8a1 1 0 01-1 1H1a1 1 0 010-2h1a1 1 0 011 1zm9.95 3.536l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 011.414-1.414zm-9.9-7.072l-.707-.707a.999.999 0 111.414-1.414l.707.707A.999.999 0 113.05 4.464zm9.9 0a.999.999 0 11-1.414-1.414l.707-.707a.999.999 0 111.414 1.414l-.707.707zm-9.9 7.072a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707z"
}));
Icons.sunrise = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M18 18c0-1.657-.673-3.158-1.757-4.243S13.657 12 12 12s-3.158.673-4.243 1.757S6 16.343 6 18a1 1 0 002 0c0-1.105.447-2.103 1.172-2.828S10.895 14 12 14s2.103.447 2.828 1.172S16 16.895 16 18a1 1 0 002 0zM3.513 10.927l1.42 1.42a.999.999 0 101.414-1.414l-1.42-1.42a.999.999 0 10-1.414 1.414zM1 19h2a1 1 0 000-2H1a1 1 0 000 2zm20 0h2a1 1 0 000-2h-2a1 1 0 000 2zm-1.933-6.653l1.42-1.42a.999.999 0 10-1.414-1.414l-1.42 1.42a.999.999 0 101.414 1.414zM23 21H1a1 1 0 000 2h22a1 1 0 000-2zM8.707 6.707L11 4.414V9a1 1 0 002 0V4.414l2.293 2.293a.999.999 0 101.414-1.414l-4-4a1.006 1.006 0 00-1.414 0l-4 4a.999.999 0 101.414 1.414z"
}));
Icons.sunset = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M18 18c0-1.657-.673-3.158-1.757-4.243S13.657 12 12 12s-3.158.673-4.243 1.757S6 16.343 6 18a1 1 0 002 0c0-1.105.447-2.103 1.172-2.828S10.895 14 12 14s2.103.447 2.828 1.172S16 16.895 16 18a1 1 0 002 0zM3.513 10.927l1.42 1.42a.999.999 0 101.414-1.414l-1.42-1.42a.999.999 0 10-1.414 1.414zM1 19h2a1 1 0 000-2H1a1 1 0 000 2zm20 0h2a1 1 0 000-2h-2a1 1 0 000 2zm-1.933-6.653l1.42-1.42a.999.999 0 10-1.414-1.414l-1.42 1.42a.999.999 0 101.414 1.414zM23 21H1a1 1 0 000 2h22a1 1 0 000-2zM15.293 4.293L13 6.586V2a1 1 0 00-2 0v4.586L8.707 4.293a.999.999 0 10-1.414 1.414l4 4a.998.998 0 001.414 0l4-4a.999.999 0 10-1.414-1.414z"
}));
Icons.moonAlt = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "16",
  height: "16",
  viewBox: "0 0 16 16"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M11.185 1.008A8.014 8.014 0 008.223 0 8.035 8.035 0 01.798 12.861a8.033 8.033 0 0013.328-.88 8.034 8.034 0 00-2.94-10.974z"
}));
Icons.sun = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M18 12c0-1.657-.673-3.158-1.757-4.243S13.657 6 12 6s-3.158.673-4.243 1.757S6 10.343 6 12s.673 3.158 1.757 4.243S10.343 18 12 18s3.158-.673 4.243-1.757S18 13.657 18 12zm-2 0c0 1.105-.447 2.103-1.172 2.828S13.105 16 12 16s-2.103-.447-2.828-1.172S8 13.105 8 12s.447-2.103 1.172-2.828S10.895 8 12 8s2.103.447 2.828 1.172S16 10.895 16 12zM11 1v2a1 1 0 002 0V1a1 1 0 00-2 0zm0 20v2a1 1 0 002 0v-2a1 1 0 00-2 0zM3.513 4.927l1.42 1.42a.999.999 0 101.414-1.414l-1.42-1.42a.999.999 0 10-1.414 1.414zm14.14 14.14l1.42 1.42a.999.999 0 101.414-1.414l-1.42-1.42a.999.999 0 10-1.414 1.414zM1 13h2a1 1 0 000-2H1a1 1 0 000 2zm20 0h2a1 1 0 000-2h-2a1 1 0 000 2zM4.927 20.487l1.42-1.42a.999.999 0 10-1.414-1.414l-1.42 1.42a.999.999 0 101.414 1.414zm14.14-14.14l1.42-1.42a.999.999 0 10-1.414-1.414l-1.42 1.42a.999.999 0 101.414 1.414z"
}));
Icons.moon = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M21.996 12.882a1 1 0 00-1.585-.9 6.11 6.11 0 01-3.188 1.162 5.948 5.948 0 01-3.95-1.158c-1.333-.985-2.139-2.415-2.367-3.935s.124-3.124 1.109-4.456a.998.998 0 00-.901-1.589 10.082 10.082 0 00-5.895 2.651 9.943 9.943 0 00-3.137 6.386c-.254 2.749.631 5.343 2.266 7.311s4.022 3.313 6.772 3.567 5.343-.631 7.311-2.266 3.313-4.022 3.567-6.772zm-2.429 1.792a7.988 7.988 0 01-2.416 3.441c-1.576 1.309-3.648 2.016-5.848 1.813s-4.108-1.278-5.417-2.854-2.016-3.648-1.813-5.848A7.932 7.932 0 016.58 6.12a8.058 8.058 0 012.731-1.672 8.008 8.008 0 002.772 9.146 7.94 7.94 0 005.272 1.545 8.083 8.083 0 002.21-.465z"
}));
Icons.checkbox = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "16",
  height: "16",
  viewBox: "0 0 16 16"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M0 0v16h16V0H0zm15 15H1V1h14v14z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M2.5 8L4 6.5 6.5 9 12 3.5 13.5 5l-7 7z"
}));
Icons.checkbox_alt = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "16",
  height: "16",
  viewBox: "0 0 16 16"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M14 0H2C.9 0 0 .9 0 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V2c0-1.1-.9-2-2-2zM7 12.414L3.293 8.707l1.414-1.414L7 9.586l4.793-4.793 1.414 1.414L7 12.414z"
}));
Icons.check = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "16",
  height: "16",
  viewBox: "0 0 16 16"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M14 2.5L5.5 11 2 7.5.5 9l5 5 10-10z"
}));
Icons.shield_check = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "16",
  height: "16",
  viewBox: "0 0 16 16"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M13.739 3.061l-5.5-3a.497.497 0 00-.478 0l-5.5 3A.5.5 0 002 3.5v4c0 2.2.567 3.978 1.735 5.437.912 1.14 2.159 2.068 4.042 3.01a.502.502 0 00.448 0c1.883-.942 3.13-1.87 4.042-3.01 1.167-1.459 1.735-3.238 1.735-5.437v-4a.5.5 0 00-.261-.439zM6.5 11.296L3.704 8.5l.796-.795 2 2 5-5 .796.795-5.795 5.795z"
}));
Icons.disc = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "16",
  height: "16",
  viewBox: "0 0 16 16"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M5 8a3 3 0 116 0 3 3 0 01-6 0z"
}));
Icons.arrowUp = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M5.707 12.707L11 7.414V19a1 1 0 002 0V7.414l5.293 5.293a.999.999 0 101.414-1.414l-7-7A1.008 1.008 0 0012 4a.997.997 0 00-.707.293l-7 7a.999.999 0 101.414 1.414z"
}));
Icons.arrowUp2 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "26",
  height: "28",
  viewBox: "0 0 26 28"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M25.172 15.172c0 .531-.219 1.031-.578 1.406l-1.172 1.172c-.375.375-.891.594-1.422.594s-1.047-.219-1.406-.594L16 13.172v11C16 25.297 15.062 26 14 26h-2c-1.062 0-2-.703-2-1.828v-11L5.406 17.75a1.96 1.96 0 01-2.812 0l-1.172-1.172c-.375-.375-.594-.875-.594-1.406s.219-1.047.594-1.422L11.594 3.578C11.953 3.203 12.469 3 13 3s1.047.203 1.422.578L24.594 13.75c.359.375.578.891.578 1.422z"
}));
Icons.chevronUp = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M18.707 14.293l-6-6a.999.999 0 00-1.414 0l-6 6a.999.999 0 101.414 1.414L12 10.414l5.293 5.293a.999.999 0 101.414-1.414z"
}));
Icons.chevronUp2 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "28",
  height: "28",
  viewBox: "0 0 28 28"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M26.297 20.797l-2.594 2.578a.99.99 0 01-1.406 0L14 15.078l-8.297 8.297a.99.99 0 01-1.406 0l-2.594-2.578a1.009 1.009 0 010-1.422L13.297 7.797a.99.99 0 011.406 0l11.594 11.578a1.009 1.009 0 010 1.422z"
}));
Icons.account = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M21 21v-2c0-1.38-.561-2.632-1.464-3.536S17.38 14 16 14H8c-1.38 0-2.632.561-3.536 1.464S3 17.62 3 19v2a1 1 0 002 0v-2c0-.829.335-1.577.879-2.121S7.171 16 8 16h8c.829 0 1.577.335 2.121.879S19 18.171 19 19v2a1 1 0 002 0zM17 7c0-1.38-.561-2.632-1.464-3.536S13.38 2 12 2s-2.632.561-3.536 1.464S7 5.62 7 7s.561 2.632 1.464 3.536S10.62 12 12 12s2.632-.561 3.536-1.464S17 8.38 17 7zm-2 0c0 .829-.335 1.577-.879 2.121S12.829 10 12 10s-1.577-.335-2.121-.879S9 7.829 9 7s.335-1.577.879-2.121S11.171 4 12 4s1.577.335 2.121.879S15 6.171 15 7z"
}));
Icons.account2 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "28",
  height: "28",
  viewBox: "0 0 28 28"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M23.797 20.922c-.406-2.922-1.594-5.516-4.25-5.875-1.375 1.5-3.359 2.453-5.547 2.453s-4.172-.953-5.547-2.453c-2.656.359-3.844 2.953-4.25 5.875C6.375 23.985 9.953 26 14 26s7.625-2.016 9.797-5.078zM20 10c0-3.313-2.688-6-6-6s-6 2.688-6 6 2.688 6 6 6 6-2.688 6-6zm8 4c0 7.703-6.25 14-14 14-7.734 0-14-6.281-14-14C0 6.266 6.266 0 14 0s14 6.266 14 14z"
}));
Icons.account3 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "28",
  height: "28",
  viewBox: "0 0 28 28"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M14 0c7.734 0 14 6.266 14 14 0 7.688-6.234 14-14 14-7.75 0-14-6.297-14-14C0 6.266 6.266 0 14 0zm9.672 21.109C25.125 19.109 26 16.656 26 14c0-6.609-5.391-12-12-12S2 7.391 2 14c0 2.656.875 5.109 2.328 7.109C4.89 18.312 6.25 16 9.109 16a6.979 6.979 0 009.782 0c2.859 0 4.219 2.312 4.781 5.109zM20 11c0-3.313-2.688-6-6-6s-6 2.688-6 6 2.688 6 6 6 6-2.688 6-6z"
}));
Icons.hours = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "28",
  viewBox: "0 0 24 28"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M14 8.5v7c0 .281-.219.5-.5.5h-5a.494.494 0 01-.5-.5v-1c0-.281.219-.5.5-.5H12V8.5c0-.281.219-.5.5-.5h1c.281 0 .5.219.5.5zm6.5 5.5c0-4.688-3.813-8.5-8.5-8.5S3.5 9.313 3.5 14s3.813 8.5 8.5 8.5 8.5-3.813 8.5-8.5zm3.5 0c0 6.625-5.375 12-12 12S0 20.625 0 14 5.375 2 12 2s12 5.375 12 12z"
}));
Icons.listFilter = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M8 7h13a1 1 0 000-2H8a1 1 0 000 2zm0 6h13a1 1 0 000-2H8a1 1 0 000 2zm0 6h13a1 1 0 000-2H8a1 1 0 000 2zM3 7a1 1 0 100-2 1 1 0 000 2zm0 6a1 1 0 100-2 1 1 0 000 2zm0 6a1 1 0 100-2 1 1 0 000 2z"
}));
Icons.listFilterAlt = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M6 12.984v-1.969h12v1.969H6zM3 6h18v2.016H3V6zm6.984 12v-2.016h4.031V18H9.984z"
}));
Icons.close = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M5.293 6.707L10.586 12l-5.293 5.293a.999.999 0 101.414 1.414L12 13.414l5.293 5.293a.999.999 0 101.414-1.414L13.414 12l5.293-5.293a.999.999 0 10-1.414-1.414L12 10.586 6.707 5.293a.999.999 0 10-1.414 1.414z"
}));
Icons.closeAlt = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M5 2a2.997 2.997 0 00-3 3v14a2.997 2.997 0 003 3h14a2.997 2.997 0 003-3V5a2.997 2.997 0 00-3-3zm0 2h14c.276 0 .525.111.707.293S20 4.724 20 5v14c0 .276-.111.525-.293.707S19.276 20 19 20H5c-.276 0-.525-.111-.707-.293S4 19.276 4 19V5c0-.276.111-.525.293-.707S4.724 4 5 4zm9.293 4.293L12 10.586 9.707 8.293a.999.999 0 10-1.414 1.414L10.586 12l-2.293 2.293a.999.999 0 101.414 1.414L12 13.414l2.293 2.293a.999.999 0 101.414-1.414L13.414 12l2.293-2.293a.999.999 0 10-1.414-1.414z"
}));
Icons.closeAlt2 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
  d: "M23 12c0-3.037-1.232-5.789-3.222-7.778S15.037 1 12 1 6.211 2.232 4.222 4.222 1 8.963 1 12s1.232 5.789 3.222 7.778S8.963 23 12 23s5.789-1.232 7.778-3.222S23 15.037 23 12zm-2 0c0 2.486-1.006 4.734-2.636 6.364S14.486 21 12 21s-4.734-1.006-6.364-2.636S3 14.486 3 12s1.006-4.734 2.636-6.364S9.514 3 12 3s4.734 1.006 6.364 2.636S21 9.514 21 12zM8.293 9.707L10.586 12l-2.293 2.293a.999.999 0 101.414 1.414L12 13.414l2.293 2.293a.999.999 0 101.414-1.414L13.414 12l2.293-2.293a.999.999 0 10-1.414-1.414L12 10.586 9.707 8.293a.999.999 0 10-1.414 1.414z"
}));
/* harmony default export */ __webpack_exports__["default"] = (Icons);

/***/ }),

/***/ "./src/common/responsive.js":
/*!**********************************!*\
  !*** ./src/common/responsive.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./icons */ "./src/common/icons.js");







function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }



var __ = wp.i18n.__;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;
var _wp$components = wp.components,
    Button = _wp$components.Button,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    ButtonGroup = _wp$components.ButtonGroup,
    Icon = _wp$components.Icon;

var ResponsiveControl = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(ResponsiveControl, _Component);

  var _super = _createSuper(ResponsiveControl);

  function ResponsiveControl(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, ResponsiveControl);

    _this = _super.call(this, props);
    _this.state = {
      view: 'desktop'
    };

    _this.linkResponsiveButtons();

    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(ResponsiveControl, [{
    key: "render",
    value: function render() {
      var view = this.state.view,
          deviceMap = {
        'desktop': {
          'tooltip': __('Desktop', 'responsive'),
          'icon': Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Icon, {
            icon: _icons__WEBPACK_IMPORTED_MODULE_7__["default"].desktop
          })
        },
        'tablet': {
          'tooltip': __('Tablet', 'responsive'),
          'icon': Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Icon, {
            icon: _icons__WEBPACK_IMPORTED_MODULE_7__["default"].tablet
          })
        },
        'mobile': {
          'tooltip': __('Mobile', 'responsive'),
          'icon': Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Icon, {
            icon: _icons__WEBPACK_IMPORTED_MODULE_7__["default"].smartphone
          })
        }
      };
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: 'responsive-responsive-control-bar'
      }, this.props.controlLabel && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("span", {
        className: "customize-control-title"
      }, this.props.controlLabel), !this.props.hideResponsive && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "floating-controls"
      }, this.props.tooltip && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(ButtonGroup, null, Object.keys(deviceMap).map(function (device) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Tooltip, {
          text: deviceMap[device].tooltip
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Button, {
          isTertiary: true,
          className: (device === view ? 'active-device ' : '') + device,
          onClick: function onClick() {
            var event = new CustomEvent('responsiveChangedRepsonsivePreview', {
              'detail': device
            });
            document.dispatchEvent(event);
          }
        }, deviceMap[device].icon));
      })), !this.props.tooltip && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(ButtonGroup, null, Object.keys(deviceMap).map(function (device) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Button, {
          isTertiary: true,
          className: (device === view ? 'active-device ' : '') + device,
          onClick: function onClick() {
            var event = new CustomEvent('responsiveChangedRepsonsivePreview', {
              'detail': device
            });
            document.dispatchEvent(event);
          }
        }, deviceMap[device].icon);
      })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "responsive-responsive-controls-content"
      }, this.props.children));
    }
  }, {
    key: "changeViewType",
    value: function changeViewType(device) {
      this.setState({
        view: device
      });
      wp.customize.previewedDevice(device);
      this.props.onChange(device);
    }
  }, {
    key: "linkResponsiveButtons",
    value: function linkResponsiveButtons() {
      var self = this;
      document.addEventListener('responsiveChangedRepsonsivePreview', function (e) {
        self.changeViewType(e.detail);
      });
    }
  }]);

  return ResponsiveControl;
}(Component);

ResponsiveControl.propTypes = {
  onChange: prop_types__WEBPACK_IMPORTED_MODULE_6___default.a.func,
  controlLabel: prop_types__WEBPACK_IMPORTED_MODULE_6___default.a.string
};
ResponsiveControl.defaultProps = {
  tooltip: true
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveControl);

/***/ }),

/***/ "./src/core/control.js":
/*!*****************************!*\
  !*** ./src/core/control.js ***!
  \*****************************/
/*! exports provided: responsiveCore */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveCore", function() { return responsiveCore; });
/**
 * Extending Customizer Control wp.customize.Control.
 *
 * @since 2.6.0
 */
var responsiveCore = wp.customize.responsiveControl = wp.customize.Control.extend({
  /**
   * A Customizer Control.
   *
   * A control provides a UI element that allows a user to modify a Customizer Setting.
   * Overriding this method to provide lazy loading of controls by initializing all the controls.
   *
   * @see PHP class WP_Customize_Control.
   *
   * @file wp-admin/js/customize-nav-menus.js
   *
   * @constructs wp.customize.Control
   * @augments   wp.customize.Class
   *
   * @since 2.6.0
   *
   * @return {void}
   */
  initialize: function initialize(id, options) {
    var control = this,
        args = options || {};
    args.params = args.params || {};

    if (!args.params.type) {
      args.params.type = 'responsive-core';
    }

    if (!args.params.content) {
      args.params.content = jQuery('<li></li>');
      args.params.content.attr('id', 'customize-control-' + id.replace(/]/g, '').replace(/\[/g, '-'));
      args.params.content.attr('class', 'customize-control customize-control-' + args.params.type);
    }

    control.propertyElements = [];
    wp.customize.Control.prototype.initialize.call(control, id, args);
  },

  /**
   * Add bidirectional data binding links between inputs and the setting(s).
   *
   * This is copied from wp.customize.Control.prototype.initialize(). It
   * should be changed in Core to be applied once the control is embedded.
   *
   * @private
   * @returns {null}
   */
  _setUpSettingRootLinks: function _setUpSettingRootLinks() {
    var control = this,
        nodes = control.container.find('[data-customize-setting-link]');
    nodes.each(function () {
      var node = jQuery(this);
      wp.customize(node.data('customizeSettingLink'), function (setting) {
        var element = new wp.customize.Element(node);
        control.elements.push(element);
        element.sync(setting);
        element.set(setting());
      });
    });
  },

  /**
   * Add bidirectional data binding links between inputs and the setting properties.
   *
   * @private
   * @returns {null}
   */
  _setUpSettingPropertyLinks: function _setUpSettingPropertyLinks() {
    var control = this,
        nodes;

    if (!control.setting) {
      return;
    }

    nodes = control.container.find('[data-customize-setting-property-link]');
    nodes.each(function () {
      var node = jQuery(this),
          element,
          propertyName = node.data('customizeSettingPropertyLink');
      element = new wp.customize.Element(node);
      control.propertyElements.push(element);
      element.set(control.setting()[propertyName]);
      element.bind(function (newPropertyValue) {
        var newSetting = control.setting();

        if (newPropertyValue === newSetting[propertyName]) {
          return;
        }

        newSetting = _.clone(newSetting);
        newSetting[propertyName] = newPropertyValue;
        control.setting.set(newSetting);
      });
      control.setting.bind(function (newValue) {
        if (newValue[propertyName] !== element.get()) {
          element.set(newValue[propertyName]);
        }
      });
    });
  },

  /**
   * Triggered when the control's markup has been injected into the DOM.
   * Injecting markup from component based controls.
   *
   * @file wp-admin/js/customize-nav-menus.js
   *
   * @since 2.6.0
   *
   * @returns {void}
   */
  ready: function ready() {
    var control = this;
    wp.customize.Control.prototype.ready.call(control);
    control.deferred.embedded.done();
  },

  /**
   * Override the embed() method to do nothing,
   * so that the control isn't embedded on load,
   * unless the containing section is already expanded.
   *
   * @file wp-admin/js/customize-nav-menus.js
   *
   * @since 2.6.0
   *
   * @returns {void}
   */
  embed: function embed() {
    var control = this,
        sectionId = control.section();

    if (!sectionId) {
      return;
    }

    wp.customize.section(sectionId, function (section) {
      if (section.expanded() || wp.customize.settings.autofocus.control === control.id) {
        control.actuallyEmbed();
      } else {
        section.expanded.bind(function (expanded) {
          if (expanded) {
            control.actuallyEmbed();
          }
        });
      }
    });
  },

  /**
   * This function is called in control.embed() & control.focus() so the control
   * will only get embedded when the Section is first expanded.
   *
   * @file wp-admin/js/customize-nav-menus.js
   *
   * @since 2.6.0
   *
   * @returns {void}
   */
  actuallyEmbed: function actuallyEmbed() {
    var control = this;

    if ('resolved' === control.deferred.embedded.state()) {
      return;
    }

    control.renderContent();
    control.deferred.embedded.resolve(); // This triggers control.ready().
  },

  /**
   * Expand the containing section and focus on the control.
   *
   * @file wp-admin/js/customize-nav-menus.js
   *
   * @since 2.6.0
   *
   * @param {Object}   [params] - Params object.
   * @param {Function} [params.completeCallback] - Optional callback function when focus has completed.
   */
  focus: function focus(params) {
    var control = this;
    control.actuallyEmbed();
    wp.customize.Control.prototype.focus.call(control, params);
  }
});

/***/ }),

/***/ "./src/customizer.js":
/*!***************************!*\
  !*** ./src/customizer.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($, api) {
  var $window = $(window),
      $document = $(document),
      $body = $('body');
  /**
   * API on ready event handlers
   *
   * All handlers need to be inside the 'ready' state.
   */

  wp.customize.bind('ready', function () {
    // Set all custom responsive toggles and fieldsets.
    var setCustomResponsiveElementsDisplay = function setCustomResponsiveElementsDisplay() {
      var device = wp.customize.previewedDevice.get(),
          $tabs = $('.responsive-build-tabs-button.nav-tab');
      $tabs.removeClass('nav-tab-active').filter('.preview-' + device).addClass('nav-tab-active');
    }; // Refresh all responsive elements when previewedDevice is changed.


    wp.customize.previewedDevice.bind(setCustomResponsiveElementsDisplay); // Refresh all responsive elements when any section is expanded.
    // This is required to set responsive elements on newly added controls inside the section.

    wp.customize.section.each(function (section) {
      section.expanded.bind(setCustomResponsiveElementsDisplay);
    });
    /**
     * Resize Preview Frame when show / hide Builder.
     */

    var resizePreviewer = function resizePreviewer() {
      var $section = $('.control-section.responsive-builder-active');
      var $footer = $('.control-section.responsive-footer-builder-active');

      if ($body.hasClass('responsive-builder-is-active') || $body.hasClass('responsive-footer-builder-is-active')) {
        if ($body.hasClass('responsive-footer-builder-is-active') && 0 < $footer.length && !$footer.hasClass('responsive-builder-hide')) {
          wp.customize.previewer.container.css('bottom', $footer.outerHeight() + 'px');
        } else if ($body.hasClass('responsive-builder-is-active') && 0 < $section.length && !$section.hasClass('responsive-builder-hide')) {
          wp.customize.previewer.container.css({
            "bottom": $section.outerHeight() + 'px'
          });
        } else {
          wp.customize.previewer.container.css('bottom', '');
        }
      } else {
        wp.customize.previewer.container.css('bottom', '');
      }
    };

    $window.on('resize', resizePreviewer);
    wp.customize.previewedDevice.bind(function (device) {
      setTimeout(function () {
        resizePreviewer();
      }, 250);
    });

    var reloadPreviewer = function reloadPreviewer() {
      $(wp.customize.previewer.container).find('iframe').css('position', 'static');
      $(wp.customize.previewer.container).find('iframe').css('position', 'absolute');
    };

    wp.customize.previewer.bind('ready', reloadPreviewer);
    /**
     * Init Header & Footer Builder
     */

    var initHeaderBuilderPanel = function initHeaderBuilderPanel(panel) {
      var section = wp.customize.section('responsive_header_builder');

      if (section) {
        var $section = section.contentContainer,
            section_layout = wp.customize.section('responsive_customizer_header_layout'); // If Header panel is expanded, add class to the body tag (for CSS styling).

        panel.expanded.bind(function (isExpanded) {
          _.each(section.controls(), function (control) {
            if ('resolved' === control.deferred.embedded.state()) {
              return;
            }

            control.renderContent();
            control.deferred.embedded.resolve(); // This triggers control.ready().
            // Fire event after control is initialized.

            control.container.trigger('init');
          });

          if (isExpanded) {
            $body.addClass('responsive-builder-is-active');
            $section.addClass('responsive-builder-active');
            $section.css('display', 'none').height();
            $section.css('display', 'block');
          } else {
            $body.removeClass('responsive-builder-is-active');
            $section.removeClass('responsive-builder-active');
          }

          _.each(section_layout.controls(), function (control) {
            if ('resolved' === control.deferred.embedded.state()) {
              return;
            }

            control.renderContent();
            control.deferred.embedded.resolve(); // This triggers control.ready().
            // Fire event after control is initialized.

            control.container.trigger('init');
          });

          resizePreviewer();
        }); // Attach callback to builder toggle.

        $section.on('click', '.responsive-builder-tab-toggle', function (e) {
          e.preventDefault();
          $section.toggleClass('responsive-builder-hide');
          resizePreviewer();
        });
      }
    };

    wp.customize.panel('responsive_customizer_header', initHeaderBuilderPanel);
    /**
     * Init Header & Footer Builder
     */

    var initFooterBuilderPanel = function initFooterBuilderPanel(panel) {
      var section = wp.customize.section('responsive_customizer_footer_builder');

      if (section) {
        var $section = section.contentContainer,
            section_layout = wp.customize.section('responsive_customizer_footer_layout'); // If Header panel is expanded, add class to the body tag (for CSS styling).

        panel.expanded.bind(function (isExpanded) {
          _.each(section.controls(), function (control) {
            if ('resolved' === control.deferred.embedded.state()) {
              return;
            }

            control.renderContent();
            control.deferred.embedded.resolve(); // This triggers control.ready().
            // Fire event after control is initialized.

            control.container.trigger('init');
          });

          if (isExpanded) {
            $body.addClass('responsive-footer-builder-is-active');
            $section.addClass('responsive-footer-builder-active');
            $section.css('display', 'none').height();
            $section.css('display', 'block');
          } else {
            $body.removeClass('responsive-footer-builder-is-active');
            $section.removeClass('responsive-footer-builder-active');
          }

          _.each(section_layout.controls(), function (control) {
            if ('resolved' === control.deferred.embedded.state()) {
              return;
            }

            control.renderContent();
            control.deferred.embedded.resolve(); // This triggers control.ready().
            // Fire event after control is initialized.

            control.container.trigger('init');
          });

          resizePreviewer();
        }); // Attach callback to builder toggle.

        $section.on('click', '.responsive-builder-tab-toggle', function (e) {
          e.preventDefault();
          $section.toggleClass('responsive-builder-hide');
          resizePreviewer();
        });
      }
    };

    wp.customize.panel('responsive_customizer_footer', initFooterBuilderPanel);
  });
})(jQuery, wp);

/***/ }),

/***/ "./src/dimensions/control.js":
/*!***********************************!*\
  !*** ./src/dimensions/control.js ***!
  \***********************************/
/*! exports provided: responsiveDimensions */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveDimensions", function() { return responsiveDimensions; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _dimensions_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./dimensions-component.js */ "./src/dimensions/dimensions-component.js");


var responsiveDimensions = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_dimensions_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    'use strict';

    var control = this;
    control.container.on('click', '.responsive-switchers button', function (event) {
      // Set up variables
      var $this = jQuery(this),
          $devices = jQuery('.responsive-switchers'),
          $device = jQuery(event.currentTarget).data('device'),
          $control = jQuery('.customize-control.has-switchers'),
          $body = jQuery('.wp-full-overlay'),
          $footer_devices = jQuery('.wp-full-overlay-footer .devices'); // Button class

      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active'); // Control class

      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device); // Wrapper class

      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device); // Panel footer buttons

      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true); // Open switchers

      if ($this.hasClass('preview-desktop')) {
        $control.toggleClass('responsive-switchers-open');
      }
    });
  }
});

/***/ }),

/***/ "./src/dimensions/dimensions-component.js":
/*!************************************************!*\
  !*** ./src/dimensions/dimensions-component.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_6__);





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }





var DimensionsComponent = function DimensionsComponent(props) {
  var value = props.control.params;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_6__["useState"])(value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var onConnectedClick = function onConnectedClick() {
    var parent = event.target.parentElement.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.responsive-dimensions-input');

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('linked');
      inputs[i].setAttribute('data-element-connect', '');
    }

    event.target.parentElement.classList.remove('unlinked');
  };

  var onDisconnectedClick = function onDisconnectedClick() {
    var elements = event.target.dataset.elementConnect;
    var parent = event.target.parentElement.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.responsive-dimensions-input');

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.add('linked');
      inputs[i].setAttribute('data-element-connect', elements);
    }

    event.target.parentElement.classList.add('unlinked');
  };

  var onSpacingChange = function onSpacingChange(device, choiceID) {
    var updateState = _objectSpread({}, props_value);

    var deviceUpdateState = _objectSpread({}, updateState[device]);

    if (!event.target.classList.contains('linked')) {
      deviceUpdateState[choiceID].value = event.target.value;
    } else {
      for (var _choiceID in deviceUpdateState) {
        var _value = event.target.value;
        deviceUpdateState[_choiceID].value = _value;

        props.control.settings[_choiceID].set(_value);
      }
    }

    updateState[device] = deviceUpdateState;
    setPropsValue(updateState);
  };

  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var _props$control$params = props.control.params,
        id = _props$control$params.id,
        inputAttrs = _props$control$params.inputAttrs,
        l10n = _props$control$params.l10n;

    var itemLinkDesc = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Link Values Together', 'responsive');

    var linkHtml = null;
    var htmlChoices = null;
    var dataElement = id;

    if ('tablet' === device) {
      dataElement = dataElement + '_tablet';
    }

    if ('mobile' === device) {
      dataElement = dataElement + '_mobile';
    }

    linkHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
      key: 'connect-disconnect' + device,
      className: "dimension-wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "link-dimensions unlinked"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      key: 'connect' + device,
      className: "dashicons dashicons-admin-links responsive-linked",
      onClick: function onClick() {
        onConnectedClick();
      },
      "data-element-connect": id,
      title: itemLinkDesc,
      "data-element": dataElement
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      key: 'disconnect' + device,
      className: "dashicons dashicons-editor-unlink responsive-unlinked",
      onClick: function onClick() {
        onDisconnectedClick();
      },
      "data-element-connect": id,
      title: itemLinkDesc,
      "data-element": dataElement
    })));

    if (props_value[device]) {
      htmlChoices = Object.keys(props_value[device]).map(function (choiceID) {
        var link = props_value[device][choiceID].id;

        if (undefined !== link) {
          var splited_values = link.split("=");

          if (undefined !== splited_values[1]) {
            link = splited_values[1].replace(/"/g, "");
          }
        }

        var attr = [];

        if (undefined !== inputAttrs) {
          var _splited_values = inputAttrs.split(" ");

          _splited_values.map(function (item) {
            var item_values = item.split("=");

            if (undefined !== item_values[1]) {
              attr[item_values[0]] = item_values[1].replace(/"/g, "");
            }
          });
        }

        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
          key: props_value[device][choiceID].id,
          className: "dimension-wrap ".concat(choiceID)
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("input", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({
          type: "number"
        }, attr, {
          className: "dimensions-".concat(choiceID, " linked responsive-dimensions-input"),
          "data-id": props_value[device][choiceID].id,
          value: props_value[device][choiceID].value,
          onChange: function onChange() {
            return onSpacingChange(device, choiceID);
          },
          "data-element": dataElement,
          "data-customize-setting-link": link
        })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
          className: "dimension-label"
        }, l10n[choiceID]));
        return html;
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("ul", {
      key: "".concat(device, "-").concat(id),
      className: "".concat(device, " control-wrap ").concat(active)
    }, htmlChoices, linkHtml);
  };

  var _props$control$params2 = props.control.params,
      label = _props$control$params2.label,
      description = _props$control$params2.description;
  var htmlDescription = null;
  var inputHtml = null;
  var responsiveHtml = null;

  if (description) {
    htmlDescription = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }

  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
    className: "customize-control-title"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", null, label), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("ul", {
    className: "responsive-switchers"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
    className: "desktop"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
    type: "button",
    className: "preview-desktop active",
    "data-device": "desktop"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
    className: "dashicons dashicons-desktop"
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
    className: "tablet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
    type: "button",
    className: "preview-tablet",
    "data-device": "tablet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
    className: "dashicons dashicons-tablet"
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
    className: "mobile"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
    type: "button",
    className: "preview-mobile",
    "data-device": "mobile"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
    className: "dashicons dashicons-smartphone"
  }))))), inputHtml);
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, responsiveHtml, htmlDescription);
};

DimensionsComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_4___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(DimensionsComponent));

/***/ }),

/***/ "./src/header-type-button/control.js":
/*!*******************************************!*\
  !*** ./src/header-type-button/control.js ***!
  \*******************************************/
/*! exports provided: HeaderTypeButtonControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeaderTypeButtonControl", function() { return HeaderTypeButtonControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _header_type_button_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./header-type-button-component */ "./src/header-type-button/header-type-button-component.js");


var HeaderTypeButtonControl = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_header_type_button_component__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control,
      customizer: wp.customize
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/header-type-button/header-type-button-component.js":
/*!****************************************************************!*\
  !*** ./src/header-type-button/header-type-button-component.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }


var _wp$components = wp.components,
    Dashicon = _wp$components.Dashicon,
    Button = _wp$components.Button;

var HeaderTypeButtonComponent = function HeaderTypeButtonComponent(props) {
  var defaultParams = {
    'section': ''
  };
  var controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.control.params.input_attrs) : defaultParams;

  var focusPanel = function focusPanel(section) {
    if (undefined !== props.customizer.section(section)) {
      props.customizer.section(section).focus();
    }
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "ahfb-control-field ahfb-available-items"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: 'ahfb-builder-item-start'
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Button, {
    className: "ahfb-builder-item",
    onClick: function onClick() {
      return focusPanel(controlParams.section);
    },
    "data-section": controlParams.section
  }, controlParams.label ? controlParams.label : '', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "ahfb-builder-item-icon"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Dashicon, {
    icon: "arrow-right-alt2"
  })))));
};

HeaderTypeButtonComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.func.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(HeaderTypeButtonComponent));

/***/ }),

/***/ "./src/heading/control.js":
/*!********************************!*\
  !*** ./src/heading/control.js ***!
  \********************************/
/*! exports provided: responsiveHeading */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveHeading", function() { return responsiveHeading; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _heading_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./heading-component.js */ "./src/heading/heading-component.js");


var responsiveHeading = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_heading_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/heading/heading-component.js":
/*!******************************************!*\
  !*** ./src/heading/heading-component.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);



var HeadingComponent = function HeadingComponent(props) {
  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      description = _props$control$params.description;
  var labelHtml = null;
  var descriptionHtml = null;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h4", {
      className: "responsive-customizer-heading"
    }, label);
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "description"
    }, description);
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, labelHtml, descriptionHtml);
};

HeadingComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(HeadingComponent));

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _customizer_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./customizer.js */ "./src/customizer.js");
/* harmony import */ var _customizer_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_customizer_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _core_control__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./core/control */ "./src/core/control.js");
/* harmony import */ var _sortable_control__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./sortable/control */ "./src/sortable/control.js");
/* harmony import */ var _slider_control__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./slider/control */ "./src/slider/control.js");
/* harmony import */ var _text_control__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./text/control */ "./src/text/control.js");
/* harmony import */ var _heading_control__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./heading/control */ "./src/heading/control.js");
/* harmony import */ var _select_control__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./select/control */ "./src/select/control.js");
/* harmony import */ var _checkbox_control__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./checkbox/control */ "./src/checkbox/control.js");
/* harmony import */ var _palette_control__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./palette/control */ "./src/palette/control.js");
/* harmony import */ var _typography_control__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./typography/control */ "./src/typography/control.js");
/* harmony import */ var _dimensions_control__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./dimensions/control */ "./src/dimensions/control.js");
/* harmony import */ var _color_control__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./color/control */ "./src/color/control.js");
/* harmony import */ var _redirect_control__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./redirect/control */ "./src/redirect/control.js");
/* harmony import */ var _builder_layout_control__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./builder-layout/control */ "./src/builder-layout/control.js");
/* harmony import */ var _builder_layout_builder_header_control__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./builder-layout/builder-header-control */ "./src/builder-layout/builder-header-control.js");
/* harmony import */ var _header_type_button_control__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./header-type-button/control */ "./src/header-type-button/control.js");
/* harmony import */ var _tabs_control_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./tabs/control.js */ "./src/tabs/control.js");

















wp.customize.controlConstructor['responsive-sortable'] = _sortable_control__WEBPACK_IMPORTED_MODULE_2__["responsiveSortable"];
wp.customize.controlConstructor['responsive-range'] = _slider_control__WEBPACK_IMPORTED_MODULE_3__["responsiveSlider"];
wp.customize.controlConstructor['responsive-text'] = _text_control__WEBPACK_IMPORTED_MODULE_4__["responsiveText"];
wp.customize.controlConstructor['responsive-heading'] = _heading_control__WEBPACK_IMPORTED_MODULE_5__["responsiveHeading"];
wp.customize.controlConstructor['responsive-select'] = _select_control__WEBPACK_IMPORTED_MODULE_6__["responsiveSelect"];
wp.customize.controlConstructor['responsive-checkbox'] = _checkbox_control__WEBPACK_IMPORTED_MODULE_7__["responsiveCheckbox"];
wp.customize.controlConstructor['responsive-palette'] = _palette_control__WEBPACK_IMPORTED_MODULE_8__["responsivePalette"];
wp.customize.controlConstructor['responsive-typography'] = _typography_control__WEBPACK_IMPORTED_MODULE_9__["responsiveTypography"];
wp.customize.controlConstructor['responsive-dimensions'] = _dimensions_control__WEBPACK_IMPORTED_MODULE_10__["responsiveDimensions"];
wp.customize.controlConstructor['alpha-color'] = _color_control__WEBPACK_IMPORTED_MODULE_11__["responsiveColor"];
wp.customize.controlConstructor['responsive-redirect'] = _redirect_control__WEBPACK_IMPORTED_MODULE_12__["responsiveRedirect"];
wp.customize.controlConstructor['responsive-builder'] = _builder_layout_control__WEBPACK_IMPORTED_MODULE_13__["BuilderControl"]; // wp.customize.controlConstructor['responsive-builder-header-control'] = BuilderHeaderControl;

wp.customize.controlConstructor['responsive-header-type-button'] = _header_type_button_control__WEBPACK_IMPORTED_MODULE_15__["HeaderTypeButtonControl"];
wp.customize.controlConstructor['responsive-tab-control'] = _tabs_control_js__WEBPACK_IMPORTED_MODULE_16__["TabsControl"];

/***/ }),

/***/ "./src/palette/control.js":
/*!********************************!*\
  !*** ./src/palette/control.js ***!
  \********************************/
/*! exports provided: responsivePalette */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsivePalette", function() { return responsivePalette; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _palette_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./palette-component.js */ "./src/palette/palette-component.js");


var responsivePalette = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_palette_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/palette/palette-component.js":
/*!******************************************!*\
  !*** ./src/palette/palette-component.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);




var PaletteComponent = function PaletteComponent(props) {
  var _props$control$params = props.control.params,
      id = _props$control$params.id,
      choices = _props$control$params.choices,
      palette_type = _props$control$params.palette_type,
      label = _props$control$params.label,
      description = _props$control$params.description,
      link = _props$control$params.link;
  var htmlLabel = null;
  var descriptionHtml = null;
  var paletteTypeCheck = "default";
  var paletteDisplayImage = null;

  if (!choices) {
    return;
  }

  if (label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "customize-control-description"
    }, description);
  }

  if (palette_type === "color-scheme") {
    paletteTypeCheck = "color_scheme";
  }

  var linkNew = link;

  if (undefined !== linkNew) {
    var splited_values = linkNew.split("=");

    if (undefined !== splited_values[1]) {
      linkNew = splited_values[1].replace(/"/g, "");
    }
  }

  var optionsHtml = Object.keys(choices).map(function (choice) {
    if (choices[choice].preview_image) {
      paletteDisplayImage = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
        src: choices[choice].preview_image
      });
    } else {
      paletteDisplayImage = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
        className: "color-scheme",
        style: {
          background: "linear-gradient(to right, ".concat(choices[choice].accent, ", ").concat(choices[choice].accent, " 33.33%, ").concat(choices[choice].text, " 33.33%, ").concat(choices[choice].text, " 66.66%, ").concat(choices[choice].alt_background, " 66.66%, ").concat(choices[choice].alt_background, " 100%)")
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
        className: "color-scheme__check"
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
        className: "label"
      }, choices[choice].label));
    }

    var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("label", {
      key: choice,
      htmlFor: "".concat(id, "-").concat(choice),
      className: "palette__choice"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "screen-reader-text"
    }, choices[choice].label, " design style"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("input", {
      type: "radio",
      value: choice,
      name: "_customize-".concat(id),
      id: "".concat(id, "-").concat(choice),
      className: "layout",
      "data-customize-setting-link": linkNew
    }), paletteDisplayImage);
    return html;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, htmlLabel, descriptionHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    role: "group",
    className: "palette__wrapper ".concat(paletteTypeCheck)
  }, optionsHtml));
};

PaletteComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(PaletteComponent));

/***/ }),

/***/ "./src/redirect/control.js":
/*!*********************************!*\
  !*** ./src/redirect/control.js ***!
  \*********************************/
/*! exports provided: responsiveRedirect */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveRedirect", function() { return responsiveRedirect; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _redirect_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./redirect-component.js */ "./src/redirect/redirect-component.js");


var responsiveRedirect = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_redirect_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/redirect/redirect-component.js":
/*!********************************************!*\
  !*** ./src/redirect/redirect-component.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);



var RedirectComponent = function RedirectComponent(props) {
  var onLinkClick = function onLinkClick() {
    var _props$control$params = props.control.params,
        linked = _props$control$params.linked,
        link_type = _props$control$params.link_type;

    switch (link_type) {
      case 'section':
        var section = wp.customize.section(linked);
        section.expand();
        break;

      case 'control':
        wp.customize.control(linked).focus();
        break;

      default:
        break;
    }
  };

  var _props$control$params2 = props.control.params,
      label = _props$control$params2.label,
      link_type = _props$control$params2.link_type,
      linked = _props$control$params2.linked;
  var linkHtml = null;

  if (linked && label) {
    linkHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: "#",
      onClick: function onClick() {
        onLinkClick();
      },
      className: "customizer-link customizer-redirect-button",
      "data-customizer-linked": linked,
      "data-res-customizer-link-type": link_type
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h3", {
      className: "redirect-button-label"
    }, label));
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, linkHtml);
};

RedirectComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RedirectComponent));

/***/ }),

/***/ "./src/select/control.js":
/*!*******************************!*\
  !*** ./src/select/control.js ***!
  \*******************************/
/*! exports provided: responsiveSelect */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveSelect", function() { return responsiveSelect; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _select_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./select-component.js */ "./src/select/select-component.js");


var responsiveSelect = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_select_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/select/select-component.js":
/*!****************************************!*\
  !*** ./src/select/select-component.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);





var SelectComponent = function SelectComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.control.setting.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var onSelectChange = function onSelectChange(value) {
    setPropsValue(value);
    props.control.setting.set(value);
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      name = _props$control$params.name,
      choices = _props$control$params.choices,
      description = _props$control$params.description,
      id = _props$control$params.id;
  var htmlLabel = null;
  var descriptionHtml = null;

  if (label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: id,
      className: "customize-control-title"
    }, label);
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }

  var optionsHtml = Object.entries(choices).map(function (key) {
    var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("option", {
      key: key[0],
      value: key[0]
    }, key[1]);
    return html;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, htmlLabel, descriptionHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("select", {
    "data-name": name,
    "data-value": props_value,
    value: props_value,
    onChange: function onChange() {
      onSelectChange(event.target.value);
    }
  }, optionsHtml));
};

SelectComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SelectComponent));

/***/ }),

/***/ "./src/slider/control.js":
/*!*******************************!*\
  !*** ./src/slider/control.js ***!
  \*******************************/
/*! exports provided: responsiveSlider */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveSlider", function() { return responsiveSlider; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _slider_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./slider-component.js */ "./src/slider/slider-component.js");


var responsiveSlider = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_slider_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/slider/slider-component.js":
/*!****************************************!*\
  !*** ./src/slider/slider-component.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);







var ResponsiveSliderComponent = function ResponsiveSliderComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])(props.control.setting.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      description = _props$control$params.description,
      link = _props$control$params.link,
      inputAttrs = _props$control$params.inputAttrs,
      name = _props$control$params.name;

  var labelHtml = null,
      descriptionHtml = null,
      inp_array = [],
      reset = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Back to default', 'responsive');

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "customize-control-title"
    }, label));
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "description customize-control-description"
    }, description);
  }

  if (undefined !== inputAttrs) {
    var splited_values = inputAttrs.split(" ");
    splited_values.map(function (item, i) {
      var item_values = item.split("=");

      if (undefined !== item_values[1]) {
        inp_array[item_values[0]] = item_values[1].replace(/"/g, "");
      }
    });
  }

  if (undefined !== link) {
    var _splited_values = link.split(" ");

    _splited_values.map(function (item, i) {
      var item_values = item.split("=");

      if (undefined !== item_values[1]) {
        inp_array[item_values[0]] = item_values[1].replace(/"/g, "");
      }
    });
  }

  var updateValues = function updateValues(value) {
    setPropsValue(value);
    props.control.setting.set(value);
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", null, labelHtml, descriptionHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "desktop control-wrap active"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("input", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inp_array, {
    type: "range",
    value: props_value,
    "data-reset_value": props.control.params.default,
    onChange: function onChange() {
      return updateValues(event.target.value);
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("input", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inp_array, {
    type: "number",
    "data-name": name,
    className: "responsive-range-input",
    value: props_value,
    onChange: function onChange() {
      return updateValues(event.target.value);
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "responsive-reset-slider",
    onClick: function onClick() {
      updateValues(props.control.params.default);
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "responsive-reset-slider"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "dashicons dashicons-image-rotate",
    title: reset
  })))));
};

ResponsiveSliderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ResponsiveSliderComponent));

/***/ }),

/***/ "./src/sortable/control.js":
/*!*********************************!*\
  !*** ./src/sortable/control.js ***!
  \*********************************/
/*! exports provided: responsiveSortable */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveSortable", function() { return responsiveSortable; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _sortable_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sortable-component.js */ "./src/sortable/sortable-component.js");


/**
 * Sort JS
 *
 * @package Responsive WordPress theme
 *
 * This file includes several helper functions and the core control JS.
 */

var responsiveSortable = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_sortable_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    'use strict';

    var control = this; // Set the sortable container.

    control.sortableContainer = control.container.find('ul.sortable').first(); // Init sortable.

    control.sortableContainer.sortable({
      // Update value when we stop sorting.
      stop: function stop() {
        control.updateValue();
      }
    }).disableSelection().find('li').each(function () {
      // Enable/disable options when we click on the eye of Thundera.
      jQuery(this).find('i.visibility').click(function () {
        jQuery(this).toggleClass('dashicons-visibility-faint').parents('li:eq(0)').toggleClass('invisible');
      });
    }).click(function () {
      // Update value on click.
      control.updateValue();
    });
  },

  /**
   * Updates the sorting list
   */
  updateValue: function updateValue() {
    'use strict';

    var control = this,
        choices = control.params.choices,
        newValue = [];
    this.sortableContainer.find('li').each(function () {
      if (!jQuery(this).is('.invisible')) {
        newValue.push(jQuery(this).data('value'));
      }
    });
    control.setting.set(newValue);
  }
});

/***/ }),

/***/ "./src/sortable/sortable-component.js":
/*!********************************************!*\
  !*** ./src/sortable/sortable-component.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);




var SortableComponent = function SortableComponent(props) {
  var labelHtml = null,
      descriptionHtml = null;
  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      description = _props$control$params.description,
      value = _props$control$params.value,
      choices = _props$control$params.choices,
      inputAttrs = _props$control$params.inputAttrs;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "description customize-control-description"
    }, description);
  }

  var visibleMetaHtml = Object.values(value).map(function (choiceID) {
    var html = '';

    if (choices[choiceID]) {
      html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("li", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inputAttrs, {
        key: choiceID,
        className: "responsive-sortable-item",
        "data-value": choiceID
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-menu"
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-visibility visibility"
      }), choices[choiceID]);
    }

    return html;
  });
  var invisibleMetaHtml = Object.keys(choices).map(function (choiceID) {
    var html = '';

    if (Array.isArray(value) && -1 === value.indexOf(choiceID)) {
      html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("li", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inputAttrs, {
        key: choiceID,
        className: "responsive-sortable-item invisible",
        "data-value": choiceID
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-menu"
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-visibility visibility"
      }), choices[choiceID]);
    }

    return html;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
    className: "responsive-sortable"
  }, labelHtml, descriptionHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("ul", {
    className: "sortable"
  }, visibleMetaHtml, invisibleMetaHtml));
};

SortableComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SortableComponent));

/***/ }),

/***/ "./src/tabs/control.js":
/*!*****************************!*\
  !*** ./src/tabs/control.js ***!
  \*****************************/
/*! exports provided: TabsControl */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/source-map-loader/index.js):\nError: ENOENT: no such file or directory, open 'C:\\Users\\saura\\Local Sites\\responsive-work\\app\\public\\wp-content\\themes\\responsive\\core\\includes\\customizer\\extend-controls\\src\\tabs\\control.js'");

/***/ }),

/***/ "./src/text/control.js":
/*!*****************************!*\
  !*** ./src/text/control.js ***!
  \*****************************/
/*! exports provided: responsiveText */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveText", function() { return responsiveText; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _text_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./text-component.js */ "./src/text/text-component.js");


var responsiveText = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_text_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  // When we're finished loading continue processing.
  ready: function ready() {
    'use strict';

    var control = this; // Save the values.

    control.container.on('change keyup paste', '.desktop input', function () {
      control.settings['desktop'].set(jQuery(this).val());
    });
    control.container.on('change keyup paste', '.tablet input', function () {
      control.settings['tablet'].set(jQuery(this).val());
    });
    control.container.on('change keyup paste', '.mobile input', function () {
      control.settings['mobile'].set(jQuery(this).val());
    });
    control.container.on('click', '.responsive-switchers button', function (event) {
      // Set up variables
      var $this = jQuery(this),
          $devices = jQuery('.responsive-switchers'),
          $device = jQuery(event.currentTarget).data('device'),
          $control = jQuery('.customize-control.has-switchers'),
          $body = jQuery('.wp-full-overlay'),
          $footer_devices = jQuery('.wp-full-overlay-footer .devices'); // Button class

      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active'); // Control class

      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device); // Wrapper class

      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device); // Panel footer buttons

      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true); // Open switchers

      if ($this.hasClass('preview-desktop')) {
        $control.toggleClass('responsive-switchers-open');
      }
    });
  }
});

/***/ }),

/***/ "./src/text/text-component.js":
/*!************************************!*\
  !*** ./src/text/text-component.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }





var TextComponent = function TextComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(props.control.settings),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var onInputChange = function onInputChange(device) {
    var updateValue = _objectSpread({}, props_value);

    updateValue[device].set(event.target.value);
    setPropsValue(updateValue);
  };

  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var _props$control$params = props.control.params,
        desktop = _props$control$params.desktop,
        tablet = _props$control$params.tablet,
        mobile = _props$control$params.mobile;
    var link = device === 'desktop' ? desktop.link : device === 'tablet' ? tablet.link : mobile.link;

    if (undefined !== link) {
      var splited_values = link.split("=");

      if (undefined !== splited_values[1]) {
        link = splited_values[1].replace(/"/g, "");
      }
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "".concat(device, " control-wrap  ").concat(active)
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("input", {
      type: "text",
      "data-customize-setting-link": link,
      placeholder: "px - em - rem",
      value: props_value[device].get(),
      onChange: function onChange() {
        onInputChange(device);
      }
    }));
  };

  var _props$control$params2 = props.control.params,
      description = _props$control$params2.description,
      label = _props$control$params2.label;
  var labelHtml = null;
  var descriptionHtml = null;
  var inputHtml = null;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "customize-control-title"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", null, label), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("ul", {
      className: "responsive-switchers"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("li", {
      className: "desktop"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
      type: "button",
      className: "preview-desktop active",
      "data-device": "desktop"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
      className: "dashicons dashicons-desktop"
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("li", {
      className: "tablet"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
      type: "button",
      className: "preview-tablet",
      "data-device": "tablet"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
      className: "dashicons dashicons-tablet"
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("li", {
      className: "mobile"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
      type: "button",
      className: "preview-mobile",
      "data-device": "mobile"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
      className: "dashicons dashicons-smartphone"
    })))));
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }

  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, labelHtml, inputHtml, descriptionHtml);
};

TextComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TextComponent));

/***/ }),

/***/ "./src/typography/control.js":
/*!***********************************!*\
  !*** ./src/typography/control.js ***!
  \***********************************/
/*! exports provided: responsiveTypography */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveTypography", function() { return responsiveTypography; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _typography_component_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./typography-component.js */ "./src/typography/typography-component.js");


var responsiveTypography = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_typography_component_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    ResponsiveTypography.init();
  }
});

/***/ }),

/***/ "./src/typography/typography-component.js":
/*!************************************************!*\
  !*** ./src/typography/typography-component.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);





var TypographyComponent = function TypographyComponent(props) {
  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      name = _props$control$params.name,
      description = _props$control$params.description,
      all_font_weight = _props$control$params.all_font_weight,
      id = _props$control$params.id,
      connect = _props$control$params.connect,
      resp_inherit = _props$control$params.resp_inherit,
      value = _props$control$params.value,
      link = _props$control$params.link,
      standard_fonts = _props$control$params.standard_fonts,
      google_fonts = _props$control$params.google_fonts,
      custom_fonts = _props$control$params.custom_fonts;
  var htmlLabel = null;
  var descriptionHtml = null;

  if (label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }

  var linkNew = link;

  if (undefined !== linkNew) {
    var splited_values = linkNew.split("=");

    if (undefined !== splited_values[1]) {
      linkNew = splited_values[1].replace(/"/g, "");
    }
  }

  if (id === 'responsive_font_family') {
    var familyDescriptionHtml = null;

    var defaultValue = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Arial, Helvetica, sans-serif', 'responsive');

    var stdFonts = standard_fonts;
    var googleFonts = google_fonts;
    var customFonts = custom_fonts;
    var optgrpOfStandardFonts = null;
    var optgrpOfCustomFonts = null;
    var optgrpOfGoogleFonts = null;

    var optgrpOfStandardFontsLabel = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Standard Fonts', 'responsive');

    var optgrpOfGoogleFontsLabel = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Google Fonts', 'responsive');

    var optgrpOfCustomFontsLabel = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Custom Fonts', 'responsive-addons-pro');

    var standardFontsOptionsHtml = null;
    var googleFontsOptionsHtml = null;
    var customFontsOptionsHtml = null;

    if (description) {
      familyDescriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
        class: "description customize-control-description"
      }, description);
    }

    if (stdFonts) {
      standardFontsOptionsHtml = Object.entries(stdFonts).map(function (font) {
        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("option", {
          key: font[0],
          value: font[0]
        }, font[0]);
        return html;
      });
    }

    if (googleFonts) {
      googleFontsOptionsHtml = Object.entries(googleFonts).map(function (font) {
        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("option", {
          key: font[0],
          value: "'".concat(font[0], "', ").concat(font[1][1])
        }, font[0]);
        return html;
      });
    }

    if (customFonts) {
      customFontsOptionsHtml = Object.keys(customFonts).map(function (font) {
        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("option", {
          key: font,
          value: font
        }, " ", font, " ");
        return html;
      });
      optgrpOfCustomFonts = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("optgroup", {
        label: optgrpOfCustomFontsLabel
      }, customFontsOptionsHtml);
    }

    optgrpOfStandardFonts = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("optgroup", {
      label: optgrpOfStandardFontsLabel
    }, standardFontsOptionsHtml);
    optgrpOfGoogleFonts = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("optgroup", {
      label: optgrpOfGoogleFontsLabel
    }, googleFontsOptionsHtml);
    var selectHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("select", {
      className: "responsive-typography-select responsive-font-family-select",
      "data-customize-setting-link": linkNew,
      "data-connected-control": connect,
      "data-inherit": resp_inherit,
      "data-value": value,
      "data-name": name
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("option", {
      value: ""
    }, defaultValue), optgrpOfStandardFonts, optgrpOfCustomFonts, optgrpOfGoogleFonts);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("label", null, htmlLabel, familyDescriptionHtml, selectHtml));
  } else if (id === 'responsive_font_weight') {
    var allFonts = all_font_weight;
    var optionsHtml = null;
    optionsHtml = Object.entries(allFonts).map(function (fontWght) {
      var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("option", {
        key: fontWght[0],
        value: fontWght[0]
      }, fontWght[1]);
      return html;
    });

    var _selectHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("select", {
      "data-customize-setting-link": linkNew,
      "data-connected-control": connect,
      "data-inherit": resp_inherit,
      "data-value": value,
      "data-name": name
    }, optionsHtml);

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("label", null, htmlLabel, descriptionHtml, _selectHtml));
  }
};

TypographyComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TypographyComponent));

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["React"]; }());

/***/ }),

/***/ "react-dom":
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["ReactDOM"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map