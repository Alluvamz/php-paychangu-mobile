<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Response;

use Alluvamz\PayChanguMobile\Data\BaseDataObject;

class SuccessResponse extends BaseDataObject
{
    public function __construct(
        public readonly string $status,
        public readonly string $message,
        public readonly array $data,
    ) {}

    public static function makeFromArray(array $data): self
    {
        return new static(
            $data['status'],
            $data['message'],
            $data['data'],
        );
    }

    /**
     * @template T of BaseDataObject
     *
     * @param  class-string<T>  $class
     * @return T
     */
    public function getData(string $class)
    {
        return $class::makeFromArray($this->data);
    }

    /**
     * @template T of BaseDataObject
     *
     * @param  class-string<T>  $class
     * @return array<int,T>
     */
    public function getDataAsCollection(string $class): array
    {
        return array_map(fn ($item) => $class::makeFromArray($item), $this->data);
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
