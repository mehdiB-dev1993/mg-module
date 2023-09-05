<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/4/23
 */

namespace Netweb\User\Controller\Add\Action;
use Magento\Framework\App\Action\Context;

class ShowUser extends \Magento\Framework\App\Action\Action
{
  private $resultPageFactory;
  private $helper;
  public function __construct(
      Context $context,
      \Magento\Framework\View\Result\PageFactory $resultPageFactory,
      \Netweb\User\Helper\Data $data
    )
  {
      parent::__construct($context);
      $this->resultPageFactory = $resultPageFactory;
      $this->helper = $data;
  }

  public  function execute()
  {
      /*$this->helper->ShowUsers();*/
      $resultPage = $this->resultPageFactory->create();
      return $resultPage;
  }
}
