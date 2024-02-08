<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Log;
use App\Models\Inquire;
use App\Models\Voucher;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

#[Layout('/livewire/layout/app')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public $data_deliveries;
    public $currentInquiries;
    public $previousInquiries;
    public $currentMonthDeliveries;
    public $previousMonthDeliveries;
    public $nextVoucherToExpire;
    public $recentlyExpiredVoucher;
    public $logs;

    public function mount(){
        $monthsAgo = now()->subMonths(4);
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $previousMonth = now()->subMonth()->month;

        $this->displayNumberOfDelivies($monthsAgo,$currentYear,$currentMonth,$previousMonth);
        $this->displayNumberOfInquiries($currentYear,$currentMonth,$previousMonth);
        $this->displayExpiredVoucher();

        // LOGS
        $this->logs = Log::latest()->limit(15)->get();


    }

    private function displayNumberOfDelivies($monthsAgo,$currentYear,$currentMonth,$previousMonth){
        $this->data_deliveries = Customer::select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(OrderDate, '%m-%Y') as monthYear"))
        ->where('OrderDate', '>=', $monthsAgo)
        ->groupBy('monthYear')
        ->orderBy('OrderDate','ASC')
        ->get()
        ->pluck('data', 'monthYear');

        $this->data_deliveries = $this->data_deliveries->mapWithKeys(function ($data, $monthYear) {
            list($month, $year) = explode('-', $monthYear);
            return [date('F', mktime(0, 0, 0, $month, 10)) . " " . $year => $data];
        });

        $this->currentMonthDeliveries = Customer::whereYear('OrderDate', $currentYear)
        ->whereMonth('OrderDate', $currentMonth)
        ->count();

        $this->previousMonthDeliveries = Customer::whereYear('OrderDate', $currentYear)
        ->whereMonth('OrderDate', $previousMonth)
        ->count();
    }

    private function displayNumberOfInquiries($currentYear,$currentMonth,$previousMonth){
        $this->currentInquiries = Inquire::whereYear('created_at', $currentYear)
        ->whereMonth('created_at', $currentMonth)
        ->count();

        $this->previousInquiries = Inquire::whereYear('created_at', $currentYear)
        ->whereMonth('created_at', $previousMonth)
        ->count();
    }

    private function displayExpiredVoucher()
    {
        // Get current datetime
        $now = now();

        $this->recentlyExpiredVoucher = Voucher::where('Voucher_Expiry', '<=', $now)
                                     ->where('isExpired', false)
                                     ->orderBy('Voucher_Expiry', 'desc')
                                     ->first();

        if ($this->recentlyExpiredVoucher) {
            $this->recentlyExpiredVoucher->isExpired = true;
            $this->recentlyExpiredVoucher->save();
        }


        // Find the next voucher to expire
        $this->nextVoucherToExpire = Voucher::where('Voucher_Expiry', '>', $now)
            ->where('isExpired', false)
            ->orderBy('Voucher_Expiry', 'asc')
            ->first();
    }


    public function render()
    {
        return view('livewire.admin.dashboard.dashboard');
    }
}
