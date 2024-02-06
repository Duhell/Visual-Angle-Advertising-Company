<input class="modal-state" id="create_voucher_modal" type="checkbox" />
<div  class="modal w-screen">
	<div class="modal-content flex flex-col gap-5 max-w-3xl relative before:absolute before:content-[''] before:left-0 before:top-0 before:w-1 before:h-full before:bg-blue-500">
        @if(session('success_voucher'))
        <div class="bg-green-200 text-green-800 flex items-center border border-green-600 gap-x-3 p-2.5 rounded-md my-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>{{ session('success_voucher') }}</span>
        </div>
        @endif
		<h2 class="text-lg">Create New Voucher</h2>
		<form wire:submit.prevent='createVoucher'>
            <div class="grid grid-cols-2 gap-3 mb-7">
                <div class="flex flex-col col-span-full">
                    <input wire:model='Voucher_Name' class=" p-2 focus:outline-blue-400 border rounded-md placeholder:text-xs"  type="text" placeholder="Voucher">
                    @error('Voucher_Name') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col">
                    <input wire:model='Voucher_Value'  class="p-2 border focus:outline-blue-400 rounded-md placeholder:text-xs"  type="text" placeholder="Discount: 10% or 400">
                    @error('Voucher_Value') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col">
                    <input wire:model='Voucher_Expiry' onblur="this.type='text'" onfocus="this.type='datetime-local'" class="p-2 focus:outline-blue-400 border rounded-md placeholder:text-xs"  type="text" placeholder="Expiry">
                    @error('Voucher_Expiry') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>

            </div>
            <div class="flex justify-end gap-3">
                <label wire:click='resetVoucherForm'  for="create_voucher_modal" class="py-1.5 px-3 text-sm bg-blue-200 hover:bg-blue-300 border border-blue-500 cursor-pointer text-blue-600 rounded-md">Cancel</label>
                <button type="submit" class="py-1.5 px-3 text-sm bg-blue-500 hover:bg-blue-700 text-slate-100 rounded-md border border-blue-700">Create</button>
            </div>
        </form>
	</div>
</div>
