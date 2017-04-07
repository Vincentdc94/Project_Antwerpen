TIM = {};

TIM.experience = (function() {

	var timeline = [{
		delay: 0,
		title: "Elle Moe Is Elle Va",
		subtitle: "Groeten Van Domien Vissenaeken",
		eventType: "changeTextFade",
		delayStop: 3000,
	},
	{
		delay: 2000,
		title: "De paashaas is gezonken",
		subtitle: "Wat de fok m8",
		eventType: "changeTextFade",
		delayStop: 3000,
	},
	{
		delay: 3000,
		title: "Jesse is een geile jongen",
		subtitle: "Groeten Van Adam",
		eventType: "changeTextFade",
		delayStop: 4000,
	},
	{
		delay: 4000,
		title: "Mijn penis is de grootste",
		subtitle: "Groeten Van Vincent De Coen",
		eventType: "changeTextFade",
		delayStop: 6000,
	}
	];

	var btnStart;
	var contentTitle;
	var contentSubTitle;

	var start = function() {
		// images = document.getElementsByClassName("images-holder");
		// resizeImages(images);

		// body = document.getElementsByTagName("body")[0];

		// if (document.body.contains(experience)) {
		//     body.classList.add("experience");
		// }

		contentTitle = document.getElementById("content-title");
		contentSubTitle = document.getElementById("content-subtitle");
		btnStart = document.getElementById("start-experience");

		btnStart.addEventListener("click", startTimeline, false);

		animateOverlay();
		
		
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

	var hideExperience = function() {
		btnStart.classList.add("hide");
	}

	var changeTextFade = function(timeLineEvent) {
		contentTitle.classList.add("hide");
		contentSubTitle.classList.add("hide");
		
		(function(){
			setTimeout(() => {
				contentTitle.classList.remove("hide");
				contentSubTitle.classList.remove("hide");
				contentTitle.innerHTML = '<span class="animate-text">' + timeLineEvent.title + '</span>';
				contentSubTitle.innerHTML = '<span class="animate-text">' + timeLineEvent.subtitle + '</span>';
			}, 500)
		})();
	}

	var experienceEvent = function(timeLineEvent) {
		if (timeLineEvent.eventType === "changeTextFade") {
			changeTextFade(timeLineEvent)
		}

		if (timeLineEvent.eventType === "images") {
			addImages(timeLineEvent.element, timeLineEvent.delay)
		}
	}

	var remove = function(element) {
		element.classList.add("hide")
	}

	var animateOverlay = function(){
		var contentOverlay = document.getElementById("content-overlay");
		var contentOverlay2 = document.getElementById("content-overlay-2");
		var contentOverlay3 = document.getElementById("content-overlay-3");

		contentOverlay.classList.add("content-overlay-animate");

		setTimeout(() => {
			contentOverlay2.classList.add("content-overlay-animate2");
		}, 300);

		setTimeout(() => {
			contentOverlay3.classList.add("content-overlay-animate3");
		}, 700);		
	}

	// var resizeImages = function(imageHolder) {

	// 	for(var imageHolderIndex = 0; imageHolderIndex < imageHolder.length; imageHolderIndex++){


	// 		var imageHolderElement = imageHolder[imageHolderIndex].children;

	// 		for(var imageIndex = 0; imageIndex < imageHolderElement.length; imageIndex++){
	// 			var imageWidth = 100 / imageHolderElement.length;
	// 			imageHolderElement[imageIndex].style.width = imageWidth.toString() + "%";
	// 			imageHolderElement[imageIndex].classList.add("ellemoe");
	// 		}

	// 	}
	// }

	// var addImages = function(imageHolder, delay) {
	// 	var images = imageHolder.children;
	// 	var imageDelay = 0



	// 	for (let imageIndex = 0; imageIndex < images.length; imageIndex++) {
	// 		image = images[imageIndex]

	// 		imageDelay += delay;

	// 		(function(image, delay) {
	// 			setTimeout(function() {
	// 				image.classList.add("t-image-animation")
	// 			}, delay)
	// 		})(image, imageDelay)

	// 	}
	// }

	return {
		start: start
	}

})();
