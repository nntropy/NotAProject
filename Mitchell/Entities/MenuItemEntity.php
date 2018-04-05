<?php

class MenuItemEntity
{
    public $ITEM_ID;
    public $ANAME;
    public $ATYPE;
    public $CATEGORY;
    public $DESCRIPTION;
    public $PRICE;
    public $RESTAURANT_ID;
    
    
    function _construct($ITEM_ID, $ANAME, $ATYPE, $CATEGORY, $DESCRIPTION, $PRICE, $RESTAURANT_ID) {
        $this-> ITEM_ID = $ITEM_ID;
        $this-> ANAME = $ANAME;
        $this-> ATYPE = $ATYPE;
        $this-> CATEGORY = $CATEGORY;
        $this-> DESCRIPTION = $DESCRIPTION;
        $this-> PRICE = $PRICE;
        $this-> RESTAURANT_ID = $RESTAURANT_ID;
    }
    
}

?>