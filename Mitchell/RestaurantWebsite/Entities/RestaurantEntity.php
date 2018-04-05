<?php

class RestaurantEntity
{
    public $RESTAURANT_ID;
    public $ANAME;
    public $ATYPE;
    public $URL;
    
    function _construct($RESTAURANT_ID, $ANAME, $ATYPE, $URL) {
        $this-> RESTAURANT_ID = $RESTAURANT_ID;
        $this-> ANAME = $ANAME;
        $this-> ATYPE = $ATYPE;
        $this-> URL = $URL;
        
    }
    
}

?>