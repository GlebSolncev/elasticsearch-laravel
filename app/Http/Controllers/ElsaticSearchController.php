<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Entities\byRoles;
use App\Http\Controllers\Entities\editUser;
use App\Http\Controllers\Entities\iEntity;
//use App\Http\Controllers\Entities\{StartEntity, Users, Rules};
use App\Http\Controllers\Entities\Rules;
use App\Http\Controllers\Entities\StartEntity;
use App\Http\Controllers\Entities\users;
use Illuminate\Http\Request;

class ElsaticSearchController extends Controller
{
    /**
     * @var string $url
     */
    private $url = 'http://localhost:9200';

    /**
     * @var string $response
     */
    private $response;

    /**
     * @var array $entities
     */
    private $entities = [];


    /**
     * ES:
     * - Вывести список юзеров
     * - Вывести роли
     * - Вывести юзеров по роли(фильтрация юзеров)
     * - Изменять юзера
     * - Создать юзера
     * - Удалить юзера(массово)
     * - Сортировка юзеров(по имени, телефон, почта, кол лет(от до) по гендеру)
     * @param string $query
     */

    public function connect($query, $key=null, $body=null)
    {
        switch($query){
            CASE "users":
                $this->entities = $this->openMyEntity(new users());
                BREAK;
            CASE "rules":
                $this->entities = $this->openMyEntity(new Rules);
                BREAK;
            CASE "byRoles":
                $this->entities = $this->openMyEntity(new byRoles($key));
                BREAK;
            CASE "editUser":
                $this->entities = $this->openMyEntity(new editUser($key));
                BREAK;
            CASE "createUser":
                $uri = '/users/_doc/'.$key;
                $json = $body;
                BREAK;
            CASE "removeUser":
                $uri = '/users/_doc/'.$key;
                BREAK;
            CASE "sort":

                BREAK;
        }
        $this->curl();

        dd(\GuzzleHttp\json_decode($this->response));
    }


    private function curl():void
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "localhost:9200".$this->entities['uri'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->entities['method'],
            CURLOPT_POSTFIELDS => $this->entities['json'],
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $this->response = $response;
    }

    public function openMyEntity(iEntity $entity)
    {
        return $entity->start();
    }
}
