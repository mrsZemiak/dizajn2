<?php
include_once("classes\database.php");

use classes\database;

$db = new database("localhost", "root", "", "todos",3306);
$link = mysqli_connect("localhost", "root", "", "todos",3306);
$menuStuffs=$db->getMenuStuffs();
?>

<div class="inner">
    <nav>

        <?php
            if ($_SESSION==null){
        $sql = "SELECT * FROM menu WHERE logged_in=0";
        mysqli_select_db($link, 'todos');
        $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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

        <?php }
        }
            }elseif(!($_SESSION == null)){
        $sql = "SELECT * FROM menu WHERE logged_in=0";
        mysqli_select_db($link, 'todos');
        $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
        <?php }
        }
            }else echo 'ERROR OCCURED.'?>
    </nav>
</div>

