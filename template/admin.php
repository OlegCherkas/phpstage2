<?php
var_dump(getUser());
if(!getUser()){
    header('Location: template/login');
}
test(3);

?>

<h2>Admin panel</h2>