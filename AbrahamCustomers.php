
<!-- Abraham Caban Rios
Module 5
8/3/2023 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Character Customers</title>
</head>
<body>
    <h1>Customer Information</h1>

    <?php
    // Create an array of customers with secret identities
    $customers = array(
        array('first_name' => 'Clark', 'last_name' => 'Kent', 'age' => 30, 'phone_number' => '555-1234'),
        array('first_name' => 'Bruce', 'last_name' => 'Wayne', 'age' => 35, 'phone_number' => '555-5678'),
        array('first_name' => 'Diana', 'last_name' => 'Prince', 'age' => 28, 'phone_number' => '555-4321'),
        array('first_name' => 'Barry', 'last_name' => 'Allen', 'age' => 25, 'phone_number' => '555-8765'),
        array('first_name' => 'Arthur', 'last_name' => 'Curry', 'age' => 32, 'phone_number' => '555-9876'),
        array('first_name' => 'Hal', 'last_name' => 'Jordan', 'age' => 29, 'phone_number' => '555-2345'),
        array('first_name' => 'Oliver', 'last_name' => 'Queen', 'age' => 35, 'phone_number' => '555-7890'),
        array('first_name' => 'Selina', 'last_name' => 'Kyle', 'age' => 27, 'phone_number' => '555-3456'),
        array('first_name' => 'Barbara', 'last_name' => 'Gordon', 'age' => 26, 'phone_number' => '555-6543'),
        array('first_name' => 'Victor', 'last_name' => 'Stone', 'age' => 24, 'phone_number' => '555-8765')
    );

    // Function to find and display customer information using in_array()
    function findCustomerUsingInArray($customers, $field, $value) {
        $foundCustomers = array();
        foreach ($customers as $customer) {
            if (in_array($value, $customer)) {
                $foundCustomers[] = $customer;
            }
        }

        return $foundCustomers;
    }

    // Function to find and display customer information using array_search()
    function findCustomerUsingArraySearch($customers, $field, $value) {
        $foundCustomers = array();
        foreach ($customers as $customer) {
            if (array_search($value, $customer) !== false) {
                $foundCustomers[] = $customer;
            }
        }

        return $foundCustomers;
    }

    // Find and display customers based on different data fields using in_array()
    $customersFoundInArrayAge = findCustomerUsingInArray($customers, 'age', 30);
    $customersFoundInArrayLastName = findCustomerUsingInArray($customers, 'last_name', 'Prince');
    $customersFoundInArrayPhoneNumber = findCustomerUsingInArray($customers, 'phone_number', '555-8765');

    // Find and display customers based on different data fields using array_search()
    $customersFoundInSearchAge = findCustomerUsingArraySearch($customers, 'age', 35);
    $customersFoundInSearchFirstName = findCustomerUsingArraySearch($customers, 'first_name', 'Selina');
    ?>

    <h2>Customers with age equal to 30 (using in_array):</h2>
    <table border='1'>
        <tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr>
        <?php
        foreach ($customersFoundInArrayAge as $customer) {
        ?>
            <tr>
                <td><?php echo $customer['first_name']; ?></td>
                <td><?php echo $customer['last_name']; ?></td>
                <td><?php echo $customer['age']; ?></td>
                <td><?php echo $customer['phone_number']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>Customers with last name equal to 'Prince' (using in_array):</h2>
    <table border='1'>
        <tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr>
        <?php
        foreach ($customersFoundInArrayLastName as $customer) {
        ?>
            <tr>
                <td><?php echo $customer['first_name']; ?></td>
                <td><?php echo $customer['last_name']; ?></td>
                <td><?php echo $customer['age']; ?></td>
                <td><?php echo $customer['phone_number']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>Customers with phone number equal to '555-8765' (using in_array):</h2>
    <table border='1'>
        <tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr>
        <?php
        foreach ($customersFoundInArrayPhoneNumber as $customer) {
        ?>
            <tr>
                <td><?php echo $customer['first_name']; ?></td>
                <td><?php echo $customer['last_name']; ?></td>
                <td><?php echo $customer['age']; ?></td>
                <td><?php echo $customer['phone_number']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>Customer with age equal to 35 (using array_search):</h2>
    <table border='1'>
        <tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr>
        <?php
        foreach ($customersFoundInSearchAge as $customer) {
        ?>
            <tr>
                <td><?php echo $customer['first_name']; ?></td>
                <td><?php echo $customer['last_name']; ?></td>
                <td><?php echo $customer['age']; ?></td>
                <td><?php echo $customer['phone_number']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>Customer with first name equal to 'Selina' (using array_search):</h2>
    <table border='1'>
        <tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr>
        <?php
        foreach ($customersFoundInSearchFirstName as $customer) {
        ?>
            <tr>
                <td><?php echo $customer['first_name']; ?></td>
                <td><?php echo $customer['last_name']; ?></td>
                <td><?php echo $customer['age']; ?></td>
                <td><?php echo $customer['phone_number']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
