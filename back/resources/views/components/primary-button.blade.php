<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gazprom-500 border border-transparent font-HeliosCond text-xs text-white uppercase tracking-widest hover:bg-gazprom-400 focus:outline-none focus:ring-2 focus:ring-gazprom-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
