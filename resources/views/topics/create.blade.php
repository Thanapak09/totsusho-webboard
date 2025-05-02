<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-bold text-gray-900">New Topic</h2>
      <a href="{{ route('topics.index') }}" class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded">
        ← Back
      </a>
    </div>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('topics.store') }}" method="POST" class="space-y-4">
          @csrf

          <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required></textarea>
          </div>

          <div class="flex space-x-4 justify-end">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Save Topic</button>
            <button type="reset" class="bg-red-200 hover:bg-red-300 text-gray-800 font-semibold py-2 px-4 rounded">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
