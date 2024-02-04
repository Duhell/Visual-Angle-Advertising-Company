<section class="w-full">
    <div class="flex justify-between items-center pr-5">
        <h1 class="font-bold text-2xl">Manage Inquiries</h1>
        @include('livewire.admin.inquire.includes.search-box')
    </div>
    {{-- Notification --}}
    @include('success.success')
    {{-- Notification --}}

    <div class="flex w-full mt-10 overflow-x-auto">
        <table class="table-zebra table relative before:absolute before:h-1 before:w-full before:conten=[''] before:top-0 before:bg-blue-500">
            <thead>
                <tr>
                    <th></th>
                    <th>Full Name</th>
                    <th>Inquiry Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.admin.inquire.includes.table-rows')
            </tbody>
        </table>
    </div>
    <div class="w-full mt-6">
        {{ $inquiries->withPath(session('inquireURL'))->links('pagination.tailwind-pagination') }}
    </div>

    <div>
        @include('livewire.admin.inquire.includes.modal-inquire')
    </div>
</section>
