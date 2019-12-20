# PHP

## NOTES

```txt
PHP is an acronym for "Hypertext Preprocessor".
```

## LINKS

```txt
OFFICIAL DOCS

  PHP Documentation      | https://www.php.net/manual/en/
  Wiwibooks guide to PHP | https://en.wikibooks.org/wiki/PHP_Programming

PARTICULAR CONCEPTS

  Operator precedence              | https://www.php.net/manual/en/language.operators.precedence.php
  Supported protocols and wrappers | https://www.php.net/manual/en/wrappers.php
  Type juggling                    | https://www.php.net/manual/en/language.types.type-juggling.php
  Strings                          | https://www.php.net/manual/en/language.types.string.php
  Constants                        | https://www.php.net/manual/en/language.constants.php
  Class constants                  | https://www.php.net/manual/en/language.oop5.constants.php
  Magic constants                  | https://www.php.net/manual/en/language.constants.predefined.php
  Predefined constants             | https://www.php.net/manual/en/reserved.constants.php
  Persistent connections           | https://www.php.net/manual/en/features.persistent-connections.php
  Constructors and Destructors     | https://www.php.net/manual/en/language.oop5.decon.php
  Exceptions                       | https://www.php.net/manual/en/language.exceptions.php

  php.ini directives               | https://www.php.net/manual/en/ini.core.php
  Zend Engine                      | https://en.wikipedia.org/wiki/Zend_Engine
```

## SPEC

```txt
PHP keywords are not case sensitive, but variable are.
All PHP constants are global.
```

### SYNTAX

```php
# OPERATORS

  # ARITHMETIC

    $x + $y;
    $x - $y;
    $x / $y;
    $x * $y;
    $x % $y;  // Modulus
    $x ** $y; // Exponentiation

  # ASSIGNMENT

    $x = $y;
    $x += $y;
    $x -= $y;
    $x *= $y;
    $x /= $y;
    $x %= $y;

  # COMPARISON

    $x == $y; // Returns true if $x is equal to $y
    $x === $y; // Returns true if $x is equal to $y, and they are of the same type
    $x != $y;
    $x <> $y; // Same as previous
    $x !== $y; // Returns true if $x is not equal to $y, or they are not of the same type
    $x > $y;
    $x < $y
    $x >= $y;
    $x <= $y;

    /*
      PHP 7.0+: Returns an integer less than, equal to, or greater than zero,
      depending on if $x is less than, equal to, or greater than $y
      respectively
    */
    $x <=> $y;

  # INCREMENT / DECREMENT

    ++$x; // Increments $x by one, then returns $x
    $x++; // Returns $x, then increments $x by one
    --$x; // Decrements $x by one, then returns $x
    $x--; // Returns $x, then decrements $x by one

  # LOGICAL

    $x and $y;
    $x or $y;
    $x xor $y;
    $x && $y;
    $x || $y;
    !$x;

  # STRING

    $str . $str // Concatenation
    $str .= $str // Concatenation assignment

  # ARRAY

    $x + $y; // Union of $x and $y
    $x == $y; // Returns true if $x and $y have the same key/value pairs
    $x === $y; // Returns true if $x and $y have the same key/value pairs in the same order and of the same types
    $x != $y;
    $x <> $y; // Same as previous
    $x !== $y;

    $key => $value // Key/value pair declaration is an associative array

  # CONDITIONAL

    $x = exrp_1 ? exrp_2 : exrp_3;
    $x = expr1 ?? expr2; // PHP 7.0+: The value of $x is `expr1` if `expr1` exists, and is not NULL. If `expr1` does not exist, or is NULL, the value of $x is `expr2`

# TYPE CASTING

  $var = (int) 11.11; // 11
  $var = (int) "11.11"; // 11

# LITERALS

  $str = "string";
  $str = 'string';

# STATEMENTS

  if ($cond_1) {
    // Code block
  } elseif ($cond_2) {
    // Code block
  } else {
    // Code block
  }

  switch ($value) {
    case $value_to_compare_to:
      // Code block
      break; // Optional
    default:
      // Code block
  }

# LOOPS

  while (cond) {}
  do {} while (cond);
  for ($x = $init_val; $x < $end_val; $x++) {}
  foreach ($arr as $val) {}
  foreach($ass_arr as $key => $val) {}

# FUNCTIONS

function untyped ($x) {
  return $x;
}

function typed (int $x) : int {
  return $x;
}

# FILE INCLUSION

  require # On failure produces 'E_COMPILE_ERROR' and stops the script
  include # On failure produces 'E_WARNING' and the script continues

# ACCESS MODIFIERS

global $var, $var; // Accessing global variable(s)
static $var, $var; // Creating a static local variable(s)

# EXCEPTIONS

  try {
    // Code block
  } catch (Exception $e) {
    // Code block
  } finally {
    // Code block
  }

# DATA

  # OBJECTS

    // Declaration
    class Obj {
      const A = 1;
      $name;

      // Constructor declaration
      function __construct($name) {
        $this->name = $name;
      }

      function setName($name) {
        $this->name = $name;
      }
    }

    $obj = new Obj("Matti"); // Object initialization
    $obj->setName("Seppo"); // Accessing object functions
    $obj->name; // Accessing object fields
    $obj::A; // Accessing object constants

  # ARRAYS

    $arr = array($item_1, $item_2); // Declaration
    $arr[2] = $item_3; // Element addition
```

