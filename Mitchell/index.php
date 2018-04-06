<?php
require("C:\Users\aidanocc\Mitchell\Controller\RestaurantController.php");
$title = "restaurant overview";
$restaurantController = new RestaurantController();

if(isset($_POST['types']))
{
    //FIll pages with types
    $restaurantTable = $restaurantController->CreateRestaurantTables($_POST['types']);
}
//Page loaded for first time, fill with all
else {
    $restaurantTable = $restaurantController->CreateRestaurantTables('%');
}

$sidebar = $restaurantController->CreateRestaurantDropdownList();
$content = $restaurantTable;
include 'Template.php';
?>
