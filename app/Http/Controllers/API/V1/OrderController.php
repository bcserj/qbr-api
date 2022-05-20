<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Order;

class OrderController extends ApiController
{
    public function index(){
        $orders = Order::all();
    }
}
