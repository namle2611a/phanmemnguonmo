<!DOCTYPE html>
<html>
<head>
    <title>Bàn cờ vua {{ $n }}x{{ $n }}</title>
    <style>
        .board {
            border: 1px solid #333;
            display: inline-block;
        }
        .row {
            display: flex;
        }
        .cell {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
        }
        .black { background-color: #000; color: #fff; }
        .white { background-color: #fff; color: #000; }
    </style>
</head>
<body>
    <h3>Bàn cờ kích thước {{ $n }} x {{ $n }}</h3>
    @php
        $n = (int)$n;
        if ($n < 1 || $n > 50) {
            $n = 8;
        }
    @endphp
    <div class="board">
        @for ($i = 0; $i < $n; $i++)
            <div class="row">
                @for ($j = 0; $j < $n; $j++)
                    @php
                        $isBlack = ($i + $j) % 2 == 1;
                    @endphp
                    <div class="cell {{ $isBlack ? 'black' : 'white' }}">
                        {{ $i }},{{ $j }}
                    </div>
                @endfor
            </div>
        @endfor
    </div>
    <p><small>Lưu ý: Kích thước tối đa là 50x50 để tránh lỗi bộ nhớ</small></p>
</body>
</html>