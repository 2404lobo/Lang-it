@if (session('message'))
    <p>{{session('message')}}</p>
@endif
<h1>Translations</h1>
@foreach($translations as $translation)
    <p><b>{{$translation->title}}</b><p><br>
    <p>{{$translation->message}}<p><br>
    <a href="{{route('translations.show',$translation->id)}}">View</a><br>
    <a href="{{route('translations.edit',$translation->id)}}">Update</a>
    <form action="{{route('translations.destroy', $translation->id)}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Delete</button>        
    </form>
    <-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=->
@endforeach

<a href="{{ route('translations.new') }}">Add new</a>