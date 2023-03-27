<?php

/**
 * Database - Contains all the methods which has to interact with the database
 * like insert,update,delete operations in the database.
 *
 * @author Uttam Karmakar
 * 
 * @method registartion()
 *  This method insert all the information entered by the user while registraring
 *  in the website like : Name,Emal,Password etc.
 * 
 * @method isExists()
 *  Checks whether a particular user is exists in the database or not.
 * 
 * @method CheckEmail()
 *  This method check an email is already exists in the database or not,if already
 * exists then that particular user has to register with another email Id.
 * 
 * @method gerUserInfo()
 *  This method gets all the user information in associative array form.
 * 
 * @method updateUserInfo()
 *  This method helps to update the user details like profile picture,name,lastname
 * except email.
 * 
 * @method userPosts()
 *  This method helps user to post contents like images,text-contents in the website.
 * 
 * @method getPostsContent()
 *  This method fetch all the posts uploaded by various users.
 * 
 * @method updateUserPassword()
 *  Helps to update user password and that change will reflect in the database.
 */

class Database extends mysqli {
  private $conn;
  /**
   * Constructor to initialize the connection with the database.
   */
  public function __construct() {
    $this->conn = new mysqli("localhost", "root", "Kunal123", "social");
  }
  
  /**
   * registartionI() - This method insert the user information in the database
   * 
   * @param string $firstName
   *  Stores the first name of the user.
   * @param string $lastName.
   *  Stores the last name of the user.
   * @param string $gender.
   *  Stores the gender of the user.
   * @param string $email.
   *  Stores email Id of the user.
   * @param string profilePhoto.
   *  Stores the path of the profile photo choosen by the user.
   * @param string $bio.
   *  Stores bio of the user as a string.
   * @param string $password
   *  Stores password as string.
   */

  public function registration(string $firstName, string $lastName, string $gender, string $email, string $profilePhoto,string $bio, string $password) {
    $sql = "INSERT INTO userInfo (first_name, last_name, gender, email, profile_photo, bio, password) 
    VALUES ('$firstName', '$lastName', '$gender', '$email', '$profilePhoto', '$bio', '$password')";
    $this->conn->query($sql);
    return $this->conn;
  }

  /**
   * This function checks whether a particular user is already present in the 
   * database or not.
   * 
   * @param string $email
   *  This variable stores the email Id to check that particular email is already
   *  present in the database.
   * @param string $password
   *  This variable stores the password corresponds to a particular email Id to
   * check a user information already exists in the database.
   * @return boolean
   *  If user information is already exists in the database it will return true
   *  otherwise it will return false.
   */

  public function isExists(string $email, string $password) {
    $sql = "select * from userInfo where email = '$email' and password = '$password'";
    if ($this->conn->query($sql)->num_rows != 0) {
      return true;
    } else {
      return false;
    }
  }
  /**
   * This function checks whether a particular email address is already registered
   * to the database or not.
   * 
   * @param string $email
   *  Stores the user email address to check that particular email Id already exists
   *  in the database
   * @return boolean
   *  Returns true if the email Id is already exists in the database otherwise it
   *  returns false.
   */
  public function checkEmail(string $email) {
    $sql = "select * from userInfo where email = '$email'";
    if ($this->conn->query($sql)->num_rows != 0) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * This function returns the user information from the database as an associative
   * array.
   * 
   * @param string $email
   *  This function  requires email Id of the user to fetch data from the database
   *  and this variable stores that email Id
   * @return array
   *  Returns an associative array which contains all the user infromation.
   */

  public function getUserInfo(string $email) {
    $sql = "select * from userInfo where email = '$email'";
    return ($this->conn->query($sql)->fetch_all(MYSQLI_ASSOC)[0]);
  }
  /**
   * This function helps to update the  user information which is already present
   * in the database.
   * 
   * @param string $firstName
   *  Stores the first name of the user.
   * @param string $lastName
   *  Stores the last name of the user.
   * @param string $gender
   *  Stores the gender of the user.
   * @param string $email
   *  Stores user email address.
   * @param string $profilePhoto
   *  Stores the path of the profile photo.
   * @param string $bio
   *  Stores details of the bio.
   */

  public function updateUserInfo(string $firstName, string $lastName, string $gender, string $email, string $profilePhoto, string $bio) {
    $sql = "update userInfo set first_name = '$firstName', last_name = '$lastName', gender = '$gender', profile_photo = '$profilePhoto', bio = '$bio' where email = '$email';";
    // return ($this->conn->query($sql)->fetch_all(MYSQLI_ASSOC)[0]);
    $this->conn->query($sql);
  }
  /**
   * This method helps to upload the post contents like post image,text-contents
   * etc.
   * 
   * @param string $postContent
   *  This variables stores the text contents of the post.
   * @param string $postImage
   *  Stores the image which user wants to post in the website.
   * @param string $email
   *  Stores email address of the user.
   */

  public function userPosts(string $postContent, string $postImage, string $userEmail) {
    $sql = "INSERT INTO user_posts(post_content,post_image,user_post_email) VALUES
        ('$postContent','$postImage','$userEmail');";
    $this->conn->query($sql);
  }
  /**
   * This method fetch all the posts from various users
   * 
   * @param string $limit
   *  This variable stores the limit of the rows we want to fetch from the database.
   * @return array
   *  Returns an associative array which contains all the posts from various users. 
   */

  public function getPostsContent(string $limit) {
    $sql = "select user_posts.post_id,userInfo.first_name,userInfo.last_name,userInfo.profile_photo,user_posts.post_content,user_posts.post_image from userInfo join user_posts on userInfo.email = user_posts.user_post_email  order by user_posts.post_id desc limit $limit ;";
    return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
  }
  /**
   * This method updates the user password of a particular user.
   * 
   * @param string $password
   *  Stores the password of the user.
   * @param string $email
   *  Stores the email of the user.
   */

  public function updateUserPassword(string $password, string $email) {
    $sql = "update userInfo set password = '$password' where email = '$email';";
    $this->conn->query($sql);
  }

  public function userLiked(string $postId, string $email) {
    $sql = "select * from rating_info where user_id = '$email'  and post_id = $postId
    and rating_action = 'like';";
    if ($this->conn->query($sql)->num_rows > 0) {
      return true;
    } 
    else {
      return false;
    }
  }

  public function userDisliked(string $postId, string $email) {
    $sql = "select * from rating_info where user_id = '$email'  and post_id = $postId
    and rating_action = 'dislike';";
    if ($this->conn->query($sql)->num_rows > 0) {
      return true;
    }
    else {
      return false;
    }
  }

  public function getDislikes($postId) {
    $sql = "select count (*) from rating_info where post_id = $postId and rating_action = 'dislike'";
    $result =  $this->conn->query($sql)->fetch_array();
    return $result[0];
  }
  public function getLikes($postId) {
    $sql = "select count (*) from rating_info where post_id = $postId and rating_action = 'like'";
    $result =  $this->conn->query($sql)->fetch_array();
    return $result[0];
  }

  public function getRating($postId) {
    $rating = array();
    $likes_query = "select count (*) from rating_info where post_id = $postId and rating_action = 'like'";
    $likes = $this->conn->query($likes_query)->fetch_array();
    $dislikes_query = "select count (*) from rating_info where post_id = $postId and rating_action = 'dislike'";
    $dislikes = $this->conn->query($dislikes_query)->fetch_array();
    $rating = [
      'likes' => $likes[0],
      'dislikes' => $dislikes[0]
    ];
    return json_encode($rating);
  }
}
