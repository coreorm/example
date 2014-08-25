<?php
/**
 * Todo model
 * @author ModelGenerator
 */
namespace Example\Model;
use CoreORM\Model;
class Todo extends Model
{
    CONST FIELD_ID = '`todo`.`id`';
    CONST FIELD_ITEM = '`todo`.`item`';
    CONST FIELD_IS_DONE = '`todo`.`is_done`';
    CONST FIELD_CREATED_AT = '`todo`.`created_at`';

    protected $table = 'todo';
    protected $fields = array(
        'todo_id' => array(
            'type' => 'int',
            'required' => '1',
            'field' => 'id',
            'field_key' => 'todo_id',
            'field_map' => '`todo`.`id`',
            'getter' => 'setId',
            'setter' => 'getId',
        ),
        'todo_item' => array(
            'type' => 'string',
            'required' => '1',
            'field' => 'item',
            'field_key' => 'todo_item',
            'field_map' => '`todo`.`item`',
            'getter' => 'setItem',
            'setter' => 'getItem',
        ),
        'todo_is_done' => array(
            'type' => 'string',
            'required' => '',
            'field' => 'is_done',
            'field_key' => 'todo_is_done',
            'field_map' => '`todo`.`is_done`',
            'getter' => 'setIsDone',
            'setter' => 'getIsDone',
        ),
        'todo_created_at' => array(
            'type' => 'datetime',
            'required' => '1',
            'field' => 'created_at',
            'field_key' => 'todo_created_at',
            'field_map' => '`todo`.`created_at`',
            'getter' => 'setCreatedAt',
            'setter' => 'getCreatedAt',
        ),
    );
    protected $key = array('todo_id');
    protected $relations = array(
    );
    
    /**
     * set Id
     * @param mixed $value
     * @return $this
     */
    public function setId($value)
    {
        return parent::rawSetFieldData('todo_id', $value);
    }
    /**
     * set Item
     * @param mixed $value
     * @return $this
     */
    public function setItem($value)
    {
        return parent::rawSetFieldData('todo_item', $value);
    }
    /**
     * set IsDone
     * @param mixed $value
     * @return $this
     */
    public function setIsDone($value)
    {
        return parent::rawSetFieldData('todo_is_done', $value);
    }
    /**
     * set CreatedAt
     * @param mixed $value
     * @return $this
     */
    public function setCreatedAt($value)
    {
        return parent::rawSetFieldData('todo_created_at', $value);
    }
    
    /**
     * retrieve Id
     * @param mixed $default
     * @param array $filter filter call back function
     * @return int
     */
    public function getId($default = null, $filter = array())
    {
        return parent::rawGetFieldData('todo_id', $default, $filter);
    }
    /**
     * retrieve Item
     * @param mixed $default
     * @param array $filter filter call back function
     * @return string
     */
    public function getItem($default = null, $filter = array())
    {
        return parent::rawGetFieldData('todo_item', $default, $filter);
    }
    /**
     * retrieve IsDone
     * @param mixed $default
     * @param array $filter filter call back function
     * @return string
     */
    public function getIsDone($default = null, $filter = array())
    {
        return parent::rawGetFieldData('todo_is_done', $default, $filter);
    }
    /**
     * retrieve CreatedAt
     * @param string $format
     * @param mixed $default
     * @param array $filter filter call back function
     * @return datetime
     */
    public function getCreatedAt($format = 'jS F, Y H:i', $default = null, $filter = array())
    {
        return parent::formatDateByName('todo_created_at', $format, $default, $filter);
    }
}