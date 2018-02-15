<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 02/11/17
 * Time: 02:55 م
 */

namespace Jlib\Auth\Helper;



class Response
{
    private $message = "";
    private $status = false;
    private $data = null;
    private $errors = [];

    /**
     * @param bool $status
     * @param string $message
     * @param null $data
     * @param array $errors
     * @return static
     */
    public static function instance(bool $status = false, string $message = "", $data = null, array $errors = [])
    {
        return new static($status, $message, $data, $errors);
    }

    public function __construct(bool $status, string $message, $data, array $errors)
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
        $this->errors = $errors;
    }

    public function setMessage(string $message): Response
    {
        $this->message = $message;
        return $this;
    }

    public function setData($data): Response
    {
        $this->data = $data;
        return $this;
    }

    public function setStatus(bool $status): Response
    {
        $this->status = $status;
        return $this;
    }

    public function setErrors(array $errors): Response
    {
        $this->errors = $errors;
        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}