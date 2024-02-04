@forelse ( $vouchers as $index => $voucher)
    <tr wire:key='{{ $voucher->Voucher_Code }}'>
        <th>{{ $voucher->Voucher_Code }}</th>
        <td>{{ $voucher->Voucher_Name }}</td>
        <td>{{ date('M d, Y',strtotime($voucher->created_at))  }}</td>
        <td>{{ date('D ,M d, Y',strtotime($voucher->Voucher_Expiry))  }}</td>
    </tr>
@empty
    <tr>
        <td colspan="12">No Available Vouchers</td>
    </tr>
@endforelse
