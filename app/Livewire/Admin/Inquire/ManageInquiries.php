<?php

namespace App\Livewire\Admin\Inquire;

use App\Models\Inquire;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Title('Manage Inquiries')]
#[Layout('/livewire/layout/app')]
class ManageInquiries extends Component
{
    use WithPagination;

    public string $search = "";
    public function render()
    {
        return view('livewire.admin.inquire.manage-inquiries',[
            'inquiries' => Inquire::latest()->where('FullName','like',"%{$this->search}%")->paginate(2)
        ]);
    }
}
