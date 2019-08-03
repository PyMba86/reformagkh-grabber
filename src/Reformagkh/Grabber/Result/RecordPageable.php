<?php

namespace Reformagkh\Grabber\Result;

class RecordPageable {

    /**
     * @var array
     */
    protected $data;

    /**
     * @var int
     */
    protected $page_number;

    /**
     * @var int
     */
    protected $page_count;


    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getPageNumber(): int
    {
        return $this->page_number;
    }

    /**
     * @return int
     */
    public function getPageCount(): int
    {
        return $this->page_count;
    }

    public function getDataItem($index)
    {
        if (isset($this->data[$index])) {
            return $this->data[$index];
        }

        return null;
    }

    public function getSize()
    {
        return count($this->data);
    }
}