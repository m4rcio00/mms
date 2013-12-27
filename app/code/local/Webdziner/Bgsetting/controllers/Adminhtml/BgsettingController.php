<?php

class Webdziner_Bgsetting_Adminhtml_BgsettingController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('bgsetting/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Background Setting'), Mage::helper('adminhtml')->__('Background Setting'));
		
		return $this;
	}   
 
	public function indexAction() {
		//$this->_redirect('*/*/edit',array('id'=>'1'));
	}

	public function editAction() {
		$id     = 1;
		$model  = Mage::getModel('bgsetting/bgsetting')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('bgsetting_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('bgsetting/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Background Setting'), Mage::helper('adminhtml')->__('Background Setting'));
			//$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('bgsetting/adminhtml_bgsetting_edit'))
				->_addLeft($this->getLayout()->createBlock('bgsetting/adminhtml_bgsetting_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bgsetting')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			//die($data['del_image']);
			if(!isset($data['del_image']) && $data['del_image'] == '') {

				if(isset($_FILES['bg_image']['name']) && $_FILES['bg_image']['name'] != '') {
					try {	
						/* Starting upload */	
						$uploader = new Varien_File_Uploader('bg_image');
						
						// Any extention would work
						$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
						$uploader->setAllowRenameFiles(false);
						
						// Set the file upload mode 
						// false -> get the file directly in the specified folder
						// true -> get the file in the product like folders 
						//	(file.jpg will go in something like /media/f/i/file.jpg)
						$uploader->setFilesDispersion(false);
						
						// We set media as the upload dir
						$path = Mage::getBaseDir('media') . DS . 'bgimage' . DS;
						$uploader->save($path, $_FILES['bg_image']['name'] );
						
					} catch (Exception $e) {
				  
					}
				
					//this way the name is saved in DB
					$data['bg_image'] = $_FILES['bg_image']['name'];
				}

			}
			else {
				$data['bg_image'] = '';
			}
	  			
	  			
			$model = Mage::getModel('bgsetting/bgsetting');		
			$model->setData($data)
				->setId(1);
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('bgsetting')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bgsetting')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
	}
 
    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}