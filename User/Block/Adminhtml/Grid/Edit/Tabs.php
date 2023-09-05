<?php
/**
 * Netweb
 * Created by:Mahdi Khani
 * khaniii.mahdi@gmail.com
 * 9/5/23
 */

namespace Netweb\User\Block\Adminhtml\Grid\Edit;


class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('grid_record');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('User Information'));
    }
}
