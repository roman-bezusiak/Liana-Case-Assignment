# SQL Cheatsheet

## References

```txt
Resources
  W3C SQL Quick Reference   | https://www.w3schools.com/sql/sql_quickref.asp
  W3C SQL Keyword Reference | https://www.w3schools.com/sql/sql_ref_keywords.asp
  W3C MySQL Functions       | https://www.w3schools.com/sql/sql_ref_mysql.asp
  W3C SQLServer Functions   | https://www.w3schools.com/sql/sql_ref_sqlserver.asp
  W3C MS Access Functions   | https://www.w3schools.com/sql/sql_ref_msaccess.asp
```

## Data types

| Data type | Description | Volume |
| --------- | ----------- | ------ |
| Varchar   | String      |        |
| Int       | Integer     |        |

## Operators

### General

| Category            | Options                                 |
| ------------------- | --------------------------------------- |
| Listing             | `,`                                     |
| Grouping            | `(` Statement `)`                       |
| Logic               | `AND`, `OR`, `NOT`                      |
| Numeric comparison  | `=`, `<>` or `!=`, `>`, `<`, `>=`, `<=` |
| Single line comment | `--` Comment                            |
| Multi line comment  | `/*` Comment `*/`                       |

### Pattern matching

|                           | Common    | MS Access   |
| ------------------------- | --------- | ----------- |
| **One symbol**            | `_`       | `?`         |
| **Any amount os symbols** | `%`       | `*`         |

### Wildcards

|                              | MS Access   | SQL Server   |
| ---------------------------- | ----------- | ------------ |
| **One char**                 | `?`         | `_`          |
| **Any amount of chars**      | `*`         | `%`          |
| **Any char in the list**     | `[ab]`      | `[ab]`       |
| **Any char not in the list** | `[!ab]`     | `[^ab]`      |
| **Range**                    | `[a-b]`     | `[a-b]`      |

### Literals

| Data type | Literals                      |
| --------- | ----------------------------- |
| Date      | `#00/00/0000# | '00-00-0000'` |
| Varchar   | `"varchar" | 'varchar'`       |

### Value matching

```sql
-- Range
SELECT *
FROM   tbl
WHERE  clmn NOT BETWEEN value_1 AND value_2;

-- Singular instances
SELECT *
FROM   tbl
WHERE  clmn NOT IN (value_1, value_2);

-- Singular clmns
SELECT *
FROM   tbl
WHERE  clmn NOT IN (tbl);

-- NULL assertion
SELECT *
FROM   tbl
WHERE  clmn IS NOT NULL;
```

### Output limitation

```sql
-- SQLServer & MS Access
SELECT TOP 0 PERCENT clmn
FROM       tbl
WHERE      condition;

-- MySQL
SELECT clmn
FROM   tbl
WHERE  condition
LIMIT  0

-- Oracle
SELECT          clmn
FROM            tbl
WHERE ROWNUM <= 0
```

### Aliases

```sql
SELECT clmn AS c FROM tbl;
SELECT clmn FROM tbl AS c;

SELECT clmn AS [Multiword alias] FROM tbl;
SELECT CONCAT(clmn, ', ', clmn) AS c FROM tbl;
```

## Statements

### SELECT

```sql
SELECT   spec clmn
FROM     tbl
WHERE    condition
GROUP BY clmn
ORDER BY ordr

-- `ordr: clmn ASC | clmn DESC`
```

### INSERT

```sql
INSERT INTO tbl (clmn, clmn) VALUES (clmn, clmn);
INSERT INTO tbl VALUES (clmn, clmn);
```

### UPDATE

```sql
UPDATE clmn SET assignment WHERE condition;

-- `assignment: clmn = value`
```

### DELETE

```sql
DELETE FROM tbl WHERE condition;
DELETE FROM tbl;
```

### JOIN

```sql
SELECT         DISTINCT clmn
FROM           tbl
join_type JOIN tbl
WHERE          condition

/*
  `join_type: INNER | LEFT | RIGHT | OUTER`

  WARNING: `RIGHT` and `OUTER` are not supported in SQLite
*/
```

## Functions

```sql
COUNT(spec clmn);
SUM(spec clmn);
AVG(clmn);
MIN(clmn);
MAX(clmn);
ABS(0);

/*
  Return the first non-NULL from main clmn,
  if failed, then from backup clmn
*/
COALESCE(main clmn, backup clmn)

/*
  index: int in [-n, -1] && [1, n]
*/
SUBSTR(clmn, index, 0 of chars);
```
