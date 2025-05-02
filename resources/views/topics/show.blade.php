<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-900">{{ $topic->title }}</h2>
        <a href="{{ route('topics.index') }}" class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-3 rounded">
          ← Back
        </a>
      </div>
    </x-slot>
  
    <div class="py-6">
      <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
  
        <div class="bg-white shadow-md rounded-lg p-6">
          <h3 class="text-xl font-semibold text-gray-800">Description</h3>
          <p class="mt-4 text-gray-700">{{ $topic->content }}</p>
        </div>
  
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <div class="p-6 space-y-4">
            @forelse($topic->comments as $comment)
              <div class="border-b pb-4">
                <div class="flex items-center justify-between text-sm text-gray-600">
                  <span class="font-medium">{{ optional($comment->user)->name ?? 'anonymous' }}</span>
                  <span>{{ $comment->created_at->format('d M Y H:i') }}</span>
                </div>
                <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
  
                @if(auth()->id() === $comment->user_id)
                  <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                    @csrf @method('DELETE')
                    <button class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                  </form>
                @endif
              </div>
            @empty
              <p class="text-center text-gray-500">No comments yet.</p>
            @endforelse
          </div>
        </div>
  
        <div class="bg-white shadow-md rounded-lg p-6">
          <h4 class="font-semibold text-gray-800 mb-2">Add Comment</h4>
          <form action="{{ route('comments.store', $topic) }}" method="POST" class="space-y-4">
            @csrf
            <textarea name="content" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Write your comment..." required></textarea>
            <div class="flex space-x-4">
              <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Post Comment</button>
              <button type="reset" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">Reset</button>
            </div>
          </form>
        </div>
  
      </div>
    </div>
  </x-app-layout>
  