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

namespace Tests\Entities\Program;

use EPGService\Entities\Program\CreditEntity;
use Faker\Factory as Faker;
use PHPUnit\Framework\TestCase;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   Tests\Entities\Program
 */
final class CreditEntityTest extends TestCase {
	public function testCreateEntity(): void {
		$faker = Faker::create();

		$name = $faker->unique()->sha256;
		$type = $faker->unique()->sha256;

		$entity = CreditEntity::create(compact('name', 'type'));

		self::assertEquals($name, $entity->name);
		self::assertEquals($type, $entity->type);
	}
}
