<div wire:init='hydrate' class="flex flex-col items-center">

    @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
    @endif

    @isset($posts)
    
        @auth
        <div class="w-8/12 bg-white p-6 rounded-lg">
            {{-- <form wire:submit.prevent="create"> --}}
            <form >
                @csrf
                <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea wire:model="body" name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>
        
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                    </div>
                @enderror
                </div>
        
                <button type="submit" wire:click.prevent="create" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                {{-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button> --}}
            </form>
        </div>
        @endauth
    
        @if($posts!= null && $posts->count())
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

    @else

        {{-- Skeletons loading --}}

        @auth
        <div class="bg-gray-300 p-6 rounded-md w-8/12">
            <div class="animate-pulse flex space-x-4">
                <div class="flex-1 py-1">
                    <div class="h-24 bg-gray-400 mb-4 rounded"></div>
                    <div class="h-8 bg-gray-400 rounded w-12"></div>
                </div>
            </div>
        </div>
        @endauth

        <div class="mt-4 p-6 bg-gray-300 rounded-md w-8/12">
            <div class="animate-pulse flex space-x-4">
                <div class="flex-1 py-1">
                    <div class="h-4 bg-gray-400 rounded w-1/4"></div>
                    <div class="h-4 bg-gray-400 mt-4 rounded w-1/4"></div>
                </div>
            </div>
        </div>

        <div class="mt-4 p-6 bg-gray-300 rounded-md w-8/12">
            <div class="animate-pulse flex space-x-4">
                <div class="flex-1 py-1">
                    <div class="h-4 bg-gray-400 rounded w-1/4"></div>
                    <div class="h-4 bg-gray-400 mt-4 rounded w-1/4"></div>
                </div>
            </div>
        </div>

        <div class="mt-4 p-6 bg-gray-300 rounded-md w-8/12">
            <div class="animate-pulse flex space-x-4">
                <div class="flex-1 py-1">
                    <div class="h-4 bg-gray-400 rounded w-1/4"></div>
                    <div class="h-4 bg-gray-400 mt-4 rounded w-1/4"></div>
                </div>
            </div>
        </div>

        <div class="mt-4 p-6 bg-gray-300 rounded-md w-8/12">
            <div class="animate-pulse flex space-x-4">
                <div class="flex-1 py-1">
                    <div class="h-4 bg-gray-400 rounded w-1/4"></div>
                    <div class="h-4 bg-gray-400 mt-4 rounded w-1/4"></div>
                </div>
            </div>
        </div>

        {{-- End Skeleton loading --}}

    @endisset
    
</div>