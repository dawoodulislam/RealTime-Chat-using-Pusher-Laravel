@extends('admin.master')

@section('body')

<style>
    .user-wrapper ul,
    .message-wrapper ul {
        margin: 0;
        padding: 0;
    }

    .user-wrapper li,
    .message-wrapper li {
        list-style: none;
    }

    .user-wrapper,
    .message-wrapper {
        border: 1px solid #dddddd;
        overflow-y: auto;
    }

    .user-wrapper {
        height: 600px;
    }

    .user {
        cursor: pointer;
        padding: 5px 0;
        position: relative;
    }

    .user:hover {
        background-color: #eee;
    }

    .user:last-child {
        margin-bottom: 0;
    }

    .media {
        margin-top: 0;
    }

    .pending {
        position: absolute;
        left: 23px;
        top: 25px;
        background-color: #055999;
        margin: 0;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        line-height: 18px;
        padding-left: 5px;
        color: #fff;
        font-size: 12px;
    }

    .media-left {
        margin: 0 10px;
    }

    .media-body p {
        margin: 6px 0;
    }

    .message-wrapper {
        overflow-y: auto;
        padding: 10px;
        height: 536px;
        background-color: #eee;
    }

    .messages .message {
        margin-bottom: 15px;
    }

    .messages .message:last-child {
        margin-bottom: 0;
    }

    .received,
    .sent {
        width: 45%;
        padding: 3px 10px;
        border-radius: 7px;
    }

    .received {
        background-color: #fff;
    }

    .sent {
        background-color: #FFC02A;
        float: right;
        text-align: right;
    }

    .message p {
        margin: 5px 0;
    }

    .date {
        color: #777;
        font-size: 12px;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 15px 0 0 0;
        display: inline-block;
        border-radius: 5px;
        box-sizing: border-box;
        outline: none;
        border: 1px solid #ccc;
    }

    input[type=text]:focus {
        border: 1px solid #aaa;
    }

    .media-left,
    .media-right,
    .media-body {
        padding: 0 60px;
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Deal Messages</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>



<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $key => $message)
        <li class="message clearfix">
            <div class="{{ ($message->provider_id == $r_id )? 'sent' : 'receiver' }}">
                <p>{{ $message->message }}</p>
                <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                <p class="date">{{ $message->customer->name }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>


@endsection