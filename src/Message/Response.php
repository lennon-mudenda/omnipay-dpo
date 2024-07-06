<?php

namespace Omnipay\DPO\Message;

use Omnipay\Common\Message\AbstractResponse;


class Response extends AbstractResponse
{
    public function isSuccessful(): bool
    {
        return isset($this->data['success']) && $this->data['success'];
    }

    public function getTransactionReference()
    {
        return $this->data['reference'] ?? null;
    }

    public function getTransactionId()
    {
        return $this->data['token'] ?? null;
    }

    public function getCardReference()
    {
        return $this->data['reference'] ?? null;
    }

    public function getMessage()
    {
        return $this->data['message'] ?? null;
    }
}