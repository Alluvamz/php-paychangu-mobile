<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile;

use Alluvamz\PayChanguMobile\Data\Request\ChargeMobileRequestData;
use Alluvamz\PayChanguMobile\Response\ErrorResponse;
use Alluvamz\PayChanguMobile\Response\SuccessResponse;
use GuzzleHttp\Client;

class PayChanguIntegration
{
    private Client $client;

    public function __construct(
        private readonly string $privateKey,
    ) {
        $this->client = new Client([
            'base_uri' => 'https://api.paychangu.com/',
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function getMobileOperators(): SuccessResponse|ErrorResponse
    {
        $response = $this->client->get('mobile-money');

        $data = json_decode((string) $response->getBody(), true);

        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300 ?
            SuccessResponse::makeFromArray($data) :
            ErrorResponse::makeFromArray($data);
    }

    public function getDirectChargeStatus(string $chargeId): SuccessResponse|ErrorResponse
    {
        $response = $this->client->get(sprintf('mobile-money/payments/%s/verify', $chargeId), [
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->privateKey),
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300 ?
            SuccessResponse::makeFromArray($data) :
            ErrorResponse::makeFromArray($data);
    }

    public function getDirectChargeDetails(string $chargeId): SuccessResponse|ErrorResponse
    {
        $response = $this->client->get(sprintf('mobile-money/payments/%s/details', $chargeId), [
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->privateKey),
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300 ?
            SuccessResponse::makeFromArray($data) :
            ErrorResponse::makeFromArray($data);
    }

    public function makeDirectCharge(ChargeMobileRequestData $requestData): SuccessResponse|ErrorResponse
    {
        $response = $this->client->post('mobile-money/payments/initialize', [
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->privateKey),
            ],
            'json' => $requestData->toArray(),
        ]);

        $data = json_decode((string) $response->getBody(), true);

        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300 ?
            SuccessResponse::makeFromArray($data) :
            ErrorResponse::makeFromArray($data);
    }
}
