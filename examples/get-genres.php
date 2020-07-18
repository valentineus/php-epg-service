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

use EPGService\Environments\ServiceEnvironment;
use EPGService\Presenter\ServicePresenter;
use EPGService\Repositories\GenreRepository;

$key = getenv('EPG_SERVICE_KEY');
$environment = ServiceEnvironment::create($key);

# Using presenter
$presenter = ServicePresenter::create($environment);
$genres = $presenter->getGenres();

# Or using repository
$repository = GenreRepository::create($environment);
$genres = $repository->get();
