<?php render('_header', array('title' => $title)) ?>

<ul data-autodividers="true" data-role="listview" data-inset="true" data-filter="true">
    <?php render($places) ?>
</ul>

<?php
render('_footer')?>