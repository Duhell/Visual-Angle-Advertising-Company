<section class="bg-gray-2 max-w-screen-sm mx-auto rounded-xl">
	<div class="p-8 shadow-lg">
        <div class="mb-3">
            <h1 class="text-3xl font-bold">Send Inquiry</h1>
            <small class="italic font-light">All fields are required.</small>
        </div>

        @if(session('success'))
        <div class="bg-green-200 text-green-800 flex items-center border border-green-600 gap-x-3 p-2.5 rounded-md mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif
		<form class="space-y-4" wire:submit='send'>
			<div class="w-full">
				<label class="sr-only" for="name">Name</label>
				<input wire:model='FullName' autocomplete="off" class="input focus:outline-blue-400  rounded placeholder:text-xs input-solid max-w-full" placeholder="Full Name" type="text" id="name" />
                @error('FullName') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
			</div>

			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
				<div>
					<label class="sr-only" for="email">Email</label>
					<input wire:model='Email' autocomplete="off" class="input focus:outline-blue-400  rounded placeholder:text-xs input-solid" placeholder="Email address" type="email" id="email" />
                    @error('Email') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
				</div>

				<div>
					<label class="sr-only" for="phone">Phone</label>
					<input wire:model='PhoneNumber' autocomplete="off" class="input focus:outline-blue-400  rounded placeholder:text-xs input-solid" placeholder="Phone Number" type="tel" id="phone" />
                    @error('PhoneNumber') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
				</div>
			</div>

			<div class="w-full">
				<label class="sr-only" for="message">Message</label>
				<textarea wire:model='Message' class="textarea focus:outline-blue-400 placeholder:text-xs textarea-solid max-w-full" placeholder="Message" rows="8" id="message"></textarea>
                @error('Message') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
			</div>

			<div class="mt-4">
				<button type="submit" class="rounded-lg btn btn-primary btn-block">
                    <span wire:loading.remove>Send Inquiry</span>
                    <span wire:loading>Sending...</span>
                </button>
			</div>
		</form>
	</div>
</section>
