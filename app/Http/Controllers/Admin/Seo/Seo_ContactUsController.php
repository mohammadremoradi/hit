<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Models\Admin\Seo\Seo_ContactUs;
use Illuminate\Http\Request;

class Seo_ContactUsController extends Controller
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
        $informations = Seo_ContactUs::all();
        return view('admin.Seo.contactUs.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();
        return view('admin.Seo.contactUs.create' , compact('langs'));
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
        Seo_ContactUs::create($inputs);
        return redirect()->route('contact-us-page.index')->with('success', 'Data created successfully');
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
    public function edit(Seo_ContactUs $contact_us_page)
    {
        $langs = LangType::getValues();
        return view('admin.Seo.contactUs.edit', compact('contact_us_page', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seo_ContactUs $contact_us_page)
    {
        $inputs = $request->all();
        $contact_us_page->update($inputs);
        return redirect()->route('contact-us-page.index')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo_ContactUs $contact_us_page)
    {
        $contact_us_page->delete();
        return redirect()->route('contact-us-page.index')->with('success', 'Data deleted successfully');

    }
}
