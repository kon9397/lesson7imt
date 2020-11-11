<?php


class Cart
{
    public $items = [];
    public $sum = 0;
    public $count = 0;
    public $discount = 0;

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function setQuantity($id, $quantity)
    {
        $currentId = 0;
        foreach ($this->items as $key=>$item) {
            if($item['id'] === $id) {
                $currentId = $key;
            }
        }

        $this->items[$currentId]['quantity'] = $quantity;

        $this->Calc();
        $this->getSum();
    }

    public function getSum()
    {
        $this->sum = 0;
        foreach($this->items as $item) {
            $this->sum += $item['quantity'] * $item['price'];
        }

        $this->getDiscount();

        return $this->sum;
    }

    public function Calc() {
        $this->count = 0;
        foreach ($this->items as $item) {
            $this->count += $item['quantity'];
        }
    }

    public function getDiscount()
    {
        if($this->setDiscount() === 0) {
            return;
        }
        $this->setDiscount();
        $this->sum = $this->sum - $this->sum * $this->discount / 100;

        return $this->discount;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setDiscount()
    {
        $this->discount = 0;
        if($this->sum > 2000) {
            $this->discount += 7;
        }

        if($this->count > 20) {
            $this->discount += 10;
        }

        return $this->discount;
    }

    public function setItems($items)
    {
        foreach ($this->items as $item) {
            if($item['name'] === $items['name']) {
                $this->setQuantity($item['id'], $items['quantity'] + $item['quantity']);
                $this->Calc();
                $this->getSum();
                return;
            }
        }
        $this->items[] = $items;

        $this->Calc();
        $this->getSum();


    }

    public function deleteItem($id) {
        foreach ($this->items as $key=>$item) {
            if($item['id'] === $id) {
                unset($this->items[$key]);
            }
        }

        $this->Calc();
        $this->getSum();

    }



}