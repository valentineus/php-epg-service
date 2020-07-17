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
 * @property-read string $base_id
 * @property-read string $base_name
 * @property-read string $epg_id
 * @property-read string $geo_data
 * @property-read string $href
 * @property-read string $icon
 * @property-read string $id
 * @property-read string $lang
 * @property-read string $name
 * @property-read string $update_at
 * @property-read string $week
 *
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Entities
 */
final class ChannelEntity {
	/**
	 * @var string
	 */
	private string $base_id;

	/**
	 * @var string
	 */
	private string $base_name;

	/**
	 * @var string
	 */
	private string $epg_id;

	/**
	 * @var string
	 */
	private string $geo_data;

	/**
	 * @var string
	 */
	private string $href;

	/**
	 * @var string
	 */
	private string $icon;

	/**
	 * @var string
	 */
	private string $id;

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
	private string $update_at;

	/**
	 * @var string
	 */
	private string $week;

	/**
	 * @param array $payload
	 */
	private function __construct(array $payload) {
		$this->base_id = $payload['base_id'];
		$this->base_name = $payload['base_name'];
		$this->epg_id = $payload['epg_id'];
		$this->geo_data = $payload['geo_data'];
		$this->href = $payload['href'];
		$this->icon = $payload['icon'];
		$this->id = $payload['id'];
		$this->lang = $payload['lang'];
		$this->name = $payload['name'];
		$this->update_at = $payload['update_at'];
		$this->week = $payload['week'];
	}

	/**
	 * @param array $payload
	 *
	 * @return \EPGService\Entities\ChannelEntity
	 *
	 * @throws \RuntimeException
	 */
	public static function create(array $payload): ChannelEntity {
		if (!is_string($payload['base_id'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['base_name'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['epg_id'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['geo_data'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['href'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['icon'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['id'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['lang'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['name'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['update_at'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		if (!is_string($payload['week'])) {
			throw new RuntimeException('blah-blah-blah');
		}

		return new ChannelEntity($payload);
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
