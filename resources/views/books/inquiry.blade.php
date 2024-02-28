<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Inquiry</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('inquiry.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="item_name" class="form-label">Item Name:</label>
                <input type="text" class="form-control" name="item_name" value="{{ old('item_name') }}">
            </div>

            <div class="mb-3">
                <label for="pickup_date" class="form-label">Pickup Date:</label>
                <input type="text" id="pickup_date" class="form-control" name="pickup_date" placeholder="Pickup Date">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#pickup_date").datepicker({
                minDate: 0,
                maxDate: "+1M",
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
</body>

</html>