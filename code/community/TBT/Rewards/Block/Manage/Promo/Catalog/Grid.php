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
 * Manage Promo Catalog Grid
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */
class TBT_Rewards_Block_Manage_Promo_Catalog_Grid extends Mage_Adminhtml_Block_Widget_Grid {
	
	public function __construct() {
		parent::__construct ();
		$this->setId ( 'promo_catalog_grid' );
		$this->setDefaultSort ( 'name' );
		$this->setDefaultDir ( 'ASC' );
		$this->setSaveParametersInSession ( true );
	}
	
	protected function _prepareCollection() {
		$collection = Mage::getModel ( 'catalogrule/rule' )->getResourceCollection ()->addFieldToFilter ( "points_action", array ('neq' => '' ) );
		$this->setCollection ( $collection );
		return parent::_prepareCollection ();
	}
	
	protected function _prepareColumns() {
		$this->addColumn ( 'rule_id', array ('header' => Mage::helper ( 'catalogrule' )->__ ( 'ID' ), 'align' => 'right', 'width' => '50px', 'index' => 'rule_id' ) );
		
		$this->addColumn ( 'name', array ('header' => Mage::helper ( 'catalogrule' )->__ ( 'Rule Name' ), 'align' => 'left', 'index' => 'name' ) );
		
		$this->addColumn ( 'from_date', array ('header' => Mage::helper ( 'catalogrule' )->__ ( 'Date Start' ), 'align' => 'left', 'width' => '120px', 'type' => 'date', 'index' => 'from_date' ) );
		
		$this->addColumn ( 'to_date', array ('header' => Mage::helper ( 'catalogrule' )->__ ( 'Date Expire' ), 'align' => 'left', 'width' => '120px', 'type' => 'date', 'default' => '--', 'index' => 'to_date' ) );
		
		$this->addColumn ( 'is_active', array ('header' => Mage::helper ( 'catalogrule' )->__ ( 'Status' ), 'align' => 'left', 'width' => '80px', 'index' => 'is_active', 'type' => 'options', 'options' => array (1 => 'Active', 0 => 'Inactive' ) ) );
		
		return parent::_prepareColumns ();
	}
	
	public function getRowUrl($row) {
		return $this->getUrl ( '*/*/edit', array ('id' => $row->getRuleId () ) );
	}

}
