<?php
require("C:\Users\aidanocc\Mitchell\Controller\RestaurantController.php");
$title = "Home";
$restaurantController = new RestaurantController();
$sidebar = "testing";
$content = $restaurantController->CreateRestaurantDropdownList();
include 'Template.php';
?>
