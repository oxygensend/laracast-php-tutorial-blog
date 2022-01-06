<x-panel>
    <form action="/posts/{{$post->slug}}/comments" method="POST"> 
        @csrf

        <header class="flex items-center">
        
            <img src="https:/i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">

            <h2 class="ml-4">Want to participate?</h2>
        </header>

      
        <x-form.textarea  name="body" />
        <x-form.button>Publish</x-form.button>

    </form>
</x-panel>