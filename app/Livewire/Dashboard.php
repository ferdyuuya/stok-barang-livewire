<?

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\StokLogs;

class Dashboard extends Component
{
    public $totalBarang;
    public $recentUpdates;

    public function mount()
    {
        $this->totalBarang = Barang::count();
        $this->recentUpdates = StokLogs::latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
