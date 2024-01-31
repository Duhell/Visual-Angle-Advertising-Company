<?php

namespace App\Livewire;

use App\Models\Inquire;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('index')]
#[Title('Inquire | Visual Angle Advertising Company')]
class InquireComponent extends Component
{
    #[Validate('required|min:3')]
    public string $FullName;
    #[Validate('required')]
    public string $Email;
    #[Validate('required')]
    public string $PhoneNumber;
    #[Validate('required|min:3')]
    public string $Message;


    public function send()
    {
        $this->validate();
        Inquire::create($this->all());
        session()->flash('success','Inquire Sent');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.inquire-component');
    }
}
