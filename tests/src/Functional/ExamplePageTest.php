<?php

namespace Drupal\Tests\drupal_module_template\Functional;

use Drupal\Tests\BrowserTestBase;
use Symfony\Component\HttpFoundation\Response;

final class ExamplePageTest extends BrowserTestBase {

  public $defaultTheme = 'stark';

  protected static $modules = [
    // Core.
    'node',

    // Custom.
    "drupal_module_template"
  ];

  /** @test */
  public function should_load_the_example_page_for_anonymous_users(): void {
    // Arrange.

    // Act.
    $this->drupalGet('/@opdavies/example');

    // Assert.
    $this->assertSession()->statusCodeEquals(Response::HTTP_OK);
  }

}
