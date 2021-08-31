</div>
<!-- /row -->

</div>
<!-- /container -->

<!-- jQuery library -->
<script src="libs/js/jquery.min.js"></script>

<!-- bootstrap JavaScript -->
<script src="libs/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
//add to cart button listener
$('.update-quantity-form').on('submit', function(){
  var id = $(this).find('.product-id').text();
  var quantity = $(this).find('.cart-quantity').val();

  window.location.href="update_quantity.php?id=" + id + "&quantity=" + quantity;
  return false;
});
});
</script>
<footer>
      <div class="column" align="center">
          <a href="https://www.facebook.com/OasisFullertonStore">
              <img src="imgs/facebook.png" alt="facebook" >
          </a>
          <a href="https://www.instagram.com/oasisestore/">
          <img src="imgs/instagram.png" alt="instagram" >
          </a>
          <a href="https://twitter.com/oasisstore2">
          <img src="imgs/twitter.png" alt="twitter" >
          </a>
  </div>
</footer>

</body>
</html>
