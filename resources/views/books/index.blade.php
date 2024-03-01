<!DOCTYPE html>
<html>
<head>
  <title>My first Laravel Bookstore</title>
  <script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.tablesorter.js"></script>
  <script type="text/javascript" src="/js/jquery.tablesorter.widgets.js"></script>
  <link rel="stylesheet" href="/css/theme.default.min.css">
  <link rel="stylesheet" href="/css/app.css">
</head>

<body>

  @extends('layout')
    @section('content')
      @if(session()->get('success'))
      <aside class="alert">
        {{ session()->get('success') }}
      </aside>
      @endif

  <div class="card">
    <div class="card-body">
      <aside class="search-container">
        <div class="card">
          <div class="card-body">
            <h2>Search Books</h2>
            <input type="text" id="searchInput" class="input-large" placeholder="Enter book name">
            <button type="button" class="btn btn-primary" id="searchButton">Search</button>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
          <a href="{{ route('inquiry') }}" class="a-large">Submit a Book Inquiry</a>
          </div>
        </div>
      </aside>

      <article class="table-container">
        <div class="card">
          <div class="card-body">
            <article id="searchResults"></article>
            <h2>Books</h2>
            <table id="myTable" class="table tablesorter">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Book Name</th>
                  <th>Author</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach($books as $key => $book)
                <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }}">
                  <td><a href="{{ route('books.show', $book->id)}}">{{$book->id}}</a></td>
                  <td><a href="{{ route('books.show', $book->id)}}">{{$book->name}}</a></td>
                  <td>{{$book->author}}</td>
                  <td>{{$book->price}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div> 
      </article>
    </div>
  </div>
  @endsection
</body>

</html>


<script>
    $(document).ready(function () {
      $('#myTable').tablesorter({
        widgets: ['zebra']
      });

      $('#searchButton').click(function () {
        var query = $('#searchInput').val();
        if (query !== '') {
          $.ajax({
            url: '/search',
            type: 'GET',
            data: {
              query: query
            },
            success: function (response) {
              $('#searchResults').html(response);
            },
            error: function (xhr) {
              console.log(xhr.responseText);
            }
          });
        }
      });
    });
  </script>

<style>
  body {
    margin: 0, 0, 0;
    padding-top: 0;
  }
  div.container {
    margin: auto;
    margin-top: 12%;
}
aside.search-container {
  float: left;
  width: 25%;
  padding: 10px;
  background-color: #fff;
  z-index: 1;
}
  aside.table-container {
    margin-left: auto;
    margin-right: auto;
}
input.input-large {
  width: 100%;
  padding: 8px;
  font-size: 16px; 
}
a.a-large {
  font-size: 18px;
}
h2 {
  font-family: 'Pacifico', cursive;
}
</style>