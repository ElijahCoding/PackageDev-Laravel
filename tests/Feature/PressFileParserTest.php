<?php


namespace Illuminate\Press\Feature;

use Illuminate\Press\PressFileParser;
use Orchestra\Testbench\TestCase;

class PressFileParserTest extends TestCase
{
    public function test_head_and_body_gets_split()
    {
        $pressFileParser = (new PressFileParser(__DIR__ . '/../stubs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertStringContainsString('title: Title in Title Bar', $data[1]);
        $this->assertStringContainsString('description: Description here', $data[1]);
        $this->assertStringContainsString('Test Text Here', $data[2]);
    }

    public function test_each_head_field_gets_seperated()
    {
        $pressFileParser = (new PressFileParser(__DIR__ . '/../stubs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertStringContainsString('Title in Title Bar', $data['title']);
        $this->assertStringContainsString('Description here', $data['description']);
    }
}