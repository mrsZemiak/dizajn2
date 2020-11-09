<?php
include_once("classes\database.php");

use classes\database;

$db = new database("localhost", "root", "", "todos",3306);

if(isset($_SESSION['userId'])){
    $menuStuffs=$db->getMenuStuffs($_SESSION['userId']);
}else{
    $menuStuffs=$db->getMenuStuffs($_SESSION['']);
}

?>

<div class="inner">
    <nav>

        <?php
        foreach ($menuStuffs as $key => $menuStuff){
        ?>
        <ul>
            <li><a href="#<?php echo $menuStuff['path'];?>">
                    <i class="fas <?php echo $menuStuff['icon']; ?> nav-icon"></i>
                  <?php echo $menuStuff['name'];
                        ?>
                </a>
            </li>
        </ul>

        <?php } ?>

    </nav>
</div>

