<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Message;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function addService()
    {
        return view('admin.service.add');
    }

    public function manageService()
    {
        return view('admin.service.manage', [
            'services' => Service::all()
        ]);
    }

    public function newService(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();

        return redirect()->back()->with('message', 'New Service Added Successfully');
    }

    public function editService($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', [
            'service' => $service
        ]);
    }

    public function updateService(Request $request)
    {
        $service = Service::find($request->id);

        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();

        return redirect('/manage-service')->with('message', 'Service Updated Successfully');
    }

    public function deleteService($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect('/manage-service')->with('message', 'Service Deleted Successfully');
    }

    public function managePost()
    {
        return view('admin.post.post', [
            'deals' => Deal::where('approve', 0)->get()
        ]);
    }

    public function approveDeal($id)
    {
        $deal = Deal::where('id', $id)->first();
        $deal->approve = 1;
        $deal->save();

        return redirect()->back();
    }

    public function dealMessage($id)
    {
        $deal = Deal::where('id', $id)->first();

        $r_id = $deal->provider_id;
        $s_id = $deal->customer_id;
        $p_id = $deal->post_id;

        $messages = Message::where(function ($query) use ($s_id, $r_id, $p_id) {
            $query->where('provider_id', $r_id)->where('customer_id', $s_id)->where('post_id', $p_id);
        })->orWhere(function ($query) use ($s_id, $r_id, $p_id) {
            $query->where('provider_id', $s_id)->where('customer_id', $r_id)->where('post_id', $p_id);
        })->get();

        return view('admin.post.messages', [
            'messages' => $messages,
            'r_id' => $r_id,
            's_id' => $s_id
        ]);
    }

    public function managePosts()
    {
        return view('admin.post.posts',[
            'posts' => Post::all()
        ]);
    }

    public function approvePost($id){
        
        return view('admin.post.post-approve',[
            'post' => Post::where('id', $id)->first()
        ]);
    }

    public function updatePost(Request $request){
        $post = Post::find($request->id);

        $post->approve = $request->approve;
        $post->save();

        return redirect('/manage-posts')->with('message', 'Post Updated Successfully');
    }
}
