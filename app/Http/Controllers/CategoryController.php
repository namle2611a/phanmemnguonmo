<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Hiển thị danh sách danh mục
     */
    public function index()
    {
        $categories = Category::notDeleted()->with('parent')->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Hiển thị form thêm mới
     */
    public function create()
    {
        $categories = Category::notDeleted()->get();
        return view('category.create', compact('categories'));
    }

    /**
     * Lưu danh mục mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        // Kiểm tra parent_id có tồn tại không (nếu không null)
        if ($request->parent_id) {
            $parent = Category::notDeleted()->find($request->parent_id);
            if (!$parent) {
                return back()->withErrors(['parent_id' => 'Danh mục cha không tồn tại.'])->withInput();
            }
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'parent_id' => $request->parent_id,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'is_delete' => 0,
        ]);

        return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa
     */
    public function edit($id)
    {
        $category = Category::notDeleted()->findOrFail($id);
        
        // Lấy tất cả categories để làm select, loại trừ chính nó và con cháu của nó
        $allCategories = Category::notDeleted()->where('id', '!=', $id)->get();
        $descendantIds = $category->getAllDescendants()->pluck('id')->toArray();
        // Thêm chính nó vào danh sách loại trừ
        $descendantIds[] = $id;
        $categories = $allCategories->reject(function ($cat) use ($descendantIds) {
            return in_array($cat->id, $descendantIds);
        });

        return view('category.edit', compact('category', 'categories'));
    }

    /**
     * Cập nhật danh mục
     */
    public function update(Request $request, $id)
    {
        $category = Category::notDeleted()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        // Kiểm tra parent_id có tồn tại không (nếu không null)
        if ($request->parent_id) {
            $parent = Category::notDeleted()->find($request->parent_id);
            if (!$parent) {
                return back()->withErrors(['parent_id' => 'Danh mục cha không tồn tại.'])->withInput();
            }

            // Kiểm tra vòng lặp: không cho phép chọn chính nó hoặc con cháu của nó làm parent
            if ($request->parent_id == $id) {
                return back()->withErrors(['parent_id' => 'Danh mục không thể là con của chính nó.'])->withInput();
            }

            $descendantIds = $category->getAllDescendants()->pluck('id')->toArray();
            if (in_array($request->parent_id, $descendantIds)) {
                return back()->withErrors(['parent_id' => 'Danh mục không thể là con của con cháu của nó.'])->withInput();
            }
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'parent_id' => $request->parent_id,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Xóa mềm danh mục
     */
    public function destroy($id)
    {
        $category = Category::notDeleted()->findOrFail($id);
        $category->update(['is_delete' => 1]);

        return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công!');
    }
}
