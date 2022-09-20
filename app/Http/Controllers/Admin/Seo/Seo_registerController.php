<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Models\Admin\Seo\Seo_register;
use Illuminate\Http\Request;

class Seo_registerController extends Controller
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
        $informations = Seo_register::all();
        return view('admin.Seo.register.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();
        return view('admin.Seo.register.create', compact('langs'));
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
        Seo_register::create($inputs);
        return redirect()->route('register-page.index')->with('success', 'Data created successfully');
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
    public function edit(Seo_register $register_page)
    {
        $langs = LangType::getValues();
        return view('admin.Seo.register.edit', compact('register_page', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Seo_register $register_page)
    {
        $inputs = $request->all();
        $register_page->update($inputs);
        return redirect()->route('register-page.index')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo_register $register_page)
    {
        $register_page->delete();
        return redirect()->route('register-page.index')->with('success', 'Data deleted successfully');
    }
}
