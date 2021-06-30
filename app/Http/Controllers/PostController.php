<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use App\Models\Post;
use App\Models\Provider;
use App\Models\Service;
use App\Models\Deal;
use Illuminate\Http\Request;
use MyEvent;
use Pusher\Pusher;

use Session;

class PostController extends Controller
{
    public function index()
    {
        return view('front.post.create', [
            'services' => Service::all()
        ]);
    }

    public function add(Request $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageName = time() . '-' . $imageName;
        $directory = 'post-image/';
        $image->move($directory, $imageName);
        $imageURL = $directory . $imageName;

        $post = new Post();
        $post->service_id = $request->service_id;
        $post->provider_id = Session::get('provider_id');
        $post->price = $request->price;
        $post->description = $request->description;
        $post->long_description = $request->long_description;
        $post->image = $imageURL;
        $post->approve = 0;
        $post->save();

        return redirect()->back()->with('message', 'Wait for the admin approval');
    }

    public function view()
    {
        return view('front.post.view', [
            'posts' => Post::where('provider_id', Session::get('provider_id'))->where('approve', 1)->get()
        ]);
    }

    public function details($id)
    {
        // if (Session::get('provider_id')) {

        if (Session::get('provider_id')) {
            $messages = Message::where('post_id', $id)->where('customer_id', Session::get('provider_id'))->get();
            // return $messages;
        } else if (Session::get('customer_id')) {
            $messages = Message::where('post_id', $id)->where('provider_id', Session::get('customer_id'))->get();
            // return 1;
        }


        // $messages = Message::where('post_id', $id)->where('provider_id', Session::get('provider_id'))->get();


        // $cus_id = ;
        $customers = [];


        if (Session::get('provider_id')) {
            foreach ($messages as $message) {
                $customers[] = $message->provider_id;
            }
        } else if (Session::get('customer_id')) {
            foreach ($messages as $message) {
                $customers[] = $message->provider_id;
            }
        }

        // return $customers;

        // foreach($messages as $message){
        //     $customers = $message->customer_id;
        // }



        // $customers = array_unique($customers, SORT_REGULAR);

        $customers = array_values( array_flip( array_flip( $customers ) ) );

        // return $customers;
        $users = Customer::whereIn('id', $customers)->get();

        // return $users;
        // }
        return view('front.post.details', [
            'post' => Post::where('id', $id)->first(),
            'users' => $users
        ]);
    }

    public function detailsCustomer($id)
    {
        $post = Post::where('id', $id)->first();

        // $deal = Deal::where('post_id', $id)->first();

        return view('front.post.post-details', [
            'post' => $post,
            'users' => Customer::where('id', $post->provider->id)->where('access_label', 1)->get(),
            // 'deal' => $deal
        ]);
    }

    public function getMessage($id)
    {
        $my_id = 0;
        if (Session::get('provider_id')) {
            $my_id = Session::get('provider_id');
        } else if (Session::get('customer_id')) {
            $my_id = Session::get('customer_id');
        }

        // return $my_id;


        $messages = Message::where(function ($query) use ($id, $my_id) {
            $query->where('provider_id', $my_id)->where('customer_id', $id)->where('post_id', Session::get('post_id'));
        })->orWhere(function ($query) use ($id, $my_id) {
            $query->where('provider_id', $id)->where('customer_id', $my_id)->where('post_id', Session::get('post_id'));
        })->get();

        // $messages = Message::where()->orWhere()->get();

        // return $messages;

        return view('front.post.message-pro', [
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request)
    {

        // return $request->all();

        $from = 0;



        // $from = Session::get('provider_id');
        $to = $request->receiver_id;
        $message = $request->message;



        $data = new Message();

        if (Session::get('provider_id')) {
            $from = Session::get('provider_id');
            $data->provider_id = $from;
            $data->customer_id = $to;
        } else if (Session::get('customer_id')) {
            $from = Session::get('customer_id');
            $data->provider_id = $from;
            $data->customer_id = $to;
        }



        $data->post_id = $request->post_id;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        // broadcast(new NewMessage($message));

        $data = ['provider_id' => $from, 'customer_id' => $to, 'message' => $message];
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function adminApprove(){
        $deal = new Deal();
        $deal->approve = 0;
        $deal->post_id = Session::get('post_id') ;
        $deal->provider_id = Session::get('provider') ;
        $deal->customer_id = Session::get('customer_id');
        $deal->save();

        $post = Post::where('id', Session::get('post_id'))->first();
        // return redirect()->back()->with('message', 'Thanks for the dealing with this provider. Wait for the admin approval. After approve you will able to see contact information of this Provider.');
        return view('front.post.post-details', [
            'post' => $post,
            'users' => Customer::where('id', $post->provider->id)->where('access_label', 1)->get()
        ]);
    }
}
