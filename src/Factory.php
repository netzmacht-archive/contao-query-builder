<?php

/**
 * @package    contao-query-builder
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder;

use Aura\SqlQuery\QueryFactory;
use Database;
use Netzmacht\Contao\QueryBuilder\Query\Decorator\DeleteDecorator;
use Netzmacht\Contao\QueryBuilder\Query\Decorator\InsertDecorator;
use Netzmacht\Contao\QueryBuilder\Query\Decorator\SelectDecorator;
use Netzmacht\Contao\QueryBuilder\Query\Decorator\UpdateDecorator;
use Netzmacht\Contao\QueryBuilder\Query\Delete;
use Netzmacht\Contao\QueryBuilder\Query\Insert;
use Netzmacht\Contao\QueryBuilder\Query\Select;

/**
 * Query builder factory.
 *
 * @package Netzmacht\Contao\QueryBuilder
 */
class Factory
{
    /**
     * Database connection.
     *
     * @var Database
     */
    private $connection;

    /**
     * The query factory.
     *
     * @var QueryFactory
     */
    private $queryFactory;

    /**
     * Factory constructor.
     *
     * @param Database     $connection   Database connection.
     * @param QueryFactory $queryFactory The query factory.
     */
    public function __construct(Database $connection, QueryFactory $queryFactory)
    {
        $this->connection   = $connection;
        $this->queryFactory = $queryFactory;
    }

    /**
     * Create new insert query.
     *
     * @return Insert
     */
    public function newInsert()
    {
        $query     = $this->queryFactory->newInsert();
        $decorator = new InsertDecorator($this->connection, $query);

        return $decorator;
    }

    /**
     * Create new delete query.
     *
     * @return Delete
     */
    public function newDelete()
    {
        $query     = $this->queryFactory->newDelete();
        $decorator = new DeleteDecorator($this->connection, $query);

        return $decorator;
    }

    /**
     * Create new select query.
     *
     * @return Select
     */
    public function newSelect()
    {
        $query     = $this->queryFactory->newSelect();
        $decorator = new SelectDecorator($this->connection, $query);

        return $decorator;
    }

    /**
     * Create new update query.
     *
     * @return UpdateDecorator
     */
    public function newUpdate()
    {
        $query     = $this->queryFactory->newUpdate();
        $decorator = new UpdateDecorator($this->connection, $query);

        return $decorator;
    }
}
