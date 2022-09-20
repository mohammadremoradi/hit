<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notify\EmailRequest;
use App\Models\Admin\Notify\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    //   function __construct()
    // {
    //     $this->middleware('permission:email-list|email-create|email-edit|email-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:email-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:email-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:email-delete', ['only' => ['destroy']]);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all();
        return view('admin.Notify.email.index' , compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Notify.email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailRequest $request)
    {
        $inputs = $request->all();
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        Email::create($inputs);
        return to_route('email.index')->with('success',"Record Created successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        return view('admin.Notify.email.show' , compact('email'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        return view('admin.Notify.email.edit' , compact('email'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailRequest $request, Email $email)
    {
        $inputs = $request->all();
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $email->update($inputs);
        return to_route('email.index')->with('success', "Record Edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return to_route('email.index')->with('success', "Record Deleted Successfully");
    }

    // public function status(Email $email)
    // {
    //     $email->status = $email->status == "inactive" ? "active" : "inactive";
    //     $result = $email->save();

    //     if ($result) {
    //         if ($email->status == "inactive")
    //         {
    //             return response()->json(['status' => true, 'active' => false]);
    //         } else {
    //             return response()->json(['status' => true, 'active' => true]);
    //         }
    //     } else {
    //         return response()->json(['status' => false]);
    //     }
    // }

}
