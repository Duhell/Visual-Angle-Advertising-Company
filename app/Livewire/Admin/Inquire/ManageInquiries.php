<?php

namespace App\Livewire\Admin\Inquire;

use App\Models\Inquire;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Title('Manage Inquiries')]
#[Layout('/livewire/layout/app')]
class ManageInquiries extends Component
{
    use WithPagination, WithoutUrlPagination;

    public string $search = "";
    public ?Inquire $selectedInquiry = null;

    public function mount(){
        session(['inquireURL' => url()->current()]);
    }

    public function details(string $inquiry_uuid = null)
    {
        $this->selectedInquiry = Inquire::where('inquire_uuid', $inquiry_uuid)->firstOrFail();
    }

    public function deleteInquiry(string $inquiry_uuid = null)
    {
        $inquiry = Inquire::where('inquire_uuid', $inquiry_uuid)->firstOrFail();
        $inquiry->delete();
        session()->flash('success', 'Inquiry deleted.');
        $this->resetInquiryModal();
    }

    public function resetInquiryModal()
    {
        $this->selectedInquiry = null;
    }

    public function render()
    {
        return view('livewire.admin.inquire.manage-inquiries', [
            'inquiries' => Inquire::latest()->where('FullName', 'like', "%{$this->search}%")->paginate(7),
        ]);
    }
}
