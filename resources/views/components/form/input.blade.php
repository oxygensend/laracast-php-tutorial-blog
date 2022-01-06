@props(['name', 'label', 'width'=>'w-full'])
<div class="mb-6">
               <x-form.label name="{{ $label ?? $name }}" />
               <input class ="p-2 border border-gray-400 rounded {{$width}}"
                      id="{{ $name }}"
                      name="{{ $name }}"
                      {{$attributes}}>
                <x-form.error name="{{$name  }}" />
                
           </div> 