<?php

declare(strict_types=1);

namespace Drupal\drupal_module_template\Controller;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;

final class ExamplePageController {

  public function __construct(
    private LoggerChannelFactoryInterface $logger
  ) {}

  public function __invoke(): array {
    $this->logger->get('drupal_module_template')->info('Example page viewed.');

    return [];
  }

}
