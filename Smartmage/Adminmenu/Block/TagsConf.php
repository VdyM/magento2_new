<?php

namespace Smartmage\Adminmenu\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\View\Page\Config;
use \Smartmage\Smartmage\Helper\Data;

class TagsConf extends \Magento\Framework\View\Element\Template
{
    protected $helper;
    protected $pgConfig;

    public function __construct(
        Context $context,
        Data $helper,
        Config $pgConfig
    )
    {        
        $this->helper = $helper;
        $this->pgConfig = $pgConfig;
        $this->setTags();
        parent::__construct($context);
    }

    public function setTags()
    {   
        $title = $this->helper->getConfigValue('meta_section/general_2/meta_title');
        $description = $this->helper->getConfigValue('meta_section/general_2/meta_description');
        $robots = $this->helper->getConfigValue('meta_section/general_2/meta_robots');


        $this->pgConfig->getTitle()->set($title); //setting the page
        $this->pgConfig->setDescription($description); // set meta description
		$this->pgConfig->setRobots($robots);
    }
}