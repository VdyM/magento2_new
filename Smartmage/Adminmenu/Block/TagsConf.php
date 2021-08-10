<?php

namespace Smartmage\Smartmage\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\View\Page\Config;
use \Smartmage\Adminmenu\Helper\Data;

class MetaTags extends \Magento\Framework\View\Element\Template
{

    protected $helper;


    public function __construct(
        Context $context,
        Config $pageConfig,
        Data $helper
    )
    {
        $this->helper = $helper;
        $this->pageConfig = $pageConfig;
        $this->setTags();
        parent::__construct($context);
    }
    
    public function setTags()
    {
        $meta_title = $this->helper->getConfigValue('meta_section/general_2/meta_title');
        $meta_robots = $this->helper->getConfigValue('meta_section/general_2/meta_robots');
        $meta_description = $this->helper->getConfigValue('meta_section/general_2/meta_description');

        $this->pageConfig->getTitle()->set(__($meta_title));
        $this->pageConfig->setRobots(__($meta_robots));
        $this->pageConfig->setDescription(__($meta_description));
    }

}