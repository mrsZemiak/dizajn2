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

?>


</head>
<body class="is-preload">

<!-- Sidebar -->
<section id="sidebar">
    <?php include_once("nav.php");?>
</section>

<!-- Wrapper -->
<div id="wrapper">
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
                        </div>
                <ul class="actions">
                    <li><a href="#todos" class="button scrolly">Create new Potato</a></li>
                </ul>
                </form>
                </section>
        </div>
    </section>



    <section id="todos" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <h2>Here goes your todo</h2>
            <section>
                <form method="post" action="todo.php">
                    <div class="fields">
                        <div class="field half">
                            <label for="task">new task</label>
                            <input type="text" name="task" id="task" required/>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" name="add" class="button" value="Add"/></li>
                    </ul>
                </form>
            </section>
        </div>
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