<?php require_once(__DIR__ . '/../../partials/nav.php'); ?>
 <?php require_once(__DIR__ . "/../../lib/functions.php"); ?>
<?php
if (!is_logged_in()) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You don't have permission to access this page");
    die(header("Location: ./login.php"));
}
?>
<?php
if(isset($_POST["save"])){
	$bal = $_POST["balance"];
	if($bal < 5){  
	    flash("Minimum $5 balance in order to open an account");
	}
       	else{
	    $acctnum = rand(100000000000, 999999999999);
            $accttype = $_POST["account_type"];
	    $user = get_user_id();
	    $db = getDB();
	    $stmt = $db->prepare("INSERT INTO Accounts (account_number,account_type, balance, user_id) VALUES(:account_number, :account_type, :balance, :user)");
	    $r = $stmt->execute([
	        ":account_number"=>$acctnum,
	        ":account_type"=>$accttype,
	        ":user"=>$user,
			":balance"=>$bal
	    ]);
	    if($r){
	        $accountID = $db->lastInsertId();
            // function getWorldID(){
            //     $db = getDB();
            //     $q = "SELECT id from Accounts WHERE account_number='000000000000'";
            //     $stmt = $db->prepare($q);
            //         $s = $stmt->execute();
            //         $results = $stmt->fetch(PDO::FETCH_ASSOC);
            //     $worldID = $results["id"];

            //     return $worldID;
            // }

            do_bank_action(getworldID(), $accountID, ($bal), 0, "new account","ExpectedTotal");
	    	flash("Account created successfully! Your new account has an id number of: " . $accountID);
		 die(header("Location: ./view_accounts.php"));  
    }
	    else{
	        flash("There was an error creating your account. Please try again.");


	    }
    }
}
?>
<form method="POST">
	<label>Account Type</label>
	<select name="account_type">
		<option value="checking">Checking</option>
		<option value="Savings">Saving</option>
		</select>
	<input type="number"  name="balance" placeholder="Balance"/>
	<input type="submit" name="save" value="Create"/>
</form>


<?php require(__DIR__ . '/../../partials/flash.php');?>

           
        