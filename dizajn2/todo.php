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

    if (isset($_POST['delete'])) {

        if ($variable->deleteTodo($_POST['delete'])) {
            header('Location: todo.php');
        }
    }
?>
</head>
    <body class="is-preload">

<!-- Sidebar -->
        <section id="sidebar">
        <?php include_once("nav.php");?>
        </section>

<!-- Wrapper -->
        <div id="wrapper">
            <section id="todos" class="wrapper style1-alt fullscreen fade-up">
                <div class="inner">
                    <h2><i style="display: inline-flex; margin-right: 10px" class="fas fa-plus-square"></i>New PotaToDo</h2>
                    <section>
                        <form method="post" action="todo.php">
                            <div class="fields">
                                <div class="field half">

                                    <input type="text" name="title" id="title" placeholder="name, for example: shopping list" required="">
                                </div>
                            </div>
                            <ul class="actions">
                                <li><button type="submit"> Create new Potato</button></li>
                            </ul>
                        </form>
                    </section>
                    <section class="wrapper style1 fade-up">
                        <div class="inner">
                            <h2>Your Todolists</h2>
                            <div id="row">
                            <?php if($todolists){
                                foreach ($todolists as $key => $todolist){ ?>
                                 <div style="display: flex">
                                        <p><i style="display: inline-flex; margin-right: 10px" class="fas fa-tasks"></i><a href="todoDetail.php?id=<?php echo $todolist['idtodo']; ?>" style="color: white;"><?php echo $todolist['title'];?></a></p>
                                <div style="margin-left:auto; display:inline-flex;">
                                    <form action="todo.php" method="post">
                                        <input type="hidden" name="delete" id="delete" value="<?php echo $todolist['idtodo']; ?>" />
                                        <button type="submit" onclick="return confirm('Are you sure, that you want to delete this todolist? ')" class="small"><i class="fas fa-trash""></i></button>

                                    </form>
                                </div>
                                 </div>

                                <?php }} else{ ?>
                                <h3>Nemáte žiaden totolist, musíte si nejaký vytvoriť</h3>
                            <?php }?>
                            </div>
                        </div>
                    </section>

                </div>
            </section>




    <footer id="footer" class="wrapper style1-alt">
        <?php include_once("footer.php");?>
    </footer>
</body>
</html>
