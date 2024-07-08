<?php

declare(strict_types=1);

use Alight\Job;

Job::call([\Alight\Cache::class, 'prune'])->daily();
