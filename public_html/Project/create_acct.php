<?php require_once(__DIR__ . '/../../partials/nav.php'); ?>
<?php
if (!is_logged_in()) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You don't have permission to access this page");
    die(header("Location: ./login.php"));
}
?>

<form method="POST">
	<label>Account Type</label>
	<select name="account_type">
		<option value="checking">Checking</option>
		<option value="Savings">Savings</option>

		</select>
	<input type="number"  name="balance" placeholder="Balance"/>
	<input type="submit" name="save" value="Create"/>
</form>

<?php
if(isset($_POST["save"])){
	$bal = $_POST["balance"];
	if($bal < 5){  
	    flash("Account must have a minimum of $5");
	}
       	else{
	    $acctnum = rand(100000000000, 999999999999);
            $accttype = $_POST["account_type"];
			$apy = 0;
        if ($accttype == "Savings"){
            $apy = 0.1;
        }
	    $user = get_user_id();
	    $db = getDB();
	    $stmt = $db->prepare("INSERT INTO Accounts (account_number,account_type, user_id) VALUES(:account_number, :account_type, :user)");
	    $r = $stmt->execute([
	        ":account_number"=>$acctnum,
	        ":account_type"=>$accttype,
	        ":user"=>$user
			 //":bal"=>$bal
	    ]);
	    if($r){
	        $accountID = $db->lastInsertId();
           
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
<?php require(__DIR__ . '/../../partials/flash.php');
           
        