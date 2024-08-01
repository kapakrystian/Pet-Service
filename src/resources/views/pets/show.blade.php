<x-layout>
    <header class="bg-white shadow mb-3">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pet Details</h1>
        </div>
    </header>
    <div>
        <p>Category name: {{$pet['category']['name'] ?? 'Category name is undefined'}}</p>
        <p>Name: {{$pet['name'] ?? 'Name is undefined'}}</p>
        <p>Photo: {{$pet['photoUrls'][0] ?? 'Photo is undefined'}}<p>
        <p>Status: {{$pet['status'] ?? 'Status is undefined'}}</p>
    </div>
    <div class="mt-6">
        <a href="/pets" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
    </div>
</x-layout>
