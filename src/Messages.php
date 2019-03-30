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
    private function __construct($message = '')
    {
        $this->setStatus(self::STATUS_SUCCESS);
        $message ? $this->setMessage($message) : $this->setMessage('Record updated.');
    }

    /**
     * Create new message
     *
     * @param string $message
     *
     * @return Messages
     */
    public static function make($message = '') :Messages
    {
        return new static($message);
    }

    /**
     * Set new status
     *
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
     * Set new message
     *
     * @param $message
     * @return $this
     */
    public function setMessage($message) :self
    {
        $this->result['message'] = $message;

        return $this;
    }

    /**
     * Set error message
     *
     * @param $message
     * @return $this
     */
    public function setErrorMessage($message) :self
    {
        $this->result['message'] = $message;
        $this->result['status'] = self::STATUS_ERROR;

        return $this;
    }

    /**
     * Get message
     *
     * @return array
     */
    public function get() :array
    {
        return $this->result;
    }

    /**
     * Check error status in message
     *
     * @return bool
     */
    public function exception() :bool
    {
        return self::STATUS_ERROR === $this->result['status'];
    }

    /**
     * Add meta data to message
     *
     * @param $value
     *
     * @return Messages
     */
    public function setMeta($value) :self
    {
        $this->result[self::META] = $value;

        return $this;
    }

    /**
     * Add data to root
     *
     * @param $value
     *
     * @return $this
     */
    public function paginate($value)
    {
        $this->result = array_merge($this->result, $value);

        return $this;
    }

    /**
     * Add response status to Response
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function result()
    {
        return $this->exception() ? response($this->get(), 400) : response($this->get());
    }

}
