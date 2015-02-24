<?php
require_once('../partials/header.php');

$categories = mysql_query("SELECT * FROM category ORDER BY `ord_no` ASC");

?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sortables').sortable();
  });
  function saveOrder(sortThis){
    var data = $('#sortables.'+sortThis).sortable('serialize');
    $.ajax({
      url: 'update.php',
      type: 'POST',
      data: data
    }).done(function(){
      $('#alert').removeClass('hidden alert-danger');
      $('#alert').addClass('alert-success');
      $('#alert').html('Category Order Updated !');
    }).fail(function(){
      $('#alert').removeClass('hidden alert-success');
      $('#alert').addClass('alert-danger');
      $('#alert').html('Error. Please try again later !');
    });
  }
</script>
<ul id="sortables" class="sort-products user-select-none categories">
  <?php 
  while ($category = mysql_fetch_assoc($categories)) {
  ?>
  <li class="ui-state-default cursor-pointer" id=<?php echo "category-".$category['id'];?>><?php echo $category['code']." - ".$category['name'];?></li>
  <?php 
  }
  ?>
</ul>
<button class="btn btn-success m-l-xxs" onclick="saveOrder('categories')">Save Order</button>
<div class="alert inline hidden" id="alert" style="padding: 10px;"></div>

<?php
require_once('../partials/footer.php');
?>