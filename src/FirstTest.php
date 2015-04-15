<?php

require_once 'ParseUrl.php';

class FirstTest extends PHPUnit_Framework_TestCase
{
	public function testProtocoloHttp()
	{
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('http://www.google.com');
		$this->assertEquals('http', $return['protocolo']);
	}

	public function testHostHttp()
	{
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('http://www.google.com');
		$this->assertEquals('www', $return['host']);
	}

	public function testDominioHttp()
	{
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('http://www.google.com');
		$this->assertEquals('google.com', $return['dominio']);
	}

	public function testProtocoloSsh()
	{
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('ssh://fulano%senha@git.com');
		$this->assertEquals('ssh', $return['protocolo']);
	}

	public function testDominioSsh()
	{
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('ssh://fulano%senha@git.com');
		$this->assertEquals('git.com', $return['dominio']);
	}

	public function testUsuarioSsh()
	{
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('ssh://fulano%senha@git.com');
		$this->assertEquals('fulano', $return['usuario']);
	}

	public function testSenhaSsh()
	{
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('ssh://fulano%senha@git.com');
		$this->assertEquals('senha', $return['senha']);
	}

	public function testSaidaSsh()
	{
		$this->markTestIncomplete();
		$class = new ParseUrl();
		$return = $class->getInfoFromUrl('ssh://fulano%senha@git.com');
		$saida = array(
			'protocolo' => 'ssh',
			'usuario' => 'fulano',
			'senha' => 'senha',
			'dominio' => 'git.com',
		);

		$this->assertEquals($saida, $return);
	}
}