### BUILT IN CAPABILITIES

#### PREDEFINED CONSTANTS

```php
PHP_FLOAT_MAX; // 1.7976931348623E+308
PHP_INT_MAX; // int(-2147483648) (32 bit), int(-9223372036854775808) (64 bit)
PHP_INT_MIN; // PHP7.0+: PHP_INT_MIN === ~PHP_INT_MAX
PHP_EOL; // PHP5.0.2+: The correct 'End Of Line' symbol for this platform
```

#### SUPERGLOBALS

```php
# SUPERGLOBALS

  # LISTS

    $GLOBALS; // Associatile array of all global variables
    $_SERVER; // Associatile array of information about headers, paths, and script locations
    $_REQUEST; // Associable array of all request parameters to the current srcipt
    $_POST; // Associative array of all form parameters of a POST request
    $_GET; // Associative array of all form parameters of a GET request
    $_FILES; //
    $_ENV;
    $_COOKIE;
    $_SESSION;

  # ELEMENTS

    # _SERVER

      $_SERVER['SCRIPT_URI']; // Returns the URI of the current page
      $_SERVER['PHP_SELF']; // Returns the filename of the currently executing script
      $_SERVER['SCRIPT_NAME']; // Returns the path of the current script
      $_SERVER['SCRIPT_FILENAME']; // Returns the absolute pathname of the currently executing script
      $_SERVER['PATH_TRANSLATED']; // Returns the file system based path to the current script

      $_SERVER['GATEWAY_INTERFACE']; // Returns the version of the Common Gateway Interface (CGI) the server is using
      $_SERVER['SERVER_ADDR']; // Returns the IP address of the host server
      $_SERVER['SERVER_NAME']; // Returns the name of the host server (such as www.w3schools.com)
      $_SERVER['SERVER_SOFTWARE']; // Returns the server identification string (such as Apache/2.2.24)
      $_SERVER['SERVER_PROTOCOL']; // Returns the name and revision of the information protocol (such as HTTP/1.1)
      $_SERVER['SERVER_ADMIN'] // Returns the value given to the SERVER_ADMIN directive in the web server configuration file (if your script runs on a virtual host, it will be the value defined for that virtual host) (such as someone@w3schools.com)
      $_SERVER['SERVER_PORT']; // Returns the port on the server machine being used by the web server for communication (such as 80)
      $_SERVER['SERVER_SIGNATURE']; // Returns the server version and virtual host name which are added to server-generated pages

      $_SERVER['REQUEST_METHOD']; // Returns the request method used to access the page (such as POST)
      $_SERVER['REQUEST_TIME']; // Returns the timestamp of the start of the request (such as 1377687496)
      $_SERVER['QUERY_STRING']; // Returns the query string if the page is accessed via a query string
      $_SERVER['HTTP_ACCEPT']; // Returns the Accept header from the current request
      $_SERVER['HTTP_ACCEPT_CHARSET']; // Returns the Accept_Charset header from the current request (such as utf-8, ISO-8859-1)
      $_SERVER['HTTP_HOST']; // Returns the Host header from the current request
      $_SERVER['HTTP_REFERER']; // Returns the complete URL of the current page (not reliable because not all user-agents support it)
      $_SERVER['HTTPS']; // Is the script queried through a secure HTTP protocol

      $_SERVER['REMOTE_ADDR']; // Returns the IP address from where the user is viewing the current page
      $_SERVER['REMOTE_HOST']; // Returns the Host name from where the user is viewing the current page
      $_SERVER['REMOTE_PORT']; // Returns the port being used on the user's machine to communicate with the web server
```

