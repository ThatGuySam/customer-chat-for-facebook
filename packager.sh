#!/bin/bash
# Based on https://github.com/CodeAtCode/freemius-suite/blob/master/package.sh


# Start timer
START_TIME=$SECONDS

# Go up a directory
cd ..

# Duplicate or Sync files to packaged folder
echo "-Cloning files..."
rsync -arv --exclude={'vendor','node_modules','tests','.git'} customer-chat-for-facebook/ customer-chat-for-facebook-packaged

# Go in to packaged folder
cd customer-chat-for-facebook-packaged

echo "-Cleaning in Progress..."
rm -rf .env
rm -rf .env.example
rm -rf ./.git*
rm -rf ./.sass-cache
rm -rf ./.directory
rm -rf ./node_modules
rm -rf ./nbproject
rm -rf ./composer/
rm -rf ./wp-config-test.php
rm -rf ./*.yml
rm -rf ./*.neon
rm -rf ./*.ini
rm -rf ./.*.cache
rm -rf ./.gitignore
rm -rf ./psalm.xml
rm -rf ./codeat.xml
rm -rf ./package.json
rm -rf ./package-lock.json
rm -rf ./Gruntfile.js
rm -rf ./gulpfile.js
# rm -rf ./composer.lock
rm -rf ./.netbeans*
rm -rf ./.travis*
rm -rf ./.php_cs
rm -rf ./.padawan*
rm -rf ./assets
rm -rf ./admin/assets/sass
rm -rf ./admin/assets/coffee
rm -rf ./public/assets/sass
rm -rf ./public/assets/coffee
rm -rf ./*.zip
# This contains the test stuff
rm -rf ./vendor
rm -rf ./tests

if [ -s './composer.json' ]; then
    # Detect if there are composer dependencies
    dep=$(cat "./composer.json" | jq 'has(".require")')
	# echo $dep
	echo "-Downloading clean composer dependencies..."
	composer update --no-dev &> /dev/null
    # if [ "$dep" == 'true' ]; then
    #     echo "-Downloading clean composer dependencies..."
    #     composer update --no-dev &> /dev/null
    # else
    #     rm -rf ./composer.json
    # fi
fi

# Finish up

ELAPSED_TIME=$(($SECONDS - $START_TIME))
echo "--Done in $(($ELAPSED_TIME))s."
