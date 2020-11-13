<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <?php include_once("header.php")?>
<?php include("classes/database.php");
use classes\database;
    $variable = new database("localhost", "root", "", "todos",3306);
    if (isset($_POST['submit'])) {
        if (!empty($_POST['title']) && !empty($_POST('task'))) {
            $variable->addTask($_POST['title'], $_POST['task']);
        }
    }
    if ($_SESSION == true){
        $variable->displayToDo();
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
    <!-- New ToDo -->
    <section id="yourtodo" class="wrapper style1-alt fullscreen fade-up">
        <div class="inner">
            <h2>Here goes your todo</h2>
                <section>
                <form method="post" action="todo.php">
                    <div class="fields">
                        <div class="field quarter"
                        <label for="title">Name of the PotaToDo</label>
                        <input type="text" name="title" id="title" required>
                    </div>
                        <div class="field fullscreen"
                        <label for="task">Task</label>
                        <input type="text" name="task" id="task" required>
                    </div>

                        </div>
                <ul class="actions">
                <li><input type="submit" name="add" class="button submit" value="Add"/></li>
                </ul>
                </form>
                </section>
            </div>
        </div>


    <section id="history" class="wrapper style1 fullscreen fade-up">
    </section>

    <section id="logout" class="wrapper style1 fullscreen fade-up" >
        <p id="logout"></p>
    </section>
</div>

<footer id="footer" class="wrapper style1-alt">
    <?php include_once("footer.php");?>
</footer>
</body>
</html>