<?php
//require_once 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use StringUtils\Anagram;

class AnagramTest extends TestCase
{
    private $anagram;

    protected function setUp(): void
    {
        $this->anagram = new Anagram();
    }

    protected function tearDown(): void
    {
        $this->anagram = NULL;
    }

    public function addDataProvider()
    {
        return array(
            array('asdf', 'asdf', true),
            array('asdf', 'fdsa', true),
            array('asdfasdf', 'asdfasdf', true),
            array('a', 'a', true),
            array('a', 'b', false),
            array('aaa', 'aaa', true),
            array('aaa', 'aa', false),
            array('aaaa', 'abab', false),
            array('aaaa', '', false),
            array('qwerty', 'asdfg', false),
            array('roast beef', 'eat for BSE', true),
            array('lives', 'Elvis', true)
        );
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testAreStringsAnagrams($a, $b, $expected): void
    {

        $result = $this->anagram->areStringsAnagrams($a, $b);
        $this->assertEquals($expected, $result);

    }
}
