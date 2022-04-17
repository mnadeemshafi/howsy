<?php

use JetBrains\PhpStorm\Pure;
use Offer\LongContractDiscount;

class User {

    /**
     * @return OfferInterface[]
     */
    #[Pure] public function getOffers(): array {
        // get offers from database

        return [new LongContractDiscount()];
    }
}