<?php

namespace Smartmage\Adminmenu\Helper;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
     
    /**
     * Admin configuration paths
     *
     */

    const QUANTITY_PRODUCT          = 'smartmage_section/general_1/quantity_product';
    const PRICE                     = 'smartmage_section/general_1/price';
    const IMAGE                     = 'smartmage_section/general_1/image';
    const IMAGE_ALT_TEXT            = 'smartmage_section/general_1/image_alt_text';
    const IMAGE_TITLE               = 'smartmage_section/general_1/image_title';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
 
    /**
     * Data constructor
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);   
    }

    public function getQuantity()
    {
        $Quantity = $this->scopeConfig->getValue(self::QUANTITY_PRODUCT, 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        return $Quantity;
    }

    public function getPrice()
    {
        $Price = $this->scopeConfig->getValue(self::PRICE, 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
 
        return $Price;
    }

    public function getImage()
    {
        $Image = $this->scopeConfig->getValue(self::IMAGE, 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
 
        return $Image;
    }

    public function getImageAlt()
    {
        $ImageAlt = $this->scopeConfig->getValue(self::IMAGE_ALT_TEXT, 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
 
        return $ImageAlt;
    }
    
    public function getImageTitle()
    {
        $ImageTitle = $this->scopeConfig->getValue(self::IMAGE_TITLE, 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
 
        return $ImageTitle;
    }
}