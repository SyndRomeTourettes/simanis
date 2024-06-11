<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    // Fillable default untuk kolom yang umum antara PC dan Non-PC
    protected $fillable = [
        'kode_inventaris', 
        'jenis_barang', 
        'serial_number', 
        'merk_type', 
        'tanggal_registrasi',
    ];

    // Fillable khusus untuk PC
    protected $fillableForPc = [
        'processor', 
        'ram', 
        'disk', 
        'os', 
        'vga'
    ];

    // Fillable khusus untuk Non-PC
    protected $fillableForNonPc = [
        'tipe_barang'
    ];

    // Method untuk mengatur fillable berdasarkan jenis
    public function setFillableForType($type)
    {
        if ($type === 'pc') {
            $this->fillable = array_merge($this->fillable, $this->fillableForPc);
        } else {
            $this->fillable = array_merge($this->fillable, $this->fillableForNonPc);
        }
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
