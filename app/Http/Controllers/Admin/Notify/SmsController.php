<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notify\SmsRequest;
use App\Models\Admin\Notify\Sms;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class SmsController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:sms-list|sms-create|sms-edit|sms-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:sms-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:sms-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:sms-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sms = Sms::all();

        return view('admin.Notify.sms.index', compact('sms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Notify.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SmsRequest $request)
    {
        $inputs = $request->all();

        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        Sms::create($inputs);

        return to_route('sms.index')->with('success' . "Record Created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        return view('admin.Notify.sms.show', compact('sms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        return view('admin.Notify.sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SmsRequest $request, Sms $sms)
    {
        $inputs = $request->all();
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $sms->update($inputs);
        return to_route('sms.index')->with('success' . "Record Edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        $sms->delete();
        return to_route('sms.index')->with('success' . "Record Deleted Successfully");
    }
}
