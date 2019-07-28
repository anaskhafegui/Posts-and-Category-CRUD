<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            a,a:hover {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                color: #ffffff;
                background-color: 
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                text-decoration: none;
                text-transform: uppercase;
                
            }
            h5{
                font-family: Georgia, 'Times New Roman', Times, serif
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        @if (Session::has('success'))
            
        <div class="alert alert-primary" role="alert">
                {{ Session::get('success')}}
              </div>


        @endif
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
           

                <div class="col-md-8 ">

                        <h1>TodoList</h1>

                    <form method="POST"  action="/save">

                        {{ csrf_field() }}
                      
                        <div class="form-group">
                            <label for="todo"></label>
                            <input type="text" name="todo" class="form-control" placeholder="enter">
                        </div>
                          
                        <div class="form-group">
                        <button type="submit" class="btn btn-success">create</button>

                        </div>  
                                   
                    </form>    

                    <div class="form-group">
                            
                                 
                              
                            <ul>
                                @foreach ($todofetch as $todo)
                                @if(!$todo->completed)
                                <li class="form-controller"><h5>{{ $todo->todo }}</h5></li>
                                <button  class="btn btn-primary"><a href="/todo/update/{{$todo->id}}">  Edit    </a></button>
                                <button  class="btn btn-danger"><a href="/todo/delete/{{$todo->id}}"> Delete  </a></button>

                                
                                <button  class="btn btn-danger"><a href="/todo/completed/{{$todo->id}}"> Completed  </a></button>
                                    
                                @else
                                <li class="form-controller"><strike>{{ $todo->todo }}</strike></li>
                                <button  class="btn btn-danger"><a href="/todo/uncompleted/{{$todo->id}}"> UnCompleted  </a></button>
                                
                                    
                                @endif
                                
                                @endforeach
                            </ul>

                            
                        </div>   
                </div>  
                   
                

              
                     
                                      
               

             
            
            
    </body>
</html>
