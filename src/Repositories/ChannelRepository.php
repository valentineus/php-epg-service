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

use DateTime;
use EPGService\Entities\ChannelEntity;
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
final class ChannelRepository implements BaseRepository {
	/**
	 * @var string
	 */
	private const METHOD = 'index';

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
	 * @return \EPGService\Repositories\ChannelRepository
	 */
	public static function create(ServiceEnvironment $environment): ChannelRepository {
		return new ChannelRepository($environment);
	}

	/**
	 * @return \EPGService\Entities\ChannelEntity[]
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function get(): array {
		$response = $this->client->get(self::METHOD);
		$content = $response->getBody()->getContents();
		$xml = simplexml_load_string($content);

		if (is_bool($xml) || !$xml->channel instanceof SimpleXMLElement) {
			throw new RuntimeException('blah-blah-blah');
		}

		$result = [];

		foreach ($xml->channel as $element) {
			if (!$element instanceof SimpleXMLElement) {
				trigger_error('blah-blah-blah', E_USER_WARNING);
				continue;
			}

			$update = StringParser::get($element->update);

			$result[] = ChannelEntity::create([
				'base_id'   => StringParser::get($element->{'base-channel'}),
				'base_name' => StringParser::get($element->{'base-channel'}['id']),
				'epg_id'    => StringParser::get($element['epgsrvc_id']),
				'geo_data'  => StringParser::get($element->{'geo-data'}),
				'href'      => StringParser::get($element->href),
				'icon'      => StringParser::get($element->icon['src']),
				'id'        => StringParser::get($element['id']),
				'lang'      => StringParser::get($element->{'display-name'}['lang']),
				'name'      => StringParser::get($element->{'base-channel'}),
				'update_at' => new DateTime($update),
				'week'      => StringParser::get($element->week),
			]);
		}

		return $result;
	}
}
