<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\NumberWordsConverter;
use App\Custom\NWConv;

class ConvController extends Controller
{
    // start view
    public function index()
    {
        return view('converter.start');
    }

    public function convert(Request $request)
    {
        $validated = $request->validate([
            'number'=> 'regex:/^(\d{1,30})$|^\d{0,30}(\.\d{1,2})$/'
        ],
        [
            'number.regex'=>'Insert 1 to 30-digit number, with 2 decimals optionally (e.g. 25 or 25.34)',
        ]);

        $words = (new NWConv($request->number))->getWords();
        return view('converter.start',['number'=>$request->number,
                                        'words'=>$words
                                    ]);
    }
}
