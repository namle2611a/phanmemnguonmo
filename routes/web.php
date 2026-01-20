<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    Route::get('/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm có ID: " . $id;
    })->where('id', '[a-zA-Z0-9]+')->name('product.detail');
});


Route::get('/demo-route', function () {
    $url = route('product.add');
    return "Đây là ví dụ gọi route theo tên. Đường dẫn đến trang thêm sản phẩm là: " . $url;
});


Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Le Thanh Nam ', $mssv = '0051867') {
    return view('sinhvien', [
        'name' => $name,
        'mssv' => $mssv
    ]);
});


Route::get('/banco/{n}', function ($n) {
    if (!is_numeric($n) || $n < 1 || $n > 50) {
        abort(400, 'Kích thước bàn cờ phải là số từ 1 đến 50');
    }
    $n = (int)$n;
    return view('banco', ['n' => $n]);
})->where('n', '[0-9]+');


Route::fallback(function () {
    return view('error.404');
});