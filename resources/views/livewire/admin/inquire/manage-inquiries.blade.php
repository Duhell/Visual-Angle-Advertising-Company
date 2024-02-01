<section class="w-full">
    <div class="flex justify-between items-center pr-5">
        <h1 class="font-bold text-2xl">Manage Inquiries</h1>
        @include('livewire.admin.inquire.includes.search-box')
    </div>

    <div class="flex w-full mt-10 overflow-x-auto">
        <table class="table-zebra table">
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
    <div class="w-full outline">
        {{ $inquiries->links('pagination::tailwind') }}
    </div>
</section>
