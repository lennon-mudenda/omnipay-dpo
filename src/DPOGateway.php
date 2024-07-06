<?php

namespace Omnipay\DPO;

use Omnipay\Common\AbstractGateway;
use Omnipay\DPO\Message\CreditCardRequest;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\DPO\Message\TransactionReferenceRequest;

class DPOGateway extends AbstractGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName(): string
    {
        return 'DPO Payments';
    }

    public function getDefaultParameters(): array
    {
        return [];
    }

	/**
	 * @param array $options
	 * @return AbstractRequest|RequestInterface
	 */
    public function purchase(array $options = [])
    {
        return $this->createRequest(CreditCardRequest::class, $options);
    }

	/**
	 * @param array $options
	 * @return AbstractRequest|RequestInterface
	 */
    public function refund(array $options = [])
    {
        return $this->createRequest(TransactionReferenceRequest::class, $options);
    }
}