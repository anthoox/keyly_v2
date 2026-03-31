<x-layouts.app>
  <div class="w-full">
    <div class="p-10 w-full flex justify-between items-center bg-blue-600">
      <h2 class="font-semibold text-4xl text-white ">Categorías</h2>


    </div>


    <div class="h-full p-10 ">

      @if ($categories)
      <h2 class="text-xl font-semibold">Todas las categorías</h2>
      @foreach ($categories as $category)
      <div class="grid grid-cols-1 gap-4 mt-4">
        {{-- Si hay contenido, se repite este bloque --}}
        <div class="grid grid-cols-3 items-center p-4 border rounded-lg hover:shadow-md border-outline dark:border-outline-dark dark:bg-surface-dark-alt shadow-sm bg-gray-50">
          <div class="col-span-1 flex items-center gap-2">
            <img class="size-10 rounded-full object-cover" src=" https://unavatar.io/x/calebporzio " alt="icon" />
            <div class="flex flex-col">
              <div class="flex flex-col">
                <span class="dark:text-white font-medium">{{ $category->name }}</span>
                <span class="text-sm opacity-70">
                  {{ $category->credentials_count }} {{ $category->credentials_count == 1 ? 'cuenta' : 'cuentas' }}
                </span>
              </div>
            </div>
          </div>


          <div class="flex flex-col text-center text-md">
            <p> {{ $category->credentials_count }} {{ $category->credentials_count == 1 ? ' cuenta' : ' cuentas' }}</p>
          </div>

          <div class="flex gap-3 items-center justify-end">

            <button class="cursor-pointer">
              <flux:modal.trigger name="edit-category">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
              </flux:modal.trigger>
            </button>
            <button
              type="button"
              onclick="confirmarEliminacion('{{ $category->id }}', '{{ $category->name }}')"
              class="cursor-pointer hover:text-red-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
            </button>

          </div>

        </div>


      </div>
      @endforeach
      @else
      <p class="text-gray-500 mt-4">No tienes categorías creadas.
        @endif

    </div>


  </div>



</x-layouts.app>