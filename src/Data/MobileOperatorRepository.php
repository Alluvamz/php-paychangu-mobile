<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Data;

use Alluvamz\PayChanguMobile\PayChanguIntegration;
use Alluvamz\PayChanguMobile\PayChanguIntegrationException;
use Alluvamz\PayChanguMobile\Response\ErrorResponse;

class MobileOperatorRepository
{
    private static array $operators = [];

    public function __construct(private PayChanguIntegration $payChanguIntegration)
    {
    }

    public function all(): array
    {
        if (empty(self::$operators)) {
            $response = $this->payChanguIntegration->getMobileOperators();

            if ($response instanceof ErrorResponse) {
                throw new PayChanguIntegrationException($response->message);
            }

            self::$operators = $response->getDataAsCollection(MobileOperator::class);
        }

        return self::$operators;
    }

    public function findByShortCode(string $shortCode): ?MobileOperator
    {
        $found = array_filter($this->all(), fn (MobileOperator $mobileOperator) => strtolower($mobileOperator->shortCode) === strtolower($shortCode));

        return reset($found) ?: null;
    }

    public function findByRefId(string $refId): ?MobileOperator
    {
        $found = array_filter($this->all(), fn (MobileOperator $mobileOperator) => $mobileOperator->refId === $refId);

        return reset($found) ?: null;
    }

    public function findById(int $id): ?MobileOperator
    {
        $found = array_filter($this->all(), fn (MobileOperator $mobileOperator) => $mobileOperator->id === $id);

        return reset($found) ?: null;
    }
}
