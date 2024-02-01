<?php

namespace App\Livewire\Admin\Delivery;

use App\Models\Customer;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('Manage Deliveries')]
#[Layout('/livewire/layout/app')]
class ManageDeliveries extends Component
{
    public string $search = "";
    public function render()
    {
        //Todo: Add the id in the select if needed
        return view('livewire.admin.delivery.manage-deliveries',[
            'customers' => Customer::latest()
                        ->select('Customer_uuid','FullName', 'Email','OrderTrackNumber','OrderStatus')
                        ->where('FullName','like',"%{$this->search}%")
                        ->orWhere('OrderTrackNumber', 'like', "%{$this->search}%")
                        ->paginate(5)
        ]);
    }
}