#### FUNCTIONS

##### DATABASES

###### PostgreSQL

```php
/*
  Opens a persisent connection to a PostgreSQL database.

  If a second call is made to 'pg_pconnect()' with the same
  '$connection_string' as an existing connection, the
  existing connection will be returned unless you pass
  'PGSQL_CONNECT_FORCE_NEW' as connect_type.

  WARNING:
    Usage should be present only, when called

  'php.ini' directives:
    pgsql.allow_persistent : boolean
      Whether to allow persistent Postgres connections.
      Default: "On"

    pgsql.max_persistent : integer
      The maximum number of persistent Postgres connections per
      process.
      Default: -1 (no limit)

    pgsql.max_links integer
      The maximum number of Postgres connections per process,
      including persistent connections.

  '$connection_string' structure: "key=value key=value ..."
    String entered empty (""), if default parameters are desired
    Empty value passage: "key=''"
    Necessary escapings: "\'", "\\"
    Recognized keys:
      host
      hostaddr
      port
      dbname
      user
      password
      connect_timeout
      options
      tty (ignored)
      sslmode (previously "requiressl")
      service

  '$connect_type' value list:
    PGSQL_CONNECT_FORCE_NEW
      Will make a new connection, even if the '$connection_string'
      is identical to another connection, instead of passing
      already existing one

  Returns:
    Success: PostgreSQL connection resource
    Failure: FALSE
*/
pg_pconnect(
  string $connection_string,
  int $connect_type // Optional
) : resource;

/*
  Same as 'pg_pconnect()', but opens non-persistent connection and
  '$connect_type' has bigger value list.

  '$connect_type' value list:
    PGSQL_CONNECT_FORCE_NEW

    PGSQL_CONNECT_ASYNC
      PHP5.6+: The connection is established asynchronously. The
      state of the connection can then be checked via
      'pg_connect_poll()' or 'pg_connection_status()'.

  Returns:
    Success: PostgreSQL connection resource
    Failure: FALSE
*/
pg_connect(
  string $connection_string,
  int $connect_type // Optional
) : resource;

/*
  Submits a command to the server and waits for the result, with
  the ability to pass parameters separately from the SQL command text.

  Returns:
    Success: query result resource
    Failure: FALSE
*/
pg_query_params(
  /*
    Optional, default is the last '$connection' made with
    'pg_connect()' or 'pg_pconnect()'
  */
  resource $connection,
  /*
    Multiple statements separated by semi-colons are not allowed.
    If any parameters are used, they are referred to as $1, $2, etc.

    Semicolon in the end should not be included
  */
  string $query,
  array $params
) : resource;

/*
  Same as 'pg_query_params()', but unsafe and takes a query string
  directly.

  Previously 'pg_exec()'.

  Returns:
    Success: query result resource
    Failure: FALSE
*/
pg_query(
  /*
    Optional, default is the last '$connection' made with
    'pg_connect()' or 'pg_pconnect()'
  */
  resource $connection,
  string $query
) : resource;

/*
  Closes the non-persistent '$connection' to a PostgreSQL database
  associated with the given '$connection' resource.

  Returns:
    Success: TRUE
    Failure: FALSE
*/
pg_close(
  /*
    Optional, default is the last '$connection' made with
    'pg_connect()' or 'pg_pconnect()'
  */
  resource $connection
) : bool;

/*
  Returns the host name of the given PostgreSQL '$connection'
  resource is connected to.

  Returns:
    Success: string
    Error: FALSE
*/
pg_host(
  /*
    Optional, default is the last '$connection' made with
    'pg_connect()' or 'pg_pconnect()'
  */
  resource $connection
) : string;

/*
  Returns the port number that the given PostgreSQL '$connection'
  resource is connected to.

  Returns:
    Success: int
    Error: FALSE
*/
pg_port(
  /*
    Optional, default is the last '$connection' made with
    'pg_connect()' or 'pg_pconnect()'
  */
  resource $connection
) : int;

/*
  Returns a string containing the options specified on the given
  PostgreSQL '$connection' resource.

  Returns:
    Success: string
    Error: FALSE
*/
pg_options(
  /*
    Optional, default is the last '$connection' made with
    'pg_connect()' or 'pg_pconnect()'
  */
  resource $connection
) : string;

/*
  Returns the name of the database that the given PostgreSQL
  '$connection' resource.

  Returns:
    Success: string
    Error: FALSE
*/
pg_dbname(
  resource $connection
) : string;

/*
  Escapes string for bytea datatype. It returns escaped string.

  Returns:
    Success: string
    Error: ERROR
*/
pg_escape_bytea(
  /*
    Optional, default is the last '$connection' made with
    'pg_connect()' or 'pg_pconnect()'
  */
  resource $connection,
  string $data
) : string;
```

