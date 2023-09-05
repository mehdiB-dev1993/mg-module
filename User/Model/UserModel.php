<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/4/23
 */

namespace Netweb\User\Model;


class UserModel extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
{
    $this->_init('Netweb\User\Model\ResourceModel\UserModel');
}
}
