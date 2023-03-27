<?php

/**
 * Validations - Contains all the validation parts like username validation,email
 * validation,profile picture validation,password validations etc.
 *
 * @author Uttam Karmakar
 * @method isValidName()
 *  Checks whether the name given by user valid or not.
 * 
 * @method isValidProPic()
 *  Checks whether the file uploaded by a user is meeting the required condtion
 *  or not .
 * 
 * @method isValidEmail()
 *  This method checks the inputed email valid or not.
 * 
 * @method isValidPass()
 *  This method checks the password entered by the user meeting the required
 *  conditions or not.
 * 
 * @method isValidPass()
 *  This method checks the password entered by the user meeting the required
 *  conditions or not.
 * 
 * @method isValidGender()
 *  This method checks the user entering a valid gender or not.
 */

class Validations {

  public $uploadedFileErr;
  public $passwordErr;
  public $emailErr;
  public $nameErr ;
  
   /**
     * Checks the inputed name is valid or not,if not then it will store error
     * message in a variable and returns false otherwise it will return true.
     * 
     * @param string $firstName
     *  Stores the firstname of the user.
     * 
     * @param string $lastName
     *  Stores the lastname of the user.
     * 
     * @return boolean
     */

  public function isValidName(string $firstName, string $lastName) {
    if (empty($firstName) || empty($lastName)) {
      $this->nameErr= "Name should not be empty.";
      return FALSE;
    } 
    else if (preg_match('/[0-9]/', $firstName) 
    || preg_match('/[0-9]/', $lastName)) {
      $this->nameErr= "Name should not contain any numeric value.";
      return FALSE;
    } 
    else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) 
      || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
      $this->nameErr= "Name should not contain any special character.";
      return FALSE;
    } 
    else {
      return TRUE;
    }

  }

  /**
   * Checks the file uploaded by the user in valid format and in valid size or 
   * not,if not then it will stores the error message otherwise it will return 
   * true
   * 
   * @param string $fileName
   *  Stores the name of the uploaded file
   * 
   * @param string $type
   *  Stores the type of the file,example : JPG,PNG,JPEG etc.
   * 
   * @param string $size
   *  Stores the size of the uploaded file in bytes.
   * 
   * @return boolean
   */

  function isValidProPic(string $fileName, string $type, int $size) {
    if (!empty($fileName)) {
      if ($type != "image/png"  
      && $type != "image/jpeg" 
      && $type != "image/jpg") {
        $this->uploadedFileErr= "please upload a image in png,jpeg or jpg format.";
        return FALSE;
      }
      if ($size > 720000) {
        $this->uploadedFileErr= "Please upload a image less then 7MB.";
        return FALSE;
      }
      return TRUE;
    }

     else {
      $this->uploadedFileErr= "This field should not empty.";
      return FALSE;
    }
  }

  /**
   * Checks the email entered in the email field.
   * 
   * @param string $email
   *  Stores the email Id.
   * 
   * @return boolean
   *  Returns true if the entered email is in valid format otherwise it will return
   *  false.
   */

  public function isValidEmail(string $email)
  {
    if (empty($email)) {
      $this->emailErr= "This field should not be empty.";
      return FALSE;
    } 
    else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
    } 
    else {
      $this->emailErr= "Invalid Email Id.";
      return FALSE;
    }
  }
  
  /**
   * Checks the strength of the password which is setting by the user,shows error
   * messages until the password contains all the required characters.
   * 
   * @param string $password
   *  Stores the password as a string.
   * 
   * @return boolean
   *  Returns true if the password contains all the required characters otherwise
   * it will return false.
   */

  public function isValidPass(string $password) {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
      $this->passwordErr= 'Password should be at least 6 characters in length
       and should include at least one upper case letter, one number, and one 
       special character.';
      return FALSE;
    } 
    else {
      return TRUE;
    }

  }
  /**
   * Checks the gender value entered by the user is a valid gender or not
   * 
   * @param string $gender
   *  Stores the gender value as a string
   * 
   * @return boolean
   *  Returns true if a valid gender is given in the input field otherwise it will
   * return false.
   */
  public function isValidGender(string $gender) {
    $gender = strtolower($gender);
    if($gender == "male" || $gender == "female") {
      return TRUE;
    }
    return FALSE;
  }
}
?>
