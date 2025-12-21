#!/bin/bash

set -euo pipefail

cd php

composer require firebase/php-jwt
composer require phpmailer/phpmailer
