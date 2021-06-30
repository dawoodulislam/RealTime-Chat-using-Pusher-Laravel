<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Provider;
use Illuminate\Http\Request;

use Session;

class ProviderController extends Controller
{
    public function newProvider()
    {
        return view('front.provider-login.login');
    }

    public function addProvider(Request $request)
    {
        $provider = new Customer();
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->mobile = $request->mobile;
        $provider->address = $request->address;
        $provider->access_label = $request->access_label;
        $provider->password = bcrypt($request->password);
        $provider->save();

        Session::put('provider_id', $provider->id);
        Session::put('provider_name', $provider->name);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Session::forget('provider_id');
        Session::forget('provider_name');
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

    public function login()
    {
        return view('front.provider-login.providerlogin');
    }

    public function check(Request $request)
    {

        $provider = Customer::where('email', $request->email)->first();

        if ($provider) {
            if (password_verify($request->password, $provider->password)) {
                Session::put('provider_id', $provider->id);
                Session::put('provider_name', $provider->name);
                return redirect('/');
            } else {
                return redirect()->back()->with('message', 'Sorry Your Password is not matched');
            }
        } else {
            return redirect()->back()->with('message', 'Sorry Your email address is not matched');
        }
    }
}
