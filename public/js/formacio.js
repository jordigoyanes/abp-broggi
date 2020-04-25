var interval;
var tiempoActual;
var second;

        function playVid(){

            var vid = document.getElementById("video");

            vid.play();

           startTimer();


        }
        function pauseVid(){

            var vid = document.getElementById("video");

            vid.pause();
            clearInterval(interval);
            tiempoActual = Math.round(vid.currentTime);

            vid.currentTime = tiempoActual;
        }

        function startTimer(){

            var timer = document.querySelector("#time");
            if(timer.innerHTML == ""){

                second = 1;
            }
            else {
                second = tiempoActual + 1;
            }



            interval =
            setInterval(function(){

                document.getElementsByClassName("tiempo")[0].style.backgroundColor = "green";

                timer.innerHTML = second + " segundos";
                second++;
                if( second > 8){
                document.getElementsByClassName("tiempo")[0].style.backgroundColor = "orange";

                }
                if( second > 12){
                    document.getElementsByClassName("tiempo")[0].style.backgroundColor = "red";

                }

                if (second == 15) {
                    clearInterval(interval);
                    timer.innerHTML = "Se ha acabado el video";
                }


            },1000);

        }

        // FUNCIO PER AVANÇAR DOS SEGONS EN EL TEMPS
        function aumentar(){

            var vid = document.getElementById("video");


            vid.currentTime = vid.currentTime + 2;

            second = Math.round(vid.currentTime) + 1;




        }
