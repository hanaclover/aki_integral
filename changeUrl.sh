#!/bin/sh
find . -type f | xargs sed -i 's/http:\/\/localhost\/aki_farm\/aki_farm/http:\/\/aki-farm.main.jp/g'
find . -type f | xargs sed -i 's/http:\/\/localhost\/aki_farm/http:\/\/aki-farm.main.jp/g'
sed -i 's/require_once ".\/class\/init.php";/require_once ".\/class\/config.php";/g' class/PDODatabase.class.php
