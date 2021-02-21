#!/bin/bash
COMPOSER_VERSION="2.0"

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

help() {
  echo -e "${YELLOW}COMMANDS:"
  echo -e "${GREEN}./sc.sh composer"
  echo -e "./sc.sh permissions"
  echo -e "${NC}"
}

if test "$1" = "composer"
then
  docker run --rm --interactive --tty --volume $PWD:/app --volume $COMPOSER_HOME:/tmp composer:$COMPOSER_VERSION ${@}
elif test "$1" = "app"
then
  docker-compose exec app bash
elif test "$1" = "permissions"
then
  mkdir -p ./www/temp/static
  mkdir -p ./cache
  mkdir -p ./cache/latte
  mkdir -p ./log

  chmod -R ugo+rw ./www/temp/static
  chmod -R ugo+w ./cache
  chmod -R ugo+w ./log
  echo -e "${GREEN}Permissions successfully updated${NC}"
else
  help
fi