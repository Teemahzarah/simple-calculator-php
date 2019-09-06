# OS
FROM mariadb:10.4-bionic

# Owner
LABEL key="Helio Nogueira <helio.nogueir@gmail.com>"

# Command
CMD ["--default-authentication-plugin=mysql_native_password", \
  "--character-set-server=utf8", \
  "--collation-server=utf8_unicode_ci", \
  "--connect-timeout=60", \
  "--max-connections=11000", \
  "--max-allowed-packet=32M", \
  "--thread-cache-size=300", \
  "--sort-buffer-size=4M", \
  "--bulk-insert-buffer-size=16M", \
  "--tmp-table-size=256M", \
  "--max-heap-table-size=2048M", \
  "--query-cache-limit=4M", \
  "--query-cache-size=64M", \
  "--query-cache-type=0", \
  "--long-query-time=10", \
  "--expire-logs-days=10", \
  "--max-binlog-size=100M", \
  "--innodb-buffer-pool-size=256M", \
  "--innodb-log-buffer-size=32M", \
  "--innodb-file-per-table=1", \
  "--innodb-open-files=400", \
  "--innodb-io-capacity=400", \
  "--innodb-flush-method=O_DIRECT", \
  "--sql-mode=STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" \
  ]