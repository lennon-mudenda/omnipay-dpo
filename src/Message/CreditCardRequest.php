<?php

namespace Omnipay\DPO\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Exception\InvalidCreditCardException;

class CreditCardRequest extends AbstractRequest
{
    /**
     * @throws InvalidRequestException
     * @throws InvalidCreditCardException
     */
    public function getData(): array
    {
        $this->validate('amount', 'card');

        $this->getCard()->validate();

        return array('amount' => $this->getAmount());
    }

    public function sendData($data): Response
    {
        $data['reference'] = uniqid();
        $data['success'] = 0 === substr($this->getCard()->getNumber(), -1, 1) % 2;
        $data['message'] = $data['success'] ? 'Success' : 'Failure';

        return $this->response = new Response($this, $data);
    }
}