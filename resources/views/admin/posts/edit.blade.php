<x-layout>
    <x-settings heading="Edit: {{$post->title}}"> 
     
         <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PATCH')
            
             <x-form.input name="title" :value="old('title', $post->title)"/>
             <div class="flex mt-6">
             <div class="flex-1">
                <x-form.input name="thumbnail"  type="file" :value="old('title', $post->title)"/>
             </div>
                <img class="h-20 w-20 rounded-xl ml-5" src="{{ asset('/storage/' . $post->thumbnail) }}" alt="">
             </div>

             <x-form.textarea name="excerpt"> {{ old('excerpt', $post->excerpt) }}</x-form.textarea>
             <x-form.textarea name="body" rows="15"> {{ old('body', $post->body) }}</x-form.textarea>
 
             <div class="mb-6">
               <x-form.label name="category" /> 
                <select name="category_id" id="category" class="rounded-xl">
 
                     @foreach (App\Models\Category::all() as $category)
                         <option value={{ $category->id }}
                              {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                             {{ ucwords($category->name) }}</option>
                     @endforeach
                </select>
                <x-form.error name="category" />
             </div>
                <x-form.button>Update</x-form.button>
         </form>
    </x-settings>
</x-layout>