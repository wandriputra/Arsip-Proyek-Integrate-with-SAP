@foreach ($user as $article)

    {{ $article->id }}
    {{ $article->username }}
    {{ $article->published }}

@endforeach
{!! $users->render() !!}