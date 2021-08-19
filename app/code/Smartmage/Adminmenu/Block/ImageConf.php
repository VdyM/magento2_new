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

        $collection->setPageSize($limit);

        $productCollection = [];
        
        foreach ($collection as $product) {

            $objectManager =\Magento\Framework\App\ObjectManager::getInstance();
            $helperImport = $objectManager->get('\Magento\Catalog\Helper\Image');
            
            $imageUrl = $helperImport->init($product, 'product_page_image_small')
                            ->setImageFile($product->getSmallImage()) // image,small_image,thumbnail
                            ->resize(380)
                            ->getUrl();

            $product_id = $product->getId();

            $RatingOb = $objectManager->create('Magento\Review\Model\Rating')->getEntitySummary($product_id);   
            $ratings = $RatingOb->getSum()/$RatingOb->getCount(); 

            $productUrl = $product->getProductUrl();
            $productName = $product->getName();
            $productPrice = number_format((float) $product->getPrice(), 2, '.', '') ;

            $productCollection[] = [
                "productRating" => $ratings,
                "productImageUrl" => $imageUrl,
                "productUrl" => $productUrl,
                "productName" => $productName,
                "productPrice" => $productPrice,
            ];

            // for display your colection use phtml file

            // echo "<img title='".$product->getName()."' src=\"".$imageUrl."\"/>";
            // echo "<p> Product ID: " . $product_id . "</p>";
            // echo "<p> Product Name: " . $product->getName() . "</p>";
            // echo "<p> Product Price: " . number_format((float) $product->getPrice(), 2, '.', '') . "</p>";
            // echo "<p> Product Description: " . $product->getDescription() . "</p>";
            // echo "<p> Product Rating(%): " . $ratings. "</p>";
            // echo '<a href='.$product->getProductUrl()." target='_blank'>Product</a><br/>";
            
        }


        // return array->{"product Rating, product imageUrl,product Url, product Name, Product Price"}
        return $productCollection;

    }
}