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
 * Product Predict Points
 * options: 
 * - setHideEarning(true); // hides earning line.
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */
class TBT_RewardsOnly_Block_Product_Predictpoints extends TBT_Rewards_Block_Product_Predictpoints
{
    
    protected function _toHtml() {
    
		$rule_selector = $this->getRedemptionSelectionAlgorithm();
		$rule_selector->init($this->_getRS()->getSessionCustomer(), $this->getProduct());
		if($rule_selector->hasRule()) {
    		return '';
		}
    	return parent::_toHtml();
    }
    
    
	/**
	 * Loads the rule selection algorithm model from config.
	 *
	 * @return TBT_Rewards_Model_Catalogrule_Selection_Algorithm_Abstract
	 */
	protected function getRedemptionSelectionAlgorithm() {
		return Mage::helper('rewardsonly/config')->getRedemptionSelectionAlgorithm();
	}
	
}

