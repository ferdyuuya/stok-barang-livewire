<?php

namespace App\Models;

use App\Models\StokLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function stokLogs()
    {
        return $this->hasMany(StokLogs::class);
    }
}
