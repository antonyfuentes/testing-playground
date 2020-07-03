FROM atfuentess/qa-automation:db_automation
COPY data/dump_windows.sql /docker-entrypoint-initdb.d