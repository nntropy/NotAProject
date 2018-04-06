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
    
    function GetRestaurantNames() {
        require ("C:\Users\aidanocc\Mitchell\Model/Credentials.php");
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn = pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT DISTINCT ANAME
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
    
    function GetQueryA($name) {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT O.*
                  FROM (RESTAURANT NATURAL JOIN ALOCATION) AS O 
                  WHERE ANAME LIKE '$name'";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[3];
            $val4 = $row[4];
            $val5 = $row[5];
            $val6 = $row[6];
            $val7 = $row[7];
            $val8 = $row[8];
            $val9 = $row[9];
            $val10 = $row[10];
            $val11 = $row[11];
            
            $value = new ReturnEntity($val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9, $val10, $val11,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }
    
}




?>