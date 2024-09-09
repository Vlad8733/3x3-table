<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x3 Table</title>
    <style>
        /* General styles */
        body {
            background-color: gray;
            margin: 0;
            overflow: hidden;
            perspective: 1000px;
        }

        .page-wrapper {
            transition: transform 1s;
        }

        .page-wrapper.rotate {
            transform: rotateY(360deg);
        }

        table {
            width: 1500px;
            height: 1000px;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            font-size: 24px;
        }

        td, th {
            width: 500px;
            height: 333px;
        }

        /* Container for red block and photo */
        .container {
            position: relative;
            width: 300px;
            height: 300px;
            overflow: hidden;
            margin: 0 auto;
        }

        .red-block {
            width: 100%;
            height: 100%;
            background-color: #821F0A;
            position: absolute;
            top: 0;
            left: 0;
            background-size: cover;
            transition: transform 0.5s ease-in-out;
            z-index: 1;
        }

        .photo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('vtdt.jpg');
            background-size: cover;
            background-position: center;
            transition: opacity 0.5s ease-in-out;
            z-index: 0;
        }

        .container:hover .red-block {
            transform: translateX(-100%);
        }

        .container:hover .photo {
            opacity: 1;
        }

        /* Confetti styles */
        .confetti-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f39c12;
            border-radius: 50%;
            opacity: 0;
            animation: fall 3s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px);
                opacity: 1;
            }
            100% {
                transform: translateY(100%);
                opacity: 0;
            }
        }

        /* Rotate button styles */
        .rotate-button {
            display: block;
            width: 150px;
            height: 50px;
            margin: 20px auto;
            background-color: #3498db;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 1s;
        }

        /* Bubble styles */
        .bubble-container {
            position: relative;
            width: 100%;
            height: 333px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .bubble {
            position: relative;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, #ffffff 5%, #000000 70%);
            border-radius: 50%;
            animation: breathe 6s ease-in-out infinite;
        }

        .bubble::before {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #ffffff;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes breathe {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.5);
                opacity: 0.2;
            }
        }

        /* Link container styles */
        .link-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .link-container a {
            display: block;
            margin: 10px;
            color: blue;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .link-container a:hover {
            color: darkblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9);
        }

        /* Form styles */
        .form-container {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            margin-bottom: 15px;
            font-size: 24px;
            text-align: center;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .form-container input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #2980b9;
        }

        /* Additional form styles */
        .form-container.edit, .form-container.delete {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        .form-container.edit button {
            background-color: #191970;
        }

        .form-container.delete button {
            background-color: #8B0000
        }

        .form-container.edit button:hover, .form-container.delete button:hover {
            background-color: #c0392b;
        }

        .weather-container {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .weather-container h2 {
            margin-bottom: 15px;
            font-size: 24px;
        }

        #weather {
            font-size: 18px;
        }

        
    </style>
</head>
<body>
    <h1> </h1>
    <div class="page-wrapper">
        <table>
            <tr>
                <th>
                    <div class="container">
                        <div class="red-block"></div>
                        <div class="photo"></div>
                    </div>
                </th>
                <th>
                    <div class="confetti-container" id="confetti-container"></div>
                </th>
                <th>
                    <button class="rotate-button" id="rotateButton">Click for surprise</button>
                </th>
            </tr>
            <tr>
                <td>
                    <div class="bubble-container">
                        <div class="bubble"></div>
                    </div>
                </td>
                <td>
                    <div class="link-container">
                        <a href="https://www.youtube.com/">YouTube</a>
                        <a href="https://www.e-klase.lv/">E-Klase</a>
                        <a href="https://mail.google.com/">Gmail</a>
                        <a href="https://www.vtdt.lv/">VTDT</a>
                        <a href="https://github.com/">GitHub</a>
                    </div>
                </td>
                <td>
                    <div class="weather-container">
                        <h2>Current Weather in Cēsis</h2>
                        <div id="weather">Loading weather data...</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-container">
                        <h2>Add User</h2>
                        <form id="addUserForm">
                            <label for="addFirstName">First Name:</label>
                            <input type="text" id="addFirstName" name="firstName" placeholder="John" required>

                            <label for="addLastName">Last Name:</label>
                            <input type="text" id="addLastName" name="lastName" placeholder="Johnson" required>

                            <label for="addPhone">Phone Number:</label>
                            <input type="tel" id="addPhone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>

                            <label for="addPersonalCode">Personal Code:</label>
                            <input type="text" id="addPersonalCode" name="personalCode" pattern="[0-9]{4}-[0-9]{4}" placeholder="1234-5678" required>

                            <button type="submit">Add User</button>
                        </form>
                    </div>
                </td>
                <td>
                    <div class="form-container edit">
                        <h2>Edit User</h2>
                        <form id="editUserForm">
                            <label for="editId">User ID:</label>
                            <input type="text" id="editId" name="userId" placeholder="User ID" required>

                            <label for="editFirstName">First Name:</label>
                            <input type="text" id="editFirstName" name="firstName" placeholder="John" required>

                            <label for="editLastName">Last Name:</label>
                            <input type="text" id="editLastName" name="lastName" placeholder="Johnson" required>

                            <label for="editPhone">Phone Number:</label>
                            <input type="tel" id="editPhone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>

                            <label for="editPersonalCode">Personal Code:</label>
                            <input type="text" id="editPersonalCode" name="personalCode" pattern="[0-9]{4}-[0-9]{4}" placeholder="1234-5678" required>

                            <button type="submit">Update User</button>
                        </form>
                    </div>
                </td>
                <td>
                    <div class="form-container delete">
                        <h2>Delete User</h2>
                        <form id="deleteUserForm">
                            <label for="deleteId">User ID:</label>
                            <input type="text" id="deleteId" name="userId" placeholder="User ID" required>

                            <button type="submit">Delete User</button>
                        </form>
                    </div>
                </td>
            </tr>
        </table>

        <script>
            function createConfetti() {
                const colors = ['#f39c12', '#e74c3c', '#2ecc71', '#3498db', '#9b59b6', '#f1c40f'];
                const container = document.getElementById('confetti-container');

                function addConfetti() {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.width = `${Math.random() * 10 + 10}px`;
                    confetti.style.height = confetti.style.width;
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.top = `${Math.random() * 100}vh`;
                    confetti.style.left = `${Math.random() * 100}vw`;
                    container.appendChild(confetti);
                }

                setInterval(addConfetti, 10);
            }

            function rotatePage() {
                const pageWrapper = document.querySelector('.page-wrapper');
                pageWrapper.classList.toggle('rotate');
            }

            document.getElementById('rotateButton').addEventListener('click', rotatePage);

            function fetchWeather() {
                const apiKey = '0efe35c3ada9a559355a19979ad53e84'; 
                const city = 'Cēsis';
                const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=lv`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.cod === 200) {
                            const weatherDiv = document.getElementById('weather');
                            const temperature = data.main.temp;
                            const weatherDescription = data.weather[0].description;
                            const humidity = data.main.humidity;
                            const windSpeed = data.wind.speed;

                            weatherDiv.innerHTML = `
                                <p><strong>Temperature:</strong> ${temperature}°C</p>
                                <p><strong>Description:</strong> ${weatherDescription}</p>
                                <p><strong>Humidity:</strong> ${humidity}%</p>
                                <p><strong>Wind Speed:</strong> ${windSpeed} m/s</p>
                            `;
                        } else {
                            document.getElementById('weather').innerHTML = 'Weather information not available.';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching weather data:', error);
                        document.getElementById('weather').innerHTML = 'Failed to retrieve weather data.';
                    });
            }

            fetchWeather();
            createConfetti();
        </script>
    </div>
</body>
</html>
