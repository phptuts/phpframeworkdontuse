<?php

namespace Core\Http;

class Response implements ResponseInterface
{
	protected $headers =[];

	protected $content;

	protected $statusCode;

	protected $statusMessage;

	public function addHeader($key, $value)
	{
		$this->headers[$key] = $value;

		return $this;
	}

	public function getHeaders()
	{

		return $this->headers;
	}

	public function setContent($body)
	{
		$this->content = $body;

		return $this;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setStatusCode($code)
	{
		$this->statusCode = $code;

		return $this;
	}

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function getStatusMessage()
	{
		return $this->statusMessage;
	}

	public function setStatusMessage($message)
	{
		$this->statusMessage = $message;

		return $this;
	}

	public function send()
	{
		header(sprintf('HTTP/1.1 %s %s',  $this->getStatusCode(), $this->getStatusMessage()), true, $this->statusCode);

		foreach($this->headers as $key => $value) {
			header($key . ': ' . $value);
		}
		echo $this->getContent();
		if (function_exists('fastcgi_finish_request')) {
			fastcgi_finish_request();
		}

		return $this;
	}

}