<x-layout title='My BBS'>
    <header class="border-bottom d-flex pb-2 my-3">
        <span class="fs-1 align">My BBS</span>
        <a href="{{ route('posts.create') }}" class="fs-2 mt-1 ms-auto">[Add]</a>
    </header>

    <ul>
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}" class="fs-4 text-decoration-none text-dark">
                    {{ $post->title }}
                </a>
            </li>
        @empty
            <li>No posts yet!</li>
        @endforelse
    </ul>
</x-layout>


