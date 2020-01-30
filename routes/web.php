<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/**
 * ES:
 * - Вывести список юзеров
 * - Вывести роли
 * - Вывести юзеров по роли(фильтрация юзеров)
 * - Изменять юзера
 * - Создать юзера
 * - Удалить юзера(массово)
 * - Сортировка юзеров(по имени, телефон, почта, кол лет(от до) по гендеру)
 *
 * Два ендпоинта.
 *
 */

Route::any('es/{query}/{key?}/{body?}', 'ElsaticSearchController@connect')->name('es');

Route::resource('users', 'UserController')
    ->except('show')->names('users');
