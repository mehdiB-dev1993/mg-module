<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/3/23
 */

namespace Netweb\User\Controller\Add\Action;


use Magento\Framework\App\Action\Context;

class AddUser extends \Magento\Framework\App\Action\Action
{

    private $resultPageFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }


    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

}
