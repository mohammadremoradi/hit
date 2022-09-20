<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Models\Admin\Seo\Seo_register;
use App\Models\Admin\Seo\Seo_whyUs;
use Illuminate\Http\Request;

class Seo_whyUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pages', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Seo_whyUs::all();
        return view('admin.Seo.whyUS.index', compact('informations'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();
        return view('admin.Seo.whyUS.create' , compact('langs'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        Seo_whyUs::create($inputs);
        return redirect()->route('whyus-page.index')->with('success', 'Data created successfully');
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

    public function edit(Seo_whyUs $whyus_page)
    {
        $langs = LangType::getValues();
        return view('admin.Seo.whyUs.edit', compact('whyus_page', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seo_whyUs $whyus_page)
    {
        $inputs = $request->all();
        $whyus_page->update($inputs);
        return redirect()->route('whyus-page.index')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo_whyUs $whyus_page)
    {
        $whyus_page->delete();
        return redirect()->route('whyus-page.index')->with('success', 'Data deleted successfully');

    }
}
