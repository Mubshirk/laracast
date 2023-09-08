<x-layouts>

    <h3><a href="/"><-- Go Back..</a></h3>

    @foreach($posts as $post)

    <article>

        <h1> <a href="/posts/{{ $post->slug }}"> 
            <?php echo $post->title ?> </h1>
            </a>


            <p>
            Written by <a href="/aurthers/{{ $post->aurther->username }}">{{ $post->aurther->name }}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>


        <div>
            {{ $post->excertp }}
        </div>


    </article>
    @endforeach

</x-layouts>