<?php

class ParseUrl
{
	public function getInfoFromUrl($url)
	{
		$info = explode('://', $url);
		$host = explode('.', $info[1]);

		$return = array(
			'protocolo' => $info[0],
			'host' => $host[0],
		);

		if ($info[0] == 'http') {
			$return['dominio'] = $host[1] . '.' .  $host[2];
		} else {
			$dominio = explode('@', $info[1]);
			$return['dominio'] = $dominio[1];
			$usuarioSenha = explode('%', $dominio[0]);
			$return['usuario'] = $usuarioSenha[0];
			$return['senha'] = $usuarioSenha[1];
		}

		return $return;
	}
}