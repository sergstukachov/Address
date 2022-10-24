<?php
declare(strict_types=1);

namespace SV\Address\Block\Address;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Customer\Helper\Address;
use SV\Address\Model\Config\Source\AddressOptions;
use Magento\Framework\View\Element\Template\Context ;
use Magento\Directory\Helper\Data ;
use Magento\Framework\Json\EncoderInterface ;
use Magento\Framework\App\Cache\Type\Config ;
use Magento\Directory\Model\ResourceModel\Region\CollectionFactory as RegionCollectionFactory;
use Magento\Directory\Model\ResourceModel\Country\CollectionFactory ;
use Magento\Customer\Model\Session ;
use Magento\Customer\Api\AddressRepositoryInterface ;
use Magento\Customer\Api\Data\AddressInterfaceFactory;
use Magento\Customer\Helper\Session\CurrentCustomer ;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Customer\Block\Address\Edit as BlockEdit;

class Edit extends BlockEdit
{
    protected AddressOptions $addressOption;
    public function __construct(

       Context $context,
       Data $directoryHelper,
       EncoderInterface $jsonEncoder,
       Config $configCacheType,
       RegionCollectionFactory $regionCollectionFactory,
       CollectionFactory $countryCollectionFactory,
       Session $customerSession,
       AddressRepositoryInterface $addressRepository,
       AddressInterfaceFactory $addressDataFactory,
       CurrentCustomer $currentCustomer,
       DataObjectHelper $dataObjectHelper,
       AddressMetadataInterface $addressMetadata = null,
       Address $addressHelper = null,
       AddressOptions $addressOption,
       array $data = []
    )
    {

        parent::__construct(
            $context,
            $directoryHelper,
            $jsonEncoder,
            $configCacheType,
            $regionCollectionFactory,
            $countryCollectionFactory,
            $customerSession,
            $addressRepository,
            $addressDataFactory,
            $currentCustomer,
            $dataObjectHelper,
            $data,
            $addressMetadata,
            $addressHelper);
        $this->addressOption = $addressOption;
    }

    /**
     * Get Custom Address Attribute Data Array
     *
     * @return array
     */
    public function getAddressType(): array
    {
        return $this->addressOption->getAttributeArray();
    }

    /**
     * Get address attribute value
     *
     * @return false|mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getType()
    {
        $addressId = $this->getRequest()->getParam('id');
        if ($addressId){
            $this->_address = $this->_addressRepository->getById($addressId);
            return  $this->_address->getCustomAttribute('home_business')->getValue();
        }
        return false;
    }
}
