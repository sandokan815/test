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
 * Observer Sales Catalog Transfers
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */
class TBT_Rewards_Model_Observer_Sales_Catalogtransfers {
	
	private $catalog_redem_rule_ids = null;
	private $all_earned_points = null;
	private $all_redeemed_points = null;
	private $increment_id_to_apply_points = null;
	
	public function __construct() {
	
	}
	
	public function addEarnedPoints($item_point_totals) {
		if (! $this->all_earned_points) {
			$this->all_earned_points = array ();
		}
		
		$this->all_earned_points [] = $item_point_totals;
		
		return $this;
	}
	
	public function getAllEarnedPoints() {
		if (! $this->all_earned_points) {
			return array ();
		}
		
		return $this->all_earned_points;
	}
	
	public function clearEarnedPoints() {
		$this->all_earned_points = null;
		return $this;
	}
	
	public function addRedeemedPoints($item_point_totals) {
		if (! $this->all_redeemed_points) {
			$this->all_redeemed_points = array ();
		}
		
		$this->all_redeemed_points [] = $item_point_totals;
		
		return $this;
	}
	
	public function getAllRedeemedPoints() {
		if (! $this->all_redeemed_points) {
			return array ();
		}
		
		return $this->all_redeemed_points;
	}
	
	public function clearRedeemedPoints() {
		$this->all_redeemed_points = null;
		return $this;
	}
	
	public function setIncrementId($increment_id) {
		$this->increment_id_to_apply_points = $increment_id;
		return $this;
	}
	
	public function getIncrementId() {
		return $this->increment_id_to_apply_points;
	}
	
	public function clearIncrementId() {
		$this->increment_id_to_apply_points = null;
		return $this;
	}

}