<?php

setcookie('user', '', time() - 24 * 3600);
setcookie('count', null, time() - 24 * 3600);
header('Location: index.php');