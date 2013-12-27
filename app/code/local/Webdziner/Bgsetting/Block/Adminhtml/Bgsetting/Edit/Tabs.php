<?php

class Webdziner_Bgsetting_Block_Adminhtml_Bgsetting_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('bgsetting_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('bgsetting')->__('Background Setting'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('bgsetting')->__('Background Setting'),
          'title'     => Mage::helper('bgsetting')->__('Background Setting'),
          'content'   => $this->getLayout()->createBlock('bgsetting/adminhtml_bgsetting_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}