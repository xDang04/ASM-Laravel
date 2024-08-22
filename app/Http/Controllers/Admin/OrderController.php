<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function listOrders()
    {
        $orders = Order::query()
            ->join('users', 'Orders.user_id', '=', 'users.id')
            ->select(
                'orders.id',
                'orders.total_price',
                'orders.user_id',
                'users.username as username',
                'orders.status'
            )
            ->get();
        return view('admin.orders.list-oders')->with([
            'orders' => $orders, // Truyền dữ liệu đơn hàng vào view
        ]);
    }
    // public function show($id)
    // {
    //     $order = Order::with(['orderDetails.product'])->findOrFail($id);
    //     return view('admin.orders.show')->with([
    //         'order' => $order, // Truyền dữ liệu đơn hàng vào view
    //     ]);
    // }
    public function updateStatus(Request $request, $id)
    {
        // Xử lý cập nhật trạng thái đơn hàng
        $order = Order::find($id);
        if ($order) {
            $order->status = $request->input('status');
            $order->save();
            return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
        }
        return redirect()->back()->with('error', 'Order not found.');
    }
}
