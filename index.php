<?php
error_reporting(1);
require_once 'vendor/autoload.php';

use StringUtils\Anagram;
use TDD\NumberFactors;

class ValidateTest
{

    /**
     * Test Anagram Task
     */
    public static function Anagram()
    {
        $datas = array(
            array('roast beef', 'eat for BSE'),
            array('asdf', 'asdf'),
            array('asdf', 'fdsa'),
            array('asdfasdf', 'asdfasdf'),
            array('a', 'a'),
            array('a', 'b'),
            array('aaa', 'aaa'),
            array('aaa', 'aa'),
            array('aaaa', 'abab'),
            array('aaaa', ''),
            array('qwerty', 'asdfg')
        );

        foreach ($datas as $data) {
            $test = Anagram::areStringsAnagrams($data[0], $data[1]);
            var_dump($test);
            echo "\n";
        }
    }

    /**
     * Test TDD Number Factors Task
     */
    public static function NumberFactors()
    {
        $datas = array(null, 0, 1, 2, 3, 4, 9, 6, 12, 24, 100, 1000);
        $factors = new NumberFactors();
        foreach ($datas as $data) {
            $list = $factors->calcPrimeFactors(3);
            print_r($list);
            echo "\n";
        }
    }

    /**
     * Test BFMD Task
     */
    public static function BFMD()
    {
        $broccoliMarkDown = new \BFMD\BroccoliMarkDown();
        $datas = array(
            array("# Broccoli", "<h1>Broccoli</h1>"),
            array("## Broccoli", "<h2>Broccoli</h2>"),
            array("## Some text #2", "<h2>Some text #2</h2>"),
            array("Some text #2", "Some text <h1>2</h1>"),
            array("Some ##text 2", "Some <h2>text 2</h2>"),
            array("[##here](https://en.wikipedia.org/wiki/Broccoli)", '<a href="https://en.wikipedia.org/wiki/Broccoli"><h2>here</h2></a>'),
            array("", ""),
            array("Asd", "Asd"),
            array("[here](https://en.wikipedia.org/wiki/Broccoli)", '<a href="https://en.wikipedia.org/wiki/Broccoli">here</a>'),
            array('___EAT___', '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Broccol i_and_cross_sec tion_edit.jpg/320px-Broccoli_and_cross_section_edit.jpg" title="Broccoli is yummy!" alt="A lovely picture of broccoli" />'),
            array("# Broccoli
            Broccoli is an edible green plant in the cabbage family whose large flowerhead is eaten as a vegetable.",
                "<h1>Broccoli</h1><p>Broccoli is an edible green plant in the cabbage family whose large flowerhead is eaten as a vegetable.</p>"),
            array('Hello World.___EAT___', 'Hello World.<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Broccol i_and_cross_sec tion_edit.jpg/320px-Broccoli_and_cross_section_edit.jpg" title="Broccoli is yummy!" alt="A lovely picture of broccoli" />'),
            array('[##here ___EAT___](https://en.wikipedia.org/wiki/Broccoli)', '<a href="https://en.wikipedia.org/wiki/Broccoli"><h2>here <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Broccol i_and_cross_sec tion_edit.jpg/320px-Broccoli_and_cross_section_edit.jpg" title="Broccoli is yummy!" alt="A lovely picture of broccoli" /></h2></a>'),
            array(
                "
# Broccoli
Broccoli is an edible green plant in the cabbage family whose large flowerhead is eaten as a vegetable.


## Etymology
The word broccoli comes from the Italian plural of broccolo, which means \"the flowering crest of a cabbage\", and is the diminutive form of brocco, meaning \"small nail\" or \"sprout\". Broccoli is often boiled or steamed but may be eaten raw.


Having this said, you can read up on it even more [here](https://en.wikipedia.org/wiki/Broccoli). Also be sure to checkout this wonderful picture of one.___EAT___",
                ""
            )
        );

        foreach ($datas as $data) {
            $html = $broccoliMarkDown->parse($data[0]);
        }

        print_r($html);
    }


}

$script = 0;
//$val = getopt("task:");
if (isset($argv[1])) {
    $script = intval($argv[1]);
}

if (isset($_GET['task'])) {
    $script = intval($_GET['task']);
}

if ($script == 1 || $script == 0) {
    echo "\n===============ANAGRAM TEST================\n";
    ValidateTest::Anagram();
}

if ($script == 2 || $script == 0) {
    echo "\n=============BFMD TEST==================\n";
    ValidateTest::BFMD();
}

if ($script == 3 || $script == 0) {
    echo "\n==============TDD TEST=================\n";
    ValidateTest::NumberFactors();
}





