<?php
require_once('../partials/header.php');

if (isset($_GET['category'])) {

  $category = $_GET['category'];

?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#sortables').sortable();
    });
    function saveOrder(){
      var data = $('#sortables').sortable('serialize');
      $.ajax({
        url: 'update.php',
        type: 'POST',
        data: data
      }).done(function(){
        $('#alert').removeClass('hidden alert-danger');
        $('#alert').addClass('alert-success');
        $('#alert').html('Product Order Updated !');
      }).fail(function(){
        $('#alert').removeClass('hidden alert-success');
        $('#alert').addClass('alert-danger');
        $('#alert').html('Error. Please try again later !');
      });
    }
  </script>
  <ul id="sortables" class="sort-products user-select-none">
    <?php
    $products = mysql_query("SELECT * FROM product WHERE category=$category ORDER BY `ord_no` ASC");
    while ($product = mysql_fetch_assoc($products)) {
    ?>
    <li class="ui-state-default cursor-pointer" id=<?php echo "product-".$product['id'];?>><?php echo $product['code']." - ".$product['name'];?></li>
    <?php 
    }
    ?>
  </ul>
  <button class="btn btn-success m-l-xxs" onclick="saveOrder()">Save Order</button>
  <div class="alert inline hidden" id="alert" style="padding: 10px;"></div>
  <?php
} else{
  $categories = mysql_query("SELECT id,name FROM category WHERE 1 ORDER BY ord_no");
  ?>

  <ul>
  <?php
  while ($category = mysql_fetch_assoc($categories)) {
    echo '<li>
      <a href="?category='.$category['id'].'">'.$category['name'].'</a>
    </li>';
  }
  ?>
  </ul>

  <?php
}

require_once('../partials/footer.php');
?>