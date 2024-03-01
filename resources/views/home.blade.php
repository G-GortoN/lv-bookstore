<link rel="stylesheet" href="/css/app.css">
@extends('layout')

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
@endsection

<script>
    function redirectToBooksPage() {
        setTimeout(function() {
            window.location.href = '/books';
        }, 3000);
    }
    window.onload = redirectToBooksPage;
</script>

<style>
      div.container {
    margin: auto;
    margin-top: 12%;
}
</style>
