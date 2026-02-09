<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .menu {
            background-color: #333;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }
        .menu li {
            position: relative;
        }
        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
        }
        .menu a:hover {
            background-color: #555;
        }
        .menu .dropdown {
            position: relative;
        }
        .menu .dropdown-content {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            top: 100%;
            left: 0;
        }
        .menu .dropdown:hover .dropdown-content {
            display: block;
        }
        .menu .dropdown-content a {
            padding: 12px 20px;
            display: block;
        }
        .menu .dropdown-content a:hover {
            background-color: #555;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <nav class="menu">
        <ul>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)">Quản lý Danh mục ▼</a>
                <div class="dropdown-content">
                    <a href="{{ route('category.index') }}">Xem danh sách</a>
                    <a href="{{ route('category.create') }}">Thêm mới</a>
                </div>
            </li>
        </ul>
    </nav>
    
    <h1>Chào mừng đến với trang chủ</h1>
    <a href="{{ route('product.index') }}">Xem danh sách sản phẩm</a>
</body>
</html>