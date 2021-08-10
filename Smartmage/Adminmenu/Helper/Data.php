<?php

namespace Smartmage\Adminmenu\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * Data constructor
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) 
    {
        parent::__construct($context);   
    }

    public function getConfigValue($field)	
    {
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE
		);
	}

}
    