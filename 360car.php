<?php
require 'incl/init.php';
$pageTitle = "Forside";
/* Header & Body (start) */
require DOCROOT . 'incl/header.php';
?>


<main class="a-body">
    <a-scene background="color:#ECECEC" class="fullscreen" inspector="" keyboard-shortcuts="" screenshot="" vr-mode-ui="">
        <a-assets>
            <a-asset-item id="car" src="car.glb"></a-asset-item>
            <img id="sechelt" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/sechelt.jpg">
        </a-assets>

        <!-- 360-degree image. -->
        <a-sky id="image-360" radius="10" src="#sechelt" material="" geometry="" scale="-2 2 2"></a-sky>


        <a-entity id="camera" camera="" position="-9.71859428966632 1.9999999999999973 -5.5404830125958435" orbit-controls="autoRotate:true;target:#target;enableDamping:true;dampingFactor:0.125;rotateSpeed:0.15;minDistance:3;maxDistance:100;autoRotateSpeed:0.5" mouse-cursor="" rotation="-7.608070302599781 -94.5231534817611 -1.6044010408664596e-15" look-controls="" data-aframe-inspector-original-camera="">
            <a-entity geometry="primitive:cone;radiusTop:0" scale="0.33 1 0.33" position="" rotation="90 0 0" material="color:#0099ff;transparent:true;opacity:0.5"></a-entity>
        </a-entity>

        <!-- PREMADE CAR -->
        <a-entity visible="false" gltf-model="car.glb" scale="5 5 5" position="0 0.6 -7" material="color:yellow"></a-entity>

        <!-- CAR -->
        <a-entity visible="" position="0 0 5">
            <!-- CAR SHAPE -->
            <a-box position="0.021 0.695 -4.77" color="#4CC3D9" shadow="" material="" geometry="" scale="2 1 3.5" id="target"></a-box>
            <a-box position="0.021 1.3878281433999438 -4.923329549183441" color="#4CC3D9" shadow="" material="color:#478ede" geometry="" scale="1.7 1 2"></a-box>
            <!-- RIMS -->
            <a-entity>
                <a-cylinder position="0.97 0.5 -3.791" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#000000" geometry="" rotation="0 -0.63 90" scale="1 0.25 1"></a-cylinder>
                <a-cylinder position="0.971 0.5 -3.791" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#c0c0c0" geometry="radius:0.4" rotation="0 -0.63 90" scale="1 0.25 1"></a-cylinder>
                <a-cylinder position="-0.922 0.5 -3.791" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#000000" geometry="" rotation="0 0 90" scale="1 0.25 1"></a-cylinder>
                <a-cylinder position="-0.923 0.5 -3.791" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#c0c0c0" geometry="radius:0.4" rotation="0 0 90" scale="1 0.25 1"></a-cylinder>
                <a-cylinder position="-0.922 0.5 -5.71" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#000000" geometry="" rotation="0 0 90" scale="1 0.25 1"></a-cylinder>
                <a-cylinder position="-0.923 0.5 -5.71" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#c0c0c0" geometry="radius:0.4" rotation="0 0 90" scale="1 0.25 1"></a-cylinder>
                <a-cylinder position="0.97 0.5 -5.71" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#000000" geometry="" rotation="0 0 90" scale="1 0.25 1"></a-cylinder>
                <a-cylinder position="0.971 0.5 -5.71" radius="0.5" height="1.5" color="#FFC65D" shadow="" material="color:#c0c0c0" geometry="radius:0.4" rotation="0 0 90" scale="1 0.25 1"></a-cylinder>
            </a-entity>
        </a-entity>
        <a-entity scale="0.864 1 1.176" geometry="primitive:sphere;radius:NaN" position="0.019 1.264 -4.943" visible="false"></a-entity>
    </a-scene>


    <a href="blob:https://aframe.io/73246134-b2e7-4916-baee-32b8ef78d492" download="aframe-io-aframe-examples-boilerplate-hello-world" style="display: none;"></a>
    <a href="blob:http://bamse.hej/77fd7c60-2465-4943-8823-c7ca815d445a" download="bamse-hej-car-html" style="display: none;"></a>
</main>




<!-- FOOTER & BODY (end) -->
<?php require DOCROOT . 'incl/footer.php'; ?>
