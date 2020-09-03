@extends('layouts.app')

@section('content')
<form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    @include('layouts.post_form')
</form>
@endsection