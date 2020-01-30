<?php
/**
 * elasticsearch
 * Created by: 5-HT.
 * Date: 29.01.2020 22:57
 */
namespace App\Http\Controllers\Entities;

class users implements iEntity
{
    public function start()
    {
        $json = '';//json_encode(array( 'query' => array( 'match_all' => null ) ));
//        dd($json);
        $uri = '/test/_search';
        $method = 'GET';

        return compact('json', 'uri', 'method');
    }
}