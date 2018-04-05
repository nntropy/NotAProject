<?php

//try require ("Entities/*"); later
require ("Entities/AlocationEntity.php");
require ("Entities/MenuItemEntity.php");
require ("Entities/RaterEntity.php");
require ("Entities/RatingEntity.php");
require ("Entities/RatingItemEntity.php");
require ("Entities/RestaurantEntity.php");

class RestaurantModel {
    
    
    function GetRestaurantTypes() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT DISTINCT ATYPE
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
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT *
                  FROM RESTAURANT
                  WHERE ATYPE LIKE '$type'";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $RestaurantArray = array();
        
        while($row = pg_fetch_array($result)) {
            $RESTAURANT_ID = $row[1];
            $ANAME = $row[2];
            $ATYPE = $row[3];
            $URL = $row[4];
            
            $RESTAURANT = new RestaurantEntity(-1 , $RESTAURANT_ID, $ANAME, $ATYPE, $URL);
            
            array_push($RestaurantArray, $RESTAURANT);
        }
        
        //close connection
        pg_close($dbconn);
        return $RestaurantArray;
    }
    
    
    
    
    
    
    //FOLLOWING QUERIES ARE THOSE TO BE IMPLEMENTED FOR THE PROJECT
    
    
    //FIX THIS: FOR VALUES THAT COME FROM QUERY IN LOOP
    function GetQueryA($name) {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT O.*
                 FROM (RESTAURANT NATURAL JOIN ALOCATION) AS O
                 WHERE  O.ANAME = '$name'";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryB($name) {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT M.aname, M.category, M.price
                  FROM MENUITEM AS M, RESTAURANT AS R
                  WHERE R.RESTAURANT_ID = M.RESTAURANT_ID AND R.ANAME = '$name'
                  ORDER BY M.category ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
            
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryC($type) {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT M.manager_name, M.opendate
                  FROM ALOCATION AS M, RESTAURANT AS R 
                  WHERE R.ATYPE = '$type' AND M.restaurant_id = R.restaurant_id
                  ORDER BY OPENDATE ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryD($name) {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT M.aname, M.price, A.manager_name, A.open_hour, R.url
                  FROM MENUITEM AS M, RESTAURANT AS R, ALOCATION AS A
                  WHERE R.ANAME = '$name' AND A.restaurant_id = R.restaurant_id
	              AND M.price = (SELECT MAX(M2.price)
					             FROM MENUITEM AS M2
					             WHERE M2.restaurant_id = R.restaurant_id)";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryE() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT R.ATYPE, M.CATEGORY, AVG(M.PRICE)
                  FROM MENUITEM AS M, RESTAURANT AS R
                  WHERE M.RESTAURANT_ID = R.RESTAURANT_ID
                  GROUP BY R.ATYPE, M.CATEGORY
                  ORDER BY R.ATYPE ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryF() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT DISTINCT R2.ANAME, R2.RESTAURANT_ID,M2.ANAME, M2.USER_ID, T2.PRICE, T2.FOOD, T2.MOOD, T2.STAFF 
                  FROM (SELECT R.RESTAURANT_ID AS r_id, T.AUSER_ID AS u_id
	                    FROM RESTAURANT AS R, RATER AS M, RATING AS T
	                    WHERE R.RESTAURANT_ID = T.RESTAURANT_ID AND M.USER_ID = T.AUSER_ID
                        GROUP BY R.RESTAURANT_ID, T.AUSER_ID
                        ORDER BY R.RESTAURANT_ID, T.AUSER_ID) AS X_TABLE,
	 
	              RESTAURANT AS R2, 
	              RATER AS M2,
	              RATING AS T2
                  WHERE r_id = R2.RESTAURANT_ID AND M2.USER_ID = u_id AND T2.AUSER_ID = u_id AND T2.RESTAURANT_ID = r_id
                  ORDER BY M2.USER_ID";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryG() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT DISTINCT E.ANAME, L.PHONE_NUMBER, E.ATYPE
                  FROM RATING AS R, RESTAURANT AS E, ALOCATION AS L
                  WHERE L.RESTAURANT_ID = E.RESTAURANT_ID AND R.RESTAURANT_ID = E.RESTAURANT_ID 
		          AND R.RESTAURANT_ID IN (SELECT DISTINCT RESTAURANT_ID
								          FROM RATING AS R
								          WHERE EXTRACT(YEAR FROM R.ADATE) != 2015 
                                          OR EXTRACT(MONTH FROM R.ADATE) != 01)
                  ORDER BY E.ANAME ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryH() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT O.ANAME, O.OPENDATE, O.ADATE AS date_rated
                  FROM (RESTAURANT NATURAL JOIN ALOCATION NATURAL JOIN RATING) AS O
                  WHERE O.STAFF < (SELECT MIN(X.STAFF)
				                   FROM RATING AS X, RATER AS R
				                   WHERE R.USER_ID = X.AUSER_ID AND R.ANAME = 'KendalSawyer')
                  ORDER BY O.ADATE";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryI() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT *
                  FROM RESTAURANT AS R, RATING AS T, RATER AS A
                  WHERE R.RESTAURANT_ID = T.RESTAURANT_ID 
                  AND A.USER_ID = T.AUSER_ID AND R.ATYPE = 'Thai'
	              AND T.FOOD = (SELECT MAX(T2.FOOD)
					            FROM RATING AS T2, RESTAURANT AS R2
					            WHERE R2.ATYPE = 'Thai' AND T2.RESTAURANT_ID = R2.RESTAURANT_ID)";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryJ() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT type_avg > average_count
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
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryK() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT A.ANAME, A.JOIN_DATE, A.REPTUATION, R.ANAME, rate_date, total
                  FROM (SELECT (T.FOOD + T.MOOD) AS total, T.AUSER_ID AS u_id, T.RESTAURANT_ID AS r_id, T.ADATE AS rate_date
	                    FROM RATING AS T) AS FM_RATING, 
                        RATER AS A, 
                        RESTAURANT AS R

                  WHERE (total, r_id) IN (SELECT MAX(T2.FOOD + T2.MOOD), T2.RESTAURANT_ID 
	  				                      FROM RATING AS T2
					                      GROUP BY T2.RESTAURANT_ID)
	                    AND u_id = A.USER_ID AND r_id = R.RESTAURANT_ID			
	  
                  ORDER BY R.ANAME ASC";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    
    function GetQueryM($name) {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT count_num AS number_of_ratings, A.ANAME, A.REPTUATION, T.ANAME
                  FROM  (SELECT COUNT(R.AUSER_ID) AS count_num, R.RESTAURANT_ID AS r_id, R.AUSER_ID AS u_id
	  		             FROM RATING AS R
	                     GROUP BY R.RESTAURANT_ID,R.AUSER_ID
	                     ORDER BY R.RESTAURANT_ID, R.AUSER_ID ASC) AS count_table_2,
	                     RATER AS A,
	                     RESTAURANT AS T
	  
                  WHERE (count_num, r_id) IN (SELECT MAX(count_num), r_id
							                  FROM (SELECT COUNT(R.AUSER_ID) AS count_num,R.RESTAURANT_ID AS r_id, R.AUSER_ID AS u_id
	  									            FROM RATING AS R
	  									            GROUP BY R.RESTAURANT_ID,R.AUSER_ID
	 									            ORDER BY R.RESTAURANT_ID, R.AUSER_ID ASC) AS count_table
							                  GROUP BY r_id)
	                    AND A.USER_ID = u_id AND T.RESTAURANT_ID = r_id AND T.ANAME = '$name'
                  ORDER BY r_id, u_id";
        $result=pg_query($dbconn,$query) or die("Error in SQL query: ".pg_last_error());
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    function GetQueryN() {
        require 'Credentials.php';
        $dbconn =pg_connect($conn_string) or die("Connection failed");
        $query = "SELECT X.ANAME, X.EMAIL, r_id2, total_rating_2, avg_rating
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
        $values = array();
        
        while($row = pg_fetch_array($result)) {
            array_push($values, $row[0]);
        }
        
        //close connection
        pg_close($dbconn);
        return $values;
        
    }
    
    
    
}




?>