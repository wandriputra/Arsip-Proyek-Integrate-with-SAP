@extends('./layout')

@section('content_main_pages')
{{Auth::user()->status}}
@stop