<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Rental Management System</title>
    <link rel="stylesheet" href="css/receive.css">
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
                <li><a href="property_list.php">Property Management</a></li>
                <!-- <li><a href="#" onclick="showSection('propertyManagement')">Property Management</a></li> -->
                <li><a href="user_management.php">User Management</a></li>
                <!-- <li><a href="#" onclick="showSection('userManagement')">User Management</a></li> -->
                <li><a href="contract_management.php">Contract Management</a></li>
                <!-- <li><a href="#" onclick="showSection('contractManagement')">Contract Management</a></li> -->
                <!-- <li><a href="#" onclick="showSection('logout')">Logout</a></li> -->
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