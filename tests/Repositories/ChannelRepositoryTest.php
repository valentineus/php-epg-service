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

namespace Tests\Repositories;

use DateTime;
use EPGService\Repositories\ChannelRepository;
use PHPUnit\Framework\TestCase;
use Tests\Utilities\GetServiceEnvironment;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   Tests\Repositories
 */
final class ChannelRepositoryTest extends TestCase {

	/**
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function testGetAction(): void {
		$env = GetServiceEnvironment::get();

		foreach (ChannelRepository::create($env)->get() as $channel) {
			/** @var \EPGService\Entities\ChannelEntity $channel */

			self::assertIsString($channel->id);
			self::assertNotEmpty($channel->id);

			self::assertIsString($channel->base_id);
			self::assertIsString($channel->base_name);
			self::assertIsString($channel->epg_id);
			self::assertIsString($channel->geo_data);
			self::assertIsString($channel->href);
			self::assertIsString($channel->icon);
			self::assertIsString($channel->lang);
			self::assertIsString($channel->name);
			self::assertIsString($channel->week);
			self::isInstanceOf(DateTime::class, $channel->update_at);
		}
	}
}
