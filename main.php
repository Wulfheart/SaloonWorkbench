<?php

include './vendor/autoload.php';

class Connector extends \Sammyjo20\Saloon\Http\SaloonConnector
{
    public function defineBaseUrl(): string
    {
        return 'https://httpbin.org';
    }
}

class Response extends \Sammyjo20\Saloon\Http\SaloonResponse
{
    public function toDTO(): int
    {
        return $this->status();
    }
}

/**
 * @method Response send()
 */
class GetRequest extends \Sammyjo20\Saloon\Http\SaloonRequest
{
    protected ?string $connector = Connector::class;

    protected ?string $method = \Sammyjo20\Saloon\Constants\Saloon::GET;

    protected ?string $response = Response::class;

    public function defineEndpoint(): string
    {
        return '/get';
    }
}

$req = new GetRequest();

echo $req->send()->toDTO();

echo "\n\n";
