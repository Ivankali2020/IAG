<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductPhoto;
use App\Models\ProductSpecification;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         $user = new User();
         $user->name = 'Ivan';
         $user->email = 'ivan@gmail.com';
         $user->password = Hash::make('password');
         $user->save();

        $categories = ['ဆပ်ပြာ','ဆပ်ပြာခဲ','သွားတိုက်တဲ','ဆား','ဆီ','ဆန်','ခေါက်ဆွဲ','ဟင်းချိုမုန့်','ဆေး'];

        foreach ($categories as $cat) {

            $category = new Category();
            $category->name = $cat;
            $category->save();

        }

        $subCategories = ['အီလန်','အိုကီ','ဖူမီ','ဟဲလိုး','အေးသူဇာ','အေးရွှေ','ပဲခေါက်ဆွဲ','အိုကီမို','အိုင်အိုဒင်း','ရွှေအ','ရင်အေး'];

        foreach ($subCategories as $sub) {

            $brand = new SubCategory();
            $brand->category_id = Category::all()->random()->id;
            $brand->name = $sub;
            $brand->save();

        }

        \App\Models\Product::factory(100)->create()->each(function ($p){

            for ($i=0; $i< rand(1,9); $i++){

                $photo = new ProductPhoto();
                $photo->product_id = $p->id ;
                $photo->name = null;
                $photo->save();

                $specification = new ProductSpecification();

                $specification->product_id = $p->id;
                $specification->title = "product specification $i";
                $specification->description = $p->highlight;
                $specification->save();
            }
        });


    }
}
