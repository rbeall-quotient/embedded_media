<?php

namespace Drupal\embedded_media\Plugin\Field\FieldFormatter;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\media\Entity\MediaType;
use Drupal\media\IFrameMarkup;
use Drupal\media\OEmbed\Resource;
use Drupal\media\OEmbed\ResourceException;
use Drupal\Core\Field\FormatterBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'embedded_media' formatter.
 *
 * @FieldFormatter(
 *   id = "embedded_media",
 *   label = @Translation("Embedded html media"),
 *   field_types = {
 *     "string_long"
 *   }
 * )
 */
class EmbeddedMediaFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#theme' => 'embedded_media',
        '#content' => "hello world"
      ];
    }

    return $element;
  }

}
