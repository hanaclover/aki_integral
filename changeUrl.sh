#!/bin/sh
find . -type f | xargs sed -i 's/http:\/\/localhost\/aki_farm\/aki_farm/http:\/\/aki-farm.main.jp/g'
