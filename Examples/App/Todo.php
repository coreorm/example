<?php
/**
 * Simple Todo package
 */
use Slim\Slim, \CoreORM\Utility\Assoc, CoreORM\Dao\Orm, \Example\Model\Todo;
$app = new Slim();
$app->get('/todo', function() {
    // display the form here...
    require_once __TMPPATH___ . 'todo/index.php';
});
// deal with post
$app->post('/todo', function() use ($app) {
    try {
        // we already set the default_database to 'example', so this is the
        // equivalent of $dao = new Orm('example');
        $dao = new Orm();
        // start by checking action
        $action = $app->request->params('action');
        // start preping response
        $response = array(
            'success' => true,
            'action' => $action,
        );
        // CRUD
        switch ($action) {
            case 'add':
                $item = trim($app->request->params('item'));
                if (empty($item)) {
                    throw new \Exception('Todo item is empty');
                }
                $todoItem = new Todo();
                $todoItem->setItem($item)
                         ->setCreatedAt(date('Y-m-d H:i:s'));
                $dao->writeModel($todoItem);
                break;

            case 'update':
                $id = (int) $app->request->params('id');
                if (empty($id)) {
                    throw new \Exception('Invalid Item Id, can not locate item');
                }
                $item = new Todo();
                $item->setId($id);
                $dao->readModel($item);
                if ($item->getIsDone() == 'N') {
                    $item->setIsDone('Y');
                } else {
                    $item->setIsDone('N');
                }
                $dao->writeModel($item);
                $response['id'] = $id;
                break;

            case 'delete':
                $id = (int) $app->request->params('id');
                if (empty($id)) {
                    throw new \Exception('Invalid Item Id, can not locate item');
                }
                $item = new Todo();
                $item->setId($id);
                $dao->deleteModel($item);
                $response['id'] = $id;
                break;

            case 'load':
                // do nothing, just wait till all is loaded
                break;
            default:
                throw new \Exception('Invalid or empty action [' . $action . ']');
                break;
        }

        // now get all data always...
        $models = $dao->readModels(new Todo(), null, null, array(Todo::FIELD_CREATED_AT => 'DESC'));
        if (count($models) > 10) {
            // run clean up so we don't take too much space...
            require_once __DIR__ . '/cleanup.php';
        }
        $data = array();
        foreach ($models as $model) {
            if ($model instanceof Todo) {
                $tmpArray = $model->toArray(false, array(
                    // use strip_tags then htmlentities on the item field to avoid xss attacks
                    Todo::FIELD_ITEM => array('strip_tags', 'htmlentities'),
                ));
                // alternatively, we can also take advantage of the builtin getter with filter function:
                /*
                $tmpArray = $model->toArray();
                $tmpArray['item'] = $model->getItem(null, array('strip_tags', 'htmlentities'));
                // both are accepted way of using the models
                */
                // clean up a few things
                $data[] = $tmpArray;

            }
        }
        $response['data'] = $data;
        echo json_encode($response);
    } catch (\Exception $e) {
        echo json_encode(array(
            'success' => false,
            'error' => $e->getMessage()
        ));
    }
});


// run the app finally
$app->run();