@extends('layouts.app')

@section('content')
<form action="{{ route('post.store') }}" method="post">
    @csrf
    @include('layouts.post_form')
</form>
@endsection