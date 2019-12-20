# PostgreSQL

## NOTES

```txt
Default settings:
          Address: localhost
            Login: postgres
  PostgreSQL pass: 1234
   Listening port: 5432
```

## LINKS

```txt
OFFICIAL DOCS

  PostgreSQL wiki | https://wiki.postgresql.org/wiki/Main_Page
```

## COMMAND LINE COMMANDS

### PostgreSQL session initialization

```txt
pqsl - starts the PostgeSQL session
```

### psql commands

```txt
help - shows all the possible navigation and information archecommands
\copyright - shows terms of usage
\h - shows SQL operator reference
\? - psql command reference
\g or ";" in the end of the line - query execution
\q - quit
\c <db name> - change current db to <db name>
```

## SPEC

```sql
CREATE DATABASE name; -- Creates db "name"
DROP DATABASE name; -- Deletes db "name"

INSERT INTO table_name (
  column_1,
  column_2)
VALUES (value_1, value_2)
```
