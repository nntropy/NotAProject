<?php

//try require ("Entities/*"); later
require ('C:\Users\aidanocc\Mitchell\Entities\AlocationEntity.php');
require ('C:\Users\aidanocc\Mitchell\Entities\MenuItemEntity.php');
require ('C:\Users\aidanocc\Mitchell\Entities\RaterEntity.php');
require ('C:\Users\aidanocc\Mitchell\Entities\RatingEntity.php');
require ('C:\Users\aidanocc\Mitchell\Entities\RatingItemEntity.php');
require ('C:\Users\aidanocc\Mitchell\Entities\RestaurantEntity.php');
require ('C:\Users\aidanocc\Mitchell\Model\Credentials.php');

class RestaurantModel {

    function GetRestaurantTypes() {
        require ("C:\Users\aidanocc\Mitchell\Model/Credentials.php");
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn = pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT DISTINCT ATYPE
                  FROM RESTAURANT";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $types = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($types, $row[0]);
        }
        //close connection
        pg_close($dbconn);
        return $types;
    }

    function GetRestaurantByType($type) {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT *
                  FROM Restaurant
                  WHERE ATYPE LIKE '$type'";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $RestaurantArray = array();

        while($row = pg_fetch_array($result)) {
            $ANAME = $row[1];
            $ATYPE = $row[2];
            $URL = $row[3];

            $RESTAURANT = new RestaurantEntity(-1, $ANAME, $ATYPE, $URL);

            array_push($RestaurantArray, $RESTAURANT);
        }

        //close connection
        pg_close($dbconn);
        return $RestaurantArray;
    }
}




?>