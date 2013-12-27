<?php

class Webdziner_Ajaxsearch_Block_Adminhtml_Ajaxsearch_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('ajaxsearch_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('ajaxsearch')->__('Ajax search setting'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('ajaxsearch')->__('Ajax search setting'),
          'title'     => Mage::helper('ajaxsearch')->__('Ajax search setting'),
          'content'   => $this->getLayout()->createBlock('ajaxsearch/adminhtml_ajaxsearch_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}