

<!-- <div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $key => $message)
        <li class="message clearfix">
            <div class="{{ ($message->provider_id == Session::get('provider_id'))? 'sent' : 'receiver' }}">
                <p>{{ $message->message }}</p>
                <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>


<div class="input-message write">
    <input type="text" name="message" />
    <a href="javascript:;" class="write-link send"></a>
</div> -->
@if(Session::get('provider_id'))
<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $key => $message)
        <li class="message clearfix">
            <div class="{{ ($message->provider_id == Session::get('provider_id'))? 'sent' : 'received' }}">
                <p>{{ $message->message }}</p>
                <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@elseif(Session::get('customer_id'))
<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $key => $message)
        <li class="message clearfix">
            <div class="{{ ($message->provider_id == Session::get('customer_id'))? 'sent' : 'received' }}">
                <p>{{ $message->message }}</p>
                <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
<div class="input-text input-message write">
    <input type="text" name="message" class="submit">
</div>