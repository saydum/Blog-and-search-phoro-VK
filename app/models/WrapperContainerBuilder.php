<?php
/**
 *Контейнер зависимостей
 */

namespace App\models;

use DI\ContainerBuilder;
use League\Plates\Engine;

class WrapperContainerBuilder
{
	private $contaonerBuilder;
	private $config;

	function __construct()
	{
		$this->contaonerBuilder = new ContainerBuilder;
	}

	public function containerBlogPanel(){
		$this->contaonerBuilder->addDefinitions([
			Engine::class => function() {
				return new Engine('../app/views/blog');
			}
		]);
		return $this->contaonerBuilder->build();
	}
}
