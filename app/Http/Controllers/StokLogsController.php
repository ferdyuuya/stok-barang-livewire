<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokLogs;
use Illuminate\Http\Request;

class StokLogsController extends Controller
{
    public function index()
    {
        return view('stok-logs.index');
    }

    public function addStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1', // Validate quantity
            'description' => 'required|string', // Validate description
        ]);

        // Find the Barang item
        $barang = Barang::findOrFail($id);

        // Increase the quantity
        $barang->quantity += $request->quantity;
        $barang->save();

        // Create a new stock log entry
        StokLogs::create([
            'barang_id' => $id,
            'quantity' => $request->quantity,
            'action' => 'added', // Log action as 'added'
        ]);

        // Optionally return a success response or redirect
        return redirect()->route('dashboard')->with('success', 'Stock added successfully!');
    }

    /**
     * Subtract stock from a Barang item
     */
    public function subtractStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1', // Validate quantity
            'description' => 'required|string', // Validate description
        ]);

        // Find the Barang item
        $barang = Barang::findOrFail($id);

        // Ensure enough stock is available before subtracting
        if ($barang->quantity < $request->quantity) {
            return redirect()->route('dashboard')->with('error', 'Not enough stock to subtract.');
        }

        $barang->quantity -= $request->quantity;
        $barang->save();

        StokLogs::create([
            'barang_id' => $id,
            'quantity' => $request->quantity,
            'action' => 'subtracted', // Log action as 'subtracted'
        ]);

        // Optionally return a success response or redirect
        return redirect()->route('dashboard')->with('success', 'Stock subtracted successfully!');
    }
    
    
}
