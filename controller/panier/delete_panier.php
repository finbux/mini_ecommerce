<?php
unset($_SESSION['panier']);

header("Location: ?route=show_panier");
exit();