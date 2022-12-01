<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    public function setUp() :void
    {
        $this->article = new App\Article;
    }

    public function testTitleIsEmptyByDefault()
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
    }
}