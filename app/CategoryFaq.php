<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Faq;


class CategoryFaq extends Model
{
    public static function categories()
    {
        foreach (Category::all() as $category) {
            $db = DB::table('faq')->where('category_id', $category['id'])->select('question', 'answer', 'public')->get();
            $count = 0;
            foreach ($db as $values) {
                $count++;
                foreach ($values as $key => $value) {
                    $categories[$category['category']][$count][$key] = $value;
                }
            }
        }
        return $categories;
    }
    public static function categories_admin()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->count = Faq::where('category_id','=',$category['id'])->count();
            $category->published = Faq::where('category_id','=',$category['id'])->where('public','=',1)->count();
            $category->unanswer = Faq::where('category_id','=',$category['id'])->where('answer','=',NULL)->count();
        }
        return $categories;
    }
}
