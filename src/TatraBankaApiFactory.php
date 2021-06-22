<?php declare(strict_types=1);

namespace TatraBankaApi;



use Nette\Http\Request;

class TatraBankaApiFactory {

	protected $clientId;
	protected $clientSecret;
	protected $redirectUri;
	protected $tempDir;
	protected $useSandbox = false;

	public function __construct(string $clientId, string $clientSecret, string $redirectUri, ?string $tempDir = NULL, bool $useSandbox, Request $httpRequest)
	{
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
		$this->redirectUri = $httpRequest->getUrl()->getBaseUrl();
		$this->tempDir = $tempDir;
		$this->useSandbox = $useSandbox;
	}


	public function createTatraBankaPay(string $name = ''): Payments
	{
		return (new Payments($this->clientId, $this->clientSecret, $this->redirectUri, $this->tempDir))->useSandbox($this->useSandbox);
	}


	public function createTatraBankaRead(string $name = ''): Accounts
	{
		return (new Accounts($this->clientId, $this->clientSecret, $this->redirectUri, $this->tempDir))->useSandbox($this->useSandbox);
	}

}