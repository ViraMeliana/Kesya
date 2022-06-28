<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class DasarHukum extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $table = 'dasar_hukums';

    protected $appends = [
        'file_hukum',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kategori_dasar_hukum_id',
        'nama_hukum',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function kategori_dasar_hukum()
    {
        return $this->belongsTo(KategoriDasarHukum::class, 'kategori_dasar_hukum_id');
    }

    public function getFileHukumAttribute()
    {
        return $this->getMedia('file_hukum')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
