<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Carbon\Carbon;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //
    public function listProducts(){
        
        $listProducts = Product::query()
        ->join('category', 'products.id_category', '=', 'category.id_category')
        ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.image',
                'category.name as category',
                'category.id_category as categoryId')
                ->paginate(5);
                // $listProducts = Product::paginate(5);
        return view('admin.products.listProducts')
        ->with([
            'listProducts' => $listProducts
        ])
        ;
    }
    public function addProduct(){
        $categories = Category::select('id_category', 'name')->get();
        return view('admin.products.addProduct')->with([
            'categories' => $categories
        ]);
    }

    public function addPostProduct(ProductRequest $request){
        $linkImage = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newName = time() . '.' .$image->getClientOriginalExtension();
            $linkStorage = "imageProducts/";
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'id_category' => $request->category,
            'image' => $linkImage,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        Product::create($data);
        return redirect()->route('admin.products.listProducts')
        ->with('success', 'Thêm sản phẩm thành công');
    }

    public function deleteProduct(Request $request){
        $product = Product::where('id', $request->idProduct);
        if($product->first()->image != null && $product->first()->image != " ") {
            File::delete(public_path($product->first()->image));
        }
        $product->delete();

        return redirect()->route('admin.products.listProducts')
        ->with('success', 'Xóa sản phẩm thành công');
    }

    public function detailProduct($idProduct){
        // $listProducts = Product::select(
        //         'products.id',
        //         'products.name',
        //         'products.price',
        //         'products.image',
        //         'category.name as category',
        //         'category.id_category as categoryId')
        //         ->get();
        $products = Product::where('id', $idProduct)->first();
        return view('admin.products.DetailProduct')->with([
            'products' => $products,
            // 'listProducts' => $listProducts,

        ]);
    }
    public function updateProduct($idProduct){
        $categories = Category::select('id_category', 'name')->get();
        $product = Product::where('id', $idProduct)->first();
        return view('admin.products.UpdateProduct')->with([
            'product' => $product,
            'categories' => $categories,
        ]);
    }
    public function updatePutProduct(ProductRequest $request, $idProduct){
        
        $product = Product::where('id', $idProduct)->first();
        $linkImage = $product->image;
        if($request->hasFile('image')){
            File::delete(public_path($product));// Xoa anh cu
            $image = $request->file('image');
            $newName = time() . '.' .$image->getClientOriginalExtension();
            $linkStorage = "imageProducts/";
            $image->move(public_path($linkStorage) , $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'id_category' => $request->category,
            'image' =>$linkImage
        ];
        Product::where('id', $idProduct)->update($data);
        return redirect()->route('admin.products.listProducts')
        ->with('success', 'Chỉnh sửa sản phẩm thành công');
    }
   
}
