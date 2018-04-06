<?php
require('C:\Users\aidanocc\Mitchell\Model\RestaurantModel.php');
class RestaurantController{
    
    
    function CreateRestaurantDropdownList() {
        $restaurantModel = new RestaurantModel();
        if (isset($_POST['types'])) {
            if ($_POST['types'] == 'All') {
                $allSelected = 'selected';
                $selected = '';
            } else {
                $selected = $_POST['types'];
                $allSelected = '';
            }
        }
        else {
            $allSelected = 'selected';
            $selected = '';
        }

        $result = "<form action = '' method='POST'>
                    Please select a type:
                    <select name = 'types'>
                        <option value = '%' " . $allSelected . ">All</option>
                         " . $this->CreateOptionValues($restaurantModel->GetRestaurantTypes(), $selected) .
                        "</select>
                        <input type = 'submit' value = 'Search' />
                    </form>";
        return $result;
    }
    
    function CreateOptionValues(array $valueArray, $selected) {
        $result = "";
        
        foreach ($valueArray as $value) {
            if($selected == $value) {
                $result = $result . "<label for = '$value' selected>$value</option>";
            }
            else {
                $result = $result . "<label for = '$value'>$value</option>";
            }
        }
        return $result;
    }
    
    function CreateRestaurantTables($types) {
        $restaurantModel = new RestaurantModel();
        $restaurantArray = $restaurantModel->GetRestaurantByType($types);
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($restaurantArray as $key => $restaurant){
            $result = $result .
            "<table class = 'restaurantTable'>
                        <tr>
                            <th width = '75px' >Name: </th>
                            <td>$restaurant->ANAME</td>
                        </tr>
                        <tr>
                            <th>Type: </th>
                            <td>$restaurant->ATYPE</td>
                        </tr>
                        
                        <tr>
                            <th>URL: </th>
                            <td>$restaurant->URL</td>
                        </tr>
                        <tr>=
</td>
</tr>
                     </table>";
        }
        return $result;
    }
}
?>















