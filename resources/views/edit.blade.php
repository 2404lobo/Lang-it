<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Translation - Lang It</title>
    <link href="{{ URL::asset('assets/css/argon.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<header>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #f7b32b">
        <a class="navbar-brand" href="#">Lang it</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item disabled">
                    <a class="nav-link" href="#">Translations<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Past Translations  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
        </div>
        <form class="form-inline my-auto" action="{{ route('profile.edit') }}">
            <button class="btn-sm btn-outline my-2 my-sm-0" type="submit">Profile</button>
        </form>
    </nav>
</header>
<div class="col">
    <div class="container mt-5 px-8">
        <h1 class="text-center">Edit Translation: {{$translation->title}}</h1>
        <form action="{{route('home.update', $translation->id)}}" method="post">
            @method("put")    
            @csrf
            <input type="text my-1" class="form-control" value="{{$translation->title}}" id="title" name="title" placeholder="Title">
            <div class="row my-1">
                <div class="col">
                    <select class="form-control" selected="" id="originlanguage" name="originlanguage">
                        @foreach($langs as $language)
                        <option value="{{$language->id}}"
                            @if($language->id==old('finallanguage',$translation->originlanguage))
                                selected="selected" 
                            @endif
                        >{{$language->shortname}} - {{$language->fullname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1 pt-3 text-center">
                    to
                </div>
                <div class="col">
                    <select class="form-control" selected="{{$translation->finallanguage}}" id="finallanguage" name="finallanguage">
                        @foreach($langs as $language)
                        <option value="{{$language->id}}"
                            @if($language->id==old('finallanguage',$translation->finallanguage))
                                selected="selected" 
                            @endif
                        >{{$language->shortname}} - {{$language->fullname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <input type="number" value="{{$translation->progress}}" class="form-control" id="progress" name="progress" placeholder="Progress">    
                </div>
                <div class="col">
                    <input type="number" value="{{$translation->wordcount}}" class="form-control" id="wordcount" name="wordcount" placeholder="Wordcount">    
                </div>
            </div>
            <div class="row my-1">
                <input class="form-control mx-3" type="date" value="{{substr($translation->duedate,0,10)}}" name="duedate" id="duedate">
            </div>
            <div class="row">
                <div class="col text-right">
                    <a href="{{route('home')}}"><button type="button" class="btn btn-secondary">Cancel</button>
                    <button class="btn btn-primary">Update</button>    
                </div>
            </div>
            <input type="hidden" name="updated_at" value="{{now()}}">
        </form>
    </div>
</div>