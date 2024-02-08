<nav class="navbar-sticky navbar-glass">
    <div class="navbar bg-transparent mx-auto container shadow-none ">
        <div class="navbar-start">
            <a class="navbar-item font-extrabold text-blue-500">VAAC</a>
        </div>
        <div class="navbar-center text-sm">
            <a wire:navigate href="/" class="navbar-item {{ request()->routeIs('home_page') ? "decoration-2 decoration-blue-600 underline underline-offset-8 text-blue-500" : "" }}">Home</a>
            <a wire:navigate href="/about" class="navbar-item {{ request()->routeIs('about_page') ? "decoration-2 decoration-blue-600 underline underline-offset-8 text-blue-500" : "" }}">About</a>
            <a wire:navigate href="/inquire" class="navbar-item {{ request()->routeIs('inquire_page') ? "decoration-2  decoration-blue-600 underline underline-offset-8 text-blue-500" : "" }}">Inquire</a>
        </div>
        <div class="navbar-end text-sm">
            <a wire:navigate href="/contact" class="navbar-item p-2 {{ request()->routeIs('contact_page') ? " border border-blue-600 rounded-md text-blue-600" : "p-2 bg-blue-500 rounded-md text-slate-100" }}">Contact</a>
        </div>
    </div>
</nav>
