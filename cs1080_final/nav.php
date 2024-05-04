<nav>
    <a class="<?php
    if ($pathParts['filename'] == "index"){
        print 'activePage';
    }
    ?>" href="index.php">HISTORY</a> 

    <a class="<?php
    if ($pathParts['filename'] == "detail"){
        print 'activePage';
    }
    ?>" href="detail.php">EVENTS</a>
    
    <a class="<?php
    if ($pathParts['filename'] == "about"){
        print 'activePage';
    }
    ?>" href="about.php">COUNTRIES</a> 

    <a class="<?php
    if ($pathParts['filename'] == "form"){
        print 'activePage';
    }
    ?>" href="form.php">SURVEY</a> 
            
</nav>