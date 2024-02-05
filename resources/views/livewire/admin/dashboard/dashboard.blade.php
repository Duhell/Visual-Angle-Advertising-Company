<div>
    <div >
        <div>
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <small>Visual Angle Advertising Company</small>
        </div>

        <div class="mt-[40px] place-items-center w-full grid grid-cols-3 gap-8 ">
            @include('livewire.admin.dashboard.includes.chart')
            @include('livewire.admin.dashboard.includes.logs')
        </div>

        <div class="mt-8 py-3 flex gap-5 w-full">
            @include('livewire.admin.dashboard.includes.total')
        </div>
    </div>
</div>
