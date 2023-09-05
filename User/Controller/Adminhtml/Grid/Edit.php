<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/5/23
 */

namespace Netweb\User\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
class Edit extends \Magento\Backend\App\Action
{

    protected $_coreRegistry = null;

    protected $adminSession;

    protected $blogFactory;
    /**
     * @var \Netweb\User\Model\UserModel
     */
    private $UserModel;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\Model\Session $adminSession,
        \Netweb\User\Model\UserModel $UserModel
    ) {
        $this->_coreRegistry = $registry;
        $this->adminSession = $adminSession;
        $this->UserModel = $UserModel;
        parent::__construct($context);
    }
    /**
     * @return boolean
     */
    protected function _isAllowed()
    {
        return true;
    }
    /**
     * Add blog breadcrumbs
     *
     * @return $this
     */
    protected function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('RH_Blog::grid')->addBreadcrumb(__('User'), __('User'))->addBreadcrumb(__('Manage User'), __('Manage User'));
        return $resultPage;
    }
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->UserModel;
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This blog record no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $data = $this->adminSession->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('netweb_user_form_data', $model);
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb($id ? __('Edit User') : __('New User'), $id ? __('Edit User') : __('New User'));
        $resultPage->getConfig()->getTitle()->prepend(__('Grids'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New User'));
        return $resultPage;
    }
}
