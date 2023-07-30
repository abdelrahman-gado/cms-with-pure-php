<?php

class Paginator
{
    /**
     * Number of records per page
     * @var integer
     */
    public $limit;

    /**
     * Number of records to skip before the page
     * @var integer
     */
    public $offset;

    /**
     * Previous page number
     * @var integer
     */
    public $previous;

    /**
     * Next page number
     * @var integer
     */
    public $next;

    /**
     * Constructor
     * @param int $page Page number
     * @param int $records_per_page Number of records per page
     * @param int $total_records Number of all records
     * 
     * @return void
     */
    public function __construct($page, $records_per_page, $total_records)
    {
        $this->limit = $records_per_page;

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' =>
            [
                'default' => 1,
                'min_range' => 1
            ]
        ]);

        if ($page > 1) {
            $this->previous = $page - 1;
        }


        $total_pages = ceil($total_records / $records_per_page);

        if ($page < $total_pages) {
            $this->next = $page + 1;
        }
        

        $this->offset = $records_per_page * ($page - 1);
    }
}