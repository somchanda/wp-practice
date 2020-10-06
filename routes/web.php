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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product', function (){
    $products = DB::select('SELECT * FROM products');
    foreach ($products as $product){
        echo $product->name. "\t". $product->price. '<br>';
    }
});
Route::get('/product/insert', function (){
   DB::insert('INSERT INTO products (name, price) VALUES (?, ?)',['name4',60]);
});
Route::get('/product/{id}/delete', function ($id){
    DB::delete('DELETE FROM products WHERE id = ?', [$id]);
    return redirect('/product');
});
Route::get('/product/{id}/update', function ($id){
    DB::update('UPDATE products SET name = ?, price = ? WHERE id = ?', ['name1 updated', 60, $id]);
    return redirect('/product');
});
