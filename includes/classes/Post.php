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

  public function loadPostsFriends() {
    $str = "";//String to return
    $data = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

      while($row = mysqli_fetch_array($data)) {
        $id = $row['id'];
        $body = $row['body'];
        $added_by = $row['added_by'];
        $date_time = $row['$date_added'];

        //Prepare user_to string so it can be included even if not posted to a user.
        if($row['user_to'] == "none") {
          $user_to = "";
        }
        else {
          $user_to_obj = new User($con, $row['user_to']);
          $user_to_name = $user_to_obj->getFirstAndLastName();
          $user_to = "<a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
        }

        //Check if user who posted, has their account closed.
        $added_by_obj = new User($con, $added_by);
        if($added_by_obj->isClosed()) {
          continue;
        }

        $user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");
        $user_row = mysqli_fetch_array($user_details_query);

        //Timeframe
        $date_time_now = date("Y-m-d H:i:s");
        $start_date = new DateTime($date_time); //Time of post.
        $end_date = new DateTime($date_time_now); //Current time.
        $interval = $start_date->diff($end_date); //Difference between dates.

        if($interval->y >= 1) {
          if($interval = 1)
            $time_message = $interval->y . " year ago"; //1 year ago.
          else
            $time_message = $interval->y . " year ago"; //1+ year ago.
        }
        else if ($interval-> m >= 1) {
          if($interval->d == 0) {
            $days = " ago";
          }
          else if($interval->d == 1) {
            $days = $interval->d . " day ago";
          }
          else {
            $days = $interval->d . " days ago";
          }

          if($interval->m = 1) {
            $time_message = $interval->m . " month" . $days;
          }
          else {
            $time_message = $interval->m . " months" . $days;
          }
        }

        else if($interval->d >= 1) {
          if($interval->d == 1) {
            $time_message = "Yesterday";
          }
          else {
            $time_message = $interval->d . " days ago";
          }
        }
        else if($interval->h >= 1) {
          if($interval->h == 1) {
            $time_message = $interval->h . " hour ago";
          }
          else {
            $time_message = $interval->h . " hours ago";
          }
        }
        else if($interval->i >= 1) {
          if($interval->i == 1) {
            $time_message = $interval->i . " minute ago";
          }
          else {
            $time_message = $interval->i . " minute ago";
          }
        }
        else {
          if($interval->s <30) {
            $time_message = "Just now";
          }
          else {
            $time_message = $interval->s . " seconds ago";
          }
        }

      }
  }

}

?>
