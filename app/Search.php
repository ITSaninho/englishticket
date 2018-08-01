<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Contact;
use App\Themetitle;
use App\Phrases;
use App\Phrasesinfo;
use App\Phrasesstudy;
use App\Word;
use App\Ukraineword;
use App\Ukrainephrases;
use App\Wordstudy;
use App\Top;

class Search extends Model
{
	public $language;
    public $words;

    public function checkUserLanguageWords($language, $text) {
    	switch ($language) {
    		case 'uk-UA':
    			$this->words = Ukraine::where('name', 'LIKE', '%'.$text.'%')->get();
    			break;
    		case 'ru-Ru':
    			$this->words = Ukraine::distinct('name')->where('name', 'LIKE', '%'.$text.'%')->get();
    			break;
    		default:
    			# code...
    			break;
    	}
        return $this->words;
    }
}
