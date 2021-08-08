<?php

use App\Blog;
use App\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Blog::class, 9)->create()->each(function ($blog){
            $blog->save();
        });
    }
}
