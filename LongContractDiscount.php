<?php

namespace Offer;

use Basket;
use OfferInterface;

class LongContractDiscount implements OfferInterface {

    protected const DEFAULT_CONTRACT_LENGTH = 12;
    protected const DEFAULT_DISCOUNT        = 0.1;

    /***************************************************************************************************/

    protected int   $contract_length;
    protected float $discount;

    /***************************************************************************************************/

    /**
     * @param int $contract_length
     * @param float $discount
     */
    public function __construct(
        int   $contract_length = self::DEFAULT_CONTRACT_LENGTH,
        float $discount = self::DEFAULT_DISCOUNT
    ) {
        $this->contract_length = $contract_length;
        $this->discount = $discount;
    }

    /***************************************************************************************************/

    /**
     * @return int
     */
    public function getContractLength(): int {
        return $this->contract_length;
    }

    /**
     * @param int $contract_length
     * @return LongContractDiscount
     */
    public function setContractLength(int $contract_length): LongContractDiscount {
        $this->contract_length = $contract_length;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(): float {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return LongContractDiscount
     */
    public function setDiscount(float $discount): LongContractDiscount {
        $this->discount = $discount;
        return $this;
    }

    /***************************************************************************************************/

    /**
     * @param Basket $basket
     * @return void
     */
    public function apply(Basket $basket): void {
        $basket->addToTotalCost($basket->getTotalCost() * $this->getDiscount() * -1);
    }


}