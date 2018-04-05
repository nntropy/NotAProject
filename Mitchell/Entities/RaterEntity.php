<?php

class RaterEntity
{
    public $USER_ID;
    public $EMAIL;
    public $ANAME;
    public $JOIN_DATE;
    public $ATYPE;
    public $REPUTATION;
    
    
    function _construct($USER_ID, $EMAIL,$ANAME, $JOIN_DATE, $ATYPE, $REPUTATION) {
        $this-> USER_ID = $USER_ID;
        $this-> EMAIL = $EMAIL;
        $this-> ANAME = $ANAME;
        $this-> JOIN_DATE = $JOIN_DATE;
        $this-> ATYPE = $ATYPE;
        $this-> REPUTATION = $REPUTATION;
        
    }
    
}

?>