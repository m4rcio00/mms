<?php

class Webdziner_Ajaxsearch_Block_Adminhtml_Ajaxsearch_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('ajaxsearch_form', array('legend'=>Mage::helper('ajaxsearch')->__('Search Setting')));

      $fieldset->addField('enabled', 'select', array(
          'label'     => Mage::helper('ajaxsearch')->__('Enable ajax search'),
          'name'      => 'enabled',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('ajaxsearch')->__('Enabled'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('ajaxsearch')->__('Disabled'),
              ),
          ),
      ));
      
	  $fieldset->addField('short_description', 'select', array(
          'label'     => Mage::helper('ajaxsearch')->__('Show product short description'),
          'name'      => 'short_description',
		  'values'    => array(
		  		array(
					'label'  =>  Mage::helper('ajaxsearch')->__('Yes'),
					'value'  =>  '1'
				),
		  		array(
					'label'  =>  Mage::helper('ajaxsearch')->__('No'),
					'value'  =>  '0'
				),
		  )
      ));

      $fieldset->addField('no_of_product', 'text', array(
          'label'     => Mage::helper('ajaxsearch')->__('Number of products to show'),
          'name'      => 'no_of_product',
      ));

      $fieldset->addField('no_short_description_char', 'text', array(
          'label'     => Mage::helper('ajaxsearch')->__('Number of short description chars'),
          'name'      => 'no_short_description_char',
      ));
     
	  $fieldset->addField('show_thumbnail', 'select', array(
          'label'     => Mage::helper('ajaxsearch')->__('Show product thumbnail'),
          'name'      => 'show_thumbnail',
		  'values'    => array(
		  		array(
					'label'  =>  Mage::helper('ajaxsearch')->__('Yes'),
					'value'  =>  '1'
				),
		  		array(
					'label'  =>  Mage::helper('ajaxsearch')->__('No'),
					'value'  =>  '0'
				),
		  )
      ));
      if ( Mage::getSingleton('adminhtml/session')->getAjaxsearchData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAjaxsearchData());
          Mage::getSingleton('adminhtml/session')->setAjaxsearchData(null);
      } elseif ( Mage::registry('ajaxsearch_data') ) {
          $form->setValues(Mage::registry('ajaxsearch_data')->getData());
      }
      return parent::_prepareForm();
  }
}