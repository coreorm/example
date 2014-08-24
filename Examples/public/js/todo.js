/**
 * to-do list class
 */
var CoreORM_Todo = {
    'url' : '/todo',
    'post' : function(data) {
        var Todo = this;
        if (data.action == 'add') {
            $('#item').val('');
        }
        $.post(
            Todo.url,
            data,
            function(response, textStatus) {
                if (textStatus != 'success') {
                    alert('Unable to retrieve data, please try again');
                }
                Todo.parse(response);
            },
            'json'
        );
        // stop current flow
        return false;
    },
    'parse': function(response) {
        if (response.success) {
            // is it delete?
            if (response.action == 'delete') {
                var id = response.id;
                $('#item_' + id).hide();
            }
            // all good, go to next
            if (response.data) {
                var template = '<div id="item_:id"><label style=":style"><input type="checkbox"' +
                          ' onclick="CoreORM_Todo.post({\'action\':\'update\',' +
                          '\'id\':\':id\'});">:item <small style="font-size:10px;color:#555;">' +
                          ':date</small></label><a href="#" onclick="return CoreORM_Todo.post({\'action\':\'delete\'' +
                          ',\'id\':\':id\'});" style="color:red;"> X </a></div>';
                var html = '';
                for (var i in response.data) {
                    var Item = response.data[i];
                    console.log(Item);
                    var tmpHtml = template.replace(':item', Item['item']);
                    tmpHtml = tmpHtml.replace(':id', Item.id).replace(':id', Item.id).replace(':id', Item.id);
                    tmpHtml = tmpHtml.replace(':date', Item.created_at);
                    if (Item.is_done == 'Y') {
                        var style = 'text-decoration:line-through';
                    } else {
                        var style = '';
                    }
                    tmpHtml = tmpHtml.replace(':style', style);
                    html += tmpHtml;
                }
                $('#items').html(html);
            }
            return;
        }
        // otherwise, check error.
        var error = 'System error';
        if (response.error) {
            error = response.error;
        }
        alert("Error:\n" + error);
    }
};
// default load all
CoreORM_Todo.post({
    'action':'load'
});