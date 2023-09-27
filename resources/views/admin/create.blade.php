<x-layouts>
    <section class="px-6 py-8 ">



        <div class="mb-6 mx-auto rounded-xl p-8 max-w-xl bg-gray-100 border border-gray-200">
            <h1 class="text-blue-500 font-bold text-xl text-center mb-7">PUBLISH NEW POST</h1>
            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title"
                           class="font-semibold text-gray-500 ">Title</label>

                    <input
                        value="{{ old('title') }}"
                        name="title" id="title" placeholder="Write title of the post.."
                        class="w-full h-9 border border-gray-500 rounded-lg p-4">
                    @error('title')
                    <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug"
                           class="font-semibold text-gray-500 ">Slug</label>
                    <input
                        value="{{ old('slug') }}"
                        name="slug" id="slug" placeholder="Write slug of the post.."
                        class="w-full h-9 border border-gray-500 rounded-lg p-4">
                    @error('slug')
                    <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </div>
{{--                thumbnail --}}
                <div class="mb-6 border border-gray-400 p-2 rounded-xl">
                    <label for="thumbnail"
                           class="font-semibold text-gray-500 mr-6 ">
                        Thumbnai
                    </label>

                    <input name="thumbnail" id="thumbnail" required type="file">
                </div>
                {{--                excertp--}}
                <div class="mb-6">
                    <label for="excertp"
                           class="font-semibold text-gray-500 ">Excertp</label>

                    <textarea name="excertp" id="excertp" rows="3"
                              class="w-full border border-gray-200 text-sm focus:outline-none focus:ring
                                      rounded-xl p-4 ">{{ old('excertp')  }}</textarea>

                    @error('excertp')
                    <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                    @enderror

                </div>
                {{--                body --}}
                <div class="mb-6">
                    <label for="body"
                           class="font-semibold text-gray-500 ">Body</label>

                    <textarea name="body" id="body" rows="5"
                              class="w-full border-2 border-gray-200 text-sm focus:outline-none focus:ring
                                      rounded-xl p-4 ">{{ old('body') }}</textarea>

                    @error('body')
                    <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                    @enderror

                </div>
                {{--                categories--}}
                <div class="mb-6">
                    <label for="category_id"
                           class="font-semibold text-gray-500 ">Category</label>

                    <select name="category_id" id="category_id">

                        @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name)}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                    @enderror

                </div>


{{--                submit--}}
                <div class="flex justify-between border-t border-gray-200 pt-4">
                    <a  class="bg-red-600 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-700 transition-all"
                        href="/"><- Go Back</a>
                    <button
                        type="submit"
                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-500 transition-all">
                        publish
                    </button>
                </div>
            </form>
        </div>

    </section>
</x-layouts>
