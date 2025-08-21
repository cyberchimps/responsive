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

/***/ "../../../../node_modules/dompurify/dist/purify.js":
/*!*********************************************************************************************************************************!*\
  !*** C:/Users/mahes/Local Sites/responsive-dev-2/app/public/wp-content/themes/responsive/node_modules/dompurify/dist/purify.js ***!
  \*********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*! @license DOMPurify 2.5.8 | (c) Cure53 and other contributors | Released under the Apache license 2.0 and Mozilla Public License 2.0 | github.com/cure53/DOMPurify/blob/2.5.8/LICENSE */

(function (global, factory) {
   true ? module.exports = factory() :
  undefined;
})(this, (function () { 'use strict';

  function _typeof(obj) {
    "@babel/helpers - typeof";

    return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) {
      return typeof obj;
    } : function (obj) {
      return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    }, _typeof(obj);
  }
  function _setPrototypeOf(o, p) {
    _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
      o.__proto__ = p;
      return o;
    };
    return _setPrototypeOf(o, p);
  }
  function _isNativeReflectConstruct() {
    if (typeof Reflect === "undefined" || !Reflect.construct) return false;
    if (Reflect.construct.sham) return false;
    if (typeof Proxy === "function") return true;
    try {
      Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {}));
      return true;
    } catch (e) {
      return false;
    }
  }
  function _construct(Parent, args, Class) {
    if (_isNativeReflectConstruct()) {
      _construct = Reflect.construct;
    } else {
      _construct = function _construct(Parent, args, Class) {
        var a = [null];
        a.push.apply(a, args);
        var Constructor = Function.bind.apply(Parent, a);
        var instance = new Constructor();
        if (Class) _setPrototypeOf(instance, Class.prototype);
        return instance;
      };
    }
    return _construct.apply(null, arguments);
  }
  function _toConsumableArray(arr) {
    return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
  }
  function _arrayWithoutHoles(arr) {
    if (Array.isArray(arr)) return _arrayLikeToArray(arr);
  }
  function _iterableToArray(iter) {
    if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
  }
  function _unsupportedIterableToArray(o, minLen) {
    if (!o) return;
    if (typeof o === "string") return _arrayLikeToArray(o, minLen);
    var n = Object.prototype.toString.call(o).slice(8, -1);
    if (n === "Object" && o.constructor) n = o.constructor.name;
    if (n === "Map" || n === "Set") return Array.from(o);
    if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
  }
  function _arrayLikeToArray(arr, len) {
    if (len == null || len > arr.length) len = arr.length;
    for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];
    return arr2;
  }
  function _nonIterableSpread() {
    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
  }

  var hasOwnProperty = Object.hasOwnProperty,
    setPrototypeOf = Object.setPrototypeOf,
    isFrozen = Object.isFrozen,
    getPrototypeOf = Object.getPrototypeOf,
    getOwnPropertyDescriptor = Object.getOwnPropertyDescriptor;
  var freeze = Object.freeze,
    seal = Object.seal,
    create = Object.create; // eslint-disable-line import/no-mutable-exports
  var _ref = typeof Reflect !== 'undefined' && Reflect,
    apply = _ref.apply,
    construct = _ref.construct;
  if (!apply) {
    apply = function apply(fun, thisValue, args) {
      return fun.apply(thisValue, args);
    };
  }
  if (!freeze) {
    freeze = function freeze(x) {
      return x;
    };
  }
  if (!seal) {
    seal = function seal(x) {
      return x;
    };
  }
  if (!construct) {
    construct = function construct(Func, args) {
      return _construct(Func, _toConsumableArray(args));
    };
  }
  var arrayForEach = unapply(Array.prototype.forEach);
  var arrayPop = unapply(Array.prototype.pop);
  var arrayPush = unapply(Array.prototype.push);
  var stringToLowerCase = unapply(String.prototype.toLowerCase);
  var stringToString = unapply(String.prototype.toString);
  var stringMatch = unapply(String.prototype.match);
  var stringReplace = unapply(String.prototype.replace);
  var stringIndexOf = unapply(String.prototype.indexOf);
  var stringTrim = unapply(String.prototype.trim);
  var regExpTest = unapply(RegExp.prototype.test);
  var typeErrorCreate = unconstruct(TypeError);
  function unapply(func) {
    return function (thisArg) {
      for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
        args[_key - 1] = arguments[_key];
      }
      return apply(func, thisArg, args);
    };
  }
  function unconstruct(func) {
    return function () {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }
      return construct(func, args);
    };
  }

  /* Add properties to a lookup table */
  function addToSet(set, array, transformCaseFunc) {
    var _transformCaseFunc;
    transformCaseFunc = (_transformCaseFunc = transformCaseFunc) !== null && _transformCaseFunc !== void 0 ? _transformCaseFunc : stringToLowerCase;
    if (setPrototypeOf) {
      // Make 'in' and truthy checks like Boolean(set.constructor)
      // independent of any properties defined on Object.prototype.
      // Prevent prototype setters from intercepting set as a this value.
      setPrototypeOf(set, null);
    }
    var l = array.length;
    while (l--) {
      var element = array[l];
      if (typeof element === 'string') {
        var lcElement = transformCaseFunc(element);
        if (lcElement !== element) {
          // Config presets (e.g. tags.js, attrs.js) are immutable.
          if (!isFrozen(array)) {
            array[l] = lcElement;
          }
          element = lcElement;
        }
      }
      set[element] = true;
    }
    return set;
  }

  /* Shallow clone an object */
  function clone(object) {
    var newObject = create(null);
    var property;
    for (property in object) {
      if (apply(hasOwnProperty, object, [property]) === true) {
        newObject[property] = object[property];
      }
    }
    return newObject;
  }

  /* IE10 doesn't support __lookupGetter__ so lets'
   * simulate it. It also automatically checks
   * if the prop is function or getter and behaves
   * accordingly. */
  function lookupGetter(object, prop) {
    while (object !== null) {
      var desc = getOwnPropertyDescriptor(object, prop);
      if (desc) {
        if (desc.get) {
          return unapply(desc.get);
        }
        if (typeof desc.value === 'function') {
          return unapply(desc.value);
        }
      }
      object = getPrototypeOf(object);
    }
    function fallbackValue(element) {
      console.warn('fallback value for', element);
      return null;
    }
    return fallbackValue;
  }

  var html$1 = freeze(['a', 'abbr', 'acronym', 'address', 'area', 'article', 'aside', 'audio', 'b', 'bdi', 'bdo', 'big', 'blink', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col', 'colgroup', 'content', 'data', 'datalist', 'dd', 'decorator', 'del', 'details', 'dfn', 'dialog', 'dir', 'div', 'dl', 'dt', 'element', 'em', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'img', 'input', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'map', 'mark', 'marquee', 'menu', 'menuitem', 'meter', 'nav', 'nobr', 'ol', 'optgroup', 'option', 'output', 'p', 'picture', 'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'section', 'select', 'shadow', 'small', 'source', 'spacer', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr']);

  // SVG
  var svg$1 = freeze(['svg', 'a', 'altglyph', 'altglyphdef', 'altglyphitem', 'animatecolor', 'animatemotion', 'animatetransform', 'circle', 'clippath', 'defs', 'desc', 'ellipse', 'filter', 'font', 'g', 'glyph', 'glyphref', 'hkern', 'image', 'line', 'lineargradient', 'marker', 'mask', 'metadata', 'mpath', 'path', 'pattern', 'polygon', 'polyline', 'radialgradient', 'rect', 'stop', 'style', 'switch', 'symbol', 'text', 'textpath', 'title', 'tref', 'tspan', 'view', 'vkern']);
  var svgFilters = freeze(['feBlend', 'feColorMatrix', 'feComponentTransfer', 'feComposite', 'feConvolveMatrix', 'feDiffuseLighting', 'feDisplacementMap', 'feDistantLight', 'feFlood', 'feFuncA', 'feFuncB', 'feFuncG', 'feFuncR', 'feGaussianBlur', 'feImage', 'feMerge', 'feMergeNode', 'feMorphology', 'feOffset', 'fePointLight', 'feSpecularLighting', 'feSpotLight', 'feTile', 'feTurbulence']);

  // List of SVG elements that are disallowed by default.
  // We still need to know them so that we can do namespace
  // checks properly in case one wants to add them to
  // allow-list.
  var svgDisallowed = freeze(['animate', 'color-profile', 'cursor', 'discard', 'fedropshadow', 'font-face', 'font-face-format', 'font-face-name', 'font-face-src', 'font-face-uri', 'foreignobject', 'hatch', 'hatchpath', 'mesh', 'meshgradient', 'meshpatch', 'meshrow', 'missing-glyph', 'script', 'set', 'solidcolor', 'unknown', 'use']);
  var mathMl$1 = freeze(['math', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mspace', 'msqrt', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover']);

  // Similarly to SVG, we want to know all MathML elements,
  // even those that we disallow by default.
  var mathMlDisallowed = freeze(['maction', 'maligngroup', 'malignmark', 'mlongdiv', 'mscarries', 'mscarry', 'msgroup', 'mstack', 'msline', 'msrow', 'semantics', 'annotation', 'annotation-xml', 'mprescripts', 'none']);
  var text = freeze(['#text']);

  var html = freeze(['accept', 'action', 'align', 'alt', 'autocapitalize', 'autocomplete', 'autopictureinpicture', 'autoplay', 'background', 'bgcolor', 'border', 'capture', 'cellpadding', 'cellspacing', 'checked', 'cite', 'class', 'clear', 'color', 'cols', 'colspan', 'controls', 'controlslist', 'coords', 'crossorigin', 'datetime', 'decoding', 'default', 'dir', 'disabled', 'disablepictureinpicture', 'disableremoteplayback', 'download', 'draggable', 'enctype', 'enterkeyhint', 'face', 'for', 'headers', 'height', 'hidden', 'high', 'href', 'hreflang', 'id', 'inputmode', 'integrity', 'ismap', 'kind', 'label', 'lang', 'list', 'loading', 'loop', 'low', 'max', 'maxlength', 'media', 'method', 'min', 'minlength', 'multiple', 'muted', 'name', 'nonce', 'noshade', 'novalidate', 'nowrap', 'open', 'optimum', 'pattern', 'placeholder', 'playsinline', 'poster', 'preload', 'pubdate', 'radiogroup', 'readonly', 'rel', 'required', 'rev', 'reversed', 'role', 'rows', 'rowspan', 'spellcheck', 'scope', 'selected', 'shape', 'size', 'sizes', 'span', 'srclang', 'start', 'src', 'srcset', 'step', 'style', 'summary', 'tabindex', 'title', 'translate', 'type', 'usemap', 'valign', 'value', 'width', 'xmlns', 'slot']);
  var svg = freeze(['accent-height', 'accumulate', 'additive', 'alignment-baseline', 'ascent', 'attributename', 'attributetype', 'azimuth', 'basefrequency', 'baseline-shift', 'begin', 'bias', 'by', 'class', 'clip', 'clippathunits', 'clip-path', 'clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'cx', 'cy', 'd', 'dx', 'dy', 'diffuseconstant', 'direction', 'display', 'divisor', 'dur', 'edgemode', 'elevation', 'end', 'fill', 'fill-opacity', 'fill-rule', 'filter', 'filterunits', 'flood-color', 'flood-opacity', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'fx', 'fy', 'g1', 'g2', 'glyph-name', 'glyphref', 'gradientunits', 'gradienttransform', 'height', 'href', 'id', 'image-rendering', 'in', 'in2', 'k', 'k1', 'k2', 'k3', 'k4', 'kerning', 'keypoints', 'keysplines', 'keytimes', 'lang', 'lengthadjust', 'letter-spacing', 'kernelmatrix', 'kernelunitlength', 'lighting-color', 'local', 'marker-end', 'marker-mid', 'marker-start', 'markerheight', 'markerunits', 'markerwidth', 'maskcontentunits', 'maskunits', 'max', 'mask', 'media', 'method', 'mode', 'min', 'name', 'numoctaves', 'offset', 'operator', 'opacity', 'order', 'orient', 'orientation', 'origin', 'overflow', 'paint-order', 'path', 'pathlength', 'patterncontentunits', 'patterntransform', 'patternunits', 'points', 'preservealpha', 'preserveaspectratio', 'primitiveunits', 'r', 'rx', 'ry', 'radius', 'refx', 'refy', 'repeatcount', 'repeatdur', 'restart', 'result', 'rotate', 'scale', 'seed', 'shape-rendering', 'specularconstant', 'specularexponent', 'spreadmethod', 'startoffset', 'stddeviation', 'stitchtiles', 'stop-color', 'stop-opacity', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke', 'stroke-width', 'style', 'surfacescale', 'systemlanguage', 'tabindex', 'targetx', 'targety', 'transform', 'transform-origin', 'text-anchor', 'text-decoration', 'text-rendering', 'textlength', 'type', 'u1', 'u2', 'unicode', 'values', 'viewbox', 'visibility', 'version', 'vert-adv-y', 'vert-origin-x', 'vert-origin-y', 'width', 'word-spacing', 'wrap', 'writing-mode', 'xchannelselector', 'ychannelselector', 'x', 'x1', 'x2', 'xmlns', 'y', 'y1', 'y2', 'z', 'zoomandpan']);
  var mathMl = freeze(['accent', 'accentunder', 'align', 'bevelled', 'close', 'columnsalign', 'columnlines', 'columnspan', 'denomalign', 'depth', 'dir', 'display', 'displaystyle', 'encoding', 'fence', 'frame', 'height', 'href', 'id', 'largeop', 'length', 'linethickness', 'lspace', 'lquote', 'mathbackground', 'mathcolor', 'mathsize', 'mathvariant', 'maxsize', 'minsize', 'movablelimits', 'notation', 'numalign', 'open', 'rowalign', 'rowlines', 'rowspacing', 'rowspan', 'rspace', 'rquote', 'scriptlevel', 'scriptminsize', 'scriptsizemultiplier', 'selection', 'separator', 'separators', 'stretchy', 'subscriptshift', 'supscriptshift', 'symmetric', 'voffset', 'width', 'xmlns']);
  var xml = freeze(['xlink:href', 'xml:id', 'xlink:title', 'xml:space', 'xmlns:xlink']);

  // eslint-disable-next-line unicorn/better-regex
  var MUSTACHE_EXPR = seal(/\{\{[\w\W]*|[\w\W]*\}\}/gm); // Specify template detection regex for SAFE_FOR_TEMPLATES mode
  var ERB_EXPR = seal(/<%[\w\W]*|[\w\W]*%>/gm);
  var TMPLIT_EXPR = seal(/\${[\w\W]*}/gm);
  var DATA_ATTR = seal(/^data-[\-\w.\u00B7-\uFFFF]+$/); // eslint-disable-line no-useless-escape
  var ARIA_ATTR = seal(/^aria-[\-\w]+$/); // eslint-disable-line no-useless-escape
  var IS_ALLOWED_URI = seal(/^(?:(?:(?:f|ht)tps?|mailto|tel|callto|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i // eslint-disable-line no-useless-escape
  );
  var IS_SCRIPT_OR_DATA = seal(/^(?:\w+script|data):/i);
  var ATTR_WHITESPACE = seal(/[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g // eslint-disable-line no-control-regex
  );
  var DOCTYPE_NAME = seal(/^html$/i);
  var CUSTOM_ELEMENT = seal(/^[a-z][.\w]*(-[.\w]+)+$/i);

  var getGlobal = function getGlobal() {
    return typeof window === 'undefined' ? null : window;
  };

  /**
   * Creates a no-op policy for internal use only.
   * Don't export this function outside this module!
   * @param {?TrustedTypePolicyFactory} trustedTypes The policy factory.
   * @param {Document} document The document object (to determine policy name suffix)
   * @return {?TrustedTypePolicy} The policy created (or null, if Trusted Types
   * are not supported).
   */
  var _createTrustedTypesPolicy = function _createTrustedTypesPolicy(trustedTypes, document) {
    if (_typeof(trustedTypes) !== 'object' || typeof trustedTypes.createPolicy !== 'function') {
      return null;
    }

    // Allow the callers to control the unique policy name
    // by adding a data-tt-policy-suffix to the script element with the DOMPurify.
    // Policy creation with duplicate names throws in Trusted Types.
    var suffix = null;
    var ATTR_NAME = 'data-tt-policy-suffix';
    if (document.currentScript && document.currentScript.hasAttribute(ATTR_NAME)) {
      suffix = document.currentScript.getAttribute(ATTR_NAME);
    }
    var policyName = 'dompurify' + (suffix ? '#' + suffix : '');
    try {
      return trustedTypes.createPolicy(policyName, {
        createHTML: function createHTML(html) {
          return html;
        },
        createScriptURL: function createScriptURL(scriptUrl) {
          return scriptUrl;
        }
      });
    } catch (_) {
      // Policy creation failed (most likely another DOMPurify script has
      // already run). Skip creating the policy, as this will only cause errors
      // if TT are enforced.
      console.warn('TrustedTypes policy ' + policyName + ' could not be created.');
      return null;
    }
  };
  function createDOMPurify() {
    var window = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : getGlobal();
    var DOMPurify = function DOMPurify(root) {
      return createDOMPurify(root);
    };

    /**
     * Version label, exposed for easier checks
     * if DOMPurify is up to date or not
     */
    DOMPurify.version = '2.5.8';

    /**
     * Array of elements that DOMPurify removed during sanitation.
     * Empty if nothing was removed.
     */
    DOMPurify.removed = [];
    if (!window || !window.document || window.document.nodeType !== 9) {
      // Not running in a browser, provide a factory function
      // so that you can pass your own Window
      DOMPurify.isSupported = false;
      return DOMPurify;
    }
    var originalDocument = window.document;
    var document = window.document;
    var DocumentFragment = window.DocumentFragment,
      HTMLTemplateElement = window.HTMLTemplateElement,
      Node = window.Node,
      Element = window.Element,
      NodeFilter = window.NodeFilter,
      _window$NamedNodeMap = window.NamedNodeMap,
      NamedNodeMap = _window$NamedNodeMap === void 0 ? window.NamedNodeMap || window.MozNamedAttrMap : _window$NamedNodeMap,
      HTMLFormElement = window.HTMLFormElement,
      DOMParser = window.DOMParser,
      trustedTypes = window.trustedTypes;
    var ElementPrototype = Element.prototype;
    var cloneNode = lookupGetter(ElementPrototype, 'cloneNode');
    var getNextSibling = lookupGetter(ElementPrototype, 'nextSibling');
    var getChildNodes = lookupGetter(ElementPrototype, 'childNodes');
    var getParentNode = lookupGetter(ElementPrototype, 'parentNode');

    // As per issue #47, the web-components registry is inherited by a
    // new document created via createHTMLDocument. As per the spec
    // (http://w3c.github.io/webcomponents/spec/custom/#creating-and-passing-registries)
    // a new empty registry is used when creating a template contents owner
    // document, so we use that as our parent document to ensure nothing
    // is inherited.
    if (typeof HTMLTemplateElement === 'function') {
      var template = document.createElement('template');
      if (template.content && template.content.ownerDocument) {
        document = template.content.ownerDocument;
      }
    }
    var trustedTypesPolicy = _createTrustedTypesPolicy(trustedTypes, originalDocument);
    var emptyHTML = trustedTypesPolicy ? trustedTypesPolicy.createHTML('') : '';
    var _document = document,
      implementation = _document.implementation,
      createNodeIterator = _document.createNodeIterator,
      createDocumentFragment = _document.createDocumentFragment,
      getElementsByTagName = _document.getElementsByTagName;
    var importNode = originalDocument.importNode;
    var documentMode = {};
    try {
      documentMode = clone(document).documentMode ? document.documentMode : {};
    } catch (_) {}
    var hooks = {};

    /**
     * Expose whether this browser supports running the full DOMPurify.
     */
    DOMPurify.isSupported = typeof getParentNode === 'function' && implementation && implementation.createHTMLDocument !== undefined && documentMode !== 9;
    var MUSTACHE_EXPR$1 = MUSTACHE_EXPR,
      ERB_EXPR$1 = ERB_EXPR,
      TMPLIT_EXPR$1 = TMPLIT_EXPR,
      DATA_ATTR$1 = DATA_ATTR,
      ARIA_ATTR$1 = ARIA_ATTR,
      IS_SCRIPT_OR_DATA$1 = IS_SCRIPT_OR_DATA,
      ATTR_WHITESPACE$1 = ATTR_WHITESPACE,
      CUSTOM_ELEMENT$1 = CUSTOM_ELEMENT;
    var IS_ALLOWED_URI$1 = IS_ALLOWED_URI;

    /**
     * We consider the elements and attributes below to be safe. Ideally
     * don't add any new ones but feel free to remove unwanted ones.
     */

    /* allowed element names */
    var ALLOWED_TAGS = null;
    var DEFAULT_ALLOWED_TAGS = addToSet({}, [].concat(_toConsumableArray(html$1), _toConsumableArray(svg$1), _toConsumableArray(svgFilters), _toConsumableArray(mathMl$1), _toConsumableArray(text)));

    /* Allowed attribute names */
    var ALLOWED_ATTR = null;
    var DEFAULT_ALLOWED_ATTR = addToSet({}, [].concat(_toConsumableArray(html), _toConsumableArray(svg), _toConsumableArray(mathMl), _toConsumableArray(xml)));

    /*
     * Configure how DOMPUrify should handle custom elements and their attributes as well as customized built-in elements.
     * @property {RegExp|Function|null} tagNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any custom elements)
     * @property {RegExp|Function|null} attributeNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any attributes not on the allow list)
     * @property {boolean} allowCustomizedBuiltInElements allow custom elements derived from built-ins if they pass CUSTOM_ELEMENT_HANDLING.tagNameCheck. Default: `false`.
     */
    var CUSTOM_ELEMENT_HANDLING = Object.seal(Object.create(null, {
      tagNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      attributeNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      allowCustomizedBuiltInElements: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: false
      }
    }));

    /* Explicitly forbidden tags (overrides ALLOWED_TAGS/ADD_TAGS) */
    var FORBID_TAGS = null;

    /* Explicitly forbidden attributes (overrides ALLOWED_ATTR/ADD_ATTR) */
    var FORBID_ATTR = null;

    /* Decide if ARIA attributes are okay */
    var ALLOW_ARIA_ATTR = true;

    /* Decide if custom data attributes are okay */
    var ALLOW_DATA_ATTR = true;

    /* Decide if unknown protocols are okay */
    var ALLOW_UNKNOWN_PROTOCOLS = false;

    /* Decide if self-closing tags in attributes are allowed.
     * Usually removed due to a mXSS issue in jQuery 3.0 */
    var ALLOW_SELF_CLOSE_IN_ATTR = true;

    /* Output should be safe for common template engines.
     * This means, DOMPurify removes data attributes, mustaches and ERB
     */
    var SAFE_FOR_TEMPLATES = false;

    /* Output should be safe even for XML used within HTML and alike.
     * This means, DOMPurify removes comments when containing risky content.
     */
    var SAFE_FOR_XML = true;

    /* Decide if document with <html>... should be returned */
    var WHOLE_DOCUMENT = false;

    /* Track whether config is already set on this instance of DOMPurify. */
    var SET_CONFIG = false;

    /* Decide if all elements (e.g. style, script) must be children of
     * document.body. By default, browsers might move them to document.head */
    var FORCE_BODY = false;

    /* Decide if a DOM `HTMLBodyElement` should be returned, instead of a html
     * string (or a TrustedHTML object if Trusted Types are supported).
     * If `WHOLE_DOCUMENT` is enabled a `HTMLHtmlElement` will be returned instead
     */
    var RETURN_DOM = false;

    /* Decide if a DOM `DocumentFragment` should be returned, instead of a html
     * string  (or a TrustedHTML object if Trusted Types are supported) */
    var RETURN_DOM_FRAGMENT = false;

    /* Try to return a Trusted Type object instead of a string, return a string in
     * case Trusted Types are not supported  */
    var RETURN_TRUSTED_TYPE = false;

    /* Output should be free from DOM clobbering attacks?
     * This sanitizes markups named with colliding, clobberable built-in DOM APIs.
     */
    var SANITIZE_DOM = true;

    /* Achieve full DOM Clobbering protection by isolating the namespace of named
     * properties and JS variables, mitigating attacks that abuse the HTML/DOM spec rules.
     *
     * HTML/DOM spec rules that enable DOM Clobbering:
     *   - Named Access on Window (§7.3.3)
     *   - DOM Tree Accessors (§3.1.5)
     *   - Form Element Parent-Child Relations (§4.10.3)
     *   - Iframe srcdoc / Nested WindowProxies (§4.8.5)
     *   - HTMLCollection (§4.2.10.2)
     *
     * Namespace isolation is implemented by prefixing `id` and `name` attributes
     * with a constant string, i.e., `user-content-`
     */
    var SANITIZE_NAMED_PROPS = false;
    var SANITIZE_NAMED_PROPS_PREFIX = 'user-content-';

    /* Keep element content when removing element? */
    var KEEP_CONTENT = true;

    /* If a `Node` is passed to sanitize(), then performs sanitization in-place instead
     * of importing it into a new Document and returning a sanitized copy */
    var IN_PLACE = false;

    /* Allow usage of profiles like html, svg and mathMl */
    var USE_PROFILES = {};

    /* Tags to ignore content of when KEEP_CONTENT is true */
    var FORBID_CONTENTS = null;
    var DEFAULT_FORBID_CONTENTS = addToSet({}, ['annotation-xml', 'audio', 'colgroup', 'desc', 'foreignobject', 'head', 'iframe', 'math', 'mi', 'mn', 'mo', 'ms', 'mtext', 'noembed', 'noframes', 'noscript', 'plaintext', 'script', 'style', 'svg', 'template', 'thead', 'title', 'video', 'xmp']);

    /* Tags that are safe for data: URIs */
    var DATA_URI_TAGS = null;
    var DEFAULT_DATA_URI_TAGS = addToSet({}, ['audio', 'video', 'img', 'source', 'image', 'track']);

    /* Attributes safe for values like "javascript:" */
    var URI_SAFE_ATTRIBUTES = null;
    var DEFAULT_URI_SAFE_ATTRIBUTES = addToSet({}, ['alt', 'class', 'for', 'id', 'label', 'name', 'pattern', 'placeholder', 'role', 'summary', 'title', 'value', 'style', 'xmlns']);
    var MATHML_NAMESPACE = 'http://www.w3.org/1998/Math/MathML';
    var SVG_NAMESPACE = 'http://www.w3.org/2000/svg';
    var HTML_NAMESPACE = 'http://www.w3.org/1999/xhtml';
    /* Document namespace */
    var NAMESPACE = HTML_NAMESPACE;
    var IS_EMPTY_INPUT = false;

    /* Allowed XHTML+XML namespaces */
    var ALLOWED_NAMESPACES = null;
    var DEFAULT_ALLOWED_NAMESPACES = addToSet({}, [MATHML_NAMESPACE, SVG_NAMESPACE, HTML_NAMESPACE], stringToString);

    /* Parsing of strict XHTML documents */
    var PARSER_MEDIA_TYPE;
    var SUPPORTED_PARSER_MEDIA_TYPES = ['application/xhtml+xml', 'text/html'];
    var DEFAULT_PARSER_MEDIA_TYPE = 'text/html';
    var transformCaseFunc;

    /* Keep a reference to config to pass to hooks */
    var CONFIG = null;

    /* Ideally, do not touch anything below this line */
    /* ______________________________________________ */

    var formElement = document.createElement('form');
    var isRegexOrFunction = function isRegexOrFunction(testValue) {
      return testValue instanceof RegExp || testValue instanceof Function;
    };

    /**
     * _parseConfig
     *
     * @param  {Object} cfg optional config literal
     */
    // eslint-disable-next-line complexity
    var _parseConfig = function _parseConfig(cfg) {
      if (CONFIG && CONFIG === cfg) {
        return;
      }

      /* Shield configuration object from tampering */
      if (!cfg || _typeof(cfg) !== 'object') {
        cfg = {};
      }

      /* Shield configuration object from prototype pollution */
      cfg = clone(cfg);
      PARSER_MEDIA_TYPE =
      // eslint-disable-next-line unicorn/prefer-includes
      SUPPORTED_PARSER_MEDIA_TYPES.indexOf(cfg.PARSER_MEDIA_TYPE) === -1 ? PARSER_MEDIA_TYPE = DEFAULT_PARSER_MEDIA_TYPE : PARSER_MEDIA_TYPE = cfg.PARSER_MEDIA_TYPE;

      // HTML tags and attributes are not case-sensitive, converting to lowercase. Keeping XHTML as is.
      transformCaseFunc = PARSER_MEDIA_TYPE === 'application/xhtml+xml' ? stringToString : stringToLowerCase;

      /* Set configuration parameters */
      ALLOWED_TAGS = 'ALLOWED_TAGS' in cfg ? addToSet({}, cfg.ALLOWED_TAGS, transformCaseFunc) : DEFAULT_ALLOWED_TAGS;
      ALLOWED_ATTR = 'ALLOWED_ATTR' in cfg ? addToSet({}, cfg.ALLOWED_ATTR, transformCaseFunc) : DEFAULT_ALLOWED_ATTR;
      ALLOWED_NAMESPACES = 'ALLOWED_NAMESPACES' in cfg ? addToSet({}, cfg.ALLOWED_NAMESPACES, stringToString) : DEFAULT_ALLOWED_NAMESPACES;
      URI_SAFE_ATTRIBUTES = 'ADD_URI_SAFE_ATTR' in cfg ? addToSet(clone(DEFAULT_URI_SAFE_ATTRIBUTES),
      // eslint-disable-line indent
      cfg.ADD_URI_SAFE_ATTR,
      // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_URI_SAFE_ATTRIBUTES;
      DATA_URI_TAGS = 'ADD_DATA_URI_TAGS' in cfg ? addToSet(clone(DEFAULT_DATA_URI_TAGS),
      // eslint-disable-line indent
      cfg.ADD_DATA_URI_TAGS,
      // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_DATA_URI_TAGS;
      FORBID_CONTENTS = 'FORBID_CONTENTS' in cfg ? addToSet({}, cfg.FORBID_CONTENTS, transformCaseFunc) : DEFAULT_FORBID_CONTENTS;
      FORBID_TAGS = 'FORBID_TAGS' in cfg ? addToSet({}, cfg.FORBID_TAGS, transformCaseFunc) : {};
      FORBID_ATTR = 'FORBID_ATTR' in cfg ? addToSet({}, cfg.FORBID_ATTR, transformCaseFunc) : {};
      USE_PROFILES = 'USE_PROFILES' in cfg ? cfg.USE_PROFILES : false;
      ALLOW_ARIA_ATTR = cfg.ALLOW_ARIA_ATTR !== false; // Default true
      ALLOW_DATA_ATTR = cfg.ALLOW_DATA_ATTR !== false; // Default true
      ALLOW_UNKNOWN_PROTOCOLS = cfg.ALLOW_UNKNOWN_PROTOCOLS || false; // Default false
      ALLOW_SELF_CLOSE_IN_ATTR = cfg.ALLOW_SELF_CLOSE_IN_ATTR !== false; // Default true
      SAFE_FOR_TEMPLATES = cfg.SAFE_FOR_TEMPLATES || false; // Default false
      SAFE_FOR_XML = cfg.SAFE_FOR_XML !== false; // Default true
      WHOLE_DOCUMENT = cfg.WHOLE_DOCUMENT || false; // Default false
      RETURN_DOM = cfg.RETURN_DOM || false; // Default false
      RETURN_DOM_FRAGMENT = cfg.RETURN_DOM_FRAGMENT || false; // Default false
      RETURN_TRUSTED_TYPE = cfg.RETURN_TRUSTED_TYPE || false; // Default false
      FORCE_BODY = cfg.FORCE_BODY || false; // Default false
      SANITIZE_DOM = cfg.SANITIZE_DOM !== false; // Default true
      SANITIZE_NAMED_PROPS = cfg.SANITIZE_NAMED_PROPS || false; // Default false
      KEEP_CONTENT = cfg.KEEP_CONTENT !== false; // Default true
      IN_PLACE = cfg.IN_PLACE || false; // Default false
      IS_ALLOWED_URI$1 = cfg.ALLOWED_URI_REGEXP || IS_ALLOWED_URI$1;
      NAMESPACE = cfg.NAMESPACE || HTML_NAMESPACE;
      CUSTOM_ELEMENT_HANDLING = cfg.CUSTOM_ELEMENT_HANDLING || {};
      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.tagNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck;
      }
      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.attributeNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck;
      }
      if (cfg.CUSTOM_ELEMENT_HANDLING && typeof cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements === 'boolean') {
        CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements = cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements;
      }
      if (SAFE_FOR_TEMPLATES) {
        ALLOW_DATA_ATTR = false;
      }
      if (RETURN_DOM_FRAGMENT) {
        RETURN_DOM = true;
      }

      /* Parse profile info */
      if (USE_PROFILES) {
        ALLOWED_TAGS = addToSet({}, _toConsumableArray(text));
        ALLOWED_ATTR = [];
        if (USE_PROFILES.html === true) {
          addToSet(ALLOWED_TAGS, html$1);
          addToSet(ALLOWED_ATTR, html);
        }
        if (USE_PROFILES.svg === true) {
          addToSet(ALLOWED_TAGS, svg$1);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }
        if (USE_PROFILES.svgFilters === true) {
          addToSet(ALLOWED_TAGS, svgFilters);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }
        if (USE_PROFILES.mathMl === true) {
          addToSet(ALLOWED_TAGS, mathMl$1);
          addToSet(ALLOWED_ATTR, mathMl);
          addToSet(ALLOWED_ATTR, xml);
        }
      }

      /* Merge configuration parameters */
      if (cfg.ADD_TAGS) {
        if (ALLOWED_TAGS === DEFAULT_ALLOWED_TAGS) {
          ALLOWED_TAGS = clone(ALLOWED_TAGS);
        }
        addToSet(ALLOWED_TAGS, cfg.ADD_TAGS, transformCaseFunc);
      }
      if (cfg.ADD_ATTR) {
        if (ALLOWED_ATTR === DEFAULT_ALLOWED_ATTR) {
          ALLOWED_ATTR = clone(ALLOWED_ATTR);
        }
        addToSet(ALLOWED_ATTR, cfg.ADD_ATTR, transformCaseFunc);
      }
      if (cfg.ADD_URI_SAFE_ATTR) {
        addToSet(URI_SAFE_ATTRIBUTES, cfg.ADD_URI_SAFE_ATTR, transformCaseFunc);
      }
      if (cfg.FORBID_CONTENTS) {
        if (FORBID_CONTENTS === DEFAULT_FORBID_CONTENTS) {
          FORBID_CONTENTS = clone(FORBID_CONTENTS);
        }
        addToSet(FORBID_CONTENTS, cfg.FORBID_CONTENTS, transformCaseFunc);
      }

      /* Add #text in case KEEP_CONTENT is set to true */
      if (KEEP_CONTENT) {
        ALLOWED_TAGS['#text'] = true;
      }

      /* Add html, head and body to ALLOWED_TAGS in case WHOLE_DOCUMENT is true */
      if (WHOLE_DOCUMENT) {
        addToSet(ALLOWED_TAGS, ['html', 'head', 'body']);
      }

      /* Add tbody to ALLOWED_TAGS in case tables are permitted, see #286, #365 */
      if (ALLOWED_TAGS.table) {
        addToSet(ALLOWED_TAGS, ['tbody']);
        delete FORBID_TAGS.tbody;
      }

      // Prevent further manipulation of configuration.
      // Not available in IE8, Safari 5, etc.
      if (freeze) {
        freeze(cfg);
      }
      CONFIG = cfg;
    };
    var MATHML_TEXT_INTEGRATION_POINTS = addToSet({}, ['mi', 'mo', 'mn', 'ms', 'mtext']);
    var HTML_INTEGRATION_POINTS = addToSet({}, ['annotation-xml']);

    // Certain elements are allowed in both SVG and HTML
    // namespace. We need to specify them explicitly
    // so that they don't get erroneously deleted from
    // HTML namespace.
    var COMMON_SVG_AND_HTML_ELEMENTS = addToSet({}, ['title', 'style', 'font', 'a', 'script']);

    /* Keep track of all possible SVG and MathML tags
     * so that we can perform the namespace checks
     * correctly. */
    var ALL_SVG_TAGS = addToSet({}, svg$1);
    addToSet(ALL_SVG_TAGS, svgFilters);
    addToSet(ALL_SVG_TAGS, svgDisallowed);
    var ALL_MATHML_TAGS = addToSet({}, mathMl$1);
    addToSet(ALL_MATHML_TAGS, mathMlDisallowed);

    /**
     *
     *
     * @param  {Element} element a DOM element whose namespace is being checked
     * @returns {boolean} Return false if the element has a
     *  namespace that a spec-compliant parser would never
     *  return. Return true otherwise.
     */
    var _checkValidNamespace = function _checkValidNamespace(element) {
      var parent = getParentNode(element);

      // In JSDOM, if we're inside shadow DOM, then parentNode
      // can be null. We just simulate parent in this case.
      if (!parent || !parent.tagName) {
        parent = {
          namespaceURI: NAMESPACE,
          tagName: 'template'
        };
      }
      var tagName = stringToLowerCase(element.tagName);
      var parentTagName = stringToLowerCase(parent.tagName);
      if (!ALLOWED_NAMESPACES[element.namespaceURI]) {
        return false;
      }
      if (element.namespaceURI === SVG_NAMESPACE) {
        // The only way to switch from HTML namespace to SVG
        // is via <svg>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'svg';
        }

        // The only way to switch from MathML to SVG is via`
        // svg if parent is either <annotation-xml> or MathML
        // text integration points.
        if (parent.namespaceURI === MATHML_NAMESPACE) {
          return tagName === 'svg' && (parentTagName === 'annotation-xml' || MATHML_TEXT_INTEGRATION_POINTS[parentTagName]);
        }

        // We only allow elements that are defined in SVG
        // spec. All others are disallowed in SVG namespace.
        return Boolean(ALL_SVG_TAGS[tagName]);
      }
      if (element.namespaceURI === MATHML_NAMESPACE) {
        // The only way to switch from HTML namespace to MathML
        // is via <math>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'math';
        }

        // The only way to switch from SVG to MathML is via
        // <math> and HTML integration points
        if (parent.namespaceURI === SVG_NAMESPACE) {
          return tagName === 'math' && HTML_INTEGRATION_POINTS[parentTagName];
        }

        // We only allow elements that are defined in MathML
        // spec. All others are disallowed in MathML namespace.
        return Boolean(ALL_MATHML_TAGS[tagName]);
      }
      if (element.namespaceURI === HTML_NAMESPACE) {
        // The only way to switch from SVG to HTML is via
        // HTML integration points, and from MathML to HTML
        // is via MathML text integration points
        if (parent.namespaceURI === SVG_NAMESPACE && !HTML_INTEGRATION_POINTS[parentTagName]) {
          return false;
        }
        if (parent.namespaceURI === MATHML_NAMESPACE && !MATHML_TEXT_INTEGRATION_POINTS[parentTagName]) {
          return false;
        }

        // We disallow tags that are specific for MathML
        // or SVG and should never appear in HTML namespace
        return !ALL_MATHML_TAGS[tagName] && (COMMON_SVG_AND_HTML_ELEMENTS[tagName] || !ALL_SVG_TAGS[tagName]);
      }

      // For XHTML and XML documents that support custom namespaces
      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && ALLOWED_NAMESPACES[element.namespaceURI]) {
        return true;
      }

      // The code should never reach this place (this means
      // that the element somehow got namespace that is not
      // HTML, SVG, MathML or allowed via ALLOWED_NAMESPACES).
      // Return false just in case.
      return false;
    };

    /**
     * _forceRemove
     *
     * @param  {Node} node a DOM node
     */
    var _forceRemove = function _forceRemove(node) {
      arrayPush(DOMPurify.removed, {
        element: node
      });
      try {
        // eslint-disable-next-line unicorn/prefer-dom-node-remove
        node.parentNode.removeChild(node);
      } catch (_) {
        try {
          node.outerHTML = emptyHTML;
        } catch (_) {
          node.remove();
        }
      }
    };

    /**
     * _removeAttribute
     *
     * @param  {String} name an Attribute name
     * @param  {Node} node a DOM node
     */
    var _removeAttribute = function _removeAttribute(name, node) {
      try {
        arrayPush(DOMPurify.removed, {
          attribute: node.getAttributeNode(name),
          from: node
        });
      } catch (_) {
        arrayPush(DOMPurify.removed, {
          attribute: null,
          from: node
        });
      }
      node.removeAttribute(name);

      // We void attribute values for unremovable "is"" attributes
      if (name === 'is' && !ALLOWED_ATTR[name]) {
        if (RETURN_DOM || RETURN_DOM_FRAGMENT) {
          try {
            _forceRemove(node);
          } catch (_) {}
        } else {
          try {
            node.setAttribute(name, '');
          } catch (_) {}
        }
      }
    };

    /**
     * _initDocument
     *
     * @param  {String} dirty a string of dirty markup
     * @return {Document} a DOM, filled with the dirty markup
     */
    var _initDocument = function _initDocument(dirty) {
      /* Create a HTML document */
      var doc;
      var leadingWhitespace;
      if (FORCE_BODY) {
        dirty = '<remove></remove>' + dirty;
      } else {
        /* If FORCE_BODY isn't used, leading whitespace needs to be preserved manually */
        var matches = stringMatch(dirty, /^[\r\n\t ]+/);
        leadingWhitespace = matches && matches[0];
      }
      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && NAMESPACE === HTML_NAMESPACE) {
        // Root of XHTML doc must contain xmlns declaration (see https://www.w3.org/TR/xhtml1/normative.html#strict)
        dirty = '<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>' + dirty + '</body></html>';
      }
      var dirtyPayload = trustedTypesPolicy ? trustedTypesPolicy.createHTML(dirty) : dirty;
      /*
       * Use the DOMParser API by default, fallback later if needs be
       * DOMParser not work for svg when has multiple root element.
       */
      if (NAMESPACE === HTML_NAMESPACE) {
        try {
          doc = new DOMParser().parseFromString(dirtyPayload, PARSER_MEDIA_TYPE);
        } catch (_) {}
      }

      /* Use createHTMLDocument in case DOMParser is not available */
      if (!doc || !doc.documentElement) {
        doc = implementation.createDocument(NAMESPACE, 'template', null);
        try {
          doc.documentElement.innerHTML = IS_EMPTY_INPUT ? emptyHTML : dirtyPayload;
        } catch (_) {
          // Syntax error if dirtyPayload is invalid xml
        }
      }
      var body = doc.body || doc.documentElement;
      if (dirty && leadingWhitespace) {
        body.insertBefore(document.createTextNode(leadingWhitespace), body.childNodes[0] || null);
      }

      /* Work on whole document or just its body */
      if (NAMESPACE === HTML_NAMESPACE) {
        return getElementsByTagName.call(doc, WHOLE_DOCUMENT ? 'html' : 'body')[0];
      }
      return WHOLE_DOCUMENT ? doc.documentElement : body;
    };

    /**
     * _createIterator
     *
     * @param  {Document} root document/fragment to create iterator for
     * @return {Iterator} iterator instance
     */
    var _createIterator = function _createIterator(root) {
      return createNodeIterator.call(root.ownerDocument || root, root,
      // eslint-disable-next-line no-bitwise
      NodeFilter.SHOW_ELEMENT | NodeFilter.SHOW_COMMENT | NodeFilter.SHOW_TEXT | NodeFilter.SHOW_PROCESSING_INSTRUCTION | NodeFilter.SHOW_CDATA_SECTION, null, false);
    };

    /**
     * _isClobbered
     *
     * @param  {Node} elm element to check for clobbering attacks
     * @return {Boolean} true if clobbered, false if safe
     */
    var _isClobbered = function _isClobbered(elm) {
      return elm instanceof HTMLFormElement && (typeof elm.nodeName !== 'string' || typeof elm.textContent !== 'string' || typeof elm.removeChild !== 'function' || !(elm.attributes instanceof NamedNodeMap) || typeof elm.removeAttribute !== 'function' || typeof elm.setAttribute !== 'function' || typeof elm.namespaceURI !== 'string' || typeof elm.insertBefore !== 'function' || typeof elm.hasChildNodes !== 'function');
    };

    /**
     * _isNode
     *
     * @param  {Node} obj object to check whether it's a DOM node
     * @return {Boolean} true is object is a DOM node
     */
    var _isNode = function _isNode(object) {
      return _typeof(Node) === 'object' ? object instanceof Node : object && _typeof(object) === 'object' && typeof object.nodeType === 'number' && typeof object.nodeName === 'string';
    };

    /**
     * _executeHook
     * Execute user configurable hooks
     *
     * @param  {String} entryPoint  Name of the hook's entry point
     * @param  {Node} currentNode node to work on with the hook
     * @param  {Object} data additional hook parameters
     */
    var _executeHook = function _executeHook(entryPoint, currentNode, data) {
      if (!hooks[entryPoint]) {
        return;
      }
      arrayForEach(hooks[entryPoint], function (hook) {
        hook.call(DOMPurify, currentNode, data, CONFIG);
      });
    };

    /**
     * _sanitizeElements
     *
     * @protect nodeName
     * @protect textContent
     * @protect removeChild
     *
     * @param   {Node} currentNode to check for permission to exist
     * @return  {Boolean} true if node was killed, false if left alive
     */
    var _sanitizeElements = function _sanitizeElements(currentNode) {
      var content;

      /* Execute a hook if present */
      _executeHook('beforeSanitizeElements', currentNode, null);

      /* Check if element is clobbered or can clobber */
      if (_isClobbered(currentNode)) {
        _forceRemove(currentNode);
        return true;
      }

      /* Check if tagname contains Unicode */
      if (regExpTest(/[\u0080-\uFFFF]/, currentNode.nodeName)) {
        _forceRemove(currentNode);
        return true;
      }

      /* Now let's check the element's type and name */
      var tagName = transformCaseFunc(currentNode.nodeName);

      /* Execute a hook if present */
      _executeHook('uponSanitizeElement', currentNode, {
        tagName: tagName,
        allowedTags: ALLOWED_TAGS
      });

      /* Detect mXSS attempts abusing namespace confusion */
      if (currentNode.hasChildNodes() && !_isNode(currentNode.firstElementChild) && (!_isNode(currentNode.content) || !_isNode(currentNode.content.firstElementChild)) && regExpTest(/<[/\w]/g, currentNode.innerHTML) && regExpTest(/<[/\w]/g, currentNode.textContent)) {
        _forceRemove(currentNode);
        return true;
      }

      /* Mitigate a problem with templates inside select */
      if (tagName === 'select' && regExpTest(/<template/i, currentNode.innerHTML)) {
        _forceRemove(currentNode);
        return true;
      }

      /* Remove any ocurrence of processing instructions */
      if (currentNode.nodeType === 7) {
        _forceRemove(currentNode);
        return true;
      }

      /* Remove any kind of possibly harmful comments */
      if (SAFE_FOR_XML && currentNode.nodeType === 8 && regExpTest(/<[/\w]/g, currentNode.data)) {
        _forceRemove(currentNode);
        return true;
      }

      /* Remove element if anything forbids its presence */
      if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
        /* Check if we have a custom element to handle */
        if (!FORBID_TAGS[tagName] && _basicCustomElementTest(tagName)) {
          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, tagName)) return false;
          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(tagName)) return false;
        }

        /* Keep content except for bad-listed elements */
        if (KEEP_CONTENT && !FORBID_CONTENTS[tagName]) {
          var parentNode = getParentNode(currentNode) || currentNode.parentNode;
          var childNodes = getChildNodes(currentNode) || currentNode.childNodes;
          if (childNodes && parentNode) {
            var childCount = childNodes.length;
            for (var i = childCount - 1; i >= 0; --i) {
              var childClone = cloneNode(childNodes[i], true);
              childClone.__removalCount = (currentNode.__removalCount || 0) + 1;
              parentNode.insertBefore(childClone, getNextSibling(currentNode));
            }
          }
        }
        _forceRemove(currentNode);
        return true;
      }

      /* Check whether element has a valid namespace */
      if (currentNode instanceof Element && !_checkValidNamespace(currentNode)) {
        _forceRemove(currentNode);
        return true;
      }

      /* Make sure that older browsers don't get fallback-tag mXSS */
      if ((tagName === 'noscript' || tagName === 'noembed' || tagName === 'noframes') && regExpTest(/<\/no(script|embed|frames)/i, currentNode.innerHTML)) {
        _forceRemove(currentNode);
        return true;
      }

      /* Sanitize element content to be template-safe */
      if (SAFE_FOR_TEMPLATES && currentNode.nodeType === 3) {
        /* Get the element's text content */
        content = currentNode.textContent;
        content = stringReplace(content, MUSTACHE_EXPR$1, ' ');
        content = stringReplace(content, ERB_EXPR$1, ' ');
        content = stringReplace(content, TMPLIT_EXPR$1, ' ');
        if (currentNode.textContent !== content) {
          arrayPush(DOMPurify.removed, {
            element: currentNode.cloneNode()
          });
          currentNode.textContent = content;
        }
      }

      /* Execute a hook if present */
      _executeHook('afterSanitizeElements', currentNode, null);
      return false;
    };

    /**
     * _isValidAttribute
     *
     * @param  {string} lcTag Lowercase tag name of containing element.
     * @param  {string} lcName Lowercase attribute name.
     * @param  {string} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid, otherwise false.
     */
    // eslint-disable-next-line complexity
    var _isValidAttribute = function _isValidAttribute(lcTag, lcName, value) {
      /* Make sure attribute cannot clobber */
      if (SANITIZE_DOM && (lcName === 'id' || lcName === 'name') && (value in document || value in formElement)) {
        return false;
      }

      /* Allow valid data-* attributes: At least one character after "-"
          (https://html.spec.whatwg.org/multipage/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes)
          XML-compatible (https://html.spec.whatwg.org/multipage/infrastructure.html#xml-compatible and http://www.w3.org/TR/xml/#d0e804)
          We don't need to check the value; it's always URI safe. */
      if (ALLOW_DATA_ATTR && !FORBID_ATTR[lcName] && regExpTest(DATA_ATTR$1, lcName)) ; else if (ALLOW_ARIA_ATTR && regExpTest(ARIA_ATTR$1, lcName)) ; else if (!ALLOWED_ATTR[lcName] || FORBID_ATTR[lcName]) {
        if (
        // First condition does a very basic check if a) it's basically a valid custom element tagname AND
        // b) if the tagName passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        // and c) if the attribute name passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.attributeNameCheck
        _basicCustomElementTest(lcTag) && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, lcTag) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(lcTag)) && (CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.attributeNameCheck, lcName) || CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.attributeNameCheck(lcName)) ||
        // Alternative, second condition checks if it's an `is`-attribute, AND
        // the value passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        lcName === 'is' && CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, value) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(value))) ; else {
          return false;
        }
        /* Check value is safe. First, is attr inert? If so, is safe */
      } else if (URI_SAFE_ATTRIBUTES[lcName]) ; else if (regExpTest(IS_ALLOWED_URI$1, stringReplace(value, ATTR_WHITESPACE$1, ''))) ; else if ((lcName === 'src' || lcName === 'xlink:href' || lcName === 'href') && lcTag !== 'script' && stringIndexOf(value, 'data:') === 0 && DATA_URI_TAGS[lcTag]) ; else if (ALLOW_UNKNOWN_PROTOCOLS && !regExpTest(IS_SCRIPT_OR_DATA$1, stringReplace(value, ATTR_WHITESPACE$1, ''))) ; else if (value) {
        return false;
      } else ;
      return true;
    };

    /**
     * _basicCustomElementCheck
     * checks if at least one dash is included in tagName, and it's not the first char
     * for more sophisticated checking see https://github.com/sindresorhus/validate-element-name
     * @param {string} tagName name of the tag of the node to sanitize
     */
    var _basicCustomElementTest = function _basicCustomElementTest(tagName) {
      return tagName !== 'annotation-xml' && stringMatch(tagName, CUSTOM_ELEMENT$1);
    };

    /**
     * _sanitizeAttributes
     *
     * @protect attributes
     * @protect nodeName
     * @protect removeAttribute
     * @protect setAttribute
     *
     * @param  {Node} currentNode to sanitize
     */
    var _sanitizeAttributes = function _sanitizeAttributes(currentNode) {
      var attr;
      var value;
      var lcName;
      var l;
      /* Execute a hook if present */
      _executeHook('beforeSanitizeAttributes', currentNode, null);
      var attributes = currentNode.attributes;

      /* Check if we have attributes; if not we might have a text node */
      if (!attributes || _isClobbered(currentNode)) {
        return;
      }
      var hookEvent = {
        attrName: '',
        attrValue: '',
        keepAttr: true,
        allowedAttributes: ALLOWED_ATTR
      };
      l = attributes.length;

      /* Go backwards over all attributes; safely remove bad ones */
      while (l--) {
        attr = attributes[l];
        var _attr = attr,
          name = _attr.name,
          namespaceURI = _attr.namespaceURI;
        value = name === 'value' ? attr.value : stringTrim(attr.value);
        lcName = transformCaseFunc(name);

        /* Execute a hook if present */
        hookEvent.attrName = lcName;
        hookEvent.attrValue = value;
        hookEvent.keepAttr = true;
        hookEvent.forceKeepAttr = undefined; // Allows developers to see this is a property they can set
        _executeHook('uponSanitizeAttribute', currentNode, hookEvent);
        value = hookEvent.attrValue;

        /* Did the hooks approve of the attribute? */
        if (hookEvent.forceKeepAttr) {
          continue;
        }

        /* Remove attribute */
        _removeAttribute(name, currentNode);

        /* Did the hooks approve of the attribute? */
        if (!hookEvent.keepAttr) {
          continue;
        }

        /* Work around a security issue in jQuery 3.0 */
        if (!ALLOW_SELF_CLOSE_IN_ATTR && regExpTest(/\/>/i, value)) {
          _removeAttribute(name, currentNode);
          continue;
        }

        /* Sanitize attribute content to be template-safe */
        if (SAFE_FOR_TEMPLATES) {
          value = stringReplace(value, MUSTACHE_EXPR$1, ' ');
          value = stringReplace(value, ERB_EXPR$1, ' ');
          value = stringReplace(value, TMPLIT_EXPR$1, ' ');
        }

        /* Is `value` valid for this attribute? */
        var lcTag = transformCaseFunc(currentNode.nodeName);
        if (!_isValidAttribute(lcTag, lcName, value)) {
          continue;
        }

        /* Full DOM Clobbering protection via namespace isolation,
         * Prefix id and name attributes with `user-content-`
         */
        if (SANITIZE_NAMED_PROPS && (lcName === 'id' || lcName === 'name')) {
          // Remove the attribute with this value
          _removeAttribute(name, currentNode);

          // Prefix the value and later re-create the attribute with the sanitized value
          value = SANITIZE_NAMED_PROPS_PREFIX + value;
        }

        /* Work around a security issue with comments inside attributes */
        if (SAFE_FOR_XML && regExpTest(/((--!?|])>)|<\/(style|title)/i, value)) {
          _removeAttribute(name, currentNode);
          continue;
        }

        /* Handle attributes that require Trusted Types */
        if (trustedTypesPolicy && _typeof(trustedTypes) === 'object' && typeof trustedTypes.getAttributeType === 'function') {
          if (namespaceURI) ; else {
            switch (trustedTypes.getAttributeType(lcTag, lcName)) {
              case 'TrustedHTML':
                {
                  value = trustedTypesPolicy.createHTML(value);
                  break;
                }
              case 'TrustedScriptURL':
                {
                  value = trustedTypesPolicy.createScriptURL(value);
                  break;
                }
            }
          }
        }

        /* Handle invalid data-* attribute set by try-catching it */
        try {
          if (namespaceURI) {
            currentNode.setAttributeNS(namespaceURI, name, value);
          } else {
            /* Fallback to setAttribute() for browser-unrecognized namespaces e.g. "x-schema". */
            currentNode.setAttribute(name, value);
          }
          if (_isClobbered(currentNode)) {
            _forceRemove(currentNode);
          } else {
            arrayPop(DOMPurify.removed);
          }
        } catch (_) {}
      }

      /* Execute a hook if present */
      _executeHook('afterSanitizeAttributes', currentNode, null);
    };

    /**
     * _sanitizeShadowDOM
     *
     * @param  {DocumentFragment} fragment to iterate over recursively
     */
    var _sanitizeShadowDOM = function _sanitizeShadowDOM(fragment) {
      var shadowNode;
      var shadowIterator = _createIterator(fragment);

      /* Execute a hook if present */
      _executeHook('beforeSanitizeShadowDOM', fragment, null);
      while (shadowNode = shadowIterator.nextNode()) {
        /* Execute a hook if present */
        _executeHook('uponSanitizeShadowNode', shadowNode, null);
        /* Sanitize tags and elements */
        _sanitizeElements(shadowNode);

        /* Check attributes next */
        _sanitizeAttributes(shadowNode);

        /* Deep shadow DOM detected */
        if (shadowNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(shadowNode.content);
        }
      }

      /* Execute a hook if present */
      _executeHook('afterSanitizeShadowDOM', fragment, null);
    };

    /**
     * Sanitize
     * Public method providing core sanitation functionality
     *
     * @param {String|Node} dirty string or DOM node
     * @param {Object} configuration object
     */
    // eslint-disable-next-line complexity
    DOMPurify.sanitize = function (dirty) {
      var cfg = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      var body;
      var importedNode;
      var currentNode;
      var oldNode;
      var returnNode;
      /* Make sure we have a string to sanitize.
        DO NOT return early, as this will return the wrong type if
        the user has requested a DOM object rather than a string */
      IS_EMPTY_INPUT = !dirty;
      if (IS_EMPTY_INPUT) {
        dirty = '<!-->';
      }

      /* Stringify, in case dirty is an object */
      if (typeof dirty !== 'string' && !_isNode(dirty)) {
        if (typeof dirty.toString === 'function') {
          dirty = dirty.toString();
          if (typeof dirty !== 'string') {
            throw typeErrorCreate('dirty is not a string, aborting');
          }
        } else {
          throw typeErrorCreate('toString is not a function');
        }
      }

      /* Check we can run. Otherwise fall back or ignore */
      if (!DOMPurify.isSupported) {
        if (_typeof(window.toStaticHTML) === 'object' || typeof window.toStaticHTML === 'function') {
          if (typeof dirty === 'string') {
            return window.toStaticHTML(dirty);
          }
          if (_isNode(dirty)) {
            return window.toStaticHTML(dirty.outerHTML);
          }
        }
        return dirty;
      }

      /* Assign config vars */
      if (!SET_CONFIG) {
        _parseConfig(cfg);
      }

      /* Clean up removed elements */
      DOMPurify.removed = [];

      /* Check if dirty is correctly typed for IN_PLACE */
      if (typeof dirty === 'string') {
        IN_PLACE = false;
      }
      if (IN_PLACE) {
        /* Do some early pre-sanitization to avoid unsafe root nodes */
        if (dirty.nodeName) {
          var tagName = transformCaseFunc(dirty.nodeName);
          if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
            throw typeErrorCreate('root node is forbidden and cannot be sanitized in-place');
          }
        }
      } else if (dirty instanceof Node) {
        /* If dirty is a DOM element, append to an empty document to avoid
           elements being stripped by the parser */
        body = _initDocument('<!---->');
        importedNode = body.ownerDocument.importNode(dirty, true);
        if (importedNode.nodeType === 1 && importedNode.nodeName === 'BODY') {
          /* Node is already a body, use as is */
          body = importedNode;
        } else if (importedNode.nodeName === 'HTML') {
          body = importedNode;
        } else {
          // eslint-disable-next-line unicorn/prefer-dom-node-append
          body.appendChild(importedNode);
        }
      } else {
        /* Exit directly if we have nothing to do */
        if (!RETURN_DOM && !SAFE_FOR_TEMPLATES && !WHOLE_DOCUMENT &&
        // eslint-disable-next-line unicorn/prefer-includes
        dirty.indexOf('<') === -1) {
          return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(dirty) : dirty;
        }

        /* Initialize the document to work on */
        body = _initDocument(dirty);

        /* Check we have a DOM node from the data */
        if (!body) {
          return RETURN_DOM ? null : RETURN_TRUSTED_TYPE ? emptyHTML : '';
        }
      }

      /* Remove first element node (ours) if FORCE_BODY is set */
      if (body && FORCE_BODY) {
        _forceRemove(body.firstChild);
      }

      /* Get node iterator */
      var nodeIterator = _createIterator(IN_PLACE ? dirty : body);

      /* Now start iterating over the created document */
      while (currentNode = nodeIterator.nextNode()) {
        /* Fix IE's strange behavior with manipulated textNodes #89 */
        if (currentNode.nodeType === 3 && currentNode === oldNode) {
          continue;
        }

        /* Sanitize tags and elements */
        _sanitizeElements(currentNode);

        /* Check attributes next */
        _sanitizeAttributes(currentNode);

        /* Shadow DOM detected, sanitize it */
        if (currentNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(currentNode.content);
        }
        oldNode = currentNode;
      }
      oldNode = null;

      /* If we sanitized `dirty` in-place, return it. */
      if (IN_PLACE) {
        return dirty;
      }

      /* Return sanitized string or DOM */
      if (RETURN_DOM) {
        if (RETURN_DOM_FRAGMENT) {
          returnNode = createDocumentFragment.call(body.ownerDocument);
          while (body.firstChild) {
            // eslint-disable-next-line unicorn/prefer-dom-node-append
            returnNode.appendChild(body.firstChild);
          }
        } else {
          returnNode = body;
        }
        if (ALLOWED_ATTR.shadowroot || ALLOWED_ATTR.shadowrootmod) {
          /*
            AdoptNode() is not used because internal state is not reset
            (e.g. the past names map of a HTMLFormElement), this is safe
            in theory but we would rather not risk another attack vector.
            The state that is cloned by importNode() is explicitly defined
            by the specs.
          */
          returnNode = importNode.call(originalDocument, returnNode, true);
        }
        return returnNode;
      }
      var serializedHTML = WHOLE_DOCUMENT ? body.outerHTML : body.innerHTML;

      /* Serialize doctype if allowed */
      if (WHOLE_DOCUMENT && ALLOWED_TAGS['!doctype'] && body.ownerDocument && body.ownerDocument.doctype && body.ownerDocument.doctype.name && regExpTest(DOCTYPE_NAME, body.ownerDocument.doctype.name)) {
        serializedHTML = '<!DOCTYPE ' + body.ownerDocument.doctype.name + '>\n' + serializedHTML;
      }

      /* Sanitize final string template-safe */
      if (SAFE_FOR_TEMPLATES) {
        serializedHTML = stringReplace(serializedHTML, MUSTACHE_EXPR$1, ' ');
        serializedHTML = stringReplace(serializedHTML, ERB_EXPR$1, ' ');
        serializedHTML = stringReplace(serializedHTML, TMPLIT_EXPR$1, ' ');
      }
      return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(serializedHTML) : serializedHTML;
    };

    /**
     * Public method to set the configuration once
     * setConfig
     *
     * @param {Object} cfg configuration object
     */
    DOMPurify.setConfig = function (cfg) {
      _parseConfig(cfg);
      SET_CONFIG = true;
    };

    /**
     * Public method to remove the configuration
     * clearConfig
     *
     */
    DOMPurify.clearConfig = function () {
      CONFIG = null;
      SET_CONFIG = false;
    };

    /**
     * Public method to check if an attribute value is valid.
     * Uses last set config, if any. Otherwise, uses config defaults.
     * isValidAttribute
     *
     * @param  {string} tag Tag name of containing element.
     * @param  {string} attr Attribute name.
     * @param  {string} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid. Otherwise, returns false.
     */
    DOMPurify.isValidAttribute = function (tag, attr, value) {
      /* Initialize shared config vars if necessary. */
      if (!CONFIG) {
        _parseConfig({});
      }
      var lcTag = transformCaseFunc(tag);
      var lcName = transformCaseFunc(attr);
      return _isValidAttribute(lcTag, lcName, value);
    };

    /**
     * AddHook
     * Public method to add DOMPurify hooks
     *
     * @param {String} entryPoint entry point for the hook to add
     * @param {Function} hookFunction function to execute
     */
    DOMPurify.addHook = function (entryPoint, hookFunction) {
      if (typeof hookFunction !== 'function') {
        return;
      }
      hooks[entryPoint] = hooks[entryPoint] || [];
      arrayPush(hooks[entryPoint], hookFunction);
    };

    /**
     * RemoveHook
     * Public method to remove a DOMPurify hook at a given entryPoint
     * (pops it from the stack of hooks if more are present)
     *
     * @param {String} entryPoint entry point for the hook to remove
     * @return {Function} removed(popped) hook
     */
    DOMPurify.removeHook = function (entryPoint) {
      if (hooks[entryPoint]) {
        return arrayPop(hooks[entryPoint]);
      }
    };

    /**
     * RemoveHooks
     * Public method to remove all DOMPurify hooks at a given entryPoint
     *
     * @param  {String} entryPoint entry point for the hooks to remove
     */
    DOMPurify.removeHooks = function (entryPoint) {
      if (hooks[entryPoint]) {
        hooks[entryPoint] = [];
      }
    };

    /**
     * RemoveAllHooks
     * Public method to remove all DOMPurify hooks
     *
     */
    DOMPurify.removeAllHooks = function () {
      hooks = {};
    };
    return DOMPurify;
  }
  var purify = createDOMPurify();

  return purify;

}));
//# sourceMappingURL=purify.js.map


/***/ }),

/***/ "../../../../node_modules/he/he.js":
/*!*****************************************************************************************************************!*\
  !*** C:/Users/mahes/Local Sites/responsive-dev-2/app/public/wp-content/themes/responsive/node_modules/he/he.js ***!
  \*****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module, global) {var __WEBPACK_AMD_DEFINE_RESULT__;/*! https://mths.be/he v1.2.0 by @mathias | MIT license */
;(function(root) {

	// Detect free variables `exports`.
	var freeExports =  true && exports;

	// Detect free variable `module`.
	var freeModule =  true && module &&
		module.exports == freeExports && module;

	// Detect free variable `global`, from Node.js or Browserified code,
	// and use it as `root`.
	var freeGlobal = typeof global == 'object' && global;
	if (freeGlobal.global === freeGlobal || freeGlobal.window === freeGlobal) {
		root = freeGlobal;
	}

	/*--------------------------------------------------------------------------*/

	// All astral symbols.
	var regexAstralSymbols = /[\uD800-\uDBFF][\uDC00-\uDFFF]/g;
	// All ASCII symbols (not just printable ASCII) except those listed in the
	// first column of the overrides table.
	// https://html.spec.whatwg.org/multipage/syntax.html#table-charref-overrides
	var regexAsciiWhitelist = /[\x01-\x7F]/g;
	// All BMP symbols that are not ASCII newlines, printable ASCII symbols, or
	// code points listed in the first column of the overrides table on
	// https://html.spec.whatwg.org/multipage/syntax.html#table-charref-overrides.
	var regexBmpWhitelist = /[\x01-\t\x0B\f\x0E-\x1F\x7F\x81\x8D\x8F\x90\x9D\xA0-\uFFFF]/g;

	var regexEncodeNonAscii = /<\u20D2|=\u20E5|>\u20D2|\u205F\u200A|\u219D\u0338|\u2202\u0338|\u2220\u20D2|\u2229\uFE00|\u222A\uFE00|\u223C\u20D2|\u223D\u0331|\u223E\u0333|\u2242\u0338|\u224B\u0338|\u224D\u20D2|\u224E\u0338|\u224F\u0338|\u2250\u0338|\u2261\u20E5|\u2264\u20D2|\u2265\u20D2|\u2266\u0338|\u2267\u0338|\u2268\uFE00|\u2269\uFE00|\u226A\u0338|\u226A\u20D2|\u226B\u0338|\u226B\u20D2|\u227F\u0338|\u2282\u20D2|\u2283\u20D2|\u228A\uFE00|\u228B\uFE00|\u228F\u0338|\u2290\u0338|\u2293\uFE00|\u2294\uFE00|\u22B4\u20D2|\u22B5\u20D2|\u22D8\u0338|\u22D9\u0338|\u22DA\uFE00|\u22DB\uFE00|\u22F5\u0338|\u22F9\u0338|\u2933\u0338|\u29CF\u0338|\u29D0\u0338|\u2A6D\u0338|\u2A70\u0338|\u2A7D\u0338|\u2A7E\u0338|\u2AA1\u0338|\u2AA2\u0338|\u2AAC\uFE00|\u2AAD\uFE00|\u2AAF\u0338|\u2AB0\u0338|\u2AC5\u0338|\u2AC6\u0338|\u2ACB\uFE00|\u2ACC\uFE00|\u2AFD\u20E5|[\xA0-\u0113\u0116-\u0122\u0124-\u012B\u012E-\u014D\u0150-\u017E\u0192\u01B5\u01F5\u0237\u02C6\u02C7\u02D8-\u02DD\u0311\u0391-\u03A1\u03A3-\u03A9\u03B1-\u03C9\u03D1\u03D2\u03D5\u03D6\u03DC\u03DD\u03F0\u03F1\u03F5\u03F6\u0401-\u040C\u040E-\u044F\u0451-\u045C\u045E\u045F\u2002-\u2005\u2007-\u2010\u2013-\u2016\u2018-\u201A\u201C-\u201E\u2020-\u2022\u2025\u2026\u2030-\u2035\u2039\u203A\u203E\u2041\u2043\u2044\u204F\u2057\u205F-\u2063\u20AC\u20DB\u20DC\u2102\u2105\u210A-\u2113\u2115-\u211E\u2122\u2124\u2127-\u2129\u212C\u212D\u212F-\u2131\u2133-\u2138\u2145-\u2148\u2153-\u215E\u2190-\u219B\u219D-\u21A7\u21A9-\u21AE\u21B0-\u21B3\u21B5-\u21B7\u21BA-\u21DB\u21DD\u21E4\u21E5\u21F5\u21FD-\u2205\u2207-\u2209\u220B\u220C\u220F-\u2214\u2216-\u2218\u221A\u221D-\u2238\u223A-\u2257\u2259\u225A\u225C\u225F-\u2262\u2264-\u228B\u228D-\u229B\u229D-\u22A5\u22A7-\u22B0\u22B2-\u22BB\u22BD-\u22DB\u22DE-\u22E3\u22E6-\u22F7\u22F9-\u22FE\u2305\u2306\u2308-\u2310\u2312\u2313\u2315\u2316\u231C-\u231F\u2322\u2323\u232D\u232E\u2336\u233D\u233F\u237C\u23B0\u23B1\u23B4-\u23B6\u23DC-\u23DF\u23E2\u23E7\u2423\u24C8\u2500\u2502\u250C\u2510\u2514\u2518\u251C\u2524\u252C\u2534\u253C\u2550-\u256C\u2580\u2584\u2588\u2591-\u2593\u25A1\u25AA\u25AB\u25AD\u25AE\u25B1\u25B3-\u25B5\u25B8\u25B9\u25BD-\u25BF\u25C2\u25C3\u25CA\u25CB\u25EC\u25EF\u25F8-\u25FC\u2605\u2606\u260E\u2640\u2642\u2660\u2663\u2665\u2666\u266A\u266D-\u266F\u2713\u2717\u2720\u2736\u2758\u2772\u2773\u27C8\u27C9\u27E6-\u27ED\u27F5-\u27FA\u27FC\u27FF\u2902-\u2905\u290C-\u2913\u2916\u2919-\u2920\u2923-\u292A\u2933\u2935-\u2939\u293C\u293D\u2945\u2948-\u294B\u294E-\u2976\u2978\u2979\u297B-\u297F\u2985\u2986\u298B-\u2996\u299A\u299C\u299D\u29A4-\u29B7\u29B9\u29BB\u29BC\u29BE-\u29C5\u29C9\u29CD-\u29D0\u29DC-\u29DE\u29E3-\u29E5\u29EB\u29F4\u29F6\u2A00-\u2A02\u2A04\u2A06\u2A0C\u2A0D\u2A10-\u2A17\u2A22-\u2A27\u2A29\u2A2A\u2A2D-\u2A31\u2A33-\u2A3C\u2A3F\u2A40\u2A42-\u2A4D\u2A50\u2A53-\u2A58\u2A5A-\u2A5D\u2A5F\u2A66\u2A6A\u2A6D-\u2A75\u2A77-\u2A9A\u2A9D-\u2AA2\u2AA4-\u2AB0\u2AB3-\u2AC8\u2ACB\u2ACC\u2ACF-\u2ADB\u2AE4\u2AE6-\u2AE9\u2AEB-\u2AF3\u2AFD\uFB00-\uFB04]|\uD835[\uDC9C\uDC9E\uDC9F\uDCA2\uDCA5\uDCA6\uDCA9-\uDCAC\uDCAE-\uDCB9\uDCBB\uDCBD-\uDCC3\uDCC5-\uDCCF\uDD04\uDD05\uDD07-\uDD0A\uDD0D-\uDD14\uDD16-\uDD1C\uDD1E-\uDD39\uDD3B-\uDD3E\uDD40-\uDD44\uDD46\uDD4A-\uDD50\uDD52-\uDD6B]/g;
	var encodeMap = {'\xAD':'shy','\u200C':'zwnj','\u200D':'zwj','\u200E':'lrm','\u2063':'ic','\u2062':'it','\u2061':'af','\u200F':'rlm','\u200B':'ZeroWidthSpace','\u2060':'NoBreak','\u0311':'DownBreve','\u20DB':'tdot','\u20DC':'DotDot','\t':'Tab','\n':'NewLine','\u2008':'puncsp','\u205F':'MediumSpace','\u2009':'thinsp','\u200A':'hairsp','\u2004':'emsp13','\u2002':'ensp','\u2005':'emsp14','\u2003':'emsp','\u2007':'numsp','\xA0':'nbsp','\u205F\u200A':'ThickSpace','\u203E':'oline','_':'lowbar','\u2010':'dash','\u2013':'ndash','\u2014':'mdash','\u2015':'horbar',',':'comma',';':'semi','\u204F':'bsemi',':':'colon','\u2A74':'Colone','!':'excl','\xA1':'iexcl','?':'quest','\xBF':'iquest','.':'period','\u2025':'nldr','\u2026':'mldr','\xB7':'middot','\'':'apos','\u2018':'lsquo','\u2019':'rsquo','\u201A':'sbquo','\u2039':'lsaquo','\u203A':'rsaquo','"':'quot','\u201C':'ldquo','\u201D':'rdquo','\u201E':'bdquo','\xAB':'laquo','\xBB':'raquo','(':'lpar',')':'rpar','[':'lsqb',']':'rsqb','{':'lcub','}':'rcub','\u2308':'lceil','\u2309':'rceil','\u230A':'lfloor','\u230B':'rfloor','\u2985':'lopar','\u2986':'ropar','\u298B':'lbrke','\u298C':'rbrke','\u298D':'lbrkslu','\u298E':'rbrksld','\u298F':'lbrksld','\u2990':'rbrkslu','\u2991':'langd','\u2992':'rangd','\u2993':'lparlt','\u2994':'rpargt','\u2995':'gtlPar','\u2996':'ltrPar','\u27E6':'lobrk','\u27E7':'robrk','\u27E8':'lang','\u27E9':'rang','\u27EA':'Lang','\u27EB':'Rang','\u27EC':'loang','\u27ED':'roang','\u2772':'lbbrk','\u2773':'rbbrk','\u2016':'Vert','\xA7':'sect','\xB6':'para','@':'commat','*':'ast','/':'sol','undefined':null,'&':'amp','#':'num','%':'percnt','\u2030':'permil','\u2031':'pertenk','\u2020':'dagger','\u2021':'Dagger','\u2022':'bull','\u2043':'hybull','\u2032':'prime','\u2033':'Prime','\u2034':'tprime','\u2057':'qprime','\u2035':'bprime','\u2041':'caret','`':'grave','\xB4':'acute','\u02DC':'tilde','^':'Hat','\xAF':'macr','\u02D8':'breve','\u02D9':'dot','\xA8':'die','\u02DA':'ring','\u02DD':'dblac','\xB8':'cedil','\u02DB':'ogon','\u02C6':'circ','\u02C7':'caron','\xB0':'deg','\xA9':'copy','\xAE':'reg','\u2117':'copysr','\u2118':'wp','\u211E':'rx','\u2127':'mho','\u2129':'iiota','\u2190':'larr','\u219A':'nlarr','\u2192':'rarr','\u219B':'nrarr','\u2191':'uarr','\u2193':'darr','\u2194':'harr','\u21AE':'nharr','\u2195':'varr','\u2196':'nwarr','\u2197':'nearr','\u2198':'searr','\u2199':'swarr','\u219D':'rarrw','\u219D\u0338':'nrarrw','\u219E':'Larr','\u219F':'Uarr','\u21A0':'Rarr','\u21A1':'Darr','\u21A2':'larrtl','\u21A3':'rarrtl','\u21A4':'mapstoleft','\u21A5':'mapstoup','\u21A6':'map','\u21A7':'mapstodown','\u21A9':'larrhk','\u21AA':'rarrhk','\u21AB':'larrlp','\u21AC':'rarrlp','\u21AD':'harrw','\u21B0':'lsh','\u21B1':'rsh','\u21B2':'ldsh','\u21B3':'rdsh','\u21B5':'crarr','\u21B6':'cularr','\u21B7':'curarr','\u21BA':'olarr','\u21BB':'orarr','\u21BC':'lharu','\u21BD':'lhard','\u21BE':'uharr','\u21BF':'uharl','\u21C0':'rharu','\u21C1':'rhard','\u21C2':'dharr','\u21C3':'dharl','\u21C4':'rlarr','\u21C5':'udarr','\u21C6':'lrarr','\u21C7':'llarr','\u21C8':'uuarr','\u21C9':'rrarr','\u21CA':'ddarr','\u21CB':'lrhar','\u21CC':'rlhar','\u21D0':'lArr','\u21CD':'nlArr','\u21D1':'uArr','\u21D2':'rArr','\u21CF':'nrArr','\u21D3':'dArr','\u21D4':'iff','\u21CE':'nhArr','\u21D5':'vArr','\u21D6':'nwArr','\u21D7':'neArr','\u21D8':'seArr','\u21D9':'swArr','\u21DA':'lAarr','\u21DB':'rAarr','\u21DD':'zigrarr','\u21E4':'larrb','\u21E5':'rarrb','\u21F5':'duarr','\u21FD':'loarr','\u21FE':'roarr','\u21FF':'hoarr','\u2200':'forall','\u2201':'comp','\u2202':'part','\u2202\u0338':'npart','\u2203':'exist','\u2204':'nexist','\u2205':'empty','\u2207':'Del','\u2208':'in','\u2209':'notin','\u220B':'ni','\u220C':'notni','\u03F6':'bepsi','\u220F':'prod','\u2210':'coprod','\u2211':'sum','+':'plus','\xB1':'pm','\xF7':'div','\xD7':'times','<':'lt','\u226E':'nlt','<\u20D2':'nvlt','=':'equals','\u2260':'ne','=\u20E5':'bne','\u2A75':'Equal','>':'gt','\u226F':'ngt','>\u20D2':'nvgt','\xAC':'not','|':'vert','\xA6':'brvbar','\u2212':'minus','\u2213':'mp','\u2214':'plusdo','\u2044':'frasl','\u2216':'setmn','\u2217':'lowast','\u2218':'compfn','\u221A':'Sqrt','\u221D':'prop','\u221E':'infin','\u221F':'angrt','\u2220':'ang','\u2220\u20D2':'nang','\u2221':'angmsd','\u2222':'angsph','\u2223':'mid','\u2224':'nmid','\u2225':'par','\u2226':'npar','\u2227':'and','\u2228':'or','\u2229':'cap','\u2229\uFE00':'caps','\u222A':'cup','\u222A\uFE00':'cups','\u222B':'int','\u222C':'Int','\u222D':'tint','\u2A0C':'qint','\u222E':'oint','\u222F':'Conint','\u2230':'Cconint','\u2231':'cwint','\u2232':'cwconint','\u2233':'awconint','\u2234':'there4','\u2235':'becaus','\u2236':'ratio','\u2237':'Colon','\u2238':'minusd','\u223A':'mDDot','\u223B':'homtht','\u223C':'sim','\u2241':'nsim','\u223C\u20D2':'nvsim','\u223D':'bsim','\u223D\u0331':'race','\u223E':'ac','\u223E\u0333':'acE','\u223F':'acd','\u2240':'wr','\u2242':'esim','\u2242\u0338':'nesim','\u2243':'sime','\u2244':'nsime','\u2245':'cong','\u2247':'ncong','\u2246':'simne','\u2248':'ap','\u2249':'nap','\u224A':'ape','\u224B':'apid','\u224B\u0338':'napid','\u224C':'bcong','\u224D':'CupCap','\u226D':'NotCupCap','\u224D\u20D2':'nvap','\u224E':'bump','\u224E\u0338':'nbump','\u224F':'bumpe','\u224F\u0338':'nbumpe','\u2250':'doteq','\u2250\u0338':'nedot','\u2251':'eDot','\u2252':'efDot','\u2253':'erDot','\u2254':'colone','\u2255':'ecolon','\u2256':'ecir','\u2257':'cire','\u2259':'wedgeq','\u225A':'veeeq','\u225C':'trie','\u225F':'equest','\u2261':'equiv','\u2262':'nequiv','\u2261\u20E5':'bnequiv','\u2264':'le','\u2270':'nle','\u2264\u20D2':'nvle','\u2265':'ge','\u2271':'nge','\u2265\u20D2':'nvge','\u2266':'lE','\u2266\u0338':'nlE','\u2267':'gE','\u2267\u0338':'ngE','\u2268\uFE00':'lvnE','\u2268':'lnE','\u2269':'gnE','\u2269\uFE00':'gvnE','\u226A':'ll','\u226A\u0338':'nLtv','\u226A\u20D2':'nLt','\u226B':'gg','\u226B\u0338':'nGtv','\u226B\u20D2':'nGt','\u226C':'twixt','\u2272':'lsim','\u2274':'nlsim','\u2273':'gsim','\u2275':'ngsim','\u2276':'lg','\u2278':'ntlg','\u2277':'gl','\u2279':'ntgl','\u227A':'pr','\u2280':'npr','\u227B':'sc','\u2281':'nsc','\u227C':'prcue','\u22E0':'nprcue','\u227D':'sccue','\u22E1':'nsccue','\u227E':'prsim','\u227F':'scsim','\u227F\u0338':'NotSucceedsTilde','\u2282':'sub','\u2284':'nsub','\u2282\u20D2':'vnsub','\u2283':'sup','\u2285':'nsup','\u2283\u20D2':'vnsup','\u2286':'sube','\u2288':'nsube','\u2287':'supe','\u2289':'nsupe','\u228A\uFE00':'vsubne','\u228A':'subne','\u228B\uFE00':'vsupne','\u228B':'supne','\u228D':'cupdot','\u228E':'uplus','\u228F':'sqsub','\u228F\u0338':'NotSquareSubset','\u2290':'sqsup','\u2290\u0338':'NotSquareSuperset','\u2291':'sqsube','\u22E2':'nsqsube','\u2292':'sqsupe','\u22E3':'nsqsupe','\u2293':'sqcap','\u2293\uFE00':'sqcaps','\u2294':'sqcup','\u2294\uFE00':'sqcups','\u2295':'oplus','\u2296':'ominus','\u2297':'otimes','\u2298':'osol','\u2299':'odot','\u229A':'ocir','\u229B':'oast','\u229D':'odash','\u229E':'plusb','\u229F':'minusb','\u22A0':'timesb','\u22A1':'sdotb','\u22A2':'vdash','\u22AC':'nvdash','\u22A3':'dashv','\u22A4':'top','\u22A5':'bot','\u22A7':'models','\u22A8':'vDash','\u22AD':'nvDash','\u22A9':'Vdash','\u22AE':'nVdash','\u22AA':'Vvdash','\u22AB':'VDash','\u22AF':'nVDash','\u22B0':'prurel','\u22B2':'vltri','\u22EA':'nltri','\u22B3':'vrtri','\u22EB':'nrtri','\u22B4':'ltrie','\u22EC':'nltrie','\u22B4\u20D2':'nvltrie','\u22B5':'rtrie','\u22ED':'nrtrie','\u22B5\u20D2':'nvrtrie','\u22B6':'origof','\u22B7':'imof','\u22B8':'mumap','\u22B9':'hercon','\u22BA':'intcal','\u22BB':'veebar','\u22BD':'barvee','\u22BE':'angrtvb','\u22BF':'lrtri','\u22C0':'Wedge','\u22C1':'Vee','\u22C2':'xcap','\u22C3':'xcup','\u22C4':'diam','\u22C5':'sdot','\u22C6':'Star','\u22C7':'divonx','\u22C8':'bowtie','\u22C9':'ltimes','\u22CA':'rtimes','\u22CB':'lthree','\u22CC':'rthree','\u22CD':'bsime','\u22CE':'cuvee','\u22CF':'cuwed','\u22D0':'Sub','\u22D1':'Sup','\u22D2':'Cap','\u22D3':'Cup','\u22D4':'fork','\u22D5':'epar','\u22D6':'ltdot','\u22D7':'gtdot','\u22D8':'Ll','\u22D8\u0338':'nLl','\u22D9':'Gg','\u22D9\u0338':'nGg','\u22DA\uFE00':'lesg','\u22DA':'leg','\u22DB':'gel','\u22DB\uFE00':'gesl','\u22DE':'cuepr','\u22DF':'cuesc','\u22E6':'lnsim','\u22E7':'gnsim','\u22E8':'prnsim','\u22E9':'scnsim','\u22EE':'vellip','\u22EF':'ctdot','\u22F0':'utdot','\u22F1':'dtdot','\u22F2':'disin','\u22F3':'isinsv','\u22F4':'isins','\u22F5':'isindot','\u22F5\u0338':'notindot','\u22F6':'notinvc','\u22F7':'notinvb','\u22F9':'isinE','\u22F9\u0338':'notinE','\u22FA':'nisd','\u22FB':'xnis','\u22FC':'nis','\u22FD':'notnivc','\u22FE':'notnivb','\u2305':'barwed','\u2306':'Barwed','\u230C':'drcrop','\u230D':'dlcrop','\u230E':'urcrop','\u230F':'ulcrop','\u2310':'bnot','\u2312':'profline','\u2313':'profsurf','\u2315':'telrec','\u2316':'target','\u231C':'ulcorn','\u231D':'urcorn','\u231E':'dlcorn','\u231F':'drcorn','\u2322':'frown','\u2323':'smile','\u232D':'cylcty','\u232E':'profalar','\u2336':'topbot','\u233D':'ovbar','\u233F':'solbar','\u237C':'angzarr','\u23B0':'lmoust','\u23B1':'rmoust','\u23B4':'tbrk','\u23B5':'bbrk','\u23B6':'bbrktbrk','\u23DC':'OverParenthesis','\u23DD':'UnderParenthesis','\u23DE':'OverBrace','\u23DF':'UnderBrace','\u23E2':'trpezium','\u23E7':'elinters','\u2423':'blank','\u2500':'boxh','\u2502':'boxv','\u250C':'boxdr','\u2510':'boxdl','\u2514':'boxur','\u2518':'boxul','\u251C':'boxvr','\u2524':'boxvl','\u252C':'boxhd','\u2534':'boxhu','\u253C':'boxvh','\u2550':'boxH','\u2551':'boxV','\u2552':'boxdR','\u2553':'boxDr','\u2554':'boxDR','\u2555':'boxdL','\u2556':'boxDl','\u2557':'boxDL','\u2558':'boxuR','\u2559':'boxUr','\u255A':'boxUR','\u255B':'boxuL','\u255C':'boxUl','\u255D':'boxUL','\u255E':'boxvR','\u255F':'boxVr','\u2560':'boxVR','\u2561':'boxvL','\u2562':'boxVl','\u2563':'boxVL','\u2564':'boxHd','\u2565':'boxhD','\u2566':'boxHD','\u2567':'boxHu','\u2568':'boxhU','\u2569':'boxHU','\u256A':'boxvH','\u256B':'boxVh','\u256C':'boxVH','\u2580':'uhblk','\u2584':'lhblk','\u2588':'block','\u2591':'blk14','\u2592':'blk12','\u2593':'blk34','\u25A1':'squ','\u25AA':'squf','\u25AB':'EmptyVerySmallSquare','\u25AD':'rect','\u25AE':'marker','\u25B1':'fltns','\u25B3':'xutri','\u25B4':'utrif','\u25B5':'utri','\u25B8':'rtrif','\u25B9':'rtri','\u25BD':'xdtri','\u25BE':'dtrif','\u25BF':'dtri','\u25C2':'ltrif','\u25C3':'ltri','\u25CA':'loz','\u25CB':'cir','\u25EC':'tridot','\u25EF':'xcirc','\u25F8':'ultri','\u25F9':'urtri','\u25FA':'lltri','\u25FB':'EmptySmallSquare','\u25FC':'FilledSmallSquare','\u2605':'starf','\u2606':'star','\u260E':'phone','\u2640':'female','\u2642':'male','\u2660':'spades','\u2663':'clubs','\u2665':'hearts','\u2666':'diams','\u266A':'sung','\u2713':'check','\u2717':'cross','\u2720':'malt','\u2736':'sext','\u2758':'VerticalSeparator','\u27C8':'bsolhsub','\u27C9':'suphsol','\u27F5':'xlarr','\u27F6':'xrarr','\u27F7':'xharr','\u27F8':'xlArr','\u27F9':'xrArr','\u27FA':'xhArr','\u27FC':'xmap','\u27FF':'dzigrarr','\u2902':'nvlArr','\u2903':'nvrArr','\u2904':'nvHarr','\u2905':'Map','\u290C':'lbarr','\u290D':'rbarr','\u290E':'lBarr','\u290F':'rBarr','\u2910':'RBarr','\u2911':'DDotrahd','\u2912':'UpArrowBar','\u2913':'DownArrowBar','\u2916':'Rarrtl','\u2919':'latail','\u291A':'ratail','\u291B':'lAtail','\u291C':'rAtail','\u291D':'larrfs','\u291E':'rarrfs','\u291F':'larrbfs','\u2920':'rarrbfs','\u2923':'nwarhk','\u2924':'nearhk','\u2925':'searhk','\u2926':'swarhk','\u2927':'nwnear','\u2928':'toea','\u2929':'tosa','\u292A':'swnwar','\u2933':'rarrc','\u2933\u0338':'nrarrc','\u2935':'cudarrr','\u2936':'ldca','\u2937':'rdca','\u2938':'cudarrl','\u2939':'larrpl','\u293C':'curarrm','\u293D':'cularrp','\u2945':'rarrpl','\u2948':'harrcir','\u2949':'Uarrocir','\u294A':'lurdshar','\u294B':'ldrushar','\u294E':'LeftRightVector','\u294F':'RightUpDownVector','\u2950':'DownLeftRightVector','\u2951':'LeftUpDownVector','\u2952':'LeftVectorBar','\u2953':'RightVectorBar','\u2954':'RightUpVectorBar','\u2955':'RightDownVectorBar','\u2956':'DownLeftVectorBar','\u2957':'DownRightVectorBar','\u2958':'LeftUpVectorBar','\u2959':'LeftDownVectorBar','\u295A':'LeftTeeVector','\u295B':'RightTeeVector','\u295C':'RightUpTeeVector','\u295D':'RightDownTeeVector','\u295E':'DownLeftTeeVector','\u295F':'DownRightTeeVector','\u2960':'LeftUpTeeVector','\u2961':'LeftDownTeeVector','\u2962':'lHar','\u2963':'uHar','\u2964':'rHar','\u2965':'dHar','\u2966':'luruhar','\u2967':'ldrdhar','\u2968':'ruluhar','\u2969':'rdldhar','\u296A':'lharul','\u296B':'llhard','\u296C':'rharul','\u296D':'lrhard','\u296E':'udhar','\u296F':'duhar','\u2970':'RoundImplies','\u2971':'erarr','\u2972':'simrarr','\u2973':'larrsim','\u2974':'rarrsim','\u2975':'rarrap','\u2976':'ltlarr','\u2978':'gtrarr','\u2979':'subrarr','\u297B':'suplarr','\u297C':'lfisht','\u297D':'rfisht','\u297E':'ufisht','\u297F':'dfisht','\u299A':'vzigzag','\u299C':'vangrt','\u299D':'angrtvbd','\u29A4':'ange','\u29A5':'range','\u29A6':'dwangle','\u29A7':'uwangle','\u29A8':'angmsdaa','\u29A9':'angmsdab','\u29AA':'angmsdac','\u29AB':'angmsdad','\u29AC':'angmsdae','\u29AD':'angmsdaf','\u29AE':'angmsdag','\u29AF':'angmsdah','\u29B0':'bemptyv','\u29B1':'demptyv','\u29B2':'cemptyv','\u29B3':'raemptyv','\u29B4':'laemptyv','\u29B5':'ohbar','\u29B6':'omid','\u29B7':'opar','\u29B9':'operp','\u29BB':'olcross','\u29BC':'odsold','\u29BE':'olcir','\u29BF':'ofcir','\u29C0':'olt','\u29C1':'ogt','\u29C2':'cirscir','\u29C3':'cirE','\u29C4':'solb','\u29C5':'bsolb','\u29C9':'boxbox','\u29CD':'trisb','\u29CE':'rtriltri','\u29CF':'LeftTriangleBar','\u29CF\u0338':'NotLeftTriangleBar','\u29D0':'RightTriangleBar','\u29D0\u0338':'NotRightTriangleBar','\u29DC':'iinfin','\u29DD':'infintie','\u29DE':'nvinfin','\u29E3':'eparsl','\u29E4':'smeparsl','\u29E5':'eqvparsl','\u29EB':'lozf','\u29F4':'RuleDelayed','\u29F6':'dsol','\u2A00':'xodot','\u2A01':'xoplus','\u2A02':'xotime','\u2A04':'xuplus','\u2A06':'xsqcup','\u2A0D':'fpartint','\u2A10':'cirfnint','\u2A11':'awint','\u2A12':'rppolint','\u2A13':'scpolint','\u2A14':'npolint','\u2A15':'pointint','\u2A16':'quatint','\u2A17':'intlarhk','\u2A22':'pluscir','\u2A23':'plusacir','\u2A24':'simplus','\u2A25':'plusdu','\u2A26':'plussim','\u2A27':'plustwo','\u2A29':'mcomma','\u2A2A':'minusdu','\u2A2D':'loplus','\u2A2E':'roplus','\u2A2F':'Cross','\u2A30':'timesd','\u2A31':'timesbar','\u2A33':'smashp','\u2A34':'lotimes','\u2A35':'rotimes','\u2A36':'otimesas','\u2A37':'Otimes','\u2A38':'odiv','\u2A39':'triplus','\u2A3A':'triminus','\u2A3B':'tritime','\u2A3C':'iprod','\u2A3F':'amalg','\u2A40':'capdot','\u2A42':'ncup','\u2A43':'ncap','\u2A44':'capand','\u2A45':'cupor','\u2A46':'cupcap','\u2A47':'capcup','\u2A48':'cupbrcap','\u2A49':'capbrcup','\u2A4A':'cupcup','\u2A4B':'capcap','\u2A4C':'ccups','\u2A4D':'ccaps','\u2A50':'ccupssm','\u2A53':'And','\u2A54':'Or','\u2A55':'andand','\u2A56':'oror','\u2A57':'orslope','\u2A58':'andslope','\u2A5A':'andv','\u2A5B':'orv','\u2A5C':'andd','\u2A5D':'ord','\u2A5F':'wedbar','\u2A66':'sdote','\u2A6A':'simdot','\u2A6D':'congdot','\u2A6D\u0338':'ncongdot','\u2A6E':'easter','\u2A6F':'apacir','\u2A70':'apE','\u2A70\u0338':'napE','\u2A71':'eplus','\u2A72':'pluse','\u2A73':'Esim','\u2A77':'eDDot','\u2A78':'equivDD','\u2A79':'ltcir','\u2A7A':'gtcir','\u2A7B':'ltquest','\u2A7C':'gtquest','\u2A7D':'les','\u2A7D\u0338':'nles','\u2A7E':'ges','\u2A7E\u0338':'nges','\u2A7F':'lesdot','\u2A80':'gesdot','\u2A81':'lesdoto','\u2A82':'gesdoto','\u2A83':'lesdotor','\u2A84':'gesdotol','\u2A85':'lap','\u2A86':'gap','\u2A87':'lne','\u2A88':'gne','\u2A89':'lnap','\u2A8A':'gnap','\u2A8B':'lEg','\u2A8C':'gEl','\u2A8D':'lsime','\u2A8E':'gsime','\u2A8F':'lsimg','\u2A90':'gsiml','\u2A91':'lgE','\u2A92':'glE','\u2A93':'lesges','\u2A94':'gesles','\u2A95':'els','\u2A96':'egs','\u2A97':'elsdot','\u2A98':'egsdot','\u2A99':'el','\u2A9A':'eg','\u2A9D':'siml','\u2A9E':'simg','\u2A9F':'simlE','\u2AA0':'simgE','\u2AA1':'LessLess','\u2AA1\u0338':'NotNestedLessLess','\u2AA2':'GreaterGreater','\u2AA2\u0338':'NotNestedGreaterGreater','\u2AA4':'glj','\u2AA5':'gla','\u2AA6':'ltcc','\u2AA7':'gtcc','\u2AA8':'lescc','\u2AA9':'gescc','\u2AAA':'smt','\u2AAB':'lat','\u2AAC':'smte','\u2AAC\uFE00':'smtes','\u2AAD':'late','\u2AAD\uFE00':'lates','\u2AAE':'bumpE','\u2AAF':'pre','\u2AAF\u0338':'npre','\u2AB0':'sce','\u2AB0\u0338':'nsce','\u2AB3':'prE','\u2AB4':'scE','\u2AB5':'prnE','\u2AB6':'scnE','\u2AB7':'prap','\u2AB8':'scap','\u2AB9':'prnap','\u2ABA':'scnap','\u2ABB':'Pr','\u2ABC':'Sc','\u2ABD':'subdot','\u2ABE':'supdot','\u2ABF':'subplus','\u2AC0':'supplus','\u2AC1':'submult','\u2AC2':'supmult','\u2AC3':'subedot','\u2AC4':'supedot','\u2AC5':'subE','\u2AC5\u0338':'nsubE','\u2AC6':'supE','\u2AC6\u0338':'nsupE','\u2AC7':'subsim','\u2AC8':'supsim','\u2ACB\uFE00':'vsubnE','\u2ACB':'subnE','\u2ACC\uFE00':'vsupnE','\u2ACC':'supnE','\u2ACF':'csub','\u2AD0':'csup','\u2AD1':'csube','\u2AD2':'csupe','\u2AD3':'subsup','\u2AD4':'supsub','\u2AD5':'subsub','\u2AD6':'supsup','\u2AD7':'suphsub','\u2AD8':'supdsub','\u2AD9':'forkv','\u2ADA':'topfork','\u2ADB':'mlcp','\u2AE4':'Dashv','\u2AE6':'Vdashl','\u2AE7':'Barv','\u2AE8':'vBar','\u2AE9':'vBarv','\u2AEB':'Vbar','\u2AEC':'Not','\u2AED':'bNot','\u2AEE':'rnmid','\u2AEF':'cirmid','\u2AF0':'midcir','\u2AF1':'topcir','\u2AF2':'nhpar','\u2AF3':'parsim','\u2AFD':'parsl','\u2AFD\u20E5':'nparsl','\u266D':'flat','\u266E':'natur','\u266F':'sharp','\xA4':'curren','\xA2':'cent','$':'dollar','\xA3':'pound','\xA5':'yen','\u20AC':'euro','\xB9':'sup1','\xBD':'half','\u2153':'frac13','\xBC':'frac14','\u2155':'frac15','\u2159':'frac16','\u215B':'frac18','\xB2':'sup2','\u2154':'frac23','\u2156':'frac25','\xB3':'sup3','\xBE':'frac34','\u2157':'frac35','\u215C':'frac38','\u2158':'frac45','\u215A':'frac56','\u215D':'frac58','\u215E':'frac78','\uD835\uDCB6':'ascr','\uD835\uDD52':'aopf','\uD835\uDD1E':'afr','\uD835\uDD38':'Aopf','\uD835\uDD04':'Afr','\uD835\uDC9C':'Ascr','\xAA':'ordf','\xE1':'aacute','\xC1':'Aacute','\xE0':'agrave','\xC0':'Agrave','\u0103':'abreve','\u0102':'Abreve','\xE2':'acirc','\xC2':'Acirc','\xE5':'aring','\xC5':'angst','\xE4':'auml','\xC4':'Auml','\xE3':'atilde','\xC3':'Atilde','\u0105':'aogon','\u0104':'Aogon','\u0101':'amacr','\u0100':'Amacr','\xE6':'aelig','\xC6':'AElig','\uD835\uDCB7':'bscr','\uD835\uDD53':'bopf','\uD835\uDD1F':'bfr','\uD835\uDD39':'Bopf','\u212C':'Bscr','\uD835\uDD05':'Bfr','\uD835\uDD20':'cfr','\uD835\uDCB8':'cscr','\uD835\uDD54':'copf','\u212D':'Cfr','\uD835\uDC9E':'Cscr','\u2102':'Copf','\u0107':'cacute','\u0106':'Cacute','\u0109':'ccirc','\u0108':'Ccirc','\u010D':'ccaron','\u010C':'Ccaron','\u010B':'cdot','\u010A':'Cdot','\xE7':'ccedil','\xC7':'Ccedil','\u2105':'incare','\uD835\uDD21':'dfr','\u2146':'dd','\uD835\uDD55':'dopf','\uD835\uDCB9':'dscr','\uD835\uDC9F':'Dscr','\uD835\uDD07':'Dfr','\u2145':'DD','\uD835\uDD3B':'Dopf','\u010F':'dcaron','\u010E':'Dcaron','\u0111':'dstrok','\u0110':'Dstrok','\xF0':'eth','\xD0':'ETH','\u2147':'ee','\u212F':'escr','\uD835\uDD22':'efr','\uD835\uDD56':'eopf','\u2130':'Escr','\uD835\uDD08':'Efr','\uD835\uDD3C':'Eopf','\xE9':'eacute','\xC9':'Eacute','\xE8':'egrave','\xC8':'Egrave','\xEA':'ecirc','\xCA':'Ecirc','\u011B':'ecaron','\u011A':'Ecaron','\xEB':'euml','\xCB':'Euml','\u0117':'edot','\u0116':'Edot','\u0119':'eogon','\u0118':'Eogon','\u0113':'emacr','\u0112':'Emacr','\uD835\uDD23':'ffr','\uD835\uDD57':'fopf','\uD835\uDCBB':'fscr','\uD835\uDD09':'Ffr','\uD835\uDD3D':'Fopf','\u2131':'Fscr','\uFB00':'fflig','\uFB03':'ffilig','\uFB04':'ffllig','\uFB01':'filig','fj':'fjlig','\uFB02':'fllig','\u0192':'fnof','\u210A':'gscr','\uD835\uDD58':'gopf','\uD835\uDD24':'gfr','\uD835\uDCA2':'Gscr','\uD835\uDD3E':'Gopf','\uD835\uDD0A':'Gfr','\u01F5':'gacute','\u011F':'gbreve','\u011E':'Gbreve','\u011D':'gcirc','\u011C':'Gcirc','\u0121':'gdot','\u0120':'Gdot','\u0122':'Gcedil','\uD835\uDD25':'hfr','\u210E':'planckh','\uD835\uDCBD':'hscr','\uD835\uDD59':'hopf','\u210B':'Hscr','\u210C':'Hfr','\u210D':'Hopf','\u0125':'hcirc','\u0124':'Hcirc','\u210F':'hbar','\u0127':'hstrok','\u0126':'Hstrok','\uD835\uDD5A':'iopf','\uD835\uDD26':'ifr','\uD835\uDCBE':'iscr','\u2148':'ii','\uD835\uDD40':'Iopf','\u2110':'Iscr','\u2111':'Im','\xED':'iacute','\xCD':'Iacute','\xEC':'igrave','\xCC':'Igrave','\xEE':'icirc','\xCE':'Icirc','\xEF':'iuml','\xCF':'Iuml','\u0129':'itilde','\u0128':'Itilde','\u0130':'Idot','\u012F':'iogon','\u012E':'Iogon','\u012B':'imacr','\u012A':'Imacr','\u0133':'ijlig','\u0132':'IJlig','\u0131':'imath','\uD835\uDCBF':'jscr','\uD835\uDD5B':'jopf','\uD835\uDD27':'jfr','\uD835\uDCA5':'Jscr','\uD835\uDD0D':'Jfr','\uD835\uDD41':'Jopf','\u0135':'jcirc','\u0134':'Jcirc','\u0237':'jmath','\uD835\uDD5C':'kopf','\uD835\uDCC0':'kscr','\uD835\uDD28':'kfr','\uD835\uDCA6':'Kscr','\uD835\uDD42':'Kopf','\uD835\uDD0E':'Kfr','\u0137':'kcedil','\u0136':'Kcedil','\uD835\uDD29':'lfr','\uD835\uDCC1':'lscr','\u2113':'ell','\uD835\uDD5D':'lopf','\u2112':'Lscr','\uD835\uDD0F':'Lfr','\uD835\uDD43':'Lopf','\u013A':'lacute','\u0139':'Lacute','\u013E':'lcaron','\u013D':'Lcaron','\u013C':'lcedil','\u013B':'Lcedil','\u0142':'lstrok','\u0141':'Lstrok','\u0140':'lmidot','\u013F':'Lmidot','\uD835\uDD2A':'mfr','\uD835\uDD5E':'mopf','\uD835\uDCC2':'mscr','\uD835\uDD10':'Mfr','\uD835\uDD44':'Mopf','\u2133':'Mscr','\uD835\uDD2B':'nfr','\uD835\uDD5F':'nopf','\uD835\uDCC3':'nscr','\u2115':'Nopf','\uD835\uDCA9':'Nscr','\uD835\uDD11':'Nfr','\u0144':'nacute','\u0143':'Nacute','\u0148':'ncaron','\u0147':'Ncaron','\xF1':'ntilde','\xD1':'Ntilde','\u0146':'ncedil','\u0145':'Ncedil','\u2116':'numero','\u014B':'eng','\u014A':'ENG','\uD835\uDD60':'oopf','\uD835\uDD2C':'ofr','\u2134':'oscr','\uD835\uDCAA':'Oscr','\uD835\uDD12':'Ofr','\uD835\uDD46':'Oopf','\xBA':'ordm','\xF3':'oacute','\xD3':'Oacute','\xF2':'ograve','\xD2':'Ograve','\xF4':'ocirc','\xD4':'Ocirc','\xF6':'ouml','\xD6':'Ouml','\u0151':'odblac','\u0150':'Odblac','\xF5':'otilde','\xD5':'Otilde','\xF8':'oslash','\xD8':'Oslash','\u014D':'omacr','\u014C':'Omacr','\u0153':'oelig','\u0152':'OElig','\uD835\uDD2D':'pfr','\uD835\uDCC5':'pscr','\uD835\uDD61':'popf','\u2119':'Popf','\uD835\uDD13':'Pfr','\uD835\uDCAB':'Pscr','\uD835\uDD62':'qopf','\uD835\uDD2E':'qfr','\uD835\uDCC6':'qscr','\uD835\uDCAC':'Qscr','\uD835\uDD14':'Qfr','\u211A':'Qopf','\u0138':'kgreen','\uD835\uDD2F':'rfr','\uD835\uDD63':'ropf','\uD835\uDCC7':'rscr','\u211B':'Rscr','\u211C':'Re','\u211D':'Ropf','\u0155':'racute','\u0154':'Racute','\u0159':'rcaron','\u0158':'Rcaron','\u0157':'rcedil','\u0156':'Rcedil','\uD835\uDD64':'sopf','\uD835\uDCC8':'sscr','\uD835\uDD30':'sfr','\uD835\uDD4A':'Sopf','\uD835\uDD16':'Sfr','\uD835\uDCAE':'Sscr','\u24C8':'oS','\u015B':'sacute','\u015A':'Sacute','\u015D':'scirc','\u015C':'Scirc','\u0161':'scaron','\u0160':'Scaron','\u015F':'scedil','\u015E':'Scedil','\xDF':'szlig','\uD835\uDD31':'tfr','\uD835\uDCC9':'tscr','\uD835\uDD65':'topf','\uD835\uDCAF':'Tscr','\uD835\uDD17':'Tfr','\uD835\uDD4B':'Topf','\u0165':'tcaron','\u0164':'Tcaron','\u0163':'tcedil','\u0162':'Tcedil','\u2122':'trade','\u0167':'tstrok','\u0166':'Tstrok','\uD835\uDCCA':'uscr','\uD835\uDD66':'uopf','\uD835\uDD32':'ufr','\uD835\uDD4C':'Uopf','\uD835\uDD18':'Ufr','\uD835\uDCB0':'Uscr','\xFA':'uacute','\xDA':'Uacute','\xF9':'ugrave','\xD9':'Ugrave','\u016D':'ubreve','\u016C':'Ubreve','\xFB':'ucirc','\xDB':'Ucirc','\u016F':'uring','\u016E':'Uring','\xFC':'uuml','\xDC':'Uuml','\u0171':'udblac','\u0170':'Udblac','\u0169':'utilde','\u0168':'Utilde','\u0173':'uogon','\u0172':'Uogon','\u016B':'umacr','\u016A':'Umacr','\uD835\uDD33':'vfr','\uD835\uDD67':'vopf','\uD835\uDCCB':'vscr','\uD835\uDD19':'Vfr','\uD835\uDD4D':'Vopf','\uD835\uDCB1':'Vscr','\uD835\uDD68':'wopf','\uD835\uDCCC':'wscr','\uD835\uDD34':'wfr','\uD835\uDCB2':'Wscr','\uD835\uDD4E':'Wopf','\uD835\uDD1A':'Wfr','\u0175':'wcirc','\u0174':'Wcirc','\uD835\uDD35':'xfr','\uD835\uDCCD':'xscr','\uD835\uDD69':'xopf','\uD835\uDD4F':'Xopf','\uD835\uDD1B':'Xfr','\uD835\uDCB3':'Xscr','\uD835\uDD36':'yfr','\uD835\uDCCE':'yscr','\uD835\uDD6A':'yopf','\uD835\uDCB4':'Yscr','\uD835\uDD1C':'Yfr','\uD835\uDD50':'Yopf','\xFD':'yacute','\xDD':'Yacute','\u0177':'ycirc','\u0176':'Ycirc','\xFF':'yuml','\u0178':'Yuml','\uD835\uDCCF':'zscr','\uD835\uDD37':'zfr','\uD835\uDD6B':'zopf','\u2128':'Zfr','\u2124':'Zopf','\uD835\uDCB5':'Zscr','\u017A':'zacute','\u0179':'Zacute','\u017E':'zcaron','\u017D':'Zcaron','\u017C':'zdot','\u017B':'Zdot','\u01B5':'imped','\xFE':'thorn','\xDE':'THORN','\u0149':'napos','\u03B1':'alpha','\u0391':'Alpha','\u03B2':'beta','\u0392':'Beta','\u03B3':'gamma','\u0393':'Gamma','\u03B4':'delta','\u0394':'Delta','\u03B5':'epsi','\u03F5':'epsiv','\u0395':'Epsilon','\u03DD':'gammad','\u03DC':'Gammad','\u03B6':'zeta','\u0396':'Zeta','\u03B7':'eta','\u0397':'Eta','\u03B8':'theta','\u03D1':'thetav','\u0398':'Theta','\u03B9':'iota','\u0399':'Iota','\u03BA':'kappa','\u03F0':'kappav','\u039A':'Kappa','\u03BB':'lambda','\u039B':'Lambda','\u03BC':'mu','\xB5':'micro','\u039C':'Mu','\u03BD':'nu','\u039D':'Nu','\u03BE':'xi','\u039E':'Xi','\u03BF':'omicron','\u039F':'Omicron','\u03C0':'pi','\u03D6':'piv','\u03A0':'Pi','\u03C1':'rho','\u03F1':'rhov','\u03A1':'Rho','\u03C3':'sigma','\u03A3':'Sigma','\u03C2':'sigmaf','\u03C4':'tau','\u03A4':'Tau','\u03C5':'upsi','\u03A5':'Upsilon','\u03D2':'Upsi','\u03C6':'phi','\u03D5':'phiv','\u03A6':'Phi','\u03C7':'chi','\u03A7':'Chi','\u03C8':'psi','\u03A8':'Psi','\u03C9':'omega','\u03A9':'ohm','\u0430':'acy','\u0410':'Acy','\u0431':'bcy','\u0411':'Bcy','\u0432':'vcy','\u0412':'Vcy','\u0433':'gcy','\u0413':'Gcy','\u0453':'gjcy','\u0403':'GJcy','\u0434':'dcy','\u0414':'Dcy','\u0452':'djcy','\u0402':'DJcy','\u0435':'iecy','\u0415':'IEcy','\u0451':'iocy','\u0401':'IOcy','\u0454':'jukcy','\u0404':'Jukcy','\u0436':'zhcy','\u0416':'ZHcy','\u0437':'zcy','\u0417':'Zcy','\u0455':'dscy','\u0405':'DScy','\u0438':'icy','\u0418':'Icy','\u0456':'iukcy','\u0406':'Iukcy','\u0457':'yicy','\u0407':'YIcy','\u0439':'jcy','\u0419':'Jcy','\u0458':'jsercy','\u0408':'Jsercy','\u043A':'kcy','\u041A':'Kcy','\u045C':'kjcy','\u040C':'KJcy','\u043B':'lcy','\u041B':'Lcy','\u0459':'ljcy','\u0409':'LJcy','\u043C':'mcy','\u041C':'Mcy','\u043D':'ncy','\u041D':'Ncy','\u045A':'njcy','\u040A':'NJcy','\u043E':'ocy','\u041E':'Ocy','\u043F':'pcy','\u041F':'Pcy','\u0440':'rcy','\u0420':'Rcy','\u0441':'scy','\u0421':'Scy','\u0442':'tcy','\u0422':'Tcy','\u045B':'tshcy','\u040B':'TSHcy','\u0443':'ucy','\u0423':'Ucy','\u045E':'ubrcy','\u040E':'Ubrcy','\u0444':'fcy','\u0424':'Fcy','\u0445':'khcy','\u0425':'KHcy','\u0446':'tscy','\u0426':'TScy','\u0447':'chcy','\u0427':'CHcy','\u045F':'dzcy','\u040F':'DZcy','\u0448':'shcy','\u0428':'SHcy','\u0449':'shchcy','\u0429':'SHCHcy','\u044A':'hardcy','\u042A':'HARDcy','\u044B':'ycy','\u042B':'Ycy','\u044C':'softcy','\u042C':'SOFTcy','\u044D':'ecy','\u042D':'Ecy','\u044E':'yucy','\u042E':'YUcy','\u044F':'yacy','\u042F':'YAcy','\u2135':'aleph','\u2136':'beth','\u2137':'gimel','\u2138':'daleth'};

	var regexEscape = /["&'<>`]/g;
	var escapeMap = {
		'"': '&quot;',
		'&': '&amp;',
		'\'': '&#x27;',
		'<': '&lt;',
		// See https://mathiasbynens.be/notes/ambiguous-ampersands: in HTML, the
		// following is not strictly necessary unless it’s part of a tag or an
		// unquoted attribute value. We’re only escaping it to support those
		// situations, and for XML support.
		'>': '&gt;',
		// In Internet Explorer ≤ 8, the backtick character can be used
		// to break out of (un)quoted attribute values or HTML comments.
		// See http://html5sec.org/#102, http://html5sec.org/#108, and
		// http://html5sec.org/#133.
		'`': '&#x60;'
	};

	var regexInvalidEntity = /&#(?:[xX][^a-fA-F0-9]|[^0-9xX])/;
	var regexInvalidRawCodePoint = /[\0-\x08\x0B\x0E-\x1F\x7F-\x9F\uFDD0-\uFDEF\uFFFE\uFFFF]|[\uD83F\uD87F\uD8BF\uD8FF\uD93F\uD97F\uD9BF\uD9FF\uDA3F\uDA7F\uDABF\uDAFF\uDB3F\uDB7F\uDBBF\uDBFF][\uDFFE\uDFFF]|[\uD800-\uDBFF](?![\uDC00-\uDFFF])|(?:[^\uD800-\uDBFF]|^)[\uDC00-\uDFFF]/;
	var regexDecode = /&(CounterClockwiseContourIntegral|DoubleLongLeftRightArrow|ClockwiseContourIntegral|NotNestedGreaterGreater|NotSquareSupersetEqual|DiacriticalDoubleAcute|NotRightTriangleEqual|NotSucceedsSlantEqual|NotPrecedesSlantEqual|CloseCurlyDoubleQuote|NegativeVeryThinSpace|DoubleContourIntegral|FilledVerySmallSquare|CapitalDifferentialD|OpenCurlyDoubleQuote|EmptyVerySmallSquare|NestedGreaterGreater|DoubleLongRightArrow|NotLeftTriangleEqual|NotGreaterSlantEqual|ReverseUpEquilibrium|DoubleLeftRightArrow|NotSquareSubsetEqual|NotDoubleVerticalBar|RightArrowLeftArrow|NotGreaterFullEqual|NotRightTriangleBar|SquareSupersetEqual|DownLeftRightVector|DoubleLongLeftArrow|leftrightsquigarrow|LeftArrowRightArrow|NegativeMediumSpace|blacktriangleright|RightDownVectorBar|PrecedesSlantEqual|RightDoubleBracket|SucceedsSlantEqual|NotLeftTriangleBar|RightTriangleEqual|SquareIntersection|RightDownTeeVector|ReverseEquilibrium|NegativeThickSpace|longleftrightarrow|Longleftrightarrow|LongLeftRightArrow|DownRightTeeVector|DownRightVectorBar|GreaterSlantEqual|SquareSubsetEqual|LeftDownVectorBar|LeftDoubleBracket|VerticalSeparator|rightleftharpoons|NotGreaterGreater|NotSquareSuperset|blacktriangleleft|blacktriangledown|NegativeThinSpace|LeftDownTeeVector|NotLessSlantEqual|leftrightharpoons|DoubleUpDownArrow|DoubleVerticalBar|LeftTriangleEqual|FilledSmallSquare|twoheadrightarrow|NotNestedLessLess|DownLeftTeeVector|DownLeftVectorBar|RightAngleBracket|NotTildeFullEqual|NotReverseElement|RightUpDownVector|DiacriticalTilde|NotSucceedsTilde|circlearrowright|NotPrecedesEqual|rightharpoondown|DoubleRightArrow|NotSucceedsEqual|NonBreakingSpace|NotRightTriangle|LessEqualGreater|RightUpTeeVector|LeftAngleBracket|GreaterFullEqual|DownArrowUpArrow|RightUpVectorBar|twoheadleftarrow|GreaterEqualLess|downharpoonright|RightTriangleBar|ntrianglerighteq|NotSupersetEqual|LeftUpDownVector|DiacriticalAcute|rightrightarrows|vartriangleright|UpArrowDownArrow|DiacriticalGrave|UnderParenthesis|EmptySmallSquare|LeftUpVectorBar|leftrightarrows|DownRightVector|downharpoonleft|trianglerighteq|ShortRightArrow|OverParenthesis|DoubleLeftArrow|DoubleDownArrow|NotSquareSubset|bigtriangledown|ntrianglelefteq|UpperRightArrow|curvearrowright|vartriangleleft|NotLeftTriangle|nleftrightarrow|LowerRightArrow|NotHumpDownHump|NotGreaterTilde|rightthreetimes|LeftUpTeeVector|NotGreaterEqual|straightepsilon|LeftTriangleBar|rightsquigarrow|ContourIntegral|rightleftarrows|CloseCurlyQuote|RightDownVector|LeftRightVector|nLeftrightarrow|leftharpoondown|circlearrowleft|SquareSuperset|OpenCurlyQuote|hookrightarrow|HorizontalLine|DiacriticalDot|NotLessGreater|ntriangleright|DoubleRightTee|InvisibleComma|InvisibleTimes|LowerLeftArrow|DownLeftVector|NotSubsetEqual|curvearrowleft|trianglelefteq|NotVerticalBar|TildeFullEqual|downdownarrows|NotGreaterLess|RightTeeVector|ZeroWidthSpace|looparrowright|LongRightArrow|doublebarwedge|ShortLeftArrow|ShortDownArrow|RightVectorBar|GreaterGreater|ReverseElement|rightharpoonup|LessSlantEqual|leftthreetimes|upharpoonright|rightarrowtail|LeftDownVector|Longrightarrow|NestedLessLess|UpperLeftArrow|nshortparallel|leftleftarrows|leftrightarrow|Leftrightarrow|LeftRightArrow|longrightarrow|upharpoonleft|RightArrowBar|ApplyFunction|LeftTeeVector|leftarrowtail|NotEqualTilde|varsubsetneqq|varsupsetneqq|RightTeeArrow|SucceedsEqual|SucceedsTilde|LeftVectorBar|SupersetEqual|hookleftarrow|DifferentialD|VerticalTilde|VeryThinSpace|blacktriangle|bigtriangleup|LessFullEqual|divideontimes|leftharpoonup|UpEquilibrium|ntriangleleft|RightTriangle|measuredangle|shortparallel|longleftarrow|Longleftarrow|LongLeftArrow|DoubleLeftTee|Poincareplane|PrecedesEqual|triangleright|DoubleUpArrow|RightUpVector|fallingdotseq|looparrowleft|PrecedesTilde|NotTildeEqual|NotTildeTilde|smallsetminus|Proportional|triangleleft|triangledown|UnderBracket|NotHumpEqual|exponentiale|ExponentialE|NotLessTilde|HilbertSpace|RightCeiling|blacklozenge|varsupsetneq|HumpDownHump|GreaterEqual|VerticalLine|LeftTeeArrow|NotLessEqual|DownTeeArrow|LeftTriangle|varsubsetneq|Intersection|NotCongruent|DownArrowBar|LeftUpVector|LeftArrowBar|risingdotseq|GreaterTilde|RoundImplies|SquareSubset|ShortUpArrow|NotSuperset|quaternions|precnapprox|backepsilon|preccurlyeq|OverBracket|blacksquare|MediumSpace|VerticalBar|circledcirc|circleddash|CircleMinus|CircleTimes|LessGreater|curlyeqprec|curlyeqsucc|diamondsuit|UpDownArrow|Updownarrow|RuleDelayed|Rrightarrow|updownarrow|RightVector|nRightarrow|nrightarrow|eqslantless|LeftCeiling|Equilibrium|SmallCircle|expectation|NotSucceeds|thickapprox|GreaterLess|SquareUnion|NotPrecedes|NotLessLess|straightphi|succnapprox|succcurlyeq|SubsetEqual|sqsupseteq|Proportion|Laplacetrf|ImaginaryI|supsetneqq|NotGreater|gtreqqless|NotElement|ThickSpace|TildeEqual|TildeTilde|Fouriertrf|rmoustache|EqualTilde|eqslantgtr|UnderBrace|LeftVector|UpArrowBar|nLeftarrow|nsubseteqq|subsetneqq|nsupseteqq|nleftarrow|succapprox|lessapprox|UpTeeArrow|upuparrows|curlywedge|lesseqqgtr|varepsilon|varnothing|RightFloor|complement|CirclePlus|sqsubseteq|Lleftarrow|circledast|RightArrow|Rightarrow|rightarrow|lmoustache|Bernoullis|precapprox|mapstoleft|mapstodown|longmapsto|dotsquare|downarrow|DoubleDot|nsubseteq|supsetneq|leftarrow|nsupseteq|subsetneq|ThinSpace|ngeqslant|subseteqq|HumpEqual|NotSubset|triangleq|NotCupCap|lesseqgtr|heartsuit|TripleDot|Leftarrow|Coproduct|Congruent|varpropto|complexes|gvertneqq|LeftArrow|LessTilde|supseteqq|MinusPlus|CircleDot|nleqslant|NotExists|gtreqless|nparallel|UnionPlus|LeftFloor|checkmark|CenterDot|centerdot|Mellintrf|gtrapprox|bigotimes|OverBrace|spadesuit|therefore|pitchfork|rationals|PlusMinus|Backslash|Therefore|DownBreve|backsimeq|backprime|DownArrow|nshortmid|Downarrow|lvertneqq|eqvparsl|imagline|imagpart|infintie|integers|Integral|intercal|LessLess|Uarrocir|intlarhk|sqsupset|angmsdaf|sqsubset|llcorner|vartheta|cupbrcap|lnapprox|Superset|SuchThat|succnsim|succneqq|angmsdag|biguplus|curlyvee|trpezium|Succeeds|NotTilde|bigwedge|angmsdah|angrtvbd|triminus|cwconint|fpartint|lrcorner|smeparsl|subseteq|urcorner|lurdshar|laemptyv|DDotrahd|approxeq|ldrushar|awconint|mapstoup|backcong|shortmid|triangle|geqslant|gesdotol|timesbar|circledR|circledS|setminus|multimap|naturals|scpolint|ncongdot|RightTee|boxminus|gnapprox|boxtimes|andslope|thicksim|angmsdaa|varsigma|cirfnint|rtriltri|angmsdab|rppolint|angmsdac|barwedge|drbkarow|clubsuit|thetasym|bsolhsub|capbrcup|dzigrarr|doteqdot|DotEqual|dotminus|UnderBar|NotEqual|realpart|otimesas|ulcorner|hksearow|hkswarow|parallel|PartialD|elinters|emptyset|plusacir|bbrktbrk|angmsdad|pointint|bigoplus|angmsdae|Precedes|bigsqcup|varkappa|notindot|supseteq|precneqq|precnsim|profalar|profline|profsurf|leqslant|lesdotor|raemptyv|subplus|notnivb|notnivc|subrarr|zigrarr|vzigzag|submult|subedot|Element|between|cirscir|larrbfs|larrsim|lotimes|lbrksld|lbrkslu|lozenge|ldrdhar|dbkarow|bigcirc|epsilon|simrarr|simplus|ltquest|Epsilon|luruhar|gtquest|maltese|npolint|eqcolon|npreceq|bigodot|ddagger|gtrless|bnequiv|harrcir|ddotseq|equivDD|backsim|demptyv|nsqsube|nsqsupe|Upsilon|nsubset|upsilon|minusdu|nsucceq|swarrow|nsupset|coloneq|searrow|boxplus|napprox|natural|asympeq|alefsym|congdot|nearrow|bigstar|diamond|supplus|tritime|LeftTee|nvinfin|triplus|NewLine|nvltrie|nvrtrie|nwarrow|nexists|Diamond|ruluhar|Implies|supmult|angzarr|suplarr|suphsub|questeq|because|digamma|Because|olcross|bemptyv|omicron|Omicron|rotimes|NoBreak|intprod|angrtvb|orderof|uwangle|suphsol|lesdoto|orslope|DownTee|realine|cudarrl|rdldhar|OverBar|supedot|lessdot|supdsub|topfork|succsim|rbrkslu|rbrksld|pertenk|cudarrr|isindot|planckh|lessgtr|pluscir|gesdoto|plussim|plustwo|lesssim|cularrp|rarrsim|Cayleys|notinva|notinvb|notinvc|UpArrow|Uparrow|uparrow|NotLess|dwangle|precsim|Product|curarrm|Cconint|dotplus|rarrbfs|ccupssm|Cedilla|cemptyv|notniva|quatint|frac35|frac38|frac45|frac56|frac58|frac78|tridot|xoplus|gacute|gammad|Gammad|lfisht|lfloor|bigcup|sqsupe|gbreve|Gbreve|lharul|sqsube|sqcups|Gcedil|apacir|llhard|lmidot|Lmidot|lmoust|andand|sqcaps|approx|Abreve|spades|circeq|tprime|divide|topcir|Assign|topbot|gesdot|divonx|xuplus|timesd|gesles|atilde|solbar|SOFTcy|loplus|timesb|lowast|lowbar|dlcorn|dlcrop|softcy|dollar|lparlt|thksim|lrhard|Atilde|lsaquo|smashp|bigvee|thinsp|wreath|bkarow|lsquor|lstrok|Lstrok|lthree|ltimes|ltlarr|DotDot|simdot|ltrPar|weierp|xsqcup|angmsd|sigmav|sigmaf|zeetrf|Zcaron|zcaron|mapsto|vsupne|thetav|cirmid|marker|mcomma|Zacute|vsubnE|there4|gtlPar|vsubne|bottom|gtrarr|SHCHcy|shchcy|midast|midcir|middot|minusb|minusd|gtrdot|bowtie|sfrown|mnplus|models|colone|seswar|Colone|mstpos|searhk|gtrsim|nacute|Nacute|boxbox|telrec|hairsp|Tcedil|nbumpe|scnsim|ncaron|Ncaron|ncedil|Ncedil|hamilt|Scedil|nearhk|hardcy|HARDcy|tcedil|Tcaron|commat|nequiv|nesear|tcaron|target|hearts|nexist|varrho|scedil|Scaron|scaron|hellip|Sacute|sacute|hercon|swnwar|compfn|rtimes|rthree|rsquor|rsaquo|zacute|wedgeq|homtht|barvee|barwed|Barwed|rpargt|horbar|conint|swarhk|roplus|nltrie|hslash|hstrok|Hstrok|rmoust|Conint|bprime|hybull|hyphen|iacute|Iacute|supsup|supsub|supsim|varphi|coprod|brvbar|agrave|Supset|supset|igrave|Igrave|notinE|Agrave|iiiint|iinfin|copysr|wedbar|Verbar|vangrt|becaus|incare|verbar|inodot|bullet|drcorn|intcal|drcrop|cularr|vellip|Utilde|bumpeq|cupcap|dstrok|Dstrok|CupCap|cupcup|cupdot|eacute|Eacute|supdot|iquest|easter|ecaron|Ecaron|ecolon|isinsv|utilde|itilde|Itilde|curarr|succeq|Bumpeq|cacute|ulcrop|nparsl|Cacute|nprcue|egrave|Egrave|nrarrc|nrarrw|subsup|subsub|nrtrie|jsercy|nsccue|Jsercy|kappav|kcedil|Kcedil|subsim|ulcorn|nsimeq|egsdot|veebar|kgreen|capand|elsdot|Subset|subset|curren|aacute|lacute|Lacute|emptyv|ntilde|Ntilde|lagran|lambda|Lambda|capcap|Ugrave|langle|subdot|emsp13|numero|emsp14|nvdash|nvDash|nVdash|nVDash|ugrave|ufisht|nvHarr|larrfs|nvlArr|larrhk|larrlp|larrpl|nvrArr|Udblac|nwarhk|larrtl|nwnear|oacute|Oacute|latail|lAtail|sstarf|lbrace|odblac|Odblac|lbrack|udblac|odsold|eparsl|lcaron|Lcaron|ograve|Ograve|lcedil|Lcedil|Aacute|ssmile|ssetmn|squarf|ldquor|capcup|ominus|cylcty|rharul|eqcirc|dagger|rfloor|rfisht|Dagger|daleth|equals|origof|capdot|equest|dcaron|Dcaron|rdquor|oslash|Oslash|otilde|Otilde|otimes|Otimes|urcrop|Ubreve|ubreve|Yacute|Uacute|uacute|Rcedil|rcedil|urcorn|parsim|Rcaron|Vdashl|rcaron|Tstrok|percnt|period|permil|Exists|yacute|rbrack|rbrace|phmmat|ccaron|Ccaron|planck|ccedil|plankv|tstrok|female|plusdo|plusdu|ffilig|plusmn|ffllig|Ccedil|rAtail|dfisht|bernou|ratail|Rarrtl|rarrtl|angsph|rarrpl|rarrlp|rarrhk|xwedge|xotime|forall|ForAll|Vvdash|vsupnE|preceq|bigcap|frac12|frac13|frac14|primes|rarrfs|prnsim|frac15|Square|frac16|square|lesdot|frac18|frac23|propto|prurel|rarrap|rangle|puncsp|frac25|Racute|qprime|racute|lesges|frac34|abreve|AElig|eqsim|utdot|setmn|urtri|Equal|Uring|seArr|uring|searr|dashv|Dashv|mumap|nabla|iogon|Iogon|sdote|sdotb|scsim|napid|napos|equiv|natur|Acirc|dblac|erarr|nbump|iprod|erDot|ucirc|awint|esdot|angrt|ncong|isinE|scnap|Scirc|scirc|ndash|isins|Ubrcy|nearr|neArr|isinv|nedot|ubrcy|acute|Ycirc|iukcy|Iukcy|xutri|nesim|caret|jcirc|Jcirc|caron|twixt|ddarr|sccue|exist|jmath|sbquo|ngeqq|angst|ccaps|lceil|ngsim|UpTee|delta|Delta|rtrif|nharr|nhArr|nhpar|rtrie|jukcy|Jukcy|kappa|rsquo|Kappa|nlarr|nlArr|TSHcy|rrarr|aogon|Aogon|fflig|xrarr|tshcy|ccirc|nleqq|filig|upsih|nless|dharl|nlsim|fjlig|ropar|nltri|dharr|robrk|roarr|fllig|fltns|roang|rnmid|subnE|subne|lAarr|trisb|Ccirc|acirc|ccups|blank|VDash|forkv|Vdash|langd|cedil|blk12|blk14|laquo|strns|diams|notin|vDash|larrb|blk34|block|disin|uplus|vdash|vBarv|aelig|starf|Wedge|check|xrArr|lates|lbarr|lBarr|notni|lbbrk|bcong|frasl|lbrke|frown|vrtri|vprop|vnsup|gamma|Gamma|wedge|xodot|bdquo|srarr|doteq|ldquo|boxdl|boxdL|gcirc|Gcirc|boxDl|boxDL|boxdr|boxdR|boxDr|TRADE|trade|rlhar|boxDR|vnsub|npart|vltri|rlarr|boxhd|boxhD|nprec|gescc|nrarr|nrArr|boxHd|boxHD|boxhu|boxhU|nrtri|boxHu|clubs|boxHU|times|colon|Colon|gimel|xlArr|Tilde|nsime|tilde|nsmid|nspar|THORN|thorn|xlarr|nsube|nsubE|thkap|xhArr|comma|nsucc|boxul|boxuL|nsupe|nsupE|gneqq|gnsim|boxUl|boxUL|grave|boxur|boxuR|boxUr|boxUR|lescc|angle|bepsi|boxvh|varpi|boxvH|numsp|Theta|gsime|gsiml|theta|boxVh|boxVH|boxvl|gtcir|gtdot|boxvL|boxVl|boxVL|crarr|cross|Cross|nvsim|boxvr|nwarr|nwArr|sqsup|dtdot|Uogon|lhard|lharu|dtrif|ocirc|Ocirc|lhblk|duarr|odash|sqsub|Hacek|sqcup|llarr|duhar|oelig|OElig|ofcir|boxvR|uogon|lltri|boxVr|csube|uuarr|ohbar|csupe|ctdot|olarr|olcir|harrw|oline|sqcap|omacr|Omacr|omega|Omega|boxVR|aleph|lneqq|lnsim|loang|loarr|rharu|lobrk|hcirc|operp|oplus|rhard|Hcirc|orarr|Union|order|ecirc|Ecirc|cuepr|szlig|cuesc|breve|reals|eDDot|Breve|hoarr|lopar|utrif|rdquo|Umacr|umacr|efDot|swArr|ultri|alpha|rceil|ovbar|swarr|Wcirc|wcirc|smtes|smile|bsemi|lrarr|aring|parsl|lrhar|bsime|uhblk|lrtri|cupor|Aring|uharr|uharl|slarr|rbrke|bsolb|lsime|rbbrk|RBarr|lsimg|phone|rBarr|rbarr|icirc|lsquo|Icirc|emacr|Emacr|ratio|simne|plusb|simlE|simgE|simeq|pluse|ltcir|ltdot|empty|xharr|xdtri|iexcl|Alpha|ltrie|rarrw|pound|ltrif|xcirc|bumpe|prcue|bumpE|asymp|amacr|cuvee|Sigma|sigma|iiint|udhar|iiota|ijlig|IJlig|supnE|imacr|Imacr|prime|Prime|image|prnap|eogon|Eogon|rarrc|mdash|mDDot|cuwed|imath|supne|imped|Amacr|udarr|prsim|micro|rarrb|cwint|raquo|infin|eplus|range|rangd|Ucirc|radic|minus|amalg|veeeq|rAarr|epsiv|ycirc|quest|sharp|quot|zwnj|Qscr|race|qscr|Qopf|qopf|qint|rang|Rang|Zscr|zscr|Zopf|zopf|rarr|rArr|Rarr|Pscr|pscr|prop|prod|prnE|prec|ZHcy|zhcy|prap|Zeta|zeta|Popf|popf|Zdot|plus|zdot|Yuml|yuml|phiv|YUcy|yucy|Yscr|yscr|perp|Yopf|yopf|part|para|YIcy|Ouml|rcub|yicy|YAcy|rdca|ouml|osol|Oscr|rdsh|yacy|real|oscr|xvee|andd|rect|andv|Xscr|oror|ordm|ordf|xscr|ange|aopf|Aopf|rHar|Xopf|opar|Oopf|xopf|xnis|rhov|oopf|omid|xmap|oint|apid|apos|ogon|ascr|Ascr|odot|odiv|xcup|xcap|ocir|oast|nvlt|nvle|nvgt|nvge|nvap|Wscr|wscr|auml|ntlg|ntgl|nsup|nsub|nsim|Nscr|nscr|nsce|Wopf|ring|npre|wopf|npar|Auml|Barv|bbrk|Nopf|nopf|nmid|nLtv|beta|ropf|Ropf|Beta|beth|nles|rpar|nleq|bnot|bNot|nldr|NJcy|rscr|Rscr|Vscr|vscr|rsqb|njcy|bopf|nisd|Bopf|rtri|Vopf|nGtv|ngtr|vopf|boxh|boxH|boxv|nges|ngeq|boxV|bscr|scap|Bscr|bsim|Vert|vert|bsol|bull|bump|caps|cdot|ncup|scnE|ncap|nbsp|napE|Cdot|cent|sdot|Vbar|nang|vBar|chcy|Mscr|mscr|sect|semi|CHcy|Mopf|mopf|sext|circ|cire|mldr|mlcp|cirE|comp|shcy|SHcy|vArr|varr|cong|copf|Copf|copy|COPY|malt|male|macr|lvnE|cscr|ltri|sime|ltcc|simg|Cscr|siml|csub|Uuml|lsqb|lsim|uuml|csup|Lscr|lscr|utri|smid|lpar|cups|smte|lozf|darr|Lopf|Uscr|solb|lopf|sopf|Sopf|lneq|uscr|spar|dArr|lnap|Darr|dash|Sqrt|LJcy|ljcy|lHar|dHar|Upsi|upsi|diam|lesg|djcy|DJcy|leqq|dopf|Dopf|dscr|Dscr|dscy|ldsh|ldca|squf|DScy|sscr|Sscr|dsol|lcub|late|star|Star|Uopf|Larr|lArr|larr|uopf|dtri|dzcy|sube|subE|Lang|lang|Kscr|kscr|Kopf|kopf|KJcy|kjcy|KHcy|khcy|DZcy|ecir|edot|eDot|Jscr|jscr|succ|Jopf|jopf|Edot|uHar|emsp|ensp|Iuml|iuml|eopf|isin|Iscr|iscr|Eopf|epar|sung|epsi|escr|sup1|sup2|sup3|Iota|iota|supe|supE|Iopf|iopf|IOcy|iocy|Escr|esim|Esim|imof|Uarr|QUOT|uArr|uarr|euml|IEcy|iecy|Idot|Euml|euro|excl|Hscr|hscr|Hopf|hopf|TScy|tscy|Tscr|hbar|tscr|flat|tbrk|fnof|hArr|harr|half|fopf|Fopf|tdot|gvnE|fork|trie|gtcc|fscr|Fscr|gdot|gsim|Gscr|gscr|Gopf|gopf|gneq|Gdot|tosa|gnap|Topf|topf|geqq|toea|GJcy|gjcy|tint|gesl|mid|Sfr|ggg|top|ges|gla|glE|glj|geq|gne|gEl|gel|gnE|Gcy|gcy|gap|Tfr|tfr|Tcy|tcy|Hat|Tau|Ffr|tau|Tab|hfr|Hfr|ffr|Fcy|fcy|icy|Icy|iff|ETH|eth|ifr|Ifr|Eta|eta|int|Int|Sup|sup|ucy|Ucy|Sum|sum|jcy|ENG|ufr|Ufr|eng|Jcy|jfr|els|ell|egs|Efr|efr|Jfr|uml|kcy|Kcy|Ecy|ecy|kfr|Kfr|lap|Sub|sub|lat|lcy|Lcy|leg|Dot|dot|lEg|leq|les|squ|div|die|lfr|Lfr|lgE|Dfr|dfr|Del|deg|Dcy|dcy|lne|lnE|sol|loz|smt|Cup|lrm|cup|lsh|Lsh|sim|shy|map|Map|mcy|Mcy|mfr|Mfr|mho|gfr|Gfr|sfr|cir|Chi|chi|nap|Cfr|vcy|Vcy|cfr|Scy|scy|ncy|Ncy|vee|Vee|Cap|cap|nfr|scE|sce|Nfr|nge|ngE|nGg|vfr|Vfr|ngt|bot|nGt|nis|niv|Rsh|rsh|nle|nlE|bne|Bfr|bfr|nLl|nlt|nLt|Bcy|bcy|not|Not|rlm|wfr|Wfr|npr|nsc|num|ocy|ast|Ocy|ofr|xfr|Xfr|Ofr|ogt|ohm|apE|olt|Rho|ape|rho|Rfr|rfr|ord|REG|ang|reg|orv|And|and|AMP|Rcy|amp|Afr|ycy|Ycy|yen|yfr|Yfr|rcy|par|pcy|Pcy|pfr|Pfr|phi|Phi|afr|Acy|acy|zcy|Zcy|piv|acE|acd|zfr|Zfr|pre|prE|psi|Psi|qfr|Qfr|zwj|Or|ge|Gg|gt|gg|el|oS|lt|Lt|LT|Re|lg|gl|eg|ne|Im|it|le|DD|wp|wr|nu|Nu|dd|lE|Sc|sc|pi|Pi|ee|af|ll|Ll|rx|gE|xi|pm|Xi|ic|pr|Pr|in|ni|mp|mu|ac|Mu|or|ap|Gt|GT|ii);|&(Aacute|Agrave|Atilde|Ccedil|Eacute|Egrave|Iacute|Igrave|Ntilde|Oacute|Ograve|Oslash|Otilde|Uacute|Ugrave|Yacute|aacute|agrave|atilde|brvbar|ccedil|curren|divide|eacute|egrave|frac12|frac14|frac34|iacute|igrave|iquest|middot|ntilde|oacute|ograve|oslash|otilde|plusmn|uacute|ugrave|yacute|AElig|Acirc|Aring|Ecirc|Icirc|Ocirc|THORN|Ucirc|acirc|acute|aelig|aring|cedil|ecirc|icirc|iexcl|laquo|micro|ocirc|pound|raquo|szlig|thorn|times|ucirc|Auml|COPY|Euml|Iuml|Ouml|QUOT|Uuml|auml|cent|copy|euml|iuml|macr|nbsp|ordf|ordm|ouml|para|quot|sect|sup1|sup2|sup3|uuml|yuml|AMP|ETH|REG|amp|deg|eth|not|reg|shy|uml|yen|GT|LT|gt|lt)(?!;)([=a-zA-Z0-9]?)|&#([0-9]+)(;?)|&#[xX]([a-fA-F0-9]+)(;?)|&([0-9a-zA-Z]+)/g;
	var decodeMap = {'aacute':'\xE1','Aacute':'\xC1','abreve':'\u0103','Abreve':'\u0102','ac':'\u223E','acd':'\u223F','acE':'\u223E\u0333','acirc':'\xE2','Acirc':'\xC2','acute':'\xB4','acy':'\u0430','Acy':'\u0410','aelig':'\xE6','AElig':'\xC6','af':'\u2061','afr':'\uD835\uDD1E','Afr':'\uD835\uDD04','agrave':'\xE0','Agrave':'\xC0','alefsym':'\u2135','aleph':'\u2135','alpha':'\u03B1','Alpha':'\u0391','amacr':'\u0101','Amacr':'\u0100','amalg':'\u2A3F','amp':'&','AMP':'&','and':'\u2227','And':'\u2A53','andand':'\u2A55','andd':'\u2A5C','andslope':'\u2A58','andv':'\u2A5A','ang':'\u2220','ange':'\u29A4','angle':'\u2220','angmsd':'\u2221','angmsdaa':'\u29A8','angmsdab':'\u29A9','angmsdac':'\u29AA','angmsdad':'\u29AB','angmsdae':'\u29AC','angmsdaf':'\u29AD','angmsdag':'\u29AE','angmsdah':'\u29AF','angrt':'\u221F','angrtvb':'\u22BE','angrtvbd':'\u299D','angsph':'\u2222','angst':'\xC5','angzarr':'\u237C','aogon':'\u0105','Aogon':'\u0104','aopf':'\uD835\uDD52','Aopf':'\uD835\uDD38','ap':'\u2248','apacir':'\u2A6F','ape':'\u224A','apE':'\u2A70','apid':'\u224B','apos':'\'','ApplyFunction':'\u2061','approx':'\u2248','approxeq':'\u224A','aring':'\xE5','Aring':'\xC5','ascr':'\uD835\uDCB6','Ascr':'\uD835\uDC9C','Assign':'\u2254','ast':'*','asymp':'\u2248','asympeq':'\u224D','atilde':'\xE3','Atilde':'\xC3','auml':'\xE4','Auml':'\xC4','awconint':'\u2233','awint':'\u2A11','backcong':'\u224C','backepsilon':'\u03F6','backprime':'\u2035','backsim':'\u223D','backsimeq':'\u22CD','Backslash':'\u2216','Barv':'\u2AE7','barvee':'\u22BD','barwed':'\u2305','Barwed':'\u2306','barwedge':'\u2305','bbrk':'\u23B5','bbrktbrk':'\u23B6','bcong':'\u224C','bcy':'\u0431','Bcy':'\u0411','bdquo':'\u201E','becaus':'\u2235','because':'\u2235','Because':'\u2235','bemptyv':'\u29B0','bepsi':'\u03F6','bernou':'\u212C','Bernoullis':'\u212C','beta':'\u03B2','Beta':'\u0392','beth':'\u2136','between':'\u226C','bfr':'\uD835\uDD1F','Bfr':'\uD835\uDD05','bigcap':'\u22C2','bigcirc':'\u25EF','bigcup':'\u22C3','bigodot':'\u2A00','bigoplus':'\u2A01','bigotimes':'\u2A02','bigsqcup':'\u2A06','bigstar':'\u2605','bigtriangledown':'\u25BD','bigtriangleup':'\u25B3','biguplus':'\u2A04','bigvee':'\u22C1','bigwedge':'\u22C0','bkarow':'\u290D','blacklozenge':'\u29EB','blacksquare':'\u25AA','blacktriangle':'\u25B4','blacktriangledown':'\u25BE','blacktriangleleft':'\u25C2','blacktriangleright':'\u25B8','blank':'\u2423','blk12':'\u2592','blk14':'\u2591','blk34':'\u2593','block':'\u2588','bne':'=\u20E5','bnequiv':'\u2261\u20E5','bnot':'\u2310','bNot':'\u2AED','bopf':'\uD835\uDD53','Bopf':'\uD835\uDD39','bot':'\u22A5','bottom':'\u22A5','bowtie':'\u22C8','boxbox':'\u29C9','boxdl':'\u2510','boxdL':'\u2555','boxDl':'\u2556','boxDL':'\u2557','boxdr':'\u250C','boxdR':'\u2552','boxDr':'\u2553','boxDR':'\u2554','boxh':'\u2500','boxH':'\u2550','boxhd':'\u252C','boxhD':'\u2565','boxHd':'\u2564','boxHD':'\u2566','boxhu':'\u2534','boxhU':'\u2568','boxHu':'\u2567','boxHU':'\u2569','boxminus':'\u229F','boxplus':'\u229E','boxtimes':'\u22A0','boxul':'\u2518','boxuL':'\u255B','boxUl':'\u255C','boxUL':'\u255D','boxur':'\u2514','boxuR':'\u2558','boxUr':'\u2559','boxUR':'\u255A','boxv':'\u2502','boxV':'\u2551','boxvh':'\u253C','boxvH':'\u256A','boxVh':'\u256B','boxVH':'\u256C','boxvl':'\u2524','boxvL':'\u2561','boxVl':'\u2562','boxVL':'\u2563','boxvr':'\u251C','boxvR':'\u255E','boxVr':'\u255F','boxVR':'\u2560','bprime':'\u2035','breve':'\u02D8','Breve':'\u02D8','brvbar':'\xA6','bscr':'\uD835\uDCB7','Bscr':'\u212C','bsemi':'\u204F','bsim':'\u223D','bsime':'\u22CD','bsol':'\\','bsolb':'\u29C5','bsolhsub':'\u27C8','bull':'\u2022','bullet':'\u2022','bump':'\u224E','bumpe':'\u224F','bumpE':'\u2AAE','bumpeq':'\u224F','Bumpeq':'\u224E','cacute':'\u0107','Cacute':'\u0106','cap':'\u2229','Cap':'\u22D2','capand':'\u2A44','capbrcup':'\u2A49','capcap':'\u2A4B','capcup':'\u2A47','capdot':'\u2A40','CapitalDifferentialD':'\u2145','caps':'\u2229\uFE00','caret':'\u2041','caron':'\u02C7','Cayleys':'\u212D','ccaps':'\u2A4D','ccaron':'\u010D','Ccaron':'\u010C','ccedil':'\xE7','Ccedil':'\xC7','ccirc':'\u0109','Ccirc':'\u0108','Cconint':'\u2230','ccups':'\u2A4C','ccupssm':'\u2A50','cdot':'\u010B','Cdot':'\u010A','cedil':'\xB8','Cedilla':'\xB8','cemptyv':'\u29B2','cent':'\xA2','centerdot':'\xB7','CenterDot':'\xB7','cfr':'\uD835\uDD20','Cfr':'\u212D','chcy':'\u0447','CHcy':'\u0427','check':'\u2713','checkmark':'\u2713','chi':'\u03C7','Chi':'\u03A7','cir':'\u25CB','circ':'\u02C6','circeq':'\u2257','circlearrowleft':'\u21BA','circlearrowright':'\u21BB','circledast':'\u229B','circledcirc':'\u229A','circleddash':'\u229D','CircleDot':'\u2299','circledR':'\xAE','circledS':'\u24C8','CircleMinus':'\u2296','CirclePlus':'\u2295','CircleTimes':'\u2297','cire':'\u2257','cirE':'\u29C3','cirfnint':'\u2A10','cirmid':'\u2AEF','cirscir':'\u29C2','ClockwiseContourIntegral':'\u2232','CloseCurlyDoubleQuote':'\u201D','CloseCurlyQuote':'\u2019','clubs':'\u2663','clubsuit':'\u2663','colon':':','Colon':'\u2237','colone':'\u2254','Colone':'\u2A74','coloneq':'\u2254','comma':',','commat':'@','comp':'\u2201','compfn':'\u2218','complement':'\u2201','complexes':'\u2102','cong':'\u2245','congdot':'\u2A6D','Congruent':'\u2261','conint':'\u222E','Conint':'\u222F','ContourIntegral':'\u222E','copf':'\uD835\uDD54','Copf':'\u2102','coprod':'\u2210','Coproduct':'\u2210','copy':'\xA9','COPY':'\xA9','copysr':'\u2117','CounterClockwiseContourIntegral':'\u2233','crarr':'\u21B5','cross':'\u2717','Cross':'\u2A2F','cscr':'\uD835\uDCB8','Cscr':'\uD835\uDC9E','csub':'\u2ACF','csube':'\u2AD1','csup':'\u2AD0','csupe':'\u2AD2','ctdot':'\u22EF','cudarrl':'\u2938','cudarrr':'\u2935','cuepr':'\u22DE','cuesc':'\u22DF','cularr':'\u21B6','cularrp':'\u293D','cup':'\u222A','Cup':'\u22D3','cupbrcap':'\u2A48','cupcap':'\u2A46','CupCap':'\u224D','cupcup':'\u2A4A','cupdot':'\u228D','cupor':'\u2A45','cups':'\u222A\uFE00','curarr':'\u21B7','curarrm':'\u293C','curlyeqprec':'\u22DE','curlyeqsucc':'\u22DF','curlyvee':'\u22CE','curlywedge':'\u22CF','curren':'\xA4','curvearrowleft':'\u21B6','curvearrowright':'\u21B7','cuvee':'\u22CE','cuwed':'\u22CF','cwconint':'\u2232','cwint':'\u2231','cylcty':'\u232D','dagger':'\u2020','Dagger':'\u2021','daleth':'\u2138','darr':'\u2193','dArr':'\u21D3','Darr':'\u21A1','dash':'\u2010','dashv':'\u22A3','Dashv':'\u2AE4','dbkarow':'\u290F','dblac':'\u02DD','dcaron':'\u010F','Dcaron':'\u010E','dcy':'\u0434','Dcy':'\u0414','dd':'\u2146','DD':'\u2145','ddagger':'\u2021','ddarr':'\u21CA','DDotrahd':'\u2911','ddotseq':'\u2A77','deg':'\xB0','Del':'\u2207','delta':'\u03B4','Delta':'\u0394','demptyv':'\u29B1','dfisht':'\u297F','dfr':'\uD835\uDD21','Dfr':'\uD835\uDD07','dHar':'\u2965','dharl':'\u21C3','dharr':'\u21C2','DiacriticalAcute':'\xB4','DiacriticalDot':'\u02D9','DiacriticalDoubleAcute':'\u02DD','DiacriticalGrave':'`','DiacriticalTilde':'\u02DC','diam':'\u22C4','diamond':'\u22C4','Diamond':'\u22C4','diamondsuit':'\u2666','diams':'\u2666','die':'\xA8','DifferentialD':'\u2146','digamma':'\u03DD','disin':'\u22F2','div':'\xF7','divide':'\xF7','divideontimes':'\u22C7','divonx':'\u22C7','djcy':'\u0452','DJcy':'\u0402','dlcorn':'\u231E','dlcrop':'\u230D','dollar':'$','dopf':'\uD835\uDD55','Dopf':'\uD835\uDD3B','dot':'\u02D9','Dot':'\xA8','DotDot':'\u20DC','doteq':'\u2250','doteqdot':'\u2251','DotEqual':'\u2250','dotminus':'\u2238','dotplus':'\u2214','dotsquare':'\u22A1','doublebarwedge':'\u2306','DoubleContourIntegral':'\u222F','DoubleDot':'\xA8','DoubleDownArrow':'\u21D3','DoubleLeftArrow':'\u21D0','DoubleLeftRightArrow':'\u21D4','DoubleLeftTee':'\u2AE4','DoubleLongLeftArrow':'\u27F8','DoubleLongLeftRightArrow':'\u27FA','DoubleLongRightArrow':'\u27F9','DoubleRightArrow':'\u21D2','DoubleRightTee':'\u22A8','DoubleUpArrow':'\u21D1','DoubleUpDownArrow':'\u21D5','DoubleVerticalBar':'\u2225','downarrow':'\u2193','Downarrow':'\u21D3','DownArrow':'\u2193','DownArrowBar':'\u2913','DownArrowUpArrow':'\u21F5','DownBreve':'\u0311','downdownarrows':'\u21CA','downharpoonleft':'\u21C3','downharpoonright':'\u21C2','DownLeftRightVector':'\u2950','DownLeftTeeVector':'\u295E','DownLeftVector':'\u21BD','DownLeftVectorBar':'\u2956','DownRightTeeVector':'\u295F','DownRightVector':'\u21C1','DownRightVectorBar':'\u2957','DownTee':'\u22A4','DownTeeArrow':'\u21A7','drbkarow':'\u2910','drcorn':'\u231F','drcrop':'\u230C','dscr':'\uD835\uDCB9','Dscr':'\uD835\uDC9F','dscy':'\u0455','DScy':'\u0405','dsol':'\u29F6','dstrok':'\u0111','Dstrok':'\u0110','dtdot':'\u22F1','dtri':'\u25BF','dtrif':'\u25BE','duarr':'\u21F5','duhar':'\u296F','dwangle':'\u29A6','dzcy':'\u045F','DZcy':'\u040F','dzigrarr':'\u27FF','eacute':'\xE9','Eacute':'\xC9','easter':'\u2A6E','ecaron':'\u011B','Ecaron':'\u011A','ecir':'\u2256','ecirc':'\xEA','Ecirc':'\xCA','ecolon':'\u2255','ecy':'\u044D','Ecy':'\u042D','eDDot':'\u2A77','edot':'\u0117','eDot':'\u2251','Edot':'\u0116','ee':'\u2147','efDot':'\u2252','efr':'\uD835\uDD22','Efr':'\uD835\uDD08','eg':'\u2A9A','egrave':'\xE8','Egrave':'\xC8','egs':'\u2A96','egsdot':'\u2A98','el':'\u2A99','Element':'\u2208','elinters':'\u23E7','ell':'\u2113','els':'\u2A95','elsdot':'\u2A97','emacr':'\u0113','Emacr':'\u0112','empty':'\u2205','emptyset':'\u2205','EmptySmallSquare':'\u25FB','emptyv':'\u2205','EmptyVerySmallSquare':'\u25AB','emsp':'\u2003','emsp13':'\u2004','emsp14':'\u2005','eng':'\u014B','ENG':'\u014A','ensp':'\u2002','eogon':'\u0119','Eogon':'\u0118','eopf':'\uD835\uDD56','Eopf':'\uD835\uDD3C','epar':'\u22D5','eparsl':'\u29E3','eplus':'\u2A71','epsi':'\u03B5','epsilon':'\u03B5','Epsilon':'\u0395','epsiv':'\u03F5','eqcirc':'\u2256','eqcolon':'\u2255','eqsim':'\u2242','eqslantgtr':'\u2A96','eqslantless':'\u2A95','Equal':'\u2A75','equals':'=','EqualTilde':'\u2242','equest':'\u225F','Equilibrium':'\u21CC','equiv':'\u2261','equivDD':'\u2A78','eqvparsl':'\u29E5','erarr':'\u2971','erDot':'\u2253','escr':'\u212F','Escr':'\u2130','esdot':'\u2250','esim':'\u2242','Esim':'\u2A73','eta':'\u03B7','Eta':'\u0397','eth':'\xF0','ETH':'\xD0','euml':'\xEB','Euml':'\xCB','euro':'\u20AC','excl':'!','exist':'\u2203','Exists':'\u2203','expectation':'\u2130','exponentiale':'\u2147','ExponentialE':'\u2147','fallingdotseq':'\u2252','fcy':'\u0444','Fcy':'\u0424','female':'\u2640','ffilig':'\uFB03','fflig':'\uFB00','ffllig':'\uFB04','ffr':'\uD835\uDD23','Ffr':'\uD835\uDD09','filig':'\uFB01','FilledSmallSquare':'\u25FC','FilledVerySmallSquare':'\u25AA','fjlig':'fj','flat':'\u266D','fllig':'\uFB02','fltns':'\u25B1','fnof':'\u0192','fopf':'\uD835\uDD57','Fopf':'\uD835\uDD3D','forall':'\u2200','ForAll':'\u2200','fork':'\u22D4','forkv':'\u2AD9','Fouriertrf':'\u2131','fpartint':'\u2A0D','frac12':'\xBD','frac13':'\u2153','frac14':'\xBC','frac15':'\u2155','frac16':'\u2159','frac18':'\u215B','frac23':'\u2154','frac25':'\u2156','frac34':'\xBE','frac35':'\u2157','frac38':'\u215C','frac45':'\u2158','frac56':'\u215A','frac58':'\u215D','frac78':'\u215E','frasl':'\u2044','frown':'\u2322','fscr':'\uD835\uDCBB','Fscr':'\u2131','gacute':'\u01F5','gamma':'\u03B3','Gamma':'\u0393','gammad':'\u03DD','Gammad':'\u03DC','gap':'\u2A86','gbreve':'\u011F','Gbreve':'\u011E','Gcedil':'\u0122','gcirc':'\u011D','Gcirc':'\u011C','gcy':'\u0433','Gcy':'\u0413','gdot':'\u0121','Gdot':'\u0120','ge':'\u2265','gE':'\u2267','gel':'\u22DB','gEl':'\u2A8C','geq':'\u2265','geqq':'\u2267','geqslant':'\u2A7E','ges':'\u2A7E','gescc':'\u2AA9','gesdot':'\u2A80','gesdoto':'\u2A82','gesdotol':'\u2A84','gesl':'\u22DB\uFE00','gesles':'\u2A94','gfr':'\uD835\uDD24','Gfr':'\uD835\uDD0A','gg':'\u226B','Gg':'\u22D9','ggg':'\u22D9','gimel':'\u2137','gjcy':'\u0453','GJcy':'\u0403','gl':'\u2277','gla':'\u2AA5','glE':'\u2A92','glj':'\u2AA4','gnap':'\u2A8A','gnapprox':'\u2A8A','gne':'\u2A88','gnE':'\u2269','gneq':'\u2A88','gneqq':'\u2269','gnsim':'\u22E7','gopf':'\uD835\uDD58','Gopf':'\uD835\uDD3E','grave':'`','GreaterEqual':'\u2265','GreaterEqualLess':'\u22DB','GreaterFullEqual':'\u2267','GreaterGreater':'\u2AA2','GreaterLess':'\u2277','GreaterSlantEqual':'\u2A7E','GreaterTilde':'\u2273','gscr':'\u210A','Gscr':'\uD835\uDCA2','gsim':'\u2273','gsime':'\u2A8E','gsiml':'\u2A90','gt':'>','Gt':'\u226B','GT':'>','gtcc':'\u2AA7','gtcir':'\u2A7A','gtdot':'\u22D7','gtlPar':'\u2995','gtquest':'\u2A7C','gtrapprox':'\u2A86','gtrarr':'\u2978','gtrdot':'\u22D7','gtreqless':'\u22DB','gtreqqless':'\u2A8C','gtrless':'\u2277','gtrsim':'\u2273','gvertneqq':'\u2269\uFE00','gvnE':'\u2269\uFE00','Hacek':'\u02C7','hairsp':'\u200A','half':'\xBD','hamilt':'\u210B','hardcy':'\u044A','HARDcy':'\u042A','harr':'\u2194','hArr':'\u21D4','harrcir':'\u2948','harrw':'\u21AD','Hat':'^','hbar':'\u210F','hcirc':'\u0125','Hcirc':'\u0124','hearts':'\u2665','heartsuit':'\u2665','hellip':'\u2026','hercon':'\u22B9','hfr':'\uD835\uDD25','Hfr':'\u210C','HilbertSpace':'\u210B','hksearow':'\u2925','hkswarow':'\u2926','hoarr':'\u21FF','homtht':'\u223B','hookleftarrow':'\u21A9','hookrightarrow':'\u21AA','hopf':'\uD835\uDD59','Hopf':'\u210D','horbar':'\u2015','HorizontalLine':'\u2500','hscr':'\uD835\uDCBD','Hscr':'\u210B','hslash':'\u210F','hstrok':'\u0127','Hstrok':'\u0126','HumpDownHump':'\u224E','HumpEqual':'\u224F','hybull':'\u2043','hyphen':'\u2010','iacute':'\xED','Iacute':'\xCD','ic':'\u2063','icirc':'\xEE','Icirc':'\xCE','icy':'\u0438','Icy':'\u0418','Idot':'\u0130','iecy':'\u0435','IEcy':'\u0415','iexcl':'\xA1','iff':'\u21D4','ifr':'\uD835\uDD26','Ifr':'\u2111','igrave':'\xEC','Igrave':'\xCC','ii':'\u2148','iiiint':'\u2A0C','iiint':'\u222D','iinfin':'\u29DC','iiota':'\u2129','ijlig':'\u0133','IJlig':'\u0132','Im':'\u2111','imacr':'\u012B','Imacr':'\u012A','image':'\u2111','ImaginaryI':'\u2148','imagline':'\u2110','imagpart':'\u2111','imath':'\u0131','imof':'\u22B7','imped':'\u01B5','Implies':'\u21D2','in':'\u2208','incare':'\u2105','infin':'\u221E','infintie':'\u29DD','inodot':'\u0131','int':'\u222B','Int':'\u222C','intcal':'\u22BA','integers':'\u2124','Integral':'\u222B','intercal':'\u22BA','Intersection':'\u22C2','intlarhk':'\u2A17','intprod':'\u2A3C','InvisibleComma':'\u2063','InvisibleTimes':'\u2062','iocy':'\u0451','IOcy':'\u0401','iogon':'\u012F','Iogon':'\u012E','iopf':'\uD835\uDD5A','Iopf':'\uD835\uDD40','iota':'\u03B9','Iota':'\u0399','iprod':'\u2A3C','iquest':'\xBF','iscr':'\uD835\uDCBE','Iscr':'\u2110','isin':'\u2208','isindot':'\u22F5','isinE':'\u22F9','isins':'\u22F4','isinsv':'\u22F3','isinv':'\u2208','it':'\u2062','itilde':'\u0129','Itilde':'\u0128','iukcy':'\u0456','Iukcy':'\u0406','iuml':'\xEF','Iuml':'\xCF','jcirc':'\u0135','Jcirc':'\u0134','jcy':'\u0439','Jcy':'\u0419','jfr':'\uD835\uDD27','Jfr':'\uD835\uDD0D','jmath':'\u0237','jopf':'\uD835\uDD5B','Jopf':'\uD835\uDD41','jscr':'\uD835\uDCBF','Jscr':'\uD835\uDCA5','jsercy':'\u0458','Jsercy':'\u0408','jukcy':'\u0454','Jukcy':'\u0404','kappa':'\u03BA','Kappa':'\u039A','kappav':'\u03F0','kcedil':'\u0137','Kcedil':'\u0136','kcy':'\u043A','Kcy':'\u041A','kfr':'\uD835\uDD28','Kfr':'\uD835\uDD0E','kgreen':'\u0138','khcy':'\u0445','KHcy':'\u0425','kjcy':'\u045C','KJcy':'\u040C','kopf':'\uD835\uDD5C','Kopf':'\uD835\uDD42','kscr':'\uD835\uDCC0','Kscr':'\uD835\uDCA6','lAarr':'\u21DA','lacute':'\u013A','Lacute':'\u0139','laemptyv':'\u29B4','lagran':'\u2112','lambda':'\u03BB','Lambda':'\u039B','lang':'\u27E8','Lang':'\u27EA','langd':'\u2991','langle':'\u27E8','lap':'\u2A85','Laplacetrf':'\u2112','laquo':'\xAB','larr':'\u2190','lArr':'\u21D0','Larr':'\u219E','larrb':'\u21E4','larrbfs':'\u291F','larrfs':'\u291D','larrhk':'\u21A9','larrlp':'\u21AB','larrpl':'\u2939','larrsim':'\u2973','larrtl':'\u21A2','lat':'\u2AAB','latail':'\u2919','lAtail':'\u291B','late':'\u2AAD','lates':'\u2AAD\uFE00','lbarr':'\u290C','lBarr':'\u290E','lbbrk':'\u2772','lbrace':'{','lbrack':'[','lbrke':'\u298B','lbrksld':'\u298F','lbrkslu':'\u298D','lcaron':'\u013E','Lcaron':'\u013D','lcedil':'\u013C','Lcedil':'\u013B','lceil':'\u2308','lcub':'{','lcy':'\u043B','Lcy':'\u041B','ldca':'\u2936','ldquo':'\u201C','ldquor':'\u201E','ldrdhar':'\u2967','ldrushar':'\u294B','ldsh':'\u21B2','le':'\u2264','lE':'\u2266','LeftAngleBracket':'\u27E8','leftarrow':'\u2190','Leftarrow':'\u21D0','LeftArrow':'\u2190','LeftArrowBar':'\u21E4','LeftArrowRightArrow':'\u21C6','leftarrowtail':'\u21A2','LeftCeiling':'\u2308','LeftDoubleBracket':'\u27E6','LeftDownTeeVector':'\u2961','LeftDownVector':'\u21C3','LeftDownVectorBar':'\u2959','LeftFloor':'\u230A','leftharpoondown':'\u21BD','leftharpoonup':'\u21BC','leftleftarrows':'\u21C7','leftrightarrow':'\u2194','Leftrightarrow':'\u21D4','LeftRightArrow':'\u2194','leftrightarrows':'\u21C6','leftrightharpoons':'\u21CB','leftrightsquigarrow':'\u21AD','LeftRightVector':'\u294E','LeftTee':'\u22A3','LeftTeeArrow':'\u21A4','LeftTeeVector':'\u295A','leftthreetimes':'\u22CB','LeftTriangle':'\u22B2','LeftTriangleBar':'\u29CF','LeftTriangleEqual':'\u22B4','LeftUpDownVector':'\u2951','LeftUpTeeVector':'\u2960','LeftUpVector':'\u21BF','LeftUpVectorBar':'\u2958','LeftVector':'\u21BC','LeftVectorBar':'\u2952','leg':'\u22DA','lEg':'\u2A8B','leq':'\u2264','leqq':'\u2266','leqslant':'\u2A7D','les':'\u2A7D','lescc':'\u2AA8','lesdot':'\u2A7F','lesdoto':'\u2A81','lesdotor':'\u2A83','lesg':'\u22DA\uFE00','lesges':'\u2A93','lessapprox':'\u2A85','lessdot':'\u22D6','lesseqgtr':'\u22DA','lesseqqgtr':'\u2A8B','LessEqualGreater':'\u22DA','LessFullEqual':'\u2266','LessGreater':'\u2276','lessgtr':'\u2276','LessLess':'\u2AA1','lesssim':'\u2272','LessSlantEqual':'\u2A7D','LessTilde':'\u2272','lfisht':'\u297C','lfloor':'\u230A','lfr':'\uD835\uDD29','Lfr':'\uD835\uDD0F','lg':'\u2276','lgE':'\u2A91','lHar':'\u2962','lhard':'\u21BD','lharu':'\u21BC','lharul':'\u296A','lhblk':'\u2584','ljcy':'\u0459','LJcy':'\u0409','ll':'\u226A','Ll':'\u22D8','llarr':'\u21C7','llcorner':'\u231E','Lleftarrow':'\u21DA','llhard':'\u296B','lltri':'\u25FA','lmidot':'\u0140','Lmidot':'\u013F','lmoust':'\u23B0','lmoustache':'\u23B0','lnap':'\u2A89','lnapprox':'\u2A89','lne':'\u2A87','lnE':'\u2268','lneq':'\u2A87','lneqq':'\u2268','lnsim':'\u22E6','loang':'\u27EC','loarr':'\u21FD','lobrk':'\u27E6','longleftarrow':'\u27F5','Longleftarrow':'\u27F8','LongLeftArrow':'\u27F5','longleftrightarrow':'\u27F7','Longleftrightarrow':'\u27FA','LongLeftRightArrow':'\u27F7','longmapsto':'\u27FC','longrightarrow':'\u27F6','Longrightarrow':'\u27F9','LongRightArrow':'\u27F6','looparrowleft':'\u21AB','looparrowright':'\u21AC','lopar':'\u2985','lopf':'\uD835\uDD5D','Lopf':'\uD835\uDD43','loplus':'\u2A2D','lotimes':'\u2A34','lowast':'\u2217','lowbar':'_','LowerLeftArrow':'\u2199','LowerRightArrow':'\u2198','loz':'\u25CA','lozenge':'\u25CA','lozf':'\u29EB','lpar':'(','lparlt':'\u2993','lrarr':'\u21C6','lrcorner':'\u231F','lrhar':'\u21CB','lrhard':'\u296D','lrm':'\u200E','lrtri':'\u22BF','lsaquo':'\u2039','lscr':'\uD835\uDCC1','Lscr':'\u2112','lsh':'\u21B0','Lsh':'\u21B0','lsim':'\u2272','lsime':'\u2A8D','lsimg':'\u2A8F','lsqb':'[','lsquo':'\u2018','lsquor':'\u201A','lstrok':'\u0142','Lstrok':'\u0141','lt':'<','Lt':'\u226A','LT':'<','ltcc':'\u2AA6','ltcir':'\u2A79','ltdot':'\u22D6','lthree':'\u22CB','ltimes':'\u22C9','ltlarr':'\u2976','ltquest':'\u2A7B','ltri':'\u25C3','ltrie':'\u22B4','ltrif':'\u25C2','ltrPar':'\u2996','lurdshar':'\u294A','luruhar':'\u2966','lvertneqq':'\u2268\uFE00','lvnE':'\u2268\uFE00','macr':'\xAF','male':'\u2642','malt':'\u2720','maltese':'\u2720','map':'\u21A6','Map':'\u2905','mapsto':'\u21A6','mapstodown':'\u21A7','mapstoleft':'\u21A4','mapstoup':'\u21A5','marker':'\u25AE','mcomma':'\u2A29','mcy':'\u043C','Mcy':'\u041C','mdash':'\u2014','mDDot':'\u223A','measuredangle':'\u2221','MediumSpace':'\u205F','Mellintrf':'\u2133','mfr':'\uD835\uDD2A','Mfr':'\uD835\uDD10','mho':'\u2127','micro':'\xB5','mid':'\u2223','midast':'*','midcir':'\u2AF0','middot':'\xB7','minus':'\u2212','minusb':'\u229F','minusd':'\u2238','minusdu':'\u2A2A','MinusPlus':'\u2213','mlcp':'\u2ADB','mldr':'\u2026','mnplus':'\u2213','models':'\u22A7','mopf':'\uD835\uDD5E','Mopf':'\uD835\uDD44','mp':'\u2213','mscr':'\uD835\uDCC2','Mscr':'\u2133','mstpos':'\u223E','mu':'\u03BC','Mu':'\u039C','multimap':'\u22B8','mumap':'\u22B8','nabla':'\u2207','nacute':'\u0144','Nacute':'\u0143','nang':'\u2220\u20D2','nap':'\u2249','napE':'\u2A70\u0338','napid':'\u224B\u0338','napos':'\u0149','napprox':'\u2249','natur':'\u266E','natural':'\u266E','naturals':'\u2115','nbsp':'\xA0','nbump':'\u224E\u0338','nbumpe':'\u224F\u0338','ncap':'\u2A43','ncaron':'\u0148','Ncaron':'\u0147','ncedil':'\u0146','Ncedil':'\u0145','ncong':'\u2247','ncongdot':'\u2A6D\u0338','ncup':'\u2A42','ncy':'\u043D','Ncy':'\u041D','ndash':'\u2013','ne':'\u2260','nearhk':'\u2924','nearr':'\u2197','neArr':'\u21D7','nearrow':'\u2197','nedot':'\u2250\u0338','NegativeMediumSpace':'\u200B','NegativeThickSpace':'\u200B','NegativeThinSpace':'\u200B','NegativeVeryThinSpace':'\u200B','nequiv':'\u2262','nesear':'\u2928','nesim':'\u2242\u0338','NestedGreaterGreater':'\u226B','NestedLessLess':'\u226A','NewLine':'\n','nexist':'\u2204','nexists':'\u2204','nfr':'\uD835\uDD2B','Nfr':'\uD835\uDD11','nge':'\u2271','ngE':'\u2267\u0338','ngeq':'\u2271','ngeqq':'\u2267\u0338','ngeqslant':'\u2A7E\u0338','nges':'\u2A7E\u0338','nGg':'\u22D9\u0338','ngsim':'\u2275','ngt':'\u226F','nGt':'\u226B\u20D2','ngtr':'\u226F','nGtv':'\u226B\u0338','nharr':'\u21AE','nhArr':'\u21CE','nhpar':'\u2AF2','ni':'\u220B','nis':'\u22FC','nisd':'\u22FA','niv':'\u220B','njcy':'\u045A','NJcy':'\u040A','nlarr':'\u219A','nlArr':'\u21CD','nldr':'\u2025','nle':'\u2270','nlE':'\u2266\u0338','nleftarrow':'\u219A','nLeftarrow':'\u21CD','nleftrightarrow':'\u21AE','nLeftrightarrow':'\u21CE','nleq':'\u2270','nleqq':'\u2266\u0338','nleqslant':'\u2A7D\u0338','nles':'\u2A7D\u0338','nless':'\u226E','nLl':'\u22D8\u0338','nlsim':'\u2274','nlt':'\u226E','nLt':'\u226A\u20D2','nltri':'\u22EA','nltrie':'\u22EC','nLtv':'\u226A\u0338','nmid':'\u2224','NoBreak':'\u2060','NonBreakingSpace':'\xA0','nopf':'\uD835\uDD5F','Nopf':'\u2115','not':'\xAC','Not':'\u2AEC','NotCongruent':'\u2262','NotCupCap':'\u226D','NotDoubleVerticalBar':'\u2226','NotElement':'\u2209','NotEqual':'\u2260','NotEqualTilde':'\u2242\u0338','NotExists':'\u2204','NotGreater':'\u226F','NotGreaterEqual':'\u2271','NotGreaterFullEqual':'\u2267\u0338','NotGreaterGreater':'\u226B\u0338','NotGreaterLess':'\u2279','NotGreaterSlantEqual':'\u2A7E\u0338','NotGreaterTilde':'\u2275','NotHumpDownHump':'\u224E\u0338','NotHumpEqual':'\u224F\u0338','notin':'\u2209','notindot':'\u22F5\u0338','notinE':'\u22F9\u0338','notinva':'\u2209','notinvb':'\u22F7','notinvc':'\u22F6','NotLeftTriangle':'\u22EA','NotLeftTriangleBar':'\u29CF\u0338','NotLeftTriangleEqual':'\u22EC','NotLess':'\u226E','NotLessEqual':'\u2270','NotLessGreater':'\u2278','NotLessLess':'\u226A\u0338','NotLessSlantEqual':'\u2A7D\u0338','NotLessTilde':'\u2274','NotNestedGreaterGreater':'\u2AA2\u0338','NotNestedLessLess':'\u2AA1\u0338','notni':'\u220C','notniva':'\u220C','notnivb':'\u22FE','notnivc':'\u22FD','NotPrecedes':'\u2280','NotPrecedesEqual':'\u2AAF\u0338','NotPrecedesSlantEqual':'\u22E0','NotReverseElement':'\u220C','NotRightTriangle':'\u22EB','NotRightTriangleBar':'\u29D0\u0338','NotRightTriangleEqual':'\u22ED','NotSquareSubset':'\u228F\u0338','NotSquareSubsetEqual':'\u22E2','NotSquareSuperset':'\u2290\u0338','NotSquareSupersetEqual':'\u22E3','NotSubset':'\u2282\u20D2','NotSubsetEqual':'\u2288','NotSucceeds':'\u2281','NotSucceedsEqual':'\u2AB0\u0338','NotSucceedsSlantEqual':'\u22E1','NotSucceedsTilde':'\u227F\u0338','NotSuperset':'\u2283\u20D2','NotSupersetEqual':'\u2289','NotTilde':'\u2241','NotTildeEqual':'\u2244','NotTildeFullEqual':'\u2247','NotTildeTilde':'\u2249','NotVerticalBar':'\u2224','npar':'\u2226','nparallel':'\u2226','nparsl':'\u2AFD\u20E5','npart':'\u2202\u0338','npolint':'\u2A14','npr':'\u2280','nprcue':'\u22E0','npre':'\u2AAF\u0338','nprec':'\u2280','npreceq':'\u2AAF\u0338','nrarr':'\u219B','nrArr':'\u21CF','nrarrc':'\u2933\u0338','nrarrw':'\u219D\u0338','nrightarrow':'\u219B','nRightarrow':'\u21CF','nrtri':'\u22EB','nrtrie':'\u22ED','nsc':'\u2281','nsccue':'\u22E1','nsce':'\u2AB0\u0338','nscr':'\uD835\uDCC3','Nscr':'\uD835\uDCA9','nshortmid':'\u2224','nshortparallel':'\u2226','nsim':'\u2241','nsime':'\u2244','nsimeq':'\u2244','nsmid':'\u2224','nspar':'\u2226','nsqsube':'\u22E2','nsqsupe':'\u22E3','nsub':'\u2284','nsube':'\u2288','nsubE':'\u2AC5\u0338','nsubset':'\u2282\u20D2','nsubseteq':'\u2288','nsubseteqq':'\u2AC5\u0338','nsucc':'\u2281','nsucceq':'\u2AB0\u0338','nsup':'\u2285','nsupe':'\u2289','nsupE':'\u2AC6\u0338','nsupset':'\u2283\u20D2','nsupseteq':'\u2289','nsupseteqq':'\u2AC6\u0338','ntgl':'\u2279','ntilde':'\xF1','Ntilde':'\xD1','ntlg':'\u2278','ntriangleleft':'\u22EA','ntrianglelefteq':'\u22EC','ntriangleright':'\u22EB','ntrianglerighteq':'\u22ED','nu':'\u03BD','Nu':'\u039D','num':'#','numero':'\u2116','numsp':'\u2007','nvap':'\u224D\u20D2','nvdash':'\u22AC','nvDash':'\u22AD','nVdash':'\u22AE','nVDash':'\u22AF','nvge':'\u2265\u20D2','nvgt':'>\u20D2','nvHarr':'\u2904','nvinfin':'\u29DE','nvlArr':'\u2902','nvle':'\u2264\u20D2','nvlt':'<\u20D2','nvltrie':'\u22B4\u20D2','nvrArr':'\u2903','nvrtrie':'\u22B5\u20D2','nvsim':'\u223C\u20D2','nwarhk':'\u2923','nwarr':'\u2196','nwArr':'\u21D6','nwarrow':'\u2196','nwnear':'\u2927','oacute':'\xF3','Oacute':'\xD3','oast':'\u229B','ocir':'\u229A','ocirc':'\xF4','Ocirc':'\xD4','ocy':'\u043E','Ocy':'\u041E','odash':'\u229D','odblac':'\u0151','Odblac':'\u0150','odiv':'\u2A38','odot':'\u2299','odsold':'\u29BC','oelig':'\u0153','OElig':'\u0152','ofcir':'\u29BF','ofr':'\uD835\uDD2C','Ofr':'\uD835\uDD12','ogon':'\u02DB','ograve':'\xF2','Ograve':'\xD2','ogt':'\u29C1','ohbar':'\u29B5','ohm':'\u03A9','oint':'\u222E','olarr':'\u21BA','olcir':'\u29BE','olcross':'\u29BB','oline':'\u203E','olt':'\u29C0','omacr':'\u014D','Omacr':'\u014C','omega':'\u03C9','Omega':'\u03A9','omicron':'\u03BF','Omicron':'\u039F','omid':'\u29B6','ominus':'\u2296','oopf':'\uD835\uDD60','Oopf':'\uD835\uDD46','opar':'\u29B7','OpenCurlyDoubleQuote':'\u201C','OpenCurlyQuote':'\u2018','operp':'\u29B9','oplus':'\u2295','or':'\u2228','Or':'\u2A54','orarr':'\u21BB','ord':'\u2A5D','order':'\u2134','orderof':'\u2134','ordf':'\xAA','ordm':'\xBA','origof':'\u22B6','oror':'\u2A56','orslope':'\u2A57','orv':'\u2A5B','oS':'\u24C8','oscr':'\u2134','Oscr':'\uD835\uDCAA','oslash':'\xF8','Oslash':'\xD8','osol':'\u2298','otilde':'\xF5','Otilde':'\xD5','otimes':'\u2297','Otimes':'\u2A37','otimesas':'\u2A36','ouml':'\xF6','Ouml':'\xD6','ovbar':'\u233D','OverBar':'\u203E','OverBrace':'\u23DE','OverBracket':'\u23B4','OverParenthesis':'\u23DC','par':'\u2225','para':'\xB6','parallel':'\u2225','parsim':'\u2AF3','parsl':'\u2AFD','part':'\u2202','PartialD':'\u2202','pcy':'\u043F','Pcy':'\u041F','percnt':'%','period':'.','permil':'\u2030','perp':'\u22A5','pertenk':'\u2031','pfr':'\uD835\uDD2D','Pfr':'\uD835\uDD13','phi':'\u03C6','Phi':'\u03A6','phiv':'\u03D5','phmmat':'\u2133','phone':'\u260E','pi':'\u03C0','Pi':'\u03A0','pitchfork':'\u22D4','piv':'\u03D6','planck':'\u210F','planckh':'\u210E','plankv':'\u210F','plus':'+','plusacir':'\u2A23','plusb':'\u229E','pluscir':'\u2A22','plusdo':'\u2214','plusdu':'\u2A25','pluse':'\u2A72','PlusMinus':'\xB1','plusmn':'\xB1','plussim':'\u2A26','plustwo':'\u2A27','pm':'\xB1','Poincareplane':'\u210C','pointint':'\u2A15','popf':'\uD835\uDD61','Popf':'\u2119','pound':'\xA3','pr':'\u227A','Pr':'\u2ABB','prap':'\u2AB7','prcue':'\u227C','pre':'\u2AAF','prE':'\u2AB3','prec':'\u227A','precapprox':'\u2AB7','preccurlyeq':'\u227C','Precedes':'\u227A','PrecedesEqual':'\u2AAF','PrecedesSlantEqual':'\u227C','PrecedesTilde':'\u227E','preceq':'\u2AAF','precnapprox':'\u2AB9','precneqq':'\u2AB5','precnsim':'\u22E8','precsim':'\u227E','prime':'\u2032','Prime':'\u2033','primes':'\u2119','prnap':'\u2AB9','prnE':'\u2AB5','prnsim':'\u22E8','prod':'\u220F','Product':'\u220F','profalar':'\u232E','profline':'\u2312','profsurf':'\u2313','prop':'\u221D','Proportion':'\u2237','Proportional':'\u221D','propto':'\u221D','prsim':'\u227E','prurel':'\u22B0','pscr':'\uD835\uDCC5','Pscr':'\uD835\uDCAB','psi':'\u03C8','Psi':'\u03A8','puncsp':'\u2008','qfr':'\uD835\uDD2E','Qfr':'\uD835\uDD14','qint':'\u2A0C','qopf':'\uD835\uDD62','Qopf':'\u211A','qprime':'\u2057','qscr':'\uD835\uDCC6','Qscr':'\uD835\uDCAC','quaternions':'\u210D','quatint':'\u2A16','quest':'?','questeq':'\u225F','quot':'"','QUOT':'"','rAarr':'\u21DB','race':'\u223D\u0331','racute':'\u0155','Racute':'\u0154','radic':'\u221A','raemptyv':'\u29B3','rang':'\u27E9','Rang':'\u27EB','rangd':'\u2992','range':'\u29A5','rangle':'\u27E9','raquo':'\xBB','rarr':'\u2192','rArr':'\u21D2','Rarr':'\u21A0','rarrap':'\u2975','rarrb':'\u21E5','rarrbfs':'\u2920','rarrc':'\u2933','rarrfs':'\u291E','rarrhk':'\u21AA','rarrlp':'\u21AC','rarrpl':'\u2945','rarrsim':'\u2974','rarrtl':'\u21A3','Rarrtl':'\u2916','rarrw':'\u219D','ratail':'\u291A','rAtail':'\u291C','ratio':'\u2236','rationals':'\u211A','rbarr':'\u290D','rBarr':'\u290F','RBarr':'\u2910','rbbrk':'\u2773','rbrace':'}','rbrack':']','rbrke':'\u298C','rbrksld':'\u298E','rbrkslu':'\u2990','rcaron':'\u0159','Rcaron':'\u0158','rcedil':'\u0157','Rcedil':'\u0156','rceil':'\u2309','rcub':'}','rcy':'\u0440','Rcy':'\u0420','rdca':'\u2937','rdldhar':'\u2969','rdquo':'\u201D','rdquor':'\u201D','rdsh':'\u21B3','Re':'\u211C','real':'\u211C','realine':'\u211B','realpart':'\u211C','reals':'\u211D','rect':'\u25AD','reg':'\xAE','REG':'\xAE','ReverseElement':'\u220B','ReverseEquilibrium':'\u21CB','ReverseUpEquilibrium':'\u296F','rfisht':'\u297D','rfloor':'\u230B','rfr':'\uD835\uDD2F','Rfr':'\u211C','rHar':'\u2964','rhard':'\u21C1','rharu':'\u21C0','rharul':'\u296C','rho':'\u03C1','Rho':'\u03A1','rhov':'\u03F1','RightAngleBracket':'\u27E9','rightarrow':'\u2192','Rightarrow':'\u21D2','RightArrow':'\u2192','RightArrowBar':'\u21E5','RightArrowLeftArrow':'\u21C4','rightarrowtail':'\u21A3','RightCeiling':'\u2309','RightDoubleBracket':'\u27E7','RightDownTeeVector':'\u295D','RightDownVector':'\u21C2','RightDownVectorBar':'\u2955','RightFloor':'\u230B','rightharpoondown':'\u21C1','rightharpoonup':'\u21C0','rightleftarrows':'\u21C4','rightleftharpoons':'\u21CC','rightrightarrows':'\u21C9','rightsquigarrow':'\u219D','RightTee':'\u22A2','RightTeeArrow':'\u21A6','RightTeeVector':'\u295B','rightthreetimes':'\u22CC','RightTriangle':'\u22B3','RightTriangleBar':'\u29D0','RightTriangleEqual':'\u22B5','RightUpDownVector':'\u294F','RightUpTeeVector':'\u295C','RightUpVector':'\u21BE','RightUpVectorBar':'\u2954','RightVector':'\u21C0','RightVectorBar':'\u2953','ring':'\u02DA','risingdotseq':'\u2253','rlarr':'\u21C4','rlhar':'\u21CC','rlm':'\u200F','rmoust':'\u23B1','rmoustache':'\u23B1','rnmid':'\u2AEE','roang':'\u27ED','roarr':'\u21FE','robrk':'\u27E7','ropar':'\u2986','ropf':'\uD835\uDD63','Ropf':'\u211D','roplus':'\u2A2E','rotimes':'\u2A35','RoundImplies':'\u2970','rpar':')','rpargt':'\u2994','rppolint':'\u2A12','rrarr':'\u21C9','Rrightarrow':'\u21DB','rsaquo':'\u203A','rscr':'\uD835\uDCC7','Rscr':'\u211B','rsh':'\u21B1','Rsh':'\u21B1','rsqb':']','rsquo':'\u2019','rsquor':'\u2019','rthree':'\u22CC','rtimes':'\u22CA','rtri':'\u25B9','rtrie':'\u22B5','rtrif':'\u25B8','rtriltri':'\u29CE','RuleDelayed':'\u29F4','ruluhar':'\u2968','rx':'\u211E','sacute':'\u015B','Sacute':'\u015A','sbquo':'\u201A','sc':'\u227B','Sc':'\u2ABC','scap':'\u2AB8','scaron':'\u0161','Scaron':'\u0160','sccue':'\u227D','sce':'\u2AB0','scE':'\u2AB4','scedil':'\u015F','Scedil':'\u015E','scirc':'\u015D','Scirc':'\u015C','scnap':'\u2ABA','scnE':'\u2AB6','scnsim':'\u22E9','scpolint':'\u2A13','scsim':'\u227F','scy':'\u0441','Scy':'\u0421','sdot':'\u22C5','sdotb':'\u22A1','sdote':'\u2A66','searhk':'\u2925','searr':'\u2198','seArr':'\u21D8','searrow':'\u2198','sect':'\xA7','semi':';','seswar':'\u2929','setminus':'\u2216','setmn':'\u2216','sext':'\u2736','sfr':'\uD835\uDD30','Sfr':'\uD835\uDD16','sfrown':'\u2322','sharp':'\u266F','shchcy':'\u0449','SHCHcy':'\u0429','shcy':'\u0448','SHcy':'\u0428','ShortDownArrow':'\u2193','ShortLeftArrow':'\u2190','shortmid':'\u2223','shortparallel':'\u2225','ShortRightArrow':'\u2192','ShortUpArrow':'\u2191','shy':'\xAD','sigma':'\u03C3','Sigma':'\u03A3','sigmaf':'\u03C2','sigmav':'\u03C2','sim':'\u223C','simdot':'\u2A6A','sime':'\u2243','simeq':'\u2243','simg':'\u2A9E','simgE':'\u2AA0','siml':'\u2A9D','simlE':'\u2A9F','simne':'\u2246','simplus':'\u2A24','simrarr':'\u2972','slarr':'\u2190','SmallCircle':'\u2218','smallsetminus':'\u2216','smashp':'\u2A33','smeparsl':'\u29E4','smid':'\u2223','smile':'\u2323','smt':'\u2AAA','smte':'\u2AAC','smtes':'\u2AAC\uFE00','softcy':'\u044C','SOFTcy':'\u042C','sol':'/','solb':'\u29C4','solbar':'\u233F','sopf':'\uD835\uDD64','Sopf':'\uD835\uDD4A','spades':'\u2660','spadesuit':'\u2660','spar':'\u2225','sqcap':'\u2293','sqcaps':'\u2293\uFE00','sqcup':'\u2294','sqcups':'\u2294\uFE00','Sqrt':'\u221A','sqsub':'\u228F','sqsube':'\u2291','sqsubset':'\u228F','sqsubseteq':'\u2291','sqsup':'\u2290','sqsupe':'\u2292','sqsupset':'\u2290','sqsupseteq':'\u2292','squ':'\u25A1','square':'\u25A1','Square':'\u25A1','SquareIntersection':'\u2293','SquareSubset':'\u228F','SquareSubsetEqual':'\u2291','SquareSuperset':'\u2290','SquareSupersetEqual':'\u2292','SquareUnion':'\u2294','squarf':'\u25AA','squf':'\u25AA','srarr':'\u2192','sscr':'\uD835\uDCC8','Sscr':'\uD835\uDCAE','ssetmn':'\u2216','ssmile':'\u2323','sstarf':'\u22C6','star':'\u2606','Star':'\u22C6','starf':'\u2605','straightepsilon':'\u03F5','straightphi':'\u03D5','strns':'\xAF','sub':'\u2282','Sub':'\u22D0','subdot':'\u2ABD','sube':'\u2286','subE':'\u2AC5','subedot':'\u2AC3','submult':'\u2AC1','subne':'\u228A','subnE':'\u2ACB','subplus':'\u2ABF','subrarr':'\u2979','subset':'\u2282','Subset':'\u22D0','subseteq':'\u2286','subseteqq':'\u2AC5','SubsetEqual':'\u2286','subsetneq':'\u228A','subsetneqq':'\u2ACB','subsim':'\u2AC7','subsub':'\u2AD5','subsup':'\u2AD3','succ':'\u227B','succapprox':'\u2AB8','succcurlyeq':'\u227D','Succeeds':'\u227B','SucceedsEqual':'\u2AB0','SucceedsSlantEqual':'\u227D','SucceedsTilde':'\u227F','succeq':'\u2AB0','succnapprox':'\u2ABA','succneqq':'\u2AB6','succnsim':'\u22E9','succsim':'\u227F','SuchThat':'\u220B','sum':'\u2211','Sum':'\u2211','sung':'\u266A','sup':'\u2283','Sup':'\u22D1','sup1':'\xB9','sup2':'\xB2','sup3':'\xB3','supdot':'\u2ABE','supdsub':'\u2AD8','supe':'\u2287','supE':'\u2AC6','supedot':'\u2AC4','Superset':'\u2283','SupersetEqual':'\u2287','suphsol':'\u27C9','suphsub':'\u2AD7','suplarr':'\u297B','supmult':'\u2AC2','supne':'\u228B','supnE':'\u2ACC','supplus':'\u2AC0','supset':'\u2283','Supset':'\u22D1','supseteq':'\u2287','supseteqq':'\u2AC6','supsetneq':'\u228B','supsetneqq':'\u2ACC','supsim':'\u2AC8','supsub':'\u2AD4','supsup':'\u2AD6','swarhk':'\u2926','swarr':'\u2199','swArr':'\u21D9','swarrow':'\u2199','swnwar':'\u292A','szlig':'\xDF','Tab':'\t','target':'\u2316','tau':'\u03C4','Tau':'\u03A4','tbrk':'\u23B4','tcaron':'\u0165','Tcaron':'\u0164','tcedil':'\u0163','Tcedil':'\u0162','tcy':'\u0442','Tcy':'\u0422','tdot':'\u20DB','telrec':'\u2315','tfr':'\uD835\uDD31','Tfr':'\uD835\uDD17','there4':'\u2234','therefore':'\u2234','Therefore':'\u2234','theta':'\u03B8','Theta':'\u0398','thetasym':'\u03D1','thetav':'\u03D1','thickapprox':'\u2248','thicksim':'\u223C','ThickSpace':'\u205F\u200A','thinsp':'\u2009','ThinSpace':'\u2009','thkap':'\u2248','thksim':'\u223C','thorn':'\xFE','THORN':'\xDE','tilde':'\u02DC','Tilde':'\u223C','TildeEqual':'\u2243','TildeFullEqual':'\u2245','TildeTilde':'\u2248','times':'\xD7','timesb':'\u22A0','timesbar':'\u2A31','timesd':'\u2A30','tint':'\u222D','toea':'\u2928','top':'\u22A4','topbot':'\u2336','topcir':'\u2AF1','topf':'\uD835\uDD65','Topf':'\uD835\uDD4B','topfork':'\u2ADA','tosa':'\u2929','tprime':'\u2034','trade':'\u2122','TRADE':'\u2122','triangle':'\u25B5','triangledown':'\u25BF','triangleleft':'\u25C3','trianglelefteq':'\u22B4','triangleq':'\u225C','triangleright':'\u25B9','trianglerighteq':'\u22B5','tridot':'\u25EC','trie':'\u225C','triminus':'\u2A3A','TripleDot':'\u20DB','triplus':'\u2A39','trisb':'\u29CD','tritime':'\u2A3B','trpezium':'\u23E2','tscr':'\uD835\uDCC9','Tscr':'\uD835\uDCAF','tscy':'\u0446','TScy':'\u0426','tshcy':'\u045B','TSHcy':'\u040B','tstrok':'\u0167','Tstrok':'\u0166','twixt':'\u226C','twoheadleftarrow':'\u219E','twoheadrightarrow':'\u21A0','uacute':'\xFA','Uacute':'\xDA','uarr':'\u2191','uArr':'\u21D1','Uarr':'\u219F','Uarrocir':'\u2949','ubrcy':'\u045E','Ubrcy':'\u040E','ubreve':'\u016D','Ubreve':'\u016C','ucirc':'\xFB','Ucirc':'\xDB','ucy':'\u0443','Ucy':'\u0423','udarr':'\u21C5','udblac':'\u0171','Udblac':'\u0170','udhar':'\u296E','ufisht':'\u297E','ufr':'\uD835\uDD32','Ufr':'\uD835\uDD18','ugrave':'\xF9','Ugrave':'\xD9','uHar':'\u2963','uharl':'\u21BF','uharr':'\u21BE','uhblk':'\u2580','ulcorn':'\u231C','ulcorner':'\u231C','ulcrop':'\u230F','ultri':'\u25F8','umacr':'\u016B','Umacr':'\u016A','uml':'\xA8','UnderBar':'_','UnderBrace':'\u23DF','UnderBracket':'\u23B5','UnderParenthesis':'\u23DD','Union':'\u22C3','UnionPlus':'\u228E','uogon':'\u0173','Uogon':'\u0172','uopf':'\uD835\uDD66','Uopf':'\uD835\uDD4C','uparrow':'\u2191','Uparrow':'\u21D1','UpArrow':'\u2191','UpArrowBar':'\u2912','UpArrowDownArrow':'\u21C5','updownarrow':'\u2195','Updownarrow':'\u21D5','UpDownArrow':'\u2195','UpEquilibrium':'\u296E','upharpoonleft':'\u21BF','upharpoonright':'\u21BE','uplus':'\u228E','UpperLeftArrow':'\u2196','UpperRightArrow':'\u2197','upsi':'\u03C5','Upsi':'\u03D2','upsih':'\u03D2','upsilon':'\u03C5','Upsilon':'\u03A5','UpTee':'\u22A5','UpTeeArrow':'\u21A5','upuparrows':'\u21C8','urcorn':'\u231D','urcorner':'\u231D','urcrop':'\u230E','uring':'\u016F','Uring':'\u016E','urtri':'\u25F9','uscr':'\uD835\uDCCA','Uscr':'\uD835\uDCB0','utdot':'\u22F0','utilde':'\u0169','Utilde':'\u0168','utri':'\u25B5','utrif':'\u25B4','uuarr':'\u21C8','uuml':'\xFC','Uuml':'\xDC','uwangle':'\u29A7','vangrt':'\u299C','varepsilon':'\u03F5','varkappa':'\u03F0','varnothing':'\u2205','varphi':'\u03D5','varpi':'\u03D6','varpropto':'\u221D','varr':'\u2195','vArr':'\u21D5','varrho':'\u03F1','varsigma':'\u03C2','varsubsetneq':'\u228A\uFE00','varsubsetneqq':'\u2ACB\uFE00','varsupsetneq':'\u228B\uFE00','varsupsetneqq':'\u2ACC\uFE00','vartheta':'\u03D1','vartriangleleft':'\u22B2','vartriangleright':'\u22B3','vBar':'\u2AE8','Vbar':'\u2AEB','vBarv':'\u2AE9','vcy':'\u0432','Vcy':'\u0412','vdash':'\u22A2','vDash':'\u22A8','Vdash':'\u22A9','VDash':'\u22AB','Vdashl':'\u2AE6','vee':'\u2228','Vee':'\u22C1','veebar':'\u22BB','veeeq':'\u225A','vellip':'\u22EE','verbar':'|','Verbar':'\u2016','vert':'|','Vert':'\u2016','VerticalBar':'\u2223','VerticalLine':'|','VerticalSeparator':'\u2758','VerticalTilde':'\u2240','VeryThinSpace':'\u200A','vfr':'\uD835\uDD33','Vfr':'\uD835\uDD19','vltri':'\u22B2','vnsub':'\u2282\u20D2','vnsup':'\u2283\u20D2','vopf':'\uD835\uDD67','Vopf':'\uD835\uDD4D','vprop':'\u221D','vrtri':'\u22B3','vscr':'\uD835\uDCCB','Vscr':'\uD835\uDCB1','vsubne':'\u228A\uFE00','vsubnE':'\u2ACB\uFE00','vsupne':'\u228B\uFE00','vsupnE':'\u2ACC\uFE00','Vvdash':'\u22AA','vzigzag':'\u299A','wcirc':'\u0175','Wcirc':'\u0174','wedbar':'\u2A5F','wedge':'\u2227','Wedge':'\u22C0','wedgeq':'\u2259','weierp':'\u2118','wfr':'\uD835\uDD34','Wfr':'\uD835\uDD1A','wopf':'\uD835\uDD68','Wopf':'\uD835\uDD4E','wp':'\u2118','wr':'\u2240','wreath':'\u2240','wscr':'\uD835\uDCCC','Wscr':'\uD835\uDCB2','xcap':'\u22C2','xcirc':'\u25EF','xcup':'\u22C3','xdtri':'\u25BD','xfr':'\uD835\uDD35','Xfr':'\uD835\uDD1B','xharr':'\u27F7','xhArr':'\u27FA','xi':'\u03BE','Xi':'\u039E','xlarr':'\u27F5','xlArr':'\u27F8','xmap':'\u27FC','xnis':'\u22FB','xodot':'\u2A00','xopf':'\uD835\uDD69','Xopf':'\uD835\uDD4F','xoplus':'\u2A01','xotime':'\u2A02','xrarr':'\u27F6','xrArr':'\u27F9','xscr':'\uD835\uDCCD','Xscr':'\uD835\uDCB3','xsqcup':'\u2A06','xuplus':'\u2A04','xutri':'\u25B3','xvee':'\u22C1','xwedge':'\u22C0','yacute':'\xFD','Yacute':'\xDD','yacy':'\u044F','YAcy':'\u042F','ycirc':'\u0177','Ycirc':'\u0176','ycy':'\u044B','Ycy':'\u042B','yen':'\xA5','yfr':'\uD835\uDD36','Yfr':'\uD835\uDD1C','yicy':'\u0457','YIcy':'\u0407','yopf':'\uD835\uDD6A','Yopf':'\uD835\uDD50','yscr':'\uD835\uDCCE','Yscr':'\uD835\uDCB4','yucy':'\u044E','YUcy':'\u042E','yuml':'\xFF','Yuml':'\u0178','zacute':'\u017A','Zacute':'\u0179','zcaron':'\u017E','Zcaron':'\u017D','zcy':'\u0437','Zcy':'\u0417','zdot':'\u017C','Zdot':'\u017B','zeetrf':'\u2128','ZeroWidthSpace':'\u200B','zeta':'\u03B6','Zeta':'\u0396','zfr':'\uD835\uDD37','Zfr':'\u2128','zhcy':'\u0436','ZHcy':'\u0416','zigrarr':'\u21DD','zopf':'\uD835\uDD6B','Zopf':'\u2124','zscr':'\uD835\uDCCF','Zscr':'\uD835\uDCB5','zwj':'\u200D','zwnj':'\u200C'};
	var decodeMapLegacy = {'aacute':'\xE1','Aacute':'\xC1','acirc':'\xE2','Acirc':'\xC2','acute':'\xB4','aelig':'\xE6','AElig':'\xC6','agrave':'\xE0','Agrave':'\xC0','amp':'&','AMP':'&','aring':'\xE5','Aring':'\xC5','atilde':'\xE3','Atilde':'\xC3','auml':'\xE4','Auml':'\xC4','brvbar':'\xA6','ccedil':'\xE7','Ccedil':'\xC7','cedil':'\xB8','cent':'\xA2','copy':'\xA9','COPY':'\xA9','curren':'\xA4','deg':'\xB0','divide':'\xF7','eacute':'\xE9','Eacute':'\xC9','ecirc':'\xEA','Ecirc':'\xCA','egrave':'\xE8','Egrave':'\xC8','eth':'\xF0','ETH':'\xD0','euml':'\xEB','Euml':'\xCB','frac12':'\xBD','frac14':'\xBC','frac34':'\xBE','gt':'>','GT':'>','iacute':'\xED','Iacute':'\xCD','icirc':'\xEE','Icirc':'\xCE','iexcl':'\xA1','igrave':'\xEC','Igrave':'\xCC','iquest':'\xBF','iuml':'\xEF','Iuml':'\xCF','laquo':'\xAB','lt':'<','LT':'<','macr':'\xAF','micro':'\xB5','middot':'\xB7','nbsp':'\xA0','not':'\xAC','ntilde':'\xF1','Ntilde':'\xD1','oacute':'\xF3','Oacute':'\xD3','ocirc':'\xF4','Ocirc':'\xD4','ograve':'\xF2','Ograve':'\xD2','ordf':'\xAA','ordm':'\xBA','oslash':'\xF8','Oslash':'\xD8','otilde':'\xF5','Otilde':'\xD5','ouml':'\xF6','Ouml':'\xD6','para':'\xB6','plusmn':'\xB1','pound':'\xA3','quot':'"','QUOT':'"','raquo':'\xBB','reg':'\xAE','REG':'\xAE','sect':'\xA7','shy':'\xAD','sup1':'\xB9','sup2':'\xB2','sup3':'\xB3','szlig':'\xDF','thorn':'\xFE','THORN':'\xDE','times':'\xD7','uacute':'\xFA','Uacute':'\xDA','ucirc':'\xFB','Ucirc':'\xDB','ugrave':'\xF9','Ugrave':'\xD9','uml':'\xA8','uuml':'\xFC','Uuml':'\xDC','yacute':'\xFD','Yacute':'\xDD','yen':'\xA5','yuml':'\xFF'};
	var decodeMapNumeric = {'0':'\uFFFD','128':'\u20AC','130':'\u201A','131':'\u0192','132':'\u201E','133':'\u2026','134':'\u2020','135':'\u2021','136':'\u02C6','137':'\u2030','138':'\u0160','139':'\u2039','140':'\u0152','142':'\u017D','145':'\u2018','146':'\u2019','147':'\u201C','148':'\u201D','149':'\u2022','150':'\u2013','151':'\u2014','152':'\u02DC','153':'\u2122','154':'\u0161','155':'\u203A','156':'\u0153','158':'\u017E','159':'\u0178'};
	var invalidReferenceCodePoints = [1,2,3,4,5,6,7,8,11,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,64976,64977,64978,64979,64980,64981,64982,64983,64984,64985,64986,64987,64988,64989,64990,64991,64992,64993,64994,64995,64996,64997,64998,64999,65000,65001,65002,65003,65004,65005,65006,65007,65534,65535,131070,131071,196606,196607,262142,262143,327678,327679,393214,393215,458750,458751,524286,524287,589822,589823,655358,655359,720894,720895,786430,786431,851966,851967,917502,917503,983038,983039,1048574,1048575,1114110,1114111];

	/*--------------------------------------------------------------------------*/

	var stringFromCharCode = String.fromCharCode;

	var object = {};
	var hasOwnProperty = object.hasOwnProperty;
	var has = function(object, propertyName) {
		return hasOwnProperty.call(object, propertyName);
	};

	var contains = function(array, value) {
		var index = -1;
		var length = array.length;
		while (++index < length) {
			if (array[index] == value) {
				return true;
			}
		}
		return false;
	};

	var merge = function(options, defaults) {
		if (!options) {
			return defaults;
		}
		var result = {};
		var key;
		for (key in defaults) {
			// A `hasOwnProperty` check is not needed here, since only recognized
			// option names are used anyway. Any others are ignored.
			result[key] = has(options, key) ? options[key] : defaults[key];
		}
		return result;
	};

	// Modified version of `ucs2encode`; see https://mths.be/punycode.
	var codePointToSymbol = function(codePoint, strict) {
		var output = '';
		if ((codePoint >= 0xD800 && codePoint <= 0xDFFF) || codePoint > 0x10FFFF) {
			// See issue #4:
			// “Otherwise, if the number is in the range 0xD800 to 0xDFFF or is
			// greater than 0x10FFFF, then this is a parse error. Return a U+FFFD
			// REPLACEMENT CHARACTER.”
			if (strict) {
				parseError('character reference outside the permissible Unicode range');
			}
			return '\uFFFD';
		}
		if (has(decodeMapNumeric, codePoint)) {
			if (strict) {
				parseError('disallowed character reference');
			}
			return decodeMapNumeric[codePoint];
		}
		if (strict && contains(invalidReferenceCodePoints, codePoint)) {
			parseError('disallowed character reference');
		}
		if (codePoint > 0xFFFF) {
			codePoint -= 0x10000;
			output += stringFromCharCode(codePoint >>> 10 & 0x3FF | 0xD800);
			codePoint = 0xDC00 | codePoint & 0x3FF;
		}
		output += stringFromCharCode(codePoint);
		return output;
	};

	var hexEscape = function(codePoint) {
		return '&#x' + codePoint.toString(16).toUpperCase() + ';';
	};

	var decEscape = function(codePoint) {
		return '&#' + codePoint + ';';
	};

	var parseError = function(message) {
		throw Error('Parse error: ' + message);
	};

	/*--------------------------------------------------------------------------*/

	var encode = function(string, options) {
		options = merge(options, encode.options);
		var strict = options.strict;
		if (strict && regexInvalidRawCodePoint.test(string)) {
			parseError('forbidden code point');
		}
		var encodeEverything = options.encodeEverything;
		var useNamedReferences = options.useNamedReferences;
		var allowUnsafeSymbols = options.allowUnsafeSymbols;
		var escapeCodePoint = options.decimal ? decEscape : hexEscape;

		var escapeBmpSymbol = function(symbol) {
			return escapeCodePoint(symbol.charCodeAt(0));
		};

		if (encodeEverything) {
			// Encode ASCII symbols.
			string = string.replace(regexAsciiWhitelist, function(symbol) {
				// Use named references if requested & possible.
				if (useNamedReferences && has(encodeMap, symbol)) {
					return '&' + encodeMap[symbol] + ';';
				}
				return escapeBmpSymbol(symbol);
			});
			// Shorten a few escapes that represent two symbols, of which at least one
			// is within the ASCII range.
			if (useNamedReferences) {
				string = string
					.replace(/&gt;\u20D2/g, '&nvgt;')
					.replace(/&lt;\u20D2/g, '&nvlt;')
					.replace(/&#x66;&#x6A;/g, '&fjlig;');
			}
			// Encode non-ASCII symbols.
			if (useNamedReferences) {
				// Encode non-ASCII symbols that can be replaced with a named reference.
				string = string.replace(regexEncodeNonAscii, function(string) {
					// Note: there is no need to check `has(encodeMap, string)` here.
					return '&' + encodeMap[string] + ';';
				});
			}
			// Note: any remaining non-ASCII symbols are handled outside of the `if`.
		} else if (useNamedReferences) {
			// Apply named character references.
			// Encode `<>"'&` using named character references.
			if (!allowUnsafeSymbols) {
				string = string.replace(regexEscape, function(string) {
					return '&' + encodeMap[string] + ';'; // no need to check `has()` here
				});
			}
			// Shorten escapes that represent two symbols, of which at least one is
			// `<>"'&`.
			string = string
				.replace(/&gt;\u20D2/g, '&nvgt;')
				.replace(/&lt;\u20D2/g, '&nvlt;');
			// Encode non-ASCII symbols that can be replaced with a named reference.
			string = string.replace(regexEncodeNonAscii, function(string) {
				// Note: there is no need to check `has(encodeMap, string)` here.
				return '&' + encodeMap[string] + ';';
			});
		} else if (!allowUnsafeSymbols) {
			// Encode `<>"'&` using hexadecimal escapes, now that they’re not handled
			// using named character references.
			string = string.replace(regexEscape, escapeBmpSymbol);
		}
		return string
			// Encode astral symbols.
			.replace(regexAstralSymbols, function($0) {
				// https://mathiasbynens.be/notes/javascript-encoding#surrogate-formulae
				var high = $0.charCodeAt(0);
				var low = $0.charCodeAt(1);
				var codePoint = (high - 0xD800) * 0x400 + low - 0xDC00 + 0x10000;
				return escapeCodePoint(codePoint);
			})
			// Encode any remaining BMP symbols that are not printable ASCII symbols
			// using a hexadecimal escape.
			.replace(regexBmpWhitelist, escapeBmpSymbol);
	};
	// Expose default options (so they can be overridden globally).
	encode.options = {
		'allowUnsafeSymbols': false,
		'encodeEverything': false,
		'strict': false,
		'useNamedReferences': false,
		'decimal' : false
	};

	var decode = function(html, options) {
		options = merge(options, decode.options);
		var strict = options.strict;
		if (strict && regexInvalidEntity.test(html)) {
			parseError('malformed character reference');
		}
		return html.replace(regexDecode, function($0, $1, $2, $3, $4, $5, $6, $7, $8) {
			var codePoint;
			var semicolon;
			var decDigits;
			var hexDigits;
			var reference;
			var next;

			if ($1) {
				reference = $1;
				// Note: there is no need to check `has(decodeMap, reference)`.
				return decodeMap[reference];
			}

			if ($2) {
				// Decode named character references without trailing `;`, e.g. `&amp`.
				// This is only a parse error if it gets converted to `&`, or if it is
				// followed by `=` in an attribute context.
				reference = $2;
				next = $3;
				if (next && options.isAttributeValue) {
					if (strict && next == '=') {
						parseError('`&` did not start a character reference');
					}
					return $0;
				} else {
					if (strict) {
						parseError(
							'named character reference was not terminated by a semicolon'
						);
					}
					// Note: there is no need to check `has(decodeMapLegacy, reference)`.
					return decodeMapLegacy[reference] + (next || '');
				}
			}

			if ($4) {
				// Decode decimal escapes, e.g. `&#119558;`.
				decDigits = $4;
				semicolon = $5;
				if (strict && !semicolon) {
					parseError('character reference was not terminated by a semicolon');
				}
				codePoint = parseInt(decDigits, 10);
				return codePointToSymbol(codePoint, strict);
			}

			if ($6) {
				// Decode hexadecimal escapes, e.g. `&#x1D306;`.
				hexDigits = $6;
				semicolon = $7;
				if (strict && !semicolon) {
					parseError('character reference was not terminated by a semicolon');
				}
				codePoint = parseInt(hexDigits, 16);
				return codePointToSymbol(codePoint, strict);
			}

			// If we’re still here, `if ($7)` is implied; it’s an ambiguous
			// ampersand for sure. https://mths.be/notes/ambiguous-ampersands
			if (strict) {
				parseError(
					'named character reference was not terminated by a semicolon'
				);
			}
			return $0;
		});
	};
	// Expose default options (so they can be overridden globally).
	decode.options = {
		'isAttributeValue': false,
		'strict': false
	};

	var escape = function(string) {
		return string.replace(regexEscape, function($0) {
			// Note: there is no need to check `has(escapeMap, $0)` here.
			return escapeMap[$0];
		});
	};

	/*--------------------------------------------------------------------------*/

	var he = {
		'version': '1.2.0',
		'encode': encode,
		'decode': decode,
		'escape': escape,
		'unescape': decode
	};

	// Some AMD build optimizers, like r.js, check for specific condition patterns
	// like the following:
	if (
		true
	) {
		!(__WEBPACK_AMD_DEFINE_RESULT__ = (function() {
			return he;
		}).call(exports, __webpack_require__, exports, module),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	}	else { var key; }

}(this));

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../core/includes/customizer/extend-controls/node_modules/webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module), __webpack_require__(/*! ./../../core/includes/customizer/extend-controls/node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

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

	function classNames () {
		var classes = '';

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (arg) {
				classes = appendClass(classes, parseValue(arg));
			}
		}

		return classes;
	}

	function parseValue (arg) {
		if (typeof arg === 'string' || typeof arg === 'number') {
			return arg;
		}

		if (typeof arg !== 'object') {
			return '';
		}

		if (Array.isArray(arg)) {
			return classNames.apply(null, arg);
		}

		if (arg.toString !== Object.prototype.toString && !arg.toString.toString().includes('[native code]')) {
			return arg.toString();
		}

		var classes = '';

		for (var key in arg) {
			if (hasOwn.call(arg, key) && arg[key]) {
				classes = appendClass(classes, key);
			}
		}

		return classes;
	}

	function appendClass (value, newClass) {
		if (!newClass) {
			return value;
		}
	
		if (value) {
			return value + ' ' + newClass;
		}
	
		return value + newClass;
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

/***/ "./node_modules/lodash/_Symbol.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_Symbol.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Built-in value references. */
var Symbol = root.Symbol;

module.exports = Symbol;


/***/ }),

/***/ "./node_modules/lodash/_baseGetTag.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseGetTag.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    getRawTag = __webpack_require__(/*! ./_getRawTag */ "./node_modules/lodash/_getRawTag.js"),
    objectToString = __webpack_require__(/*! ./_objectToString */ "./node_modules/lodash/_objectToString.js");

/** `Object#toString` result references. */
var nullTag = '[object Null]',
    undefinedTag = '[object Undefined]';

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * The base implementation of `getTag` without fallbacks for buggy environments.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */
function baseGetTag(value) {
  if (value == null) {
    return value === undefined ? undefinedTag : nullTag;
  }
  return (symToStringTag && symToStringTag in Object(value))
    ? getRawTag(value)
    : objectToString(value);
}

module.exports = baseGetTag;


/***/ }),

/***/ "./node_modules/lodash/_baseTrim.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_baseTrim.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var trimmedEndIndex = __webpack_require__(/*! ./_trimmedEndIndex */ "./node_modules/lodash/_trimmedEndIndex.js");

/** Used to match leading whitespace. */
var reTrimStart = /^\s+/;

/**
 * The base implementation of `_.trim`.
 *
 * @private
 * @param {string} string The string to trim.
 * @returns {string} Returns the trimmed string.
 */
function baseTrim(string) {
  return string
    ? string.slice(0, trimmedEndIndex(string) + 1).replace(reTrimStart, '')
    : string;
}

module.exports = baseTrim;


/***/ }),

/***/ "./node_modules/lodash/_freeGlobal.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_freeGlobal.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {/** Detect free variable `global` from Node.js. */
var freeGlobal = typeof global == 'object' && global && global.Object === Object && global;

module.exports = freeGlobal;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/lodash/_getRawTag.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_getRawTag.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * A specialized version of `baseGetTag` which ignores `Symbol.toStringTag` values.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the raw `toStringTag`.
 */
function getRawTag(value) {
  var isOwn = hasOwnProperty.call(value, symToStringTag),
      tag = value[symToStringTag];

  try {
    value[symToStringTag] = undefined;
    var unmasked = true;
  } catch (e) {}

  var result = nativeObjectToString.call(value);
  if (unmasked) {
    if (isOwn) {
      value[symToStringTag] = tag;
    } else {
      delete value[symToStringTag];
    }
  }
  return result;
}

module.exports = getRawTag;


/***/ }),

/***/ "./node_modules/lodash/_objectToString.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_objectToString.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/**
 * Converts `value` to a string using `Object.prototype.toString`.
 *
 * @private
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 */
function objectToString(value) {
  return nativeObjectToString.call(value);
}

module.exports = objectToString;


/***/ }),

/***/ "./node_modules/lodash/_root.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/_root.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var freeGlobal = __webpack_require__(/*! ./_freeGlobal */ "./node_modules/lodash/_freeGlobal.js");

/** Detect free variable `self`. */
var freeSelf = typeof self == 'object' && self && self.Object === Object && self;

/** Used as a reference to the global object. */
var root = freeGlobal || freeSelf || Function('return this')();

module.exports = root;


/***/ }),

/***/ "./node_modules/lodash/_trimmedEndIndex.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_trimmedEndIndex.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used to match a single whitespace character. */
var reWhitespace = /\s/;

/**
 * Used by `_.trim` and `_.trimEnd` to get the index of the last non-whitespace
 * character of `string`.
 *
 * @private
 * @param {string} string The string to inspect.
 * @returns {number} Returns the index of the last non-whitespace character.
 */
function trimmedEndIndex(string) {
  var index = string.length;

  while (index-- && reWhitespace.test(string.charAt(index))) {}
  return index;
}

module.exports = trimmedEndIndex;


/***/ }),

/***/ "./node_modules/lodash/debounce.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/debounce.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    now = __webpack_require__(/*! ./now */ "./node_modules/lodash/now.js"),
    toNumber = __webpack_require__(/*! ./toNumber */ "./node_modules/lodash/toNumber.js");

/** Error message constants. */
var FUNC_ERROR_TEXT = 'Expected a function';

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeMax = Math.max,
    nativeMin = Math.min;

/**
 * Creates a debounced function that delays invoking `func` until after `wait`
 * milliseconds have elapsed since the last time the debounced function was
 * invoked. The debounced function comes with a `cancel` method to cancel
 * delayed `func` invocations and a `flush` method to immediately invoke them.
 * Provide `options` to indicate whether `func` should be invoked on the
 * leading and/or trailing edge of the `wait` timeout. The `func` is invoked
 * with the last arguments provided to the debounced function. Subsequent
 * calls to the debounced function return the result of the last `func`
 * invocation.
 *
 * **Note:** If `leading` and `trailing` options are `true`, `func` is
 * invoked on the trailing edge of the timeout only if the debounced function
 * is invoked more than once during the `wait` timeout.
 *
 * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
 * until to the next tick, similar to `setTimeout` with a timeout of `0`.
 *
 * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
 * for details over the differences between `_.debounce` and `_.throttle`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Function
 * @param {Function} func The function to debounce.
 * @param {number} [wait=0] The number of milliseconds to delay.
 * @param {Object} [options={}] The options object.
 * @param {boolean} [options.leading=false]
 *  Specify invoking on the leading edge of the timeout.
 * @param {number} [options.maxWait]
 *  The maximum time `func` is allowed to be delayed before it's invoked.
 * @param {boolean} [options.trailing=true]
 *  Specify invoking on the trailing edge of the timeout.
 * @returns {Function} Returns the new debounced function.
 * @example
 *
 * // Avoid costly calculations while the window size is in flux.
 * jQuery(window).on('resize', _.debounce(calculateLayout, 150));
 *
 * // Invoke `sendMail` when clicked, debouncing subsequent calls.
 * jQuery(element).on('click', _.debounce(sendMail, 300, {
 *   'leading': true,
 *   'trailing': false
 * }));
 *
 * // Ensure `batchLog` is invoked once after 1 second of debounced calls.
 * var debounced = _.debounce(batchLog, 250, { 'maxWait': 1000 });
 * var source = new EventSource('/stream');
 * jQuery(source).on('message', debounced);
 *
 * // Cancel the trailing debounced invocation.
 * jQuery(window).on('popstate', debounced.cancel);
 */
function debounce(func, wait, options) {
  var lastArgs,
      lastThis,
      maxWait,
      result,
      timerId,
      lastCallTime,
      lastInvokeTime = 0,
      leading = false,
      maxing = false,
      trailing = true;

  if (typeof func != 'function') {
    throw new TypeError(FUNC_ERROR_TEXT);
  }
  wait = toNumber(wait) || 0;
  if (isObject(options)) {
    leading = !!options.leading;
    maxing = 'maxWait' in options;
    maxWait = maxing ? nativeMax(toNumber(options.maxWait) || 0, wait) : maxWait;
    trailing = 'trailing' in options ? !!options.trailing : trailing;
  }

  function invokeFunc(time) {
    var args = lastArgs,
        thisArg = lastThis;

    lastArgs = lastThis = undefined;
    lastInvokeTime = time;
    result = func.apply(thisArg, args);
    return result;
  }

  function leadingEdge(time) {
    // Reset any `maxWait` timer.
    lastInvokeTime = time;
    // Start the timer for the trailing edge.
    timerId = setTimeout(timerExpired, wait);
    // Invoke the leading edge.
    return leading ? invokeFunc(time) : result;
  }

  function remainingWait(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime,
        timeWaiting = wait - timeSinceLastCall;

    return maxing
      ? nativeMin(timeWaiting, maxWait - timeSinceLastInvoke)
      : timeWaiting;
  }

  function shouldInvoke(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime;

    // Either this is the first call, activity has stopped and we're at the
    // trailing edge, the system time has gone backwards and we're treating
    // it as the trailing edge, or we've hit the `maxWait` limit.
    return (lastCallTime === undefined || (timeSinceLastCall >= wait) ||
      (timeSinceLastCall < 0) || (maxing && timeSinceLastInvoke >= maxWait));
  }

  function timerExpired() {
    var time = now();
    if (shouldInvoke(time)) {
      return trailingEdge(time);
    }
    // Restart the timer.
    timerId = setTimeout(timerExpired, remainingWait(time));
  }

  function trailingEdge(time) {
    timerId = undefined;

    // Only invoke if we have `lastArgs` which means `func` has been
    // debounced at least once.
    if (trailing && lastArgs) {
      return invokeFunc(time);
    }
    lastArgs = lastThis = undefined;
    return result;
  }

  function cancel() {
    if (timerId !== undefined) {
      clearTimeout(timerId);
    }
    lastInvokeTime = 0;
    lastArgs = lastCallTime = lastThis = timerId = undefined;
  }

  function flush() {
    return timerId === undefined ? result : trailingEdge(now());
  }

  function debounced() {
    var time = now(),
        isInvoking = shouldInvoke(time);

    lastArgs = arguments;
    lastThis = this;
    lastCallTime = time;

    if (isInvoking) {
      if (timerId === undefined) {
        return leadingEdge(lastCallTime);
      }
      if (maxing) {
        // Handle invocations in a tight loop.
        clearTimeout(timerId);
        timerId = setTimeout(timerExpired, wait);
        return invokeFunc(lastCallTime);
      }
    }
    if (timerId === undefined) {
      timerId = setTimeout(timerExpired, wait);
    }
    return result;
  }
  debounced.cancel = cancel;
  debounced.flush = flush;
  return debounced;
}

module.exports = debounce;


/***/ }),

/***/ "./node_modules/lodash/isObject.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isObject.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is the
 * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
 * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an object, else `false`.
 * @example
 *
 * _.isObject({});
 * // => true
 *
 * _.isObject([1, 2, 3]);
 * // => true
 *
 * _.isObject(_.noop);
 * // => true
 *
 * _.isObject(null);
 * // => false
 */
function isObject(value) {
  var type = typeof value;
  return value != null && (type == 'object' || type == 'function');
}

module.exports = isObject;


/***/ }),

/***/ "./node_modules/lodash/isObjectLike.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/isObjectLike.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is object-like. A value is object-like if it's not `null`
 * and has a `typeof` result of "object".
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
 * @example
 *
 * _.isObjectLike({});
 * // => true
 *
 * _.isObjectLike([1, 2, 3]);
 * // => true
 *
 * _.isObjectLike(_.noop);
 * // => false
 *
 * _.isObjectLike(null);
 * // => false
 */
function isObjectLike(value) {
  return value != null && typeof value == 'object';
}

module.exports = isObjectLike;


/***/ }),

/***/ "./node_modules/lodash/isSymbol.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isSymbol.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var symbolTag = '[object Symbol]';

/**
 * Checks if `value` is classified as a `Symbol` primitive or object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
 * @example
 *
 * _.isSymbol(Symbol.iterator);
 * // => true
 *
 * _.isSymbol('abc');
 * // => false
 */
function isSymbol(value) {
  return typeof value == 'symbol' ||
    (isObjectLike(value) && baseGetTag(value) == symbolTag);
}

module.exports = isSymbol;


/***/ }),

/***/ "./node_modules/lodash/now.js":
/*!************************************!*\
  !*** ./node_modules/lodash/now.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/**
 * Gets the timestamp of the number of milliseconds that have elapsed since
 * the Unix epoch (1 January 1970 00:00:00 UTC).
 *
 * @static
 * @memberOf _
 * @since 2.4.0
 * @category Date
 * @returns {number} Returns the timestamp.
 * @example
 *
 * _.defer(function(stamp) {
 *   console.log(_.now() - stamp);
 * }, _.now());
 * // => Logs the number of milliseconds it took for the deferred invocation.
 */
var now = function() {
  return root.Date.now();
};

module.exports = now;


/***/ }),

/***/ "./node_modules/lodash/toNumber.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toNumber.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseTrim = __webpack_require__(/*! ./_baseTrim */ "./node_modules/lodash/_baseTrim.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used as references for various `Number` constants. */
var NAN = 0 / 0;

/** Used to detect bad signed hexadecimal string values. */
var reIsBadHex = /^[-+]0x[0-9a-f]+$/i;

/** Used to detect binary string values. */
var reIsBinary = /^0b[01]+$/i;

/** Used to detect octal string values. */
var reIsOctal = /^0o[0-7]+$/i;

/** Built-in method references without a dependency on `root`. */
var freeParseInt = parseInt;

/**
 * Converts `value` to a number.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to process.
 * @returns {number} Returns the number.
 * @example
 *
 * _.toNumber(3.2);
 * // => 3.2
 *
 * _.toNumber(Number.MIN_VALUE);
 * // => 5e-324
 *
 * _.toNumber(Infinity);
 * // => Infinity
 *
 * _.toNumber('3.2');
 * // => 3.2
 */
function toNumber(value) {
  if (typeof value == 'number') {
    return value;
  }
  if (isSymbol(value)) {
    return NAN;
  }
  if (isObject(value)) {
    var other = typeof value.valueOf == 'function' ? value.valueOf() : value;
    value = isObject(other) ? (other + '') : other;
  }
  if (typeof value != 'string') {
    return value === 0 ? value : +value;
  }
  value = baseTrim(value);
  var isBinary = reIsBinary.test(value);
  return (isBinary || reIsOctal.test(value))
    ? freeParseInt(value.slice(2), isBinary ? 2 : 8)
    : (reIsBadHex.test(value) ? NAN : +value);
}

module.exports = toNumber;


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
  var has = __webpack_require__(/*! ./lib/has */ "./node_modules/prop-types/lib/has.js");

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
    } catch (x) { /**/ }
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
              'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.' +
              'This often happens because of typos such as `PropTypes.function` instead of `PropTypes.func`.'
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
var has = __webpack_require__(/*! ./lib/has */ "./node_modules/prop-types/lib/has.js");
var checkPropTypes = __webpack_require__(/*! ./checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

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
    bigint: createPrimitiveTypeChecker('bigint'),
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
  function PropTypeError(message, data) {
    this.message = message;
    this.data = data && typeof data === 'object' ? data: {};
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
              'function for the `' + propFullName + '` prop on `' + componentName + '`. This is deprecated ' +
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

        return new PropTypeError(
          'Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + preciseType + '` supplied to `' + componentName + '`, expected ') + ('`' + expectedType + '`.'),
          {expectedType: expectedType}
        );
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
      var expectedTypes = [];
      for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
        var checker = arrayOfTypeCheckers[i];
        var checkerResult = checker(props, propName, componentName, location, propFullName, ReactPropTypesSecret);
        if (checkerResult == null) {
          return null;
        }
        if (checkerResult.data && has(checkerResult.data, 'expectedType')) {
          expectedTypes.push(checkerResult.data.expectedType);
        }
      }
      var expectedTypesMessage = (expectedTypes.length > 0) ? ', expected one of type [' + expectedTypes.join(', ') + ']': '';
      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`' + expectedTypesMessage + '.'));
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

  function invalidValidatorError(componentName, location, propFullName, key, type) {
    return new PropTypeError(
      (componentName || 'React class') + ': ' + location + ' type `' + propFullName + '.' + key + '` is invalid; ' +
      'it must be a function, usually from the `prop-types` package, but received `' + type + '`.'
    );
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
        if (typeof checker !== 'function') {
          return invalidValidatorError(componentName, location, propFullName, key, getPreciseType(checker));
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
      // We need to check all keys in case some are required but missing from props.
      var allKeys = assign({}, props[propName], shapeTypes);
      for (var key in allKeys) {
        var checker = shapeTypes[key];
        if (has(shapeTypes, key) && typeof checker !== 'function') {
          return invalidValidatorError(componentName, location, propFullName, key, getPreciseType(checker));
        }
        if (!checker) {
          return new PropTypeError(
            'Invalid ' + location + ' `' + propFullName + '` key `' + key + '` supplied to `' + componentName + '`.' +
            '\nBad object: ' + JSON.stringify(props[propName], null, '  ') +
            '\nValid keys: ' + JSON.stringify(Object.keys(shapeTypes), null, '  ')
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

/***/ "./node_modules/prop-types/lib/has.js":
/*!********************************************!*\
  !*** ./node_modules/prop-types/lib/has.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = Function.call.bind(Object.prototype.hasOwnProperty);


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

/***/ "./node_modules/react-sortablejs/dist/index.es.js":
/*!********************************************************!*\
  !*** ./node_modules/react-sortablejs/dist/index.es.js ***!
  \********************************************************/
/*! exports provided: MultiDrag, Sortable, Swap, ReactSortable */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ReactSortable", function() { return ReactSortable; });
/* harmony import */ var sortablejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! sortablejs */ "./node_modules/sortablejs/modular/sortable.esm.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "MultiDrag", function() { return sortablejs__WEBPACK_IMPORTED_MODULE_0__["MultiDrag"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "Sortable", function() { return sortablejs__WEBPACK_IMPORTED_MODULE_0__["default"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "Swap", function() { return sortablejs__WEBPACK_IMPORTED_MODULE_0__["Swap"]; });

/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var tiny_invariant__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! tiny-invariant */ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js");






/*! *****************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
/* global Reflect, Promise */

var extendStatics = function(d, b) {
    extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
    return extendStatics(d, b);
};

function __extends(d, b) {
    extendStatics(d, b);
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
}

var __assign = function() {
    __assign = Object.assign || function __assign(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};

function __rest(s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
}

function __read(o, n) {
    var m = typeof Symbol === "function" && o[Symbol.iterator];
    if (!m) return o;
    var i = m.call(o), r, ar = [], e;
    try {
        while ((n === void 0 || n-- > 0) && !(r = i.next()).done) ar.push(r.value);
    }
    catch (error) { e = { error: error }; }
    finally {
        try {
            if (r && !r.done && (m = i["return"])) m.call(i);
        }
        finally { if (e) throw e.error; }
    }
    return ar;
}

function __spread() {
    for (var ar = [], i = 0; i < arguments.length; i++)
        ar = ar.concat(__read(arguments[i]));
    return ar;
}

/**
 * Removes the `node` from the DOM
 * @param node
 */
function removeNode(node) {
    if (node.parentElement !== null)
        node.parentElement.removeChild(node);
}
/**
 * Inserts the `newChild` node at the given index in a parent
 * @param parent The parent HTML Element.
 * @param newChild A HTML eement to add as a child of the parent.
 * @param index index of the parent to place the new child in.
 */
function insertNodeAt(parent, newChild, index) {
    var refChild = parent.children[index] || null;
    parent.insertBefore(newChild, refChild);
}
function removeNodes(customs) {
    customs.forEach(function (curr) { return removeNode(curr.element); });
}
function insertNodes(customs) {
    customs.forEach(function (curr) {
        insertNodeAt(curr.parentElement, curr.element, curr.oldIndex);
    });
}
function createCustoms(evt, list) {
    var mode = getMode(evt);
    var parentElement = { parentElement: evt.from };
    var custom = [];
    switch (mode) {
        case "normal":
            var item = {
                element: evt.item,
                newIndex: evt.newIndex,
                oldIndex: evt.oldIndex,
                parentElement: evt.from
            };
            custom = [item];
            break;
        case "swap":
            var drag = __assign({ element: evt.item, oldIndex: evt.oldIndex, newIndex: evt.newIndex }, parentElement);
            var swap = __assign({ element: evt.swapItem, oldIndex: evt.newIndex, newIndex: evt.oldIndex }, parentElement);
            custom = [drag, swap];
            break;
        case "multidrag":
            custom = evt.oldIndicies.map(function (curr, index) { return (__assign({ element: curr.multiDragElement, oldIndex: curr.index, newIndex: evt.newIndicies[index].index }, parentElement)); });
            break;
    }
    var customs = createNormalized(custom, list);
    return customs;
}
/** moves items form old index to new index without breaking anything ideally. */
function handleStateChanges(normalized, list) {
    var a = handleStateRemove(normalized, list);
    var b = handleStateAdd(normalized, a);
    return b;
}
function handleStateRemove(normalized, list) {
    var newList = __spread(list);
    normalized
        .concat()
        .reverse()
        .forEach(function (curr) { return newList.splice(curr.oldIndex, 1); });
    return newList;
}
function handleStateAdd(normalized, list) {
    var newList = __spread(list);
    normalized.forEach(function (curr) { return newList.splice(curr.newIndex, 0, curr.item); });
    return newList;
}
function getMode(evt) {
    if (evt.oldIndicies && evt.oldIndicies.length > 0)
        return "multidrag";
    if (evt.swapItem)
        return "swap";
    return "normal";
}
function createNormalized(inputs, list) {
    var normalized = inputs
        .map(function (curr) { return (__assign(__assign({}, curr), { item: list[curr.oldIndex] })); })
        .sort(function (a, b) { return a.oldIndex - b.oldIndex; });
    return normalized;
}
/**
 * Removes the following group of properties from `props`,
 * leaving only `Sortable.Options` without any `on` methods.
 * @param props `ReactSortable.Props`
 */
function destructurePropsForOptions(props) {
    var 
    // react sortable props
    list = props.list, setList = props.setList, children = props.children, tag = props.tag, style = props.style, className = props.className, clone = props.clone, 
    // sortable options that have methods we want to overwrite
    onAdd = props.onAdd, onChange = props.onChange, onChoose = props.onChoose, onClone = props.onClone, onEnd = props.onEnd, onFilter = props.onFilter, onRemove = props.onRemove, onSort = props.onSort, onStart = props.onStart, onUnchoose = props.onUnchoose, onUpdate = props.onUpdate, onMove = props.onMove, onSpill = props.onSpill, onSelect = props.onSelect, onDeselect = props.onDeselect, options = __rest(props, ["list", "setList", "children", "tag", "style", "className", "clone", "onAdd", "onChange", "onChoose", "onClone", "onEnd", "onFilter", "onRemove", "onSort", "onStart", "onUnchoose", "onUpdate", "onMove", "onSpill", "onSelect", "onDeselect"]);
    return options;
}

/** Holds a global reference for which react element is being dragged */
// @todo - use context to manage this. How does one use 2 different providers?
var store = { dragging: null };
var ReactSortable = /** @class */ (function (_super) {
    __extends(ReactSortable, _super);
    function ReactSortable(props) {
        var _this = _super.call(this, props) || this;
        // @todo forward ref this component
        _this.ref = Object(react__WEBPACK_IMPORTED_MODULE_2__["createRef"])();
        // make all state false because we can't change sortable unless a mouse gesture is made.
        var newList = props.list.map(function (item) { return (__assign(__assign({}, item), { chosen: false, selected: false })); });
        props.setList(newList, _this.sortable, store);
        Object(tiny_invariant__WEBPACK_IMPORTED_MODULE_3__["default"])(
        //@ts-ignore
        !props.plugins, "\nPlugins prop is no longer supported.\nInstead, mount it with \"Sortable.mount(new MultiDrag())\"\nPlease read the updated README.md at https://github.com/SortableJS/react-sortablejs.\n      ");
        return _this;
    }
    ReactSortable.prototype.componentDidMount = function () {
        if (this.ref.current === null)
            return;
        var newOptions = this.makeOptions();
        sortablejs__WEBPACK_IMPORTED_MODULE_0__["default"].create(this.ref.current, newOptions);
    };
    ReactSortable.prototype.render = function () {
        var _a = this.props, tag = _a.tag, style = _a.style, className = _a.className, id = _a.id;
        var classicProps = { style: style, className: className, id: id };
        // if no tag, default to a `div` element.
        var newTag = !tag || tag === null ? "div" : tag;
        return Object(react__WEBPACK_IMPORTED_MODULE_2__["createElement"])(newTag, __assign({ 
            // @todo - find a way (perhaps with the callback) to allow AntD components to work
            ref: this.ref }, classicProps), this.getChildren());
    };
    ReactSortable.prototype.getChildren = function () {
        var _a = this.props, children = _a.children, dataIdAttr = _a.dataIdAttr, _b = _a.selectedClass, selectedClass = _b === void 0 ? "sortable-selected" : _b, _c = _a.chosenClass, chosenClass = _c === void 0 ? "sortable-chosen" : _c, _d = _a.dragClass, _e = _a.fallbackClass, _f = _a.ghostClass, _g = _a.swapClass, _h = _a.filter, filter = _h === void 0 ? "sortable-filter" : _h, list = _a.list;
        // if no children, don't do anything.
        if (!children || children == null)
            return null;
        var dataid = dataIdAttr || "data-id";
        return react__WEBPACK_IMPORTED_MODULE_2__["Children"].map(children, function (child, index) {
            var _a, _b, _c;
            var item = list[index];
            var prevClassName = child.props.className;
            // @todo - handle the function if avalable. I don't think anyone will be doing this soon.
            var filtered = typeof filter === "string" && (_a = {},
                _a[filter.replace(".", "")] = !!item.filtered,
                _a);
            var className = classnames__WEBPACK_IMPORTED_MODULE_1___default()(prevClassName, __assign((_b = {}, _b[selectedClass] = item.selected, _b[chosenClass] = item.chosen, _b), filtered
            // [dragClass]: true,
            // [fallbackClass]: true,
            // [ghostClass]: true,
            // [swapClass]: true
            ));
            return Object(react__WEBPACK_IMPORTED_MODULE_2__["cloneElement"])(child, (_c = {},
                _c[dataid] = child.key,
                _c.className = className,
                _c));
        });
    };
    Object.defineProperty(ReactSortable.prototype, "sortable", {
        /** Appends the `sortable` property to this component */
        get: function () {
            var el = this.ref.current;
            if (el === null)
                return null;
            var key = Object.keys(el).find(function (k) { return k.includes("Sortable"); });
            if (!key)
                return null;
            //@ts-ignore - I know what I'm doing.
            return el[key];
        },
        enumerable: false,
        configurable: true
    });
    /** Converts all the props from `ReactSortable` into the `options` object that `Sortable.create(el, [options])` can use. */
    ReactSortable.prototype.makeOptions = function () {
        var _this = this;
        var DOMHandlers = [
            "onAdd",
            "onChoose",
            "onDeselect",
            "onEnd",
            "onRemove",
            "onSelect",
            "onSpill",
            "onStart",
            "onUnchoose",
            "onUpdate"
        ];
        var NonDOMHandlers = [
            "onChange",
            "onClone",
            "onFilter",
            "onSort"
        ];
        var newOptions = destructurePropsForOptions(this.props);
        DOMHandlers.forEach(function (name) { return (newOptions[name] = _this.prepareOnHandlerPropAndDOM(name)); });
        NonDOMHandlers.forEach(function (name) { return (newOptions[name] = _this.prepareOnHandlerProp(name)); });
        /** onMove has 2 arguments and needs to be handled seperately. */
        var onMove = function (evt, originalEvt) {
            var onMove = _this.props.onMove;
            var defaultValue = evt.willInsertAfter || -1;
            if (!onMove)
                return defaultValue;
            var result = onMove(evt, originalEvt, _this.sortable, store);
            if (typeof result === 'undefined')
                return false;
            return result;
        };
        return __assign(__assign({}, newOptions), { onMove: onMove });
    };
    /** Prepares a method that will be used in the sortable options to call an `on[Handler]` prop & an `on[Handler]` ReactSortable method.  */
    ReactSortable.prototype.prepareOnHandlerPropAndDOM = function (evtName) {
        var _this = this;
        return function (evt) {
            // call the component prop
            _this.callOnHandlerProp(evt, evtName);
            // calls state change
            //@ts-ignore - until @types multidrag item is in
            _this[evtName](evt);
        };
    };
    /** Prepares a method that will be used in the sortable options to call an `on[Handler]` prop */
    ReactSortable.prototype.prepareOnHandlerProp = function (evtName) {
        var _this = this;
        return function (evt) {
            // call the component prop
            _this.callOnHandlerProp(evt, evtName);
        };
    };
    /** Calls the `props.on[Handler]` function */
    ReactSortable.prototype.callOnHandlerProp = function (evt, evtName) {
        var propEvent = this.props[evtName];
        if (propEvent)
            propEvent(evt, this.sortable, store);
    };
    // SORTABLE DOM HANDLING
    ReactSortable.prototype.onAdd = function (evt) {
        var _a = this.props, list = _a.list, setList = _a.setList;
        var otherList = __spread(store.dragging.props.list);
        var customs = createCustoms(evt, otherList);
        removeNodes(customs);
        var newList = handleStateAdd(customs, list);
        setList(newList, this.sortable, store);
    };
    ReactSortable.prototype.onRemove = function (evt) {
        var _this = this;
        var _a = this.props, list = _a.list, setList = _a.setList;
        var mode = getMode(evt);
        var customs = createCustoms(evt, list);
        insertNodes(customs);
        var newList = __spread(list);
        // remove state if not in clone mode. otherwise, keep.
        if (evt.pullMode !== "clone")
            newList = handleStateRemove(customs, newList);
        // if clone, it doesn't really remove. instead it clones in place.
        // @todo -
        else {
            // switch used to get the clone
            var customClones = customs;
            switch (mode) {
                case "multidrag":
                    customClones = customs.map(function (item, index) { return (__assign(__assign({}, item), { element: evt.clones[index] })); });
                    break;
                case "normal":
                    customClones = customs.map(function (item, index) { return (__assign(__assign({}, item), { element: evt.clone })); });
                    break;
                case "swap":
                default: {
                    Object(tiny_invariant__WEBPACK_IMPORTED_MODULE_3__["default"])(true, "mode \"" + mode + "\" cannot clone. Please remove \"props.clone\" from <ReactSortable/> when using the \"" + mode + "\" plugin");
                }
            }
            removeNodes(customClones);
            // replace selected items with cloned items
            customs.forEach(function (curr) {
                var index = curr.oldIndex;
                var newItem = _this.props.clone(curr.item, evt);
                newList.splice(index, 1, newItem);
            });
        }
        // remove item.selected from list
        newList = newList.map(function (item) { return (__assign(__assign({}, item), { selected: false })); });
        setList(newList, this.sortable, store);
    };
    ReactSortable.prototype.onUpdate = function (evt) {
        var _a = this.props, list = _a.list, setList = _a.setList;
        var customs = createCustoms(evt, list);
        removeNodes(customs);
        insertNodes(customs);
        var newList = handleStateChanges(customs, list);
        return setList(newList, this.sortable, store);
    };
    ReactSortable.prototype.onStart = function (evt) {
        store.dragging = this;
    };
    ReactSortable.prototype.onEnd = function (evt) {
        store.dragging = null;
    };
    ReactSortable.prototype.onChoose = function (evt) {
        var _a = this.props, list = _a.list, setList = _a.setList;
        var newList = list.map(function (item, index) {
            if (index === evt.oldIndex) {
                return __assign(__assign({}, item), { chosen: true });
            }
            return item;
        });
        setList(newList, this.sortable, store);
    };
    ReactSortable.prototype.onUnchoose = function (evt) {
        var _a = this.props, list = _a.list, setList = _a.setList;
        var newList = list.map(function (item, index) {
            if (index === evt.oldIndex) {
                return __assign(__assign({}, item), { chosen: false });
            }
            return item;
        });
        setList(newList, this.sortable, store);
    };
    ReactSortable.prototype.onSpill = function (evt) {
        var _a = this.props, removeOnSpill = _a.removeOnSpill, revertOnSpill = _a.revertOnSpill;
        if (removeOnSpill && !revertOnSpill)
            removeNode(evt.item);
    };
    ReactSortable.prototype.onSelect = function (evt) {
        var _a = this.props, list = _a.list, setList = _a.setList;
        var newList = list.map(function (item) { return (__assign(__assign({}, item), { selected: false })); });
        evt.newIndicies.forEach(function (curr) {
            var index = curr.index;
            if (index === -1) {
                console.log("\"" + evt.type + "\" had indice of \"" + curr.index + "\", which is probably -1 and doesn't usually happen here.");
                console.log(evt);
                return;
            }
            newList[index].selected = true;
        });
        setList(newList, this.sortable, store);
    };
    ReactSortable.prototype.onDeselect = function (evt) {
        var _a = this.props, list = _a.list, setList = _a.setList;
        var newList = list.map(function (item) { return (__assign(__assign({}, item), { selected: false })); });
        evt.newIndicies.forEach(function (curr) {
            var index = curr.index;
            if (index === -1)
                return;
            newList[index].selected = true;
        });
        setList(newList, this.sortable, store);
    };
    ReactSortable.defaultProps = {
        clone: function (item) { return item; }
    };
    return ReactSortable;
}(react__WEBPACK_IMPORTED_MODULE_2__["Component"]));




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
 * Sortable 1.15.6
 * @author	RubaXa   <trash@rubaxa.org>
 * @author	owenm    <owen23355@gmail.com>
 * @license MIT
 */
function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);
  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) {
      symbols = symbols.filter(function (sym) {
        return Object.getOwnPropertyDescriptor(object, sym).enumerable;
      });
    }
    keys.push.apply(keys, symbols);
  }
  return keys;
}
function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};
    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }
  return target;
}
function _typeof(obj) {
  "@babel/helpers - typeof";

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
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
}
function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return _arrayLikeToArray(arr);
}
function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}
function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
}
function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;
  for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];
  return arr2;
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

var version = "1.15.6";

function userAgent(pattern) {
  if (typeof window !== 'undefined' && window.navigator) {
    return !! /*@__PURE__*/navigator.userAgent.match(pattern);
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
function matches( /**HTMLElement*/el, /**String*/selector) {
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
function closest( /**HTMLElement*/el, /**String*/selector, /**HTMLElement*/ctx, includeCTX) {
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
    container = container || el.parentNode;

    // solves #1123 (see: https://stackoverflow.com/a/37953806/6088312)
    // Not needed on <= IE11
    if (!IE11OrLess) {
      do {
        if (container && container.getBoundingClientRect && (css(container, 'transform') !== 'none' || relativeToNonStaticParent && css(container, 'position') !== 'static')) {
          var containerRect = container.getBoundingClientRect();

          // Set relative to edges of padding box of container
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
function getChild(el, childNum, options, includeDragEl) {
  var currentChild = 0,
    i = 0,
    children = el.children;
  while (i < children.length) {
    if (children[i].style.display !== 'none' && children[i] !== Sortable.ghost && (includeDragEl || children[i] !== Sortable.dragged) && closest(children[i], options.draggable, el, false)) {
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
function getChildContainingRectFromElement(container, options, ghostEl) {
  var rect = {};
  Array.from(container.children).forEach(function (child) {
    var _rect$left, _rect$top, _rect$right, _rect$bottom;
    if (!closest(child, options.draggable, container, false) || child.animated || child === ghostEl) return;
    var childRect = getRect(child);
    rect.left = Math.min((_rect$left = rect.left) !== null && _rect$left !== void 0 ? _rect$left : Infinity, childRect.left);
    rect.top = Math.min((_rect$top = rect.top) !== null && _rect$top !== void 0 ? _rect$top : Infinity, childRect.top);
    rect.right = Math.max((_rect$right = rect.right) !== null && _rect$right !== void 0 ? _rect$right : -Infinity, childRect.right);
    rect.bottom = Math.max((_rect$bottom = rect.bottom) !== null && _rect$bottom !== void 0 ? _rect$bottom : -Infinity, childRect.bottom);
  });
  rect.width = rect.right - rect.left;
  rect.height = rect.bottom - rect.top;
  rect.x = rect.left;
  rect.y = rect.top;
  return rect;
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
        var fromRect = _objectSpread2({}, animationStates[animationStates.length - 1].rect);

        // If animating: compensate for current animation
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
          if (isRectEqual(prevFromRect, toRect) && !isRectEqual(fromRect, toRect) &&
          // Make sure animatingRect is on line between toRect & fromRect
          (animatingRect.top - toRect.top) / (animatingRect.left - toRect.left) === (fromRect.top - toRect.top) / (fromRect.left - toRect.left)) {
            // If returning to same place as started from animation and on same axis
            time = calculateRealTime(animatingRect, prevFromRect, prevToRect, _this.options);
          }
        }

        // if fromRect != toRect: animate
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
      if (!sortable[plugin.pluginName]) return;
      // Fire global events if it exists in this sortable
      if (sortable[plugin.pluginName][eventNameGlobal]) {
        sortable[plugin.pluginName][eventNameGlobal](_objectSpread2({
          sortable: sortable
        }, evt));
      }

      // Only fire plugin event if plugin is enabled in this sortable,
      // and plugin has event defined
      if (sortable.options[plugin.pluginName] && sortable[plugin.pluginName][eventName]) {
        sortable[plugin.pluginName][eventName](_objectSpread2({
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
      sortable[pluginName] = initialized;

      // Add default options from plugin
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
      if (!sortable[plugin.pluginName]) return;

      // If static option listener exists for this option, call in the context of the Sortable's instance of this plugin
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
    onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1);
  // Support for new CustomEvent feature
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
  var allEventProperties = _objectSpread2(_objectSpread2({}, extraEventProperties), PluginManager.getEventProperties(name, sortable));
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

var _excluded = ["evt"];
var pluginEvent = function pluginEvent(eventName, sortable) {
  var _ref = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {},
    originalEvent = _ref.evt,
    data = _objectWithoutProperties(_ref, _excluded);
  PluginManager.pluginEvent.bind(Sortable)(eventName, sortable, _objectSpread2({
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
  dispatchEvent(_objectSpread2({
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
    if (!documentExists) return;
    // false when <= IE11
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
      var threshold = sortable[expando].options.emptyInsertThreshold;
      if (!threshold || lastChild(sortable)) return;
      var rect = getRect(sortable),
        insideHorizontally = x >= rect.left - threshold && x <= rect.right + threshold,
        insideVertically = y >= rect.top - threshold && y <= rect.bottom + threshold;
      if (insideHorizontally && insideVertically) {
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
  };

// #1184 fix - Prevent click event on fallback if dragged but item not changed position
if (documentExists && !ChromeForAndroid) {
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
  this.options = options = _extends({}, options);

  // Export instance
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
    // Disabled on Safari: #1571; Enabled on Safari IOS: #2244
    supportPointer: Sortable.supportPointer !== false && 'PointerEvent' in window && (!Safari || IOS),
    emptyInsertThreshold: 5
  };
  PluginManager.initializePlugins(this, el, defaults);

  // Set default options
  for (var name in defaults) {
    !(name in options) && (options[name] = defaults[name]);
  }
  _prepareGroup(options);

  // Bind all private methods
  for (var fn in this) {
    if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
      this[fn] = this[fn].bind(this);
    }
  }

  // Setup drag mode
  this.nativeDraggable = options.forceFallback ? false : supportDraggable;
  if (this.nativeDraggable) {
    // Touch start threshold cannot be greater than the native dragstart threshold
    this.options.touchStartThreshold = 1;
  }

  // Bind events
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
  sortables.push(this.el);

  // Restore sorting
  options.store && options.store.get && this.sort(options.store.get(this) || []);

  // Add animation state manager
  _extends(this, AnimationStateManager());
}
Sortable.prototype = /** @lends Sortable.prototype */{
  constructor: Sortable,
  _isOutsideThisEl: function _isOutsideThisEl(target) {
    if (!this.el.contains(target) && target !== this.el) {
      lastTarget = null;
    }
  },
  _getDirection: function _getDirection(evt, target) {
    return typeof this.options.direction === 'function' ? this.options.direction.call(this, evt, target, dragEl) : this.options.direction;
  },
  _onTapStart: function _onTapStart( /** Event|TouchEvent */evt) {
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
    _saveInputCheckedState(el);

    // Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.
    if (dragEl) {
      return;
    }
    if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
      return; // only left button and enabled
    }

    // cancel dnd if original target is content editable
    if (originalTarget.isContentEditable) {
      return;
    }

    // Safari ignores further event handling after mousedown
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
    }

    // Get the index of the dragged element within its parent
    oldIndex = index(target);
    oldDraggableIndex = index(target, options.draggable);

    // Check filter
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
        preventOnFilter && evt.preventDefault();
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
        preventOnFilter && evt.preventDefault();
        return; // cancel dnd
      }
    }
    if (options.handle && !closest(originalTarget, options.handle, el, false)) {
      return;
    }

    // Prepare `dragstart`
    this._prepareDragStart(evt, touch, target);
  },
  _prepareDragStart: function _prepareDragStart( /** Event */evt, /** Touch */touch, /** HTMLElement */target) {
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
        }
        // Delayed drag has been triggered
        // we can re-enable the events: touchmove/mousemove
        _this._disableDelayedDragEvents();
        if (!FireFox && _this.nativeDraggable) {
          dragEl.draggable = true;
        }

        // Bind the events: dragstart/dragend
        _this._triggerDragStart(evt, touch);

        // Drag start event
        _dispatchEvent({
          sortable: _this,
          name: 'choose',
          originalEvent: evt
        });

        // Chosen item
        toggleClass(dragEl, options.chosenClass, true);
      };

      // Disable "draggable"
      options.ignore.split(',').forEach(function (criteria) {
        find(dragEl, criteria.trim(), _disableDraggable);
      });
      on(ownerDocument, 'dragover', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'mousemove', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'touchmove', nearestEmptyInsertDetectEvent);
      if (options.supportPointer) {
        on(ownerDocument, 'pointerup', _this._onDrop);
        // Native D&D triggers pointercancel
        !this.nativeDraggable && on(ownerDocument, 'pointercancel', _this._onDrop);
      } else {
        on(ownerDocument, 'mouseup', _this._onDrop);
        on(ownerDocument, 'touchend', _this._onDrop);
        on(ownerDocument, 'touchcancel', _this._onDrop);
      }

      // Make dragEl draggable (must be before delay for FireFox)
      if (FireFox && this.nativeDraggable) {
        this.options.touchStartThreshold = 4;
        dragEl.draggable = true;
      }
      pluginEvent('delayStart', this, {
        evt: evt
      });

      // Delay is impossible for native DnD in Edge or IE
      if (options.delay && (!options.delayOnTouchOnly || touch) && (!this.nativeDraggable || !(Edge || IE11OrLess))) {
        if (Sortable.eventCanceled) {
          this._onDrop();
          return;
        }
        // If the user moves the pointer or let go the click or touch
        // before the delay has been reached:
        // disable the delayed drag
        if (options.supportPointer) {
          on(ownerDocument, 'pointerup', _this._disableDelayedDrag);
          on(ownerDocument, 'pointercancel', _this._disableDelayedDrag);
        } else {
          on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
          on(ownerDocument, 'touchend', _this._disableDelayedDrag);
          on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
        }
        on(ownerDocument, 'mousemove', _this._delayedDragTouchMoveHandler);
        on(ownerDocument, 'touchmove', _this._delayedDragTouchMoveHandler);
        options.supportPointer && on(ownerDocument, 'pointermove', _this._delayedDragTouchMoveHandler);
        _this._dragStartTimer = setTimeout(dragStartFn, options.delay);
      } else {
        dragStartFn();
      }
    }
  },
  _delayedDragTouchMoveHandler: function _delayedDragTouchMoveHandler( /** TouchEvent|PointerEvent **/e) {
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
    off(ownerDocument, 'pointerup', this._disableDelayedDrag);
    off(ownerDocument, 'pointercancel', this._disableDelayedDrag);
    off(ownerDocument, 'mousemove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'touchmove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'pointermove', this._delayedDragTouchMoveHandler);
  },
  _triggerDragStart: function _triggerDragStart( /** Event */evt, /** Touch */touch) {
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
      var options = this.options;

      // Apply effect
      !fallback && toggleClass(dragEl, options.dragClass, false);
      toggleClass(dragEl, options.ghostClass, true);
      Sortable.active = this;
      fallback && this._appendGhost();

      // Drag start event
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
        /* jshint boss:true */ while (parent = getParentOrHost(parent));
      }
      _unhideGhostForTarget();
    }
  },
  _onTouchMove: function _onTouchMove( /**TouchEvent*/evt) {
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
        dy = (touch.clientY - tapEvt.clientY + fallbackOffset.y) / (scaleY || 1) + (relativeScrollOffset ? relativeScrollOffset[1] - ghostRelativeParentInitialScroll[1] : 0) / (scaleY || 1);

      // only set the status to dragging, when we are actually dragging
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
        options = this.options;

      // Position absolutely
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
      container.appendChild(ghostEl);

      // Set transform-origin
      css(ghostEl, 'transform-origin', tapDistanceLeft / parseInt(ghostEl.style.width) * 100 + '% ' + tapDistanceTop / parseInt(ghostEl.style.height) * 100 + '%');
    }
  },
  _onDragStart: function _onDragStart( /**Event*/evt, /**boolean*/fallback) {
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
      cloneEl.removeAttribute("id");
      cloneEl.draggable = false;
      cloneEl.style['will-change'] = '';
      this._hideClone();
      toggleClass(cloneEl, this.options.chosenClass, false);
      Sortable.clone = cloneEl;
    }

    // #1143: IFrame support workaround
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
    !fallback && toggleClass(dragEl, options.dragClass, true);

    // Set proper drop events
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
      on(document, 'drop', _this);

      // #1276 fix:
      css(dragEl, 'transform', 'translateZ(0)');
    }
    awaitingDragStarted = true;
    _this._dragStartId = _nextTick(_this._dragStarted.bind(_this, fallback, evt));
    on(document, 'selectstart', _this);
    moved = true;
    window.getSelection().removeAllRanges();
    if (Safari) {
      css(document.body, 'user-select', 'none');
    }
  },
  // Returns true - if no further action is needed (either inserted or another condition)
  _onDragOver: function _onDragOver( /**Event*/evt) {
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
      pluginEvent(name, _this, _objectSpread2({
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
    }

    // Capture animation state
    function capture() {
      dragOverEvent('dragOverAnimationCapture');
      _this.captureAnimationState();
      if (_this !== fromSortable) {
        fromSortable.captureAnimationState();
      }
    }

    // Return invocation when dragEl is inserted (or completed)
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
        }

        // Animation
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
      }

      // Null lastTarget if it is not inside a previously swapped element
      if (target === dragEl && !dragEl.animated || target === el && !target.animated) {
        lastTarget = null;
      }

      // no bubbling and not fallback
      if (!options.dragoverBubble && !evt.rootEl && target !== document) {
        dragEl.parentNode[expando]._isOutsideThisEl(evt.target);

        // Do not detect for empty insert if already inserted
        !insertion && nearestEmptyInsertDetectEvent(evt);
      }
      !options.dragoverBubble && evt.stopPropagation && evt.stopPropagation();
      return completedFired = true;
    }

    // Call when dragEl has been inserted
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
    if (activeSortable && !options.disabled && (isOwner ? canSort || (revert = parentEl !== rootEl) // Reverting item into the original list
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
        // Insert to end of list

        // If already at end of list: Do not insert
        if (elLastChild === dragEl) {
          return completed(false);
        }

        // if there is a last element, it is the target
        if (elLastChild && el === evt.target) {
          target = elLastChild;
        }
        if (target) {
          targetRect = getRect(target);
        }
        if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, !!target) !== false) {
          capture();
          if (elLastChild && elLastChild.nextSibling) {
            // the last draggable element is not the last node
            el.insertBefore(dragEl, elLastChild.nextSibling);
          } else {
            el.appendChild(dragEl);
          }
          parentEl = el; // actualization

          changed();
          return completed(true);
        }
      } else if (elLastChild && _ghostIsFirst(evt, vertical, this)) {
        // Insert to start of list
        var firstChild = getChild(el, 0, options, true);
        if (firstChild === dragEl) {
          return completed(false);
        }
        target = firstChild;
        targetRect = getRect(target);
        if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, false) !== false) {
          capture();
          el.insertBefore(dragEl, firstChild);
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
        }
        // If dragEl is already beside target: Do not insert
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
          }

          // Undo chrome's scroll adjustment (has no effect on other browsers)
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
    off(ownerDocument, 'pointercancel', this._onDrop);
    off(ownerDocument, 'touchcancel', this._onDrop);
    off(document, 'selectstart', this);
  },
  _onDrop: function _onDrop( /**Event*/evt) {
    var el = this.el,
      options = this.options;

    // Get the index of the dragged element within its parent
    newIndex = index(dragEl);
    newDraggableIndex = index(dragEl, options.draggable);
    pluginEvent('drop', this, {
      evt: evt
    });
    parentEl = dragEl && dragEl.parentNode;

    // Get again after plugin event
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
    _cancelNextTick(this._dragStartId);

    // Unbind events
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
        dragEl.style['will-change'] = '';

        // Remove classes
        // ghostClass is added in dragStarted
        if (moved && !awaitingDragStarted) {
          toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : this.options.ghostClass, false);
        }
        toggleClass(dragEl, this.options.chosenClass, false);

        // Drag stop event
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
            });

            // Remove event
            _dispatchEvent({
              sortable: this,
              name: 'remove',
              toEl: parentEl,
              originalEvent: evt
            });

            // drag from one list and drop into another
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
          });

          // Save sorting
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
  handleEvent: function handleEvent( /**Event*/evt) {
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
    }
    // Remove draggable attributes
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
      if (Sortable.eventCanceled) return;

      // show clone at dragEl or original position
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
function _globalDragOver( /**Event*/evt) {
  if (evt.dataTransfer) {
    evt.dataTransfer.dropEffect = 'move';
  }
  evt.cancelable && evt.preventDefault();
}
function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvent, willInsertAfter) {
  var evt,
    sortable = fromEl[expando],
    onMoveFn = sortable.options.onMove,
    retVal;
  // Support for new CustomEvent feature
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
function _ghostIsFirst(evt, vertical, sortable) {
  var firstElRect = getRect(getChild(sortable.el, 0, sortable.options, true));
  var childContainingRect = getChildContainingRectFromElement(sortable.el, sortable.options, ghostEl);
  var spacer = 10;
  return vertical ? evt.clientX < childContainingRect.left - spacer || evt.clientY < firstElRect.top && evt.clientX < firstElRect.right : evt.clientY < childContainingRect.top - spacer || evt.clientY < firstElRect.bottom && evt.clientX < firstElRect.left;
}
function _ghostIsLast(evt, vertical, sortable) {
  var lastElRect = getRect(lastChild(sortable.el, sortable.options.draggable));
  var childContainingRect = getChildContainingRectFromElement(sortable.el, sortable.options, ghostEl);
  var spacer = 10;
  return vertical ? evt.clientX > childContainingRect.right + spacer || evt.clientY > lastElRect.bottom && evt.clientX > lastElRect.left : evt.clientY > childContainingRect.bottom + spacer || evt.clientX > lastElRect.right && evt.clientY > lastElRect.top;
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
}

// Fixed #973:
if (documentExists) {
  on(document, 'touchmove', function (evt) {
    if ((Sortable.active || awaitingDragStarted) && evt.cancelable) {
      evt.preventDefault();
    }
  });
}

// Export utils
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
  getChild: getChild,
  expando: expando
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
    if (plugin.utils) Sortable.utils = _objectSpread2(_objectSpread2({}, Sortable.utils), plugin.utils);
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
};

// Export
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
      forceAutoScrollFallback: false,
      scrollSensitivity: 30,
      scrollSpeed: 10,
      bubbleScroll: true
    };

    // Bind all private methods
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
      touchEvt$1 = evt;

      // IE does not seem to have native autoscroll,
      // Edge's autoscroll seems too conditional,
      // MACOS Safari does not have autoscroll,
      // Firefox and Chrome are good
      if (fallback || this.options.forceAutoScrollFallback || Edge || IE11OrLess || Safari) {
        autoScroll(evt, this.options, elem, fallback);

        // Listener for pointer element change
        var ogElemScroller = getParentAutoScrollElement(elem, true);
        if (scrolling && (!pointerElemChangedInterval || x !== lastAutoScrollX || y !== lastAutoScrollY)) {
          pointerElemChangedInterval && clearPointerElemChangedInterval();
          // Detect for pointer elem change, emulating native DnD behaviour
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
    scrollCustomFn;

  // New scroll root, set scrollEl
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
    if (!sortable.options.avoidImplicitDeselect) {
      if (sortable.options.supportPointer) {
        on(document, 'pointerup', this._deselectMultiDrag);
      } else {
        on(document, 'mouseup', this._deselectMultiDrag);
        on(document, 'touchend', this._deselectMultiDrag);
      }
    }
    on(document, 'keydown', this._checkKeyDown);
    on(document, 'keyup', this._checkKeyUp);
    this.defaults = {
      selectedClass: 'sortable-selected',
      multiDragKey: null,
      avoidImplicitDeselect: false,
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
      });

      // Sort multi-drag elements
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
        }

        // Remove all auxiliary multidrag items from el, if sorting enabled
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
        initialFolding = false;
        // If leaving sort:false root, or already folding - Fold to new location
        if (options.animation && multiDragElements.length > 1 && (folding || !isOwner && !activeSortable.options.sort && !putSortable)) {
          // Fold: Set all multi drag elements's rects to dragEl's rect when multi-drag elements are invisible
          var dragRectAbsolute = getRect(dragEl$1, false, true, true);
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            setRect(multiDragElement, dragRectAbsolute);

            // Move element(s) to end of parentEl so that it does not interfere with multi-drag clones insertion if they are inserted
            // while folding, and so that we can capture them again because old sortable will no longer be fromSortable
            parentEl.appendChild(multiDragElement);
          });
          folding = true;
        }

        // Clones must be shown (and check to remove multi drags) after folding when interfering multiDragElements are moved out
        if (!isOwner) {
          // Only remove if not folding (folding will remove them anyways)
          if (!folding) {
            removeMultiDragElements();
          }
          if (multiDragElements.length > 1) {
            var clonesHiddenBefore = clonesHidden;
            activeSortable._showClone(sortable);

            // Unfold animation for clones if showing from hidden
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
        children = parentEl.children;

      // Multi-drag selection
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
            originalEvent: evt
          });

          // Modifier activated, select from last to dragEl
          if (evt.shiftKey && lastMultiDragSelect && sortable.el.contains(lastMultiDragSelect)) {
            var lastIndex = index(lastMultiDragSelect),
              currentIndex = index(dragEl$1);
            if (~lastIndex && ~currentIndex && lastIndex !== currentIndex) {
              (function () {
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
                var filter = options.filter;
                for (; i < n; i++) {
                  if (~multiDragElements.indexOf(children[i])) continue;
                  // Check if element is draggable
                  if (!closest(children[i], options.draggable, parentEl, false)) continue;
                  // Check if element is filtered
                  var filtered = filter && (typeof filter === 'function' ? filter.call(sortable, evt, children[i], sortable) : filter.split(',').some(function (criteria) {
                    return closest(children[i], criteria.trim(), parentEl, false);
                  }));
                  if (filtered) continue;
                  toggleClass(children[i], options.selectedClass, true);
                  multiDragElements.push(children[i]);
                  dispatchEvent({
                    sortable: sortable,
                    rootEl: rootEl,
                    name: 'select',
                    targetEl: children[i],
                    originalEvent: evt
                  });
                }
              })();
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
            originalEvent: evt
          });
        }
      }

      // Multi-drag drop
      if (dragStarted && this.isMultiDrag) {
        folding = false;
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
                  multiDragElement.fromRect = rect;

                  // Prepare unfold animation
                  toSortable.addAnimationState({
                    target: multiDragElement,
                    rect: rect
                  });
                }
              });
            }

            // Multi drag elements are not necessarily removed from the DOM on drop, so to reinsert
            // properly they must all be removed
            removeMultiDragElements();
            multiDragElements.forEach(function (multiDragElement) {
              if (children[multiDragIndex]) {
                parentEl.insertBefore(multiDragElement, children[multiDragIndex]);
              } else {
                parentEl.appendChild(multiDragElement);
              }
              multiDragIndex++;
            });

            // If initial folding is done, the elements may have changed position because they are now
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
                dispatchSortableEvent('sort');
              }
            }
          }

          // Must be done after capturing individual rects (scroll bar)
          multiDragElements.forEach(function (multiDragElement) {
            unsetRect(multiDragElement);
          });
          toSortable.animateAll();
        }
        multiDragSortable = toSortable;
      }

      // Remove clones if necessary
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
      if (typeof dragStarted !== "undefined" && dragStarted) return;

      // Only deselect if selection is in this sortable
      if (multiDragSortable !== this.sortable) return;

      // Only deselect if target is not item in this sortable
      if (evt && closest(evt.target, this.options.draggable, this.sortable.el, false)) return;

      // Only deselect if left click
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
          originalEvent: evt
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
        });

        // multiDragElements will already be sorted if folding
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
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return invariant; });
var isProduction = "development" === 'production';
var prefix = 'Invariant failed';
function invariant(condition, message) {
    if (condition) {
        return;
    }
    if (isProduction) {
        throw new Error(prefix);
    }
    var provided = typeof message === 'function' ? message() : message;
    var value = provided ? "".concat(prefix, ": ").concat(provided) : prefix;
    throw new Error(value);
}




/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./node_modules/webpack/buildin/module.js":
/*!***********************************!*\
  !*** (webpack)/buildin/module.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(module) {
	if (!module.webpackPolyfill) {
		module.deprecate = function() {};
		module.paths = [];
		// module.parent = undefined by default
		if (!module.children) module.children = [];
		Object.defineProperty(module, "loaded", {
			enumerable: true,
			get: function() {
				return module.l;
			}
		});
		Object.defineProperty(module, "id", {
			enumerable: true,
			get: function() {
				return module.i;
			}
		});
		module.webpackPolyfill = 1;
	}
	return module;
};


/***/ }),

/***/ "./src/backgroundimage/control.js":
/*!****************************************!*\
  !*** ./src/backgroundimage/control.js ***!
  \****************************************/
/*! exports provided: responsiveBackgroundImage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveBackgroundImage", function() { return responsiveBackgroundImage; });
/* harmony import */ var _responsive_backgound_image_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./responsive-backgound-image-component */ "./src/backgroundimage/responsive-backgound-image-component.js");

var responsiveBackgroundImage = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_responsive_backgound_image_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/backgroundimage/responsive-backgound-image-component.js":
/*!*********************************************************************!*\
  !*** ./src/backgroundimage/responsive-backgound-image-component.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_4__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}


var _wp$components = wp.components,
  ToggleControl = _wp$components.ToggleControl,
  FormFileUpload = _wp$components.FormFileUpload;



var ResponsiveBackgroundImageComponent = function ResponsiveBackgroundImageComponent(props) {
  var value = props.control.params.value;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])({
      value: value
    }),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    id = _props$control$params.id,
    map_bg_color = _props$control$params.map_bg_color;
  var frameRef = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["useRef"])(null);
  var onToggleClick = function onToggleClick() {
    var newEnableState = !props_value.value.enable;
    var updatedValue = _objectSpread(_objectSpread({}, props_value.value), {}, {
      enable: newEnableState
    });
    setPropsValue(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: updatedValue
      });
    });
    props.control.settings['enable'].set(newEnableState);
  };
  var handleChange = function handleChange() {
    var attachment = frameRef.current.state().get('selection').first().toJSON();
    var sizes = attachment.sizes,
      width = attachment.width;
    var url = sizes.full.url;
    if (width < 700) {
      url = lodash__WEBPACK_IMPORTED_MODULE_4___default.a.maxBy(Object.values(lodash__WEBPACK_IMPORTED_MODULE_4___default.a.omit(sizes, 'large')), 'width').url;
    }

    // Update the state with a new URL
    var updatedValue = _objectSpread(_objectSpread({}, props_value.value), {}, {
      image_url: url
    });
    setPropsValue(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: updatedValue
      });
    });

    // Update the Customizer setting for the URL
    props.control.settings['image_url'].set(url);
    frameRef.current.close();
  };
  var responsiveAddBGMedia = function responsiveAddBGMedia() {
    frameRef.current = wp.media({
      button: {
        text: 'Select',
        close: false
      },
      states: [new wp.media.controller.Library({
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Select logo', 'responsive'),
        library: wp.media.query({
          type: 'image'
        }),
        multiple: false,
        date: false,
        priority: 20,
        suggestedWidth: '320px',
        suggestedHeight: '140px'
      })]
    });
    frameRef.current.on('select', handleChange);
    frameRef.current.setState('library').open();
  };

  // Remove/Delete Image
  var removeBGImage = function removeBGImage() {
    // Update the state with a new URL
    var updatedValue = _objectSpread(_objectSpread({}, props_value.value), {}, {
      image_url: ''
    });
    setPropsValue(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: updatedValue
      });
    });
    // Update the Customizer setting for the URL
    props.control.settings['image_url'].set('');
  };
  var focusColorSetting = function focusColorSetting(controlId) {
    var wrapper = document.querySelector("#customize-control-".concat(controlId));
    if (wrapper) {
      wrapper.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
      });
      wrapper.classList.add('highlighted'); // Add a visual effect
      setTimeout(function () {
        return wrapper.classList.remove('highlighted');
      }, 1000);
    }
  };
  var NoImageSelected = /*#__PURE__*/React.createElement("div", {
    className: "responsive-bgimage-not-selected",
    onClick: responsiveAddBGMedia
  }, /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    "fill-rule": "evenodd",
    "clip-rule": "evenodd",
    d: "M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18Z",
    fill: "#007CBA"
  })));
  var ImageSelected = /*#__PURE__*/React.createElement("div", {
    className: "responsive-bgimage-selected"
  }, /*#__PURE__*/React.createElement("img", {
    src: props_value.value.image_url
  }), /*#__PURE__*/React.createElement("svg", {
    "class": "bgimage-remove-btn",
    width: "32",
    height: "32",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg",
    onClick: removeBGImage
  }, /*#__PURE__*/React.createElement("circle", {
    cx: "10",
    cy: "10",
    r: "10",
    fill: "#F2F2F2"
  }), /*#__PURE__*/React.createElement("path", {
    d: "M8.54175 11.4583L8.54175 9.70825",
    stroke: "#666666",
    "stroke-width": "0.8",
    "stroke-linecap": "round"
  }), /*#__PURE__*/React.createElement("path", {
    d: "M11.4583 11.4583L11.4583 9.70825",
    stroke: "#666666",
    "stroke-width": "0.8",
    "stroke-linecap": "round"
  }), /*#__PURE__*/React.createElement("path", {
    d: "M4.75 6.79175H15.25V6.79175C15.2113 6.79175 15.192 6.79175 15.1756 6.79202C14.0967 6.80967 13.2263 7.68007 13.2086 8.75902C13.2083 8.77539 13.2083 8.79473 13.2083 8.83342V11.1667C13.2083 12.2947 13.2083 12.8587 12.9874 13.2889C12.7964 13.6606 12.4939 13.9632 12.1221 14.1541C11.692 14.3751 11.128 14.3751 10 14.3751V14.3751C8.87203 14.3751 8.30805 14.3751 7.87786 14.1541C7.50614 13.9632 7.20357 13.6606 7.01263 13.2889C6.79167 12.8587 6.79167 12.2947 6.79167 11.1667V8.83342C6.79167 8.79473 6.79167 8.77539 6.7914 8.75902C6.77374 7.68007 5.90334 6.80967 4.82439 6.79202C4.80803 6.79175 4.78869 6.79175 4.75 6.79175V6.79175Z",
    stroke: "#666666",
    "stroke-width": "0.8",
    "stroke-linecap": "round"
  }), /*#__PURE__*/React.createElement("path", {
    d: "M8.54159 5.04173C8.54159 5.04173 8.83325 4.45825 9.99992 4.45825C11.1666 4.45825 11.4583 5.04159 11.4583 5.04159",
    stroke: "#666666",
    "stroke-width": "0.8",
    "stroke-linecap": "round"
  })), id !== "responsive_site_background_image" && /*#__PURE__*/React.createElement("p", {
    className: "responsive-bgimage-description"
  }, /*#__PURE__*/React.createElement("span", null, "Note: "), "Please reduce the opacity of", " ", /*#__PURE__*/React.createElement("span", {
    onClick: function onClick() {
      return focusColorSetting(map_bg_color.control_id);
    },
    style: {
      cursor: "pointer",
      color: "#007cba"
    }
  }, map_bg_color.label), " ", "to make the background image visible. You can change the opacity by using drag control in color options. Set the value as per your requirements."));
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
    className: "responsive-background-image-control"
  }, /*#__PURE__*/React.createElement(ToggleControl, {
    label: label ? label : undefined,
    checked: props_value.value.enable,
    onChange: function onChange() {
      onToggleClick(props_value.value.enable);
    },
    className: "responsive-toggle-control"
  }), !!props_value.value.enable && /*#__PURE__*/React.createElement("div", {
    className: "responsive-background-image-wrapper ".concat(!props_value.value.image_url ? 'not-selected' : 'selected', " ")
  }, !props_value.value.image_url && NoImageSelected, props_value.value.image_url && ImageSelected)));
};
ResponsiveBackgroundImageComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ResponsiveBackgroundImageComponent));

/***/ }),

/***/ "./src/borderwidth/border-width-dimensions-component.js":
/*!**************************************************************!*\
  !*** ./src/borderwidth/border-width-dimensions-component.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _extends() {
  return _extends = Object.assign ? Object.assign.bind() : function (n) {
    for (var e = 1; e < arguments.length; e++) {
      var t = arguments[e];
      for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]);
    }
    return n;
  }, _extends.apply(null, arguments);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var BorderWidthDimensionsComponent = function BorderWidthDimensionsComponent(props) {
  var value = props.control.params;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(value),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var onConnectedClick = function onConnectedClick() {
    var parent = event.target.parentElement.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.responsive-border-width-dimensions-input');
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('linked');
      inputs[i].setAttribute('data-element-connect', '');
    }
    event.target.parentElement.classList.remove('unlinked');
  };
  var onDisconnectedClick = function onDisconnectedClick() {
    var elements = event.target.dataset.elementConnect;
    var parent = event.target.parentElement.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.responsive-border-width-dimensions-input');
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
    var itemLinkDesc = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Link Values Together', 'responsive');
    var linkHtml = null;
    var htmlChoices = null;
    var dataElement = id;
    if ('tablet' === device) {
      dataElement = dataElement + '_tablet';
    }
    if ('mobile' === device) {
      dataElement = dataElement + '_mobile';
    }
    linkHtml = /*#__PURE__*/React.createElement("li", {
      key: 'connect-disconnect' + device,
      className: "dimension-wrap"
    }, /*#__PURE__*/React.createElement("div", {
      className: "link-dimensions unlinked"
    }, /*#__PURE__*/React.createElement("span", {
      key: 'connect' + device,
      className: "dashicons dashicons-admin-links responsive-linked",
      onClick: function onClick() {
        onConnectedClick();
      },
      "data-element-connect": id,
      title: itemLinkDesc,
      "data-element": dataElement
    }), /*#__PURE__*/React.createElement("span", {
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
        var html = /*#__PURE__*/React.createElement("li", {
          key: props_value[device][choiceID].id,
          className: "dimension-wrap ".concat(choiceID)
        }, /*#__PURE__*/React.createElement("input", _extends({
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
        })), /*#__PURE__*/React.createElement("span", {
          className: "dimension-label"
        }, l10n[choiceID]));
        return html;
      });
    }
    return /*#__PURE__*/React.createElement("ul", {
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
    htmlDescription = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  inputHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  responsiveHtml = /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, /*#__PURE__*/React.createElement("span", null, label), /*#__PURE__*/React.createElement("ul", {
    className: "responsive-switchers"
  }, /*#__PURE__*/React.createElement("li", {
    className: "desktop"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-desktop active",
    "data-device": "desktop"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-desktop"
  }))), /*#__PURE__*/React.createElement("li", {
    className: "tablet"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-tablet",
    "data-device": "tablet"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-tablet"
  }))), /*#__PURE__*/React.createElement("li", {
    className: "mobile"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-mobile",
    "data-device": "mobile"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-smartphone"
  }))))), inputHtml);
  return /*#__PURE__*/React.createElement(React.Fragment, null, responsiveHtml, htmlDescription);
};
BorderWidthDimensionsComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(BorderWidthDimensionsComponent));

/***/ }),

/***/ "./src/borderwidth/control.js":
/*!************************************!*\
  !*** ./src/borderwidth/control.js ***!
  \************************************/
/*! exports provided: responsiveBorderWidthDimensions */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveBorderWidthDimensions", function() { return responsiveBorderWidthDimensions; });
/* harmony import */ var _border_width_dimensions_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./border-width-dimensions-component.js */ "./src/borderwidth/border-width-dimensions-component.js");

var responsiveBorderWidthDimensions = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_border_width_dimensions_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
        $footer_devices = jQuery('.wp-full-overlay-footer .devices');

      // Button class
      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active');

      // Control class
      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

      // Wrapper class
      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device);

      // Panel footer buttons
      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true);

      // Open switchers
      if ($this.hasClass('preview-desktop')) {
        $control.toggleClass('responsive-switchers-open');
      }
    });
  }
});

/***/ }),

/***/ "./src/breadcrumb-toggle.js":
/*!**********************************!*\
  !*** ./src/breadcrumb-toggle.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * By default, breadcrumb is turned off, still the breadcrumb options are visible.
 * This file resolves the issue.
 */
(function ($) {
  // Wait until the Customizer is fully loaded.
  wp.customize.bind('ready', function () {
    // Add click event listener to the breadcrumb section.
    $('#accordion-section-responsive_breadcrumb').on('click', function () {
      if (!isBreadcrumbEnable()) {
        WhenBreadcrumbUnchecked();
      }
    });
  });
  function WhenBreadcrumbUnchecked() {
    // Get all IDs from elementIDs and set their display to block.
    var ids = elementIDs();
    ids.forEach(function (id) {
      $('#' + id).css('display', 'none');
    });
    if ($('#customize-control-responsive_breadcrumb_tabs #responsive_breadcrumb_general_tab').length) {
      $('#customize-control-responsive_breadcrumb_tabs #responsive_breadcrumb_general_tab').on('click', function () {
        setTimeout(function () {
          if (!isBreadcrumbEnable()) {
            ids.forEach(function (id) {
              $('#' + id).css('display', 'none');
            });
          }
        }, 100);
      });
    }
  }
  function isBreadcrumbEnable() {
    var toggleControl = $('#inspector-toggle-control-0');
    if (toggleControl.length) {
      var isChecked = toggleControl.is(':checked');
      return isChecked ? true : false;
    } else {
      return false;
    }
  }
  function elementIDs() {
    var tab_ids_prefix = 'customize-control-';
    var general_tab_ids = [tab_ids_prefix + 'responsive_breadcrumb_enable_separator', tab_ids_prefix + 'responsive_breadcrumb_position', tab_ids_prefix + 'responsive_breadcrumb_position_separator', tab_ids_prefix + 'responsive_breadcrumb_enable_home_page', tab_ids_prefix + 'responsive_breadcrumb_enable_blog_posts_page', tab_ids_prefix + 'responsive_breadcrumb_enable_search', tab_ids_prefix + 'responsive_breadcrumb_enable_archive', tab_ids_prefix + 'responsive_breadcrumb_enable_single_page', tab_ids_prefix + 'responsive_breadcrumb_enable_single_post', tab_ids_prefix + 'responsive_breadcrumb_enable_404_page', tab_ids_prefix + 'responsive_breadcrumb_separator', tab_ids_prefix + 'responsive_breadcrumb_separator_separator', tab_ids_prefix + 'responsive_content_header_alignment', tab_ids_prefix + 'responsive_content_header_alignment_separator', tab_ids_prefix + 'responsive_content_header_padding', tab_ids_prefix + 'responsive_breadcrumb_display_settings_separator'];
    return general_tab_ids;
  }
})(jQuery);

/***/ }),

/***/ "./src/builder-available-drag/available-drag-component.js":
/*!****************************************************************!*\
  !*** ./src/builder-available-drag/available-drag-component.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.es.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var he__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! he */ "../../../../node_modules/he/he.js");
/* harmony import */ var he__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(he__WEBPACK_IMPORTED_MODULE_4__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var Fragment = wp.element.Fragment;


var AvailableItemsDrag = function AvailableItemsDrag(props) {
  var controlParams = props.control.params.input_attrs;
  var choices = props.control.params.builder_choices;
  var settings = props.customizer.control("responsive_".concat(controlParams.group)).setting.get();
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])({
      settings: settings
    }),
    _useState2 = _slicedToArray(_useState, 2),
    state = _useState2[0],
    setState = _useState2[1];
  var onDragStart = function onDragStart() {
    var dropzones = document.querySelectorAll('.responsive-builder-area');
    dropzones.forEach(function (dropzone) {
      dropzone.classList.add('responsive-dragging-dropzones');
    });
  };
  var onDragStop = function onDragStop() {
    var dropzones = document.querySelectorAll('.responsive-builder-area');
    dropzones.forEach(function (dropzone) {
      dropzone.classList.remove('responsive-dragging-dropzones');
    });
  };
  var onDragEnd = function onDragEnd(items) {
    if (items.length === 0) {
      onUpdate();
    }
  };
  var focusPanel = function focusPanel(item) {
    var _choices$item;
    var section = (_choices$item = choices[item]) === null || _choices$item === void 0 ? void 0 : _choices$item.section;
    if (section && props.customizer.section(section)) {
      props.customizer.section(section).focus();
    }
  };
  var onUpdate = function onUpdate() {
    settings = props.customizer.control("responsive_".concat(controlParams.group)).setting.get();
    setState({
      settings: settings
    });
  };
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    document.addEventListener('responsiveUpdateHFBuilderAvailable', function (e) {
      if (e.detail === controlParams.group) {
        onUpdate();
      }
    });
  }, [state]);
  var renderItem = function renderItem(item, part) {
    var _choices$item2, _choices$item3, _choices$item4, _choices$item5;
    var available = true;
    controlParams.rows.forEach(function (zone) {
      Object.keys(state.settings[zone]).forEach(function (area) {
        if (state.settings[zone][area].includes(item)) {
          available = false;
        }
      });
    });
    var theItem = [{
      id: item
    }];
    return /*#__PURE__*/React.createElement(Fragment, {
      key: item
    }, !available && part === 'links' && /*#__PURE__*/React.createElement("div", {
      className: "responsive-hfb-item-wrap"
    }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
      className: "responsive-hfb-item",
      onClick: function onClick() {
        return focusPanel(item);
      },
      "data-section": ((_choices$item2 = choices[item]) === null || _choices$item2 === void 0 ? void 0 : _choices$item2.section) || ''
    }, he__WEBPACK_IMPORTED_MODULE_4___default.a.decode((_choices$item3 = choices[item]) === null || _choices$item3 === void 0 ? void 0 : _choices$item3.name) || '', /*#__PURE__*/React.createElement("span", {
      className: "responsive-hfb-item-icon"
    }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Dashicon"], {
      icon: "arrow-right-alt2"
    })))), available && part === 'available' && /*#__PURE__*/React.createElement(react_sortablejs__WEBPACK_IMPORTED_MODULE_2__["ReactSortable"], {
      animation: 100,
      onStart: onDragStart,
      onEnd: onDragStop,
      group: {
        name: controlParams.group,
        put: false
      },
      list: theItem,
      setList: function setList(newState) {
        return onDragEnd(newState);
      },
      delayOnTouchStart: true,
      delay: 5,
      className: "responsive-hfb-item-wrap responsive-hfb-move-item"
    }, /*#__PURE__*/React.createElement("div", {
      className: "responsive-hfb-item",
      "data-section": ((_choices$item4 = choices[item]) === null || _choices$item4 === void 0 ? void 0 : _choices$item4.section) || ''
    }, he__WEBPACK_IMPORTED_MODULE_4___default.a.decode((_choices$item5 = choices[item]) === null || _choices$item5 === void 0 ? void 0 : _choices$item5.name) || '')));
  };
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-control-field responsive-hfb-available-items"
  }, Object.keys(choices).map(function (item) {
    return renderItem(item, 'links');
  }), /*#__PURE__*/React.createElement("div", {
    className: "responsive-hfb-available-items-title"
  }, /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, props.control.params.label)), /*#__PURE__*/React.createElement("div", {
    className: "responsive-hfb-available-items-pool"
  }, Object.keys(choices).map(function (item) {
    return renderItem(item, 'available');
  })));
};
AvailableItemsDrag.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(AvailableItemsDrag));

/***/ }),

/***/ "./src/builder-available-drag/control.js":
/*!***********************************************!*\
  !*** ./src/builder-available-drag/control.js ***!
  \***********************************************/
/*! exports provided: responsiveAvailableItemsDragControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveAvailableItemsDragControl", function() { return responsiveAvailableItemsDragControl; });
/* harmony import */ var _available_drag_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./available-drag-component.js */ "./src/builder-available-drag/available-drag-component.js");

var responsiveAvailableItemsDragControl = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_available_drag_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control,
      customizer: wp.customize
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/builder-layout/add-block-component.js":
/*!***************************************************!*\
  !*** ./src/builder-layout/add-block-component.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var he__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! he */ "../../../../node_modules/he/he.js");
/* harmony import */ var he__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(he__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../icons */ "./src/icons.js");
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}





var BuilderAddBlockComponent = function BuilderAddBlockComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(false),
    _useState2 = _slicedToArray(_useState, 2),
    isPopoverVisible = _useState2[0],
    setIsPopoverVisible = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(true),
    _useState4 = _slicedToArray(_useState3, 2),
    anyItemAvailable = _useState4[0],
    setAnyItemAvailable = _useState4[1];
  Object(react__WEBPACK_IMPORTED_MODULE_2__["useEffect"])(function () {
    var anyAvailable = false;
    Object.keys(props.choices).forEach(function (item) {
      var available = true;
      props.controlParams.rows.forEach(function (zone) {
        Object.keys(props.settings[zone]).forEach(function (area) {
          if (props.settings[zone][area].includes(item)) {
            available = false;
          }
        });
      });
      if (available) {
        anyAvailable = true;
      }
    });
    setAnyItemAvailable(anyAvailable);
  }, [props.choices, props.controlParams.rows, props.settings]);
  var classForAdd = 'responsive-builder-add-item';
  if ('header_desktop_items' === props.controlParams.group && 'right' === props.location) {
    classForAdd += ' center-on-left';
  }
  if ('header_desktop_items' === props.controlParams.group && 'left' === props.location) {
    classForAdd += ' center-on-right';
  }
  if ('header_desktop_items' === props.controlParams.group && 'left_center' === props.location) {
    classForAdd += ' right-center-on-right';
  }
  if ('header_desktop_items' === props.controlParams.group && 'right_center' === props.location) {
    classForAdd += ' left-center-on-left';
  }
  var addItem = function addItem(item) {
    setIsPopoverVisible(false);
    var updatedItems = [].concat(_toConsumableArray(props.list), [{
      id: item
    }]);
    props.setList(updatedItems);
  };
  var renderItems = function renderItems() {
    return Object.keys(props.choices).map(function (item) {
      var available = true;
      props.controlParams.rows.forEach(function (zone) {
        Object.keys(props.settings[zone]).forEach(function (area) {
          if (props.settings[zone][area].includes(item)) {
            available = false;
          }
        });
      });
      if (available) {
        return /*#__PURE__*/React.createElement(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], {
          key: item
        }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Button"], {
          isTertiary: true,
          className: "builder-add-btn",
          onClick: function onClick() {
            return addItem(item);
          }
        }, /*#__PURE__*/React.createElement("span", {
          className: "add-btn-icon"
        }, _icons__WEBPACK_IMPORTED_MODULE_4__["default"][item] ?
        // Render the Icon SVG.
        _icons__WEBPACK_IMPORTED_MODULE_4__["default"][item] : /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Dashicon"], {
          icon: props.choices[item].icon || 'block-default'
        })), /*#__PURE__*/React.createElement("span", {
          className: "add-btn-title"
        }, he__WEBPACK_IMPORTED_MODULE_3___default.a.decode(props.choices[item].name || ''))));
      }
      return null;
    });
  };
  return /*#__PURE__*/React.createElement("div", {
    className: classForAdd,
    key: props.id
  }, isPopoverVisible && anyItemAvailable && /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Popover"], {
    position: "top",
    inline: true,
    className: "responsive-hfb-popover-add-builder",
    onClose: function onClose() {
      return setIsPopoverVisible(false);
    }
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-hfb-popover-builder-list"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["ButtonGroup"], {
    className: "responsive-hfb-radio-container-control"
  }, renderItems()))), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Button"], {
    className: "responsive-builder-item-add-icon",
    onClick: function onClick() {
      return setIsPopoverVisible(true);
    }
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Dashicon"], {
    icon: "plus"
  })));
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(BuilderAddBlockComponent));

/***/ }),

/***/ "./src/builder-layout/builder-component.js":
/*!*************************************************!*\
  !*** ./src/builder-layout/builder-component.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _row_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./row-component */ "./src/builder-layout/row-component.js");
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}



var BuilderComponent = function BuilderComponent(props) {
  var value = props.control.setting.get();
  var baseDefault = {};
  var defaultValue = props.control.params["default"] ? _objectSpread(_objectSpread({}, baseDefault), props.control.params["default"]) : baseDefault;
  value = value ? _objectSpread(_objectSpread({}, defaultValue), value) : defaultValue;
  var defaultParams = {};
  var controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.control.params.input_attrs) : defaultParams;
  var choices = props.control.params.builder_choices ? props.control.params.builder_choices : [];
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])({
      value: value
    }),
    _useState2 = _slicedToArray(_useState, 2),
    state = _useState2[0],
    setState = _useState2[1];
  var isUpdatingFooter = false;
  var onDragStart = function onDragStart(e) {
    var dropzones = document.querySelectorAll('.responsive-builder-area');
    var i;
    for (i = 0; i < dropzones.length; ++i) {
      dropzones[i].classList.add('responsive-dragging-dropzones');
    }
  };
  var onDragStop = function onDragStop() {
    var dropzones = document.querySelectorAll('.responsive-builder-area');
    var i;
    for (i = 0; i < dropzones.length; ++i) {
      dropzones[i].classList.remove('responsive-dragging-dropzones');
    }
  };
  var updateValues = function updateValues(value) {
    props.control.setting.set(_objectSpread(_objectSpread(_objectSpread({}, props.control.setting.get()), value), {}, {
      flag: !props.control.setting.get().flag
    }));
  };
  var _removeItem = function removeItem(item, row, zone) {
    var updateState = state.value;
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
    if ('header_desktop_items' === controlParams.group && row + '_center' === zone && updateItems.length === 0) {
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
    setState({
      value: updateState
    });
    updateValues(updateState);
    var event = new CustomEvent('responsiveUpdateHFBuilderAvailable', {
      detail: controlParams.group
    });
    document.dispatchEvent(event);
  };
  var onDragEnd = function onDragEnd(row, zone, items) {
    var updateState = state.value;
    var update = updateState[row];
    var updateItems = [];
    {
      items.length > 0 && items.map(function (item) {
        updateItems.push(item.id);
      });
    }
    ;
    if (!arraysEqual(update[zone], updateItems)) {
      if ('header_desktop_items' === controlParams.group && row + '_center' === zone && updateItems.length === 0) {
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
      setState({
        value: updateState
      });
      updateValues(updateState);
    }
  };
  var _onAddItem = function onAddItem(row, zone, items) {
    onDragEnd(row, zone, items);
    var event = new CustomEvent('responsiveUpdateHFBuilderAvailable', {
      detail: controlParams.group
    });
    document.dispatchEvent(event);
  };
  var arraysEqual = function arraysEqual(a, b) {
    if (a === b) return true;
    if (a == null || b == null) return false;
    if (a.length != b.length) return false;
    for (var i = 0; i < a.length; ++i) {
      if (a[i] !== b[i]) return false;
    }
    return true;
  };
  var _focusPanel = function focusPanel(item) {
    if (undefined !== props.customizer.section('responsive_' + item)) {
      props.customizer.section('responsive_' + item).focus();
    }
  };
  var _focusItem = function focusItem(item) {
    if (undefined !== props.customizer.section(item)) {
      props.customizer.section(item).focus();
    }
  };
  var onFooterUpdate = function onFooterUpdate(row) {
    var updateState = _objectSpread({}, state.value);
    var update = updateState[row];
    var updateAvailableItems = false;
    var columns = parseInt(props.customizer("responsive_footer_".concat(row, "_columns")).get(), 10);
    for (var col = 6; col > 1; col--) {
      var key = "".concat(row, "_").concat(col);
      if (columns < col && update[key] && update[key].length > 0) {
        updateState[row][key] = [];
        updateAvailableItems = true;
      }
    }
    setState({
      value: updateState
    });
    updateValues(updateState);
    if (updateAvailableItems) {
      var event = new CustomEvent('responsiveUpdateHFBuilderAvailable', {
        detail: controlParams.group
      });
      document.dispatchEvent(event);
    }
  };
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    var createFooterColumnsHandler = function createFooterColumnsHandler(row) {
      return function (newval) {
        if (!isUpdatingFooter) {
          isUpdatingFooter = true;
          onFooterUpdate(row);
          setTimeout(function () {
            isUpdatingFooter = false;
          }, 0);
        }
      };
    };
    var rows = ['above', 'primary', 'below'];

    // Bind handlers for each row.
    rows.forEach(function (row) {
      props.customizer("responsive_footer_".concat(row, "_columns"), function (value) {
        var handler = createFooterColumnsHandler(row);
        value.bind(handler);
        return function () {
          value.unbind(handler);
        };
      });
    });
    var handleFooterUpdate = function handleFooterUpdate(e) {
      if (undefined !== e.detail.trigger && 'footer_items' == e.detail.trigger) {
        setTimeout(function () {
          onFooterUpdate(e.detail.item);
        }, 200);
      }
    };
    document.addEventListener('responsiveUpdateFooterColumns', handleFooterUpdate);

    // Cleanup to avoid multiple listeners
    return function () {
      document.removeEventListener('responsiveUpdateFooterColumns', handleFooterUpdate);
    };
  }, [props]);
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-control-field responsive-builder-items"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-builder-row-items"
  }, controlParams.rows.map(function (row) {
    return /*#__PURE__*/React.createElement(_row_component__WEBPACK_IMPORTED_MODULE_2__["default"], {
      key: row,
      row: row,
      controlParams: controlParams,
      customizer: props.customizer,
      choices: choices,
      settings: value,
      items: value[row],
      focusPanel: function focusPanel(item) {
        return _focusPanel(item);
      },
      focusItem: function focusItem(item) {
        return _focusItem(item);
      },
      removeItem: function removeItem(remove, row, zone) {
        return _removeItem(remove, row, zone);
      },
      hideDrop: function hideDrop() {
        return onDragStop();
      },
      onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
        return onDragEnd(updateRow, updateZone, updateItems);
      },
      onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
        return _onAddItem(updateRow, updateZone, updateItems);
      },
      showDrop: function showDrop() {
        return onDragStart();
      }
    });
  })));
};
BuilderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(BuilderComponent));

/***/ }),

/***/ "./src/builder-layout/control.js":
/*!***************************************!*\
  !*** ./src/builder-layout/control.js ***!
  \***************************************/
/*! exports provided: responsiveBuilderControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveBuilderControl", function() { return responsiveBuilderControl; });
/* harmony import */ var _builder_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./builder-component.js */ "./src/builder-layout/builder-component.js");

var responsiveBuilderControl = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_builder_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control,
      customizer: wp.customize
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/builder-layout/row-component.js":
/*!*********************************************!*\
  !*** ./src/builder-layout/row-component.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _single_row_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./single-row-component */ "./src/builder-layout/single-row-component.js");



var BuilderRowComponent = function BuilderRowComponent(props) {
  var besideItems = [];
  var mode = props.controlParams.group.indexOf('header') !== -1 ? 'header' : 'footer';
  var footerClass = null;
  if ('footer_items' === props.controlParams.group) {
    var columns = props.customizer('responsive_footer_' + props.row + '_columns').get();
    var layout = props.customizer('responsive_footer_' + props.row + '_layout').get();
    footerClass = 'footer-column-row footer-row-columns-' + columns + ' footer-row-layout-' + layout;
  }
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-builder-areas responsive-hfb-mode-".concat(mode, " ").concat(footerClass),
    "data-row": props.row
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Button"], {
    className: "responsive-row-actions",
    icon: "admin-generic",
    title: props.row.charAt(0).toUpperCase() + props.row.slice(1) + ' ' + mode,
    onClick: function onClick() {
      return props.focusPanel(mode + '_' + props.row + '_row');
    }
  }), /*#__PURE__*/React.createElement("div", {
    className: "responsive-builder-group responsive-builder-group-horizontal",
    "data-setting": props.row
  }, Object.keys(props.controlParams.zones[props.row]).map(function (zone, index) {
    if (props.row + '_left_center' === zone || props.row + '_right_center' === zone) {
      return null;
    }
    if ('header_desktop_items' === props.controlParams.group && props.row + '_left' === zone) {
      besideItems = props.items[props.row + '_left_center'];
    }
    if ('header_desktop_items' === props.controlParams.group && props.row + '_right' === zone) {
      besideItems = props.items[props.row + '_right_center'];
    }
    if ('footer_items' === props.controlParams.group) {
      if (columns < index + 1) {
        return;
      }
    }
    return /*#__PURE__*/React.createElement(_single_row_component__WEBPACK_IMPORTED_MODULE_2__["default"], {
      key: zone,
      zone: zone,
      row: props.row,
      controlParams: props.controlParams,
      settings: props.settings,
      choices: props.choices,
      centerItems: besideItems,
      items: props.items[zone],
      removeItem: function removeItem(remove, removeRow, removeZone) {
        return props.removeItem(remove, removeRow, removeZone);
      },
      focusItem: function focusItem(focus) {
        return props.focusItem(focus);
      },
      hideDrop: function hideDrop() {
        return props.hideDrop();
      },
      showDrop: function showDrop() {
        return props.showDrop();
      },
      onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
        return props.onUpdate(updateRow, updateZone, updateItems);
      },
      onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
        return props.onAddItem(updateRow, updateZone, updateItems);
      }
    });
  })));
};
/* harmony default export */ __webpack_exports__["default"] = (/*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["memo"])(BuilderRowComponent));

/***/ }),

/***/ "./src/builder-layout/single-block-component.js":
/*!******************************************************!*\
  !*** ./src/builder-layout/single-block-component.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var he__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! he */ "../../../../node_modules/he/he.js");
/* harmony import */ var he__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(he__WEBPACK_IMPORTED_MODULE_2__);



var BuilderSingleBlockComponent = function BuilderSingleBlockComponent(props) {
  var choices = props.choices;
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-hfb-builder-item",
    "data-id": props.item,
    "data-section": undefined !== choices[props.item] && undefined !== choices[props.item].section ? choices[props.item].section : '',
    key: props.item
  }, /*#__PURE__*/React.createElement("span", {
    className: "responsive-hfb-builder-item-text",
    onClick: function onClick() {
      props.focusItem(undefined !== choices[props.item] && undefined !== choices[props.item].section ? choices[props.item].section : '');
    }
  }, undefined !== choices[props.item] && undefined !== choices[props.item].name ? he__WEBPACK_IMPORTED_MODULE_2___default.a.decode(choices[props.item].name) : ''), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Button"], {
    className: "responsive-hfb-builder-item-icon",
    "aria-label": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Remove', 'responsive') + ' ' + (undefined !== choices[props.item] && undefined !== choices[props.item].name ? choices[props.item].name : ''),
    onClick: function onClick() {
      props.removeItem(props.item);
    }
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Dashicon"], {
    icon: "no-alt"
  })));
};
/* harmony default export */ __webpack_exports__["default"] = (BuilderSingleBlockComponent);

/***/ }),

/***/ "./src/builder-layout/single-row-component.js":
/*!****************************************************!*\
  !*** ./src/builder-layout/single-row-component.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add_block_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add-block-component */ "./src/builder-layout/add-block-component.js");
/* harmony import */ var _single_block_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./single-block-component */ "./src/builder-layout/single-block-component.js");
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.es.js");



var Fragment = wp.element.Fragment;
var BuilderSingleRowComponent = function BuilderSingleRowComponent(props) {
  var location = props.zone.replace(props.row + '_', '');
  var currentList = typeof props.items != "undefined" && props.items != null && props.items.length != null && props.items.length > 0 ? props.items : [];
  var theItems = [];
  {
    currentList.length > 0 && currentList.map(function (item) {
      theItems.push({
        id: item
      });
    });
  }
  ;
  var currentCenterList = typeof props.centerItems != "undefined" && props.centerItems != null && props.centerItems.length != null && props.centerItems.length > 0 ? props.centerItems : [];
  var theCenterItems = [];
  {
    currentCenterList.length > 0 && currentCenterList.map(function (item) {
      theCenterItems.push({
        id: item
      });
    });
  }
  ;
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-builder-area responsive-builder-area-".concat(location),
    "data-location": props.zone
  }, 'header_desktop_items' === props.controlParams.group && 'right' === location && /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(react_sortablejs__WEBPACK_IMPORTED_MODULE_2__["ReactSortable"], {
    animation: 100,
    onStart: function onStart() {
      return props.showDrop();
    },
    onEnd: function onEnd() {
      return props.hideDrop();
    },
    group: props.controlParams.group,
    className: "responsive-builder-drop responsive-hfb-builder-sortable-panel responsive-builder-drop-".concat(location, "_center"),
    list: theCenterItems,
    setList: function setList(newState) {
      return props.onUpdate(props.row, props.zone + '_center', newState);
    }
  }, currentCenterList.length > 0 && currentCenterList.map(function (item, index) {
    return /*#__PURE__*/React.createElement(_single_block_component__WEBPACK_IMPORTED_MODULE_1__["default"], {
      removeItem: function removeItem(remove) {
        return props.removeItem(remove, props.row, props.zone + '_center');
      },
      focusItem: function focusItem(focus) {
        return props.focusItem(focus);
      },
      key: item,
      index: index,
      item: item,
      controlParams: props.controlParams,
      choices: props.choices
    });
  })), /*#__PURE__*/React.createElement(_add_block_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
    row: props.row,
    list: theCenterItems,
    settings: props.settings,
    column: props.zone + '_center',
    setList: function setList(newState) {
      return props.onAddItem(props.row, props.zone + '_center', newState);
    },
    key: location,
    location: location + '_center',
    id: 'add-center-' + location,
    controlParams: props.controlParams,
    choices: props.choices
  })), /*#__PURE__*/React.createElement(react_sortablejs__WEBPACK_IMPORTED_MODULE_2__["ReactSortable"], {
    animation: 100,
    onStart: function onStart() {
      return props.showDrop();
    },
    onEnd: function onEnd() {
      return props.hideDrop();
    },
    group: props.controlParams.group,
    className: "responsive-builder-drop responsive-hfb-builder-sortable-panel responsive-builder-drop-".concat(location),
    list: theItems,
    setList: function setList(newState) {
      return props.onUpdate(props.row, props.zone, newState);
    }
  }, currentList.length > 0 && currentList.map(function (item, index) {
    return /*#__PURE__*/React.createElement(_single_block_component__WEBPACK_IMPORTED_MODULE_1__["default"], {
      removeItem: function removeItem(remove) {
        return props.removeItem(remove, props.row, props.zone);
      },
      focusItem: function focusItem(focus) {
        return props.focusItem(focus);
      },
      key: item,
      index: index,
      item: item,
      controlParams: props.controlParams,
      choices: props.choices
    });
  })), /*#__PURE__*/React.createElement(_add_block_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
    row: props.row,
    list: theItems,
    settings: props.settings,
    column: props.zone,
    setList: function setList(newState) {
      return props.onAddItem(props.row, props.zone, newState);
    },
    key: location,
    location: location,
    id: 'add-' + location,
    controlParams: props.controlParams,
    choices: props.choices
  }), 'header_desktop_items' === props.controlParams.group && 'left' === location && /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(react_sortablejs__WEBPACK_IMPORTED_MODULE_2__["ReactSortable"], {
    animation: 100,
    onStart: function onStart() {
      return props.showDrop();
    },
    onEnd: function onEnd() {
      return props.hideDrop();
    },
    group: props.controlParams.group,
    className: "responsive-builder-drop responsive-hfb-builder-sortable-panel responsive-builder-drop-".concat(location, "_center"),
    list: theCenterItems,
    setList: function setList(newState) {
      return props.onUpdate(props.row, props.zone + '_center', newState);
    }
  }, currentCenterList.length > 0 && currentCenterList.map(function (item, index) {
    return /*#__PURE__*/React.createElement(_single_block_component__WEBPACK_IMPORTED_MODULE_1__["default"], {
      removeItem: function removeItem(remove) {
        return props.removeItem(remove, props.row, props.zone + '_center');
      },
      focusItem: function focusItem(focus) {
        return props.focusItem(focus);
      },
      key: item,
      index: index,
      item: item,
      controlParams: props.controlParams,
      choices: props.choices
    });
  })), /*#__PURE__*/React.createElement(_add_block_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
    row: props.row,
    list: theCenterItems,
    settings: props.settings,
    column: props.zone + '_center',
    setList: function setList(newState) {
      return props.onAddItem(props.row, props.zone + '_center', newState);
    },
    key: location,
    location: location + '_center',
    id: 'add-center-' + location,
    controlParams: props.controlParams,
    choices: props.choices
  })));
};
/* harmony default export */ __webpack_exports__["default"] = (BuilderSingleRowComponent);

/***/ }),

/***/ "./src/builder-row-layout/control.js":
/*!*******************************************!*\
  !*** ./src/builder-row-layout/control.js ***!
  \*******************************************/
/*! exports provided: responsiveRowLayout */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveRowLayout", function() { return responsiveRowLayout; });
/* harmony import */ var _row_layout_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./row-layout-component.js */ "./src/builder-row-layout/row-layout-component.js");

var responsiveRowLayout = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_row_layout_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control,
      customizer: wp.customize
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/builder-row-layout/row-layout-component.js":
/*!********************************************************!*\
  !*** ./src/builder-row-layout/row-layout-component.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../icons */ "./src/icons.js");
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}




var RowLayout = function RowLayout(props) {
  var currentDeviceRef = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(currentDevice);
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(1),
    _useState2 = _slicedToArray(_useState, 2),
    columns = _useState2[0],
    setColumns = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])('desktop'),
    _useState4 = _slicedToArray(_useState3, 2),
    currentDevice = _useState4[0],
    setCurrentDevice = _useState4[1];
  var _useState5 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.settings),
    _useState6 = _slicedToArray(_useState5, 2),
    props_value = _useState6[0],
    setPropsValue = _useState6[1];
  var label = props.control.params.label;
  var labelHtml = null,
    layoutsHtml = null;
  var defaultParams = {
    desktop: {
      column6: {
        equal: {
          icon: 'sixcol'
        }
      },
      column5: {
        equal: {
          icon: 'fivecol'
        }
      },
      column4: {
        equal: {
          icon: 'fourcol'
        },
        'left-forty': {
          icon: 'lfourforty'
        },
        'right-forty': {
          icon: 'rfourforty'
        }
      },
      column3: {
        equal: {
          icon: 'threecol'
        },
        'left-half': {
          icon: 'lefthalf'
        },
        'right-half': {
          icon: 'righthalf'
        },
        'center-half': {
          icon: 'centerhalf'
        },
        'center-wide': {
          icon: 'widecenter'
        }
      },
      column2: {
        equal: {
          icon: 'twocol'
        },
        'left-heavy': {
          icon: 'twolheavy'
        },
        'right-heavy': {
          icon: 'tworheavy'
        }
      },
      column1: {
        full: {
          icon: 'full'
        }
      }
    },
    tablet: {
      column6: {
        equal: {
          icon: 'sixcol'
        },
        row: {
          icon: 'collapserowsix'
        }
      },
      column5: {
        equal: {
          icon: 'fivecol'
        },
        row: {
          icon: 'collapserowfive'
        }
      },
      column4: {
        equal: {
          icon: 'fourcol'
        },
        'two-grid': {
          icon: 'fourgrid'
        },
        row: {
          icon: 'collapserowfour'
        }
      },
      column3: {
        equal: {
          icon: 'threecol'
        },
        'left-half': {
          icon: 'lefthalf'
        },
        'right-half': {
          icon: 'righthalf'
        },
        'center-half': {
          icon: 'centerhalf'
        },
        'center-wide': {
          icon: 'widecenter'
        },
        'first-row': {
          icon: 'threefirstrow'
        },
        'last-row': {
          icon: 'threelastrow'
        },
        row: {
          icon: 'collapserowthree'
        }
      },
      column2: {
        equal: {
          icon: 'twocol'
        },
        'left-heavy': {
          icon: 'twolheavy'
        },
        'right-heavy': {
          icon: 'tworheavy'
        },
        row: {
          icon: 'collapserowtwo'
        }
      },
      column1: {
        full: {
          icon: 'full'
        }
      }
    },
    mobile: {
      column6: {
        equal: {
          icon: 'sixcol'
        },
        row: {
          icon: 'collapserowsix'
        }
      },
      column5: {
        equal: {
          icon: 'fivecol'
        },
        row: {
          icon: 'collapserowfive'
        }
      },
      column4: {
        equal: {
          icon: 'fourcol'
        },
        'two-grid': {
          icon: 'fourgrid'
        },
        row: {
          icon: 'collapserowfour'
        }
      },
      column3: {
        equal: {
          icon: 'threecol'
        },
        'left-half': {
          icon: 'lefthalf'
        },
        'right-half': {
          icon: 'righthalf'
        },
        'center-half': {
          icon: 'centerhalf'
        },
        'center-wide': {
          icon: 'widecenter'
        },
        'first-row': {
          icon: 'threefirstrow'
        },
        'last-row': {
          icon: 'threelastrow'
        },
        row: {
          icon: 'collapserowthree'
        }
      },
      column2: {
        equal: {
          icon: 'twocol'
        },
        'left-heavy': {
          icon: 'twolheavy'
        },
        'right-heavy': {
          icon: 'tworheavy'
        },
        row: {
          icon: 'collapserowtwo'
        }
      },
      column1: {
        full: {
          icon: 'full'
        }
      }
    }
  };
  var controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.control.params.input_attrs) : defaultParams;
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    currentDeviceRef.current = currentDevice;
  }, [currentDevice]);
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    if (!controlParams.footer) return;
    var containerSelector = "#customize-control-responsive_footer_".concat(controlParams.footer, "_layout");
    var buttons = document.querySelectorAll("".concat(containerSelector, " .responsive-switchers button"));
    if (!buttons.length) return; // Exit if no buttons are found.

    var handleDeviceSwitch = function handleDeviceSwitch(event) {
      var _devices$querySelecto, _control$querySelecto, _footerDevices$queryS, _footerDevices$queryS2;
      event.stopPropagation();
      var device = event.currentTarget.getAttribute("data-device");
      if (!device) return;
      setCurrentDevice(device);

      // Get required elements
      var devices = document.querySelector("".concat(containerSelector, " .responsive-switchers"));
      var control = event.currentTarget.closest(".customize-control.has-switchers");
      var body = document.querySelector(".wp-full-overlay");
      var footerDevices = document.querySelector(".wp-full-overlay-footer .devices");

      // Button class
      devices === null || devices === void 0 || devices.querySelectorAll("button").forEach(function (btn) {
        return btn.classList.remove("active");
      });
      devices === null || devices === void 0 || (_devices$querySelecto = devices.querySelector("button.preview-".concat(device))) === null || _devices$querySelecto === void 0 || _devices$querySelecto.classList.add("active");

      // Control class
      control === null || control === void 0 || control.querySelectorAll(".control-wrap").forEach(function (wrap) {
        return wrap.classList.remove("active");
      });
      control === null || control === void 0 || (_control$querySelecto = control.querySelector(".control-wrap.".concat(device))) === null || _control$querySelecto === void 0 || _control$querySelecto.classList.add("active");
      control === null || control === void 0 || control.classList.remove("control-device-desktop", "control-device-tablet", "control-device-mobile");
      control === null || control === void 0 || control.classList.add("control-device-".concat(device));

      // Wrapper class
      body === null || body === void 0 || body.classList.remove("preview-desktop", "preview-tablet", "preview-mobile");
      body === null || body === void 0 || body.classList.add("preview-".concat(device));

      // Panel footer buttons
      footerDevices === null || footerDevices === void 0 || footerDevices.querySelectorAll("button").forEach(function (btn) {
        btn.classList.remove("active");
        btn.setAttribute("aria-pressed", false);
      });
      footerDevices === null || footerDevices === void 0 || (_footerDevices$queryS = footerDevices.querySelector("button.preview-".concat(device))) === null || _footerDevices$queryS === void 0 || _footerDevices$queryS.classList.add("active");
      footerDevices === null || footerDevices === void 0 || (_footerDevices$queryS2 = footerDevices.querySelector("button.preview-".concat(device))) === null || _footerDevices$queryS2 === void 0 || _footerDevices$queryS2.setAttribute("aria-pressed", true);

      // Open switchers
      if (event.currentTarget.classList.contains("preview-desktop")) {
        control === null || control === void 0 || control.classList.toggle("responsive-switchers-open");
      }
    };

    // Attach event listeners
    buttons.forEach(function (btn) {
      return btn.addEventListener("click", handleDeviceSwitch);
    });
    var columnsKey = props.customizer("responsive_footer_".concat(controlParams.footer, "_columns"));
    var initialColumns = parseInt(columnsKey.get(), 10);
    setColumns(initialColumns);

    // Listen for changes to the columns setting
    columnsKey.bind(function (newColumns) {
      var layout = Number(newColumns) === 1 ? 'full' // Use 'full' layout if columns are 1.
      : currentDeviceRef.current === 'mobile' ? 'row' : 'equal';
      if (layout) {
        updateValues(currentDeviceRef.current, layout);
      }
      setColumns(parseInt(newColumns, 10));
    });

    // Cleanup event listeners on unmount.
    return function () {
      buttons.forEach(function (btn) {
        return btn.removeEventListener("click", handleDeviceSwitch);
      });
    };
  }, [props.customizer, controlParams.footer]);
  var updateValues = function updateValues(device, newValue) {
    if (undefined !== controlParams.footer && controlParams.footer) {
      var event = new CustomEvent('responsiveUpdateFooterColumns', {
        detail: {
          trigger: controlParams.rspv_event,
          item: controlParams.footer
        }
      });
      document.dispatchEvent(event);
    }
    var updateValue = _objectSpread({}, props_value);
    updateValue["".concat(device)].set(newValue);
    setPropsValue(updateValue);
  };
  if (label) {
    labelHtml = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, /*#__PURE__*/React.createElement("span", null, label), /*#__PURE__*/React.createElement("ul", {
      className: "responsive-switchers"
    }, /*#__PURE__*/React.createElement("li", {
      className: "desktop"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-desktop active",
      "data-device": "desktop"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-desktop"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "tablet"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-tablet",
      "data-device": "tablet"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-tablet"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "mobile"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-mobile",
      "data-device": "mobile"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-smartphone"
    })))));
  }
  var renderLayoutsHTML = function renderLayoutsHTML(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var iconsMap = controlParams[device]["column".concat(columns)] || {};
    return /*#__PURE__*/React.createElement("div", {
      className: "".concat(device, " control-wrap ").concat(active)
    }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ButtonGroup"], {
      className: "responsive-radio-container-control"
    }, Object.keys(iconsMap).map(function (item) {
      return /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
        key: item,
        isTertiary: true,
        className: "responsive-btn-item-".concat(item, " ").concat(item === props_value["".concat(device)].get() ? 'active-radio' : ''),
        onClick: function onClick() {
          return updateValues(device, item);
        }
      }, iconsMap[item].icon && /*#__PURE__*/React.createElement("span", {
        className: "responsive-radio-icon"
      }, _icons__WEBPACK_IMPORTED_MODULE_3__["default"][iconsMap[item].icon]));
    })));
  };
  layoutsHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderLayoutsHTML('desktop', 'active'), renderLayoutsHTML('tablet'), renderLayoutsHTML('mobile'));
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-row-layout-wrapper"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-row-layout-control-label"
  }, labelHtml), layoutsHtml);
};
RowLayout.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RowLayout));

/***/ }),

/***/ "./src/checkbox/checkbox-component.js":
/*!********************************************!*\
  !*** ./src/checkbox/checkbox-component.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}


var CheckboxComponent = function CheckboxComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
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
    htmlLabel = /*#__PURE__*/React.createElement("label", {
      htmlFor: id
    }, label);
  }
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("span", {
    className: "customize-inside-control-row checkbox-with-react"
  }, /*#__PURE__*/React.createElement("input", {
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
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
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
/* harmony import */ var _checkbox_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./checkbox-component.js */ "./src/checkbox/checkbox-component.js");

var responsiveCheckbox = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_checkbox_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/color-with-devices/color-component.js":
/*!***************************************************!*\
  !*** ./src/color-with-devices/color-component.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _color_picker_control__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./color-picker-control */ "./src/color-with-devices/color-picker-control.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var ColorComponentWithDevices = function ColorComponentWithDevices(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(props.control.settings),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var updateColors = function updateColors(device, value) {
    var updateColor = _objectSpread({}, props_value);
    updateColor["".concat(device)].set(value);
    setPropsValue(updateColor);
  };
  var handleChangeComplete = function handleChangeComplete(device, color) {
    var value;
    if (typeof color === 'string' || color instanceof String) {
      value = color;
    } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
      value = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
    } else {
      value = color.hex;
    }
    updateColors(device, value);
  };
  var labelHtml = null,
    inputHtml = null,
    htmlDescription = null;
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    description = _props$control$params.description;
  if (label) {
    labelHtml = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, /*#__PURE__*/React.createElement("span", null, label), /*#__PURE__*/React.createElement("ul", {
      className: "responsive-switchers"
    }, /*#__PURE__*/React.createElement("li", {
      className: "desktop"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-desktop active",
      "data-device": "desktop"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-desktop"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "tablet"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-tablet",
      "data-device": "tablet"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-tablet"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "mobile"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-mobile",
      "data-device": "mobile"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-smartphone"
    })))));
  }
  if (description) {
    htmlDescription = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  var renderColorPicker = function renderColorPicker(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    return /*#__PURE__*/React.createElement("div", {
      className: "".concat(device, " control-wrap ").concat(active)
    }, /*#__PURE__*/React.createElement(_color_picker_control__WEBPACK_IMPORTED_MODULE_1__["default"], {
      color: undefined !== props_value["".concat(device)].get() && props_value["".concat(device)].get() ? props_value["".concat(device)].get() : '',
      onChangeComplete: function onChangeComplete(color) {
        return handleChangeComplete(device, color);
      },
      backgroundType: 'color',
      inputattr: props.control.params,
      defaultValue: props.control.params["".concat(device)]["default"]
    }));
  };
  inputHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderColorPicker('desktop', 'active'), renderColorPicker('tablet'), renderColorPicker('mobile'));
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("label", {
    className: "responsive-color-control-main-wrap"
  }, labelHtml, inputHtml), htmlDescription);
};
ColorComponentWithDevices.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ColorComponentWithDevices));

/***/ }),

/***/ "./src/color-with-devices/color-picker-control.js":
/*!********************************************************!*\
  !*** ./src/color-with-devices/color-picker-control.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _classCallCheck(a, n) {
  if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function");
}
function _defineProperties(e, r) {
  for (var t = 0; t < r.length; t++) {
    var o = r[t];
    o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o);
  }
}
function _createClass(e, r, t) {
  return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", {
    writable: !1
  }), e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _callSuper(t, o, e) {
  return o = _getPrototypeOf(o), _possibleConstructorReturn(t, _isNativeReflectConstruct() ? Reflect.construct(o, e || [], _getPrototypeOf(t).constructor) : o.apply(t, e));
}
function _possibleConstructorReturn(t, e) {
  if (e && ("object" == _typeof(e) || "function" == typeof e)) return e;
  if (void 0 !== e) throw new TypeError("Derived constructors may only return object or undefined");
  return _assertThisInitialized(t);
}
function _assertThisInitialized(e) {
  if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  return e;
}
function _isNativeReflectConstruct() {
  try {
    var t = !Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {}));
  } catch (t) {}
  return (_isNativeReflectConstruct = function _isNativeReflectConstruct() {
    return !!t;
  })();
}
function _getPrototypeOf(t) {
  return _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function (t) {
    return t.__proto__ || Object.getPrototypeOf(t);
  }, _getPrototypeOf(t);
}
function _inherits(t, e) {
  if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function");
  t.prototype = Object.create(e && e.prototype, {
    constructor: {
      value: t,
      writable: !0,
      configurable: !0
    }
  }), Object.defineProperty(t, "prototype", {
    writable: !1
  }), e && _setPrototypeOf(t, e);
}
function _setPrototypeOf(t, e) {
  return _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function (t, e) {
    return t.__proto__ = e, t;
  }, _setPrototypeOf(t, e);
}




var ColorPickerControlWithDevices = /*#__PURE__*/function (_Component) {
  function ColorPickerControlWithDevices(props) {
    var _this;
    _classCallCheck(this, ColorPickerControlWithDevices);
    _this = _callSuper(this, ColorPickerControlWithDevices, arguments);
    _this.onChangeComplete = _this.onChangeComplete.bind(_this);
    _this.onPaletteChangeComplete = _this.onPaletteChangeComplete.bind(_this);
    _this.open = _this.open.bind(_this);
    _this.onColorClearClick = _this.onColorClearClick.bind(_this);
    _this.state = {
      isVisible: false,
      refresh: false,
      color: _this.props.color,
      modalCanClose: true,
      backgroundType: _this.props.backgroundType,
      inputattr: _this.props.inputattr,
      defaultValue: _this.props.defaultValue,
      opacityZero: _this.extractOpacity(_this.props.color) === 0
    };
    return _this;
  }
  _inherits(ColorPickerControlWithDevices, _Component);
  return _createClass(ColorPickerControlWithDevices, [{
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
    key: "extractOpacity",
    value: function extractOpacity(colorStr) {
      if (!colorStr) return 1;
      if (colorStr === 'transparent') {
        return 0;
      }

      // Match rgba(r, g, b, a)
      var rgbaMatch = colorStr.match(/rgba\(\s*\d+,\s*\d+,\s*\d+,\s*(\d*\.?\d+)\s*\)/);
      if (rgbaMatch) {
        return parseFloat(rgbaMatch[1]);
      }
      return 1;
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
        var currentElementID = _this2.state.inputattr.content.match(/id="([^"]*)"/)[1];
        document.getElementById(currentElementID).style.paddingBottom = '480px';
      };
      var toggleClose = function toggleClose() {
        if (modalCanClose) {
          if (isVisible === true) {
            _this2.setState({
              isVisible: false
            });
          }
          var currentElementID = _this2.state.inputattr.content.match(/id="([^"]*)"/)[1];
          document.getElementById(currentElementID).style.paddingBottom = '0';
        }
      };
      var finalpaletteColors = [];
      var count = 0;
      var defaultpalette = this.state.inputattr.colorPalettes;
      var defaultColorPalette = _toConsumableArray(defaultpalette);
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
      var defaultValue = this.state.defaultValue;
      var htmlLink = null;
      var inputattr = this.state.inputattr;
      htmlLink = inputattr.link;
      if (undefined !== htmlLink) {
        var splited_values = htmlLink.split("=");
        if (undefined !== splited_values[1]) {
          htmlLink = splited_values[1].replace(/"/g, "");
        }
      }
      return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
        className: "wp-picker-container"
      }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        className: isVisible ? 'button wp-color-result wp-picker-open' : 'button wp-color-result ',
        onClick: function onClick() {
          isVisible ? toggleClose() : toggleVisible();
        },
        "aria-expanded": "false",
        style: {
          backgroundColor: this.props.color
        }
      }), /*#__PURE__*/React.createElement("div", {
        className: "wp-picker-holder"
      }, isVisible && /*#__PURE__*/React.createElement(React.Fragment, null, refresh && /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
        color: this.props.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color);
        }
      })), !refresh && /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
        color: this.props.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color);
        }
      })), this.state.opacityZero && /*#__PURE__*/React.createElement("div", {
        className: "responsive-color-picker-zero-opac"
      }, /*#__PURE__*/React.createElement("strong", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Note: ', 'responsive')), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Opacity is set to zero. Increase it to make the color visible.', 'responsive')), /*#__PURE__*/React.createElement("button", {
        type: "button",
        onClick: function onClick() {
          _this2.onColorClearClick(defaultValue);
        },
        className: "responsive-clear-btn-inside-picker components-button components-circular-option-picker__clear is-secondary is-small"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Default', 'responsive'))))));
    }
  }, {
    key: "onColorClearClick",
    value: function onColorClearClick(color) {
      if (color === 'transparent') {
        this.setState({
          opacityZero: true
        });
      }
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
      if (color.rgb && color.rgb.a !== undefined) {
        if (color.rgb.a === 0) {
          // Show a notice when opacity is 0
          this.setState({
            opacityZero: true
          });
        } else {
          this.setState({
            opacityZero: false
          });
        }
        if (color.rgb.a !== 1) {
          newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
        } else {
          newColor = color.hex;
        }
      } else {
        this.setState({
          opacityZero: false
        });
        newColor = color.hex;
      }
      this.setState({
        backgroundType: 'color'
      });
      this.props.onChangeComplete(newColor, 'color');
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
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Component"]);
ColorPickerControlWithDevices.propTypes = {
  color: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.string,
  usePalette: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.bool,
  palette: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.string,
  presetColors: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object,
  onChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  onPaletteChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  onChange: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object
};
/* harmony default export */ __webpack_exports__["default"] = (ColorPickerControlWithDevices);

/***/ }),

/***/ "./src/color-with-devices/control.js":
/*!*******************************************!*\
  !*** ./src/color-with-devices/control.js ***!
  \*******************************************/
/*! exports provided: responsiveColorWithDevices */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveColorWithDevices", function() { return responsiveColorWithDevices; });
/* harmony import */ var _color_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./color-component */ "./src/color-with-devices/color-component.js");

var responsiveColorWithDevices = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_color_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
      jQuery('.components-color-picker').on('click', function (event) {
        event.preventDefault();
      });
      // If the target of the click isn't the container nor a descendant of the container.
      if (!colorWrap.is(e.target) && colorWrap.has(e.target).length === 0) {
        container.find('button.wp-color-result.wp-picker-open').click();
      }
    });
    control.container.on('click', '.responsive-switchers button', function (event) {
      event.stopPropagation();

      // Set up variables
      var $this = jQuery(this),
        $devices = jQuery('.responsive-switchers'),
        $device = jQuery(event.currentTarget).data('device'),
        $control = jQuery('.customize-control.has-switchers'),
        $body = jQuery('.wp-full-overlay'),
        $footer_devices = jQuery('.wp-full-overlay-footer .devices');

      // Button class
      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active');

      // Control class
      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

      // Wrapper class
      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device);

      // Panel footer buttons
      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true);

      // Open switchers
      if ($this.hasClass('preview-desktop')) {
        $control.toggleClass('responsive-switchers-open');
      }
    });
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _responsive_color_picker_control__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./responsive-color-picker-control */ "./src/color/responsive-color-picker-control.js");
/* harmony import */ var _responsive_color_picker_with_hover_contorl__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./responsive-color-picker-with-hover-contorl */ "./src/color/responsive-color-picker-with-hover-contorl.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}




var ColorComponent = function ColorComponent(props) {
  var _props$control$settin, _props$control$settin2;
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    description = _props$control$params.description,
    is_hover_required = _props$control$params.is_hover_required,
    value = _props$control$params.value,
    is_gradient_available = _props$control$params.is_gradient_available;
  var colorType = ((_props$control$settin = props.control.settings) === null || _props$control$settin === void 0 || (_props$control$settin = _props$control$settin.color_type) === null || _props$control$settin === void 0 ? void 0 : _props$control$settin.get()) || 'color';
  var currentGradientValue = ((_props$control$settin2 = props.control.settings) === null || _props$control$settin2 === void 0 || (_props$control$settin2 = _props$control$settin2.gradient) === null || _props$control$settin2 === void 0 ? void 0 : _props$control$settin2.get()) || props.control.params.gradient_default;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])({
      value: value
    }),
    _useState2 = _slicedToArray(_useState, 2),
    state = _useState2[0],
    setState = _useState2[1];
  var updateValues = function updateValues(value) {
    var _props$control$settin3;
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: value
      });
    });
    if (is_hover_required) {
      props.control.settings['normal'].set(value.normal);
      props.control.settings['hover'].set(value.hover);
    } else if (is_gradient_available && (_props$control$settin3 = props.control.settings) !== null && _props$control$settin3 !== void 0 && _props$control$settin3["default"]) {
      var _props$control, _props$control2;
      (_props$control = props.control) === null || _props$control === void 0 || (_props$control = _props$control.settings) === null || _props$control === void 0 || (_props$control = _props$control["default"]) === null || _props$control === void 0 || _props$control.set(value);
      (_props$control2 = props.control) === null || _props$control2 === void 0 || (_props$control2 = _props$control2.settings) === null || _props$control2 === void 0 || (_props$control2 = _props$control2.color_type) === null || _props$control2 === void 0 || _props$control2.set('color');
    } else {
      props.control.setting.set(value);
    }
  };
  var handleChangeComplete = function handleChangeComplete(color) {
    var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'color';
    var colorValue;
    if (type === 'gradient') {
      colorValue = color;
    } else if (typeof color === 'string' || color instanceof String) {
      colorValue = color;
    } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
      colorValue = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
    } else {
      colorValue = color.hex;
    }
    if (is_gradient_available && type === 'gradient') {
      var _props$control3, _props$control4;
      (_props$control3 = props.control) === null || _props$control3 === void 0 || (_props$control3 = _props$control3.settings) === null || _props$control3 === void 0 || _props$control3.gradient.set(colorValue);
      (_props$control4 = props.control) === null || _props$control4 === void 0 || (_props$control4 = _props$control4.settings) === null || _props$control4 === void 0 || _props$control4.color_type.set('gradient');
      // Update local state to reflect the change for potential re-renders or prop updates
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          value: colorValue // If gradient, set the value to the gradient string
        });
      });
      return;
    }
    var updatedValue = _objectSpread({}, state.value);
    if (type === 'normal') {
      updatedValue.normal = colorValue;
    } else if (type === 'hover') {
      updatedValue.hover = colorValue;
    }
    if (is_hover_required) {
      updateValues(updatedValue);
    } else {
      updateValues(colorValue);
    }
  };
  var labelHtml = null;
  var htmlDescription = null;
  if (label) {
    labelHtml = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    htmlDescription = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("label", {
    className: "responsive-color-control-main-wrap"
  }, labelHtml, /*#__PURE__*/React.createElement("div", null, is_hover_required && /*#__PURE__*/React.createElement(_responsive_color_picker_with_hover_contorl__WEBPACK_IMPORTED_MODULE_2__["default"], {
    color: undefined !== state.value.normal && state.value.normal ? state.value.normal : '',
    hover_color: undefined !== state.value.hover && state.value.hover ? state.value.hover : '',
    onChangeComplete: function onChangeComplete(color, type) {
      return handleChangeComplete(color, type);
    },
    backgroundType: 'color',
    inputattr: props.control.params
  }), !is_hover_required && /*#__PURE__*/React.createElement(_responsive_color_picker_control__WEBPACK_IMPORTED_MODULE_1__["default"], {
    color: undefined !== state.value && state.value ? state.value : '',
    onChangeComplete: function onChangeComplete(color, type) {
      return handleChangeComplete(color, type);
    },
    backgroundType: 'color',
    inputattr: props.control.params,
    inputSettings: props.control.settings,
    is_gradient_available: is_gradient_available ? is_gradient_available : false,
    colorType: colorType,
    gradient: currentGradientValue
  }))), htmlDescription);
};
ColorComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
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
/* harmony import */ var _color_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./color-component */ "./src/color/color-component.js");

var responsiveColor = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_color_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
      jQuery('.components-color-picker').on('click', function (event) {
        event.preventDefault(); // Keep if this prevents other unwanted actions
      });
      jQuery('.responsive-color-picker-tab-content').on('click', function (event) {
        event.preventDefault();
      });
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _classCallCheck(a, n) {
  if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function");
}
function _defineProperties(e, r) {
  for (var t = 0; t < r.length; t++) {
    var o = r[t];
    o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o);
  }
}
function _createClass(e, r, t) {
  return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", {
    writable: !1
  }), e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _callSuper(t, o, e) {
  return o = _getPrototypeOf(o), _possibleConstructorReturn(t, _isNativeReflectConstruct() ? Reflect.construct(o, e || [], _getPrototypeOf(t).constructor) : o.apply(t, e));
}
function _possibleConstructorReturn(t, e) {
  if (e && ("object" == _typeof(e) || "function" == typeof e)) return e;
  if (void 0 !== e) throw new TypeError("Derived constructors may only return object or undefined");
  return _assertThisInitialized(t);
}
function _assertThisInitialized(e) {
  if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  return e;
}
function _isNativeReflectConstruct() {
  try {
    var t = !Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {}));
  } catch (t) {}
  return (_isNativeReflectConstruct = function _isNativeReflectConstruct() {
    return !!t;
  })();
}
function _getPrototypeOf(t) {
  return _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function (t) {
    return t.__proto__ || Object.getPrototypeOf(t);
  }, _getPrototypeOf(t);
}
function _inherits(t, e) {
  if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function");
  t.prototype = Object.create(e && e.prototype, {
    constructor: {
      value: t,
      writable: !0,
      configurable: !0
    }
  }), Object.defineProperty(t, "prototype", {
    writable: !1
  }), e && _setPrototypeOf(t, e);
}
function _setPrototypeOf(t, e) {
  return _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function (t, e) {
    return t.__proto__ = e, t;
  }, _setPrototypeOf(t, e);
}




var ResponsiveColorPickerControl = /*#__PURE__*/function (_Component) {
  function ResponsiveColorPickerControl(props) {
    var _this;
    _classCallCheck(this, ResponsiveColorPickerControl);
    _this = _callSuper(this, ResponsiveColorPickerControl, arguments);
    _this.onChangeComplete = _this.onChangeComplete.bind(_this);
    _this.onPaletteChangeComplete = _this.onPaletteChangeComplete.bind(_this);
    _this.open = _this.open.bind(_this);
    _this.onColorClearClick = _this.onColorClearClick.bind(_this);
    _this.state = {
      isVisible: false,
      refresh: false,
      // color: this.props.color,
      // Initialize color from props, handling potential object or string
      color: _this.determineInitialColor(props.color),
      modalCanClose: true,
      backgroundType: _this.props.backgroundType,
      inputattr: _this.props.inputattr,
      opacityZero: _this.extractOpacity(_this.props.color) === 0,
      inputSettings: _this.props.inputSettings || {},
      is_gradient_available: _this.props.is_gradient_available || false,
      activeTab: props.colorType || 'color',
      gradient: _this.props.gradient ? _this.props.gradient : 'linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(0,0,0,1) 100%)'
    };
    return _this;
  }

  // Helper for constructor to ensure color is a string for internal state
  _inherits(ResponsiveColorPickerControl, _Component);
  return _createClass(ResponsiveColorPickerControl, [{
    key: "determineInitialColor",
    value: function determineInitialColor(colorProp) {
      if (_typeof(colorProp) === 'object' && colorProp !== null && colorProp !== void 0 && colorProp.hex) {
        return colorProp.hex;
      }
      return colorProp || ''; // Ensure it's a string
    }
  }, {
    key: "extractOpacity",
    value: function extractOpacity(colorStr) {
      if (!colorStr) return 1;
      if (typeof color === 'string') {
        if (color === 'transparent') return 0;
        var rgbaMatch = color.match(/rgba\(\s*\d+,\s*\d+,\s*\d+,\s*(\d*\.?\d+)\s*\)/);
        return rgbaMatch ? parseFloat(rgbaMatch[1]) : 1;
      }

      // If color is an object
      if ((typeof color === "undefined" ? "undefined" : _typeof(color)) === 'object' && color.rgb && typeof color.rgb.a !== 'undefined') {
        return color.rgb.a;
      }
      return 1;
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps, prevState) {
      var _this$props = this.props,
        inputattr = _this$props.inputattr,
        is_gradient_available = _this$props.is_gradient_available;
      var activeTab = this.state.activeTab;
      if (prevProps.inputattr !== inputattr || prevProps.is_gradient_available !== is_gradient_available || prevState.activeTab !== activeTab) {
        var currentElementID = inputattr.content.match(/id="([^"]*)"/)[1];
        if (!currentElementID) return;
        var parentEl = document.getElementById(currentElementID);
        var pickerHolder = parentEl.querySelector('.wp-picker-holder');
        var pickerHeight = pickerHolder.offsetHeight;
        document.getElementById(currentElementID).style.paddingBottom = "".concat(pickerHeight + 20, "px");
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;
      var _this$state = this.state,
        refresh = _this$state.refresh,
        modalCanClose = _this$state.modalCanClose,
        isVisible = _this$state.isVisible,
        inputattr = _this$state.inputattr,
        gradient = _this$state.gradient,
        is_gradient_available = _this$state.is_gradient_available,
        activeTab = _this$state.activeTab,
        color = _this$state.color;

      // Determine the background style based on activeTab
      var buttonBackgroundStyle = activeTab === 'gradient' && is_gradient_available ? {
        background: gradient
      } // Apply gradient string
      : {
        backgroundColor: color
      }; // Apply solid color from state.color

      var toggleVisible = function toggleVisible() {
        var desiredTab = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : _this2.state.activeTab;
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
        var currentElementID = inputattr.content.match(/id="([^"]*)"/)[1];
        var parentEl = document.getElementById(currentElementID);
        var pickerHolder = parentEl.querySelector('.wp-picker-holder');
        var pickerHeight = pickerHolder.offsetHeight;
        document.getElementById(currentElementID).style.paddingBottom = "".concat(pickerHeight + 20, "px");
      };
      var toggleClose = function toggleClose() {
        if (modalCanClose) {
          if (isVisible === true) {
            _this2.setState({
              isVisible: false
            });
          }
          var currentElementID = inputattr.content.match(/id="([^"]*)"/)[1];
          document.getElementById(currentElementID).style.paddingBottom = '0';
        }
      };
      var finalpaletteColors = [];
      var count = 0;
      var defaultpalette = inputattr.colorPalettes;
      var defaultColorPalette = _toConsumableArray(defaultpalette);
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
      var defaultValue = inputattr["default"];
      var htmlLink = null;
      htmlLink = inputattr.link;
      if (undefined !== htmlLink) {
        var splited_values = htmlLink.split("=");
        if (undefined !== splited_values[1]) {
          htmlLink = splited_values[1].replace(/"/g, "");
        }
      }
      return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
        className: "wp-picker-container"
      }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        className: isVisible ? 'button wp-color-result wp-picker-open' : 'button wp-color-result ',
        onClick: function onClick() {
          isVisible ? toggleClose() : toggleVisible(_this2.state.activeTab);
        },
        "aria-expanded": "false",
        style: buttonBackgroundStyle
      }), /*#__PURE__*/React.createElement("div", {
        className: "wp-picker-holder"
      }, isVisible && is_gradient_available ? /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TabPanel"], {
        className: "responsive-color-picker-tabs",
        activeClass: "is-active",
        initialTabName: activeTab,
        onSelect: function onSelect(tabName) {
          _this2.setState({
            activeTab: tabName
          }, function () {
            toggleVisible(tabName);
          });
        },
        tabs: [{
          name: 'color',
          title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Color', 'responsive'),
          className: 'color-tab'
        }, {
          name: 'gradient',
          title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Gradient', 'responsive'),
          className: 'gradient-tab'
        }]
      }, function (tab) {
        return /*#__PURE__*/React.createElement("div", {
          className: "responsive-color-picker-tab-content"
        }, tab.name === 'color' && /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
          color: color,
          onChangeComplete: function onChangeComplete(currentColor) {
            _this2.setState({
              color: currentColor
            });
            _this2.onChangeComplete(currentColor, 'color');
          }
        }), tab.name === 'gradient' && /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["GradientPicker"], {
          value: gradient,
          onChange: function onChange(currentGradient) {
            if (currentGradient === undefined) {
              _this2.setState({
                gradient: ''
              });
              _this2.onChangeComplete('', 'gradient');
            } else {
              _this2.setState({
                gradient: currentGradient
              });
              _this2.onChangeComplete(currentGradient, 'gradient');
            }
          },
          clearable: false
        }));
      }), this.state.opacityZero && /*#__PURE__*/React.createElement("div", {
        className: "responsive-color-picker-zero-opac"
      }, /*#__PURE__*/React.createElement("strong", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Note: ', 'responsive')), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Opacity is set to zero. Increase it to make the color visible.', 'responsive')), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        type: "button",
        onClick: function onClick() {
          return _this2.onColorClearClick(defaultValue, activeTab);
        },
        className: "responsive-clear-btn-inside-picker components-button is-secondary is-small"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Default', 'responsive'))) : isVisible && !is_gradient_available ? /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
        color: this.props.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color, 'color');
        }
      }), this.state.opacityZero && /*#__PURE__*/React.createElement("div", {
        className: "responsive-color-picker-zero-opac"
      }, /*#__PURE__*/React.createElement("strong", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Note: ', 'responsive')), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Opacity is set to zero. Increase it to make the color visible.', 'responsive')), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        type: "button",
        onClick: function onClick() {
          return _this2.onColorClearClick(defaultValue);
        },
        className: "responsive-clear-btn-inside-picker components-button is-secondary is-small"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Default', 'responsive'))) : /*#__PURE__*/React.createElement(React.Fragment, null))));
    }
  }, {
    key: "onColorClearClick",
    value: function onColorClearClick(color) {
      var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'color';
      if (color === 'transparent') {
        this.setState({
          opacityZero: true
        });
      }
      this.props.onChangeComplete(color, type);
      wp.customize.previewer.refresh();
    }
  }, {
    key: "onChangeComplete",
    value: function onChangeComplete(color) {
      var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'color';
      var newColor;
      if (color.rgb && color.rgb.a !== undefined) {
        if (color.rgb.a === 0) {
          // Show a notice when opacity is 0
          this.setState({
            opacityZero: true
          });
        } else {
          this.setState({
            opacityZero: false
          });
        }
        if (color.rgb.a !== 1) {
          newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
        } else {
          newColor = color.hex;
        }
      } else {
        this.setState({
          opacityZero: false
        });
        newColor = color.hex;
      }
      this.setState({
        backgroundType: 'color'
      });
      this.props.onChangeComplete(color, type);
    }
  }, {
    key: "onPaletteChangeComplete",
    value: function onPaletteChangeComplete(color) {
      this.setState({
        color: color
      });
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
  }], [{
    key: "getDerivedStateFromProps",
    value: function getDerivedStateFromProps(nextProps, prevState) {
      var newState = null;

      // Sync activeTab if prop changes
      if (nextProps.colorType !== prevState.activeTab) {
        newState = _objectSpread(_objectSpread({}, newState), {}, {
          activeTab: nextProps.colorType
        });
      }

      // Sync gradient if prop changes
      if (nextProps.gradient !== prevState.gradient) {
        newState = _objectSpread(_objectSpread({}, newState), {}, {
          gradient: nextProps.gradient
        });
      }
      var nextColorValue = nextProps.color;
      var derivedColorString = prevState.color; // Keep current color by default

      if (typeof nextColorValue === 'string' && !nextColorValue.startsWith('linear-gradient(') && nextColorValue !== prevState.color) {
        derivedColorString = nextColorValue;
      } else if (_typeof(nextColorValue) === 'object' && nextColorValue !== null && nextColorValue !== void 0 && nextColorValue.hex && nextColorValue.hex !== prevState.color) {
        derivedColorString = nextColorValue.hex;
      }
      if (derivedColorString !== prevState.color) {
        newState = _objectSpread(_objectSpread({}, newState), {}, {
          color: derivedColorString
        });
      }
      var newOpacityZero = ResponsiveColorPickerControl.prototype.extractOpacity(derivedColorString) === 0;
      if (newOpacityZero !== prevState.opacityZero) {
        newState = _objectSpread(_objectSpread({}, newState), {}, {
          opacityZero: newOpacityZero
        });
      }
      return newState; // Return the new state object or null
    }
  }]);
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Component"]);
ResponsiveColorPickerControl.propTypes = {
  color: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.string,
  usePalette: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.bool,
  palette: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.string,
  presetColors: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object,
  onChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  onPaletteChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  onChange: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object,
  colorType: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.string
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveColorPickerControl);

/***/ }),

/***/ "./src/color/responsive-color-picker-with-hover-contorl.js":
/*!*****************************************************************!*\
  !*** ./src/color/responsive-color-picker-with-hover-contorl.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _classCallCheck(a, n) {
  if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function");
}
function _defineProperties(e, r) {
  for (var t = 0; t < r.length; t++) {
    var o = r[t];
    o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o);
  }
}
function _createClass(e, r, t) {
  return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", {
    writable: !1
  }), e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _callSuper(t, o, e) {
  return o = _getPrototypeOf(o), _possibleConstructorReturn(t, _isNativeReflectConstruct() ? Reflect.construct(o, e || [], _getPrototypeOf(t).constructor) : o.apply(t, e));
}
function _possibleConstructorReturn(t, e) {
  if (e && ("object" == _typeof(e) || "function" == typeof e)) return e;
  if (void 0 !== e) throw new TypeError("Derived constructors may only return object or undefined");
  return _assertThisInitialized(t);
}
function _assertThisInitialized(e) {
  if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  return e;
}
function _isNativeReflectConstruct() {
  try {
    var t = !Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {}));
  } catch (t) {}
  return (_isNativeReflectConstruct = function _isNativeReflectConstruct() {
    return !!t;
  })();
}
function _getPrototypeOf(t) {
  return _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function (t) {
    return t.__proto__ || Object.getPrototypeOf(t);
  }, _getPrototypeOf(t);
}
function _inherits(t, e) {
  if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function");
  t.prototype = Object.create(e && e.prototype, {
    constructor: {
      value: t,
      writable: !0,
      configurable: !0
    }
  }), Object.defineProperty(t, "prototype", {
    writable: !1
  }), e && _setPrototypeOf(t, e);
}
function _setPrototypeOf(t, e) {
  return _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function (t, e) {
    return t.__proto__ = e, t;
  }, _setPrototypeOf(t, e);
}




var ResponsiveColorPickerWithHoverControl = /*#__PURE__*/function (_Component) {
  function ResponsiveColorPickerWithHoverControl(props) {
    var _this;
    _classCallCheck(this, ResponsiveColorPickerWithHoverControl);
    _this = _callSuper(this, ResponsiveColorPickerWithHoverControl, arguments);
    _this.onChangeComplete = _this.onChangeComplete.bind(_this);
    _this.onPaletteChangeComplete = _this.onPaletteChangeComplete.bind(_this);
    _this.open = _this.open.bind(_this);
    _this.onColorClearClick = _this.onColorClearClick.bind(_this);
    _this.state = {
      isNormalVisible: false,
      isHoverVisible: false,
      refresh: false,
      color: _this.props.color,
      hover_color: _this.props.hover_color,
      modalCanClose: true,
      backgroundType: _this.props.backgroundType,
      inputattr: _this.props.inputattr,
      normalOpacityZero: _this.extractOpacity(_this.props.color) === 0,
      hoverOpacityZero: _this.extractOpacity(_this.props.hover_color) === 0
    };
    return _this;
  }
  _inherits(ResponsiveColorPickerWithHoverControl, _Component);
  return _createClass(ResponsiveColorPickerWithHoverControl, [{
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
    key: "extractOpacity",
    value: function extractOpacity(colorStr) {
      if (!colorStr) return 1;
      if (colorStr === 'transparent') {
        return 0;
      }

      // Match rgba(r, g, b, a)
      var rgbaMatch = colorStr.match(/rgba\(\s*\d+,\s*\d+,\s*\d+,\s*(\d*\.?\d+)\s*\)/);
      if (rgbaMatch) {
        return parseFloat(rgbaMatch[1]);
      }
      return 1;
    }
  }, {
    key: "toggleNormalVisible",
    value: function toggleNormalVisible() {
      this.setState(function (prevState) {
        return {
          isNormalVisible: !prevState.isNormalVisible,
          isHoverVisible: false
        };
      });
      var currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
      if (!this.state.isNormalVisible) {
        document.getElementById(currentElementID).style.paddingBottom = '480px';
      } else {
        document.getElementById(currentElementID).style.paddingBottom = '0';
      }
    }
  }, {
    key: "toggleHoverVisible",
    value: function toggleHoverVisible() {
      this.setState(function (prevState) {
        return {
          isHoverVisible: !prevState.isHoverVisible,
          isNormalVisible: false
        };
      });
      var currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
      if (!this.state.isHoverVisible) {
        document.getElementById(currentElementID).style.paddingBottom = '480px';
      } else {
        document.getElementById(currentElementID).style.paddingBottom = '0';
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;
      var _this$state = this.state,
        refresh = _this$state.refresh,
        modalCanClose = _this$state.modalCanClose,
        isNormalVisible = _this$state.isNormalVisible,
        isHoverVisible = _this$state.isHoverVisible;
      var finalpaletteColors = [];
      var count = 0;
      var defaultpalette = this.state.inputattr.colorPalettes;
      var defaultColorPalette = _toConsumableArray(defaultpalette);
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
      var defaultValue = this.state.inputattr["default"];
      var inputattr = this.state.inputattr;
      return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
        className: "wp-picker-container"
      }, /*#__PURE__*/React.createElement("div", {
        className: "tooltip-container"
      }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        className: isNormalVisible ? 'button wp-color-result normal-state wp-picker-open' : 'button wp-color-result normal-state',
        onClick: function onClick() {
          _this2.toggleNormalVisible();
        },
        "aria-expanded": "false",
        style: {
          backgroundColor: this.props.color
        }
      }), /*#__PURE__*/React.createElement("span", {
        className: "tooltip-text"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Normal', 'responsive'))), /*#__PURE__*/React.createElement("div", {
        className: "wp-picker-holder"
      }, isNormalVisible && /*#__PURE__*/React.createElement(React.Fragment, null, refresh ? /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
        color: this.props.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color, 'normal');
        }
      }) : /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
        color: this.props.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color, 'normal');
        }
      }), this.state.normalOpacityZero && /*#__PURE__*/React.createElement("div", {
        className: "responsive-color-picker-zero-opac"
      }, /*#__PURE__*/React.createElement("strong", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Note: ', 'responsive')), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Opacity is set to zero. Increase the opacity to see the color changes.', 'responsive')), /*#__PURE__*/React.createElement("button", {
        type: "button",
        onClick: function onClick() {
          _this2.onColorClearClick(defaultValue.normal, 'normal');
        },
        className: "responsive-clear-btn-inside-picker components-button components-circular-option-picker__clear is-secondary is-small"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Default', 'responsive')))), /*#__PURE__*/React.createElement("div", {
        className: "tooltip-container"
      }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        className: isHoverVisible ? 'button wp-color-result hover-state wp-picker-open' : 'button wp-color-result hover-state',
        onClick: function onClick() {
          _this2.toggleHoverVisible();
        },
        "aria-expanded": "false",
        style: {
          backgroundColor: this.props.hover_color
        }
      }), /*#__PURE__*/React.createElement("span", {
        className: "tooltip-text"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Hover', 'responsive'))), /*#__PURE__*/React.createElement("div", {
        className: "wp-picker-holder"
      }, isHoverVisible && /*#__PURE__*/React.createElement(React.Fragment, null, refresh ? /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
        color: this.props.hover_color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color, 'hover');
        }
      }) : /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
        color: this.props.hover_color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color, 'hover');
        }
      }), this.state.hoverOpacityZero && /*#__PURE__*/React.createElement("div", {
        className: "responsive-color-picker-zero-opac"
      }, /*#__PURE__*/React.createElement("strong", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Note: ', 'responsive')), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Opacity is set to zero. Increase it to make the color visible.', 'responsive')), /*#__PURE__*/React.createElement("button", {
        type: "button",
        onClick: function onClick() {
          _this2.onColorClearClick(defaultValue.hover, 'hover');
        },
        className: "responsive-clear-btn-inside-picker components-button components-circular-option-picker__clear is-secondary is-small"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Default', 'responsive'))))));
    }
  }, {
    key: "onColorClearClick",
    value: function onColorClearClick(color, type) {
      if (color === 'transparent' && type === 'normal') {
        this.setState({
          opacityZero: true
        });
      } else if (color !== 'transparent' && type === 'normal') {
        this.setState({
          opacityZero: false
        });
      }
      if (color === 'transparent' && type === 'hover') {
        this.setState({
          opacityZero: true
        });
      } else if (color !== 'transparent' && type === 'hover') {
        this.setState({
          opacityZero: false
        });
      }
      if (this.state.refresh === true) {
        this.setState({
          refresh: false
        });
      } else {
        this.setState({
          refresh: true
        });
      }
      this.props.onChangeComplete(color, type);
      wp.customize.previewer.refresh();
    }
  }, {
    key: "onChangeComplete",
    value: function onChangeComplete(color, type) {
      var newColor;
      if (color.rgb && color.rgb.a !== undefined) {
        if (color.rgb.a === 0) {
          // Show a notice when opacity is 0
          'hover' === type ? this.setState({
            hoverOpacityZero: true
          }) : this.setState({
            normalOpacityZero: true
          });
        } else {
          'hover' === type ? this.setState({
            hoverOpacityZero: false
          }) : this.setState({
            normalOpacityZero: false
          });
        }
        if (color.rgb.a !== 1) {
          newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
        } else {
          newColor = color.hex;
        }
      } else {
        this.setState({
          hoverOpacityZero: false
        });
        this.setState({
          normalOpacityZero: false
        });
        newColor = color.hex;
      }
      if (type === 'normal') {
        this.setState({
          color: newColor
        });
      } else if (type === 'hover') {
        this.setState({
          hover_color: newColor
        });
      }
      this.setState({
        backgroundType: 'color'
      });
      this.props.onChangeComplete(newColor, type);
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
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Component"]);
ResponsiveColorPickerWithHoverControl.propTypes = {
  color: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.string,
  usePalette: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.bool,
  palette: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.string,
  presetColors: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object,
  onChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  onPaletteChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  onChange: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.func,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveColorPickerWithHoverControl);

/***/ }),

/***/ "./src/contact-info/contact-icons.js":
/*!*******************************************!*\
  !*** ./src/contact-info/contact-icons.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var ContactIcons = {
  email_solid: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    "fill-rule": "evenodd",
    "clip-rule": "evenodd",
    d: "M3.87868 5.87868C3 6.75736 3 8.17157 3 11V13C3 15.8284 3 17.2426 3.87868 18.1213C4.75736 19 6.17157 19 9 19H15C17.8284 19 19.2426 19 20.1213 18.1213C21 17.2426 21 15.8284 21 13V11C21 8.17157 21 6.75736 20.1213 5.87868C19.2426 5 17.8284 5 15 5H9C6.17157 5 4.75736 5 3.87868 5.87868ZM6.5547 8.16795C6.09517 7.8616 5.4743 7.98577 5.16795 8.4453C4.8616 8.90483 4.98577 9.5257 5.4453 9.83205L10.8906 13.4622C11.5624 13.9101 12.4376 13.9101 13.1094 13.4622L18.5547 9.83205C19.0142 9.5257 19.1384 8.90483 18.8321 8.4453C18.5257 7.98577 17.9048 7.8616 17.4453 8.16795L12 11.7982L6.5547 8.16795Z",
    fill: "#222222"
  }), " "),
  email_outline: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("rect", {
    x: "4",
    y: "6",
    width: "16",
    height: "12",
    rx: "2",
    stroke: "#222222"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M4 9L11.1056 12.5528C11.6686 12.8343 12.3314 12.8343 12.8944 12.5528L20 9",
    stroke: "#222222"
  }), " "),
  phone_solid: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    d: "M6.67962 3.32038L7.29289 2.70711C7.68342 2.31658 8.31658 2.31658 8.70711 2.70711L11.2929 5.29289C11.6834 5.68342 11.6834 6.31658 11.2929 6.70711L9.50048 8.49952C9.2016 8.7984 9.1275 9.255 9.31653 9.63307C10.4093 11.8186 12.1814 13.5907 14.3669 14.6835C14.745 14.8725 15.2016 14.7984 15.5005 14.4995L17.2929 12.7071C17.6834 12.3166 18.3166 12.3166 18.7071 12.7071L21.2929 15.2929C21.6834 15.6834 21.6834 16.3166 21.2929 16.7071L20.6796 17.3204C18.5683 19.4317 15.2257 19.6693 12.837 17.8777L11.6286 16.9714C9.88504 15.6638 8.33622 14.115 7.02857 12.3714L6.12226 11.163C4.33072 8.7743 4.56827 5.43173 6.67962 3.32038Z",
    fill: "#222222"
  }), " "),
  phone_outline: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    d: "M17.7071 13.7071L20.3552 16.3552C20.7113 16.7113 20.7113 17.2887 20.3552 17.6448C18.43 19.57 15.3821 19.7866 13.204 18.153L11.6286 16.9714C9.88504 15.6638 8.33622 14.115 7.02857 12.3714L5.84701 10.796C4.21341 8.61788 4.43001 5.56999 6.35523 3.64477C6.71133 3.28867 7.28867 3.28867 7.64477 3.64477L10.2929 6.29289C10.6834 6.68342 10.6834 7.31658 10.2929 7.70711L9.27175 8.72825C9.10946 8.89054 9.06923 9.13846 9.17187 9.34373C10.3585 11.7171 12.2829 13.6415 14.6563 14.8281C14.8615 14.9308 15.1095 14.8905 15.2717 14.7283L16.2929 13.7071C16.6834 13.3166 17.3166 13.3166 17.7071 13.7071Z",
    stroke: "#222222"
  }), " "),
  mobile_solid: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    d: "M13 2H11C10.978 2 10.956 2 10.9342 2C10.0477 1.99995 9.28387 1.9999 8.67221 2.08214C8.01669 2.17027 7.38834 2.36902 6.87868 2.87868C6.36902 3.38834 6.17027 4.01669 6.08214 4.67221C5.9999 5.28387 5.99995 6.04768 6 6.93417C6 6.95604 6 6.97798 6 7V17L6 17.0658C5.99995 17.9523 5.9999 18.7161 6.08214 19.3278C6.17027 19.9833 6.36902 20.6117 6.87868 21.1213C7.38834 21.631 8.01669 21.8297 8.67221 21.9179C9.28387 22.0001 10.0477 22.0001 10.9342 22L11 22H13L13.0658 22C13.9523 22.0001 14.7161 22.0001 15.3278 21.9179C15.9833 21.8297 16.6117 21.631 17.1213 21.1213C17.631 20.6117 17.8297 19.9833 17.9179 19.3278C18.0001 18.7161 18.0001 17.9523 18 17.0658L18 17V7L18 6.93417C18.0001 6.04768 18.0001 5.28387 17.9179 4.67221C17.8297 4.01669 17.631 3.38834 17.1213 2.87868C16.6117 2.36902 15.9833 2.17027 15.3278 2.08214C14.7161 1.9999 13.9523 1.99995 13.0658 2C13.044 2 13.022 2 13 2Z",
    fill: "#222222",
    stroke: "#222222",
    "stroke-width": "2"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M7 16H17",
    stroke: "white",
    "stroke-width": "2"
  }), " "),
  mobile_outline: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    d: "M13 2.5H11L10.9634 2.5C10.0517 2.49999 9.31681 2.49997 8.73883 2.57768C8.13876 2.65836 7.63351 2.83096 7.23223 3.23223C6.83096 3.63351 6.65836 4.13876 6.57768 4.73883C6.49997 5.31681 6.49999 6.05169 6.5 6.96342L6.5 7V17L6.5 17.0366C6.49999 17.9483 6.49997 18.6832 6.57768 19.2612C6.65836 19.8612 6.83096 20.3665 7.23223 20.7678C7.63351 21.169 8.13876 21.3416 8.73883 21.4223C9.31681 21.5 10.0517 21.5 10.9634 21.5H11H13H13.0366C13.9483 21.5 14.6832 21.5 15.2612 21.4223C15.8612 21.3416 16.3665 21.169 16.7678 20.7678C17.169 20.3665 17.3416 19.8612 17.4223 19.2612C17.5 18.6832 17.5 17.9483 17.5 17.0366V17V7V6.96343C17.5 6.0517 17.5 5.31681 17.4223 4.73883C17.3416 4.13876 17.169 3.63351 16.7678 3.23223C16.3665 2.83096 15.8612 2.65836 15.2612 2.57768C14.6832 2.49997 13.9483 2.49999 13.0366 2.5L13 2.5Z",
    stroke: "#222222"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M7 16H17",
    stroke: "#222222"
  }), " "),
  work_hours_solid: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    "fill-rule": "evenodd",
    "clip-rule": "evenodd",
    d: "M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM13 6.5C13 5.94772 12.5523 5.5 12 5.5C11.4477 5.5 11 5.94772 11 6.5V11.75C11 12.4404 11.5596 13 12.25 13H15.5C16.0523 13 16.5 12.5523 16.5 12C16.5 11.4477 16.0523 11 15.5 11H13V6.5Z",
    fill: "#222222"
  }), " "),
  work_hours_outline: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("circle", {
    cx: "12",
    cy: "12",
    r: "8.5",
    stroke: "#222222"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M16.5 12H12.25C12.1119 12 12 11.8881 12 11.75V8.5",
    stroke: "#222222",
    "stroke-linecap": "round"
  }), " "),
  website_solid: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    "fill-rule": "evenodd",
    "clip-rule": "evenodd",
    d: "M11 3.05518V8.94334C9.46342 8.76797 8.04833 8.19325 6.97374 7.32014C6.37674 6.83508 5.91152 6.28112 5.58308 5.68969C6.99611 4.25299 8.88792 3.28865 11 3.05518ZM13 3.05518V8.94334C14.5366 8.76797 15.9517 8.19325 17.0263 7.32014C17.6233 6.83508 18.0885 6.28112 18.4169 5.68969C17.0039 4.253 15.1121 3.28865 13 3.05518ZM19.7168 7.36608C19.3207 7.91625 18.8406 8.42297 18.2874 8.87237C16.8355 10.0521 14.9677 10.7712 13 10.9538L13 13.0463C13.8146 13.1219 14.6157 13.2897 15.3804 13.5471C16.4564 13.9092 17.4455 14.4437 18.2874 15.1278C18.837 15.5743 19.3182 16.0801 19.717 16.634C20.5315 15.2805 21 13.6951 21 12.0002C21 10.3053 20.5314 8.71973 19.7168 7.36608ZM18.417 18.3107C18.0861 17.7154 17.6183 17.161 17.0263 16.68C16.3825 16.1569 15.6078 15.7338 14.7425 15.4426C14.1847 15.2549 13.599 15.1253 13 15.0569V20.9453C15.1121 20.7118 17.004 19.7475 18.417 18.3107ZM11 20.9453L11 15.0569C10.401 15.1253 9.81528 15.2549 9.2575 15.4426C8.39222 15.7338 7.61751 16.1569 6.97374 16.68C6.38168 17.161 5.91388 17.7154 5.58301 18.3107C6.99604 19.7475 8.88788 20.7118 11 20.9453ZM4.28297 16.634C4.68176 16.0801 5.16302 15.5743 5.71255 15.1278C6.55451 14.4437 7.54363 13.9092 8.61956 13.5471C9.38428 13.2897 10.1854 13.1219 11 13.0463V10.9538C9.03233 10.7712 7.16455 10.0521 5.71255 8.87237C5.15944 8.42297 4.67933 7.91625 4.28321 7.36608C3.46856 8.71972 3 10.3053 3 12.0002C3 13.6951 3.46846 15.2805 4.28297 16.634Z",
    fill: "#222222"
  }), " "),
  website_outline: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("circle", {
    cx: "12",
    cy: "12",
    r: "8",
    stroke: "#222222"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M18.572 7.20637C17.8483 8.05353 16.8869 8.74862 15.7672 9.23422C14.6475 9.71983 13.4017 9.98201 12.1326 9.99911C10.8636 10.0162 9.60778 9.78773 8.4689 9.33256C7.33002 8.87739 6.34077 8.20858 5.58288 7.38139",
    stroke: "#222222"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M18.572 16.7936C17.8483 15.9465 16.8869 15.2514 15.7672 14.7658C14.6475 14.2802 13.4017 14.018 12.1326 14.0009C10.8636 13.9838 9.60778 14.2123 8.4689 14.6674C7.33002 15.1226 6.34077 15.7914 5.58288 16.6186",
    stroke: "#222222"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M12 4V20",
    stroke: "#222222"
  }), " "),
  address_solid: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    "fill-rule": "evenodd",
    "clip-rule": "evenodd",
    d: "M12.398 19.804C13.881 19.0348 19 16.0163 19 11C19 7.13401 15.866 4 12 4C8.13401 4 5 7.13401 5 11C5 16.0163 10.119 19.0348 11.602 19.804C11.8548 19.9351 12.1452 19.9351 12.398 19.804ZM12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14Z",
    fill: "#222222"
  }), " "),
  address_outline: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    d: "M19.5 12C19.5 17.018 14.0117 20.4027 12.4249 21.2764C12.1568 21.424 11.8432 21.424 11.5751 21.2764C9.98831 20.4027 4.5 17.018 4.5 12C4.5 7.5 8.13401 4.5 12 4.5C16 4.5 19.5 7.5 19.5 12Z",
    stroke: "#222222"
  }), " ", /*#__PURE__*/React.createElement("circle", {
    cx: "12",
    cy: "12",
    r: "3.5",
    stroke: "#222222"
  }), " "),
  fax_solid: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    d: "M3 3H21",
    stroke: "#222222",
    "stroke-width": "2",
    "stroke-linecap": "round"
  }), " ", /*#__PURE__*/React.createElement("path", {
    "fill-rule": "evenodd",
    "clip-rule": "evenodd",
    d: "M19 3H5V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H12.76C12.844 21 12.886 21 12.9181 20.9837C12.9463 20.9693 12.9693 20.9463 12.9837 20.9181C13 20.886 13 20.844 13 20.76V18.2C13 17.0799 13 16.5198 13.218 16.092C13.4097 15.7157 13.7157 15.4097 14.092 15.218C14.5198 15 15.0799 15 16.2 15H18.76C18.844 15 18.886 15 18.9181 14.9837C18.9463 14.9693 18.9693 14.9463 18.9837 14.9181C19 14.886 19 14.844 19 14.76V3ZM11 7V10.5858L9.70711 9.29289C9.31658 8.90237 8.68342 8.90237 8.29289 9.29289C7.90237 9.68342 7.90237 10.3166 8.29289 10.7071L11.1868 13.601C11.2053 13.6195 11.2242 13.6372 11.2436 13.6541C11.4269 13.866 11.6978 14 12 14C12.3022 14 12.5731 13.866 12.7564 13.6541C12.7758 13.6372 12.7947 13.6195 12.8132 13.601L15.7071 10.7071C16.0976 10.3166 16.0976 9.68342 15.7071 9.29289C15.3166 8.90237 14.6834 8.90237 14.2929 9.29289L13 10.5858V7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7Z",
    fill: "#222222"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M15.2561 20.7439L18.7439 17.2561C18.8384 17.1616 18.7715 17 18.6379 17H15.5C15.2239 17 15 17.2239 15 17.5V20.6379C15 20.7715 15.1616 20.8384 15.2561 20.7439Z",
    fill: "#222222"
  }), " "),
  fax_outline: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, " ", /*#__PURE__*/React.createElement("path", {
    d: "M2.5 4.5H21.5",
    stroke: "#222222",
    "stroke-linecap": "round"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M5.5 4.5H18.5V15.8373C18.5 16.0818 18.5 16.2041 18.4724 16.3192C18.4479 16.4213 18.4075 16.5188 18.3526 16.6083C18.2908 16.7092 18.2043 16.7957 18.0314 16.9686L15.9686 19.0314C15.7957 19.2043 15.7092 19.2908 15.6083 19.3526C15.5188 19.4075 15.4213 19.4479 15.3192 19.4724C15.2041 19.5 15.0818 19.5 14.8373 19.5H7.9C7.05992 19.5 6.63988 19.5 6.31901 19.3365C6.03677 19.1927 5.8073 18.9632 5.66349 18.681C5.5 18.3601 5.5 17.9401 5.5 17.1V4.5Z",
    stroke: "#222222",
    "stroke-linecap": "round"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M12 13.5V8",
    stroke: "#222222",
    "stroke-linecap": "round"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M9.5 12.5L11.9063 14.425C11.9611 14.4689 12.0389 14.4689 12.0937 14.425L14.5 12.5",
    stroke: "#222222",
    "stroke-linecap": "round"
  }), " ", /*#__PURE__*/React.createElement("path", {
    d: "M18.5 15.5H16.1C15.5399 15.5 15.2599 15.5 15.046 15.609C14.8578 15.7049 14.7049 15.8578 14.609 16.046C14.5 16.2599 14.5 16.5399 14.5 17.1V19.5",
    stroke: "#222222"
  }), " ")
};
/* harmony default export */ __webpack_exports__["default"] = (ContactIcons);

/***/ }),

/***/ "./src/contact-info/contact-info-component.js":
/*!****************************************************!*\
  !*** ./src/contact-info/contact-info-component.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.es.js");
/* harmony import */ var _contact_info_item_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./contact-info-item-component */ "./src/contact-info/contact-info-item-component.js");
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}






var ContactInfoComponent = function ContactInfoComponent(props) {
  var allItems = [{
    id: "email",
    enable: true,
    label: "Email",
    title: "Email",
    content: "",
    link: ""
  }, {
    id: "phone",
    enable: true,
    label: "Phone",
    title: "Phone",
    content: "",
    link: ""
  }, {
    id: "address",
    enable: true,
    label: "Address",
    title: "Address",
    content: "",
    link: ""
  }, {
    id: "mobile",
    enable: true,
    label: "Mobile",
    title: "Mobile",
    content: "",
    link: ""
  }, {
    id: "work_hours",
    enable: true,
    label: "Work Hours",
    title: "Work Hours",
    content: "",
    link: ""
  }, {
    id: "website",
    enable: true,
    label: "Website",
    title: "Website",
    content: "",
    link: ""
  }, {
    id: "fax",
    enable: true,
    label: "Fax",
    title: "Fax",
    content: "",
    link: ""
  }];
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(props.control.setting.get() ? props.control.setting.get() : props.control.params["default"]),
    _useState2 = _slicedToArray(_useState, 2),
    selectedOptions = _useState2[0],
    setSelectedOptions = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(false),
    _useState4 = _slicedToArray(_useState3, 2),
    open = _useState4[0],
    setOpen = _useState4[1];
  var updateItem = function updateItem(newItem, index) {
    var updatedOptions = _toConsumableArray(selectedOptions);
    updatedOptions[index] = newItem;
    setSelectedOptions(updatedOptions);
    props.control.setting.set(updatedOptions);
  };
  var removeItem = function removeItem(id) {
    var updatedOptions = selectedOptions.filter(function (item) {
      return item.id !== id;
    });
    setSelectedOptions(updatedOptions);
    props.control.setting.set(updatedOptions);
  };
  var addItem = function addItem(item) {
    var updatedOptions = [].concat(_toConsumableArray(selectedOptions), [item]);
    setSelectedOptions(updatedOptions);
    props.control.setting.set(updatedOptions);
  };
  var firstSort = Object(react__WEBPACK_IMPORTED_MODULE_2__["useRef"])(true);
  var handleSort = function handleSort(newList) {
    if (firstSort.current) {
      firstSort.current = false;
      return;
    }
    setSelectedOptions(newList);
    props.control.setting.set(newList);
  };
  var availableItems = allItems.filter(function (item) {
    return !selectedOptions.some(function (selected) {
      return selected.id === item.id;
    });
  });
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-container"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-select-wrapper"
  }, /*#__PURE__*/React.createElement("label", {
    className: "responsive-contact-info-label"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Icons', 'responsive')), /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-selector"
  }, /*#__PURE__*/React.createElement("span", {
    className: "responsive-contact-info-selector-group"
  }, selectedOptions.map(function (currentItem, index) {
    return /*#__PURE__*/React.createElement("span", {
      className: "responsive-contact-info-item-selected",
      key: currentItem.id
    }, currentItem.label, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Tooltip"], {
      text: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Remove Item', 'responsive')
    }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Dashicon"], {
      onClick: function onClick() {
        return removeItem(currentItem.id);
      },
      icon: 'no-alt'
    })));
  })), /*#__PURE__*/React.createElement("span", {
    className: "responsive-contact-info-add-item"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Tooltip"], {
    text: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Add Item', 'responsive')
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Dashicon"], {
    onClick: function onClick() {
      setOpen(!open);
    },
    icon: open ? 'minus' : 'plus'
  })))), /*#__PURE__*/React.createElement("p", {
    className: "responsive-contact-info-add-item-desc"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Select the items that you want to display.', 'responsive')), open && (availableItems === null || availableItems === void 0 ? void 0 : availableItems.length) > 0 && /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-available-items"
  }, availableItems.map(function (item) {
    return /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
      key: item.id,
      onClick: function onClick() {
        return addItem(item);
      }
    }, item.label);
  }))), (selectedOptions === null || selectedOptions === void 0 ? void 0 : selectedOptions.length) > 0 && /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-list-container"
  }, /*#__PURE__*/React.createElement(react_sortablejs__WEBPACK_IMPORTED_MODULE_4__["ReactSortable"], {
    list: selectedOptions,
    handle: ".responsive-contact-info-panel-header",
    setList: handleSort,
    animation: 200,
    delayOnTouchStart: true,
    delay: 2,
    className: "responsive-contact-info-wrapper"
  }, selectedOptions.map(function (item, index) {
    return /*#__PURE__*/React.createElement(_contact_info_item_component__WEBPACK_IMPORTED_MODULE_5__["default"], {
      key: item.id,
      item: item,
      index: index,
      updateItem: updateItem
    });
  }))));
};
ContactInfoComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ContactInfoComponent));

/***/ }),

/***/ "./src/contact-info/contact-info-item-component.js":
/*!*********************************************************!*\
  !*** ./src/contact-info/contact-info-item-component.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../icons */ "./src/icons.js");
/* harmony import */ var _contact_icons__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./contact-icons */ "./src/contact-info/contact-icons.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}





var ContactInfoItemComponent = function ContactInfoItemComponent(props) {
  var _props$item = props.item,
    id = _props$item.id,
    label = _props$item.label,
    enable = _props$item.enable;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
    _useState2 = _slicedToArray(_useState, 2),
    open = _useState2[0],
    setOpen = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(enable),
    _useState4 = _slicedToArray(_useState3, 2),
    isVisible = _useState4[0],
    setIsVisible = _useState4[1];
  var showLinks = true;
  if ('address' === id || 'work_hours' === id) {
    showLinks = false;
  }
  var displayLabel = id;
  switch (id) {
    case 'phone':
      displayLabel = 'Phone No.';
      break;
    case 'mobile':
      displayLabel = 'Mobile No.';
      break;
    case 'work_hours':
      displayLabel = 'Time';
      break;
    default:
      displayLabel = label;
  }
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-item",
    "data-id": id,
    key: id
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-panel-header"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-menu-choice-wrap"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-menu"
  }, _icons__WEBPACK_IMPORTED_MODULE_2__["default"].sort), /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-icon-choice"
  }, _contact_icons__WEBPACK_IMPORTED_MODULE_3__["default"][id + '_outline']), /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-item-choice"
  }, label)), /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-item-actions"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Tooltip"], {
    text: isVisible ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Enable Item', 'responsive') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Disable Item', 'responsive')
  }, /*#__PURE__*/React.createElement("span", {
    className: "responsive-contact-info-visibility-action",
    onClick: function onClick() {
      setIsVisible(!isVisible);
      props.updateItem(_objectSpread(_objectSpread({}, props.item), {}, {
        enable: !isVisible
      }), props.index);
    }
  }, isVisible ? _icons__WEBPACK_IMPORTED_MODULE_2__["default"].eye_active : _icons__WEBPACK_IMPORTED_MODULE_2__["default"].eye)), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Tooltip"], {
    text: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Expand Item Controls', 'responsive')
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Dashicon"], {
    onClick: function onClick() {
      return setOpen(!open);
    },
    icon: open ? 'arrow-up-alt2' : 'arrow-down-alt2'
  })))), open && /*#__PURE__*/React.createElement("div", {
    className: "responsive-contact-info-panel-content"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Title', 'responsive'),
    value: props.item.title || '',
    className: "responsive-contact-info-content-item",
    onChange: function onChange(value) {
      props.updateItem(_objectSpread(_objectSpread({}, props.item), {}, {
        title: value
      }), props.index);
    }
  }), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
    label: displayLabel,
    value: props.item.content || '',
    className: "responsive-contact-info-content-item",
    onChange: function onChange(value) {
      props.updateItem(_objectSpread(_objectSpread({}, props.item), {}, {
        content: value
      }), props.index);
    }
  }), showLinks && /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Link', 'responsive'),
    value: props.item.link || '',
    className: "responsive-contact-info-content-item",
    onChange: function onChange(value) {
      props.updateItem(_objectSpread(_objectSpread({}, props.item), {}, {
        link: value
      }), props.index);
    }
  }))));
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ContactInfoItemComponent));

/***/ }),

/***/ "./src/contact-info/control.js":
/*!*************************************!*\
  !*** ./src/contact-info/control.js ***!
  \*************************************/
/*! exports provided: responsiveContactInfo */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveContactInfo", function() { return responsiveContactInfo; });
/* harmony import */ var _contact_info_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./contact-info-component */ "./src/contact-info/contact-info-component.js");

var responsiveContactInfo = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_contact_info_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

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

(function ($) {
  var $body = $('body'),
    $window = $(window);
  /**
   * API on ready event handlers
   *
   * All handlers need to be inside the 'ready' state.
   */
  wp.customize.bind('ready', function () {
    var resizePreviewer = function resizePreviewer() {
      var $section = $('.control-section.responsive-builder-active');
      var $footer = $('.control-section.responsive-footer-builder-active');
      var isResponsiveBuilderActive = $body.hasClass('responsive-header-builder-is-active');
      var isFooterBuilderActive = $body.hasClass('responsive-footer-builder-is-active');
      var previewerContainer = wp.customize.previewer.container;
      if (isResponsiveBuilderActive || isFooterBuilderActive) {
        setTimeout(function () {
          if (isFooterBuilderActive && $footer.length && !$footer.hasClass('responsive-hfb-builder-hide')) {
            previewerContainer.css('bottom', $footer.outerHeight() + 'px');
          } else if (isResponsiveBuilderActive && $section.length && !$section.hasClass('responsive-hfb-builder-hide')) {
            previewerContainer.css('bottom', $section.outerHeight() + 'px');
          } else {
            previewerContainer.css('bottom', '');
          }
        }, 100);
      } else {
        previewerContainer.css('bottom', '');
      }
    };

    // Bind events
    $window.on('resize', resizePreviewer);
    wp.customize.previewedDevice.bind(function () {
      setTimeout(resizePreviewer, 100);
    });

    /**
     * Init Header & Footer Builder
     */
    var initHeaderBuilderPanel = function initHeaderBuilderPanel(panel) {
      var section = wp.customize.section('responsive_header_builder');
      if (section) {
        var $section = section.contentContainer,
          section_layout = wp.customize.section('responsive_header_builder_section');
        // If Header panel is expanded, add class to the body tag (for CSS styling).
        panel.expanded.bind(function (isExpanded) {
          _.each(section.controls(), function (control) {
            if ('resolved' === control.deferred.embedded.state()) {
              return;
            }
            control.renderContent();
            control.deferred.embedded.resolve();

            // Fire event after control is initialized.
            control.container.trigger('init');
          });
          if (isExpanded) {
            $body.addClass('responsive-header-builder-is-active');
            $section.addClass('responsive-builder-active');
            $section.css('display', 'none').height();
            $section.css('display', 'block');
          } else {
            $body.removeClass('responsive-header-builder-is-active');
            $section.removeClass('responsive-builder-active');
          }
          _.each(section_layout.controls(), function (control) {
            if ('resolved' === control.deferred.embedded.state()) {
              return;
            }
            control.renderContent();
            control.deferred.embedded.resolve();

            // Fire event after control is initialized.
            control.container.trigger('init');
          });
          resizePreviewer();
        });
        // Attach callback to builder toggle.
        $section.on('click', '.responsive-hfb-builder-tab-toggle', function (e) {
          e.preventDefault();
          $section.toggleClass('responsive-hfb-builder-hide');
          resizePreviewer();
        });
      }
    };
    wp.customize.panel('responsive_header', initHeaderBuilderPanel);
    var initFooterBuilderPanel = function initFooterBuilderPanel(panel) {
      var section = wp.customize.section('responsive_footer_builder');
      if (section) {
        var $section = section.contentContainer,
          section_layout = wp.customize.section('responsive_footer_layout');
        // If Footer panel is expanded, add class to the body tag (for CSS styling).
        panel.expanded.bind(function (isExpanded) {
          _.each(section.controls(), function (control) {
            if ('resolved' === control.deferred.embedded.state()) {
              return;
            }
            control.renderContent();
            control.deferred.embedded.resolve();

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
            control.deferred.embedded.resolve();
            control.container.trigger('init');
          });
          resizePreviewer();
        });
        // Attach callback to builder toggle.
        $section.on('click', '.responsive-hfb-builder-tab-toggle', function (e) {
          e.preventDefault();
          $section.toggleClass('responsive-hfb-builder-hide');
          resizePreviewer();
        });
      }
    };
    wp.customize.panel('responsive_footer', initFooterBuilderPanel);
    wp.customize('responsive_footer_primary_row_top_border_size', function (value) {
      value.bind(function (newval) {
        if (newval > 0) {
          document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'block';
        } else {
          document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'none';
        }
      });
    });
    wp.customize('responsive_footer_above_row_top_border_size', function (value) {
      value.bind(function (newval) {
        if (newval > 0) {
          document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'block';
        } else {
          document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'none';
        }
      });
    });
    wp.customize('responsive_footer_below_row_top_border_size', function (value) {
      value.bind(function (newval) {
        if (newval > 0) {
          document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'block';
        } else {
          document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'none';
        }
      });
    });
    wp.customize('responsive_footer_primary_columns', function (value) {
      value.bind(function (newval) {
        if (newval > 1) {
          document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'block';
        } else {
          document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'none';
        }
      });
    });
    wp.customize('responsive_footer_above_columns', function (value) {
      value.bind(function (newval) {
        if (newval > 1) {
          document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'block';
        } else {
          document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'none';
        }
      });
    });
    wp.customize('responsive_footer_below_columns', function (value) {
      value.bind(function (newval) {
        if (newval > 1) {
          document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'block';
        } else {
          document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'none';
        }
      });
    });
  });
  /**
   * Header Woo Cart Label
   */
  wp.customize('responsive_woo_cart_label', function (setting) {
    setting.bind(function (newval) {
      $(document.body).trigger('wc_fragment_refresh');
    });
  });
  /**
   * Header Woo Cart - Hide Cart Label
   */
  wp.customize('responsive_hide_cart_total_label', function (setting) {
    setting.bind(function (newval) {
      $(document.body).trigger('wc_fragment_refresh');
    });
  });
  /**
   * Header Woo Cart Click Action
   */
  wp.customize('responsive_header_woo_cart_click_action', function (setting) {
    setting.bind(function (newval) {
      $(document.body).trigger('wc_fragment_refresh');
    });
  });
  wp.customize.bind('ready', function () {
    wp.customize('responsive_color_scheme', function (value) {
      value.bind(function (newval) {
        // Extract design style and color palette.
        var customizerColorSchemes = newval.split('-');
        var designStyle = customizerColorSchemes[0];
        var colorPalette = customizerColorSchemes[1];

        // Get available design styles.
        var designStyles = localize.paletteDesignStyles;
        if (designStyles[designStyle] && designStyles[designStyle].color_schemes[colorPalette]) {
          var responsiveColorSchemes = designStyles[designStyle].color_schemes[colorPalette];

          // List of theme mods to update dynamically.
          var themeMods = {
            'responsive_alt_background_color': responsiveColorSchemes.alt_background,
            'responsive_box_background_color': responsiveColorSchemes.background,
            'responsive_link_color': responsiveColorSchemes.accent,
            'responsive_button_color': responsiveColorSchemes.accent,
            'responsive_button_hover_color': responsiveColorSchemes.accent,
            'responsive_sidebar_headings_color': responsiveColorSchemes.text,
            'responsive_sidebar_background_color': responsiveColorSchemes.background,
            'responsive_body_text_color': responsiveColorSchemes.text,
            'responsive_meta_text_color': responsiveColorSchemes.accent,
            'responsive_sidebar_text_color': responsiveColorSchemes.text,
            'responsive_h1_text_color': responsiveColorSchemes.text,
            'responsive_h2_text_color': responsiveColorSchemes.text,
            'responsive_h3_text_color': responsiveColorSchemes.text,
            'responsive_h4_text_color': responsiveColorSchemes.text,
            'responsive_h5_text_color': responsiveColorSchemes.text,
            'responsive_h6_text_color': responsiveColorSchemes.text,
            'responsive_sidebar_link_color': responsiveColorSchemes.accent,
            'responsive_shop_product_rating_color': responsiveColorSchemes.accent,
            'responsive_add_to_cart_button_text_color': responsiveColorSchemes.background,
            'responsive_add_to_cart_button_hover_text_color': responsiveColorSchemes.background,
            'responsive_cart_buttons_text_color': responsiveColorSchemes.background,
            'responsive_cart_buttons_hover_color': responsiveColorSchemes.accent,
            'responsive_cart_buttons_hover_text_color': responsiveColorSchemes.background,
            'responsive_cart_checkout_button_color': responsiveColorSchemes.accent,
            'responsive_cart_checkout_button_text_color': responsiveColorSchemes.background,
            'responsive_cart_checkout_button_hover_text_color': responsiveColorSchemes.background
          };

          // Loop through theme mods and set values only if they exist.
          Object.keys(themeMods).forEach(function (mod) {
            if (wp.customize(mod)) {
              wp.customize(mod).set(themeMods[mod]);
            }
          });

          // Handle header/footer separately with fallbacks.
          var headerBackground = responsiveColorSchemes.header_background || '#ffffff';
          var footerBackground = responsiveColorSchemes.footer_background || '#333333';
          var headerText = responsiveColorSchemes.header_text || '#333333';
          var footerText = responsiveColorSchemes.footer_text || '#ffffff';
          var additionalMods = {
            'responsive_header_text_color': headerText,
            'responsive_footer_text_color': footerText,
            'responsive_footer_background_color': footerBackground,
            'responsive_header_site_title_color': headerText,
            'responsive_header_site_title_hover_color': headerText,
            'responsive_header_menu_background_color': headerBackground,
            'responsive_header_mobile_menu_background_color': headerBackground,
            'responsive_header_menu_link_color': headerText,
            'responsive_header_secondary_menu_background_color': headerBackground,
            'responsive_header_secondary_menu_link_color': headerText
          };

          // Apply additional mods safely.
          Object.keys(additionalMods).forEach(function (mod) {
            if (wp.customize(mod)) {
              wp.customize(mod).set(additionalMods[mod]);
            }
          });
        } else {
          console.error('Invalid color scheme or design style.');
        }
      });
    });
  });
  wp.customize('responsive_header_search_label', function (setting) {
    setting.bind(function (label) {
      var general_tab = $('#responsive_header_search_general_tab');
      var design_tab = $('#responsive_header_search_design_tab');
      var controls = {
        visibility: $('#customize-control-responsive_header_search_label_visibility'),
        separator2: $('#customize-control-responsive_header_search_separator3'),
        typography: $('#customize-control-responsive_header_search_label_typography_group'),
        separator10: $('#customize-control-responsive_header_search_separator10')
      };
      if (label.length > 0) {
        if (general_tab.hasClass('nav-tab-active')) {
          controls.visibility.fadeIn(300);
          controls.separator2.fadeIn(300);
        }
        if (design_tab.hasClass('nav-tab-active')) {
          controls.typography.fadeIn(300);
          controls.separator10.fadeIn(300);
        }
      } else {
        $.each(controls, function (_, control) {
          control.fadeOut(300);
        });
      }
    });
  });
  wp.customize('search_style', function (setting) {
    setting.bind(function (type) {
      if ('full-screen' !== type) {
        $('#customize-control-responsive_header_search_label').fadeOut(300);
        $('#customize-control-responsive_header_search_separator2').fadeOut(300);
        $('#customize-control-responsive_header_search_label_visibility').fadeOut(300);
        $('#customize-control-responsive_header_search_separator3').fadeOut(300);
        document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'none';
      } else {
        $('#customize-control-responsive_header_search_label').fadeIn(300);
        $('#customize-control-responsive_header_search_separator2').fadeIn(300);
        if (wp.customize('responsive_header_search_label').get().length > 0) {
          $('#customize-control-responsive_header_search_label_visibility').fadeIn(300);
          $('#customize-control-responsive_header_search_separator3').fadeIn(300);
        }
      }
    });
  });
  wp.customize('responsive_header_contact_info_icon_shape', function (setting) {
    setting.bind(function (shape) {
      if (shape === 'none') {
        $('#customize-control-responsive_header_contact_info_icon_style').fadeOut(300);
        $('#customize-control-responsive_header_contact_info_icon_style_separator').fadeOut(300);
      } else {
        $('#customize-control-responsive_header_contact_info_icon_style').fadeIn(300);
        $('#customize-control-responsive_header_contact_info_icon_style_separator').fadeIn(300);
      }
    });
  });
  wp.customize('responsive_blog_entry_content_type', function (setting) {
    setting.bind(function (type) {
      if (type !== 'excerpt') {
        $('#customize-control-responsive_blog_entry_content_alignment_separator').fadeOut(300);
        $('#customize-control-responsive_excerpt_length').fadeOut(300);
        $('#customize-control-responsive_excerpt_length_separator').fadeOut(300);
        $('#customize-control-responsive_blog_read_more_text').fadeOut(300);
        $('#customize-control-responsive_blog_read_more_text_separator').fadeOut(300);
        $('#customize-control-responsive_blog_entry_read_more_type').fadeOut(300);
      } else {
        $('#customize-control-responsive_blog_entry_content_alignment_separator').fadeIn(300);
        $('#customize-control-responsive_excerpt_length').fadeIn(300);
        $('#customize-control-responsive_excerpt_length_separator').fadeIn(300);
        $('#customize-control-responsive_blog_read_more_text').fadeIn(300);
        $('#customize-control-responsive_blog_read_more_text_separator').fadeIn(300);
        $('#customize-control-responsive_blog_entry_read_more_type').fadeIn(300);
      }
    });
  });
  wp.customize('responsive_site_background_image_toggle', function (setting) {
    setting.bind(function (toggle) {
      displaySiteBackgroundImageSettings(toggle && wp.customize('responsive_site_background_image').get());
    });
  });
  wp.customize('responsive_site_background_image', function (setting) {
    setting.bind(function (img) {
      displaySiteBackgroundImageSettings(img && wp.customize('responsive_site_background_image_toggle').get());
    });
  });
  var displaySiteBackgroundImageSettings = function displaySiteBackgroundImageSettings(display) {
    var method = display ? 'fadeIn' : 'fadeOut';
    $('#customize-control-responsive_site_background_img_position')[method](300);
    $('#customize-control-responsive_site_background_image_attachment')[method](300);
    $('#customize-control-responsive_site_background_image_repeat')[method](300);
    $('#customize-control-responsive_site_background_image_size')[method](300);
  };
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
/* harmony import */ var _dimensions_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dimensions-component.js */ "./src/dimensions/dimensions-component.js");

var responsiveDimensions = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_dimensions_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
        $footer_devices = jQuery('.wp-full-overlay-footer .devices');

      // Button class
      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active');

      // Control class
      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

      // Wrapper class
      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device);

      // Panel footer buttons
      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true);

      // Open switchers
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _extends() {
  return _extends = Object.assign ? Object.assign.bind() : function (n) {
    for (var e = 1; e < arguments.length; e++) {
      var t = arguments[e];
      for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]);
    }
    return n;
  }, _extends.apply(null, arguments);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var DimensionsComponent = function DimensionsComponent(props) {
  var value = props.control.params;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(value),
    _useState2 = _slicedToArray(_useState, 2),
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
    var itemLinkDesc = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Link Values Together', 'responsive');
    var linkHtml = null;
    var htmlChoices = null;
    var dataElement = id;
    if ('tablet' === device) {
      dataElement = dataElement + '_tablet';
    }
    if ('mobile' === device) {
      dataElement = dataElement + '_mobile';
    }
    linkHtml = /*#__PURE__*/React.createElement("li", {
      key: 'connect-disconnect' + device,
      className: "dimension-wrap"
    }, /*#__PURE__*/React.createElement("div", {
      className: "link-dimensions unlinked"
    }, /*#__PURE__*/React.createElement("span", {
      key: 'connect' + device,
      className: "dashicons dashicons-admin-links responsive-linked",
      onClick: function onClick() {
        onConnectedClick();
      },
      "data-element-connect": id,
      title: itemLinkDesc,
      "data-element": dataElement
    }), /*#__PURE__*/React.createElement("span", {
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
        var html = /*#__PURE__*/React.createElement("li", {
          key: props_value[device][choiceID].id,
          className: "dimension-wrap ".concat(choiceID)
        }, /*#__PURE__*/React.createElement("input", _extends({
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
        })), /*#__PURE__*/React.createElement("span", {
          className: "dimension-label"
        }, l10n[choiceID]));
        return html;
      });
    }
    return /*#__PURE__*/React.createElement("ul", {
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
    htmlDescription = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  inputHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  responsiveHtml = /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, /*#__PURE__*/React.createElement("span", null, label), /*#__PURE__*/React.createElement("ul", {
    className: "responsive-switchers"
  }, /*#__PURE__*/React.createElement("li", {
    className: "desktop"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-desktop active",
    "data-device": "desktop"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-desktop"
  }))), /*#__PURE__*/React.createElement("li", {
    className: "tablet"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-tablet",
    "data-device": "tablet"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-tablet"
  }))), /*#__PURE__*/React.createElement("li", {
    className: "mobile"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-mobile",
    "data-device": "mobile"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-smartphone"
  }))))), inputHtml);
  return /*#__PURE__*/React.createElement(React.Fragment, null, responsiveHtml, htmlDescription);
};
DimensionsComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(DimensionsComponent));

/***/ }),

/***/ "./src/fontpresets/control.js":
/*!************************************!*\
  !*** ./src/fontpresets/control.js ***!
  \************************************/
/*! exports provided: responsiveFontPreset */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveFontPreset", function() { return responsiveFontPreset; });
/* harmony import */ var _fontpreset_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./fontpreset-component */ "./src/fontpresets/fontpreset-component.js");

var responsiveFontPreset = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_fontpreset_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/fontpresets/fontpreset-component.js":
/*!*************************************************!*\
  !*** ./src/fontpresets/fontpreset-component.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var FontPresetComponent = function FontPresetComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    selectedValue = _useState2[0],
    setSelectedValue = _useState2[1];
  var onOptionClick = function onOptionClick(value) {
    setSelectedValue(value);
    props.control.setting.set(value);
  };
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    name = _props$control$params.name,
    choices = _props$control$params.choices,
    description = _props$control$params.description,
    id = _props$control$params.id;
  var htmlLabel = null,
    descriptionHtml = null,
    reset = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Back to default', 'responsive');
  if (label) {
    htmlLabel = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("label", {
      className: "responsive-font-preset-reset-control"
    }, /*#__PURE__*/React.createElement("span", {
      className: "customize-control-font-preset-description"
    }, description), /*#__PURE__*/React.createElement("div", {
      className: "responsive-reset-slider",
      onClick: function onClick() {
        onOptionClick('');
      }
    }, /*#__PURE__*/React.createElement("span", {
      className: "responsive-reset-slider"
    }, /*#__PURE__*/React.createElement("span", {
      className: "dashicons dashicons-image-rotate",
      title: reset
    }))));
  }
  var optionsHtml = Object.entries(choices).map(function (_ref) {
    var _ref2 = _slicedToArray(_ref, 2),
      choiceValue = _ref2[0],
      _ref2$ = _ref2[1],
      headingFont = _ref2$.headingFont,
      bodyFont = _ref2$.bodyFont,
      headingWeight = _ref2$.headingWeight,
      bodyWeight = _ref2$.bodyWeight;
    // for Exo 2 font and fonts which need ''.
    headingFont = headingFont.replace(/'/g, '');
    return /*#__PURE__*/React.createElement("button", {
      id: "".concat(id, "-fontpreset-").concat(choiceValue),
      key: choiceValue,
      type: "button",
      className: "customize-control-responsive-fontpreset__button fontpreset-button ".concat(selectedValue === choiceValue ? 'active' : ''),
      onClick: function onClick() {
        return onOptionClick(choiceValue);
      }
    }, /*#__PURE__*/React.createElement("div", {
      className: "heading-preview",
      style: {
        fontFamily: "'" + headingFont + "'",
        fontWeight: headingWeight
      }
    }, "Ag"), /*#__PURE__*/React.createElement("div", {
      className: "body-preview",
      style: {
        fontFamily: "'" + bodyFont + "'",
        fontWeight: bodyWeight
      }
    }, "Ag"), /*#__PURE__*/React.createElement("span", {
      className: "font-label tooltiptext"
    }, headingFont, " / ", bodyFont));
  });

  // Load all fonts from choices (both heading and body fonts)
  var loadFonts = function loadFonts() {
    Object.entries(choices).forEach(function (_ref3) {
      var _ref4 = _slicedToArray(_ref3, 2),
        choiceValue = _ref4[0],
        _ref4$ = _ref4[1],
        headingFont = _ref4$.headingFont,
        bodyFont = _ref4$.bodyFont,
        headingWeight = _ref4$.headingWeight,
        bodyWeight = _ref4$.bodyWeight;
      // Generate URL for Google Fonts link including weights
      var fontsToLoad = [{
        font: headingFont,
        weight: headingWeight
      }, {
        font: bodyFont,
        weight: bodyWeight
      }].map(function (_ref5) {
        var font = _ref5.font,
          weight = _ref5.weight;
        var fontUrl = font.replace(/ /g, "+").replace(/,/g, "%2C");
        return "https://fonts.googleapis.com/css?family=".concat(fontUrl, ":").concat(weight);
      });

      // Load each font by appending a <link> to the head
      fontsToLoad.forEach(function (fontUrl) {
        var fontId = "font-".concat(fontUrl.split("=")[1].split(":")[0]); // Create a unique ID for each font
        if (!document.getElementById(fontId)) {
          var linkElement = document.createElement('link');
          linkElement.id = fontId;
          linkElement.rel = 'stylesheet';
          linkElement.type = 'text/css';
          linkElement.href = fontUrl;
          document.head.appendChild(linkElement);
        }
      });
    });
  };

  // Call the loadFonts function when the component renders
  loadFonts();
  return /*#__PURE__*/React.createElement(React.Fragment, null, htmlLabel, descriptionHtml, /*#__PURE__*/React.createElement("div", {
    className: "customize-control-responsive-fontpreset",
    "data-name": name,
    "data-value": selectedValue,
    value: selectedValue
  }, optionsHtml));
};
FontPresetComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(FontPresetComponent));

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
/* harmony import */ var _heading_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./heading-component.js */ "./src/heading/heading-component.js");

var responsiveHeading = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_heading_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);

var descriptionStyle = {
  fontSize: '12px',
  lineHeight: '18px',
  color: '#A4A4A4',
  marginTop: '10px',
  fontStyle: 'italic'
};
var HeadingComponent = function HeadingComponent(props) {
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    description = _props$control$params.description;
  var labelHtml = null;
  var descriptionHtml = null;
  if (label) {
    labelHtml = /*#__PURE__*/React.createElement("h4", {
      className: "responsive-customizer-heading"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("div", {
      className: "description",
      style: descriptionStyle
    }, /*#__PURE__*/React.createElement("span", {
      style: {
        fontWeight: 600
      }
    }, "Note: "), description);
  }
  return /*#__PURE__*/React.createElement(React.Fragment, null, labelHtml, descriptionHtml);
};
HeadingComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(HeadingComponent));

/***/ }),

/***/ "./src/horizontal-separator/control.js":
/*!*********************************************!*\
  !*** ./src/horizontal-separator/control.js ***!
  \*********************************************/
/*! exports provided: responsiveHorizontalSeparator */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveHorizontalSeparator", function() { return responsiveHorizontalSeparator; });
/* harmony import */ var _horizontal_separator_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./horizontal-separator-component */ "./src/horizontal-separator/horizontal-separator-component.js");

var responsiveHorizontalSeparator = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_horizontal_separator_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/horizontal-separator/horizontal-separator-component.js":
/*!********************************************************************!*\
  !*** ./src/horizontal-separator/horizontal-separator-component.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}


var HorizontalSeparatorComponent = function HorizontalSeparatorComponent(props) {
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-horizontal-separator-control-wrapper"
  }, _toConsumableArray(Array(props.control.params.label)).map(function (_, index) {
    return /*#__PURE__*/React.createElement("hr", {
      key: index
    });
  }));
};
HorizontalSeparatorComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(HorizontalSeparatorComponent));

/***/ }),

/***/ "./src/html/control.js":
/*!*****************************!*\
  !*** ./src/html/control.js ***!
  \*****************************/
/*! exports provided: responsiveHtml */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveHtml", function() { return responsiveHtml; });
/* harmony import */ var _html_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./html-component */ "./src/html/html-component.js");
// import HorizontalSeparatorComponent from "./horizontal-separator-component";

var responsiveHtml = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_html_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/html/html-component.js":
/*!************************************!*\
  !*** ./src/html/html-component.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash_debounce__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash/debounce */ "./node_modules/lodash/debounce.js");
/* harmony import */ var lodash_debounce__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash_debounce__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}




var HtmlComponent = function HtmlComponent(_ref) {
  var control = _ref.control;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    value = _useState2[0],
    setValue = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(false),
    _useState4 = _slicedToArray(_useState3, 2),
    restoreTextMode = _useState4[0],
    setRestoreTextMode = _useState4[1];
  var controlParams = control.params.input_attrs ? _objectSpread({
    id: 'header_html',
    toolbar1: 'bold,italic,bullist,numlist,link',
    toolbar2: ''
  }, control.params.input_attrs) : {
    id: 'header_html',
    toolbar1: 'bold,italic,bullist,numlist,link',
    toolbar2: ''
  };
  var editorRef = Object(react__WEBPACK_IMPORTED_MODULE_3__["useRef"])(null);
  var updateValues = function updateValues(newValue) {
    setValue(newValue);
    control.setting.set(newValue);
  };
  var triggerChangeIfDirty = lodash_debounce__WEBPACK_IMPORTED_MODULE_1___default()(function () {
    var newValue = window.wp.oldEditor.getContent(controlParams.id);
    updateValues(newValue);
  }, 250);
  var onInit = function onInit() {
    var tinymceEditor = window.tinymce.get(controlParams.id);
    if (restoreTextMode) {
      window.switchEditors.go(controlParams.id, 'html');
    }
    tinymceEditor.on('NodeChange', triggerChangeIfDirty);
  };
  Object(react__WEBPACK_IMPORTED_MODULE_3__["useEffect"])(function () {
    if (window.tinymce.get(controlParams.id)) {
      setRestoreTextMode(window.tinymce.get(controlParams.id).isHidden());
      window.wp.oldEditor.remove(controlParams.id);
    }
    window.wp.oldEditor.initialize(controlParams.id, {
      tinymce: {
        wpautop: true,
        toolbar1: controlParams.toolbar1,
        toolbar2: controlParams.toolbar2
      },
      quicktags: true,
      mediaButtons: true
    });
    var tinymceEditor = window.tinymce.get(controlParams.id);
    if (tinymceEditor.initialized) {
      onInit();
    } else {
      tinymceEditor.on('init', onInit);
    }
    return function () {
      if (tinymceEditor) {
        tinymceEditor.off('NodeChange', triggerChangeIfDirty);
      }
    };
  }, []);
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-control-field responsive-editor-control"
  }, control.params.label && /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, control.params.label), /*#__PURE__*/React.createElement("textarea", {
    className: "responsive-control-tinymce-editor wp-editor-area",
    id: controlParams.id,
    ref: editorRef,
    value: value,
    onChange: function onChange(_ref2) {
      var value = _ref2.target.value;
      return updateValues(value);
    }
  }), control.params.description && /*#__PURE__*/React.createElement("span", {
    className: "customize-control-description"
  }, control.params.description));
};
HtmlComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (HtmlComponent);

/***/ }),

/***/ "./src/icons.js":
/*!**********************!*\
  !*** ./src/icons.js ***!
  \**********************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var Icons = {
  full: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "93",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  twocol: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "44",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "63",
    y: "20",
    width: "44",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  twolheavy: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "62",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "81",
    y: "20",
    width: "26",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  tworheavy: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "45",
    y: "20",
    width: "62",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "26",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  threecol: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "27",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "80",
    y: "20",
    width: "27",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "46",
    y: "20",
    width: "29",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  lefthalf: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "53",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "92",
    y: "20",
    width: "15",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "72",
    y: "20",
    width: "15",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  righthalf: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "53",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "15",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 29 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "15",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 49 20)",
    fill: "#9CB0C9"
  })),
  centerhalf: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "45",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 83 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "19",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 33 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "19",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 20)",
    fill: "#9CB0C9"
  })),
  widecenter: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "57",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 89 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "13",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 27 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "13",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 20)",
    fill: "#9CB0C9"
  })),
  fourcol: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "19",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "63",
    y: "20",
    width: "20",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "38",
    y: "20",
    width: "20",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "88",
    y: "20",
    width: "19",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  lfourforty: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "42",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "95",
    y: "20",
    width: "12",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "78",
    y: "20",
    width: "12",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "61",
    y: "20",
    width: "12",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  rfourforty: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "42",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "12",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 26 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "12",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 43 20)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "12",
    height: "24",
    rx: "1",
    transform: "matrix(-1 0 0 1 60 20)",
    fill: "#9CB0C9"
  })),
  fivecol: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "14",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "53",
    y: "20",
    width: "15",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "33",
    y: "20",
    width: "15",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "73",
    y: "20",
    width: "15",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "93",
    y: "20",
    width: "14",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  sixcol: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "20",
    width: "11",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "47",
    y: "20",
    width: "11",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "30",
    y: "20",
    width: "12",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "63",
    y: "20",
    width: "12",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "80",
    y: "20",
    width: "11",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "96",
    y: "20",
    width: "11",
    height: "24",
    rx: "1",
    fill: "#9CB0C9"
  })),
  collapserowsix: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "6",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 6)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 15)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 24)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 33)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 42)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "6",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 52)",
    fill: "#9CB0C9"
  })),
  collapserowfive: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 8)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 18)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 28)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 38)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "7",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 48)",
    fill: "#9CB0C9"
  })),
  fourgrid: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "9",
    width: "44",
    height: "20",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "34",
    width: "44",
    height: "20",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "63",
    y: "9",
    width: "44",
    height: "20",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "63",
    y: "34",
    width: "44",
    height: "20",
    rx: "1",
    fill: "#9CB0C9"
  })),
  collapserowfour: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "9",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 10)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "9",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 22)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "9",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 34)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "9",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 46)",
    fill: "#9CB0C9"
  })),
  threefirstrow: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "20",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 10)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "44",
    height: "20",
    rx: "1",
    transform: "matrix(-1 0 0 1 58 34)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "44",
    height: "20",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 34)",
    fill: "#9CB0C9"
  })),
  threelastrow: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "20",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 34)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "19",
    height: "20",
    rx: "1",
    transform: "matrix(-1 0 0 1 33 10)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "70",
    height: "20",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 10)",
    fill: "#9CB0C9"
  })),
  collapserowthree: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "-0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    transform: "matrix(-1 0 0 1 120 0)",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "12",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 10)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "12",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 26)",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    width: "93",
    height: "12",
    rx: "1",
    transform: "matrix(-1 0 0 1 107 42)",
    fill: "#9CB0C9"
  })),
  collapserowtwo: /*#__PURE__*/React.createElement("svg", {
    width: "121",
    height: "64",
    viewBox: "0 0 121 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("rect", {
    x: "0.5",
    y: "0.5",
    width: "120",
    height: "63",
    rx: "3.5",
    fill: "white",
    stroke: "#D2D2D2"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "10",
    width: "93",
    height: "20",
    rx: "1",
    fill: "#9CB0C9"
  }), /*#__PURE__*/React.createElement("rect", {
    x: "14",
    y: "34",
    width: "93",
    height: "20",
    rx: "1",
    fill: "#9CB0C9"
  })),
  footer_copyright: /*#__PURE__*/React.createElement("svg", {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("g", {
    "clip-path": "url(#clip0_1583_1126)"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M24 0C37.2552 0 48 10.7448 48 24C48 37.2552 37.2552 48 24 48C10.7448 48 0 37.2552 0 24C0 10.7448 10.7448 0 24 0ZM24 3.348C18.5227 3.348 13.2698 5.52383 9.39683 9.39683C5.52383 13.2698 3.348 18.5227 3.348 24C3.348 29.4773 5.52383 34.7302 9.39683 38.6032C13.2698 42.4762 18.5227 44.652 24 44.652C29.4773 44.652 34.7302 42.4762 38.6032 38.6032C42.4762 34.7302 44.652 29.4773 44.652 24C44.652 18.5227 42.4762 13.2698 38.6032 9.39683C34.7302 5.52383 29.4773 3.348 24 3.348ZM24.384 11.1624C26.976 11.1624 29.4648 11.8896 31.5912 13.236C31.9456 13.4823 32.1912 13.8559 32.2769 14.2789C32.3626 14.7018 32.2818 15.1416 32.0512 15.5064C31.8207 15.8712 31.4583 16.133 31.0395 16.2372C30.6207 16.3414 30.1778 16.2799 29.8032 16.0656C28.1819 15.0436 26.3029 14.5049 24.3864 14.5128C18.9192 14.5128 14.5128 18.7728 14.5128 24C14.5128 29.2272 18.9192 33.4872 24.3864 33.4872C26.3088 33.4872 28.1472 32.9592 29.724 31.9824C29.9111 31.8666 30.1191 31.7887 30.3362 31.7533C30.5534 31.7179 30.7754 31.7256 30.9895 31.7759C31.2037 31.8263 31.4059 31.9184 31.5844 32.0468C31.763 32.1753 31.9146 32.3377 32.0304 32.5248C32.1462 32.7119 32.2241 32.9199 32.2595 33.137C32.2949 33.3542 32.2872 33.5762 32.2369 33.7903C32.1865 34.0045 32.0944 34.2067 31.966 34.3853C31.8375 34.5638 31.6751 34.7154 31.488 34.8312C29.3537 36.1499 26.8929 36.845 24.384 36.8376C17.0952 36.8376 11.1624 31.1016 11.1624 24C11.1624 16.8984 17.0952 11.1624 24.3864 11.1624",
    fill: "#696969"
  })), /*#__PURE__*/React.createElement("defs", null, /*#__PURE__*/React.createElement("clipPath", {
    id: "clip0_1583_1126"
  }, /*#__PURE__*/React.createElement("rect", {
    width: "48",
    height: "48",
    fill: "white"
  })))),
  footer_navigation: /*#__PURE__*/React.createElement("svg", {
    width: "32",
    height: "40",
    viewBox: "0 0 32 40",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M27.4922 -0.00805661C28.6324 -0.00819668 29.7302 0.424534 30.5637 1.20268C31.3972 1.98083 31.9041 3.04636 31.9822 4.18394L31.9922 4.49194V35.4879C31.9928 36.6285 31.5603 37.7268 30.7821 38.5607C30.0039 39.3946 28.9381 39.9019 27.8002 39.9799L27.4922 39.9899H4.49219C3.35193 39.9901 2.25415 39.5574 1.42068 38.7792C0.587216 38.0011 0.0802313 36.9355 0.00218729 35.7979L-0.00781247 35.4899V4.49194C-0.00795254 3.35169 0.424778 2.2539 1.20293 1.42044C1.98107 0.586972 3.04661 0.0799871 4.18419 0.00194315L4.49219 -0.00805661H27.4922ZM9.00219 27.9999C8.20654 27.9999 7.44348 28.316 6.88087 28.8786C6.31826 29.4412 6.00219 30.2043 6.00219 30.9999C6.00219 31.7956 6.31826 32.5587 6.88087 33.1213C7.44348 33.6839 8.20654 33.9999 9.00219 33.9999H23.0022C23.7978 33.9999 24.5609 33.6839 25.1235 33.1213C25.6861 32.5587 26.0022 31.7956 26.0022 30.9999C26.0022 30.2043 25.6861 29.4412 25.1235 28.8786C24.5609 28.316 23.7978 27.9999 23.0022 27.9999H9.00219Z",
    fill: "#696969"
  })),
  scroll_to_top: /*#__PURE__*/React.createElement("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("circle", {
    cx: "12",
    cy: "12",
    r: "11",
    fill: "white",
    stroke: "#696969",
    "stroke-width": "2"
  }), /*#__PURE__*/React.createElement("path", {
    d: "M12.0003 6.16406L17.9107 15.8357H6.08984L12.0003 6.16406Z",
    fill: "#696969"
  })),
  social: /*#__PURE__*/React.createElement("svg", {
    width: "40",
    height: "40",
    viewBox: "0 0 40 40",
    fill: "white",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M2 20C2 21.5913 2.63214 23.1174 3.75736 24.2426C4.88258 25.3679 6.4087 26 8 26C9.5913 26 11.1174 25.3679 12.2426 24.2426C13.3679 23.1174 14 21.5913 14 20C14 18.4087 13.3679 16.8826 12.2426 15.7574C11.1174 14.6321 9.5913 14 8 14C6.4087 14 4.88258 14.6321 3.75736 15.7574C2.63214 16.8826 2 18.4087 2 20ZM26 8C26 9.5913 26.6321 11.1174 27.7574 12.2426C28.8826 13.3679 30.4087 14 32 14C33.5913 14 35.1174 13.3679 36.2426 12.2426C37.3679 11.1174 38 9.5913 38 8C38 6.4087 37.3679 4.88258 36.2426 3.75736C35.1174 2.63214 33.5913 2 32 2C30.4087 2 28.8826 2.63214 27.7574 3.75736C26.6321 4.88258 26 6.4087 26 8ZM26 32C26 33.5913 26.6321 35.1174 27.7574 36.2426C28.8826 37.3679 30.4087 38 32 38C33.5913 38 35.1174 37.3679 36.2426 36.2426C37.3679 35.1174 38 33.5913 38 32C38 30.4087 37.3679 28.8826 36.2426 27.7574C35.1174 26.6321 33.5913 26 32 26C30.4087 26 28.8826 26.6321 27.7574 27.7574C26.6321 28.8826 26 30.4087 26 32ZM13.4 17.4L26.6 10.6L13.4 17.4ZM13.4 22.6L26.6 29.4L13.4 22.6Z",
    fill: "white"
  }), /*#__PURE__*/React.createElement("path", {
    d: "M13.4 17.4L26.6 10.6M13.4 22.6L26.6 29.4M2 20C2 21.5913 2.63214 23.1174 3.75736 24.2426C4.88258 25.3679 6.4087 26 8 26C9.5913 26 11.1174 25.3679 12.2426 24.2426C13.3679 23.1174 14 21.5913 14 20C14 18.4087 13.3679 16.8826 12.2426 15.7574C11.1174 14.6321 9.5913 14 8 14C6.4087 14 4.88258 14.6321 3.75736 15.7574C2.63214 16.8826 2 18.4087 2 20ZM26 8C26 9.5913 26.6321 11.1174 27.7574 12.2426C28.8826 13.3679 30.4087 14 32 14C33.5913 14 35.1174 13.3679 36.2426 12.2426C37.3679 11.1174 38 9.5913 38 8C38 6.4087 37.3679 4.88258 36.2426 3.75736C35.1174 2.63214 33.5913 2 32 2C30.4087 2 28.8826 2.63214 27.7574 3.75736C26.6321 4.88258 26 6.4087 26 8ZM26 32C26 33.5913 26.6321 35.1174 27.7574 36.2426C28.8826 37.3679 30.4087 38 32 38C33.5913 38 35.1174 37.3679 36.2426 36.2426C37.3679 35.1174 38 33.5913 38 32C38 30.4087 37.3679 28.8826 36.2426 27.7574C35.1174 26.6321 33.5913 26 32 26C30.4087 26 28.8826 26.6321 27.7574 27.7574C26.6321 28.8826 26 30.4087 26 32Z",
    stroke: "#696969",
    "stroke-width": "4",
    "stroke-linecap": "round",
    "stroke-linejoin": "round"
  })),
  sort: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "13px",
    height: "13px",
    viewBox: "0 0 48 48"
  }, /*#__PURE__*/React.createElement("path", {
    fill: "#007CBA",
    "fill-rule": "#007CBA",
    d: "M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8",
    "clip-rule": "evenodd"
  })),
  icon_label_left: /*#__PURE__*/React.createElement("svg", {
    width: "22",
    height: "22",
    viewBox: "0 0 22 22",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M6.41406 10.9963H19.2474M11.9141 16.5L6.41406 11L11.9141 5.5M2.28906 16.5V5.5",
    stroke: "#666666",
    "stroke-width": "2",
    "stroke-linecap": "round",
    "stroke-linejoin": "round"
  })),
  icon_label_right: /*#__PURE__*/React.createElement("svg", {
    width: "23",
    height: "22",
    viewBox: "0 0 23 22",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M16.082 11.0037L3.2487 11.0037M10.582 5.5L16.082 11L10.582 16.5M20.207 5.5L20.207 16.5",
    stroke: "#666666",
    "stroke-width": "2",
    "stroke-linecap": "round",
    "stroke-linejoin": "round"
  })),
  icon_label_bottom: /*#__PURE__*/React.createElement("svg", {
    width: "23",
    height: "22",
    viewBox: "0 0 23 22",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M11.4963 15.5835L11.4963 2.75016M17 10.0835L11.5 15.5835L6 10.0835M17 19.7085L6 19.7085",
    stroke: "#666666",
    "stroke-width": "2",
    "stroke-linecap": "round",
    "stroke-linejoin": "round"
  })),
  icon_header_search1: /*#__PURE__*/React.createElement("svg", {
    width: "18",
    height: "18",
    viewBox: "0 0 18 18",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M17.375 16.125L12.75 11.5C13.5 10.375 14 9 14 7.625C14 3.875 10.875 0.75 7.125 0.75C3.375 0.75 0.25 3.875 0.25 7.625C0.25 11.375 3.375 14.5 7.125 14.5C8.625 14.5 9.875 14 11 13.25L15.625 17.875L17.375 16.125ZM2.125 7.625C2.125 4.875 4.375 2.625 7.125 2.625C9.875 2.625 12.125 4.875 12.125 7.625C12.125 10.375 9.875 12.625 7.125 12.625C4.375 12.625 2.125 10.375 2.125 7.625Z",
    fill: "#A5A5A5"
  })),
  icon_header_search2: /*#__PURE__*/React.createElement("svg", {
    width: "16",
    height: "17",
    viewBox: "0 0 16 17",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M15.7656 15.1895L10.6934 10.1172C11.4805 9.09961 11.9062 7.85547 11.9062 6.54688C11.9062 4.98047 11.2949 3.51172 10.1895 2.4043C9.08398 1.29687 7.61133 0.6875 6.04688 0.6875C4.48242 0.6875 3.00977 1.29883 1.9043 2.4043C0.796875 3.50977 0.1875 4.98047 0.1875 6.54688C0.1875 8.11133 0.798828 9.58398 1.9043 10.6895C3.00977 11.7969 4.48047 12.4062 6.04688 12.4062C7.35547 12.4062 8.59766 11.9805 9.61523 11.1953L14.6875 16.2656C14.7024 16.2805 14.72 16.2923 14.7395 16.3004C14.7589 16.3084 14.7797 16.3126 14.8008 16.3126C14.8218 16.3126 14.8427 16.3084 14.8621 16.3004C14.8815 16.2923 14.8992 16.2805 14.9141 16.2656L15.7656 15.416C15.7805 15.4011 15.7923 15.3835 15.8004 15.364C15.8084 15.3446 15.8126 15.3238 15.8126 15.3027C15.8126 15.2817 15.8084 15.2609 15.8004 15.2414C15.7923 15.222 15.7805 15.2043 15.7656 15.1895ZM9.14062 9.64062C8.3125 10.4668 7.21484 10.9219 6.04688 10.9219C4.87891 10.9219 3.78125 10.4668 2.95312 9.64062C2.12695 8.8125 1.67188 7.71484 1.67188 6.54688C1.67188 5.37891 2.12695 4.2793 2.95312 3.45312C3.78125 2.62695 4.87891 2.17188 6.04688 2.17188C7.21484 2.17188 8.31445 2.625 9.14062 3.45312C9.9668 4.28125 10.4219 5.37891 10.4219 6.54688C10.4219 7.71484 9.9668 8.81445 9.14062 9.64062Z",
    fill: "#A5A5A5"
  })),
  eye_active: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "19px",
    height: "19px",
    viewBox: "0 0 28 28"
  }, /*#__PURE__*/React.createElement("path", {
    fill: "#000000",
    d: "M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"
  })),
  eye: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "19px",
    height: "19px",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    fill: "#000",
    d: "M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"
  }))
};
/* harmony default export */ __webpack_exports__["default"] = (Icons);

/***/ }),

/***/ "./src/imageradiobtn/control.js":
/*!**************************************!*\
  !*** ./src/imageradiobtn/control.js ***!
  \**************************************/
/*! exports provided: responsiveImageRadioButton */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveImageRadioButton", function() { return responsiveImageRadioButton; });
/* harmony import */ var _imageradiobtn_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./imageradiobtn-component */ "./src/imageradiobtn/imageradiobtn-component.js");

var responsiveImageRadioButton = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_imageradiobtn_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/imageradiobtn/imageradiobtn-component.js":
/*!******************************************************!*\
  !*** ./src/imageradiobtn/imageradiobtn-component.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}


var ImageRadioButtonComponent = function ImageRadioButtonComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var onOptionClick = function onOptionClick(value) {
    setPropsValue(value);
    props.control.setting.set(value);
  };
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    name = _props$control$params.name,
    choices = _props$control$params.choices,
    description = _props$control$params.description,
    id = _props$control$params.id,
    image_ext = _props$control$params.image_ext;
  var htmlLabel = null;
  var descriptionHtml = null;
  var hasDashicons = false;
  if (label) {
    htmlLabel = /*#__PURE__*/React.createElement("label", {
      htmlFor: id,
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  var optionsHtml = Object.entries(choices).map(function (_ref) {
    var _ref2 = _slicedToArray(_ref, 2),
      choiceValue = _ref2[0],
      icon = _ref2[1];
    return /*#__PURE__*/React.createElement("button", {
      id: "".concat(id, "-imageradiobtn-").concat(choiceValue),
      key: choiceValue,
      type: "button",
      className: "customize-control-responsive-imageradiobtn__button imageradiobtn-text imagebutton ".concat(props_value === choiceValue ? 'active' : ''),
      onClick: function onClick() {
        return onOptionClick(choiceValue);
      }
    }, /*#__PURE__*/React.createElement("span", {
      "class": "responsive-image-caption tooltiptext"
    }, icon), /*#__PURE__*/React.createElement("img", {
      className: "responsive-imageradiobtn-text ".concat(icon),
      src: "".concat(localize.path).concat(choiceValue, ".").concat(image_ext)
    }));
  });
  return /*#__PURE__*/React.createElement(React.Fragment, null, htmlLabel, descriptionHtml, /*#__PURE__*/React.createElement("div", {
    className: "customize-control-responsive-imageradiobtn",
    "data-name": name,
    "data-value": props_value,
    value: props_value
  }, optionsHtml));
};
ImageRadioButtonComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ImageRadioButtonComponent));

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
/* harmony import */ var _selectbtn_control__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./selectbtn/control */ "./src/selectbtn/control.js");
/* harmony import */ var _tabs_control__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./tabs/control */ "./src/tabs/control.js");
/* harmony import */ var _imageradiobtn_control__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./imageradiobtn/control */ "./src/imageradiobtn/control.js");
/* harmony import */ var _radiusdimensions_control__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./radiusdimensions/control */ "./src/radiusdimensions/control.js");
/* harmony import */ var _borderwidth_control__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./borderwidth/control */ "./src/borderwidth/control.js");
/* harmony import */ var _toggle_control__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./toggle/control */ "./src/toggle/control.js");
/* harmony import */ var _horizontal_separator_control__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./horizontal-separator/control */ "./src/horizontal-separator/control.js");
/* harmony import */ var _backgroundimage_control__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./backgroundimage/control */ "./src/backgroundimage/control.js");
/* harmony import */ var _typography_group_control__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ./typography_group/control */ "./src/typography_group/control.js");
/* harmony import */ var _fontpresets_control__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ./fontpresets/control */ "./src/fontpresets/control.js");
/* harmony import */ var _breadcrumb_toggle__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! ./breadcrumb-toggle */ "./src/breadcrumb-toggle.js");
/* harmony import */ var _breadcrumb_toggle__WEBPACK_IMPORTED_MODULE_23___default = /*#__PURE__*/__webpack_require__.n(_breadcrumb_toggle__WEBPACK_IMPORTED_MODULE_23__);
/* harmony import */ var _builder_layout_control__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! ./builder-layout/control */ "./src/builder-layout/control.js");
/* harmony import */ var _multi_select_control__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! ./multi-select/control */ "./src/multi-select/control.js");
/* harmony import */ var _range_with_switchers_control__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! ./range-with-switchers/control */ "./src/range-with-switchers/control.js");
/* harmony import */ var _builder_row_layout_control__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! ./builder-row-layout/control */ "./src/builder-row-layout/control.js");
/* harmony import */ var _builder_available_drag_control__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! ./builder-available-drag/control */ "./src/builder-available-drag/control.js");
/* harmony import */ var _html_control__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! ./html/control */ "./src/html/control.js");
/* harmony import */ var _shadow_control__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! ./shadow/control */ "./src/shadow/control.js");
/* harmony import */ var _social_controls__WEBPACK_IMPORTED_MODULE_31__ = __webpack_require__(/*! ./social/controls */ "./src/social/controls.js");
/* harmony import */ var _input_with_dropdown_control__WEBPACK_IMPORTED_MODULE_32__ = __webpack_require__(/*! ./input-with-dropdown/control */ "./src/input-with-dropdown/control.js");
/* harmony import */ var _contact_info_control__WEBPACK_IMPORTED_MODULE_33__ = __webpack_require__(/*! ./contact-info/control */ "./src/contact-info/control.js");
/* harmony import */ var _color_with_devices_control__WEBPACK_IMPORTED_MODULE_34__ = __webpack_require__(/*! ./color-with-devices/control */ "./src/color-with-devices/control.js");
/* harmony import */ var _section_toggle_control__WEBPACK_IMPORTED_MODULE_35__ = __webpack_require__(/*! ./section-toggle/control */ "./src/section-toggle/control.js");




































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
wp.customize.controlConstructor['responsive-selectbtn'] = _selectbtn_control__WEBPACK_IMPORTED_MODULE_13__["responsiveSelectButton"];
wp.customize.controlConstructor['responsive-tabs'] = _tabs_control__WEBPACK_IMPORTED_MODULE_14__["responsiveTabs"];
wp.customize.controlConstructor['responsive-imageradiobtn'] = _imageradiobtn_control__WEBPACK_IMPORTED_MODULE_15__["responsiveImageRadioButton"];
wp.customize.controlConstructor['responsive-radiusdimensions'] = _radiusdimensions_control__WEBPACK_IMPORTED_MODULE_16__["responsiveRadiusDimensions"];
wp.customize.controlConstructor['responsive-border-width-dimensions'] = _borderwidth_control__WEBPACK_IMPORTED_MODULE_17__["responsiveBorderWidthDimensions"];
wp.customize.controlConstructor['responsive-toggle'] = _toggle_control__WEBPACK_IMPORTED_MODULE_18__["responsiveToggle"];
wp.customize.controlConstructor['responsive-horizontal-separator'] = _horizontal_separator_control__WEBPACK_IMPORTED_MODULE_19__["responsiveHorizontalSeparator"];
wp.customize.controlConstructor['responsive-background-image'] = _backgroundimage_control__WEBPACK_IMPORTED_MODULE_20__["responsiveBackgroundImage"];
wp.customize.controlConstructor['responsive-typography-settings-group'] = _typography_group_control__WEBPACK_IMPORTED_MODULE_21__["responsiveTypographyGroup"];
wp.customize.controlConstructor['responsive-font-presets'] = _fontpresets_control__WEBPACK_IMPORTED_MODULE_22__["responsiveFontPreset"];
wp.customize.controlConstructor['responsive-builder-control'] = _builder_layout_control__WEBPACK_IMPORTED_MODULE_24__["responsiveBuilderControl"];
wp.customize.controlConstructor['responsive-multi-select'] = _multi_select_control__WEBPACK_IMPORTED_MODULE_25__["responsiveMultiSelectControl"];
wp.customize.controlConstructor['responsive-range-with-switchers'] = _range_with_switchers_control__WEBPACK_IMPORTED_MODULE_26__["responsiveRangeWithSwitcher"];
wp.customize.controlConstructor['responsive-row-layout-select'] = _builder_row_layout_control__WEBPACK_IMPORTED_MODULE_27__["responsiveRowLayout"];
wp.customize.controlConstructor['responsive-available-drag-control'] = _builder_available_drag_control__WEBPACK_IMPORTED_MODULE_28__["responsiveAvailableItemsDragControl"];
wp.customize.controlConstructor['responsive-html'] = _html_control__WEBPACK_IMPORTED_MODULE_29__["responsiveHtml"];
wp.customize.controlConstructor['responsive-shadow-control'] = _shadow_control__WEBPACK_IMPORTED_MODULE_30__["responsiveShadow"];
wp.customize.controlConstructor['responsive-social'] = _social_controls__WEBPACK_IMPORTED_MODULE_31__["responsiveSocial"];
wp.customize.controlConstructor['responsive-available-drag-control'] = _builder_available_drag_control__WEBPACK_IMPORTED_MODULE_28__["responsiveAvailableItemsDragControl"];
wp.customize.controlConstructor['responsive-input-with-dropdown'] = _input_with_dropdown_control__WEBPACK_IMPORTED_MODULE_32__["responsiveInputWithDropdown"];
wp.customize.controlConstructor['responsive-contact-info'] = _contact_info_control__WEBPACK_IMPORTED_MODULE_33__["responsiveContactInfo"];
wp.customize.controlConstructor['responsive-color-with-devices'] = _color_with_devices_control__WEBPACK_IMPORTED_MODULE_34__["responsiveColorWithDevices"];
wp.customize.controlConstructor['responsive-section-toggle'] = _section_toggle_control__WEBPACK_IMPORTED_MODULE_35__["responsiveSectionToggle"];

/***/ }),

/***/ "./src/input-with-dropdown/control.js":
/*!********************************************!*\
  !*** ./src/input-with-dropdown/control.js ***!
  \********************************************/
/*! exports provided: responsiveInputWithDropdown */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveInputWithDropdown", function() { return responsiveInputWithDropdown; });
/* harmony import */ var _input_with_dropdown__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./input-with-dropdown */ "./src/input-with-dropdown/input-with-dropdown.js");

var responsiveInputWithDropdown = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_input_with_dropdown__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/input-with-dropdown/input-with-dropdown.js":
/*!********************************************************!*\
  !*** ./src/input-with-dropdown/input-with-dropdown.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}


var InputWithDropdown = function InputWithDropdown(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    value = _useState2[0],
    setPropsValue = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
    _useState4 = _slicedToArray(_useState3, 2),
    showChoices = _useState4[0],
    setShowChoices = _useState4[1];
  // Add Option to input val.
  var onOptionClick = function onOptionClick(shortcode) {
    var newValue = value + shortcode;
    setPropsValue(newValue);
    props.control.setting.set(newValue);
    setShowChoices(false);
  };
  // Handle input change.
  var onInputChange = function onInputChange(val) {
    setPropsValue(val);
    props.control.setting.set(val);
  };
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    choices = _props$control$params.choices,
    description = _props$control$params.description,
    id = _props$control$params.id;
  var htmlLabel = null;
  var descriptionHtml = null;
  if (label) {
    htmlLabel = /*#__PURE__*/React.createElement("label", {
      htmlFor: id,
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("span", {
      className: "responsive-customize-control-desc res-input-with-dropdown-desc"
    }, /*#__PURE__*/React.createElement("span", {
      className: "note"
    }, "Note: "), description);
  }
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-input-with-dropdown-wrapper"
  }, htmlLabel, /*#__PURE__*/React.createElement("div", {
    className: "responsive-input-with-dropdown-inputs-wrap"
  }, /*#__PURE__*/React.createElement("input", {
    type: "text",
    value: value,
    onChange: function onChange(event) {
      return onInputChange(event.target.value);
    }
  }), /*#__PURE__*/React.createElement("button", {
    type: "button",
    onClick: function onClick() {
      return setShowChoices(!showChoices);
    } // Toggle dropdown visibility.
  }, "+")), descriptionHtml, showChoices && /*#__PURE__*/React.createElement("div", {
    className: "responsive-input-with-dropdown-options",
    style: {
      position: 'absolute',
      top: '42%',
      left: '140px',
      marginTop: '5px',
      backgroundColor: '#fff',
      boxShadow: '0px 0px 10px 0px #00000026',
      borderRadius: '4px',
      zIndex: 10,
      border: '1px solid #D0D0D0',
      minWidth: '172px',
      minHeight: '160px'
    }
  }, /*#__PURE__*/React.createElement("ul", {
    style: {
      listStyle: 'none',
      margin: 0,
      padding: '10px 0'
    }
  }, Object.entries(choices).map(function (_ref) {
    var _ref2 = _slicedToArray(_ref, 2),
      shortcode = _ref2[0],
      label = _ref2[1];
    return /*#__PURE__*/React.createElement("li", {
      key: shortcode,
      style: {
        padding: '10px',
        cursor: 'pointer',
        fontSize: '14px',
        lineHeight: '16px'
      },
      onClick: function onClick() {
        return onOptionClick(shortcode);
      },
      onMouseEnter: function onMouseEnter(e) {
        return e.target.style.backgroundColor = '#f0f0f0';
      },
      onMouseLeave: function onMouseLeave(e) {
        return e.target.style.backgroundColor = 'transparent';
      }
    }, label);
  }))));
};
InputWithDropdown.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(InputWithDropdown));

/***/ }),

/***/ "./src/multi-select/control.js":
/*!*************************************!*\
  !*** ./src/multi-select/control.js ***!
  \*************************************/
/*! exports provided: responsiveMultiSelectControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveMultiSelectControl", function() { return responsiveMultiSelectControl; });
/* harmony import */ var _multi_select_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./multi-select-component */ "./src/multi-select/multi-select-component.js");

var responsiveMultiSelectControl = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_multi_select_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/multi-select/multi-select-component.js":
/*!****************************************************!*\
  !*** ./src/multi-select/multi-select-component.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}


var MultiSelectControlComponent = function MultiSelectControlComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var onOptionClick = function onOptionClick(value) {
    var updatedPropsValue;
    if (!props_value.includes(value)) {
      // Add new value to a copy of the array
      updatedPropsValue = [].concat(_toConsumableArray(props_value), [value]);
    } else {
      // Filter out the value to remove it
      updatedPropsValue = props_value.filter(function (item) {
        return item !== value;
      });
    }
    setPropsValue(updatedPropsValue);
    props.control.setting.set(updatedPropsValue);
  };
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    name = _props$control$params.name,
    choices = _props$control$params.choices,
    id = _props$control$params.id;
  var htmlLabel = null;
  var descriptionHtml = null;
  if (label) {
    htmlLabel = /*#__PURE__*/React.createElement("label", {
      htmlFor: id,
      className: "customize-control-title customize-control-multi-select-title"
    }, label);
  }
  var optionsHtml = Object.entries(choices).map(function (_ref) {
    var _ref2 = _slicedToArray(_ref, 2),
      choiceValue = _ref2[0],
      icon = _ref2[1];
    if (icon.toLowerCase().includes('dashicons')) {
      return /*#__PURE__*/React.createElement("button", {
        key: choiceValue,
        type: "button",
        className: "customize-control-responsive-selectbtn__button selectbtn-dashicon ".concat(props_value.includes(choiceValue) ? 'active' : ''),
        onClick: function onClick() {
          return onOptionClick(choiceValue);
        }
      }, /*#__PURE__*/React.createElement("span", {
        className: "responsive-selectbtn-dashicon dashicons ".concat(icon)
      }));
    }
    return /*#__PURE__*/React.createElement("button", {
      key: choiceValue,
      type: "button",
      className: "customize-control-responsive-selectbtn__button selectbtn-text ".concat(props_value.includes(choiceValue) ? 'active' : ''),
      onClick: function onClick() {
        return onOptionClick(choiceValue);
      }
    }, /*#__PURE__*/React.createElement("span", {
      className: "responsive-selectbtn-text ".concat(icon)
    }, icon));
  });
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
    "class": "responsive-multi-select-control-wrapper"
  }, htmlLabel, descriptionHtml, /*#__PURE__*/React.createElement("div", {
    className: "customize-control-responsive-multiselect ".concat(id.includes('font-style') ? 'responsive-font-style-selectbtn-control' : ''),
    "data-name": name,
    "data-value": props_value,
    value: props_value
  }, optionsHtml)));
};
MultiSelectControlComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(MultiSelectControlComponent));

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
/* harmony import */ var _palette_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./palette-component.js */ "./src/palette/palette-component.js");

var responsivePalette = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_palette_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/palette/palette-color-picker.js":
/*!*********************************************!*\
  !*** ./src/palette/palette-color-picker.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);

var PaletteColorPicker = function PaletteColorPicker(props) {
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-color-picker-btn-wrap",
    tabIndex: "0"
  }, /*#__PURE__*/React.createElement("span", {
    className: "component-color-indicator responsive-color-palette-indicate",
    style: {
      background: props.colorsPicks.accent
    }
  }), /*#__PURE__*/React.createElement("span", {
    className: "component-color-indicator responsive-color-palette-indicate",
    style: {
      background: props.colorsPicks.text
    }
  }), /*#__PURE__*/React.createElement("span", {
    className: "component-color-indicator responsive-color-palette-indicate",
    style: {
      background: props.colorsPicks.background
    }
  }));
};
PaletteColorPicker.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(PaletteColorPicker));

/***/ }),

/***/ "./src/palette/palette-component.js":
/*!******************************************!*\
  !*** ./src/palette/palette-component.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _palette_color_picker_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./palette-color-picker.js */ "./src/palette/palette-color-picker.js");
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var PaletteComponent = function PaletteComponent(props) {
  var _props$control$params = props.control.params,
    id = _props$control$params.id,
    choices = _props$control$params.choices,
    palette_type = _props$control$params.palette_type,
    label = _props$control$params.label,
    description = _props$control$params.description,
    link = _props$control$params.link;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(function () {
      return props.control.setting.get() || 'playful-default';
    }),
    _useState2 = _slicedToArray(_useState, 2),
    selectedChoice = _useState2[0],
    setSelectedChoice = _useState2[1];
  var handlePaletteChange = function handlePaletteChange(choice) {
    setSelectedChoice(choice);
    props.control.setting.set(choice);
  };
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
    _useState4 = _slicedToArray(_useState3, 2),
    isPaletteVisible = _useState4[0],
    setIsPaletteVisible = _useState4[1];
  var togglePaletteVisibility = function togglePaletteVisibility(e) {
    e.stopPropagation();
    setIsPaletteVisible(!isPaletteVisible);
  };
  var paletteWrapperRef = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(null);
  var buttonRef = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(null);
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    var handleClickOutside = function handleClickOutside(event) {
      if (paletteWrapperRef.current && !paletteWrapperRef.current.contains(event.target) && buttonRef.current && !buttonRef.current.contains(event.target)) {
        setIsPaletteVisible(false);
      }
    };
    window.addEventListener('mousedown', handleClickOutside);
    return function () {
      window.removeEventListener('mousedown', handleClickOutside);
    };
  }, [paletteWrapperRef, buttonRef]);
  var htmlLabel = null;
  var descriptionHtml = null;
  var paletteTypeCheck = "default";
  var paletteDisplayImage = null;
  if (!choices) {
    return;
  }
  if (label) {
    htmlLabel = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("span", {
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
    var html = /*#__PURE__*/React.createElement("label", {
      key: choice,
      htmlFor: "".concat(id, "-").concat(choice),
      className: "palette__choice ".concat(choice === selectedChoice ? 'selected' : '')
    }, /*#__PURE__*/React.createElement("div", {
      className: "label"
    }, choices[choice].label), /*#__PURE__*/React.createElement("div", {
      className: "responsive-palette-picker-control-wrapper"
    }, /*#__PURE__*/React.createElement("span", {
      className: "screen-reader-text"
    }, choices[choice].label, " design style"), /*#__PURE__*/React.createElement("input", {
      type: "radio",
      value: choice,
      name: "_customize-".concat(id),
      id: "".concat(id, "-").concat(choice),
      className: "layout",
      "data-customize-setting-link": linkNew,
      onChange: function onChange() {
        return handlePaletteChange(choice);
      }
    }), paletteDisplayImage, /*#__PURE__*/React.createElement(_palette_color_picker_js__WEBPACK_IMPORTED_MODULE_2__["default"], {
      colorsPicks: choices[choice]
    })));
    return html;
  });
  var selectedPaletteDetails = /*#__PURE__*/React.createElement("div", {
    className: "responsive-selected-palette-details"
  }, /*#__PURE__*/React.createElement("div", {
    className: "label"
  }, choices[selectedChoice].label), /*#__PURE__*/React.createElement("div", {
    className: "responsive-color-picker-btn-wrap",
    tabIndex: "0"
  }, /*#__PURE__*/React.createElement("span", {
    className: "component-color-indicator responsive-color-palette-indicate",
    style: {
      background: choices[selectedChoice].accent
    }
  }), /*#__PURE__*/React.createElement("span", {
    className: "component-color-indicator responsive-color-palette-indicate",
    style: {
      background: choices[selectedChoice].text
    }
  }), /*#__PURE__*/React.createElement("span", {
    className: "component-color-indicator responsive-color-palette-indicate",
    style: {
      background: choices[selectedChoice].background
    }
  }), /*#__PURE__*/React.createElement("span", {
    id: "responsive-color-palette-btn",
    className: "dashicons ".concat(isPaletteVisible ? 'dashicons-arrow-up-alt2' : 'dashicons-arrow-down-alt2'),
    onClick: togglePaletteVisibility,
    ref: buttonRef
  })));
  return /*#__PURE__*/React.createElement(React.Fragment, null, htmlLabel, descriptionHtml, selectedPaletteDetails, isPaletteVisible && /*#__PURE__*/React.createElement("div", {
    role: "group",
    className: "palette__wrapper ".concat(paletteTypeCheck),
    ref: paletteWrapperRef
  }, optionsHtml));
};
PaletteComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(PaletteComponent));

/***/ }),

/***/ "./src/radiusdimensions/control.js":
/*!*****************************************!*\
  !*** ./src/radiusdimensions/control.js ***!
  \*****************************************/
/*! exports provided: responsiveRadiusDimensions */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveRadiusDimensions", function() { return responsiveRadiusDimensions; });
/* harmony import */ var _radiusdimensions_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./radiusdimensions-component.js */ "./src/radiusdimensions/radiusdimensions-component.js");

var responsiveRadiusDimensions = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_radiusdimensions_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
        $footer_devices = jQuery('.wp-full-overlay-footer .devices');

      // Button class
      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active');

      // Control class
      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

      // Wrapper class
      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device);

      // Panel footer buttons
      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true);

      // Open switchers
      if ($this.hasClass('preview-desktop')) {
        $control.toggleClass('responsive-switchers-open');
      }
    });
  }
});

/***/ }),

/***/ "./src/radiusdimensions/radiusdimensions-component.js":
/*!************************************************************!*\
  !*** ./src/radiusdimensions/radiusdimensions-component.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _extends() {
  return _extends = Object.assign ? Object.assign.bind() : function (n) {
    for (var e = 1; e < arguments.length; e++) {
      var t = arguments[e];
      for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]);
    }
    return n;
  }, _extends.apply(null, arguments);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var RadiusDimensionsComponent = function RadiusDimensionsComponent(props) {
  var value = props.control.params;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(value),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var onConnectedClick = function onConnectedClick() {
    var parent = event.target.parentElement.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.responsive-radiusdimensions-input');
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('linked');
      inputs[i].setAttribute('data-element-connect', '');
    }
    event.target.parentElement.classList.remove('unlinked');
  };
  var onDisconnectedClick = function onDisconnectedClick() {
    var elements = event.target.dataset.elementConnect;
    var parent = event.target.parentElement.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.responsive-radiusdimensions-input');
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
    var itemLinkDesc = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Link Values Together', 'responsive');
    var linkHtml = null;
    var htmlChoices = null;
    var dataElement = id;
    if ('tablet' === device) {
      dataElement = dataElement + '_tablet';
    }
    if ('mobile' === device) {
      dataElement = dataElement + '_mobile';
    }
    linkHtml = /*#__PURE__*/React.createElement("li", {
      key: 'connect-disconnect' + device,
      className: "dimension-wrap"
    }, /*#__PURE__*/React.createElement("div", {
      className: "link-dimensions unlinked"
    }, /*#__PURE__*/React.createElement("span", {
      key: 'connect' + device,
      className: "dashicons dashicons-admin-links responsive-linked",
      onClick: function onClick() {
        onConnectedClick();
      },
      "data-element-connect": id,
      title: itemLinkDesc,
      "data-element": dataElement
    }), /*#__PURE__*/React.createElement("span", {
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
        var html = /*#__PURE__*/React.createElement("li", {
          key: props_value[device][choiceID].id,
          className: "dimension-wrap ".concat(choiceID)
        }, /*#__PURE__*/React.createElement("input", _extends({
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
        })), /*#__PURE__*/React.createElement("span", {
          className: "dimension-label"
        }, l10n[choiceID]));
        return html;
      });
    }
    return /*#__PURE__*/React.createElement("ul", {
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
    htmlDescription = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  inputHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  responsiveHtml = /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, /*#__PURE__*/React.createElement("span", null, label), /*#__PURE__*/React.createElement("ul", {
    className: "responsive-switchers"
  }, /*#__PURE__*/React.createElement("li", {
    className: "desktop"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-desktop active",
    "data-device": "desktop"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-desktop"
  }))), /*#__PURE__*/React.createElement("li", {
    className: "tablet"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-tablet",
    "data-device": "tablet"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-tablet"
  }))), /*#__PURE__*/React.createElement("li", {
    className: "mobile"
  }, /*#__PURE__*/React.createElement("button", {
    type: "button",
    className: "preview-mobile",
    "data-device": "mobile"
  }, /*#__PURE__*/React.createElement("i", {
    className: "dashicons dashicons-smartphone"
  }))))), inputHtml);
  return /*#__PURE__*/React.createElement(React.Fragment, null, responsiveHtml, htmlDescription);
};
RadiusDimensionsComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RadiusDimensionsComponent));

/***/ }),

/***/ "./src/range-with-switchers/control.js":
/*!*********************************************!*\
  !*** ./src/range-with-switchers/control.js ***!
  \*********************************************/
/*! exports provided: responsiveRangeWithSwitcher */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveRangeWithSwitcher", function() { return responsiveRangeWithSwitcher; });
/* harmony import */ var _range_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./range-component.js */ "./src/range-with-switchers/range-component.js");

var responsiveRangeWithSwitcher = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_range_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  },
  // When we're finished loading continue processing.
  ready: function ready() {
    'use strict';

    var control = this;

    // Save the values.
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
      event.stopPropagation();

      // Set up variables
      var $this = jQuery(this),
        $devices = jQuery('.responsive-switchers'),
        $device = jQuery(event.currentTarget).data('device'),
        $control = jQuery('.customize-control.has-switchers'),
        $body = jQuery('.wp-full-overlay'),
        $footer_devices = jQuery('.wp-full-overlay-footer .devices');

      // Button class
      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active');

      // Control class
      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

      // Wrapper class
      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device);

      // Panel footer buttons
      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true);

      // Open switchers
      if ($this.hasClass('preview-desktop')) {
        $control.toggleClass('responsive-switchers-open');
      }
    });
  }
});

/***/ }),

/***/ "./src/range-with-switchers/range-component.js":
/*!*****************************************************!*\
  !*** ./src/range-with-switchers/range-component.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _extends() {
  return _extends = Object.assign ? Object.assign.bind() : function (n) {
    for (var e = 1; e < arguments.length; e++) {
      var t = arguments[e];
      for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]);
    }
    return n;
  }, _extends.apply(null, arguments);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var ResponsiveRangeWithSwitchersComponent = function ResponsiveRangeWithSwitchersComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(props.control.settings),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    link = _props$control$params.link,
    inputAttrs = _props$control$params.inputAttrs,
    name = _props$control$params.name,
    desktop = _props$control$params.desktop,
    tablet = _props$control$params.tablet,
    mobile = _props$control$params.mobile;
  var labelHtml = null,
    inputHtml = null,
    resetHtml = null,
    inp_array = [],
    reset = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Back to default', 'responsive');
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
  var updateValues = function updateValues(device, value) {
    var inputValue = Number(value);
    var updateValue = _objectSpread({}, props_value);
    updateValue["".concat(device)].set(inputValue);
    setPropsValue(updateValue);
  };
  if (label) {
    labelHtml = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, /*#__PURE__*/React.createElement("span", null, label), /*#__PURE__*/React.createElement("ul", {
      className: "responsive-switchers"
    }, /*#__PURE__*/React.createElement("li", {
      className: "desktop"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-desktop active",
      "data-device": "desktop"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-desktop"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "tablet"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-tablet",
      "data-device": "tablet"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-tablet"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "mobile"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-mobile",
      "data-device": "mobile"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-smartphone"
    })))));
  }
  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var link = device === 'desktop' ? desktop.link : device === 'tablet' ? tablet.link : mobile.link;
    if (undefined !== link) {
      var _splited_values2 = link.split("=");
      if (undefined !== _splited_values2[1]) {
        link = _splited_values2[1].replace(/"/g, "");
      }
    }
    var sliderWidth = (props_value["".concat(device)].get() - inp_array.min) / (inp_array.max - inp_array.min) * 100;
    return /*#__PURE__*/React.createElement("div", {
      className: "".concat(device, " control-wrap ").concat(active)
    }, /*#__PURE__*/React.createElement("input", _extends({}, inp_array, {
      type: "range",
      value: props_value["".concat(device)].get(),
      "data-customize-setting-link": link,
      "data-reset_value": props.control.params["default"],
      onChange: function onChange(event) {
        return updateValues(device, event.target.value);
      },
      style: {
        background: "linear-gradient(to right, #007CBA ".concat(sliderWidth, "%, #D9D9D9 ").concat(sliderWidth, "%)")
      }
    })), /*#__PURE__*/React.createElement("input", _extends({}, inp_array, {
      type: "number",
      "data-name": name,
      "data-customize-setting-link": link,
      className: "responsive-range-switchers-input",
      value: props_value["".concat(device)].get(),
      onChange: function onChange() {
        return updateValues(device, event.target.value);
      }
    })));
  };
  var renderResetHtml = function renderResetHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    return /*#__PURE__*/React.createElement("div", {
      className: "responsive-reset-slider ".concat(device, " control-wrap ").concat(active),
      onClick: function onClick(event) {
        event.stopPropagation();
        updateValues(device, props.control.params["".concat(device)]["default"]);
      }
    }, /*#__PURE__*/React.createElement("span", {
      className: "responsive-reset-slider"
    }, /*#__PURE__*/React.createElement("span", {
      className: "dashicons dashicons-image-rotate",
      title: reset
    })));
  };
  inputHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  resetHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderResetHtml('desktop', 'active'), renderResetHtml('tablet'), renderResetHtml('mobile'));
  return /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    className: "responsive-range-control-label"
  }, labelHtml, resetHtml), inputHtml);
};
ResponsiveRangeWithSwitchersComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ResponsiveRangeWithSwitchersComponent));

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
/* harmony import */ var _redirect_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./redirect-component.js */ "./src/redirect/redirect-component.js");

var responsiveRedirect = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_redirect_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);

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
    linkHtml = /*#__PURE__*/React.createElement("a", {
      href: "#",
      onClick: function onClick() {
        onLinkClick();
      },
      className: "customizer-link customizer-redirect-button responsive-customizer-redirect-button",
      "data-customizer-linked": linked,
      "data-res-customizer-link-type": link_type
    }, /*#__PURE__*/React.createElement("div", {
      className: "responsive-customizer-redirect-button-inner-wrap"
    }, /*#__PURE__*/React.createElement("h3", {
      className: "redirect-button-label"
    }, label), /*#__PURE__*/React.createElement("span", {
      "class": "arrow-head"
    })));
  }
  return /*#__PURE__*/React.createElement(React.Fragment, null, linkHtml);
};
RedirectComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RedirectComponent));

/***/ }),

/***/ "./src/section-toggle/control.js":
/*!***************************************!*\
  !*** ./src/section-toggle/control.js ***!
  \***************************************/
/*! exports provided: responsiveSectionToggle */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveSectionToggle", function() { return responsiveSectionToggle; });
/* harmony import */ var _section_toggle__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./section-toggle */ "./src/section-toggle/section-toggle.js");

var responsiveSectionToggle = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_section_toggle__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/section-toggle/section-toggle.js":
/*!**********************************************!*\
  !*** ./src/section-toggle/section-toggle.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}


var ToggleControl = wp.components.ToggleControl;
var SectionToggle = function SectionToggle(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
    _useState4 = _slicedToArray(_useState3, 2),
    showTooltip = _useState4[0],
    setShowTooltip = _useState4[1];
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    description = _props$control$params.description,
    link_type = _props$control$params.link_type,
    linked = _props$control$params.linked;
  var onToggleClick = function onToggleClick(props_value) {
    var newValue = !props_value;
    setPropsValue(newValue);
    props.control.setting.set(newValue);
    if (newValue) {
      onLinkClick(newValue);
    }
  };
  var onLinkClick = function onLinkClick() {
    var currentValue = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : props_value;
    if (!currentValue) {
      return;
    }
    switch (link_type) {
      case 'section':
        wp.customize.section(linked).expand();
        break;
      case 'control':
        wp.customize.control(linked).focus();
        break;
    }
  };
  var htmlToRender = null;
  if (linked && label) {
    htmlToRender = /*#__PURE__*/React.createElement("div", {
      className: "responsive-section-toggle-control-wrapper ".concat(props_value ? 'active' : ''),
      "data-customizer-linked": linked,
      "data-res-customizer-link-type": link_type,
      onClick: function onClick() {
        onLinkClick();
      },
      onMouseEnter: function onMouseEnter() {
        if (!props_value) setShowTooltip(true);
      },
      onMouseLeave: function onMouseLeave() {
        return setShowTooltip(false);
      }
    }, showTooltip && description && /*#__PURE__*/React.createElement("div", {
      className: "responsive-tooltip"
    }, description), /*#__PURE__*/React.createElement("h3", {
      className: "label"
    }, label), /*#__PURE__*/React.createElement("div", {
      onClick: function onClick(e) {
        e.stopPropagation(); // stops parent div click
      }
    }, /*#__PURE__*/React.createElement(ToggleControl, {
      __nextHasNoMarginBottom: true,
      checked: props_value,
      onChange: function onChange() {
        onToggleClick(props_value);
      },
      className: "responsive-section-toggle-control"
    })), /*#__PURE__*/React.createElement("span", {
      className: "arrow-head"
    }));
  }
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-customizer-section-toggle-control"
  }, htmlToRender);
};
SectionToggle.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SectionToggle));

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
/* harmony import */ var _select_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./select-component.js */ "./src/select/select-component.js");

var responsiveSelect = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_select_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}


var SelectComponent = function SelectComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
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
    htmlLabel = /*#__PURE__*/React.createElement("label", {
      htmlFor: id,
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  var optionsHtml = Object.entries(choices).map(function (key) {
    var html = /*#__PURE__*/React.createElement("option", {
      key: key[0],
      value: key[0]
    }, key[1]);
    return html;
  });
  return /*#__PURE__*/React.createElement(React.Fragment, null, htmlLabel, descriptionHtml, /*#__PURE__*/React.createElement("select", {
    "data-name": name,
    "data-value": props_value,
    value: props_value,
    onChange: function onChange() {
      onSelectChange(event.target.value);
    }
  }, optionsHtml));
};
SelectComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SelectComponent));

/***/ }),

/***/ "./src/selectbtn/control.js":
/*!**********************************!*\
  !*** ./src/selectbtn/control.js ***!
  \**********************************/
/*! exports provided: responsiveSelectButton */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveSelectButton", function() { return responsiveSelectButton; });
/* harmony import */ var _selectbtn_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./selectbtn-component */ "./src/selectbtn/selectbtn-component.js");

var responsiveSelectButton = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_selectbtn_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/selectbtn/selectbtn-component.js":
/*!**********************************************!*\
  !*** ./src/selectbtn/selectbtn-component.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../icons */ "./src/icons.js");
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var SelectButtonComponent = function SelectButtonComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var onOptionClick = function onOptionClick(value) {
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
  var hasDashicons = false;
  if (label) {
    htmlLabel = /*#__PURE__*/React.createElement("label", {
      htmlFor: id,
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  var optionsHtml = Object.entries(choices).map(function (_ref) {
    var _ref2 = _slicedToArray(_ref, 2),
      choiceValue = _ref2[0],
      icon = _ref2[1];
    if (icon.toLowerCase().includes('dashicons')) {
      return /*#__PURE__*/React.createElement("button", {
        key: choiceValue,
        type: "button",
        className: "customize-control-responsive-selectbtn__button selectbtn-dashicon ".concat(props_value === choiceValue ? 'active' : ''),
        onClick: function onClick() {
          return onOptionClick(choiceValue);
        }
      }, /*#__PURE__*/React.createElement("span", {
        className: "responsive-selectbtn-dashicon dashicons ".concat(icon)
      }));
    }
    if (icon.toLowerCase().includes('icon')) {
      return _icons__WEBPACK_IMPORTED_MODULE_2__["default"][icon] ? /*#__PURE__*/React.createElement("button", {
        key: choiceValue,
        type: "button",
        className: "customize-control-responsive-selectbtn__button selectbtn-icon ".concat(props_value === choiceValue ? 'active' : ''),
        onClick: function onClick() {
          return onOptionClick(choiceValue);
        }
      }, _icons__WEBPACK_IMPORTED_MODULE_2__["default"][icon]) : /*#__PURE__*/React.createElement("button", {
        key: choiceValue,
        type: "button",
        className: "customize-control-responsive-selectbtn__button selectbtn-icon ".concat(props_value === choiceValue ? 'active' : ''),
        onClick: function onClick() {
          return onOptionClick(choiceValue);
        }
      }, /*#__PURE__*/React.createElement("span", {
        className: "responsive-selectbtn-icon icon ".concat(icon)
      }));
    }
    return /*#__PURE__*/React.createElement("button", {
      key: choiceValue,
      type: "button",
      className: "customize-control-responsive-selectbtn__button selectbtn-text ".concat(props_value === choiceValue ? 'active' : ''),
      onClick: function onClick() {
        return onOptionClick(choiceValue);
      }
    }, /*#__PURE__*/React.createElement("span", {
      className: "responsive-selectbtn-text ".concat(icon)
    }, icon));
  });
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
    "class": "responsive-selectbtn-control-wrapper"
  }, htmlLabel, descriptionHtml, /*#__PURE__*/React.createElement("div", {
    className: "customize-control-responsive-selectbtn ".concat(id.includes('font-style') ? 'responsive-font-style-selectbtn-control' : ''),
    "data-name": name,
    "data-value": props_value,
    value: props_value
  }, optionsHtml)));
};
SelectButtonComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SelectButtonComponent));

/***/ }),

/***/ "./src/shadow/control.js":
/*!*******************************!*\
  !*** ./src/shadow/control.js ***!
  \*******************************/
/*! exports provided: responsiveShadow */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveShadow", function() { return responsiveShadow; });
/* harmony import */ var _shadow_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./shadow-component */ "./src/shadow/shadow-component.js");

var responsiveShadow = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_shadow_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/shadow/shadow-component.js":
/*!****************************************!*\
  !*** ./src/shadow/shadow-component.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}




var ShadowComponent = function ShadowComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.settings['x_axis'].get()),
    _useState2 = _slicedToArray(_useState, 2),
    xAxis = _useState2[0],
    setXAxis = _useState2[1];
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.settings['y_axis'].get()),
    _useState4 = _slicedToArray(_useState3, 2),
    yAxis = _useState4[0],
    setYAxis = _useState4[1];
  var _useState5 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.settings['blur'].get()),
    _useState6 = _slicedToArray(_useState5, 2),
    blur = _useState6[0],
    setBlur = _useState6[1];
  var _useState7 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.settings['spread'].get()),
    _useState8 = _slicedToArray(_useState7, 2),
    spread = _useState8[0],
    setSpread = _useState8[1];
  var _useState9 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.settings['inset'].get()),
    _useState0 = _slicedToArray(_useState9, 2),
    inset = _useState0[0],
    setInset = _useState0[1];
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    name = _props$control$params.name,
    description = _props$control$params.description,
    id = _props$control$params.id;
  var htmlLabel = null;
  var descriptionHtml = null;
  if (label) {
    htmlLabel = /*#__PURE__*/React.createElement("label", {
      htmlFor: id,
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("i", {
      className: "res-control-tooltip dashicons dashicons-editor-help",
      title: description
    });
  }
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-controls-container"
  }, htmlLabel, /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-controls-wrapper"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-number-control"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
    __next40pxDefaultSize: true,
    onChange: function onChange(xAxisValue) {
      props.control.settings['x_axis'].set(xAxisValue);
    },
    value: xAxis,
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('X', 'responsive'),
    max: 100,
    min: -100
  })), /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-number-control"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
    __next40pxDefaultSize: true,
    onChange: function onChange(yAxisValue) {
      props.control.settings['y_axis'].set(yAxisValue);
    },
    value: yAxis,
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Y', 'responsive'),
    max: 100,
    min: -100
  })), /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-number-control"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
    __next40pxDefaultSize: true,
    onChange: function onChange(blurValue) {
      props.control.settings['blur'].set(blurValue);
    },
    value: blur,
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Blur', 'responsive'),
    max: 100,
    min: -100
  })), /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-number-control"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
    __next40pxDefaultSize: true,
    onChange: function onChange(spreadValue) {
      props.control.settings['spread'].set(spreadValue);
    },
    value: spread,
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Spread', 'responsive'),
    max: 100,
    min: -100
  }))), /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-controls-wrapper"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-shadow-inset-control"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ToggleControl"], {
    __nextHasNoMarginBottom: true,
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Inset', 'responsive'),
    checked: inset,
    onChange: function onChange(newValue) {
      setInset(!inset);
      props.control.settings['inset'].set(!inset);
    }
  })))));
};
ShadowComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ShadowComponent));

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
/* harmony import */ var _slider_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slider-component.js */ "./src/slider/slider-component.js");

var responsiveSlider = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_slider_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _extends() {
  return _extends = Object.assign ? Object.assign.bind() : function (n) {
    for (var e = 1; e < arguments.length; e++) {
      var t = arguments[e];
      for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]);
    }
    return n;
  }, _extends.apply(null, arguments);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var ResponsiveSliderComponent = function ResponsiveSliderComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
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
    reset = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Back to default', 'responsive');
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("span", {
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
  return /*#__PURE__*/React.createElement("label", null, /*#__PURE__*/React.createElement("label", {
    className: "responsive-range-control-label"
  }, /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, label), /*#__PURE__*/React.createElement("div", {
    className: "responsive-reset-slider",
    onClick: function onClick() {
      updateValues(props.control.params["default"]);
    }
  }, /*#__PURE__*/React.createElement("span", {
    className: "responsive-reset-slider"
  }, /*#__PURE__*/React.createElement("span", {
    className: "dashicons dashicons-image-rotate",
    title: reset
  })))), descriptionHtml, /*#__PURE__*/React.createElement("div", {
    className: "desktop control-wrap active"
  }, /*#__PURE__*/React.createElement("input", _extends({}, inp_array, {
    type: "range",
    value: props_value,
    "data-reset_value": props.control.params["default"],
    onChange: function onChange() {
      return updateValues(event.target.value);
    },
    style: {
      background: "linear-gradient(to right, #007CBA ".concat((props_value - inp_array.min) / (inp_array.max - inp_array.min) * 100, "%, #D9D9D9 ").concat((props_value - inp_array.min) / (inp_array.max - inp_array.min) * 100, "%)")
    }
  })), /*#__PURE__*/React.createElement("input", _extends({}, inp_array, {
    type: "number",
    "data-name": name,
    className: "responsive-range-input",
    value: props_value,
    onChange: function onChange() {
      return updateValues(event.target.value);
    }
  }))));
};
ResponsiveSliderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ResponsiveSliderComponent));

/***/ }),

/***/ "./src/social/controls.js":
/*!********************************!*\
  !*** ./src/social/controls.js ***!
  \********************************/
/*! exports provided: responsiveSocial */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveSocial", function() { return responsiveSocial; });
/* harmony import */ var _social_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./social-component.js */ "./src/social/social-component.js");

var responsiveSocial = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_social_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/social/social-component.js":
/*!****************************************!*\
  !*** ./src/social/social-component.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.es.js");
/* harmony import */ var _social_item_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./social-item-component */ "./src/social/social-item-component.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _toConsumableArray(r) {
  return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread();
}
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _iterableToArray(r) {
  if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r);
}
function _arrayWithoutHoles(r) {
  if (Array.isArray(r)) return _arrayLikeToArray(r);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}





;

var ResponsiveSocialComponent = function ResponsiveSocialComponent(props) {
  var _availableSocialOptio;
  var choices = props.control.params.choices;
  var baseDefault = {
    items: [{
      id: 'facebook',
      enabled: true,
      source: 'icon',
      url: '',
      imageid: '',
      width: 24,
      icon: 'facebook',
      label: 'Facebook',
      svg: '',
      link: '',
      newTab: false
    }, {
      id: 'twitter',
      enabled: true,
      source: 'icon',
      url: '',
      imageid: '',
      width: 24,
      icon: 'twitterAlt2',
      label: 'X',
      svg: '',
      link: '',
      newTab: false
    }, {
      id: 'instagram',
      enabled: true,
      source: 'icon',
      url: '',
      imageid: '',
      width: 24,
      icon: 'instagram',
      label: 'Instagram',
      svg: '',
      link: '',
      newTab: false
    }]
  };
  var defaultValue = props.control.params["default"] ? _objectSpread(_objectSpread({}, baseDefault), props.control.params["default"]) : baseDefault;
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_0__["useState"])(props.control.setting.get() ? _objectSpread(_objectSpread({}, defaultValue), props.control.setting.get()) : defaultValue),
    _useState2 = _slicedToArray(_useState, 2),
    value = _useState2[0],
    setValue = _useState2[1];
  var defaultParams = {
    group: 'social_item_group',
    options: [{
      value: 'twitter',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('X formerly Twitter', 'responsive')
    }, {
      value: 'facebook',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Facebook', 'responsive')
    }, {
      value: 'linkedin',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Linkedin', 'responsive')
    }, {
      value: 'youtube',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('YouTube', 'responsive')
    }, {
      value: 'stumbleupon',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Stumbleupon', 'responsive')
    }, {
      value: 'rss',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('RSS', 'responsive')
    }, {
      value: 'instagram',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Instagram', 'responsive')
    }, {
      value: 'pinterest',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Pinterest', 'responsive')
    }, {
      value: 'yelp',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Yelp', 'responsive')
    }, {
      value: 'vimeo',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Vimeo', 'responsive')
    }, {
      value: 'foursquare',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Foursquare', 'responsive')
    }, {
      value: 'email',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Email', 'responsive')
    }, {
      value: 'bandcamp',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Bandcamp', 'responsive')
    }, {
      value: 'behance',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Behance', 'responsive')
    }, {
      value: 'discord',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Discord', 'responsive')
    }, {
      value: 'github',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('GitHub', 'responsive')
    }, {
      value: 'googlereviews',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Google Reviews', 'responsive')
    }, {
      value: 'medium',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Medium', 'responsive')
    }, {
      value: 'patreon',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Patreon', 'responsive')
    }, {
      value: 'phone',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Phone', 'responsive')
    }, {
      value: 'reddit',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Reddit', 'responsive')
    }, {
      value: 'soundcloud',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('SoundCloud', 'responsive')
    }, {
      value: 'spotify',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Spotify', 'responsive')
    }, {
      value: 'telegram',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Telegram', 'responsive')
    }, {
      value: 'threads',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Threads', 'responsive')
    }, {
      value: 'tiktok',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('TikTok', 'responsive')
    }, {
      value: 'vk',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('VK', 'responsive')
    }, {
      value: 'wordpress',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('WordPress', 'responsive')
    }, {
      value: 'whatsapp',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('WhatsApp', 'responsive')
    }, {
      value: 'custom1',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Custom 1', 'responsive')
    }, {
      value: 'custom2',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Custom 2', 'responsive')
    }, {
      value: 'custom3',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Custom 3', 'responsive')
    }]
  };
  var controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.control.params.input_attrs) : defaultParams;
  var availableSocialOptions = controlParams.options.filter(function (option) {
    return !value.items.some(function (item) {
      return item.id === option.value;
    });
  });
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_0__["useState"])(((_availableSocialOptio = availableSocialOptions[0]) === null || _availableSocialOptio === void 0 ? void 0 : _availableSocialOptio.value) || ''),
    _useState4 = _slicedToArray(_useState3, 2),
    currentControl = _useState4[0],
    setCurrentControl = _useState4[1];
  var _useState5 = Object(react__WEBPACK_IMPORTED_MODULE_0__["useState"])(false),
    _useState6 = _slicedToArray(_useState5, 2),
    isVisible = _useState6[0],
    setIsVisible = _useState6[1];
  var updateValues = function updateValues(newValue) {
    props.control.setting.set(_objectSpread(_objectSpread(_objectSpread({}, props.control.setting.get()), newValue), {}, {
      flag: !props.control.setting.get().flag
    }));
  };
  var saveArrayUpdate = function saveArrayUpdate(newValue, index) {
    var updatedItems = value.items.map(function (item, idx) {
      return idx === index ? _objectSpread(_objectSpread({}, item), newValue) : item;
    });
    var updatedValue = _objectSpread(_objectSpread({}, value), {}, {
      items: updatedItems
    });
    setValue(updatedValue);
    updateValues(updatedValue);
  };
  var addItem = function addItem(selectedControl) {
    if (selectedControl) {
      var _controlParams$option, _updatedOptions$;
      var newItem = {
        id: selectedControl,
        enabled: true,
        source: 'icon',
        url: '',
        imageid: '',
        width: 24,
        icon: selectedControl,
        label: ((_controlParams$option = controlParams.options.find(function (o) {
          return o.value === selectedControl;
        })) === null || _controlParams$option === void 0 ? void 0 : _controlParams$option.label) || '',
        svg: '',
        link: '',
        newTab: false
      };
      var updatedValue = _objectSpread(_objectSpread({}, value), {}, {
        items: [].concat(_toConsumableArray(value.items), [newItem])
      });
      setValue(updatedValue);
      updateValues(updatedValue);
      var updatedOptions = controlParams.options.filter(function (option) {
        return !updatedValue.items.some(function (item) {
          return item.id === option.value;
        });
      });
      setCurrentControl(((_updatedOptions$ = updatedOptions[0]) === null || _updatedOptions$ === void 0 ? void 0 : _updatedOptions$.value) || '');
    }
    setIsVisible(false);
  };
  var removeItem = function removeItem(index) {
    var updatedItems = value.items.filter(function (_, idx) {
      return idx !== index;
    });
    var updatedValue = _objectSpread(_objectSpread({}, value), {}, {
      items: updatedItems
    });
    setValue(updatedValue);
    updateValues(updatedValue);
  };
  var onDragEnd = function onDragEnd(newItems) {
    var updatedItems = newItems.map(function (item) {
      return value.items.find(function (originalItem) {
        return originalItem.id === item.id;
      });
    });
    if (JSON.stringify(updatedItems) !== JSON.stringify(value.items)) {
      var updatedValue = _objectSpread(_objectSpread({}, value), {}, {
        items: updatedItems
      });
      setValue(updatedValue);
      updateValues(updatedValue);
    }
  };
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react__WEBPACK_IMPORTED_MODULE_0___default.a.Fragment, null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "responsive-social-items-container"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_sortablejs__WEBPACK_IMPORTED_MODULE_2__["ReactSortable"], {
    animation: 100,
    list: value.items.map(function (item) {
      return {
        id: item.id
      };
    }),
    setList: onDragEnd,
    group: controlParams.group,
    className: "responsive-social-items-wrapper",
    handle: ".responsive-social-item-panel-header"
  }, value.items.map(function (item, index) {
    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_social_item_component__WEBPACK_IMPORTED_MODULE_3__["default"], {
      key: item.id,
      item: item,
      index: index,
      removeItem: removeItem,
      toggleEnabled: function toggleEnabled(enabled) {
        return saveArrayUpdate({
          enabled: enabled
        }, index);
      },
      onChangeLabel: function onChangeLabel(label) {
        return saveArrayUpdate({
          label: label
        }, index);
      },
      onChangeIcon: function onChangeIcon(icon) {
        return saveArrayUpdate({
          icon: icon
        }, index);
      },
      onChangeURL: function onChangeURL(url) {
        return saveArrayUpdate({
          url: url
        }, index);
      },
      onChangeWidth: function onChangeWidth(width) {
        return saveArrayUpdate({
          width: width
        }, index);
      },
      onChangeSource: function onChangeSource(source) {
        return saveArrayUpdate({
          source: source
        }, index);
      },
      onChangeSVG: function onChangeSVG(svg) {
        return saveArrayUpdate({
          svg: svg
        }, index);
      },
      onChangeLink: function onChangeLink(link) {
        return saveArrayUpdate({
          link: link
        }, index);
      },
      onChangeNewTab: function onChangeNewTab(newTab) {
        return saveArrayUpdate({
          newTab: newTab
        }, index);
      }
    });
  })), availableSocialOptions.length > 0 && /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
    className: "responsive-add-social-item",
    primary: true,
    onClick: function onClick() {
      setIsVisible(!isVisible);
    }
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Dashicon"], {
    icon: "plus"
  }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Add Social', 'responsive')), availableSocialOptions.length > 0 && isVisible && /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "responsive-social-icons-container"
  }, availableSocialOptions.map(function (option) {
    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      key: option.value,
      onClick: function onClick() {
        setCurrentControl(option.value);
        addItem(option.value);
      }
    }, option.label);
  }))));
};
ResponsiveSocialComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (/*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default.a.memo(ResponsiveSocialComponent));

/***/ }),

/***/ "./src/social/social-icons.js":
/*!************************************!*\
  !*** ./src/social/social-icons.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var SocialIcons = {
  behance: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "28",
    viewBox: "0 0 32 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M28.875 5.297h-7.984v1.937h7.984V5.297zm-3.937 6.656c-1.875 0-3.125 1.172-3.25 3.047h6.375c-.172-1.891-1.156-3.047-3.125-3.047zm.25 9.141c1.188 0 2.719-.641 3.094-1.859h3.453c-1.062 3.266-3.266 4.797-6.672 4.797-4.5 0-7.297-3.047-7.297-7.484 0-4.281 2.953-7.547 7.297-7.547 4.469 0 6.937 3.516 6.937 7.734 0 .25-.016.5-.031.734H21.688c0 2.281 1.203 3.625 3.5 3.625zm-20.86-.782h4.625c1.766 0 3.203-.625 3.203-2.609 0-2.016-1.203-2.812-3.109-2.812H4.328v5.422zm0-8.39h4.391c1.547 0 2.641-.672 2.641-2.344 0-1.813-1.406-2.25-2.969-2.25H4.329v4.594zM0 3.969h9.281c3.375 0 6.297.953 6.297 4.875 0 1.984-.922 3.266-2.688 4.109 2.422.688 3.594 2.516 3.594 4.984 0 4-3.359 5.719-6.937 5.719H0V3.968z"
  })),
  dribbble: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M16 23.438c-.156-.906-.75-4.031-2.188-7.781-.016 0-.047.016-.063.016 0 0-6.078 2.125-8.047 6.406-.094-.078-.234-.172-.234-.172a10.297 10.297 0 006.531 2.344c1.422 0 2.766-.297 4-.812zm-2.891-9.485a29.025 29.025 0 00-.828-1.734C7 13.797 1.937 13.672 1.765 13.672c-.016.109-.016.219-.016.328 0 2.625 1 5.031 2.625 6.844 2.797-4.984 8.328-6.766 8.328-6.766.141-.047.281-.078.406-.125zm-1.671-3.312a61.656 61.656 0 00-3.813-5.906 10.267 10.267 0 00-5.656 7.156c.266 0 4.547.047 9.469-1.25zm10.687 4.984c-.219-.063-3.078-.969-6.391-.453 1.344 3.703 1.891 6.719 2 7.328a10.293 10.293 0 004.391-6.875zM9.547 4.047c-.016 0-.016 0-.031.016 0 0 .016-.016.031-.016zm9.219 2.265a10.17 10.17 0 00-9.188-2.265c.156.203 2.094 2.75 3.844 5.969 3.859-1.437 5.313-3.656 5.344-3.703zm3.484 7.579a10.273 10.273 0 00-2.328-6.406c-.031.031-1.672 2.406-5.719 4.062.234.484.469.984.688 1.484.078.172.141.359.219.531 3.531-.453 7.016.313 7.141.328zM24 14c0 6.625-5.375 12-12 12S0 20.625 0 14 5.375 2 12 2s12 5.375 12 12z"
  })),
  facebook: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "32",
    viewBox: "0 0 32 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M31.997 15.999C31.997 7.163 24.834 0 15.998 0S-.001 7.163-.001 15.999c0 7.985 5.851 14.604 13.499 15.804v-11.18H9.436v-4.625h4.062v-3.525c0-4.01 2.389-6.225 6.043-6.225 1.75 0 3.581.313 3.581.313v3.937h-2.017c-1.987 0-2.607 1.233-2.607 2.498v3.001h4.437l-.709 4.625h-3.728v11.18c7.649-1.2 13.499-7.819 13.499-15.804z"
  })),
  facebookAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M17 3v2h-2c-.552 0-1.053.225-1.414.586S13 6.448 13 7v3a1 1 0 001 1h2.719l-.5 2H14a1 1 0 00-1 1v7h-2v-7a1 1 0 00-1-1H8v-2h2a1 1 0 001-1V7c0-1.105.447-2.103 1.172-2.828S13.895 3 15 3zm1-2h-3c-1.657 0-3.158.673-4.243 1.757S9 5.343 9 7v2H7a1 1 0 00-1 1v4a1 1 0 001 1h2v7a1 1 0 001 1h4a1 1 0 001-1v-7h2c.466 0 .858-.319.97-.757l1-4A1 1 0 0018 9h-3V7h3a1 1 0 001-1V2a1 1 0 00-1-1z"
  })),
  facebookAlt2: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "16",
    height: "28",
    viewBox: "0 0 16 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M14.984.187v4.125h-2.453c-1.922 0-2.281.922-2.281 2.25v2.953h4.578l-.609 4.625H10.25v11.859H5.469V14.14H1.485V9.515h3.984V6.109C5.469 2.156 7.891 0 11.422 0c1.687 0 3.141.125 3.563.187z"
  })),
  github: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M12 2c6.625 0 12 5.375 12 12 0 5.297-3.437 9.797-8.203 11.391-.609.109-.828-.266-.828-.578 0-.391.016-1.687.016-3.297 0-1.125-.375-1.844-.812-2.219 2.672-.297 5.484-1.313 5.484-5.922 0-1.313-.469-2.375-1.234-3.219.125-.313.531-1.531-.125-3.187-1-.313-3.297 1.234-3.297 1.234a11.28 11.28 0 00-6 0S6.704 6.656 5.704 6.969c-.656 1.656-.25 2.875-.125 3.187-.766.844-1.234 1.906-1.234 3.219 0 4.594 2.797 5.625 5.469 5.922-.344.313-.656.844-.766 1.609-.688.313-2.438.844-3.484-1-.656-1.141-1.844-1.234-1.844-1.234-1.172-.016-.078.734-.078.734.781.359 1.328 1.75 1.328 1.75.703 2.141 4.047 1.422 4.047 1.422 0 1 .016 1.937.016 2.234 0 .313-.219.688-.828.578C3.439 23.796.002 19.296.002 13.999c0-6.625 5.375-12 12-12zM4.547 19.234c.031-.063-.016-.141-.109-.187-.094-.031-.172-.016-.203.031-.031.063.016.141.109.187.078.047.172.031.203-.031zm.484.532c.063-.047.047-.156-.031-.25-.078-.078-.187-.109-.25-.047-.063.047-.047.156.031.25.078.078.187.109.25.047zm.469.703c.078-.063.078-.187 0-.297-.063-.109-.187-.156-.266-.094-.078.047-.078.172 0 .281s.203.156.266.109zm.656.656c.063-.063.031-.203-.063-.297-.109-.109-.25-.125-.313-.047-.078.063-.047.203.063.297.109.109.25.125.313.047zm.891.391c.031-.094-.063-.203-.203-.25-.125-.031-.266.016-.297.109s.063.203.203.234c.125.047.266 0 .297-.094zm.984.078c0-.109-.125-.187-.266-.172-.141 0-.25.078-.25.172 0 .109.109.187.266.172.141 0 .25-.078.25-.172zm.906-.156c-.016-.094-.141-.156-.281-.141-.141.031-.234.125-.219.234.016.094.141.156.281.125s.234-.125.219-.219z"
  })),
  githubAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M8.713 18.042c-1.268.38-2.06.335-2.583.17a2.282 2.282 0 01-.614-.302c-.411-.284-.727-.675-1.119-1.172-.356-.451-.85-1.107-1.551-1.476a2.694 2.694 0 00-.604-.232 1 1 0 10-.485 1.941c.074.023.155.06.155.06.252.133.487.404.914.946.366.464.856 1.098 1.553 1.579.332.229.711.426 1.149.564 1.015.321 2.236.296 3.76-.162a1 1 0 10-.575-1.915zM17 22v-3.792a4.377 4.377 0 00-.292-1.942c.777-.171 1.563-.427 2.297-.823 2.083-1.124 3.496-3.242 3.496-6.923a6.408 6.408 0 00-1.379-3.981 6.044 6.044 0 00-.293-3.933 1 1 0 00-.634-.564c-.357-.106-1.732-.309-4.373 1.362a14.24 14.24 0 00-6.646-.002C6.537-.267 5.163-.064 4.806.042a.998.998 0 00-.635.565 6.044 6.044 0 00-.292 3.932A6.414 6.414 0 002.5 8.556c0 3.622 1.389 5.723 3.441 6.859.752.416 1.56.685 2.357.867a4.395 4.395 0 00-.299 1.88L8 22a1 1 0 002 0v-3.87l-.002-.069a2.357 2.357 0 01.661-1.816 1 1 0 00-.595-1.688c-.34-.042-.677-.094-1.006-.159-.79-.156-1.518-.385-2.147-.733-1.305-.723-2.391-2.071-2.41-5.042.013-1.241.419-2.319 1.224-3.165a1 1 0 00.212-1.04 4.045 4.045 0 01-.14-2.392c.491.107 1.354.416 2.647 1.282a1 1 0 00.825.133 12.229 12.229 0 016.47.002.994.994 0 00.818-.135c1.293-.866 2.156-1.175 2.647-1.282a4.041 4.041 0 01-.141 2.392c-.129.352-.058.755.213 1.04a4.419 4.419 0 011.224 3.06c0 3.075-1.114 4.445-2.445 5.163-.623.336-1.343.555-2.123.7-.322.06-.651.106-.983.143a1 1 0 00-.608 1.689 2.36 2.36 0 01.662 1.837l-.003.078V22a1 1 0 002 0z"
  })),
  facebook_group: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "30",
    height: "28",
    viewBox: "0 0 30 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M9.266 14a5.532 5.532 0 00-4.141 2H3.031C1.468 16 0 15.25 0 13.516 0 12.25-.047 8 1.937 8c.328 0 1.953 1.328 4.062 1.328.719 0 1.406-.125 2.078-.359A7.624 7.624 0 007.999 10c0 1.422.453 2.828 1.266 4zM26 23.953C26 26.484 24.328 28 21.828 28H8.172C5.672 28 4 26.484 4 23.953 4 20.422 4.828 15 9.406 15c.531 0 2.469 2.172 5.594 2.172S20.063 15 20.594 15C25.172 15 26 20.422 26 23.953zM10 4c0 2.203-1.797 4-4 4S2 6.203 2 4s1.797-4 4-4 4 1.797 4 4zm11 6c0 3.313-2.688 6-6 6s-6-2.688-6-6 2.688-6 6-6 6 2.688 6 6zm9 3.516C30 15.25 28.531 16 26.969 16h-2.094a5.532 5.532 0 00-4.141-2A7.066 7.066 0 0022 10a7.6 7.6 0 00-.078-1.031A6.258 6.258 0 0024 9.328C26.109 9.328 27.734 8 28.062 8c1.984 0 1.937 4.25 1.937 5.516zM28 4c0 2.203-1.797 4-4 4s-4-1.797-4-4 1.797-4 4-4 4 1.797 4 4z"
  })),
  instagram: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "32",
    viewBox: "0 0 32 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M21.138.242c3.767.007 3.914.038 4.65.144 1.52.219 2.795.825 3.837 1.821a6.243 6.243 0 011.349 1.848c.442.899.659 1.75.758 3.016.021.271.031 4.592.031 8.916s-.009 8.652-.03 8.924c-.098 1.245-.315 2.104-.743 2.986a6.6 6.6 0 01-4.303 3.522c-.685.177-1.304.26-2.371.31-.381.019-4.361.024-8.342.024s-7.959-.012-8.349-.029c-.921-.044-1.639-.136-2.288-.303a6.64 6.64 0 01-4.303-3.515c-.436-.904-.642-1.731-.751-3.045-.031-.373-.039-2.296-.039-8.87 0-2.215-.002-3.866 0-5.121.006-3.764.037-3.915.144-4.652.219-1.518.825-2.795 1.825-3.833a6.302 6.302 0 011.811-1.326C4.939.603 5.78.391 7.13.278 7.504.247 9.428.24 16.008.24h5.13zm-5.139 4.122c-3.159 0-3.555.014-4.796.07-1.239.057-2.084.253-2.824.541-.765.297-1.415.695-2.061 1.342S5.273 7.613 4.975 8.378c-.288.74-.485 1.586-.541 2.824-.056 1.241-.07 1.638-.07 4.798s.014 3.556.07 4.797c.057 1.239.253 2.084.541 2.824.297.765.695 1.415 1.342 2.061s1.296 1.046 2.061 1.343c.74.288 1.586.484 2.825.541 1.241.056 1.638.07 4.798.07s3.556-.014 4.797-.07c1.239-.057 2.085-.253 2.826-.541.765-.297 1.413-.696 2.06-1.343s1.045-1.296 1.343-2.061c.286-.74.482-1.586.541-2.824.056-1.241.07-1.637.07-4.797s-.015-3.557-.07-4.798c-.058-1.239-.255-2.084-.541-2.824-.298-.765-.696-1.415-1.343-2.061s-1.295-1.045-2.061-1.342c-.742-.288-1.588-.484-2.827-.541-1.241-.056-1.636-.07-4.796-.07zm-1.042 2.097h1.044c3.107 0 3.475.011 4.702.067 1.135.052 1.75.241 2.16.401.543.211.93.463 1.337.87s.659.795.871 1.338c.159.41.349 1.025.401 2.16.056 1.227.068 1.595.068 4.701s-.012 3.474-.068 4.701c-.052 1.135-.241 1.75-.401 2.16-.211.543-.463.93-.871 1.337s-.794.659-1.337.87c-.41.16-1.026.349-2.16.401-1.227.056-1.595.068-4.702.068s-3.475-.012-4.702-.068c-1.135-.052-1.75-.242-2.161-.401-.543-.211-.931-.463-1.338-.87s-.659-.794-.871-1.337c-.159-.41-.349-1.025-.401-2.16-.056-1.227-.067-1.595-.067-4.703s.011-3.474.067-4.701c.052-1.135.241-1.75.401-2.16.211-.543.463-.931.871-1.338s.795-.659 1.338-.871c.41-.16 1.026-.349 2.161-.401 1.073-.048 1.489-.063 3.658-.065v.003zm1.044 3.563a5.977 5.977 0 10.001 11.953 5.977 5.977 0 00-.001-11.953zm0 2.097a3.879 3.879 0 110 7.758 3.879 3.879 0 010-7.758zm6.211-3.728a1.396 1.396 0 100 2.792 1.396 1.396 0 000-2.792v.001z"
  })),
  instagramAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M7 1c-1.657 0-3.158.673-4.243 1.757S1 5.343 1 7v10c0 1.657.673 3.158 1.757 4.243S5.343 23 7 23h10c1.657 0 3.158-.673 4.243-1.757S23 18.657 23 17V7c0-1.657-.673-3.158-1.757-4.243S18.657 1 17 1zm0 2h10c1.105 0 2.103.447 2.828 1.172S21 5.895 21 7v10c0 1.105-.447 2.103-1.172 2.828S18.105 21 17 21H7c-1.105 0-2.103-.447-2.828-1.172S3 18.105 3 17V7c0-1.105.447-2.103 1.172-2.828S5.895 3 7 3zm9.989 8.223a5.054 5.054 0 00-1.194-2.567 4.962 4.962 0 00-3.009-1.644 4.904 4.904 0 00-1.477-.002c-1.366.202-2.521.941-3.282 1.967s-1.133 2.347-.93 3.712.941 2.521 1.967 3.282 2.347 1.133 3.712.93 2.521-.941 3.282-1.967 1.133-2.347.93-3.712zm-1.978.294c.122.82-.1 1.609-.558 2.227s-1.15 1.059-1.969 1.18-1.609-.1-2.227-.558-1.059-1.15-1.18-1.969.1-1.609.558-2.227 1.15-1.059 1.969-1.18a2.976 2.976 0 012.688.984c.375.428.63.963.72 1.543zM17.5 7.5a1 1 0 100-2 1 1 0 000 2z"
  })),
  threads: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 448 512"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"
  })),
  linkedin: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M3.703 22.094h3.609V11.25H3.703v10.844zM7.547 7.906c-.016-1.062-.781-1.875-2.016-1.875s-2.047.812-2.047 1.875c0 1.031.781 1.875 2 1.875H5.5c1.266 0 2.047-.844 2.047-1.875zm9.141 14.188h3.609v-6.219c0-3.328-1.781-4.875-4.156-4.875-1.937 0-2.797 1.078-3.266 1.828h.031V11.25H9.297s.047 1.016 0 10.844h3.609v-6.062c0-.313.016-.641.109-.875.266-.641.859-1.313 1.859-1.313 1.297 0 1.813.984 1.813 2.453v5.797zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"
  })),
  linkedinAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M16 7c-1.933 0-3.684.785-4.95 2.05S9 12.067 9 14v7a1 1 0 001 1h4a1 1 0 001-1v-7c0-.276.111-.525.293-.707S15.724 13 16 13s.525.111.707.293.293.431.293.707v7a1 1 0 001 1h4a1 1 0 001-1v-7c0-1.933-.785-3.684-2.05-4.95S17.933 7 16 7zm0 2c1.381 0 2.63.559 3.536 1.464S21 12.619 21 14v6h-2v-6a2.997 2.997 0 00-5.121-2.121A2.997 2.997 0 0013 14v6h-2v-6c0-1.381.559-2.63 1.464-3.536S14.619 9 16 9zM2 8a1 1 0 00-1 1v12a1 1 0 001 1h4a1 1 0 001-1V9a1 1 0 00-1-1zm1 2h2v10H3zm4-6a2.997 2.997 0 00-5.121-2.121 2.997 2.997 0 000 4.242 2.997 2.997 0 004.242 0A2.997 2.997 0 007 4zM5 4c0 .276-.111.525-.293.707S4.276 5 4 5s-.525-.111-.707-.293S3 4.276 3 4s.111-.525.293-.707S3.724 3 4 3s.525.111.707.293S5 3.724 5 4z"
  })),
  medium: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "32",
    viewBox: "0 0 32 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M0 0v32h32V0zm26.584 7.581l-1.716 1.645a.5.5 0 00-.191.486v-.003 12.089a.502.502 0 00.189.481l.001.001 1.676 1.645v.361h-8.429v-.36l1.736-1.687c.171-.171.171-.22.171-.48v-9.773l-4.827 12.26h-.653L8.92 11.986v8.217a1.132 1.132 0 00.311.943l2.259 2.739v.361H5.087v-.36l2.26-2.74a1.09 1.09 0 00.289-.949l.001.007v-9.501a.83.83 0 00-.27-.702L7.366 10 5.358 7.581v-.36h6.232l4.817 10.564L20.642 7.22h5.941z"
  })),
  patreon: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "33",
    height: "32",
    viewBox: "0 0 33 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M21.37.033c-6.617 0-12.001 5.383-12.001 11.999 0 6.597 5.383 11.963 12.001 11.963 6.597 0 11.963-5.367 11.963-11.963C33.333 5.415 27.966.033 21.37.033zM.004 31.996h5.859V.033H.004z"
  })),
  pinterest: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M19.5 2C21.984 2 24 4.016 24 6.5v15c0 2.484-2.016 4.5-4.5 4.5H8.172c.516-.734 1.359-2 1.687-3.281 0 0 .141-.531.828-3.266.422.797 1.625 1.484 2.906 1.484 3.813 0 6.406-3.484 6.406-8.141 0-3.516-2.984-6.797-7.516-6.797-5.641 0-8.484 4.047-8.484 7.422 0 2.031.781 3.844 2.438 4.531.266.109.516 0 .594-.297.047-.203.172-.734.234-.953.078-.297.047-.406-.172-.656-.469-.578-.781-1.297-.781-2.344 0-3 2.25-5.672 5.844-5.672 3.187 0 4.937 1.937 4.937 4.547 0 3.422-1.516 6.312-3.766 6.312-1.234 0-2.172-1.031-1.875-2.297.359-1.5 1.047-3.125 1.047-4.203 0-.969-.516-1.781-1.594-1.781-1.266 0-2.281 1.313-2.281 3.063 0 0 0 1.125.375 1.891-1.297 5.5-1.531 6.469-1.531 6.469-.344 1.437-.203 3.109-.109 3.969H4.5A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15z"
  })),
  pinterestAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "16",
    height: "16",
    viewBox: "0 0 16 16"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M8 0C3.588 0 0 3.587 0 8s3.587 8 8 8 8-3.588 8-8-3.588-8-8-8zm0 14.931a6.959 6.959 0 01-2.053-.309c.281-.459.706-1.216.862-1.816.084-.325.431-1.647.431-1.647.225.431.888.797 1.587.797 2.091 0 3.597-1.922 3.597-4.313 0-2.291-1.869-4.003-4.272-4.003-2.991 0-4.578 2.009-4.578 4.194 0 1.016.541 2.281 1.406 2.684.131.063.2.034.231-.094.022-.097.141-.566.194-.787a.213.213 0 00-.047-.2c-.287-.347-.516-.988-.516-1.581 0-1.528 1.156-3.009 3.128-3.009 1.703 0 2.894 1.159 2.894 2.819 0 1.875-.947 3.175-2.178 3.175-.681 0-1.191-.563-1.025-1.253.197-.825.575-1.713.575-2.306 0-.531-.284-.975-.878-.975-.697 0-1.253.719-1.253 1.684 0 .612.206 1.028.206 1.028s-.688 2.903-.813 3.444c-.141.6-.084 1.441-.025 1.988a6.922 6.922 0 01-4.406-6.45 6.93 6.93 0 116.931 6.931z"
  })),
  reddit: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M14.672 17.641a.293.293 0 010 .406c-.766.766-2.234.828-2.672.828s-1.906-.063-2.672-.828a.293.293 0 010-.406.267.267 0 01.406 0c.484.484 1.531.656 2.266.656s1.781-.172 2.266-.656a.267.267 0 01.406 0zm-4.109-2.438c0 .656-.547 1.203-1.203 1.203s-1.203-.547-1.203-1.203a1.203 1.203 0 012.406 0zm5.281 0c0 .656-.547 1.203-1.203 1.203s-1.203-.547-1.203-1.203a1.203 1.203 0 012.406 0zm3.359-1.609c0-.875-.719-1.594-1.609-1.594a1.62 1.62 0 00-1.141.484c-1.094-.75-2.562-1.234-4.172-1.281l.844-3.797 2.672.609c.016.656.547 1.188 1.203 1.188S18.203 8.656 18.203 8 17.656 6.797 17 6.797a1.2 1.2 0 00-1.078.672l-2.953-.656c-.156-.047-.297.063-.328.203l-.938 4.188c-1.609.063-3.063.547-4.141 1.297a1.603 1.603 0 00-2.765 1.094c0 .641.375 1.188.906 1.453-.047.234-.078.5-.078.75 0 2.547 2.859 4.609 6.391 4.609s6.406-2.063 6.406-4.609a3.09 3.09 0 00-.094-.766c.516-.266.875-.812.875-1.437zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"
  })),
  redditAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "16",
    height: "16",
    viewBox: "0 0 16 16"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M4 10a1 1 0 112 0 1 1 0 01-2 0zm6 0a1 1 0 112 0 1 1 0 01-2 0zm.049 2.137a.593.593 0 11.735.933c-.717.565-1.81.93-2.783.93s-2.066-.365-2.784-.93a.593.593 0 11.735-.933c.413.325 1.23.675 2.049.675s1.636-.35 2.049-.675zM16 8a2 2 0 00-3.748-.972c-1.028-.562-2.28-.926-3.645-1.01L9.8 3.338l2.284.659a1.5 1.5 0 10.094-1.209l-2.545-.735a.593.593 0 00-.707.329L7.305 6.023c-1.33.094-2.551.453-3.557 1.004a2 2 0 10-2.555 2.802A3.661 3.661 0 001 10.999c0 2.761 3.134 5 7 5s7-2.239 7-5c0-.403-.067-.795-.193-1.17A2 2 0 0016 7.999zm-2.5-5.062a.563.563 0 110 1.126.563.563 0 010-1.126zM1 8a1 1 0 011.904-.427 5.292 5.292 0 00-1.276 1.355A1.001 1.001 0 011 8zm7 6.813c-3.21 0-5.813-1.707-5.813-3.813S4.789 7.187 8 7.187c3.21 0 5.813 1.707 5.813 3.813S11.211 14.813 8 14.813zm6.372-5.885a5.276 5.276 0 00-1.276-1.355C13.257 7.235 13.601 7 14 7a1.001 1.001 0 01.372 1.928z"
  })),
  rss: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M8 20c0-1.109-.891-2-2-2s-2 .891-2 2 .891 2 2 2 2-.891 2-2zm5.484 1.469a9.468 9.468 0 00-8.953-8.953c-.141-.016-.281.047-.375.141S4 12.876 4 13.016v2c0 .266.203.484.469.5 3.203.234 5.781 2.812 6.016 6.016a.498.498 0 00.5.469h2c.141 0 .266-.063.359-.156s.156-.234.141-.375zm6 .015C19.218 13.359 12.64 6.781 4.515 6.515a.38.38 0 00-.359.141.508.508 0 00-.156.359v2c0 .266.219.484.484.5 6.484.234 11.766 5.516 12 12a.51.51 0 00.5.484h2a.509.509 0 00.359-.156.4.4 0 00.141-.359zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"
  })),
  rssAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M4 12c2.209 0 4.208.894 5.657 2.343S12 17.791 12 20a1 1 0 002 0c0-2.761-1.12-5.263-2.929-7.071S6.761 10 4 10a1 1 0 000 2zm0-7c4.142 0 7.891 1.678 10.607 4.393S19 15.858 19 20a1 1 0 002 0c0-4.694-1.904-8.946-4.979-12.021S8.694 3 4 3a1 1 0 000 2zm3 14c0-.552-.225-1.053-.586-1.414a1.996 1.996 0 00-2.828 0 1.996 1.996 0 000 2.828 1.996 1.996 0 002.828 0C6.775 20.053 7 19.552 7 19z"
  })),
  twitter: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "26",
    height: "28",
    viewBox: "0 0 26 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M25.312 6.375a10.85 10.85 0 01-2.531 2.609c.016.219.016.438.016.656 0 6.672-5.078 14.359-14.359 14.359-2.859 0-5.516-.828-7.75-2.266.406.047.797.063 1.219.063 2.359 0 4.531-.797 6.266-2.156a5.056 5.056 0 01-4.719-3.5c.313.047.625.078.953.078.453 0 .906-.063 1.328-.172a5.048 5.048 0 01-4.047-4.953v-.063a5.093 5.093 0 002.281.641 5.044 5.044 0 01-2.25-4.203c0-.938.25-1.797.688-2.547a14.344 14.344 0 0010.406 5.281 5.708 5.708 0 01-.125-1.156 5.045 5.045 0 015.047-5.047 5.03 5.03 0 013.687 1.594 9.943 9.943 0 003.203-1.219 5.032 5.032 0 01-2.219 2.781c1.016-.109 2-.391 2.906-.781z"
  })),
  twitterAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M20.833 5.262a6.685 6.685 0 01-.616.696.997.997 0 00-.278.908c.037.182.06.404.061.634 0 5.256-2.429 8.971-5.81 10.898-2.647 1.509-5.938 1.955-9.222 1.12a12.682 12.682 0 003.593-1.69 1 1 0 00-.156-1.741c-2.774-1.233-4.13-2.931-4.769-4.593-.417-1.084-.546-2.198-.52-3.227.021-.811.138-1.56.278-2.182.394.343.803.706 1.235 1.038a11.59 11.59 0 007.395 2.407c.543-.015.976-.457.976-1V7.519a3.459 3.459 0 011.196-2.674c.725-.631 1.636-.908 2.526-.846s1.753.463 2.384 1.188a1 1 0 001.033.304c.231-.067.463-.143.695-.228zm1.591-3.079a9.884 9.884 0 01-2.287 1.205 5.469 5.469 0 00-3.276-1.385 5.465 5.465 0 00-3.977 1.332A5.464 5.464 0 0011 7.507a9.589 9.589 0 01-5.15-1.97 9.87 9.87 0 01-2.034-2.116 1 1 0 00-1.729.172s-.132.299-.285.76a13.57 13.57 0 00-.357 1.29 13.224 13.224 0 00-.326 2.571c-.031 1.227.12 2.612.652 3.996.683 1.775 1.966 3.478 4.147 4.823A10.505 10.505 0 011.045 18a1 1 0 00-.53 1.873c4.905 2.725 10.426 2.678 14.666.261C19.221 17.833 22 13.434 22 7.5a5.565 5.565 0 00-.023-.489 8.626 8.626 0 001.996-3.781 1 1 0 00-1.55-1.047z"
  })),
  twitterAlt2: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "23",
    height: "24",
    viewBox: "0 0 23 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M13.969 10.157L22.707 0h-2.071l-7.587 8.819L6.989 0H0l9.164 13.336L0 23.987h2.071l8.012-9.313 6.4 9.313h6.989l-9.503-13.831zm-2.836 3.297L2.817 1.559h3.181L20.638 22.5h-3.181l-6.324-9.046z"
  })),
  vimeo: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "28",
    height: "28",
    viewBox: "0 0 28 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M26.703 8.094c-.109 2.469-1.844 5.859-5.187 10.172C18.047 22.75 15.141 25 12.735 25c-1.484 0-2.734-1.375-3.75-4.109-.688-2.5-1.375-5.016-2.063-7.531-.75-2.734-1.578-4.094-2.453-4.094-.187 0-.844.391-1.984 1.188L1.282 8.923c1.25-1.109 2.484-2.234 3.719-3.313 1.656-1.469 2.922-2.203 3.766-2.281 1.984-.187 3.187 1.156 3.656 4.047.484 3.125.844 5.078 1.031 5.828.578 2.594 1.188 3.891 1.875 3.891.531 0 1.328-.828 2.406-2.516 1.062-1.687 1.625-2.969 1.703-3.844.141-1.453-.422-2.172-1.703-2.172-.609 0-1.234.141-1.891.406 1.25-4.094 3.641-6.078 7.172-5.969 2.609.078 3.844 1.781 3.687 5.094z"
  })),
  vk: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "31",
    height: "28",
    viewBox: "0 0 31 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M29.953 8.125c.234.641-.5 2.141-2.344 4.594-3.031 4.031-3.359 3.656-.859 5.984 2.406 2.234 2.906 3.313 2.984 3.453 0 0 1 1.75-1.109 1.766l-4 .063c-.859.172-2-.609-2-.609-1.5-1.031-2.906-3.703-4-3.359 0 0-1.125.359-1.094 2.766.016.516-.234.797-.234.797s-.281.297-.828.344h-1.797c-3.953.25-7.438-3.391-7.438-3.391S3.421 16.595.078 8.736c-.219-.516.016-.766.016-.766s.234-.297.891-.297l4.281-.031c.406.063.688.281.688.281s.25.172.375.5c.703 1.75 1.609 3.344 1.609 3.344 1.563 3.219 2.625 3.766 3.234 3.437 0 0 .797-.484.625-4.375-.063-1.406-.453-2.047-.453-2.047-.359-.484-1.031-.625-1.328-.672-.234-.031.156-.594.672-.844.766-.375 2.125-.391 3.734-.375 1.266.016 1.625.094 2.109.203 1.484.359.984 1.734.984 5.047 0 1.062-.203 2.547.562 3.031.328.219 1.141.031 3.141-3.375 0 0 .938-1.625 1.672-3.516.125-.344.391-.484.391-.484s.25-.141.594-.094l4.5-.031c1.359-.172 1.578.453 1.578.453z"
  })),
  whatsapp: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M15.391 15.219c.266 0 2.812 1.328 2.922 1.516.031.078.031.172.031.234 0 .391-.125.828-.266 1.188-.359.875-1.813 1.437-2.703 1.437-.75 0-2.297-.656-2.969-.969-2.234-1.016-3.625-2.75-4.969-4.734-.594-.875-1.125-1.953-1.109-3.031v-.125c.031-1.031.406-1.766 1.156-2.469.234-.219.484-.344.812-.344.187 0 .375.047.578.047.422 0 .5.125.656.531.109.266.906 2.391.906 2.547 0 .594-1.078 1.266-1.078 1.625 0 .078.031.156.078.234.344.734 1 1.578 1.594 2.141.719.688 1.484 1.141 2.359 1.578a.681.681 0 00.344.109c.469 0 1.25-1.516 1.656-1.516zM12.219 23.5c5.406 0 9.812-4.406 9.812-9.812s-4.406-9.812-9.812-9.812-9.812 4.406-9.812 9.812c0 2.063.656 4.078 1.875 5.75l-1.234 3.641 3.781-1.203a9.875 9.875 0 005.391 1.625zm0-21.594C18.719 1.906 24 7.187 24 13.687s-5.281 11.781-11.781 11.781c-1.984 0-3.953-.5-5.703-1.469L0 26.093l2.125-6.328a11.728 11.728 0 01-1.687-6.078c0-6.5 5.281-11.781 11.781-11.781z"
  })),
  wordpress: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "28",
    height: "28",
    viewBox: "0 0 28 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M1.984 14c0-1.734.375-3.391 1.047-4.891l5.734 15.703c-4.016-1.953-6.781-6.062-6.781-10.813zm20.125-.609c0 1.031-.422 2.219-.922 3.891l-1.188 4-4.344-12.906s.719-.047 1.375-.125c.641-.078.562-1.031-.078-.984-1.953.141-3.203.156-3.203.156s-1.172-.016-3.156-.156c-.656-.047-.734.938-.078.984.609.063 1.25.125 1.25.125l1.875 5.125-2.625 7.875-4.375-13s.719-.047 1.375-.125c.641-.078.562-1.031-.078-.984-1.937.141-3.203.156-3.203.156-.219 0-.484-.016-.766-.016a11.966 11.966 0 0110.031-5.422c3.125 0 5.969 1.203 8.109 3.156h-.156c-1.172 0-2.016 1.016-2.016 2.125 0 .984.578 1.813 1.188 2.812.469.797.984 1.828.984 3.313zm-7.906 1.656l3.703 10.109a.59.59 0 00.078.172c-1.25.438-2.578.688-3.984.688-1.172 0-2.312-.172-3.391-.5zm10.328-6.813A11.98 11.98 0 0126.015 14c0 4.438-2.406 8.297-5.984 10.375l3.672-10.594c.609-1.75.922-3.094.922-4.312 0-.438-.031-.844-.094-1.234zM14 0c7.719 0 14 6.281 14 14s-6.281 14-14 14S0 21.719 0 14 6.281 0 14 0zm0 27.359c7.359 0 13.359-6 13.359-13.359S21.359.641 14 .641.641 6.641.641 14s6 13.359 13.359 13.359z"
  })),
  youtube: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "28",
    height: "28",
    viewBox: "0 0 28 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M11.109 17.625l7.562-3.906-7.562-3.953v7.859zM14 4.156c5.891 0 9.797.281 9.797.281.547.063 1.75.063 2.812 1.188 0 0 .859.844 1.109 2.781.297 2.266.281 4.531.281 4.531v2.125s.016 2.266-.281 4.531c-.25 1.922-1.109 2.781-1.109 2.781-1.062 1.109-2.266 1.109-2.812 1.172 0 0-3.906.297-9.797.297-7.281-.063-9.516-.281-9.516-.281-.625-.109-2.031-.078-3.094-1.188 0 0-.859-.859-1.109-2.781C-.016 17.327 0 15.062 0 15.062v-2.125s-.016-2.266.281-4.531C.531 6.469 1.39 5.625 1.39 5.625 2.452 4.5 3.656 4.5 4.202 4.437c0 0 3.906-.281 9.797-.281z"
  })),
  youtubeAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M21.563 6.637c.287 1.529.448 3.295.437 5.125a27.145 27.145 0 01-.437 5.021c-.057.208-.15.403-.272.575a1.743 1.743 0 01-.949.675c-.604.161-2.156.275-3.877.341-2.23.086-4.465.086-4.465.086s-2.235 0-4.465-.085c-1.721-.066-3.273-.179-3.866-.338a1.854 1.854 0 01-.566-.268 1.763 1.763 0 01-.67-.923c-.285-1.526-.444-3.286-.433-5.11-.021-1.54.121-3.292.437-5.06.057-.208.15-.403.272-.575.227-.321.558-.565.949-.675.604-.161 2.156-.275 3.877-.341C9.765 5 12 5 12 5s2.235 0 4.466.078c1.719.06 3.282.163 3.856.303.219.063.421.165.598.299.307.232.538.561.643.958zm1.947-.46a3.762 3.762 0 00-1.383-2.093 3.838 3.838 0 00-1.249-.625c-.898-.22-2.696-.323-4.342-.38C14.269 3 12 3 12 3s-2.272 0-4.541.087c-1.642.063-3.45.175-4.317.407a3.77 3.77 0 00-2.064 1.45 3.863 3.863 0 00-.602 1.339A29.155 29.155 0 000 11.764a29.2 29.2 0 00.477 5.502.878.878 0 00.021.088 3.76 3.76 0 001.451 2.048c.357.252.757.443 1.182.561.879.235 2.686.347 4.328.41 2.269.087 4.541.087 4.541.087s2.272 0 4.541-.087c1.642-.063 3.449-.175 4.317-.407a3.767 3.767 0 002.063-1.45c.27-.381.47-.811.587-1.267.006-.025.012-.05.015-.071.34-1.884.496-3.765.476-5.44a29.214 29.214 0 00-.477-5.504l-.012-.057zm-12.76 7.124v-3.102l2.727 1.551zm-.506 2.588l5.75-3.27a1 1 0 000-1.739l-5.75-3.27a1 1 0 00-1.495.869v6.54a1 1 0 001.494.869z"
  })),
  email: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "16",
    height: "16",
    viewBox: "0 0 16 16"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M15 2H1c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h14c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zM5.831 9.773l-3 2.182a.559.559 0 01-.785-.124.563.563 0 01.124-.786l3-2.182a.563.563 0 01.662.91zm8.124 2.058a.563.563 0 01-.785.124l-3-2.182a.563.563 0 01.662-.91l3 2.182a.563.563 0 01.124.786zm-.124-6.876l-5.5 4a.562.562 0 01-.662 0l-5.5-4a.563.563 0 01.662-.91L8 7.804l5.169-3.759a.563.563 0 01.662.91z"
  })),
  emailAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "28",
    height: "28",
    viewBox: "0 0 28 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M28 11.094V23.5c0 1.375-1.125 2.5-2.5 2.5h-23A2.507 2.507 0 010 23.5V11.094c.469.516 1 .969 1.578 1.359 2.594 1.766 5.219 3.531 7.766 5.391 1.313.969 2.938 2.156 4.641 2.156h.031c1.703 0 3.328-1.188 4.641-2.156 2.547-1.844 5.172-3.625 7.781-5.391a9.278 9.278 0 001.563-1.359zM28 6.5c0 1.75-1.297 3.328-2.672 4.281-2.438 1.687-4.891 3.375-7.313 5.078-1.016.703-2.734 2.141-4 2.141h-.031c-1.266 0-2.984-1.437-4-2.141-2.422-1.703-4.875-3.391-7.297-5.078-1.109-.75-2.688-2.516-2.688-3.938 0-1.531.828-2.844 2.5-2.844h23c1.359 0 2.5 1.125 2.5 2.5z"
  })),
  emailAlt2: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M3 7.921l8.427 5.899c.34.235.795.246 1.147 0L21 7.921V18c0 .272-.11.521-.295.705S20.272 19 20 19H4c-.272 0-.521-.11-.705-.295S3 18.272 3 18zM1 5.983V18c0 .828.34 1.579.88 2.12S3.172 21 4 21h16c.828 0 1.579-.34 2.12-.88S23 18.828 23 18V6.012v-.03a2.995 2.995 0 00-.88-2.102A2.998 2.998 0 0020 3H4c-.828 0-1.579.34-2.12.88A2.995 2.995 0 001 5.983zm19.894-.429L12 11.779 3.106 5.554a.999.999 0 01.188-.259A.994.994 0 014 5h16a1.016 1.016 0 01.893.554z"
  })),
  phone: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "12",
    height: "28",
    viewBox: "0 0 12 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M7.25 22c0-.688-.562-1.25-1.25-1.25s-1.25.562-1.25 1.25.562 1.25 1.25 1.25 1.25-.562 1.25-1.25zm3.25-2.5v-11c0-.266-.234-.5-.5-.5H2c-.266 0-.5.234-.5.5v11c0 .266.234.5.5.5h8c.266 0 .5-.234.5-.5zm-3-13.25A.246.246 0 007.25 6h-2.5c-.141 0-.25.109-.25.25s.109.25.25.25h2.5c.141 0 .25-.109.25-.25zM12 6v16c0 1.094-.906 2-2 2H2c-1.094 0-2-.906-2-2V6c0-1.094.906-2 2-2h8c1.094 0 2 .906 2 2z"
  })),
  phoneAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M7 1a2.997 2.997 0 00-3 3v16a2.997 2.997 0 003 3h10a2.997 2.997 0 003-3V4a2.997 2.997 0 00-3-3zm0 2h10c.276 0 .525.111.707.293S18 3.724 18 4v16c0 .276-.111.525-.293.707S17.276 21 17 21H7c-.276 0-.525-.111-.707-.293S6 20.276 6 20V4c0-.276.111-.525.293-.707S6.724 3 7 3zm5 16a1 1 0 100-2 1 1 0 000 2z"
  })),
  phoneAlt2: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M20 18.641c0-.078 0-.172-.031-.25-.094-.281-2.375-1.437-2.812-1.687-.297-.172-.656-.516-1.016-.516-.688 0-1.703 2.047-2.312 2.047-.313 0-.703-.281-.984-.438-2.063-1.156-3.484-2.578-4.641-4.641-.156-.281-.438-.672-.438-.984 0-.609 2.047-1.625 2.047-2.312 0-.359-.344-.719-.516-1.016-.25-.438-1.406-2.719-1.687-2.812-.078-.031-.172-.031-.25-.031-.406 0-1.203.187-1.578.344-1.031.469-1.781 2.438-1.781 3.516 0 1.047.422 2 .781 2.969 1.25 3.422 4.969 7.141 8.391 8.391.969.359 1.922.781 2.969.781 1.078 0 3.047-.75 3.516-1.781.156-.375.344-1.172.344-1.578zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15A4.502 4.502 0 010 21.5v-15C0 4.016 2.016 2 4.5 2h15C21.984 2 24 4.016 24 6.5z"
  })),
  googlereviews: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M12 12.281h11.328c.109.609.187 1.203.187 2C23.515 21.125 18.921 26 11.999 26c-6.641 0-12-5.359-12-12s5.359-12 12-12c3.234 0 5.953 1.188 8.047 3.141L16.78 8.282c-.891-.859-2.453-1.859-4.781-1.859-4.094 0-7.438 3.391-7.438 7.578s3.344 7.578 7.438 7.578c4.75 0 6.531-3.406 6.813-5.172h-6.813v-4.125z"
  })),
  yelp: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "28",
    viewBox: "0 0 24 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M12.078 20.609v1.984c-.016 4.406-.016 4.562-.094 4.766-.125.328-.406.547-.797.625-1.125.187-4.641-1.109-5.375-1.984a1.107 1.107 0 01-.266-.562.882.882 0 01.063-.406c.078-.219.219-.391 3.359-4.109 0 0 .016 0 .938-1.094.313-.391.875-.516 1.391-.328.516.203.797.641.781 1.109zM9.75 16.688c-.031.547-.344.953-.812 1.094l-1.875.609c-4.203 1.344-4.344 1.375-4.562 1.375-.344-.016-.656-.219-.844-.562-.125-.25-.219-.672-.266-1.172-.172-1.531.031-3.828.484-4.547.219-.344.531-.516.875-.5.234 0 .422.094 4.953 1.937 0 0-.016.016 1.313.531.469.187.766.672.734 1.234zm12.906 4.64c-.156 1.125-2.484 4.078-3.547 4.5-.359.141-.719.109-.984-.109-.187-.141-.375-.422-2.875-4.484l-.734-1.203c-.281-.438-.234-1 .125-1.437.344-.422.844-.562 1.297-.406 0 0 .016.016 1.859.625 4.203 1.375 4.344 1.422 4.516 1.563.281.219.406.547.344.953zm-10.5-9.875c.078 1.625-.609 1.828-.844 1.906-.219.063-.906.266-1.781-1.109-5.75-9.078-5.906-9.344-5.906-9.344-.078-.328.016-.688.297-.969.859-.891 5.531-2.203 6.75-1.891.391.094.672.344.766.703.063.391.625 8.813.719 10.703zM22.5 13.141c.031.391-.109.719-.406.922-.187.125-.375.187-5.141 1.344-.766.172-1.188.281-1.422.359l.016-.031c-.469.125-1-.094-1.297-.562s-.281-.984 0-1.359c0 0 .016-.016 1.172-1.594 2.562-3.5 2.688-3.672 2.875-3.797.297-.203.656-.203 1.016-.031 1.016.484 3.063 3.531 3.187 4.703v.047z"
  })),
  telegram: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "32",
    viewBox: "0 0 32 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M26.07 3.996a2.987 2.987 0 00-.952.23l.019-.007h-.004c-.285.113-1.64.683-3.7 1.547l-7.382 3.109c-5.297 2.23-10.504 4.426-10.504 4.426l.062-.024s-.359.118-.734.375c-.234.15-.429.339-.582.56l-.004.007c-.184.27-.332.683-.277 1.11.09.722.558 1.155.894 1.394.34.242.664.355.664.355h.008l4.883 1.645c.219.703 1.488 4.875 1.793 5.836.18.574.355.933.574 1.207.106.14.23.257.379.351.071.042.152.078.238.104l.008.002-.05-.012c.015.004.027.016.038.02.04.011.067.015.118.023.773.234 1.394-.246 1.394-.246l.035-.028 2.883-2.625 4.832 3.707.11.047c1.007.442 2.027.196 2.566-.238.543-.437.754-.996.754-.996l.035-.09 3.734-19.129c.106-.472.133-.914.016-1.343a1.818 1.818 0 00-.774-1.043l-.007-.004a1.852 1.852 0 00-1.071-.269h.005zm-.101 2.05c-.004.063.008.056-.02.177v.011l-3.699 18.93c-.016.027-.043.086-.117.145-.078.062-.14.101-.465-.028l-5.91-4.531-3.57 3.254.75-4.79 9.656-9c.398-.37.265-.448.265-.448.028-.454-.601-.133-.601-.133l-12.176 7.543-.004-.02-5.851-1.972a.237.237 0 00.032-.013l-.002.001.032-.016.031-.011s5.211-2.196 10.508-4.426c2.652-1.117 5.324-2.242 7.379-3.11a807.312 807.312 0 013.66-1.53c.082-.032.043-.032.102-.032z"
  })),
  telegramAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "28",
    height: "28",
    viewBox: "0 0 28 28"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M18.578 20.422l2.297-10.828c.203-.953-.344-1.328-.969-1.094l-13.5 5.203c-.922.359-.906.875-.156 1.109l3.453 1.078 8.016-5.047c.375-.25.719-.109.438.141l-6.484 5.859-.25 3.563c.359 0 .516-.156.703-.344l1.687-1.625 3.5 2.578c.641.359 1.094.172 1.266-.594zM28 14c0 7.734-6.266 14-14 14S0 21.734 0 14 6.266 0 14 0s14 6.266 14 14z"
  })),
  soundcloud: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "32",
    viewBox: "0 0 32 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M27.874 16.069c-.565 0-1.105.11-1.596.308C25.95 12.803 22.831 10 19.028 10a7.61 7.61 0 00-2.635.474c-.311.116-.393.235-.393.466v12.585c0 .243.195.445.441.469l11.434.007c2.278 0 4.125-1.776 4.125-3.965s-1.848-3.966-4.126-3.966zM12.5 24h1l.5-7.007L13.5 10h-1l-.5 6.993zm-3 0h-1L8 18.914 8.5 14h1l.5 5zm-5 0h1l.5-4-.5-4h-1L4 20zm-4-2h1l.5-2-.5-2h-1L0 20z"
  })),
  soundcloudAlt: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "32",
    viewBox: "0 0 32 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M29 0H3C1.35 0 0 1.35 0 3v26c0 1.65 1.35 3 3 3h26c1.65 0 3-1.35 3-3V3c0-1.65-1.35-3-3-3zM5.5 22h-1L4 19l.5-3h1l.5 3-.5 3zm4 0h-1L8 18l.5-4h1l.5 4-.5 4zm4 0h-1l-.5-6 .5-6h1l.5 6-.5 6zm12.288 0l-9.419-.006a.417.417 0 01-.369-.4V10.807c0-.2.069-.3.325-.4a6.003 6.003 0 018.15 5.063 3.404 3.404 0 014.713 3.138 3.398 3.398 0 01-3.4 3.394z"
  })),
  tiktok: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "32",
    height: "32",
    viewBox: "0 0 32 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M16.707.027C18.454 0 20.187.014 21.92 0c.107 2.04.84 4.12 2.333 5.56 1.493 1.48 3.6 2.16 5.653 2.387v5.373c-1.92-.067-3.853-.467-5.6-1.293-.76-.347-1.467-.787-2.16-1.24-.013 3.893.013 7.787-.027 11.667-.107 1.867-.72 3.72-1.8 5.253-1.747 2.56-4.773 4.227-7.88 4.28-1.907.107-3.813-.413-5.44-1.373-2.693-1.587-4.587-4.493-4.867-7.613a24.42 24.42 0 01-.013-1.987 10.004 10.004 0 013.44-6.613c2.213-1.92 5.307-2.84 8.2-2.293.027 1.973-.053 3.947-.053 5.92-1.32-.427-2.867-.307-4.027.493a4.631 4.631 0 00-1.813 2.333c-.28.68-.2 1.427-.187 2.147.32 2.187 2.427 4.027 4.667 3.827 1.493-.013 2.92-.88 3.693-2.147.253-.44.533-.893.547-1.413.133-2.387.08-4.76.093-7.147.013-5.373-.013-10.733.027-16.093z"
  })),
  discord: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "33",
    height: "32",
    viewBox: "0 0 33 32"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M13.92 13.853c-.76 0-1.36.667-1.36 1.48s.613 1.48 1.36 1.48c.76 0 1.36-.667 1.36-1.48.013-.813-.6-1.48-1.36-1.48zm4.867 0c-.76 0-1.36.667-1.36 1.48s.613 1.48 1.36 1.48c.76 0 1.36-.667 1.36-1.48s-.6-1.48-1.36-1.48z"
  }), /*#__PURE__*/React.createElement("path", {
    d: "M25.267 2.667H7.4a2.74 2.74 0 00-2.733 2.747v18.027A2.74 2.74 0 007.4 26.188h15.12l-.707-2.467 1.707 1.587 1.613 1.493L28 29.334V5.414a2.74 2.74 0 00-2.733-2.747zM20.12 20.08s-.48-.573-.88-1.08c1.747-.493 2.413-1.587 2.413-1.587a7.693 7.693 0 01-1.533.787 8.751 8.751 0 01-1.933.573 9.353 9.353 0 01-3.453-.013 11.26 11.26 0 01-1.96-.573 7.858 7.858 0 01-.973-.453c-.04-.027-.08-.04-.12-.067-.027-.013-.04-.027-.053-.04-.24-.133-.373-.227-.373-.227s.64 1.067 2.333 1.573c-.4.507-.893 1.107-.893 1.107-2.947-.093-4.067-2.027-4.067-2.027 0-4.293 1.92-7.773 1.92-7.773 1.92-1.44 3.747-1.4 3.747-1.4l.133.16c-2.4.693-3.507 1.747-3.507 1.747s.293-.16.787-.387c1.427-.627 2.56-.8 3.027-.84.08-.013.147-.027.227-.027a11.295 11.295 0 012.693-.027c1.267.147 2.627.52 4.013 1.28 0 0-1.053-1-3.32-1.693l.187-.213s1.827-.04 3.747 1.4c0 0 1.92 3.48 1.92 7.773 0 0-1.133 1.933-4.08 2.027z"
  })),
  spotify: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"
  })),
  bandcamp: /*#__PURE__*/React.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M0 18.75l7.437-13.5H24l-7.438 13.5H0z"
  })),
  stumbleupon: /*#__PURE__*/React.createElement("svg", {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M44 24.8062V30.3542C44 35.2582 40 39.2582 35.096 39.2582C33.926 39.2611 32.7669 39.0327 31.6855 38.5863C30.604 38.1398 29.6214 37.484 28.7942 36.6566C27.9669 35.8292 27.3114 34.8465 26.8651 33.7649C26.4189 32.6833 26.1908 31.5242 26.194 30.3542V24.8722L28.904 26.1622L32.968 25.0022V30.6142C32.968 31.7742 33.87 32.6782 35.032 32.6782C35.3039 32.6814 35.5738 32.6302 35.8256 32.5276C36.0775 32.425 36.3063 32.2731 36.4986 32.0808C36.6909 31.8885 36.8429 31.6597 36.9454 31.4078C37.048 31.156 37.0992 30.8861 37.096 30.6142V24.8722C37.162 24.8062 44 24.8062 44 24.8062ZM28.774 21.4522L32.838 20.2922V17.4522C32.838 12.6122 28.774 8.74219 23.936 8.74219C19.096 8.74219 15.032 12.5482 15.032 17.3882V30.2902C15.032 31.4502 14.13 32.3542 12.968 32.3542C11.808 32.3542 10.904 31.4522 10.904 30.2902V24.8062H4V30.3542C4 35.2582 8 39.2582 12.904 39.2582C17.808 39.2582 21.806 35.3222 21.806 30.4182V17.7122C21.806 16.5522 22.71 15.6482 23.87 15.6482C25.03 15.6482 25.936 16.5502 25.936 17.7122V20.0922L28.774 21.4522Z"
  })),
  foursquare: /*#__PURE__*/React.createElement("svg", {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M35 15H25M36.636 9L33.363 21M38 4H14V44L24 26H32L38 4Z"
  }))
};
/* harmony default export */ __webpack_exports__["default"] = (SocialIcons);

/***/ }),

/***/ "./src/social/social-item-component.js":
/*!*********************************************!*\
  !*** ./src/social/social-item-component.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../icons */ "./src/icons.js");
/* harmony import */ var _social_icons__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./social-icons */ "./src/social/social-icons.js");
/* harmony import */ var dompurify__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! dompurify */ "../../../../node_modules/dompurify/dist/purify.js");
/* harmony import */ var dompurify__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(dompurify__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}




var MediaUpload = wp.blockEditor.MediaUpload;


var ResponsiveSocialItemComponent = function ResponsiveSocialItemComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])(false),
    _useState2 = _slicedToArray(_useState, 2),
    open = _useState2[0],
    setOpen = _useState2[1];
  var tabOptions = ['custom1', 'custom2', 'custom3'].includes(props.item.id) ? [{
    name: 'svg',
    className: 'responsive-social-tab',
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('SVG', 'responsive')
  }, {
    name: 'image',
    className: 'responsive-social-tab',
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Image', 'responsive')
  }] : [{
    name: 'icon',
    className: 'responsive-social-tab',
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icon', 'responsive')
  }, {
    name: 'svg',
    className: 'responsive-social-tab',
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('SVG', 'responsive')
  }, {
    name: 'image',
    className: 'responsive-social-tab',
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Image', 'responsive')
  }];
  var defaultTab = ['custom1', 'custom2', 'custom3'].includes(props.item.id) ? 'svg' : 'icon';
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-social-item",
    "data-id": props.item.id,
    key: props.item.id
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-social-item-panel-header"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-social-items-menu-choice-wrap"
  }, /*#__PURE__*/React.createElement("div", {
    className: "responsive-social-item-menu"
  }, _icons__WEBPACK_IMPORTED_MODULE_0__["default"].sort), /*#__PURE__*/React.createElement("div", {
    className: "responsive-social-icon-choice"
  }, _social_icons__WEBPACK_IMPORTED_MODULE_1__["default"][props.item.id]), /*#__PURE__*/React.createElement("span", {
    className: "responsive-social-item-choice"
  }, props.item.label && props.item.label !== '' ? props.item.label : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Social Item', 'responsive'))), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Tooltip"], {
    text: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Expand Item Controls', 'responsive')
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Dashicon"], {
    onClick: function onClick() {
      return setOpen(!open);
    },
    icon: open ? 'arrow-up-alt2' : 'arrow-down-alt2'
  }))), open && /*#__PURE__*/React.createElement("div", {
    className: "responsive-social-item-panel-content"
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TabPanel"], {
    className: "sortable-style-tabs responsive-social-type",
    activeClass: "responsive-social-active-tab",
    initialTabName: props.item.source && props.item.source !== '' ? props.item.source : defaultTab,
    onSelect: function onSelect(value) {
      return props.onChangeSource(value, props.index);
    },
    tabs: tabOptions
  }, function (tab) {
    var tabout;
    if (tab.name) {
      if (tab.name === 'image') {
        tabout = /*#__PURE__*/React.createElement(react__WEBPACK_IMPORTED_MODULE_5__["Fragment"], null, !props.item.url && /*#__PURE__*/React.createElement("div", {
          className: "attachment-media-view"
        }, /*#__PURE__*/React.createElement(MediaUpload, {
          onSelect: function onSelect(imageData) {
            props.onChangeURL(imageData.url, props.index);
            // props.onChangeAttachment(imageData.id, props.index);
          },
          allowedTypes: ['image'],
          render: function render(_ref) {
            var open = _ref.open;
            return /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
              className: "button-add-media",
              isSecondary: true,
              onClick: open
            }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add Image', 'responsive'));
          }
        })), props.item.url && /*#__PURE__*/React.createElement("div", {
          className: "responsive-social-custom-image"
        }, /*#__PURE__*/React.createElement("div", {
          className: "responsive-social-image"
        }, /*#__PURE__*/React.createElement("img", {
          className: "responsive-social-image-preview",
          src: props.item.url
        })), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: "responsive-social-remove-image",
          isDestructive: true,
          onClick: function onClick() {
            props.onChangeURL('', props.index);
            // props.onChangeAttachment('', props.index);
          }
        }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Dashicon"], {
          icon: "no"
        }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Remove Image', 'responsive'))), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["RangeControl"], {
          label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Max Width (px)', 'responsive'),
          value: props.item.width || 24,
          onChange: function onChange(value) {
            return props.onChangeWidth(value, props.index);
          },
          step: 1,
          min: 2,
          max: 100
        }));
      } else if (tab.name === 'svg') {
        tabout = /*#__PURE__*/React.createElement(react__WEBPACK_IMPORTED_MODULE_5__["Fragment"], null, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
          label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('SVG HTML', 'responsive'),
          value: props.item.svg || '',
          onChange: function onChange(value) {
            var sanitized = dompurify__WEBPACK_IMPORTED_MODULE_2___default.a.sanitize(value, {
              USE_PROFILES: {
                svg: true,
                svgFilters: true
              }
            });
            props.onChangeSVG(sanitized, props.index);
          }
        }), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["RangeControl"], {
          label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Max Width (px)', 'responsive'),
          value: props.item.width || 24,
          onChange: function onChange(value) {
            return props.onChangeWidth(value, props.index);
          },
          step: 1,
          min: 2,
          max: 100
        }));
      } else {
        tabout = /*#__PURE__*/React.createElement(react__WEBPACK_IMPORTED_MODULE_5__["Fragment"], null, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ButtonGroup"], {
          className: "responsive-social-radio-container-control"
        }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          isTertiary: true,
          className: "".concat(props.item.id === props.item.icon ? 'active-radio ' : '', "svg-icon-").concat(props.item.id),
          onClick: function onClick() {
            return props.onChangeIcon(props.item.id, props.index);
          }
        }, /*#__PURE__*/React.createElement("span", {
          className: "responsive-social-radio-icon"
        }, _social_icons__WEBPACK_IMPORTED_MODULE_1__["default"][props.item.id])), _social_icons__WEBPACK_IMPORTED_MODULE_1__["default"]["".concat(props.item.id, "Alt")] && /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          isTertiary: true,
          className: "".concat("".concat(props.item.id, "Alt") === props.item.icon ? 'active-radio ' : '', "svg-icon-").concat(props.item.id, "Alt"),
          onClick: function onClick() {
            return props.onChangeIcon("".concat(props.item.id, "Alt"), props.index);
          }
        }, /*#__PURE__*/React.createElement("span", {
          className: "responsive-social-radio-icon"
        }, _social_icons__WEBPACK_IMPORTED_MODULE_1__["default"]["".concat(props.item.id, "Alt")])), _social_icons__WEBPACK_IMPORTED_MODULE_1__["default"]["".concat(props.item.id, "Alt2")] && /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          isTertiary: true,
          className: "".concat("".concat(props.item.id, "Alt2") === props.item.icon ? 'active-radio ' : '', "svg-icon-").concat(props.item.id, "Alt2"),
          onClick: function onClick() {
            return props.onChangeIcon("".concat(props.item.id, "Alt2"), props.index);
          }
        }, /*#__PURE__*/React.createElement("span", {
          className: "responsive-social-radio-icon"
        }, _social_icons__WEBPACK_IMPORTED_MODULE_1__["default"]["".concat(props.item.id, "Alt2")]))));
      }
    }
    return /*#__PURE__*/React.createElement("div", null, tabout);
  }), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Item Label', 'responsive'),
    value: props.item.label || '',
    onChange: function onChange(value) {
      return props.onChangeLabel(value, props.index);
    }
  }), /*#__PURE__*/React.createElement("div", {
    className: "responsive-builder-social-url-wrap",
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: '10px'
    }
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('URL', 'responsive'),
    value: props.item.link || '',
    onChange: function onChange(value) {
      return props.onChangeLink(value, props.index);
    }
  }), props.item.link && /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
    __nextHasNoMarginBottom: true,
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Open in New Tab', 'responsive'),
    checked: props.item.newTab,
    onChange: function onChange(value) {
      return props.onChangeNewTab(value, props.index);
    }
  })), /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
    className: "responsive-social-sorter-item-remove",
    isDestructive: true,
    onClick: function onClick() {
      return props.removeItem(props.index);
    }
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Dashicon"], {
    icon: "no-alt"
  }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Remove Item', 'responsive'))));
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ResponsiveSocialItemComponent));

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
/* harmony import */ var _sortable_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sortable-component.js */ "./src/sortable/sortable-component.js");
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
    ReactDOM.render(/*#__PURE__*/React.createElement(_sortable_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    'use strict';

    var control = this;

    // Set the sortable container.
    control.sortableContainer = control.container.find('ul.sortable').first();

    // Init sortable.
    control.sortableContainer.sortable({
      // Update value when we stop sorting.
      stop: function stop() {
        control.updateValue();
      }
    }).disableSelection().find('li').each(function () {
      // Enable/disable options when we click on the eye of Thundera.
      jQuery(this).find('span.visibility').click(function () {
        jQuery(this).toggleClass('dashicons-visibility-faint').parents('li:eq(0)').toggleClass('invisible');
        jQuery(this).find('.responsive-sortable-eye-icon').toggleClass('active');
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
function _extends() {
  return _extends = Object.assign ? Object.assign.bind() : function (n) {
    for (var e = 1; e < arguments.length; e++) {
      var t = arguments[e];
      for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]);
    }
    return n;
  }, _extends.apply(null, arguments);
}

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
    labelHtml = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, label);
  }
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("span", {
      className: "description customize-control-description"
    }, description);
  }
  var visibleMetaHtml = Object.values(value).map(function (choiceID) {
    var html = '';
    if (choices[choiceID]) {
      html = /*#__PURE__*/React.createElement("li", _extends({}, inputAttrs, {
        key: choiceID,
        className: "responsive-sortable-item",
        "data-value": choiceID
      }), /*#__PURE__*/React.createElement("div", {
        "class": "responsive-sortable-items-menu-choice-wrap"
      }, /*#__PURE__*/React.createElement("span", {
        "class": "responsive-sortable-item-menu"
      }, /*#__PURE__*/React.createElement("svg", {
        xmlns: "http://www.w3.org/2000/svg",
        width: "13px",
        height: "13px",
        viewBox: "0 0 48 48"
      }, /*#__PURE__*/React.createElement("path", {
        fill: "#007CBA",
        "fill-rule": "#007CBA",
        d: "M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8",
        "clip-rule": "evenodd"
      }))), /*#__PURE__*/React.createElement("span", {
        "class": "responsive-sortable-item-choice"
      }, choices[choiceID])), /*#__PURE__*/React.createElement("span", {
        className: "visibility"
      }, /*#__PURE__*/React.createElement("svg", {
        "class": "responsive-sortable-eye-icon active",
        xmlns: "http://www.w3.org/2000/svg",
        width: "19px",
        height: "19px",
        viewBox: "0 0 28 28"
      }, /*#__PURE__*/React.createElement("path", {
        fill: "#000000",
        d: "M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"
      })), /*#__PURE__*/React.createElement("svg", {
        "class": "responsive-sortable-eye-icon",
        xmlns: "http://www.w3.org/2000/svg",
        width: "19px",
        height: "19px",
        viewBox: "0 0 24 24"
      }, /*#__PURE__*/React.createElement("path", {
        fill: "#000",
        d: "M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"
      }))));
    }
    return html;
  });
  var invisibleMetaHtml = Object.keys(choices).map(function (choiceID) {
    var html = '';
    if (Array.isArray(value) && -1 === value.indexOf(choiceID)) {
      html = /*#__PURE__*/React.createElement("li", _extends({}, inputAttrs, {
        key: choiceID,
        className: "responsive-sortable-item invisible",
        "data-value": choiceID
      }), /*#__PURE__*/React.createElement("div", {
        "class": "responsive-sortable-items-menu-choice-wrap"
      }, /*#__PURE__*/React.createElement("span", {
        "class": "responsive-sortable-item-menu"
      }, /*#__PURE__*/React.createElement("svg", {
        xmlns: "http://www.w3.org/2000/svg",
        width: "13px",
        height: "13px",
        viewBox: "0 0 48 48"
      }, /*#__PURE__*/React.createElement("path", {
        fill: "#007CBA",
        "fill-rule": "#007CBA",
        d: "M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8",
        "clip-rule": "evenodd"
      }))), /*#__PURE__*/React.createElement("span", {
        "class": "responsive-sortable-item-choice"
      }, choices[choiceID])), /*#__PURE__*/React.createElement("span", {
        className: "visibility"
      }, /*#__PURE__*/React.createElement("svg", {
        "class": "responsive-sortable-eye-icon active",
        xmlns: "http://www.w3.org/2000/svg",
        width: "19px",
        height: "19px",
        viewBox: "0 0 24 24"
      }, /*#__PURE__*/React.createElement("path", {
        fill: "#000",
        d: "M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"
      })), /*#__PURE__*/React.createElement("svg", {
        "class": "responsive-sortable-eye-icon",
        xmlns: "http://www.w3.org/2000/svg",
        width: "19px",
        height: "19px",
        viewBox: "0 0 28 28"
      }, /*#__PURE__*/React.createElement("path", {
        fill: "#000000",
        d: "M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"
      }))));
    }
    return html;
  });
  return /*#__PURE__*/React.createElement("label", {
    className: "responsive-sortable"
  }, labelHtml, descriptionHtml, /*#__PURE__*/React.createElement("ul", {
    className: "sortable responsive-sortable-items-wrapper"
  }, visibleMetaHtml, invisibleMetaHtml));
};
SortableComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SortableComponent));

/***/ }),

/***/ "./src/tabs/control.js":
/*!*****************************!*\
  !*** ./src/tabs/control.js ***!
  \*****************************/
/*! exports provided: responsiveTabs */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveTabs", function() { return responsiveTabs; });
/* harmony import */ var _tabs_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tabs-component */ "./src/tabs/tabs-component.js");

var responsiveTabs = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_tabs_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/tabs/tabs-component.js":
/*!************************************!*\
  !*** ./src/tabs/tabs-component.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var TabsComponent = function TabsComponent(props) {
  var api = wp.customize;
  var onTabClick = function onTabClick(value) {
    setTab(value);
  };
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])('general'),
    _useState2 = _slicedToArray(_useState, 2),
    tab = _useState2[0],
    setTab = _useState2[1];
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    name = _props$control$params.name,
    description = _props$control$params.description,
    id = _props$control$params.id,
    design_id = _props$control$params.design_id,
    general_id = _props$control$params.general_id,
    design_tab_ids = _props$control$params.design_tab_ids,
    general_tab_ids = _props$control$params.general_tab_ids;
  var elementsToHide = {
    design: general_tab_ids,
    general: design_tab_ids
  };
  Object(react__WEBPACK_IMPORTED_MODULE_2__["useEffect"])(function () {
    var showElements = tab === 'general' ? 'design' : 'general';
    elementsToHide[showElements].forEach(function (elementId) {
      var element = document.getElementById(elementId);
      if (element) {
        element.style.display = 'block';
      }
    });
    elementsToHide[tab].forEach(function (elementId) {
      var element = document.getElementById(elementId);
      if (element) {
        element.style.display = 'none';
      }
    });
    var logoWidthElement = document.getElementById('customize-control-responsive_logo_width');
    var isCustomLogoPresent = document.getElementsByClassName('attachment-thumb').length > 0;
    if (showElements === 'general' && logoWidthElement || !isCustomLogoPresent) {
      logoWidthElement.style.display = 'none';
    } else if (showElements === 'design' && logoWidthElement && isCustomLogoPresent) {
      logoWidthElement.style.display = 'block';
    }
    hideSidebarWidthControl(api('responsive_page_sidebar_position').get(), 'page');
    hideSidebarWidthControl(api('responsive_blog_sidebar_position').get(), 'blog');
    api('responsive_page_sidebar_position', function (value) {
      value.bind(function (newval) {
        if (newval) {
          hideSidebarWidthControl(newval, 'page');
        }
      });
    });
    api('responsive_blog_sidebar_position', function (value) {
      value.bind(function (newval) {
        if (newval) {
          hideSidebarWidthControl(newval, 'blog');
        }
      });
    });
    if (api('responsive_footer_primary_row_top_border_size').get() > 0 && 'design' === tab) {
      document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'none';
    }
    if (api('responsive_footer_above_row_top_border_size').get() > 0 && 'design' === tab) {
      document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'none';
    }
    if (api('responsive_footer_below_row_top_border_size').get() > 0 && 'design' === tab) {
      document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'none';
    }
    if (api('responsive_footer_primary_columns').get() > 1 && 'general' === tab) {
      document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'none';
    }
    if (api('responsive_footer_above_columns').get() > 1 && 'general' === tab) {
      document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'none';
    }
    if (api('responsive_footer_below_columns').get() > 1 && 'general' === tab) {
      document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'none';
    }
    if (api('responsive_cart_style')) {
      if (api('responsive_cart_style').get() !== 'outline' && 'design' === tab) {
        var cartBorderWidth = document.getElementById('customize-control-responsive_cart_border_width');
        if (cartBorderWidth) {
          cartBorderWidth.style.display = 'none';
        }
      }
      if (api('responsive_cart_style').get() === 'none' && 'design' === tab) {
        var cartElementIds = ['customize-control-responsive_cart_border_separator', 'customize-control-responsive_border_cart_radius'];
        cartElementIds.forEach(function (id) {
          var el = document.getElementById(id);
          if (el) {
            el.style.display = 'none';
          }
        });
      }
    }
    if (api('responsive_header_button_size').get() === 'custom' && 'design' === tab) {
      document.getElementById('customize-control-responsive_header_button_padding').style.display = 'block';
      document.getElementById('customize-control-responsive_header_button_size_separator').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_header_button_padding').style.display = 'none';
      document.getElementById('customize-control-responsive_header_button_size_separator').style.display = 'none';
    }
    if (api('responsive_header_button_style').get() === 'filled' && 'design' === tab) {
      document.getElementById('customize-control-responsive_header_button_bg_color').style.display = 'block';
      document.getElementById('customize-control-responsive_header_button_bg_color_separator').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_header_button_bg_color').style.display = 'none';
      document.getElementById('customize-control-responsive_header_button_bg_color_separator').style.display = 'none';
    }
    if (api('responsive_header_contact_info_icon_shape').get() === 'none' && 'general' === tab) {
      document.getElementById('customize-control-responsive_header_contact_info_icon_style').style.display = 'none';
      document.getElementById('customize-control-responsive_header_contact_info_icon_style_separator').style.display = 'none';
    }
    if (api('responsive_header_search_style_design').get() === 'bordered' && 'design' === tab) {
      document.getElementById('customize-control-responsive_header_search_border').style.display = 'block';
      document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'block';
      document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'block';
      document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'block';
    } else {
      document.getElementById('customize-control-responsive_header_search_border').style.display = 'none';
      document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'none';
      document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'none';
      document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'none';
    }
    // Header Search Border control toggle.
    wp.customize('responsive_header_search_style_design', function (setting) {
      setting.bind(function (newval) {
        if ('default' === newval) {
          document.getElementById('customize-control-responsive_header_search_border').style.display = 'none';
          document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'none';
          document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'none';
          document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'none';
        } else if ('bordered' === newval && 'design' === tab) {
          document.getElementById('customize-control-responsive_header_search_border').style.display = 'block';
          document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'block';
          document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'block';
          document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'block';
        }
      });
    });
    if (api('responsive_header_search_label').get() !== '') {
      if ('design' === tab) {
        document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'block';
        document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'block';
      }
      if ('general' === tab) {
        document.getElementById('customize-control-responsive_header_search_label_visibility').style.display = 'block';
        document.getElementById('customize-control-responsive_header_search_separator3').style.display = 'block';
      }
    } else {
      document.getElementById('customize-control-responsive_header_search_label_visibility').style.display = 'none';
      document.getElementById('customize-control-responsive_header_search_separator3').style.display = 'none';
      document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'none';
      document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'none';
    }
    if (api('search_style').get()) {
      var search_style = api('search_style').get();
      if (search_style !== 'full-screen') {
        document.getElementById('customize-control-responsive_header_search_modal_options_separator').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_text_color').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_separator4').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_modal_background_color').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_label').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_separator2').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_label_visibility').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_separator3').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'none';
      }
      if (search_style === 'full-screen') {
        document.getElementById('customize-control-responsive_header_search_width').style.display = 'none';
        document.getElementById('customize-control-responsive_header_search_separator13').style.display = 'none';
      }
    }
    if (!api('responsive_blog_post_title_toggle').get()) {
      document.getElementById('customize-control-responsive_blog_post_title_toggle_separator').style.display = 'none';
      document.getElementById('customize-control-res_blog_post_title_text').style.display = 'none';
    } else {
      if ('general' === tab) {
        document.getElementById('customize-control-responsive_blog_post_title_toggle_separator').style.display = 'block';
        document.getElementById('customize-control-res_blog_post_title_text').style.display = 'block';
      }
    }
    if ('list' === api('responsive_blog_layout').get()) {
      document.getElementById('customize-control-responsive_blog_layout_options_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_entry_columns').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_content_width_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_entry_display_masonry').style.display = 'none';
    }
    if ('grid' === api('responsive_blog_layout').get()) {
      document.getElementById('customize-control-responsive_blog_image_positions_layout_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_layout_options').style.display = 'none';
    }
    if (api('responsive_blog_entry_columns').get() <= 1) {
      document.getElementById('customize-control-responsive_blog_content_width_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_entry_display_masonry').style.display = 'none';
    }
    if (!api('responsive_date_box_toggle').get()) {
      document.getElementById('customize-control-responsive_date_box_toggle_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_date_box_style').style.display = 'none';
    }
    if ('excerpt' !== api('responsive_blog_entry_content_type').get()) {
      document.getElementById('customize-control-responsive_blog_entry_content_alignment_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_excerpt_length').style.display = 'none';
      document.getElementById('customize-control-responsive_excerpt_length_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_read_more_text').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_read_more_text_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_blog_entry_read_more_type').style.display = 'none';
    }
    if ('none' === api('responsive_header_button_border_style').get()) {
      document.getElementById('customize-control-responsive_header_button_border_width').style.display = 'none';
      document.getElementById('customize-control-responsive_header_button_border_color').style.display = 'none';
      document.getElementById('customize-control-responsive_border_header_button_radius').style.display = 'none';
    }
    // Transparent Header Settings
    if (!api('responsive_transparent_header').get()) {
      document.getElementById('customize-control-responsive_transparent_header_widget_color_separator').style.display = 'none';
      document.getElementById('customize-control-responsive_transparent_header_widget_text_color').style.display = 'none';
      document.getElementById('customize-control-responsive_transparent_header_widget_background_color').style.display = 'none';
      document.getElementById('customize-control-responsive_transparent_header_widget_background_image').style.display = 'none';
      document.getElementById('customize-control-responsive_transparent_header_widget_border_color').style.display = 'none';
      document.getElementById('customize-control-responsive_transparent_header_widget_link_color').style.display = 'none';
      document.getElementById('customize-control-responsive_transparent_header_widget_link_hover_color').style.display = 'none';
    } else if (api('responsive_transparent_header').get() && 'design' === tab) {
      document.getElementById('customize-control-responsive_transparent_header_widget_color_separator').style.display = 'block';
      document.getElementById('customize-control-responsive_transparent_header_widget_text_color').style.display = 'block';
      document.getElementById('customize-control-responsive_transparent_header_widget_background_color').style.display = 'block';
      document.getElementById('customize-control-responsive_transparent_header_widget_background_image').style.display = 'block';
      document.getElementById('customize-control-responsive_transparent_header_widget_border_color').style.display = 'block';
      document.getElementById('customize-control-responsive_transparent_header_widget_link_color').style.display = 'block';
      document.getElementById('customize-control-responsive_transparent_header_widget_link_hover_color').style.display = 'block';
    }
    if (!api('responsive_transparent_header_logo_option').get()) {
      document.getElementById('customize-control-responsive_transparent_header_logo').style.display = 'none';
    }
    if (!api('responsive_enable_transparent_header_bottom_border').get()) {
      document.getElementById('customize-control-responsive_transparent_bottom_border').style.display = 'none';
    }
    if (!api('responsive_sticky_header_logo_option').get()) {
      document.getElementById('customize-control-responsive_sticky_header_logo').style.display = 'none';
    }
    if (!api('responsive_rp_enable_excerpt').get()) {
      document.getElementById('customize-control-responsive_rp_excerpt_length').style.display = 'none';
    }
  }, [tab]);
  var hideSidebarWidthControl = function hideSidebarWidthControl(value, control) {
    var controlId = "customize-control-responsive_".concat(control, "_sidebar_width");
    var controlElement = document.getElementById(controlId);
    var isBlog = control === 'blog';
    var isVisible = value !== 'no' && tab === 'general';
    if (!controlElement) return;
    controlElement.style.display = 'none';
    if (isVisible) {
      controlElement.style.display = 'block';
    }
  };
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
    className: "responsive-component-tabs nav-tab-wrapper wp-clearfix",
    "data-name": name
  }, /*#__PURE__*/React.createElement("a", {
    href: "#",
    className: "nav-tab responsive-component-tabs-button ".concat(tab === 'general' ? 'nav-tab-active' : ''),
    id: general_id,
    onClick: function onClick() {
      return onTabClick('general');
    }
  }, /*#__PURE__*/React.createElement("span", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('General', 'responsive'))), /*#__PURE__*/React.createElement("a", {
    type: "#",
    className: "nav-tab responsive-component-tabs-button ".concat(tab === 'design' ? 'nav-tab-active' : ''),
    id: design_id,
    onClick: function onClick() {
      return onTabClick('design');
    }
  }, /*#__PURE__*/React.createElement("span", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Design', 'responsive')))));
};
TabsComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TabsComponent));

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
/* harmony import */ var _text_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./text-component.js */ "./src/text/text-component.js");

var responsiveText = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_text_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  },
  // When we're finished loading continue processing.
  ready: function ready() {
    'use strict';

    var control = this;

    // Save the values.
    control.container.on('change keyup paste', '.desktop input', function () {
      control.settings['desktop_value'].set(jQuery(this).val());
    });
    control.container.on('change keyup paste', '.tablet input', function () {
      control.settings['tablet_value'].set(jQuery(this).val());
    });
    control.container.on('change keyup paste', '.mobile input', function () {
      control.settings['mobile_value'].set(jQuery(this).val());
    });
    control.container.on('click', '.responsive-switchers button', function (event) {
      // Set up variables
      var $this = jQuery(this),
        $devices = jQuery('.responsive-switchers'),
        $device = jQuery(event.currentTarget).data('device'),
        $control = jQuery('.customize-control.has-switchers'),
        $body = jQuery('.wp-full-overlay'),
        $footer_devices = jQuery('.wp-full-overlay-footer .devices');

      // Button class
      $devices.find('button').removeClass('active');
      $devices.find('button.preview-' + $device).addClass('active');

      // Control class
      $control.find('.control-wrap').removeClass('active');
      $control.find('.control-wrap.' + $device).addClass('active');
      $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

      // Wrapper class
      $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device);

      // Panel footer buttons
      $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
      $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true);

      // Open switchers
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function _extends() {
  return _extends = Object.assign ? Object.assign.bind() : function (n) {
    for (var e = 1; e < arguments.length; e++) {
      var t = arguments[e];
      for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]);
    }
    return n;
  }, _extends.apply(null, arguments);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var TextComponent = function TextComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(props.control.settings),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var onInputChange = function onInputChange(device, value) {
    var inputValue = Number(value);
    var updateValue = _objectSpread({}, props_value);
    updateValue["".concat(device, "_value")].set(inputValue);
    var deviceUpdateSize = updateValue["".concat(device, "_value")].get();
    updateValue["".concat(device, "_font_unit")].set(activeFontUnits[device]);
    updateValue[device].set(deviceUpdateSize + activeFontUnits[device]);
    setPropsValue(updateValue);
  };
  var _props$control$params = props.control.params,
    desktop_value = _props$control$params.desktop_value,
    tablet_value = _props$control$params.tablet_value,
    mobile_value = _props$control$params.mobile_value;
  var pxRangeAttrs = {
    max: '200',
    min: '0',
    step: '1'
  };
  var emRangeAttrs = {
    max: '20',
    min: '0',
    step: '0.01'
  };
  var extractUnit = function extractUnit(value) {
    var match = value.match(/[a-z%]+$/i);
    return match ? match[0] : 'px';
  };
  var desktopActiveFontUnit = extractUnit(props_value['desktop'].get());
  var tabletActiveFontUnit = extractUnit(props_value['tablet'].get());
  var mobileActiveFontUnit = extractUnit(props_value['mobile'].get());
  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])({
      desktop: desktopActiveFontUnit,
      tablet: tabletActiveFontUnit,
      mobile: mobileActiveFontUnit
    }),
    _useState4 = _slicedToArray(_useState3, 2),
    activeFontUnits = _useState4[0],
    setActiveFontUnits = _useState4[1];

  // Update function to handle unit changes
  var updateFontUnits = function updateFontUnits(device, units) {
    setActiveFontUnits(function (prevUnits) {
      return _objectSpread(_objectSpread({}, prevUnits), {}, _defineProperty({}, device, units));
    });
    var updateValue = _objectSpread({}, props_value);
    var deviceUpdateSize = updateValue["".concat(device, "_value")].get();
    updateValue["".concat(device, "_font_unit")].set(units);
    updateValue[device].set(deviceUpdateSize + units);
    setPropsValue(updateValue);
  };
  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var link = device === 'desktop' ? desktop_value.link : device === 'tablet' ? tablet_value.link : mobile_value.link;
    if (undefined !== link) {
      var splited_values = link.split("=");
      if (undefined !== splited_values[1]) {
        link = splited_values[1].replace(/"/g, "");
      }
    }
    var rangeAttrs = activeFontUnits[device] === 'px' || activeFontUnits[device] === '%' ? pxRangeAttrs : emRangeAttrs;
    var sliderWidth = (props_value["".concat(device, "_value")].get() - rangeAttrs.min) / (rangeAttrs.max - rangeAttrs.min) * 100;
    return /*#__PURE__*/React.createElement("div", {
      className: "".concat(device, " control-wrap  ").concat(active)
    }, /*#__PURE__*/React.createElement("input", _extends({}, rangeAttrs, {
      type: "range",
      value: props_value["".concat(device, "_value")].get(),
      "data-customize-setting-link": link,
      onChange: function onChange(event) {
        return onInputChange(device, event.target.value);
      },
      style: {
        background: "linear-gradient(to right, #007CBA ".concat(sliderWidth, "%, #D9D9D9 ").concat(sliderWidth, "%)")
      }
    })), /*#__PURE__*/React.createElement("input", _extends({}, rangeAttrs, {
      type: "number",
      className: "responsive-range-input",
      value: props_value["".concat(device, "_value")].get(),
      "data-customize-setting-link": link,
      onChange: function onChange(event) {
        return onInputChange(device, event.target.value);
      }
    })));
  };
  var renderFontUnits = function renderFontUnits(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    return /*#__PURE__*/React.createElement("div", {
      "class": "responsive-font-units-wrap ".concat(device, " control-wrap ").concat(active, " ")
    }, /*#__PURE__*/React.createElement("ul", {
      "class": "responsive-font-units input-field-wrapper responsive-spacing-".concat(device, "-font-units ").concat(device, " ").concat(active)
    }, /*#__PURE__*/React.createElement("li", {
      "class": "single-unit ".concat(activeFontUnits[device] === 'px' ? 'active' : ''),
      "data-unit": "px"
    }, /*#__PURE__*/React.createElement("span", {
      "class": "unit-text",
      onClick: function onClick() {
        return updateFontUnits(device, 'px');
      }
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('px', 'responsive'))), /*#__PURE__*/React.createElement("li", {
      "class": "single-unit ".concat(activeFontUnits[device] === 'em' ? 'active' : ''),
      "data-unit": "em"
    }, /*#__PURE__*/React.createElement("span", {
      "class": "unit-text",
      onClick: function onClick() {
        return updateFontUnits(device, 'em');
      }
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('em', 'responsive'))), /*#__PURE__*/React.createElement("li", {
      "class": "single-unit ".concat(activeFontUnits[device] === '%' ? 'active' : ''),
      "data-unit": "%"
    }, /*#__PURE__*/React.createElement("span", {
      "class": "unit-text",
      onClick: function onClick() {
        return updateFontUnits(device, '%');
      }
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('%', 'responsive')))));
  };
  var _props$control$params2 = props.control.params,
    description = _props$control$params2.description,
    label = _props$control$params2.label;
  var labelHtml = null;
  var descriptionHtml = null;
  var inputHtml = null;
  var fontUnits = null;
  if (label) {
    labelHtml = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, /*#__PURE__*/React.createElement("span", null, label), /*#__PURE__*/React.createElement("ul", {
      className: "responsive-switchers"
    }, /*#__PURE__*/React.createElement("li", {
      className: "desktop"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-desktop active",
      "data-device": "desktop"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-desktop"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "tablet"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-tablet",
      "data-device": "tablet"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-tablet"
    }))), /*#__PURE__*/React.createElement("li", {
      className: "mobile"
    }, /*#__PURE__*/React.createElement("button", {
      type: "button",
      className: "preview-mobile",
      "data-device": "mobile"
    }, /*#__PURE__*/React.createElement("i", {
      className: "dashicons dashicons-smartphone"
    })))));
  }
  var noteTitle = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Note: ', 'responsive');
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("p", {
      className: "responsive-customize-control-note responsive-text-control-note"
    }, /*#__PURE__*/React.createElement("span", null, noteTitle), description);
  }
  inputHtml = /*#__PURE__*/React.createElement(React.Fragment, null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  fontUnits = /*#__PURE__*/React.createElement(React.Fragment, null, renderFontUnits('desktop', 'active'), renderFontUnits('tablet'), renderFontUnits('mobile'));
  return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("div", {
    "class": "responsive-typo-font-size-label-units-wrap"
  }, labelHtml, fontUnits), inputHtml, descriptionHtml);
};
TextComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TextComponent));

/***/ }),

/***/ "./src/toggle/control.js":
/*!*******************************!*\
  !*** ./src/toggle/control.js ***!
  \*******************************/
/*! exports provided: responsiveToggle */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveToggle", function() { return responsiveToggle; });
/* harmony import */ var _toggle_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./toggle-component */ "./src/toggle/toggle-component.js");

var responsiveToggle = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_toggle_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/toggle/toggle-component.js":
/*!****************************************!*\
  !*** ./src/toggle/toggle-component.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
function _slicedToArray(r, e) {
  return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest();
}
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}
function _unsupportedIterableToArray(r, a) {
  if (r) {
    if ("string" == typeof r) return _arrayLikeToArray(r, a);
    var t = {}.toString.call(r).slice(8, -1);
    return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0;
  }
}
function _arrayLikeToArray(r, a) {
  (null == a || a > r.length) && (a = r.length);
  for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e];
  return n;
}
function _iterableToArrayLimit(r, l) {
  var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"];
  if (null != t) {
    var e,
      n,
      i,
      u,
      a = [],
      f = !0,
      o = !1;
    try {
      if (i = (t = t.call(r)).next, 0 === l) {
        if (Object(t) !== t) return;
        f = !1;
      } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0);
    } catch (r) {
      o = !0, n = r;
    } finally {
      try {
        if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return;
      } finally {
        if (o) throw n;
      }
    }
    return a;
  }
}
function _arrayWithHoles(r) {
  if (Array.isArray(r)) return r;
}



var ToggleControl = wp.components.ToggleControl;
var ToggleComponent = function ToggleComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_2__["useState"])(props.control.setting.get()),
    _useState2 = _slicedToArray(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];
  var onToggleClick = function onToggleClick(props_value) {
    setPropsValue(!props_value);
    props.control.setting.set(!props_value);
  };
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    name = _props$control$params.name,
    description = _props$control$params.description,
    id = _props$control$params.id;
  var descriptionHtml = null;
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("span", {
      className: "description customize-control-description"
    }, description);
  }
  return /*#__PURE__*/React.createElement("div", {
    className: "responsive-toggle-control-wrapper"
  }, /*#__PURE__*/React.createElement(ToggleControl, {
    label: props.control.params.label ? props.control.params.label : undefined,
    checked: props_value,
    onChange: function onChange() {
      onToggleClick(props_value);
    },
    className: "responsive-toggle-control"
  }), descriptionHtml);
};
ToggleComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ToggleComponent));

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
/* harmony import */ var _typography_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./typography-component.js */ "./src/typography/typography-component.js");

var responsiveTypography = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_typography_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
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
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);



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
    htmlLabel = /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, label);
  }
  var noteTitle = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Note: ', 'responsive');
  if (description) {
    descriptionHtml = /*#__PURE__*/React.createElement("p", {
      className: "responsive-customize-control-note responsive-text-control-note"
    }, /*#__PURE__*/React.createElement("span", null, noteTitle), description);
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
    var defaultValue = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Arial, Helvetica, sans-serif', 'responsive');
    var stdFonts = standard_fonts;
    var googleFonts = google_fonts;
    var customFonts = custom_fonts;
    var optgrpOfStandardFonts = null;
    var optgrpOfCustomFonts = null;
    var optgrpOfGoogleFonts = null;
    var optgrpOfStandardFontsLabel = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Standard Fonts', 'responsive');
    var optgrpOfGoogleFontsLabel = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Google Fonts', 'responsive');
    var optgrpOfCustomFontsLabel = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Custom Fonts', 'responsive');
    var standardFontsOptionsHtml = null;
    var googleFontsOptionsHtml = null;
    var customFontsOptionsHtml = null;
    if (description) {
      familyDescriptionHtml = /*#__PURE__*/React.createElement("span", {
        "class": "description customize-control-description"
      }, description);
    }
    if (stdFonts) {
      standardFontsOptionsHtml = Object.entries(stdFonts).map(function (font) {
        var html = /*#__PURE__*/React.createElement("option", {
          key: font[0],
          value: "'".concat(font[0], "', ").concat(font[1][1])
        }, font[0]);
        return html;
      });
    }
    if (googleFonts) {
      googleFontsOptionsHtml = Object.entries(googleFonts).map(function (font) {
        var html = /*#__PURE__*/React.createElement("option", {
          key: font[0],
          value: "'".concat(font[0], "', ").concat(font[1][1])
        }, font[0]);
        return html;
      });
    }
    if (customFonts) {
      customFontsOptionsHtml = Object.keys(customFonts).map(function (font) {
        var html = /*#__PURE__*/React.createElement("option", {
          key: font,
          value: font
        }, " ", font, " ");
        return html;
      });
      optgrpOfCustomFonts = /*#__PURE__*/React.createElement("optgroup", {
        "class": "responsive-font-family-select-options",
        label: optgrpOfCustomFontsLabel
      }, customFontsOptionsHtml);
    }
    optgrpOfStandardFonts = /*#__PURE__*/React.createElement("optgroup", {
      "class": "responsive-font-family-select-options",
      label: optgrpOfStandardFontsLabel
    }, standardFontsOptionsHtml);
    optgrpOfGoogleFonts = /*#__PURE__*/React.createElement("optgroup", {
      "class": "responsive-font-family-select-options",
      label: optgrpOfGoogleFontsLabel
    }, googleFontsOptionsHtml);
    var selectHtml = /*#__PURE__*/React.createElement("select", {
      className: "responsive-typography-select responsive-font-family-select",
      "data-customize-setting-link": linkNew,
      "data-connected-control": connect,
      "data-inherit": resp_inherit,
      "data-value": value,
      "data-name": name
    }, /*#__PURE__*/React.createElement("option", {
      value: ""
    }, defaultValue), optgrpOfStandardFonts, optgrpOfCustomFonts, optgrpOfGoogleFonts);
    return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("label", {
      "class": id
    }, htmlLabel, familyDescriptionHtml, selectHtml));
  } else if (id === 'responsive_font_weight') {
    var allFonts = all_font_weight;
    var optionsHtml = null;
    optionsHtml = Object.entries(allFonts).map(function (fontWght) {
      var html = /*#__PURE__*/React.createElement("option", {
        key: fontWght[0],
        value: fontWght[0]
      }, fontWght[1]);
      return html;
    });
    var _selectHtml = /*#__PURE__*/React.createElement("select", {
      "data-customize-setting-link": linkNew,
      "data-connected-control": connect,
      "data-inherit": resp_inherit,
      "data-value": value,
      "data-name": name
    }, optionsHtml);
    return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement("label", {
      "class": id
    }, htmlLabel, _selectHtml), descriptionHtml);
  }
};
TypographyComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TypographyComponent));

/***/ }),

/***/ "./src/typography_group/control.js":
/*!*****************************************!*\
  !*** ./src/typography_group/control.js ***!
  \*****************************************/
/*! exports provided: responsiveTypographyGroup */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "responsiveTypographyGroup", function() { return responsiveTypographyGroup; });
/* harmony import */ var _typography_group_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./typography-group-component */ "./src/typography_group/typography-group-component.js");

var responsiveTypographyGroup = wp.customize.responsiveControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(/*#__PURE__*/React.createElement(_typography_group_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/typography_group/typography-group-component.js":
/*!************************************************************!*\
  !*** ./src/typography_group/typography-group-component.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);


var TypographyGroupControlComponent = function TypographyGroupControlComponent(props) {
  var _props$control$params = props.control.params,
    label = _props$control$params.label,
    connected_control = _props$control$params.connected_control;

  // Suffixes for related controls
  var suffixes = ['font-family', 'font-size', 'font-weight', 'text-transform', 'font-style', 'line-height', 'letter-spacing', 'color', 'font-color'];

  // Refs for DOM elements and flag
  var typoGroupSelectRef = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(null);
  var typoGroupWrapperRef = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(null);
  var hasWrappedRef = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(false);

  // Function to create or update the <ul> and wrap <li> elements
  var wrapLiElements = function wrapLiElements() {
    // IDs of the <li> elements to be wrapped
    var liIds = ["customize-control-".concat(connected_control, "-font-family"), "customize-control-".concat(connected_control, "-font-size"), "customize-control-".concat(connected_control, "-font-weight"), "customize-control-".concat(connected_control, "-text-transform"), "customize-control-".concat(connected_control, "-font-style"), "customize-control-".concat(connected_control, "-line-height"), "customize-control-".concat(connected_control, "-letter-spacing"), "customize-control-".concat(connected_control, "-color"), "customize-control-".concat(connected_control, "-font-color")];
    var ul = document.querySelector(".responsive-typography-settings-group-".concat(connected_control));
    if (!ul) {
      ul = document.createElement('ul');
      ul.className = "responsive-typography-settings-group responsive-typography-settings-group-".concat(connected_control);
      typoGroupWrapperRef.current = ul;
    }

    // Append <li> elements to the <ul>
    liIds.forEach(function (id) {
      var li = document.getElementById(id);
      if (li && !ul.contains(li)) {
        ul.appendChild(li);
      }
    });

    // Find the reference element
    var referenceElement = document.getElementById("customize-control-responsive_".concat(connected_control, "_group"));
    if (referenceElement) {
      // Check if ul already has been added or if it needs to be inserted
      if (!referenceElement.nextElementSibling || !referenceElement.nextElementSibling.classList.contains('responsive-typography-settings-group')) {
        referenceElement.insertAdjacentElement('afterend', ul);
      }
      hasWrappedRef.current = true;
    } else {
      console.error('Reference element not found');
    }
  };
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    // Wrap <li> elements initially
    var timeoutId = setTimeout(function () {
      wrapLiElements();
    }, 1000);

    // Set up MutationObserver to watch for changes
    var observer = new MutationObserver(function () {
      wrapLiElements();
    });
    observer.observe(document.body, {
      childList: true,
      subtree: true
    });

    // Cleanup function
    return function () {
      clearTimeout(timeoutId);
      observer.disconnect();
    };
  }, [connected_control]);

  // Event listener for clicks outside the typoGroupSelectRef and typoGroupWrapperRef
  var handleClickOutsideTypoGroupSelect = function handleClickOutsideTypoGroupSelect(event) {
    if (typoGroupSelectRef.current && !typoGroupSelectRef.current.contains(event.target) && typoGroupWrapperRef.current && !typoGroupWrapperRef.current.contains(event.target)) {
      var controlSuffixes = suffixes.map(function (suffix) {
        return "".concat(connected_control, "-").concat(suffix);
      });
      controlSuffixes.forEach(function (suffix) {
        var element = document.getElementById("customize-control-".concat(suffix));
        if (element && window.getComputedStyle(element).display !== 'none') {
          element.style.display = 'none';
        }
      });
    }
  };
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    document.addEventListener('click', handleClickOutsideTypoGroupSelect, true);
    return function () {
      document.removeEventListener('click', handleClickOutsideTypoGroupSelect, true);
    };
  }, [connected_control]);

  // Toggle visibility of related controls
  var toggleRelatedTypoControls = function toggleRelatedTypoControls() {
    var controlSuffixes = suffixes.map(function (suffix) {
      return "".concat(connected_control, "-").concat(suffix);
    });
    controlSuffixes.forEach(function (suffix) {
      var element = document.getElementById("customize-control-".concat(suffix));
      if (element) {
        element.style.display = window.getComputedStyle(element).display === 'none' ? 'list-item' : 'none';
      }
    });
  };
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("div", {
    className: "responsive-typography-settings-group-icon"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("span", {
    className: "customize-control-title"
  }, label), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("svg", {
    ref: typoGroupSelectRef,
    className: "responsive-select-typo-group",
    "data-connected-control": connected_control,
    onClick: toggleRelatedTypoControls,
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("path", {
    d: "M15.1882 5.42371C15.6125 5.46914 15.9506 5.66389 16.2195 5.86902C16.5038 6.08591 16.8085 6.39362 17.1218 6.70691L17.2937 6.87878L17.7488 7.3407C17.8919 7.49154 18.0231 7.63899 18.1316 7.78113C18.3661 8.0885 18.5867 8.48632 18.5867 8.99988C18.5867 9.51343 18.3661 9.91126 18.1316 10.2186C18.0231 10.3608 17.8919 10.5082 17.7488 10.6591L17.2937 11.121L10.0994 18.3153C9.9816 18.4331 9.83767 18.5838 9.66187 18.7147L9.47534 18.8378C9.34339 18.9125 9.20446 18.9653 9.07202 19.0067L8.70581 19.1044L6.09741 19.7557L6.09546 19.7567L6.05151 19.7675C5.90366 19.8044 5.68229 19.8627 5.48804 19.8817C5.30725 19.8994 4.93857 19.9072 4.60229 19.662L4.46069 19.5399C4.09192 19.1711 4.09868 18.7193 4.1189 18.5126C4.13792 18.3183 4.19619 18.097 4.23315 17.9491L4.89624 15.2948L4.9939 14.9286C5.03527 14.7962 5.08813 14.6572 5.16284 14.5253L5.28589 14.3387C5.41681 14.1629 5.56753 14.019 5.6853 13.9012L12.8796 6.70691L13.3416 6.25183C13.4924 6.10866 13.6398 5.97746 13.782 5.86902C14.0894 5.63454 14.4872 5.41394 15.0007 5.41394L15.1882 5.42371Z",
    stroke: "#50575E",
    "stroke-width": "2"
  }), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("path", {
    d: "M12.5007 7.49988L15.5007 5.49988L18.5007 8.49988L16.5007 11.4999L12.5007 7.49988Z",
    fill: "#50575E"
  })));
};
TypographyGroupControlComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_0___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (/*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1___default.a.memo(TypographyGroupControlComponent));

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

/***/ "lodash":
/*!*************************!*\
  !*** external "lodash" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["lodash"]; }());

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["React"]; }());

/***/ })

/******/ });
//# sourceMappingURL=customizer.js.map