<div class="message-wrapper text-dark p-3">
    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p>{{ $message->message }}</p>
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="input-text mb-5">
    <input type="text" name="message" class="submit">
</div>







{{-- <div class="message-wrapper">
    <ul class="messages">
        <li class="message clearfix">
            <div class="sent">
                <p>jffkglhlh;h;j'j;jj'j'j'j</p>
                <p class="date">1 Sep, 2019</p>
            </div>
        </li>
        <li class="message clearfix">
            <div class="sent">
                <p>jffkglhlh;h;j'j;jj'j'j'j</p>
                <p class="date">1 Sep, 2019</p>
            </div>
        </li>
        <li class="message clearfix">
            <div class="sent">
                <p>jffkglhlh;h;j'j;jj'j'j'j</p>
                <p class="date">1 Sep, 2019</p>
            </div>
        </li>
        <li class="message clearfix">
            <div class="sent">
                <p>jffkglhlh;h;j'j;jj'j'j'j</p>
                <p class="date">1 Sep, 2019</p>
            </div>
        </li>
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" class="submit">
</div> --}}





