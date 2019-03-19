<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>

        .comments {
            margin: 2.5rem auto 0;
            max-width: 60.75rem;
            padding: 0 1.25rem;
        }

        .comment-wrap {
            margin-bottom: 1.25rem;
            display: table;
            width: 100%;
            min-height: 5.3125rem;
        }

        .comment-block {
            padding: 1rem;
            background-color: #fff;
            display: table-cell;
            vertical-align: top;
            border-radius: 0.1875rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
        }

        .comment-block textarea {
            width: 100%;
            resize: none;
        }

        .comment-text {
            margin-bottom: 1.25rem;
        }

        .bottom-comment {
            color: #acb4c2;
            font-size: 0.875rem;
            float: left;
        }

    </style>
</head>
<body>
<header>
    <div class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Home</a>
        <ul class="nav nav-pills">

            <?php
            if (isset($_SESSION['id'])) {
                echo ' <li class="nav-item">
                <a class="nav-link" href="../logout.php">Log out</a>
                        </li>';
            } else {
                echo ' <li class="nav-item">
                <a class="nav-link" href="../login.php">Log in</a>
                        </li>';
            }
            ?>


        </ul>


    </div>
</header>
<div class="text-justify col-6 offset-3">
    <h1 align="center">The importance of eating healthy</h1>

    <br>
    <br>

    <img src="http://cdn2.stylecraze.com/wp-content/uploads/2013/01/1650-Why-Is-Healthy-Food-Important-is.jpg"
         style="width:800px" class="rounded mx-auto d-block">
    <br>
    <br>

    <p>Eating healthy isn’t always easy, but committing to a healthy diet can be one of the smartest decisions you
        ever make. Why? Not only can eating well make you look and feel better, it can also save you money on future
        health costs!</p>
    <p>Eating well also means leaving out or only rarely consuming foods that are high in added sugar, saturated fat
        and sodium. That includes most fast food, full-calorie sodas, processed snacks like chips and crackers, and
        anything with more milligrams of sodium than there are calories in a serving.</p>
    <ol>
        <li>Increase productivity</li>
        <li> Enhance mood</li>
        <li> Regulate weight</li>
        <li>Be healthier</li>
        <li>Live longer</li>
    </ol>
    <h3><b>Tips for eating healthy</b></h3>
    <p><span>If switching to a healthy diet were easy, everyone would do it. So what should you do if you’re
            having a hard time choosing the right foods and sticking to a healthful eating pattern?</span>
    </p>
    <p><span>“Small changes over time result in big payoffs,” Nessel says. That means setting small, attainable goals each day that will translate into long-term results. Here are some of her tips:</span>
    </p>
    <ul>
        <li><span>Stay hydrated. This will help you reduce cravings and feel fuller.</span>
        </li>
        <li><span>Don’t skip meals. Eat at about the same time each day, if you can.</span>
        </li>
        <li>
            <span>Get active. Just increasing activity a little bit may create a mindset to eat better too.</span>
        </li>
        <li><span>Preplan around cravings. If you always get hungry for salt at 3 p.m. or sugar after dinner, have a healthier alternative ready to go.</span>
        </li>
        <li><span>Forgive yourself when you slip up. Beating yourself up after a slip-up tends to unravel all of your goals; picking back up as though you didn’t make a misstep is a better option.</span>
        </li>
    </ul>
    <p><span>Keep in mind that good choices, like eating a healthy diet, happen one at a time. A few small changes
            in the right direction can help improve your life now, and they may fatten your wallet too.</span>
    </p>
    <p>
        ..........................................................................................................................................................................................................................................</p>
</div>
<?php if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo '<div class="row"><div class="col-4 offset-4"><div class="alert alert-danger">' . $error . '</div></div></div>';
    }
    unset($_SESSION['errors']);
} ?>

<?php if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $message) {
        echo '<div class="row"><div class="col-4 offset-4"><div class="alert alert-success">' . $message . '</div></div></div>';
    }
    unset($_SESSION['messages']);
} ?>
<div class="comments col-6 offset-3">
    <h2>Add a comment:</h2>
    <form method="post" action="../insert_comment.php">

        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comment" class="form-control" name="comment" rows="5" cols="40"></textarea>

        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" value="Submit">
        </div>
    </form>
    <br>
    <h2>Comments:</h2>

    <?php foreach ($result as $com) { ?>
        <div class="comment-wrap">
            <div class="comment-block">
                <p class="comment-text"><?= $com['mesaj'] ?></p>
                <div class="bottom-comment">
                    <?= $com['nume_user'] ?>
                    <?php if ($com['accepted'] ==0){
                        echo' <form action="../add_comment_or_not.php" method="post">
                        <input type="submit" class="btn btn-success" value="Accept" name="accept">
                        <input type="submit" class="btn btn-danger" value="Decline" name="decline">
                        <input type="hidden" name="id_com" value='.$com['id'].'>
                    </form>';
                    }?>

                </div>
            </div>
        </div>
    <?php } ?>
</body>
</html>