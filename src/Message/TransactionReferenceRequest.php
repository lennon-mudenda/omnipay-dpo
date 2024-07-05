<?php

namespace Omnipay\DPO\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Exception\InvalidRequestException;

class TransactionReferenceRequest extends AbstractRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('transactionReference');
        return array('transactionReference' => $this->getTransactionReference());
    }

    public function sendData($data): Response
    {
        $data['reference'] = $this->getTransactionReference();
        $data['success'] = !(strpos($this->getTransactionReference(), 'fail') !== false);
        $data['message'] = $data['success'] ? 'Success' : 'Failure';

        return $this->response = new Response($this, $data);
    }
}