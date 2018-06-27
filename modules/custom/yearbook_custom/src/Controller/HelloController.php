<?php

namespace Drupal\yearbook_custom\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {

    /**
     * Display the markup.
     *
     * @return array
     */

    public function content() {

        return [
            '#type' => 'markup',
            '#markup' => $this->t('Hello Dude!'),
        ];
    }
}
?>