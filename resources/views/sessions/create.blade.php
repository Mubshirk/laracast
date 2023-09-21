<x-layouts>
    <section class="px-6 pt-8">
        <main class="max-w-lg mx-auto rounded-3xl p-8 bg-gray-200 border border-gray-300 shadow-lg shadow-amber-200"
        >
            <h1 class="text-2xl text-gray-600 font-bold text-center mb-6">Login !!</h1>
            <form action="/login" method="POST"
            >
                @csrf
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
                           value="{{ old('email') }}"
                           placeholder="Write your Email-Address.."
                           class="border border-gray-400 p-2 w-full rounded-xl">

                    @error('email')
                    <p class="text-sm text-red-500 ">{{ $message }}</p>
                    @enderror
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

                    @error('password')
                    <p class="text-sm text-red-500 ">{{ $message }}</p>
                    @enderror
                </div>

                {{--                submit--}}

                <div>
                    <button
                        class="px-4 py-2  bg-blue-500 text-gray-100 rounded-xl border border-blue-600 font-bold hover:bg-blue-600 transition-all focus:bg-green-600 focus:border-green-900
                        ">
                        Login
                    </button>
                </div>
            </form>
        </main>


    </section>
</x-layouts>
