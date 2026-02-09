<!DOCTYPE html>
<html>
<head>
    <title>Sửa danh mục</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: 5px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
        }
        .error {
            color: #f44336;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Sửa danh mục: {{ $category->name }}</h1>
    
    @if($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Tên danh mục <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh (URL)</label>
            <input type="text" id="image" name="image" value="{{ old('image', $category->image) }}" placeholder="Nhập URL hình ảnh">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="parent_id">Danh mục cha</label>
            <select id="parent_id" name="parent_id">
                <option value="">-- Chọn danh mục cha (nếu có) --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="error">{{ $message }}</div>
            @enderror
            <small style="color: #666;">Lưu ý: Danh mục hiện tại và con cháu của nó không thể được chọn làm danh mục cha.</small>
        </div>

        <div class="form-group">
            <div class="checkbox-group">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                <label for="is_active" style="font-weight: normal; margin: 0;">Kích hoạt</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
    
    <br>
    <a href="{{ route('category.index') }}">← Về danh sách</a>
</body>
</html>

