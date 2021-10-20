<?php
    $title = 'Submit'; 
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        $content = $_POST["essay_content"];
        $count_w = $_POST["word_count"];
        $time_t = $_POST["time_taken"];

        //Call function to insert and track if success or not
        $isSuccess = $crud->insert($content, $count_w, $time_t);

        echo "<br><br><span>Essay Content : <span>";
        echo "<span>$content</span>";
        echo "<br><span>Number of words : <span>";
        echo "<span>$count_w</span>";
        echo "<br><span>Time Taken : <span>";
        echo "<span>$time_t</span>";
    }
?>

<?php require_once 'includes/footer.php'; ?>