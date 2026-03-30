<x-layouts.app>
<h1>Dashboard</h1>
<ul>
    @foreach ($category as $cat)
        <li> {{ $cat->name }}</li>
    @endforeach
</ul>
</x-layouts.app>
