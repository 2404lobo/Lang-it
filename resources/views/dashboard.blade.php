<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My translations - Lang It</title>
    <link rel="stylesheet" type="text/css" href="assets/css/argon.css">
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
                    <a class="nav-link" href="#">Orders</a>
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
<body>
    <div class="col">
        <div class="container pt-7">
            <div class="row">
                <div class="col-8">
                    <div class="container py-3" style="background-color: #f7b32b">
                        <div class="row justify-content-between px-4">
                            <Text style="font-size:28">My Translations</Text>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddNew">Add New</button>
                        </div>
                    </div>
                    <div class="container py-1 mx-auto" style="width:100%;background-color: #ffde9c">
                        <div class="row align-items-center">
                            <div class="col-4 py-1">Title</div>
                            <div class="col-2 pl-3 py-1">Languages</div>
                            <div class="col-1 pl-0 py-1">Progress</div>
                            <div class="col-1 py-1">Due</div>
                            <div class="col py-1">Requested by</div>
                        </div>
                        @foreach($translations as $translation)
                            <div class="row align-items-center">
                                <div class="col-4 py-1" style="font-size:14">{{$translation->title}}</div>
                                <div class="col-2 py-1" style="font-size:14">
                                    <div class="row">
                                        {{$translation->lang1}} to {{$translation->lang2}}
                                    </div>
                                </div>
                                <div class="col-1 py-1" style="font-size:14">{{($translation->progress/$translation->wordcount)*100}}%</div>
                                <div class="col-1 py-1" style="font-size:14">{{substr($translation->duedate,8,2)}}/{{substr($translation->duedate,5,2)}}</div>
                                <div class="col py-1" style="font-size:14">{{$translation->requestedby}}</div>
                                <div class="row-1 mr-3 pt-2">
                                    <div>
                                        <form method="post" action="{{route('home.edit',$translation->id)}}" method="get">
                                            <button type="submit mx-1" class="btn btn-primary btn-sm mr-1">Edit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-4">
                    <div class="container py-3" style="height:350px;background-color: #f7b32b">
                        <Text>Calendar</Text>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="ModalAddNewTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('home.new')}}" method="post" id="newTranslation">
                    @csrf
                    <div class="modal-header pb-1">
                        <h5 class="modal-title" id="ModalNewTitle">Add new Translation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-1">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        <div class="row">
                            <div class="col">
                                <select class="form-control" id="originlanguage" name="originlanguage">
                                    @foreach($langs as $language)
                                    <option value="{{$language->id}}">{{$language->shortname}} - {{$language->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1 pt-3">
                                to
                            </div>
                            <div class="col">
                                <select class="form-control" is="finallanguage" name="finallanguage">
                                    @foreach($langs as $language)
                                    <option value="{{$language->id}}">{{$language->shortname}} - {{$language->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" id="wordcount" name="wordcount" placeholder="Wordcount">
                            </div>
                            <div class="col">
                                <input class="form-control" type="date" name="duedate" id="duedate">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <input type="hidden" name="requestedby" value="{{auth()->id()}}">
                    <input type="hidden" name="translatorid" value="{{auth()->id()}}">
                    <input type="hidden" name="progress" value=0>
                    <input type="hidden" name="created_at" value="{{now()}}">
                    <input type="hidden" name="updated_at" value="{{now()}}">
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="ModalAddNewTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('home')}}" method="get" id="editTranslation">
                    @csrf
                    <div class="modal-header pb-1">
                        <h5 class="modal-title" id="ModalNewTitle">Add new Translation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-1">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        <div class="row">
                            <div class="col">
                                <select class="form-control" id="originlanguage" name="originlanguage">
                                    @foreach($langs as $language)
                                    <option value="{{$language->id}}">{{$language->shortname}} - {{$language->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1 pt-3">
                                to
                            </div>
                            <div class="col">
                                <select class="form-control" is="finallanguage" name="finallanguage">
                                    @foreach($langs as $language)
                                    <option value="{{$language->id}}">{{$language->shortname}} - {{$language->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" id="wordcount" name="wordcount" placeholder="Wordcount">
                            </div>
                            <div class="col">
                                <input class="form-control" type="date" name="duedate" id="duedate">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <input type="hidden" name="requestedby" value="{{auth()->id()}}">
                    <input type="hidden" name="translatorid" value="{{auth()->id()}}">
                    <input type="hidden" name="progress" value=0>
                    <input type="hidden" name="created_at" value="{{now()}}">
                    <input type="hidden" name="updated_at" value="{{now()}}">
                </form>
            </div>
        </div>
    </div>
</body>