//✅ 1. preg_match() — Check for pattern match

<?php
$text = "Hello123";

if (preg_match("/[A-Za-z]+[0-9]+/", $text)) {
    echo "Pattern matched!";
} else {
    echo "No match found.";
}
?>

//✅ 2. preg_replace() — Replace using pattern

<?php
$text = "The price is $100";
$newText = preg_replace("/[0-9]+/", "***", $text);
echo $newText;
?>

//✅ 3. preg_match_all() — Find all matches

<?php
$text = "Emails: test1@gmail.com, test2@yahoo.com";
preg_match_all("/[\w.-]+@[\w.-]+\.\w+/", $text, $matches);

print_r($matches[0]);
?>

