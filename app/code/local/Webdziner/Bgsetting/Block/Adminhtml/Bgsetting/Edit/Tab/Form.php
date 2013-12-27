<?php

class Webdziner_Bgsetting_Block_Adminhtml_Bgsetting_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('bgsetting_form', array('legend'=>Mage::helper('bgsetting')->__('Background Setting')));

      $fieldset->addField('bg_color', 'text', array(
          'label'     => Mage::helper('bgsetting')->__('Background-color'),
          /*'class'     => 'required-entry',*/
          'required'  => true,
          'name'      => 'bg_color',
      ));

      $fieldset->addField('bg_image', 'file', array(
          'label'     => Mage::helper('bgsetting')->__('Background-image'),
          'required'  => false,
          'name'      => 'bg_image',
	  ));

		$fieldset->addField('del_image', 'checkbox', array(
		  'name'   =>   'del_image',
		  'after_element_html' => ' Delete image'
   		));

      $fieldset->addField('bg_repeat', 'select', array(
          'label'     => Mage::helper('bgsetting')->__('Background-repeat'),
          'name'      => 'bg_repeat',
          'values'    => array(
              array(
                  'value'     => '',
                  'label'     => Mage::helper('bgsetting')->__('Select'),
              ),
              array(
                  'value'     => 'repeat',
                  'label'     => Mage::helper('bgsetting')->__('repeat'),
              ),
              array(
                  'value'     => 'repeat-x',
                  'label'     => Mage::helper('bgsetting')->__('repeat-x'),
              ),
              array(
                  'value'     => 'repeat-y',
                  'label'     => Mage::helper('bgsetting')->__('repeat-y'),
              ),
              array(
                  'value'     => 'no-repeat',
                  'label'     => Mage::helper('bgsetting')->__('no-repeat'),
              ),
          ),
      ));
     
      $fieldset->addField('bg_attachment', 'select', array(
          'label'     => Mage::helper('bgsetting')->__('Background-attachment'),
          'name'      => 'bg_attachment',
          'values'    => array(
              array(
                  'value'     => '',
                  'label'     => Mage::helper('bgsetting')->__('Select'),
              ),
              array(
                  'value'     => 'fixed',
                  'label'     => Mage::helper('bgsetting')->__('fixed'),
              ),
              array(
                  'value'     => 'scroll',
                  'label'     => Mage::helper('bgsetting')->__('scroll'),
              ),
          ),
      ));

      $fieldset->addField('bg_positionx', 'select', array(
          'label'     => Mage::helper('bgsetting')->__('Background-position (x)'),
          'name'      => 'bg_positionx',
          'values'    => array(
              array(
                  'value'     => '',
                  'label'     => Mage::helper('bgsetting')->__('Select'),
              ),
              array(
                  'value'     => 'center',
                  'label'     => Mage::helper('bgsetting')->__('center'),
              ),
              array(
                  'value'     => 'left',
                  'label'     => Mage::helper('bgsetting')->__('left'),
              ),
              array(
                  'value'     => 'right',
                  'label'     => Mage::helper('bgsetting')->__('right'),
              ),
          ),
      ));

      $fieldset->addField('bg_positiony', 'select', array(
          'label'     => Mage::helper('bgsetting')->__('Background-position (y)'),
          'name'      => 'bg_positiony',
          'values'    => array(
              array(
                  'value'     => '',
                  'label'     => Mage::helper('bgsetting')->__('Select'),
              ),
              array(
                  'value'     => 'top',
                  'label'     => Mage::helper('bgsetting')->__('top'),
              ),
              array(
                  'value'     => 'center',
                  'label'     => Mage::helper('bgsetting')->__('center'),
              ),
              array(
                  'value'     => 'bottom',
                  'label'     => Mage::helper('bgsetting')->__('bottom'),
              ),
          ),
      ));  
	  
      if ( Mage::getSingleton('adminhtml/session')->getBgsettingData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getBgsettingData());
          Mage::getSingleton('adminhtml/session')->setBgsettingData(null);
      } elseif ( Mage::registry('bgsetting_data') ) {
          $form->setValues(Mage::registry('bgsetting_data')->getData());
      }
      return parent::_prepareForm();
  }
}