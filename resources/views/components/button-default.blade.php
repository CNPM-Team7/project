<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => 'text-white  focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2']) }}>
    {{ $slot }}
</button>
