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

        function CreateQueryB($names) {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryB($names);
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Restaurant Menu'>
                        <tr>
                            <th width = '75px' >Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Category: </th>
                            <td>$returnEntity->val2</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$returnEntity->val3</td>
                        </tr>
    
                     </table>";
                }
        }

        function CreateQueryC($categories) {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryC($categories);
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Managers and Opening Dates'>
                        <tr>
                            <th width = '75px' >Restaurant Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>

                        <tr>
                            <th width = '75px' >Manager Name: </th>
                            <td>$returnEntity->val2</td>
                        </tr>
                        
                        <tr>
                            <th>Opening Date: </th>
                            <td>$returnEntity->val3</td>
                        </tr>
    
                     </table>";
            }
        }

        function CreateQueryD($categories) {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryD($categories);
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Most Expensive Menu Item'>
                        <tr>
                            <th width = '75px' >Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Manager Name: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

                        <tr>
                            <th>Opening Hour: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

                        <tr>
                            <th>URL: </th>
                            <td>$returnEntity->val5</td>
                        </tr>
    
                     </table>";
                }
        }

        function CreateQueryE() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryE();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Average prices per category'>
                        <tr>
                            <th width = '75px' >Type: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Category: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Average Price: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

    
                     </table>";
                }
        }

        function CreateQueryF() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryF();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Number of ratings per restaurant'>
                        <tr>
                            <th width = '75px' >Restaurant Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Rater Name: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Date Rated: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

                        <tr>
                            <th>Price Rating: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

                        <tr>
                            <th>Food Rating: </th>
                            <td>$returnEntity->val5</td>
                        </tr>

                        <tr>
                            <th>Mood Rating: </th>
                            <td>$returnEntity->val6</td>
                        </tr>

                        <tr>
                            <th>Staff Rating: </th>
                            <td>$returnEntity->val7</td>
                        </tr>


    
                     </table>";
            }
        }

        function CreateQueryG() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryG();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Restaurants not rated in January 2015'>
                        <tr>
                            <th width = '75px' >Restaurant Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Location Phone Number: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Type: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

    
                     </table>";
            }
        }

        function CreateQueryH() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryH();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Staff rating lower than those given by Kendal Sawyer'>
                        <tr>
                            <th width = '75px' >Restaurant Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Location Opening Date: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Date of Rating: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

    
                     </table>";
            }
        }

        function CreateQueryI() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryI();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Thai restaurants with the highest food rating'>
                        <tr>
                            <th width = '75px' >Restaurant Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Rater Name: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Food Rating: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

    
                     </table>";
            }
        }


        function CreateQueryJ() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryJ();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Are Thai restaurants more popular than other restaurants?'>
                        <tr>
                            <th width = '75px' >Result: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
    
                     </table>";
            }
        }

        function CreateQueryK() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryK();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Raters with the highest overall food and mood ratings'>
                        <tr>
                            <th width = '75px' >Rater Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Rater Join Date: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Rater Reputation: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

                        <tr>
                            <th>Restaurant Name: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

                        <tr>
                            <th>Date Rated: </th>
                            <td>$returnEntity->val5</td>
                        </tr>

                        <tr>
                            <th>Food and Mood combined rating: </th>
                            <td>$returnEntity->val6</td>
                        </tr>

                        <tr>
                            <th>Food Rating: </th>
                            <td>$returnEntity->val7</td>
                        </tr>

                        <tr>
                            <th>Mood Rating: </th>
                            <td>$returnEntity->val8</td>
                        </tr>

    
                     </table>";
            }
        }

        function CreateQueryL() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryL();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Raters with the highest overall food or mood ratings'>
                        <tr>
                            <th width = '75px' >Rater Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Rater Join Date: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Rater Reputation: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

                        <tr>
                            <th>Restaurant Name: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

                        <tr>
                            <th>Date Rated: </th>
                            <td>$returnEntity->val5</td>
                        </tr>

                        <tr>
                            <th>Food Rating: </th>
                            <td>$returnEntity->val6</td>
                        </tr>

                        <tr>
                            <th>Mood Rating: </th>
                            <td>$returnEntity->val7</td>
                        </tr>

    
                     </table>";
            }
        }

        function CreateQueryM() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryM();
        $result = "";
        
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Raters that rated Little India Cafe most frequently'>
                        <tr>
                            <th width = '75px' >Number of Ratings: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Rater Name: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Rater Reputation: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

                        <tr>
                            <th>Restaurant Name: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

    
                     </table>";
            }
        }

        function CreateQueryN() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryN();
        $result = "";
        
        //X.ANAME, X.EMAIL, r_id2, total_rating_2, avg_rating
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Raters with ratings lower than those of John'>
                        <tr>
                            <th width = '75px' >Rater Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>
                        
                        <tr>
                            <th>Rater Email: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Rater ID: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

                        <tr>
                            <th>User Rating: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

                        <tr>
                            <th>John's Rating: </th>
                            <td>$returnEntity->val5</td>
                        </tr>

    
                     </table>";
            }
        }

        function CreateQueryO() {
        $restaurantModel = new RestaurantModel();
        $returnEntityArray = $restaurantModel->GetQueryO();
        $result = "";
        
        //r_id, u_id, maximum_difference, O.ANAME, O.ATYPE, O.EMAIL, RE.ANAME, O.FOOD, O.MOOD, O.PRICE, O.STAFF 
        //Generate a restaurantTable for each restaurantEntity in array
        foreach ($returnEntityArray as $key => $returnEntity){
            $result = $result .
            "<table class = 'Raters with the most diverse ratings'>
                        <tr>
                            <th>Rater Name: </th>
                            <td>$returnEntity->val1</td>
                        </tr>

                        <tr>
                            <th>Rater Type: </th>
                            <td>$returnEntity->val2</td>
                        </tr>

                        <tr>
                            <th>Rater Email: </th>
                            <td>$returnEntity->val3</td>
                        </tr>

                        <tr>
                            <th>Date Rated: </th>
                            <td>$returnEntity->val4</td>
                        </tr>

                        <tr>
                            <th>Restaurant Name: </th>
                            <td>$returnEntity->val5</td>
                        </tr>

                        <tr>
                            <th>Food Rating: </th>
                            <td>$returnEntity->val6</td>
                        </tr>

                        <tr>
                            <th>Mood Rating: </th>
                            <td>$returnEntity->val7</td>
                        </tr>

                        <tr>
                            <th>Price Rating: </th>
                            <td>$returnEntity->val8</td>
                        </tr>

                        <tr>
                            <th>Staff Rating: </th>
                            <td>$returnEntity->val9</td>
                        </tr>

    
                     </table>";
            }
        }
?>















