<?php

namespace Omnipay\DPO\Message;

use Dpo\Common\Dpo;
use Omnipay\Common\Exception\InvalidRequestException;

class InitiateTransactionRequest extends BaseRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('amount');

        return [
			'serviceType' => $this->getServiceType(),
			'customerPhone' => $this->getCustomerPhone(),
			'customerDialCode' => $this->getCustomerDialCode(),
			'customerZip' => $this->getCustomerZip(),
			'customerCountry' => $this->getCustomerCountry(),
			'customerAddress' => $this->getCustomerAddress(),
			'customerCity' => $this->getCustomerCity(),
			'customerEmail' => $this->getCustomerEmail(),
			'customerFirstName' => $this->getCustomerFirstName(),
			'customerLastName' => $this->getCustomerLastName(),
			'companyToken' => $this->getCompanyToken(),
			'companyRef' => $this->getCompanyRef(),
			'companyAccRef' => $this->getCompanyAccRef(),
			'paymentAmount' => $this->getAmount(),
			'paymentCurrency' => $this->getPaymentCurrency(),
			'redirectURL' => $this->getRedirectURL(),
			'backURL' => $this->getBackURL(),
			'transactionSource' => $this->getTransactionSource(),
			'PTL' => $this->getPTL(),
			'PTLtype' => $this->getPTLtype(),
		];
    }

    public function sendData($data = []): Response
    {
		try {
			$dpoClient = new Dpo($this->getTestMode());

			$response = $dpoClient->createToken($data);

			if ($response['success']){
				$data['success'] = true;
				$data['token'] = $response["transToken"];
				$data['payURL'] = $dpoClient->getPayUrl();
				$data['reference'] = $response["transRef"];
				$data['result'] = $response["result"];
				$data['message'] = "Success";
			} else {
				throw new \Exception(
					$response["error"]
				);
			}
		} catch (\Exception $exception) {
			$errorMessage = $exception->getMessage();

			$data['success'] = false;
			$data['message'] = "Failure: $errorMessage";
		}

        return $this->response = new Response($this, $data);
    }
}