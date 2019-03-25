<?php

namespace Urbania\AppleNews\Tests\Unit\Format;

use Urbania\AppleNews\Format\ComponentLayout;
use Urbania\AppleNews\Tests\TestCase;

/**
 * @coversDefaultClass \Urbania\AppleNews\Format\ComponentLayout
 */
class ComponentLayoutTest extends TestCase
{
    /**
     * Test the property columnSpan
     * @test
     * @dataProvider columnSpanProvider
     * @covers ::getColumnSpan
     * @covers ::setColumnSpan
     */
    public function testPropertyColumnSpan($value)
    {
        $object = new ComponentLayout();
        $object->setColumnSpan($value);

        $this->assertEquals($value, $object->getColumnSpan());
    }

    /**
     * Data provider for property columnSpan
     */
    public function columnSpanProvider()
    {
        return [[1]];
    }

    /**
     * Test the property columnStart
     * @test
     * @dataProvider columnStartProvider
     * @covers ::getColumnStart
     * @covers ::setColumnStart
     */
    public function testPropertyColumnStart($value)
    {
        $object = new ComponentLayout();
        $object->setColumnStart($value);

        $this->assertEquals($value, $object->getColumnStart());
    }

    /**
     * Data provider for property columnStart
     */
    public function columnStartProvider()
    {
        return [[1]];
    }

    /**
     * Test the property contentInset
     * @test
     * @dataProvider contentInsetProvider
     * @covers ::getContentInset
     * @covers ::setContentInset
     */
    public function testPropertyContentInset($value)
    {
        $object = new ComponentLayout();
        $object->setContentInset($value);

        $this->assertEquals($value, $object->getContentInset());
    }

    /**
     * Data provider for property contentInset
     */
    public function contentInsetProvider()
    {
        return [[new \Urbania\AppleNews\Format\ContentInset()]];
    }

    /**
     * Test the property horizontalContentAlignment
     * @test
     * @dataProvider horizontalContentAlignmentProvider
     * @covers ::getHorizontalContentAlignment
     * @covers ::setHorizontalContentAlignment
     */
    public function testPropertyHorizontalContentAlignment($value)
    {
        $object = new ComponentLayout();
        $object->setHorizontalContentAlignment($value);

        $this->assertEquals($value, $object->getHorizontalContentAlignment());
    }

    /**
     * Data provider for property horizontalContentAlignment
     */
    public function horizontalContentAlignmentProvider()
    {
        return [["left"], ["center"], ["right"]];
    }

    /**
     * Test the property ignoreDocumentGutter
     * @test
     * @dataProvider ignoreDocumentGutterProvider
     * @covers ::getIgnoreDocumentGutter
     * @covers ::setIgnoreDocumentGutter
     */
    public function testPropertyIgnoreDocumentGutter($value)
    {
        $object = new ComponentLayout();
        $object->setIgnoreDocumentGutter($value);

        $this->assertEquals($value, $object->getIgnoreDocumentGutter());
    }

    /**
     * Data provider for property ignoreDocumentGutter
     */
    public function ignoreDocumentGutterProvider()
    {
        return [[true], [false], ["none"], ["left"], ["right"], ["both"]];
    }

    /**
     * Test the property ignoreDocumentMargin
     * @test
     * @dataProvider ignoreDocumentMarginProvider
     * @covers ::getIgnoreDocumentMargin
     * @covers ::setIgnoreDocumentMargin
     */
    public function testPropertyIgnoreDocumentMargin($value)
    {
        $object = new ComponentLayout();
        $object->setIgnoreDocumentMargin($value);

        $this->assertEquals($value, $object->getIgnoreDocumentMargin());
    }

    /**
     * Data provider for property ignoreDocumentMargin
     */
    public function ignoreDocumentMarginProvider()
    {
        return [[true], [false], ["none"], ["left"], ["right"], ["both"]];
    }

    /**
     * Test the property margin
     * @test
     * @dataProvider marginProvider
     * @covers ::getMargin
     * @covers ::setMargin
     */
    public function testPropertyMargin($value)
    {
        $object = new ComponentLayout();
        $object->setMargin($value);

        $this->assertEquals($value, $object->getMargin());
    }

    /**
     * Data provider for property margin
     */
    public function marginProvider()
    {
        return [[new \Urbania\AppleNews\Format\Margin()]];
    }

    /**
     * Test the property maximumContentWidth
     * @test
     * @dataProvider maximumContentWidthProvider
     * @covers ::getMaximumContentWidth
     * @covers ::setMaximumContentWidth
     */
    public function testPropertyMaximumContentWidth($value)
    {
        $object = new ComponentLayout();
        $object->setMaximumContentWidth($value);

        $this->assertEquals($value, $object->getMaximumContentWidth());
    }

    /**
     * Data provider for property maximumContentWidth
     */
    public function maximumContentWidthProvider()
    {
        return [["1vh"], [1], ["1vmin"]];
    }

    /**
     * Test the property minimumHeight
     * @test
     * @dataProvider minimumHeightProvider
     * @covers ::getMinimumHeight
     * @covers ::setMinimumHeight
     */
    public function testPropertyMinimumHeight($value)
    {
        $object = new ComponentLayout();
        $object->setMinimumHeight($value);

        $this->assertEquals($value, $object->getMinimumHeight());
    }

    /**
     * Data provider for property minimumHeight
     */
    public function minimumHeightProvider()
    {
        return [["1vh"], [1], ["1vmin"]];
    }
}
