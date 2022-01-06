@props(['name'])
<div class="mb-6">
               <x-form.label name="{{ $name }}" />
               <input class="w-full p-2 border border-gray-400 rounded"
                      id="{{ $name }}"
                      name="{{ $name }}"
                      {{$attributes}}>
                <x-form.error name="{{$name  }}" />
                
           </div> 