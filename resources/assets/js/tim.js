TIM = {}

TIM.experience = (function(){

    var timeline = [
      {delay: 2000, element: document.getElementById("balloon-1")}
    ];

    var start = function(){

      body = document.getElementsByTagName("body")[0];

      if(document.body.contains(experience)){
        body.classList.add("experience");
      }

      window.addEventListener("DOMContentLoaded", startTimeline, false);

    }

    var startTimeline = function(){

      for(tEvent in timeline){
        timeLineEvent = timeline[tEvent];
        setTimeout(function(){
          addBalloon(timeLineEvent.element);
        }, timeLineEvent.delay);
      }

    }

    var addBalloon = function(balloon){
      balloon.classList.add("balloon-animation");
    }

    return{
      start: start
    }

})();
