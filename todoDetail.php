<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <?php include_once("header.php")?>
    <?php include("classes/database.php");
    use classes\database;
    $variable = new database("localhost", "root", "", "todos",3306);
    $id_todolists= $_GET['id'];

    if (isset($_POST['task'])) {
        if (!empty($_POST['task'])) {
            $variable->addTaskForList($_POST['task'],$id_todolists);
        }
    }
    $tasks = $variable->displayTasks($id_todolists);

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
            <h2>Add your task to your todo</h2>
            <section>
                <form method="post" action="todoDetail.php?id=<?php echo $id_todolists; ?>">
                    <div class="fields">
                        <div class="field quarter"
                        <label for="task">Name of the PotaToDo</label>
                        <input type="text" name="task" id="task" required>
                    </div>
        </div>
        <ul class="actions">
            <li><button type="submit"> Create new Task</button></li>
        </ul>
        </form>
    </section>
</div>
</section>

<section id="todos" class="wrapper style1 fullscreen fade-up">
    <div class="inner">
        <h2>Your Tasks</h2>
        <?php if($tasks){
            foreach ($tasks as $key => $task){ ?>
                <div class="row"> <p><a href="" style="color: white;"><?php echo $task['task'];?></a></p></div>

            <?php }} else{ ?>
            <h3>Nemáte žiaden task, musíte si nejaký vytvoriť</h3>
        <?php }?>
    </div>
</section>




<!--
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
-->

<section id="logout" class="wrapper style1 fullscreen fade-up" >
    <p id="logout"></p>
</section>
</div>


<footer id="footer" class="wrapper style1-alt">
    <?php include_once("footer.php");?>
</footer>
</body>
</html>
