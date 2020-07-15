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

use EPGService\Repositories\CategoryRepository;
use PHPUnit\Framework\TestCase;
use Tests\Utilities\GetServiceEnvironment;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   Tests\Repositories
 */
final class CategoryRepositoryTest extends TestCase {
	/**
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function testGetAction(): void {
		$env = GetServiceEnvironment::get();

		foreach (CategoryRepository::create($env)->get() as $category) {
			/** @var \EPGService\Entities\CategoryEntity $category */

			self::assertIsInt($category->id);
			self::assertIsString($category->lang);
			self::assertIsString($category->name);
			self::assertIsString($category->version);
		}
	}
}
