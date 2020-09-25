<?php

namespace App\Model;

class Brand
{
    /*
     * @var integer
     */
    private $id;

    /*
     * @var string
     */
    private $name;

    /*
     * @var integer
     */
    private $quantity;

    /*
     * @var boolean
     */
    private $reserved;
    
    /*
     * @var integer
     */
    private $price_quantity;

    /*
     * @var integer
     */
    private $price_reserved;

    function __construct($brandData)
    {
        $this->id = $brandData['id'];
        $this->name = $brandData['name'];

        $this->quantity = key_exists('quantity', $brandData) ? $brandData['quantity'] : 0;
        $this->reserved = key_exists('reserved', $brandData) ? $brandData['reserved'] : FALSE;
        $this->price_quantity = key_exists('price_quantity', $brandData) ? $brandData['price_quantity'] : 0;
        $this->price_reserved = key_exists('price_reserved', $brandData) ? $brandData['price_reserved'] : 0;
    }

    public function get_id()
    {
        return $this->id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_quantity()
    {
        return $this->quantity;
    }
    public function get_reserved()
    {
        return $this->reserved;
    }
    public function get_price_quantity()
    {
        return $this->price_quantity;
    }
    public function get_price_reserved()
    {
        return $this->price_reserved;
    }
}
