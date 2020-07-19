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

namespace EPGService\Repositories;

use EPGService\Entities\CountryEntity;
use EPGService\Environments\ServiceEnvironment;
use EPGService\Parsers\StringParser;
use GuzzleHttp\Client;
use RuntimeException;
use SimpleXMLElement;
use function is_bool;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Repositories
 */
final class CountryRepository implements BaseRepository {
	/**
	 * @var string
	 */
	private const METHOD = 'country_list';

	/**
	 * @var \GuzzleHttp\Client
	 */
	private Client $client;

	/**
	 * @param \EPGService\Environments\ServiceEnvironment $environment
	 */
	private function __construct(ServiceEnvironment $environment) {
		$this->client = new Client([
			'base_uri' => $environment->getUrl(),
		]);
	}

	/**
	 * @param \EPGService\Environments\ServiceEnvironment $environment
	 *
	 * @return \EPGService\Repositories\CountryRepository
	 */
	public static function create(ServiceEnvironment $environment): CountryRepository {
		return new CountryRepository($environment);
	}

	public function get(): array {
		$response = $this->client->get(self::METHOD);
		$content = $response->getBody()->getContents();
		$xml = simplexml_load_string($content);

		if (is_bool($xml) || !$xml->element instanceof SimpleXMLElement) {
			throw new RuntimeException('blah-blah-blah');
		}

		$result = [];

		foreach ($xml->element as $element) {
			if (!$element instanceof SimpleXMLElement) {
				trigger_error('blah-blah-blah', E_USER_WARNING);
				continue;
			}

			$result[] = CountryEntity::create([
				'id'      => StringParser::get($element['id']),
				'iso'     => StringParser::get($element['ISO']),
				'lang'    => StringParser::get($element->name['lang']),
				'name'    => StringParser::get($element->name),
				'version' => StringParser::get($element['version']),
			]);
		}

		return $result;
	}
}
