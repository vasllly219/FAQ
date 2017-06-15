<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryFaq;
use App\Category;
use App\Faq;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['categories' => CategoryFaq::categories()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Europe/Volgograd");
        foreach (Category::all() as $category) {
            if ($category['category'] === $request->input('category')) {
                $category_id = $category['id'];
            };
        }
        Faq::insert(['category_id' => $category_id,
                     'question' => $request->input('question'),
                     'user' => $request->input('name'),
                     'email' => $request->input('email'),
                     'created_at' => date("Y-m-d H:i:s")]);
        echo 'Ваш вопрос принят на рассмотрение...';
        return view('index', ['categories' => CategoryFaq::categories()]);
    }
}
