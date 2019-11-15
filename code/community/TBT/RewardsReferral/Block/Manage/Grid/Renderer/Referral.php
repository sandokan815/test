<?php

/**
 * Sweet Tooth
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Sweet Tooth SWEET TOOTH POINTS AND REWARDS
 * License, which extends the Open Software License (OSL 3.0).
 * The Sweet Tooth License is available at this URL:
 *      https://www.sweettoothrewards.com/terms-of-service
 * The Open Software License is available at this URL:
 *      http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * By adding to, editing, or in any way modifying this code, Sweet Tooth is
 * not held liable for any inconsistencies or abnormalities in the
 * behaviour of this code.
 * By adding to, editing, or in any way modifying this code, the Licensee
 * terminates any agreement of support offered by Sweet Tooth, outlined in the
 * provided Sweet Tooth License.
 * Upon discovery of modified code in the process of support, the Licensee
 * is still held accountable for any and all billable time Sweet Tooth spent
 * during the support process.
 * Sweet Tooth does not guarantee compatibility with any other framework extension.
 * Sweet Tooth is not responsbile for any inconsistencies or abnormalities in the
 * behaviour of this code if caused by other framework extension.
 * If you did not receive a copy of the license, please send an email to
 * support@sweettoothrewards.com or call 1.855.699.9322, so we can send you a copy
 * immediately.
 *
 * @category   [TBT]
 * @package    [TBT_Rewards]
 * @copyright  Copyright (c) 2014 Sweet Tooth Inc. (http://www.sweettoothrewards.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * A points total renderer for grid row cells.  The grid row must contain customer id.
 * !!! Please set filter => false and sortable => false for the grid column showing this. !!!
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */
class TBT_RewardsReferral_Block_Manage_Grid_Renderer_Referral extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    protected $_customers = array();

    public function render(Varien_Object $row) {
        $str = '';
        if ($cid = $row->getReferralChildId()) {
            if ($customer = $this->_getCustomer($cid)) {
                $str = $customer->getName();
                $url = $this->getUrl("adminhtml/customer/edit/", array('id' => $cid));
                $str = "<a href='{$url}' target='{$str}'>{$str}</a>";
            }
        } else {
            $str = $row->getReferralName();
        }
        return $str;
    }

    /**
     * Render column for export
     *
     * @param Varien_Object $row
     * @return string
     */
    public function renderExport(Varien_Object $row)
    {
        $str = $row->getReferralName();
        return $str;
    }

    protected function _getCustomer($cid) {
        if (isset($this->_customers[$cid])) {
            return $this->_customers[$cid];
        }
        $customer = Mage::getModel('rewards/customer')->load($cid);
        if ($customer->getId()) {
            $this->_customers[$cid] = $customer;
            return $this->_customers[$cid];
        }
        return false;
    }

}