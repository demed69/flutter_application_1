   <?php
   header('Content-Type: application/json'); // Menambahkan header untuk output JSON

   $conn = new mysqli("localhost", "root", "", "flutter_app");

   // Cek koneksi
   if ($conn->connect_error) {
       die(json_encode(['success' => false, 'message' => "Connection failed: " . $conn->connect_error]));
   }

   // Mendapatkan data dari request POST
   $name = isset($_POST['name']) ? $_POST['name'] : null;
   $email = isset($_POST['email']) ? $_POST['email'] : null;
   $password = isset($_POST['password']) ? $_POST['password'] : null;

   // Validasi input
   if (empty($name) || empty($email) || empty($password)) {
       echo json_encode(['success' => false, 'message' => 'Name, email, and password are required.']);
       exit;
   }

   // Hash password
   $passwordHash = password_hash($password, PASSWORD_DEFAULT);

   // Persiapan statement SQL
   $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
   $stmt->bind_param("sss", $name, $email, $passwordHash);

   // Eksekusi statement
   if ($stmt->execute()) {
       echo json_encode(['success' => true, 'message' => 'User registered successfully']);
   } else {
       echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
   }

   $stmt->close();
   $conn->close();
   ?>