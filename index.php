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
        </a-assets>
        <a-entity id="camera" camera="" position="5.780651271779396 1.9999999999999973 -12.661752544745024" orbit-controls="autoRotate:true; target:#target;enableDamping:true; dampingFactor:0.125; rotateSpeed:0.15; minDistance:3; maxDistance:100; autoRotateSpeed:0.5" mouse-cursor="" rotation="-7.608070302599783 143.87684651823872 4.011002602166149e-16" look-controls="" data-aframe-inspector-original-camera="">
            <a-entity geometry="primitive:cone;radiusTop:0" scale="0.33 1 0.33" position="" rotation="90 0 0" material="color:#0099ff;transparent:true;opacity:0.5"></a-entity>
        </a-entity>

        <!-- PREMADE CAR -->
        <a-entity visible="false" gltf-model="car.glb" scale="5 5 5" position="0 0.6 -7" material="color: yellow;"></a-entity>

        <!-- CAR -->
        <a-entity visible="true">
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
        <!-- ROAD -->
        <a-entity visible="">
            <a-plane position="1.8932446269967538 0.00015252289376466166 -4" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#4a4a4a" geometry="" scale="2.4972848990245673 4.246 1"></a-plane>
            <a-plane position="-2.31354873959019 0.001 -4" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#f5f5f5" geometry="" scale="0.06566521380910784 4.246 1"></a-plane>
            <a-plane position="6.132336842134118 0.001 -4" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#f5f5f5" geometry="" scale="0.066 4.246 1"></a-plane>
            <a-plane position="2.1382034378702635 0.001 -3.707909533097171" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#f5f5f5" geometry="" scale="0.066 0.6143516290497322 1"></a-plane>
            <a-plane position="2.125721704387848 0.001 -0.23597994980125891" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#f5f5f5" geometry="" scale="0.066 0.615984818746481 1"></a-plane>
            <a-plane position="2.1231940633804847 0.001 3.248415046005512" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#f5f5f5" geometry="" scale="0.066 0.6240496376939345 1"></a-plane>
            <a-plane position="2.130350271968471 0.001 -7.241839095765601" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#f5f5f5" geometry="" scale="0.066 0.6251893806982746 1"></a-plane>
            <a-plane position="2.135197604132876 0.001 -10.753751261905066" rotation="-90 0 0" width="4" height="4" color="#7BC8A4" shadow="" material="color:#f5f5f5" geometry="" scale="0.066 0.6269923784515311 1"></a-plane>
        </a-entity>
        <a-entity scale="0.864 1 1.176" geometry="primitive:sphere;radius:NaN" position="0.019 1.264 -4.943" visible="false"></a-entity>
    </a-scene>


    <a href="blob:https://aframe.io/73246134-b2e7-4916-baee-32b8ef78d492" download="aframe-io-aframe-examples-boilerplate-hello-world" style="display: none;"></a>
    <a href="blob:http://bamse.hej/77fd7c60-2465-4943-8823-c7ca815d445a" download="bamse-hej-car-html" style="display: none;"></a>
</main>




<!-- FOOTER & BODY (end) -->
<?php require DOCROOT . 'incl/footer.php'; ?>
