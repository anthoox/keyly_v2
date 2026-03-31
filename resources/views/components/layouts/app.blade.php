<x-layouts.app.sidebar>
    <flux:main>
        {{ $slot }}
    </flux:main>
    <flux:modal name="add-category" class="md:w-96">
        <form class="space-y-6" action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div>
                <flux:heading size="lg">Nueva Categoría</flux:heading>
                <flux:text class="mt-2">Organiza tus claves (ej. Trabajo, Gaming, Finanzas).</flux:text>
            </div>
            <flux:input name="name" label="Nombre de la categoría" placeholder="Nombre de la categoría" required />
            <div class="flex">
                <flux:spacer />
                <flux:modal.close class="mx-2">
                    <flux:button variant="ghost" class="mx-2">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="primary">Añadir</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="edit-category" class="md:w-96">
        <form class="space-y-6" action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div>
                <flux:heading size="lg">Editar Categoría</flux:heading>
            </div>
            <flux:input name="name" label="Nombre de la categoría" placeholder="Nombre de la categoría" />
            <div class="flex">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost" class="mx-2">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="primary">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>



    <flux:modal name="add-credential" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <flux:input label="Name" placeholder="Your name" />
            <flux:input label="Date of birth" type="date" />
            <div class="flex">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost" class="mx-2">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal name="destroy-category" class="min-w-[22rem]">
        <form id="form-eliminar" method="POST" class="space-y-6">
            @csrf
            @method('DELETE')

            <div>
                <flux:heading size="lg">¿Eliminar <span id="nombre-categoria-modal" class="text-red-500"></span>?</flux:heading>
                <flux:text class="mt-2">
                    Si eliminas esta categoría, se eliminarán todas las claves asociadas.<br>
                    Esta acción no se puede deshacer.
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger">Eliminar</flux:button>
            </div>
        </form>
    </flux:modal>

    <script>
        function confirmarEliminacion(id, nombre) {
            // 1. Localizamos el formulario y el texto del nombre
            const form = document.getElementById('form-eliminar');
            const nombreSpan = document.getElementById('nombre-categoria-modal');

            // 2. Construimos la URL 
            form.action = `/categories/destroy/${id}`;

            // 3. Nombre de la categoría en el título del modal
            nombreSpan.textContent = nombre;

            // 4. Abrimos el modal de Flux por su nombre
            Flux.modal('destroy-category').show();
        }
    </script>
</x-layouts.app.sidebar>