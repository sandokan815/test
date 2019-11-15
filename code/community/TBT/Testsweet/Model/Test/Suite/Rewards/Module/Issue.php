<?php

class TBT_Testsweet_Model_Test_Suite_Rewards_Module_Issue extends TBT_Testsweet_Model_Test_Suite_Abstract
{
    public function getRequireTestsweetVersion()
    {
        return '1.0.0.0';
    }

    public function getSubject()
    {
        return $this->__('Check for modules that should be disabled.');
    }

    public function getDescription()
    {
        return $this->__('Check for modules that have known issues with MageRewards.  This is not a complete test!');
    }

    protected function generateSummary()
    {
        $known_module = array(
            'Mage_Reward' => $this->__('http://support.magerewards.com/article/1594-how-to-disable-the-default-magento-enterprise-rewards-module'),
        );

        $modules = (array) Mage::getConfig()->getNode('modules')->children();
        foreach ($modules as $key => $modele) {
            foreach($known_module as $kmodele_key => $kmodele_help ) {
                if ($kmodele_key == $modele) {
                    $this->addNotice($this->__('Module: %s - is active and is known to cause issues.', $key), $kmodele_help);
                }
            }
        }
    }
}

