import anime from 'animejs/lib/anime.es.js';

export function animejs() {
	
	// Banner text animation
	
	var textWrapper = document.querySelector('.ml10 .letters');
	textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
	
	anime.timeline({
		loop: false,
		easing: 'easeOutExpo'
	})
	.add({
		targets: '.ml10 .insonder',
		opacity: 0,
		duration: 0,
		delay: 500
	})
	.add({
		targets: '.ml10 .line:nth-child(1) .letter',
		rotateY: [-90, 0],
		duration: 500,
		delay: (el, i) => 45 * i
	})
	.add({
		targets: '.ml10 .line:nth-child(2)',
		rotateY: [-90, 0],
		duration: 1000
	})
	.add({
		targets: '.ml10 .line:nth-child(3)',
		rotateY: [-90, 0],
		duration: 1000
	})
	.add({
		targets: '.ml10 .insonder',
		opacity: 1,
		duration: 1000
	})
	
	
	// Anime Reveal
	
	let observer_reveal;
	const items_reveal = document.querySelectorAll('.anime-reveal');
	
	observer_reveal = new IntersectionObserver((entries) => {
	  entries.forEach(entry => {
		if (entry.intersectionRatio > 0) {
			anime.timeline({
				loop: false,
				easing: 'easeOutExpo'
			})
			.add({
				targets: entry.target,
				opacity: 1,
				duration: 200
			})
			.add({
				targets: entry.target,
				rotateY: [-90, 0],
				delay: 600,
				duration: 2000
			})
			observer_reveal.unobserve(entry.target);
			} else {
				// entry.target.classList.remove('anime-reveal');
			}
		});
	});
	
	items_reveal.forEach(image => {
	  observer_reveal.observe(image);
	});
	
	
	// Anime Fade in
	
	let observer_fadein;
	const items_fadein = document.querySelectorAll('.anime-fadein');
	
	observer_fadein = new IntersectionObserver((entries) => {
	  entries.forEach(entry => {
		if (entry.intersectionRatio > 0) {
			anime.timeline({
				loop: false,
				easing: 'linear'
			})
			.add({
				targets: entry.target,
				opacity: 0,
				delay: 0,
				duration: 0
			})
			.add({
				targets: entry.target,
				opacity: 1,
				translateY: [30, 0],
				delay: 500,
				duration: 600
			})
			observer_fadein.unobserve(entry.target);
		} else {
		  // entry.target.classList.remove('anime-fadein');
		}
	  });
	});
	
	items_fadein.forEach(image => {
	  observer_fadein.observe(image);
	});
	
	
}