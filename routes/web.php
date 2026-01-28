<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

// 1. Route Home "/"
Route::get('/', function () {
    return view('home');
})->name('home');


// Gom nhóm Route Product
Route::prefix('product')->group(function () {

    // 2. Route "/product": Danh sách sản phẩm
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');

    // 3. Route "/product/add": Form thêm mới (Đặt trước route {id} để tránh xung đột)
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    // 4. Route "/product/{id}": Chi tiết sản phẩm
    // id kiểu chuỗi, mặc định 123 (nếu gọi hàm nội bộ mà không truyền)
    // Lưu ý: Trên trình duyệt, nếu gõ /product thì nó vào route index ở trên.
    // Route này bắt các trường hợp như /product/abc, /product/123
    Route::get('/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm có ID: " . $id;
    })->where('id', '[a-zA-Z0-9]+')->name('product.detail');
});


// 5. Ví dụ đặt tên route và gọi route qua tên (Demo)
Route::get('/demo-route', function () {
    // Tạo đường dẫn đến trang thêm sản phẩm bằng tên route
    $url = route('product.add');
    return "Đây là ví dụ gọi route theo tên. Đường dẫn đến trang thêm sản phẩm là: " . $url;
});


// 6. Route Sinh viên với tham số tùy chọn (Optional Parameters)
// Mặc định: Name = "Luong Xuan Hieu", MSSV = "123456"
Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Luong Xuan Hieu', $mssv = '123456') {
    return view('sinhvien', [
        'name' => $name,
        'mssv' => $mssv
    ]);
});


// 7. Route Bàn cờ vua
Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});


// 9. Route đăng ký tài khoản
Route::get('/signin', [AuthController::class, 'SignIn'])->name('auth.signin');
Route::post('/checksignin', [AuthController::class, 'CheckSignIn'])->name('auth.checksignin');


// 8. Fallback Route: Xử lý lỗi 404 khi không tìm thấy route
Route::fallback(function () {
    return view('error.404');
});