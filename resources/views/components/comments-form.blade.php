@props(['post'])
@auth()
    <form action="/posts/{{$post->slug}}/comments" method="POST" class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" height="40" class="rounded-full"
                 width="40">
            <h2 class="ml-3">Want to participate?</h2>
        </header>
        <div class="my-4 ">
                            <textarea class="w-full text-sm bg-gray-100 focus:outline-none focus:ring
                                      rounded-xl p-4 "
                                      placeholder="Quick, think of something !!"
                                      name="body"
                                      rows="5"
                                      required></textarea>
            @error('body')
            <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end border-t border-gray-200 pt-4">
            <button
                type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 transition-all">
                post
            </button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:text-blue-500 transition-all hover:underline">Register</a> Or <a class="hover:text-blue-500 transition-all hover:underline" href="/login">Login</a> to leave a comment.
    </p>
@endauth
