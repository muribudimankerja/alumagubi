<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" >
      <link rel="stylesheet" href="{{asset('bootstrap/album.css')}}" >
      <link rel="stylesheet" href="{{asset('bootstrap/fontawesome/css/all.min.css')}}" >
      <title>Hello, world!</title>
   </head>
   <body>
      <header>
         <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
               <div class="row">
                  <div class="col-sm-8 col-md-7 py-4">
                     <h4 class="text-white">About</h4>
                     <p class="text-muted">Add some information about the Product below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                  </div>
                  <div class="col-sm-4 offset-md-1 py-4">
                     <h4 class="text-white">Contact</h4>
                     <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
               <a href="#" class="navbar-brand d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false">
                     <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                     <circle cx="12" cy="13" r="4"/>
                  </svg>
                  <strong>Product</strong>
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
            </div>
         </div>
      </header>
      <main role="main">
         <section class="jumbotron text-center">
            <div class="container">
               <h1>Search Product</h1>
               <div class="row">
                <div class="col-12 m-t-2">
                    <form action="{{route('welcome')}}" method="GET">
                        <div class="input-group rounded">
                            <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                              aria-describedby="search-addon" value="{{$search}}" />
                            <span class="input-group-text border-0" id="search-addon">
                              <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
               </div>
            </div>
         </section>
         <div class="album py-5 bg-light">
            <div class="container">
               <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            @foreach($categories as $category)
                                <a href="{{route('welcome', ['category_id' => $category->category_id])}}" class="list-group-item list-group-item-action @if($category_id == $category->category_id) active @endif">
                                    {{$category->name}} <span class="badge badge-danger">{{$category->products->count()}}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{++$i}}</th>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-12 text-center">
                                {{ $products->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4') }}
                            </div>
                       </div>
                    </div>                             
               </div>
            </div>
         </div>
      </main>
      <footer class="text-muted">
         <div class="container">
            <p class="float-right">
               <a href="#">Back to top</a>
            </p>
            <p>Product example is &copy; Bootstrap, but please download and customize it for yourself!</p>
         </div>
      </footer>

      <!-- Modal -->
      <div class="modal fade" id="synopsis" tabindex="-1" role="dialog" aria-labelledby="synopsisModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Synopsis</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div id="synopsisModalBody" class="modal-body"></div>
         </div>
         </div>
      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{asset('bootstrap/jquery.min.js')}}" ></script>
      <script src="{{asset('bootstrap/popper.min.js')}}" ></script>
      <script src="{{asset('bootstrap/js/bootstrap.min.js')}}" ></script>
      <script src="{{asset('bootstrap/fontawesome/js/all.min.js')}}" ></script>

      <script>
         $('#synopsis').on('shown.bs.modal', function (e) {
            var synopsis = $(e.relatedTarget).data("synopsis");
            $("#synopsisModalBody").html(synopsis);
         })
      </script>
   </body>
</html>