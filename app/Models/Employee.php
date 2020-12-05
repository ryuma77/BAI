<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class Employee extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'employees';

    protected $appends = [
        'jpg',
    ];

    const RESIGN_SELECT = [
        'Y' => 'Y',
        'N' => 'N',
    ];

    const JENIS_KELAMIN_SELECT = [
        'M' => 'Male',
        'F' => 'Female',
    ];

    const MARITAL_STATUS_SELECT = [
        'Single'  => 'Single',
        'Married' => 'Married',
    ];

    protected $dates = [
        'tanggal_lahir',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const EMPLOYEE_STATUS_SELECT = [
        'Draft'     => 'Draft',
        'Contract'  => 'Contract',
        'Permanent' => 'Permanent',
    ];

    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'division_id',
        'department_id',
        'position_id',
        'marital_status',
        'alamat',
        'kota',
        'kode_pos',
        'employee_status',
        'resign',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function employeeSalaries()
    {
        return $this->hasMany(Salary::class, 'employee_id', 'id');
    }

    public function employeeNameEmployeeFamilies()
    {
        return $this->hasMany(EmployeeFamily::class, 'employee_name_id', 'id');
    }

    public function employeeNameRotations()
    {
        return $this->hasMany(Rotation::class, 'employee_name_id', 'id');
    }

    public function employeeNamePromotions()
    {
        return $this->hasMany(Promotion::class, 'employee_name_id', 'id');
    }

    public function getTanggalLahirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function getJpgAttribute()
    {
        $file = $this->getMedia('jpg')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
