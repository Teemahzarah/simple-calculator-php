# Simple Calculator PHP
Simple calculator in PHP

## Get Start
All instruction below was executed at Linux OS. Remember that you need to have [git](https://git-scm.com/downloads), [docker](https://docs.docker.com/install/#supported-platforms) and [docker-compose](https://docs.docker.com/compose/install/) installed.

### Up Environment
```bash
# Execute the steps below:
mkdir -p "${HOME}/workspace"
cd "${HOME}/workspace"
# if it doesn't work! Go to git repository and use the HTTP version
git clone git@github.com:helionogueir/simple-calculator-php.git
docker-compose up
```

### Reset Environment
Case you'll need reset the environment, follow the steps below.
```bash
# Execute the steps below:
cd "${HOME}/workspace/simple-calculator-php"
sudo rm -rf vendor/ composer.lock && docker-compose down --rmi all && docker-compose build && docker-compose up
```

### Run Unit Tests
When you'll need to run the unit tests, follow the steps below.
```bash
docker exec -it SimpleCaculatorApp /bin/sh ./bin/test
```

### Delete Database Data
WARNING! The commands below clean all volumes.
```bash
docker-compose down --volumes
```
