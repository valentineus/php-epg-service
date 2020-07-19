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

use DateTime;
use RuntimeException;
use function is_array;
use function is_string;

/**
 * @property-read \EPGService\Entities\Program\CreditEntity[]|null $credits
 * @property-read \DateTime                                        $date
 * @property-read \DateTime                                        $start
 * @property-read \DateTime                                        $stop
 * @property-read string                                           $channel_id
 * @property-read string|null                                      $description
 * @property-read string|null                                      $parents_guide
 * @property-read string|null                                      $sub_title
 * @property-read string                                           $title
 * @property-read string|null                                      $year
 * @property-read string[]|null                                    $categories
 * @property-read string[]|null                                    $countries
 * @property-read string[]|null                                    $icons
 * @property-read string[]|null                                    $productions
 *
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Entities
 */
final class ProgramEntity {
	/**
	 * @var string[]|null
	 */
	private ?array $categories;

	/**
	 * @var string
	 */
	private string $channel_id;

	/**
	 * @var string[]|null
	 */
	private ?array $countries;

	/**
	 * @var \EPGService\Entities\Program\CreditEntity[]|null
	 */
	private ?array $credits;

	/**
	 * @var \DateTime
	 */
	private DateTime $date;

	/**
	 * @var string|null
	 */
	private ?string $description;

	/**
	 * @var string[]|null
	 */
	private ?array $icons;

	/**
	 * @var string|null
	 */
	private ?string $parents_guide;

	/**
	 * @var string[]|null
	 */
	private ?array $productions;

	/**
	 * @var \DateTime
	 */
	private DateTime $start;

	/**
	 * @var \DateTime
	 */
	private DateTime $stop;

	/**
	 * @var string|null
	 */
	private ?string $sub_title;

	/**
	 * @var string
	 */
	private string $title;

	/**
	 * @var string|null
	 */
	private ?string $year;

	/**
	 * @param array $payload
	 */
	private function __construct(array $payload) {
		$this->categories = $payload['categories'] ?? null;
		$this->channel_id = $payload['channel_id'];
		$this->countries = $payload['countries'] ?? null;
		$this->credits = $payload['credits'] ?? null;
		$this->date = $payload['date'];
		$this->description = $payload['description'] ?? null;
		$this->icons = $payload['icons'] ?? null;
		$this->parents_guide = $payload['parents_guide'] ?? null;
		$this->productions = $payload['productions'] ?? null;
		$this->start = $payload['start'];
		$this->stop = $payload['stop'];
		$this->sub_title = $payload['sub_title'] ?? null;
		$this->title = $payload['title'];
		$this->year = $payload['year'] ?? null;
	}

	/**
	 * @param array $payload
	 *
	 * @return \EPGService\Entities\ProgramEntity
	 *
	 * @throws \RuntimeException
	 */
	public static function create(array $payload): ProgramEntity {
		if (isset($payload['categories']) && !is_array($payload['categories'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['channel_id'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['countries']) && !is_array($payload['countries'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['credits']) && !is_array($payload['credits'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!$payload['date'] instanceof DateTime) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['description']) && !is_string($payload['description'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['icons']) && !is_array($payload['icons'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['parents_guide']) && !is_string($payload['parents_guide'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['productions']) && !is_array($payload['productions'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!$payload['start'] instanceof DateTime) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!$payload['stop'] instanceof DateTime) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['sub_title']) && !is_string($payload['sub_title'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['title'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (isset($payload['year']) && !is_string($payload['year'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		return new ProgramEntity($payload);
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
