<?php
    echo \StudentRND\CodeDay\Application::$twig->render('form.html.twig', array(
                                                        'form' => $this->form,
                                                        'instance' => $instance,
                                                        'id_string' => isset($this->id_string) ? $this->id_string : NULL));
?>
