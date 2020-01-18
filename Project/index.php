<!DOCTYPE html>
<html>
<head>
  <title>Email submission app</title>
  <meta httpe-quiv="Content-Type" content="text/html" charset="utf-8" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="shortcut icon" href="img/icon.png">
</head>
<body>
  <div id="pageContainer"> <!-- Whole page 3x3 grid -->
    <div id="appContainer"> <!-- Flex box column -->
      <span id="emailSubmissionFormHeader">EMAIL SUBMISSION APP</span> <!-- App header -->
      <?php
        $emailIsSubmitted = FALSE; // Flag showing whether email was submitted
        $emailIsValid = FALSE; // Flag showing whether the entered email is valid
        $emailIsStored = FALSE; // Flag showing whether the email is saved into DB
        
        $email = ""; // Email string buffer
        $emailDBStatusMsg = ""; // DB status message buffer

        $phpFilesRelFoldPath = "php"; // Relative path to the folder with all '.php' files
        $confFilesRelFoldPath = "conf"; // Relative path to the folder with all '.ini' files

        /*
          Reads the '.ini' configuration file and
          returns a string consisting of the file
          lines separated by spaces serving as
          connection string argument for 'pg_connect()'

          Returns:
            Success: formatted string
            Failure: FALSE
        */
        function getDBConnStrFromFile($filePath) {
          /*
            Buffer for connection configuration
            strings read from the file
          */
          $connStr = FALSE;

          if (file_exists($filePath)) {
            $connOptions = parse_ini_file($filePath);

            if ((bool) $connOptions) {
              $connStr = "";

              foreach ($connOptions as $k => $v) {
                $connStr .= "${k}=${v} ";
              }
            }
          }

          return $connStr;
        }

        // ----- Application logic -----

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
          $email = $_POST['email'];
          $emailIsSubmitted = !empty($email);

          /*
            If user submits an empty email, one will
            be presented with submission form again,
            plus with corresponding error message

            This step is not necessary, because of
            'required' class added to 'input' element,
            which does not allow the user to enter an
            empty string, but it is added to ensure
            extra safety for future development
          */
          if ($emailIsSubmitted) {
            // Removing any possible whitespace in the end
            $email = trim($email);

            /*
              Checking the validity of the email

              This step is not necessary, because of
              'email' class added to 'input' element,
              which does not allow the user to enter an
              invalid email, but it is added to ensure
              extra safety for future development
            */
            if ((bool) filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailIsValid = TRUE;
            }

            if ($emailIsValid) {
              // DB manipulation status messages
              $DBQuerySuccessMsg = "Email \"${email}\" was saved successfully";
              $DBQueryFailureMsg = "Email \"${email}\" was not saved due to query failure.";
              $DBConnFailureMsg =
                "Email \"${email}\" was not saved due to DB connection failure.";
              $conn = FALSE;

              /*
                Safety check for inclusion of 'pg_connect()'
                function in 'php.ini'
              */
              if (function_exists("pg_connect")) {
                // retreiving the DB connection configuration from a file
                $connStr = getDBConnStrFromFile(
                  "${confFilesRelFoldPath}/emailSubmissionAppPGConn.ini"
                );

                /*
                  If connection configuration is successfully retreived
                  from the file, DB connection will be initiated
                */
                if ((bool) $connStr) {
                  $conn = pg_connect($connStr);
                }
              }

              // Safety check for successful connection to the DB
              if ($conn !== FALSE) {
                // Preparing the query string for 'pg_query_params()'
                $query = "INSERT INTO emails (local_part, domains) VALUES ($1, $2)";

                // 'pg_query_params()' parameter array argument strings
                $localPartQueryParam = "";
                $domainsQueryParam = "{'";

                /*
                  Parsing the email address into local part string and
                  coma separated domains in a PQSL array string for
                  'pg_query_params()'.

                  EXAMPLE:
                    Original string: "jeff.jefferson@mail.com"
                    $localPartQueryParam: "jeff.jefferson"
                    $domainsQueryParam: "{'mail', 'com'}"

                  NOTE:
                    In '$domainsQueryParam' first ("{'") and last ("'}")
                    2 chars are appended right before and after the
                    loop respectively
                */
                for (
                  $i = 0,
                  /*
                    Email string length calculation. Used
                    in for-loop initialization section for
                    performance purposes and scope variable
                    clearance
                  */
                  $emailLength = strlen($email),
                  
                  /*
                    Flag specifying currenty parsed email part.
                    When 'FALSE', current email char is appended
                    to '$localPartQueryParam', when 'TRUE' -
                    to '$domainsQueryParam'
                  */
                  $delimReached = FALSE;
                  $i < $emailLength;
                  $i++
                ) {
                  // Check for the currently parsed '$email' part
                  if (!$delimReached) {
                    /*
                      When the char is a '@', '$delimReached'
                      is switched to 'FALSE', making the loop
                      modify '$domainsQueryParam' afterwards,
                      otherwise current '$email' char is
                      appended to '$localPartQueryParam'
                    */
                    if ($email[$i] !== '@') {
                      $localPartQueryParam .= $email[$i];
                    } else {
                      $delimReached = TRUE;
                    }
                  } else {
                    /*
                      When the char is a '.', PSQL array
                      delimeter is appended instead of it,
                      otherwise current '$email' char is
                      appended to '$domainsQueryParam'
                    */
                    if ($email[$i] !== '.') {
                      $domainsQueryParam .= $email[$i];
                    } else {
                      $domainsQueryParam .= "', '";
                    }
                  }
                }

                $domainsQueryParam .= "'}"; // Closing the query array of domains

                // Preparing the query parameters array
                $queryParams = array($localPartQueryParam, $domainsQueryParam);

                /*
                  Safety check for inclusion of 'pg_query_params()'
                  function in 'php.ini'
                */
                if (function_exists("pg_query_params")) {
                  // Running the SQL-injection safe query
                  $conn = pg_query_params($conn, $query, $queryParams);
                } else {
                  $conn = FALSE;
                }

                /*
                  If 'pg_query_params()' runs successfully, it returns
                  updated connection resource '$conn', otherwise
                  'FALSE'
                */
                $emailIsStored = $conn !== FALSE;

                /*
                  Selection of the DB query status message (either
                  success, or failure)
                */
                if ($emailIsStored) {
                  $emailDBStatusMsg = $DBQuerySuccessMsg;
                } else {
                  $emailDBStatusMsg = $DBQueryFailureMsg;
                }
              } else {
                /*
                  If the connection was not successfully
                  initiated, '$DBConnFailureMsg' status
                  message will be shown
                */
                $emailDBStatusMsg = $DBConnFailureMsg;
              }
            }
          }
        }

        // ----- Output HTML logic -----

        if (!$emailIsSubmitted) {
          /*
            If the email was not submitted, message
            submission form will be shown. This is
            also shown on initial page access.
          */
          include "${phpFilesRelFoldPath}/emailSubmissionForm.php";
        } else {
          if (!$emailIsValid) {
            /*
              If the submitted email was not embty, but
              invalid, message submission form will be
              shown with error message below
            */
            include "${phpFilesRelFoldPath}/emailSubmissionForm.php";
            include "${phpFilesRelFoldPath}/invalidSubmittedEmailMsg.php";
          } else {
            /*
              If the email was valid, one of 3 status
              messages will be shown:
                1. '$DBQuerySuccessMsg'
                2. '$DBQueryFailureMsg'
                3. '$DBConnFailureMsg'

              NOTE:
                All of the status messages use the
                same template, but different styling
                and text, depending on '$emailIsStored'
                and '$emailDBStatusMsg' respectively
            */
            include "${phpFilesRelFoldPath}/emailDBStatusMsg.php";
          }
        }
      
        // Copyright is always included in the end of the page
        include "${phpFilesRelFoldPath}/copyright.php";
      ?>
    </div>
  </div>

  <script src="js/main.js"></script>
</body>
</html>