<section class="w-full pb-7">
    <h1 class="font-bold text-2xl">Create New Delivery Receipt</h1>
    @include('success.success')
    <form wire:submit.prevent='SaveReceipt' class="mt-14 gap-7 grid grid-cols-3">
        <div class=" bg-slate-50 col-span-2 shadow-md rounded-md">
            <div class="p-4 bg-slate-700 rounded relative before:absolute before:left-0 before:w-full before:h-1 before:content=[''] before:top-0 before:bg-blue-500">
                <h1 class="text-lg text-slate-100">Customer Information</h1>
            </div>
            <div class="p-4 grid grid-cols-3 gap-3">
                <div class="flex flex-col col-span-2 justify-center">
                    <label class="text-sm">Full Name</label>
                    <input wire:model='FullName' autocomplete="off" type="text" class="p-1 border-2 focus:outline-blue-400 w-full rounded-md bg-slate-50">
                    @error('FullName') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>


                <div class="flex flex-col  justify-center">
                    <label class="text-sm">Email</label>
                    <input wire:model='Email' autocomplete="off" type="email" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                    @error('Email') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>


                <div class="flex flex-col justify-center">
                    <label class="text-sm">Phone Number</label>
                    <input wire:model='PhoneNumber' autocomplete="off" type="text" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                    @error('PhoneNumber') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>


                <div class="flex flex-col justify-center">
                    <label class="text-sm">Country</label>
                    <input wire:model='Country' autocomplete="off" type="text" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                    @error('Country') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>


                <div class="flex flex-col justify-center">
                    <label class="text-sm">Province</label>
                    <input wire:model='Province' autocomplete="off" type="text" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                    @error('Province') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>


                <div class="flex flex-col justify-center">
                    <label class="text-sm">City</label>
                    <input wire:model='City' autocomplete="off" type="text" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                    @error('City') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>


                <div class="flex flex-col justify-center">
                    <label class="text-sm">Street</label>
                    <input wire:model='Street' autocomplete="off" type="text" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                    @error('Street') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>


                <div class="flex flex-col justify-center">
                    <label class="text-sm">Postcode</label>
                    <input wire:model='PostCode' autocomplete="off" type="text" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                    @error('PostCode') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror
                </div>

            </div>
        </div>

        <div class=" bg-slate-50 shadow-md rounded-md">
            <div class="p-4 bg-slate-700 rounded relative before:absolute before:left-0 before:w-full before:h-1 before:content-[''] before:top-0 before:bg-blue-500">
                <h1 class="text-lg text-slate-100">Order</h1>
            </div>

            <div class="p-4">
                <div>
                    <label class="text-sm">Order Date</label>
                    <input wire:model='OrderDate' autocomplete="off" type="date" class="p-1 border-2 focus:outline-blue-400  w-full rounded-md bg-slate-50">
                </div>
                @error('OrderDate') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror

                <div class="mt-2">
                    <label  class="text-sm">Status</label>
                    <select wire:model.defer='OrderStatus' class="select text-sm rounded-md select-ghost-primary">
                        <option value="false" @if($OrderStatus == false) selected @endif>Open</option>
                        <option value="true" @if($OrderStatus == true) selected @endif>Paid</option>
                    </select>
                </div>
                @error('OrderStatus') <span class="text-xs text-rose-600">{{ $message }}</span>@enderror

            </div>
        </div>

        {{-- Product Information --}}
        <div class="flex w-full border col-span-full overflow-x-auto">
            <table class="table relative before:absolute before:h-1 before:w-full before:conten=[''] before:top-0 before:bg-slate-700">
                <thead>
                    <tr >
                        <th class="w-8"><button wire:click='add_product' type="button" class="bg-blue-500 hover:bg-blue-700 duration-300 p-1 w-8 text-white rounded">+</button></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product )
                    <tr wire:key='{{ $product['Product'] }}'>
                        <th><button wire:click='remove_product({{ $index }})' type="button" class="bg-rose-500 hover:bg-red-800 duration-300 p-1 w-8 text-white rounded">-</button></th>
                        <td ><input wire:model='products.{{ $index }}.Product' type="text" class="border-2 p-1 focus:outline-blue-400 w-full rounded-md"></td>
                        <td><input wire:input.live.debounce.1000ms='updateSubTotal({{ $index }})' wire:model='products.{{ $index }}.Quantity' type="number" min="0" class="border-2 focus:outline-blue-400 p-1 w-full rounded-md"></td>
                        <td>
                            <div class="relative">
                                <span class="absolute top-1.5 left-2">₱</span>
                                <input wire:input.live.debounce.1000ms='updateSubTotal({{ $index }})' wire:model='products.{{ $index }}.Price' type="number" min="0" class="border-2 focus:outline-blue-400 px-6 py-1 w-full rounded-md">
                            </div>
                        </td>
                        <td>
                            <div class="relative">
                                <span class="absolute top-1.5 left-2">₱</span>
                                <input disabled wire:model='products.{{ $index }}.SubTotal'  type="text"  class="border-2 focus:outline-blue-400 px-6 py-1 w-full rounded-md">
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            @if (session('error'))
                                <td><span class="text-sm text-rose-500">{{ session('error') }}</span></td>
                            @else
                                <td>No Order</td>
                            @endif
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-span-2">
            <label for="OrderNotes" class="block text-sm font-medium text-gray-700"> Order notes </label>
            <textarea wire:model='AdditionalNotes' id="OrderNotes" class="mt-2 focus:outline-blue-400 p-2 w-full border-2 rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="4"
                placeholder="Enter any additional order notes..."></textarea>
        </div>

        <div>
            <div class="flex justify-between">
                <label class="block text-sm font-medium border-b-2 pb-2 text-gray-700"> Computation </label>
                <label  wire:click='open_vouchers' class="text-xs cursor-pointer text-blue-700 " for="listVouchers">
                    @if(isset($selectedVoucherDiscount))
                        <span>{{ $selectedVoucherDiscount['Code'] }}</span>
                    @else
                        <span>Apply Voucher</span>
                    @endif
                </label>
            </div>
            <div class="text-sm grid grid-cols-1 gap-1 mt-4">
                <div class="flex justify-between items-center">
                    <label >Subtotal</label>
                    <label>₱ {{ $OrderSubtotal }}</label>
                </div>

                <div class="flex justify-between items-center">
                    <label>Shipping Fee</label>
                    <div class="relative">
                        <span class="absolute top-1.5 left-2">₱</span>
                        <input wire:input.live.debounce.1000ms='updateTotal()' wire:model='OrderShippingFee' type="number" min="0" class="border-2 px-6 py-1 w-32 rounded-sm focus:outline-sky-700">
                    </div>
                </div>

                <div class="flex border-t-2 mt-2 pt-1 justify-between items-center">
                    <label>Total</label>
                    <label>₱ {{ $OrderTotal }}</label>
                </div>
            </div>
        </div>

        <div class="col-span-full">
            <button class="bg-blue-600 hover:bg-blue-800 duration-300 text-slate-200 font-bold rounded-md py-3 w-full" type="submit">
                <span wire:target='SaveReceipt' wire:loading.remove>Create Receipt</span>
                <span wire:target='SaveReceipt' wire:loading>Creating...</span>
            </button>
        </div>
        @include('livewire.admin.delivery.includes.modal-apply-vouchers')
    </form>
</section>
