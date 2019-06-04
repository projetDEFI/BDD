#!/bin/bash

echo "Building Image:"
docker build -t registry.gitlab.com/rbekker87/docker/php-es-search .

echo "Pushing to Gitlab Registry:"
docker push registry.gitlab.com/rbekker87/docker/php-es-search

echo "Creating Service:"
docker service create \
--name php-es-search \
--replicas 1 \
--network appnet \
--with-registry-auth registry.gitlab.com/rbekker87/docker/php-es-search


