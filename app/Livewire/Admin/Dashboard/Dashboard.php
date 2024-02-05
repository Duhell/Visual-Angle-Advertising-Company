<?php

namespace App\Livewire\Admin\Dashboard;

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
    public $currentMonthDeliveries;
    public $previousMonthDeliveries;


    public function mount(){
        $monthsAgo = now()->subMonths(4);
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $previousMonth = now()->subMonth()->month;

        $this->data_deliveries = Customer::select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(OrderDate, '%m') as month"))
        ->where('OrderDate', '>=', $monthsAgo)
        ->groupBy('month')
        ->get()
        ->pluck('data', 'month');

        $this->data_deliveries = $this->data_deliveries->mapWithKeys(function ($data, $month) {
            return [date('F', mktime(0, 0, 0, $month, 10)) => $data]; // Convert month number to name
        });

        $this->currentMonthDeliveries = Customer::whereYear('OrderDate', $currentYear)
        ->whereMonth('OrderDate', $currentMonth)
        ->count();

        $this->previousMonthDeliveries = Customer::whereYear('OrderDate', $currentYear)
        ->whereMonth('OrderDate', $previousMonth)
        ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.dashboard');
    }
}
