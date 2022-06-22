<html>
    <head>
    <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
    </style>
    </head>
    <body>
        <table id="customers">
            <form>
                <label for="title">Book name:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="author">Author:</label><br>
                <input type="text" id="author" name="author"><br>
                <label for="descripcion">Description:</label><br>
                <input type="text" id="descripcion" name="description"><br><br>
                <input type="submit" value="Submit">
            </form>
            <tbody>
                <tr><th><b>Title</b></th><th><b>Author</b></th><th><b>Description</b></th></tr>
            </tbody>
            <?php foreach ($books as $Title => $book){
                echo '<tr>';
                echo '<td><a href="index.php?book='.$book->title.'">'.$book->title.'</a></td>';
                echo '<td>'.$book->author.'</td>';
                echo '<td>'.$book->description.'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>