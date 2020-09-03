<div class="container-fluid alert">
    @if(($messages = $errors->all()))
    <p class="bg-white text-danger border border-danger rounded">
        @foreach ($messages as $message)
        {{ $message }}<br>
        @endforeach
    </p>
    @endif
    <p class="mb-0">title</p>
    <input type="text" class="form-control" name="title" value="{{ old('title') ?? $post->title }}">
    <p class="mb-0">コンテンツ</p>
    <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ old('content') ?? $post->content }}</textarea>
    <button class="btn btn-success mt-5">送信</button>
</div>