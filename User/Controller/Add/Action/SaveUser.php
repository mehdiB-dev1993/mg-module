<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/4/23
 */

namespace Netweb\User\Controller\Add\Action;


use Magento\Framework\App\Action\Context;

class SaveUser extends \Magento\Framework\App\Action\Action
{
    private $helper;

    public function __construct(
        Context $context,
        \Netweb\User\Helper\Data $data
    )
    {
        parent::__construct($context);
        $this->helper = $data;
    }

    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $status = $this->helper->SaveUser($params);
        if ($status[0]) {
            $this->messageManager->addSuccess('data saved.');
        } else {
            $this->messageManager->addError($status[1]);
        }
        $this->_redirect('*/*/adduser');
    }
}
