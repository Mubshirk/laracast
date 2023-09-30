<x-layouts>
    <section class="px-6 pt-8">
        <main class="max-w-xl mx-auto rounded-3xl p-8 bg-gray-200 border border-gray-300 shadow-lg shadow-amber-200"
        >
            <h1 class="text-2xl text-gray-600 font-bold text-center mb-6">Register !!</h1>
            <form action="/register" method="POST"
            >
                @csrf
                <x-form-input label="name" />
                <x-form-input label="username" />
                <x-form-input label="email" />
                <x-form-input label="password" type="password" />
                <x-form-button name="Submit" />
            </form>
        </main>


    </section>
</x-layouts>
