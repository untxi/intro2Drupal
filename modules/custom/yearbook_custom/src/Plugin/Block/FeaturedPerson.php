<?php
namespace Drupal\yearbook_custom\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
/**
* Provides a Featured Person Block.
*
* @Block(
*
* id = "featured_person",
*
* admin_label = @Translation("Featured Person"),
*
* category = @Translation("Featured Person"),
* )
*/
class FeaturedPerson extends BlockBase implements BlockPluginInterface {
    /*
    * {@inheritdoc}
    */
    public function build() {
        return array('#theme' => 'featured_person',
        '#featured_person_title' => $this->configuration['featured_person_title'],
        '#featured_person_node' => $this->configuration['featured_person_node'],
        );
    }

    /*
    * {@inheritdoc}
    */
    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);
        $config = $this->getConfiguration();
        $form['featured_person_title'] = ['#type' => 'textfield',
        '#title' => $this->t('Featured Person Title'),
        '#description' => $this->t('Text to be displayed with the person.'),
        '#default_value' => isset($config['featured_person_title']) ? $config['featured_person_title'] : '','#required' => TRUE,];
        $form['featured_person_node'] = ['#type' => 'entity_autocomplete','#target_type' => 'node',
        '#selection_settings' => ['target_bundles' => ['person']],
        '#title' => $this->t('Featured Person'),
        '#description' => $this->t('Choose person to be featured'),
        '#default_value' => isset($config['featured_person_node']) ? $config['featured_person_node'] : '',
        '#required' => TRUE,];
        return $form;
    }
    /*
    * {@inheritdoc}
    */
    public function blockSubmit($form, FormStateInterface $form_state) {
        parent::blockSubmit($form, $form_state);
        $values = $form_state->getValues();
        $this->configuration['featured_person_title'] = $values['featured_person_title'];
        $this->configuration['featured_person_node'] = $values['featured_person_node'];
    }
}
?>