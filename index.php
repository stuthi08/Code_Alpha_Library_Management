<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('images/library.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Add a dark overlay over the background image */
        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

<?php
// Initialize variables to prevent undefined variable warnings
$emailmsg = "";
$pasdmsg = "";
$msg = "";

$ademailmsg = "";
$adpasdmsg = "";

// Check if the variables are passed via request and set them accordingly
if (!empty($_REQUEST['ademailmsg'])) {
    $ademailmsg = $_REQUEST['ademailmsg'];
}

if (!empty($_REQUEST['adpasdmsg'])) {
    $adpasdmsg = $_REQUEST['adpasdmsg'];
}

if (!empty($_REQUEST['emailmsg'])) {
    $emailmsg = $_REQUEST['emailmsg'];
}

if (!empty($_REQUEST['pasdmsg'])) {
    $pasdmsg = $_REQUEST['pasdmsg'];
}

if (!empty($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}
?>

<div class="overlay w-full h-full absolute top-0 left-0"></div>

<div class="container mx-auto p-6 relative z-10">

    <!-- Title Section -->
    <h1 class="text-white text-4xl font-bold text-center mb-10">Library Management Login</h1>

    <div class="flex flex-col md:flex-row justify-center items-center gap-8">

        <!-- PHP Message -->
        <div class="w-full text-center">
            <h4 class="text-red-500 font-semibold text-lg"><?php echo $msg; ?></h4>
        </div>

        <!-- Admin Login Form -->
        <div class="bg-white bg-opacity-20 backdrop-blur-lg shadow-lg p-8 rounded-lg max-w-md w-full text-center">
            <h3 class="text-white text-2xl font-bold mb-6">Admin Login</h3>
            <form action="loginadmin_server_page.php" method="get" class="space-y-4">
                <div class="form-group">
                    <input type="text" class="form-control w-full p-4 rounded-lg text-gray-800" name="login_email" placeholder="Your Email *" value="" />
                    <label class="text-red-500 text-sm mt-1 block">*<?php echo $ademailmsg; ?></label>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control w-full p-4 rounded-lg text-gray-800" name="login_pasword" placeholder="Your Password *" value="" />
                    <label class="text-red-500 text-sm mt-1 block">*<?php echo $adpasdmsg; ?></label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit w-full bg-white text-blue-600 font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 hover:text-white transition-colors cursor-pointer" value="Login" />
                </div>
            </form>
        </div>

        <!-- Student Login Form -->
        <div class="bg-white bg-opacity-20 backdrop-blur-lg shadow-lg p-8 rounded-lg max-w-md w-full text-center">
            <h3 class="text-white text-2xl font-bold mb-6">Student Login</h3>
            <form action="login_server_page.php" method="get" class="space-y-4">
                <div class="form-group">
                    <input type="text" class="form-control w-full p-4 rounded-lg text-gray-800" name="login_email" placeholder="Your Email *" value="" />
                    <label class="text-red-500 text-sm mt-1 block">*<?php echo $emailmsg; ?></label>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control w-full p-4 rounded-lg text-gray-800" name="login_pasword" placeholder="Your Password *" value="" />
                    <label class="text-red-500 text-sm mt-1 block">*<?php echo $pasdmsg; ?></label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit w-full bg-white text-blue-600 font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 hover:text-white transition-colors cursor-pointer" value="Login" />
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
