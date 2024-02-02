<input class="modal-state" id="modal-delivery" type="checkbox" />
<div class="modal w-screen">
	{{-- <label class="modal-overlay" ></label> --}}
	<div class="modal-content flex flex-col gap-5 w-full">
		<label wire:click='cancelView' for="modal-delivery" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
        <div wire:loading class="skeleton w-24 h-4"></div>
        <span wire:loading.remove class="text-xs p-0 m-0 {{  $data['customer']->OrderStatus ?? "" ? "text-green-600 font-semibold" : "text-rose-700 font-semibold" }}">{{  $data['customer']->OrderStatus ?? "" ? "Paid" : "Pending" }}</span>
        <div class="flex justify-between mt-2 w-full items-center">
            <h2 class="text-lg">View Receipt</h2>
            <div wire:loading class="skeleton w-24 h-4"></div>
            <small wire:loading.remove class="text-slate-500">{{ $data['customer']->OrderTrackNumber ?? "" }}</small>
        </div>
        <div wire:loading.remove>
            <div class="text-sm grid grid-cols-2 gap-x-6">
                <div >
                    <div class="flex flex-col border-b-2 mb-4">
                        <span class="text-xs">Name : </span>
                        <span>{{ $data['customer']->FullName ?? "" }}</span>
                    </div>
                    <div class="flex flex-col border-b-2 mb-4">
                        <span class="text-xs">Email : </span>
                        <span>{{ $data['customer']->Email ?? "" }}</span>
                    </div>
                    <div class="flex flex-col border-b-2 mb-4">
                        <span class="text-xs">Phone Number : </span>
                        <span>{{ $data['customer']->PhoneNumber ?? "" }}</span>
                    </div>
                </div>

                <div >
                    <div class="flex flex-col border-b-2 mb-4">
                        <span class="text-xs">Subtotal : </span>
                        <span>₱ {{ $data['customer']->OrderSubtotal ?? "" }}</span>
                    </div>

                    <div class="flex flex-col border-b-2 mb-4">
                        <span class="text-xs">Shipping Fee : </span>
                        <span>₱{{ $data['customer']->OrderShippingFee ?? "" }}</span>
                    </div>

                    <div class="flex flex-col border-b-2 mb-4">
                        <span class="text-xs">Total : </span>
                        <span>₱ {{ $data['customer']->OrderTotal ?? "" }}</span>
                    </div>
                </div>
            </div>

            <div class="flex w-full overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $data['orders'] ?? [] as $order )
                        <tr>
                            <th>{{ $order->Product }}</th>
                            <td>{{ $order->Quantity }}</td>
                            <td>{{ $order->Price }}</td>
                            <td>{{ $order->SubTotal  }}</td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="12">No orders</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex w-full mt-3 flex-col text-xs">
                <span>Delivery Address :</span>
                <span>
                    {{ $data['customer']->Street ?? "" }},
                    {{ $data['customer']->City ?? "" }},
                    {{ $data['customer']->Province ?? "" }},
                    {{ $data['customer']->PostCode ?? "" }},
                    {{ $data['customer']->Country ?? "" }},
                </span>
            </div>

            <div class="w-full mt-2 text-wrap text-xs flex flex-col">
                <span>Additional Notes :</span>
                <span>{{ $data['customer']->AdditionalNotes ?? "" }}</span>
            </div>
        </div>

        <div wire:loading>
            <div class="skeleton h-24"></div>
            <table class="table w-full max-w-4xl">
                <thead>
                    <tr>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                    </tr>
                    <tr>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                    </tr>
                    {{-- <tr>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                    </tr>
                    <tr>
                        <th><div class="skeleton h-5 rounded-md"></div></th>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                        <td><div class="skeleton h-5 rounded-md"></div></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
	</div>
</div>
