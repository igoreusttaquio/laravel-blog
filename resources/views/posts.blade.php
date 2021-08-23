<x-layout>
    <!--@section('content')
        @foreach ($posts as $post)  
            <article>
                <h1><a href="/posts/{{$post->slug}}"><?= $post->title; ?></a></h1>
                <p>
                    By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in
                    <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                </p>
                {!! $post->excerpt !!}
            </article>
        @endforeach
    @endsection -->


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-post-featured-card :post="$posts[0]" />
            <x-post-card-grid :posts="$posts->skip(1)"/>
        @else
            <p class="text-center">No post's. Please come back later.</p>
        @endif
    </main>
</x-layout>