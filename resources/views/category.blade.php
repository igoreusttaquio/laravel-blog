<x-layout>
    <h1>Category: {{$category->name}}</h1>
    <h2>Posts in this category</h2>
    <ul>
        @foreach($category->posts as $post)
        <li><a href="/posts/{{$post->slug}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
</x-layout>