<?php

namespace Core\Http;

interface ResponseInterface
{
	const RESPONSE_CODE_GOOD = 200;

	const RESPONSE_CODE_NOT_FOUND = 404;

	const RESPONSE_CODE_ERROR = 500;

	const RESPONSE_GOOD_TEXT = 'OK';

	const RESPONSE_ERROR_TEXT = 'ERROR';

	const RESPONSE_NOT_FOUND_TEXT = 'NOT FOUND';


	public function addHeader($key, $value);

	public function getHeaders();

	public function setContent($body);

	public function getContent();

	public function setStatusCode($code);

	public function getStatusCode();

	public function getStatusMessage();

	public function setStatusMessage($message);

	public function send();
}