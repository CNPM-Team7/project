<button type="button" {{ $attributes -> merge(['class' => 'border focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2']) }}>
    {{ $slot }}
</button>
