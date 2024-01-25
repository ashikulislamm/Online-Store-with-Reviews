//Purpose: To clear the cache of the browser
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
