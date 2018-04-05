<?php
require("Model/RestaurantModel.php");

class RestaurantController{
    
    
    function CreateRestaurantDropdownList() {
        $restaurantModel = new RestaurantModel();
        $result = "<form action = '' method = 'post' width = '200px'
                    Please select a type:
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        ".$this->CreateOptionValues($restaurantModel->GetRestaurantTypes()).
                        "</select>
                        <input type = 'submit' value = 'Search' />
                        </form>";
        return $result;
    }
    
    function CreateOptionValues(array $valueArray) {
        $result = "";
        
        foreach ($valueArray as $value) {
            $result = $result . "<option value = '$value'>$value</option>";
        }
        
        return $result;
    }
    
    function CreateRestaurantTables($types) {
        $restaurantModel = new RestaurantModel();
        $restaurantArray = $restaurantModel->GetRestaurantByType($types);
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($restaurantArray as $key => $restuarant){
            $result = $result . 
            "<table class = 'restaurantTable'>
                        <tr>
                            <th width = '75px' >Name: </th>
                            <td>$restuarant->aname</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$restuarant->atype</td>
                        </tr>
                        
                        <tr>
                            <th>URL: </th>
                            <td>$restuarant->url</td>
                        </tr>
                     </table>";
        }
    }
}
?>















