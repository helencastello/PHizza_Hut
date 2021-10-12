<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/pizza'], function () {
//    # Get All Pizza
//    Route::get('/', ['as' => 'phizza-hut.api.pizza.put', 'uses' => 'PizzaController@getPizza']);
    # Get All Pizza
    Route::get('/', ['as' => 'pizza.home-page', 'uses' => 'PizzaController@getHomePage']);
    # Search Pizza
    Route::post('/', ['as' => 'pizza.search', 'uses' => 'PizzaController@searchPizza']);
    # Add Pizza Page
    Route::get('/add', ['as' => 'phizza-hut.api.pizza.add-page', 'uses' => 'PizzaController@addPizzaPage']);
    # Add Pizza
    Route::post('/add', ['as' => 'phizza-hut.api.pizza.add-pizza', 'uses' => 'PizzaController@addPizza']);
    # Edit Pizza
    Route::patch('/edit/{pizzaId}', ['as' => 'phizza-hut.api.pizza.edit', 'uses' => 'PizzaController@editPizza'])->where('pizzaId', '[0-9]+');
    # Delete Pizza
    Route::delete('/delete/{pizzaId}', ['as' => 'pizza.delete', 'uses' => 'PizzaController@deletePizza'])->where('pizzaId', '[0-9]+');
});
