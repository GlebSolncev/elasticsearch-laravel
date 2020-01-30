<?php
/**
 * elasticsearch
 * Created by: 5-HT.
 * Date: 29.01.2020 22:57
 */
namespace App\Http\Controllers\Entities;

class byRoles implements iEntity
{
    private $key;
    public function __construct($key)
    {
        $this->key = $key;
    }

    public function start()
    {
        $json = '{ "query" : { "match":{ "role":"'.$this->key.'" } } }';
        $uri = '/test/_search';
        $method = 'GET';

        return compact('json', 'uri', 'method');
    }
}