<?php
namespace Smartmage\Adminmenu\Block;


use Magento\Framework\View\Element\Template\Context;
use Smartmage\Adminmenu\Helper\Data;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;


class ImageConf extends \Magento\Framework\View\Element\Template
{   
    protected $helper;
    protected $collectionFactory;
    
    public function __construct(
        Context $context,
        Data $helper,
        CollectionFactory $collectionFactory,
        array $data = []
    )
    {        
        $this->helper = $helper;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }
    
    // const QUANTITY_PRODUCT          = 'smartmage_section/general_1/quantity_product'
    // const PRICE                     = 'smartmage_section/general_1/price'
    // const IMAGE                     = 'smartmage_section/general_1/image'
    // const IMAGE_ALT_TEXT            = 'smartmage_section/general_1/image_alt_text'
    // const IMAGE_TITLE               = 'smartmage_section/general_1/image_title'

    public function getProductData()
    {   
        $quantity_product =     $this->helper->getConfigValue('smartmage_section/general_1/quantity_product');
        $price =                $this->helper->getConfigValue('smartmage_section/general_1/price');
        $image =                $this->helper->getConfigValue('smartmage_section/general_1/image');
        $image_alt_text =       $this->helper->getConfigValue('smartmage_section/general_1/image_alt_text');
        $image_title =          $this->helper->getConfigValue('smartmage_section/general_1/image_title');
        

        return [
            "quantity_product"  => $quantity_product,
            "price"             => $price,
            "image"             => $image,
            "image_alt_text"    => $image_alt_text,
            "image_title"       => $image_title,
        ];
    }  

    public function getMeta()
    { 
        $meta_title = $this->helper->getConfigValue('meta_section/general_2/meta_title');
        $meta_robots = $this->helper->getConfigValue('meta_section/general_2/meta_robots');
        $meta_description = $this->helper->getConfigValue('meta_section/general_2/meta_description');

        return [
            "meta_title" => $meta_title,
            "meta_robots" => $meta_robots,
            "meta_description" => $meta_description,
        ];
    }

    public function getProductCollection()
    {
        $collection = $this->collectionFactory->create();

        $quantity_product =     $this->helper->getConfigValue('smartmage_section/general_1/quantity_product');
        $limit =                $this->helper->getConfigValue('smartmage_section/general_1/quantity_limit');
        $price =                $this->helper->getConfigValue('smartmage_section/general_1/price');

        // echo "quantity_product". $quantity_product. "limit". $limit."price". $price;

        $collection->addAttributeToSelect('*');
        $collection->joinField(
            'qty', 'cataloginventory_stock_item', 'qty', 'product_id=entity_id', '{{table}}.stock_id=1', 'left'
            );
        $collection->addAttributeToFilter('price', ['lt' => $price]);
        $collection->addAttributeToFilter('status', ['eq' => 1]);
        $collection->addAttributeToFilter('visibility', ['in'=> [2,3,4] ] );
        $collection->addAttributeToFilter('qty', ['gt'=> $quantity_product] );

        $collection->setPageSize($limit );


        
        foreach ($collection as $product) {
            // print_r($product->getData());
            // echo "<img title=\"".$imageData["image_title"]."\" src=\"".$imgurl."\" alt=\"".$imageData["image_alt_text"]."\"/>";
            
            // echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'catalog/product' . $product->getImage();

            $objectManager =\Magento\Framework\App\ObjectManager::getInstance();
            $helperImport = $objectManager->get('\Magento\Catalog\Helper\Image');
            
            $imageUrl = $helperImport->init($product, 'product_page_image_small')
                            ->setImageFile($product->getSmallImage()) // image,small_image,thumbnail
                            ->resize(380)
                            ->getUrl();
            // echo $imageUrl;

            echo "<img title=".$product->getData('name')." src=\"".$imageUrl."\"/>";
            echo "<p> Product Name: " . $product->getData('name') . "</p>";
            echo "<p> Product Price: " . number_format((float) $product->getPrice(), 2, '.', '') . "</p>";
            echo "<p> Product Description: " . $product->getDescription() . "</p>";
            echo '<a href='.$product->getProductUrl()." target='_blank'>Product</a>";
            
        }

        return $collection;

    }
}