<?php

namespace StringUtils;

class Anagram
{

    /**
     * This method takes two string parameters
     * that are then checked if they are anagrams.
     *
     * @param string $a First string
     * @param string $b Second string
     *
     * @return bool True if the two strings are anagrams,
     * false otherwise
     */

    public static function areStringsAnagrams($a, $b)
    {

        // Reference Algorithm: https://skerritt.blog/an-algorithm-for-finding-anagrams/

        // Remove all the occurrences of white spaces
        $a = preg_replace("/\s/", "", $a);
        $b = preg_replace("/\s/", "", $b);

        // Multiset is a set which allows repetitions
        // So, we have to check equal length of two string
        // Return flse if both string length is not equal
        if (strlen($a) != strlen($b)) {
            return false;
        }

        // Convert String into lowercase
        $a = strtolower($a);
        $b = strtolower($b);

        // Split string into Characters
        $aChars = str_split($a);
        $bChars = str_split($b);

        // Remove Duplicate Characters for set
        // Since i consider multiset, ignore to remove duplication
        // $aChars = array_unique($aChars);
        // $bChars = array_unique($bChars);

        // Sort Characters
        sort($aChars);
        sort($bChars);

        // Compare if they are exactly same
        return $aChars === $bChars;

    }

}