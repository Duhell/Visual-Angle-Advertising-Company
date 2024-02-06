<?php

namespace App\Livewire\Admin\Delivery;

use App\Models\Customer;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Title('Manage Deliveries')]
#[Layout('/livewire/layout/app')]
class ManageDeliveries extends Component
{
    use WithPagination;
    public string $search = "";
    public array $data = [];
    public string $customer____uuid = "";

    public function downloadPDF(string $customer_uuid = null){
        $customer = Customer::where('Customer_uuid',$customer_uuid)->first();
        $orders = Order::where('Customer_id',$customer->id)->get();

        $pdf = Pdf::loadView('livewire/admin/delivery/receipt/receipt',[
            'customer' => $customer,
            'orders' => $orders
        ]);
        \App\Models\Log::newLog('Receipt Download', $customer->OrderTrackNumber);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $customer->FullName." Receipt.pdf");
    }

    public function edit(string $customer_uuid = null){
        $customer = Customer::where('Customer_uuid', $customer_uuid)->first();
        if ($customer) {
            $customer->OrderStatus = !$customer->OrderStatus;
            $customer->save();
            session()->flash('success',$customer->FullName.": ".'Order Status updated.');
            \App\Models\Log::newLog('Order Update', $customer->OrderTrackNumber);
        }
    }


    public function view(string $customer_uuid = null){
        $customer = Customer::where('Customer_uuid',$customer_uuid)->first();
        $orders = Order::where('Customer_id',$customer->id)->get();
        return $this->data = [
                    'customer' => $customer,
                    'orders' => $orders
        ];
    }

    public function cancelView(){
        $this->data = [];
    }

    public function delete(string $customer_uuid = null){
        Customer::where('Customer_uuid',$customer_uuid)->first()->delete();
        session()->flash('success','Customer: Successfully deleted.');
        \App\Models\Log::newLog('Delete', 'Customer delete successfully.');
    }

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
