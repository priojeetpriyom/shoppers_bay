<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = auth()->user()->first();
//        return view('admin.index', compact('user'));
        $orders = DB::table('orders')
            ->get();
//        dd($orders);

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = DB::table('users')
            ->select(
                'f_name',
                's_name',
                'email',
                'address',
                'mobile'
            )
            ->where('id', auth()->user()->id)
            ->first();
        return view('admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function showOrders () {
        $orders = DB::table('orders')
        ->get();
//        dd($orders);

        return view('order.index', compact('orders'));
    }
    public function deleteOrder ($id) {
        DB::table('orders')
        ->where('id', request('id'))
        ->delete();
        DB::table('orders_details')
        ->where('order_id', request('id'))
        ->delete();
//        dd($orders);

        return back();
    }



    public function approvePendingTransaction($order, $user_id) {

        $trans = DB::table('pendingtransactions')
            ->where('user_id', $user_id)
            ->first();

//        $trans->delete();

        DB::table('pendingtransactions')
            ->where('id', $trans->id)
            ->delete();

        DB::table('orders')
            ->where('id', $order)
            ->delete();
//            ->first();

        DB::table('orders_details')
            ->where('order_id', $order)
            ->delete();

        return back();

    }
}
