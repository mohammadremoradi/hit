<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Register;
use App\Models\Notification;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:client_message', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $informations = Register::orderBy('id', 'desc')->get();
        $ques = Notification::where('read_at', null)->where('notifiable_type', 'App\Models\Admin\Register')->get();
        foreach ($ques as $que) {
            $que->update(['read_at' => now()]);
        }
        return view('admin.register-form.index', compact('informations'));
    }

    public function show(Register $register_form)
    {
        return view('admin.register-form.show', compact('register_form'));
    }

    public function download(Register $register_form)
    {
        $pathToFile = storage_path($register_form->passport);
        return response()->download($pathToFile);
    }
}
