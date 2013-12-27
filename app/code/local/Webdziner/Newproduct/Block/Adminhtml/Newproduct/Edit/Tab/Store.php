<?php 
class Webdziner_Newproduct_Block_Adminhtml_Newproduct_Edit_Tab_Store extends Mage_Adminhtml_Block_Widget_Grid 
{
	public function __construct()
	{
        parent::__construct();
        $this->setTemplate('newproduct/stores.phtml');
	}
		
}