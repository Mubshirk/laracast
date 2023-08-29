<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;

    public static function allu(){
        
        $files = File::files(resource_path("posts/"));

        return array_map(function($file){

            return $file->getContents();
        },$files);

    }

    public static function find($slug){

         $path = base_path("resources/posts/{$slug}.html");


    if(! file_exists($path)){
        throw new ModelNotFoundException();
    }

     return cache()->remember("posts.{$slug}",5, function() use($path) {

        return file_get_contents($path);
    });


    }
}
