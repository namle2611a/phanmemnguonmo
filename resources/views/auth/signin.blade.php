<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Đăng ký tài khoản</h1>
    <form action="{{ route('auth.checksignin') }}" method="POST">
        @csrf
        <label>Username:</label>
        <input type="text" name="username" placeholder="Nhập username..." required>
        
        <label>Password:</label>
        <input type="password" name="password" placeholder="Nhập password..." required>
        
        <label>Nhập lại Password:</label>
        <input type="password" name="repass" placeholder="Nhập lại password..." required>
        
        <label>MSSV:</label>
        <input type="text" name="mssv" placeholder="Nhập MSSV..." required>
        
        <label>Lớp môn học:</label>
        <input type="text" name="lopmonhoc" placeholder="Nhập lớp môn học..." required>
        
        <label>Giới tính:</label>
        <select name="gioitinh" required>
            <option value="">-- Chọn giới tính --</option>
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
        </select>
        
        <button type="submit">Sign In</button>
    </form>
</body>
</html>

