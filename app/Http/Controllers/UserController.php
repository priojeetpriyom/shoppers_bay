<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        //return back();
        $this->validate($request, [
            'f_name' => 'required',
            's_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'mobile' => 'required',
            'address' => 'required'
        ]);

        $credentials = request(['f_name', 's_name', 'email', 'address', 'password', 'mobile']);
        $credentials['password'] = bcrypt($credentials['password']);
//        dd($credentials);

        $user = \App\User::create($credentials);

        auth()->login($user);
        session()->put('id', $user->id);
        if($user->admin) {
            session()->put('admin');
        }
        return redirect()->home();
    }


    public function login(Request $request) {

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
                'mobile',
                'balance'
            )
            ->where('id', auth()->user()->id)
            ->first();
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::find(auth()->user())->first();
//        dd($user);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        dd($request['password']);
        $pass = bcrypt($request['old_password']);
        if(Hash::check($pass, auth()->user()->password))
            return back()->withErrors('password doesn\'t match!');

        $this->validate($request, [
            'f_name' => 'required',
            's_name' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed',
            'mobile' => 'required',
            'address' => 'required'
        ]);

        $cred = request(['f_name', 's_name', 'email', 'address', 'password', 'mobile']);
        if($cred['password'] == null)
            $cred['password'] = $pass;
        $cred['password'] = bcrypt($cred['password']);
//        dd($credentials);
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update($cred);
//        $user = \App\User::create($credentials
        return redirect('/user/edit');

    }

    public function updateImage(Request $request) {
//        return view('products.index');
//        return "xxxx";
//        $arr =   request()->all();
//        dd(request()->all());
//        return is_uploaded_file(request('image'));

        if(is_file('/users/images/'.auth()->user()->id)) {
            unlink(public_path('users/images/'.auth()->user()->id));
        }


        $image = request()->file('image');
//        return $request->file('image')->isValid();
//        dd($image);
        $name = auth()->user()->id.'.' . $image->extension();
        $image->move(base_path('/public/users/images'), $name);
        $user = auth()->user();
        $user->image = $name;
        $user->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
         $id = auth()->user()->id;
         auth()->logout();
        $user = User::find($id);
        $cart = $user->cart();
        $products = $user->product ();

        if($user->image!='default.png') {
            unlink(public_path('users/images/'.$user->image));
        }


        $cart->delete();
        $products->delete();
        $user->delete();
        return redirect()->home();
    }
}
