<h1>Translates</h1>

@foreach($translations as $translation)
    <p><b>{{$translation->title}}</b><p>
    <p>{{$translation->message}}<p>
@endforeach

<a href="{{ route('translations.new') }}">Add new</a>