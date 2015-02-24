<?php
require_once('../partials/header.php');

$categories = mysql_query("SELECT * FROM category ORDER BY `ord_no` ASC");

if (isset($_POST['pages'])) {
  $index = 0;
  parse_str($_POST['pages'], $pageOrder);
  var_dump($pageOrder);
  exit(0);
  foreach ($pageOrder['pages'] as $key => $value) {
    mysql_query("UPDATE category SET `ord_no` = '$key' WHERE `id` = '$value'") or die(mysql_error());
  }
}

?>
<style>
  #sortables { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortables li { margin: 3px 3px 3px 3px; padding-left: 1.5em; padding-top: 0.4em; padding-bottom: 0.4em; font-size: 1.4em; height: 1.8em; }
  #sortables li span { position: absolute; margin-left: -1.3em; }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sortables').sortable();
  });
  function saveOrder(){
    var data = $('#sortables').sortable('serialize');
    console.log(data);
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
<ul id="sortables" class="sort-products user-select-none">
  <?php 
  while ($category = mysql_fetch_assoc($categories)) {
  ?>
  <li class="ui-state-default cursor-pointer" id=<?php echo "category-".$category['id'];?>><?php echo $category['code']." - ".$category['name'];?></li>
  <?php 
  }
  ?>
</ul>
<button class="btn btn-success m-l-xxs" onclick="saveOrder()">Save Order</button>
<div class="alert inline hidden" id="alert" style="padding: 10px;"></div>

<?php
require_once('../partials/footer.php');
?>