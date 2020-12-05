<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class EmployeeFamily extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'employee_families';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'anak'     => 'anak',
        'pasangan' => 'pasangan',
        'lainya'   => 'lainya',
    ];

    protected $fillable = [
        'employee_name_id',
        'family_name',
        'status',
        'keterangan',
        'nik_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
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

    public function employee_name()
    {
        return $this->belongsTo(Employee::class, 'employee_name_id');
    }

    public function nik()
    {
        return $this->belongsTo(Employee::class, 'nik_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
