<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	// hapus data tabel posts
        DB::table('posts')->truncate();
    	
    	// mengisi 10 data dummy post
        $posts= [];
        $faker = Factory::create();
        $date = Carbon::create(2018, 5, 20,9);

        for ($i = 1; $i <= 10; $i++)
        {
        	$image	= "Post_Image_" .rand(1,5) . ".jpg";
        	$date->addDays(1);
            $publishedDate = clone ($date);
            $createdDate = clone ($date);

        	$posts[] = 
        	[
        		'author_id'	=> rand(1,3),
        		'title'		=> $faker->sentence(rand(8,12)),
        		'excerpt'	=> $faker->text(rand(200,300)),
        		'body'		=> $faker->paragraphs(rand(10, 15), true),
        		'slug'		=> $faker->slug(),
        		'image'		=> rand(0, 1) == 1 ? $image : NULL,
        		'created_at'=> $createdDate,
        		'updated_at'=> $createdDate,
                'published_at'  => $i < 5 ? $publishedDate : ( rand(1,0) == 0 ? NULL : $publishedDate->addDays(3)),
                'view_count'    => rand(1, 10) * 10
        	];

        }

		DB::table('posts')->insert($posts);        

    }
}