@props ([
    "name" => "",
    "type" => "text",
    "placeholder" => "",
    "label" => "",
    "required" => false,
    "value" => ""
])

<div>
    <label for="{{$name}}" class="{{'block text-sm font-medium leading-6 text-gray-900' . ($type==="hidden" ? "hidden": "")}}">{{$label}}</label>
    <div class="mt-2">
        <input id="{{$name}}" placeholder="{{$placeholder}}" name="{{$name}}" type="{{$type}}" autocomplete="{{$name}}" @required($required) value="{{$type !== 'password'? $value? $value: old($name): ''}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
    </div>
    @error($name)
        <small class="text-red-500">{{$message}}</small>
    @enderror
</div>

