@if(session()->has('success'))
    <div class="fixed right-3 bottom-6"
         x-data="{ show:true }"
         x-init="setTimeout(() => show = false , 4000)"
         x-show="show"
         x-transition>
        <p class="bg-blue-500 font-bold text-white text-sm p-2 rounded-xl">
            {{ session('success') }}
        </p>
    </div>
@endif
