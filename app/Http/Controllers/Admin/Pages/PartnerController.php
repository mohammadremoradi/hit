<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\PartnerRequest;
use App\Http\Services\File\FileService;
use App\Models\Admin\Pages\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
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
        $informations = Partner::all();
        return view('admin.Pages.Partner.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pages.Partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request, FileService $fileService)
    {

        $inputs = $request->all();

        if ($request->hasFile('img')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'partner'
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
                return to_route('about-us.index')->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }
            $inputs['img'] = $result_one;
        }

        Partner::create($inputs);

        return redirect()
            ->route('partner.index')
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
    public function edit(Partner $partner)
    {
        return view('admin.Pages.Partner.edit', compact('partner'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, Partner $partner, FileService $fileService)
    {
        $inputs = $request->all();

        if ($request->hasFile('img')) {
            if (!empty($partner->img)) {
                $fileService->deleteFile($partner->img);
            }
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'partner'
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
                    ->route('partner.index')
                    ->with('message', 'File has not been Uploaded');
            }
            $inputs['img'] = $result_one;
        }

        $partner->update($inputs);
        return redirect()
            ->route('partner.index')
            ->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner, FileService $fileService)
    {
        if (!empty($partner->img)) {
            $fileService->deleteFile($partner->img);
        }
        $partner->delete();
        return to_route('partner.index')->with(
            'success',
            'Data Deleted successfully'
        );
    }
}
