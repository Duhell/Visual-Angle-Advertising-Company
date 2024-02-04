@forelse ( $vouchers as $index => $voucher)
    <tr wire:key='{{ $voucher->Voucher_Code }}'>
        <th>{{ $voucher->Voucher_Code }}</th>
        <td>{{ $voucher->Voucher_Name }}</td>
        <td>{{ date('M d, Y',strtotime($voucher->created_at))  }}</td>
        <td>{{ date('D ,M d, Y',strtotime($voucher->Voucher_Expiry))  }}</td>
        <td>
            <div class="dropdown ">
                <label class="cursor-pointer btn bg-transparent p-0 mx-2" tabindex="0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                    </svg>
                </label>
                <div class="dropdown-menu dropdown-menu-left-top border border-gray-10 ">
                    <div wire:confirm='You are deleting a voucher, proceed?' wire:click='deleteVoucher("{{ $voucher->Voucher_Code }}")' class="dropdown-item text-rose-600 hover:bg-rose-400 hover:text-slate-50">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <span>Delete Voucher</span>
                        </div>
                    </div>
                </div>

            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="12">No Available Vouchers</td>
    </tr>
@endforelse
