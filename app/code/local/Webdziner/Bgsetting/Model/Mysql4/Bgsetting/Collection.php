<?php

class Webdziner_Bgsetting_Model_Mysql4_Bgsetting_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('bgsetting/bgsetting');
    }
}