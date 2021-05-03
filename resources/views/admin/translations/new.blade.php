<h1>Request new translation</h1>
<form action="{{ route('translations.store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id=title>
    <textarea name="message" id="message" cols="25" rows="5">
    </textarea>
    <button type="submit">Request</button>
</form>