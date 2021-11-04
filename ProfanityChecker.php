<?php

class ProfanityChecker
{

private array $profanity = ["fuck", "shit", "Fuck", "Shit"];

private array $profanityCheck = [];

public function sanityCheck($post, $profanity) : void {
    foreach ($profanity as $iValue) {
        if (in_array($iValue, $post, true)) {
            $this->profanityCheck[] = $iValue;
        }
    }
}

    /**
     * @return array
     */
    public function getProfanity(): array
    {
        return $this->profanity;
    }

    /**
     * @return array
     */
    public function getProfanityCheck(): array
    {
        return $this->profanityCheck;
    }

}