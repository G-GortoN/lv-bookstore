<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Inquiry</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('inquiry.store') }}" method="POST">
            @csrf
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" value="{{ old('username') }}">
            </div>

            <div>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                <label for="item_name">Item Name:</label>
                <input type="text" name="item_name" value="{{ old('item_name') }}">
            </div>

            <div>
                <label for="pickup_date">Pickup Date:</label>
                <input type="text" id="pickup_date" name="pickup_date" placeholder="Pickup Date">
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#pickup_date").datepicker({
                minDate: 0,
                maxDate: "+1M"
            });
        });
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        button[type="submit"] {
            padding: 8px 16px;
            background-color: #4caf50;
            border: none;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }

        .alert {
            background-color: #f44336;
            color: #fff;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        ul li {
            list-style: none;
            margin-bottom: 5px;
        }
    </style>


</body>

</html>