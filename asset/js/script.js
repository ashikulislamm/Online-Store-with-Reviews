//Purpose: To clear the cache of the browser
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

document.querySelectorAll('input[name="paymentMethod"]').forEach(function(radio) {
  radio.addEventListener('change', function() {
      if (this.value === 'COD') {
          document.querySelector(".place_order").style.display = 'inline-block';
          document.querySelector(".paynow").style.display = 'none';
      } else if (this.value === 'Paid') {
          document.querySelector(".place_order").style.display = 'none';
          document.querySelector(".paynow").style.display = 'inline-block';
      }
  });
});
