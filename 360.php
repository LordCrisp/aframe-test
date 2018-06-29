<?php include "incl/init.php"?>
<?php include "incl/header.php"?>

<a-scene>
	<a-assets>
		<!-- Click Sound for Hover -->
		<audio id="click-sound" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/audio/click.ogg"></audio>

		<!-- Images. -->
		<img id="city" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/city.jpg">
		<img id="city-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-city.jpg">
		<img id="cubes-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-cubes.jpg">
		<img id="sechelt-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-sechelt.jpg">
		<img id="cubes" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/cubes.jpg">
		<img id="sechelt" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/sechelt.jpg">

		<!-- Thumbnail Template -->
		<script id="link" type="text/html">
			<a-entity class="link"
			          geometry="primitive: plane; height: 1; width: 1"
			          material="shader: flat; src: ${thumb}"
			          sound="on: click; src: #click-sound"
			          event-set__1="_event: mousedown; scale: 1 1 1"
			          event-set__2="_event: mouseup; scale: 1.2 1.2 1"
			          event-set__3="_event: mouseenter; scale: 1.2 1.2 1"
			          event-set__4="_event: mouseleave; scale: 1 1 1"
			          set-image="on: click; target: #image-360; src: ${src}"
			></a-entity>
		</script>
	</a-assets>

	<!-- 360-degree image. -->
	<a-sky id="image-360" radius="10" src="#city"></a-sky>

	<!-- Link to Different Images. -->
	<a-entity id="links" layout="type: line; margin: 1.5" position="-3 -1 -4">
		<a-entity template="src: #link" data-src="#city" data-thumb="#city-thumb"></a-entity>
		<a-entity template="src: #link" data-src="#cubes" data-thumb="#cubes-thumb"></a-entity>
		<a-entity template="src: #link" data-src="#sechelt" data-thumb="#sechelt-thumb"></a-entity>
	</a-entity>

	<!-- Camera + Cursor. -->
	<a-camera>
		<a-cursor id="cursor">
			<a-animation begin="click" easing="ease-in" attribute="scale"
			             fill="backwards" from="0.1 0.1 0.1" to="1 1 1" dur="150"></a-animation>
			<a-animation begin="cursor-fusing" easing="ease-in" attribute="scale"
			             from="1 1 1" to="0.1 0.1 0.1" dur="1500"></a-animation>
		</a-cursor>
	</a-camera>
</a-scene>