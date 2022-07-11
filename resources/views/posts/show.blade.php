<x-layout>
    <x-slot name="title">
        {{ $post->title }} - My BBS
    </x-slot>
    <div class="fs-3 my-4">
        &laquo; <a href="{{ route('posts.index') }}" class="text-decoration-none">Back</a>
    </div>
    <h1 class="border-bottom d-flex fs-3">
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}" class="ms-auto text-decoration-none">[Edit]</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post" id="delete_post">
            @method('DELETE')
            @csrf

            <input type="submit" value="[X]" class="btn form-control">
        </form>
    </h1>
    <p class="fs-3">{!! nl2br(e($post->body)) !!}</p>

    <h2 class="fs-2 border-bottom">Comments</h2>
    <ul class="list-group">
        <li class="list-group-item border-0">
            <form action="{{ route('comments.store', $post) }}" method="post" class="d-flex">
                @csrf

                <input type="text" name="body" class="form-control me-auto">
                <input type="submit" class="btn btn-primary ms-2">
            </form>
            @error('body')
                <div class="text-danger mt-1 fs-4">{{ $message }}</div>
            @enderror
        </li>
        @foreach ($post->comments()->latest()->get() as $comment)
            <li class="list-group-item border-0 d-flex">
                <div class="fs-3">
                    {{ $comment->body }}
                </div>
                <form action="{{ route('comments.destroy', $comment) }}" method="post" class="ms-auto delete-comment">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn p-0 fs-4 ms-auto text-danger">[X]</button>
                </form>
            </li>
        @endforeach
    </ul>

    <script>
        'use strict';

        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('Sure to delete?')) {
                    return;
                }
                e.target.submit();
            });

            const $comments = document.querySelectorAll('.delete-comment');
            $comments.forEach(form => {
                form.addEventListener('submit', e => {
                    e.preventDefault();

                    if (!confirm('Sure to delete?')) {
                        return;
                    }

                    form.submit();
                })
            })
        }
    </script>
</x-layout>
