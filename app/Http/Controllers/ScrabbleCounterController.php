<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrabbleCounterController extends Controller
{
    public function __construct()
    {
        $this->scores = [
            1  => ['A', 'E', 'I', 'O', 'U', 'L', 'N', 'R', 'S', 'T'],
            2  => ['D', 'G'],
            3  => ['B', 'C', 'M', 'P'],
            4  => ['F', 'H', 'V', 'W', 'Y'],
            5  => ['K'],
            8  => ['J', 'X'],
            10 => ['Q', 'Z'],
        ];
    }

    public function fetch()
    {
        return view('home.index');
    }

    public function count(Request $request)
    {
        $request->validate([
            'word' => 'required|alpha'
        ]);

        $score = 0;

        foreach(str_split(strtoupper($request->word)) AS $char)
        {
            $score += $this->countChar($char);
        }

        return view('home.index', [
            'score' => $score
        ]);
    }

    private function countChar($char)
    {
        foreach($this->scores AS $score => $letters)
        {
            if(array_search($char, $letters) !== false)
            {
                return $score;
            }
        }
    }
}
