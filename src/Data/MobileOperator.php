<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Data;

class MobileOperator extends BaseDataObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $refId,
        public readonly string $shortCode,
        public readonly bool $supportsWithdrawals = false
    ) {}

    public static function makeFromArray(array $data): self
    {

        return new static(
            $data['id'],
            $data['name'],
            $data['ref_id'],
            $data['short_code'],
            $data['supports_withdrawals'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ref_id' => $this->refId,
            'short_code' => $this->shortCode,
            'supports_withdrawals' => $this->supportsWithdrawals,
        ];
    }
}
