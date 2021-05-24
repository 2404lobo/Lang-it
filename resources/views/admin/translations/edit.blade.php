<h1>Change translation {{$post->title}}</h1>
@if ($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
@endif
<form action="{{ route('translations.store', $post->id) }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id=title value="{{$post->title}}">
    <textarea name="message" id="message" cols="25" rows="5">{{$post->message}}</textarea>
    <button type="submit">Update Request</button>
</form>