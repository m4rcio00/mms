<?php 

class Webdziner_Newproduct_Adminhtml_NewproductController extends Mage_Adminhtml_Controller_action
{

	public function gridAction(){
		$this->loadLayout();
		$this->getLayout()->getBlock('customer.grid');
		$this->renderLayout();
	}
	
	public function upsellgridAction(){
		$this->loadLayout();
		$this->getLayout()->getBlock('customer.grid');
		$this->renderLayout();
	}


	protected function _initAction() {
		$this->loadLayout()
		->_setActiveMenu('newproduct/items')
		->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Newproduct'), Mage::helper('adminhtml')->__('Item Manager'));

		return $this;
	}

	public function indexAction() {
		$this->_initAction()
		->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('newproduct/newproduct')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('newproduct_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('newproduct/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('newproduct/adminhtml_newproduct_edit'))
			->_addLeft($this->getLayout()->createBlock('newproduct/adminhtml_newproduct_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('newproduct')->__('Item does not exist'));
			$this->_redirect('*/*/edit', array('id' => 1));
		}
	}

	public function newAction() {
		$this->_forward('edit');
	}

	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {

			/*$model = Mage::getModel('newproduct/newproduct');
			$model->setData($data)
			->setId($this->getRequest()->getParam('id'));*/

			try {

				//$model->save();
				$newproduct_id = 1;
				if(isset($data['links'])){
					$customers = Mage::helper('adminhtml/js')->decodeGridSerializedInput($data['links']['customers']); //Save the array to your database

					$collection = Mage::getModel('newproduct/grid')->getCollection();
					$collection->addFieldToFilter('newproduct_id',$newproduct_id);
					$collection->addFieldToFilter('store_id',$data['store_id']);
					foreach($collection as $obj){
						$obj->delete();
					}
					
					foreach($customers as $key => $value){
						$model2 = Mage::getModel('newproduct/grid');
						$model2->setNewproductId($newproduct_id);
						$model2->setProductId($key);
						$model2->setPosition($value['position']);
						$model2->setStoreId($data['store_id']);
						$model2->save();
					}
				}

				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('newproduct')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				//if ($this->getRequest()->getParam('back')) {
					//$this->_redirect('*/*/edit', array('id' => $model->getId()));
					//return;
				//}
				
				$this->_redirect('*/*/edit', array('id' => 1));
				return;
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				Mage::getSingleton('adminhtml/session')->setFormData($data);
				$this->_redirect('*/*/edit', array('id' => 1));
				return;
			}
		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('newproduct')->__('Unable to find item to save'));
		$this->_redirect('*/*/edit', array('id' => 1));
	}

	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('newproduct/newproduct');

				$model->setId($this->getRequest()->getParam('id'))
				->delete();

				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

	public function massDeleteAction() {
		$newproductIds = $this->getRequest()->getParam('newproduct');
		if(!is_array($newproductIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
		} else {
			try {
				foreach ($newproductIds as $newproductId) {
					$newproduct = Mage::getModel('newproduct/newproduct')->load($newproductId);
					$newproduct->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($newproductIds)
				)
				);
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
	
	public function setregisterAction() {
		$store_id = $this->getRequest()->getParam('store_id');
		Mage::getSingleton('adminhtml/session')->setData('newproduct_store_id',$store_id);
	}

}