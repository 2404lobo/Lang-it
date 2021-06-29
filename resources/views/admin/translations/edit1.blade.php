<h1>Change translation {{$translation->title}}</h1>
@if ($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
@endif
<form action="{{route('translations.store',$translation->id)}}" method="post">
    @csrf
    <input type="text" name="title" id=title value="{{$translation->title}}">
    <textarea name="message" id="message" cols="25" rows="5">{{$translation->message}}</textarea>
    <button type="submit">Update Request</button>
</form>