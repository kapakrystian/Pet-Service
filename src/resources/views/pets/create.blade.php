<x-layout>
<form method="POST" action="/pets" class="max-w-md mx-auto my-3">
    @csrf
    <div class="relative z-0 w-full mb-6 group">
        <x-form-label for="name">Name</x-form-label>
        <x-form-input type="text" name="name" id="name" required/>
        <x-form-error name="name" />
    </div>
    <div class="relative z-0 w-full mb-6 group mt-3">
        <x-form-label for="category">Category</x-form-label>
        <x-form-input type="text" name="category" id="category" required/>
        <x-form-error name="category" />
    </div>
    <div class="relative z-0 w-full mb-6 group mt-3">
        <x-form-label for="status">Status</x-form-label>
        <x-form-input type="text" name="status" id="status" placeholder="Choose one: available, pending, sold" required/>
        <x-form-error name="status" />
    </div>
    <div class="relative z-0 w-full mb-6 group mt-3">
        <x-form-label for="photo_url">Photo URL</x-form-label>
        <x-form-input type="text" name="photo_url" id="photo_url" required/>
        <x-form-error name="photo_url" />
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/pets" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
    </div>
</form>

</x-layout>
