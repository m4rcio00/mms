<?php

class Webdziner_Ajaxsearch_Block_Adminhtml_Ajaxsearch_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

	  	$this->removeButton('delete');
	  	$this->removeButton('reset');
	  	$this->removeButton('back');
		
        $this->_objectId = 'id';
        $this->_blockGroup = 'ajaxsearch';
        $this->_controller = 'adminhtml_ajaxsearch';
        
        $this->_updateButton('save', 'label', Mage::helper('ajaxsearch')->__('Save Setting'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
    }
}