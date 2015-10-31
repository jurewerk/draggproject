<?php

use App\Item;

$app->get('/', function() use ($app) {
    $items = Item::orderBy('item_order','asc')->get();
    return view('index', ['items' => $items]);
});

$app->post('/add-item', 'App\Http\Controllers\ItemController@add');
$app->post('/delete-item', 'App\Http\Controllers\ItemController@delete');
$app->post('/sort-items', 'App\Http\Controllers\ItemController@sort');
