<?php

namespace Addons\Core\Exceptions;

use RuntimeException;
use Addons\Core\Http\Response\TextResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OutputResponseException extends HttpResponseException {

	public function __construct($message_name = null, $result = 'failure')
	{
		if ($message_name instanceof TextResponse) {
			$this->response = $message_name;
		} else {
			$this->response = new TextResponse;
			!empty($message_name) && $this->setMessage($message_name);
			$this->setResult($result);
		}
	}

	public function setHeaders($headers)
	{
		$this->response->setHeaders($headers);
		return $this;
	}

	public function setRequest($request)
	{
		$this->response->setRequest($request);
		return $this;
	}

	public function setResult($result)
	{
		$this->response->setResult($result);
		return $this;
	}

	public function setStatusCode($code)
	{
		$this->response->setStatusCode($code);
		return $this;
	}

	public function setFormatter($formatter)
	{
		$this->response->setFormatter($formatter);
		return $this;
	}

	public function setUrl($url)
	{
		$this->response->setUrl($url);
		return $this;
	}

	public function setData($data, $outputRaw = false)
	{
		$this->response->setData($data, $outputRaw);
		return $this;
	}

	public function setMessage($message_name, $transData = [])
	{
		$this->response->setMessage($message_name, $transData);
		return $this;
	}

	public function setRawMessage($message)
	{
		$this->response->setRawMessage($message);
		return $this;
	}
}
