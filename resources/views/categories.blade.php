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
                  {{ $category->credentials_count }} {{ $category->credentials_count == 1 ? 'credencial' : 'credenciales' }}
                </span>
              </div>
            </div>
          </div>


          <div class="flex flex-col text-center text-md">
            <p> {{ $category->credentials_count }} {{ $category->credentials_count == 1 ? ' credencial' : ' credenciales' }}</p>
          </div>

          <div class="flex gap-4 items-center justify-end">

            <button class="cursor-pointer">

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
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


  <flux:modal name="edit-profile" class="md:w-96">
    <div class="space-y-6">
      <div>
        <flux:heading size="lg">Update profile</flux:heading>
        <flux:text class="mt-2">Make changes to your personal details.</flux:text>
      </div>
      <flux:input label="Name" placeholder="Your name" />
      <flux:input label="Date of birth" type="date" />
      <div class="flex">
        <flux:spacer />
        <flux:button type="submit" variant="primary">Save changes</flux:button>
      </div>
    </div>
  </flux:modal>

</x-layouts.app>