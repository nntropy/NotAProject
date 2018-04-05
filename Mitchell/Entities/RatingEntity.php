<?php

class RatingEntity
{
    public $AUSER_ID;
    public $ADATE;
    public $PRICE;
    public $FOOD;
    public $MOOD;
    public $STAFF;
    public $COMMENTS;
    public $RESTAURANT_ID;
    
    
    function _construct($AUSER_ID, $ADATE, $PRICE, $FOOD, $MOOD, $STAFF,$COMMENTS, $RESTAURANT_ID) {
        $this-> AUSER_ID = $AUSER_ID;
        $this-> ADATE = $ADATE;
        $this-> PRICE = $PRICE;
        $this-> FOOD = $FOOD;
        $this-> MOOD = $MOOD;
        $this-> STAFF = $STAFF;
        $this-> COMMENTS = $COMMENTS;
        $this-> RESTAURANT_ID = $RESTAURANT_ID;
    }
    
}

?>