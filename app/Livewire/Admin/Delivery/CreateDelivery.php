<?php

namespace App\Livewire\Admin\Delivery;

use App\Models\Customer;
use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('Create Delivery Receipt')]
#[Layout('/livewire/layout/app')]
class CreateDelivery extends Component
{
    public $products = [];
    public string $FullName = "";
    public string $Email = "";

    public string $PhoneNumber = "";
    public string $Country = "";
    public string $Province = "";
    public string $City = "";
    public string $Street = "";
    public string $PostCode = "";
    public string $OrderDate = "";
    public bool $OrderStatus = false;

    public int $OrderSubtotal = 0;
    public int $OrderShippingFee = 0;
    public int $OrderTotal = 0;

    public string $AdditionalNotes = "";

    public function add_product(){
        $this->products[] = [
            'Product'=> '',
            'Quantity'=> 0,
            'Price'=> 0,
            'SubTotal'=> 0
        ];
    }

    public function remove_product(int $index){
        unset($this->products[$index]);
            $this->products = array_values($this->products);
    }


    public function SaveReceipt(){
       if(empty($this->products)){
            session()->flash('error','No order has been set.');
            return;
       }else{
            $customer_data = [
                'FullName' => $this->FullName,
                'Email' => $this->Email,
                'PhoneNumber' => $this->PhoneNumber,
                'Country' => $this->Country,
                'Province' => $this->Province,
                'City' => $this->City,
                'Street' => $this->Street,
                'PostCode' => $this->PostCode,
                'OrderDate' => $this->OrderDate,
                'OrderStatus' => $this->OrderStatus,
                'OrderSubtotal' => $this->OrderSubtotal,
                'OrderShippingFee' => $this->OrderShippingFee,
                'OrderTotal' => $this->OrderTotal,
            ];
            $customer = new Customer;
            $customer->fill($customer_data);
            $customer->save();

            $order = new Order;
            $order->Customer_id = $customer->id;
            foreach($this->products as $product){
                $order->fill($product);
            }
            $order->save();

            return session()->flash('success','Successfully created order receipt.');

       }
    }

    public function updateSubTotal($index){

        if($this->products[$index]['Quantity'] !== "" && $this->products[$index]['Price'] !== "" ){
            $this->products[$index]['SubTotal'] = $this->products[$index]['Quantity'] * $this->products[$index]['Price'];
        }else if($this->products[$index]['Quantity'] === ""){
            $this->products[$index]['Quantity'] = 0;
            $this->products[$index]['SubTotal'] = $this->products[$index]['Quantity'] * $this->products[$index]['Price'];
        }else if($this->products[$index]['Price'] === "" ){
            $this->products[$index]['Price'] = 0;
            $this->products[$index]['SubTotal'] = $this->products[$index]['Quantity'] * $this->products[$index]['Price'];
        }

        foreach($this->products as $product){
            $this->OrderSubtotal += $product['SubTotal'];
        }

        $this->updateTotal();

    }
    public function updateTotal(){
        if(empty($this->OrderShippingFee)){
            $this->OrderShippingFee = 0;
        }else{
            $this->OrderTotal = $this->OrderSubtotal - $this->OrderShippingFee;
        }
    }


    public function render()
    {
        return view('livewire.admin.delivery.create-delivery');
    }
}
