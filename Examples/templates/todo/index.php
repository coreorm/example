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
            <div id="items"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/todo.js"></script>
<style>
#items{
    font:15px Source Sans Pro, sans-serif, arial;line-height:1.5;
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
</style>