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
            ['value' => 'index, follow', 'label' => __('INDEX, FOLLOW')],
            ['value' => 'index, nofollow', 'label' => __('INDEX, NOFOLLOW')],
            ['value' => 'noindex, follow', 'label' => __('NOINDEX, FOLLOW')],
            ['value' => 'noindex, nofollow', 'label' => __('NOINDEX, NOFOLLOW')]
        ];
    }
}
