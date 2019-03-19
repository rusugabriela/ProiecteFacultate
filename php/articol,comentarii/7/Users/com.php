<!DOCTYPE html>
<html>
<head>
  <title>Get motivated!</title>
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
    background-color: #e6b3e6;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: #d11aff;
    clear: left;
    text-align: center;
}

div.comments {
    float: left;
    max-width: 400px;
    margin: 0;
    padding: 1em;
}

div.comments ul {
    list-style-type: none;
    padding: 0;
}
   
div.comments ul a {
    text-decoration: none;
}

article {
    margin-left: 400px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
</style>
</head>
<body>

<?php

$name = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $comment = test_input($_POST["comment"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
   
?>

<div class="container">

<header>
   <h1>Inspirational Quotes That Will Get You Through the Work Week</h1>
</header>
  
<div class="comments">
  <h2>Add a comment:</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="name">
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
  </form>
  <br>
  <h2>Comments:</h2>
  <?php
    if(!empty($_POST["name"]) && !empty($_POST["comment"]))
        echo "<br><b>".$name.":</b><br>".$comment."<br>";
  ?>
  <br><b>John:</b><br>Thank you for the quotes. My optimism is bigger now!<br>
  <br><b>Brian:</b><br>Excellant & Thanks a lot!<br>
  <br><b>Zia:</b><br>All the quotes are so true<br>
  <br><b>Abby:</b><br>Waaaaw! That is really amazing!<br>
   
</div>

<article>
  <h1>Monday: Get Motivated</h1>
  <p>Sure, even The Carpenters agreed that “Mondays always get you down,” but that doesn’t mean some good-old-fashioned motivation can’t get you geared up and excited for the week ahead. Let these quotes motivate you to go that extra mile today!</p>
  <ul>
    <li>Go as far as you can see. When you get there, you'll be able to see further</li>
    <li>The individual who says it is not possible should move out of the way of those doing it</li>
    <li>When someone tells me 'no', it doesn't mean I can't do it, it simply means I can't do it with them</li>
  </ul>

  <h1>Tuesday: Get Down to Business</h1>
  <p>When Tuesday rolls around, it's really time to get down to work. Having trouble getting started? These expert quotes will help boost your productivity so you can power through that to-do list!</p>
  <ul>
    <li>A year from now you may wish you had started today</li>
    <li>Light tomorrow with today</li>
    <li>Someday is not a day of the week</li>
  </ul>

  <h1>Wednesday: Keep it Going</h1>
  <p>It’s hump day, so you’re already through half of the week. But don’t let that stop you from working hard to achieve your goals. These quotes will give you that extra push to keep reaching.</p>
  <ul>
    <li>Believe you can and you're halfway there</li>
    <li>Even if you're on the right track, you'll get run over if you just sit there</li>
    <li>If everything seems under control, you're not going enough</li>
  </ul>

  <h1>Thursday: Reflect on All You’ve Done</h1>
  <p>You’ve been hard at work all week, so now take a moment to look back at all that you’ve achieved. These reflective quotes will open your mind and allow you to appreciate where you’ve been and where you are going.</p>
  <ul>
    <li>Believe you can and you're halfway there</li>
    <li>The more I want to get something done, the less I call it work</li>
    <li>Success is the sum of small efforts repeated day in and day out</li>
  </ul>

  <h1>Friday: Conquer Your Fears</h1>
  <p>It’s Friday, which means it’s the end of the work week. As you move into your weekend, remember not to let your fears hold you back—in your career or your life! These quotes will urge you to leave your worries at the door and walk confidently toward the future.</p>
  <ul>
    <li>The true meaning of life is to plant trees under whose shade you do not expect to sit</li>
    <li>I would rather die of passion than of boredom</li>
    <li>Very often a change of self is needed more than a change of scene</li>
  </ul>

  <h1>Saturday and Sunday: Prep for Success</h1>
  <p>The weekend is a time for relaxation, rejuvenation, and reflection on what you really want. Use these extra moments of free time to mentally prep for success!</p>
  <ul>
    <li>Succes only comes to those who dare to attempt</li>
    <li>People rarely succeed unless they have fun in what they are doing</li>
    <li>Coming together is a beginning. Keeping together is a progress. Working together is success</li>
  </ul>
</article>

<footer>Have a good day!</footer>

</div>

</body>
</html>
