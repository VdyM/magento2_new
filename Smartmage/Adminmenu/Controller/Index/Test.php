<?php
namespace Smartmage\Adminmenu\Controller\Index;

// use Smartmage\Adminmenu\Helper\Data;

class Test extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $helper;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        // Smartmage\Adminmenu\Helper\Data $helper,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
        // $this->helper = $helper;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        echo 'Hello world';
     
        // $quantity = $this->helper->GetQuantity();
        exit;
        $price = $helper->GetQuantity();
        $image = $helper->GetImage();
        $image_alt = $helper->GetImageAlt();
        $image_title = $helper->GetQuantity();
        echo $quantity, '<br>' ;
        echo $price, '<br>' ;
        echo $image, '<br>' ;
        echo $image_alt, '<br>' ;
        echo $image_title, '<br>' ;
        exit();
	}
}