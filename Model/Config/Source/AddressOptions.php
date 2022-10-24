<?php
declare(strict_types=1);

namespace SV\Address\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class AddressOptions extends AbstractSource
{
    /**
     * Attribute value
     */
protected const VALUE_HOME = 1;
    /**
     * Attribute value
     */
protected const VALUE_BUSINESS = 2;
    /**
     * Attribute value
     */
protected const VALUE_PLEASE_SELECT = 0;

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('Please Select'), 'value' => self::VALUE_PLEASE_SELECT],
                ['label' => __('Home'), 'value' => self::VALUE_HOME],
                ['label' => __('Business'), 'value' => self::VALUE_BUSINESS],
            ];
        }
        return $this->_options;
    }

    /**
     * Get Attribute Data Array
     *
     * @return int[]
     */
    public function getAttributeArray() : array
    {
        $data = [
            'Please Select' => self::VALUE_PLEASE_SELECT,
            'Home' => self::VALUE_HOME,
            'Business' => self::VALUE_BUSINESS
        ];
        return $data;
    }

    /**
     * Get Attribute Type
     *
     * @return array[]
     */
    public function getArrayType() : array
    {
        $data = [
            'home_business' => [
                self::VALUE_PLEASE_SELECT => 'Please Select',
                self::VALUE_HOME => 'Home',
                self::VALUE_BUSINESS => 'Business'
            ]
        ];
        return $data;
    }

}
