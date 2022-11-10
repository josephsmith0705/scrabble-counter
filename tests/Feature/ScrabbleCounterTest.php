<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScrabbleCounterTest extends TestCase
{
    /** @test */
    public function validWords()
    {
        $words = [
            14  => 'cabbage',
            6   => 'drill',
            10  => 'guerrilla',
            '9' => 'avenue',
            '8' => 'cotton'
        ];

        foreach($words as $score => $word)
        {
            $this->getScrabbleScore($word, $score);
        }
    }

    /** @test */
    public function invalidBlankWord()
    {
        $this->getScrabbleScore('', 0, true);
    }

    /** @test */
    public function invalidWordType()
    {
        $this->getScrabbleScore(true, 0, true);
    }

    private function getScrabbleScore($word, $score, $error = false)
    {
        $response = $this->post('/', [
            'word' => $word
        ]);

        if($error)
        {
            $response->assertSessionHasErrors([
                'word'
            ]);
        }
        else
        {
            $this->assertEquals($score, $response['score']);
        }
    }
}
