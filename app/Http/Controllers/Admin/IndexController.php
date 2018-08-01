<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\Themetitle;
use App\English;
use App\English_Top;
use App\English_Study;
use App\Ukraine;
use App\English_Ukraine;
use App\Rols;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function dictionary()
    {
        $english_words = English::where('word', 1)->get();
        return view('admin.dictionary', compact('english_words'));
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
        return view('admin.dictionary_top', compact('words', 'top'));
    }

    public function phrases($id)
    {   
        $theme = Themetitle::find($id);
        $theme_phrases = English::where('theme_id', $id)->where('phrases', 1)->get();
        return view('admin.theme', compact('theme_phrases','theme'));
    }

    public function addtolibrary(Request $request)
    {
        $data = $request->all();
        $has_word = English::where('name', $data['value'])->first();
        if ($has_word == null) {

            if ($data['word_or_phrases'] == 'word') {
                $word = 1;
                $phrases = 0;
            } else {
                $word = 0;
                $phrases = 1;
            }

            $type_phrases = $data['value'][strlen($data['value']) - 1];
            if ($type_phrases == '?') {
                $quastion = 1;
                $answer = 0;
            } else {
                $quastion = 0;
                $answer = 1;
            }

            $library = new English();
            $library->name = $data['value'];
            $library->word = $word;
            $library->phrases = $phrases;
            $library->theme_id = $data['theme_id'];
            $library->quastion = $quastion;
            $library->answer = $answer;
            $library->save();

            if ( count($data['translate']) > 1) {
                foreach ($data['translate'] as $translated) {
                    $translate = new Ukraine();
                    $translate->name = $translated;
                    $translate->word = $word;
                    $translate->phrases = $phrases;
                    $translate->theme_id = $data['theme_id'];
                    $translate->quastion = $quastion;
                    $translate->answer = $answer;
                    $translate->save();

                    $relation = new English_Ukraine();
                    $relation->english_id = $library->id;
                    $relation->ukraine_id = $translate->id;
                    $relation->save();
                }
            } else {
                $translate = new Ukraine();
                $translate->name = $data['translate'][0];
                $translate->word = $word;
                $translate->phrases = $phrases;
                $translate->theme_id = $data['theme_id'];
                $translate->quastion = $quastion;
                $translate->answer = $answer;
                $translate->save();

                $relation = new English_Ukraine();
                $relation->english_id = $library->id;
                $relation->ukraine_id = $translate->id;
                $relation->save();
            }
            unset($translate);
            unset($relation);
            
            $top = new English_Top();
            $top->english_id = $library->id;
            $top->word = $word;
            if ($request->top == 'no') {
                $top->top1000 = 0;
                $top->top5000 = 0;
                $top->top10000 = 0;
                $top->other = 1;
            } elseif ($request->top == 1000) {
                $top->top1000 = 1;
                $top->top5000 = 1;
                $top->top10000 = 1;
                $top->other = 1;
            } elseif ($request->top == 5000) {
                $top->top1000 = 0;
                $top->top5000 = 1;
                $top->top10000 = 1;
                $top->other = 1;
            }elseif ($request->top == 10000) {
                $top->top1000 = 0;
                $top->top5000 = 0;
                $top->top10000 = 1;
                $top->other = 1;
            }
            $top->save();

            return redirect()->back()->with('status', 'Word was add successful!');
        } else {
            return redirect()->back()->with('status', 'This word isset!');
        }
    }
}
