<section class="bg-gray-2 max-w-screen-sm mx-auto rounded-xl">
	<div class="p-8 shadow-lg">
        <div class="mb-3">
            <h1 class="text-3xl font-bold">Send Inquire</h1>
            <small class="italic font-light">All fields are required.</small>
        </div>
        @if(session('success'))
        <div class="alert">
            <svg width="32" height="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 4C12.96 4 4 12.96 4 24C4 35.04 12.96 44 24 44C35.04 44 44 35.04 44 24C44 12.96 35.04 4 24 4ZM18.58 32.58L11.4 25.4C10.62 24.62 10.62 23.36 11.4 22.58C12.18 21.8 13.44 21.8 14.22 22.58L20 28.34L33.76 14.58C34.54 13.8 35.8 13.8 36.58 14.58C37.36 15.36 37.36 16.62 36.58 17.4L21.4 32.58C20.64 33.36 19.36 33.36 18.58 32.58Z" fill="#00BA34" />
            </svg>
            <div class="flex flex-col">
                {{-- <span>title</span> --}}
                <span class="text-content2">{{ session('success') }}</span>
            </div>
        </div>
        @else
		<form class="space-y-4" wire:submit='send'>
			<div class="w-full">
				<label class="sr-only" for="name">Name</label>
				<input wire:model='FullName' class="input rounded placeholder:text-xs input-solid max-w-full" placeholder="Full Name" type="text" id="name" />
                @error('FullName') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
			</div>

			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
				<div>
					<label class="sr-only" for="email">Email</label>
					<input wire:model='Email' class="input rounded placeholder:text-xs input-solid" placeholder="Email address" type="email" id="email" />
                    @error('Email') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
				</div>

				<div>
					<label class="sr-only" for="phone">Phone</label>
					<input wire:model='PhoneNumber' class="input rounded placeholder:text-xs input-solid" placeholder="Phone Number" type="tel" id="phone" />
                    @error('PhoneNumber') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
				</div>
			</div>

			<div class="w-full">
				<label class="sr-only" for="message">Message</label>
				<textarea wire:model='Message' class="textarea placeholder:text-xs textarea-solid max-w-full" placeholder="Message" rows="8" id="message"></textarea>
                @error('Message') <span class="text-xs text-rose-400">{{ $message }}</span> @enderror
			</div>

			<div class="mt-4">
				<button type="submit" class="rounded-lg btn btn-primary btn-block">
                    <span wire:loading.remove>Send Inquiry</span>
                    <span wire:loading>Sending...</span>
                </button>
			</div>
		</form>
        @endif

	</div>
</section>
