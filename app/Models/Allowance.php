<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Allowance extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'allowances';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ALLOWANCE_TYPE_SELECT = [
        'F' => 'Fix',
        'P' => 'Persentase Gaji Pokok',
        'D' => 'Hari Kerja',
    ];

    protected $fillable = [
        'kode_allowance',
        'allowance',
        'allowance_type',
        'nilai',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
