<x-layout>
@csrf
<form class="max-w-md mx-auto">
    <div class="relative z-0 w-full mb-6 group">
        <x-form-input type="text" name="name" id="name" required/>
        <x-form-label for="name">Name</x-form-label>
    </div>
    <div class="relative z-0 w-full mb-6 group mt-3">
        <x-form-input type="text" name="category" id="category" required/>
        <x-form-label for="category">Category</x-form-label>
    </div>
    <div class="relative z-0 w-full mb-6 group mt-3">
        <x-form-input type="text" name="status" id="status" required/>
        <x-form-label for="status">Status</x-form-label>
    </div>
    <div class="relative z-0 w-full mb-6 group mt-3">
        <x-form-input type="text" name="photo_url" id="photo_url" required/>
        <x-form-label for="photo_url">Photo URL</x-form-label>
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>

</x-layout>
