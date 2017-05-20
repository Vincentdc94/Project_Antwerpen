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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "./";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 52);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var bind = __webpack_require__(6);

/*global toString:true*/

// utils is a library of generic helper functions non-specific to axios

var toString = Object.prototype.toString;

/**
 * Determine if a value is an Array
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Array, otherwise false
 */
function isArray(val) {
  return toString.call(val) === '[object Array]';
}

/**
 * Determine if a value is an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an ArrayBuffer, otherwise false
 */
function isArrayBuffer(val) {
  return toString.call(val) === '[object ArrayBuffer]';
}

/**
 * Determine if a value is a FormData
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an FormData, otherwise false
 */
function isFormData(val) {
  return (typeof FormData !== 'undefined') && (val instanceof FormData);
}

/**
 * Determine if a value is a view on an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a view on an ArrayBuffer, otherwise false
 */
function isArrayBufferView(val) {
  var result;
  if ((typeof ArrayBuffer !== 'undefined') && (ArrayBuffer.isView)) {
    result = ArrayBuffer.isView(val);
  } else {
    result = (val) && (val.buffer) && (val.buffer instanceof ArrayBuffer);
  }
  return result;
}

/**
 * Determine if a value is a String
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a String, otherwise false
 */
function isString(val) {
  return typeof val === 'string';
}

/**
 * Determine if a value is a Number
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Number, otherwise false
 */
function isNumber(val) {
  return typeof val === 'number';
}

/**
 * Determine if a value is undefined
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if the value is undefined, otherwise false
 */
function isUndefined(val) {
  return typeof val === 'undefined';
}

/**
 * Determine if a value is an Object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Object, otherwise false
 */
function isObject(val) {
  return val !== null && typeof val === 'object';
}

/**
 * Determine if a value is a Date
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Date, otherwise false
 */
function isDate(val) {
  return toString.call(val) === '[object Date]';
}

/**
 * Determine if a value is a File
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a File, otherwise false
 */
function isFile(val) {
  return toString.call(val) === '[object File]';
}

/**
 * Determine if a value is a Blob
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Blob, otherwise false
 */
function isBlob(val) {
  return toString.call(val) === '[object Blob]';
}

/**
 * Determine if a value is a Function
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Function, otherwise false
 */
function isFunction(val) {
  return toString.call(val) === '[object Function]';
}

/**
 * Determine if a value is a Stream
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Stream, otherwise false
 */
function isStream(val) {
  return isObject(val) && isFunction(val.pipe);
}

/**
 * Determine if a value is a URLSearchParams object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a URLSearchParams object, otherwise false
 */
function isURLSearchParams(val) {
  return typeof URLSearchParams !== 'undefined' && val instanceof URLSearchParams;
}

/**
 * Trim excess whitespace off the beginning and end of a string
 *
 * @param {String} str The String to trim
 * @returns {String} The String freed of excess whitespace
 */
function trim(str) {
  return str.replace(/^\s*/, '').replace(/\s*$/, '');
}

/**
 * Determine if we're running in a standard browser environment
 *
 * This allows axios to run in a web worker, and react-native.
 * Both environments support XMLHttpRequest, but not fully standard globals.
 *
 * web workers:
 *  typeof window -> undefined
 *  typeof document -> undefined
 *
 * react-native:
 *  typeof document.createElement -> undefined
 */
function isStandardBrowserEnv() {
  return (
    typeof window !== 'undefined' &&
    typeof document !== 'undefined' &&
    typeof document.createElement === 'function'
  );
}

/**
 * Iterate over an Array or an Object invoking a function for each item.
 *
 * If `obj` is an Array callback will be called passing
 * the value, index, and complete array for each item.
 *
 * If 'obj' is an Object callback will be called passing
 * the value, key, and complete object for each property.
 *
 * @param {Object|Array} obj The object to iterate
 * @param {Function} fn The callback to invoke for each item
 */
function forEach(obj, fn) {
  // Don't bother if no value provided
  if (obj === null || typeof obj === 'undefined') {
    return;
  }

  // Force an array if not already something iterable
  if (typeof obj !== 'object' && !isArray(obj)) {
    /*eslint no-param-reassign:0*/
    obj = [obj];
  }

  if (isArray(obj)) {
    // Iterate over array values
    for (var i = 0, l = obj.length; i < l; i++) {
      fn.call(null, obj[i], i, obj);
    }
  } else {
    // Iterate over object keys
    for (var key in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, key)) {
        fn.call(null, obj[key], key, obj);
      }
    }
  }
}

/**
 * Accepts varargs expecting each argument to be an object, then
 * immutably merges the properties of each object and returns result.
 *
 * When multiple objects contain the same key the later object in
 * the arguments list will take precedence.
 *
 * Example:
 *
 * ```js
 * var result = merge({foo: 123}, {foo: 456});
 * console.log(result.foo); // outputs 456
 * ```
 *
 * @param {Object} obj1 Object to merge
 * @returns {Object} Result of all merge properties
 */
function merge(/* obj1, obj2, obj3, ... */) {
  var result = {};
  function assignValue(val, key) {
    if (typeof result[key] === 'object' && typeof val === 'object') {
      result[key] = merge(result[key], val);
    } else {
      result[key] = val;
    }
  }

  for (var i = 0, l = arguments.length; i < l; i++) {
    forEach(arguments[i], assignValue);
  }
  return result;
}

/**
 * Extends object a by mutably adding to it the properties of object b.
 *
 * @param {Object} a The object to be extended
 * @param {Object} b The object to copy properties from
 * @param {Object} thisArg The object to bind function to
 * @return {Object} The resulting value of object a
 */
function extend(a, b, thisArg) {
  forEach(b, function assignValue(val, key) {
    if (thisArg && typeof val === 'function') {
      a[key] = bind(val, thisArg);
    } else {
      a[key] = val;
    }
  });
  return a;
}

module.exports = {
  isArray: isArray,
  isArrayBuffer: isArrayBuffer,
  isFormData: isFormData,
  isArrayBufferView: isArrayBufferView,
  isString: isString,
  isNumber: isNumber,
  isObject: isObject,
  isUndefined: isUndefined,
  isDate: isDate,
  isFile: isFile,
  isBlob: isBlob,
  isFunction: isFunction,
  isStream: isStream,
  isURLSearchParams: isURLSearchParams,
  isStandardBrowserEnv: isStandardBrowserEnv,
  forEach: forEach,
  merge: merge,
  extend: extend,
  trim: trim
};


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(process) {

var utils = __webpack_require__(0);
var normalizeHeaderName = __webpack_require__(25);

var PROTECTION_PREFIX = /^\)\]\}',?\n/;
var DEFAULT_CONTENT_TYPE = {
  'Content-Type': 'application/x-www-form-urlencoded'
};

function setContentTypeIfUnset(headers, value) {
  if (!utils.isUndefined(headers) && utils.isUndefined(headers['Content-Type'])) {
    headers['Content-Type'] = value;
  }
}

function getDefaultAdapter() {
  var adapter;
  if (typeof XMLHttpRequest !== 'undefined') {
    // For browsers use XHR adapter
    adapter = __webpack_require__(2);
  } else if (typeof process !== 'undefined') {
    // For node use HTTP adapter
    adapter = __webpack_require__(2);
  }
  return adapter;
}

var defaults = {
  adapter: getDefaultAdapter(),

  transformRequest: [function transformRequest(data, headers) {
    normalizeHeaderName(headers, 'Content-Type');
    if (utils.isFormData(data) ||
      utils.isArrayBuffer(data) ||
      utils.isStream(data) ||
      utils.isFile(data) ||
      utils.isBlob(data)
    ) {
      return data;
    }
    if (utils.isArrayBufferView(data)) {
      return data.buffer;
    }
    if (utils.isURLSearchParams(data)) {
      setContentTypeIfUnset(headers, 'application/x-www-form-urlencoded;charset=utf-8');
      return data.toString();
    }
    if (utils.isObject(data)) {
      setContentTypeIfUnset(headers, 'application/json;charset=utf-8');
      return JSON.stringify(data);
    }
    return data;
  }],

  transformResponse: [function transformResponse(data) {
    /*eslint no-param-reassign:0*/
    if (typeof data === 'string') {
      data = data.replace(PROTECTION_PREFIX, '');
      try {
        data = JSON.parse(data);
      } catch (e) { /* Ignore */ }
    }
    return data;
  }],

  timeout: 0,

  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',

  maxContentLength: -1,

  validateStatus: function validateStatus(status) {
    return status >= 200 && status < 300;
  }
};

defaults.headers = {
  common: {
    'Accept': 'application/json, text/plain, */*'
  }
};

utils.forEach(['delete', 'get', 'head'], function forEachMehtodNoData(method) {
  defaults.headers[method] = {};
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  defaults.headers[method] = utils.merge(DEFAULT_CONTENT_TYPE);
});

