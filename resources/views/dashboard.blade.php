<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard — Topics
        </h2>
    </x-slot>

    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <a href="{{ route('topics.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
          ➕ New Topic
        </a>

        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Topic</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Comments</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Last Comment</th>
              </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
              @forelse($topics as $topic)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                    <a href="{{ route('topics.show', $topic->id) }}"
                       class="text-blue-600 dark:text-blue-400 hover:underline">
                      {{ $topic->title }}
                    </a>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                    🗨️ {{ $topic->comments_count }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                    {{ optional($topic->comments->last())->created_at?->format('d M Y') ?? 'No comment' }}
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-700">
                    No topics yet. Create one to get started!
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>
</x-app-layout>
