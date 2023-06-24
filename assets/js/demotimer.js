
 
function starttimmer(stime){
    alert(stime);
      var time=document.getElementsByClassName("timer")
    if(stime == ''){
      var timings=30;
    }
    else{
     // Get the current time
  var currentTime = new Date();
  
  // Extract the hour, minute, and second values
  var hours = currentTime.getHours();
  var minutes = currentTime.getMinutes();
  var seconds = currentTime.getSeconds();
  
  // Format the time as HH:MM:SS
  var timeString = hours.toString().padStart(2, '0') + ':' +
                   minutes.toString().padStart(2, '0') + ':' +
                   seconds.toString().padStart(2, '0');
  
  console.log("Current time (24-hour format):", timeString);
  
  var n = timeString;
   //  var timings =   30;
  
  
     // Define two time strings in the 24-hour format
  var timeString2 = stime;
  var timeString1 = n;
  alert(n);
  /// Create Date objects for each time string
  var date1 = new Date();
  var date2 = new Date();
  
  // Extract the hour, minute, and second values from the time strings
  var [hours1, minutes1, seconds1] = timeString1.split(":");
  var [hours2, minutes2, seconds2] = timeString2.split(":");
  
  // Set the time values for the Date objects
  date1.setHours(hours1, minutes1, seconds1);
  date2.setHours(hours2, minutes2, seconds2);
  
  // Calculate the time difference in milliseconds
  var timeDifferenceMs = date2 - date1;
  
  // Convert milliseconds to minutes
  var timeDifferenceMinutes = Math.floor(timeDifferenceMs / (1000 * 60));
  
  console.log("Time difference in minutes:", timeDifferenceMinutes);
  alert(timeDifferenceMinutes );
  
    var timings =  timeDifferenceMinutes;
    }
  
    alert(timings);
  var i=0;
      var myInterval = setInterval(Timeout, 1000);
      // console.log("time is"+/myInterval);
     function Timeout(){
       if((timings*60-i)%60>=10){
         time[0].innerHTML=parseInt(`${(timings*60-i)/60}`)+":"+`${(timings*60-i)%60}`;
       }
       else{
         time[0].innerHTML=parseInt(`${(timings*60-i)/60}`)+":0"+`${(timings*60-i)%60}`;
       }
       
      
       
  i++;
     }
  }
  var stime = $('#quiz_time').attr('time');
  starttimmer(stime);
  
  let setvalue =  setInterval(()=>{
      taketime()
  },1000);
   function taketime(){
      let tk =0;
      for(let i=0; i<1200000;i++){
  tk+=i;
      }
      return tk;
     
   }
   console.log(setvalue);
  
  
  
  $('#hideshowbtn').click(function(){
      console.log('clicked');
  
      // alert();
      // let quizbox=$('.quiz-box').html();
      $('.quiz_box').show();
      $('.mybox').hide();
      $('#infobox').hide();
    
   })