module.exports = defaults;

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(7)))

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(process) {

var utils = __webpack_require__(0);
var settle = __webpack_require__(17);
var buildURL = __webpack_require__(20);
var parseHeaders = __webpack_require__(26);
var isURLSameOrigin = __webpack_require__(24);
var createError = __webpack_require__(5);
var btoa = (typeof window !== 'undefined' && window.btoa && window.btoa.bind(window)) || __webpack_require__(19);

module.exports = function xhrAdapter(config) {
  return new Promise(function dispatchXhrRequest(resolve, reject) {
    var requestData = config.data;
    var requestHeaders = config.headers;

    if (utils.isFormData(requestData)) {
      delete requestHeaders['Content-Type']; // Let the browser set it
    }

    var request = new XMLHttpRequest();
    var loadEvent = 'onreadystatechange';
    var xDomain = false;

    // For IE 8/9 CORS support
    // Only supports POST and GET calls and doesn't returns the response headers.
    // DON'T do this for testing b/c XMLHttpRequest is mocked, not XDomainRequest.
    if (process.env.NODE_ENV !== 'test' &&
        typeof window !== 'undefined' &&
        window.XDomainRequest && !('withCredentials' in request) &&
        !isURLSameOrigin(config.url)) {
      request = new window.XDomainRequest();
      loadEvent = 'onload';
      xDomain = true;
      request.onprogress = function handleProgress() {};
      request.ontimeout = function handleTimeout() {};
    }

    // HTTP basic authentication
    if (config.auth) {
      var username = config.auth.username || '';
      var password = config.auth.password || '';
      requestHeaders.Authorization = 'Basic ' + btoa(username + ':' + password);
    }

    request.open(config.method.toUpperCase(), buildURL(config.url, config.params, config.paramsSerializer), true);

    // Set the request timeout in MS
    request.timeout = config.timeout;

    // Listen for ready state
    request[loadEvent] = function handleLoad() {
      if (!request || (request.readyState !== 4 && !xDomain)) {
        return;
      }

      // The request errored out and we didn't get a response, this will be
      // handled by onerror instead
      // With one exception: request that using file: protocol, most browsers
      // will return status as 0 even though it's a successful request
      if (request.status === 0 && !(request.responseURL && request.responseURL.indexOf('file:') === 0)) {
        return;
      }

      // Prepare the response
      var responseHeaders = 'getAllResponseHeaders' in request ? parseHeaders(request.getAllResponseHeaders()) : null;
      var responseData = !config.responseType || config.responseType === 'text' ? request.responseText : request.response;
      var response = {
        data: responseData,
        // IE sends 1223 instead of 204 (https://github.com/mzabriskie/axios/issues/201)
        status: request.status === 1223 ? 204 : request.status,
        statusText: request.status === 1223 ? 'No Content' : request.statusText,
        headers: responseHeaders,
        config: config,
        request: request
      };

      settle(resolve, reject, response);

      // Clean up request
      request = null;
    };

    // Handle low level network errors
    request.onerror = function handleError() {
      // Real errors are hidden from us by the browser
      // onerror should only fire if it's a network error
      reject(createError('Network Error', config));

      // Clean up request
      request = null;
    };

    // Handle timeout
    request.ontimeout = function handleTimeout() {
      reject(createError('timeout of ' + config.timeout + 'ms exceeded', config, 'ECONNABORTED'));

      // Clean up request
      request = null;
    };

    // Add xsrf header
    // This is only done if running in a standard browser environment.
    // Specifically not if we're in a web worker, or react-native.
    if (utils.isStandardBrowserEnv()) {
      var cookies = __webpack_require__(22);

      // Add xsrf header
      var xsrfValue = (config.withCredentials || isURLSameOrigin(config.url)) && config.xsrfCookieName ?
          cookies.read(config.xsrfCookieName) :
          undefined;

      if (xsrfValue) {
        requestHeaders[config.xsrfHeaderName] = xsrfValue;
      }
    }

    // Add headers to the request
    if ('setRequestHeader' in request) {
      utils.forEach(requestHeaders, function setRequestHeader(val, key) {
        if (typeof requestData === 'undefined' && key.toLowerCase() === 'content-type') {
          // Remove Content-Type if data is undefined
          delete requestHeaders[key];
        } else {
          // Otherwise add header to the request
          request.setRequestHeader(key, val);
        }
      });
    }

    // Add withCredentials to request if needed
    if (config.withCredentials) {
      request.withCredentials = true;
    }

    // Add responseType to request if needed
    if (config.responseType) {
      try {
        request.responseType = config.responseType;
      } catch (e) {
        if (request.responseType !== 'json') {
          throw e;
        }
      }
    }

    // Handle progress if needed
    if (typeof config.onDownloadProgress === 'function') {
      request.addEventListener('progress', config.onDownloadProgress);
    }

    // Not all browsers support upload events
    if (typeof config.onUploadProgress === 'function' && request.upload) {
      request.upload.addEventListener('progress', config.onUploadProgress);
    }

    if (config.cancelToken) {
      // Handle cancellation
      config.cancelToken.promise.then(function onCanceled(cancel) {
        if (!request) {
          return;
        }

        request.abort();
        reject(cancel);
        // Clean up request
        request = null;
      });
    }

    if (requestData === undefined) {
      requestData = null;
    }

    // Send the request
    request.send(requestData);
  });
};

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(7)))

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * A `Cancel` is an object that is thrown when an operation is canceled.
 *
 * @class
 * @param {string=} message The message.
 */
function Cancel(message) {
  this.message = message;
}

Cancel.prototype.toString = function toString() {
  return 'Cancel' + (this.message ? ': ' + this.message : '');
};

Cancel.prototype.__CANCEL__ = true;

module.exports = Cancel;


/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function isCancel(value) {
  return !!(value && value.__CANCEL__);
};


/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var enhanceError = __webpack_require__(16);

/**
 * Create an Error with the specified message, config, error code, and response.
 *
 * @param {string} message The error message.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 @ @param {Object} [response] The response.
 * @returns {Error} The created error.
 */
module.exports = function createError(message, config, code, response) {
  var error = new Error(message);
  return enhanceError(error, config, code, response);
};


/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function bind(fn, thisArg) {
  return function wrap() {
    var args = new Array(arguments.length);
    for (var i = 0; i < args.length; i++) {
      args[i] = arguments[i];
    }
    return fn.apply(thisArg, args);
  };
};


/***/ }),
/* 7 */
/***/ (function(module, exports) {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

__webpack_require__(28);
__webpack_require__(35);

/**
 * News
 */

__webpack_require__(34);

/**
 * Utility code voor algemene operaties
 */

__webpack_require__(45);
__webpack_require__(44);
__webpack_require__(46);

/**
 * UI code voor alle zotte ui elementen
 */

__webpack_require__(42);
__webpack_require__(38);
__webpack_require__(37);
__webpack_require__(41);
__webpack_require__(36);
__webpack_require__(40);
__webpack_require__(43);
__webpack_require__(39);

/**
 * Form code zoals custom selects en andere ui greatness
 */
__webpack_require__(30);
__webpack_require__(31);
__webpack_require__(32);
__webpack_require__(33);

/**
 * Code voor alle posts, gets en ajax geladen views
 */

__webpack_require__(51);
__webpack_require__(66);
__webpack_require__(47);
__webpack_require__(48);
__webpack_require__(50);
__webpack_require__(49);
__webpack_require__(67);
__webpack_require__(68);

(function () {
	TIM.experience.start();

	UI.Modal.init('media');
	UI.Modal.init('opleiding');
	UI.Modal.init('mediabrowser');

	FORM.Select.init();
	FORM.Textarea.init();
	FORM.Upload.init();

	UI.Navigation.init();
	UI.User.init();

	UI.Slider.init('slider-sight', 1);
	UI.Media.init();
	UI.SingleMedia.init();
	UI.Search.init();

	VIEW.Profile.init();
	VIEW.Users.init();
	VIEW.Opleiding.init();
	VIEW.School.init();
	VIEW.Article.init();
	VIEW.MediaBrowser.init();
	VIEW.Search.init();

	News.init();
})();

/***/ }),
/* 9 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);
var bind = __webpack_require__(6);
var Axios = __webpack_require__(13);
var defaults = __webpack_require__(1);

/**
 * Create an instance of Axios
 *
 * @param {Object} defaultConfig The default config for the instance
 * @return {Axios} A new instance of Axios
 */
function createInstance(defaultConfig) {
  var context = new Axios(defaultConfig);
  var instance = bind(Axios.prototype.request, context);

  // Copy axios.prototype to instance
  utils.extend(instance, Axios.prototype, context);

  // Copy context to instance
  utils.extend(instance, context);

  return instance;
}

// Create the default instance to be exported
var axios = createInstance(defaults);

// Expose Axios class to allow class inheritance
axios.Axios = Axios;

// Factory for creating new instances
axios.create = function create(instanceConfig) {
  return createInstance(utils.merge(defaults, instanceConfig));
};

// Expose Cancel & CancelToken
axios.Cancel = __webpack_require__(3);
axios.CancelToken = __webpack_require__(12);
axios.isCancel = __webpack_require__(4);

// Expose all/spread
axios.all = function all(promises) {
  return Promise.all(promises);
};
axios.spread = __webpack_require__(27);

module.exports = axios;

// Allow use of default import syntax in TypeScript
module.exports.default = axios;


/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var Cancel = __webpack_require__(3);

/**
 * A `CancelToken` is an object that can be used to request cancellation of an operation.
 *
 * @class
 * @param {Function} executor The executor function.
 */
function CancelToken(executor) {
  if (typeof executor !== 'function') {
    throw new TypeError('executor must be a function.');
  }

  var resolvePromise;
  this.promise = new Promise(function promiseExecutor(resolve) {
    resolvePromise = resolve;
  });

  var token = this;
  executor(function cancel(message) {
    if (token.reason) {
      // Cancellation has already been requested
      return;
    }

    token.reason = new Cancel(message);
    resolvePromise(token.reason);
  });
}

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
CancelToken.prototype.throwIfRequested = function throwIfRequested() {
  if (this.reason) {
    throw this.reason;
  }
};

