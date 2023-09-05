<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/4/23
 */

namespace Netweb\User\Helper;


use Magento\Framework\App\Helper\Context;
use Magento\Setup\Exception;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
  private $userModel;

  public function __construct(
      Context $context,\Netweb\User\Model\UserModel $userModel
  )
  {
      parent::__construct($context);
      $this->userModel = $userModel;
  }


  public function SaveUser($params)
  {
      try {
          $this->userModel->setData($params)->save();
          return [true,''];
      }catch (\Exception $exception)
      {
          return [false,$exception->getMessage()];
      }

  }

  public function ShowUsers()
  {
      $collection = $this->userModel->getCollection();
      return $collection;




  }
}
