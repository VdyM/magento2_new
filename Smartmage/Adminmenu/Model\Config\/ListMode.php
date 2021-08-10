<?php

namespace Smartmage\Adminmenu\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Profile
 * @package Vendor\Package\Model\Config
 */
class ListMode implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray() : array
    {
        return [
            ['value' => '', 'label' => __('-- Select an Option --')],
            ['value' => 'INDEX, FOLLOW', 'label' => __('INDEX, FOLLOW')],
            ['value' => 'INDEX, NOFOLLOW', 'label' => __('INDEX, NOFOLLOW')],
            ['value' => 'NOINDEX, FOLLOW', 'label' => __('NOINDEX, FOLLOW')],
            ['value' => 'NOINDEX, NOFOLLOW', 'label' => __('NOINDEX, NOFOLLOW')]
        ];
    }
}
