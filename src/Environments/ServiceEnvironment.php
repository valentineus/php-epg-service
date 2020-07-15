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

namespace EPGService\Environments;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Environments
 */
class ServiceEnvironment {
	/**
	 * @var string
	 */
	protected const BASE_URL = 'http://xmldata.epgservice.ru/EPGService/hs/xmldata/%s';

	/**
	 * @var string
	 */
	private string $key;

	/**
	 * @param string $key
	 */
	protected function __construct(string $key) {
		$this->key = $key;
	}

	/**
	 * @param string $key
	 *
	 * @return \EPGService\Environments\ServiceEnvironment
	 */
	public static function create(string $key): ServiceEnvironment {
		return new ServiceEnvironment($key);
	}

	/**
	 * @return string
	 */
	public function getUrl(): string {
		return sprintf(self::BASE_URL, $this->key);
	}
}
