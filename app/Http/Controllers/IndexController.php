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

class IndexController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function about()
    {
        return view('site.about');
    }

    public function sendMessage(Request $request)
    {   
        $data = $request->all();
        $contact = new Contact();
        $contact->subject = $data['subject'];
        $contact->text = $data['text'];
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        return $contact->save() ? 'true' : 'false';
    }


    public function dictionary()
    {
        $english_words = English::where('word', 1)->get();
        return view('site.dictionary', compact('english_words'));
    }

    public function dictionary_top($number)
    {
        switch ($number) {
            case 1000:
                $words = English_Top::where('top1000', 1)->get();
                break;
            case 5000:
                $words = English_Top::where('top5000', 1)->get();
                break;
            case 10000:
                $words = English_Top::where('top10000', 1)->get();
                break;
            default:
                $words = English_Top::where('other', 1)->get();
                break;
        }
        $top = $number;
        return view('site.dictionary_top', compact('words', 'top'));
    }

    public function phrases($id)
    {
        $theme_phrases = English::where('theme_id', $id)->where('phrases', 1)->get();
        return view('site.theme', compact('theme_phrases'));
    }

    public function noroute()
    {
        return redirect('/');
    }
}
