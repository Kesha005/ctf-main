<br>
    <div class="text-right">
        <div id="year" class="year"></div>
        <div id="countdown" class="countdown">
            <div class=" col-lg-11 text-right">
                <h2 id="days" hidden>00</h2>
                <h4 class="fas" id="hours">00:</h4>
                <small class="fas">sagat</small>
                <h4 id="minutes" class="fas">00:</h4>
                <small class="fas">minut</small>
                <h4 class="fas" id="seconds">00</h4>
                <small class="fas">sekunt</small><br>
                <a href="{{ route('game_over_admin') }}" id="h" name="h" hidden></a>
            </div>
               
        </div>
    </div>


<a href="{{ route('game_over_admin') }}" id="h" name="h" hidden></a>
 <script type="text/javascript">
     const days = document.getElementById('days');
     const hours = document.getElementById('hours');
     const minutes = document.getElementById('minutes');
     const seconds = document.getElementById('seconds');
     const countdown = document.getElementById('countdown');
     const year = document.getElementById('year');
     const loading = document.getElementById('loading');

     const month = <?php echo json_encode($c_month); ?>;
     const currentYear = <?php echo json_encode($c_year); ?>;
     const curr_date = <?php echo json_encode($c_date); ?>;
     const curr_time = <?php echo json_encode($c_time); ?>;
     console.log(month, currentYear, curr_date, curr_time);


     const newYearTime = new Date(` ${month} ${curr_date} ${currentYear} ${curr_time} `);

     // Set background year


     // Update countdown time
     function updateCountdown() {
         const currentTime = new Date();
         const diff = newYearTime - currentTime;
         if (diff <= 0) {
             document.getElementById('h').click();
         }
         const d = Math.floor(diff / 1000 / 60 / 60 / 24);
         const h = Math.floor(diff / 1000 / 60 / 60) % 24;
         const m = Math.floor(diff / 1000 / 60) % 60;
         const s = Math.floor(diff / 1000) % 60;

         // Add values to DOM
         days.innerHTML = d;
         hours.innerHTML = h < 10 ? '0' + h : h;
         minutes.innerHTML = m < 10 ? '0' + m : m;
         seconds.innerHTML = s < 10 ? '0' + s : s;






     }

     // Show spinner before countdown
     setTimeout(() => {
         loading.remove();
         countdown.style.display = 'flex';
     }, 1000);

     // Run every second
     setInterval(updateCountdown, 1000);
 </script>