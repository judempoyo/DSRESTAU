# DSRESTAU Project

## Description

DSRESTAU is a web application designed for online food ordering and table booking. It provides users with a seamless experience to browse restaurants, view menus, place orders for delivery or pickup, and reserve tables at their favorite dining spots.

## Table of Contents

- [DSRESTAU Project](#dsrestau-project)
  - [Description](#description)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Features](#features)
  - [Technologies Used](#technologies-used)
  - [Contributing](#contributing)
  - [License](#license)

## Installation

To set up the project locally, follow these steps:

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/judempoyo/DSRESTAU.git
   ```

2. **Navigate to the Project Directory**:

   ```bash
   cd DSRESTAU
   ```

3. **Install Dependencies**:
   - If using Composer, run:

   ```bash
   composer install
   ```

4. **Database Setup**:
   - Import the database schema into your preferred database management system.

5. **Configure Environment**:
   - update the configuration settings as needed in the _config/config.php file.

6. Move the Project to the WAMP Server Directory:
   - Copy the entire project folder into the www directory of your WAMP installation (usually located at C:\wamp\www\).

7. Start the WAMP Server:

   -Ensure that the WAMP server is running. The WAMP icon in the system tray should be green.

8. Access the Application:

   - Open your web browser and navigate to <http://localhost/DSRESTAU> (or the folder name you used).

## Usage

1. **User   Registration/Login**:
   - Users can register for a new account or log in to an existing account.

2. **View Menus**:
   - Click on a restaurant to view its menu items.

3. **Place Orders**:
   - Add items to the cart and proceed to checkout to place an order.

4. **Book a Table**:
   - Users can reserve a table at their desired restaurant.

## Features

- User authentication (login and registration)
- Browse restaurants and view their menus
- Search functionality for specific dishes or restaurants
- Place orders for delivery or pickup
- Track order status
- User profile management
- Admin panel for managing restaurants, dishes, and orders
- Table booking functionality

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP (with Composer)
- **Database**: MySQL or another preferred database management system
- **Other Tools**: Git,Laragon

## Contributing

Contributions are welcome! If you'd like to contribute to this project, please follow these steps:

1. **Fork the Repository**
2. **Create Your Feature Branch**:

   ```bash
   git checkout -b feature/your-feature
   ```

3. **Commit Your Changes**:

   ```bash
   git commit -m 'Add your feature'
   ```

4. **Push to the Branch**:

   ```bash
   git push origin feature/your-feature
   ```

5. **Create a New Pull Request**

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
