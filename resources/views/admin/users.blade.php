<x-layouts>
    <section class="px-6 pt-8">
        <main class="max-w-2xl mx-auto rounded-3xl p-8 bg-gray-200 border border-gray-300 shadow-lg shadow-amber-200"
        >
            <p class="text-2xl font-bold border-b-2 pb-5 border-gray-400 mb-6">Manage Users</p>
            <div class="bg-gray-100 p-8 rounded-2xl w-full">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-xl overflow-hidden">
                        <table class="min-w-full leading-normal">
                            @foreach( $users as $user)
                                <tr class="hover:bg-gray-200 bg-white transition-all ">


                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="hover:text-blue-500 transition-all text-gray-900 font-bold whitespace-no-wrap">
                                                    <a href="/?author={{ $user->username }}">{{ $user->name }}</a>
                                                </p>
                                            </div>

                                            <div class="ml-3">
                                                <p class="hover:text-gray-600 text-gray-200 text-xs transition-all text-gray-400  whitespace-no-wrap">
                                                    {{ $user->username }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        <p class="text-gray-600 text-xs whitespace-no-wrap">
                                            {{ $user->created_at->diffForHumans()}}
                                        </p>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-600 rounded-full"></span>
									<span class="relative text-white"><form method="POST" action="/admin/user/{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit">Delete</button>
                                        </form></span>
									</span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </section>
</x-layouts>
