<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Jadwal extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'jadwals';

    protected $dates = [
        'tanggal_awal',
        'tanggal_akhir',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const KATEGORI_JADWAL_SELECT = [
        'Office' => 'Office',
        'shift1' => 'Shift 1',
        'shift2' => 'Shift 2',
        'shift3' => 'Shift 3',
    ];

    protected $fillable = [
        'tanggal_awal',
        'tanggal_akhir',
        'departement_id',
        'bagian_id',
        'jam_masuk',
        'jam_pulang',
        'kategori_jadwal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getTanggalAwalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAwalAttribute($value)
    {
        $this->attributes['tanggal_awal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalAkhirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAkhirAttribute($value)
    {
        $this->attributes['tanggal_akhir'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function departement()
    {
        return $this->belongsTo(Department::class, 'departement_id');
    }

    public function bagian()
    {
        return $this->belongsTo(Section::class, 'bagian_id');
    }
}
