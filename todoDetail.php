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
<!--    <script>-->
<!--        function post(path, params, method='post') {-->
<!---->
<!--            // The rest of this code assumes you are not using a library.-->
<!--            // It can be made less wordy if you use one.-->
<!--            const form = document.createElement('form');-->
<!--            form.method = method;-->
<!--            form.action = path;-->
<!---->
<!--            for (const key in params) {-->
<!--                if (params.hasOwnProperty(key)) {-->
<!--                    const hiddenField = document.createElement('input');-->
<!--                    hiddenField.type = 'hidden';-->
<!--                    hiddenField.name = key;-->
<!--                    hiddenField.value = params[key];-->
<!---->
<!--                    form.appendChild(hiddenField);-->
<!--                }-->
<!--            }-->
<!---->
<!--            document.body.appendChild(form);-->
<!--            form.submit();-->
<!--        }-->
<!---->
<!--        function check(tasks, id_todolists){-->
<!--            if (tasks.target().checked()){-->
<!--                post('todoDetail.php?id='+id_todolists, 1);-->
<!--            }else{-->
<!--                post('todoDetail.php?id='+id_todolists, 0);-->
<!--            }-->
<!--        }-->
<!--    </script>-->
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
                    <div id="row"> <h2>Add your task to your todo</h2>
                         <section>
                            <form method="post" action="todoDetail.php?id=<?php echo $id_todolists; ?>">
                                <div class="fields">
                                    <div class="field quarter">
                                        <label for="task">Task:</label>
                                        <input type="text" name="task" id="task" required>
                                    </div>
                                </div>
                                    <ul class="actions">
                                        <li><button type="submit">Add</button></li>
                                    </ul>
                            </form>

                         </section>
                    </div>
                <div id="row">
                    <?php if($tasks){
                    foreach ($tasks as $key => $task){ ?>
                        <button class="checkmark"></button>
                    <label for="task" ><?php echo $task['task'];?></label>
                    <li> <a href="todo.php">Update</a></li>

                    <?php }} else{ ?>
                        <h3>Nemáte žiaden task, musíte si nejaký vytvoriť</h3>
                        <ul class="actions">
                            <li> <p>Zero potatoes. <a href="#todos">Add something</a></p> </li>
                        </ul>
                    <?php }?>

                </div>
                </div>


            <section id="logout" class="wrapper style1 fullscreen fade-up" >
                    <p id="logout"></p>


<footer id="footer" class="wrapper style1-alt">
    <?php include_once("footer.php");?>
</footer>
</body>
</html>

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
