<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Bpj extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'bpjs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'jenis_program',
        'perusahaan',
        'karyawan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const JENIS_PROGRAM_SELECT = [
        'JHT' => 'Jaminan Hari Tua',
        'JKK' => 'Jaminan Kecelakaan Kerja',
        'JKM' => 'Jaminana KeMatian',
        'JP'  => 'Jaminan Pensiun',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
