<?php
require_once 'db.config.php';
session_start();
$uuid = rand();
$_SESSION['uuid'] = $$uuid;

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['randcheck'] == $_SESSION['rand']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = "SELECT name,password,cid from cmanage.user WHERE name = '" . $username . "'";
    $result = $conn->query($stmt);
    $row = $result->fetch_assoc();

    echo $row['password'];

    if($row['username'] == $username && $password == $row['password']) {
      //assume username is unique
      $_SESSION['username'] = $username;
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="flex flex-col items-center justify-center h-screen">
    <div class="w-full max-w-xs">
  <form id='form' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" onsubmit="onSubmit(event)">
  <input type="hidden" value="<?php echo $uuid; ?>" id="uuid" name="uuid" />
  <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Logo here
      </label>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight mb-3 focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="Username">
			<p class="hidden text-red-500 text-xs italic"> Username not valid.</p>
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
      <p class="hidden text-red-500 text-xs italic"> Password not valid.</p>
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign In
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Forgot Password?
      </a>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/validator@latest/validator.min.js"></script>
<script src="./js/signin.validate.js"></script>
</html>
