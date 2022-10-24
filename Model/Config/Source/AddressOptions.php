<?php

namespace SV\Address\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class AddressOptions extends AbstractSource
{
    const VALUE_HOME = 1;

    const VALUE_BUSINESS = 2;

    const VALUE_SELECT = 3;

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('Please Select'), 'value' => self::VALUE_SELECT],
                ['label' => __('Home'), 'value' => self::VALUE_HOME],
                ['label' => __('Business'), 'value' => self::VALUE_BUSINESS],
            ];
        }
        return $this->_options;
    }

    public function getAttributeArray() : array
    {
        $data = [
            'Please Select' => self::VALUE_SELECT,
            'Home' => self::VALUE_HOME,
            'Business' => self::VALUE_BUSINESS
        ];
        return $data;
    }

    public function getArrayType()
    {
        $data = [
            'home_business' => [
                self::VALUE_SELECT => 'Please Select',
                self::VALUE_HOME => 'Home',
                self::VALUE_BUSINESS => 'Business'
            ]
        ];
        return $data;
    }

}
