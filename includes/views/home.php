<?php render('_header', array('title' => $title)) ?>

<p>Welcome back <?php echo $_SESSION['FIRSTNAME']; ?></p>

<div data-role="collapsible-set">
    <div data-role="collapsible" data-collapsed="true">
        <h3>My Places</h3>
        <ul data-autodividers="true" data-role="listview" data-inset="true" data-filter="true" >
            <?php render($content) ?>
        </ul>
    </div>
    <div data-role="collapsible" data-collapsed="true">
        <h3>My Friends</h3>
        <ul data-autodividers="true" data-role="listview" data-inset="true" data-filter="true" >
            <?php render($friend) ?>
        </ul>
    </div>
</div>

<?php
render('_footer')?>