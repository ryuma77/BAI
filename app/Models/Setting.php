<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Setting extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'settings';

    const AUTO_CANCEL_CUTI_SELECT = [
        'Y' => 'Ya',
        'N' => 'Tidak',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const AWAL_SALDO_CUTI_SELECT = [
        'dateJoin' => 'Setahun dari Tanggal Join',
        'januari'  => 'Per Tanggal 1 Januari',
    ];

    protected $fillable = [
        'auto_cancel_cuti',
        'awal_saldo_cuti',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
