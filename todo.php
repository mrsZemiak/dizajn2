<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <?php include_once("header.php")?>
<?php include("classes/database.php");
use classes\database;
    $variable = new database("localhost", "root", "", "todos",3306);
    if (isset($_POST['title'])) {
        if (!empty($_POST['title'])) {
            $variable->addTask($_POST['title']);
        }
    }
    $todolists = $variable->displayToDo($_SESSION['userId']);

?>


</head>
    <body class="is-preload">

<!-- Sidebar -->
        <section id="sidebar">
        <?php include_once("nav.php");?>
        </section>

<!-- Wrapper -->
        <div id="wrapper">

            <section id="todos" class="wrapper style1 fullscreen fade-up">
                 <div class="inner">
                    <h2>Your Todolists</h2>
                        <?php if($todolists){
                            foreach ($todolists as $key => $todolist){ ?>
                             <div id="row">
                                 <p><a href="todoDetail.php?id=<?php echo $todolist['id_todolists']; ?>" style="color: white;"><?php echo $todolist['title'];?></a></p>
                             </div>
                            <?php }} else{ ?>
                            <h3>Nemáte žiaden totolist, musíte si nejaký vytvoriť</h3>
                            <?php }?>
                 </div>
            </section>

            <section id="newtodo" class="wrapper style1-alt fullscreen fade-up">
            <div class="inner">
                    <h2>Here goes your todo</h2>
                     <section>
                         <form method="post" action="todo.php">
                             <div class="fields">
                                 <div class="field half">
                                        <label for="title">Name of the PotaToDo</label>
                                        <input type="text" name="title" id="title" required>
                                 </div>
                             </div>
                            <ul class="actions">
                             <li><button type="submit"> Create new Potato</button></li>
                            </ul>
                         </form>
                    </section>
            </div>
            </section>

    <footer id="footer" class="wrapper style1-alt">
        <?php include_once("footer.php");?>
    </footer>
</body>
</html>
