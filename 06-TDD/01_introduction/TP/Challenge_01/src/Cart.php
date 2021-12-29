<?php

namespace Cart;

class Cart
{
    public function __construct(
        private Storable $storage,
        private float $tva = .2
        )
    {}

    public function buy(Productable $p, int $quantity): void
    {
        $total = abs($quantity * $p->getPrice() * ($this->tva + 1));

        $this->storage->setValue($p->getName(), $total);
    }

    public function reset(): void
    {
        $this->storage->reset();
    }

    public function restore(Productable $p): void
    {
        $this->storage->restore($p->getName());
    }

    public function total(): float
    {
        return round(array_sum($this->storage->getStorage()), $_ENV['APP_PRECISION'] ?? 3 );
    }

    public function restoreQuantity(Productable $p, int $qt): void
    {
        if ( array_key_exists($p->getName(), $this->storage->getStorage() ) ) {

            $priceQt = $this->storage->getStorage()[$p->getName()];
            $downPrice = abs($qt * $p->getPrice() * ($this->tva + 1));
            $newPrice = $priceQt - $downPrice;
            $this->restore($p);

            if ($newPrice > 0) {
                $newQt = $newPrice / $p->getPrice();
                $this->buy($p, $newQt);
            }
        }
    }
}
