<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Pengajuancuti extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pengajuancutis';

    protected $dates = [
        'tanggal_cuti',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nik_id',
        'nama_id',
        'jenis_cuti_id',
        'tanggal_cuti',
        'lama_cuti',
        'sisa_cuti',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function nik()
    {
        return $this->belongsTo(Employee::class, 'nik_id');
    }

    public function nama()
    {
        return $this->belongsTo(Employee::class, 'nama_id');
    }

    public function jenis_cuti()
    {
        return $this->belongsTo(JenisCuti::class, 'jenis_cuti_id');
    }

    public function getTanggalCutiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalCutiAttribute($value)
    {
        $this->attributes['tanggal_cuti'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
