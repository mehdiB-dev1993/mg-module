<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/5/23
 */

namespace Netweb\User\Controller\Adminhtml\Grid;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;


class Save extends \Magento\Backend\App\Action
{

    private $UserModel;

    public function __construct(
        Context $context,
        \Netweb\User\Model\UserModel $UserModel
    ) {
        parent::__construct($context);
        $this->UserModel = $UserModel;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('RH_Blog::view');
    }

    public function execute()
    {
        $postObj = $this->getRequest()->getPostValue();
        $data = $postObj;
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $model = $this->UserModel;
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            $model->setData($data);
            try {
                $model->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
