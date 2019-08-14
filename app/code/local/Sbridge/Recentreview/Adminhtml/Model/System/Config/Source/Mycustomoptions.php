<?php
/**
* Setubridge Technolabs
* http://www.setubridge.com/
* @author SetuBridge
* @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
**/
?>
<?php

class Sbridge_Recentreview_Adminhtml_Model_System_Config_Source_Mycustomoptions
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => "left", 'label'=>Mage::helper('adminhtml')->__('Left')),
            array('value' => "right", 'label'=>Mage::helper('adminhtml')->__('Right')),
        );
    }
}