<?php

namespace App\Livewire\Admin\Delivery;

use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Voucher;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('Create Delivery Receipt')]
#[Layout('/livewire/layout/app')]
class CreateDelivery extends Component
{
    //! Only validation, No exception catching...
    //TODO: Add error handling like try and catch
    public $products = [];
    #[Rule('required')]
    public string $FullName = "";
    #[Rule('required')]
    public string $Email = "";
    #[Rule('required')]
    public string $PhoneNumber = "";
    #[Rule('required')]
    public string $Country = "";
    #[Rule('required')]
    public string $Province = "";
    #[Rule('required')]
    public string $City = "";
    #[Rule('required')]
    public string $Street = "";
    #[Rule('required')]
    public string $PostCode = "";
    #[Rule('required')]
    public string $OrderDate = "";
    #[Rule('required')]
    public bool $OrderStatus = false;
    public int $OrderSubtotal = 0;
    #[Rule('required')]
    public int $OrderShippingFee = 0;
    public int $OrderTotal = 0;

    public string $AdditionalNotes = "";
    public $vouchers;
    public $selectedVoucherDiscount = null;

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

    public function open_vouchers(){
        $this->vouchers = Voucher::latest()->get();
        $this->selectedVoucherDiscount = null;
        $this->updateTotal();
    }

    public function select_voucher(string $voucher_code = ""){
        $voucher = Voucher::select(['Voucher_Code','Voucher_Value'])->where('Voucher_Code',$voucher_code)->first();
        $this->selectedVoucherDiscount = [
            'Code'=>$voucher->Voucher_Code,
            'Value'=>$voucher->Voucher_Value
        ];
        $this->updateTotal();
    }


    public function SaveReceipt(){
        $this->validate();
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
            $customer->AdditionalNotes = $this->AdditionalNotes;
            $customer->save();

            foreach($this->products as $product){
                $order = new Order;
                $order->Customer_id = $customer->id;
                $order->fill($product);
                $order->save();
            }
            $this->reset();
            return session()->flash('success','Successfully created order receipt.');

       }
    }

    public function updateSubTotal($index){

        if($this->products[$index]['Quantity'] == "" || $this->products[$index]['Price'] == "" ){
            $this->products[$index]['Quantity'] = 0;
            $this->products[$index]['Price'] = 0;
            $this->products[$index]['SubTotal'] = 0;
            $this->OrderSubtotal = 0; // Reset OrderSubtotal
            foreach($this->products as $product){
                $this->OrderSubtotal += $product['SubTotal'];
            }
        } else {
            //* Calculate subtotal
            $this->products[$index]['SubTotal'] = $this->products[$index]['Quantity'] * $this->products[$index]['Price'];
            //* Update OrderSubtotal
            $this->OrderSubtotal = 0; // Reset OrderSubtotal
            foreach($this->products as $product){
                $this->OrderSubtotal += $product['SubTotal'];
            }
        }
        $this->updateTotal();
    }

    public function updateTotal()
    {
        if (empty($this->OrderShippingFee)) {
            $this->OrderShippingFee = 0;
        }

        if ($this->selectedVoucherDiscount !== null) {
            $raw_value_discount = $this->selectedVoucherDiscount["Value"];

            //* Convert to string from array value
            $discount_toString = strval($raw_value_discount);

            if (strpos($discount_toString, "%") !== false) {
                //* If the discount is in percentage
                $discount = floatval(str_replace("%", "", $discount_toString)) / 100;
                $this->OrderTotal = ($this->OrderSubtotal + $this->OrderShippingFee) * $discount;
            } else {
                //* If the discount is not a percentage
                $discount = floatval($discount_toString);
                $this->OrderTotal = ($this->OrderSubtotal + $this->OrderShippingFee) - $discount;
            }
        } else {
            //* If no voucher applied
            $this->OrderTotal = $this->OrderSubtotal + $this->OrderShippingFee;
        }
    }


    public function render()
    {
        return view('livewire.admin.delivery.create-delivery');
    }
}
