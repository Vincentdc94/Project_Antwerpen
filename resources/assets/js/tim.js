TIM = {};

TIM.experience = (function() {

	//TODO: Toevoegen van text omhoogzetten voor plaats maken van afbeeldingen en het corrent weergeven van afbeeldingen

	var timeline = [{
			delay: 0,
			subtitle: "Antwerpen heeft veel te bieden",
			eventType: "changeTextFade",
			delayStop: 3000,
		},
		{
			delay: 2000,
			title: "Het Mas",
			subtitle: "Een mooi en modern museum",
			eventType: "changeTextFade",
			delayStop: 3000,
		},
		{
			delay: 0,
			source: "images/bezienswaardigheden/mas.jpg",
			eventType: "backgroundImageFade",
			delayStop: 4000
		},
		{
			delay: 4000,
			title: "De kathedraal",
			subtitle: "Een glorieus bastion van religie & cultuur",
			eventType: "changeTextFade",
			delayStop: 3000,
		},
		{
			delay: 0,
			source: "images/bezienswaardigheden/kathedraal.jpg",
			eventType: "backgroundImageFade",
			delayStop: 4000
		},
		{
			delay: 4000,
			title: "De Groenplaats",
			subtitle: "Het hart van Antwerpen.",
			eventType: "changeTextFade",
			delayStop: 3000,
		},
		{
			delay: 0,
			source: "images/bezienswaardigheden/groenplaats.jpg",
			eventType: "backgroundImageFade",
			delayStop: 4000
		},
		{
			delay: 4000,
			eventType: "end",
			delayStop: 4000
		},
		{
			delay: 0,
			source: "",
			eventType: "backgroundImageFade",
			delayStop: 4000
		},
		{
			delay: 0,
			title: "Bedankt",
			subtitle: "Kijk op de site om meer te ontdekken",
			eventType: "changeTextFade",
			delayStop: 3000,
		},
	];

	var contentTitle;
	var contentSubTitle;
	var contentImage;
	var end;

	var btnStart;

	var start = function() {
		contentTitle = document.getElementById("content-title");
		contentSubTitle = document.getElementById("content-subtitle");
		contentImage = document.getElementById("content-image");
		end = document.getElementById("end");
		end.style.display = "none";

		btnStart = document.getElementById("start-experience");

		btnStart.addEventListener("click", startTimeline, false);

		animateOverlay();	
	};

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
			})(timeLineEvent, timelineDelay);

			timelineDelayStop += timeLineEvent.delayStop;

			(function(timeLineEvent, timeLineDelay) {
				setTimeout(function() {
					remove(timeLineEvent.element);
				}, timeLineDelay);
			})(timeLineEvent, timelineDelayStop);
		}

	};

	var hideExperience = function() {
		btnStart.classList.add("hide");
	};

	var changeTextFade = function(timeLineEvent) {
		if(timeLineEvent.title !== undefined){
			contentTitle.classList.add("hide");
		}

		if(timeLineEvent.subtitle !== undefined){
			contentSubTitle.classList.add("hide");
		}
		
		(function(){
			setTimeout(() => {
				if(timeLineEvent.title !== undefined){
					contentTitle.classList.remove("hide");
					contentTitle.innerHTML = '<span class="animate-text">' + timeLineEvent.title + '</span>';
				}
				
				if(timeLineEvent.subtitle !== undefined){
					contentSubTitle.classList.remove("hide");
					contentSubTitle.innerHTML = '<span class="animate-text">' + timeLineEvent.subtitle + '</span>';
				}
			}, 500);
		})();
	};

	var backgroundImageFade = function(timeLineEvent){

		if(timeLineEvent.source === ""){
			contentImage.classList.remove("animate-image");
			contentImage.classList.add("hide");
			return;
		}

		if(timeLineEvent.source !== undefined){
			contentImage.classList.remove("animate-image");
		}

		(function(){
			setTimeout(() => {
				if(timeLineEvent.source !== undefined){
					contentImage.classList.remove("hide");
					contentImage.setAttribute('src', timeLineEvent.source);
					contentImage.classList.add("animate-image");
				}
			}, 500);
		})();
	};

	var endAnim = function(timeLineEvent){
		var start = document.getElementById("start");
		start.style.display = "none";
		end.style.display = "block";
		end.classList.remove("hide");
		end.classList.add("animate-text");
	};

	var experienceEvent = function(timeLineEvent) {
		if(timeLineEvent.eventType === "end"){
			endAnim(timeLineEvent);
		}

		if (timeLineEvent.eventType === "changeTextFade") {
			changeTextFade(timeLineEvent);
		}

		if(timeLineEvent.eventType === "backgroundImageFade"){
			backgroundImageFade(timeLineEvent);
		}

		if (timeLineEvent.eventType === "images") {
			addImages(timeLineEvent.element, timeLineEvent.delay);
		}
	};

	var remove = function(element) {
		element.classList.add("hide");
	};

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
	};

	return {
		start: start
	};

})();
