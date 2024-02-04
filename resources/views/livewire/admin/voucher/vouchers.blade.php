<section>
    <div class="flex justify-between items-center pr-5">
        <h1 class="text-2xl  font-bold">Vouchers</h1>
        <label for="create_voucher_modal" class="bg-blue-400 text-sm py-1.5 px-3 cursor-pointer rounded-md text-slate-100 border border-indigo-400 hover:bg-blue-600 duration-200 flex gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
            </svg>
            <span>Create Voucher</span>
        </label>
    </div>
    @include('success.success')
    <div class="flex w-full mt-10 py-6 overflow-x-auto">
        <table class="table-zebra table relative before:absolute before:h-1 before:w-full before:conten=[''] before:top-0 before:bg-blue-500">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Voucher</th>
                    <th>Created</th>
                    <th>Expiry</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.admin.voucher.includes.table-rows-vouchers')
            </tbody>
        </table>
    </div>

    <div class="w-full mt-6">
        {{ $vouchers->withPath(session('voucherURL'))->links('pagination.tailwind-pagination') }}
    </div>

    <div>
        @include('livewire.admin.voucher.includes.modal-create-voucher')
    </div>

</section>
