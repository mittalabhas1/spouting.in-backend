<?php
require_once('db.php');

// Categories
$query = mysql_query("SELECT name, keyword, code, description, products, image, ord_no FROM category WHERE 1 ORDER BY ord_no");
$categories = array();
while($category = mysql_fetch_assoc($query)){
	array_push($categories, json_decode(json_encode($category)));
}

// Products
$query = mysql_query("SELECT product.name AS name, product.keyword AS keyword, product.code AS code, product.image AS image, category.name AS category, product.description AS description, product.ord_no AS ord_no FROM `product` INNER JOIN category ON category.id = product.category WHERE 1 GROUP BY product.category ORDER BY product.ord_no") or die(mysql_error());
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