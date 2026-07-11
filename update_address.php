<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
   exit(); // Always add exit after header redirect
}

// Fetch current address if exists
$select_profile = $conn->prepare("SELECT address FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

// Parse existing address into components if available
$address_parts = [];
if(!empty($fetch_profile['address'])){
    $parts = explode(', ', $fetch_profile['address']);
    $address_parts = [
        'flat' => $parts[0] ?? '',
        'building' => $parts[1] ?? '',
        'area' => $parts[2] ?? '',
        'town' => $parts[3] ?? '',
        'city' => $parts[4] ?? '',
        'state' => $parts[5] ?? '',
        'country' => $parts[6] ?? '',
        'pin_code' => $parts[7] ?? ''
    ];
}

if(isset($_POST['submit'])){
   // Construct address from form fields
   $address = $_POST['street'] .', '.$_POST['house_no'].', '.$_POST['intercom'].', '.$_POST['interior_staircase'] .', '. $_POST['city'] .', '. $_POST['province'] .', '. $_POST['country'] .' - '. $_POST['zip_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` SET address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'Address saved successfully!';
   $_SESSION['message'] = $message;
   header('location:profile.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Address</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">
</head>
<body>
   
<?php include 'components/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Your Address</h3>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="Street, Square, etc." required maxlength="100" name="street" 
                value="<?= $address_parts['flat'] ?? '' ?>">
      </div>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="House No." required maxlength="5" name="house_no" 
                value="<?= $address_parts['building'] ?? '' ?>">
      </div>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="Intercom" required maxlength="50" name="intercom" 
                value="<?= $address_parts['area'] ?? '' ?>">
      </div>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="Interior and Staircase" required maxlength="50" name="interior_staircase" 
                value="<?= $address_parts['town'] ?? '' ?>">
      </div>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="City Name" required maxlength="50" name="city" 
                value="<?= $address_parts['city'] ?? '' ?>">
      </div>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="Province Name" required maxlength="50" name="province" 
                value="<?= $address_parts['state'] ?? '' ?>">
      </div>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="Country name" required maxlength="50" name="country" 
                value="<?= $address_parts['country'] ?? '' ?>">
      </div>
      
      <div class="input-group">
         <input type="text" class="box" placeholder="Zip Code" required maxlength="6" name="zip_code" 
                value="<?= isset($address_parts['pin_code']) ? str_replace('- ', '', $address_parts['pin_code']) : '' ?>">
      </div>
      
      <input type="submit" value="Save Address" name="submit" class="btn">
   </form>

</section>

<?php include 'components/footer.php' ?>

<script src="js/script.js"></script>
</body>
</html>