<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Response;

use Alluvamz\PayChanguMobile\Data\BaseDataObject;
use Alluvamz\PayChanguMobile\PayChanguIntegrationException;

class ErrorResponse extends BaseDataObject
{
    public function __construct(
        public readonly string $status,
        public readonly string $message,
        public readonly array $data,
    ) {}

    public static function makeFromArray(array $data): self
    {
        $message = is_array($data['message']) ?
            json_encode($data['message']) : $data['message'];

        return new static(
            $data['status'],
            $message,
            $data['data'] ?? [],
        );
    }

    /**
     * @return never
     *
     * @throws PayChanguIntegrationException
     */
    public function throwError(): void
    {
        throw new PayChanguIntegrationException($this->message);
    }

    public function getData(string $class)
    {
        return $class::makeFromArray($this->data);
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }
}
