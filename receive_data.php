<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Rental Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Header */
        .header {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header .logo img {
            height: 40px;
        }

        .header nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .header nav ul li {
            margin: 0 10px;
        }

        .header nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .header nav ul li a:hover {
            background-color: #f0f0f0;
        }

        /* Main Container */
        .main-container {
            display: flex;
        }

        /* 优化后的 Sidebar 样式 */
        .sidebar {
            width: 250px;
            background-color: #34495e;
            /* 深蓝色背景 */
            color: #ecf0f1;
            /* 浅灰文字 */
            height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 4px;
            transition: background 0.3s, color 0.3s;
            font-size: 16px;
        }

        .sidebar ul li a:hover {
            background-color: #1abc9c;
            /* 鼠标悬停时绿色高亮 */
            color: #fff;
            /* 字体颜色切换 */
        }

        .sidebar ul li a.active {
            background-color: #16a085;
            /* 激活状态的背景 */
            color: #fff;
        }

        /* Content Area */
        .content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
        }

        .welcome-section {
            background: url('./crap/bg.png') center center/cover no-repeat;
            color: #fff;
            text-align: center;
            padding: 50px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .welcome-section h1 {
            font-size: 2.5em;
            margin: 0 0 10px;
        }

        .welcome-section form {
            margin-top: 20px;
        }

        .welcome-section select,
        .welcome-section input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            width: 150px;
        }

        .welcome-section input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }

        .welcome-section input[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Table */
        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #34495e;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f7f9fc;
        }

        tr:hover {
            background-color: #dce1e8;
        }

        .actions button {
            background-color: #2c3e50;
            color: #fff;
            border: none;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #1a252f;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="./crap/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="apartments.php">Apartment</a></li>
                <!-- <li><a href="#">My Intention</a></li>
                <li><a href="#">Additional Service</a></li> -->
                <li><a href="login.php">Log in</a></li>
                <li><a href="register.php">Sign up</a></li>
                <!-- <li><a href="#">Help</a></li> -->
            </ul>
        </nav>
    </div>

    <div class="main-container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#" onclick="showSection('propertyManagement')">Property Management</a></li>
                <li><a href="#" onclick="showSection('userManagement')">User Management</a></li>
                <li><a href="#" onclick="showSection('contractManagement')">Contract Management</a></li>
                <li><a href="#" onclick="showSection('logout')">Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <div id="home" class="section">
                <div class="welcome-section">
                    <h1>Welcome...</h1>
                    <!-- <form action="#" method="GET">
                        <select name="category">
                            <option value="cities">Cities</option>
                            <option value="apartments">Apartments</option>
                            <option value="universities">Universities</option>
                        </select>
                        <input type="text" placeholder="Search..." name="query">
                        <input type="submit" value="Search">
                    </form> -->
                </div>
            </div>

            <div id="propertyManagement" class="section hidden">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <h2 style="margin: 0;">Property List</h2>
                    <div>
                        <input type="text" id="searchInput" placeholder="Search by any field..."
                            style="padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 5px;">
                        <button onclick="searchTable()"
                            style="padding: 8px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Search
                        </button>
                    </div>
                </div>

                <!-- <div class="table-container"> -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Property Name</th>
                                <th>Contact</th>
                                <th>Owner Name</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Size</th>
                                <th>Image</th>
                                <th>Lease Start</th>
                                <th>Lease End</th>
                                <th>Price per Day</th>
                                <th>Total</th>
                                <th>Payment Status</th>
                                <th>Approval Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sample Property</td>
                                <td>123456789</td>
                                <td>John Doe</td>
                                <td>987654321</td>
                                <td>Type A</td>
                                <td>123 Main St</td>
                                <td>100 sqm</td>
                                <td><img src="./pics/rental/1.png" alt="Property" width="50"></td>
                                <td>2023-01-01</td>
                                <td>2023-12-31</td>
                                <td>€50</td>
                                <td>€1500</td>
                                <td>Paid</td>
                                <td>Approved</td>
                                <td class="actions">
                                    <button onclick="location.href='edit_property.html?id=1'">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Green Apartments</td>
                                <td>345678123</td>
                                <td>Alice Smith</td>
                                <td>876543210</td>
                                <td>Type B</td>
                                <td>45 Elm St</td>
                                <td>80 sqm</td>
                                <td><img src="./pics/rental/2.png" alt="Property" width="50"></td>
                                <td>2023-02-01</td>
                                <td>2023-11-30</td>
                                <td>€40</td>
                                <td>€1200</td>
                                <td>Paid</td>
                                <td>Pending</td>
                                <td class="actions">
                                    <button onclick="location.href='edit_property.html?id=2'">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Blue Residences</td>
                                <td>456789234</td>
                                <td>Michael Brown</td>
                                <td>765432109</td>
                                <td>Type C</td>
                                <td>89 Maple Ave</td>
                                <td>120 sqm</td>
                                <td><img src="./pics/rental/3.png" alt="Property" width="50"></td>
                                <td>2023-03-01</td>
                                <td>2023-10-31</td>
                                <td>€60</td>
                                <td>€1800</td>
                                <td>Unpaid</td>
                                <td>Approved</td>
                                <td class="actions">
                                    <button onclick="location.href='edit_property.html?id=3'">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Sunrise Villas</td>
                                <td>567890345</td>
                                <td>Emily Davis</td>
                                <td>654321987</td>
                                <td>Type D</td>
                                <td>22 Oak St</td>
                                <td>150 sqm</td>
                                <td><img src="./pics/rental/4.png" alt="Property" width="50"></td>
                                <td>2023-04-01</td>
                                <td>2023-09-30</td>
                                <td>€70</td>
                                <td>€2100</td>
                                <td>Paid</td>
                                <td>Approved</td>
                                <td class="actions">
                                    <button onclick="location.href='edit_property.html?id=4'">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Riverfront Condos</td>
                                <td>678901456</td>
                                <td>William Taylor</td>
                                <td>543210876</td>
                                <td>Type E</td>
                                <td>78 River Rd</td>
                                <td>90 sqm</td>
                                <td><img src="./pics/rental/5.png" alt="Property" width="50"></td>
                                <td>2023-05-01</td>
                                <td>2023-08-31</td>
                                <td>€55</td>
                                <td>€1650</td>
                                <td>Paid</td>
                                <td>Pending</td>
                                <td class="actions">
                                    <button onclick="location.href='edit_property.html?id=5'">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>City Heights</td>
                                <td>789012567</td>
                                <td>Sophia Johnson</td>
                                <td>432109765</td>
                                <td>Type F</td>
                                <td>33 Skyline Ave</td>
                                <td>110 sqm</td>
                                <td><img src="./pics/rental/6.png" alt="Property" width="50"></td>
                                <td>2023-06-01</td>
                                <td>2023-07-31</td>
                                <td>€65</td>
                                <td>€1950</td>
                                <td>Unpaid</td>
                                <td>Approved</td>
                                <td class="actions">
                                    <button onclick="location.href='edit_property.html?id=6'">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Hilltop Estates</td>
                                <td>890123678</td>
                                <td>Daniel White</td>
                                <td>321098654</td>
                                <td>Type G</td>
                                <td>99 Hill St</td>
                                <td>200 sqm</td>
                                <td><img src="./pics/rental/7.png" alt="Property" width="50"></td>
                                <td>2023-07-01</td>
                                <td>2023-06-30</td>
                                <td>€85</td>
                                <td>€2550</td>
                                <td>Paid</td>
                                <td>Pending</td>
                                <td class="actions">
                                    <button onclick="location.href='edit_property.html?id=7'">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="userManagement" class="section hidden">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <h2 style="margin: 0;">User Management</h2>
                    <div>
                        <input type="text" id="userSearchInput" placeholder="Search by any field..."
                            style="padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 5px;">
                        <button onclick="searchTable('userSearchInput', 'userTable')"
                            style="padding: 8px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Search
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table id="userTable">

                        <table>
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jane Doe</td>
                                    <td>jane.doe@example.com</td>
                                    <td>555-1234</td>
                                    <td class="actions">
                                        <!-- <button>Details</button> -->
                                        <button>Edit</button>
                                        <!-- <button>Delete</button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div id="contractManagement" class="section hidden">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <h2 style="margin: 0;">Contract Management</h2>
                    <div>
                        <input type="text" id="contractSearchInput" placeholder="Search by any field..."
                            style="padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 5px;">
                        <button onclick="searchTable('contractSearchInput', 'contractTable')"
                            style="padding: 8px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Search
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table id="contractTable">

                        <table>
                            <thead>
                                <tr>
                                    <th>Contract ID</th>
                                    <th>Property Name</th>
                                    <th>Tenant Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1001</td>
                                    <td>Sample Property</td>
                                    <td>Jane Doe</td>
                                    <td>2023-01-01</td>
                                    <td>2023-12-31</td>
                                    <td class="actions">
                                        <!-- <button>Details</button> -->
                                        <button>Edit</button>
                                        <!-- <button>Delete</button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div id="logout" class="section hidden">
                <h2>Logout</h2>
                <p>You have been logged out.</p>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.add('hidden'));
            document.getElementById(sectionId).classList.remove('hidden');

            // 激活当前 Tab
            const links = document.querySelectorAll('.sidebar ul li a');
            links.forEach(link => link.classList.remove('active'));
            document.querySelector(`.sidebar ul li a[onclick="showSection('${sectionId}')"]`).classList.add('active');
        }


        // 搜索功能实现
        function searchTable() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const table = document.querySelector(".table-container table");
            const rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) { // 遍历所有数据行（跳过表头）
                const row = rows[i];
                const cells = row.getElementsByTagName("td");
                let found = false;

                // 检查每一行的单元格内容
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent.toLowerCase();
                    if (cellText.includes(input)) {
                        found = true;
                        break;
                    }
                }

                // 根据搜索结果显示或隐藏行
                row.style.display = found ? "" : "none";
            }
        }
    </script>
</body>

</html>