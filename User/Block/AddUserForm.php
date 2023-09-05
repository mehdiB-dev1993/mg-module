<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/4/23
 */

namespace Netweb\User\Block;


use Magento\Framework\View\Element\Template;

class AddUserForm extends \Magento\Framework\View\Element\Template
{
    private $helper;
    public function __construct(
                                Template\Context $context,
                                \Netweb\User\Helper\Data $helper,
                                array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->helper = $helper;
    }

    public function getUsers()
    {

        return $this->helper->ShowUsers();
    }
}
