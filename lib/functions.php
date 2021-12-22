<?php
require_once(__DIR__ . "/db.php");
$BASE_PATH = '/Project/'; 
function se($v, $k = null, $default = "", $isEcho = true)
{
    if (is_array($v) && isset($k) && isset($v[$k])) {
        $returnValue = $v[$k];
    } else if (is_object($v) && isset($k) && isset($v->$k)) {
        $returnValue = $v->$k;
    } else {
        $returnValue = $v;
        //added 07-05-2021 to fix case where $k of $v isn't set
        //this is to kep htmlspecialchars happy
        if (is_array($returnValue) || is_object($returnValue)) {
            $returnValue = $default;
        }
    }
    if (!isset($returnValue)) {
        $returnValue = $default;
    }
    if ($isEcho) {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        echo htmlspecialchars($returnValue, ENT_QUOTES);
    } else {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        return htmlspecialchars($returnValue, ENT_QUOTES);
    }
}
//TODO 2: filter helpers
function sanitize_email($email = "")
{
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}
function is_valid_email($email = "")
{
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
}
//TODO 3: User Helpers
function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        flash("You must be logged in to view this page", "warning");
        die(header("Location: $destination"));
    }
    return $isLoggedIn; //se($_SESSION, "user", false, false);
}
function has_role($role)
{
    if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
        foreach ($_SESSION["user"]["roles"] as $r) {
            if ($r["name"] === $role) {
                return true;
            }
        }
    }
    return false;
}
function get_username()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "username", "", false);
    }
    return "";
}
function get_user_email()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "email", "", false);
    }
    return "";
}
function get_user_id()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "id", false, false);
    }
    return false;
}
//TODO 4: Flash Message Helpers
function flash($msg = "", $color = "info")
{
    $message = ["text" => $msg, "color" => $color];
    if (isset($_SESSION['flash'])) {
        array_push($_SESSION['flash'], $message);
    } else {
        $_SESSION['flash'] = array();
        array_push($_SESSION['flash'], $message);
    }
}

function getMessages()
{
    if (isset($_SESSION['flash'])) {
        $flashes = $_SESSION['flash'];
        $_SESSION['flash'] = array();
        return $flashes;
    }
    return array();
}
//TODO generic helpers
function reset_session()
{
    session_unset();
    session_destroy();
}
function users_check_duplicate($errorInfo)
{
    if ($errorInfo[1] === 1062) {
        //https://www.php.net/manual/en/function.preg-match.php
        preg_match("/Users.(\w+)/", $errorInfo[2], $matches);
        if (isset($matches[1])) {
            flash("The chosen " . $matches[1] . " is not available.", "warning");
        } else {
            //TODO come up with a nice error message
            flash("<pre>" . var_export($errorInfo, true) . "</pre>");
        }
    } else {
        //TODO come up with a nice error message
        flash("<pre>" . var_export($errorInfo, true) . "</pre>");
    }
}
function get_url($dest)
{
    global $BASE_PATH;
    if (str_starts_with($dest, "/")) {
        //handle absolute path
        return $dest;
    }
    //handle relative path
    return $BASE_PATH . $dest;
}
function get_random_str($length)
{
    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 36)), 0, $length);
}
function get_account_balance()
{
    if (is_logged_in() && isset($_SESSION["user"]["account"])) {
        return (int)se($_SESSION["user"]["account"], "balance", 0, false);
    }
    return 0;
}
function get_user_account_id()
{
    if (is_logged_in() && isset($_SESSION["user"]["account"])) {
        return (int)se($_SESSION["user"]["account"], "id", 0, false);
    }
    return 0;
}
function get_or_create_account()
{
    if (is_logged_in()) {
        
        $account = ["id" => -1, "account_number" => false, "balance" => 0];
        
        $query = "SELECT id, account, balance from Accounts where user_id = :uid LIMIT 1";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id()]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                //account doesn't exist, create it
                $created = false;
                //we're going to loop here in the off chance that there's a duplicate
                //it shouldn't be too likely to occur with a length of 12, but it's still worth handling such a scenario

                //you only need to prepare once
                $query = "INSERT INTO Accounts (account, user_id) VALUES (:an, :uid)";
                $stmt = $db->prepare($query);
                $user_id = get_user_id(); //caching a reference
                $account_number = "";
                $aid = -1;
                while (!$created) {
                    try {
                        $account_number =get_random_str(12);
                        $stmt->execute([":an" => $account_number, ":uid" => $user_id]);
                        $created = true; //if we got here it was a success, let's exit
                        $aid = $db->lastInsertId();
                        flash("Welcome! Your account has been created successfully", "success");
                        change_bills(10, "welcome", -1, $aid, "Welcome bonus!");
                    } catch (PDOException $e) {
                        $code = se($e->errorInfo, 0, "00000", false);
                        //if it's a duplicate error, just let the loop happen
                        //otherwise throw the error since it's likely something looping won't resolve
                        //and we don't want to get stuck here forever
                        if (
                            $code !== "23000"
                        ) {
                            throw $e;
                        }
                    }
                }
                //loop exited, let's assign the new values
                $account["id"] = $aid;
                $account["account_number"] = $account_number;
           
            } else {
                //$account = $result; //just copy it over
                $account["id"] = $result["id"];
                $account["account_number"] = $result["account"];
                $account["balance"] = $result["balance"];
            }
        } catch (PDOException $e) {
            flash("Technical error: " . var_export($e->errorInfo, true), "danger");
        }
        $_SESSION["user"]["account"] = $account; //storing the account info as a key under the user session
        if (isset($created) && $created) {
            refresh_account_balance();
        }
        //Note: if there's an error it'll initialize to the "empty" definition around line 161

    } else {
        flash("You're not logged in", "danger");
    }
}


