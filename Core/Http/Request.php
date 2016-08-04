<?php

namespace Core\Http;

class Request implements RequestInterface
{
	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var ParamBagInterface
	 */
	protected $query;

	/**
	 * @var ParamBagInterface
	 */
	protected $post;

	/**
	 * @var ParamBagInterface
	 */
	protected $files;

	/**
	 * @var ParamBagInterface
	 */
	protected $server;
	
	public function __construct($url, ParamBagInterface $query, ParamBagInterface $post, ParamBagInterface $files, ParamBagInterface $server)
	{
		$this->url = $url;
		$this->post = $post;
		$this->query = $query;
		$this->files = $files;
		$this->server = $server;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function query()
	{
		return $this->query;
	}

	public function post()
	{
		return $this->post;
	}

	public function files()
	{
		return $this->files;
	}
	
	public function server() {
		return $this->server;
	}

}