##### FILES

```php
/*
  Gathers the statistics of the file named by filename. If '$filename'
  is a symbolic link, statistics are from the file itself, not the
  symlink.

  Returns:
    Success:
      Array:
        Values:
          0  | dev     | device number
          1  | ino     | inode number *
          2  | mode    | inode protection mode
            Octal values:
              0120000 | link
              0100000 | regular file
              0060000 | block device
              0040000 | directory
              0010000 | fifo
          3  | nlink   | number of links
          4  | uid     | userid of owner *
          5  | gid     | groupid of owner *
          6  | rdev    | device type, if inode device
          7  | size    | size in bytes
          8  | atime   | time of last access (Unix timestamp)
          9  | mtime   | time of last modification (Unix timestamp)
          10 | ctime   | time of last inode change (Unix timestamp)
          11 | blksize | blocksize of filesystem IO **
          12 | block   | number of 512-byte blocks allocated **

        Legend:
          *  - On Windows this will always be 0
          ** - Only valid on systems supporting the st_blksize type -
               other systems (e.g. Windows) return -1
    Failure: emits 'E_WARNING'
*/
stat(string $filename) : array;

/*
  Gathers the statistics of the file or symbolic link named by
  '$filename', not the file it points to.

  Returns:
    Same as 'stat()'
*/
lstat(string $filename) : array;

/*
  Same as 'stat()', but operates on file pointer '$handle'.

  Returns:
    Same as 'stat()'
*/
fstat(resource $handle) : array;

/*
  Attempts to change the mode of the specified file to that
  given in '$mode'.

  Returns:
    Success: TRUE
    Failure: FALSE
*/
chmod(
  string $filename,
  int $mode
) : bool;

/*
  Clears file status cache.

  Functions whose cache is affected:
    stat()
    lstat()
    file_exists()
    is_writable()
    is_readable()
    is_executable()
    is_file()
    is_dir()
    is_link()
    filectime()
    fileatime()
    filemtime()
    fileinode()
    filegroup()
    fileowner()
    filesize()
    filetype()
    fileperms()
*/
clearstatcache(
  bool $clear_realpath_cache = FALSE, // Optional
  string $filename // Optional, specified only if '$clear_realpath_cache' is TRUE
) : void;

/*
  Checks whether a file or directory exists.

  WARNING: Max reliably readable filesize: 2GB (uses 'sint32')

  Returns:
    Success: TRUE
    Failure: FALSE
    Access not allowed: FALSE
*/
file_exists(string $filename) : bool;

/*
  Reads a file and writes it to the output buffer

  Returns:
    Success: Number of bytes read
    Failure: FALSE
      Onfailure: 'E_WARNING'
*/
readfile(
  string $filename, // Filename being read
  bool $use_include_path = FALSE, // Flag for search in `include_path`
  resource $context // A context stream resource
) : int

/*
  Binds a named resource, specified by filename, to a stream.

  '$mode':
    Value list:
      PHP1.0+:
        'r'  - OR  B
        'r+' - ORW B
        'w'  - OW  B !E=>TC T
        'w+' - ORW B !E=>TC T
        'a'  - OW  E !E=>TC WA (fseek() has no effect)
        'a+' - ORW E !E=>TC WA (fseek() only affects the reading position)

        'x'  - COW  B  E=>(fopen() fails)
                      !E=>TC (Equivalent to specifying O_EXCL|O_CREAT
                              flags for the underlying open(2) system call)
        'x+' - CORW B  E=>(fopen() fails)
                      !E=>TC (Equivalent to specifying O_EXCL|O_CREAT
                              flags for the underlying open(2) system call)

      PHP5.2+:
        'c'  - OW  B !E=>TC
        'c+' - ORW B !E=>TC

      PHP7+:
        'e' - Set close-on-exec flag on the opened file descriptor.
              Only available in PHP compiled on POSIX.1-2008 conform systems.

    Legend:
      !E - file doesn't exist
      E  - file exists

      O  - open
      C  - create
      TC - try to create

      T - truncate to zero length

      R  - read
      W  - write

      B - pointer at the beginning of the file
      E - pointer at the end of the file

      WA - writes are appended

  Returns:
    Success: File pointer resource
    Failure: FALSE
      Onfailure: 'E_WARNING'
*/
fopen(
  string $filename,
  string $mode,
  bool $use_include_path = FALSE, // Optional
  resource $context // Optional
) : resource

/*
  The file pointed to by handle is closed.

  Returns:
    Success: TRUE
    Failure: FALSE
*/
fclose()

/*
  Portable advisory file locking.

  PHP5.3.2+:
    The automatic unlocking when the file's resource
    handle is closed was removed. Unlocking now always
    has to be done manually.

  Returns:
    Success: TRUE
    Failure: FALSE
*/
flock(
  resource $handle,
  int $operation,
  int &$wouldblock // PHP5.5.22+: Works on Windows
) : bool;

/*
  Reads the filesize of a file in bytes.

  WARNING: Max reliably readable filesize: 2GB (uses 'sint32')

  Returns:
    Success: number of bytes
    Failure: FALSE
      Onfailure: 'E_WARNING'
*/
filesize(string $filename) : int;

/*
  Gets a line from file pointer.

  Returns:
    Success: String of up to '$length - 1' bytes read from the file pointed to by '$handle'
    Failure: FALSE
    Error: FALSE
*/
fgets(
  resource $handle,
  int $length // Optional
) : string;

/*
  fread() reads up to '$length' bytes from the file pointer referenced by '$handle'.

  Reading stop conditions:
    1. '$length' bytes have been read
    2. EOF (end of file) is reached
    3. A packet becomes available or the socket timeout occurs (for network streams)
    4. If the stream is read buffered and it does not represent a plain file, at
        most one read of up to a number of bytes equal to the chunk size (usually
        8192) is made; depending on the previously buffered data, the size of the
        returned data may be larger than the chunk size.

  Returns:
    Success: String of read bytes
    Failure: FALSE
      Onfailure: 'E_WARNING'
*/
fread(resource $handle, int $length) : string

/*
  Takes the filepointer, '$handle', and truncates the file to length, '$size'.

  Returns:
    Success: TRUE
    Failure: FALSE
*/
ftruncate(
  resource $handle,
  
  /*
    If size is bigger than filesize, empty space is filled with NULL
    bytes
  */
  int $size
);
```

