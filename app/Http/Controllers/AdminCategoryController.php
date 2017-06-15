<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryFaq;
use App\Category;
use App\Faq;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories', ['categories' => CategoryFaq::categories_admin()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_categories');
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
        Category::insert(['category' => $request->input('category'),
                          'created_at' => date("Y-m-d H:i:s")]);
        echo 'Категоория добавлена...';
        return view('categories', ['categories' => CategoryFaq::categories_admin()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        Faq::where('category_id', $id)->delete();
        echo 'Категория и все ее вопросы удалены...';
        return view('categories', ['categories' => CategoryFaq::categories_admin()]);
    }
}
