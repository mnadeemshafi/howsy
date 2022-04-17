<?php

class Basket {

    protected User $user;

    protected array $offers   = [];
    protected array $products = [];

    protected float $total_cost = 0;

    /***************************************************************************************************/

    /**
     * @param User $user
     * @param array $offers
     */
    public function __construct(User $user) {
        $this->user = $user;
        $this->offers = $user->getOffers();
    }

    /***************************************************************************************************/

    /**
     * @return User
     */
    public function getUser(): User {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Basket
     */
    public function setUser(User $user): static {
        $this->user = $user;
        return $this;
    }

    /**
     * @return OfferInterface[]
     */
    public function getOffers(): iterable {
        return $this->offers;
    }

    /**
     * @param array $offers
     * @return Basket
     */
    public function setOffers(array $offers): static {
        $this->offers = $offers;
        return $this;
    }

    /***************************************************************************************************/

    /**
     * Returns total cost for all products added with no offers applied
     * @return float|int
     */
    public function getTotalCost(): float|int {
        return $this->total_cost;
    }

    /**
     * @param $cost
     * @return $this
     */
    public function addToTotalCost($cost): static {
        $this->total_cost += $cost;
        return $this;
    }

    /***************************************************************************************************/

    /**
     * @return array
     */
    public function getProducts(): array {
        return $this->products;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product): static {
        if (!$this->isProductAlreadyAdded($product->getCode())) {
            $this->products[$product->getCode()] = $product;
        }

        return $this;
    }

    public function isProductAlreadyAdded($product_code): bool {
        return isset($this->products[$product_code]);
    }

    /***************************************************************************************************/

    /**
     * @return float
     */
    public function getFinalCost(): float {
        foreach ($this->getOffers() as $offer) {
            $offer->apply($this);
        }

        return $this->getTotalCost();
    }

}