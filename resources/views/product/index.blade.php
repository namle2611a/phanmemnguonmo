<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .product-list {
            list-style: none;
            padding: 0;
        }
        .product-item {
            background: #f9f9f9;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #4CAF50;
        }
        .product-item a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .product-item a:hover {
            text-decoration: underline;
        }
        .btn-add {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-add:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Danh sách sản phẩm mẫu</h1>
    <ul class="product-list">
        <li class="product-item">
            <strong>Sản phẩm A</strong> - Giá: 100.000đ
            <a href="{{ route('product.detail', ['id' => 'SPA']) }}">Xem chi tiết</a>
        </li>
        <li class="product-item">
            <strong>Sản phẩm B</strong> - Giá: 200.000đ
            <a href="{{ route('product.detail', ['id' => 'SPB']) }}">Xem chi tiết</a>
        </li>
        <li class="product-item">
            <strong>Sản phẩm C</strong> - Giá: 300.000đ
            <a href="{{ route('product.detail', ['id' => 'SPC']) }}">Xem chi tiết</a>
        </li>
        <li class="product-item">
            <strong>Sản phẩm D</strong> - Giá: 400.000đ
            <a href="{{ route('product.detail', ['id' => 'SPD']) }}">Xem chi tiết</a>
        </li>
    </ul>
    
    <a href="{{ route('product.add') }}" class="btn-add">
        ➕ Thêm mới sản phẩm
    </a>
</body>
</html>