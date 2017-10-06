<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Contact form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
        body{
        font-family: Segoe UI
        }
        label{
        font-weight: 600
        }
        .container{
        margin-top: 100px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="text-center">Contact us</h1>
                    <?php if (!empty($msg)) {
                    echo "<h4 class='text-center'>$msg</h4>";
                    } ?>
                    <form method="post" id="contact">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                            <div class="form-group">
                            <label for="phone">Phone No</label>
                            <input type="tel" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="8" cols="20" required></textarea>
                        </div>
                        <button type="submit" value="Send" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="main.js"></script>
    </body>
</html>