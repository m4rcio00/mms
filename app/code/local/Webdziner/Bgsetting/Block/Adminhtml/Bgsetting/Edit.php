<?php

class Webdziner_Bgsetting_Block_Adminhtml_Bgsetting_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'bgsetting';
        $this->_controller = 'adminhtml_bgsetting';
        
        $this->_updateButton('save', 'label', Mage::helper('bgsetting')->__('Save'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('bgsetting_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'bgsetting_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'bgsetting_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('bgsetting_data') && Mage::registry('bgsetting_data')->getId() ) {
            return Mage::helper('bgsetting')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('bgsetting_data')->getTitle()));
        } else {
            return Mage::helper('bgsetting')->__('Background Setting');
        }
    }
}