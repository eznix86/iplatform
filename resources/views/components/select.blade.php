@props(['placeholder' => false])
<select {{ $attributes->merge([
    'class' => 'block w-full h-9 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6'
]) }} {{ $attributes }}>
    @if(!$placeholder)
    <option value="">Please select</option>
    @endif
    {{ $slot }}

</select>
