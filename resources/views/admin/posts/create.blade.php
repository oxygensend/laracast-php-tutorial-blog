<x-layout>
   <x-settings heading="Publish new post"> 
    
        <form action="/admin/posts/" method="POST" enctype="multipart/form-data">
           @csrf 
           
            <x-form.input name="title"/>
            <x-form.input name="thumbnail"  type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" rows="15" />

            <div class="mb-6">
              <x-form.label name="category" /> 
               <select name="category_id" id="category" class="rounded-xl">

                    @foreach (App\Models\Category::all() as $category)
                        <option value={{ $category->id }}
                             {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
               </select>

               <x-form.error name="category" />

            </div>
               <x-form.input name="published" 
                             label="Publish autmaticly"
                             width="" type="checkbox" 
                             value="1"
                             />
            <x-form.button>Create</x-form.button>
         </form>
   </x-settings>
</x-layout>