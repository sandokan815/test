<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shaneray
 * Date: 8/18/14
 * Time: 8:24 AM
 * To change this template use File | Settings | File Templates.
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();


$sql =
    "ALTER TABLE `{$installer->getTable('collinsharper_chcustomeruploads/customer_entity_chuploads')}`  add column file_md5 varchar(255) ";

$installer->run($sql);

$sql =
    "ALTER TABLE `{$installer->getTable('collinsharper_chcustomeruploads/customer_entity_chuploads')}`  add index(file_md5) ";

$installer->run($sql);

$installer->endSetup();