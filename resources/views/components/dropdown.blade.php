@props(['trigger'])


<div x-data="{ show: false }" @click.away="show = false" class="relative inline-block text-left">

    <button type="button"
            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
            @click="show = ! show">
        {{ $trigger }}
    </button>



    <div x-show="show"
         class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1">
            {{ $slot }}
        </div>
    </div>
</div>
