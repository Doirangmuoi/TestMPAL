<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::resource('items', ItemSaleController::class);
