@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<div class="container-md">
    <div class="alert alert-dark" role="alert">
        <div class="w-75 mx-auto">
            <div class="border-bottom border-white">
                <p class="display-4 text-center text-break">{{ $post->title }}</p>
                <p class="font-weight-normal text-center text-break">{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="py-4 w-50 mx-auto">
                <span class="mr-3">投稿者： {{ $post->user->name }}</span>
                @can('update', $post)
                <a href="{{ route('post.edit', ['post' => $post->id]) }}" type="button" class="btn btn-primary btn-lg mr-3">編集</a>
                @endcan
                @can('delete', $post)
                <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger btn-lg mr-5">削除</button>
                </form>
                @endcan
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart js-favorite
                    @if ($post->favorites->contains(function ($val, $key) use ($userId) {
                        return $val->user_id === $userId;
                    }))
                    text-danger
                    @endif" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                </svg>
                <span class="js-favprit-count" data-user-id="{{ $userId }}" data-post-id="{{ $post->id }}"> {{ $post->favorites()->count() }}</span>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection