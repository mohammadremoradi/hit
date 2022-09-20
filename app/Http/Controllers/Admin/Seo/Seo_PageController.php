<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Models\Admin\Seo\Seo;
use App\Models\Admin\Seo\SeoPage;
use Illuminate\Http\Request;

class Seo_PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:pages', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);

    }
    public function index()
    {
        $informations = SeoPage::all();
        return view('admin.Seo.AllPage.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();
        return view('admin.Seo.AllPage.create', compact('langs'));
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
        SeoPage::create($inputs);
        return redirect()->route('seo-all-pages.index')->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SeoPage $seo_all_page)
    {
        $langs = LangType::getValues();
        return view('admin.Seo.AllPage.edit', compact('seo_all_page', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeoPage $seo_all_page)
    {

        $inputs = $request->all();
        $seo_all_page->update($inputs);
        return redirect()->route('seo-all-pages.index')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeoPage $seo_all_page)
    {
        $seo_all_page->delete();
        return redirect()->route('seo-all-pages.index')->with('success', 'Data deleted successfully');
    }

    public function delete(Seo $seo)
    {
        $seo->delete();
        return redirect()->back()->with(
            'success',
            'Data Deleted successfully'
        );
    }
}
