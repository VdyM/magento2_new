<?php
namespace Smartmage\Adminmenu\Block;


use Magento\Framework\View\Element\Template\Context;
use Smartmage\Adminmenu\Helper\Data;


class ImageConf extends \Magento\Framework\View\Element\Template
{           
    public function __construct(
        Context $context,
        Data $helper
    )
    {        
        $this->helper = $helper;
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

    public function sayHello()
	{
		return __('Hello World');
	}

   
}