<?php
    if (!isset($this->twig_form)) {
        $this->twig_form = 'form.html.twig';
    }

    echo \StudentRND\CodeDay\Application::$twig->render($this->twig_form, array(
                                                        'form' => $this->form,
                                                        'instance' => $instance,
                                                        'id_string' => isset($this->id_string) ? $this->id_string : NULL));
?>
