<?php
namespace App\Cart;

use \SplSubject;
use \SplObserver;

class Cart implements SplSubject
{
    private $storage;
    private $tva;

    public function __construct(array $storage = [], float $tva = 0.2)
    {
        $this->tva = $tva;
        $this->storage = $storage;
    }

    public function buy(Product $product, int $quantity): void
    {
        $total = $quantity * $product->getPrice() * ($this->tva + 1);

        $this->storage[$product->getName()] = $total;

        $this->notify();
    }

    public function reset(): void
    {
        $this->storage = [];
    }

    public function total(): float
    {
        return array_sum($this->storage);
    }

    public function restore(Product $product): void
    {
        if (isset($this->storage[$product->getName()])) {
            unset($this->storage[$product->getName()]);
        }
    }

    /**
     * Observer
     */

    public function attach(SplObserver $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void{
    }

    public function notify(): void {

        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }

}