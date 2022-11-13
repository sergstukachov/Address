<?php

namespace SV\Address\Observer\Sales;

use Magento\Framework\Event\Observer;

class ModelServiceQuoteSubmitBefore implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        try {
            if ($quote->getBillingAddress()) {
                $order->getBillingAddress()->setHomeBusiness($quote->getBillingAddress()->getHomeBusiness());
            }

            if (!$quote->isVirtual()) {
                $order->getShippingAddress()->setHomeBusiness($quote->getShippingAddress()->getHomeBusiness());
            }
        } catch (\Exception $e) {
            // add logger
        }
        return $this;
    }
}
