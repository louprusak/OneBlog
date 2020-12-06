<?php


class ModelUser
{
    private $gateway;

    public function __construct(){
        $this->gateway=new GtwUser();
    }
}