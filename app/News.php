<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class News extends Model
{

    use SoftDeletes;
    protected $softDelete = true;


    protected $fillable = [
        'message',

    ];

    public function saveImage(UploadedFile $file)
    {

        $image = \Image::make($file);
        $image->fit(950,600);

        $image->save('images/news/'.$this->id.'_md');
        $image->fit(50,50);
        $image->save('images/news/'.$this->id.'_sm');
    }


    public function getImageUrl($size = 'md')
    {
        return url('images/news/',[$this->id.'_'.$size]);
    }

}
