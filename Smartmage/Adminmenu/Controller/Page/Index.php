<?php

namespace Smartmage\Adminmenu\Controller\Page;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory
        )
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        $result = $this->_pageFactory->create();
<<<<<<< HEAD
        
=======
>>>>>>> 89c9147f7c369696c774a9dbb9a23a4d8e06c8d9
        return $result;
	}
}