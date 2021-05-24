<h1>Request new translation</h1>
@if ($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
@endif
<form action="{{ route('translations.store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id=title value="{{old('title')}}">
    <textarea name="message" id="message" cols="25" rows="5">{{old('message')}}</textarea>
    <button type="submit">Add New Request</button>
</form>