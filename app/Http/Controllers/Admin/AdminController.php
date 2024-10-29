<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {


        $data = [
            
        ];

        return view('admin.dashboard', $data);
    }

    public function getMonthlySalesData()
    {
        $monthlySales = DB::table('orders')
            ->select(DB::raw('DATE_FORMAT(order_created_at, "%Y-%m") as month'), DB::raw('SUM(total_amount) as total_sales'))
            ->whereNotNull('order_created_at')
            ->groupBy(DB::raw('DATE_FORMAT(order_created_at, "%Y-%m")'))
            ->orderBy('month')
            ->get();

        return $monthlySales;
    }
}
