<?php
require __DIR__ . '/models/bd.php';

require __DIR__ . '/controllers/varios.php';

require __DIR__ . '/controllers/utilsforms.php';

echo $blade->render('login');