<nav class="navbar shadow-none navbar-glass navbar-sticky">
	<div class="navbar-start">
		<a class="navbar-item font-extrabold">Visual Angle</a>
	</div>
	<div class="navbar-center text-sm">
		<a wire:navigate href="/" class="navbar-item {{ request()->routeIs('home_page') ? "decoration-2 underline underline-offset-8" : "" }}">Home</a>
		<a wire:navigate href="/about" class="navbar-item {{ request()->routeIs('about_page') ? "decoration-2 underline underline-offset-8" : "" }}">About</a>
		<a wire:navigate href="/inquire" class="navbar-item {{ request()->routeIs('inquire_page') ? "decoration-2 underline underline-offset-8" : "" }}">Inquire</a>
	</div>
	<div class="navbar-end text-sm">
		<a wire:navigate class="navbar-item">Contact</a>
	</div>
</nav>
