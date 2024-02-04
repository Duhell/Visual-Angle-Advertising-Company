<section class="w-full">
    <div class="flex justify-between items-center pr-5">
        <h1 class="font-bold text-2xl">Manage Deliveries</h1>
        @include('livewire.admin.inquire.includes.search-box')
    </div>
    {{-- Notification --}}
    @include('success.success')
    {{-- Notification --}}
    <div class="flex w-full mt-10 py-6 overflow-x-auto">
        <table class="table-zebra table relative before:absolute before:h-1 before:w-full before:conten=[''] before:top-0 before:bg-blue-500">
            <thead>
                <tr>
                    <th></th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Order Track Number</th>
                    <th>Order Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.admin.delivery.includes.table-rows-deliveries')
            </tbody>
        </table>
    </div>
    <div class="w-full mt-6">
        {{ $customers->withPath(session('deliveryURL'))->links('pagination.tailwind-pagination') }}
    </div>

    <div>
        @include('livewire.admin.delivery.includes.modal-deliveries')
    </div>
</section>
