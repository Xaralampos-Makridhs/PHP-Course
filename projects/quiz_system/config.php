<?php
$server = "localhost";
$name = "root";
$password = "xm180605";
$database = "testdrive";

$conn = new mysqli($server, $name, $password, $database);
if ($conn->connect_error) {
    die("Failed: " . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    option_a VARCHAR(255),
    option_b VARCHAR(255),
    option_c VARCHAR(255),
    correct_option ENUM('a','b','c') NOT NULL
)");

$sql = "INSERT INTO quiz (question, option_a, option_b, option_c, correct_option) VALUES
('What does the STOP sign mean?', 'Proceed with caution', 'Mandatory stop', 'Slight deceleration', 'b'),
('What does the red traffic light mean?', 'Right turn allowed', 'Mandatory stop', 'Watch for pedestrians', 'b'),
('Where is parking prohibited?', 'On roads with 2 lanes', 'On curves and intersections', 'Near a STOP sign', 'b'),
('What does a broken white line indicate?', 'Lane changing allowed', 'Lane change prohibited', 'Sidewalk', 'a'),
('At a pedestrian crossing, the driver must:', 'Pass carefully', 'Stop to let pedestrians cross', 'Honk to make them move', 'b'),
('When do you have priority at an uncontrolled intersection?', 'When coming from the right', 'When driving faster', 'When in a larger vehicle', 'a'),
('What does a flashing yellow traffic light mean?', 'Proceed without stopping', 'Mandatory stop', 'Caution, yield to the right', 'c'),
('What is the speed limit in residential areas (unless otherwise indicated)?', '30 km/h', '50 km/h', '60 km/h', 'b'),
('On a two-lane road, which lane is used for overtaking?', 'Right lane', 'Left lane', 'Emergency lane', 'b'),
('What should you do if an ambulance with a siren is approaching?', 'Continue normally', 'Slow down but don’t stop', 'Yield and move to the right', 'c'),
('Where is overtaking prohibited?', 'On uphill roads', 'On level railroad crossings', 'In residential areas', 'b'),
('Who has priority in a roundabout?', 'The entering driver', 'The driver already in the roundabout', 'The driver on your right', 'b'),
('At what distance should the warning triangle be placed?', '10 meters from the vehicle', '20 meters in town and 100 meters on a highway', 'Right next to the vehicle', 'b'),
('When is using the horn allowed?', 'To overtake', 'To warn of danger', 'To greet friends', 'b'),
('What does a continuous double white line mean?', 'Overtaking allowed', 'Lane change and overtaking prohibited', 'Lane separation', 'b'),
('When is it allowed to run a red light?', 'Never', 'When there are no other vehicles', 'When you have priority', 'a'),
('What distance should you maintain from the vehicle in front?', 'Enough to stop safely', 'Always 5 meters', 'Distance covered in 1 second', 'a'),
('What is the correct action before a turn?', 'Slow down inside the turn', 'Slow down before the turn', 'Turn the wheel sharply', 'b'),
('Who should wear a seatbelt?', 'Only the driver', 'Only front passengers', 'All passengers', 'c'),
('When should you use driving lights?', 'Only at night', 'Only on highways', 'When visibility is low', 'c'),
('What is the function of ABS in a car?', 'Increases top speed', 'Prevents wheel lock during braking', 'Enhances steering', 'b'),
('Where should you stop if your car breaks down on a highway?', 'In the traffic lane', 'In the emergency lane', 'In the middle lane', 'b'),
('What should you do when driving behind a motorcycle?', 'Overtake immediately', 'Keep a safe distance', 'Tailgate to pass faster', 'b'),
('What does a sign with “30” in a red circle mean?', 'Speed limit 30 km/h', 'Warning for potholes', 'Minimum speed limit', 'a'),
('What do you do at a railroad crossing without barriers?', 'Cross quickly', 'Stop and check', 'Honk for attention', 'b'),
('What is the minimum age for a driving license (Category B)?', '16', '17', '18', 'c'),
('What light should be used during the day on a highway?', 'Driving lights (low beam)', 'Fog lights', 'Parking lights', 'a'),
('Where can you check for passenger airbag status?', 'In the vehicle’s insurance', 'On the SRS Airbag label', 'Under the hood', 'b'),
('How do you warn other drivers of danger?', 'Turn on hazard lights', 'Make hand gestures', 'Flash high beams continuously', 'a'),
('When are snow chains necessary?', 'In fog', 'In snow or ice', 'In traffic', 'b');
";
$conn->query($sql);
?>
