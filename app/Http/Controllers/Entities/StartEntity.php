<?php
/**
 * elasticsearch
 * Created by: 5-HT.
 * Date: 29.01.2020 23:11
 */
namespace App\Http\Controllers\Entities;


class StartEntity
{
    public function open($entity){
        dd($entity, (new $entity) );
        $this->work(new $entity);
    }

    public function work(iEntity $entity){
        $entity->start();
    }
//    public function start()
//    {
//        // TODO: Implement start() method.
//    }
}