##### EXECUTION

```php
/*
  Terminates the execution of the script with the '$status' string output
  before termination
*/
exit (string $status) : void;

/*
  Terminates the execution of the script with the '$status' int output
  before termination

  '$status' range: [0, 254]
    WARNING: exit status code '255' is reserved by PHP

  Normal script termination:
    exit;
    exit();
    exit(0);
*/
exit(int $status) : void;

die(); // Same as 'exit()'

/*
  Registers a callback to be executed after script execution finishes
  or exit() is called.

  Onfailure: level 'E_WARNING'
*/
register_shutdown_function(
  callable $callback,
  mixed $... // Argumets to be passed to '$callback'
) : void;

/*
  Sets the value of the given configuration option.
  The configuration option will keep this new value during the script's
  execution, and will be restored at the script's ending.

  Returns:
    Success: old value
    Failure: FALSE
*/
ini_set(
  string $varname,
  string $newvalue
) : string;
```

##### MATH

```php
abs();
min();
max();
pow();
sqrt();
round();
floor();
ceil(float $value) : float; // Returns highest (more positive) nearest integer value as float
```

##### DECLARATION / DEFINITION / RETREIVAL

```php
/*
  Defines a constant with '$name' and '$value'.

  WARNING: 'resource' constants have unexpected behaviour

  Returns:
    Success: TRUE
    Failure: FALSE
*/
define(
  string $name,
  mixed $value, // PHP7.0+: 'array' is allowed
  bool $case_insensitive = FALSE // Optional. PHP7.3+: deprecated
) : bool;

/*
  Returns the value of a constant.

  Returns:
    Success: value of a constant
    Failure: NULL
      Onfailure: level 'E_WARNING'
*/
constant(string $name) : mixed;

/*
  PHP 7.0+: Will force to use strict types. Should be placed in the
  beginning of the srcipt
*/
declare(strict_types=1);
```

