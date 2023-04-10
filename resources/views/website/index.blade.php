<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($websites as $website)
        <img src="/storage/{{ $website->ss }}" alt="ss">
        <a href="{{ route("websites.show", ['website'=>$website]) }}">Bruh</a>
    @endforeach
    <a href="{{ route('websites.create') }}">Create</a>
</body>
</html>