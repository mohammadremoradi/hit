<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\LandingRequest;
use App\Http\Services\File\FileService;
use App\Models\Admin\Pages\Landing;
use App\Models\Admin\Seo\Seo;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
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
        SEOTools::setTitle('Home');
        SEOTools::setDescription('This is my page description');
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

        $informations = Landing::all();

        return view('admin.Pages.Landing.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();
        return view('admin.Pages.Landing.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LandingRequest $request, FileService $fileService)
    {
        $inputs = $request->all();
        if ($request->hasFile('slider_image')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'landing' .
                DIRECTORY_SEPARATOR .
                'slider_image'
            );

            $inputs['slider_image'] = pathinfo(
                $request->slider_image->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['slider_image']);
            $result_one = $fileService->moveToPublic(
                $request->file('slider_image')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return to_route('landing.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['slider_image'] = $result_one;
        }
        if ($request->hasFile('about_us_video')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'landing' .
                DIRECTORY_SEPARATOR .
                'about_us_video'
            );
            $inputs['about_us_video'] = pathinfo(
                $request->about_us_video->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['about_us_video']);
            $result_two = $fileService->moveToPublic(
                $request->file('about_us_video')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return to_route('landing.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['about_us_video'] = $result_two;
        }

        DB::transaction(function () use ($request, $inputs) {
            $information = Landing::create($inputs);

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

        return redirect()
            ->route('landing.index')
            ->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Landing $landing)
    {
        return view('landing.index', compact('landing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Landing $landing)
    {
        $langs = LangType::getValues();
        return view('admin.Pages.Landing.edit', compact('landing', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        LandingRequest $request,
        Landing $landing,
        FileService $fileService
    ) {
        $inputs = $request->all();
        if ($request->hasFile('slider_image')) {
            if (!empty($landing->slider_image)) {
                $fileService->deleteFile($landing->slider_image);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'landing' .
                DIRECTORY_SEPARATOR .
                'slider_image'
            );
            $inputs['slider_image'] = pathinfo(
                $request->slider_image->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['slider_image']);
            $result_one = $fileService->moveToPublic(
                $request->file('slider_image')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return Redirect()
                    ->route('landing.index')
                    ->with('message', 'File has not been Uploaded');
            }
            $inputs['slider_image'] = $result_one;
        }
        if ($request->hasFile('about_us_video')) {
            if (!empty($landing->about_us_video)) {
                $fileService->deleteFile($landing->about_us_video);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'landing' .
                DIRECTORY_SEPARATOR .
                'about_us_video'
            );
            $inputs['about_us_video'] = pathinfo(
                $request->about_us_video->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['about_us_video']);
            $result_two = $fileService->moveToPublic(
                $request->file('about_us_video')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return Redirect()
                    ->route('landing.index')
                    ->with('message', 'File has not been Uploaded');
            }
            $inputs['about_us_video'] = $result_two;
        }

        DB::transaction(function () use ($request, $inputs, $landing) {

            $landing->update($inputs);
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
                    $landing->seos()->save($seo);
                }
            }

        });

        return redirect()
            ->route('landing.index')
            ->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landing $landing, FileService $fileService)
    {
        if (!empty($landing->about_us_video)) {
            $fileService->deleteFile($landing->about_us_video);
        }
        if (!empty($landing->slider_image)) {
            $fileService->deleteFile($landing->slider_image);
        }
        $landing->delete();

        return to_route('landing.index')->with(
            'success',
            'Data Deleted successfully'
        );
    }
}
