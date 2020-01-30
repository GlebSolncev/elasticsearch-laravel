<?php
/**
 * elasticsearch
 * Created by: 5-HT.
 * Date: 29.01.2020 22:57
 */
namespace App\Http\Controllers\Entities;

class editUser implements iEntity
{
    private $body;
    private $key;
    public function __construct($key)
    {
        $this->body = key(request()->all());
        $this->key = $key;
    }

    public function start()
    {
        $uri = '/users/_doc/'.$this->key;
        $json = $this->body;
        $method = 'PUT';

        return compact('uri', 'json', 'method');
    }
}