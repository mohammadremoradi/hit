<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\AdmissionRequest;
use App\Models\Admin\Pages\Admission;
use App\Models\Admin\Seo\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
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
        $informations = Admission::all();
        return view('admin.Pages.Admission.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();
        return view('admin.Pages.Admission.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdmissionRequest $request)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($request, $inputs) {
            $information = Admission::create($inputs);

            $combines = array_combine($request->script, $request->location);

            foreach ($combines as $script => $loaction) {
                $seo = new Seo;
                $seo->script = $script;
                $seo->location = $loaction;
                if (strlen($seo->script > 0)) {
                    $information->seos()->save($seo);
                }
            }

        });
        return redirect()->route('admission.index')->with('success', 'Data created successfully');
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
    public function edit(Admission $admission)
    {
        $langs = LangType::getValues();
        return view('admin.Pages.Admission.edit', compact('langs', 'admission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdmissionRequest $request, Admission $admission)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($request, $inputs, $admission) {

            $admission->update($inputs);
            $seo_scripts = $request->old_script;
            $seo_locations = $request->old_location;

            if ($seo_scripts) {
                $seo_ids = array_keys($request->old_script);

                $seos = array_map(function ($id, $script, $location) {
                    return array_combine(
                        ['id', 'script', 'location'],
                        [$id, $script, $location]
                    );
                }, $seo_ids, $seo_scripts, $seo_locations);
                foreach ($seos as $seo) {
                    Seo::where('id', $seo['id'])->update([
                        'script' => $seo['script'],
                        'location' => $seo['location'],
                    ]);
                }
            }

            $combines = array_combine($request->script, $request->location);
            foreach ($combines as $script => $loaction) {
                $seo = new Seo;
                $seo->script = $script;
                $seo->location = $loaction;
                if (strlen($seo->script) > 0) {
                    $admission->seos()->save($seo);
                }
            }

        });

        return redirect()->route('admission.index')->with('success', 'Data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admission $admission)
    {
        $admission->delete();
        return redirect()->route('admission.index')->with('success', 'Data deleted successfully');

    }
}
