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
use App\Search;

class SearchController extends Controller
{
	public $result;

    public function search(Request $request)
    {
        $words = Word::where('name', 'LIKE', '%'.$data['q'].'%')->get();
        $phrases = Phrases::where('phrases', 'LIKE', '%'.$data['q'].'%')->get();
        return view('site.search', compact('words', 'phrases'));
    }

    public function searchpost($language, Request $request)
    {
        $data = $request->all();
        if ( !empty($data['q'])) {
        	$search = new Search();
        	$result['native_language_words'] = $search->checkUserLanguageWords($language, $data['q']);
            $result['words'] = English::where('name', 'LIKE', '%'.$data['q'].'%')->get();
            return $result;
        }
        return $result = [];
    }
}
