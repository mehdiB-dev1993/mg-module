<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/4/23
 */

namespace Netweb\User\Block\Adminhtml\Grid;


class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{


    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;
    /**
     * @var \Netweb\User\Model\UserModelFactory
     */
    private $userModelFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data            $backendHelper
     * @param \Magento\Framework\Module\Manager       $moduleManager
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Netweb\User\Model\UserModelFactory $userModelFactory,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->userModelFactory = $userModelFactory;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('netwebgridGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('grid_record');
    }
    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection =  $this->userModelFactory->create()->getCollection();
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }
    /**
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
            ]
        );
        $this->addColumn(
            'username',
            [
                'header' => __('Username'),
                'index' => 'username',
            ]
        );
        $this->addColumn(
            'password',
            [
                'header' => __('Password'),
                'index' => 'password',
            ]
        );
        $this->addColumn(
            'email',
            [
                'header' => __('Email'),
                'index' => 'password',
                'filter' => false,
                'renderer' => 'Netweb\User\Block\Adminhtml\Grid\Renderer\Email'
            ]
        );
        $this->addColumn(
            'edit',
            [
                'header' => __('Edit'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit',
                        ],
                        'field' => 'id',
                    ],
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action',
            ]
        );
        $this->addColumn(
            'delete',
            [
                'header' => __('Delete'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Delete'),
                        'url' => [
                            'base' => '*/*/delete',
                        ],
                        'field' => 'id',
                    ],
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action',
            ]
        );
        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }
        return parent::_prepareColumns();
    }

//    protected function _prepareMassaction()
//    {
//        $this->setMassactionIdField('id');
//        $this->getMassactionBlock()->setFormFieldName('id');
//        $this->getMassactionBlock()->addItem(
//            'delete',
//            [
//                'label' => __('Delete'),
//                'url' => $this->getUrl('blog/*/massDelete'),
//                'confirm' => __('Are you sure?'),
//            ]
//        );
//        $statuses = $this->_status->toOptionArray();
//        array_unshift($statuses, ['label' => '', 'value' => '']);
//        $this->getMassactionBlock()->addItem(
//            'status',
//            [
//                'label' => __('Change status'),
//                'url' => $this->getUrl('blog/*/massStatus', ['_current' => true]),
//                'additional' => [
//                    'visibility' => [
//                        'name' => 'status',
//                        'type' => 'select',
//                        'class' => 'required-entry',
//                        'label' => __('Status'),
//                        'values' => $statuses,
//                    ],
//                ],
//            ]
//        );
//        return $this;
//    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/index', ['_current' => true]);
    }
    /**
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }
}
