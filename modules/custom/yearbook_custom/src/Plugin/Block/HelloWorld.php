<?php
namespace Drupal\yearbook_custom\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
* Provides a Hello World Block.
*
* @Block(
*
* id = "hello_world",
*
* admin_label = @Translation("Hello World"),
*
* category = @Translation("Hello World"),
* )
*/
class HelloWorld extends BlockBase {
    /*
    * {@inheritdoc}
    */
    public function build() {
        return array(
        '#markup' => $this->t('Hello, Dude!'),
        );
    }
}
?>