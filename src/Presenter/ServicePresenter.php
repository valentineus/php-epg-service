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

namespace EPGService\Presenter;

use EPGService\Environments\ServiceEnvironment;
use EPGService\Repositories\CategoryRepository;
use EPGService\Repositories\ChannelRepository;
use EPGService\Repositories\GenreRepository;
use EPGService\Repositories\ProgramRepository;

/**
 * @copyright Copyright © 2020 “Valentin Popov” <info@valentineus.link>
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 * @package   EPGService\Presenter
 */
final class ServicePresenter {
	/**
	 * @var \EPGService\Environments\ServiceEnvironment
	 */
	private ServiceEnvironment$environment;

	/**
	 * @param \EPGService\Environments\ServiceEnvironment $environment
	 */
	private function __construct(ServiceEnvironment $environment) {
		$this->environment = $environment;
	}

	/**
	 * @param \EPGService\Environments\ServiceEnvironment $environment
	 *
	 * @return \EPGService\Presenter\ServicePresenter
	 */
	public static function create(ServiceEnvironment $environment): ServicePresenter {
		return new ServicePresenter($environment);
	}

	/**
	 * @return \EPGService\Entities\CategoryEntity[]
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function getCategories(): array {
		return CategoryRepository::create($this->environment)->get();
	}

	/**
	 * @return \EPGService\Entities\ChannelEntity[]
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function getChannels(): array {
		return ChannelRepository::create($this->environment)->get();
	}

	/**
	 * @return \EPGService\Entities\GenreEntity[]
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function getGenres(): array {
		return GenreRepository::create($this->environment)->get();
	}

	/**
	 * @param string $channel_id
	 * @param string $week
	 *
	 * @return \EPGService\Entities\ProgramEntity[]
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \RuntimeException
	 * @throws \Exception
	 */
	public function getPrograms(string $channel_id, string $week): array {
		return ProgramRepository::create($this->environment, $channel_id, $week)->get();
	}
}
