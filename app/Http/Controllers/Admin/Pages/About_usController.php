<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\About_usRequest;
use App\Http\Services\File\FileService;
use App\Models\Admin\Pages\About_us;
use App\Models\Admin\Seo\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class About_usController extends Controller
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
        $informations = About_us::all();
        return view('admin.Pages.About.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();

        return view('admin.Pages.About.create', compact('langs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(About_usRequest $request, FileService $fileService)
    {
        $inputs = $request->all();

        if ($request->hasFile('img_one')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'aboutus' .
                DIRECTORY_SEPARATOR .
                $request->lang
            );

            $inputs['img_one'] = pathinfo(
                $request->img_one->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img_one']);
            $result_one = $fileService->moveToPublic(
                $request->file('img_one')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return to_route('about-us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img_one'] = $result_one;
        }
        if ($request->hasFile('img_two')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'aboutus' .
                DIRECTORY_SEPARATOR .
                $request->lang
            );

            $inputs['img_two'] = pathinfo(
                $request->img_two->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img_two']);
            $result_two = $fileService->moveToPublic(
                $request->file('img_two')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return to_route('about-us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img_two'] = $result_two;
        }if ($request->hasFile('img_three')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'aboutus' .
                DIRECTORY_SEPARATOR .
                $request->lang
            );

            $inputs['img_three'] = pathinfo(
                $request->img_three->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img_three']);
            $result_three = $fileService->moveToPublic(
                $request->file('img_three')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_three === false) {
                return to_route('about-us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img_three'] = $result_three;
        }

        DB::transaction(function () use ($request, $inputs) {
            $information = About_us::create($inputs);
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
            ->route('about-us.index')
            ->with('success', 'Data created successfully');

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
    public function edit(About_us $about_u)
    {
        $langs = LangType::getValues();
        return view('admin.Pages.About.edit', compact('langs', 'about_u'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(About_usRequest $request, About_us $about_u, FileService $fileService)
    {
        $inputs = $request->all();
        if ($request->hasFile('img_one')) {
            if (!empty($about_u->img_one)) {
                $fileService->deleteFile($about_u->img_one);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'aboutus' .
                DIRECTORY_SEPARATOR .
                $request->lang
            );
            $inputs['img_one'] = pathinfo(
                $request->img_one->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img_one']);
            $result_one = $fileService->moveToPublic(
                $request->file('img_one')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return to_route('about-us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img_one'] = $result_one;

        }

        if ($request->hasFile('img_two')) {
            if (!empty($about_u->img_two)) {
                $fileService->deleteFile($about_u->img_two);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'aboutus' .
                DIRECTORY_SEPARATOR .
                $request->lang
            );
            $inputs['img_two'] = pathinfo(
                $request->img_two->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img_two']);
            $result_two = $fileService->moveToPublic(
                $request->file('img_two')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return to_route('about-us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img_two'] = $result_two;

        }

        if ($request->hasFile('img_three')) {
            if (!empty($about_u->img_three)) {
                $fileService->deleteFile($about_u->img_three);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'aboutus' .
                DIRECTORY_SEPARATOR .
                $request->lang
            );
            $inputs['img_three'] = pathinfo(
                $request->img_three->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img_three']);
            $result_three = $fileService->moveToPublic(
                $request->file('img_three')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_three === false) {
                return to_route('about-us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img_three'] = $result_three;

        }

        DB::transaction(function () use ($request, $inputs, $about_u) {

            $about_u->update($inputs);
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
                    $about_u->seos()->save($seo);
                }
            }

        });
        return redirect()
            ->route('about-us.index')
            ->with('success', 'Data editd successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About_us $about_u, FileService $fileService)
    {
        if (!empty($about_u->img_one)) {
            $fileService->deleteFile($about_u->img_one);
        }

        if (!empty($about_u->img_two)) {
            $fileService->deleteFile($about_u->img_two);
        }

        if (!empty($about_u->img_three)) {
            $fileService->deleteFile($about_u->img_three);
        }

        $about_u->delete();

        return redirect()
            ->route('about-us.index')
            ->with('success', 'Data deleted successfully');
    }
}
