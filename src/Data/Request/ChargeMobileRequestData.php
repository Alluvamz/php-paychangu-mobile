<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Data\Request;

use Alluvamz\PayChanguMobile\Data\BaseDataObject;

class ChargeMobileRequestData extends BaseDataObject
{
    public function __construct(
        public readonly string $chargeId,
        public readonly string $mobile,
        public readonly string $amount,
        public readonly string $mobileMoneyOperatorRefId,
    ) {}

    public static function makeFromArray(array $data): self
    {
        return new static(
            $data['charge_id'],
            $data['mobile'],
            $data['amount'],
            $data['mobile_money_operator_ref_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'mobile' => $this->mobile,
            'charge_id' => $this->chargeId,
            'amount' => $this->amount,
            'mobile_money_operator_ref_id' => $this->mobileMoneyOperatorRefId,
        ];
    }
}
