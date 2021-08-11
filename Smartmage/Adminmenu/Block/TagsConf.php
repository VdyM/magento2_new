<?php

<<<<<<< HEAD
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
=======
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

>>>>>>> 89c9147f7c369696c774a9dbb9a23a4d8e06c8d9
}