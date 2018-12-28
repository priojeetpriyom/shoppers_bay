<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
//    protected $cart;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = auth()->user()->cart()->get();
//        dd($cart);
        return view('cart.index', compact('cart'))->render();

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
    public function store($pid)
    {
//        return ($pid);
//        $cart = auth()->user()->cart();
        $cart = DB::table('carts')
            ->where('product_id', $pid)
            ->where('user_id', auth()->user()->id)
            ->first();
        if(count($cart)== 0) {
            $product  = Product::find($pid);
//            return (string)$product;
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $pid,
                'product_title' => $product->title,
                'product_image' => $product->image,
                'price' => $product->price
            ]);
        }
        $cart = DB::table('carts')
            ->where('product_id', $pid)
            ->where('user_id', auth()->user()->id)
            ->first();
//        dd($cart->id);

        $cart->quantity = $cart->quantity+1;
        DB::table('carts')
            ->where('id', $cart->id)
            ->update(['quantity' => $cart->quantity]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(count(auth()->user()->cart()->get()) ==0)
            return back();
        return view('cart.show');
    }
    public function showCheckoutProducts() {
        $products = DB::table('carts')
            ->select(['id', 'product_image', 'product_title', 'price', 'quantity'])
            ->where('user_id', auth()->user()->id)
            ->get();
//        dd($products);
        return view('cart.showCheckoutProducts', compact('products'));
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

   public function removeItem ($id) {
        $cart = Cart::find($id);
        $cart->delete();
   }


    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
    }


    public function updateCartItemsCount() {
//        dd(auth()->user()->cart()->get());
        return count(auth()->user()->cart()->get());
    }

    public function updateProductCount($id, $quantity) {
        if($quantity == null)
            return back()->withErrors('Please insert a valid quantity');
        $cart = Cart::find($id);
        $cart->quantity = $quantity;
        $cart->save();
    }

    public function checkoutPayment() {
        $user = auth()->user();
//        dd( $user->id);
        $carts = DB::table('carts')
            ->where('user_id', $user->id)
            ->get();
//        dd($carts);

        $order = DB::table('orders')
            ->insert([
            'user_id' => $user->id
        ]);
//        $orderId = DB::getPdo()->lastInsertId();
        $order = Order::latest()->first();
//        dd($order);
//        dd(count($carts));
        $total =0;
        foreach($carts as $cart) {
            $product = Product::find($cart->product_id)->first();
            $subTotal= $cart->price * $cart->quantity;
            DB::table('orders_details')
                ->insert([
                    'buyer_id' => $cart->user_id,
                    'seller_id' => $product->user_id,
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'title' => $cart->product_title,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                    'total' => $subTotal
                ]);
            $total+= $subTotal;

        }
        $order->total = $total;
        $order->save();

        $this->destroyUserCart($user->id);
        session()->flash('message-success', 'your order has been sent in the queue.please complete payment');
//        session()->flash('payment-msg', 'Current We Are Under DeVe')
        $order  = DB::table('orders')
            ->latest()
            ->first();
//        dd($order);
        return view('order.payment', compact('order'));
//        return redirect()->home();

    }

    public function destroyUserCart($user_id) {
        DB::table('carts')
            ->where('user_id', $user_id)
            ->delete();
    }

}
