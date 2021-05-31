@if (session('message'))
    <p>{{session('message')}}</p>
@endif
<h1>Translations</h1> <a href="{{ route('translations.new') }}">Add new</a>
<form action="{{route('translations.search')}}" method="post">
    @csrf
    <input type="text" name="filtro">
    <button type="submit">filtrar</button>
</form>
@foreach($translations as $translation)
    <p><b>{{$translation->title}}</b><p><br>
    <p>{{$translation->message}}<p><br>
    <a href="{{route('translations.show',$translation->id)}}">View</a><br>
    <a href="{{route('translations.edit',$translation->id)}}">Update</a>
    <form action="{{route('translations.destroy', $translation->id)}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Delete</button>        
    </form>
    -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-   
@endforeach
<br>
@if(isset($filtro))
    {{$translations->appends($filtro)->links()}}
@else
    {{$translations->links()}}
@endif