<?php
/**
* Setubridge Technolabs
* http://www.setubridge.com/
* @author SetuBridge
* @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
**/
?>
<?php

class Sbridge_Recentreview_Model_Recentreview extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('recentreview/recentreview');
    }
    public function getRecentreviews()
    {                          
        $eavAttribute = new Mage_Eav_Model_Mysql4_Entity_Attribute();
        $pStatus = $eavAttribute->getIdByCode('catalog_product', 'status');
        $pName = $eavAttribute->getIdByCode('catalog_product', 'name');
        $pImage = $eavAttribute->getIdByCode('catalog_product', 'image');
        $pUrlPath = $eavAttribute->getIdByCode('catalog_product', 'url_path');
        $storeId = 0;

        $recentReviewGroup = Mage::getStoreConfig('review_section/recentreview_group');
        $limitReview = round($recentReviewGroup['homepage_reviewcount']);

        $reviews_all = Mage::getModel('review/review')->getResourceCollection()->setDateOrder()->addStatusFilter(1)->setPagesize($limitReview)->addRateVotes();
        $reviews_all->getSelect()
        ->join(array('cpei'=>Mage::getConfig()->getTablePrefix().'catalog_product_entity_int'),'cpei.entity_id=main_table.entity_pk_value and cpei.store_id='.$storeId.' and cpei.attribute_id='.$pStatus.' and cpei.value=1')
        ->join(array('cpev'=>Mage::getConfig()->getTablePrefix().'catalog_product_entity_varchar'),'cpev.entity_id=main_table.entity_pk_value and cpev.attribute_id='.$pUrlPath.' and cpev.store_id='.$storeId.'')
        ->join(array('cpev1'=>Mage::getConfig()->getTablePrefix().'catalog_product_entity_varchar'),'cpev1.entity_id=main_table.entity_pk_value and cpev1.attribute_id='.$pImage.' and cpev1.store_id='.$storeId.'',array('imageValue'=>'value'))
        ->join(array('cpev2'=>Mage::getConfig()->getTablePrefix().'catalog_product_entity_varchar'),'cpev2.entity_id=main_table.entity_pk_value and cpev2.attribute_id='.$pName.' and cpev2.store_id='.$storeId.'',array('productName'=>'value'));        
        $reviews_all=$reviews_all->getData();
        return $reviews_all;
    }
}