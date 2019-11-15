<?php

/**
 * Sweet Tooth
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Sweet Tooth SWEET TOOTH POINTS AND REWARDS 
 * License, which extends the Open Software License (OSL 3.0).

 * The Open Software License is available at this URL: 
 * http://opensource.org/licenses/osl-3.0.php
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
 * Manage Transfer
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */
class TBT_Rewards_Block_Manage_Transfer extends TBT_Rewards_Block_Manage_Widget_Grid_Container {
	
	public function __construct() {
		$this->_controller = 'manage_transfer';
		$this->_blockGroup = 'rewards';
		$this->_headerText = Mage::helper ( 'rewards' )->__ ( 'All Points Transfers' );
		parent::__construct ();
	}
	
	protected function _prepareLayout() {
		$this->setChild ( 'add_new_button', $this->getLayout ()->createBlock ( 'adminhtml/widget_button' )->setData ( array ('label' => Mage::helper ( 'rewards' )->__ ( 'Create New Transfer' ), 'onclick' => "setLocation('" . $this->getUrl ( '*/*/new' ) . "')", 'class' => 'add' ) ) );
		/**
		 * Display store switcher if system has more one store
		 */
		if (! Mage::app ()->isSingleStoreMode ()) {
			$this->setChild ( 'store_switcher', $this->getLayout ()->createBlock ( 'adminhtml/store_switcher' )->setUseConfirm ( false )->setSwitchUrl ( $this->getUrl ( '*/*/*', array ('store' => null ) ) ) );
		}
		$this->setChild ( 'grid', $this->getLayout ()->createBlock ( 'rewards/manage_transfer_grid', 'transfer.grid' ) );
		return parent::_prepareLayout ();
	}
	
	public function getAddNewButtonHtml() {
		return $this->getChildHtml ( 'add_new_button' );
	}
	
	public function getGridHtml() {
		return $this->getChildHtml ( 'grid' );
	}
	
	public function getStoreSwitcherHtml() {
		return $this->getChildHtml ( 'store_switcher' );
	}

}