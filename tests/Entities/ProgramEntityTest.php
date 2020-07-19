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

namespace Tests\Entities;

use EPGService\Entities\ProgramEntity;
use Faker\Factory as Faker;
use PHPUnit\Framework\TestCase;
use Tests\Utilities\GetCreditEntityUtility;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   Tests\Entities
 */
final class ProgramEntityTest extends TestCase {
	public function testCreateEntity(): void {
		$faker = Faker::create();

		$categories = [$faker->unique()->sha256];
		$channel_id = $faker->unique()->sha256;
		$countries = [$faker->unique()->sha256];
		$credits = [GetCreditEntityUtility::get()];
		$date = $faker->unique()->dateTime;
		$description = $faker->unique()->sha256;
		$icons = [$faker->unique()->sha256];
		$parents_guide = $faker->unique()->sha256;
		$productions = [$faker->unique()->sha256];
		$start = $faker->unique()->dateTime;
		$stop = $faker->unique()->dateTime;
		$sub_title = $faker->unique()->sha256;
		$title = $faker->unique()->sha256;
		$year = $faker->unique()->sha256;

		$entity = ProgramEntity::create(compact(
			'categories',
			'channel_id',
			'countries',
			'credits',
			'date',
			'description',
			'icons',
			'parents_guide',
			'productions',
			'start',
			'stop',
			'sub_title',
			'title',
			'year'
		));

		self::assertEquals($categories, $entity->categories);
		self::assertEquals($channel_id, $entity->channel_id);
		self::assertEquals($countries[0], $entity->countries[0]);
		self::assertEquals($credits[0]->name, $entity->credits[0]->name);
		self::assertEquals($date->getTimestamp(), $entity->date->getTimestamp());
		self::assertEquals($description, $entity->description);
		self::assertEquals($icons[0], $entity->icons[0]);
		self::assertEquals($parents_guide, $entity->parents_guide);
		self::assertEquals($productions[0], $entity->productions[0]);
		self::assertEquals($start->getTimestamp(), $entity->start->getTimestamp());
		self::assertEquals($stop->getTimestamp(), $entity->stop->getTimestamp());
		self::assertEquals($sub_title, $entity->sub_title);
		self::assertEquals($title, $entity->title);
		self::assertEquals($year, $entity->year);
	}
}
