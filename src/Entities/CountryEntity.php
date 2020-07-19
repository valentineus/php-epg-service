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
use function is_string;

/**
 * @property-read string $id
 * @property-read string $iso
 * @property-read string $lang
 * @property-read string $name
 * @property-read string $version
 *
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Entities
 */
final class CountryEntity {
	/**
	 * @var string
	 */
	private string $id;

	/**
	 * @var string
	 */
	private string $iso;

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
	 * @param array $payload
	 */
	private function __construct(array $payload) {
		$this->id = $payload['id'];
		$this->iso = $payload['iso'];
		$this->lang = $payload['lang'];
		$this->name = $payload['name'];
		$this->version = $payload['version'];
	}

	/**
	 * @param array $payload
	 *
	 * @return \EPGService\Entities\CountryEntity
	 *
	 * @throws \RuntimeException
	 */
	public static function create(array $payload): CountryEntity {
		if (!is_string($payload['id'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['iso'])) {
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

		return new CountryEntity($payload);
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
