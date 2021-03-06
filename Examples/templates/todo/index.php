<?php
/**
 * to-do list
 * index page
 *
 */
?>
<!-- Main -->
<div id="main-wrapper">
    <div id="main" class="container">
        <div id="content">
            <form method="post" action="/todo" onsubmit="return CoreORM_Todo.post({
            'action':'add',
            'item': $('#item').val()
            })">
                <input type="text" id="item" name="item" placeholder="What to do next?" class="4u" />
            </form>
            <small style="font-size:12px;">The system will only keep up to 10 items, when it's over 10 all items will be cleaned up. This is for test purpose only.</small>
            <div id="items"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/todo.js"></script>
<style>
#items{
    line-height:1.5;
}
#items div{
    padding:4px 0;
}
#items div input{
    margin: 0 6px 0 4px;
}
#items div a{
    text-decoration:none;
}
#items div small{
    font-size:10px;color:#555;
    margin: 6px 0;
}
</style>