function refresh_account_balance()
{
    if (is_logged_in()) {
        
        $query = "UPDATE Accounts set balance = (SELECT IFNULL(SUM(diff), 0) from History WHERE src = :src) where id = :src";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":src" => get_user_id()]);
            get_or_create_account(); //refresh session data
        } catch (PDOException $e) {
            flash("Error refreshing account: " . var_export($e->errorInfo, true), "danger");
        }
    }
}

function change_bills($bills, $reason, $src = -1, $dest = -1, $memo = "")
{
    
    if ($bills > 0) {
        $query = "INSERT INTO History (src, dest, diff, reason, memo) 
            VALUES (:acs, :acd, :pc, :r,:m), 
            (:acs2, :acd2, :pc2, :r, :m)";
        //I'll insert both records at once, note the placeholders kept the same and the ones changed.
        $params[":acs"] = $src;
        $params[":acd"] = $dest;
        $params[":r"] = $reason;
        $params[":m"] = $memo;
        $params[":pc"] = ($bills * -1);

        $params[":acs2"] = $dest;
        $params[":acd2"] = $src;
        $params[":pc2"] = $bills;
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute($params);
            
            if ($src === get_user_id() || $dest === get_user_id()) {
                refresh_account_balance();
            }
        } catch (PDOException $e) {
            flash("Transfer error occurred: " . var_export($e->errorInfo, true), "danger");
        }
    }
}
	function getRealTimeBalance($balanceChange){
        $db = getDB();
        $q = "SELECT ifnull(SUM(balance), 0) as total from Accounts WHERE id=:id";
        $stmt = $db->prepare($q);
        $s = $stmt->execute([":id" =>$balanceChange]);
        if ($s){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $total = (float)$result["total"]; 
            return $total;
        }
        return 0;
    }


function do_bank_action($account1, $account2, $amountChange, $type, $memo){
    $db = getDB();
    $stmt = $db ->prepare("SELECT account_type, balance FROM Accounts WHERE id=:id");
    $r = $stmt->execute([ ":id" => $account1]);
    $src =$stmt->fetch(PDO::FETCH_ASSOC);
    $src_total =$src['balance'];

    if ($account1 > 1 && $src_total < $amountChange){
        flash ("You do not have enough money available for this transaction");
        return false;
    }


    $stmt = $db ->prepare("SELECT account_type, balance FROM Accounts WHERE id=:id");
    $r = $stmt->execute([ ":id" => $account2]);
    $dest = $stmt->fetch(PDO::FETCH_ASSOC);

    $query = "INSERT INTO `Transactions` (`source`, `dest`, `BalanceChange`, `TransactionType`, `memo`, `ExpectedTotal`) 
    VALUES(:p1a1, :p1a2, :p1change, :type, :memo, :a1total), 
            (:p2a1, :p2a2, :p2change, :type, :memo, :a2total)";
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(":p1a1", $account1);
    $stmt->bindValue(":p1a2", $account2);
    $stmt->bindValue(":p1change", $amountChange*-1);
    $stmt->bindValue(":type", $type);
    $stmt->bindValue(":memo", $memo);
    $stmt->bindValue(":a1total", $src_total);
    // $stmt->bindValue(":date", $date);
    //flip data for other half of transaction
    $stmt->bindValue(":p2a1", $account2);
    $stmt->bindValue(":p2a2", $account1);
    $stmt->bindValue(":p2change", ($amountChange));
    $stmt->bindValue(":type", $type);
    $stmt->bindValue(":memo", $memo);
    $stmt->bindValue(":a2total", $dest_total);
    // $stmt->bindValue(":date", $date);
    $r = $stmt->execute();
    if($r){
        updateAccount($account1, $src_total);
        updateAccount($account2, $dest_total);
    }
    else{
        $e = $stmt->errorInfo();
        flash("Error creating: " . var_export($e, true));
    }
    
    return $r;
}
function updateAccount($id, $bal){
    $db = getDB();
    $stmt = $db->prepare("UPDATE Accounts set balance=:bal where id=:id");
    $r = $stmt->execute([
        ":bal"=>$bal,
        // ":modified"=>$date,
        ":id"=>$id
    ]);
    if($r){
        return $r;
    }
    else{
        $e = $stmt->errorInfo();
        flash("Error updating: " . var_export($e, true));
    }
    return $r;
}


        function getAccount($n){
            switch ($n) {
                case "checking":
                    echo "Checking";
                    break;
                case "savings":
                    echo "Savings";
                    break;
                case "loan":
                    echo "Loan";
                    break;
                case "world":
                    echo "World";
                    break;
                default:
                    echo "Unsupported state: " . se($n);
                    break;
                }
        
        
    }
 


