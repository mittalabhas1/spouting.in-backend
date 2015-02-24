<?php
require_once('db.php');

// Categories
$query = mysql_query("SELECT name,keyword,code,ord_no FROM category WHERE 1 ORDER BY ord_no");
$categories = array();
while($category = mysql_fetch_assoc($query)){
	array_push($categories, json_decode(json_encode($category)));
}

// Products
$query = mysql_query("SELECT name,keyword,code,category FROM product WHERE 1");
$products = array();
while($product = mysql_fetch_assoc($query)){
	array_push($products, json_decode(json_encode($product)));
}

// Building Data
$data = array('categories' => $categories, 'products' => $products);
$data = json_decode(json_encode($data));

// Returning Data
echo json_encode($data);
?>