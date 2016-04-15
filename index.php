<?php
require 'fixture/class.test.php';
require 'class.vigenerecipher.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Vigenère Cipher Test Fixture</title>
  </head>
  <body>
    <h1>Vigenère Cipher Test Fixture</h1>
    <h2>Initialization Tests</h2>
    <?php
    $init = new Test;
    $cipher = new VigenèreCipher("key", "abc");
    $init->assert_equals($cipher->key, "key");
    $init->assert_equals($cipher->alphabet, "abc");
    $cipher = new VigenèreCipher("orange", "abcdefghijklmnopqrstuvwxyz");
    $init->assert_equals($cipher->key, "orange");
    $init->assert_equals($cipher->alphabet, "abcdefghijklmnopqrstuvwxyz");
    $cipher = new VigenèreCipher("password", "abcdefghijklmnopqrstuvwxyz");
    $init->assert_equals($cipher->key, "password");
    $init->assert_equals($cipher->alphabet, "abcdefghijklmnopqrstuvwxyz");
    $cipher = new VigenèreCipher("LEMON", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $init->assert_equals($cipher->key, "LEMON");
    $init->assert_equals($cipher->alphabet, "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $init->print_summary();
    ?>
    <h2>Encryption/Decryption Tests</h2>
    <?php
    $main = new Test;

    $cipher = new VigenèreCipher('password', 'abcdefghijklmnopqrstuvwxyz');
    $main->assert_equals($cipher->encrypt('codewars'), 'rovwsoiv');
    $main->assert_equals($cipher->decrypt('rovwsoiv'), 'codewars');
    $main->assert_equals($cipher->encrypt('waffles'), 'laxxhsj');
    $main->assert_equals($cipher->decrypt('laxxhsj'), 'waffles');
    $main->assert_equals($cipher->encrypt("it's a shift cipher!"), "xt'k o vwixl qzswej!");
    $main->assert_equals($cipher->decrypt("xt'k o vwixl qzswej!"), "it's a shift cipher!");

    $cipher = new VigenèreCipher('PASSWORD', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $main->assert_equals($cipher->encrypt('CODEWARS'), 'ROVWSOIV');
    $main->assert_equals($cipher->decrypt('ROVWSOIV'), 'CODEWARS');
    $main->assert_equals($cipher->encrypt('WAFFLES'), 'LAXXHSJ');
    $main->assert_equals($cipher->decrypt('LAXXHSJ'), 'WAFFLES');
    $main->assert_equals($cipher->encrypt("IT'S A SHIFT CIPHER!"), "XT'K O VWIXL QZSWEJ!");
    $main->assert_equals($cipher->decrypt("XT'K O VWIXL QZSWEJ!"), "IT'S A SHIFT CIPHER!");

    $cipher = new VigenèreCipher('pizza', 'abcdefghijklmnopqrstuvwxyz');
    $main->assert_equals($cipher->encrypt('asodavwt'), 'pancakes');
    $main->assert_equals($cipher->decrypt('pancakes'), 'asodavwt');
    $main->assert_equals($cipher->encrypt('javascript'), 'yiuzsrzhot');
    $main->assert_equals($cipher->decrypt('yiuzsrzhot'), 'javascript');

    $cipher = new VigenèreCipher('PIZZA', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $main->assert_equals($cipher->encrypt('ASODAVWT'), 'PANCAKES');
    $main->assert_equals($cipher->decrypt('PANCAKES'), 'ASODAVWT');
    $main->assert_equals($cipher->encrypt('JAVASCRIPT'), 'YIUZSRZHOT');
    $main->assert_equals($cipher->decrypt('YIUZSRZHOT'), 'JAVASCRIPT');

    // $cipher = new VigenèreCipher('カタカナ', 'アイウエオァィゥェォカキクケコサシスセソタチツッテトナニヌネノハヒフヘホマミムメモヤャユュヨョラリルレロワヲンー');
    //
    // $main->assert_equals($cipher->encrypt('カタカナ'), 'タモタワ');
    // $main->assert_equals($cipher->decrypt('タモタワ'), 'カタカナ');
    // $main->assert_equals($cipher->encrypt('javascript'), 'javascript');
    // $main->assert_equals($cipher->decrypt('javascript'), 'javascript');
    // $main->assert_equals($cipher->encrypt('ドモアリガトゴザイマス'),'ドオカセガヨゴザキアニ');
    // $main->assert_equals($cipher->decrypt('ドオカセガヨゴザキアニ'),'ドモアリガトゴザイマス');

    $main->print_summary();
    ?>
    <h2>Summary</h2>
    <?php
    $final = new Test;
    $final->expect($init->passes > 0);
    $final->expect($init->fails === 0);
    $final->expect($main->passes > 0);
    $final->expect($main->fails === 0);
    $final->print_summary();
    ?>
  </body>
</html>
