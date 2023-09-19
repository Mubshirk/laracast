<x-layouts>
    <section class="px-6 pt-8">
        <main class="max-w-xl mx-auto rounded-3xl p-8 bg-gray-200 border border-gray-300 shadow-lg shadow-amber-200"
        >
            <h1 class="text-2xl text-gray-600 font-bold text-center mb-6">Register !!</h1>
            <form action="/register" method="POST"
            >
                @csrf
                {{--                Name--}}

                <div class="mb-6">
                    <label for="name"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>

                    <input type="text"
                           name="name"
                           id="name"
                           required
                           placeholder="Write your Name.."
                           class="border border-gray-400 p-2 w-full rounded-xl">
                </div>

                {{--                 username--}}
                <div class="mb-6">
                    <label for="username"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           id="username"
                           required
                           placeholder="Write your Username.."
                           class="border border-gray-400 p-2 w-full rounded-xl">
                </div>

                {{--                email --}}

                <div class="mb-6">
                    <label for="email"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email-Address
                    </label>

                    <input type="text"
                           name="email"
                           id="email"
                           required
                           placeholder="Write your Email-Address.."
                           class="border border-gray-400 p-2 w-full rounded-xl">
                </div>

                {{--                password --}}

                <div class="mb-6">
                    <label for="password"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           id="password"
                           required
                           placeholder="Write your Password.."
                           class="border border-gray-400 p-2 w-full rounded-xl">
                </div>

{{--                submit--}}

                <div>
                    <button
                        class="px-4 py-2  bg-blue-500 text-gray-100 rounded-xl border border-blue-600 font-bold hover:bg-blue-600 transition-all">
                        Submit</button>
                </div>
            </form>
        </main>


    </section>
</x-layouts>
