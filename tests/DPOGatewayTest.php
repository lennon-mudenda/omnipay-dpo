<?php

namespace Omnipay\DPO\Tests;


use Dotenv\Dotenv;
use Omnipay\DPO\Gateway;
use PHPUnit\Framework\TestCase;

class DPOGatewayTest extends TestCase
{
	private function getValidTransactionData(): array
	{
		return [
			'testMode' => true,
			'amount' => 85,
			'paymentCurrency' => 'USD'
		];
	}

	private function getInValidTransactionData(): array
	{
		return [
			'testMode' => true,
			'amount' => 10000,
			'paymentCurrency' => 'USD'
		];
	}

	protected function setUp(): void
	{
		parent::setUp();

		Dotenv::createImmutable([
			str_replace(
				"tests",
				"",
				__DIR__
			),
		])->safeLoad();
	}

	public function test_purchase_success(): void
	{
		$gateway = new Gateway();

		$request = $gateway->purchase(
			$this->getValidTransactionData()
		);

		$response = $request->send();

		$this->assertTrue($response->isRedirect(), $response->getMessage());
	}

	public function test_purchase_failure(): void
	{
		$gateway = new Gateway();

		$request = $gateway->purchase(
			$this->getInValidTransactionData()
		);

		$response = $request->send();

		$this->assertFalse($response->isSuccessful(), $response->getMessage());
	}

	public function test_verify_failure(): void
	{
		$gateway = new Gateway();

		$request = $gateway->purchase(
			$this->getValidTransactionData()
		);

		$purchaseResponse = $request->send();

		$this->assertTrue($purchaseResponse->isRedirect(), $purchaseResponse->getMessage());

		$verifyRequest = $gateway->completePurchase(
			[
				'testMode' => true,
				'transactionToken' => $purchaseResponse->getTransactionId(),
			]
		);

		$verifyResponse = $verifyRequest->send();

		$this->assertFalse($verifyResponse->isSuccessful(), $verifyResponse->getMessage());
	}
}