TIM = {}

TIM.experience = (function() {

    var timeline = [{
            delay: 0,
            element: document.getElementById("balloon-1"),
            eventType: "balloon",
            delayStop: 6000,
        },
        {
            delay: 1000,
            element: document.getElementById("images-1"),
            eventType: "images",
            delayStop: 4000,
        }
    ];

    var btnStart;

    var start = function() {
        images = document.getElementsByClassName("images-holder");
        resizeImages(images);

        body = document.getElementsByTagName("body")[0];

        if (document.body.contains(experience)) {
            body.classList.add("experience");
        }

        btnStart = document.getElementById("start-experience");
        btnStart.addEventListener("click", startTimeline, false);
    }

    var resizeImages = function(imageHolder) {

      for(var imageHolderIndex = 0; imageHolderIndex < imageHolder.length; imageHolderIndex++){


        var imageHolderElement = imageHolder[imageHolderIndex].children;

        for(var imageIndex = 0; imageIndex < imageHolderElement.length; imageIndex++){
          var imageWidth = 100 / imageHolderElement.length;
          imageHolderElement[imageIndex].style.width = imageWidth.toString() + "%";
          imageHolderElement[imageIndex].classList.add("ellemoe");
        }

      }

    }

    var hideExperience = function() {
        btnStart.classList.add("hide");
    }

    var experienceEvent = function(timeLineEvent) {
        if (timeLineEvent.eventType === "balloon") {
            addBalloon(timeLineEvent.element)
        }

        if (timeLineEvent.eventType === "images") {
            addImages(timeLineEvent.element, timeLineEvent.delay)
        }
    }

    var startTimeline = function() {
        hideExperience();

        var timelineDelay = 0;
        var timelineDelayStop = 0;

        for (let tEvent in timeline) {
            var timeLineEvent = timeline[tEvent];
            timelineDelay += timeLineEvent.delay;

            (function(timeLineEvent, timeLineDelay) {
                setTimeout(function() {
                    experienceEvent(timeLineEvent);
                }, timelineDelay);
            })(timeLineEvent, timelineDelay)

            timelineDelayStop += timeLineEvent.delayStop;

            (function(timeLineEvent, timeLineDelay) {
                setTimeout(function() {
                    remove(timeLineEvent.element);
                }, timeLineDelay);
            })(timeLineEvent, timelineDelayStop)
        }

    }

    var remove = function(element) {
        element.classList.add("hide")
    }

    var addBalloon = function(balloon) {
        balloon.classList.add("balloon-animation");
    }

    var addImages = function(imageHolder, delay) {
        var images = imageHolder.children;
        var imageDelay = 0



        for (let imageIndex = 0; imageIndex < images.length; imageIndex++) {
            image = images[imageIndex]

            imageDelay += delay;

            (function(image, delay) {
                setTimeout(function() {
                    image.classList.add("t-image-animation")
                }, delay)
            })(image, imageDelay)

        }
    }

    return {
        start: start
    }

})().start();
