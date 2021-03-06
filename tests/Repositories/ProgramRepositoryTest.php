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

use EPGService\Repositories\ChannelRepository;
use EPGService\Repositories\ProgramRepository;
use PHPUnit\Framework\TestCase;
use Tests\Utilities\GetServiceEnvironment;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   Tests\Repositories
 */
final class ProgramRepositoryTest extends TestCase {
	/**
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function testGetAction(): void {
		$week = date('Y-m-d', strtotime('this week'));
		$env = GetServiceEnvironment::get();
		$channels = ChannelRepository::create($env)->get();
		$channel = array_shift($channels);

		foreach (ProgramRepository::create($env, $channel->id, $week)->get() as $program) {
			/** @var \EPGService\Entities\ProgramEntity $program */

			self::assertNotEmpty($program->channel_id);
			self::assertNotEmpty($program->start);
			self::assertNotEmpty($program->stop);
			self::assertNotEmpty($program->title);
		}
	}
}
