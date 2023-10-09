<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Application extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'applications';

    public const WARD_SELECT = [

    ];

    protected $appends = [
        'image',
        'id_copy',
    ];

    public const PWD_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const PASSPORT_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
    ];

    protected $dates = [
        'dob',
        'passport_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ARE_YOU_INTRESTED_IN_SELECT = [
        'none'       => 'None',
        'training'   => 'Training and capacity building',
        'internship' => 'Internship',
    ];

    public const YEAR_OF_EXPERIENCE_SELECT = [
        'None'          => 'None',
        '1-2 years'     => '1-2 years',
        '3 years'       => '3 years',
        '4 years'       => '4 years',
        '5-6 years'     => '5-6 years',
        'above 7 years' => 'above 7 years',
    ];

    public const SUBCOUNTY_SELECT = [
        'mandera east'  => 'Mandera East',
        'mandera north' => 'Mandera North',
        'mandera south' => 'Mandera South',
        'mandera west'  => 'Mandera West',
        'banissa'       => 'Banissa',
        'lafey'         => 'Lafey',
    ];

    public const EDUCATION_SELECT = [
        'Masters degree'   => 'Masters degree',
        'Bachelors Degree' => 'Bachelors Degree',
        'College'          => 'College',
        'Vocational'       => 'Vocational',
        'Secondary'        => 'Secondary',
        'Primary'          => 'Primary',
        'Madarasa'         => 'Madarasa',
    ];

    protected $fillable = [
        'user_id',
        'idno',
        'dob',
        'gender',
        'mobile',
        'passport',
        'passport_no',
        'passport_date',
        'pwd',
        'parent_name',
        'parent_contact',
        'subcounty',
        'ward',
        'are_you_intrested_in',
        'skills_training_id',
        'education',
        'qualification',
        'grade',
        'year_of_experience',
        'position',
        'duties_responsibilities',
        'status',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPassportDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPassportDateAttribute($value)
    {
        $this->attributes['passport_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function skills_training()
    {
        return $this->belongsTo(Career::class, 'skills_training_id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getIdCopyAttribute()
    {
        $file = $this->getMedia('id_copy')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
