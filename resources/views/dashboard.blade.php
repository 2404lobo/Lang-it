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
<body>
    <div class="col">
        <div class="container mt-5">
            <div class="row">
                <div class="col-8">
                    <div class="container py-3" style="background-color: #f7b32b">
                        <div class="row justify-content-between px-4">
                            <Text style="font-size:28">My Translations</Text>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddNew">Add New</button>
                        </div>
                    </div>
                    <div class="container py-1 mx-auto" style="width:100%;background-color: #ffde9c">
                        <table class="table table-sm borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-left">Title</th>
                                    <th scope="col" class="text-center">Languages</th>
                                    <th scope="col" class="text-center">Progress</th>
                                    <th scope="col" class="text-center">Due</th>
                                    <th scope="col" class="text-left">Requested by</th>
                                    <th scope="col" class="text-center"></th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($translations as $translation)
                                <tr>
                                    <td style="display:none;">{{$translation->id}}</td>
                                    <td class="text-left align-middle">{{$translation->title}}</td>
                                    <td class="text-center align-middle">{{$translation->lang1}} to {{$translation->lang2}}</td>
                                    <td class="text-center align-middle">{{substr((($translation->progress/$translation->wordcount)*100),0,5)}}%</td>
                                    <td class="text-center align-middle">{{substr($translation->duedate,8,2)}}/{{substr($translation->duedate,5,2)}}</td>
                                    <td class="text-left align-middle">{{$translation->requestedby}}</td>
                                    <td class="text-center" class="py-1">
                                        <a href="{{route('home.edit',$translation->id)}}"><button type="button" class="btn btn-primary btn-sm mr-1">Edit</button></a>
                                    </td>
                                    <td class="text-center" class="py-1">
                                        <form class="my-0 py-0" action="{{route('home.destroy',$translation->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm mr-1">Delete</button>        
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <div class="modal fade" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="ModalNew" aria-hidden="true">
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
                        <input type="text my-1" class="form-control" id="title" name="title" placeholder="Title">
                        <div class="row my-1">
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
                                <select class="form-control" id="finallanguage" name="finallanguage">
                                    @foreach($langs as $language)
                                    <option value="{{$language->id}}">{{$language->shortname}} - {{$language->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
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
                    <input type="hidden" name="requestedby" value="0">
                    <input type="hidden" name="translatorid" value="{{auth()->id()}}">
                    <input type="hidden" name="progress" value=0>
                    <input type="hidden" name="created_at" value="{{now()}}">
                    <input type="hidden" name="updated_at" value="{{now()}}">
                </form>
            </div>
        </div>
    </div>
    {{--
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Translation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure about this?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('home.delete', $translation->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes, delete it</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancel it</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="ModalEdit" aria-hidden="true">\
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('home')}}" method="get" id="editTranslationForm">
                    @csrf
                    <div class="modal-header pb-1">
                        <h5 class="modal-title" id="ModalEditTitle">Edit Translation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-1">
                        <input type="text my-1" class="form-control" id="title" name="title" placeholder="Title">
                        <div class="row my-1">
                            <div class="col">
                                <select class="form-control" id="originlanguage" name="originlanguage" value="OriginLanguage">
                                    @foreach($langs as $language)
                                    <option value="{{$language->id}}">{{$language->shortname}} - {{$language->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1 pt-3">
                                to
                            </div>
                            <div class="col">
                                <select class="form-control" is="finallanguage" name="finallanguage" value="FinalLanguage">
                                    @foreach($langs as $language)
                                    <option value="{{$language->id}}">{{$language->shortname}} - {{$language->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col">
                                <input type="number" class="form-control" id="progress" name="progress" placeholder="Progress">    
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="wordcount" name="wordcount" placeholder="Wordcount">    
                            </div>
                        </div>
                        <div class="row my-1">
                            <input class="form-control mx-3" type="date" name="duedate" id="duedate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <input type="hidden" name="updated_at" value="{{now()}}">
                </form>
            </div>
        </div>
    </div>
    --}}
</body>
{{--
<script>
$(document).ready(function () {
    $('.editTranslation').on('click',function(e){
        $('#ModalEdit').modal('show');
        $tr = $(this).closest('tr');
        $data=$tr.children('td').map(function(){
            return $(this).text();
        }).get();

        $('#title').val("{{$translations[$data[0]]->title}}");
        $('#originlanguage').val({{$translations[$data[0]]->lang1id}});
        $('#finallanguage').val({{$translations[$data[0]]->lang2id}});
        $('#progress').val({{$translations[$data[0]]->progress}});
        $('#wordcount').val({{$translations[$data[0]]->wordcount}});
        $('#duedate').val("{{$translations[$data[0]]->duedate}}");
    });
})
</script>
--}}