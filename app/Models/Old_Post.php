<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class OldPost
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function all()
    {

        $posts = collect(File::files(resource_path('old_posts')))
            ->map(function ($file) {
//          $document
            return YamlFrontMatter::parseFile($file);
        })
            ->map(function ($document) {
                return new OldPost(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                );
            });


//     Using Collection before Refactoring with Map in Map
//        $files = File::files(resource_path('old_posts'));
//
//        $old_posts = collect($files)
//            ->map(function ($file) {
//                $document = YamlFrontMatter::parseFile($file);
//
//                return new OldPost(
//                    $document->title,
//                    $document->excerpt,
//                    $document->date,
//                    $document->body(),
//                    $document->slug,
//                );
//            });

//     Without Illuminate\Support\Collection class
//        $post = array_map(function ($file) {
//            $document = YamlFrontMatter::parseFile($file);
//            return new OldPost(
//                $document->title,
//                $document->excerpt,
//                $document->date,
//                $document->body(),
//                $document->slug,
//            );
//        }, $files);

//      Without Collection and using Foreach
//        $old_posts = [];
//        foreach ($files as $file) {
//            $document = YamlFrontMatter::parseFile($file);
//
//            $old_posts[] = new OldPost(
//                $document->title,
//                $document->excerpt,
//                $document->date,
//                $document->body(),
//                $document->slug,
//            );
//        }

//      using getContent from File Class
//       $files = File::files(resource_path('old_posts/'));
//       return array_map( function($file) {
//           return [$file->getFilename(), $file->getContents()];
//       }, $files);

        return $posts;
    }

    public static function find($slug)
    {

        $post = static::all()->firstWhere('slug', $slug);
//        This will send an array (of 1 item, normally)
//        $post = static::all()->where('slug', $slug);
//        ddd($post);

//        $path = resource_path("old_posts/{$slug}.html");
//        return cache()->remember("old_posts{$slug}", 1200, function () use ($path) {
//           return file_get_contents($path);
//        });
        return $post;
    }
    public static function findOrFail($slug)
    {
        $post = static::find($slug);
//        ddd($post);

        if(! $post) {
            throw new ModelNotFoundException();
        }

        return $post;

//        return cache()->remember("old_posts{$slug}", 1200, function () use ($post) {
//           return file_get_contents($post);
//        });
    }

}
