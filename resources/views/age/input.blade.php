<!DOCTYPE html>
<html>
<head>
    <title>Nhập tuổi</title>
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
        input[type="number"] {
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
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .info {
            margin-top: 15px;
            padding: 10px;
            background-color: #e7f3ff;
            border-radius: 4px;
            color: #004085;
        }
    </style>
</head>
<body>
    <h1>Nhập tuổi của bạn</h1>
    <form action="{{ route('age.store') }}" method="POST">
        @csrf
        <label>Tuổi:</label>
        <input type="number" name="age" placeholder="Nhập tuổi của bạn..." min="1" max="150" required>
        
        <button type="submit">Lưu tuổi</button>
    </form>
    
    @if(session('age'))
    <div class="info">
        <strong>Tuổi đã lưu trong session:</strong> {{ session('age') }}
    </div>
    @endif
</body>
</html>

