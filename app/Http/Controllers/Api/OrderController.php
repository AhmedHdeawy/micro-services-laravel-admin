<?php

namespace App\Http\Controllers\Api;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResource::collection(Order::paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new OrderResource(Order::findOrFail($id));
    }
    

    public function export()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=orders.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $callback = function() {
            $orders = Order::all();

            $file = fopen('php://output', 'w');

            fputcsv($file, ['ID', 'Name', 'Email', 'Phone', 'Address', 'Title', 'Price', 'Quantity']);

            foreach ($orders as $order) {
                fputcsv($file, [$order->id, $order->name, $order->phone, $order->address, '', '', '']);

                foreach ($order->orderItems as $item) {
                    fputcsv($file, ['','','','', '', $item->product->title, $item->price, $item->qty]);
                }
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

}
