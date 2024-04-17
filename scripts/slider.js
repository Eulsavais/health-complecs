function slidesPlugin(active = 0) {
	const slides = document.querySelectorAll('.slide')

	slides[active].classList.add('active')

	slides.forEach(slide => {
		slide.addEventListener('click', () => {
			clearActiveClasses()
			slide.classList.add('active')
		})
	})

	function clearActiveClasses() {
		slides.forEach(slide => {
			slide.classList.remove('active')
		})
	}
}

slidesPlugin(3)