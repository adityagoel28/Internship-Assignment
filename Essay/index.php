<?php
    $title = 'Home'; 
    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 
?>
    <h1>Internship Assignment</h1>
    <h3>Type in the textbox to automatically count the words and time taken.</h3>
    <br><br>
    <form method = "post" action = "submit.php">
        <label style = "font-size:20px;">Text Input</label><br>
        <!-- <input required type="text" name = "essay" id = "word" oninput = "countWord() , startTimer()" rows="10" cols="60" style="width:50%; height:200px;"> -->
        <textarea id = "word" name = "essay_content" oninput = "countWord() , displayChange()"  rows ="10" cols ="60" required>
        </textarea>
       
        <input type = "number" name = "word_count" id = "count_w" hidden>
        <input type = "string" name = "time_taken" id = "time_t" hidden>
        <br><br>
        <button type = "submit" name = "submit" class ="btn btn-primary btn-block" style = "width: 500px; margin: 0 auto;">Submit</button>
    </form>

    <h4> Word Count:
        <span id = "show">0</span>
    </h4>

    <h4> Time Taken:
        <span id = "timer">00:00:00</span>
    </h4>
        
    <script>

        (function () {
        const WORDS = document.getElementById('word');
        const OUTPUT = document.getElementById('show');
        const WORD_COUNT = document.getElementById('count_w'); // id here of hidden number input form element

        countWord = function () {
          let count = WORDS.value.split(' ').filter((w) => w).length;
          OUTPUT.innerText = WORD_COUNT.value = count;
        };

        WORDS.addEventListener('input', countWord);

        const TIMER = document.getElementById('timer');
        const TIME_TAKEN = document.getElementById('time_t'); // id here of hidden number input form element

        let timer = {};

        function displayChange() {
          let diff = Date.now() - startTime;
          timer.innerText = Math.round(diff / 1000);
        }

        function timerCycle() {
          if (!timer.id) return;
          let diff = Math.floor((Date.now() - timer.start) / 1000);

          let hr = Math.floor(diff / 3600);
          let min = Math.floor(diff / 60)%60;
          let sec = diff % 60;

          if (sec < 10 || sec == 0) sec = '0' + sec;
          if (min < 10 || min == 0) min = '0' + min;
          if (hr < 10 || hr == 0) hr = '0' + hr;

          TIMER.innerText = TIME_TAKEN.value = hr + ':' + min + ':' + sec;
        }

        function startTimer() {
          if (timer.id) return;
          timer.start = Date.now();
          timer.id = setInterval(timerCycle, 100);
        }
        
        function stopTimer() {
          if (!timer.id) return;
          clearInterval(timer.id);
          delete timer.id;
        }

        WORDS.addEventListener('input', startTimer);
      })();

        </script>

<?php require_once 'includes/footer.php'; ?>