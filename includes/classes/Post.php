<?php

class Post {
  private $user_obj;
  private $con;

  //swithin this class create the instance of the User class
  public function __construct($con, $user){
    $this->con = $con;
    $this->user_obj = new User($con, $user);
  }

  public function submitPost($body, $user_to){
    $body = strip_tags($body);//removes all the HTML tags from the post.
    $body = mysqli_real_escape_string($this->con, $body); //this escapes all the single quites in he post.
    $check_empty = preg_replace('/\s+/', '', $body);//when there will be too many spaces in the post, it replaces with nothing.

    //Check if the post is empz after removing the extra spaces. Dont post if the post is still empty.
    if($check_empty != "") {
      //Curent date and time.
      $date_added = date("Y-m-d H:i:s");
      //get username
      $added_by = $this->user_obj->getUsername();

      //if the user is not on own profile, user_to is 'none'.
      if($user_to == $added_by){
        $user_to = "none";
      }

      //insert post.
      $query = mysqli_query($this->con, "INSERT INTO posts VALUES('', '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
      $returned_id = mysqli_insert_id($this->con);

      //Insert user notification.

      //Update post count for User.
      $num_post = $this->user_obj->getNumPosts();
      $num_post++;
      $update_query = mysqli_query($this->con, "UPDATE num_post SET num_posts='$num_post' WHERE username='added_by'");

    }
  }

}

?>