/**
 * Returns an object that contains a new `CancelToken` and a function that, when called,
 * cancels the `CancelToken`.
 */
CancelToken.source = function source() {
  var cancel;
  var token = new CancelToken(function executor(c) {
    cancel = c;
  });
  return {
    token: token,
    cancel: cancel
  };
};

module.exports = CancelToken;


/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var defaults = __webpack_require__(1);
var utils = __webpack_require__(0);
var InterceptorManager = __webpack_require__(14);
var dispatchRequest = __webpack_require__(15);
var isAbsoluteURL = __webpack_require__(23);
var combineURLs = __webpack_require__(21);

/**
 * Create a new instance of Axios
 *
 * @param {Object} instanceConfig The default config for the instance
 */
function Axios(instanceConfig) {
  this.defaults = instanceConfig;
  this.interceptors = {
    request: new InterceptorManager(),
    response: new InterceptorManager()
  };
}

/**
 * Dispatch a request
 *
 * @param {Object} config The config specific for this request (merged with this.defaults)
 */
Axios.prototype.request = function request(config) {
  /*eslint no-param-reassign:0*/
  // Allow for axios('example/url'[, config]) a la fetch API
  if (typeof config === 'string') {
    config = utils.merge({
      url: arguments[0]
    }, arguments[1]);
  }

  config = utils.merge(defaults, this.defaults, { method: 'get' }, config);

  // Support baseURL config
  if (config.baseURL && !isAbsoluteURL(config.url)) {
    config.url = combineURLs(config.baseURL, config.url);
  }

  // Hook up interceptors middleware
  var chain = [dispatchRequest, undefined];
  var promise = Promise.resolve(config);

  this.interceptors.request.forEach(function unshiftRequestInterceptors(interceptor) {
    chain.unshift(interceptor.fulfilled, interceptor.rejected);
  });

  this.interceptors.response.forEach(function pushResponseInterceptors(interceptor) {
    chain.push(interceptor.fulfilled, interceptor.rejected);
  });

  while (chain.length) {
    promise = promise.then(chain.shift(), chain.shift());
  }

  return promise;
};

// Provide aliases for supported request methods
utils.forEach(['delete', 'get', 'head'], function forEachMethodNoData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url
    }));
  };
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, data, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url,
      data: data
    }));
  };
});

module.exports = Axios;


/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

function InterceptorManager() {
  this.handlers = [];
}

/**
 * Add a new interceptor to the stack
 *
 * @param {Function} fulfilled The function to handle `then` for a `Promise`
 * @param {Function} rejected The function to handle `reject` for a `Promise`
 *
 * @return {Number} An ID used to remove interceptor later
 */
InterceptorManager.prototype.use = function use(fulfilled, rejected) {
  this.handlers.push({
    fulfilled: fulfilled,
    rejected: rejected
  });
  return this.handlers.length - 1;
};

/**
 * Remove an interceptor from the stack
 *
 * @param {Number} id The ID that was returned by `use`
 */
InterceptorManager.prototype.eject = function eject(id) {
  if (this.handlers[id]) {
    this.handlers[id] = null;
  }
};

/**
 * Iterate over all the registered interceptors
 *
 * This method is particularly useful for skipping over any
 * interceptors that may have become `null` calling `eject`.
 *
 * @param {Function} fn The function to call for each interceptor
 */
InterceptorManager.prototype.forEach = function forEach(fn) {
  utils.forEach(this.handlers, function forEachHandler(h) {
    if (h !== null) {
      fn(h);
    }
  });
};

module.exports = InterceptorManager;


/***/ }),
/* 15 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);
var transformData = __webpack_require__(18);
var isCancel = __webpack_require__(4);
var defaults = __webpack_require__(1);

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
function throwIfCancellationRequested(config) {
  if (config.cancelToken) {
    config.cancelToken.throwIfRequested();
  }
}

/**
 * Dispatch a request to the server using the configured adapter.
 *
 * @param {object} config The config that is to be used for the request
 * @returns {Promise} The Promise to be fulfilled
 */
module.exports = function dispatchRequest(config) {
  throwIfCancellationRequested(config);

  // Ensure headers exist
  config.headers = config.headers || {};

  // Transform request data
  config.data = transformData(
    config.data,
    config.headers,
    config.transformRequest
  );

  // Flatten headers
  config.headers = utils.merge(
    config.headers.common || {},
    config.headers[config.method] || {},
    config.headers || {}
  );

  utils.forEach(
    ['delete', 'get', 'head', 'post', 'put', 'patch', 'common'],
    function cleanHeaderConfig(method) {
      delete config.headers[method];
    }
  );

  var adapter = config.adapter || defaults.adapter;

  return adapter(config).then(function onAdapterResolution(response) {
    throwIfCancellationRequested(config);

    // Transform response data
    response.data = transformData(
      response.data,
      response.headers,
      config.transformResponse
    );

    return response;
  }, function onAdapterRejection(reason) {
    if (!isCancel(reason)) {
      throwIfCancellationRequested(config);

      // Transform response data
      if (reason && reason.response) {
        reason.response.data = transformData(
          reason.response.data,
          reason.response.headers,
          config.transformResponse
        );
      }
    }

    return Promise.reject(reason);
  });
};


/***/ }),
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Update an Error with the specified config, error code, and response.
 *
 * @param {Error} error The error to update.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 @ @param {Object} [response] The response.
 * @returns {Error} The error.
 */
module.exports = function enhanceError(error, config, code, response) {
  error.config = config;
  if (code) {
    error.code = code;
  }
  error.response = response;
  return error;
};


/***/ }),
/* 17 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var createError = __webpack_require__(5);

/**
 * Resolve or reject a Promise based on response status.
 *
 * @param {Function} resolve A function that resolves the promise.
 * @param {Function} reject A function that rejects the promise.
 * @param {object} response The response.
 */
module.exports = function settle(resolve, reject, response) {
  var validateStatus = response.config.validateStatus;
  // Note: status is not exposed by XDomainRequest
  if (!response.status || !validateStatus || validateStatus(response.status)) {
    resolve(response);
  } else {
    reject(createError(
      'Request failed with status code ' + response.status,
      response.config,
      null,
      response
    ));
  }
};


/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

/**
 * Transform the data for a request or a response
 *
 * @param {Object|String} data The data to be transformed
 * @param {Array} headers The headers for the request or response
 * @param {Array|Function} fns A single function or Array of functions
 * @returns {*} The resulting transformed data
 */
module.exports = function transformData(data, headers, fns) {
  /*eslint no-param-reassign:0*/
  utils.forEach(fns, function transform(fn) {
    data = fn(data, headers);
  });

  return data;
};


/***/ }),
/* 19 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


// btoa polyfill for IE<10 courtesy https://github.com/davidchambers/Base64.js

var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';

function E() {
  this.message = 'String contains an invalid character';
}
E.prototype = new Error;
E.prototype.code = 5;
E.prototype.name = 'InvalidCharacterError';

function btoa(input) {
  var str = String(input);
  var output = '';
  for (
    // initialize result and counter
    var block, charCode, idx = 0, map = chars;
    // if the next str index does not exist:
    //   change the mapping table to "="
    //   check if d has no fractional digits
    str.charAt(idx | 0) || (map = '=', idx % 1);
    // "8 - idx % 1 * 8" generates the sequence 2, 4, 6, 8
    output += map.charAt(63 & block >> 8 - idx % 1 * 8)
  ) {
    charCode = str.charCodeAt(idx += 3 / 4);
    if (charCode > 0xFF) {
      throw new E();
    }
    block = block << 8 | charCode;
  }
  return output;
}

module.exports = btoa;


/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

function encode(val) {
  return encodeURIComponent(val).
    replace(/%40/gi, '@').
    replace(/%3A/gi, ':').
    replace(/%24/g, '$').
    replace(/%2C/gi, ',').
    replace(/%20/g, '+').
    replace(/%5B/gi, '[').
    replace(/%5D/gi, ']');
}

/**
 * Build a URL by appending params to the end
 *
 * @param {string} url The base of the url (e.g., http://www.google.com)
 * @param {object} [params] The params to be appended
 * @returns {string} The formatted url
 */
module.exports = function buildURL(url, params, paramsSerializer) {
  /*eslint no-param-reassign:0*/
  if (!params) {
    return url;
  }

  var serializedParams;
  if (paramsSerializer) {
    serializedParams = paramsSerializer(params);
  } else if (utils.isURLSearchParams(params)) {
    serializedParams = params.toString();
  } else {
    var parts = [];

    utils.forEach(params, function serialize(val, key) {
      if (val === null || typeof val === 'undefined') {
        return;
      }

      if (utils.isArray(val)) {
        key = key + '[]';
      }

      if (!utils.isArray(val)) {
        val = [val];
      }

      utils.forEach(val, function parseValue(v) {
        if (utils.isDate(v)) {
          v = v.toISOString();
        } else if (utils.isObject(v)) {
          v = JSON.stringify(v);
        }
        parts.push(encode(key) + '=' + encode(v));
      });
    });

    serializedParams = parts.join('&');
  }

  if (serializedParams) {
    url += (url.indexOf('?') === -1 ? '?' : '&') + serializedParams;
  }

  return url;
};


