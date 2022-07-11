<x-layout>
    <x-slot name="title">
        Edit Post - My BBS
    </x-slot>
    <div class="fs-3 my-4">
        &laquo; <a href="{{ route('posts.show', $post) }}">Back</a>
    </div>
    <h1 class="border-bottom">Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="post" class="row">
        @method('PATCH')
        @csrf
        <div class="fs-3 my-1">
            <label for="title" >Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="fs-3 my-3">
            <label for="body">Body</label>
            <textarea name="body" class="form-control h-100">{{ old('body', $post->body) }}</textarea>
            @error('body')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary my-5 w-auto ms-auto" value="更新">
    </form>
</x-layout>
