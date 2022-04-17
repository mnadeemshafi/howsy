<?php

class Product {

    protected string $code;
    protected string $name;

    protected float $price;

    /***************************************************************************************************/

    /**
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Product
     */
    public function setCode(string $code): Product {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product {
        $this->price = $price;
        return $this;
    }

}