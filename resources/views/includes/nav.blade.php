<nav class="navbar-sticky navbar-glass">
    <div class="navbar bg-transparent mx-auto container shadow-none ">
        <div class="navbar-start">
            <a wire:navigate href="/" class="navbar-item font-extrabold text-blue-500">VAAC</a>
        </div>
        <div class="navbar-end text-sm">
            <a wire:navigate href="/" class="navbar-item {{ request()->routeIs('home_page') ? "decoration-2 decoration-blue-600 underline underline-offset-8 text-blue-500" : "" }}">Home</a>
            <a wire:navigate href="/inquire" class="navbar-item {{ request()->routeIs('inquire_page') ? "decoration-2  decoration-blue-600 underline underline-offset-8 text-blue-500" : "" }}">Inquire</a>
            <a wire:navigate href="/contact" class="navbar-item {{ request()->routeIs('contact_page') ? "decoration-2 decoration-blue-600 underline underline-offset-8 text-blue-500" : "" }}">Contact</a>
        </div>
        {{-- <div class="navbar-end text-sm">
        </div> --}}
    </div>
</nav>
