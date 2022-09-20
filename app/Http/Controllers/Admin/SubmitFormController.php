<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;
use App\Http\Requests\Admin\RegisterFormRequest;
use App\Http\Services\File\FileService;
use App\Models\Admin\Question;
use App\Models\Admin\Register;
use App\Notifications\NewQuestion;
use App\Notifications\NewRegister;
use Illuminate\Support\Facades\DB;

class SubmitFormController extends Controller
{
    public function question(QuestionRequest $request)
    {
        $inputs = $request->all();
        DB::transaction(function () use ($inputs) {
            $question = Question::create($inputs);
            $detail = ['message' => 'new message'];
            $question->notify(new NewQuestion($detail));
        });
        return Redirect()->back()->with('swal-success', 'your message has been sended');
    }

    public function register(RegisterFormRequest $request , FileService $fileService)
    {

        $inputs = $request->all();

        if ($request->hasFile('passport')) {
            $fileService->setExclusiveDirectory(
                'Uploads' .
                DIRECTORY_SEPARATOR .
                'registerClient' .
                DIRECTORY_SEPARATOR .
                $request->fullname
            );

            $inputs['passport'] = pathinfo(
                $request->passport->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $fileService->setFileName($inputs['fullname']);

            $result_one = $fileService->moveToStorage($request->file('passport'));

            $fileFormat = $fileService->getFileFormat();
            if ($result_one === false) {
                return Redirect()->back()->with(
                    'swal-error',
                    'File has not been Uploaded'
                );
            }

            $inputs['passport'] = $result_one;
        }

        DB::transaction(function () use ($inputs) {
            $question = Register::create($inputs);
            $detail = ['message' => 'new client has been registerd'];
            $question->notify(new NewRegister($detail));
        });

        return Redirect()->back()->with('swal-success', 'your message has been sended');
    }
}
