<?php 

class Webdziner_Newproduct_Block_Adminhtml_Newproduct_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs 
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('newproduct_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('newproduct')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
	   $this->addTab('store_section', array(
          'label'     => Mage::helper('newproduct')->__('Select Stores'),
          'title'     => Mage::helper('newproduct')->__('Select Stores'),
          'content'   => $this->getLayout()->createBlock('newproduct/adminhtml_newproduct_edit_tab_store')->toHtml(),
      ));
      $this->addTab('grid_section', array(
          'label'     => Mage::helper('newproduct')->__('New Products'),
          'title'     => Mage::helper('newproduct')->__('New Products'),
          'url'       => $this->getUrl('*/*/grid', array('_current' => true)),
          'class'     => 'ajax',
      ));
      
      return parent::_beforeToHtml();
  }
}