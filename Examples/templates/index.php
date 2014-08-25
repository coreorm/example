<?php
$apps = \CoreORM\Utility\Config::get('apps');
?>
<!-- Main -->
<div id="main-wrapper">
    <div id="main" class="container">
        <div id="content">
            <?php
            foreach ($apps as $url => $app) :
                $id = md5($url);
            ?>
            <!-- Post -->
            <article class="box post" style="margin: 0 30px">
                <header>
                    <h2><a href="<?php echo $url; ?>"><?php echo $app['name']; ?></a></h2>
                </header>
                <?php echo $app['desc']; ?>
                <a href="#" onclick="$('#src_<?php echo $id ?>').toggle();return false;">Source Code</a>
                <pre style="display:none;" id="src_<?php echo $id ?>" class="prettyprint linenums"><?php
                    echo htmlentities(file_get_contents(__APPATH___ . $app['file']));
                ?></pre>
            </article>
            <?php endforeach ?>
        </div>
    </div>
</div>