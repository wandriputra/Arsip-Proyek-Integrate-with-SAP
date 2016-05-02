@extends('./layout')

@section('content_main_pages')
    @foreach ($user as $article)

        {{ $article->id }}
        {{ $article->username }}
        {{ $article->published }}

    @endforeach
    {!! $path = storage_path(); !!}
    {!! $user->render() !!}

@stop