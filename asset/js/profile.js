/**
 * Profile page JS
 */

const account = document.getElementById('account'),
      orders = document.getElementById('orders'),
      wishlist = document.getElementById('wishlist');
const accountBtn = document.getElementById('accountBtn'),
      ordersBtn = document.getElementById('ordersBtn'),
      wishlistBtn = document.getElementById('wishlistBtn');
accountBtn.addEventListener('click', () =>{
   account.classList.add('show')
   orders.classList.remove('show')
   wishlist.classList.remove('show')
});
ordersBtn.addEventListener('click', () =>{
   account.classList.remove('show')
   orders.classList.add('show')
   wishlist.classList.remove('show')
});
wishlistBtn.addEventListener('click', () =>{
   account.classList.remove('show')
   orders.classList.remove('show')
   wishlist.classList.add('show')
});