@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center">
  @auth
  <div class="w-8/12 bg-white p-6 rounded-lg">
    <form action="{{ route('posts') }}" method="post">
      @csrf
      <div class="mb-4">
        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>

        @error('body')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
    </form>
  </div>
  @endauth

  @if($posts->count())
    @foreach($posts as $post)
      <div class="w-8/12 bg-white p-6 rounded-lg mt-4">
        <a href="#" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

        <p class="mt-2">{{ $post->body }}</p>
      </div>
    @endforeach

    <div class="w-8/12 mt-3">{{ $posts->links() }}</div>
  @else
    <div class="w-8/12 bg-white p-6 rounded-lg mt-4">
      <p>There are no posts</p>
    </div>
  @endif
</div>
@endsection