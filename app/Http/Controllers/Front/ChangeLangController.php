<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class ChangeLangController extends Controller
{
    public function change(Request $request)
    {
        $inputs = $request->all();
        $prevRouteName = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
        if ($inputs['lang'] == "hu") {
            App::setLocale('hu');

            $prevRouteName = trim($prevRouteName, ".en");
            $prevRouteName = trim($prevRouteName, ".hu");

            $changeRoute = $prevRouteName . ".hu";

            return to_route($changeRoute);
        } elseif ($inputs['lang'] == "en") {
            App::setLocale('en');

            $prevRouteName = trim($prevRouteName, ".en");
            $prevRouteName = trim($prevRouteName, ".hu");
            $changeRoute = $prevRouteName . ".en";
            return to_route($changeRoute);
        } else {

            return to_route('landing.en');
        }

    }
}
