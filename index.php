<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<?php include_once("header.php")?>
        <?php include("classes/database.php");
        use classes\database;
        ?>
        <?php
        $variable = new database("localhost", "root", "", "todos",3306);
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           if (!empty($_POST['firstname'])){
                $variable->register($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
         }
        }
        if ($_SERVER['REQUEST_METHOD']== 'POST'){
            if (!empty($_POST['email'])){
                $variable->login($_POST['email'],$_POST['password']);
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

				<!-- Intro -->
					<section id="intro" class="wrapper style1-alt fullscreen fade-up">
						<div class="inner">
							<h1>PotaToDo</h1>
							<p>Just another catchy, simple but most importantly: <strong> really tasty website for your daily ToDos.</strong>
                                Let's register now and start making your own PotaToDos.</p>
							<ul class="actions">
								<li><a href="#two" class="button scrolly">Sign Up!</a></li>
                            </ul>
                            <ul class="actions">
                                <li> <p>Already in your own potatoes? <a href="#one" class="scrolly">Sign in!</a></p> </li>
							</ul>

						</div>
					</section>

				<!-- One -->
                <section id="one" class="wrapper style1 fullscreen fade-up">
                    <div class="inner">
                        <h2>Sign In</h2>
                        <div class="split style1">
                            <section>
                                <form action="index.php" method="post">
                                    <div class="fields">
                                        <div class="field half">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" required/>
                                        </div>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" name="login" class="button submit" value="Login"/></li>
                                    </ul>
                                </form>
                            </section>
                        </div>
                </section>


                <!-- Two -->
                <section id="two" class="wrapper style1 fullscreen fade-up">
                    <div class="inner">
                        <h2>Sign Up</h2>
                        <div class="split style1">
                            <section>
                                <form action="index.php" method="post">
                                    <div class="fields">
                                        <div class="field half">
                                            <label for="firstname">First name</label>
                                            <input type="text" name="firstname" id="firstname" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="lastname">Last name</label>
                                            <input type="text" name="lastname" id="lastname" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" required />
                                        </div>
                                        <div class="field half">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" required/>
                                        </div>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" name="register" class="button submit" value="Register"/></li>
                                    </ul>
                                </form>
                            </section>
                        </div>
					</section>

				<!-- Three -->
                <section id="three" class="wrapper style2 fullscreen spotlights">
                    <section>
                        <a href="https://www.ki.fpv.ukf.sk/o-katedre/" class="image"><img src="images/ki.png" alt="katedrainf" data-position="center center"/></a>
                        <div class="content">
                            <div class="inner">
                                <h2>About PotaToDo</h2>
                                <div class="split style1">
                                <div class="actions">
                                    <p>This project was created at the Department of Informatics,
                                    University of Constantine the Philosopher in Nitra</p>

                                    <ul class="actions">
                                        <li><a href="https://www.ki.fpv.ukf.sk/" class="button scrolly">Learn more</a></li>
                                    </ul>
                                </div>

                                    </li>
                                    <ul class="contact">
                                            <li>
                                                <h3>Address</h3>
                                                <span>Tr.Andreja Hlinku 1<br/>
											Nitra, 949 01<br/>
											Slovensko</span>
                                            </li>
                                            <li>
                                                <h3>Email</h3>
                                                <a href="mailto: ukf@ukf.sk subject = Question">ukf@ukf.sk</a>
                                            </li>
                                            <li>
                                                <h3>Phone</h3>
                                                <span>+421 37 6408 111</span>
                                            </li>
                                            <li>
                                                <h3>Social</h3>
                                                <ul class="icons">
                                                    <li><a href="https://www.facebook.com/UKFvNitre" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                                    <li><a href="https://github.com/mrsZemiak/dizajn2" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
                                                    <li><a href="https://www.instagram.com/informatikavnitre/?hl=sk" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                                                    <li><a href="https://www.linkedin.com/school/constantine-the-philosopher-university-in-nitra/" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                                                </ul>
                                            </li>
                                    </ul>
                            </div>
                        </div>
                        </div>
                    </section>
		<!-- Footer -->
        <footer id="footer" class="wrapper style1-alt">
                <?php include_once("footer.php");?>
			</footer>
	</body>
</html>