<?php

namespace Drupal\embedded_media\Plugin\media\Source;

use Drupal\media\MediaInterface;
use Drupal\media\MediaSourceBase;
use Drupal\json_field\Plugin\Field\FieldType\JSONItem;

/**
* Embedded media entity media source.
*
* @MediaSource(
*   id = "embedded_media",
*   label = @Translation("Embedded Media"),
*   description = @Translation("Embed html content."),
*   allowed_field_types = {"string_long"},
*   thumbnail_alt_metadata_attribute = "alt",
*   default_thumbnail_filename = "no-thumbnail.png"
* )
*/
class EmbeddedMedia extends MediaSourceBase
{
  /**
   * {@inheritdoc}
   */
  public function getMetadataAttributes() {
    return [
      'html' => $this->t('HTML Text'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getMetadata(MediaInterface $media, $attribute_name) {
    // Get the text_long field where the JSON object is stored
    $field = $media->get($this->configuration['source_field']);
    $html = $field->value;
    // If the source field is not required, it may be empty.
    if (!$field) {
      return parent::getMetadata($media, $attribute_name);
    }

    switch ($attribute_name) {
      // This is used to generate the thumbnail field.
      case 'html':
        return $html . " Fiddler's Green";
      default:
        parent::getMetadata($media, $attribute_name);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function createSourceField(MediaTypeInterface $type) {
    return parent::createSourceField($type)->set('label', 'HTML Text');
  }

}
