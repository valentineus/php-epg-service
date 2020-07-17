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
 * @property-read \EPGService\Entities\Program\CreditEntity[] $credits
 * @property-read \DateTime                                   $date
 * @property-read \DateTime                                   $start
 * @property-read \DateTime                                   $stop
 * @property-read string                                      $channel_id
 * @property-read string                                      $description
 * @property-read string                                      $parents_guide
 * @property-read string                                      $sub_title
 * @property-read string                                      $title
 * @property-read string                                      $year
 * @property-read string[]                                    $categories
 * @property-read string[]                                    $countries
 * @property-read string[]                                    $icons
 * @property-read string[]                                    $productions
 *
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Entities
 */
final class ProgramEntity {
	/**
	 * @var string[]
	 */
	private array $categories;

	/**
	 * @var string
	 */
	private string $channel_id;

	/**
	 * @var string[]
	 */
	private array $countries;

	/**
	 * @var \EPGService\Entities\Program\CreditEntity[]
	 */
	private array $credits;

	/**
	 * @var \DateTime
	 */
	private DateTime $date;

	/**
	 * @var string
	 */
	private string $description;

	/**
	 * @var string[]
	 */
	private array $icons;

	/**
	 * @var string
	 */
	private string $parents_guide;

	/**
	 * @var string[]
	 */
	private array $productions;

	/**
	 * @var \DateTime
	 */
	private DateTime $start;

	/**
	 * @var \DateTime
	 */
	private DateTime $stop;

	/**
	 * @var string
	 */
	private string $sub_title;

	/**
	 * @var string
	 */
	private string $title;

	/**
	 * @var string
	 */
	private string $year;

	/**
	 * @param array $payload
	 */
	private function __construct(array $payload) {
		$this->categories = $payload['categories'];
		$this->channel_id = $payload['channel_id'];
		$this->countries = $payload['countries'];
		$this->credits = $payload['credits'];
		$this->date = $payload['date'];
		$this->description = $payload['description'];
		$this->icons = $payload['icons'];
		$this->parents_guide = $payload['parents_guide'];
		$this->productions = $payload['productions'];
		$this->start = $payload['start'];
		$this->stop = $payload['stop'];
		$this->sub_title = $payload['sub_title'];
		$this->title = $payload['title'];
		$this->year = $payload['year'];
	}

	/**
	 * @param array $payload
	 *
	 * @return \EPGService\Entities\ProgramEntity
	 *
	 * @throws \RuntimeException
	 */
	public static function create(array $payload): ProgramEntity {
		if (!is_array($payload['categories'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['channel_id'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_array($payload['countries'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_array($payload['credits'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!$payload['date'] instanceof DateTime) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['description'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_array($payload['icons'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['parents_guide'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_array($payload['productions'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!$payload['start'] instanceof DateTime) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!$payload['stop'] instanceof DateTime) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['sub_title'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['title'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['year'])) {
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
