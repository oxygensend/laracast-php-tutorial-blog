<x-panel>
    <form action="/posts/{{$post->slug}}/comments" method="POST"> 
        @csrf

        <header class="flex items-center">
        
            <img src="https:/i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">

            <h2 class="ml-4">Want to participate?</h2>
        </header>

        <div class="mt-6">
            <textarea name="body"  rows="5" placeholder="Quick, thing of something to say!"
                        class="w-full text-sm focus:outline-none focus:ring"
                        required></textarea>

            @error('body')
                <span class="text-xs text-red-500">{{$message}}</span> 
            @enderror
        </div>

        <div class="flex justify-end mt-5 pt-7 border-t border-gra-200">
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
        </div>

    </form>
</x-panel>