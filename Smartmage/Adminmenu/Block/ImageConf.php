<?php
namespace Smartmage\Adminmenu\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Smartmage\Adminmenu\Helper\Data;

use Magento\Framework\App\Config\ScopeConfigInterface;

class ImageConf extends \Magento\Framework\View\Element\Template
{           
    protected array $new_data = [];
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        Data $helper,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,       
        array $data = []
    )
    {        
        $this->helper = $helper;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }
    

    public function getData()
    {   
        
        $val1 = $this->helper->GetQuantity();
        $this->new_data[] = $val1;
        $val2 = $this->helper->GetPrice();
        $this->new_data[] = $val2;
        $val3 = $this->helper->GetImage();
        $this->new_data[] = $val3;
        $val4 = $this->helper->GetImageAlt();
        $this->new_data[] = $val4;
        $val5 = $this->helper->GetImageTitle();
        $this->new_data[] = $val5;

        return $this->new_data;
    }   
 
} 