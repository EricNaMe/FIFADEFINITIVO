<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Team extends Model
{

   // use SoftDeletes;

    protected $fillable = [
        'name',
        'points',
        'folder_league',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users(){
        return $this->belongsToMany('App\User')
            ->withPivot('status');
    }

    public function Cup(){
        return $this->belongsToMany('App\Cup','team_cups')
            ->withPivot('status');
    }

    public function League(){
        return $this->belongsToMany('App\League','team_leagues')
            ->withPivot('status');
    }
    
     public function Team_user(){
        return $this->belongsToMany('App\User','team_user')
            ->withPivot('status');
    }
    
     public function saveImage(UploadedFile $file)
    {
        $image = \Image::make($file);
        $image->fit(200,200);
        $image->save('images/pvsp/'.$this->id.'_md');
        $image->fit(50,50);
        $image->save('images/pvsp/'.$this->id.'_sm');
    }
    
      public function getImageUrl()
    {
         
         $StringName= str_replace(" ","_",$this->name);
        return url($this->folder_league.'/'.$StringName.'-LOGO.png');
    }
    
 

}
