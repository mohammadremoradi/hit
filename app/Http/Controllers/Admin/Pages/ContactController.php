<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\ContactRequest;
use App\Http\Services\File\FileService;
use App\Models\Admin\Pages\Contact;
use App\Models\Admin\Seo\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
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
        $informations = Contact::all();
        return view('admin.Pages.Contact.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pages.Contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request, FileService $fileService)
    {
        $inputs = $request->all();
        if ($request->hasFile('logo')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'contact_us' .
                DIRECTORY_SEPARATOR .
                'logo'
            );

            $inputs['logo'] = pathinfo(
                $request->logo->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['logo']);
            $result_one = $fileService->moveToPublic(
                $request->file('logo')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return to_route('contact_us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['logo'] = $result_one;
        }
        if ($request->hasFile('logo_color')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'contact_us' .
                DIRECTORY_SEPARATOR .
                'logo_color'
            );
            $inputs['logo_color'] = pathinfo(
                $request->logo_color->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['logo_color']);
            $result_two = $fileService->moveToPublic(
                $request->file('logo_color')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return to_route('contact_us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['logo_color'] = $result_two;
        }

        $information = Contact::create($inputs);


        return redirect()
            ->route('contact_us.index')
            ->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // return view('admin.Pages.Landing.edit', compact('contact'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact_u)
    {
        return view('admin.Pages.Contact.edit', compact('contact_u'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact_u, FileService $fileService)
    {
        $inputs = $request->all();
        if ($request->hasFile('logo')) {
            if (!empty($contact_u->logo)) {
                $fileService->deleteFile($contact_u->logo);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'contact_us' .
                DIRECTORY_SEPARATOR .
                'logo'
            );
            $inputs['logo'] = pathinfo(
                $request->logo->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['logo']);
            $result_one = $fileService->moveToPublic(
                $request->file('logo')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return Redirect()
                    ->route('contact_us.index')
                    ->with('message', 'File has not been Uploaded');
            }
            $inputs['logo'] = $result_one;
        }
        if ($request->hasFile('logo_color')) {
            if (!empty($contact_u->logo_color)) {
                $fileService->deleteFile($contact_u->logo_color);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'contact_us' .
                DIRECTORY_SEPARATOR .
                'logo_color'
            );
            $inputs['logo_color'] = pathinfo(
                $request->logo_color->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $fileService->setFileName($inputs['logo_color']);
            $result_two = $fileService->moveToPublic(
                $request->file('logo_color')
            );
            $fileFormat = $fileService->getFileFormat();
            if ($result_two === false) {
                return Redirect()
                    ->route('contact_us.index')
                    ->with('message', 'File has not been Uploaded');
            }
            $inputs['logo_color'] = $result_two;
        }


        DB::transaction(function () use ($request, $inputs, $contact_u) {

            $contact_u->update($inputs);
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
                    $contact_u->seos()->save($seo);
                }
            }

        });

        return redirect()
            ->route('contact_us.index')
            ->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact_u, FileService $fileService)
    {
        if (!empty($contact_u->logo)) {
            $fileService->deleteFile($contact_u->logo);
        }
        if (!empty($contact_u->logo_color)) {
            $fileService->deleteFile($contact_u->logo_color);
        }

        $contact_u->delete();
        return to_route('contact_us.index')->with(
            'success',
            'Data Deleted successfully'
        );
    }
}
