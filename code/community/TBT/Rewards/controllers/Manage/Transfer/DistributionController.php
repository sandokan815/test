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
 * Manage Transfer Distribution Controller
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */

// TODO: All Controllers in Transfer folder can be merged into one
require_once(Mage::getModuleDir('controllers', 'TBT_Rewards') . DS . 'Manage' . DS . 'TransferController.php');
class TBT_Rewards_Manage_Transfer_DistributionController extends TBT_Rewards_Manage_TransferController {
	const EXPORT_FILE_NAME = 'point_distributions';
	
	protected function _initAction() {
		$this->loadLayout ()->_setActiveMenu ( 'rewards/posts' );
		
		return $this;
	}
	
	public function indexAction() {
		$this->_initAction ()->renderLayout ();
	}
	
	/**
	 * Export product grid to CSV format
	 */
	public function exportCsvAction() {
		$fileName = self::EXPORT_FILE_NAME . '-' . date ( "m.d.y.H:i:s" ) . '.csv';
		$content = $this->getLayout ()->createBlock ( 'rewards/manage_transfer_distribution_grid' );
		$csv = $content->getCsv ();
		
		$this->_sendUploadResponse ( $fileName, $csv );
	}
	
	/**
	 * Export product grid to XML format
	 */
	public function exportXmlAction() {
		$fileName = self::EXPORT_FILE_NAME . '-' . date ( "m.d.y.H:i:s" ) . '.xml';
		$content = $this->getLayout ()->createBlock ( 'rewards/manage_transfer_distribution_grid' );
		$xml = $content->getXml ();
		
		$this->_sendUploadResponse ( $fileName, $xml );
	}
}