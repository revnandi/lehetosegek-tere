export function debounce (fn, delay) {
  var timeoutID = null
  return function () {
    clearTimeout(timeoutID)
    var args = arguments
    var that = this
    timeoutID = setTimeout(function () {
      fn.apply(that, args)
    }, delay)
  }
}

export function convertDateToShortString (datesString) {
  return datesString;
}

export function generateRandomString () {
  return (length=6)=>Math.random().toString(20).substr(2, length);
}