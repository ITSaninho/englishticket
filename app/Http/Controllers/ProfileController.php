<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\Themetitle;
use App\English;
use App\English_Top;
use App\English_Study;
use App\Ukraine;
use App\English_Ukraine;

class ProfileController extends Controller
{

    public function profile()
    {
        $study = English_Study::where('user_id', Auth::user()->id)->get();
        return view('site.profile', compact('study'));
    }

    public function read(Request $request)
    {
        if (Auth::user()->id) {
            $data = $request->all();
            $study = English_Study::where('user_id', Auth::user()->id)->where('english_id', $data['word_id'])->first();
            if($study != null) {
                if ($data['checkbox'] === true){
                    $study->view++;
                } else {
                    $study->view--;
                }
            } else {
                $study = new English_Study();
                $study->user_id = Auth::user()->id;
                $study->english_id = $data['word_id'];
                $study->view = 1;
            }
            return $study->save() ? 'true' : 'false';
        }
    }
}
