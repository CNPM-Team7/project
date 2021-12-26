<div>
    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
        <div class="flex w-full items-center justify-between">
            <label for="{{ $name }}">
                {{ $slot }}
            </label>
            <input {{ (!empty($mandatory) ? 'required' : null) }} {{ (!empty($disabled) ? 'disabled' : null) }} name="{{ $name }}" id="{{ $name }}" type="text" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}"
                {{ $attributes ->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }} >
        </div>
        <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
    </div>

    @if($errors->any())
        <div class="w-auto flex flex-row items-center gap-x-2 pt-1">
            <div class="flex w-full items-center justify-between">
                <div></div>
                <small {{ $attributes ->merge(['class' => 'text-red-500']) }}>{{ $errors->first($name) ?? '' }}</small></div>
            <span class="text-red-500 invisible">(*)</span>
        </div>
    @endif
</div>

