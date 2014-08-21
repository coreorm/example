<?php
/**
 * base class
 * For all Apps
 */
namespace Example\App;
use CoreORM\Dao\Orm;

class Base
{
    /**
     * the dao instance singleton
     * @var Orm
     */
    protected $dao = null;

    public function dao()
    {
        if ($this->dao instanceof Orm) {
            return $this->dao;
        }
        // otherwise, setup new dao and set it
        $this->dao = new Orm('example');
        return $this->dao;

    }

}