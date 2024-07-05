<?php

namespace Omnipay\DPO;

use Omnipay\DPO\Message\CreditCardRequest;
use Omnipay\DPO\Message\CardReferenceRequest;
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

    public function authorize(array $options = [])
    {
        return $this->createRequest(CreditCardRequest::class, $options);
    }

    public function purchase(array $options = [])
    {
        return $this->createRequest(CreditCardRequest::class, $options);
    }

    public function completeAuthorize(array $options = [])
    {
        return $this->createRequest(TransactionReferenceRequest::class, $options);
    }

    public function capture(array $options = [])
    {
        return $this->createRequest(TransactionReferenceRequest::class, $options);
    }

    public function completePurchase(array $options = [])
    {
        return $this->createRequest(TransactionReferenceRequest::class, $options);
    }

    public function refund(array $options = [])
    {
        return $this->createRequest(TransactionReferenceRequest::class, $options);
    }

    public function void(array $options = [])
    {
        return $this->createRequest(TransactionReferenceRequest::class, $options);
    }

    public function createCard(array $options = [])
    {
        return $this->createRequest(CreditCardRequest::class, $options);
    }

    public function updateCard(array $options = [])
    {
        return $this->createRequest(CardReferenceRequest::class, $options);
    }

    public function deleteCard(array $options = [])
    {
        return $this->createRequest(CardReferenceRequest::class, $options);
    }
}