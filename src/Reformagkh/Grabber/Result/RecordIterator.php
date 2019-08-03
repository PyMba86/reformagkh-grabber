<?php

namespace Reformagkh\Grabber\Result;

use Reformagkh\Grabber\Client;

class RecordIterator implements \SeekableIterator, \Countable {

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var RecordPageable
     */
    private $recordPageable;

    /**
     * @var callable
     */
    protected $recordCallback;

    /**
     * Iterator pointer
     *
     * @var int
     */
    protected $pointer = 0;

    /**
     * Cached current domain model object
     *
     * @var mixed
     */
    protected $current;

    /**
     * @var int
     */
    protected $page;

    /**
     * Construct a record iterator
     *
     * @param client $client
     * @param callable $recordCallback
     * @param int $page
     */
    public function __construct(Client $client, callable $recordCallback, int $page)
    {
        $this->client = $client;
        $this->setRecordCallbackPageable($recordCallback);
        $this->page = $page;
    }

    /**
     * {@inheritdoc}
     * @return object
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * @param int $pointer
     *
     * @return object
     */
    protected function getObjectAt($pointer)
    {
        if (!isset($this->recordPageable)) {
            $func = $this->recordCallback;
            $this->recordPageable = $func($this->page);
        }

        if ($this->recordPageable->getDataItem($pointer)) {
            $this->current = $this->recordPageable->getDataItem($pointer);
            return $this->current;
        }

        if ($this->recordPageable->getPageNumber() < $this->recordPageable->getPageCount()) {
            $this->queryMore();
            return $this->getObjectAt($this->pointer);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     *
     * @return int|null
     */
    public function key()
    {
        return $this->pointer;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->pointer++;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->pointer = 0;
    }

    /**
     * {@inheritdoc}
     *
     * @return boolean
     */
    public function valid()
    {
        return null != $this->getObjectAt($this->pointer);
    }

    /**
     * @return object
     */
    public function first()
    {
        return $this->getObjectAt(0);
    }

    /**
     * @param callable $callback
     * @return RecordIterator
     */

    public function setRecordCallbackPageable(callable $callback)
    {
        $this->recordCallback = $callback;
        return $this;
    }

    protected function queryMore()
    {
        $this->page++;
        $func = $this->recordCallback;
        $this->recordPageable = $func($this->page);
        $this->rewind();
    }
    /**
     * Get total number of records returned
     *
     * @return int
     */

    public function count()
    {
        return $this->recordPageable->getSize();
    }

    /**
     * @param int $position
     * @return object
     */

    public function seek($position)
    {
        return $this->getObjectAt($position);
    }
}