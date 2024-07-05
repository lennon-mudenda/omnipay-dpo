<?php

namespace Omnipay\DPO\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;

class CardReferenceRequest extends AbstractRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('cardReference');
        return array('cardReference' => $this->getCardReference());
    }

    public function sendData($data): Response
    {
        $data['reference'] = $this->getCardReference();
        $data['success'] = 0 === substr($this->getCardReference(), -1, 1) % 2;
        $data['message'] = $data['success'] ? 'Success' : 'Failure';

        return $this->response = new Response($this, $data);
    }
}