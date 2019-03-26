<?php
namespace Bpartner;

/**
 * Class Messages
 *
 * @package Bpartner
 */
class Messages
{
    public const STATUS_ERROR = 'error';
    public const STATUS_SUCCESS = 'success';
    public const META = 'data';
    private $result = [];

    /**
     * StatusMessage constructor.
     *
     * @param string $message
     */
    public function __construct($message = '')
    {
        $this->setStatus(self::STATUS_SUCCESS);
        $message ? $this->setMessage($message) : $this->setMessage('Record updated.');
    }

    /**
     * @param string $message
     *
     * @return Messages
     */
    public static function make($message = '') :Messages
    {
        return new static($message);
    }

    /**
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status) :self
    {
        $this->result['status'] = $status;

        return $this;
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message) :self
    {
        $this->result['message'] = $message;

        return $this;
    }

    /**
     * @param $message
     */
    public function setErrorMessage($message) :void
    {
        $this->result['message'] = $message;
        $this->result['status'] = self::STATUS_ERROR;
    }

    /**
     * @return array
     */
    public function get() :array
    {
        return $this->result;
    }

    /**
     * @return bool
     */
    public function exception() :bool
    {
        return self::STATUS_ERROR === $this->result['status'];
    }

    public function setMeta($value) :self
    {
        $this->result[self::META] = $value;

        return $this;
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function result()
    {
        return $this->exception() ? response($this->get(), 400) : response($this->get());
    }

}
