$(function() {

	const raceBtn = $('#raceBtn')
	const startOverBtn = $('#startOverBtn')
	const racingTrack = $('#racingTrack')
	const carOne = $('#carOne')
	const carTwo = $('#carTwo')
	const carOneLS = localStorage.getItem('carOne')
	const carTwoLS = localStorage.getItem('carTwo')
	const carOneTimeLS = localStorage.getItem('carOneTime')
	const carTwoTimeLS = localStorage.getItem('carTwoTime')
	const screenWidth = $(window).width() - carOne.width()

	let isRaceOver = false
	place = 'first'

	const resultTable = (body, carTime, color) => {
		$(body).prepend(
			`<tr>
				<td>Finished in: <span class='${color} font-weight-bold h5'>${place}</span> place with a time of <span class='${color} font-weight-bold h5'>${carTime}</span> milliseconds!</td>
			</tr>`
		)
	}

	const raceIsOver = () => {
		if (!isRaceOver) {
			isRaceOver = true;
			racingTrack.prepend('<div class="overlay"></div>')
			racingTrack.append(
				'<img src="./img/finish.gif" alt="" class="flag" />'
			).fadeIn(5000)
		} else {
			isRaceOver = false
			place = 'second'
			startOverBtn.removeAttr('disabled')
		}
	};

	if (carOneLS && carTwoLS && carOneTimeLS && carTwoTimeLS) {
		$('#results').append(
			`<div class="col-12 pl-3 pl-md-5 pb-xl-5 pb-lg-4 pb-md-5">
				<h3 class="mb-3 mb-md-0 pb-xl-3 pb-md-1">
					Results from the previous time you played this game:
				</h3>
			</div>
			<div class="col-12 pl-3 pl-md-5">
				<table class="table">
					<tbody>
						<tr>
							<td><span class='carOneColor font-weight-bold h5'>Car 1</span> finished in <span class='carOneColor font-weight-bold h5'>${carOneLS}</span> place, with a time of <span class='carOneColor font-weight-bold h5'>${carOneTimeLS}</span> milliseconds!</td>
						</tr>
						<tr>
							<td><span class='carTwoColor font-weight-bold h5'>Car 2</span> finished in <span class='carTwoColor font-weight-bold h5'>${carTwoLS}</span> place, with a time of <span class='carTwoColor font-weight-bold h5'>${carTwoTimeLS}</span> milliseconds!</td>
						</tr>
					</tbody>
				</table>
			</div>`
		);
	}

	raceBtn.on('click', function () {
		carOneTime = Math.floor(Math.random() * 4000) + 1000
		carTwoTime = Math.floor(Math.random() * 4000) + 1000

		localStorage.setItem('carOneTime', carOneTime)
		localStorage.setItem('carTwoTime', carTwoTime)

		$('#racingTrack').prepend('<div class="overlay"></div>')

		const overlay = $('.overlay')
		let counter = 4;

		$('#counter').text(counter)

		const id = setInterval(function () {
			counter--
			overlay.html(`<span class='counter'>${counter}</span>`)

			if (counter === 0) {
				clearInterval(id)
				overlay.remove()

				carOne.animate(
					{ left: `+=${screenWidth}` },
					carOneTime,
					function () {
						raceIsOver();
						resultTable('.carOneBody', carOneTime, 'carOneColor');
						localStorage.setItem('carOne', place)
					}
				);

				carTwo.animate(
					{ left: `+=${screenWidth}` },
					carTwoTime,
					function () {
						raceIsOver();
						resultTable('.carTwoBody', carTwoTime, 'carTwoColor'
						);
						localStorage.setItem('carTwo', place)
					}
				);
			}
		}, 1000);

		$(this).attr('disabled', true)
	});

	startOverBtn.on('click', function () {
		carOne.css('left', '0')
		carTwo.css('left', '0')
		$('.flag').fadeOut()
		$('.overlay').remove()
		raceBtn.removeAttr('disabled')
		$(this).attr('disabled', true)
		place = 'first'
	});
});