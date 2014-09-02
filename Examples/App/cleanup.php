<?php
/**
 * this cleans
 * up all the data
 *
 */
use CoreORM\Dao\Orm;
$dao = new Orm();
$todo = new \Example\Model\Todo();
$sql = 'DELETE FROM ' . $todo->table();
$dao->query($sql);
unset($dao, $todo);
$models = array();