/***/ }),
/* 21 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Creates a new URL by combining the specified URLs
 *
 * @param {string} baseURL The base URL
 * @param {string} relativeURL The relative URL
 * @returns {string} The combined URL
 */
module.exports = function combineURLs(baseURL, relativeURL) {
  return baseURL.replace(/\/+$/, '') + '/' + relativeURL.replace(/^\/+/, '');
};


/***/ }),
/* 22 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs support document.cookie
  (function standardBrowserEnv() {
    return {
      write: function write(name, value, expires, path, domain, secure) {
        var cookie = [];
        cookie.push(name + '=' + encodeURIComponent(value));

        if (utils.isNumber(expires)) {
          cookie.push('expires=' + new Date(expires).toGMTString());
        }

        if (utils.isString(path)) {
          cookie.push('path=' + path);
        }

        if (utils.isString(domain)) {
          cookie.push('domain=' + domain);
        }

        if (secure === true) {
          cookie.push('secure');
        }

        document.cookie = cookie.join('; ');
      },

      read: function read(name) {
        var match = document.cookie.match(new RegExp('(^|;\\s*)(' + name + ')=([^;]*)'));
        return (match ? decodeURIComponent(match[3]) : null);
      },

      remove: function remove(name) {
        this.write(name, '', Date.now() - 86400000);
      }
    };
  })() :

  // Non standard browser env (web workers, react-native) lack needed support.
  (function nonStandardBrowserEnv() {
    return {
      write: function write() {},
      read: function read() { return null; },
      remove: function remove() {}
    };
  })()
);


/***/ }),
/* 23 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Determines whether the specified URL is absolute
 *
 * @param {string} url The URL to test
 * @returns {boolean} True if the specified URL is absolute, otherwise false
 */
module.exports = function isAbsoluteURL(url) {
  // A URL is considered absolute if it begins with "<scheme>://" or "//" (protocol-relative URL).
  // RFC 3986 defines scheme name as a sequence of characters beginning with a letter and followed
  // by any combination of letters, digits, plus, period, or hyphen.
  return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(url);
};


/***/ }),
/* 24 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs have full support of the APIs needed to test
  // whether the request URL is of the same origin as current location.
  (function standardBrowserEnv() {
    var msie = /(msie|trident)/i.test(navigator.userAgent);
    var urlParsingNode = document.createElement('a');
    var originURL;

    /**
    * Parse a URL to discover it's components
    *
    * @param {String} url The URL to be parsed
    * @returns {Object}
    */
    function resolveURL(url) {
      var href = url;

      if (msie) {
        // IE needs attribute set twice to normalize properties
        urlParsingNode.setAttribute('href', href);
        href = urlParsingNode.href;
      }

      urlParsingNode.setAttribute('href', href);

      // urlParsingNode provides the UrlUtils interface - http://url.spec.whatwg.org/#urlutils
      return {
        href: urlParsingNode.href,
        protocol: urlParsingNode.protocol ? urlParsingNode.protocol.replace(/:$/, '') : '',
        host: urlParsingNode.host,
        search: urlParsingNode.search ? urlParsingNode.search.replace(/^\?/, '') : '',
        hash: urlParsingNode.hash ? urlParsingNode.hash.replace(/^#/, '') : '',
        hostname: urlParsingNode.hostname,
        port: urlParsingNode.port,
        pathname: (urlParsingNode.pathname.charAt(0) === '/') ?
                  urlParsingNode.pathname :
                  '/' + urlParsingNode.pathname
      };
    }

    originURL = resolveURL(window.location.href);

    /**
    * Determine if a URL shares the same origin as the current location
    *
    * @param {String} requestURL The URL to test
    * @returns {boolean} True if URL shares the same origin, otherwise false
    */
    return function isURLSameOrigin(requestURL) {
      var parsed = (utils.isString(requestURL)) ? resolveURL(requestURL) : requestURL;
      return (parsed.protocol === originURL.protocol &&
            parsed.host === originURL.host);
    };
  })() :

  // Non standard browser envs (web workers, react-native) lack needed support.
  (function nonStandardBrowserEnv() {
    return function isURLSameOrigin() {
      return true;
    };
  })()
);


/***/ }),
/* 25 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

module.exports = function normalizeHeaderName(headers, normalizedName) {
  utils.forEach(headers, function processHeader(value, name) {
    if (name !== normalizedName && name.toUpperCase() === normalizedName.toUpperCase()) {
      headers[normalizedName] = value;
      delete headers[name];
    }
  });
};


/***/ }),
/* 26 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(0);

/**
 * Parse headers into an object
 *
 * ```
 * Date: Wed, 27 Aug 2014 08:58:49 GMT
 * Content-Type: application/json
 * Connection: keep-alive
 * Transfer-Encoding: chunked
 * ```
 *
 * @param {String} headers Headers needing to be parsed
 * @returns {Object} Headers parsed into an object
 */
module.exports = function parseHeaders(headers) {
  var parsed = {};
  var key;
  var val;
  var i;

  if (!headers) { return parsed; }

  utils.forEach(headers.split('\n'), function parser(line) {
    i = line.indexOf(':');
    key = utils.trim(line.substr(0, i)).toLowerCase();
    val = utils.trim(line.substr(i + 1));

    if (key) {
      parsed[key] = parsed[key] ? parsed[key] + ', ' + val : val;
    }
  });

  return parsed;
};


/***/ }),
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Syntactic sugar for invoking a function and expanding an array for arguments.
 *
 * Common use case would be to use `Function.prototype.apply`.
 *
 *  ```js
 *  function f(x, y, z) {}
 *  var args = [1, 2, 3];
 *  f.apply(null, args);
 *  ```
 *
 * With `spread` this example can be re-written.
 *
 *  ```js
 *  spread(function(x, y, z) {})([1, 2, 3]);
 *  ```
 *
 * @param {Function} callback
 * @returns {Function}
 */
module.exports = function spread(callback) {
  return function wrap(arr) {
    return callback.apply(null, arr);
  };
};


