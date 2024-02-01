@forelse ( $inquiries as $index => $inquire)
    <tr wire:key='{{ $inquire->inquire_uuid }}'>
        <th>{{ $index  }}</th>
        <td>{{ $inquire->FullName }}</td>
        <td>{{ date('F d, Y',strtotime($inquire->created_at)) }}</td>
        <td><button wire:click='details("{{ $inquire->inquire_uuid }}")' class="py-1 px-2 bg-green-400 hover:bg-green-600 duration-200 rounded-md text-sm text-slate-100">View details</button></td>
    </tr>
@empty
    <tr>
        <td>No inquiries</td>
    </tr>
@endforelse
