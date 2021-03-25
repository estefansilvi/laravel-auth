<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games-Library</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="flex-center position-ref full-height">
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('games.create')}}">Add</a>
                </li>


                <li class="nav-item">
                    @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="nav-link">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>

                                @if (Route::has('register'))
                <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                                @endif
                            @endauth
                            @endif
          </ul>
           <form class="form-inline" method="post" action="{{route('games.home')}}">
            @csrf
            @method('GET')
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="item">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

    <table class="table">
        <thead class="thead-dark">
          <tr>

            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Cover</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($games as $item)
            <tr>

              <td>{{$item->name}}</td>
              <td>{{$item->console}}</td>
              <td>{{$item->price}}</td>
              <td><img src="{{$item->cover}}" width="200" alt="" ></td>
              <td>
                  <button  type="button" class="btn btn-primary">
                  <a href="{{route('games.show.public',['game' => $item->id])}}"><i class="fas fa-eye"></i></a>
                  </button>

                  @if (Auth::check())

                  <form action="{{route('games.destroy',['game' => $item->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                        <i class="fas fa-bomb"></i>
                    </button>
                    @include('parts.modal',['game'=> $item->id])
                </form>
                <button  type="button" class="btn btn-success"  href="{{route('games.edit',['game' => $item->id])}}">
                    <a href="{{route('games.edit',['game' => $item->id])}}"><i class="fas fa-edit"></i></a>
                </button>

                @endif

            </td>
        </tr>
        @endforeach
        </tbody>
      </table>

</body>
</html>
