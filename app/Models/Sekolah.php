<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasFactory, HasUuids;

    protected $table        = 'sekolah';
    protected $primaryKey   = 'id';
    protected $guarded      = [];

    public function getLogoSekolahUrlAttribute($value)
    {
        $imageUrl = "";

        if (!is_null($this->logo)) {
            $directory = config('cms.image.directoryLogo');
            $imagePath = public_path() . "/{$directory}" . $this->logo;
            if (file_exists($imagePath)) $imageUrl = asset("/{$directory}" . $this->logo);
        }

        return $imageUrl;
    }

    public function getLogoSekolahThumbUrlAttribute($value)
    {
        $imageThumbUrl = "";

        if (!is_null($this->logo)) {
            $directory = config('cms.image.directoryLogo');
            $ext       = substr(strrchr($this->logo, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->logo);
            $imagePath = public_path() . "/{$directory}" . $thumbnail;
            if (file_exists($imagePath)) $imageThumbUrl = asset("/$directory" . $thumbnail);
        }

        return $imageThumbUrl;
    }
}
