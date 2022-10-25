<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct($product,$quntity)
    {
        $this->product=$product;
        $this->quantity=$quntity;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }



    public function increaseQuantity($amount = 1)
    {
        if($this->getQuantity()+$amount>$this->getProduct()->getAvailableQuantity()){
            throw new Exception("product quantity can't be more than ".$this->getProduct()->getAvailableQuantity());

        }
        $this->quantity+=$amount;
    }

    public function decreaseQuantity($amount = 1)
    {
        if($this->getQuantity()- $amount <1){
            throw new Exception("product quantity can't be less than 1 ");

        }
        $this->quantity -= $amount;
    }
}