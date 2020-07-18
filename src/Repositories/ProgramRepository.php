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
use EPGService\Entities\Program\CreditEntity;
use EPGService\Entities\ProgramEntity;
use EPGService\Environments\ServiceEnvironment;
use GuzzleHttp\Client;
use RuntimeException;
use function is_array;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Repositories
 */
final class ProgramRepository implements BaseRepository {
	/**
	 * @var string
	 */
	private const METHOD = 'file/%s';

	/**
	 * @var string
	 */
	private string $channel_id;

	/**
	 * @var \GuzzleHttp\Client
	 */
	private Client $client;

	/**
	 * @param \EPGService\Environments\ServiceEnvironment $environment
	 * @param string                                      $channel_id
	 */
	private function __construct(ServiceEnvironment $environment, string $channel_id) {
		$this->channel_id = $channel_id;

		$this->client = new Client([
			'base_uri' => $environment->getUrl(),
		]);
	}

	/**
	 * @param \EPGService\Environments\ServiceEnvironment $environment
	 * @param string                                      $channel_id
	 *
	 * @return \EPGService\Repositories\ProgramRepository
	 */
	public static function create(ServiceEnvironment $environment, string $channel_id): ProgramRepository {
		return new ProgramRepository($environment, $channel_id);
	}

	/**
	 * @param array $payload
	 *
	 * @return \EPGService\Entities\Program\CreditEntity[]
	 *
	 * @throws \RuntimeException
	 */
	private static function getCreditEntities(array $payload): array {
		return array_map(static function (array $value): CreditEntity {
			return CreditEntity::create($value);
		}, $payload);
	}

	/**
	 * @param array $payload
	 *
	 * @return \EPGService\Entities\ProgramEntity
	 *
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	private static function getProgramEntity(array $payload): ProgramEntity {
		$data = [];

		foreach ($payload as $name => $value) {
			switch ($name) {
				case 'category':
					$data['categories'] = $value;
					break;
				case 'channel':
					$data['channel_id'] = $value;
					break;
				case 'country':
					$data['countries'] = $value;
					break;
				case 'credits':
					$data['credits'] = self::getCreditEntities($value);
					break;
				case 'date':
					$data['date'] = new DateTime($value);
					break;
				case 'desc':
					$data['description'] = $value;
					break;
				case 'icon':
					$data['icons'] = $value;
					break;
				case 'pg':
					$data['parents_guide'] = $value;
					break;
				case 'production':
					$data['productions'] = $value;
					break;
				case 'start':
					$data['start'] = new DateTime($value);
					break;
				case 'stop':
					$data['stop'] = new DateTime($value);
					break;
				case 'sub_title':
					$data['sub_title'] = $value;
					break;
				case 'title':
					$data['title'] = $value;
					break;
				case 'year':
					$data['year'] = $value;
					break;
				default:
					trigger_error('blah-blah-blah', E_USER_WARNING);
					break;
			}
		}

		return ProgramEntity::create($data);
	}

	/**
	 * @return array
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function get(): array {
		$uri = sprintf(self::METHOD, $this->channel_id);
		$response = $this->client->get($uri);

		$content = $response->getBody()->getContents();
		$json = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

		if (!is_array($json) || !is_array($json['programms'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		$result = [];

		foreach ($json['programms'] as $program) {
			$result[] = self::getProgramEntity($program);
		}

		return $result;
	}
}
