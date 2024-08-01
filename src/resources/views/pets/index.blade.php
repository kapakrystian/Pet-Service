<!-- resources/views/pets/index.blade.php -->
<x-layout>
    <header class="bg-white shadow mb-3 relative z-10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pets</h1>

            <div class="flex items-center space-x-2">
                <div class="relative inline-block text-left">
                    <select id="statusSelect" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-small rounded-lg text-sm px-2 py-2.5 text-start inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <option value="" selected>Change Status</option>
                        @foreach($statuses as $enum)
                            <option value="{{ $enum->value }}" {{ $status === $enum->value ? 'selected' : '' }}>{{ ucfirst($enum->value) }}</option>
                        @endforeach
                    </select>
                </div>

                <x-button-header href="/pets/create">Create Pet</x-button-header>
            </div>
        </div>
    </header>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pets as $pet)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xs overflow-hidden text-ellipsis">
                        <p>{{ $pet['name'] ?? 'Name is unavailable' }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm max-w-xs overflow-hidden text-ellipsis">
                        <p>{{ $pet['category']['name'] ?? 'Category is unavailable' }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm max-w-xs overflow-hidden text-ellipsis">
                        <p>{{ $pet['status'] ?? 'Status is unavailable' }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm max-w-xs overflow-hidden text-ellipsis">
                        <p>{{ $pet['photoUrls'][0] ?? 'Photo is unavailable' }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="/pets/{{ $pet['id'] }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                        <a href="/pets/{{ $pet['id'] }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

<!--SKrypt aktualizujący URL z wybranym statusem -->
<script>
    document.getElementById('statusSelect').addEventListener('change', function() {
        var selectedStatus = this.value;
        window.location.search = 'status=' + selectedStatus;
    });
</script>
