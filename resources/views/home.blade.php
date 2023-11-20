{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Movies</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
      <style>
         .playnow_bt {
            background-color: #df9911;
            color: #ececec;
            font-size: 16px;
            padding: 7px 0px;
            width: 90px;
            border-radius: 30px;
         }
      </style>
   </head>
   <body>
      <a href="/logout">  <button class="dropdown-item" style="margin-left:1400px;" type="button"> <i class="fa fa-power-off" aria-hidden="true"></i>  Logout</button></a>

      <div class="header_section">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            {{-- <a class="logo" href="index.html"><img src="images/logo.png"></a> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  {{-- <li class="nav-item">
                     <a class="nav-link" href="index.html">Home</a>
                  </li> --}}
                  <li class="nav-item active">
                     <a class="nav-link" href="movies.html">Books</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{url('/books_list')}}">Filter By</a>
                  </li>
               </ul>
               @if(\Auth::user())
                  @if(\Auth::user()->role == "admin")
                     <div class="search_icon"><a href="{{url('/add_user')}}"><span class="padding_left_15">Add User</span></a></div>
                     <div class="search_icon"><a href="{{url('/add_book')}}"><span class="padding_left_15">Add Book</span></a></div>
                  @else
                     <div class="search_icon"><a href="{{url('/view_cart')}}"><span class="padding_left_15">View Cart</span></a></div>
                  @endif
               @endif
               {{-- <div class="search_icon"><a href="{{url('login')}}"><img src="images/user-icon.png"><span class="padding_left_15">login</span></a></div> --}}
            </div>
         </nav>
      </div>
      <div class="movies_section layout_padding">
         <div class="container">
            
            <div>
               <ul>
                  <input class="form-control form-control-sidebar" size="200" id="search" type="search" placeholder="Search" aria-label="Search">
               </ul>
            </div>
            <div class="movies_section_2 layout_padding" id="movies">
               {{-- <h2 class="letest_text">Letest Movies</h2> --}}
               {{-- <div class="seemore_bt"><a href="#">See More</a></div> --}}
               <div class="movies_main">
                  <div class="iamge_movies_main">
                     @foreach($books as $book)
                        <div class="iamge_movies">
                           <div class="image_3">
                              <img src={{$book->image}} class="image" style="max-width: 80px; max-height: 250px;width:100%;">
                              <div class="middle">
                                 <div class="playnow_bt" style="position:absolute; right:-20px;"><a href="{{url('/view_book_details/'.$book->id)}}">Details</a></div>
                              </div>
                           </div>
                           {{-- <h1 class="there_text"><a href="{{url('/view_book_details/'.$book->id)}}">{{$book->title}}</a></h1> --}}
                           <p class="there_text">{{$book->title}}</p>
                           <div class="star_icon">
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="seebt_1 see-more" data-page="2" data-link="{{url('/home?page=')}}" data-div="#movies"><a href="#">See More</a></div>
         </div>
      </div>
      
      <div class="copyright_section">
         <div class="container">
            <div class="copyright_text">Copyright 2019 All Right Reserved By <a href="{{url('/home')}}">The Online Book Store</a></div>
         </div>
      </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         $('#datepicker').datepicker({
             uiLibrary: 'bootstrap4'
         });
      </script>
   </body>
</html>
<script type="text/javascript">
   $(".see-more").click(function() {
      $div = $($(this).data('div'));
      $link = $(this).data('link');

      $page = $(this).data('page');
      $href = $link + $page;
      $.get($href, function(response) {
         $html = $(response).find("#movies").html();
         $div.append($html);
      });

      $(this).data('page', (parseInt($page) + 1));
   });

   $('#search').on('keyup',function(){
      $value=$(this).val();
      $.ajax({
         type : 'get',
         url: '/searched_books?' +search,
         data:{'search':$value},
         success:function(data){
            $('.iamge_movies_main').html('');
            $.each(data,function( key, value ) {
               console.log(value.title)
              $('.iamge_movies_main').append(
               `<div class="iamge_movies">
                  <div class="image_3">
                        <img src="`+value.image+`" class="image" style="max-width: 75px; max-height: 250px;width:100%;">
                           <div class="playnow_bt"><a href="/view_book_details/`+value.id+`">Details</a></div>
                     </div>
                     <p class="there_text">"`+value.title+`"</p>
                     <div class="star_icon">
                  </div>
               </div>`);
            });
         }
      });
   })
</script>