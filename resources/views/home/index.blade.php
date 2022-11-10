<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Scrabble Counter</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
                <ul class="list-unstyled" style="margin-bottom: 0px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mt-5 px-2" style="width: 100%; text-align: center;">
            <h1 class="display-1">Scrabble Counter</h1>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 300px;">

            @if(!isset($score))
                <form method="POST" action="/">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" id="word" placeholder="Enter word" name="word" style="text-align: center;">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 col-6 offset-3">Count</button>
                </form>
            @else
                <form>
                    @csrf

                    <div style="text-align: center">This word's score is {{ $score }}</div>

                    <a href="/" type="submit" class="btn btn-primary col-6 offset-3 mt-3">Count another</a>
            @endif
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>