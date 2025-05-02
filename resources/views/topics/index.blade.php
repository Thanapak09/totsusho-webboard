<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-900">Topics</h2>
        <a href="{{ route('topics.create') }}"
           class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white text-white font-semibold py-2 px-4 rounded-lg shadow">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
          </svg>
          New Topic
        </a>
      </div>
    </x-slot>
  
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  
        @if($topics->isEmpty())
          <div class="text-center py-16 text-gray-500">
            No topics yet. <a href="{{ route('topics.create') }}" class="text-blue-600 hover:underline">Create one now</a>.
          </div>
        @else
          <div class="bg-white shadow sm:rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Topic</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Comments</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Last Comment</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach($topics as $topic)
                  <tr class="hover:bg-gray-100 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      <a href="{{ route('topics.show', $topic->id) }}" class="text-blue-600 hover:underline truncate">
                        {{ $topic->title }}
                      </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">🗨️ {{ $topic->comments_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                      @if($topic->comments->isNotEmpty())
                        {{ optional($topic->comments->last()->user)->name ?? 'anonymous' }}
                        ({{ $topic->comments->last()->created_at->format('d M Y') }})
                      @else
                        No comment
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
  
      </div>
    </div>
  </x-app-layout>