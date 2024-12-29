<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokLogs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $totalBarang;
    public $recentUpdates;

    public function __invoke()
    {
        $this->totalBarang = Barang::count();
        $this->recentUpdates = StokLogs::latest()->take(2)->get();
        
        return view('dashboard')->with([
            'totalBarang' => $this->totalBarang,
            'recentUpdates' => $this->recentUpdates,
        ]);
    }


}
