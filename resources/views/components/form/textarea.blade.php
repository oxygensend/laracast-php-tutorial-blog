<div class="mb-6">
    <x-form.label  name="{{$name}}"/>
    <textarea class="w-full p-2 border border-gray-400 rounded"
        id="{{$name}}"
        name="{{$name}}"
        required>{{ $slot ?? old($name)  }}</textarea>
   <x-form.error name="{{$name}}" />
                
</div>
