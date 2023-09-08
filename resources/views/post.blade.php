<x-layouts>

<h3><a href="/"><-- Go Back</a></h3>

    <article>



     <h1>{{$post->title}}</h1>


     <p>Written by <a href="/aurthers/{{ $post->aurther->username }}">{{ $post->aurther->name }}</a></p>

     <p>

            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
      </p>

     <div>
        {!! $post->body !!}
     </div>
     </article>
     

    </x-layouts>