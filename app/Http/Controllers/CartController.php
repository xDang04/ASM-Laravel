<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    //
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.viewCart')->with([
            'cart' => $cart,
        ]);
    }
    public function addProductToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('users.cart.viewCart')->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('users.cart.viewCart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('users.cart.viewCart')->with('success', 'Cart updated!');
    }
}
