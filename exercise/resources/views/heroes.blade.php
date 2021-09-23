<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultr</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>List of Heroes</h1>
    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>fullName</th>
            <th>strength</th>
            <th>speed</th>
            <th>durability</th>
            <th>power</th>
            <th>race</th>
            <th>height0</th>
            <th>height1</th>
            <th>weight0</th>
            <th>weight1</th>
            <th>eyeColor</th>
            <th>hairColor</th>
            <th>publisher</th>
        </tr>
        </thead>
        <tbody>
        @foreach($heroes as $hero)
            <tr>
                <td>{{$hero->id}}</td>
                <td>{{$hero->name}}</td>
                <td>{{$hero->fullName}}</td>
                <td>{{$hero->strength}}</td>
                <td>{{$hero->speed}}</td>
                <td>{{$hero->durability}}</td>
                <td>{{$hero->power}}</td>
                <td>{{$hero->race}}</td>
                <td>{{$hero->height0}}</td>
                <td>{{$hero->height1}}</td>
                <td>{{$hero->weight0}}</td>
                <td>{{$hero->weight1}}</td>
                <td>{{$hero->eyeColor}}</td>
                <td>{{$hero->hairColor}}</td>
                <td>{{$hero->publisher}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
