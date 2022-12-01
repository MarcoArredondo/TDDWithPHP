<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    public function setUp() :void
    {
        $this->article = new App\Article;
    }

    /*public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), "");
    }

    public function testSluhasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";
        $this->assertEquals("An_example_article", $this->article->getSlug());
    }

    public function testSlugHasWhiteSpacesReplacedBySingleUnderscore()
    {
        $this->article->title = "An   example  \n   article";
        $this->assertEquals("An_example_article", $this->article->getSlug());
    }

    public function testSlugDoesNotStartOrEndWithUnderscores()
    {
        $this->article->title = " An   example  \n   article ";
        $this->assertEquals("An_example_article", $this->article->getSlug());
    }

    public function testSlugDoesNotHaveAnyNonWordCharacter()
    {
        $this->article->title = "Read! This! Now!";
        $this->assertEquals("Read_This_Now", $this->article->getSlug());
    }*/

    public function titleProvider()
    {
        return [
            ["An example article", "An_example_article"],
            ["An   example  \n   article", "An_example_article"],
            [" An   example  \n   article ", "An_example_article"],
            ["Read! This! Now!", "Read_This_Now"],
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testslug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($slug, $this->article->getSlug());
    }
}