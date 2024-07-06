<?php

namespace Omnipay\DPO\Message;

use Dotenv\Dotenv;
use Omnipay\Common\Message\AbstractRequest;

abstract class BaseRequest extends AbstractRequest
{
	private function loadEnv() {
		Dotenv::createImmutable([
			str_replace(
				"src/Message",
				"",
				__DIR__
			),
		])->safeLoad();
	}

	public function getCompanyToken(): ?string
	{
		$this->loadEnv();

		return $_ENV['DPO_TOKEN'];
	}

	public function setCompanyToken(string $companyToken = null): void
	{
		$this->loadEnv();

		$this->setParameter('companyToken', $companyToken ?? $_ENV['DPO_TOKEN']);
	}

	public function getCompanyRef(): ?string
	{
		$this->loadEnv();

		return $_ENV['DPO_REFERENCE'];
	}

	public function setCompanyRef(string $companyRef = null): void
	{
		$this->loadEnv();

		$this->setParameter('companyRef', $companyRef ?? $_ENV['DPO_REFERENCE']);
	}

	public function getCompanyAccRef(): ?string
	{
		return $this->getParameter('companyAccRef');
	}

	public function setCompanyAccRef(string $companyAccRef = null): void
	{
		$this->setParameter('companyAccRef', $companyAccRef);
	}

	public function getServiceType(): ?string
	{
		$this->loadEnv();

		return $_ENV['DPO_SERVICE_ID'];
	}

	public function setServiceType(string $serviceType = null): void
	{
		$this->setParameter('serviceType', $serviceType ?? $_ENV['DPO_SERVICE_ID']);
	}

	public function getCustomerPhone(): ?string
	{
		return $this->getParameter('customerPhone');
	}

	public function setCustomerPhone(string $customerPhone): void
	{
		$this->setParameter('customerPhone', $customerPhone);
	}

	public function getCustomerDialCode(): ?string
	{
		return $this->getParameter('customerDialCode');
	}

	public function setCustomerDialCode(string $customerDialCode): void
	{
		$this->setParameter('customerDialCode', $customerDialCode);
	}

	public function getCustomerZip(): ?string
	{
		return $this->getParameter('customerZip');
	}

	public function setCustomerZip(string $customerZip): void
	{
		$this->setParameter('customerZip', $customerZip);
	}

	public function getCustomerCountry(): ?string
	{
		return $this->getParameter('customerCountry');
	}

	public function setCustomerCountry(string $customerCountry): void
	{
		$this->setParameter('customerCountry', $customerCountry);
	}

	public function getCustomerAddress(): ?string
	{
		return $this->getParameter('customerAddress');
	}

	public function setCustomerAddress(string $customerAddress): void
	{
		$this->setParameter('customerAddress', $customerAddress);
	}

	public function getCustomerCity(): ?string
	{
		return $this->getParameter('customerCity');
	}

	public function setCustomerCity(string $customerCity): void
	{
		$this->setParameter('customerCity', $customerCity);
	}

	public function getCustomerEmail(): ?string
	{
		return $this->getParameter('customerEmail');
	}

	public function setCustomerEmail(string $customerEmail): void
	{
		$this->setParameter('customerEmail', $customerEmail);
	}

	public function getCustomerFirstName(): ?string
	{
		return $this->getParameter('customerFirstName');
	}

	public function setCustomerFirstName(string $customerFirstName): void
	{
		$this->setParameter('customerFirstName', $customerFirstName);
	}

	public function getCustomerLastName(): ?string
	{
		return $this->getParameter('customerLastName');
	}

	public function setCustomerLastName(string $customerLastName): void
	{
		$this->setParameter('customerLastName', $customerLastName);
	}

	public function getPaymentAmount(): ?string
	{
		return $this->getParameter('paymentAmount');
	}

	public function setPaymentAmount(string $paymentAmount): void
	{
		$this->setParameter('paymentAmount', $paymentAmount);
	}

	public function getPaymentCurrency(): ?string
	{
		return $this->getParameter('paymentCurrency');
	}

	public function setPaymentCurrency(string $paymentCurrency): void
	{
		$this->setParameter('paymentCurrency', $paymentCurrency);
	}

	public function getRedirectURL(): ?string
	{
		return $this->getParameter('redirectURL');
	}

	public function setRedirectURL(string $redirectURL): void
	{
		$this->setParameter('redirectURL', $redirectURL);
	}

	public function getBackURL(): ?string
	{
		return $this->getParameter('backURL');
	}

	public function setBackURL(string $backURL): void
	{
		$this->setParameter('backURL', $backURL);
	}

	public function getTransactionSource(): ?string
	{
		return $this->getParameter('transactionSource');
	}

	public function setTransactionSource(string $transactionSource): void
	{
		$this->setParameter('transactionSource', $transactionSource);
	}

	public function getPTL(): ?string
	{
		return $this->getParameter('PTL');
	}

	public function setPTL(string $PTL): void
	{
		$this->setParameter('PTL', $PTL);
	}

	public function getPTLtype(): ?string
	{
		return $this->getParameter('PTLtype');
	}

	public function setPTLtype(string $PTLtype): void
	{
		$this->setParameter('PTLtype', $PTLtype);
	}

	public function getTransactionToken(): ?string
	{
		return $this->getParameter('transactionToken');
	}

	public function setTransactionToken(string $transactionToken): void
	{
		$this->setParameter('transactionToken', $transactionToken);
	}
}