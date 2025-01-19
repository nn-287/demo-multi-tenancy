<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'credit', 'status'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('videos')
            ->useDisk('public')
            ->acceptsMimeTypes(['video/mp4'])
            ->singleFile();
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('video')
            ->performOnCollections('videos')
            ->keepOriginalImageFormat();
    }

}
