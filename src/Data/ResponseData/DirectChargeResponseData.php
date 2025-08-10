<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Data\ResponseData;

use Alluvamz\PayChanguMobile\Data\BaseDataObject;
use Alluvamz\PayChanguMobile\Data\DirectChargeStatus;

class DirectChargeResponseData extends BaseDataObject
{
    public function __construct(
        public int $amount,
        public string $chargeId,
        public string $refId,
        public ?string $transId,
        public string $type,
        public DirectChargeStatus $status,
        public string $mobile,
        public int $attempts,
    ) {}

    public static function makeFromArray(array $data): self
    {
        return new static(
            $data['amount'],
            $data['charge_id'],
            $data['ref_id'],
            $data['trans_id'],
            $data['type'],
            DirectChargeStatus::from($data['status']),
            $data['mobile'],
            $data['attempts'],
        );
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'charge_id' => $this->chargeId,
            'ref_id' => $this->refId,
            'trans_id' => $this->transId,
            'type' => $this->type,
            'status' => $this->status->value,
            'mobile' => $this->mobile,
            'attempts' => $this->attempts,
        ];
    }
}
