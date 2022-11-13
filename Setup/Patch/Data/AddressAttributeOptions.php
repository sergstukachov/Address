<?php

declare(strict_types=1);

/**
 * Patch to create Customer Address Attribute
 */

namespace SV\Address\Setup\Patch\Data;

use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class AddressAttribute
 */
class AddressAttributeOptions implements DataPatchInterface
{
    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * AddressAttribute constructor.
     *
     * @param Config $eavConfig
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        Config          $eavConfig,
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->eavConfig = $eavConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create();

        $eavSetup->addAttribute('customer_address', 'home_business', [
            'type' => 'int',
            'input' => 'select',
            'label' => 'Home or Business',
            'source' => 'SV\Address\Model\Config\Source\AddressOptions',
            'visible' => true,
            'required' => false,
            'user_defined' => true,
            'system' => false,
            'group' => 'General',
            'global' => true,
            'visible_on_front' => true,
        ]);

        $customAttribute = $this->eavConfig->getAttribute('customer_address', 'home_business');

        $customAttribute->setData(
            'used_in_forms',
            ['adminhtml_checkout',
                'adminhtml_customer',
                'adminhtml_customer_address',
                'customer_account_edit',
                'customer_address_edit',
                'customer_register_address',
                'customer_account_create',
                'customer_address']
        );
        $customAttribute->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}
