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

namespace Tests\Environments;

use EPGService\Environments\ServiceEnvironment;
use Faker\Factory as Faker;
use PHPUnit\Framework\TestCase;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   Tests\Environments
 */
final class ServiceEnvironmentTest extends TestCase {
	public function testGetUrlWithMethod(): void {
		$key = Faker::create()->sha256;
		$method = Faker::create()->sha256;
		$url = ServiceEnvironment::create($key)->getUrl($method);
		self::assertStringContainsString($key, $url);
		self::assertStringContainsString($method, $url);
	}

	public function testGetUrlWithoutMethod(): void {
		$key = Faker::create()->sha256;
		$url = ServiceEnvironment::create($key)->getUrl();
		self::assertStringContainsString($key, $url);
	}
}
