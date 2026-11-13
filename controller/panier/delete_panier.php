<?php
unset($_SESSION['panier']);

header("Location: ?route=panier");
exit();