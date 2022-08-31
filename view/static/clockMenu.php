<div class="home_title">
	<h1 class="menu_title" align="center">CRUD Inventario</h1>
	<p class="title_descripcion">Gestión y alta de productos</p>
</div>

<div class="logoBox">
	<i>
		<img src="../resources/img/logos/barcode-regular-240.png" alt="logoImg">
	</i>
</div>
<br><br>
<div class="clock-container">
	<div class="time">
		<div class="time-colon">
			<div class="time-text">
				<span class="num hour_num">00</span>
				<span class="text">Horas</span>
			</div>
			<span class="colon">:</span>
		</div>
		<div class="time-colon">
			<div class="time-text">
				<span class="num min_num">00</span>
				<span class="text">Minutos</span>
			</div>
			<span class="colon">:</span>
		</div>
		<div class="time-colon">
			<div class="time-text">
				<span class="num sec_num">00</span>
				<span class="text">Segundos</span>
			</div>
			<span class="am_pm">AM</span>
		</div>
	</div>
</div>

<script type="text/javascript">
	// Funcion para el reloj
	setInterval(() => {

		let date = new Date(),
			hour = date.getHours(),
			min = date.getMinutes(),
			sec = date.getSeconds();

		let d;
		d = hour < 12 ? "AM" : "PM"; //if hour is smaller than 12, than its value will be AM else its value will be pm
		hour = hour > 12 ? hour - 12 : hour; //if hour value is greater than 12 than 12 will subtracted ( by doing this we will get value till 12 not 13,14 or 24 )
		hour = hour == 0 ? hour = 12 : hour; // if hour value is  0 than it value will be 12

		// adding 0 to the front of all the value if they will less than 10
		hour = hour < 10 ? "0" + hour : hour;
		min = min < 10 ? "0" + min : min;
		sec = sec < 10 ? "0" + sec : sec;

		document.querySelector(".hour_num").innerText = hour;
		document.querySelector(".min_num").innerText = min;
		document.querySelector(".sec_num").innerText = sec;
		document.querySelector(".am_pm").innerText = d;

	}, 1000); // 1000 milliseconds = 1s
</script>