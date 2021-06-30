<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use Session;

class CustomerController extends Controller
{
    public function new()
    {
        return view('front.customer-login.login');
    }

    public function add(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        $customer->access_label = $request->access_label;
        $customer->save();

        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);

        return redirect('/');
    }

    public function logout(Request $request){
        Session::forget('customer_id');
        Session::forget('customer_name');
        Session::forget('provider_name');
        Session::forget('provider_id');

        return redirect('/');
    }

    public function login()
    {
        return view('front.customer-login.customerLogin');
    }

    public function check(Request $request)
    {

        $customer = Customer::where('email', $request->email)->first();

        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                Session::put('customer_id', $customer->id);
                Session::put('customer_name', $customer->name);
                return redirect('/');
            } else {
                return redirect()->back()->with('message', 'Sorry Your Password is not matched');
            }
        } else {
            return redirect()->back()->with('message', 'Sorry Your email address is not matched');
        }
    }
}
