<?php

class RatingItemEntity
{
    public $USER_ID;
    public $ADATE;
    public $ITEM_ID;
    public $RATING;
    public $ACOMMENT;
    
    
    function _construct($USER_ID, $ADATE, $ITEM_ID, $RATING, $ACOMMENT) {
        $this-> USER_ID = $USER_ID;
        $this-> ADATE = $ADATE;
        $this-> ITEM_ID = $ITEM_ID;
        $this-> RATING = $RATING;
        $this-> ACOMMENT = $ACOMMENT;
    }
    
}

?>