<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['parent_id'=>'0', 'section_id'=>'1', 'category_name'=>'T-Shirts', 'category_image'=>'', 'category_discount'=>'0',
                'description'=>'', 'url'=>'t-shirts', 'meta_title'=>'', 'meta_description'=>'', 'meta_keywords'=>'', 'status'=>'1',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            ['parent_id'=>'1', 'section_id'=>'1', 'category_name'=>'Casual T-Shirts', 'category_image'=>'', 'category_discount'=>'0',
                'description'=>'', 'url'=>'Casual-T-Shirts', 'meta_title'=>'', 'meta_description'=>'', 'meta_keywords'=>'', 'status'=>'1',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
