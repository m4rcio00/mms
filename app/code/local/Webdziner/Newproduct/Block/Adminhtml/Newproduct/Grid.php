<?php 

class Webdziner_Newproduct_Block_Adminhtml_Newproduct_Grid extends Mage_Adminhtml_Block_Widget_Grid 
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('newproductGrid');
      $this->setDefaultSort('newproduct_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('newproduct/newproduct')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('newproduct_id', array(
          'header'    => Mage::helper('newproduct')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'newproduct_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('newproduct')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('newproduct')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('newproduct')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('newproduct_id');
        $this->getMassactionBlock()->setFormFieldName('newproduct');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('newproduct')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('newproduct')->__('Are you sure?')
        ));

        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}