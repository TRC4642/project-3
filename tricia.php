<?php
// Define initial state for the traffic light
$initialState = 'red';

// Define descriptions for each light color
$lightDescriptions = [
    'red' => 'Red: Stop',
    'yellow' => 'Yellow: Caution',
    'green' => 'Green: Go'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traffic Light System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .traffic-light {
            background-color: #333;
            width: 100px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }
        .light {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin: 10px auto;
            background-color: #555;
            transition: background-color 0.5s ease;
        }
        .red.active {
            background-color: red;
        }
        .yellow.active {
            background-color: yellow;
        }
        .green.active {
            background-color: green;
        }
        .message {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .info-boxes {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .info-box {
            padding: 10px;
            width: 150px;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            font-weight: bold;
        }
        .info-box.red { background-color: red; }
        .info-box.yellow { background-color: yellow; color: #333; }
        .info-box.green { background-color: green; }
    </style>
</head>
<body>

    <div class="traffic-light text-center">
        <div class="light red" id="redLight"></div>
        <div class="light yellow" id="yellowLight"></div>
        <div class="light green" id="greenLight"></div>
    </div>
    <div class="message text-center" id="trafficMessage">Initializing...</div>

    <!-- Information Boxes for Each Color -->
    <div class="info-boxes">
        <div class="info-box red"><?= $lightDescriptions['red'] ?></div>
        <div class="info-box yellow"><?= $lightDescriptions['yellow'] ?></div>
        <div class="info-box green"><?= $lightDescriptions['green'] ?></div>
    </div>

    <script>
        // Set the initial light state based on PHP
        let currentLight = '<?php echo $initialState; ?>';

        function changeLight() {
            // Get the light elements and message display element
            const redLight = document.getElementById('redLight');
            const yellowLight = document.getElementById('yellowLight');
            const greenLight = document.getElementById('greenLight');
            const trafficMessage = document.getElementById('trafficMessage');

            // Reset all lights to inactive
            redLight.classList.remove('active');
            yellowLight.classList.remove('active');
            greenLight.classList.remove('active');

            // Update lights and message based on the current light state
            if (currentLight === 'red') {
                redLight.classList.add('active');
                trafficMessage.innerText = "STOP: Do not proceed.";
                trafficMessage.style.color = "red";
                currentLight = 'green'; // Next light to switch to
            } else if (currentLight === 'green') {
                greenLight.classList.add('active');
                trafficMessage.innerText = "GO: Continue moving.";
                trafficMessage.style.color = "green";
                currentLight = 'yellow'; // Next light to switch to
            } else if (currentLight === 'yellow') {
                yellowLight.classList.add('active');
                trafficMessage.innerText = "CAUTION: Prepare to stop.";
                trafficMessage.style.color = "orange";
                currentLight = 'red'; // Next light to switch to
            }
        }

        // Change the light every 3 seconds
        setInterval(changeLight, 3000);

        // Initialize the traffic light
        changeLight();
    </script>

</body>
</html>