<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //
    public function listCategories(){
        $categories = Category::paginate(5);
        return view('admin.category.ListCategories')->with([
            'categories' => $categories,
        ]);
    }
    public function addCategory(){
        $categories = Category::all();
        return view('admin.category.AddCategory')->with([
            'categories' => $categories,
        ]);
    }

    public function addPostCategory(CategoryRequest $request){
        $data = [
            'name' => $request->name,
        ];
        Category::create($data);
        return redirect()->route('admin.category.listCategories')
        ->with('success', 'Thêm danh mục thành công');
    }
    public function deleteCategory(Request $request){
        $categories = Category::where('id_category', $request->id_category);
        $categories->delete();

        return redirect()->route('admin.category.listCategories')
        ->with('success', 'Xóa danh mục thành công');
    }

    public function updateCategory($id_category){
        $categories = Category::where('id_category', $id_category )->first();
        return view('admin.category.UpdateCategory')->with([
            'categories' => $categories,
        ]);
    }
    public function updatePutCategory(CategoryRequest $request, $id_category){
        $data = [
            'name' => $request->name,
        ];
        Category::where('id_category', $id_category)->update($data);
        return redirect()->route('admin.category.listCategories')
        ->with('success', 'Cập nhật danh mục thành công');
    }
}