##### ARRAYS

```php
array($var, $var); // Returns an indexed array
array($key => $val, $key => $val); // Returns an associative array
array($arr, $arr); // Returns a multidimensional array

count($arr); // Returns length of the array `$arr`

sort($ind_arr); // Sort `$ind_arr` in ascending order
rsort($ind_arr); // Sort `$ind_arr` in descending order

asort($ass_arr); // Sort `$ass_arr` in ascending order by value
ksort($ass_arr); // Sort `$ass_arr` in ascending order by key
arsort($ass_arr); // Sort `$ass_arr` in descending order by value
krsort($ass_arr); // Sort `$ass_arr` in descending order by key

/*
  Compares '$array1' against one or more other arrays and returns the values
  in '$array1' that are not present in any of the other arrays.

  Returns:
    Array containing all the entries from array1 that are not present in any
    of the other arrays.
*/
array_diff(
  array $array1,
  array $array2,
  array $...
) : array;
```

##### STRINGS

```php
strlen("String"); // Returns length of a string

/*
  Returns a number of words in a '$str'.
*/
str_word_count(string $str);

/*
  Returns string with all alphabetic characters converted to lowercase.
*/
strtolower(string $str) : string;

/*
  Returns string with all alphabetic characters converted to uppercase.
*/
strtoupper(string $str) : string;
strrev("String"); // Returns a reversed string

// Returns the portion of string specified by the start and length parameters.
substr(
  string $str, // Original string
  int $start, // Substring start index
  int $length // Optional
) : string;
strpos($src_str, $substr); // Returns index of a substring's first occurence or `FALSE`, if not found

/*
  Returns the string with all occurences of `substr_to_replace`
  replaced with `substr_to_replace_with`

  Returns:
    Success: filtered value array/string
*/
str_replace(
  mixed $substr_to_replace,
  mixed $substr_to_replace_with,
  mixed &$src_str
) : mixed;
trim($str); // Returns a string without any whitespace in the end
stripslashes($str); // Returns a string without slashes
htmlspecialchars($str); // Returns a string with replaces special characters with UTF ones

// Returns 1, if a pattern matches a string, and 0, if not, `FALSE` if an `ERROR` occurs
preg_match(
  string $pattern, // Regex pattern
  string $subject, // String to inspect
  array &$matches, // Optional; Associative array of fully matching substring, and consecutive partial matches
  int $flags = 0, // Multiple; optional
  int $offset = 0 // Optional
) : int;

// Returns the filtered data, or `FALSE` if the filter fails
filter_var(
  mixed $variable,
  int $filter = FILTER_DEFAULT,
  mixed $options
) : string;

/*
  Printing a string into the output HTML.

  If a script vabiable is used in the string, it will be interpolated
*/
echo "String";
echo("String"); // Same as `echo`
print "String"; // Same as `echo`, but slower and has a return value
print("String"); // Same as `print`
```

