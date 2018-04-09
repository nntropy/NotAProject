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
            $val3 = $row[2];
            $val4 = $row[3];
            $val5 = $row[4];
            $val6 = $row[5];
            $val7 = $row[6];
            $val8 = $row[7];
            $val9 = $row[8];
            $val10 = $row[9];
            $val11 = $row[10];
            
            $value = new ReturnEntity($val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9, $val10, $val11,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryB($name) {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT M.aname, M.category, M.price
                  FROM MENUITEM AS M, RESTAURANT AS R
                  WHERE R.RESTAURANT_ID = M.RESTAURANT_ID AND R.ANAME = '$name'
                  ORDER BY M.category ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            
            $value = new ReturnEntity($val1, $val2, $val3, -1, -1, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryC($category) {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT R.ANAME, M.manager_name, M.opendate
                  FROM ALOCATION AS M, RESTAURANT AS R 
                  WHERE R.ATYPE = '$category' AND M.restaurant_id = R.restaurant_id
                  ORDER BY OPENDATE ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            
            $value = new ReturnEntity($val1, $val2, $val3, -1, -1, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryD($category) {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT M.aname, M.price, A.manager_name, A.open_hour, R.url
                  FROM MENUITEM AS M, RESTAURANT AS R, ALOCATION AS A
                  WHERE R.ANAME = '$category' AND A.restaurant_id = R.restaurant_id AND M.RESTAURANT_ID = R.RESTAURANT_ID
                        AND M.price = (SELECT MAX(M2.price)
                                       FROM MENUITEM AS M2
                                       WHERE M2.restaurant_id = R.restaurant_id)";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            $val4 = $row[3];
            $val5 = $row[4];
            
            $value = new ReturnEntity($val1, $val2, $val3, $val4, $val5, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }


    function GetQueryE() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT R.ATYPE, M.CATEGORY, AVG(M.PRICE)
                  FROM MENUITEM AS M, RESTAURANT AS R
                  WHERE M.RESTAURANT_ID = R.RESTAURANT_ID
                  GROUP BY R.ATYPE, M.CATEGORY
                  ORDER BY R.ATYPE ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            
            $value = new ReturnEntity($val1, $val2, $val3, -1, -1, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryF() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT DISTINCT R2.ANAME, M2.ANAME, T2.ADATE, T2.PRICE, T2.FOOD, T2.MOOD, T2.STAFF 
                  FROM (SELECT R.RESTAURANT_ID AS r_id, T.AUSER_ID AS u_id
                        FROM RESTAURANT AS R, RATER AS M, RATING AS T
                        WHERE R.RESTAURANT_ID = T.RESTAURANT_ID AND M.USER_ID = T.AUSER_ID
                        GROUP BY R.RESTAURANT_ID, T.AUSER_ID
                        ORDER BY R.RESTAURANT_ID, T.AUSER_ID) AS X_TABLE,
     
                        RESTAURANT AS R2, 
                        RATER AS M2,
                        RATING AS T2
                  WHERE r_id = R2.RESTAURANT_ID AND M2.USER_ID = u_id AND T2.AUSER_ID = u_id AND T2.RESTAURANT_ID = r_id
                  ORDER BY R2.ANAME, M2.ANAME ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            $val4 = $row[3];
            $val5 = $row[4];
            $val6 = $row[5];
            $val7 = $row[6];
            
            $value = new ReturnEntity($val1, $val2, $val3, $val4, $val5, $val6, $val7, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryG() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT DISTINCT E.ANAME, L.PHONE_NUMBER, E.ATYPE
                  FROM RATING AS R, RESTAURANT AS E, ALOCATION AS L
                  WHERE L.RESTAURANT_ID = E.RESTAURANT_ID AND R.RESTAURANT_ID = E.RESTAURANT_ID 
                        AND R.RESTAURANT_ID NOT IN (SELECT DISTINCT RESTAURANT_ID
                                                FROM RATING AS R
                                                WHERE EXTRACT(YEAR FROM R.ADATE) = 2015 OR EXTRACT(MONTH FROM R.ADATE) = 01)
                  ORDER BY E.ANAME ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            
            $value = new ReturnEntity($val1, $val2, $val3, -1, -1, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryH() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT O.ANAME, O.OPENDATE, O.ADATE AS date_rated
                  FROM (RESTAURANT NATURAL JOIN ALOCATION NATURAL JOIN RATING) AS O
                  WHERE O.STAFF < (SELECT MIN(X.STAFF)
                                   FROM RATING AS X, RATER AS R
                                   WHERE R.USER_ID = X.AUSER_ID AND R.ANAME = 'Kendal Sawyer')
                  ORDER BY O.ADATE";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            
            $value = new ReturnEntity($val1, $val2, $val3, -1, -1, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryI() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT R.ANAME, A.ANAME, T.FOOD
                  FROM RESTAURANT AS R, RATING AS T, RATER AS A
                  WHERE R.RESTAURANT_ID = T.RESTAURANT_ID AND A.USER_ID = T.AUSER_ID AND R.ATYPE = 'Thai'
                  AND T.FOOD = (SELECT MAX(T2.FOOD)
                                FROM RATING AS T2, RESTAURANT AS R2
                                WHERE R2.ATYPE = 'Thai' AND T2.RESTAURANT_ID = R2.RESTAURANT_ID)";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            
            $value = new ReturnEntity($val1, $val2, -1, -1, -1, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryJ() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT type_avg > average_count
                  FROM (SELECT AVG(type_val) AS type_avg
                        FROM (SELECT COUNT(*) AS type_val
                              FROM RATING AS R, RESTAURANT AS E
                              WHERE E.RESTAURANT_ID = R.RESTAURANT_ID AND E.ATYPE ='Thai'
                              GROUP BY R.RESTAURANT_ID) AS type_count) 
                        AS specific_average,
      
                       (SELECT AVG(count_val) AS average_count
                        FROM (SELECT COUNT(*) AS count_val
                              FROM RATING AS R
                              GROUP BY R.RESTAURANT_ID) AS counts) 
                        AS total_average";

        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            
            $value = new ReturnEntity($val1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryK() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT A.ANAME, A.JOIN_DATE, A.REPUTATION, R.ANAME, rate_date, total, RTA.FOOD, RTA.MOOD
                  FROM (SELECT (T.FOOD + T.MOOD) AS total, T.AUSER_ID AS u_id, T.RESTAURANT_ID AS r_id, T.ADATE AS rate_date
                        FROM RATING AS T) AS FM_RATING, RATER AS A, RESTAURANT AS R
                        WHERE (total, r_id) IN (SELECT MAX(T2.FOOD + T2.MOOD), T2.RESTAURANT_ID 
                                                FROM RATING AS T2
                                                GROUP BY T2.RESTAURANT_ID)
                        AND u_id = A.USER_ID AND r_id = R.RESTAURANT_ID           
      
                  ORDER BY R.ANAME ASC";

        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            $val4 = $row[3];
            $val5 = $row[4];
            $val6 = $row[5];
            
            $value = new ReturnEntity($val1, $val2, $val3, $val4, $val5, $val6, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryN() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT X.ANAME, X.EMAIL, r_id2, total_rating_2, avg_rating
                  FROM (SELECT (T2.FOOD+T2.MOOD+T2.PRICE+T2.STAFF) AS total_rating_2, T2.RESTAURANT_ID AS r_id2, T2.AUSER_ID
                        FROM RATING AS T2) AS total_table,
     
                        (SELECT AVG(total_rating) AS avg_rating, r_id
                         FROM (SELECT (T.FOOD+T.MOOD+T.PRICE+T.STAFF) AS total_rating, T.RESTAURANT_ID AS r_id, T.AUSER_ID
                               FROM RATING AS T, RATER AS R
                               WHERE T.AUSER_ID = R.USER_ID AND R.ANAME ='John’) AS X_TABLE
                        GROUP BY r_id) AS avg_table,
     
                        RATER AS X
     
                  WHERE X.USER_ID = total_table.AUSER_ID AND r_id = r_id2 AND total_rating_2 < avg_rating
                  ORDER BY r_id2";

        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            $val4 = $row[3];
            $val5 = $row[4];
            
            $value = new ReturnEntity($val1, $val2, $val3, $val4, $val5, -1, -1, -1, -1, -1, -1,
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }

    function GetQueryO() {
        require 'C:\Users\aidanocc\Mitchell\Model/Credentials.php';
        $conn_string='host=www.eecs.uottawa.ca port=15432 dbname=mchat022 user=mchat022 password=M2rnay6gz9';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SET search_path="."\"Project\"".";
                  SELECT DISTINCT r_id, u_id, maximum_difference, O.ANAME, O.ATYPE, O.EMAIL, RE.ANAME, O.FOOD, O.MOOD, O.PRICE, O.STAFF 
                  FROM (SELECT r_id, u_id, MAX(TOTAL) as maximum_difference
                        FROM (SELECT r_id, u_id, ((SUM(ABS(avg_food - curr_food))) + (SUM(ABS(avg_mood - curr_mood)))
                                     + (SUM(ABS(avg_price - curr_price))) + (SUM(ABS(avg_staff - curr_staff)))) AS TOTAL
                              FROM (SELECT u_id, r_id, AVG(X.FOOD) AS avg_food, AVG(X.MOOD) AS avg_mood, 
                                           AVG(X.PRICE) AS avg_price, AVG(X.STAFF) AS avg_staff                
                                    FROM (SELECT T.AUSER_ID AS u_id, T.RESTAURANT_ID AS r_id, T.FOOD, T.MOOD, T.PRICE, T.STAFF
                                          FROM RATING AS T) 
                                          AS X
                                    GROUP BY u_id, r_id) 
                                    AS K,
      
                                    (SELECT T2.AUSER_ID AS u_id_2, T2.RESTAURANT_ID AS r_id_2, T2.FOOD AS curr_food,
                                            T2.MOOD AS curr_mood, T2.PRICE AS curr_price, T2.STAFF AS curr_staff         
                                     FROM RATING AS T2) AS M
                              WHERE u_id = u_id_2 AND r_id = r_id_2
                              GROUP BY u_id, r_id) AS N
      
                        WHERE TOTAL != 0 
                        GROUP BY u_id, r_id) AS CK,
      
                        (RATER AS RA JOIN RATING AS RT ON RA.USER_ID = RT.AUSER_ID) AS O,
                         RESTAURANT AS RE
      
                  WHERE RE.RESTAURANT_ID = O.RESTAURANT_ID AND r_id = O.RESTAURANT_ID AND u_id = O.USER_ID";

        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $valueArray = array();
        
        while($row = pg_fetch_array($result)) {
            $val1 = $row[0];
            $val2 = $row[1];
            $val3 = $row[2];
            $val4 = $row[3];
            $val5 = $row[4];
            $val6 = $row[5];
            $val7 = $row[6];
            $val8 = $row[7];
            $val9 = $row[8];
            $val10 = $row[9];
            $val11 = $row[10];
            
            $value = new ReturnEntity($val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9, $val10, $val11
                                          -1, -1, -1, -1);
            
            array_push($valueArray, $value);
        }
        
        //close connection
        pg_close($dbconn);
        return $valueArray;
    }
    
}




?>