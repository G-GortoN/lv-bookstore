<!DOCTYPE html>
<html>

<head>
  <title>My first Laravel Bookstore</title>
  <script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.tablesorter.js"></script>
  <script type="text/javascript" src="/js/jquery.tablesorter.widgets.js"></script>
  <link rel="stylesheet" href="/css/theme.default.min.css">
  <!-- <link rel="stylesheet" href="/css/app.css"> -->
</head>

<body>

  @extends('layout')
  @section('content')
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>

  @if(session()->get('success'))
  <aside class="alert">
    {{ session()->get('success') }}
  </aside>
  @endif

  <aside class="search-container">
    <h3>Search Books</h3>
    <input type="text" id="searchInput" placeholder="Enter book name">
    <button id="searchButton">Search</button>
    <div id="searchResults"></div>
  </aside>

  <article class="table-container">
    <a href="{{ route('inquiry') }}">Submit a Book Inquiry</a>
    <h2>Books</h2>
    <table id="myTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Book Name</th>
          <th>Author</th>
          <th>Price</th>
        </tr>
      </thead>

      <tbody>
        @foreach($books as $book)
        <tr>
          <td><a href="{{ route('books.show',$book->id)}}">{{$book->id}}</a></td>
          <td><a href="{{ route('books.show',$book->id)}}">{{$book->name}}</a></td>
          <td>{{$book->author}}</td>
          <td>{{$book->price}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </article>

  <script>
    $(document).ready(function () {
      $('#myTable').tablesorter();

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

  @endsection
</body>

</html>