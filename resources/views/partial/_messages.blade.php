@if (session()->get('messages'))
    <div class="alert {{session()->get('error')?'alert-danger':'alert-success'}}">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach (session('messages') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif