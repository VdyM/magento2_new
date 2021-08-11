<?php
namespace Smartmage\Adminmenu\Block;


use Magento\Framework\View\Element\Template\Context;
use Smartmage\Adminmenu\Helper\Data;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;


class ImageConf extends \Magento\Framework\View\Element\Template
{   
    protected $helper;
    protected $collectionFactory;
    
    public function __construct(
        Context $context,
        Data $helper,
        CollectionFactory $collectionFactory
    )
    {        
        $this->helper = $helper;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    
    // const QUANTITY_PRODUCT          = 'smartmage_section/general_1/quantity_product'
    // const PRICE                     = 'smartmage_section/general_1/price'
    // const IMAGE                     = 'smartmage_section/general_1/image'
    // const IMAGE_ALT_TEXT            = 'smartmage_section/general_1/image_alt_text'
    // const IMAGE_TITLE               = 'smartmage_section/general_1/image_title'

    public function getProductData()
    {   
        $quantity_product =     $this->helper->getConfigValue('smartmage_section/general_1/quantity_product');
        $price =                $this->helper->getConfigValue('smartmage_section/general_1/price');
        $image =                $this->helper->getConfigValue('smartmage_section/general_1/image');
        $image_alt_text =       $this->helper->getConfigValue('smartmage_section/general_1/image_alt_text');
        $image_title =          $this->helper->getConfigValue('smartmage_section/general_1/image_title');
        

        return [
            "quantity_product"  => $quantity_product,
            "price"             => $price,
            "image"             => $image,
            "image_alt_text"    => $image_alt_text,
            "image_title"       => $image_title,
        ];
    }  

    public function getMeta()
    { 
        $meta_title = $this->helper->getConfigValue('meta_section/general_2/meta_title');
        $meta_robots = $this->helper->getConfigValue('meta_section/general_2/meta_robots');
        $meta_description = $this->helper->getConfigValue('meta_section/general_2/meta_description');

        return [
            "meta_title" => $meta_title,
            "meta_robots" => $meta_robots,
            "meta_description" => $meta_description,
        ];
    }

    public function getProductCollection()
    {
        $collection = $this->collectionFactory->create();
        $collection->addAttributeToSelect('*');

        $quantity_product =     $this->helper->getConfigValue('smartmage_section/general_1/quantity_product');
        $price =                $this->helper->getConfigValue('smartmage_section/general_1/price');

        foreach ($collection as $product) {
            $productIds[] = $product->getId();
        }

    }
}