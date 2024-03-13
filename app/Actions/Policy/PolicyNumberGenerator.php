<?php

namespace App\Actions\Policy;

use App\Models\Policy;

class PolicyNumberGenerator
{
    const UNAMBIGUOUS_ALPHABET = 'BCDFGHJLMNPRSTVWXYZ2456789';

    public function handle(int $segments = 3, int $charactersPerSegment = 3): string
    {
        do {
            $code = $this->generateCode($segments, $charactersPerSegment);
        } while (Policy::where('policy_no', $code)->exists());

        return $code;
    }

    protected function generateCode(int $segments, int $charactersPerSegment): string
    {
        $totalCharacters = ($segments * $charactersPerSegment);

        $longString = substr(str_shuffle(str_repeat(static::UNAMBIGUOUS_ALPHABET, $totalCharacters)), 0, $totalCharacters);

        $codeWithDashes = implode('-', str_split($longString, $charactersPerSegment));

        return $codeWithDashes;
    }
}
