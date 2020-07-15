<?php
/**
 * Copyright 2020 “EPGService”
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an “AS IS” BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types = 1);

namespace EPGService\Entities;

use RuntimeException;
use function is_int;
use function is_string;

/**
 * @property-read int    $id
 * @property-read string $lang
 * @property-read string $name
 * @property-read string $version
 *
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Entities
 */
final class GenreEntity {
	/**
	 * @var int
	 */
	private int $id;

	/**
	 * @var string
	 */
	private string $lang;

	/**
	 * @var string
	 */
	private string $name;

	/**
	 * @var string
	 */
	private string $version;

	/**
	 * @param int    $id
	 * @param string $lang
	 * @param string $name
	 * @param string $version
	 */
	private function __construct(int $id, string $lang, string $name, string $version) {
		$this->id = $id;
		$this->lang = $lang;
		$this->name = $name;
		$this->version = $version;
	}

	public static function create(array $payload): GenreEntity {
		if (!is_int($payload['id'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['lang'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['name'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['version'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		return new GenreEntity($payload['id'], $payload['lang'], $payload['name'], $payload['version']);
	}

	/**
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function __get(string $name) {
		return $this->$name;
	}

	/**
	 * @param string $name
	 * @param mixed  $value
	 *
	 * @throws \RuntimeException
	 */
	public function __set(string $name, $value) {
		throw new RuntimeException('blah-blah-blah');
	}
}