##### DATE / TIME

```php
/*
  Supported date and time formats | https://www.php.net/manual/en/datetime.formats.php
*/

/*
  Literals:
    Date:
      d - Represents the day of the month (01 to 31)
      m - Represents a month (01 to 12)
      Y - Represents a year (in four digits)
      l (lowercase 'L') - Represents the day of the week

    Time:
      H - 24-hour format of an hour (00 to 23)
      h - 12-hour format of an hour with leading zeros (01 to 12)
      i - Minutes with leading zeros (00 to 59)
      s - Seconds with leading zeros (00 to 59)
      a - Lowercase Ante meridiem and Post meridiem (am or pm)

    Delimeters: "/", ".", "-"
*/
date(
  string $format, // Format of the date
  int $timestamp // Optional
) : string

date_default_timezone_set(string $timezone_identifier) : bool // Sets the server time zone to "timezone_identifier"
mktime($hour, $minute, $second, $month, $day, $year); // Returns a UNIX timestamp

/*
  strtotime("now")
  strtotime("10 September 2000")
  strtotime("+1 day")
  strtotime("+1 week")
  strtotime("+1 week 2 days 4 hours 2 seconds")
  strtotime("next Thursday")
  strtotime("last Monday")

  Returns timestamp on success, FALSE otherwise. PHP5.1-: -1 on failure
*/
strtotime(
  string $time,
  int $now = time() // Optional
) : int
```

##### TYPE / PROPERTY CHECKING

```php
/*
  Set the type of variable '$var' to '$type'.

  '$type' value list:
    1. "boolean" / "bool"
    2. "integer" / "int"
    3. "float" / "double"
    4. "string"
    5. "array"
    6. "object"
    7. "null"

  Returns:
    Success: TRUE
    Failure: FALSE
*/
settype(mixed &$var, string $type) : bool;

/*
  Returns the type of the PHP variable '$var'.

  Returns:
    Success:
      "boolean"
      "integer"
      "double"
      "string"
      "array"
      "object"
      "resource"
      "resource (closed)" (PHP7.2+)
      "NULL"
    Failure:
      "unknown type"
*/
gettype(mixed $var) : string;

var_dump($var); // Returns data type of a variable
is_int($var);
is_integer($var);
is_long($var);
is_float($var);
is_double($var);
is_finite($var);
is_infinite($var);
is_nan($var);

// "" || 0 || 0.0 || "0" || NULL || FALSE || array() (empty) => TRUE
empty(mixed $var) : bool;

/*
  Checks whether the given constant exists and is defined.

  WARNING: works only with constants.

  Returns:
    Success: TRUE (if the named constant given by name has been defined)
    Failure: FALSE
*/
defined(string $name) : bool;

/*
  Checks, if a variable is declared and is different than NULL.
  If passed additional variables, will return TRUE only all of
  them pass the check.

  Returns:
    Success: TRUE
    Failure: FALSE
*/
isset(
  mixed $var,
  mixed $... // Optional, any amount
) : bool;

/*
  Checks the list of defined functions, both built-in (internal)
  and user-defined, for '$function_name'

  Returns:
    Success: TRUE
    Failure: FALSE
*/
function_exists(string $function_name) : bool;

/*
  5985 || "5985" || "59.85" + 100 || "0x34" => TRUE
  "Hello" => `FALSE`

  NOTE:
    PHP 7.0+: "0x34" => `FALSE`
*/
is_numeric($var);
```

### PATTERNS / SNIPPENTS

#### Automatic Copyright Year

```html
&copy; 2010-<?php echo date("Y");?>
```

#### File opening or die()

```php
fopen($file, $mode) or die($status);
```

### DATA TYPES

1. `String`
2. `Integer`
3. `Float`
4. `Boolean`
5. `Array`, `Associative array`
6. `Object`
7. `NULL`
8. `Resource`

### CONCEPTS

#### SCOPE

1. Local
2. Global
3. Static
