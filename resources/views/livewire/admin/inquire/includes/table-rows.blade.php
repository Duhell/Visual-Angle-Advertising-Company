@forelse ( $inquiries as $index => $inquire)
    <tr wire:key='{{ $inquire->inquire_uuid }}'>
        <th>{{ $loop->iteration  }}</th>
        <td>{{ $inquire->FullName }}</td>
        <td>{{ date('F d, Y',strtotime($inquire->created_at)) }}</td>
        <td><label for="modal-inquire" wire:click='details("{{ $inquire->inquire_uuid }}")' class="py-1 px-2 cursor-pointer bg-green-400 hover:bg-green-600 duration-200 rounded-md text-sm text-slate-100">View details</label></td>
    </tr>
@empty
    <tr>
        <td>No inquiries</td>
    </tr>
@endforelse
