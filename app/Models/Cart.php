<?php
namespace App\Models;

class Cart{
    public $products = null;
    public $totalPrice =0;
    public $totalQuanty =0;
    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }else{
            $products = [];
        }
    }

    public function AddCart($product, $id, $pro_id, $price, $size,$number){
        $newProduct = ['id_price' => $id,'id' => $pro_id,'quanty' =>0,'price' =>$price, 'size' => $size,  'product' =>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct=$this->products[$id];
            }
        }
        $newProduct['quanty']+=$number;
        $newProduct['price'] = $newProduct['quanty']*$price;
        $this->products[$id]=$newProduct;
        $this->totalPrice+=$price*$number;
        $this->totalQuanty+=$number;
    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -=$this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function UpdateItemCart($id, $quanty, $price){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -=$this->products[$id]['price'];
        
        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * $price;

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice +=$this->products[$id]['price'];

    }
}

?>