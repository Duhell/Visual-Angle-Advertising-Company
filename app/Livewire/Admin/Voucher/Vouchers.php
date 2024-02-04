<?php

namespace App\Livewire\Admin\Voucher;

use Exception;
use App\Models\Voucher;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

#[Title('Vouchers')]
#[Layout('/livewire/layout/app')]
class Vouchers extends Component
{
    use WithPagination;
    #[Rule('required')]
    public string $Voucher_Name = "";

    #[Rule(['required','regex:/^([0-9]+|[0-9]+%+)$/'])]
    public string $Voucher_Value = "";

    #[Rule('required')]
    public string $Voucher_Expiry = "";

    public function mount(){
        session(['voucherURL' => url()->current()]);
    }

    public function createVoucher(){
        $this->validate();
        $voucher = new Voucher;
        $voucher->fill($this->all());

        try{
            $voucher->save();
            session()->flash('success','Successfully created voucher.');
            $this->resetVoucherForm();
        }catch(Exception $error){
            session()->flash('error','Failed to create a new voucher.');
            Log::error('Error @createVoucher function',[
                'line'=>$error->getLine(),
                'file'=>$error->getFile()
            ]);
        }

    }

    public function resetVoucherForm(){
        $this->reset();
    }

    public function deleteVoucher(string $voucherCode = null){
        try{
            Voucher::where('Voucher_Code',$voucherCode)->firstOrFail()->delete();
            session()->flash('success','Voucher: Delete successfully.');
        }catch(Exception $error){
            session()->flash('error','Voucher: Failed to delete.');
            Log::error('Error @deleteVoucher function',[
                'line'=>$error->getLine(),
                'file'=>$error->getFile()
            ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.voucher.vouchers',[
            'vouchers'=>Voucher::latest()->paginate(5)
        ]);
    }
}
