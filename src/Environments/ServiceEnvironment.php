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
	private const BASE_URL = 'http://xmldata.epgservice.ru/EPGService/hs/xmldata/%s/%s';

	/**
	 * @param string $key
	 * @param string $method
	 *
	 * @return string
	 */
	public static function getUrl(string $key, string $method = ''): string {
		return sprintf(self::BASE_URL, $key, $method);
	}
}
