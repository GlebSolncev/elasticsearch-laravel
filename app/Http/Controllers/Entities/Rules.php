<?php
/**
 * elasticsearch
 * Created by: 5-HT.
 * Date: 29.01.2020 22:57
 */
namespace App\Http\Controllers\Entities;

class Rules implements iEntity
{

    public function start()
    {
        $json = '{ "aggs" : { "role" : { "terms" : { "field" : "role" } } } }';
        $uri = '/test/_search';
        $method = 'GET';

        return compact('json', 'uri', 'method');
    }
}