/***/ }),
/* 28 */
/***/ (function(module, exports, __webpack_require__) {


// window._ = require('lodash');


// window.THREE = require('three');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// window.$ = window.jQuery = require('jquery');

// require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

//window.Vue = require('vue');

/**
 * CKeditor
 */

// require('ckeditor/config');
// var CKEDITOR = require('ckeditor/ckeditor');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = __webpack_require__(10);

window.axios.defaults.headers.common = {
  'X-CSRF-TOKEN': window.Laravel.csrfToken,
  'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

/***/ }),
/* 29 */,
/* 30 */
/***/ (function(module, exports) {

FORM = {};

/***/ }),
/* 31 */
/***/ (function(module, exports) {


FORM.Select = function () {
  var select;

  var revealOptions = function revealOptions(event) {
    var currentDropdown = event.target;

    //Als child element is dan pak de select
    if (currentDropdown.parentNode.classList.contains("select")) {
      currentDropdown = currentDropdown.parentNode;
    }

    var currentDropdownOptions = currentDropdown.nextSibling;

    if (currentDropdownOptions.classList.contains('visible')) {
      currentDropdownOptions.classList.remove('visible');
    } else {
      currentDropdownOptions.classList.add('visible');
    }
  };

  var chooseOption = function chooseOption(event) {
    var currentOption = event.target;
    var currentSelect = event.target.parentNode.previousSibling;

    currentSelect.children[0].innerHTML = currentOption.innerHTML;
    currentSelect.children[1].value = currentOption.dataset.id;

    currentOption.parentNode.classList.remove('visible');
  };

  var setDefaultOptions = function setDefaultOptions(option, optionsholder, select) {
    select.children[0].innerHTML = option.innerHTML;
    select.children[1].value = option.dataset.id;

    optionsholder.classList.remove('visible');
  };

  var makeOption = function makeOption(optionsHolder, currentOption, newSelect) {
    var newOption = document.createElement("div");
    newOption.dataset.id = currentOption.value;
    newOption.innerHTML = currentOption.innerHTML;
    newOption.className = "select-option";
    newOption.addEventListener('click', chooseOption, false);

    if (currentOption.selected) {
      setDefaultOptions(newOption, optionsHolder, newSelect);
    }

    optionsHolder.appendChild(newOption);
  };

  var selectLeave = function selectLeave(event) {
    event.target.classList.remove('visible');
  };

  var makeSelect = function makeSelect(currentSelect) {
    var newSelect = document.createElement("div");
    newSelect.className = "select";
    newSelect.addEventListener('click', revealOptions, false);

    var newSelectInput = document.createElement('input');
    newSelectInput.type = 'hidden';
    newSelectInput.name = currentSelect.name;
    newSelectInput.id = currentSelect.id;

    var chevronDown = document.createElement("i");
    chevronDown.className = "fa fa-chevron-down float-right";
    chevronDown.style.color = "#555";

    var optionsHolder = document.createElement("div");
    optionsHolder.className = "select-options-holder";
    optionsHolder.addEventListener('mouseleave', selectLeave, false);

    var options = currentSelect.getElementsByTagName("option");

    currentSelect.parentNode.insertBefore(newSelect, currentSelect.nextSibling);
    newSelect.parentNode.insertBefore(optionsHolder, newSelect.nextSibling);

    newSelect.innerHTML = '<span class="select-value">' + options[0].innerHTML + '</span>';
    newSelectInput.value = options[0].value;

    newSelect.appendChild(newSelectInput);
    newSelect.appendChild(chevronDown);

    for (var optionIndex = 0; optionIndex < options.length; optionIndex++) {
      makeOption(optionsHolder, options[optionIndex], newSelect);
    }

    currentSelect.remove();
  };

  return {
    init: function init() {
      var selects = document.getElementsByClassName("select");

      for (var selectIndex = 0; selectIndex < selects.length; selectIndex++) {
        makeSelect(selects[selectIndex]);
      }
    }
  };
}();

/***/ }),
/* 32 */
/***/ (function(module, exports) {



FORM.Textarea = function () {
    return {
        init: function init() {
            var textareas = document.getElementsByClassName('richtext');

            if (textareas === null) {
                return;
            }

            for (var textareaIndex = 0; textareaIndex < textareas.length; textareaIndex++) {
                CKEDITOR.replace(textareas[textareaIndex].getAttribute('name'));
            }
        }
    };
}();

/***/ }),
/* 33 */
/***/ (function(module, exports) {

FORM.Upload = function () {

  return {
    init: function init() {}
  };
}();

/***/ }),
/* 34 */
/***/ (function(module, exports) {

News = function () {

    var hideButton = function hideButton(event) {
        var newsItem = event.target;

        if (newsItem.parentElement.classList.contains('news-overlay')) {
            newsItem = newsItem.parentElement;
        }

        var newsButton = newsItem.getElementsByClassName('news-button')[0];
        newsButton.style.visibility = 'hidden';
        newsButton.style.opacity = 0;
    };

    var showButton = function showButton(event) {
        var newsItem = event.target;

        if (newsItem.parentElement.classList.contains('news-overlay')) {
            newsItem = newsItem.parentElement;
        }

        var newsButton = newsItem.getElementsByClassName('news-button')[0];
        newsButton.style.visibility = 'visible';
        newsButton.style.opacity = 1;
    };

    return {
        init: function init() {
            var newsElements = document.getElementsByClassName("news-image");

            for (var newsIndex = 0; newsIndex < newsElements.length; newsIndex++) {
                var newsImage = newsElements[newsIndex].getAttribute("src");
                var newsItem = newsElements[newsIndex].parentElement;

                newsItem.style.backgroundImage = 'url(' + newsImage + ')';
                newsItem.style.backgroundSize = "cover";
                newsItem.addEventListener('mouseover', showButton, false);
                newsItem.addEventListener('mouseleave', hideButton, false);
            }
        }
    };
}();

module.exports = News;

/***/ }),
/* 35 */
/***/ (function(module, exports) {

TIM = {};

TIM.experience = function () {

	//TODO: Toevoegen van text omhoogzetten voor plaats maken van afbeeldingen en het corrent weergeven van afbeeldingen

	var timeline = [{
		delay: 0,
		subtitle: "Antwerpen heeft veel te bieden",
		eventType: "changeTextFade",
		delayStop: 3000
	}, {
		delay: 2000,
		title: "Het Mas",
		subtitle: "Een mooi en modern museum",
		eventType: "changeTextFade",
		delayStop: 3000
	}, {
		delay: 0,
		source: "images/bezienswaardigheden/mas.jpg",
		eventType: "backgroundImageFade",
		delayStop: 4000
	}, {
		delay: 4000,
		title: "De kathedraal",
		subtitle: "Een glorieus bastion van religie & cultuur",
		eventType: "changeTextFade",
		delayStop: 3000
	}, {
		delay: 0,
		source: "images/bezienswaardigheden/kathedraal.jpg",
		eventType: "backgroundImageFade",
		delayStop: 4000
	}, {
		delay: 4000,
		title: "De Groenplaats",
		subtitle: "Het hart van Antwerpen.",
		eventType: "changeTextFade",
		delayStop: 3000
	}, {
		delay: 0,
		source: "images/bezienswaardigheden/groenplaats.jpg",
		eventType: "backgroundImageFade",
		delayStop: 4000
	}, {
		delay: 4000,
		eventType: "end",
		delayStop: 4000
	}, {
		delay: 0,
		source: "",
		eventType: "backgroundImageFade",
		delayStop: 4000
	}, {
		delay: 0,
		title: "Bedankt",
		subtitle: "Kijk op de site om meer te ontdekken",
		eventType: "changeTextFade",
		delayStop: 3000
	}];

	var contentTitle;
	var contentSubTitle;
	var contentImage;
	var end;

	var btnStart;
	var btnWebsite;

	var startTimeline = function startTimeline() {
		hideExperience();

		var timelineDelay = 0;
		var timelineDelayStop = 0;

		for (var tEvent in timeline) {
			var timeLineEvent = timeline[tEvent];
			timelineDelay += timeLineEvent.delay;

			(function (timeLineEvent, timeLineDelay) {
				setTimeout(function () {
					experienceEvent(timeLineEvent);
				}, timelineDelay);
			})(timeLineEvent, timelineDelay);

			timelineDelayStop += timeLineEvent.delayStop;

			(function (timeLineEvent, timeLineDelay) {
				setTimeout(function () {
					remove(timeLineEvent.element);
				}, timeLineDelay);
			})(timeLineEvent, timelineDelayStop);
		}
	};

	var hideExperience = function hideExperience() {
		btnStart.classList.add("hide");
		btnWebsite.classList.add("hide");
	};

	var changeTextFade = function changeTextFade(timeLineEvent) {
		if (timeLineEvent.title !== undefined) {
			contentTitle.classList.add("hide");
		}

		if (timeLineEvent.subtitle !== undefined) {
			contentSubTitle.classList.add("hide");
		}

		(function () {
			setTimeout(function () {
				if (timeLineEvent.title !== undefined) {
					contentTitle.classList.remove("hide");
					contentTitle.innerHTML = '<span class="animate-text">' + timeLineEvent.title + '</span>';
				}

				if (timeLineEvent.subtitle !== undefined) {
					contentSubTitle.classList.remove("hide");
					contentSubTitle.innerHTML = '<span class="animate-text">' + timeLineEvent.subtitle + '</span>';
				}
			}, 500);
		})();
	};

	var backgroundImageFade = function backgroundImageFade(timeLineEvent) {

		if (timeLineEvent.source === "") {
			contentImage.classList.remove("animate-image");
			contentImage.classList.add("hide");
			return;
		}

		if (timeLineEvent.source !== undefined) {
			contentImage.classList.remove("animate-image");
		}

		(function () {
			setTimeout(function () {
				if (timeLineEvent.source !== undefined) {
					contentImage.classList.remove("hide");
					contentImage.setAttribute('src', timeLineEvent.source);
					contentImage.classList.add("animate-image");
				}
			}, 500);
		})();
	};

	var endAnim = function endAnim(timeLineEvent) {
		var start = document.getElementById("start");
		start.style.display = "none";
		end.style.display = "block";
		end.classList.remove("hide");
		end.classList.add("animate-text");
	};

	var experienceEvent = function experienceEvent(timeLineEvent) {
		if (timeLineEvent.eventType === "end") {
			endAnim(timeLineEvent);
		}

		if (timeLineEvent.eventType === "changeTextFade") {
			changeTextFade(timeLineEvent);
		}

		if (timeLineEvent.eventType === "backgroundImageFade") {
			backgroundImageFade(timeLineEvent);
		}

		if (timeLineEvent.eventType === "images") {
			addImages(timeLineEvent.element, timeLineEvent.delay);
		}
	};

	var remove = function remove(element) {
		element.classList.add("hide");
	};

	var animateOverlay = function animateOverlay() {
		var contentOverlay = document.getElementById("content-overlay");
		var contentOverlay2 = document.getElementById("content-overlay-2");
		var contentOverlay3 = document.getElementById("content-overlay-3");

		contentOverlay.classList.add("content-overlay-animate");

		setTimeout(function () {
			contentOverlay2.classList.add("content-overlay-animate2");
		}, 300);

		setTimeout(function () {
			contentOverlay3.classList.add("content-overlay-animate3");
		}, 700);
	};

	return {
		start: function start() {
			var tim = document.getElementById("tim");

			if (tim === null) {
				return;
			}

			contentTitle = document.getElementById("content-title");
			contentSubTitle = document.getElementById("content-subtitle");
			contentImage = document.getElementById("content-image");
			end = document.getElementById("end");
			end.style.display = "none";

			btnStart = document.getElementById("start-experience");
			btnWebsite = document.getElementById("go-website");

			btnStart.addEventListener("click", startTimeline, false);

			animateOverlay();
		}
	};
}();

/***/ }),
/* 36 */
/***/ (function(module, exports) {

UI.Media = function () {
  var mediaBrowserButton;
  var mediaItemHolder;
  var mediaLoad = new Event('mediaload');

  var loadChosenMedia = function loadChosenMedia() {
    mediaItemHolder.innerHTML = '';

    for (var mediaIndex = 0; mediaIndex < VIEW.selectedMedia.length; mediaIndex++) {
      var mediaItem = VIEW.MediaBrowser.createMediaItem(VIEW.selectedMedia[mediaIndex].id, VIEW.selectedMedia[mediaIndex].url);

      mediaItemHolder.appendChild(mediaItem);
    }
  };

  var events = function events() {
    document.addEventListener('mediachosen', loadChosenMedia, false);

    window.addEventListener('load', function () {
      document.dispatchEvent(mediaLoad);
    }, false);
  };

  return {
    init: function init() {
      mediaBrowserButton = document.getElementById('modal-mediabrowser-open');

      if (mediaBrowserButton === null || mediaBrowserButton === undefined) {
        return;
      }

      mediaItemHolder = document.getElementById('media-item-holder');

      events();
    }
  };
}();

/***/ }),
/* 37 */
/***/ (function(module, exports) {

UI.Modal = function () {
    var modal;
    var closeModal;

    var showModal = function showModal(event) {
        var triggerElement = event.target;

        if (event.target.nodeName === 'I') {
            triggerElement = event.target.parentNode;
        }

        var elementId = triggerElement.id.split('-', 2);

        $el = document.getElementById(elementId[0] + '-' + elementId[1]);
        $el.classList.add('modal-show');
    };

    var hideModal = function hideModal(event) {
        var triggerElement = event.target;

        if (event.target.nodeName === 'I') {
            triggerElement = event.target.parentNode;
        }

        var elementId = triggerElement.id.split('-', 2);

        $el = document.getElementById(elementId[0] + '-' + elementId[1]);
        $el.classList.remove('modal-show');
    };

    var events = function events() {
        modal.addEventListener('click', showModal, false);
        closeModal.addEventListener('click', hideModal, false);
    };

    return {
        init: function init(modalName) {
            currentModal = document.getElementById('modal-' + modalName);

            var thisModal = modalName + "Modal";
            UI.Modals[thisModal] = currentModal;

            if (currentModal === null) {
                return;
            }

            modal = document.getElementById('modal-' + modalName + '-open');

            closeModal = document.getElementById('modal-' + modalName + '-close');

            events();
        }
    };
}();

/***/ }),
/* 38 */
/***/ (function(module, exports) {

UI.Navigation = function () {
    var navigationCloseButton;
    var navigationOpenButton;
    var navigation;
    var search;

    var closeNavigation = function closeNavigation() {
        navigation.classList.remove('navigation-show');
    };

    var openNavigation = function openNavigation() {
        navigation.classList.add('navigation-show');
    };

    var events = function events() {
        navigationCloseButton.addEventListener('click', closeNavigation, false);
        navigationOpenButton.addEventListener('click', openNavigation, false);
    };

    return {
        init: function init() {
            navigationOpenButton = document.getElementById("menu-button");

            if (navigationOpenButton === null) {
                return;
            }

            navigationCloseButton = document.getElementById("navigation-close");
            navigation = document.getElementById("navigation");

            events();
        }
    };
}();

/***/ }),
/* 39 */
/***/ (function(module, exports) {

UI.Search = function () {

    var searchButton;
    var searchHolder;
    var searchVisible;

    var selectMenu;

    var showSearch = function showSearch() {
        if (searchVisible) {
            // searchHolder.classList.remove('visible');
            searchHolder.style.display = "none";
            searchVisible = false;
        } else {
            // searchHolder.classList.add('visible');
            searchHolder.style.display = "block";
            searchVisible = true;
        }
    };

    var hideUser = function hideUser() {
        selectMenu.classList.remove('visible');
    };

    var events = function events() {
        searchButton.addEventListener('click', showSearch, false);
        searchHolder.addEventListener('mouseleave', showSearch, false);
        searchHolder.addEventListener('mouseenter', hideUser, false);
    };

    return {
        init: function init() {
            searchButton = document.getElementById('menu-search-button');

            if (searchButton === null || searchButton === undefined) {
                return;
            }

            searchHolder = document.getElementById('search-holder');
            selectMenu = document.getElementById('select-account');

            searchHolder.style.display = "none";
            searchVisible = false;

            events();
        }
    };
}();

/***/ }),
/* 40 */
/***/ (function(module, exports) {

UI.SingleMedia = function () {
    var mediaFileHolder;
    var mediaFile;
    var mediaFileValue;

    var mediaLink;
    var mediaType;

    var setFile = function setFile() {
        file = mediaFile.value.split('\\');
        mediaFileValue.innerHTML = file[file.length - 1];
        mediaLink.value = '';

        mediaType.value = 'image';
    };

    var setLink = function setLink() {
        mediaFileHolder.value = '';
        mediaFileValue.innerHTML = 'Kies Afbeelding voor upload';

        mediaType.value = 'link';
    };

    var events = function events() {
        mediaLink.addEventListener('change', setLink, false);
        mediaFileHolder.addEventListener('change', setFile, false);
    };

    return {
        init: function init() {
            if (document.getElementById('single-media') === null) {
                return;
            }

            mediaFileHolder = document.getElementById('media-file-holder');
            mediaFile = document.getElementById('media-file');
            mediaFileValue = document.getElementById('media-file-value');

            mediaLink = document.getElementById('media-link');
            mediaType = document.getElementById('media-type');

            events();
        }
    };
}();

/***/ }),
/* 41 */
/***/ (function(module, exports) {

UI.Slider = function () {
    var elements = [];
    var slider;
    var itemNumber;
    var sliderIndex = 0;
    var contentHolder;
    var previousButton;
    var nextButton;

    var slideNext = function slideNext() {
        if (sliderIndex >= elements.length - 1) {
            sliderIndex = 0;
        } else {
            sliderIndex++;
        }

        renderSlider();
    };

    var slidePrevious = function slidePrevious() {
        if (sliderIndex <= 0) {
            sliderIndex = elements.length - 1;
        } else {
            sliderIndex--;
        }

        renderSlider();
    };

    var getContentHolder = function getContentHolder() {
        var sliderElements = slider.childNodes;

        for (var sliderChild = 0; sliderChild < sliderElements.length; sliderChild++) {
            if (sliderElements[sliderChild].className === "slider-content") {
                return sliderElements[sliderChild];
            }
        }
        return null;
    };

    var loadElements = function loadElements() {
        contentHolder = getContentHolder();
        var contentItems = contentHolder.getElementsByClassName('slider-item');

        for (var contentItem = 0; contentItem < contentItems.length; contentItem++) {
            elements.push(contentItems[contentItem]);
        }

        while (contentHolder.firstChild) {
            contentHolder.removeChild(contentHolder.firstChild);
        }
    };

    var renderSlider = function renderSlider() {
        while (contentHolder.firstChild) {
            contentHolder.removeChild(contentHolder.firstChild);
        }

        if (itemNumber === 1) {
            contentHolder.appendChild(elements[sliderIndex]);
        } else {
            for (var sliderItem = 0; sliderItem <= itemNumber; sliderItem++) {
                contentHolder.appendChild(elements[sliderIndex + sliderItem]);
            }
        }
    };

    var events = function events() {
        previousButton.addEventListener('click', slidePrevious, false);
        nextButton.addEventListener('click', slideNext, false);
    };

    return {
        init: function init(sliderName, maxNumberInSlider) {
            slider = document.getElementById(sliderName);

            if (slider === null) {
                return;
            }

            previousButton = document.getElementById('slide-previous');
            nextButton = document.getElementById('slide-next');

            itemNumber = maxNumberInSlider;

            loadElements();
            renderSlider();
            events();
        }
    };
}();

/***/ }),
/* 42 */
/***/ (function(module, exports) {

UI = {
    Modals: {}
};

/***/ }),
/* 43 */
/***/ (function(module, exports) {

UI.User = function () {
  /**
   *
   */

  var accountButton;
  var accountDropdownHolder;
  var dropdown;

  var accountVisible;

  var showDropdown = function showDropdown() {

    if (accountVisible) {
      accountDropdownHolder.classList.remove('visible');
      accountVisible = false;
    } else {
      accountDropdownHolder.classList.add('visible');
      accountVisible = true;
    }
  };

  var events = function events() {
    accountButton.addEventListener('click', showDropdown, false);
    accountDropdownHolder.addEventListener('mouseleave', showDropdown, false);
  };

  return {
    init: function init() {
      accountButton = document.getElementById('menu-account-button');

      if (accountButton === null) {
        return;
      }

      accountDropdownHolder = document.getElementById('select-account');
      accountVisible = false;

      events();
    }
  };
}();

/***/ }),
/* 44 */
/***/ (function(module, exports) {

VALIDATOR.Empty = function () {
    var errorElement = function errorElement(error, id) {
        var errorMessage = document.createElement('div');
        errorMessage.className = "error error-empty-validation";
        errorMessage.innerHTML = error;
        errorMessage.id = "error-" + id;

        return errorMessage;
    };

    var showEmptyError = function showEmptyError(elementName, element, id) {
        var error = errorElement("Je moet het " + elementName + " veld nog invullen", id);

        if (element.type === 'textarea') {
            element.parentNode.insertBefore(error, element.nextSibling.nextSibling);
        } else {
            element.parentNode.insertBefore(error, element.nextSibling);
        }
    };

    return {
        notEmpty: function notEmpty(elementName, element, value, id) {
            var errors = document.getElementsByClassName('error-empty-validation');

            if (value === "") {
                showEmptyError(elementName, element, id);
            }
        }
    };
}();

/***/ }),
/* 45 */
/***/ (function(module, exports) {

VALIDATOR = {};

/***/ }),
/* 46 */
/***/ (function(module, exports) {



VALIDATOR.Validator = function (Empty) {
    var defineValidationType = function defineValidationType(elementName, type, element, value, id) {
        switch (type) {
            case "empty":
                Empty.notEmpty(elementName, element, value, id);
                break;

            default:
                break;
        }
    };

    var reset = function reset(id) {

        var element = document.getElementById('error-' + id);

        if (element !== null) {
            element.parentNode.removeChild(element);
        }
    };

    return {
        make: function make(validatorObject) {
            var _iteratorNormalCompletion = true;
            var _didIteratorError = false;
            var _iteratorError = undefined;

            try {

                for (var _iterator = Object.keys(validatorObject)[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                    var elementName = _step.value;


                    //Do a check on value by validation type
                    for (var validationTypeIndex = 0; validationTypeIndex < validatorObject[elementName].validate.length; validationTypeIndex++) {
                        validationType = validatorObject[elementName].validate[validationTypeIndex];

                        reset(validatorObject[elementName].id);

                        defineValidationType(elementName, validationType, validatorObject[elementName].element, validatorObject[elementName].value, validatorObject[elementName].id);
                    }
                }
            } catch (err) {
                _didIteratorError = true;
                _iteratorError = err;
            } finally {
                try {
                    if (!_iteratorNormalCompletion && _iterator.return) {
                        _iterator.return();
                    }
                } finally {
                    if (_didIteratorError) {
                        throw _iteratorError;
                    }
                }
            }

            if (document.getElementsByClassName('error').length === 0) {
                return true;
            } else {
                return false;
            }
        }
    };
}(VALIDATOR.Empty);

/***/ }),
/* 47 */
/***/ (function(module, exports) {

VIEW.Opleiding = function (Modals, Validator) {
    var opleidingModal;
    var opleidingHolder;
    var opleidingAddButton;
    var opleidingRemoveButton;
    var modalopleidingOpen;
    var modalopleidingClose;
    var opleidingId = null;

    var naam = document.getElementById('opleiding-naam');
    var beschrijving = document.getElementById('opleiding-beschrijving');
    var link = document.getElementById('opleiding-link');

    var opleidingValidated = function opleidingValidated() {
        return Validator.make({
            "Opleiding Naam": {
                "value": naam.value,
                "element": naam,
                "id": "opleiding-naam",
                "validate": ["empty"]
            },
            "Opleiding Beschrijving": {
                "value": beschrijving.value,
                "element": beschrijving,
                "id": "opleiding-beschrijving",
                "validate": ["empty"]
            },
            "Opleiding Link": {
                "value": link.value,
                "element": link,
                "id": "opleiding-link",
                "validate": ["empty"]
            }
        });
    };

    var actions = {
        loadOpleidingen: function loadOpleidingen() {
            var schoolId = opleidingHolder.dataset.schoolId;

            axios.get("/admin/opleidingen/school/" + schoolId).then(function (response) {

                for (var dataIndex = 0; dataIndex < response.data.length; dataIndex++) {
                    selectedOpleiding = response.data[dataIndex];

                    var opleiding = {
                        "id": dataIndex,
                        "naam": selectedOpleiding.name,
                        "beschrijving": selectedOpleiding.description,
                        "link": selectedOpleiding.link.toString()
                    };

                    VIEW.opleidingen.push(opleiding);
                    opleidingId = dataIndex;
                }

                render();
            });
        }
    };

    var addOpleiding = function addOpleiding() {
        if (!opleidingValidated()) {
            return;
        }

        var id = opleidingId;

        if (opleidingId === null) {
            id = VIEW.opleidingen.length;
        }

        var opleiding = {
            "id": id,
            "naam": naam.value,
            "beschrijving": beschrijving.value,
            "link": link.value
        };

        naam.value = '';
        beschrijving.value = '';

        if (opleidingId === null) {
            VIEW.opleidingen.push(opleiding);
        } else {
            VIEW.opleidingen[id] = opleiding;
            opleidingId = null;
        }

        opleidingModal.opleidingModal.classList.remove('modal-show');

        render();
    };

    var viewOpleiding = function viewOpleiding(event) {
        opleidingModal.opleidingModal.classList.add('modal-show');

        opleidingId = event.target.id.split('-')[1];
        var opleidingData = VIEW.opleidingen[opleidingId];

        naam.value = opleidingData.naam;
        beschrijving.value = opleidingData.beschrijving;
        link.value = opleidingData.link;

        opleidingRemoveButton.classList.remove('hidden');
        opleidingAddButton.innerHTML = 'opleiding Bewerken';
    };

    var removeOpleiding = function removeOpleiding() {
        VIEW.opleidingen.splice(opleidingId, 1);

        opleidingModal.opleidingModal.classList.remove('modal-show');
        UI.Modal.showModal();
        render();
    };

    var render = function render() {

        while (opleidingHolder.firstChild) {
            opleidingHolder.removeChild(opleidingHolder.firstChild);
        }

        VIEW.opleidingen.forEach(function (opleiding) {
            var opleidingElement = document.createElement('button');

            opleidingElement.className = 'button--secondary button--big';
            opleidingElement.id = 'opleiding-' + opleiding.id;
            opleidingElement.innerHTML = opleiding.naam;
            opleidingElement.addEventListener('click', viewOpleiding, false);

            opleidingHolder.appendChild(opleidingElement);
        }, VIEW.opleidingen);
    };

    var resetOpleiding = function resetOpleiding() {
        opleidingId = null;

        naam.value = '';
        beschrijving.value = '';
        link.value = '';

        opleidingRemoveButton.classList.add('hidden');
        opleidingAddButton.innerHTML = 'opleiding Toevoegen';
    };

    var events = function events() {
        opleidingAddButton.addEventListener('click', addOpleiding, false);
        opleidingRemoveButton.addEventListener('click', removeOpleiding, false);
        modalopleidingOpen.addEventListener('click', resetOpleiding, false);
    };

    return {
        init: function init() {
            opleidingModal = Modals;

            opleidingAddButton = document.getElementById('opleiding-toevoegen');
            opleidingRemoveButton = document.getElementById('opleiding-verwijderen');
            modalopleidingClose = document.getElementById('modal-opleiding-close');
            modalopleidingOpen = document.getElementById('modal-opleiding-open');

            if (opleidingAddButton === null) {
                return;
            }

            opleidingHolder = document.getElementById('opleidingen-holder');

            actions.loadOpleidingen();
            events();
        }
    };
}(UI.Modals, VALIDATOR.Validator);

/***/ }),
/* 48 */
/***/ (function(module, exports) {

VIEW.Profile = function () {
    var profileUploadButton;
    var userId;
    var uploadErrorHolder;

    var uploadPic = function uploadPic() {
        var formData = new FormData();

        formData.append('image', profileUploadButton.files[0]);

        axios.post('profiel/' + userId.value + '/foto/maken', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function (response) {
            document.getElementById('avatar-pic').src = response.data.image;
        }).catch(function (error) {
            uploadErrorHolder.innerHTML = 'Afbeelding is te groot';
        });
    };

    var events = function events() {
        profileUploadButton.addEventListener('change', uploadPic, false);
    };

    return {
        init: function init() {
            profileUploadButton = document.getElementById('profile-pic-file');

            if (profileUploadButton === null) {
                return;
            }

            userId = document.getElementById('user-id');
            uploadErrorHolder = document.getElementById('upload-pic-error');

            events();
        }
    };
}();

/***/ }),
/* 49 */
/***/ (function(module, exports) {

VIEW.School = function (Validator) {
    var schoolButton;
    var schoolEditButton;

    var schoolName;
    var schoolDescription;

    var actions = {
        createSchool: function createSchool() {
            if (!schoolValidated()) {
                return;
            }

            axios.post('/scholen', {
                "school": {
                    "title": schoolName.value,
                    "description": CKEDITOR.instances["school-description"].getData(),
                    "opleidingen": VIEW.opleidingen
                }
            });

            location.href = '/admin/scholen/overzicht';
        },
        editSchool: function editSchool() {
            if (!schoolValidated()) {
                return;
            }

            var schoolId = document.getElementById('opleidingen-holder').dataset.schoolId;

            console.log(VIEW.opleidingen);

            axios.post('/admin/scholen/' + schoolId, {
                "school": {
                    "title": schoolName.value,
                    "description": CKEDITOR.instances["school-description"].getData(),
                    "opleidingen": VIEW.opleidingen
                }
            });

            location.href = '/admin/scholen/overzicht';
        }
    };

    var schoolValidated = function schoolValidated() {
        return Validator.make({
            "School Naam": {
                "value": schoolName.value,
                "element": schoolName,
                "id": "school-name",
                "validate": ["empty"]
            },
            "School Beschrijving": {
                "value": CKEDITOR.instances["school-description"].getData(),
                "element": schoolDescription,
                "id": "school-description",
                "validate": ["empty"]
            }
        });
    };

    var events = function events() {
        if (schoolButton !== null) {
            schoolButton.addEventListener('click', actions.createSchool, false);
        }

        if (schoolEditButton !== null) {
            schoolEditButton.addEventListener('click', actions.editSchool, false);
        }
    };

    return {
        init: function init() {
            schoolButton = document.getElementById('make-school');
            schoolEditButton = document.getElementById('edit-school');

            if (schoolButton === null && schoolEditButton === null) {
                return;
            }

            schoolName = document.getElementById('school-name');
            schoolDescription = document.getElementById("school-description");

            console.log(VIEW.opleidingen);

            events();
        }
    };
}(VALIDATOR.Validator);

/***/ }),
/* 50 */
/***/ (function(module, exports) {

VIEW.Users = function () {

    var submitRole = function submitRole(event) {
        var submitId;

        if (event.target.classList.contains('fa')) {
            submitId = event.target.parentNode.id;
        } else {
            submitId = event.target.id;
        }

        var roleId = submitId.replace('submit-', '');
        var role = document.getElementById(roleId);

        userLast = roleId.split('-').length - 1;
        userId = roleId.split('-')[userLast];

        axios.post('/admin/gebruikers/' + userId, {
            "_method": "PATCH",
            "role": role.value
        });

        location.reload();
    };

    return {
        init: function init() {
            var roles = document.getElementsByClassName('user-new-role');
            var submits = document.getElementsByClassName('user-new-role-submit');

            for (var submitIndex = 0; submitIndex < submits.length; submitIndex++) {
                submits[submitIndex].addEventListener('click', submitRole, false);
            }
        }
    };
}();

/***/ }),
/* 51 */
/***/ (function(module, exports) {

VIEW = {
    opleidingen: [],
    media: [],
    selectedMedia: []
};

/***/ }),
/* 52 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(8);
module.exports = __webpack_require__(9);


/***/ }),
/* 53 */,
/* 54 */,
/* 55 */,
/* 56 */,
/* 57 */,
/* 58 */,
/* 59 */,
/* 60 */,
/* 61 */,
/* 62 */,
/* 63 */,
/* 64 */,
/* 65 */,
/* 66 */
/***/ (function(module, exports) {

VIEW.Article = function () {

  /**
  * Form elements
  */
  var articleTitle;
  var articleText;
  var articleAuthor;
  var articleCategory;

  var actions = {
    addArticle: function addArticle() {
      axios.post('/admin/artikels', { "article": {
          "title": articleTitle.value,
          "text": CKEDITOR.instances["article-text"].getData(),
          "author": articleAuthor.value,
          "category": articleCategory.value,
          "media": UI.Media.mediaData
        } });
    },
    editArticle: function editArticle() {
      //TODO: Edit article met ajax
    }
  };

  var events = function events() {
    buttonSave.addEventListener('click', actions.addArticle, false);
  };

  return {
    save: actions.addArticle,
    init: function init() {
      buttonSave = document.getElementById('article-save');

      if (buttonSave === null) {
        return;
      }

      articleTitle = document.getElementById('article-title');
      articleText = document.getElementById('article-text');
      articleAuthor = document.getElementById('article-author');

      articleCategory = document.getElementById('article-category');

      events();
    }
  };
}();

/***/ }),
/* 67 */
/***/ (function(module, exports) {

VIEW.MediaBrowser = function (Modals) {
    var mediabrowserHolder;
    var mediaChosen = new Event('mediachosen');

    var actions = {
        getMedia: function getMedia() {
            axios.get("/media/all").then(function (response) {
                for (var dataIndex = 0; dataIndex < response.data.media.length; dataIndex++) {
                    selectedMedia = response.data.media[dataIndex];

                    var mediaItem = {
                        "id": selectedMedia.id,
                        "type": selectedMedia.type,
                        "url": selectedMedia.url
                    };

                    VIEW.media.push(mediaItem);
                }

                render();
            });
        },
        deleteMedia: function deleteMedia() {},
        addMedia: function addMedia() {}
    };

    var selectMedia = function selectMedia(event) {
        var mediaItem;

        if (event.target.parentNode.classList.contains('media-item')) {
            mediaItem = event.target.parentNode;
        } else if (event.target.classList.contains('media-item')) {
            mediaItem = event.target;
        } else {
            return;
        }

        if (mediaItem.classList.contains('media-item-selected')) {
            mediaItem.classList.remove('media-item-selected');
        } else {
            mediaItem.classList.add('media-item-selected');
        }
    };

    var createMediaItem = function createMediaItem(id, value) {

        var mediaLength = document.getElementsByClassName('media-item').length;
        var media = document.createElement('div');

        media.className = 'media-item';

        media.id = 'media-item-' + id;
        media.dataset.mediaId = id;

        media.innerHTML += '<div class="media-item-value">' + value + '</div>';
        media.innerHTML += '<input type="hidden" name="media-item[]" />';

        media.addEventListener('click', selectMedia, false);

        var mediaDelete = document.createElement('div');
        mediaDelete.className = 'media-item-delete float-right';
        mediaDelete.innerHTML = '<i class="fa fa-close"></i>';
        mediaDelete.addEventListener('click', actions.deleteMedia, false);

        media.appendChild(mediaDelete);

        var mediaInput = document.createElement('input');
        mediaInput.type = 'hidden';
        mediaInput.name = 'media[]';
        mediaInput.value = value;

        return media;
    };

    var chooseMedia = function chooseMedia() {
        VIEW.selectedMedia = [];

        var selectedMediaItems = document.getElementsByClassName('media-item-selected');

        for (var selectedMediaIndex = 0; selectedMediaIndex < selectedMediaItems.length; selectedMediaIndex++) {
            var mediaId = selectedMediaItems[selectedMediaIndex].dataset.mediaId;

            VIEW.selectedMedia.push(VIEW.media[selectedMediaIndex]);
        }

        Modals.mediabrowserModal.classList.remove('modal-show');
        document.dispatchEvent(mediaChosen);
    };

    var render = function render() {
        for (var mediaIndex = 0; mediaIndex < VIEW.media.length; mediaIndex++) {
            var mediaItem = createMediaItem(VIEW.media[mediaIndex].id, VIEW.media[mediaIndex].url);

            mediabrowserHolder.appendChild(mediaItem);
        }
    };

    var events = function events() {
        document.addEventListener('mediaload', actions.getMedia, false);

        buttonChoose.addEventListener('click', chooseMedia, false);
    };

    return {
        createMediaItem: createMediaItem,
        init: function init() {
            mediabrowserHolder = document.getElementById('mediabrowser-holder');

            if (mediabrowserHolder === null || mediabrowserHolder === undefined) {
                return;
            }

            buttonChoose = document.getElementById('mediabrowser-choose');
            buttonClose = document.getElementById('modal-mediabrowser-close');

            events();
        }
    };
}(UI.Modals);

/***/ }),
/* 68 */
/***/ (function(module, exports) {

VIEW.Search = function () {
    var searchInput;
    var searchContent;

    var searchItems = [];

    var actions = {
        getSearch: function getSearch() {
            if (searchInput.value === '') {
                return;
            }

            axios.get('/zoeken/' + searchInput.value).then(function (response) {
                searchItems = [];

                for (var searchIndex = 0; searchIndex < response.data.length; searchIndex++) {

                    var title;
                    var body;
                    var type;

                    if (response.data[searchIndex].title !== undefined) {
                        title = response.data[searchIndex].title;
                    } else if (response.data[searchIndex].name !== undefined) {
                        title = response.data[searchIndex].name;
                    }

                    if (response.data[searchIndex].body !== undefined) {
                        body = response.data[searchIndex].body;
                    } else {
                        body = response.data[searchIndex].description;
                    }

                    body = body.replace(/<\/?[^>]+(>|$)/g, "");

                    if (body.length > 100) {
                        body = body.substring(0, 100) + " ...";
                    }

                    if (response.data[searchIndex].category_id !== undefined) {
                        type = 'artikels';
                    } else if (response.data[searchIndex].address !== undefined) {
                        type = 'bezienswaardigheden';
                    } else if (response.data[searchIndex].school_id !== undefined) {
                        type = 'richting';
                    } else {
                        type = 'scholen';
                    }

                    var searchItem = {
                        id: response.data[searchIndex].id,
                        title: title,
                        body: body,
                        type: type,
                        school: response.data[searchIndex].school_id
                    };

                    searchItems.push(searchItem);
                }

                render();
            });
        }
    };

    var makeSearchContentItem = function makeSearchContentItem(searchItem) {
        var searchContentItem = document.createElement('a');
        searchContentItem.className = "search-content-item nodecoration";
        if (searchItem.type === 'richting') {
            searchContentItem.href = "/scholen/" + searchItem.school;
        } else {
            searchContentItem.href = "/" + searchItem.type + "/" + searchItem.id;
        }

        var searchCategory = document.createElement('div');
        searchCategory.className = 'search-category search-' + searchItem.type;
        searchCategory.innerHTML = searchItem.type;
        searchContentItem.appendChild(searchCategory);

        var searchTitle = document.createElement('h5');
        searchTitle.innerHTML = searchItem.title;
        searchContentItem.appendChild(searchTitle);

        var searchBody = document.createElement('span');
        searchBody.innerHTML = searchItem.body;
        searchContentItem.appendChild(searchBody);

        return searchContentItem;
    };

    var render = function render() {
        searchContent.innerHTML = '';
        for (var searchIndex = 0; searchIndex < searchItems.length; searchIndex++) {
            var contentItem = makeSearchContentItem(searchItems[searchIndex]);
            searchContent.appendChild(contentItem);
        }
    };

    var events = function events() {
        searchInput.addEventListener('keyup', actions.getSearch, false);
    };

    return {
        init: function init() {
            searchButton = document.getElementById('menu-search-button');

            if (searchButton === null || searchButton === undefined) {
                return;
            }

            searchInput = document.getElementById('search-input');
            searchContent = document.getElementById('search-content');

            events();
        }
    };
}();

/***/ })
/******/ ]);