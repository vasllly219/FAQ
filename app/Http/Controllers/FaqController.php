<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faq', ['faqs' => Faq::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('faq', ['faqs' => Faq::where('category_id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit_faq', ['faq' => Faq::where('id', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_category($id)
    {
        return view('edit_category', ['categories' => Category::all(), 'faq' => Faq::where('id', $id)->first()]);
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
        if ($request->input('public') !== NULL) {
            Faq::where('id', $id)->update(['public' => $request->input('public')]);
        }
        if ($request->input('answer') !== NULL) {
            Faq::where('id', $id)->update(['answer' => $request->input('answer')]);
        }
        if ($request->input('question') !== NULL) {
            Faq::where('id', $id)->update(['question' => $request->input('question'),
                                            'user' => $request->input('user'),
                                            'email' => $request->input('email')]);
            return redirect('/admin/category/' . $request->input('category_id'));
        }
        if ($request->input('category') !== NULL) {
            $category_id = Category::where('category', $request->input('category'))->select('id')->first()['id'];
            Faq::where('id', $id)->update(['category_id' => $category_id]);
            return redirect('/admin/category/' . $category_id);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::where('id', $id)->delete();
        return redirect()->back();
    }
}
