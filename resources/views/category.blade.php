<x-layout>
    <h1>Category: {{$category->name}}</h1>

    <div class="items-center lg:justify-center text-sm mt-4">
        <div class="ml-3 text-left">
            @foreach($category->posts as $post)
            <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
            @endforeach
        </div>
</x-layout>