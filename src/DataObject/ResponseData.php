<?php

namespace Bpartner\Messages\DataObject;

/**
 * Class ResponseData.
 *
 * @property $root_name
 * @property $root_value
 * @property $meta
 * @property $message
 * @property $error_message
 * @property $paginate
 */
class ResponseData
{
    public $root_name;
    public $root_value;
    public $meta;
    public $message;
    public $error_message;
    public $paginate;

    /**
     * ResponseData constructor.
     *
     * @param null $message
     * @param null $error_message
     * @param null $meta
     * @param null $paginate
     * @param null $root_name
     * @param null $root_value
     */
    public function __construct(
        $message = null,
        $error_message = null,
        $meta = null,
        $paginate = null,
        $root_name = null,
        $root_value = null
    ) {
        $this->message = $message;
        $this->error_message = $error_message;
        $this->meta = $meta;
        $this->paginate = $paginate;
        $this->root_name = $root_name;
        $this->root_value = $root_value;
    }
}
