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
                <flux:modal.close>
                    <flux:button variant="ghost">Cancelar</flux:button>
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
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>
                <flux:modal.trigger name="delete-category">
                    <flux:button variant="danger" class="mx-2">Eliminar</flux:button>
                </flux:modal.trigger>
                <flux:button type="submit" variant="primary">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="delete-category" class="min-w-[22rem]">
        <form class="space-y-6">
            @csrf
            <div>
                <flux:heading size="lg">Delete project?</flux:heading>
                <flux:text class="mt-2">
                    You're about to delete this project.<br>
                    This action cannot be reversed.
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger">Delete project</flux:button>
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
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</x-layouts.app.sidebar>