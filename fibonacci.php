<html>
    <body>
        <form method="post">
            <input type="number" name="Number" max="20">
            <button name="submit">Submit</button>
        </form>
    </body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $n = $_POST['Number'];
        $n1 = 0;
        $n2 = 1;
        echo "Fibonacci Series: \n";
        echo $n1.' '.$n2.' ';

        for($i = 2; $i < $n; $i++){
            $n3 = $n1 + $n2;
            echo $n3.' ';
            $n1 = $n2;
            $n2 = $n3;
        }
    }
?>