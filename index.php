<!DOCTYPE html>
<html>
<head>
    <title>Flight Simulator Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #333333;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .navbar {
            background-color: #ff0000;
            padding: 10px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .navbar ul li {
            display: inline;
            margin-right: 10px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .flight-info {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .flight-info i {
            margin-right: 5px;
        }

        .dashboard-card {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .dashboard-card h2 {
            margin-top: 0;
        }

        .dashboard-card p {
            color: #666666;
        }

        .dashboard-card .card-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .dashboard-card .card-link {
            color: #ff0000;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Flight Simulator Dashboard</h1>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fas fa-plane"></i> Flights</a></li>
            <li><a href="flight_plan.php"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
            <li><a href="#"><i class="fas fa-map-marked-alt"></i> Maps</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="logout.php"><i class="fas fa-cog"></i> logout</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="flight-info">
            <i class="fas fa-plane"></i>
            <h2>Flight #1234</h2>
        </div>

        <div class="dashboard-card">
            <i class="fas fa-user card-icon"></i>
            <h2>Welcome, Pilot!</h2>
            <p>Explore various flights, check your schedule, and navigate with our interactive maps.</p>
            <p><a href="#" class="card-link">Learn More</a></p>
        </div>

        <div class="dashboard-card">
            <i class="fas fa-map-marked-alt card-icon"></i>
            <h2>Interactive Maps</h2>
            <p>Discover the world from above with our detailed and interactive maps.</p>
            <p><a href="#" class="card-link">View Maps</a></p>
        </div>

        <div class="dashboard-card">
            <i class="fas fa-calendar-alt card-icon"></i>
            <h2>Flight Schedule</h2>
            <p>Manage your flight schedule and stay organized with upcoming flights.</p>
            <p><a href="#" class="card-link">View Schedule</a></p>
        </div>
    </div>
</body>
</html>
