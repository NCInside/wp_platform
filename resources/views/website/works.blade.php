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
        <a href="{{ route("websites.show", ['website'=>$website]) }}">Show</a>
        <a href="{{ route("websites.edit", ['website'=>$website]) }}">Edit</a>
        <form action="{{route("websites.destroy", ['website'=>$website]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="">
                Delete
            </button>
        </form>
    @endforeach
</body>
</html>