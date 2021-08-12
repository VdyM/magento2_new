<?php

namespace Smartmage\Adminmenu\Controller\Page;


class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $helper;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Smartmage\Adminmenu\Helper\Data $helper
        )
	{

		$this->_pageFactory = $pageFactory;
		$this->helper = $helper;
		return parent::__construct($context);
	}

	public function execute()
	{
        $result = $this->_pageFactory->create();
		
		$meta_title = $this->helper->getConfigValue('meta_section/general_2/meta_title');
        $meta_robots = $this->helper->getConfigValue('meta_section/general_2/meta_robots');
        $meta_description = $this->helper->getConfigValue('meta_section/general_2/meta_description');
		
		$result->getConfig()->getTitle()->set(__($meta_title));
        $result->getConfig()->setRobots(__($meta_robots));
        $result->getConfig()->setDescription(__($meta_description));

        return $result;
	}
}