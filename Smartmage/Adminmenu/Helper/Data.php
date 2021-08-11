<?php

namespace Smartmage\Adminmenu\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $scopeConfig;
    /**
     * Data constructor
     * @param \Magento\Framework\App\Helper\Context $context
     */

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
       $this->scopeConfig = $scopeConfig;
    }

    public function getConfigValue($field)	
    {
		return $this->scopeConfig->getValue(
			$field, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
}