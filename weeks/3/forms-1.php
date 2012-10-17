<?php
/**
 * forms-1.php
 */

/**
 * Turn error reporting on to the highest level possible.
 */
ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

/**
 * Build an array of form fields with default
 * values to be populated into the web form in addition to be used
 * as the default values if the field doesn't exist within the _POST array.
 */
$fields = array('name' => '', 'email' => '@domain.com', 'phone' => '', 'message' => '', 'check' => '');

/**
 * Construction of an error to hold any error messages
 * in the event of a processing error that we want to display to the users.
 */
$errors = array(); 

/**
 * A boolean flag variable to be used to determine if
 * the submission of the web form has been done so in a successful manner.
 */
$is_success = false;
 
/**
 * Check if the 'submit' button (the <input type="submit" /> with the name attribute
 * that has a value "submit". If so, let's start some processing.
 */
if( isset($_POST['submit']) ) {
  /**
   * Process the _POST array, stripping any and all slashes from the text fields,
   * in addition to trimming them of whitespace.
   */
  $fields['name'] = isset($_POST['name']) ? stripslashes(trim($_POST['name'])) : $fields['name'];
  $fields['email'] = isset($_POST['email']) ? stripslashes(trim($_POST['email'])) : $fields['email'];
  $fields['phone'] = isset($_POST['phone']) ? stripslashes(trim($_POST['phone'])) : $fields['phone'];
  
  /* Strip any HTML tags as well from the message */
  $fields['message'] = isset($_POST['message']) ? strip_tags(stripslashes(trim($_POST['message']))) : $fields['message'];
  
  /**
   * Process the checkbox field. It is important to note that we 
   * hardcoded the value 1 vs. taking the value submitted from _POST. This is because
   * our <input type="checkbox" /> has a hardcoded value of 1. Malicious users can easily alter
   * this value using web developer tools and we want to avoid incorrect data to be used for further processing,
   * therefore, we hardcode the same value if the _POST contains the checkbox's element.
   */ 
  $fields['check'] = isset($_POST['check']) ? 1 : '';
  
  /**
   * Perform various field validations. Here we will ensure that
   * none of the fields are empty and the phone field contains pure numbers.
   */
  if( '' == $fields['name'] ) {
    $errors[] = 'The name field is required.';
  }
  
  if( '' == $fields['email'] ) {
    $errors[] = 'The email field is required.';
  }
  
  if( empty($fields['message']) ) {
    $errors[] = 'The message field is required.';
  }
  
  if( !is_numeric($fields['phone']) ) {
    $errors[] = 'The phone field must have a numeric value.';
  }
  
  /* If no errors exist in our array, the submission must be successful! Set this flag to true. */
  if( empty($errors) ) {
    // Good! Validation seems to be OK!
    // Time to perform some sort of success routine... mail? save to be? etc.
    
    $is_success = true;
  }
  
}
 
?>
<html>
<head>
	<title>Forms 1 Example</title>
</head>
<body>

<div style="background: #eee; padding: 10px 10px; margin-bottom: 20px;">
  <?php print_r( $fields ); ?>
</div>

<?php /* If submission is successful, congratulate the user... */ if( $is_success ) { ?>
  <p>Congrats! You have successfully submitted this form with no validation errors.</p>
<?php } else {
  /* Submission was not successful, so we either a) have not processed and therefore $errors will be empty,
     or, we have processed and $errors is not empty. Therefore, if not empty, output the error messages */
  if( !empty($errors) ) {
    foreach( $errors as $error ) { ?>
      <p>Error: <em><?php print $error; ?></em></p>
    <?php }
  }
} // end if-else


/* Code below is to build the HTML web form */
?>

<form id="form-1" action="forms-1.php" method="post">

<p><label for="name">Name: *</label> <input type="text" name="name" id="name" value="<?php print $fields['name']; ?>" maxlength="255" size="40" /></p>

<p><label for="email">Email: *</label> <input type="text" name="email" id="email" value="<?php print $fields['email']; ?>" maxlength="255" size="40" /></p>

<p><label for="phone">Phone:</label> <input type="text" name="phone" id="phone" value="<?php print $fields['phone']; ?>" maxlength="15" size="40" /></p>

<p><label for="message">Message: *</label> <textarea name="message" id="message" cols="60" rows="10"><?php print $fields['message']; ?></textarea></p>

<p><input type="checkbox" name="check" value="1" id="check" /> <label for="check">Here is my checkbox</label></p>

<p><input type="submit" name="submit" value="Submit" /></p>

</form>


</body>
</html>