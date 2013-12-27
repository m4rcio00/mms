<?php     

class Webdziner_Newproduct_Block_Adminhtml_Newproduct_Edit extends Mage_Adminhtml_Block_Widget_Form_Container  
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'newproduct';
        $this->_controller = 'adminhtml_newproduct';
        
        $this->_updateButton('save', 'label', Mage::helper('newproduct')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('newproduct')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('newproduct_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'newproduct_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'newproduct_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
		$this->_removeButton('save');
		$this->_removeButton('delete');
    }

    public function getHeaderText()
    {
        if( Mage::registry('newproduct_data') && Mage::registry('newproduct_data')->getId() ) {
            return Mage::helper('newproduct')->__('Manage New Products');
        } else {
            return Mage::helper('newproduct')->__('Manage New Products');
        }
    }
}