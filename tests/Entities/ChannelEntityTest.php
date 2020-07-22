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

use EPGService\Entities\ChannelEntity;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   Tests\Entities
 */
final class ChannelEntityTest extends TestCase {
	public function testCreateEntity(): void {
		$faker = Factory::create();

		$base_id = $faker->unique()->sha256;
		$base_name = $faker->unique()->sha256;
		$epg_id = $faker->unique()->sha256;
		$geo_data = $faker->unique()->sha256;
		$href = $faker->unique()->sha256;
		$icon = $faker->unique()->sha256;
		$id = $faker->unique()->sha256;
		$lang = $faker->unique()->sha256;
		$name = $faker->unique()->sha256;
		$update_at = $faker->unique()->dateTime;
		$week = $faker->unique()->sha256;

		$entity = ChannelEntity::create(compact(
			'base_id',
			'base_name',
			'epg_id',
			'geo_data',
			'href',
			'icon',
			'id',
			'lang',
			'name',
			'update_at',
			'week',
		));

		self::assertEquals($base_id, $entity->base_id);
		self::assertEquals($base_name, $entity->base_name);
		self::assertEquals($epg_id, $entity->epg_id);
		self::assertEquals($geo_data, $entity->geo_data);
		self::assertEquals($href, $entity->href);
		self::assertEquals($icon, $entity->icon);
		self::assertEquals($id, $entity->id);
		self::assertEquals($lang, $entity->lang);
		self::assertEquals($name, $entity->name);
		self::assertEquals($update_at, $entity->update_at);
		self::assertEquals($week, $entity->week);
	}
}
