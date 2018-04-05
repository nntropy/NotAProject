<?php

class AlocationEntity
{
    public $LOCATION_ID;
    public $OPENDATE;
    public $MANAGER_NAME;
    public $PHONE_NUMBER;
    public $STREET_ADDRESS;
    public $RESTAURANT_ID;
    public $OPEN_HOUR;
    public $CLOSE_HOUR;
    
    
    function _construct($LOCATION_ID, $OPENDATE, $MANAGER_NAME, $PHONE_NUMBER, $STREET_ADDRESS, $RESTAURANT_ID, $OPEN_HOUR, $CLOSE_HOUR) {
        $this-> LOCATION_ID = $LOCATION_ID;
        $this-> OPENDATE = $OPENDATE;
        $this-> MANAGER_NAME = $MANAGER_NAME;
        $this-> PHONE_NUMBER = $PHONE_NUMBER;
        $this-> STREET_ADDRESS = $STREET_ADDRESS;
        $this-> RESTAURANT_ID = $RESTAURANT_ID;
        $this-> OPEN_HOUR = $OPEN_HOUR;
        $this-> CLOSE_HOUR = $CLOSE_HOUR;
        
        
    }
    
}

?>
