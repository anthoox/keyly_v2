<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    <style>
        /* 1. Quitamos el padding del contenedor principal de Flux */
        [style*="grid-area: main"],
        main[class*="p-6"],
        div[class*="p-6"] {
            padding: 0 !important;
        }

        /* 2. Aseguramos que en pantallas grandes (lg) tampoco aplique padding */
        /* @media (min-width: 1024px) {

            [style*="grid-area: main"],
            main[class*="lg:p-8"],
            div[class*="lg:p-8"] {
                padding: 0 !important;
            }
        } */

        /* 3. Ajuste opcional para que el contenido no toque el borde físico del navegador */
        /* .content-wrapper {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            padding-top: 2rem;
        } */
    </style>
</head>

<body class="min-h-screen bg-zinc-100 dark:bg-zinc-800 antialiased">
    <flux:sidebar sticky collapsible="mobile" class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="#"
                logo="https://fluxui.dev/img/demo/logo.png"
                logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
                name="Acme Inc." />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>
        <flux:sidebar.search placeholder="Search..." />
        <flux:sidebar.nav>
            <flux:sidebar.item icon="home" :href="route('dashboard')" current>Mis Claves</flux:sidebar.item>
            <flux:sidebar.group icon="folder" expandable heading="Categorías" class="grid">

                <flux:sidebar.item icon="squares-2x2" :href="route('categories')">Ver Categorías</flux:sidebar.item>
                <flux:modal.trigger name="add-category">
                    <flux:sidebar.item href="#" icon="plus">Agregar Categoría</flux:sidebar.item>
                </flux:modal.trigger>



                @if ($categories)
                <div class="border-b m-2"></div>
                @foreach($categories as $category)
                <flux:sidebar.item icon="tag" href="#">{{ $category->name }}</flux:sidebar.item>
                @endforeach
                @endif
            </flux:sidebar.group>
            <flux:sidebar.item icon="share" href="#">Compartir</flux:sidebar.item>
            <flux:sidebar.item icon="heart" href="#">Favoritos</flux:sidebar.item>
            <flux:sidebar.item icon="adjustments-horizontal" href="#">Generador</flux:sidebar.item>
            <flux:sidebar.item icon="cog-6-tooth" href="/settings/profile">Configuración</flux:sidebar.item>




        </flux:sidebar.nav>
        <flux:sidebar.spacer />
        <flux:sidebar.nav>
        </flux:sidebar.nav>
    </flux:sidebar>

    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:spacer />
        <flux:dropdown position="top" alignt="start">
            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>