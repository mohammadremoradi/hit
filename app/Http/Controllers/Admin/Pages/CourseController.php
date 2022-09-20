<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Enums\LangType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\CourseRequest;
use App\Http\Services\File\FileService;
use App\Models\Admin\Pages\Course;
use App\Models\Admin\Seo\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
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
        $informations = Course::orderBy('id', 'desc')->get();
        return view('admin.Pages.Course.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = LangType::getValues();
        return view('admin.Pages.Course.create', compact('langs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FileService $fileService)
    {

        $inputs = $request->all();

        if ($request->hasFile('img')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'course' .
                DIRECTORY_SEPARATOR .
                $request->lang .
                DIRECTORY_SEPARATOR .
                $request->title
            );

            $inputs['img'] = pathinfo(
                $request->img->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img']);
            $result_one = $fileService->moveToPublic(
                $request->file('img')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return to_route('course.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img'] = $result_one;
        }
        if ($request->hasFile('video')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'course' .
                DIRECTORY_SEPARATOR .
                $request->lang .
                DIRECTORY_SEPARATOR .
                $request->title
            );

            $inputs['video'] = pathinfo(
                $request->video->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['video']);
            $result_two = $fileService->moveToPublic(
                $request->file('video')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return to_route('course.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['video'] = $result_two;
        }

        DB::transaction(function () use ($request, $inputs) {
            $information = Course::create($inputs);

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
            ->route('course.index')
            ->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $langs = LangType::getValues();
        return view('admin.Pages.Course.edit', compact(['langs', 'course']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, FileService $fileService
    ) {
        $inputs = $request->all();
        if ($request->hasFile('img')) {
            if (!empty($course->img)) {
                $fileService->deleteFile($course->img);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' . DIRECTORY_SEPARATOR .
                'course' . DIRECTORY_SEPARATOR . $request->lang . DIRECTORY_SEPARATOR . $request->title
            );
            $inputs['img'] = pathinfo(
                $request->img->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['img']);
            $result_one = $fileService->moveToPublic(
                $request->file('img')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return Redirect()
                    ->route('course.index')
                    ->with('message', 'File has not been Uploaded');
            }
            $inputs['img'] = $result_one;
        }

        if ($request->hasFile('video')) {
            if (!empty($course->video)) {
                $fileService->deleteFile($course->video);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' . DIRECTORY_SEPARATOR .
                'course' . DIRECTORY_SEPARATOR . $request->lang . DIRECTORY_SEPARATOR . $request->title
            );
            $inputs['video'] = pathinfo(
                $request->video->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['video']);
            $result_two = $fileService->moveToPublic(
                $request->file('video')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return Redirect()
                    ->route('course.index')
                    ->with('message', 'File has not been Uploaded');
            }
            $inputs['video'] = $result_two;
        }

        DB::transaction(function () use ($request, $inputs, $course) {

            $course->update($inputs);
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
                    $course->seos()->save($seo);
                }
            }

        });

        $course->update($inputs);

        return redirect()
            ->route('course.index')
            ->with('success', 'Data edited successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, FileService $fileService)
    {
        if (!empty($course->img)) {
            $fileService->deleteFile($course->img);
        }

        if (!empty($course->video)) {
            $fileService->deleteFile($course->video);
        }

        $course->delete();
        return to_route('course.index')->with(
            'success',
            'Data Deleted successfully'
        );
    }
}
