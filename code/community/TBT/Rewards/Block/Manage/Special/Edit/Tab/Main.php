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
 * Manage Special Edit Tab Main
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */
class TBT_Rewards_Block_Manage_Special_Edit_Tab_Main extends TBT_Rewards_Block_Admin_Widget_Form_Abstract {
	
	protected function _prepareForm() {
		$model = Mage::registry ( 'global_manage_special_rule' );
		
		$form = new Varien_Data_Form ();
		
		$form->setHtmlIdPrefix ( 'rule_' );
		
		$fieldset = $form->addFieldset ( 'base_fieldset', array ('legend' => Mage::helper ( 'salesrule' )->__ ( 'General Information' ) ) );
		
		if ($model->getId ()) {
			$fieldset->addField ( 'rewards_special_id', 'hidden', array ('name' => 'rewards_special_id' ) );
		}
		
		$fieldset->addField ( 'product_ids', 'hidden', array ('name' => 'product_ids' ) );
		
		$fieldset->addField ( 'name', 'text', array ('name' => 'name', 'label' => Mage::helper ( 'salesrule' )->__ ( 'Rule Name' ), 'title' => Mage::helper ( 'salesrule' )->__ ( 'Rule Name' ), 'required' => true ) );
		
		$fieldset->addField ( 'description', 'textarea', array ('name' => 'description', 'label' => Mage::helper ( 'salesrule' )->__ ( 'Description' ), 'title' => Mage::helper ( 'salesrule' )->__ ( 'Description' ), 'style' => 'height: 100px;' ) );
		
		$fieldset->addField ( 'is_active', 'select', array ('label' => Mage::helper ( 'salesrule' )->__ ( 'Status' ), 'title' => Mage::helper ( 'salesrule' )->__ ( 'Status' ), 'name' => 'is_active', 'required' => true, 'options' => array ('1' => Mage::helper ( 'salesrule' )->__ ( 'Active' ), '0' => Mage::helper ( 'salesrule' )->__ ( 'Inactive' ) ) ) );
		
		if (! Mage::app ()->isSingleStoreMode ()) {
			$fieldset->addField ( 'website_ids', 'multiselect', array ('name' => 'website_ids[]', 'label' => Mage::helper ( 'catalogrule' )->__ ( 'Websites' ), 'title' => Mage::helper ( 'catalogrule' )->__ ( 'Websites' ), 'required' => true, 'values' => Mage::getSingleton ( 'adminhtml/system_config_source_website' )->toOptionArray () ) );
		} else {
			$fieldset->addField ( 'website_ids', 'hidden', array ('name' => 'website_ids[]', 'value' => Mage::app ()->getStore ( true )->getWebsiteId () ) );
			$model->setWebsiteIds ( Mage::app ()->getStore ( true )->getWebsiteId () );
		}
		
		$element = $fieldset->addField ( 'sort_order', 'text', array ('name' => 'sort_order', 'label' => Mage::helper ( 'salesrule' )->__ ( 'Priority' ) ) );
		Mage::getSingleton('rewards/wikihints')->addWikiHint($element, "article/408-rule-priority", "Rule Priority", null, $this->__("Get help with rule priorities."));
		
		$fieldset->addField ( 'is_rss', 'select', array ('label' => Mage::helper ( 'salesrule' )->__ ( 'Public In RSS Feed' ), 'title' => Mage::helper ( 'salesrule' )->__ ( 'Public In RSS Feed' ), 'name' => 'is_rss', 'options' => array ('1' => Mage::helper ( 'salesrule' )->__ ( 'Yes' ), '0' => Mage::helper ( 'salesrule' )->__ ( 'No' ) ) ) );
		
		if (! $model->getId ()) {
			//set the default value for is_rss feed to yes for new promotion
			$model->setIsRss ( 1 );
		}
		
		$form->setValues ( $model->getData () );
		
		$this->setForm ( $form );
		
		return parent::_prepareForm ();
	}

}