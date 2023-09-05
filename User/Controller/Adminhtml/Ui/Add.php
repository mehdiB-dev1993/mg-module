<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/5/23
 */

namespace Netweb\User\Controller\Adminhtml\Ui;

use Magento\Framework\Controller\ResultFactory;

class Add extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Record'));
        return $resultPage;
    }
}
