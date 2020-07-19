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

namespace EPGService\Entities\Program;

use RuntimeException;
use function is_string;

/**
 * @property-read string $name
 * @property-read string $type
 *
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Entities\Program
 */
final class CreditEntity {
	/**
	 * @var string
	 */
	private string $name;

	/**
	 * @var string
	 */
	private string $type;

	/**
	 * @param array $payload
	 */
	private function __construct(array $payload) {
		$this->name = $payload['name'];
		$this->type = $payload['type'];
	}

	/**
	 * @param array $payload
	 *
	 * @return \EPGService\Entities\Program\CreditEntity
	 *
	 * @throws \RuntimeException
	 */
	public static function create(array $payload): CreditEntity {
		if (!is_string($payload['name'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['type'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		return new CreditEntity($payload);
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
