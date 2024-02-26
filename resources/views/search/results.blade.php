@if($books->count() > 0)
<h3>Search Results:</h3>
<table class="table">
    <thead>
        <tr>
            <th>Book Name</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Price</th>
            <th>Cover Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->publisher }}</td>
            <td>{{ $book->price }}</td>
            <td>
                <a href="#" class="image-link" data-image="/images/books/{{ $book->isbn}}-01.png"
                    data-title="{{ $book->name }}">
                    <img src="/images/books/{{ $book->isbn}}-01.png" alt="{{ $book->name }}" height="150px">
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No search results found.</p>
@endif

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        text-align: center;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.image-link', function (e) {
            e.preventDefault();
            var imageUrl = $(this).data('image');
            var title = $(this).data('title');
            var modalHtml = '<div class="modal">' +
                '<div class="modal-content">' +
                '<span class="close">&times;</span>' +
                '<img src="' + imageUrl + '">' +
                '</div>' +
                '</div>';

            $('body').append(modalHtml);

            $('.close').click(function () {
                $('.modal').remove();
            });

            $('.modal').fadeIn();
        });

        $(document).on('click', '.close', function () {
            $('.modal').fadeOut(function () {
                $('.modal').remove();
            });
        });
    });
</script>