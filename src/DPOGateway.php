<?php

namespace Omnipay\DPO;

use Omnipay\Common\AbstractGateway;
use Omnipay\DPO\Message\BaseRequest;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\DPO\Message\VerifyTransactionRequest;
use Omnipay\DPO\Message\InitiateTransactionRequest;

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
	 * @return AbstractRequest|BaseRequest
	 */
    public function purchase(array $options = []): BaseRequest
	{
        return $this->createRequest(InitiateTransactionRequest::class, $options);
    }

	/**
	 * @param array $options
	 * @return AbstractRequest|BaseRequest
	 */
	public function completePurchase(array $options = []): BaseRequest
	{
		return $this->createRequest(VerifyTransactionRequest::class, $options);
	}

	/**
	 * @param array $options
	 * @return AbstractRequest|BaseRequest
	 */
    public function refund(array $options = []): BaseRequest
	{
        return $this->createRequest(VerifyTransactionRequest::class, $options);
    }
}