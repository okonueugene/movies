<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
@foreach ($movies as $movie)
    <div class="card-group">
        <div class="card">
            <img class="card-img-top" src="{{ $movie['image'] }}" alt="Card image cap" style="width:200px;height:200px;">
            <div class="card-body">
                <h5 class="card-title">{{ $movie['title'] }}</h5>
                <p class="card-text">{{ $movie['description'] }}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted"><?php
                $m=$movie['id'];
                $json = file_get_contents("https://imdb-api.com/API/YouTubeTrailer/k_97cl48wo/{$m}");
                $obj = json_decode($json);
                $array = json_decode(json_encode($obj), true);
                ?><a href="{{print_r($array['videoUrl'])}}">Trailer</a></small>
            </div>
        </div>
    </div>
@endforeach
