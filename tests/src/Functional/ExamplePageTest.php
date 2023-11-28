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

  public function testShouldLoadTheExamplePageForAnonymousUsers(): void {
    // Arrange.

    // Act.
    $this->drupalGet('/@opdavies/drupal-module-template');

    // Assert.
    $this->assertSession()->statusCodeEquals(Response::HTTP_OK);
  }

}
