<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;

// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.Dashboard');
    }
    public function listUsers()
    {
        $data = User::all();
        // $data = DB::table('users')
        //     ->select(
        //         'users.id',
        //         'users.fullname',
        //         'users.username',
        //         'users.email',
        //         'users.phone',
        //         'users.gender',
        //         'users.address',
        //     )
        //     ->get();

        return view('admin.ListUsers')->with([
            'ListUsers' => $data
        ]);
    }

    public function addUser()
    {
        return view('admin.AddUser');
    }

    public function addPostUser(RegisterRequest $req)
    {
        // Kiểm tra xem email đã tồn tại hay chưa
        $check = User::where('email', $req->email)->exists();
        if ($check) {
            // Email đã tồn tại
            return redirect()->back()->with('error', 'Email đã tồn tại');
        }

        // Kiểm tra password và ConfirmPassword có khớp nhau hay không
        if ($req->password === $req->confirmpassword) {
            // Tạo dữ liệu new users
            $data = [
                'fullname' => $req->fullname,
                'username' => $req->username,
                'email' => $req->email,
                'password' => Hash::make($req->password), // Mã hóa mật khẩu
                'phone' => $req->phone,
                'address' => $req->address,
                'gender' => $req->gender,
            ];
            
            // Lưu dữ liệu vào cơ sở dữ liệu
            User::create($data);

            // Trả về với thông báo thành công
            return redirect()->route('viewLogin')->with('success', 'Đăng kí tài khoản thành công');
        } else {
            // Mật khẩu và xác nhận mật khẩu không khớp
            return redirect()->back()->with('error', 'Nhập lại mật khẩu không khớp');
        }
    }
    public function deleteUser(Request $request)
    {
        $users = User::where('id', $request->idUser);
        $users->delete();
            // ->with('success', 'Delete user successfully');

        return redirect()->route('admin.users.listUsers')
            ->with('success', 'Xóa thành công',[
                'users' => $users
            ]);
    }
    

    public function updateUser($idUser)
    {
        $users = User::where('id', $idUser)->first();
        return view('admin.UpdateUser')->with([
            'users' => $users
        ]);
    }

    public function updatePutUser(RegisterRequest $request, $idUser)
    {
        $users = User::where('id', $idUser)->first();
        $data = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            // 'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ];
        User::where('id', $idUser)->update($data);
        return redirect()->route('admin.users.listUsers')
            ->with('success', 'Chỉnh sửa thành công', [
                'users' => $users
            ]);
    }
    public function home(){
        $categories = Category::all();
        $products = Product::all();
        return view('users.Home')->with([
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function searchByCategory(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->input('category_id');

        $products = Product::when($selectedCategoryId, function ($query, $selectedCategoryId) {
            return $query->where('id_category', $selectedCategoryId);
        })->get();

        return view('users.Home')->with([
            'categories' => $categories,
            'products' => $products,
            'selectedCategoryId' => $selectedCategoryId,
        ]);
    }
    public function searchProduct(Request $request){
        $categories = Category::all();
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')
        ->get();
        return view('users.Home')->with([
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    
}