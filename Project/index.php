<!DOCTYPE html>
<html>
<head>
  <title>Email submission app</title>
  <meta httpe-quiv="Content-Type" content="text/html" charset="UTF-8" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="shortcut icon" href="img/icon.png">
</head>
<body>
  <div id="pageContainer"> <!-- Whole page 3x3 grid -->
    <div id="appContainer"> <!-- Flex box column -->
      <span id="emailSubmissionFormHeader">EMAIL SUBMISSION APP</span> <!-- App header -->
      <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
          // Filtering the email
          $email = filter_var(
            htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'),
            FILTER_VALIDATE_EMAIL
          );

          if (!empty($email)) {
            $emailIsStored = FALSE; // Flag showing whether the email is saved into DB
            $conn = pg_connect(
              "host=localhost " .
              "port=5432 " .
              "dbname=email_db " .
              "user=postgres " .
              "password=1234"
            );

            // Safety check for successful connection to the DB
            if ($conn !== FALSE) {
              $query = "INSERT INTO emails (email) VALUES ($1)"; // Forming the query
              $queryParams = array(pg_escape_string($conn, $email)); // Forming query parameters
              $conn = pg_query_params($conn, $query, $queryParams); // Running the query
              
              $emailIsStored = $conn !== FALSE;
            }

            $emailDBStatusMsg =
              "Email \"${email}\" was " .
              ($emailIsStored ? "" : "not") .
              " saved successfully";

            // Showing the final status message from the DB
            include "php/emailDBStatusMsg.php";
          } else {
            /*
              If the submitted email was not embty, but
              invalid, message submission form will be
              shown with error message below it
            */
            include "php/emailSubmissionForm.php";
            include "php/invalidSubmittedEmailMsg.php";
          }
        } else {
          /*
            If the email was not submitted, message
            submission form will be shown. This is
            also shown on initial page access.
          */
          include "php/emailSubmissionForm.php";
        }
      ?>
      <span id="copyright">
        &copy; <?php echo(date("Y")); ?> Liana Technologies.
      </span>
    </div>
  </div>

  <script>
    // This script resets the email submission from on window load
    window.onload = () => {
        document.getElementById("emailSubmissionForm").reset();
    }
  </script>
</body>
</html>