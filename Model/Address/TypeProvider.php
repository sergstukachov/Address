<?php

namespace SV\Address\Model\Address;

use Magento\Checkout\Model\ConfigProviderInterface;
use SV\Address\Model\Config\Source\AddressOptions;
class TypeProvider implements ConfigProviderInterface
{
    protected AddressOptions $type;

    public function __construct(
        AddressOptions $type
    )
    {
        $this->type = $type;
    }

    public function getConfig()
    {
        $arrayTypeAddress = $this->type;
        return $arrayTypeAddress->getArrayType();
    }
}
