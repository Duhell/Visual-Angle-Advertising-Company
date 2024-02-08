<div class="min-h-min max-w-64 w-full bg-gradient-to-r from-blue-500 to-blue-300 p-3 rounded-md shadow-sm border border-blue-400">
    <h1 class="font-bold text-2xl text-blue-100">Total Delivery</h1>
    <div class="flex px-2 gap-2 flex-col mt-3 text-white">
        <div class="  bg-blue-200 p-2 rounded text-blue-600 flex text-xs justify-between">
            <span>This Month: </span>
            <span>{{ $currentMonthDeliveries }}</span>
        </div>
        <div class=" bg-blue-200 p-2 rounded text-blue-600 flex text-xs justify-between ">
            <span>Last Month: </span>
            <span>{{ $previousMonthDeliveries }}</span>
        </div>
    </div>
</div>

<div class="min-h-min max-w-64 w-full bg-gradient-to-r from-blue-500 to-blue-300 p-3 rounded-md shadow-sm border border-blue-400">
    <h1 class="font-bold text-2xl text-blue-100">Total Inquiry</h1>
    <div class="flex px-2 gap-2 flex-col mt-3 text-white">
        <div class="  bg-blue-200 p-2 rounded text-blue-600 flex text-xs justify-between ">
            <span>This Month: </span>
            <span>{{ $currentInquiries }}</span>
        </div>
        <div class=" bg-blue-200 p-2 rounded text-blue-600 flex text-xs justify-between ">
            <span>Last Month: </span>
            <span>{{ $previousInquiries }} </span>
        </div>
    </div>
</div>

<div class="min-h-min w-full bg-gradient-to-r from-blue-500 to-blue-300 p-3 rounded-md shadow-sm border border-blue-400">
    <h1 class="font-bold text-2xl text-blue-100">Voucher Expiration</h1>
    <div class="flex px-2 gap-2 flex-col mt-3 text-white">
        <div class="  bg-blue-200 p-2 rounded text-blue-600 flex text-xs justify-between ">
            <span>Expired: </span>
            <span>{{ $recentlyExpiredVoucher->Voucher_Code ?? "No voucher expired recently."  }}</span>
        </div>
        <div class=" bg-blue-200 p-2 rounded text-blue-600 flex text-xs justify-between ">
            <span>Next: </span>
            <span>{{ $nextVoucherToExpire->Voucher_Code ?? "No voucher will expire." }}</span>
        </div>
    </div>
</div>

