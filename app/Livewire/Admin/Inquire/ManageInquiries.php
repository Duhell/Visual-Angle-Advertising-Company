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
    //? Should I add error handling?
    use WithPagination;

    public string $search = "";
    public  $inquire = null;

    public function details(string $inquiry_uuid = null)
    {
        $this->inquire = Inquire::where('inquire_uuid',$inquiry_uuid)->first();
    }

    public function delete_inquiry(string $inquiry_uuid = null){
        Inquire::where('inquire_uuid',$inquiry_uuid)->first()->delete();
        session()->flash('success','Inquiry deleted.');
        return $this->reset_inquire_modal();
    }
    public function reset_inquire_modal(){
        return $this->inquire = null;
    }
    public function render()
    {
        return view('livewire.admin.inquire.manage-inquiries',[
            'inquiries' => Inquire::latest()->where('FullName','like',"%{$this->search}%")->paginate(2)
        ]);
    }
}
