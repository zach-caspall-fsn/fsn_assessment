<?php require_once("catalog.php");

class Cart {

    private $total = 0;
    public $shipping = 0;
    private array $shippingCosts = [
        50 => 4.95,
        90 => 2.95,
    ];

    private array $special_offers = [
        "RF1" => [
            "quantity" => 2,
            "discount" => .5
        ]
    ];

    public array $cart;

    public function add_to_cart($code)
    {
        $catalog = Catalog::get_catalog();
        if (array_key_exists($code, $catalog) && !isset($this->cart[$code])) {
            $this->cart[$code] = $catalog[$code];
            $this->cart[$code]['quantity'] = 1;
        } elseif (isset($this->cart[$code])) {
            $this->cart[$code]["quantity"]++;
        } else {
            echo "That code does not exist" . "<br>";
        }
    }

    public function get_total() {
        foreach($this->cart as $item) {
            $this->total += $item['price'] * $item['quantity'];
        }

        foreach ($this->cart as $itemCode => $item) {
            if(array_key_exists($itemCode, $this->special_offers)
                && $item['quantity'] >= $this->special_offers[$itemCode]['quantity']) {
                $this->total -= $this->cart[$itemCode]['price'] * $this->special_offers[$itemCode]['discount'];
            }
        }

        foreach ($this->shippingCosts as $total => $cost ) {
            if($this->total < $total) {
                $this->shipping = $cost;
                $this->total += $cost;
                break;
            }
        }

        return $this->total;
    }

}