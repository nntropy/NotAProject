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
    
    function CreateQueryA($names) {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryA($names);
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Restaurant Information'>
                        <tr>
                            <th width = '75px' >Restaurant ID: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Name: </th>
                            <td>$returnEntity->val2</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$returnEntity->val3</td>
                        </tr>
                        
                        <tr>
                            <th>URL: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

                        <tr>
                            <th>Location ID: </th>
                            <td>$returnEntity->val5</td>
                        </tr>


                        <tr>
                            <th>Opening Date: </th>
                            <td>$returnEntity->val6</td>
                        </tr>

                        <tr>
                            <th>Manager Name: </th>
                            <td>$returnEntity->val7</td>
                        </tr>

                        <tr>
                            <th>Phone Number: </th>
                            <td>$returnEntity->val8</td>
                        </tr>

                        <tr>
                            <th>Street Address: </th>
                            <td>$returnEntity->val9</td>
                        </tr>

                        <tr>
                            <th>Opening Hour: </th>
                            <td>$returnEntity->val10</td>
                        </tr>

                        <tr>
                            <th>Closing Hour: </th>
                            <td>$returnEntity->val11</td>
                        </tr>
                     </table>";
        }
    }
}
?>















