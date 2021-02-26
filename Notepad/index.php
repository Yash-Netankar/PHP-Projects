<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Notepad</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css.css" />
    <!-- FONTS -->
    <link rel="stylesheet" href="./fonts.css" />
    <!-- ICONS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <header>
        <nav class="menus">
          <ul>
            <li href="#" class="file">
              File &triangledown;
              <ul class="submenu">
                <li>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="form1">
                        <label for="file">Open</label>
                        <input type="file" name="file" id="file"/>
                    </form>
                </li>

                <li>Save</li>
                <li class="saveAs">Save As</li>
                <li>Close</li>
              </ul>

            </li>
            <li>Edit</li>
            <li>Insert</li>
            <li>Fonts</li>
          </ul>
        </nav>

        <hr />

        <nav class="options">
          <i class="fa fa-bold" aria-hidden="true" onclick="func('bold')"></i>
          <i class="fa fa-italic" aria-hidden="true"></i>
          <i class="fa fa-italic" aria-hidden="true"></i>
          <i class="fa fa-bold" aria-hidden="true"></i>
          <i class="fa fa-underline" aria-hidden="true"></i>
          <i class="fa fa-italic" aria-hidden="true"></i>
          <select name="select" id="select_size" onchange="FontSize()">
            <option value="1.0">10</option>
            <option value="1.2">12</option>
            <option value="1.4">14</option>
            <option value="1.6">16</option>
            <option value="1.8">18</option>
            <option value="2.0">20</option>
            <option value="2.2">22</option>
            <option value="2.4">24</option>
            <option value="2.6">26</option>
          </select>
          <i class="fa fa-font" aria-hidden="true"></i>
        </nav>
      </header>

      <main class="textarea">
        <form action = "./index2.php" method="POST" id="form2">
          <textarea name="textarea" id="textarea" placeholder="Start Typing here" onselect="disp()"><?php
            //error_reporting(0); ignoring warnings
            if(isset($_POST['file']))
            {
                session_start();
                $_SESSION['file_name'] = $_POST['file'];
                $fptr = fopen($_SESSION['file_name'], "r");

                if($fptr)
                {
                    $file_content = fread($fptr, filesize($_SESSION['file_name']));
                    echo($file_content);
                    fclose($fptr);
                }
                else echo "";
            }
            else echo "";
      ?></textarea>
        </form>
      </main>

      <div class="save-as-modal">
        <span class="close-modal">&times;</span>
        <form method="POST" action="./index3.php" autocomplete="off" id="form3">
          <label for="path">Path</label>
          <input type="text" name="path" id="path">

          <label for="filename">Filename</label>
          <input type="text" name="filename" id="filename">
          <small>With extension</small>

            <button type="submit" class="save">Save</button>
        </form>
      </div>

    </div>
    <script src="./js.js"></script>
  </body>
</html>