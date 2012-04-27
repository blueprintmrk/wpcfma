<?php
    include(CFMA_FUNCTIONS . '/customemail/newsletter_style.php');
    include(CFMA_FUNCTIONS . '/customemail/newsletter_mail_class.php');
    echo newsletter_template01($post->ID,$_classes);
?>